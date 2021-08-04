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
    <form style="width:90%;">
    <label style="margin-left:1.5%;" for="fname">Dormitory</label>
        <input type="text" id="fname" name="fname" style="width: 40%;" class="readapp" value="{{ $details->dorm_name }}" readonly="readonly"><br><br>
    <label style="margin-left:1.5%;" for="fname">Address</label>
        <input type="text" id="fname" name="fname" style="width: 40%;" class="readapp" value="{{ $details->address }}" readonly="readonly"><br><br>
    <label style="margin-left:1.5%;" for="fname">Contact</label>
        <input type="text" id="fname" name="fname" style="width: 40%;" class="readapp" value="{{ $details->contact_num }}" readonly="readonly"><br><br>
    <label style="margin-left:1.5%;" for="fname">Amenities</label>
        <input type="text" id="fname" name="fname" style="width: 40%;" class="readapp" value="{{ $details->amenities }}" readonly="readonly"><br><br><br>
    <label style="margin-left:1.5%;"for="quantity">Available space</label>
        <input type="number" id="quantity" name="quantity" class="readapp" min="0" value="10" readonly="readonly"><br><br>   
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

    <a href="/manager/updatedorm/{{ Auth::guard('manager')->user()->id }}"><button type="button" class="secondyellowbutton" style="margin-right:35%;margin-top:10px;">UPDATE</button></a>

    </form>
</div>