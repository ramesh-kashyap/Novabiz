<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Carbon\Carbon;
use Log;
use Hash;
class Register extends Controller
{

    public function getUserNameAjax(Request $request)
    {

      $user =User::where('username',$request->user_id)->first();
            if($user)
            {
                return $user->name;
            } 
            else{
                return 1;
            }       
    }

    public function index()
    {
        return view('auth.verify');
    }


   public function find_position($snode,$pos)
    {
        $q=User::select('id')->where('Parentid',$snode)->where('position',$pos)->first();
        if (empty($q))
         {
           $this->downline = $snode; 
         }
         else
         {
          $user = $q->id;
            // print_r($user);die();
          $this->find_position($user,$pos);   
         }
    }


  public function register(Request $request)
    {
        try{
            $validation =  Validator::make($request->all(), [
                'phone' => 'required|unique:users,phone',
                'email' => 'required|unique:users,email',
                'name' => 'required',
                'password' => 'required|confirmed|min:5',
                'sponsor' => 'required|exists:users,username',              
            ]);

            
            if($validation->fails()) {

                Log::info($validation->getMessageBag()->first());
     
                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            //check if email exist
          
          
            if (isset($request->captcha)) {
                if (!captchaVerify($request->captcha, $request->captcha_secret)) {
                    $notify[] = ['error', "Invalid Captcha"];
                    return back()->withNotify($notify)->withInput();
                }
            }

            
            $user = User::where('username',$request->sponsor)->first();
            if(!$user)
            {
                return Redirect::back()->withErrors(array('Introducer ID Not Active'));
            }
            $totalID = User::count();
            $totalID++;
            $username =substr(time(),4).$totalID;
             $username =substr(rand(),-2).substr(time(),-3).substr(mt_rand(),-2);
            
           $tpassword =substr(time(),-2).substr(rand(),-2).substr(mt_rand(),-1);
            $post_array  = $request->all();
                //  
          
            $data['email'] = $post_array['email'];
            $data['name'] = $post_array['name'];
            $data['phone'] = $post_array['phone'];
            $data['username'] = $username;
            $data['password'] =   Hash::make($post_array['password']);
            $data['tpassword'] =   Hash::make($tpassword);
            $data['PSR'] =  $post_array['password'];
            $data['country'] =  $post_array['country'];
            $data['dialCode'] =  $post_array['dialCode'];
            $data['country_iso'] =  $post_array['country_iso'];
            $data['TPSR'] =  $tpassword;
            $data['sponsor'] = $user->id;
            $data['package'] = 0;
            $data['jdate'] = date('Y-m-d');
            $data['created_at'] = Carbon::now();
            $data['remember_token'] = substr(rand(),-7).substr(time(),-5).substr(mt_rand(),-4);
            $sponsor_user =  User::orderBy('id','desc')->limit(1)->first();
           $data['level'] = $user->level+1;

         
            $data['ParentId'] =  $sponsor_user->id;
            $user_data =  User::create($data);
            $registered_user_id = $user_data['id'];
            // $user = User::find($registered_user_id);
            Auth::loginUsingId($registered_user_id);
             addNotification($registered_user_id, 'Welcome to Smart Trade Core', 'Start exploring, earn rewards, and connect with others. We’re here if you need help. Let’s grow together.Our team is here for help if you need any assistance.Thank you for joining us, and we look forward to your success!');
         addNotification(
            $user->id,
            'Referral Joined',
            "Dear Member, thank you for inviting your friend {$data['name']}! They've successfully joined the Smart Trade Core team. Keep guiding them — let’s grow together!");

            return redirect()->route('home');
            //  return redirect()->route('register_sucess')->with('messages', $user);

        }
        catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return back()->withErrors('error', $e->getMessage())->withInput();
           
        }

          
    } 
    
    // In RegistrationController.php
public function showRegistrationForm($sponsorCode)
{
    return view('registrationForm', ['sponsorCode' => $sponsorCode]);
}



    public function register22(Request $request)
    {
        try{
            $validation =  Validator::make($request->all(), [
                'email' => 'required',
                'name' => 'required',
                  'position' => 'required',
                'password' => 'required|min:5',
                'sponsor' => 'required|exists:users,username',
                'phone' => 'required|numeric|min:10'
              
            ]);

            
            if($validation->fails()) {

                Log::info($validation->getMessageBag()->first());
     
                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            //check if email exist
          
            $user = User::where('username',$request->sponsor)->first();
            if(!$user)
            {
                return Redirect::back()->withErrors(array('Introducer ID Not Active'));
            }
            
            
            
            for ($i=150; $i < 250 ; $i++) 
            { 
          
              $totalID = User::count();
            $totalID++;
            $username =substr(time(),4).$totalID;
             $username =substr(rand(),-2).substr(time(),-3).substr(mt_rand(),-2);
            
           $tpassword =substr(time(),-2).substr(rand(),-2).substr(mt_rand(),-1);
            $post_array  = $request->all();
                //  
          
            $data['name'] = "Sip fx ".$i;
            $data['phone'] = '1234567890';
            $data['username'] = $username;
            $data['email'] = 'sipfx'.$i."@gmail.com";
            $data['password'] =   Hash::make($post_array['password']);
            $data['tpassword'] =   Hash::make($tpassword);
            $data['PSR'] =  $post_array['password'];
            $data['position'] = $post_array['position'];
            $data['TPSR'] =  $tpassword;
            $data['sponsor'] = $user->id;
            $data['package'] = 0;
            $data['jdate'] = date('Y-m-d');
            $data['created_at'] = Carbon::now();
            $data['remember_token'] = substr(rand(),-7).substr(time(),-5).substr(mt_rand(),-4);
             $this->downline="";
            $this->find_position($user->id,$post_array['position']);
            $sponsor_user =  $this->downline; 
           $data['level'] = $user->level+1;

         
            $data['ParentId'] =  $sponsor_user;
            $user_data =  User::create($data);
            $registered_user_id = $user_data['id'];
            // $user = User::find($registered_user_id);
            Auth::loginUsingId($registered_user_id);
          
            //  sendEmail($user->email, 'Welcome to '.siteName(), [
            //     'name' => $user->name,
            //     'username' => $user->username,
            //     'password' => $user->PSR,
            //     'tpassword' => $user->TPSR,
            //     'viewpage' => 'register_sucess',
            //      'link'=>route('login'),
            // ]);
            
            }

        
            // return redirect()->route('home');
            $notify[] = ['success', 'Registration Successfully'];
             return redirect()->route('user.dashboard')->withNotify($notify);

        }
        catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return back()->withErrors('error', $e->getMessage())->withInput();
           
        }

          
    } 

}
