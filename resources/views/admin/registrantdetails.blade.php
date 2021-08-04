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
        
    <div class="uppernav"><h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - Admin Dorm Management</h3></div>
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
            <li><a href="/admin/dorms"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/admin/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <li><a href="" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>Log Out</a></li>
        </ul>
    </div>

    <div class="dorm_details_con">
    
    <form action="/admin/registrants" method="POST">
    @csrf
        <label for="fname">Manager</label>
            <input type="text" id="fname" name="name" style="width: 65%;" class="readapp" value="{{ $details->name }}" readonly="readonly"><br><br>
        <label for="fname">Dorm Name</label>
            <input type="text" id="fname" name="dorm_name" style="width: 65%;" class="readapp" value="{{ $details->dorm_name }}" readonly="readonly"><br><br>
        <label for="fname">Email</label>
            <input type="text" id="fname" name="email" style="width: 65%;" class="readapp" value="{{ $details->email }}" readonly="readonly"><br><br>
        <label for="fname">Contact Number</label>
            <input type="text" id="fname" name="contact" style="width: 65%;" class="readapp" value="{{ $details->mobile_number }}" readonly="readonly"><br><br><br>

        <div class="btndorm_container">
        <button type="submit" onclick="##" class="btndownload">ACCEPT</button>
        <a href="occupantslist"><button type="button" class="btnviewocc">DENY</button></a>
        </div>
    </form>    
    
    </div>
        

</body>
</html>