<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }} - {{ empty($title) ? config('app.name', 'Laravel') : $title }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('bt') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('bt') }}/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ url('bt') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
    #loading-wrapper {
        position: fixed;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background-color: rgba(11, 46, 19, 0.75);
    }

    #loading-text {
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        color: #999;
        width: 100px;
        height: 30px;
        margin: -7px 0 0 -45px;
        text-align: center;
        font-family: 'PT Sans Narrow', sans-serif;
        font-size: 20px;
    }

    #loading-content {
        display: block;
        position: relative;
        left: 50%;
        top: 50%;
        width: 170px;
        height: 170px;
        margin: -85px 0 0 -85px;
        border: 3px solid #F00;
    }

    #loading-content:after {
        content: "";
        position: absolute;
        border: 3px solid #0F0;
        left: 15px;
        right: 15px;
        top: 15px;
        bottom: 15px;
    }

    #loading-content:before {
        content: "";
        position: absolute;
        border: 3px solid #00F;
        left: 5px;
        right: 5px;
        top: 5px;
        bottom: 5px;
    }

    #loading-content {
        border: 3px solid transparent;
        border-top-color: #4D658D;
        border-bottom-color: #4D658D;
        border-radius: 50%;
        -webkit-animation: loader 2s linear infinite;
        -moz-animation: loader 2s linear infinite;
        -o-animation: loader 2s linear infinite;
        animation: loader 2s linear infinite;
    }

    #loading-content:before {
        border: 3px solid transparent;
        border-top-color: #D4CC6A;
        border-bottom-color: #D4CC6A;
        border-radius: 50%;
        -webkit-animation: loader 3s linear infinite;
        -moz-animation: loader 2s linear infinite;
        -o-animation: loader 2s linear infinite;
        animation: loader 3s linear infinite;
    }

    #loading-content:after {
        border: 3px solid transparent;
        border-top-color: #84417C;
        border-bottom-color: #84417C;
        border-radius: 50%;
        -webkit-animation: loader 1.5s linear infinite;
        animation: loader 1.5s linear infinite;
        -moz-animation: loader 2s linear infinite;
        -o-animation: loader 2s linear infinite;
    }

    @-webkit-keyframes loaders {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes loader {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    </style>

</head>