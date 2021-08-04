<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">
        <title>MMSU - Dorm Management | Applicants</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">  

        <!-- JS -->
        <script type="text/javascript" src="dormfindercoed.js"></script>
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav"><h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - COEDS / Proprietor Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">OCCUPANT - Details</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="/manager/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/manager/listapplicants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a class="active" href="/manager/listoccupants"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="/manager/viewdorm/{{ Auth::guard('manager')->user()->id }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/manager/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <li><a href="" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>Log Out</a></li>
        </ul>    
    </div>

<div class="listappcontainer">
    <form action="/manager/detailsoccupant" method="POST">
        @csrf
        <label for="fname">Full Name</label>
            <input type="text" id="fname" name="name" value="{{ $details->name }}" style="width:25%;" class="readapp" readonly="readonly">
        <label for="fstudentid">Student Number</label>
            <input type="text" id="fstudentid" value="{{ $details->stud_num }}" style="width:25%;" class="readapp" readonly="readonly"><br><br>
        <label for="gender">Sex</label>
            <input type="text" id="gender" value="{{ $details->sex }}" style="width:25%;" class="readapp" readonly="readonly">
        <label for="email">Email</label>
            <input type="email" id="email" value="{{ $details->email }}" style="width:25%;" class="readapp" readonly="readonly"><br><br>
        <label for="number">Mobile Number</label>
            <input type="tel" id="number" value="{{ $details->mobile_num }}" style="width:25%;" class="readapp" readonly="readonly">
        <label for="number">Contact of Guardian</label>
            <input type="tel" id="number" value="{{ $details->guardian_num }}" style="width:25%;" class="readapp" readonly="readonly"><br><br>
        <label for="birthday">Date of Birth</label>
            <input type="text" id="birthday" value="{{ $details->dob }}" style="width:25%;" class="readapp" readonly="readonly">
        <label for="birthday">Address</label>
            <input type="text" id="birthday" value="{{ $details->address }}" style="width:25%;" class="readapp" readonly="readonly"><br><br><br><br>
        <label for="college">College:</label>
            <input type="text" id="college" value="{{ $details->college }}" style="width:25%;" class="readapp" readonly="readonly"><br><br>
        <label for="course">Course:</label>
            <input type="text" id="course" value="{{ $details->course }}" style="width:25%;" class="readapp" readonly="readonly"><br><br>
        <label for="dormitory">Type of Room:</label>
            <input type="text" id="dormitory" value="{{ $details->room_type }}" style="width:25%;" class="readapp" readonly="readonly"><br><br><br>

        <button type="submit" onclick="remove()" class="greenbutton" style="margin-top:20px;">REMOVE</button>  
        <button type="button" onclick="listapp()" class="secondyellowbutton" style="margin-right:10px;margin-top:20px;">DOWNLOAD</button>
    </form>
</div>

</body>
</html>