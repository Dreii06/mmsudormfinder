<html>
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>
        <link rel="icon" href="/images/mmsu logo.png">

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- SCRIPT -->
        <script src="/studentDormFinder.js"></script>

    </head>

    <body>
    <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - Dorm Finder</h3></div>    
    <div class="topnav" id="myTopnav">
       <img style="float:left;margin-left:20px;margin-top:5px;" src="/images/mmsu logo.png"  height="4%" width="4%">
       <a style=" text-decoration: none;width:20%;margin:0%;" href="{{ url('dashboard') }}"><h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4></a>
            <a class="topnavlink" href="/contact">CONTACT</a>
            <a class="topnavlink" href="/about">ABOUT US</a>
            <a class="topnavlink" href="/dorm">LIST OF DORMS</a>

                <div class="menu">
                <img style="float:right;margin-top:20px;" src="/images/user.png"  width="15%" height="40%">
                    <ul><li>
                    <a href="#" style="float:right;width:10vw;">{{ Auth::user()->stud_num }}</a>
                        <ul style="padding-top:2vh;margin-top:5vh;">
                        <li><a href="{{ url('profilestudent') }}">Profile</a></li><br>
                        <li><a href="{{ url('applicationlist') }}">Application List</a></li><br>
                        <li><a href="{{ url('reportdorm') }}">Report Dormitory</a></li><br>
                        <form style="display:block;" method="POST" action="{{ route('logout') }}">
                            @csrf
                        <li><button type="submit">{{ __('Log Out') }}</button></li>
                        </form>
                        </ul>
                    </ul></li>
            </div>
    </div>

    <div class="contactcontainer">
        
    <div class="boxcontact">
        <div class="contactabout">Everything You Need to Know!</div>
        <ol type="A">
            <li><b>MISSION</b></li>
                <ul>
                    <li>One of the most important missions of the OSAS is the development of student's attitudes, values, intellectual and moral commitments.</li>
                    
                </ul>
            <li><b>VISION</b></li>
                <ul>
                    <li>The OSAS shall have an integrated student services development program ready to serve the needs of the students in all MMSU campuses. This program shall provide a healthy atmosphere in the University for students to develop a well-rounded personality,
                         so they may attain their goals for success in life.</li>
                </ul>
            <li><b>GOAL</b></li>
                <ul>
                    <li>The Students Affairs and Services aims to enrich the student’s experiences and supplement the academic programs through 
                        educational, athletic, cultural, spiritual, civic and social activities.</li>
                    
                </ul>
        </ol>
    </div>

    <div class="boxcontact">
        <div class="contactabout">Credits</div>
        <ol type="A">
            <li><b>Illustration</b></li>
            <ul>
                <li>  Erwin John Ramos </li>
            </ul>
        </ol>
    </div>


</div>
<div class="imgcover">
<div class="frontcover">
</body>
</html>