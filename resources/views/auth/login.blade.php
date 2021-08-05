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
    
    <body style="overflow: hidden;background-image: url('/images/bg.jpg');background-repeat: no-repeat; background-size: 100%;" class="antialiased">
        
    <div class="uppernav"> <h3 style="margin-left:20px;color:#0C4B05;">MMSU </h3><h3> - Dorm Finder</h3> </div>
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png"  height="5%" width="5%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
    
    <img style="right:30%;" class="__img" src="/images/mmsu logo.png">

        <div class="logincontainer">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <legend>Log In:</legend>
                    <input type="text" id="name" name="stud_num" placeholder="Student ID" class="loginform" style="margin-top:30px;"> <br>
                    <input type="password" name="password" id="password" placeholder="Password" class="loginform" style="margin-top:10px;"> <br>

                    <button type="submit" onclick="loginFunction()" class="yellowbutton" style="margin-left:0%;margin-top:15px;">{{ __('Log in') }}</button>
                    <hr>
            
            <label for="register" style="color:white;font-size:1vw;width:100%;text-align:center;">New Here? Register first!</label><br>
            <a href="/register"> <button type="button" id="register" class="registerbutton" style="margin-top:15px;">{{ __('Register') }}</button></a>
            </form>
        </div>
    </div>
    </body>
</html>