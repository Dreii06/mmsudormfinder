<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dormitories</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">
        
        <!-- JS -->
        <script type="text/javascript" src="dormfindercoed.js"></script>
    </head>
    
    <body style="overflow:hidden;">
    
    <div class="uppernav"><h3>MMSU - Admin Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">DORMITORIES</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="{{ url('admin/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/>Home</a></li>
            <li><a href="{{ url('admin/registrants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/>Registrants</a></li>
            <li><a href="{{ url('admin/occupantslist') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/>Occupants</a></li>
            <li><a class="active" href="{{ url('admin/dorms') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/>Dorms</a></li>
            <li><a href="{{ url('admin/reportoccupant') }}"><img src="https://img.icons8.com/fluency-systems-regular/96/000000/comments--v2.png"/>Reports</a></li>
            <li><a href="{{ url('admin/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/>Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
            <li><button type="submit" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>

<div style="margin-top:8%;">
        <h2 class="h2head">SELECT DORMITORY TYPE</h2>

        <div class="dorm_con">

        <div class="containeron">
            <img src="/images/on.png" alt="Avatar" class="image">
            <div class="onoverlay">
                <h2 style="margin-left:10%;margin-right:5%;" class="h2nav">On Campus 
                <p style="width:90%;" class="text--normal">Staying within the facilities owned by the university. Insert more information here! </p>
                <a href="{{ url('admin/oncampusdorms') }}"><button type="button" style="margin-left:0%;width:40%;" class="dorm">E N T E R</button></a>
                </h2>
            </div>    
        </div>

        <div class="containeroff">
            <img src="/images/off.png" alt="Avatar" class="image">
            <div class="offoverlay">
                <h2 style="margin-left:10%;margin-right:5%;" class="h2nav">Off Campus 
                <p style="width:90%;" class="text--normal">Staying within the facilities owned by local residents. Insert more information here! </p>
                <a href="{{ url('admin/offcampusdorms') }}"><button type="button" style="margin-left:0%;width:40%;" class="dorm">E N T E R</button></a>
                </h2>
            </div>    
        </div>


        <img  style="right:0%;" class="__imgonoff" src="/images/1.png" /> 

    <div class="frontcover"></div>
    <div class="cover"></div>
</div>
    </body>
</html>