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
    
    <body class="antialiased">
        
    <div class="uppernav"> <h3 style="margin-left:20px;color:#0C4B05;">MMSU </h3><h3> - Dorm Finder</h3> </div>
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png"  height="5%" width="5%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
            <a href="#news">CONTACT</a>
            <a href="#contact">ABOUT US</a>
            <a href="dorm">LIST OF DORMS</a>
    </div>
    
    <img style="float:left;margin-right:100px;margin-left:80px;" src="/images/mmsu logo.png"  height="80%" width="40%">

    <div class="container">
        <div class="logincontainer">
            <form id="Login" method="POST" action="{{ route('login') }}">
                        @csrf
                <legend>Log In:</legend>
                    <input type="text" id="name" name="email" :value="old('email')" placeholder="Student ID" class="loginform" style="margin-top:30px;"> <br>
                    <input type="password" name="password" id="password" placeholder="Password" class="loginform" style="margin-top:10px;"> <br>

                    <button type="submit" onclick="loginFunction()" class="yellowbutton" style="margin-top:15px; margin-bottom:50px;">{{ __('Log in') }}</button> 
            </form>
        </div>
    </div>
    </body>
</html>