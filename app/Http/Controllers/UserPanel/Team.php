<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reentry;
use App\Models\Contract;
use App\Models\Income;
use App\Models\Withdraw;
use App\Models\Investment;
use Illuminate\Support\Facades\DB;
use Auth;
use Log;
use Session;
use Redirect;
use Hash;
use Validator;

class Team extends Controller
{


  

    public function index(Request $request)
    {
      $user=Auth::user();
      // print_r($user->username);die();
        $my_level_team=$this->my_level_team_count($user->id);


      // print_r($ids);die;
        $limit = $request->limit ? $request->limit : paginationLimit();
        $selected_level = $request->selected_level ? $request->selected_level :1;
            
        $search = $request->search ? $request->search : null;
        // $notes = User::where('sponsor',$user->username);
    $gen_team =  (array_key_exists($selected_level,$my_level_team) ? $my_level_team[$selected_level]:array());
       end($my_level_team);        
          $key = key($my_level_team);
          $max_lenght=$key;
          
    ($selected_level)?Session::put('selected_level',$selected_level):"";

            // $notes = User::where('sponsor',$user->username);
          $notes = User::where(function($query) use($gen_team)
              {
                if(!empty($gen_team)){
                  foreach ($gen_team as $key => $value) {
                  //   $f = explode(",", $value);
                  //   print_r($f)."<br>";
                    $query->orWhere('id', $value);
                  }
                }else{$query->where('id',null);}
              })->orderBy('id', 'DESC');
              
              
          
      
       if($search <> null && $request->reset!="Reset"){
            //   dd($request->reset);
        $notes = $notes->where(function($q) use($search){
          $q->orWhere('name', 'LIKE', '%' . $search . '%')
          ->orWhere('username', 'LIKE', '%' . $search . '%')
          ->orWhere('email', 'LIKE', '%' . $search . '%')
          ->orWhere('phone', 'LIKE', '%' . $search . '%')
          ->orWhere('jdate', 'LIKE', '%' . $search . '%')
          ->orWhere('active_status', 'LIKE', '%' . $search . '%');
        });

      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

        $this->data['direct_team'] =$notes;
        $this->data['search'] =$search;
       $this->data['max_lenght'] =$max_lenght;

    $this->data['page'] = 'user.team.direct-team';
    return $this->dashboard_layout();

    }

    public function LevelTeam(Request $request)
    {
      $user=Auth::user();
      // print_r($user->username);die();
      $ids=$this->my_level_team($user->id);
      $my_level_team=$this->my_level_team_count($user->id);
      $gen_team1 =  (array_key_exists(1,$my_level_team) ? $my_level_team[1]:array());
      $gen_team2 =  (array_key_exists(2,$my_level_team) ? $my_level_team[2]:array());
      $gen_team3 =  (array_key_exists(3,$my_level_team) ? $my_level_team[3]:array());
      $gen_team4 =  (array_key_exists(4,$my_level_team) ? $my_level_team[4]:array());
      $gen_team5 =  (array_key_exists(5,$my_level_team) ? $my_level_team[5]:array());
      $gen_team6 =  (array_key_exists(6,$my_level_team) ? $my_level_team[6]:array());

      $notes = User::where(function($query) use($ids)
              {
                if(!empty($ids)){
                  foreach ($ids as $key => $value) {
                  //   $f = explode(",", $value);
                  //   print_r($f)."<br>";
                    $query->orWhere('id', $value);
                  }
                }else{$query->where('id',null);}
              })->orderBy('id', 'DESC')->get();



              $teamwithdraw = Withdraw::where(function($query) use($ids)
              {
                if(!empty($ids)){
                  foreach ($ids as $key => $value) {
                  //   $f = explode(",", $value);
                  //   print_r($f)."<br>";
                    $query->orWhere('user_id', $value);
                  }
                }else{$query->where('user_id',null);}
              })->where('status','Approved')->orderBy('id', 'DESC')->get();

        
      $gen_team1 = User::where(function($query) use($gen_team1)
              {
                if(!empty($gen_team1)){
                  foreach ($gen_team1 as $key => $value) {
                  //   $f = explode(",", $value);
                  //   print_r($f)."<br>";
                    $query->orWhere('id', $value);
                  }
                }else{$query->where('id',null);}
              })->orderBy('id', 'DESC')->get();
              
        $gen_team2 = User::where(function($query) use($gen_team2)
              {
                if(!empty($gen_team2)){
                  foreach ($gen_team2 as $key => $value) {
                  //   $f = explode(",", $value);
                  //   print_r($f)."<br>";
                    $query->orWhere('id', $value);
                  }
                }else{$query->where('id',null);}
              })->orderBy('id', 'DESC')->get();

         $gen_team3 = User::where(function($query) use($gen_team3)
              {
                if(!empty($gen_team3)){
                  foreach ($gen_team3 as $key => $value) {
                  //   $f = explode(",", $value);
                  //   print_r($f)."<br>";
                    $query->orWhere('id', $value);
                  }
                }else{$query->where('id',null);}
              })->orderBy('id', 'DESC')->get();


              $gen_team4 = User::where(function($query) use($gen_team4)
              {
                if(!empty($gen_team4)){
                  foreach ($gen_team4 as $key => $value) {
                  //   $f = explode(",", $value);
                  //   print_r($f)."<br>";
                    $query->orWhere('id', $value);
                  }
                }else{$query->where('id',null);}
              })->orderBy('id', 'DESC')->get();


              $gen_team5 = User::where(function($query) use($gen_team5)
              {
                if(!empty($gen_team5)){
                  foreach ($gen_team5 as $key => $value) {
                  //   $f = explode(",", $value);
                  //   print_r($f)."<br>";
                    $query->orWhere('id', $value);
                  }
                }else{$query->where('id',null);}
              })->orderBy('id', 'DESC')->get();

              $gen_team6 = User::where(function($query) use($gen_team6)
              {
                if(!empty($gen_team6)){
                  foreach ($gen_team6 as $key => $value) {
                  //   $f = explode(",", $value);
                  //   print_r($f)."<br>";
                    $query->orWhere('id', $value);
                  }
                }else{$query->where('id',null);}
              })->orderBy('id', 'DESC')->get();


        $gen_team1UserName =$gen_team1->pluck('username');
        $gen_team2UserName =$gen_team2->pluck('username');
        $gen_team3UserName =$gen_team3->pluck('username');
        $gen_team4UserName =$gen_team4->pluck('username');
        $gen_team5UserName =$gen_team5->pluck('username');
        $gen_team6UserName =$gen_team6->pluck('username');

 
   $totalrecharge=Investment::whereIn('user_id',(!empty($ids)?$ids:array()))->where('status','Active')->sum("amount");
   $totalTourrecharge=Investment::whereIn('user_id',(!empty($ids)?$ids:array()))->where('sdate','>=','2025-05-15')->where('sdate','<=','2025-06-15')->where('status','Active')->sum("amount");
   $totalTourTeam=$notes->where('jdate','>=','2025-05-15')->where('jdate','<=','2025-06-15')->where('active_status','Active')->count();
   
   
     if($gen_team1->isNotEmpty())
     {
         $gen_teamIncome = Income::where(function($query) use($gen_team1UserName)
        {
          if(!empty($gen_team1UserName)){
            foreach ($gen_team1UserName as $key => $value) {
            //   $f = explode(",", $value);
            //   print_r($f)."<br>";
              $query->orWhere('rname', $value);
            }
          }else{$query->where('rname',null);}
        })->where('user_id',$user->id)->where('remarks','Quantify Level Income')->orderBy('id', 'DESC')->sum('comm'); 
     }
     else
     {
       $gen_teamIncome =0;  
     }
       
  if($gen_team2->isNotEmpty())
     {
        $gen_team2Income = Income::where(function($query) use($gen_team2UserName)
        {
            // dd($gen_team2UserName);
          if($gen_team2UserName){
            foreach ($gen_team2UserName as $key => $value) {
            //   $f = explode(",", $value);
            //   print_r($f)."<br>";
              $query->orWhere('rname', $value);
            }
          }else{$query->where('rname',null);}
        })->where('user_id',$user->id)->where('remarks','Quantify Level Income')->orderBy('id', 'DESC')->sum('comm');
  
     }
      else
     {
       $gen_team2Income =0;  
     }
     
    

     if($gen_team3->isNotEmpty())
     {
         
      $gen_team3Income = Income::where(function($query) use($gen_team3UserName)
        {
          if(!empty($gen_team3UserName)){
            foreach ($gen_team3UserName as $key => $value) {
            //   $f = explode(",", $value);
            //   print_r($f)."<br>";
              $query->orWhere('rname', $value);
            }
          }else{$query->where('rname',null);}
        })->where('user_id',$user->id)->where('remarks','Quantify Level Income')->orderBy('id', 'DESC')->sum('comm');
        
     }
      else
     {
       $gen_team3Income =0;  
     }

     if($gen_team4->isNotEmpty())
     {
         
      $gen_team4Income = Income::where(function($query) use($gen_team4UserName)
        {
          if(!empty($gen_team4UserName)){
            foreach ($gen_team4UserName as $key => $value) {
            //   $f = explode(",", $value);
            //   print_r($f)."<br>";
              $query->orWhere('rname', $value);
            }
          }else{$query->where('rname',null);}
        })->where('user_id',$user->id)->where('remarks','Quantify Level Income')->orderBy('id', 'DESC')->sum('comm');
        
     }
      else
     {
       $gen_team4Income =0;  
     }

     if($gen_team5->isNotEmpty())
     {
         
      $gen_team5Income = Income::where(function($query) use($gen_team5UserName)
        {
          if(!empty($gen_team5UserName)){
            foreach ($gen_team5UserName as $key => $value) {
            //   $f = explode(",", $value);
            //   print_r($f)."<br>";
              $query->orWhere('rname', $value);
            }
          }else{$query->where('rname',null);}
        })->where('user_id',$user->id)->where('remarks','Quantify Level Income')->orderBy('id', 'DESC')->sum('comm');
        
     }
      else
     {
       $gen_team5Income =0;  
     }

     if($gen_team6->isNotEmpty())
     {
         
      $gen_team6Income = Income::where(function($query) use($gen_team6UserName)
        {
          if(!empty($gen_team6UserName)){
            foreach ($gen_team6UserName as $key => $value) {
            //   $f = explode(",", $value);
            //   print_r($f)."<br>";
              $query->orWhere('rname', $value);
            }
          }else{$query->where('rname',null);}
        })->where('user_id',$user->id)->where('remarks','Quantify Level Income')->orderBy('id', 'DESC')->sum('comm');
        
     }
      else
     {
       $gen_team6Income =0;  
     }
      $teamUserName =$gen_team1->pluck('username');
        $todaysIncome =  \DB::table('incomes')->where('user_id',$user->id)->where('ttime',date('Y-m-d'))->where('remarks','Quantify Level Income')->sum('comm');
        $totalDirectIncome =  \DB::table('incomes')->where('user_id',$user->id)->where('remarks','Direct Commission')->sum('comm');
        $totaltaskIncome =  \DB::table('incomes')->where('user_id',$user->id)->where('remarks','Task Income')->sum('comm');
    
        $this->data['todaysIncome'] =$todaysIncome;
        $this->data['gen_team6Income'] =$gen_team6Income;
        $this->data['gen_team5Income'] =$gen_team5Income;
        $this->data['gen_team4Income'] =$gen_team4Income;
        $this->data['gen_team3Income'] =$gen_team3Income;
        $this->data['gen_team2Income'] =$gen_team2Income;
        
        $this->data['gen_teamIncome'] =$gen_teamIncome;


        $this->data['gen_team1total'] =$gen_team1->count();
        $this->data['gen_team4total'] =$gen_team4->count();
        $this->data['gen_team5total'] =$gen_team5->count();
        $this->data['gen_team6total'] =$gen_team6->count();
        $this->data['active_gen_team1total'] =$gen_team1->where('active_status','Active')->count();
        $this->data['active_gen_team4total'] =$gen_team4->where('active_status','Active')->count();
        $this->data['active_gen_team5total'] =$gen_team5->where('active_status','Active')->count();
        $this->data['active_gen_team6total'] =$gen_team6->where('active_status','Active')->count();

        $this->data['gen_team2total'] =$gen_team2->count();
        $this->data['active_gen_team2total'] =$gen_team2->where('active_status','Active')->count();

        $this->data['gen_team3total'] =$gen_team3->count();
        $this->data['active_gen_team3total'] =$gen_team3->where('active_status','Active')->count();


        $this->data['gen_team1Income'] =$gen_team1->count();

        $this->data['totalwithdrawal'] =$teamwithdraw->sum('amount');
        $this->data['todaysuser'] =$notes->where('jdate',date('Y-m-d'))->count();
        $this->data['activeteam'] =$notes->where('active_status','Active')->count();
        $this->data['validMember'] =$notes->where('package','>=',100)->count();
        $this->data['totalrecharge'] =$totalrecharge;
        $this->data['totalTourrecharge'] =$totalTourrecharge;
        $this->data['totalTourTeam'] =$totalTourTeam;
        $this->data['totalTeam'] =$notes->count();
        $this->data['teamEarning'] =$gen_teamIncome+$gen_team2Income+$gen_team3Income+$gen_team4Income+$gen_team5Income+$gen_team6Income+$totalDirectIncome+$totaltaskIncome;
        $this->data['page'] = 'user.team.level-team';
        return $this->dashboard_layout();

    }
    
    
        public function leftteam(Request $request)
    {  
      $user=Auth::user();
      // print_r($user->username);die();
      $ids=$this->team_by_position($user->id,'Left');
       
        $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            // $notes = User::where('sponsor',$user->username);
          $notes = User::whereIn('id',$ids);
        if($search <> null && $request->reset!="Reset"){
          $notes = $notes->where(function($q) use($search){
            $q->orWhere('name', 'LIKE', '%' . $search . '%')          
            ->orWhere('username', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('phone', 'LIKE', '%' . $search . '%')
            ->orWhere('jdate', 'LIKE', '%' . $search . '%')
            ->orWhere('active_status', 'LIKE', '%' . $search . '%');
          });
      
        }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
       
          $this->data['direct_team'] =$notes;
          $this->data['search'] =$search;
          $this->data['page'] = 'user.team.left-team';
          return $this->dashboard_layout();

    }
    
    
public function stats(Request $request)
{
    $filter = $request->query('filter'); // 'today', '7days', '1month'
    $user = Auth::user();
    $ids = $this->my_level_team($user->id);

    // Build query for team users (by ID)
    $query = User::whereIn('id', $ids ?? []);

    // Apply date filter
    if ($filter === 'today') {
        $query->whereDate('created_at', now());
    } elseif ($filter === '7days') {
        $query->where('created_at', '>=', now()->subDays(7));
    } elseif ($filter === '1month') {
        $query->where('created_at', '>=', now()->subMonth());
    }

    // Prepare active count clone (since query is used once)

    // Get income from team_income only
    $income = Income::where('user_id', $user->id)
        ->where('remarks', 'Quantify Level Income')
        ->when($filter === 'today', fn($q) => $q->whereDate('created_at', now()))
        ->when($filter === '7days', fn($q) => $q->where('created_at', '>=', now()->subDays(7)))
        ->when($filter === '1month', fn($q) => $q->where('created_at', '>=', now()->subMonth()))
        ->sum('comm');

    return response()->json([
        'total' => $query->count(),
        'income' => round($income,2),
    ]);
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



  public function find_users($snode,$pos) {
    // $this->load->model('Dashboard_model');
  $user_just_downline = User::where('Parentid',$snode)->where('position',$pos)->first();
       return $user_just_downline;
}



  public function genealogy(Request $request)
  {
     $user=Auth::user();
      $tuser=$request->user_id;
      if($tuser==NULL){
     $suser = @$request->suser;
      if($suser==""){
      $username = $user->username;
      }
      else{
          $session_id = $user->id;
          $username = $suser;
           $user_id=User::where('username',$username)->first();
       if($user_id->id>$session_id)
       {
        $username= $suser;  
       }
       else
       {
         $username = $user->username;   
       }
      }
     }
     else{
         $username = $tuser;
        }

         $check=User::where('username',$username)->count();;
          if($check>0)
          {
             $username = $username;  
          }
          else
          {
           $username = $user->username;    
          }
   
    $complete_tree = array();
    $pool='users';
    $user_id=User::where('username',$username)->first();
    $user_id=@$user_id->id;
    $mydata =User::where('id',$user_id)->first(); 
    if ($user_id!="")
    {
    $childs_1 =   $this->find_users(@$user_id,'Left');  
    $childs_2 =   $this->find_users(@$user_id,'Right');  
     
     if (!empty($childs_1))
      {
     $childs_3 =   $this->find_users(@$childs_1->id,'Left');  
     $childs_4 =   $this->find_users(@$childs_1->id,'Right'); 
      } 
       else
      {
      $childs_3=array();
      $childs_4=array();
      }

      if (!empty($childs_2))
      {
     $childs_5 =   $this->find_users(@$childs_2->id,'Left');  
     $childs_6 =   $this->find_users(@$childs_2->id,'Right'); 
      }
      else
      {
      $childs_5=array();
      $childs_6=array();
      }

    }

  $this->data['childs_1'] =$childs_1;
  $this->data['childs_2'] =$childs_2;
  $this->data['childs_3'] =$childs_3;
  $this->data['childs_4'] =$childs_4;
  $this->data['childs_5'] =$childs_5;
  $this->data['childs_6'] =$childs_6;
  $this->data['mydata'] =$mydata;
  $this->data['page'] = 'user.team.tree-view';
  return $this->dashboard_layout();


  }



    public function rightteam(Request $request)
    {  
      $user=Auth::user();
      // print_r($user->username);die();
      $ids=$this->team_by_position($user->id,'Right');
       
        $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            // $notes = User::where('sponsor',$user->username);
          $notes = User::whereIn('id',$ids);
        if($search <> null && $request->reset!="Reset"){
          $notes = $notes->where(function($q) use($search){
            $q->orWhere('name', 'LIKE', '%' . $search . '%')          
            ->orWhere('username', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('phone', 'LIKE', '%' . $search . '%')
            ->orWhere('jdate', 'LIKE', '%' . $search . '%')
            ->orWhere('active_status', 'LIKE', '%' . $search . '%');
          });
      
        }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
       
          $this->data['direct_team'] =$notes;
          $this->data['search'] =$search;
          $this->data['page'] = 'user.team.right-team';
          return $this->dashboard_layout();

    }





    public function my_level_team_count($userid,$level=6){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $alldown=User::select('id')->whereIn('sponsor',$arrin)->get()->toArray();
            if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[$i]=$arrin;
                $i++;

                if ($i>$level) {
                  break;
                 }

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



    public function my_level_team($userid,$level=6){
      $arrin=array($userid);
      $ret=array();

      $i=1;
      while(!empty($arrin)){
          $alldown=User::select('id')->whereIn('sponsor',$arrin)->get()->toArray();
          if(!empty($alldown)){
              $arrin = array_column($alldown,'id');
              $ret[$i]=$arrin;
              $i++;

              if ($i>$level) {
               break;
              }


          }else{
              $arrin = array();
          }
      }

      $final = array();
      if(!empty($ret)){
          array_walk_recursive($ret, function($item, $key) use (&$final){
              $final[] = $item;
          });
      }


      return $final;

  }


}
