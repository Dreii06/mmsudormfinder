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
                
                <img style="right:5%;" class="__img" src="/images/mmsu logo.png" />

                <div class="registercontainer">

                    <form id="Registration" method="POST" action="{{ route('manager.register') }}">
                        @csrf
                    <legend>Register</legend>
                    <hr style="width:80%;">
                        <input type="text" id="username" name="email" placeholder="Email" class="loginform" style="margin-top:30px;width:25%;"> 
                        <input type="text" id="dormname" name="dorm_name" placeholder="Dorm Name" class="loginform" style="margin-top:10px;width:25%;">
                        <input type="text" id="mnumber" name="mobile_num" placeholder="Mobile Number" class="loginform" style="margin-top:10px;width:25%;"> <br>

                        <input type="text" id="fullname" name="first" placeholder="First Name" class="loginform" style="margin-top:10px;width:25%;"> 
                        <input type="text" id="fullname" name="middle" placeholder="Middle Name" class="loginform" style="margin-top:10px;width:25%;"> 
                        <input type="text" id="fullname" name="last" placeholder="Last Name" class="loginform" style="margin-top:10px;width:25%;"><br>

                        <input type="password" id="password" name="password" placeholder="Password" class="loginform" style="margin-top:10px;width:25%;"> 
                        <input type="password" id="cpassword" name="password_confirmation" placeholder="Confirm Password" class="loginform" style="margin-top:10px;width:25%;"> <br>

                        <hr style="width:80%;"><br>
                        <p style="color:white;font-size:0.8vw;text-align: justify;width:80%;">By submitting this form, you agree to the collection and processing of your personal data in accordance with the policies of the Mariano Marcos State University.  
               This consent does not preclude the existence of other criteria for lawful 
               processing of personal data and does not waive any rights under the <a style="color:#FFCD00;"href="https://www.officialgazette.gov.ph/2012/08/15/republic-act-no-10173/">Data Privacy Act of 2012</a> and other applicable laws.</p>

                        <button type="submit" class="yellowbutton" style="width:80%;margin-top:15px;">{{ __('Register') }}</button><br>
                        <button type="button" id="cancel" class="cancelbutton" style="width:80%;">Cancel</button>

                    </form>

                </div>
        
    </body>
</html>