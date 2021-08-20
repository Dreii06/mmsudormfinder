<html>
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- SCRIPT -->
        <script src="/studentDormFinder.js"></script>

        
        <link rel="icon" href="/images/mmsu logo.png">
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
                    <a href="#" style="float:right;margin:10px 0px 0px 0px;">{{ Auth::user()->stud_num }}</a>
                        <ul>
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
            <div class="contactabout">Frequently Asked Questions</div>
            <ol type="A">
            <li><b>How to apply in a Dorm?</b></li>
                <ol type="1">
                    <li>Simply click <i>Apply</i> on the Dashboard or click <i>List of Dorms</i> on the Navigation Bar.</li>
                    <li>Choose your desired Dormitory on the list, click <i>View</i> to see the full details.</li>
                    <li>Click Apply and after that it will lead you to the Application List!</li>
                </ol>
            <li><b>How to retrieve password if forgotten?</b></li>
                <ul>
                    <li>If password is forgotten, kindly message the given contact information for the retrieval of your account.</li>
                </ul>
            </ol>
        </div>

        <div class="boxcontact">
            <div class="contactabout">Contact Us</div>
            <ul style="color:#053F5E;font-family:ABold;">
                <li ><img src="https://img.icons8.com/pastel-glyph/50/000000/email--v3.png"/>osas@mmsu.edu.ph</li>
                <li><img src="https://img.icons8.com/pastel-glyph/64/000000/phone-message--v1.png"/>+639358486068</li>
            </ul>
    </div>

</div>
<div class="imgcover">
</body>
</html>