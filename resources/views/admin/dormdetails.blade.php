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
        
    <div class="uppernav"><h3>MMSU - Admin Dorm Management</h3></div>
    
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
            <li><a href="/admin/occupantslist"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a class="active" href="/admin/dorms"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/admin/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <li><button type="submit" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>
            
<div class="dormdeets">
    
<form style="width:70%;margin-left:25%;">
<div class="smallheader">FULL NAME</div>
    <label for="fname">First Name</label>
    <label for="fname">Middle Name</label>
    <label for="fname">Last Name</label><br>

    <input type="text" id="fname" name="fname" style="width: 20%;" class="inputapp" value="{{ $details->first_name }}" readonly>
    <input type="text" id="fname" name="fname" style="width: 20%;" class="inputapp" value="{{ $details->middle_name }}" readonly>
    <input type="text" id="fname" name="fname" style="width: 20%;" class="inputapp" value="{{ $details->last_name }}" readonly><br><br>

<div class="smallheader">ADDRESS</div>
    <label for="brgy">Barangay</label>
    <label for="st">Street</label>
    <label for="nl">Nearest Landmark</label><br>

    <input type="text" id="brgy" name="fname" style="width: 20%;" class="inputapp" value="{{ $details->barangay }}" readonly>
    <input type="text" id="st" name="fname" style="width: 20%;" class="inputapp" value="{{ $details->street }}" readonly>
    <input type="text" id="nl" name="fname" style="width: 20%;" class="inputapp" value="{{ $details->nearest }}" readonly><br><br>

<div class="smallheader">OTHER INFORMATION</div>
    <label for="dname">Dorm Name</label>
    <label for="contact">Contact</label>
    <label for="quantity">Capacity</label><br>

    <input type="tel" id="fname" name="dname" style="width: 20%;" class="inputapp" value="{{ $details->dorm_name }}" readonly>
    <input type="text" id="fname" name="contact" style="width: 20%;" class="inputapp" value="{{ $details->mobile_num }}" readonly>
    <input type="number" id="quantity" name="quantity"  style="width: 20%;" class="inputapp" min="0" value="{{ $available }}" readonly><br><br>

    <label for="fname">Short Description</label><br>
    <textarea readonly>{{ $details->description }}</textarea><br><br>

    <div style="display:flex;">
        <div>
            <table class="viewdormtable" id="room">
                <tr>
                    <th>Amenities</th>
                </tr>
                @foreach($amenities as $amenity)
                <tr><td class="readapp">{{ $amenity->amenities }}</td></tr>
                @endforeach
            </table>
        </div>

        <div style="margin-left:5%;">
            <table class="viewdormtable" id="room">
                <tr>
                    <th>Room Type</th>
                    <th>Vacancy</th>
                    <th>Price</th>
                </tr> 
                @foreach($room_types as $types)
                <tr>
                    <td class="readapp">{{ $types->room_type }}</td>
                    <td class="readapp">{{ $types->vacancy }}</td>
                    <td class="readapp">{{ $types->price }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="btndorm_container">
    <button type="button" onclick="download()" class="btndownload">DOWNLOAD</button>
    <a href="/admin/{{ $details->dorm_name }}/dormoccupantslist"><button type="button" class="btnviewocc">VIEW OCCUPANTS</button></a>
    </div>

    </form>
</div>

    </body>
</html>