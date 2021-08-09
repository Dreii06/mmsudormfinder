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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                        <li><button type="submit">{{ __('Log Out') }}</button></li>
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
        <div class="smallheader">FULL NAME</div>
        <label for="fname">First Name</label>
        <label for="mname">Midle Name</label>
        <label for="lname">Last Name</label>
        <label for="sname">Suffix (Jr,,III)</label><br>

        <input type="text"  style="width:20%;margin-right:2%;" id="fname" name="first" value="{{ Auth::user()->first_name }}" class="inputapp">
        <input type="text"  style="width:20%;margin-right:2%;" id="mname" name="middle" value="{{ Auth::user()->middle_name }}" class="inputapp">
        <input type="text"  style="width:20%;margin-right:2%;" id="lname" name="last" value="{{ Auth::user()->last_name }}"  class="inputapp">
        <input type="text"  style="width:20%;margin-right:2%;" id="sname" name="suffix" value="{{ Auth::user()->suffix }}"  class="inputapp"><br><br>

        <div class="smallheader">ADDRESS</div>
        <label for="barangay">Barangay</label>
        <label for="street">Street</label>
        <label  for="city">City</label>
        <label for="province">Province</label>

        <input type="text" style="width:20%;margin-right:2%;" id="barangay" name="barangay" value="{{ Auth::user()->barangay }}" class="inputapp">
        <input type="text" style="width:20%;margin-right:2%;"id="street" name="street" value="{{ Auth::user()->street }}" class="inputapp">
        <input type="text" style="width:20%;margin-right:2%;"id="city" name="city" value="{{ Auth::user()->city }}" class="inputapp">
        <input type="text" style="width:20%;"id="province" name="province" value="{{ Auth::user()->province }}" class="inputapp"><br><br>

        <div class="smallheader">CONTACT INFORMATION</div>
        <label for="email">Email</label>
        <label  for="number">Mobile Number</label>
        <label for="nameg">Name of Guardian</label>
        <label for="number">Contact of Guardian</label><br>

        <input type="email" style="width:20%;margin-right:2%;" id="email" name="email" value="{{ Auth::user()->email }}" class="inputapp">
        <input type="tel" style="width:20%;margin-right:2%;" id="number" name="mobile_num" value="{{ Auth::user()->mobile_num }}" class="inputapp">
        <input type="text" style="width:20%;margin-right:2%;"id="nameg" name="guardian_name" value="{{ Auth::user()->guardian_name }}" class="inputapp">
        <input type="tel" style="width:20%;"id="number" name="guardian_num" value="{{ Auth::user()->guardian_num }}" class="inputapp"><br><br>

        <div class="smallheader">ACADEMIC INFORMATION</div>
        <label for="fstudentid">Student Number</label>  
        <label for="college">College:</label>
        <label for="course">Course:</label><br>
        
        <input type="text" style="width:20%;margin-right:2%;" id="fstudentid" name="stud_id" value="{{ Auth::user()->stud_num }}" class="inputapp" >
        
        <select name="college" style="width:20%;margin-right:2%;" id="college"  onchange="myFunction()" class="inputapp">
            <option selected disable hidden value="{{ Auth::user()->college }}">{{ Auth::user()->college }}</option>
            <option value="CAS">CAS</option>
            <option value="COE">COE</option>
            <option value="CBEA">CBEA</option>
            <option value="CHS">CHS</option>
            <option value="CTE">CTE</option>
            <option value="CASAT">CASAT</option>
            <option value="CAFSD">CAFSD</option>
            <option value="CIT">CIT</option>
        </select>
        
        <select name="course" style="width:20%;margin-right:2%;" id="course" class="inputapp">
            <option selected disable hidden value="{{ Auth::user()->course }}">{{ Auth::user()->course }}</option>
            <option data-tag="CAS" value="BS Computer Science">BS Computer Science</option>
            <option data-tag="CAS" value="BS Information Technology">BS Information Technology</option>
            <option data-tag="CAS" value="AB Communication">AB Communication</option>
            <option data-tag="CAS" value="AB English Language">AB English Language</option>
            <option data-tag="CAS" value="AB Sociology">AB Sociology</option>
            <option data-tag="CAS" value="BS Biology">BS Biology</option>
            <option data-tag="CAS" value="BS Mathematics">BS Mathematics</option>
            <option data-tag="CAS" value="BS Meteorology">BS Meteorology</option>
            <option data-tag="COE" value="BS in Civil Engineering">BS in Civil Engineering</option>
            <option data-tag="COE" value="BS in Electrical Engineering">BS in Electrical Engineering</option>
            <option data-tag="COE" value="BS in Mechanical Engineering">BS in Mechanical Engineering</option>
            <option data-tag="COE" value="BS in Chemical Engineering">BS in Chemical Engineering</option>
            <option data-tag="COE" value="BS in Ceramic Engineering">BS in Ceramic Engineering</option>
            <option data-tag="COE" value="BS in Computer Engineering">BS in Computer Engineering</option>
            <option data-tag="COE" value="BS in Elect. and Comm. Engineering">BS in Elect. and Comm. Engineering</option>
            <option data-tag="CHS" value="BS in Nursing">BS in Nursing</option>
            <option data-tag="CHS" value="BS in Physical Therapy">BS in Physical Therapy</option>
            <option data-tag="CHS" value="BS in Pharmacy">BS in Pharmacy</option>
            <option data-tag="CBEA" value="BS in Accountancy">BS in Accountancy</option>
            <option data-tag="CBEA" value="BS in Economics">BS in Economics</option>
            <option data-tag="CBEA" value="BS in Business Administration">BS in Business Administration</option>
            <option data-tag="CBEA" value="BS in Cooperative Management">BS in Cooperative Management</option>
            <option data-tag="CBEA" value="BS in Accounting Technology">BS in Accounting Technology</option>
            <option data-tag="CBEA" value="BS in Entrepreneurship">BS in Entrepreneurship</option>
            <option data-tag="CBEA" value="BS in Hospitality Management">BS in Hospitality Management</option>
            <option data-tag="CBEA" value="BS in Tourism Management">BS in Tourism Management</option>
            <option data-tag="CASAT" value="BS in Agriculture">BS in Agriculture</option>
            <option data-tag="CASAT" value="BS in Forestry">BS in Forestry</option>
            <option data-tag="CAFSD" value="BS in Development Communication">BS in Development Communication</option>
            <option data-tag="CAFSD" value="BS in Home Technology">BS in Home Technology</option>
            <option data-tag="CAFSD" value="BS in Environmental Science">BS in Environmental Science</option>
            <option data-tag="CAFSD" value="BS in Agricultural Technology">BS in Agricultural Technology</option>
            <option data-tag="CAFSD" value="BS in Fisheries">BS in Fisheries</option>
            <option data-tag="CIT" value="Bachelor in Automotive Technology">Bachelor in Automotive Technology</option>
            <option data-tag="CIT" value="BS in Industrial Education">BS in Industrial Education</option>
            <option data-tag="CIT" value="BS in Industrial Technology">BS in Industrial Technology</option>
            <option data-tag="CTE" value="Bachelor in Secondary Education">Bachelor in Secondary Education</option>
            <option data-tag="CTE" value="Bachelor in Elementary Education">Bachelor in Elementary Education</option>
            <option data-tag="CTE" value="Short-Term Programs">Short-Term Programs</option>
        </select><br><br>
        
        <div class="smallheader">OTHER INFORMATION</div>
         <label  for="sex" >Sex</label><br>
         <select name="sex"  style="width:20%;margin-right:2%;" id="sex" class="inputapp">
            <option selected disable hidden value="{{ Auth::user()->sex }}">{{ Auth::user()->sex }}</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
         </select>

         <a href="/dashboard"><button type="button" class="greenbutton" style="margin-top:2%;margin-right:1%;">CANCEL</button></a>
        <button type="submit" onclick="updateProfileFunction()" class="secondyellowbutton" style="margin-right:2%;margin-top:2%;"> UPDATE</button>
    </form>
    </div>

      <script>
	$('#college').on('change', function() {
		var selected = $(this).val();
		$("#course option").each(function(item){
			console.log(selected) ;  
			var element =  $(this) ; 
			console.log(element.data("tag")) ; 
			if (element.data("tag") != selected){
				element.hide() ; 
			}else{
				element.show();
			}
		}) ; 
		
		$("#course").val($("#course option:visible:first").val());
		
    });
    </script>

    </body>

    
</html>