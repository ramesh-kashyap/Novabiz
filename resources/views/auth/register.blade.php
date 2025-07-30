<html lang="en" class="van-theme-light pc" style="font-size: 50px;">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="{{ asset('') }}assets/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex, nofollow">
    <title>Registration - {{siteName()}}</title>
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
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/FloatingBubble-BQUsBjwb.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/FloatingBubble-Dntr2w2Z.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/MainFooter-D5SgpBNL.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/MainFooter-KaNE-uqv.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/NoticePopup-8URqE4Dx.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/NoticePopup-SnqEssf-.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/CustomerService-BbmzK9rb.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/CustomerService-D5uG7YzE.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/ComImage-hDAidJ_D.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/ComImage-C3FUzSnY.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/PhoneInp-lYWUgbIe.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/PhoneInp-Bfqy-ryz.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/PsdInp-DTmI6_SR.js">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/eye_close-DJdVF6pM.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/PsdInp-B2SSuLGr.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/ComCheckbox-CmgGg7Ee.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/ComCheckbox-DzGBGsDX.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/ComBtn-0bgjX6rp.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/ComBtn-CgiT3mnI.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/AreaPopup-DEXeHN4I.js">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/AreaPopup-wBjKIUoJ.css">
    <link rel="modulepreload" as="script" crossorigin="" href="{{ asset('') }}assets/js/ListEmpty-CVrQxVWf.js">
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
        width: 100%;
        /* Make the telephone input span the full width of its container */
    }

    .iti__flag-container {
        width: 24.67%;
        /* Adjust the width of the country code dropdown to be about 1/6 */

    }

    .iti--separate-dial-code .iti__selected-flag {
        background-color: rgb(255 255 255);
    }

    .iti input[type="tel"] {
        width: 83.33%;
        /* Remaining width for the input field */
    }

    .iti--separate-dial-code .iti__selected-dial-code {
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

    .go .wrap[data-v-a34da882] {
        margin-top: .4rem;
        color: var(--COcolor3);
        font-size: .26rem;
        display: flex;
        justify-content: left;
        margin-bottom: .4em;
    }

    .go .wrap .wr[data-v-a34da882] {

        color: var(--COcolor3);
        font-size: .26rem;
        display: flex;
        justify-content: left;
        margin-bottom: .4em;
    }

    .van-popup--bottom[data-v-a84105cc] {
        max-width: 8.5rem;
    }

    .van-popup--bottom.van-popup--round {
        border-radius: 0.32rem 0.32rem 0 0;
    }

    .van-popup {
        position: fixed;
        max-height: 100%;
        overflow-y: auto;
        background-color: #f5f5f5;
        transition: transform 0.3s;
        -webkit-overflow-scrolling: touch;
    }

    .area_pop[data-v-a84105cc] {
        color: #fff;
    }

    .area_pop .title[data-v-a84105cc] {
        font-size: 0.32rem;
        text-align: center;
        padding: 0.3rem;
        color: #000;
    }

    .rel {
        position: relative;
    }

    .area_pop .so[data-v-a84105cc] {
        height: 0.8rem;
        background: #dadde5;
        ;
        margin: 0 0.3rem;
        border-radius: 0.12rem;
        padding: 0 0.1rem;
    }

    .db {
        display: flex;
        display: -webkit-box;
        box-align: center;
        -webkit-box-align: center;
        color: #000;
    }

    .area_pop ul[data-v-a84105cc] {
        height: 7rem;
        overflow: auto;
        margin: 0.2rem 0.3rem;
    }

    ol,
    ul,
    li {
        list-style: none;
    }

    .area_pop .title .abs[data-v-a84105cc] {
        right: 0.3rem;
        top: 0.35rem;
    }

    .abs {
        position: absolute;
    }

    .area_pop .title .abs i[data-v-a84105cc] {
        font-size: 0.32rem;
    }

    .van-icon {
        position: relative;
        display: inline-block;
        font: normal normal normal 0.28rem / 1 'vant-icon';
        font: normal normal normal 0.28rem / 1 var(--van-icon-font-family, 'vant-icon');
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
    }

    .area_pop .so .ico[data-v-a84105cc] {
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC0AAAAqCAYAAAAnH9IiAAAACXBIWXMAACE4AAAhOAFFljFgAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAANYSURBVHgB1VmLcdswDIU0gTcoO0HdCapMkHSCphNYnqDKBLYn6HUCOxOYmSDuBFU38AR2ARlSKBKkPqdP8+50EimJfARAEgAj6InNZrPA2xKvhyiKPvDzgi/CGa+c7tfr9QXver1eaxgAEXQEkk3gRvSbQbAtaCAHHMQOB3CCnmhNmsgi0R/4mMAw0Ej+O5LPoSMaSZMZMNkUxsEWyT8h+XPbH4KkkbBCwkd8VBBGjtcJO/8LNxMgLAxbb/wf/71rK3UvaSS8ZMI+u9X4/nC5XJ6bOqPB4600L+X5jIh/bWPrUQ/COduihh7Ath8D5M8s8SDxSGjUaxI86wexbewnY/I2iPjnkPYiqyGyw1dwCZ9ZdRoGBPZHS+dPcDWaM3FxcsZmwaO2UmUaBga2SWv2HbxN3hLKo4UClaTZLP7YH7CEDzAieA84Cn2LwqokzWqyf3oamzCBiNF8set90i4kzavFq/UuT9P0I0yI7XZLmlZmnSTtUtLOioCDyGBi0FIqVD/YFQVpJHhv1eer1eoXTAyWqDbryDFjj7JCzF7bwvowg5mA0n62qkoXuAJJOrF/xK35BeaDNPFrJhKjVL9YH+R93MWhwH3nVrUyCyTpmmmgen7D/Kj5HijYT2aZSCvrhxxmBru4JuoTEdx9v7UzPiJsDg7pdwciHRzVTAhqXyKtYGZwmGYiNwtEOjhTZ8LSKtclLcxUxTHdLOC+lVnHyZ4KJOnGHWhiJEKdNguledTELzhQk0Hwoc+Oa0pxGIrf9ugSdqQmBUXq4C4EjiXEvhdSJDM2pEhFimgK0pIfi1AYSWxgIux2Oymo1lIOpNoRKR4U2kqnMBNKJWD/mV3viWTeSAeCyz3FkDASOD6VTJEWB3F3tn2PDFwvjxI4R5IGDAwjdSCRK/t1BFYjzSuJlDyhBvZsd4OA5ktDgrPs1yHeKwFJMWTfwJelS+aghNdVmtiuNxOTTanePQRSs0Se4sk2qd44ju+xYzKxxPNZqWXwCKwi/l8m1QOaLjKqrY4v8EZp2RWMAF6xMjtD6iOO36+7HBQptsUEhoHmXKEGf58OcSw/9jmSI3Wn7FR1PpJjP+fQNnVszq0yqd+ZtNVgArezFMqd0AAU1A8/6SptnfybU5dTLB/+AYy7xNVzTTGdAAAAAElFTkSuQmCC) no-repeat center center;
        width: 0.5rem;
        height: 0.8rem;
        background-size: 0.3rem auto;
    }

    .area_pop .so input[data-v-a84105cc] {
        width: 100%;
        background: none;
        border: 0;
    }

    input[type='text'],
    textarea {
        -webkit-appearance: none;
        appearance: none;
        outline: 0;
    }

    .area_pop ul li[data-v-a84105cc] {
        border-bottom: 0.02rem solid rgba(255, 255, 255, 0.1);
        padding: 0.28rem 0;
    }

    .db {
        display: flex;
        display: -webkit-box;
        box-align: center;
        -webkit-box-align: center;
    }

    .area_pop ul li .ico[data-v-a84105cc] {
        margin-right: 0.2rem;
    }

    .area_pop ul li .ico img[data-v-a84105cc] {
        height: 0.32rem;
    }

    img {
        max-width: 100%;
        max-height: 100%;
        vertical-align: top;
    }

    .db>li,
    .flexs {
        -moz-box-flex: 1;
        -webkit-box-flex: 1;
        box-flex: 1;
    }

    .phone_code[data-v-fa37b51c] {
        color: #000;
        font-size: 0.28rem;
        display: flex;
        align-items: center;
        margin-right: 0.12rem;
    }

    .inp_content_box {
        display: flex;
    }

    .custom[data-v-a34da882] {
        position: fixed;
        top: .24rem;
        right: 0.3rem;
        margin-top: constant(safe-area-inset-top);
        margin-top: env(safe-area-inset-top);
        width: .72rem;
        height: .72rem;
        background: #171717;
        border-radius: .2rem;
        text-align: center;
    }

    .van-checkbox__icon--checked {
        border-color: rgb(113, 219, 129);
        background-color: rgb(113, 219, 129);
    }

    .van-checkbox__icon--unchecked {
        border-color: #ddd;
        /* Set an alternative color for the unchecked state */
        background-color: transparent;
    }

    .van-checkbox {
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        align-items: center;
        overflow: visible;
        cursor: pointer;
        -webkit-user-select: none;
        user-select: none;
    }

    .flex-container {
        display: flex;
        align-items: center;
        gap: 8px;
        /* Space between the divs */
    }

    .inp-con .inp[data-v-0a0a182e] {
        height: 1rem;
        padding: .36rem .28rem;
        border-radius: .32rem;
        border: .02rem solid #e5e1e1;
        ;
        background: #fff;
        ;
    }

    .inp-con[data-v-3976fdc1] {
        display: flex;
        height: 1rem;
        border-radius: .2rem;
        padding: .36rem .28rem;
        border-radius: .32rem;
        border: .02rem solid #e5e1e1;
        ;
        background: #fff;
        ;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/6.6.6/css/flag-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .page[data-v-ebfcdf27] {
    margin: 0 auto;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    box-sizing: border-box;
    color: #000;
    display: flex
;
    flex-direction: column;
    overflow: hidden;
}

.page[data-v-7dfac6f0] {
    background: none !important;
}
.page .headers[data-v-ebfcdf27] {
    flex: 0 0 auto;
    width: 100%;
    position: relative;
    z-index: 9;
}
#app {
    --btnBg: linear-gradient(90deg, #20C9FF 0%, #0180F8 100%);
}
#app {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    font-family: PingFang SC;
}

.bj_log[data-v-7dfac6f0] {
    background-color: #15191c;
    margin-top: -1rem;
}
ebfcdf27] {
    margin: 0 auto;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    box-sizing: border-box;
    color: #000;
    display: flex
;
    flex-direction: column;
    overflow: hidden;
}
.page[data-v-7dfac6f0] {
    background: none !important;
}
.page .headers[data-v-ebfcdf27] {
    flex: 0 0 auto;
    width: 100%;
    position: relative;
    z-index: 9;
}

.user-header[data-v-71170d5e] {
    z-index: 99;
    width: 100%;
    height: .88rem;
    display: flex
;
    align-items: center;
    justify-content: space-between;
    padding: 0 .16rem;
    background: transparent;
    box-sizing: border-box;
}
.user-header .left[data-v-71170d5e] {
    flex: 0 0 auto;
    height: 100%;
    display: flex
;
    align-items: center;
}
.user-header .back[data-v-71170d5e] {
    padding: 0 .16rem;
    height: 100%;
    display: flex
;
    align-items: center;
    box-sizing: border-box;
}

.user-header .back .icon[data-v-71170d5e] {
    margin-top: .04rem;
    font-size: .32rem;
    font-weight: 700;
}
.user-header .left .icon[data-v-71170d5e] {
    height: .44rem;
    object-fit: contain;
    color: #27313c;
}
.user-header .right[data-v-71170d5e] {
    height: 100%;
    display: flex
;
    align-items: center;
}
.user-header .right .lang[data-v-71170d5e], .user-header .right .CS[data-v-71170d5e] {
    height: 100%;
    padding: 0 .16rem;
    display: flex
;
    align-items: center;
}
.user-header .right img[data-v-71170d5e] {
    height: .4rem;
    object-fit: contain;
}
.user-header .right .lang[data-v-71170d5e], .user-header .right .CS[data-v-71170d5e] {
    height: 100%;
    padding: 0 .16rem;
    display: flex
;
    align-items: center;
}

.user-header .right img[data-v-71170d5e] {
    height: .4rem;
    object-fit: contain;
}
.page .page-container[data-v-ebfcdf27] {
    min-height: 0;
    flex: 1;
    position: relative;
    z-index: 2;
}
.page .scroll[data-v-ebfcdf27] {
    height: 100%;
    overflow-y: auto;
}
.user[data-v-7dfac6f0] {
    z-index: 11;
    min-height: 100%;
    display: flex
;
    flex-direction: column;
    justify-content: space-between;
}

.user .welcome-text[data-v-7dfac6f0] {
    padding: 0 .48rem;
    display: flex
;
}

.user .welcome-text img[data-v-7dfac6f0] {
    height: 1.04rem;
    width: 1.04rem;
    margin-right: .24rem;
}

.user .welcome-text h2[data-v-7dfac6f0] {
    margin-top: .08rem;
    color: #fff;
    text-align: left;
    font-size: .48rem;
    font-style: normal;
    font-weight: 500;
    line-height: .48rem;
}
.user .welcome-text p[data-v-7dfac6f0] {
    margin-top: .08rem;
    color: #fff;
    font-size: .32rem;
    font-weight: 400;
    line-height: .32rem;
}
.user .user-con[data-v-7dfac6f0] {
    min-height: 0;
    flex: 1;
    margin-top: .5rem;
    border-radius: .4rem .4rem 0 0;
    background: #fff;
    padding: .4rem;
}
.user .boxs .item[data-v-7dfac6f0] {
    margin-bottom: .32rem;
}
.user .title[data-v-7dfac6f0] {
    margin-bottom: .16rem;
    font-size: .28rem;
    font-weight: 400;
    color: #000;
    line-height: 1em;
}
.inp-con {
    display: flex
;
}
.inp-con .inp {
    min-width: 0;
    flex: 1;
    display: flex
;
    align-items: center;
    justify-content: space-between;
}
.set_area[data-v-39429002] {
    margin-right: .24rem;
    font-size: .3rem;
    height: 1rem;
    width: 1.64rem;
    font-weight: 500;
    color: #000;
    display: flex
;
    align-items: center;
    background: #f3f3f3;
    justify-content: center;
    border-radius: .24rem;
    cursor: pointer;
}
.inp-con .inp input {
    min-width: 0;
    flex: 1;
    color: #000;
    font-size: .28rem;
    font-weight: 500;
}
input[data-v-39429002] {
    height: 1rem;
    padding: 0 .28rem;
    background: #f3f3f3;
    border-radius: .24rem;
}
input, textarea {
    outline: none;
    border: none;
    background-color: transparent;
}
input, button, textarea {
    color: inherit;
    font: inherit;
}
.user .boxs .item[data-v-7dfac6f0] {
    margin-bottom: .32rem;
}

.user .title[data-v-7dfac6f0] {
    margin-bottom: .16rem;
    font-size: .28rem;
    font-weight: 400;
    color: #000;
    line-height: 1em;
}
.inp-con {
    display: flex
;
}
.inp[data-v-8ad53e6c] {
    padding: 0 .28rem;
    background: #f3f3f3;
    border-radius: .24rem;
}
.inp-con .inp {
    min-width: 0;
    flex: 1;
    display: flex
;
    align-items: center;
    justify-content: space-between;
}

.inp input[data-v-8ad53e6c] {
    height: 1rem;
}
.inp-con .inp input {
    min-width: 0;
    flex: 1;
    color: #000;
    font-size: .28rem;
    font-weight: 500;
}
input, textarea {
    outline: none;
    border: none;
    background-color: transparent;
}
input, button, textarea {
    color: inherit;
    font: inherit;
}
.inp-con .inp .icon img {
    vertical-align: middle;
    height: .44rem;
}
.user .boxs .save-forgot[data-v-7dfac6f0] {
    margin-top: .16rem;
    display: flex
;
    justify-content: space-between;
}
.van-checkbox {
    display: flex
;
    align-items: center;
    overflow: hidden;
    cursor: pointer;
    -webkit-user-select: none;
    user-select: none;
}
.van-checkbox__icon {
    flex: none;
    height: 1em;
    font-size: var(--van-checkbox-size);
    line-height: 1em;
    cursor: pointer;
}
[data-v-a4e60512] .van-checkbox__icon .van-icon {
    border-radius: .06rem;
}
.van-checkbox__icon .van-icon {
    display: block;
    box-sizing: border-box;
    width: 1.25em;
    height: 1.25em;
    color: transparent;
    font-size: .8em;
    line-height: 1.25;
    text-align: center;
    border: 1px solid var(--van-checkbox-border-color);
    transition-duration: var(--van-checkbox-duration);
    transition-property: color, border-color, background-color;
}
.van-icon {
    position: relative;
    display: inline-block;
    font: 14px / 1 vant-icon;
    font: normal normal normal 14px / 1 var(--van-icon-font-family, "vant-icon");
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
}
.van-badge__wrapper {
    position: relative;
    display: inline-block;
}
[data-v-a4e60512] .van-checkbox__label {
    margin-left: .1rem;
}
.van-checkbox__label {
    margin-left: var(--van-checkbox-label-margin);
    color: var(--van-checkbox-label-color);
    line-height: var(--van-checkbox-size);
}
.user .boxs .save-forgot .forgot[data-v-7dfac6f0] {
    color: #000;
    font-weight: 400;
    font-size: .28rem;
    line-height: 1em;
}
.bot[data-v-7dfac6f0] {
    margin-top: .6rem;
    padding-bottom: .4rem;
}

element.style {
}
.com-btn.on[data-v-b1cead3b] {
    background: #2dd4bf;
    color: #15191c;
}
.van-button--disabled[data-v-b1cead3b] {
    background: #bfece4 !important;
    color: #fff !important;
    opacity: unset;
}
.com-btn[data-v-b1cead3b] {
    font-size: .32rem;
    width: 100%;
    height: 1rem;
    border: 0;
    display: flex
;
    align-items: center;
    justify-content: center;
    line-height: 1.2em;
    padding: .1rem .2rem;
    font-weight: 500;
    border-radius: .24rem;
}

.bot p[data-v-7dfac6f0] {
    margin-top: .3rem;
    font-size: .28rem;
    font-weight: 400;
    color: #828284;
    line-height: .42rem;
    text-align: center;
}
.bot p span[data-v-7dfac6f0] {
    font-size: .28rem;
    font-weight: 500;
    color: #000;
}
    </style>
    

<body class="">
    <div id="app" data-v-app="">
        <div class="van-config-provider"><!----></div><img data-v-7dfac6f0="" class="bj_log" src="{{asset('')}}assets/images/bi2-gHawq1Q0.png"
            alt="" style="width: 100%;">
        <div data-v-ebfcdf27="" data-v-7dfac6f0="" class="page" style="background-color: rgb(255, 255, 255);">
            <div data-v-ebfcdf27="" class="headers">
                <div data-v-71170d5e="" data-v-7dfac6f0="" class="user-header">
                    <div data-v-71170d5e="" class="left">
                        <div data-v-71170d5e="" class="back">
                                <a href="{{route('login')}}">
                            <img data-v-71170d5e=""
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAsCAYAAAB2d9g5AAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAADnSURBVHgB7ZdRDYNADIb/TAESkIAEJMzBkIADcDAcgJNJQMJJmISuZPfALr1kD/3ZAnxJE8JDv7RpenfAycnuEZFaY9RowEYlN/mkB4tYWcoIBpq40ngawhreaNIyI2vhTZQFQ9bDm13LCo3ZkA1gkJFNYCDvDZIyg4EmvluypcXwRpN2hiwswwNvdi1rN5NFYUhky76s4Mxl9Z1OX2H880OraYyWUqr8RlqChSbvNx2ew0kHQ8rZpyvp9Avpw5ByroRRmDv16dJgSDuwkPxl6jjSK1iI/b7gDVFG2oBNbO+wiezkL3gB15Aini0yTRAAAAAASUVORK5CYII="
                                class="icon">
                                </a>
                                
                                </div>
                    </div>
                    <div data-v-71170d5e="" class="right">
                        <div data-v-71170d5e="" class="lang"><img data-v-71170d5e=""
                                src="{{asset('assets/images/icons8-telegram-48.png')}}"
                                alt=""></div>
                        <div data-v-71170d5e="" class="CS"><img data-v-71170d5e=""
                                src="{{asset('')}}assets/images/headphone.png">
                        </div>
                     
                    </div>
                </div>
            </div>
            <div data-v-ebfcdf27="" class="page-container">
                <div data-v-ebfcdf27="" class="scroll">
                    <div data-v-7dfac6f0="" class="user">
                        <div data-v-7dfac6f0="" class="welcome-text"><img data-v-7dfac6f0=""
                                src="{{asset('')}}assets/images/logo-2.png" alt="">
                             <div data-v-7dfac6f0="">
                                <h2 data-v-7dfac6f0="">Create An Account</h2>
                                <p data-v-7dfac6f0="" style="font-size: smaller;">Start with us new journey</p>
                            </div>
                        </div>
                        <form  action="{{ route('registers') }}" method="POST" >
                        {{ csrf_field() }}
                        @php
                                $sponsor = @$_GET['ref'];
                                $name = \App\Models\User::where('username', $sponsor)->first();
                              @endphp
                        <div data-v-7dfac6f0="" class="user-con">
                            <div data-v-7dfac6f0="" class="boxs">
                            <div data-v-7dfac6f0="" class="item">
                                    <div data-v-7dfac6f0="" class="title">Phone Number</div>
                                    <div data-v-39429002="" data-v-7dfac6f0="" class="inp-con">
                                        <div data-v-39429002="" class="inp">
                                       
                                            <div data-v-39429002="" class="set_area" class="phone_code" id="phone_code"> 
                                            <input type="hidden" id="country-name" name="country" value="CANADA">
                                                <input type="hidden" id="dial-code" name="dialCode" value="1">
                                                <input type="hidden" id="country_iso" name="country_iso" value="CA">
                                                <span data-v-39429002=""
                                                    style="display: none;"></span><span data-v-39429002="">+1</span><!----><!----><!---->
                                            </div><input data-v-39429002="" type="text"  onkeyup="this.value=this.value.replace(/[ ]/g,'')"  value="{{old('phone')}}"   name="phone"
                                                placeholder="Enter your phone number"
                                                >
                                        </div><!----><!---->
                                    </div>
                                </div>
                            <div data-v-7dfac6f0="" class="item">
                                   
                                    <div data-v-7dfac6f0="" class="title">Name</div>
                                    <div data-v-8ad53e6c="" data-v-7dfac6f0="" class="inp-con">
                                        <div data-v-8ad53e6c="" class="inp"><input data-v-8ad53e6c="" type="text"
                                             name="name" value="{{old('name')}}"
                                                placeholder="Your Name">
                                            
                                        </div>
                                    </div>
                                </div>
                               

                                <div data-v-7dfac6f0="" class="item">
                                   
                                   <div data-v-7dfac6f0="" class="title">Email ID</div>
                                   <div data-v-8ad53e6c="" data-v-7dfac6f0="" class="inp-con">
                                       <div data-v-8ad53e6c="" class="inp"><input data-v-8ad53e6c="" type="email"
                                            name="email" value="{{old('email')}}"
                                               placeholder="Your Email">
                                           
                                       </div>
                                   </div>
                               </div>
                               <div data-v-7dfac6f0="" class="item">
                                   
                                   <div data-v-7dfac6f0="" class="title">Invitation Code</div>
                                   <div data-v-8ad53e6c="" data-v-7dfac6f0="" class="inp-con">
                                       <div data-v-8ad53e6c="" class="inp"><input data-v-8ad53e6c="" type="text"
                                            name="sponsor" value="{{$sponsor}}" name="sponsor"
                                               placeholder="Invitation Code ">
                                           
                                       </div>
                                   </div>
                               </div>
                                <div data-v-7dfac6f0="" class="item">
                                    <div data-v-7dfac6f0="" class="title">Password</div>
                                    <div data-v-8ad53e6c="" data-v-7dfac6f0="" class="inp-con">
                                        <div data-v-8ad53e6c="" class="inp"><input data-v-8ad53e6c="" type="password"
                                             name="password" value="{{old('password')}}" id="passwordInput" 
                                                placeholder="Your Password" >
                                            <div data-v-8ad53e6c="" class="icon" onclick="togglePassword()"> 
                                            
                                             <img
                                                id="eyeIcon" 
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAOESURBVHgB7VfLbdtAEF3Kn2tUAlNB6ApCAbYBn2xVELmCSBVIrsB2BbY7kE8C9IGYCswOog7CANJF37wn79JDakmRQC4J9ACC4uzuzNvZ2ZmRUgcc8J/ByRvs9/veyclJVKvVJrbxXq/nHh0dVR3HqRrZcrmcXF1dTdTfJjQYDO7xasLYBEZrhhRINiC7xuNvNpuqVanjRBgL8bxgQ0HWhsoSGuPlawNbUvgZwQO/VElg/TPW3xUhVskawO5aJKB/u6vVigSr+D0R0zge4gnEE1l0NbCRn9hkW+0jnzfIGMLutkS2k+Gp9Xpdx269+XweZMWKji2/Uqlcg8xNwmAqBAoRGo/H9Egbxn/gM5Sk+H18fEyFkSoATa4DHd+KkHIyyIx5TPzG+wwveupJTItJ0eDp6akP8i7mhDAU2gzpy3CvhLdtpHYI4ZzfSEB/MojPeDRaYYKUeo8XP60jK4i1t8YYdwWpM+ntRFCPRqO2IEPv1EycXF5ePuP7Vkz3bGT0uga9TG9LOXVBvr2tep6LDScCPSbExXB7R4y1QCKUky2kDLoI4FvmHUGKxp7SE0kKnpE6mjgVf4cQg1gauLi4eFAWkBRedymxC0JdjPF6f1YfV9+XxgzOz8+7INUVonaCEL1DNxshlLZUDkC2kyLlYQ2PqKo98CLHbDoWi4W04XNtTAjK4lyBY3stUovySPG2GSF+f7Gt1zYC84281owJqY8co+D6T6ogskjh+H0jwAZ/56iIhN0oJoScIuPFT9+OsqRkEoShwLZO24hPBhvpxoR0HgjE4L0qAQupLVj3GMC2NfCitBGXIZmHpMKb4XB4o0qSgmcepSzLO9D9XdY4OCBOAxWhMJAKseCpzNER8EYzlYsa6QoPnR7kD2LOo7xEiUzNIijai6ot2+4Dc5EkBXQMKVMnBZnJbDbryPU7tSxdbwB2fy2dEAsDte9ZBjeItHiEkL0ZMiwj6RRjbT8spEp1fQay69Q6GkgDDoh9RWK8s+W7zAbNRkqji9295vXKpiWB4VDXM0+SQqy9ZNnN7RgJ7LKjRK1JLNbNvBAxS7ui+Q+Q4+pMlkVJZfbUBrzOLJipQN1CG/bF48l/Iqz4zHFs5tR7/2TkD1n29hIieNamkuv2I1CWZl7AJNo6Pwwpc4Pxzly798jywFiBIVfK9v1RZDsynU7Der1eqCc/4IB/Hn8AUYs+0x2/60QAAAAASUVORK5CYII="
                                                width="20"
                                                alt="Toggle"
                                              />
                                            </div>
                                        </div>
                                    </div>
                                 </div>    
                                    <div data-v-7dfac6f0="" class="item">
                                   
                                   
                                   <div data-v-7dfac6f0="" class="title">Confirm Password</div>
                                    <div data-v-8ad53e6c="" data-v-7dfac6f0="" class="inp-con">
                                        <div data-v-8ad53e6c="" class="inp"><input data-v-8ad53e6c="" type="password"
                                             name="password_confirmation"  value="{{old('password_confirmation')}}"
                                                placeholder="Your Confirm Password"  id="passwordInput2" >
                                            <div data-v-8ad53e6c="" class="icon"  onclick="togglePassword2()"> 　<img data-v-8ad53e6c=""  id="eyeIcon2" 
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAOESURBVHgB7VfLbdtAEF3Kn2tUAlNB6ApCAbYBn2xVELmCSBVIrsB2BbY7kE8C9IGYCswOog7CANJF37wn79JDakmRQC4J9ACC4uzuzNvZ2ZmRUgcc8J/ByRvs9/veyclJVKvVJrbxXq/nHh0dVR3HqRrZcrmcXF1dTdTfJjQYDO7xasLYBEZrhhRINiC7xuNvNpuqVanjRBgL8bxgQ0HWhsoSGuPlawNbUvgZwQO/VElg/TPW3xUhVskawO5aJKB/u6vVigSr+D0R0zge4gnEE1l0NbCRn9hkW+0jnzfIGMLutkS2k+Gp9Xpdx269+XweZMWKji2/Uqlcg8xNwmAqBAoRGo/H9Egbxn/gM5Sk+H18fEyFkSoATa4DHd+KkHIyyIx5TPzG+wwveupJTItJ0eDp6akP8i7mhDAU2gzpy3CvhLdtpHYI4ZzfSEB/MojPeDRaYYKUeo8XP60jK4i1t8YYdwWpM+ntRFCPRqO2IEPv1EycXF5ePuP7Vkz3bGT0uga9TG9LOXVBvr2tep6LDScCPSbExXB7R4y1QCKUky2kDLoI4FvmHUGKxp7SE0kKnpE6mjgVf4cQg1gauLi4eFAWkBRedymxC0JdjPF6f1YfV9+XxgzOz8+7INUVonaCEL1DNxshlLZUDkC2kyLlYQ2PqKo98CLHbDoWi4W04XNtTAjK4lyBY3stUovySPG2GSF+f7Gt1zYC84281owJqY8co+D6T6ogskjh+H0jwAZ/56iIhN0oJoScIuPFT9+OsqRkEoShwLZO24hPBhvpxoR0HgjE4L0qAQupLVj3GMC2NfCitBGXIZmHpMKb4XB4o0qSgmcepSzLO9D9XdY4OCBOAxWhMJAKseCpzNER8EYzlYsa6QoPnR7kD2LOo7xEiUzNIijai6ot2+4Dc5EkBXQMKVMnBZnJbDbryPU7tSxdbwB2fy2dEAsDte9ZBjeItHiEkL0ZMiwj6RRjbT8spEp1fQay69Q6GkgDDoh9RWK8s+W7zAbNRkqji9295vXKpiWB4VDXM0+SQqy9ZNnN7RgJ7LKjRK1JLNbNvBAxS7ui+Q+Q4+pMlkVJZfbUBrzOLJipQN1CG/bF48l/Iqz4zHFs5tR7/2TkD1n29hIieNamkuv2I1CWZl7AJNo6Pwwpc4Pxzly798jywFiBIVfK9v1RZDsynU7Der1eqCc/4IB/Hn8AUYs+0x2/60QAAAAASUVORK5CYII=">
                                            </div>
                                        </div>
                                    </div>
                               </div>
                                    <div data-v-7dfac6f0="" class="save-forgot">
                                        <div data-v-a4e60512="" data-v-7dfac6f0="" role="checkbox" class="van-checkbox"
                                            tabindex="0" aria-checked="false">
                                           <input type="checkbox" id="rememberPassword" name="rememberPassword" data-v-336fb872="">
                                            
                                            <span class="van-checkbox__label"><span data-v-7dfac6f0=""
                                                    style="color: rgb(0, 0, 0);">I have read and understood the privacy policy</span></span>
                                        </div>
                                        <div data-v-7dfac6f0="" class="forgot"> </di>
                                    </div>
                                </div>
                            </div>
                            <div data-v-7dfac6f0="" class="bot"><button data-v-b1cead3b="" data-v-7dfac6f0=""
                                    type="submit"
                                    class="van-button van-button--default van-button--normal  com-btn on">
                                    <div class="van-button__content"><!----><span
                                            class="van-button__text">Register</span><!----></div>
                                </button>
                              
                                <div class="van-overlay" style="z-index: 2005;  display: none" id="overlay"></div>
                                    <div data-v-a84105cc="" class="van-popup van-popup--round van-popup--bottom"
                                        style="z-index: 2010; display: none" id="popup">
                                        <div data-v-a84105cc="" class="area_pop">
                                            <div data-v-a84105cc="" class="title rel"> Choose the international area
                                                code <div data-v-a84105cc="" class="abs"><i data-v-a84105cc="" id="cancel"
                                                        class="fa-solid fa-xmark van-icon van-icon-cross"><!----></i></div>
                                            </div>
                                            <div data-v-a84105cc="" class="so db">
                                                <div data-v-a84105cc="" class="ico"></div>
                                                <div data-v-a84105cc="" class="flexs"><input data-v-a84105cc=""
                                                        type="text" placeholder="Area Code Search" id="country-search"autocomplete="off">
                                                </div><!---->

                                            </div>
                                            <ul data-v-a84105cc="">
                                            <div class="country-list" id="country-list"></div>
                                            </ul>
                                           
                                        </div>
                                    </div>
                                    </form>
                                <p data-v-7dfac6f0="">Already have an account? <span data-v-7dfac6f0=""><a href="{{route('login')}}">Login
                                        now</a></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!---->
        </div><!---->
    </div>
    @include('partials.notify')
    <script src="https://code.jquery.com//jquery-3.3.1.min.js"></script>
  
    <script>
  function togglePassword() {
    const input = document.getElementById("passwordInput");
    const icon = document.getElementById("eyeIcon");

    if (input.type === "password") {
      input.type = "text";
      icon.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKuSURBVHgB7Vi/rjlBFD73l1/PE/AEqBU8AU9ATcETUJNQU6iRUJNQU+hJqCnUFOq9+83NbGbHnNnZyL1R+JIJdmdmvznnO3/W1+Px8OiN8I/eDB9CUXg7Qv/pBZzPZzFUpNNpMf6E0P1+p8lkQovFgg6HA91uN+O8ZDJJmUyGqtUqFYtFSqVS5Iovl7C/XC40GAxoOp2yJGwAsXa77UQsktBwOKRut2skAkvAPYlEIri23+9Z0q1WSxCzAoRM43Q6eYVCAWRDw3eB1+/3vePx6HFrcW80Gom5+nr/AGJvbi1xZLBQJ7Jer9mNuIE1+l42UuRCxjd1bCL68F3lROpJQ/l8XuhAwje9EKUJEPt4PBaf0E0ulxNzOfEul0uq1WoiWgHob7fbhTRItlNAB9yJoSNdHy4WhQvVuY1Gw+wymM91U524afR6PefDrFarZ0K+qUP+tUWfLnZYcj6fe77LQvds0aRGIKI5REh/yGw2c7JOuVy2PiiO667Xq7guiitKgQSE5j+IOKiCN4ldvQaxc/CtIsqKBCoBIAhJ1QNR6V2NCFNGjrqvQi3MyPoBIV/pwY3tdkubzYbdRK3kKLQ6Op1O8B1pgANSgEqoVCr9fIkS2cNQFkjxPYIBmoOw9VJjKy9q8sUeT1GmiyxO2FLMXKSnDZV4KDE2m002P0Rtqg4Q5tbBkjbiodIBcaN0SN9CoCgdXNRhHnokRB7mQl+VSoXtGKG5er0e/M5ms6J0hGDSyF8VV5PGiBOuqWWwudCWAHWxc2RYQhwpGYHQga0sYC10xDV4tuiLbGHRvqq5RYVs5iWgQdmKmOaihVVznglOTT7EC2KmRBgFEIHQQcTl9ciJkEoMmVxGlu01CBGE7Asysiy4IBYhE0G9gKIWvvKi+BKh38Dnz4YofAhF4RsLGQ3x+nVabAAAAABJRU5ErkJggg=="; // eye closed
    } else {
      input.type = "password";
      icon.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAOESURBVHgB7VfLbdtAEF3Kn2tUAlNB6ApCAbYBn2xVELmCSBVIrsB2BbY7kE8C9IGYCswOog7CANJF37wn79JDakmRQC4J9ACC4uzuzNvZ2ZmRUgcc8J/ByRvs9/veyclJVKvVJrbxXq/nHh0dVR3HqRrZcrmcXF1dTdTfJjQYDO7xasLYBEZrhhRINiC7xuNvNpuqVanjRBgL8bxgQ0HWhsoSGuPlawNbUvgZwQO/VElg/TPW3xUhVskawO5aJKB/u6vVigSr+D0R0zge4gnEE1l0NbCRn9hkW+0jnzfIGMLutkS2k+Gp9Xpdx269+XweZMWKji2/Uqlcg8xNwmAqBAoRGo/H9Egbxn/gM5Sk+H18fEyFkSoATa4DHd+KkHIyyIx5TPzG+wwveupJTItJ0eDp6akP8i7mhDAU2gzpy3CvhLdtpHYI4ZzfSEB/MojPeDRaYYKUeo8XP60jK4i1t8YYdwWpM+ntRFCPRqO2IEPv1EycXF5ePuP7Vkz3bGT0uga9TG9LOXVBvr2tep6LDScCPSbExXB7R4y1QCKUky2kDLoI4FvmHUGKxp7SE0kKnpE6mjgVf4cQg1gauLi4eFAWkBRedymxC0JdjPF6f1YfV9+XxgzOz8+7INUVonaCEL1DNxshlLZUDkC2kyLlYQ2PqKo98CLHbDoWi4W04XNtTAjK4lyBY3stUovySPG2GSF+f7Gt1zYC84281owJqY8co+D6T6ogskjh+H0jwAZ/56iIhN0oJoScIuPFT9+OsqRkEoShwLZO24hPBhvpxoR0HgjE4L0qAQupLVj3GMC2NfCitBGXIZmHpMKb4XB4o0qSgmcepSzLO9D9XdY4OCBOAxWhMJAKseCpzNER8EYzlYsa6QoPnR7kD2LOo7xEiUzNIijai6ot2+4Dc5EkBXQMKVMnBZnJbDbryPU7tSxdbwB2fy2dEAsDte9ZBjeItHiEkL0ZMiwj6RRjbT8spEp1fQay69Q6GkgDDoh9RWK8s+W7zAbNRkqji9295vXKpiWB4VDXM0+SQqy9ZNnN7RgJ7LKjRK1JLNbNvBAxS7ui+Q+Q4+pMlkVJZfbUBrzOLJipQN1CG/bF48l/Iqz4zHFs5tR7/2TkD1n29hIieNamkuv2I1CWZl7AJNo6Pwwpc4Pxzly798jywFiBIVfK9v1RZDsynU7Der1eqCc/4IB/Hn8AUYs+0x2/60QAAAAASUVORK5CYII="; // eye open
    }
  }
    function togglePassword2() {
    const input = document.getElementById("passwordInput2");
    const icon = document.getElementById("eyeIcon2");

    if (input.type === "password") {
      input.type = "text";
      icon.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKuSURBVHgB7Vi/rjlBFD73l1/PE/AEqBU8AU9ATcETUJNQU6iRUJNQU+hJqCnUFOq9+83NbGbHnNnZyL1R+JIJdmdmvznnO3/W1+Px8OiN8I/eDB9CUXg7Qv/pBZzPZzFUpNNpMf6E0P1+p8lkQovFgg6HA91uN+O8ZDJJmUyGqtUqFYtFSqVS5Iovl7C/XC40GAxoOp2yJGwAsXa77UQsktBwOKRut2skAkvAPYlEIri23+9Z0q1WSxCzAoRM43Q6eYVCAWRDw3eB1+/3vePx6HFrcW80Gom5+nr/AGJvbi1xZLBQJ7Jer9mNuIE1+l42UuRCxjd1bCL68F3lROpJQ/l8XuhAwje9EKUJEPt4PBaf0E0ulxNzOfEul0uq1WoiWgHob7fbhTRItlNAB9yJoSNdHy4WhQvVuY1Gw+wymM91U524afR6PefDrFarZ0K+qUP+tUWfLnZYcj6fe77LQvds0aRGIKI5REh/yGw2c7JOuVy2PiiO667Xq7guiitKgQSE5j+IOKiCN4ldvQaxc/CtIsqKBCoBIAhJ1QNR6V2NCFNGjrqvQi3MyPoBIV/pwY3tdkubzYbdRK3kKLQ6Op1O8B1pgANSgEqoVCr9fIkS2cNQFkjxPYIBmoOw9VJjKy9q8sUeT1GmiyxO2FLMXKSnDZV4KDE2m002P0Rtqg4Q5tbBkjbiodIBcaN0SN9CoCgdXNRhHnokRB7mQl+VSoXtGKG5er0e/M5ms6J0hGDSyF8VV5PGiBOuqWWwudCWAHWxc2RYQhwpGYHQga0sYC10xDV4tuiLbGHRvqq5RYVs5iWgQdmKmOaihVVznglOTT7EC2KmRBgFEIHQQcTl9ciJkEoMmVxGlu01CBGE7Asysiy4IBYhE0G9gKIWvvKi+BKh38Dnz4YofAhF4RsLGQ3x+nVabAAAAABJRU5ErkJggg=="; // eye closed
    } else {
      input.type = "password";
      icon.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAOESURBVHgB7VfLbdtAEF3Kn2tUAlNB6ApCAbYBn2xVELmCSBVIrsB2BbY7kE8C9IGYCswOog7CANJF37wn79JDakmRQC4J9ACC4uzuzNvZ2ZmRUgcc8J/ByRvs9/veyclJVKvVJrbxXq/nHh0dVR3HqRrZcrmcXF1dTdTfJjQYDO7xasLYBEZrhhRINiC7xuNvNpuqVanjRBgL8bxgQ0HWhsoSGuPlawNbUvgZwQO/VElg/TPW3xUhVskawO5aJKB/u6vVigSr+D0R0zge4gnEE1l0NbCRn9hkW+0jnzfIGMLutkS2k+Gp9Xpdx269+XweZMWKji2/Uqlcg8xNwmAqBAoRGo/H9Egbxn/gM5Sk+H18fEyFkSoATa4DHd+KkHIyyIx5TPzG+wwveupJTItJ0eDp6akP8i7mhDAU2gzpy3CvhLdtpHYI4ZzfSEB/MojPeDRaYYKUeo8XP60jK4i1t8YYdwWpM+ntRFCPRqO2IEPv1EycXF5ePuP7Vkz3bGT0uga9TG9LOXVBvr2tep6LDScCPSbExXB7R4y1QCKUky2kDLoI4FvmHUGKxp7SE0kKnpE6mjgVf4cQg1gauLi4eFAWkBRedymxC0JdjPF6f1YfV9+XxgzOz8+7INUVonaCEL1DNxshlLZUDkC2kyLlYQ2PqKo98CLHbDoWi4W04XNtTAjK4lyBY3stUovySPG2GSF+f7Gt1zYC84281owJqY8co+D6T6ogskjh+H0jwAZ/56iIhN0oJoScIuPFT9+OsqRkEoShwLZO24hPBhvpxoR0HgjE4L0qAQupLVj3GMC2NfCitBGXIZmHpMKb4XB4o0qSgmcepSzLO9D9XdY4OCBOAxWhMJAKseCpzNER8EYzlYsa6QoPnR7kD2LOo7xEiUzNIijai6ot2+4Dc5EkBXQMKVMnBZnJbDbryPU7tSxdbwB2fy2dEAsDte9ZBjeItHiEkL0ZMiwj6RRjbT8spEp1fQay69Q6GkgDDoh9RWK8s+W7zAbNRkqji9295vXKpiWB4VDXM0+SQqy9ZNnN7RgJ7LKjRK1JLNbNvBAxS7ui+Q+Q4+pMlkVJZfbUBrzOLJipQN1CG/bF48l/Iqz4zHFs5tR7/2TkD1n29hIieNamkuv2I1CWZl7AJNo6Pwwpc4Pxzly798jywFiBIVfK9v1RZDsynU7Der1eqCc/4IB/Hn8AUYs+0x2/60QAAAAASUVORK5CYII="; // eye open
    }
  }
</script>

    <script>
        $(document).ready(function () {

            $('#check').click(function () {

                if ($(this).hasClass('fa-eye-slash')) {

                    $(this).removeClass('fa-eye-slash');

                    $(this).addClass('fa-eye');

                    $('#test-input').attr('type', 'text');

                } else {

                    $(this).removeClass('fa-eye');

                    $(this).addClass('fa-eye-slash');

                    $('#test-input').attr('type', 'password');
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
        $(document).ready(function () {

            $("#phone_code").click(function () {
                $("#popup").show();
                $("#overlay").show();
            });
            $("#cancel").click(function () {
                $("#popup").hide();
                $("#overlay").hide();
            });
        });
    </script>
    <?php 
$countries = \DB::table('country')
    ->select('phonecode as code', 'name', 'iso as flag')
    ->get()->map(function ($country) {
        return [
            'code' => '+' . ltrim($country->code, '+'),
            'name' => $country->name,
            'flag' => strtolower($country->flag),
        ];
    })
    ->toArray();
?>
    <script>
        const countries = <?php echo json_encode($countries, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?>;
    </script>
    <script>


        (function ($) {
            function populateList(filteredCountries) {
                const $list = $('#country-list');
                $list.empty();
                filteredCountries.forEach(country => {
                    $list.append(`
                
                                                <li data-v-a84105cc="" class="db">
                    <div class="db" data-code="${country.code}" data-flag="${country.flag}">
                        <span class="fi fi-${country.flag}"></span>
                        ${country.name} (${country.code})
                    </div>
                    </li>
                    
                `);
                });
            }

            $(document).ready(function () {
                const $popup = $('#popup');
                const $overlay = $('#overlay');
                const $search = $('#country-search');
                const $countryList = $('#country-list');
                const $phone_code = $('#phone_code');
                const $country_iso = $('#country_iso');
                populateList(countries); // Initial population of the list

                // Show popup when input is focused
                $search.on('focus', function () {
                    $popup.show();
                    $overlay.show();
                });

                // Hide popup when clicking outside
                $overlay.on('click', function () {
                    $popup.hide();
                    $overlay.hide();
                });

                // Filter the list based on search input
                $search.on('input', function () {
                    const searchTerm = $(this).val().toLowerCase();
                    const filteredCountries = countries.filter(country =>
                        country.name.toLowerCase().includes(searchTerm) || country.code.includes(searchTerm)
                    );
                    populateList(filteredCountries);
                });

                // Handle country selection
                $countryList.on('click', 'div', function () {
                    const countryCode = $(this).data('code');
                    const countryIso = $(this).data('flag'); // Correct way to get the ISO code
                    $phone_code.find('span').text(countryCode);
                    $('#country-name').val($(this).text().split('(')[0].trim());
                    $('#dial-code').val(countryCode.replace('+', ''));
                    $('#country_iso').val(countryIso.toUpperCase()); // Set the ISO code correctly
                    $popup.hide();
                    $overlay.hide();
                });
                // Hide popup when the close icon is clicked
                $('#cancel').on('click', function () {
                    $popup.hide();
                    $overlay.hide();
                });
            });
        }(jQuery));
    </script>
    <script>
        document.getElementById('form-id').addEventListener('submit', function (e) {
            const checkboxIcon = document.getElementById('checkbox-icon');

            // Check if the checkbox is in the checked state
            if (!checkboxIcon.classList.contains('van-checkbox__icon--checked')) {
                e.preventDefault(); // Prevent form submission
                iziToast.error({
                    message: 'Please check the box to continue.',
                    position: "topRight"
                });
            }
        });

        // Toggle checkbox state on click
        document.getElementById('checkbox').addEventListener('click', function () {
            const checkboxIcon = document.getElementById('checkbox-icon');
            checkboxIcon.classList.toggle('van-checkbox__icon--checked');
            checkboxIcon.classList.toggle('van-checkbox__icon--unchecked');
        });

    </script>


    <script>
        var input = document.querySelector('#phone');
        var info = document.querySelector('#info');
        var status = document.getElementById('status');
        var iti = window.intlTelInput(input, {
            initialCountry: "auto",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Load the utilities script
        });

        input.addEventListener('blur', function () {
            if (iti.isValidNumber()) {
                status.textContent = 'Valid number';
                status.className = 'valid-number';
            } else {
                status.textContent = 'Invalid number';
                status.className = 'invalid-number';
            }
        });

        input.addEventListener('countrychange', function () {
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