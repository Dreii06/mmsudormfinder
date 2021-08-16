<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">  
        
    </head>
    
    <body style="background-image: url('/images/bg.png');  background-repeat: no-repeat;background-size:100%;overflow:hidden;" class="antialiased">
        
        <div class="uppernav">
            <h3 style="margin-left:20px;">MMSU - COEDS / Proprietor Dorm Management</h3>
        </div>
    
        <div class="topnav" id="myTopnav">
            <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png" width="3%">
            <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        </div>
                
        <div class="logincontainer">

            <form id="login" method="POST" action="{{ route('manager.login') }}">
                @csrf
                <legend style="float:left;">Log In</legend>
                    <input type="text" id="name" name="email" :value="old('email')" placeholder="Staff ID" class="loginform" style="margin-top:30px;"> <br>
                    <input type="password" id="password" name="password" placeholder="Password" class="loginform" style="margin-top:10px;"> <br>

                    <button type="submit" class="yellowbutton" style="width:80%;margin-top:15px;">{{ __('Log in') }}</button><br>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" style="color:black;margin-top:5%;"/>
                        <hr>
                    <label for="register">New Here? Register first!</label><br>
                    <a href="/manager/register"><button type="button" id="register" class="registerbutton" style="margin-top:15px;">{{ __('Register') }}</button></a>       
            </form>

        </div>
    </body>
</html>