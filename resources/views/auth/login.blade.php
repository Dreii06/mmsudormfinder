<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">
        <!-- SCRIPT -->
        <script src="/js/studentDormFinder.js"></script>

        <link rel="icon" href="/images/mmsu logo.png">
</head>
    
    <body style="overflow:hidden;background-image: url('/images/bg.png');background-repeat: no-repeat; background-size: 100%;">

<!-- UPPER HEADER -->
    <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - Dorm Finder</h3></div>
<!-- NAVIGATION BAR -->
    <div class="topnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png"  height="4%" width="4%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
    
<!-- LOGIN CONTAINER -->
    <div class="logincontainer">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <legend>Log In</legend>
                <input type="text" id="name" name="stud_num" placeholder="Student Number/Examinee Number" class="loginform" style="margin-top:15px;"> <br>
                <input type="password" name="password" id="password" placeholder="Password" class="loginform" style="margin-top:1vh;"> <br>

                <button type="submit" class="yellowbutton" style="margin-top:2vh;">{{ __('Log in') }}</button>
                
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" style="color:black;margin-top:5%;"/> 
            <hr>
                <!-- For Registration of Student -->
                <label for="register" style="font-size:1vw;width:80%;text-align:center;font-family:Regular;">New Here? Register first!</label><br>
                <a href="/register"> <button type="button" id="register" class="registerbutton" style="margin-top:2vh;">{{ __('Register') }}</button></a>
        </form>
    </div>
    
    </body>
</html>