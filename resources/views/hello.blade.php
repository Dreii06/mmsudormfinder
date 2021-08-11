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

    <body style="background-image: url('/images/bg.jpg');background-repeat: no-repeat; background-size: 100% 100%;">
    <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - Dorm Finder</h3></div>
    
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
                        <li><a href="">Log Out</a></li>
                        </ul>
                    </ul></li>
            </div>
    </div>

    <img style="z-index: 2;right:10%;" class="__img" src="images/mmsu logo.png" />
    <input type="radio" name="item" checked="checked" id="section1" />
    

    <section style="width: 70%;margin-left:0%;padding-bottom:5%;">
        <h2 class="h2nav"><p class="text--sub">welcome !</p>STUDENT HOUSE<br> FACILITIES <p class="text--normal">With the understanding of the role that accommodation plays supporting 
            academic performance, the Mariano Marcos State University offers a decent array of accommodations for qualified students. These accommodations are made available exclusively to its residents with the goal of providing secure and comfortable safe spaces to live in during their stay in the University.</p>
          <a href="dorm"><button type="button" style="margin-top:1%;" class="dorm">A P P L Y</button></a>
        </h2>
    </section>

   

    

  
</body>
</html>