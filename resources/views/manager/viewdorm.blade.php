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
    
    <body style="overflow-y:scroll;" class="antialiased">
        
    <div class="uppernav"><h3>MMSU - COEDS / Proprietor Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  width="4%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
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

        <form style="width:95%;padding-top:15%;">
            <div class="tableFixHeadtitle">DORM PROFILE
            <a href="{{ url('manager/updateimage/'.Auth::guard('manager')->user()->id) }}"><button type="button" class="greenbutton" style="margin-right:0%;margin-top:0px;"> UPLOAD IMAGE</button></a>
            <a href="{{ url('manager/updatedorm/'.Auth::guard('manager')->user()->id) }}"><button type="button" class="secondyellowbutton" style="margin-top:0px;margin-right:2%;">UPDATE DORM</button></a>
        </div>  

        <div class="smallheader" style="border-bottom: #434546 solid 1px;width:75%;">FULL NAME</div>
            <label for="fname">First Name</label>
            <label for="fname">Middle Name</label>
            <label for="fname">Last Name</label><br>

            <input type="text" id="fname" name="fname" style="width: 22%;" class="inputapp" value="{{ $details->first_name }}" readonly>
            <input type="text" id="fname" name="fname" style="width: 22%;" class="inputapp" value="{{ $details->middle_name }}" readonly>
            <input type="text" id="fname" name="fname" style="width: 22%;" class="inputapp" value="{{ $details->last_name }}" readonly>
        
        <div class="smallheader" style="border-bottom: #434546 solid 1px;width:75%;">ADDRESS</div>
            <label for="brgy">Barangay</label>
            <label for="st">Street</label>
            <label for="nl">Nearest Landmark</label><br>

            <input type="text" id="brgy" name="fname" style="width: 22%;" class="inputapp" value="{{ $details->barangay }}" readonly>
            <input type="text" id="st" name="fname" style="width: 22%;" class="inputapp" value="{{ $details->street }}" readonly>
            <input type="text" id="nl" name="fname" style="width: 22%;" class="inputapp" value="{{ $details->nearest }}" readonly>

        <div class="smallheader" style="border-bottom: #434546 solid 1px;width:75%;">OTHER INFORMATION</div>
            <label for="dname">Dorm Name</label>
            <label for="contact">Contact</label>
            <label for="quantity">Capacity</label><br>

            <input type="tel" id="fname" name="dname" style="width: 22%;" class="inputapp" value="{{ $details->dorm_name }}" readonly>
            <input type="text" id="fname" name="contact" style="width: 22%;" class="inputapp" value="{{ $details->mobile_num }}" readonly>
            <input type="number" id="quantity" name="quantity"  style="width: 22%;" class="inputapp" min="0" value="{{ $details->capacity }}" readonly><br><br>
    
            <label for="fname">Short Description</label><br>
            <textarea readonly>{{ $details->description }}</textarea><br><br>

        </form>

    <div style="display:flex;">
        <div>

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
        </div>
        
        <div style="margin-left:5%;">

            <table class="viewdormtable" id="room">
                <tr>
                    <th >Room Type</th>
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

    <label style="width:50%;margin-top:2%;" for="slide">Uploaded Images :</label>
    <div class="slide-container" id="slide">
        @foreach($images as $image)
            <img src="/images/{{ $image->filename }}" />
        @endforeach
    </div>

    </div>
    </body>
</html>