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
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
            <li><a href=""><button type="submit" style="padding-left:0%;color:red;" ><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></a></li>
            </form>
        </ul>    
    </div>

<div class="listappcontainer">
    <form action="/manager/detailsoccupant" method="POST">
        @csrf
        <label class="detailslabel" for="fstudentid">Student Number</label>  
        <label class="detailslabel" for="sex" >Sex</label>
        <label class="detailslabel" for="email">Email</label>
        <label class="detailslabel" for="number">Mobile Number</label><br>

        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;" id="fstudentid" name="stud_id" value="{{ $details->stud_num }}" class="inputapp" readonly >
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;" id="sec" name="sex" value="{{ $details->sex }}" class="inputapp" readonly>
        <input type="email" style="width:20%;margin-right:2%;margin-left:0%;" id="email" name="email" value="{{ $details->email }}"  class="inputapp" readonly>
        <input type="tel" style="width:20%;margin-left:0%;" id="number" name="mobile_num" value="{{ $details->mobile_num }}" class="inputapp" readonly><br><br>

        <label class="detailslabel" for="fname">First Name</label>
        <label class="detailslabel" for="mname">Midle Name</label>
        <label class="detailslabel" for="lname">Last Name</label>
        <label class="detailslabel" for="sname">Suffix (Jr,,III)</label><br>

        <input type="text"  style="width:20%;margin-right:2%;margin-left:0%;" id="fname" name="first" value="{{ $details->first_name }}" class="inputapp" readonly>
        <input type="text"  style="width:20%;margin-right:2%;margin-left:0%;" id="mname" name="middle" value="{{ $details->middle_name }}"  class="inputapp" readonly>
        <input type="text"  style="width:20%;margin-right:2%;margin-left:0%;" id="lname" name="last" value="{{ $details->last_name }}"  class="inputapp" readonly>
        <input type="text"  style="width:20%;margin-right:2%;margin-left:0%;" id="sname" name="suffix" value="{{ $details->suffix }}"  class="inputapp" readonly><br><br>

        <label class="detailslabel" for="birthday">Barangay</label>
        <label class="detailslabel" for="birthday">Street</label>
        <label class="detailslabel" for="birthday">City</label>
        <label class="detailslabel" for="birthday">Province</label>

        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;" id="birthday" name="barangay" value="{{ $details->barangay }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="birthday" name="street" value="{{ $details->street }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="birthday" name="city" value="{{ $details->city }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-left:0%;"id="birthday" name="province" value="{{ $details->province }}" class="inputapp" readonly><br><br>

        <label class="detailslabel" for="nameg">Name of Guardian</label>
        <label class="detailslabel" for="number">Contact of Guardian</label>
        <label class="detailslabel" for="college">College:</label>
        <label class="detailslabel" for="course">Course:</label><br>

        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="nameg" name="guardian_name" value="{{ $details->guardian_name }}"  class="inputapp" readonly>
        <input type="tel" style="width:20%;margin-right:2%;margin-left:0%;"id="number" name="guardian_num" value="{{ $details->guardian_num }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="college" name="college" value="{{ $details->college }}"  class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="course" name="course" value="{{ $details->course }}"  class="inputapp" readonly><br><br>

        <label class="detailslabel" for="room">Room Type</label><br>
        <input type="text" style="width:20%;margin-right:2%;margin-left:0%;"id="nameg" name="room_type" value="{{ $details->room_type }}"  class="inputapp" readonly><br>

        <button type="submit" onclick="remove()" class="greenbutton" style="margin-top:20px;">REMOVE</button>  
        <button type="button" onclick="listapp()" class="secondyellowbutton" style="margin-right:10px;margin-top:20px;">DOWNLOAD</button>
    </form>
</div>

</body>
</html>