<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Occupants</title>

        <!-- CSS -->
            <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">

        <!-- JS -->
          <script type="text/javascript" src="dormfinderadmin.js"></script>
        
    </head>
    
    <body>
    
    <div class="uppernav"><h3>MMSU - Admin Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>

    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="{{ url('admin/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/>Home</a></li>
            <li><a href="{{ url('admin/registrants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/>Registrants</a></li>
            <li><a class="active" href="{{ url('admin/occupantslist') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/>Occupants</a></li>
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
    <form style="width:80%;margin-left:24%;margin-top:10vh;" action="/admin/occupantdetails" method="POST">
    <div class="tableFixHeadtitle">Occupant's Details
        <a href="{{ URL::previous() }}"><button type="button" style="margin: 0% 7% 0% 1%;float:right;"class="btndelete">BACK</button></a>
    </div>

        @csrf
        <div style="display:flex;"> <div class="smallheader">FULL NAME</div>
        <div class="smallheader">ADDRESS</div></div>

        <input type="text"  style="width:40%;margin-right:4vw;" id="fname" value="{{ $details->first_name }} {{ $details->middle_name }} {{ $details->last_name }} {{ $details->suffix }}" class="inputapp" readonly>
        <input type="text" style="width:40%;" id="barangay" value="{{ $details->barangay }} {{ $details->street }} {{ $details->city }}, {{ $details->province }}" class="inputapp" readonly><br><br>
        
        <div style="display:flex;"> <div class="smallheader">CONTACT INFORMATION</div>
        <div class="smallheader">CONTACT GUARDIAN</div></div>

        <input type="email" style="width:25%;margin-right:1vw;" id="email" value="{{ $details->email }}" class="inputapp" readonly>
        <input type="tel" style="width:13%;margin-right:4vw;" id="number" value="{{ $details->mobile_num }}" class="inputapp" readonly>
  
        <input type="text" style="width:25%;margin-right:1vw;"id="nameg" value="{{ $details->guardian_name }}" class="inputapp" readonly>
        <input type="tel" style="width:13%;margin-right:4vw;"id="number" value="{{ $details->guardian_num }}" class="inputapp" readonly><br><br>

        <div style="display:flex;"> <div class="smallheader">ACADEMIC INFORMATION</div>
        <div class="smallheader">OTHER INFORMATION</div></div>
        <input type="text" style="width:10%;margin-right:1vw;" id="fstudentid" name="stud_num" value="{{ $details->stud_num }}" class="inputapp" readonly>
        <input type="text" style="width:5%;margin-right:1vw;" id="college" value="{{ $details->college }}"  class="inputapp" readonly>
        <input type="text" style="width:21%;margin-right:4vw;" id="course" value="{{ $details->course }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2vw;" id="sec" value="{{ $details->sex }}" class="inputapp" readonly>

    </form>
    </div>

    </body>
</html>