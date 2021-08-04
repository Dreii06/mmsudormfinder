<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="COEDstyle.css">  
        
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav">
        <h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - COEDS / Proprietor Dorm Management</h3>
    </div>
                <div class="topnav" id="myTopnav">
                <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
                <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
                </div>
                
                <img style="float:left;margin-right:100px;margin-left:80px;" src="/images/mmsu logo.png"  height="620" width="614">

            <div class="container">


                <div class="logincontainer">

                    <form id="Login">
                    <legend>Log In:</legend>
                        <input type="text" id="name" placeholder="Staff ID" class="loginform" style="margin-top:30px;"> <br>
                        <input type="password" id="password" placeholder="Password" class="loginform" style="margin-top:10px;"> <br>

                        <button type="button" class="yellowbutton" style="margin-top:15px; margin-bottom:50px;">Log In</button> 
                    </form>

                </div>
            </div>
    </body>
</html>
