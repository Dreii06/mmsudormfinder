<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- SCRIPT -->
        <script src="/studentDormFinder.js"></script>
        <!-- ICON -->
        <link rel="icon" href="/images/mmsu logo.png">
    </head>
    
    <body style="overflow-x:hidden;background-image: url('/images/bg.png');background-repeat: no-repeat; background-size: 100% 100%;" class="antialiased">
    <!-- HEADER / NAVIGATION BAR -->
    <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - Dorm Finder</h3> </div>
    <div class="topnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png"  height="4%" width="4%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
    <!-- END HEADER / NAVIGATION BAR -->

    <!-- REGISTRATION FORM -->
    <div class="registercontainer">

        <form id="Registration" method="POST" action="{{ route('register') }}">
            @csrf
            <legend>Registration</legend>
            <hr style="width:80%;">
            <input type="text" id="studnumber" name="stud_num" placeholder="Student Number/Examinee Number" class="loginform" style="margin-top:1vh;"> 

            <input type="text" id="fullname" name="first_name" placeholder="First Name" class="loginform" style="width:20%;margin-top:1vh;margin-right:1%;">
            <input type="text" id="fullname" name="middle_name" placeholder="Middle Name" class="loginform" style="width:20%;margin-top:10px;margin-right:1%;">
            <input type="text" id="fullname" name="last_name" placeholder="Last Name" class="loginform" style="width:20%;margin-top:10px;margin-right:1%;">
            <input type="text" id="fullname" name="suffix" placeholder="Suffix" class="loginform" style="width:15%;margin-top:10px;margin-right:1%;">

            <input type="password" id="password" name="password" placeholder="Password" class="loginform" style="margin-top:1vh;"> 
            <input type="password" id="cpassword" name="password_confirmation" placeholder="Confirm Password" class="loginform" style="margin-top:1vh;"> <br>
            <input type="email" id="email" name="email" placeholder="Email" class="loginform" style="margin-top:1vh;"> 
            <input type="text" id="mnumber" name="mobile_number" placeholder="Mobile Number" class="loginform" style="margin-top:1vh;"> <br>

            <hr style="width:80%;"><br>
            <p style="color:#053F5E;font-size:0.8vw;text-align: justify;width:80%;">By submitting this form, you agree to the collection and processing of your personal data in accordance with the policies of the Mariano Marcos State University.  
               This consent does not preclude the existence of other criteria for lawful 
               processing of personal data and does not waive any rights under the <a style="color:#28a01b;"href="https://www.officialgazette.gov.ph/2012/08/15/republic-act-no-10173/">Data Privacy Act of 2012</a> and other applicable laws.</p>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" style="color:black;"/>
            <a href="/login"><button type="submit" class="yellowbutton" style="margin-top:1vh;margin-left:0%;">{{ __('Register') }}</button></a><br>
            <a href="/login"><button type="button" id="cancel"  class="registercancelbutton">Cancel</button></a>
        </form>
    </div>
    
</body>
</html>