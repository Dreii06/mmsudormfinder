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
        
    <div class="uppernav"><h3 style="color:#0C4B05;margin-left:20px;">MMSU - Admin Dorm Management</h3></div>
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png"  height="3%" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">REGISTRANT - Registrant Name</div>
    </div>
          
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="/admin/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a class="active" href="/admin/registrants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Registrants</a></li>
            <li><a href="/admin/occupantslist"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="/admin/dorms"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/admin/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
            <li><button type="submit"><a href="" style="padding-left:0%;color:red;" ><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</a></button></li>
            </form>
        </ul>
    </div>

    <div class="dormdeets">
    
    <form style="width:65%;margin-left:24%;" action="/admin/registrants" method="POST">
        @csrf
        
        <div class="smallheader">FULL NAME</div>
        <label for="fname">First Name</label>
        <label for="fname">Middle Name</label>
        <label for="fname">Last Name</label><br>
        
        <input type="text" id="fname" name="fname" style="width: 20%;" class="inputapp" value="{{ $details->first_name }}" readonly>
        <input type="text" id="fname" name="fname" style="width: 20%;" class="inputapp" value="{{ $details->middle_name }}" readonly>
        <input type="text" id="fname" name="fname" style="width: 20%;" class="inputapp" value="{{ $details->last_name }}" readonly><br><br>

        <div class="smallheader">OTHER INFORMATION</div>
        <label for="dname">Dorm Name</label>
        <label for="contact">Contact</label><br>
   
        <input type="tel" id="fname" name="dname" style="width: 20%;" class="inputapp" value="{{ $details->dorm_name }}" readonly>
        <input type="text" id="fname" name="contact" style="width: 20%;" class="inputapp" value="{{ $details->mobile_num }}" readonly><br>

        <a href="occupantslist"><button type="button" onclick="remove()" style="margin: 5% 7% 0% 1%;float:right;"class="btndelete">DENY</button></a>
        <button type="submit" onclick="download()"  style="margin-left:0%;margin-top:5%;float:right;"class="btndownload">ACCEPT</button>
        </div>
    </form>    
    
    </div>
        

</body>
</html>