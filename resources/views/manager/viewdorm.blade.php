<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">
        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">
        <!-- JS -->
        <script type="text/javascript" src="dormfindercoed.js"></script>  
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav"><h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - COEDS / Proprietor Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">DORM</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="/manager/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/manager/listapplicants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="/manager/listoccupants"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a class="active" href="/manager/viewdorm/{{ Auth::guard('manager')->user()->id }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/manager/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <li><a href="" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>Log Out</a></li>
        </ul>    
    </div>

    <div class="updatedormcontainer">
    <form style="width:100%;">

    <label for="fname">First Name</label>
    <label for="fname">Middle Name</label>
    <label for="fname">Last Name</label><br>

    <input type="text" id="fname" name="fname" value="{{ $details->first_name }}" style="width: 25%;" class="inputapp">
    <input type="text" id="fname" name="fname" value="{{ $details->middle_name }}" style="width: 25%;" class="inputapp">
    <input type="text" id="fname" name="fname" value="{{ $details->last_name }}" style="width: 25%;" class="inputapp"><br><br>

    <label for="dname">Dorm Name</label>
    <label for="contact">Contact</label>
    <label for="quantity">Available space</label><br>

    <input type="tel" id="fname" name="dname" value="{{ $details->dorm_name }}" style="width: 25%;" class="inputapp" >
    <input type="text" id="fname" name="contact" value="{{ $details->mobile_num }}" style="width: 25%;" class="inputapp">
    <input type="number" id="quantity" name="quantity" value="{{ $details->available_space }}" style="width: 25%;" class="inputapp" min="0"><br><br>

    <label for="brgy">Barangay</label>
    <label for="st">Street</label><br>

    <input type="text" id="brgy" name="fname" value="{{ $details->barangay }}" style="width: 25%;" class="inputapp">
    <input type="text" id="st" name="fname" value="{{ $details->street }}" style="width: 25%;" class="inputapp"><br><br>

    <label for="hn">House Number</label>
    <label for="nl">Nearest Landmark</label><br>

    <input type="text" id="hn" name="fname" value="{{ $details->house_num }}" style="width: 25%;" class="inputapp">
    <input type="text" id="nl" name="fname" value="{{ $details->nearest }}" style="width: 25%;" class="inputapp"><br><br>

    <label for="fname">Short Description</label><br>
    <textarea readonly>{{ $details->description }}</textarea><br><br>

    </form>

    <label style="margin-left:1.5%;" for="fname">Amenities</label>
    <table class="viewdormtable" id="room">
        <tr>
            <th>Amenities</th>
        </tr>
        @foreach($amenities as $amenity)
        <tr>
            <td class="readapp">{{ $amenity->amenities }}</td>
        </tr>
        @endforeach
    </table><br><br>

    <table class="viewdormtable" id="room">
        <tr>
            <th>Room Type</th>
            <th>Price</th>
        </tr>
        @foreach($room_types as $types)
        <tr>
            <td class="readapp">{{ $types->room_type }}</td>
            <td class="readapp">{{ $types->price }}</td>
        </tr>
        @endforeach
    </table><br><br>

    <label style="margin-left:1.5%;" for="slide">Uploaded Images</label>
    <div class="slide-container" id="slide">
        @foreach($images as $image)
            <img src="/images/{{ $image->filename }}" />
        @endforeach
    </div>

    <a href="updateimage"><button type="button" class="greenbutton" style="margin-right:20%;margin-top:10px;"> UPDATE IMAGE</button></a>
    <a href="/manager/updatedorm/{{ Auth::guard('manager')->user()->id }}"><button type="button" class="secondyellowbutton" style="margin-top:10px;margin-right:2%;">UPDATE FORM</button></a>
</div>