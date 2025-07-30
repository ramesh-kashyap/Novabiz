<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investment;
use App\Models\Bank;
use App\Models\Withdraw;
use App\Models\PasswordReset;
use App\Models\Debit;
use Hexters\CoinPayment\CoinPayment;
use App\Models\CoinpaymentTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Log;
use Carbon\Carbon;
use Redirect;
use Hash;
use DB;
class WithdrawRequest extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $bank = Bank::where('user_id',$user->id)->orderBy('id','desc')->get();
        $userDirect = User::where('sponsor',$user->id)->where('active_status','Active')->where('package','>=',30)->count();
        $this->data['balance'] = round($user->available_balance(),2);
        $this->data['userDirect'] = $userDirect;
        $this->data['bank'] = $bank;
        $this->data['page'] = 'user.withdraw.WithdrawRequest';
        return $this->dashboard_layout();
    }


    public function withdrawPrinciple()
    {
        $user=Auth::user();
        $bank = Bank::where('user_id',$user->id)->orderBy('id','desc')->get();
        $this->data['bank'] = $bank;
        $this->data['page'] = 'user.withdraw.withdraw-principle';
        return $this->dashboard_layout();
    }


  public function Withdrawcancel($id)
        {
            $withdrawal = Withdraw::find($id);
        
            if (!$withdrawal) {
                return back()->with('error', 'Withdrawal not found.');
            }
        
            if ($withdrawal->status !== 'Pending') {
                return back()->with('error', 'Only pending withdrawals can be cancelled.');
            }
        
            $withdrawal->status = 'Failed';
            $withdrawal->save();
 
               $notify[] = ['success','Withdrawal request cancelled successfully'];
        
            return redirect()->back()->withNotify($notify);
        }


  public function WithdrawRequest(Request $request)
{
    try {
        // Step 1: Validate Request Inputs
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:10',
            'walletAddress' => 'required|string',
            'code' => 'required|string',
        ]);

        if ($validator->fails()) {
            Log::info($validator->errors()->first());
            return redirect()->back()->withErrors($validator->errors()->first())->withInput();
        }

        $user = Auth::user();
        $balance = $user->available_balance();

        // Step 2: Check 2FA Code
        $codeValid = PasswordReset::where('token', $request->code)
            ->where('email', $user->email)
            ->exists();

        if (!$codeValid) {
            return redirect()->route('user.Withdraw')->withNotify([['error', 'Invalid Verification Code']]);
        }

        // Step 3: Update Wallet Address
        DB::table('users')->where('id', $user->id)->update([
            'usdtBep20' => $request->walletAddress,
        ]);

        // Step 4: Check Daily Withdrawal Limit
        $hasWithdrawToday = Withdraw::where('user_id', $user->id)
            ->where('status', '!=', 'Failed')
            ->where('wdate', date('Y-m-d'))
            ->exists();

        if ($hasWithdrawToday) {
            return redirect()->back()->withErrors(['You can only withdraw once per day.']);
        }

        // Step 5: Check for Pending Request
        $pendingWithdraw = Withdraw::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->first();

        if ($pendingWithdraw) {
            return redirect()->back()->withErrors(['You already have a pending withdrawal request.']);
        }

        // Step 6: Check Balance
        if ($balance < $request->amount) {
            return redirect()->back()->withErrors(['Insufficient balance in your account.']);
        }

        // Step 7: Process Withdrawal
        $chargePercentage = 10;
        $chargeAmount = $request->amount * $chargePercentage / 100;
        $payableAmount = $request->amount - $chargeAmount;

        $withdrawData = [
            'txn_id' => md5(time() . rand()),
            'user_id' => $user->id,
            'user_id_fk' => $user->username,
            'amount' => $request->amount,
            'payable_amt' => $payableAmount,
            'charge' => $chargeAmount,
            'account' => $request->walletAddress,
            'payment_mode' => 'USDT.BEP20',
            'status' => 'Pending',
            'walletType' => 1,
            'wdate' => now()->format('Y-m-d'),
        ];

        $withdraw = Withdraw::create($withdrawData);

        return redirect()->back()
            ->with('withdralId', $withdraw->id)
            ->withNotify([['success', 'Withdrawal request submitted successfully.']]);
    } catch (\Exception $e) {
        Log::error('WithdrawRequest Error: ' . $e->getMessage());
        return redirect()->route('user.WithdrawRequest')
            ->withErrors(['error' => 'An unexpected error occurred. Please try again later.'])
            ->withInput();
    }
}


public function WithdrawRequestPrinciple(Request $request)
{
    try {
        $request->validate([
            'amount' => 'required|numeric|min:10',
            'walletAddress' => 'required',
            'code' => 'required|string',
        ]);

        $user = Auth::user();
        $amount = $request->amount;
        $balance = $user->principleBalance();

        if ($balance < $amount) {
            return back()->withErrors(['Insufficient balance in your account'])->withInput();
        }

        // Limit: Only one withdraw per day
        $existingToday = Withdraw::where('user_id', $user->id)
            ->whereDate('wdate', now())
            ->first();

        if ($existingToday) {
            return back()->withErrors(['Only one withdrawal is allowed per day'])->withInput();
        }


        // Pending request check
        $pendingRequest = Withdraw::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->first();

        if ($pendingRequest) {
            return back()->withErrors(['You already have a pending withdrawal request'])->withInput();
        }

        // Step 2: Check 2FA Code
        $codeValid = PasswordReset::where('token', $request->code)
            ->where('email', $user->email)
            ->exists();

        if (!$codeValid) {
            return redirect()->route('user.Withdraw')->withNotify([['error', 'Invalid Verification Code']]);
        }


        // Check for wallet address
        if (empty($request->walletAddress)) {
            return back()->withErrors(['Please update your USDT wallet address or bank details'])->withInput();
        }

        // Determine charge based on adate
        $chargeAmt = 30;
        $createdAt = Carbon::parse($user->adate);
        $days = $createdAt->diffInDays(now());

        if ($days <= 30) {
          $chargeAmt = 30;
        } elseif ($days>=31 && $days <= 60) {
            $chargeAmt = 15;
        } elseif($days>=61) {
            $chargeAmt = 10;
        }

        $charge = $amount * ($chargeAmt / 100);
        $payable = $amount - $charge;

        $withdraw = Withdraw::create([
            'txn_id' => md5(time() . rand()),
            'user_id' => $user->id,
            'user_id_fk' => $user->username,
            'amount' => $amount,
            'account' => $request->walletAddress,
            'payable_amt' => $payable,
            'charge' => $charge,
            'payment_mode' => 'USDT.BEP20',
            'status' => 'Pending',
            'walletType' => 2,
            'wdate' => now()->format('Y-m-d'),
        ]);

        return back()->with('withdralId', $withdraw->id)->withNotify([['success', 'Withdraw request submitted successfully']]);

    } catch (\Exception $e) {
        Log::error('WithdrawRequestPrinciple Error: ' . $e->getMessage());
        return back()->withErrors(['An unexpected error occurred. Please try again.'])->withInput();
    }
}


    public function WithdrawHistory(Request $request){

        $user=Auth::user();
        $limit = $request->limit ? $request->limit : paginationLimit();
         $status = $request->status ? $request->status : null;
         $search = $request->search ? $request->search : null;
         $notes = Withdraw::where('user_id',$user->id)->orderBy('wdate','DESC');
        if($search <> null && $request->reset!="Reset"){
         $notes = $notes->where(function($q) use($search){
            $q->Where('wdate', 'LIKE', '%' . $search . '%')
              ->orWhere('amount', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')
              ->orWhere('txn_id', 'LIKE', '%' . $search . '%');
         });

        }

         $notes = $notes->paginate($limit)->appends(['limit' => $limit ]);

       $this->data['search'] =$search;
       $this->data['withdraw_report'] =$notes;
       $this->data['page'] = 'user.withdraw.WithdrawHistory';
       return $this->dashboard_layout();
    } 
    
    public function debitReport(Request $request){

        $user=Auth::user();
        $limit = $request->limit ? $request->limit : paginationLimit();
         $status = $request->status ? $request->status : null;
         $search = $request->search ? $request->search : null;
         $notes = Debit::where('user_id',$user->id);
        if($search <> null && $request->reset!="Reset"){
         $notes = $notes->where(function($q) use($search){
            $q->Where('wdate', 'LIKE', '%' . $search . '%')
              ->orWhere('amount', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')
              ->orWhere('txn_id', 'LIKE', '%' . $search . '%');
         });

        }

         $notes = $notes->paginate($limit)->appends(['limit' => $limit ]);

       $this->data['search'] =$search;
       $this->data['withdraw_report'] =$notes;
       $this->data['page'] = 'user.withdraw.debit';
       return $this->dashboard_layout();
    }
    public function asset()
    {
        $user=Auth::user();
        $bank = Bank::where('user_id',$user->id)->orderBy('id','desc')->get();
        $this->data['bank'] = $bank;
        $this->data['page'] = 'user.withdraw.asset';
        return $this->dashboard_layout();
    }
}
