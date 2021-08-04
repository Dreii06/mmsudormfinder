<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">
        <title>MMSU - Dorm Management | Dormitory</title>

        <!-- CSS -->
            <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">
        <!-- JS -->
           <script type="text/javascript" src="dormfinderadmin.js"></script>
    </head>
    
    <body  style="background-color: #0C4B05;" class="antialiased">
        
    <div class="uppernav"><h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - Admin Dorm Management</h3></div>
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png"  height="3%" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">CONTACT US</div>
    </div>

    <div class="verticalnav">
        <ul>
        <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="/admin/dashboard/"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/admin/registrants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Registrants</a></li>
            <li><a href="/admin/dorms"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a class="active" href="/admin/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <li><a href="" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>Log Out</a></li>
        </ul>    
    </div>

<div class="contactcontainer">
    <div class="boxcontact">
        <h1 style="color: #FFCD00;">Frequently Asked Questions:</h1>
        <ol type="A">
            <li><b>How to update details in Dorm?</b></li>
                <ol type="i">
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet molestie tellus, quis fringilla tortor fringilla vel. 
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi ut porta ex. Ut ullamcorper.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet molestie tellus, quis fringilla tortor fringilla vel. 
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi ut porta ex. Ut ullamcorper.</li>
                </ol>
            <li><b>How to retrieve password if forgotten?</b></li>
                <ol type="i">
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet molestie tellus, quis fringilla tortor fringilla vel. 
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi ut porta ex. Ut ullamcorper.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet molestie tellus, quis fringilla tortor fringilla vel. 
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi ut porta ex. Ut ullamcorper.</li>
                </ol>
        </ol>
    </div>

    <div class="boxcontact">
        <h1 style="color: #FFCD00;">Contact Information</h1>
        <ul>
            <li><img src="https://img.icons8.com/pastel-glyph/50/000000/email--v3.png"/>dormfinder@mmsu.edu.ph</li>
            <li><img src="https://img.icons8.com/pastel-glyph/64/000000/phone-message--v1.png"/>(SAMPLE MOBILE NUMBER)</li>
        </ul>
    </div>

</div>



</body>
</html>