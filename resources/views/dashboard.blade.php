<html>
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- SCRIPT -->
        <script src="/studentDormFinder.js"></script>
        <!-- ICON -->
        <link rel="icon" href="/images/mmsu logo.png">
    </head>

    <body style="background-image: url('/images/bg.png');background-repeat: no-repeat; background-size: 100% 100%;overflow:hidden;">
        <!-- HEADER -->
        <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - Dorm Finder</h3></div>
        
        <div id="modal-1" class="modal animate-opacity">
            <div class="modal-content">
                <div class="modal-inner">
                    <span onclick="document.getElementById('modal-1').style.display='none'" class="modal-close">&times;</span>
                    <h2 style="font-family:ABolder;">NOTICE</h2>
                    <p>Before applying, make sure you have completed your profile! Follow these steps:</p>
                    <ol type="1">
                        <li>Go to <i><a href="/profilestudent">Profile</a></i></li>
                        <li>Update or fill up all the necessary fields</i></li>
                        <li>If you have already filled your profile, check available dormitories
                            at <i><a href="/dorm">List of Dorms</a></i></li>
                    </ol>
                    
                    <p>If you have applied before and want to check the status, go to <i><a href="/applicationlist">Application List</a></i></p>
                </div> 
            </div>
        </div>


        <!-- NAVIGATION BAR -->
        <div class="topnav" id="myTopnav">
            <img style="float:left;margin-left:20px;margin-top:5px;" src="/images/mmsu logo.png"  height="4%" width="4%">
            <a style=" text-decoration: none;width:20%;margin:0%;" href="{{ url('dashboard') }}"><h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4></a>
            <a class="topnavlink" href="/contact">CONTACT</a>
            <a class="topnavlink" href="/about">ABOUT US</a>
            <a class="topnavlink" href="/dorm">LIST OF DORMS</a>

            <div class="menu">
                <img style="float:right;" src="/images/user.png"  width="15%" height="35%">
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
    
        <!-- AVATAR IMAGE: right side -->
        <img style="right:2%;" class="__img" src="images/2.png" />

        <!-- MAIN CONTENT -->
        <div class="dashboard">
            <h2  class="h2nav"><p class="text--sub">welcome to </p>STUDENT HOUSE FACILITIES <p style="width:100%;" class="text--normal">With the understanding of the role that accommodation plays supporting 
                academic performance, the Mariano Marcos State University offers a decent array of accommodations for qualified students. These accommodations are made available exclusively to its residents with the goal of providing secure and comfortable safe spaces to live in during their stay in the University.</p>
                <a href="{{ url('dorm') }}"><button type="button" class="dorm">APPLY NOW</button></a>
            </h2>
        </div>

    <script>
      $(window).load(function(){
      //Disply the modal popup
        $('#myModal').modal('show');
    });
    </script>        
</body>
</html>