<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MMSU - Dorm Finder | Profile</title>

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
        <h1>MY PROFILE</h1>
    </div>

    <div class="profile_con">
    <form action="/profilestudent" method="POST">
    @csrf
    <label for="fstudentid">Student Number</label>  
        <label  for="sex" >Sex</label>
        <label for="email">Email</label>
        <label  for="number">Mobile Number</label><br>
        
        <input type="text" style="width:20%;margin-right:2%;" id="fstudentid" name="stud_id" value="{{ Auth::user()->stud_num }}" class="inputapp" >
        <select name="sex" style="width:20%;margin-right:2%;" id="room" class="inputapp">
            <option selected disable hidden value="{{ Auth::user()->sex }}">{{ Auth::user()->sex }}</option>
            <option value="Female">Male</option>
            <option value="Male">Female</option>
         </select>
        <input type="email" style="width:20%;margin-right:2%;" name="email" id="email" value="{{ Auth::user()->email }}"  class="inputapp">
        <input type="tel" style="width:20%;" id="number" name="mobile_num" value="{{ Auth::user()->mobile_num }}" class="inputapp"><br><br>

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
            <option selected disable hidden value="{{ Auth::user()->college }}">{{ Auth::user()->college }}</option>
            <option value="CAS">CAS</option>
            <option value="COE">COE</option>
            <option value="CBEA">CBEA</option>
            <option value="CHS">CHS</option>
        </select>
        <input type="text" style="width:20%;margin-right:2%;"id="course" name="course" value="{{ Auth::user()->course }}"  class="inputapp"><br><br>
       
        <a href="/dashboard"><button type="button" class="greenbutton" style="margin-top:20px;">CANCEL</button></a>
        <button type="submit" onclick="updateProfileFunction()" class="secondyellowbutton" style="margin-right:10px;margin-top:20px;"> UPDATE</button>
    </div>
    </form>

    </body>
</html>