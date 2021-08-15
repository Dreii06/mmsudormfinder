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
    <body style="background-color: #427604;background-image: 
                radial-gradient(at 47% 33%, hsl(88.13, 96%, 27%) 0, transparent 59%), 
                radial-gradient(at 82% 65%, hsl(88.65, 77%, 43%) 0, transparent 55%);">
        
    <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - DORM FINDER</h3></div>
    
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
                        <form style="display:block;" method="POST" action="{{ route('logout') }}">
                            @csrf
                        <li><button type="submit">{{ __('Log Out') }}</button></li>
                        </form>
                        </ul>
                    </ul></li>
            </div>
    </div>


   
        <div class="centerheader"><h2 class="h2head">SELECT TYPE OF FACILITY</h2></div>
        
        <div class="containeron">
            <img src="/images/on.png" alt="Avatar" class="image">
            <div class="onoverlay">
                <h2 class="h2campus">On Campus <p style="width:85%;color:white;" class="text--normal">Staying within the facilities owned by the
                university. Insert more information here! </p>
                <a href="{{ url('oncampusdormslist') }}"><button type="button" style="margin-left:0%;width:40%;" class="dorm">E N T E R</button></a>
                </h2>
            </div>    
        </div>

        <div class="containeroff">
            <img src="/images/off.png" alt="Avatar" class="image">
            <div class="offoverlay" >
                <h2 class="h2campus">Off Campus <p style="width:85%;color:white;" class="text--normal" >Staying within the facilities owned by local residents.
            Insert more information here! </p>
                <a href="{{ url('offcampusdormslist') }}"><button type="button" style="margin-left:0%;width:40%;" class="dorm">E N T E R</button></a>
                </h2>
            </div>    
        </div>
<div class="imgcover">
<div class="frontcover">

</body>
</html>