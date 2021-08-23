<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">  
        <!-- BOOTSTRAP -->
    
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav"><h3>MMSU - COEDS / Proprietor Dorm Management</h3></div>

    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">UPDATE DORM</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="{{ url('manager/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="{{ url('manager/listapplicants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="{{ url('manager/listoccupants') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a class="active" href="{{ url('manager/viewdorm/'.Auth::guard('manager')->user()->id) }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="{{ url('manager/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
                <li><button type="submit"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>


<div class="updatedormcontainer">
<form style="width:95%;padding-top:7%;" action="/manager/updatedorm" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="smallheader" style="width:90%;border-bottom: #434546 solid 1px;">FULL NAME</div>
    <label for="fname">First Name</label>
    <label for="fname">Middle Name</label>
    <label for="fname">Last Name</label><br>

    <input type="text" id="fname" name="first" value="{{ $details->first_name }}" style="width: 22%;" class="inputapp">
    <input type="text" id="fname" name="middle" value="{{ $details->middle_name }}" style="width: 22%;" class="inputapp">
    <input type="text" id="fname" name="last" value="{{ $details->last_name }}" style="width: 22%;" class="inputapp">

    <div class="smallheader" style="width:90%;border-bottom: #434546 solid 1px;">ADDRESS</div>
    <label for="brgy">Barangay</label>
    <label for="st">Street</label>
    <label for="nl">Nearest Landmark</label><br>

    <input type="text" id="brgy" name="barangay" value="{{ $details->barangay }}" style="width: 22%;" class="inputapp">
    <input type="text" id="st" name="street" value="{{ $details->street }}" style="width: 22%;" class="inputapp">
    <input type="text" id="nl" name="nearest" value="{{ $details->nearest }}" style="width: 22%;" class="inputapp">

    <div class="smallheader" style="width:90%;border-bottom: #434546 solid 1px;">OTHER INFORMATION</div>
    <label for="dname">Dorm Name</label>
    <label for="contact">Contact</label>
    <label for="quantity">Capacity</label><br>

    <input type="tel" id="fname" name="dorm_name" value="{{ $details->dorm_name }}" style="width: 22%;" class="inputapp">
    <input type="text" id="fname" name="mobile_num" value="{{ $details->mobile_num }}" style="width: 22%;" class="inputapp">
    <input type="number" id="quantity" name="avail" value="{{ $details->capacity }}"  style="width: 22%;" class="inputapp" min="0">
    
    <div class="smallheader" style="width:90%;border-bottom: #434546 solid 1px;margin-bottom:1%;">SHORT DESCRIPTION</div>
    <textarea name="description">{{ $details->description }}</textarea><br><br>

    <div style="display:flex;">
    <div style="width:50%;">
    <table class="viewdormtable" id="room">
        <tr>
            <th>Room Type</th>
            <th>Vacancy</th>
            <th>Room Fee</th>
            <th></th>
        </tr>
        @foreach($room_types as $types)
        <tr>
            <td class="readapp">{{ $types->room_type }}</td>
            <td class="readapp">{{ $types->vacancy }}</td>
            <td class="readapp">{{ $types->price }}</td>
            <td><button style="width:100%;" type="submit" name="type" value="{{ $types->room_type }}">DELETE</button></td>
        </tr>
        @endforeach
    </table><br>
    <select name="roomtype" id="room" class="inputapp" style="width:65%;">
        <option selected disable hidden>Choose a room type </option>
        <option value="Single">Single</option>
        <option value="Double">Double</option>
        <option value="Triple">Triple</option>
        <option value="Quad">Quad</option>
        <option value="Twin">Twin</option>
        <option value="Double-double">Double-double</option>
        <option value="Studio">Studio</option>
    </select><br><br>

    <label style="width:20%;" for="fname">Room Fee</label>
    <input type="text" id="fname" name="prices" style="width:10%;margin:0%;" class="inputapp">

    <label for="fname" style="width:20%;margin-left:10px;margin-right:0%;">Vacancy</label>
    <input type="text" id="fname" name="vacancy" style="width:10%;margin-left:0%;" class="inputapp">
    <button type="submit" onclick="new_link()" name="submit" value="addRoomType" class="addbutton" style="width:15%;">ADD</button>
    </div><br>

    <div style="margin-left:5%;width:40%;">
    <table class="viewdormtable" id="room">
        <tr>
            <th>Amenities</th>
            <th></th>
        </tr>
        @foreach($amenities as $amenity)
        <tr>
            <td class="readapp">{{ $amenity->amenities }}</td>
            <td><button style="width:100%;" type="submit" name="amen" value="{{ $amenity->amenities }}">DELETE</button></td>
        </tr>
        @endforeach
    </table><br>

    <select name="amenities" id="amenities" class="inputapp" style="width:70%;">
        <option selected disable hidden>Choose an amenity</option>
        <option value="Free WiFi">Free WiFi</option>
        <option value="Study Room">Study Room</option>
        <option value="Pet's Allowed">Pet's Allowed</option>
        <option value="Kitchen Utensils">Kitchen Utensils</option>
        <option value="Own Bathroom">Own Bathroom</option>
        <option value="CCTV">CCTV</option>
        <option value="Parking Space">Parking Space</option>
        <option value=">With Hot and Cold Shower">With Hot and Cold Shower</option>
        <option value="Complete Furniture">Complete Furniture</option>
        <option value="Air-conditioned Room">Air-conditioned Room</option>
    </select>

    <button type="submit" onclick="new_link()" name="submit" value="addAmen" class="addbutton" style="width:15%;margin-right:10%;">ADD</button><br>
    </div>
</div>

    <div style="padding-right:10%;margin-top:1%;">
        <a href="{{ URL::previous() }}"><button type="button" class="greenbutton" style="margin-top:1%;">CANCEL</button></a>
        <input type="submit" name="save" onclick="update()" class="secondyellowbutton" style="margin-right:20px;margin-top:1%;" value="SAVE">
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