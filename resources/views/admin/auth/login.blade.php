<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">  
        
    </head>

    <body style="background-image: url('/images/bg.png');  background-repeat: no-repeat;background-size:100%;" class="antialiased">
        
    <div class="uppernav"><h3 style="margin-left:1vw;">MMSU - Admin Dorm Management</h3></div>
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:1vw;" src="/images/mmsu logo.png" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
                
    <div class="logincontainer">
        <form method="POST" action="{{ route('admin.login') }}">
        @csrf
            <legend style="float:left;">Log In</legend>
                <input type="text" id="name" name="email" :value="old('email')" placeholder="Staff ID" class="loginform" style="margin-top:3vh;width:100%;"> <br>
                <input type="password" name="password" id="password" placeholder="Password" class="loginform" style="margin-top:2vh;width:100%;"> <br>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" style="color:black;margin-top:5%;"/>
                <button type="submit" class="yellowbutton" style="width:100%;margin-top:2vh; margin-bottom:5vh;">{{ __('Log in') }}</button>
        </form>
    </div>
            
    </body>
</html>