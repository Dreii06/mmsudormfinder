<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Registrants</title>

        <!-- CSS -->
          <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">
        <!-- JS -->
          <script type="text/javascript" src="dormfinderadmin.js"></script>
    </head>
    
    <body class="antialiased">

    <div class="uppernav"><h3>MMSU - Admin Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
          
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="{{ url('admin/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/>Home</a></li>
            <li><a class="active" href="{{ url('admin/registrants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/>Registrants</a></li>
            <li><a href="{{ url('admin/occupantslist') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/>Occupants</a></li>
            <li><a href="{{ url('admin/dorms') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/>Dorms</a></li>
            <li><a href="{{ url('admin/reportoccupant') }}"><img src="https://img.icons8.com/fluency-systems-regular/96/000000/comments--v2.png"/>Reports</a></li>
            <li><a href="{{ url('admin/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/>Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
            <li><button type="submit" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>

    <div class="dormdeets">

    <form style="width:65%;margin-left:24vw;" action="/admin/registrants" method="POST">
        @csrf

        <div class="tableFixHeadtitle">Registrant's Details
            <a href="{{ URL::previous() }}"><button type="button" style="margin: 0vh 7vh 0vh 1vh;float:right;"class="btndelete">BACK</button></a>
        </div>

        <div style="display:flex;margin-right:5%;margin-top:3%;"><div class="smallheader">FULL NAME</div>
        <div class="smallheader">DORM NAME</div></div>

        <input type="text" id="fname" name="fname" style="width: 40%;" class="inputapp" value="{{ $details->first_name }} {{ $details->middle_name }} {{ $details->last_name }}" readonly>
        <input type="tel" id="fname" name="dorm_name" style="width: 40%;" class="inputapp" value="{{ $details->dorm_name }}" readonly>

        <div class="smallheader">CONTACT</div>
        <input type="text" id="fname" name="contact" style="width: 40%;" class="inputapp" value="{{ $details->mobile_num }}" readonly><br>

        <a href="occupantslist"><button type="button" onclick="remove()" style="margin: 5vh 10vh 0vh 1vh;float:right;"class="btndelete">DENY</button></a>
        <button type="submit" onclick="download()" name="submit" value="addOffCampus" style="width:20%;margin-left:0%;margin-top:5vh;float:right;"class="btndownload">ACCEPT</button>

        </div>
    </form>
    
    </div>
    
</body>
</html>