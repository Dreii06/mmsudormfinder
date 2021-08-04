<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css"> 
        <!-- JavaScript -->
        <script src="/dormfindercoed.js"></script> 
        
    </head>
    
    <body style="background-image: url('/images/bg.jpg');  background-repeat: no-repeat;background-size:100% 100%;" class="antialiased">
        
    <div class="uppernav">
        <h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - COEDS / Proprietor Dorm Management</h3>
    </div>
                <div class="topnav" id="myTopnav">
                <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
                <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
                </div>
                
                <img style="right:21%;" class="__img" src="images/mmsu logo.png" />

                <div class="registercontainer">

                    <form id="Registration" method="POST" action="{{ route('manager.register') }}">
                    @csrf
                    <legend>Register</legend>
                    <hr>
                        <input type="text" id="username" name="email" placeholder="Username" class="loginform" style="margin-top:30px;"> 
                        <input type="text" id="fullname" name="name" placeholder="Full Name" class="loginform" style="margin-top:10px;"> <br>

                        <input type="password" id="password" name="password" placeholder="Password" class="loginform" style="margin-top:10px;"> 
                        <input type="password" id="cpassword" name="password_confirmation" placeholder="Confirm Password" class="loginform" style="margin-top:10px;"> <br>
                        <input type="text" id="dormname" name="dorm_name" placeholder="Dorm Name" class="loginform" style="margin-top:10px;"> 
                        <input type="text" id="mnumber" name="mobile_number" placeholder="Mobile Number" class="loginform" style="margin-top:10px;"> <br>

                        <button type="submit" class="yellowbutton" style="margin-left:30%;margin-top:15px;">{{ __('Register') }}</button><br>
                        <button type="button" id="cancel" class="cancelbutton" style="margin-left:30%;">Cancel</button>

                    </form>

                </div>
        
    </body>
</html>