<html lang="en" class="van-theme-light pc" style="font-size: 50px;">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="{{ asset('') }}assets/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex, nofollow">
    <title>Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/vant-CKdp23cx.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/vuei18n-CuXg3buO.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/corejs-C4iS2aBk.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/qrcodejs2fix-CnmRM6Pf.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/vueclipboard3-C7DdPEQF.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/uaParserJs-QZjeYS1Z.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/vuex-Bs0GV8-d.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/vuerouter-CVr71rqU.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/axios-Cm0UX6qg.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/cryptojs-BILcvZe1.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/swiper-C1TWdcvt.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/bignumberjs-DOH-f-tm.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/validator-DnYg83Z5.js">
    <link rel="modulepreload" crossorigin="" href="{{ asset('') }}assets/js/vanttouchemulator-Cv_in60N.js">
    <link rel="stylesheet" crossorigin="" href="{{ asset('') }}assets/css/DlTOjm5D.css">

    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/PageScroll-FXSyIjvF.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/PageScroll-B0U5qQ_M.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/MainHeader-CcsZql5t.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/H65jKJPy.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="{{ asset('') }}assets/js/FloatingBubble-BQUsBjwb.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/FloatingBubble-Dntr2w2Z.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/MainFooter-D5SgpBNL.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/MainFooter-KaNE-uqv.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="{{ asset('') }}assets/js/NoticePopup-8URqE4Dx.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/NoticePopup-SnqEssf-.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="{{ asset('') }}assets/js/CustomerService-BbmzK9rb.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/CustomerService-D5uG7YzE.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/ComImage-hDAidJ_D.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/ComImage-C3FUzSnY.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/PhoneInp-lYWUgbIe.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/PhoneInp-Bfqy-ryz.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/PsdInp-DTmI6_SR.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="{{ asset('') }}assets/js/eye_close-DJdVF6pM.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/PsdInp-B2SSuLGr.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="{{ asset('') }}assets/js/ComCheckbox-CmgGg7Ee.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/ComCheckbox-DzGBGsDX.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/ComBtn-0bgjX6rp.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/ComBtn-CgiT3mnI.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="{{ asset('') }}assets/js/AreaPopup-DEXeHN4I.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/AreaPopup-wBjKIUoJ.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="{{ asset('') }}assets/js/ListEmpty-CVrQxVWf.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/ListEmpty-BnV8Jpo-.css">
</head>
<style>
    .form-control2 {
        display: block;
        width: 100%;
        padding: 0.175rem .75rem;
        font-size: 20px;
        font-weight: 400;
        line-height: 1.5;
        color: var(--bs-body-color);
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: var(--bs-body-bg);
        background-clip: padding-box;
        border: var(--bs-border-width) solid var(--bs-border-color);
        border-radius: 10px;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
        /* border: 1px solid #887f7f; */
        .iti {
            width: 100%; /* Make the telephone input span the full width of its container */
        }

        .iti__flag-container {
            width:24.67%;  /* Adjust the width of the country code dropdown to be about 1/6 */
            
        }
        .iti--separate-dial-code .iti__selected-flag {
    background-color: rgb(255 255 255);
}
        .iti input[type="tel"] {
            width: 83.33%; /* Remaining width for the input field */
        }
        .iti--separate-dial-code .iti__selected-dial-code{
            margin-left: 0px;
        }
        .iti__selected-flag {
                z-index: 1;
                position: relative;
                display: flex;
                align-items: center;
                height: 100%;
                padding: 0;
            }
        
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="">
    <div id="app" data-v-app="">
        <div class="van-config-provider"><!----></div><img data-v-336fb872="" class="bj_log"
            src="{{ asset('') }}assets/images/bi2-CoBPuOf9.png" alt=""
            style="height: 5rem; width: 100%;">
        <div data-v-e85f0186="" data-v-336fb872="" class="page" style="background-color: rgb(254, 254, 251);">
            <div data-v-e85f0186="" class="headers">
                <div data-v-446624d4="" data-v-336fb872="" class="user-header">
                    <div data-v-446624d4="" class="left">
                        <div data-v-446624d4="" class="back"> <a href="{{route('register')}}"> <img data-v-446624d4=""
                                src="{{asset('')}}assets/images/righta.png"
                                class="icon"></a></div>
                    </div>
                    <div data-v-446624d4="" class="right">
                        <div data-v-446624d4="" class="lang"><img data-v-446624d4=""
                                src="{{asset('')}}assets/images/internet.png">
                        </div>
                        <div data-v-446624d4="" class="CS"><img data-v-446624d4=""
                                src="{{asset('')}}assets/images/headphone.png">
                        </div>
                    </div>
                </div>
            </div>
            <div data-v-e85f0186="" class="page-container">
                <div data-v-e85f0186="" class="scroll">
                    <div data-v-336fb872="" class="user">
                        <form action="{{ route('loginAction') }}" method="POST" name="login_frm"  id="form-id">
                            {{ csrf_field() }}
                        <div data-v-336fb872="" class="welcome-text"><img data-v-336fb872=""
                                src="{{ asset('') }}assets\images\logo-2.png" alt="">
                        </div>
                        <div data-v-336fb872="" class="user-con">
                            <div data-v-336fb872="" class="boxs">


                                <div data-v-336fb872="" class="item">




                                    <div data-v-336fb872="" class="title">Phone Number</div>
                                    <div data-v-3976fdc1="" class="inp-con">
                                        <div data-v-3976fdc1="" class="inp">
                                            
                                                <input type="hidden"  id="country-name" name ="country" value="" >
                                               <input type="hidden"  id="dial-code" name ="dialCode" value="" >
                                               <input type="hidden"  id="country_iso" name ="country_iso" value="" >
                                               
                                               
                                            <div data-v-3976fdc1="" class="set_area">

                                            </div><input id="phone" data-v-3976fdc1="" name="phone" type="text"   placeholder="Enter Your Number">
                                        </div>
                                    </div>
                                </div>
                                <div data-v-336fb872="" class="item">
                                    <div data-v-336fb872="" class="title">Password</div>
                                    <div data-v-0a0a182e="" data-v-336fb872="" class="inp-con">
                                        <div data-v-0a0a182e="" class="inp"><input data-v-0a0a182e="" id="test-input" name="password"
                                                type="password" placeholder="Enter your password">
                                            <div data-v-0a0a182e="" class="icon" > <i id="check" class="fa fa-slash" style="font-size:16px"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-336fb872="" class="save-forgot">
                                        <div data-v-3db4245c="" data-v-336fb872="" role="checkbox"
                                            class="van-checkbox" tabindex="0" aria-checked="false">
                                            <div class="van-checkbox__icon van-checkbox__icon--square"
                                                style="font-size: 0.36rem;">
                                            </div><label class="van-checkbox__label" style="display: flex; align-items: center;">
                                             <input type="checkbox" id="rememberPassword" name="rememberPassword" data-v-336fb872>
                                               <span style="margin-left: 8px; color: rgb(0, 0, 0);">Remember password</span>
                                            </label>
                                        </div>
                                        <div data-v-336fb872="" class="forgot"><a href="{{route('forgot-password')}}">Forgot password？ </a></div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-336fb872="" class="bot"><button data-v-359df9df="" data-v-336fb872=""
                                    type="submit"
                                    class="van-button van-button--default van-button--normal van-button com-btn on">
                                    <div class="van-button__content"><!----><span
                                            class="van-button__text">Login</span><!----></div>
                                </button>
                                <p data-v-336fb872="">Don't have an account？<a href="{{route('register')}}"><span data-v-336fb872="">Register
                                        now</span></p></a>
                                        
                                        
                                       {{-- <p data-v-336fb872=""><a href="{{asset('')}}/DCXPRO.apk" download> <img style="width: 200px;" src="{{asset('assets/images/download app.png')}}"> </a></p> --}}
                                        
                                        
                                <div data-v-8b363259="" data-v-db34f896="" data-v-336fb872="" class="touch-move-con"
                                    style="top: 2.55rem; right: -0.02rem;">
                                   
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div data-v-8b363259="" data-v-e85f0186="" class="touch-move-con"
                    style="top: 1.88rem; right: 0.2rem;"></div>
            </div><!---->
        </div>
    </div>
    @include('partials.notify')
        <script src="https://code.jquery.com//jquery-3.3.1.min.js"></script>

    <script>
      $(document).ready(function() {
  
  $('#check').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#test-input').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#test-input').attr('type','password');
        }
    });
    
});
    </script>
    <script>
function togglePasswordVisibility() {
    var passwordInput = document.getElementById('passwordInput');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
}


</script>



    <script>
        var input = document.querySelector('#phone');
        var info = document.querySelector('#info');
        var status = document.getElementById('status');
        var iti = window.intlTelInput(input, {
            initialCountry: "auto",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Load the utilities script
        });

        input.addEventListener('blur', function() {
            if (iti.isValidNumber()) {
                status.textContent = 'Valid number';
                status.className = 'valid-number';
            } else {
                status.textContent = 'Invalid number';
                status.className = 'invalid-number';
            }
        });

        input.addEventListener('countrychange', function() {
            updateCountryInfo(); // Update the information displayed when the country changes
        });

        function updateCountryInfo() {
            var countryData = iti.getSelectedCountryData();
            console.log(countryData)
            
            $('#country-name').val(countryData.name)
            $('#dial-code').val(countryData.dialCode)
            $('#country_iso').val(countryData.iso2)
           
        }

        // Initialize with the current selected country's info
        document.addEventListener('DOMContentLoaded', updateCountryInfo);
    </script>
</body>

</html>
