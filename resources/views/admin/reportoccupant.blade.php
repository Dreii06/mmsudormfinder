<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">
        
        <!-- JS -->
        <script type="text/javascript" src="dormfindercoed.js"></script>
        
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav"><h3>MMSU - Admin Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">FEEDBACK OF OCCUPANTS</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="{{ url('admin/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/>Home</a></li>
            <li><a href="{{ url('admin/registrants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/>Registrants</a></li>
            <li><a href="{{ url('admin/occupantslist') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/>Occupants</a></li>
            <li><a href="{{ url('admin/dorms') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/>Dorms</a></li>
            <li><a class="active" href="{{ url('admin/reportoccupant') }}"><img src="https://img.icons8.com/fluency-systems-regular/96/000000/comments--v2.png"/>Reports</a></li>
            <li><a href="{{ url('admin/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/>Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
            <li><button type="submit" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>

    @foreach($reports as $report)
    <div class="dormdeets" style="padding-top:7%;">

        <form class="feedbackcon" action="/admin/reportoccupant/{{ $report->id }}" method="POST">
            @csrf
            <label style="width:20%;" for="fstudentid">Student Number</label>  
            <label style="width:40%;" for="name" >Name</label>
            <label style="width:25%;" for="number">Mobile Number</label><br>
           
            <input type="text" style="width:20%;margin-right:2%;margin-left:0%;" id="fstudentid" name="stud_num" value="{{ $report->stud_num }}" class="inputapp" readonly >
            <input type="text" style="width:40%;margin-right:2%;margin-left:0%;" id="sec" value="{{ $report->first_name }} {{ $report->middle_name }} {{ $report->last_name }} {{ $report->suffix }}" class="inputapp" readonly>
            <input type="tel" style="width:25%;margin-left:0%;" id="number" value="{{ $report->mobile_num }}" class="inputapp" readonly><br><br>

            <label style="width:43%;" for="email">Dormitory</label>
            <label style="width:45%;" for="email">Reason of Report</label><br>

            <input type="text" style="width:43%;margin-right:2%;margin-left:0%;" id="fstudentid" name="stud_num" value="{{ $report->dormitory }}" class="inputapp" readonly>
            <input type="text" style="width:45%;margin-right:2%;margin-left:0%;" id="fstudentid" name="stud_num" value="{{ $report->reason }}" class="inputapp" readonly><br><br>

            <label style="width:20%;" for="number">Comment</label><br>
            <textarea id="feedback" readonly style="width:91%;border-radius:10px;text-indent:1%;">{{ $report->report }}</textarea><br><br>

            <button type="submit" style="float:right;margin-right:8%;margin-bottom:2%;" class="yellowbutton">DONE</button>
        </form>
    </div>
    @endforeach
        <div class="frontcover"></div>
        <div class="cover"></div>

</body>
</html>