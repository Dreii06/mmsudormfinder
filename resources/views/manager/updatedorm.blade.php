<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">  
        
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav">
        <h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - COEDS / Proprietor Dorm Management</h3>
    </div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">UPDATE DORM</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="/manager/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/manager/listapplicants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="/manager/listoccupants"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a class="active" href="/manager/viewdorm/{{ Auth::guard('manager')->user()->id }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/manager/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
            <li><a href=""><button type="submit" style="padding-left:0%;color:red;" ><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></a></li>
            </form>
        </ul>
    </div>


<div class="updatedormcontainer">
<form action="/manager/updatedorm" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="fname">First Name</label>
    <label for="fname">Middle Name</label>
    <label for="fname">Last Name</label><br>

    <input type="text" id="fname" name="first" value="{{ $details->first_name }}" style="width: 25%;" class="inputapp" value="Sample Name">
    <input type="text" id="fname" name="middle" value="{{ $details->middle_name }}" style="width: 25%;" class="inputapp" value="Sample Name">
    <input type="text" id="fname" name="last" value="{{ $details->last_name }}" style="width: 25%;" class="inputapp" value="Sample Name"><br><br>

    <label for="dname">Dorm Name</label>
    <label for="contact">Contact</label>
    <label for="quantity">Available space</label><br>

    <input type="tel" id="fname" name="dorm_name" value="{{ $details->dorm_name }}" style="width: 25%;" class="inputapp" value="Sample Dorm Name">
    <input type="text" id="fname" name="mobile_num" value="{{ $details->mobile_num }}" style="width: 25%;" class="inputapp" value="Sample Contact">
    <input type="number" id="quantity" name="avail" value="{{ $details->available_space }}" style="width: 25%;" class="inputapp" min="0" value="10"><br><br>

    <label for="brgy">Barangay</label>
    <label for="st">Street</label><br>

    <input type="text" id="brgy" name="barangay" value="{{ $details->barangay }}" style="width: 25%;" class="inputapp" value="6 Quiling Sur">
    <input type="text" id="st" name="street" value="{{ $details->street }}" style="width: 25%;" class="inputapp" value="Jakamo Street"><br><br>

    <label for="hn">House Number</label>
    <label for="nl">Nearest Landmark</label><br>

    <input type="text" id="hn" name="house_num" value="{{ $details->house_num }}" style="width: 25%;" class="inputapp" value="1231">
    <input type="text" id="nl" name="nearest" value="{{ $details->nearest }}" style="width: 25%;" class="inputapp" value="Teatro Ilocandia"><br><br>

    <label style="width:15%;" for="contract">Add Contract <br>File type: [DOCS/PDF]</label>
    <input type="file" name="image" accept=".doc,.pdf,.docx" class="inputapp"><br>

    <label for="fname">Short Description</label><br>
    <textarea name="description">{{ $details->description }}</textarea><br><br>

    <div style="display:flex;">
    <div class="tablewrapper" style="margin-right:5%;width:40%;">
    <table class="viewdormtable" id="room">
        <tr>
            <th>Amenities</th>
        </tr>
        @foreach($amenities as $amenity)
        <tr>
            <td class="readapp">{{ $amenity->amenities }}</td>
        </tr>
        @endforeach
    </table>
    </div><br>

    <div class="tablewrapper" style="margin-right:0%;width:40%;">
    <table class="viewdormtable" id="room">
        <tr>
            <th>Room Type</th>
            <th>Room Fee</th>
        </tr>
        @foreach($room_types as $types)
        <tr>
            <td class="readapp">{{ $types->room_type }}</td>
            <td class="readapp">{{ $types->price }}</td>
        </tr>
        @endforeach
    </table>
    </div></div><br>

    <select name="amenities" id="amenities" class="inputapp">
        <option selected disable hidden>Choose what you want to remove</option>
        @foreach($amenities as $amenities)
            <option value="{{ $amenities->amenities }}">{{ $amenities->amenities }}</option>
        @endforeach
    </select>
        <button type="submit" name="submit" value="DELAME" onclick="new_link()" class="addbutton" style="width:10%;margin-right:5%;">REMOVE</button>  

    <select name="room_type" id="room" class="inputapp">
        <option selected disable hidden>Choose what you want to remove</option>
        @foreach($room_types as $type)
        <option value="{{ $type->room_type }}">{{ $type->room_type }}</option>
        @endforeach
    </select>
        <button type="submit" name="submit" value="DELROOM" onclick="new_link()" class="addbutton" style="width:15%;">REMOVE</button><br>

        <div style="display:flex;">

        <h3 style="width:45%;" for="fname">Add Ammenities</h3>        
        <h3 style="width:40%;" for="fname">Add Room Type</h3><br>
    </div>

        <label style="width:10%;" for="fname">Ammenities</label>
            <input type="text" id="fname" name="amenity" style="width:20%;margin-right:12%;" class="inputapp">
        <label style="width:10%;" for="fname">Room Type</label>
            <input type="text" id="fname" name="room_types" style="width: 10%;" class="inputapp">
        <label for="fname" style="width:10%;margin-left:10px;margin-right:0%;">Rental Fee</label>
            <input type="text" id="fname" name="prices" style="width:5%;margin-left:0%;" class="inputapp">
            <div style="padding-right:10%;margin-top:10px;">

    <div style="padding-right:10%;margin-top:5%;">
        <a href="/manager/dashboard"><button type="button" class="greenbutton">CANCEL</button></a>
        <input type="submit" name="save" onclick="update()" class="secondyellowbutton" style="margin-right:20px;" value="SAVE">
    </div>
    </form>

</div>

<script>
/*This script is identical to the above JavaScript function.*/
    function delIt(eleId)
    {
	    d = document;
	    var ele = d.getElementById(eleId);
	    var parentEle = d.getElementById('newlink');
	    parentEle.removeChild(ele);
    }
</script>

</body>
</html>