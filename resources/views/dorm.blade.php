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
       <a style=" text-decoration: none;width:20%;margin:0%;" href="home"><h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4></a>
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
                        <li><a href="" ><button type="submit" style="color:red;" >{{ __('Log Out') }}</button></a></li>
                        </form>
                        </ul>
                    </ul></li>
            </div>
    </div>


        <input type="radio" name="item" checked="checked" id="section1" />
    <input type="radio" name="item" id="section2" />
    
    <nav class="nav">
      <label class="nav-item" for="section1">ON</label>
      <label class="nav-item" for="section2">OFF</label>
    </nav>

    <section>
        <h2 class="h2nav"><p class="text--sub">house facilities</p>On Campus <p class="text--normal">Pikachu is an Electric-type Pokémon introduced in Generation I. Pikachu are small, chubby, and incredibly 
          cute mouse-like Pokémon. They are almost completely covered by yellow fur.</p><p class="text--sub">CLICK BUTTONS ON THE <br>RIGHT SIDE TO CHOOSE</p><p class="text__background">ON CAMPUS</p>
          <a href="oncampus"><button type="button" class="dorm">E N T E R</button></a>
        </h2>
          <img class="__img" src="images/1.png" />
          
    </section>
   
    <section>
        <h2 class="h2nav"><p class="text--sub">house facilities</p>Off Campus <p class="text--normal">Pikachu is an Electric-type Pokémon introduced in Generation I. Pikachu are small, chubby, and incredibly 
          cute mouse-like Pokémon. They are almost completely covered by yellow fur.</p><p class="text--sub">CLICK BUTTONS ON THE <br>RIGHT SIDE TO CHOOSE</p><p class="text__background">ON CAMPUS</p>
          <a href="/offcampusdormslist"><button type="button" class="dorm">E N T E R</button></a>
        </h2>
          
          <img class="__img" src="images/2.png" />
        </section>
    
    <div class="cover"></div>

</body>
</html>