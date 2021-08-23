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
    
    <body class="antialiased">
    
    <div class="uppernav"><h3>MMSU - Admin Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png"  height="3%" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">{{ $dorm_name }} - Occupant's Details</div>
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
    
    <div class="dorm_details_con">

    <form action="/admin/{{ $dorm_name }}/dormoccupantdetails" method="POST">
        @csrf
        <label style="width:20%;" for="fstudentid">Student Number</label>  
        <label style="width:20%;" for="sex" >Sex</label>
        <label style="width:20%;" for="email">Email</label>
        <label style="width:20%;" for="number">Mobile Number</label><br>
        
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;" id="fstudentid" name="stud_num" value="{{ $details->stud_num }}" class="inputapp" readonly >
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;" id="sec" value="{{ $details->sex }}" class="inputapp" readonly>
        <input type="email" style="width:20%;margin-right:2%;margin-left:0%;" id="email" value="{{ $details->email }}"  class="inputapp" readonly>
        <input type="tel" style="width:20%;margin-left:0%;" id="number" value="{{ $details->mobile_num }}" class="inputapp" readonly><br><br>
        
        <label style="width:20%;" for="fname">First Name</label>
        <label style="width:20%;" for="mname">Midle Name</label>
        <label style="width:20%;" for="lname">Last Name</label>
        <label style="width:20%;" for="sname">Suffix (Jr,,III)</label><br>

        <input type="text"  style="width:20%;margin-right:2%;margin-left:0%;" id="fname" value="{{ $details->first_name }}" class="inputapp" readonly>
        <input type="text"  style="width:20%;margin-right:2%;margin-left:0%;" id="mname" value="{{ $details->middle_name }}"  class="inputapp" readonly>
        <input type="text"  style="width:20%;margin-right:2%;margin-left:0%;" id="lname" value="{{ $details->last_name }}"  class="inputapp" readonly>
        <input type="text"  style="width:20%;margin-right:2%;margin-left:0%;" id="sname" value="{{ $details->suffix }}"  class="inputapp" readonly><br><br>

        <label style="width:20%;" for="birthday">Barangay</label>
        <label style="width:20%;" for="birthday">Street</label>
        <label style="width:20%;" for="birthday">City</label>
        <label style="width:20%;" for="birthday">Province</label>

        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;" id="birthday" value="{{ $details->barangay }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="birthday" value="{{ $details->street }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="birthday" value="{{ $details->city }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-left:0%;"id="birthday" value="{{ $details->province }}" class="inputapp" readonly><br><br>

        <label class="detailslabel" for="nameg">Name of Guardian</label>
        <label class="detailslabel" for="number">Contact of Guardian</label>
        <label class="detailslabel" for="college">College:</label>
        <label class="detailslabel" for="course">Course:</label><br>

        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="nameg" value="{{ $details->guardian_name }}"  class="inputapp" readonly>
        <input type="tel" style="width:20%;margin-right:2%;margin-left:0%;"id="number" value="{{ $details->guardian_num }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="college" value="{{ $details->college }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="course" value="{{ $details->course }}"  class="inputapp" readonly><br><br>
        
        <button type="button" onclick="download()" class="btndownload">DOWNLOAD</button>
        <button type="submit" onclick="remove()" style="margin-left:1%;"class="btndelete">DELETE</button>
    </form>
    </div>

    </body>
</html>