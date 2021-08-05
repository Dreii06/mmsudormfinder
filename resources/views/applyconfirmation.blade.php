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
                        <li><a href="welcome">Log Out</a></li>
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
        <label for="fstudentid">Student Number</label>  
        <label  for="sex" >Sex</label>
        <label for="email">Email</label>
        <label  for="number">Mobile Number</label><br>

        <input type="text" style="width:20%;margin-right:2%;" name="stud_id" id="fstudentid" value="{{ Auth::user()->stud_num }}" class="inputapp" readonly >
        <input type="text" style="width:20%;margin-right:2%;" name="sex" id="sec" value="{{ Auth::user()->sex }}" class="inputapp" readonly>
        <input type="email" style="width:20%;margin-right:2%;" name="email" id="email" value="{{ Auth::user()->email }}"  class="inputapp" readonly>
        <input type="tel" style="width:20%;" name="mobile" id="number" value="{{ Auth::user()->mobile_num }}" class="inputapp" readonly><br><br>

        <label for="fname">First Name</label>
        <label for="mname">Midle Name</label>
        <label for="lname">Last Name</label>
        <label for="sname">Suffix (Jr,,III)</label><br>

        <input type="text" style="width:20%;margin-right:2%;" id="fname" name="first" value="{{ Auth::user()->first_name }}" class="inputapp">
        <input type="text" style="width:20%;margin-right:2%;" id="mname" name="middle" value="{{ Auth::user()->middle_name }}"  class="inputapp">
        <input type="text" style="width:20%;margin-right:2%;" id="lname" name="last" value="{{ Auth::user()->last_name }}"  class="inputapp">
        <input type="text" style="width:20%;margin-right:2%;" id="sname" name="suffix" value="{{ Auth::user()->suffix }}"  class="inputapp"><br><br>

        <label for="birthday">Barangay</label>
        <label for="birthday">Street</label>
        <label  for="birthday">City</label>
        <label for="birthday">Province</label>

        <input type="text" style="width:20%;margin-right:2%;" id="birthday" name="barangay" value="{{ Auth::user()->barangay }}"  class="inputapp">
        <input type="text" style="width:20%;margin-right:2%;"id="birthday" name="street" value="{{ Auth::user()->street }}"  class="inputapp">
        <input type="text" style="width:20%;margin-right:2%;"id="birthday" name="city" value="{{ Auth::user()->city }}"  class="inputapp">
        <input type="text" style="width:20%;"id="birthday" name="province" value="{{ Auth::user()->province }}" class="inputapp"><br><br>

        <label for="nameg">Name of Guardian</label>
        <label for="number">Contact of Guardian</label>
        <label for="college">College:</label>
        <label for="course">Course:</label><br>

        <input type="text" style="width:20%;margin-right:2%;"id="nameg" name="guardian_name" value="{{ Auth::user()->guardian_name }}"  class="inputapp">
        <input type="tel" style="width:20%;margin-right:2%;"id="number" name="guardian_num" value="{{ Auth::user()->guardian_num }}"  class="inputapp">
        <select name="college" style="width:20%;margin-right:2%;"id="room" class="inputapp">
            <option value="{{ Auth::user()->college }}">{{ Auth::user()->college }}</option>
            <option value="CAS">CAS</option>
            <option value="COE">COE</option>
            <option value="CBEA">CBEA</option>
            <option value="CHS">CHS</option>
        </select>
        <input type="text" style="width:20%;margin-right:2%;"id="course" name="course" value="{{ Auth::user()->course }}"  class="inputapp"><br><br>

        <h2 style="color:#0C4B05;">SELECT DESIRED ROOM TYPE:</h2>
        <label  for="dorm">Dormitory</label>
        <label  for="room">Type of Room</label>
        <label for="contract">Contract</label><br>

        <input type="text" id="dorm" name="dorm" value="{{ $details->dorm_name }}" style="width:20%;margin-right:2%;" class="inputapp">
        <select name="room_type" id="room" style="width:20%;margin-right:2%;" class="inputapp">
            @foreach($room_types as $types)
            <option value="{{ $types->room_type }}">{{ $types->room_type }}</option>
            @endforeach
        </select>
        <a href="/sampledocx/sampledoc.pdf" download><button type="button" id="contract" class="contractbutton"  > DOWNLOAD FILE</button></a>
        
        <div style="display:flex;width:100%;">
        <p class="note"> NOTE: Before confirming, kindly check the contract for the terms of service.</p>
       
        <button type="submit"class="secondyellowbutton" style="margin-top:20px;margin-right:10px;margin-left:10%;"> CONFIRM</button>
        <a href="home"><button type="button" class="cancelbutton">CANCEL</button></a>
        
        </div>
    </div>
    </form>

    </body>
</html>