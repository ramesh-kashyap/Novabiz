<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Investment;
use App\Models\Income;
use App\Models\User_trade;
use App\Models\Contract;
use App\Models\Activitie;
use Carbon\Carbon;
use Redirect;
use Log;
use Hash;
use Helper;
class Dashboard extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

      $user=Auth::user();

    //   dd(getVip($user->id));
      
      $user_direct=User::where('sponsor',$user->id)->where('active_status','Active')->count();
      $directIds=User::where('sponsor',$user->id)->where('active_status','Active')->pluck('id');
      $personal_deposit=Investment::where('user_id',$user->id)->where('status','Active')->sum('amount');
        $notifications = \DB::table('notifications')->where('read_status',0)->where('user_id',$user->id)->count();
 
      

     
      $deposit_report = Investment::where('user_id',$user->id)->orderBy('id','desc')->get();
      $weekly_profit = Income::where('user_id',$user->id)
      ->whereBetween('ttime', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('comm');
      $totalIncome = Income::where('user_id',$user->id)->sum('comm');

        $transaction_data = Income::where('user_id',$user->id)->orderBy('id', 'desc')->take(10)->get();
          $this->data['todaysRoiSum'] = \DB::table('contract')->where('user_id',$user->id)->where('ttime',date('Y-m-d'))->where('c_status','-1')->sum('profit');

        $this->data['weekly_profit'] =$weekly_profit;
        $this->data['transaction_data'] =$transaction_data;
        $this->data['deposit_report'] =$deposit_report;
        $this->data['user_direct'] =$user_direct;
        $total = $personal_deposit*200/100;
        $portion = $totalIncome;
        if($personal_deposit>0)
        {
             $percentage = ($portion / $total) * 100; // 20 
        }
        else
        {
        $percentage=0;    
        }
      
        $this->data['willgetProfit'] =$personal_deposit*200/100;
        $this->data['remaining_amount'] =($personal_deposit*2)-$totalIncome;
        $this->data['totalIncome'] =$percentage;
        $this->data['notifications'] =$notifications;
  




      $this->data['page'] = 'user.dashboard';
      return $this->dashboard_layout();


    }


    public function stop_trade(){
        $user=Auth::user();
        $contract = Contract::where('c_status', 1)->where('user_id',$user->id)->first();
          
          if ($user) {      
              // Update profit
              // Update contract status and profit
              $contract->c_status = -1;
              $contract->save();      
              $ref = $contract->c_ref;
              $user_id = $user->id;
              
              $data['remarks'] = 'Quantify Income';
              $data['comm'] = $contract->profit;
              $data['amt'] = $ref;
              $data['invest_id']=$contract->id;
              $data['level']=0;
              $data['ttime'] = date("Y-m-d");
              $data['user_id_fk'] = $user->username;
              $data['user_id']=$user->id;
             $income = Income::create($data);

              add_level_income($user_id,$contract->profit);

              $data = array(
                'status' => true,
              );
              $jsonData = json_encode($data);
                header('Content-Type: application/json');
                echo  $jsonData;
          }
  
      
      }

      


      public function tradeOn()
{
    $user = Auth::user();
    date_default_timezone_set("Asia/Kolkata");
    $pendingTrade = \DB::table('contract')->where('user_id', $user->id)->where('c_status', 1)->first();
    if ($pendingTrade) {
        return redirect()->route('user.quality', 'trade');
    }

     // Fetch team levels
    $my_level_team = $this->my_level_team_count($user->id);
    $levels = [1, 2, 3];
    $gen_teams = [];
    foreach ($levels as $level) {
        $ids = $my_level_team[$level] ?? [];
        $gen_teams[$level] = User::whereIn('id', $ids)->orderBy('id', 'DESC')->get();
    }
    $gen_team1Active = $gen_teams[1]->where('active_status', 'Active')->count();
    $gen_team2Active = $gen_teams[2]->where('active_status', 'Active')->count();
    $gen_team3Active = $gen_teams[3]->where('active_status', 'Active')->count();
    $totalTeam = $gen_team2Active + $gen_team3Active;


    $userDirect = User::where('sponsor', $user->id)->where('active_status', 'Active')->where('package', '>=', 50)->count();
    $balance = round($user->available_balance()+$user->principleBalance(), 2);
    $investm = Investment::where('user_id', $user->id)->sum('amount');
    if ($balance < 50) {
        $notify[] = ['error', 'insufficient funds'];
        return redirect()->back()->withNotify($notify);
    }

    $todaysRoi = \DB::table('contract')->where('user_id', $user->id)->where('ttime', date('Y-m-d'))->count();

    // Quantifiable ROI conditions
    $quantifiable_count = 0;
    if ($balance >= 8000) {
    $quantifiable_count = 6;
} elseif ($balance >= 5000) {
    $quantifiable_count = 5;
} elseif ($balance >= 2000) {
    $quantifiable_count = 4;
} elseif ($balance >= 500) {
    $quantifiable_count = 3;
} elseif ($balance >= 50) {
    $quantifiable_count = 2;
}
    if ($todaysRoi >= $quantifiable_count) {
        return redirect()->route('user.quality', 'notrade');
    }

    // Deduct today's ROI sum from balance
    $todaysRoiSum = \DB::table('contract')->where('user_id', $user->id)->where('ttime', date('Y-m-d'))->sum('profit') ?? 0;
    $balance2 = $balance - $todaysRoiSum;
    $forthhalf = $balance2 / $quantifiable_count;
    $minQuan = $quantifiable_count - ($todaysRoi + 1);
    $updateBalance = $forthhalf * $minQuan;

    \DB::table('users')->where('id', $user->id)->update(['tradeAmt' => $updateBalance]);

    // Continue with trade if quantifiable_count == 3 or 4 or 6
    $trade_index_data = \DB::table('variables')->where('v_id', 11)->first();
    $trade_index = $trade_index_data->trade_index;
    if ($trade_index < 0) exit();
    if ($trade_index == 15) {
        \DB::table('variables')->where('v_id', 11)->update(['trade_index' => 0]);
        $trade_index = 0;
    }

    $factor_arr = [435, 193, 146, 193, 435, 146, 193, 146, 435, 435, 146, 193, 193, 146, 435];
    $tcoins_arr = coinrates();

    $factor = $factor_arr[$trade_index];
    $trade_index++;
    \DB::table('variables')->where('v_id', 11)->update(['trade_index' => $trade_index]);

    $todays = date("Y-m-d");
    $day = date("l");
    $userID = $user->id;
    $u_str = round($user->available_balance()+$user->principleBalance(), 3);

    $idx = 1;
    if ($u_str >= 50) $idx = 1;
    if ($u_str >= 500) $idx = 2;
    if ($u_str >= 2000) $idx = 5;
    if ($u_str >= 5000) $idx = 6;
    if ($u_str >= 8000) $idx = 7;

    $zero_arr = ["eth", "doge", "btc", "btc", "bnb", "btc", "eth", "eth", "btc", "btc", "bnb", "btc", "eth", "btc", "eth", "car"];
    $v_index = $trade_index_data->v_index;
    $trade = isEven($v_index) ? "Sell" : "Buy";

    $new_index = ($v_index == 15) ? 0 : $v_index + 1;
    \DB::table('variables')->where('v_id', 11)->update(['v_index' => $new_index]);

    $sym = $zero_arr[$v_index];
    $bots = \DB::table('machines')->where('m_id', $idx)->first();
    if (!$bots) return redirect()->route('user.quality', 'notrade');

    $bot_name = $bots->m_name;
    $percent = number_format($bots->m_return / $factor, 5, '.', '');
    $usd = ($u_str * 0.7);
    $buy_price_btc = number_format($tcoins_arr[$sym], 5, '.', '');
    $sell_price_btc = number_format($tcoins_arr[$sym] + ($tcoins_arr[$sym] * $percent / 100), 5, '.', '');
    $buy_price_usd = $usd / $buy_price_btc;
    $trade_profit = $usd * $percent;

    // Cap today's profit at max ROI on last trade
    if ($todaysRoi == ($quantifiable_count - 1)) {
        $u_str_2 = $u_str - $todaysRoiSum;
        $maxRoi = $u_str_2 * $bots->m_return / 100;
        $total_profit_b = $todaysRoiSum + $trade_profit;
        $n_m_t = $maxRoi - $total_profit_b;
        if ($trade_profit >= $n_m_t || $trade_profit <= $n_m_t) {
            $trade_profit += $n_m_t;
        }

        \DB::table('users')->where('id', $userID)->update(['last_trade' => now()]);
    }

    $currentDateTime = now();
    $baseInsert = [
        'user_id' => $userID,
        'trade' => $trade,
        'c_bot' => $bot_name,
        'qty' => $buy_price_usd,
        'profit' => $trade_profit,
        'c_name' => $sym,
        'c_status' => 1,
        'c_ref' => $u_str,
        'created_at' => $currentDateTime,
        'ttime' => $currentDateTime,
    ];

    if ($trade === "Buy") {
        $sell_price_btc = number_format($tcoins_arr[$sym], 5, '.', '');
        $buy_price_btc = number_format($tcoins_arr[$sym] - ($tcoins_arr[$sym] * $percent / 100), 5, '.', '');
        $baseInsert['c_buy'] = $buy_price_btc;
        $baseInsert['c_sell'] = $sell_price_btc;
    } else {
        $baseInsert['c_buy'] = $sell_price_btc;
        $baseInsert['c_sell'] = $buy_price_btc;
    }

    \DB::table('contract')->insert($baseInsert);

    return redirect()->route('user.quality', 'trade');
}

      





 
    public function checkPaymentStatus(Request $request)
    {
     date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

        $validation =  Validator::make($request->all(), [
            'orderId' => 'required',
        ]);

        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
    
            return redirect()->route('user.dashboard')->withErrors($validation->getMessageBag()->first())->withInput();
        }

         $user = Auth::user();
          $orderId=$request->orderId;
         $checkStatus= \DB::table('investments')->where('user_id',$user->id)->where('orderId',$orderId)->where('status','Active')->first();
        
        if($checkStatus)
        {
            return 1;
        }
        else
        {
            return 0;   
        }
    
    }



 
    public function lastWithdrawal(Request $request)
    {
     date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

        $validation =  Validator::make($request->all(), [
            'withdrawalId' => 'required',
        ]);

        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
    
            return redirect()->route('user.dashboard')->withErrors($validation->getMessageBag()->first())->withInput();
        }

         $user = Auth::user();
          $orderId=$request->withdrawalId;
         $checkStatus= \DB::table('withdraws')->where('id',$orderId)->first();
        $output='';
        if($checkStatus)
        {
            
            
           $output.='
           
             <p>'.$checkStatus->amount.' '.$checkStatus->payment_mode.' has been sent to your wallet. The operation is awaiting for confirmation by network. It may take up to 15-60 minutes to complete the confirmation process.</p>
      
            
            
              
              <a data-v-06f511d8="" href="'.route('user.Withdraw-History').'" class="result__txLink btnText _primary " ><!----> <div class="_0ccc93a to-transaction">
              To transaction
            </div></a>
            <br>
                <div data-v-1a73b4ab="" data-v-06f511d8="" class="review"><img data-v-1a73b4ab="" src="'.asset('assets/img/FOjCTYls1596032002.svg').'" alt="TrustPilot" height="32" class="review__img"> <h4 data-v-1a73b4ab="" class="review__title">
                Rate your experience!
              </h4> <div data-v-1a73b4ab="" class="review__hint">
                Leave your review about Etriton Ai on TrustPilot
              </div> <a data-v-1a73b4ab="" style="font-size: 17px;
            text-decoration: none;" href="https://uk.trustpilot.com/review/etriton.co" target="_blank" rel="noopener" class="review__link btnText _primary"> <div data-v-1a73b4ab="" class="btnText__label" style="margin-top: 13px;
            color: #5a83ed;
            font-weight: 600;">
                 <i class="fa fa-share-alt"></i>   Rate now
                </div></a></div>
            
           ';
           
           return $output;
           
        }
        else
        {
            return 1;   
        }
    
    }



    public  function my_binary($userid){
        $arrin=array($userid);
        $ret=array();
        // print_r($arrin);die();
        while(!empty($arrin)){
         $alldown= User::select('id')->whereIn('Parentid',$arrin)->get()->toArray();
         if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[]=$arrin;
              
              
            }else{
                $arrin = array();
            } 
        }
        // continue;    
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }

        return $final;
        
    }  


     public  function team_by_position($userid,$position){
        $ret=array();
        $get_position_user=User::where('Parentid',$userid)->where('position',$position)->first();
        if($get_position_user){
        
            $ret=$this->my_binary($get_position_user->id);
            $ret[]=$get_position_user->id;
        }
       
        return $ret;
    }



    public function activities()
    {
        $user=Auth::user();
        // $transaction_data = Activitie::where('user_id',$user->id)->orderBy('id', 'desc')->get();
        // $this->data['activities'] = $transaction_data;
        $userDirect = User::where('sponsor',$user->id)->where('active_status','Active')->where('package','>=',50)->count();

        $this->data['userDirect'] = $userDirect;
        $this->data['page'] = 'user.activities';
        return $this->dashboard_layout();
    
    }
    
    
    public function notifications()
    {
        $user=Auth::user();
        // $transaction_data = Activitie::where('user_id',$user->id)->orderBy('id', 'desc')->get();
        // $this->data['activities'] = $transaction_data;
        \DB::table('notifications')
    ->where('user_id', auth()->id())
    ->where('read_status', 0)
    ->update(['read_status' => 1]);
    
        $notifications = \DB::table('notifications')->where('user_id',$user->id)->get();

        $this->data['notifications'] = $notifications;
        $this->data['page'] = 'user.notifications';
        return $this->dashboard_layout();
    
    }
    
    
    
  public function lang()
    {
        $user=Auth::user();
  
        $this->data['page'] = 'user.lang';
        return $this->dashboard_layout();
    
    }
 public function news()
    {
        $user=Auth::user();
  
        $this->data['page'] = 'user.news';
        return $this->dashboard_layout();
    
    }

    public function my_level_team_count($userid,$level=3){
        $arrin=array($userid);
        $ret=array();
        $i=1;
        while(!empty($arrin)){
            $alldown=User::select('id')->whereIn('sponsor',$arrin)->get()->toArray();
            if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[$i]=$arrin;
                $i++;

            }else{
                $arrin = array();
            }
        }

        // $final = array();
        // if(!empty($ret)){
        //     array_walk_recursive($ret, function($item, $key) use (&$final){
        //         $final[] = $item;
        //     });
        // }


        return $ret;

    }

    public function my_direct_business_count($userid){

        $totalBusiness=0;
        $alldown=User::select('id')->where('sponsor',$userid)->get()->toArray();
        if(!empty($alldown)){
            $arrin = array_column($alldown,'id');

         $totalBusiness=Investment::whereIn('user_id',$arrin)->where('status','Active')->sum("amount");
        }
    return $totalBusiness;

    }




    public function submitActivity(Request $request)
    {
        try{
            $validation =  Validator::make($request->all(), [
                'url' => 'required',
               

            ]);
            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            $user=Auth::user();
        

            $user_detail=Activitie::where('user_id',$user->id)->where('status','Pending')->first();
            if (!$user_detail) 
            {
                $data = [
                    'user_id' => $user->id,
                    'url' => $request->url,
                    'ttime' => Date("Y-m-d"),
                
                ];
                 
               $income = Activitie::firstOrCreate(['ttime'=>date("Y-m-d"),'user_id'=>$user->id],$data);
               $notify[] = ['success', 'Request Submitted successfully'];
               return redirect()->back()->withNotify($notify);     


            }
            else{
                return Redirect::back()->withErrors(array('activities pending'));
            }
    


        $notify[] = ['success', 'Profile Updated successfully'];
        return redirect()->back()->withNotify($notify);

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
          dd($e->getMessage());
            return back()->withErrors('error', $e->getMessage())->withInput();
        }
    }




}
