<?php
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\Income;
use App\Models\Extension;
use App\Models\Investment;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;
use Carbon\Carbon; 
$downline="";

function siteName()
{
    $general = GeneralSetting::first();
    return $general->sitename;
}

function currency()
{
    $general = GeneralSetting::first();
    return $general->cur_sym;
}

function generalDetail()
{
    $general = GeneralSetting::first();
    return $general;
}

function changeDateToUTC($date)
{
     $time = Carbon::parse($date)->setTimezone('UTC')->toDateTimeString();
    return $time;
}

function paginationLimit()
{
    $general = GeneralSetting::first();
    return $general->PaginationLimit;
}


function sendEmail($user, $type = null, $shortCodes = [])
{
  $mail_data=array('subject'=>$type,'MailDetail'=>$shortCodes);
  \Mail::to($user)->send(new Sendmail($mail_data));
}


function isEven($number)
{
  return $number % 2 === 0;
}


if (!function_exists('addNotification')) {
    function addNotification($user_id, $title, $message)
    {
        DB::table('notifications')->insert([
            'user_id'     => $user_id,
            'title'       => $title,
            'message'     => $message,
            'read_status' => 0,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}


 function levelTeam($userid,$level=3){
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



if (!function_exists('getVip')) {
    function getVip($user_id)
    {
       
         // Fetch team levels
    $my_level_team =levelTeam($user_id);
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
    
    
        
     $investMent = Investment::where('user_id',$user_id)->where('status','Active')->sum('amount');
     
      $withdraw2 = \DB::table('withdraws')->where('user_id',$user_id)->where('status','!=','Failed')->where('walletType',2)->sum('amount');
      
      $balance1= $investMent-$withdraw2;
    
     $income = Income::where('user_id',$user_id)->where('remarks','!=','Quantify Income')->where('credit_type',0)->sum('comm');
  
     
    $tradingIncome = \DB::table('contract')->where('user_id',$user_id)->where('c_status','-1')->sum('profit');
     $withdraw = \DB::table('withdraws')->where('user_id',$user_id)->where('status','!=','Failed')->where('walletType',1)->sum('amount');
     
     $balance = ($income+$tradingIncome)-$withdraw;
     
     $u_str = $balance+$balance1;
     
    
    
     $vip = 1;
    if ($u_str >= 50) $vip = 1;
    if ($u_str >= 500 && $gen_team1Active >= 3 && $totalTeam >= 5) $vip = 2;
    if ($u_str >= 2000 && $gen_team1Active >= 6 && $totalTeam >= 12) $vip = 3;
    if ($u_str >= 5000 && $gen_team1Active >= 12 && $totalTeam >= 30) $vip = 4;
    if ($u_str >= 8000 && $gen_team1Active >= 25 && $totalTeam >= 60) $vip = 5;
    return $vip;
    
    }
}


function coinrates2() 
{
  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.coincap.io/v2/assets?ids=bitcoin,ethereum,tron,tether,binance-coin,dogecoin,solana,xrp,cardano");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
if ($result === false) {
  \Log::error("CURL Error: " . curl_error($ch));
  curl_close($ch);
  return redirect()->route('user.quality')->with('error', 'CoinCap API has been deprecated. Please update your settings.');
}
$result = json_decode($result, true);
 // Check if the response contains valid data
 if (isset($result['data']['message']) && str_contains($result['data']['message'], 'deprecating')) {
  \Log::error("CoinCap API Deprecated: " . $result['data']['message']);
  return redirect()->route('user.quality','notrade');

}

$btc = $result["data"][0]["priceUsd"];
$eth = $result["data"][1]["priceUsd"];
$usdt = $result["data"][2]["priceUsd"];
$bnb = $result["data"][3]["priceUsd"];
$doge = $result["data"][7]["priceUsd"];
$trx = $result["data"][8]["priceUsd"];
$sol = $result["data"][5]["priceUsd"];
$xrp = $result["data"][4]["priceUsd"];
$car = $result["data"][6]["priceUsd"];

$tcoins_arr = array("eth" => $eth, "btc" => $btc, "bnb" => $bnb, "usdt" => $usdt, "trx" => $trx,"doge" => $doge, "trx" => $trx, "sol" => $sol, "xrp" => $xrp, "car" => $car);
return $tcoins_arr;
curl_close($ch);
}



function coinrates()
{
    // Use Laravel Cache (for 60 seconds)
    $cached = cache()->get('coin_rates');
    if ($cached) {
        return $cached;
    }

    $url = "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,tether,binancecoin,cardano,solana,dogecoin,xrp,tron&vs_currencies=usd";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    curl_close($ch);

    if (!$response) {
        return ["error" => "Coin API request failed"];
    }

    $result = json_decode($response, true);
    if (!is_array($result)) {
        return ["error" => "Invalid Coin API response"];
    }

    $prices = [
        "eth" => $result["ethereum"]["usd"] ?? "0",
        "btc" => $result["bitcoin"]["usd"] ?? "0",
        "bnb" => $result["binancecoin"]["usd"] ?? "0",
        "usdt" => $result["tether"]["usd"] ?? "0",
        "trx" => $result["tron"]["usd"] ?? "0",
        "doge" => $result["dogecoin"]["usd"] ?? "0",
        "sol" => $result["solana"]["usd"] ?? "0",
        "xrp" => $result["xrp"]["usd"] ?? "0",
        "car" => $result["cardano"]["usd"] ?? "0"
    ];

    // Cache for 60 seconds
    cache()->put('coin_rates', $prices, 60);

    return $prices;
}

function captchaVerify($code, $secret)
{
    $captcha = Extension::where('act', 'custom-captcha')->where('status', 1)->first();
    $wwww = json_decode($captcha->shortcode);
    $captchaSecret = hash_hmac('sha256', $code, $wwww->random_key->value);
    if ($captchaSecret == $secret) {
        return true;
    }
    return false;
}

function reCaptcha()
{
    $reCaptcha = Extension::where('act', 'google-recaptcha2')->where('status', 1)->first();
    return $reCaptcha ? $reCaptcha->generateScript() : '';
}


  function getCustomCaptcha($height = 46, $width = '300px', $bgcolor = '#003', $textcolor = '#03f356')
{
    $textcolor = '#'.GeneralSetting::first()->base_color;
    $captcha = Extension::where('act', 'custom-captcha')->where('status', 1)->first();
 
    if($captcha){
        $code = rand(100000, 999999);
        $char = str_split($code);
        $ret = '<link href="https://fonts.googleapis.com/css?family=Henny+Penny&display=swap" rel="stylesheet">';
        $ret .= '<div style="height: ' . $height . 'px; line-height: ' . $height . 'px; width:' . $width . '; text-align: center; background-color: ' . $bgcolor . '; color:#03f356; font-size: ' . ($height - 20) . 'px; font-weight: bold; letter-spacing: 20px; font-family: \'Henny Penny\', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;">';
        foreach ($char as $value) {
            $ret .= '<span style="    float:left;     -webkit-transform: rotate(' . rand(-60, 60) . 'deg);">' . $value . '</span>';
        }
        $ret .= '</div>';
        $wwww = json_decode($captcha->shortcode);
        
        $captchaSecret = hash_hmac('sha256', $code, $wwww->random_key->value);
        $ret .= '<input type="hidden" name="captcha_secret" value="' . $captchaSecret . '">';
        return $ret;
    }else{
        return false;
    }
}



//moveable
function getIpInfo()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }


    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');


    return $data;
}

function osBrowser(){
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;

    return $data;
}


function verificationCode($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}






function add_direct_income_old($id,$amt)
{
  //$user_id =$this->session->userdata('user_id_session')
$data = User::where('id',$id)->orderBy('id','desc')->first();
$user_id = $data->username;
$fullname=$data->name;

$rname = $data->username;
$user_mid = $data->id;


      $cnt = 1;

      $amount = $amt/100;


        while ($user_mid!="" && $user_mid!="1"){

              $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
              $sponsor=$Sposnor_id->sponsor;
              if (!empty($sponsor))
               {
                $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
                $sp_status=$Sposnor_status->active_status;
              }
              else
              {
                $Sposnor_status =array();
                $sp_status="Pending";
                $Sposnor_cnt=0;
              }

              $pp=0;
               if($sp_status=="Active")
               {
                 if($cnt==1)
                  {
                    $pp= $amount*7;

                  } if($cnt==2)
                  {
                    $pp= $amount*2;

                  } if($cnt==3)
                  {
                    $pp= $amount*1;

                  }  

                }
                else
                {
                  $pp=0;
                }


        //       $max_income=$total_get;
        //      $n_m_t = $max_income - $total_profit;
        //   // dd($total_received);
        //      if($pp >= $n_m_t)
        //      {
        //          $pp = $n_m_t;
        //      }  


              $user_mid = @$Sposnor_status->id;
              $spid = @$Sposnor_status->id;
              $idate = date("Y-m-d");

              $user_id_fk=$sponsor;
              if($spid>0 && $cnt<=3){
                if($pp>0){

                 $data = [
                'user_id' => $user_mid,
                'user_id_fk' =>$Sposnor_status->username,
                'amt' => $amt,
                'comm' => $pp,
                'remarks' =>'Direct Commission',
                'level' => $cnt,
                'rname' => $rname,
                'fullname' => $fullname,
                'ttime' => Date("Y-m-d"),

            ];
             $user_data =  Income::create($data);


        }
       }

        $cnt++;
}

return true;
}



 function add_level_income($id,$amt)
        {
          //$user_id =$this->session->userdata('user_id_session')
      $data = User::where('id',$id)->orderBy('id','desc')->first();
        $user_id = $data->username;
        $fullname=$data->name;
        $rname = $data->username;
        $user_mid = $data->id;
              $cnt = 1;
              $amount = $amt/100;
                while ($user_mid!="" && $user_mid!="1"){

                      $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
                      $sponsor=$Sposnor_id->sponsor;
                      if (!empty($sponsor))
                       {
                        $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                        $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
                        $sp_status=$Sposnor_status->active_status;
                        $rank=$Sposnor_status->rank;
                        $lastPackage = \DB::table('investments')->where('user_id',$Sposnor_status->id)->where('status','Active')->orderBy('id','DESC')->limit(1)->first();
                        $plan = ($lastPackage)?$lastPackage->plan:0;
                        $vip = getVip(user_id: $Sposnor_status->id);
                      }
                      else
                      {
                        $Sposnor_status =array();
                        $sp_status="Pending";
                        $Sposnor_cnt=0;
                        $rank=0;
                        $vip=0;
                      }

                      $pp=0;
                       if($sp_status=="Active" && $Sposnor_cnt>=1)
                       {
                         if($cnt==1)
                          {
                            $pp= $amount*20;

                          } if($cnt==2)
                          {
                            $pp= $amount*15;

                          } if($cnt==3)
                          {
                            $pp= $amount*10;

                          }  if($cnt==4)
                          {
                            $pp = $amount * 5;

                          }  if($cnt==5)
                          {
                            $pp = $amount *1;

                          } 
                        }
                        else
                        {
                          $pp=0;
                        }



                      $user_mid = @$Sposnor_status->id;
                      $spid = @$Sposnor_status->id;
                      $idate = date("Y-m-d");

                      $user_id_fk=$sponsor;
                      if($spid>0 && $cnt<=5){
                        if($pp>0){

                         $data = [
                        'user_id' => $user_mid,
                        'user_id_fk' =>$Sposnor_status->username,
                        'amt' => $amt,
                        'comm' => $pp,
                        'remarks' =>'Quantify Level Income',
                        'level' => $cnt,
                        'rname' => $rname,
                        'fullname' => $fullname,
                        'ttime' => Date("Y-m-d"),

                    ];
                     $user_data =  Income::create($data);
                }
               }

                $cnt++;
     }

     return true;
  }

// function add_level_income($id, $amt)
// {
//     $data = User::where('id', $id)->first();
//     $user_id = $data->username;
//     $fullname = $data->name;
//     $rname = $data->username;
//     $user_mid = $data->id;

//     $cnt = 1;
//     $amount = $amt / 100;

//     while ($user_mid != "" && $user_mid != "1") {
//         $Sposnor_id = User::where('id', $user_mid)->first();
//         $sponsor = $Sposnor_id->sponsor;

//         if (!empty($sponsor)) {
//             $Sposnor_status = User::where('id', $sponsor)->first();
//             $sp_status = $Sposnor_status->active_status;

//             // Get direct active users
//             $direct_active = User::where('sponsor', $sponsor)->where('active_status', 'Active')->pluck('id')->toArray();
//             $userDirect = count($direct_active);

//             // Get team up to 3 levels
//             $team = [];
//             $levelUsers = [$sponsor];
//             for ($level = 1; $level <= 3; $level++) {
//                 if (empty($levelUsers)) break;
//                 $nextLevel = User::whereIn('sponsor', $levelUsers)
//                     ->where('active_status', 'Active')
//                     ->pluck('id')
//                     ->toArray();
//                 $team = array_merge($team, $nextLevel);
//                 $levelUsers = $nextLevel;
//             }
//             $teamCount = count($team);
//         } else {
//             $Sposnor_status = null;
//             $sp_status = "Pending";
//             $userDirect = 0;
//             $teamCount = 0;
//         }

//         $pp = 0;

//         if ($sp_status == "Active") {
//             $allowIncome = false;

//             if ($cnt == 1) {
//                 $pp = $amount * 8;
//                 $allowIncome = true;
//             } elseif ($cnt == 2 && $userDirect >= 3 && $teamCount >= 5) {
//                 $pp = $amount * 6;
//                 $allowIncome = true;
//             } elseif ($cnt == 3 && $userDirect >= 6 && $teamCount >= 12) {
//                 $pp = $amount * 4;
//                 $allowIncome = true;
//             } elseif ($cnt == 4 && $userDirect >= 12 && $teamCount >= 30) {
//                 $pp = $amount * 2;
//                 $allowIncome = true;
//             } elseif ($cnt == 5 && $userDirect >= 25 && $teamCount >= 60) {
//                 $pp = $amount * 1;
//                 $allowIncome = true;
//             }   

//             if ($allowIncome && $pp > 0 && $cnt <= 6) {
//                 Income::create([
//                     'user_id' => $Sposnor_status->id,
//                     'user_id_fk' => $Sposnor_status->username,
//                     'amt' => $amt,
//                     'comm' => $pp,
//                     'remarks' => 'Quantify Level Income',
//                     'level' => $cnt,
//                     'rname' => $rname,
//                     'fullname' => $fullname,
//                     'ttime' => date("Y-m-d"),
//                 ]);
//             }
//         }

//         $user_mid = $Sposnor_status ? $Sposnor_status->id : null;
//         $cnt++;
//     }

//     return true;
// }





function add_direct_income($id,$amt)
{
  //$user_id =$this->session->userdata('user_id_session');
$data = User::where('id',$id)->orderBy('id','desc')->first();
$user_id = $data->username;
$fullname=$data->name;
$rname = $data->username;
$user_mid = $data->id;

      $cnt = 1;
        $amount = $amt/100;

              $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
              $sponsor=$Sposnor_id->sponsor;
              if (!empty($sponsor))
               {
                $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
              $sp_status=$Sposnor_status->active_status;
              $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
              }
              else
              {
                $Sposnor_status =array();
                $sp_status="Pending";
                $Sposnor_cnt =0;
              }
             $percent = 10;

             if($sp_status=="Active")
               {

                $pp = $amount*$percent;

              }else
              {
                $pp=0;
              }

              $user_mid = @$Sposnor_status->id;
              //echo $user_id;
              //die;
              $idate = date("Y-m-d");

              $spid = @$Sposnor_status->id;


              $user_id_fk=$sponsor;
              //print_r($user_id_fk);die;
             // echo $cnt." ".$spid." ".$pp."<br>";
              if($spid>0 && $pp>0){
                 $data = [
                'user_id' => $user_mid,
                'user_id_fk' =>$Sposnor_status->username,
                'amt' => $amt,
                'comm' => $pp,
                'remarks' => 'Direct Commission',
                'level' => $cnt,
                'rname' => $rname,
                'fullname' => $fullname,
                'ttime' => Carbon::now(),
                'created_at' => Carbon::now(),

            ];
            $user_data =  Income::Create($data);

       }


return true;
}


function add_direct_income2($id,$amt)
{

  //$user_id =$this->session->userdata('user_id_session')
$data = User::where('id',$id)->orderBy('id','desc')->first();

$user_id = $data->username;
$fullname=$data->name;

$rname = $data->username;
$user_mid = $data->id;


      $cnt = 1;

        $amount = $amt/100;

              $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
              $sponsor=$Sposnor_id->sponsor;
              if (!empty($sponsor))
               {
                $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                $sp_status=$Sposnor_status->active_status;
                $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
                $lastPackage = \DB::table('investments')->where('user_id',$Sposnor_status->id)->where('status','Active')->sum("amount");
                $total_profit = \DB::table('incomes')->where('user_id',$Sposnor_status->id)->sum("comm");
                $total_get = $lastPackage*200/100;
              }
              else
              {
                $Sposnor_status =array();
                $sp_status="Pending";
                $Sposnor_cnt =0;
                $total_profit =0;
                $total_get =0;
              }
             $percent = 10;

             if($sp_status=="Active")
               {

                $pp = $amount*$percent;

              }else
              {
                $pp=0;
              }

              $user_mid = @$Sposnor_status->id;
              //echo $user_id;
             //die;
              $idate = date("Y-m-d");

              $spid = @$Sposnor_status->id;
        
                 $max_income=$total_get;
             $n_m_t = $max_income - $total_profit;
           // dd($total_received);
             if($pp >= $n_m_t)
             {
                 $pp = $n_m_t;
             }  
             

              $user_id_fk=$sponsor;
              //print_r($user_id_fk);die;
             // echo $cnt." ".$spid." ".$pp."<br>";
              if($spid>0 && $pp>0){
                 $data = [
                'user_id' => $user_mid,
                'user_id_fk' =>$Sposnor_status->username,
                'amt' => $amt,
                'comm' => $pp,
                'remarks' => 'Direct Income',
                'level' => $cnt,
                'rname' => $rname,
                'fullname' => $fullname,
                'ttime' => Date("Y-m-d"),

            ];
            $user_data =  Income::Create($data);


       }


return true;
}
function direct_income($id, $amt)
{


    $data = User::where('id', $id)->first();
    
    if (!$data) {
        return false;
    }

    $user_id = $data->username;
    $fullname = $data->name;
    $rname = $data->username;

    // Get the first sponsor directly
    $user_mid = $data->sponsor;
    
    // Commission percentages per level
    $commissionLevels = [
        1 => 7,  // 1st Level - 7%
        2 => 2,  // 2nd Level - 2%
        3 => 1   // 3rd Level - 1%
    ];

    // Start at level 1
    $cnt = 1;

         while (!empty($user_mid) && $cnt <= 3) {
      
        // Get sponsor details
        $sponsorData = User::where('id', $user_mid)->first();

        if (!$sponsorData) {
            break;
        }

        $sponsor = $sponsorData->sponsor;
        if (!empty($sponsor)) {
            $sponsorStatus = User::where('id', $sponsor)->first();
            $sp_status = $sponsorStatus->active_status ?? "Pending";
        } else {
            $sp_status = "Pending";
        }
    
        // Calculate the commission amount for the current level
        $percent = $commissionLevels[$cnt];
        $pp = ($amt * $percent) / 100;

        // Only give commission if the sponsor is active
        if ($sp_status == "Active" && $pp > 0) {
            $commissionData = [
                'user_id'    => $sponsorData->id,
                'user_id_fk' => $sponsorData->username,
                'amt'        => $amt,
                'comm'       => $pp,
                'remarks'    => 'Direct Commission',
                'level'      => $cnt,
                'rname'      => $rname,
                'fullname'   => $fullname,
                'ttime'      => date("Y-m-d"),
            ];

            Income::create($commissionData);
        }

        // Move to the next sponsor level
        $user_mid = $sponsor;
        $cnt++;
    }

    return true;
}


function first_deposit_bonus($user_id, $deposit_amount)
{
    // Fetch the user's first deposit status
    $user = User::where('id', $user_id)->first();

    if (!$user) {
        return false; // Return false if the user does not exist
    }

    // Bonus structure as per your requirement
    $bonusStructure = [
        [100, 499, 5],     
        [500, 999, 20],   
        [1000, 4999, 50],   
        [5000, 9999, 100], 
        [10000, PHP_INT_MAX, 200] 
    ];

    $bonus = 0;

    // Calculate the bonus based on the deposit amount
    foreach ($bonusStructure as $range) {
        if ($deposit_amount >= $range[0] && $deposit_amount < $range[1]) {
            $bonus = $range[2];
            break;
        }
    }

    // If no bonus is applicable, return false
    if ($bonus == 0) {
        return false;
    }

    // Prepare data for saving the bonus income
    $data = [
        'user_id' => $user_id,
        'user_id_fk' => $user->username,
        'amt' => $deposit_amount,
        'comm' => $bonus,
        'remarks' => 'First Deposit Bonus',
        'level' => 0,
        'rname' => 'System',
        'fullname' => 'Bonus',
        'ttime' => date("Y-m-d"),
    ];

    // Save the bonus income
    Income::create($data);

    return true;
}

function getQrCode($data, $amount, $paymentMode)
{
    $query = http_build_query([
        'address' => $data['address_in'],
        'value' => $amount,
        'size' => '512',
    ]);

    $url = "https://api.cryptapi.io/{$paymentMode}/qrcode/?{$query}";

    try {
        $response = Http::get($url);
        return $response->json();
    } catch (\Exception $e) {
        Log::error('Error fetching QR code: ' . $e->getMessage());
        return null;
    }
}




?>
