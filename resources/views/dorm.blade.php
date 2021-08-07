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
    <body style="overflow: hidden;" >
        
    <div class="uppernav"> <h3 style="margin-left:20px;color:#0C4B05;">MMSU </h3><h3> - Dorm Finder</h3></div>
    
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
                        <li><a href="" ><button type="submit" style="color:white;">{{ __('Log Out') }}</button></a></li>
                        </form>
                        </ul>
                    </ul></li>
            </div>
    </div>


    <div style="width:100%;display:flex;">

<div class="centerheader"><p class="text--sub">choose type of housing facility:</p></div>

    <div class="onslider">
        <h2 class="h2nav">On Campus <p class="text--normal">Staying within the facilities owned by the
        university.</p><p class="text__background">ON CAMPUS</p>
          <a href="/oncampusdormslist"><button type="button" style="margin-left:0%;width:50%;" class="dorm">E N T E R</button></a>
        </h2>
          <img style="right: 60%;" class="__img" src="/images/1.png" />
          
    </div>
   
    <div class="offslider">
        <h2 class="h2nav">Off Campus <p class="text--normal">Staying within the facilities owned by the
        university. </p><p class="text__background">OFF CAMPUS</p>
          <a href="/offcampusdormslist"><button type="button" style="margin-left:0%;width:40%;" class="dorm">E N T E R</button></a>
        </h2>
          
          <img  style="right: 1%;" class="__img" src="/images/2.png" />
    </div>
</div> 

</body>
</html>