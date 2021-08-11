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
        <div class="titleheader">Occupant's Details</div>
    </div>

    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="/admin/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/admin/registrants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Registrants</a></li>
            <li><a class="active" href="/admin/occupantslist"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="/admin/dorms"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/admin/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
            <li><button type="submit"><a href="" style="padding-left:0%;color:red;" ><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</a></button></li>
            </form>
        </ul>
    </div>
    
    <div class="dormdeets">

    <form style="width:65%;margin-left:24%;" action="/admin/occupantdetails" method="POST">
        @csrf
        <div class="smallheader">FULL NAME</div>
        <label for="fname">First Name</label>
        <label for="mname">Midle Name</label>
        <label for="lname">Last Name</label>
        <label for="sname">Suffix (Jr,,III)</label><br>

        <input type="text"  style="width:20%;margin-right:2%;" id="fname" value="{{ $details->first_name }}" class="inputapp" readonly>
        <input type="text"  style="width:20%;margin-right:2%;" id="mname" value="{{ $details->middle_name }}"  class="inputapp" readonly>
        <input type="text"  style="width:20%;margin-right:2%;" id="lname" value="{{ $details->last_name }}"  class="inputapp" readonly>
        <input type="text"  style="width:20%;margin-right:2%;" id="sname" value="{{ $details->suffix }}"  class="inputapp" readonly><br><br>
        
        <div class="smallheader">ADDRESS</div>
        <label for="barangay">Barangay</label>
        <label for="street">Street</label>
        <label  for="city">City</label>
        <label for="province">Province</label>

        <input type="text" style="width:20%;margin-right:2%;" id="barangay" value="{{ $details->barangay }}" class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;"id="street" value="{{ $details->street }}" class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;"id="city" value="{{ $details->city }}" class="inputapp" readonly>
        <input type="text" style="width:20%;"id="province" value="{{ $details->province }}" class="inputapp" readonly><br><br>

        <div class="smallheader">CONTACT INFORMATION</div>
        <label for="email">Email</label>
        <label  for="number">Mobile Number</label>
        <label for="nameg">Name of Guardian</label>
        <label for="number">Contact of Guardian</label><br>

        <input type="email" style="width:20%;margin-right:2%;" id="email" value="{{ $details->email }}" class="inputapp" readonly>
        <input type="tel" style="width:20%;margin-right:2%;" id="number" value="{{ $details->mobile_num }}" class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;"id="nameg" value="{{ $details->guardian_name }}" class="inputapp" readonly>
        <input type="tel" style="width:20%;"id="number" value="{{ $details->guardian_num }}" class="inputapp" readonly><br><br>

        <div class="smallheader">ACADEMIC INFORMATION</div>
        <label for="fstudentid">Student Number</label>  
        <label for="college">College:</label>
        <label for="course">Course:</label><br>

        <input type="text" style="width:20%;margin-right:2%;" id="fstudentid" name="stud_num" value="{{ $details->stud_num }}" class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;" id="college" value="{{ $details->college }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;" id="course" value="{{ $details->course }}"  class="inputapp" readonly><br><br>
        
        <div class="smallheader">OTHER INFORMATION</div>
        <label  for="sex" >Sex</label>
        <label  for="sex" >Room Type</label><br>

        <input type="text" style="width:20%;margin-right:2%;" id="sec" value="{{ $details->sex }}" class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;" id="fstudentid" value="{{ $details->room_type }}" class="inputapp" readonly>

        <a href="/admin/occupantslist"><button type="button" style="margin: 5% 7% 0% 1%;float:right;"class="btndelete">CANCEL</button></a>
        <button type="button" onclick="download()" style="margin-left:0%;margin-top:5%;float:right;" class="btndownload">DOWNLOAD</button>
        <button type="submit" onclick="remove()" style="margin-left:1%;"class="btndelete">DELETE</button>
    </form>
    </div>

    </body>
</html>