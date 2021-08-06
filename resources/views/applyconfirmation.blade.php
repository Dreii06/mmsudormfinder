<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- JavaScript -->
        <script src="/js/studentDormFinder.js"></script>
        <link rel="icon" href="/images/mmsu logo.png">
        
    </head>
    
    <body class="antialiased">

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
                        <li><a href="applicationlist">Application List</a></li><br>
                        <form style="display:block;" method="POST" action="{{ route('logout') }}">
                            @csrf
                        <li><a href="" ><button type="submit" style="color:white;">{{ __('Log Out') }}</button></a></li>
                        </form>
                        </ul>
                    </ul></li>
            </div>
    </div>

    <div class="header">
        <h1>CONFIRMATION</h1>
    </div>

    <div class="profile_con">
    <form action="/applyconfirmation/{id}" method="POST">
    @csrf
        <h2 style="color:#0C4B05;">SELECT DESIRED ROOM TYPE:</h2>
        <label  for="dorm">Dormitory</label>
        <label  for="room">Type of Room</label>
        <label for="contract">Contract</label><br>

        <input type="text" id="dorm" name="dorm" value="{{ $details->dorm_name }}" style="width:20%;margin-right:2%;" class="inputapp">
        <select name="room_type" id="room" style="width:20%;margin-right:2%;" class="inputapp">
            <option selected disable hidden>Choose your room type</option>
            @foreach($room_types as $types)
            <option value="{{ $types->room_type }}">{{ $types->room_type }}</option>
            @endforeach
        </select>
        <a href="/sampledoc.pdf" download><button type="button" id="contract" class="contractbutton"  > DOWNLOAD FILE</button></a>
        
        <div style="display:flex;width:100%;">
        <p class="note"> NOTE: Before confirming, kindly check the contract for the terms of service.</p>
       
        <button type="submit"class="secondyellowbutton" style="margin-top:20px;margin-right:10px;margin-left:10%;"> CONFIRM</button>
        <a href="home"><button type="button" class="cancelbutton">CANCEL</button></a>
        
        </div>
    </div>
    </form>

    </body>
</html>