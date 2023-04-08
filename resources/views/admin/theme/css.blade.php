
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/minty/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('admin/assets/js/plugins/select2/css/select2.min.css')}}">
<!-- Icons -->
<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
<link rel="shortcut icon" href="{{asset('admin/assets/media/favicons/favicon.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('admin/assets/media/favicons/favicon-192x192.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin/assets/media/favicons/apple-touch-icon-180x180.png') }}">
<!-- END Icons -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

<link rel="stylesheet" href="{{asset('admin/assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">



<!-- Stylesheets -->
<!-- Fonts and Dashmix framework -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
<link rel="stylesheet" id="css-main" href="{{asset('admin/assets/css/dashmix.min.css')}}">
<link rel="stylesheet"  href="{{asset('admin/assets/css/custom.css')}}">
<link href="{{asset('admin/assets/krajee_css/theme.css')}}" rel="stylesheet" />
<link href="{{asset('admin/assets/krajee_css/fileinput.css')}}" rel="stylesheet" />
<!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
<!-- END Stylesheets -->

<style>
    .custom-control-label {
        margin-bottom: 7px;
    }
    .select2-container {
        padding: 0;
        border: none;
    }
    h3{margin-bottom:0;}
    .card{box-shadow: 0 0 13px 0 rgba(82,63,105,.05);background-color: #fafafa;margin-bottom: 20px;border-radius: 4px;padding: 20px;}
    .select2-choice {
        display: block;
        width: 100%;
        height: calc(1.5em + .75rem + 2px) !important;
        padding: .375rem .75rem !important;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5 !important;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    #overlay {
        background:rgba(0,0,0,0.6);
        color: #fff;
        position: fixed;
        height: 100%;
        width: 100%;
        z-index: 5000;
        top: 0;
        left: 0;
        float: left;
        text-align: center;
        padding-top: 20%;
        filter: blur(1px);

    }


    .lds-roller {
        display: inline-block;
        position: relative;
        width: 50px;
        height: 50px;
        text-align: center;
        margin-left: 40%;
        display: none;
    }
    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
    }
    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background:#1F75D5;
        margin: -4px 0 0 -4px;
    }
    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }
    .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
    }
    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }
    .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
    }
    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }
    .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
    }
    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }
    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }
    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }
    .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
    }
    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }
    .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
    }
    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }
    .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
    }
    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }
    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
    }
    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }


</style>
