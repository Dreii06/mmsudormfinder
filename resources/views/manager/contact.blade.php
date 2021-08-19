<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ICON -->
        <link rel="icon" href="/images/mmsu logo.png">
        <!-- TITLE -->
        <title>MMSU - Dorm Management | Dashboard</title>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">    
    </head>
    
    <body style="background-image: url('/images/bg.png');  background-repeat: no-repeat;background-size:100% 100%;">
        <!-- HEADER -->
        <div class="uppernav"><h3>MMSU - COEDS / Proprietor Dorm Management</h3></div>
    
        <div class="topnav" id="myTopnav">
            <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png" width="3%">
            <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
            <div class="titleheader">CONTACT US</div>
        </div>    

        <!-- NAVIGATION BAR -->
        <div class="verticalnav">
            <ul>
                <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
                <li><a href="{{ url('manager/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
                <li><a href="{{ url('manager/listapplicants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
                <li><a href="{{ url('manager/listoccupants') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
                <li><a href="{{ url('manager/viewdorm/'.Auth::guard('manager')->user()->id) }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
                <li><a class="active" href="{{ url('manager/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
                <form method="POST" action="{{ route('manager.logout') }}">
                    @csrf
                    <li><button type="submit"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
                </form>
            </ul>    
        </div>

        <div class="contactcontainer">
            <div class="boxcontact">
            <h1>Frequently Asked Questions:</h1>
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
            <h1>Contact Information</h1>
                <ul style="font-family:ABold;">
                <li><img src="https://img.icons8.com/pastel-glyph/50/000000/email--v3.png"/>osas@mmsu.edu.ph</li>
                <li><img src="https://img.icons8.com/pastel-glyph/64/000000/phone-message--v1.png"/>+639358486068</li>
                </ul>
            </div>
        </div>
    </body>
</html>