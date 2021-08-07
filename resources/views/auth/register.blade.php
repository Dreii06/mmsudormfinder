<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- SCRIPT -->
        <script src="/studentDormFinder.js"></script>

        <link rel="icon" href="/images/mmsu logo.png">
    </head>
    
    <body style="overflow: hidden;background-image: url('/images/bg.png');background-repeat: no-repeat; background-size: 100% 100%;" class="antialiased">
        
    <div class="uppernav"> <h3 style="margin-left:20px;color:#0C4B05;">MMSU </h3><h3> - Dorm Finder</h3> </div>
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png"  height="5%" width="5%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
    
    <img style="right:20%;" class="__img" src="images/mmsu logo.png" />

    <div class="registercontainer">

        <form id="Registration" method="POST" action="{{ route('register') }}">
            @csrf
            <legend>Registration</legend>
            <hr>
            <input type="text" id="studnumber" name="stud_num" placeholder="Student Number" class="loginform" style="margin-top:30px;"> 

            <input type="text" id="fullname" name="first" placeholder="First Name" class="loginform" style="width:30%;margin-top:10px;margin-right:1%;">
            <input type="text" id="fullname" name="middle" placeholder="Middle Name" class="loginform" style="width:23%;margin-top:10px;margin-right:1%;">
            <input type="text" id="fullname" name="last" placeholder="Last Name" class="loginform" style="width:30%;margin-top:10px;margin-right:1%;">
            <input type="text" id="fullname" name="suffix" placeholder="Suffix" class="loginform" style="width:10%;margin-top:10px;margin-right:1%;">

            <input type="password" id="password" name="password" placeholder="Password" class="loginform" style="margin-top:10px;"> 
            <input type="password" id="cpassword" name="password_confirmation" placeholder="Confirm Password" class="loginform" style="margin-top:10px;"> <br>
            <input type="email" id="email" name="email" placeholder="Email" class="loginform" style="margin-top:10px;"> 
            <input type="text" id="mnumber" name="mobile_num" placeholder="Mobile Number" class="loginform" style="margin-top:10px;"> <br>

            <hr>
            <p style="color:white;font-size:0.8vw;text-align: justify;">By submitting this form, you agree to the collection and processing of your personal data in accordance with the policies of the Mariano Marcos State University.  
               This consent does not preclude the existence of other criteria for lawful 
               processing of personal data and does not waive any rights under the <a style="color:#FFCD00;"href="https://www.officialgazette.gov.ph/2012/08/15/republic-act-no-10173/">Data Privacy Act of 2012</a> and other applicable laws.</p>
            <a href="/login"><button type="submit" class="yellowbutton" style="margin-top:5px;margin-left:0%;">{{ __('Register') }}</button></a><br>
            <a href="/login"><button type="button" id="cancel"  class="registercancelbutton">Cancel</button></a>
        </form>
    </div>
    </body>
</html>