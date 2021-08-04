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
    
    <div class="uppernav"><h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - Admin Dorm Management</h3></div>
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png"  height="3%" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">{{ $dorm_name }} - Occupant's Details</div>
    </div>

    <div class="verticalnav">
        <ul>
        <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="/admin/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/admin/registrants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Registrants</a></li>
            <li><a class="active" href="/admin/dorms"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/admin/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <li><a href="" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>Log Out</a></li>
        </ul>    
    </div>
    <div class="dorm_details_con">

    <form action="/admin/{{ $dorm_name }}/occupantdetails" method="POST">
        @csrf
        <label for="fname">Full Name</label>
            <input type="text" id="fname" name="name" value="{{ $details->name }}" style="width: 25%;" class="inputapp">
        <label style="margin-left:30px;" for="fstudentid">Student Number</label>
            <input type="text" id="fstudentid" value="{{ $details->stud_num }}" style="width: 25%;" class="inputapp" ><br><br>
        <label for="sex">Sex</label>
            <input type="text" id="sex" value="{{ $details->sex }}" style="width: 25%;" class="inputapp">
        <label style="margin-left:30px;" for="email">Email</label>
            <input type="email" id="email" value="{{ $details->email }}" style="width: 25%;" class="inputapp"><br><br>
        <label for="number">Mobile Number</label>
            <input type="tel" id="number" value="{{ $details->mobile_num }}" style="width: 25%;" class="inputapp">
        <label style="margin-left:30px;" for="number">Contact of Guardian</label>
            <input type="tel" id="number" value="{{ $details->guardian_num }}" style="width: 25%;" class="inputapp"><br><br>
        <label for="birthday">Date of Birth</label>
            <input type="date" id="birthday" value="{{ $details->dob }}" style="width: 25%;" class="inputapp">
        <label style="margin-left:30px;" for="address">Address</label>
            <input type="text" id="address" value="{{ $details->address }}" style="width: 25%;" class="inputapp"><br><br><br><br>
        <label for="college">College</label>
            <input type="text" id="college" value="{{ $details->college }}" style="width: 25%;" class="inputapp">
        <label style="margin-left:30px;" for="birthday">Course</label>
            <input type="text" id="birthday" value="{{ $details->course }}" style="width: 25%;" class="inputapp"><br><br>
        <label for="dorm">Dormitory</label>
            <input type="text" id="dorm" value="{{ $details->dormitory }}" style="width: 25%;" class="inputapp">
        <label style="margin-left:30px;" for="room">Room Type</label>
            <input type="text" id="room" value="{{ $details->room_type }}" style="width: 25%;" class="inputapp"><br><br><br><br>
        
        <button type="button" onclick="download()" class="btndownload">DOWNLOAD</button>
        <button type="submit" onclick="remove()" style="margin-left:1%;"class="btndelete">DELETE</button>
    </form>
    </div>

        </body>
    </head>
</html>