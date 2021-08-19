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
        
    <div class="uppernav"><h3>MMSU - COEDS / Proprietor Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="{{ url('manager/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a class="active" href="{{ url('manager/listapplicants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="{{ url('manager/listoccupants') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="{{ url('manager/viewdorm/'.Auth::guard('manager')->user()->id) }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="{{ url('manager/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
                <li><button type="submit"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>    
    </div>

<div class="listappcontainer">
    <form action="/manager/detailsapplicant/{{ $details->id }}" method="POST">
    @csrf

    <div class="tableFixHeadtitle">Applicant's Details
        <a href="{{ url('manager/listapplicants') }}"><button type="button" style="margin: 0% 7% 0% 1%;float:right;"class="btndelete">BACK</button></a>
    </div>

    <div style="display:flex;"><div class="smallheader">FULL NAME</div>
    <div class="smallheader">ADDRESS</div></div>

        <input type="text"  style="width:45%;margin-right:5%;" id="fname" name="name" value="{{ $details->first_name }} {{ $details->middle_name }} {{ $details->last_name }} {{ $details->suffix }}" class="inputapp" readonly>
        <input type="text" style="width:45%;" id="barangay" name="address" value="{{ $details->barangay }} {{ $details->street }} {{ $details->city }}, {{ $details->province }}" class="inputapp" readonly>
     

        <div style="display:flex;"><div class="smallheader">CONTACT INFORMATION</div>
        <div class="smallheader">CONTACT GUARDIAN</div></div>

        <input type="email" style="width:30%;margin-right:1%;" id="email" name="email" value="{{ $details->email }}" class="inputapp" readonly>
        <input type="tel" style="width:13.5%;margin-right:5%;" id="number" name="mobile_num" value="{{ $details->mobile_num }}" class="inputapp" readonly>
        <input type="text" style="width:20%;margin-right:1%;"id="nameg" name="guardian_name" value="{{ $details->guardian_name }}" class="inputapp" readonly>
        <input type="tel" style="width:20%;"id="number" name="guardian_num" value="{{ $details->guardian_num }}" class="inputapp" readonly>

        
        <div style="display:flex;"><div class="smallheader">ACADEMIC INFORMATION</div>
        <div class="smallheader">ROOM TYPE</div></div>

        <input type="text" style="width:12%;margin-right:1%;" id="fstudentid" name="stud_id" value="{{ $details->stud_num }}" class="inputapp" readonly>
        <input type="text" style="width:7%;margin-right:1%;" id="college" name="college" value="{{ $details->college }}" class="inputapp" readonly>
        <input type="text" style="width:23%;margin-right:5%;"id="course" name="course" value="{{ $details->course }}" class="inputapp" readonly>
        <input type="text" style="width:20%;" id="fstudentid" name="room_type" value="{{ $details->room_type }}" class="inputapp" readonly>

        <div style="display:flex;"><div class="smallheader">OTHER INFORMATION</div></div>
        <input type="text" style="width:20%;margin-right:2%;" id="sec" name="sex" value="{{ $details->sex }}" class="inputapp" readonly>

        <button type="submit" name="submit" value="DENY" onclick="denyapplicant()" class="greenbutton" style="margin-top:0px;margin-right:10%;">DENY</button>  
        <button type="submit" name="submit" value="ACCEPT" onclick="acceptapplicant()" class="secondyellowbutton" style="margin-right:10px;margin-top:0%;">ACCEPT</button>
    </form>
</div>

</body>
</html>