<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Occupants</title>

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
        
        <div class="header"> <h1 style="color:white;">OCCUPANTS</h1>
            <form style="margin-top:3vh;margin-left:30%;" action="/admin/searchoccupants" method="POST" role="search">
              @csrf
              <input type="text" id="search" onkeyup="searchFunction()" placeholder="Search" name="search">
              <button type="submit"><img src="https://img.icons8.com/pastel-glyph/50/000000/search--v2.png" width="100%"></button>
            </form>        
        </div>
    </div>

    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="{{ url('admin/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/>Home</a></li>
            <li><a href="{{ url('admin/registrants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/>Registrants</a></li>
            <li><a class="active" href="{{ url('admin/occupantslist') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/>Occupants</a></li>
            <li><a href="{{ url('admin/dorms') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/>Dorms</a></li>
            <li><a href="{{ url('admin/reportoccupant') }}"><img src="https://img.icons8.com/fluency-systems-regular/96/000000/comments--v2.png"/>Reports</a></li>
            <li><a href="{{ url('admin/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/>Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
            <li><button type="submit" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>

    <div class="listappcontainer">
    <div class="tableFixHead">
      <table>
        <thead>
          <tr>
            <th>NAME</th>
            <th>CONTACT NUMBER</th>
            <th>DORMITORY</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach($details as $occupant)
          <tr>
            <td>{{ $occupant->first_name }} {{ $occupant->middle_name }} {{ $occupant->last_name }}</td>
            <td>{{ $occupant->mobile_num }}</td>
            <td>{{ $occupant->dormitory}}</td>
            <td><a href="{{ url('admin/occupantdetails/'. $occupant->id) }}"><button type="button">VIEW</button></a></td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    <!-- PDF CONVERSION: TABLE FOR OCCUPANT -->
    <div id="tab" style="visibility:hidden;height:0; width:0;" class="tableFixHead">
    <table>
        <thead>
          <tr>
            <th>NAME</th>
            <th>CONTACT NUMBER</th>
            <th>DORMITORY</th>
          </tr>
        </thead>
        <tbody>
            @foreach($details as $occupant)
          <tr>
            <td>{{ $occupant->first_name }} {{ $occupant->middle_name }} {{ $occupant->last_name }}</td>
            <td>{{ $occupant->mobile_num }}</td>
            <td>{{ $occupant->dormitory}}</td>
          </tr>
            @endforeach
        </tbody>
      </table>
      </div>

    <button type="button" class="yellowbutton" id="btPrint" onclick="createPDF()" style="float:right;margin-top:20px;margin-right:80px;"> DOWNLOAD</button>
</div>

  <script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Arial;}";
        style = style + "table, th, td {border: solid 2px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('<h2 style="font-family:Arial;">List of Occupants</h2>');   // <title> FOR PDF HEADER.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
    </script>


</body>
</html>