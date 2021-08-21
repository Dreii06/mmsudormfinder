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
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>

    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="{{ url('admin/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/>Home</a></li>
            <li><a href="{{ url('admin/registrants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/>Registrants</a></li>
            <li><a href="{{ url('admin/occupantslist') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/>Occupants</a></li>
            <li><a class="active" href="{{ url('admin/dorms') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/>Dorms</a></li>
            <li><a href="{{ url('admin/reportoccupant') }}"><img src="https://img.icons8.com/fluency-systems-regular/96/000000/comments--v2.png"/>Reports</a></li>
            <li><a href="{{ url('admin/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/>Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
            <li><button type="submit" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>
            
<div class="dormdeets">

    <form style="width:80%;margin-left:25%;">
        <div class="tableFixHeadtitle">{{ $details->dorm_name }} - Details
            <a href="{{ URL::previous() }}"><button type="button" class="btnviewocc">BACK</button></a>
            <a href="{{ url('admin/'. $details->dorm_name .'/dormoccupantslist') }}"><button type="button" style="margin-left:0%;float:right;" class="btndownload">VIEW OCCUPANTS</button></a>
        </div><br>

    <div style="display:flex;"><div style="width: 50%;" class="smallheader">FULL NAME</div>
    <div class="smallheader" style="width: 20%;"> CONTACT</div></div>
    <input type="text" id="fname" name="fname" style="width: 50%;margin-right:5%;" class="inputapp" value="{{ $details->first_name }} {{ $details->middle_name }} {{ $details->last_name }}" readonly>
    <input type="text" id="fname" name="contact" style="width: 20%;" class="inputapp" value="{{ $details->mobile_num }}" readonly>


    <div style="display:flex;margin-top:2%;"><div style="width: 50%;" class="smallheader">ADDRESS</div>
    <div class="smallheader" style="width: 20%;">CAPACITY</div></div>
    <input type="text" id="brgy" name="fname" style="width: 50%;margin-right:5%;" class="inputapp" value="{{ $details->barangay }} {{ $details->street }} ; {{ $details->nearest }}" readonly>
    <input type="number" id="quantity" name="quantity"  style="width: 20%;" class="inputapp" min="0" value="{{ $details->available_space }}" readonly><br><br>
    
    <div style="display:flex;"><div style="width: 50%;" class="smallheader">DESCRIPTION</div></div>
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
    </form>
</div>

    </body>
</html>