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

    <body style="background-color: #427604;background-image: 
                radial-gradient(at 47% 33%, hsl(88.13, 96%, 27%) 0, transparent 59%), 
                radial-gradient(at 82% 65%, hsl(88.65, 77%, 43%) 0, transparent 55%);">
    
    <!-- HEADER -->
    <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - Dorm Finder</h3></div>
    
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

    <!-- BREADCRUMBS -->
    <div class="page__section">
        <nav class="breadcrumb breadcrumb_type5" aria-label="Breadcrumb">
            <ol class="breadcrumb__list r-list">
            <li class="breadcrumb__group">
                <a href="{{ url('dashboard') }}" class="breadcrumb__point r-link">Home</a>
                <span class="breadcrumb__divider" aria-hidden="true">›</span>
            </li>
            <li class="breadcrumb__group">
                <span class="breadcrumb__point" aria-current="page">Dorm</span>
            </li>
            </ol>
        </nav>
    </div>         

    <!-- SECOND HEADER -->
    <div class="centerheader"><h2 class="h2head">SELECT TYPE OF FACILITY</h2></div>
    
    <!-- MAIN CONTENT -->
            
    <!-- on campus -->
    <div class="containeron">
        <img src="/images/on.png" alt="Avatar" class="image">
        <div class="onoverlay">
            <h2 class="h2campus">On Campus <p style="width:85%;color:white;" class="text--normal">Staying within the facilities owned by the
                university. </p>
                <a href="{{ url('oncampusdormslist') }}"><button type="button" style="margin-left:0%;width:40%;" class="dorm">E N T E R</button></a>
            </h2>
        </div>    
    </div>
    
    <!-- off campus -->
    <div class="containeroff">
        <img src="/images/off.png" alt="Avatar" class="image">
        <div class="offoverlay" >
            <h2 class="h2campus">Off Campus <p style="width:85%;color:white;" class="text--normal" >Staying within the facilities owned by local residents.</p>
                <a href="{{ url('offcampusdormslist') }}"><button type="button" style="margin-left:0%;width:40%;" class="dorm">E N T E R</button></a>
            </h2>
        </div>    
    </div>
    
    <!-- GLASS MORPHISM BACKGROUND -->
    <div class="imgcover"><div class="frontcover">

</body>
</html>