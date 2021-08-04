<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">
        <title>MMSU - Dorm Management | Dormitory</title>

        <!-- CSS -->
            <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">
        <!-- JS -->
           <script type="text/javascript" src="dormfinderadmin.js"></script>
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav"><h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - Admin Dorm Management</h3></div>
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png"  height="3%" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">{{ $details->dorm_name }} - Details</div>
    </div>

    <div class="verticalnav">
        <ul>
        <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="/admin/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/admin/registrants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Registrants</a></li>
            <li><a class="active" href="/admin/dorms"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/admin/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <li><a href="" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>Log Out</a></li>
        </ul>    
    </div>
            
<div class="dorm_details_con">
    
<form>
    <label style="margin-left:1.5%;" for="fname">Manager</label>
        <input type="text" id="fname" name="fname" style="width: 65%;" class="readapp" value="{{ $details->owner_name }}" readonly="readonly"><br><br>
    <label style="margin-left:1.5%;" for="fname">Address</label>
        <input type="text" id="fname" name="fname" style="width: 65%;" class="readapp" value="{{ $details->address }}" readonly="readonly"><br><br>
    <label style="margin-left:1.5%;" for="fname">Contact</label>
        <input type="text" id="fname" name="fname" style="width: 65%;" class="readapp" value="{{ $details->contact_num }}" readonly="readonly"><br><br>
    <label style="margin-left:1.5%;" for="fname">Amenities</label>
        <input type="text" id="fname" name="fname" style="width: 65%;" class="readapp" value="{{ $details->amenities }}" readonly="readonly"><br><br><br>
    <label style="margin-left:1.5%;" for="quantity">Available space</label>
        <input type="number" id="quantity" name="quantity" class="readapp" min="0" value="{{ $details->available_space }}" readonly="readonly"><br><br> 
        
    <table class="viewdormtable" id="room">
                <tr>
                    <th>Room Type</th>
                    <th>Price</th>
                </tr> 
               <tr>
                @foreach($room_types as $types)
                    <td class="readapp">{{ $types->room_type }}</td>
                    <td class="readapp">{{ $types->price }}</td>
                @endforeach
                </tr>
    </table>
</form>


</div>

    <div class="btndorm_container">
    <button type="button" onclick="download()" class="btndownload">DOWNLOAD</button>
    <a href="/admin/{{ $details->dorm_name }}/occupantslist"><button type="button" class="btnviewocc">VIEW OCCUPANTS</button></a>
    </div>

        </body>
    </head>
</html>