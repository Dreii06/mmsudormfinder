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
       <a style=" text-decoration: none;width:20%;margin:0%;" href="/dashboard"><h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4></a>
            <a class="topnavlink" href="/contact">CONTACT</a>
            <a class="topnavlink" href="/about">ABOUT US</a>
            <a class="topnavlink" href="/dorm">LIST OF DORMS</a>

                <div class="menu">
                <img style="float:right;margin-top:15px;" src="/images/user.png"  width="15%" height="40%">
                    <ul><li>
                    <a href="#" style="float:right;margin:10px 0px 0px 0px;">{{ Auth::user()->stud_num }}</a>
                        <ul>
                        <li><a href="/profilestudent">Profile</a></li><br>
                        <li><a href="/applicationlist">Application List</a></li><br>
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
        <h1 style="color:#FFCD00;">Frequently Asked Questions:</h1>
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
        <h1  style="color:#FFCD00;" >Contact Information</h1>
        <ul>
            <li><img src="https://img.icons8.com/pastel-glyph/50/000000/email--v3.png"/>dormfinder@mmsu.edu.ph</li>
            <li><img src="https://img.icons8.com/pastel-glyph/64/000000/phone-message--v1.png"/>(SAMPLE MOBILE NUMBER)</li>
        </ul>
    </div>

</div>
<div class="imgcover">
<div class="frontcover">
</body>
</html>