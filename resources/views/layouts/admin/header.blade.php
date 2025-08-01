<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{{siteName()}} | Admin Dashboard" />
	<meta property="og:title" content="{{siteName()}} | Admin Dashboard" />
	<meta property="og:description" content="{{siteName()}} | Admin Dashboard" />
	    <meta property="og:image" content="{{asset('mainsite/assets/img/alttoken.png')}}" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>{{siteName()}} | Admin Dashboard</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('')}}mainsite/assets/img/fav.png" />
	<link rel="stylesheet" href="{{asset('')}}admin/vendor/chartist/css/chartist.min.css">
    <link href="{{asset('')}}admin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
	<link href="{{asset('')}}admin/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="{{asset('')}}admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->

	<!-- Style css -->
    <link href="{{asset('')}}admin/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    .DZ-theme-btn.DZ-bt-buy-now {
    display: none;
}
.DZ-theme-btn.DZ-bt-support-now {
    display: none;
}
.at-expanding-share-button[data-position=bottom-left] {
    display: none;
}
.hamburger .line {
    background: #fff;

}
.form-control {
    border: 0.0625rem solid #d2d2d2;
}
#example_length {
    display: none;
}
#example_filter 
{
display: none;
}
#example_paginate {
    display: none;
}


:root
{
	--font-family-title: revert;
}
table#example {
    padding: 0rem 0 2rem 0;
    color: #000;
    font-weight: 900 !important;
    font-family: sans-serif;
}
.form-control {
    border: 0.0625rem solid #d2d2d2;
}

.form-control {
    background: #fff;
    border: 0.0625rem solid #f5f5f5;
    padding: 0.3125rem 1.25rem;
    color: #000000;
    height: 3.5rem;
    border-radius: 1rem;
}
</style>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="gooey">
		  <span class="dot"></span>
		  <div class="dots">
			<span></span>
			<span></span>
			<span></span>
		  </div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{asset('')}}" class="brand-logo">
                <img src="{{asset('')}}assets/img/logo.png" style="    width: 133px;
                margin: 0px auto;" alt=""/>

            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="nav-item">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item recipe">
								<a href="javascript:void(0);" class="btn btn-primary btn-rounded">Admin </a>
							</li>


							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="{{asset('')}}admin/images/avatar/profile-1.jpg" width="56" alt=""/>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="{{route('admin.changePassword')}}" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
										<span class="ms-2">Profile </span>
									</a>

									<a href="{{route('admin.admin-logout')}}" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
										<span class="ms-2">Logout </span>
									</a>
								</div>
							</li>

                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li>
                        <a class="ai-icon" href="{{route('admin.dashboard')}}">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>


                    </li>

                  

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">Activation</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.active-users') }}">Active User</a></li>
							<li><a href="{{ route('admin.pending-user') }}">Pending User</a></li>

                        </ul>
                    </li>
                   
                <li><a href="{{route('admin.add-bonus')}}" class="ai-icon" aria-expanded="false">
                               <i class="flaticon-022-copy"></i>
                        <span class="nav-text">Add Bonus </span>
                    </a>
                </li>
                <!--  <li><a href="{{route('admin.addreward')}}" class="ai-icon" aria-expanded="false">-->
                <!--          <i class="flaticon-043-menu"></i>-->
                <!--        <span class="nav-text">Add Reward </span>-->
                <!--    </a>-->
                <!--</li> -->
                <!--<li><a href="{{route('admin.debit')}}" class="ai-icon" aria-expanded="false">-->
                <!--           <i class="flaticon-022-copy"></i>-->
                <!--        <span class="nav-text">Debit Amount </span>-->
                <!--    </a>-->
                <!--</li>-->
                
                
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-041-graph"></i>
							<span class="nav-text">User Management</span>
						</a>
                        <ul aria-expanded="false">
                            <!--<li><a href="{{ route('admin.userSummary') }}">User Summary</a></li>-->
                            <li><a href="{{ route('admin.totalusers') }}">Total Users</a></li>
                            <li><a href="{{ route('admin.edit-users') }}">Edit User</a></li>
                            <li><a href="{{ route('admin.block-users') }}">Block User</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-086-star"></i>
							<span class="nav-text">Deposit </span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.deposit-request') }}">Pending Deposit</a></li>
                            <li><a href="{{ route('admin.rejected-deposit') }}">Rejected Deposit</a></li>
                            <li><a href="{{ route('admin.deposit-list') }}">Approved Deposit</a></li>


                        </ul>
                    </li>


                <li><a href="{{route('admin.user-activation')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-072-printer"></i>
                        <span class="nav-text">User Activation </span>
                    </a>
                </li>  
                <!--    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">-->
                <!--        <i class="flaticon-043-menu"></i>-->
                <!--        <span class="nav-text">Activities </span>-->
                <!--    </a>-->
                <!--    <ul aria-expanded="false">-->
                <!--        <li><a href="{{ route('admin.deposit-activities') }}">Pending Activities</a></li>-->
            
                <!--        <li><a href="{{ route('admin.activities-list') }}">Activities List</a></li>-->


                <!--    </ul>-->
                <!--</li>-->

                <li><a href="{{route('admin.add-price')}}" class="ai-icon" aria-expanded="false">
                           <i class="flaticon-072-printer"></i>
                        <span class="nav-text">Settings </span>
                    </a>
                </li>
                    

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-072-printer"></i>
							<span class="nav-text">Profit Summary</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.roi-bonus') }}">Trading  Income</a></li>
                          
                            <li><a href="{{ route('admin.level-bonus') }}">Leadership Income</a></li>
                            <li><a href="{{route('admin.reward-bonus')}}">Reward Bonus</a></li>
                            <!--<li><a href="{{route('admin.booster-bonus')}}">Daily Incentive</a></li>-->
                            <li><a href="{{route('admin.club-bonus')}}">Direct  Income</a></li>
                            <li><a href="{{route('admin.reward-achiever')}}">Salary Acheivers</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-043-menu"></i>
							<span class="nav-text">Withdrawal</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('admin.pendingWithdrawal')}}">Pending Withdrawal</a></li>
                            {{-- <li><a href="{{route('admin.pendingBankWithdrawal')}}">Pending Bank Withdrawal</a></li> --}}
                            <li><a href="{{route('admin.rejectedWithdrawal')}}">Rejected Withdrawal</a></li>
                            <li><a href="{{route('admin.approvedWithdrawal')}}">Approved Withdrawal</a></li>
                        </ul>
                    </li>


                    <li><a href="{{route('admin.changePassword')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-072-printer"></i>
                        <span class="nav-text">Change Password</span>
                    </a>
                </li>

                

            <!--    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">-->
            <!--        <i class="flaticon-022-copy"></i>-->
            <!--        <span class="nav-text">Support</span>-->
            <!--    </a>-->
            <!--    <ul aria-expanded="false">-->
            <!--        <li><a href="{{route('admin.support-query')}}">Support Query</a></li>-->


            <!--    </ul>-->
            <!--</li>-->

                     <li><a href="{{route('admin.admin-logout')}}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-sign-out"></i>
							<span class="nav-text">Logout</span>
						</a>
					</li>
                </ul>

				<div class="copyright">
					<p><strong>{{siteName()}}</strong> © 2023 All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by {{siteName()}}</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
