<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ICON -->
        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Occupants</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">  

        <!-- JS -->
        <script type="text/javascript" src="dormfindercoed.js"></script>
        
    </head>
    
    <body class="antialiased">
    <!-- HEADER -->
    <div class="uppernav"><h3>MMSU - COEDS / Proprietor Dorm Management</h3></div>
    
    <!-- NAVIGATION BAR -->
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:1vw;margin-top:0.5vh;" src="/images/mmsu logo.png"  width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="{{ url('manager/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="{{ url('manager/listapplicants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a class="active" href="{{ url('manager/listoccupants') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="{{ url('manager/viewdorm/'. Auth::guard('manager')->user()->id) }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="{{ url('manager/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
                <li><button type="submit"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>    
    </div>
    
    <!-- MAIN CONTENT -->
    <div class="listappcontainer">
    
    <!-- 2ND HEADER WITH SEARCH BAR -->
      <div class="header"> <h1 style="width:100%;">LIST OF OCCUPANTS</h1>
            <form style="margin-right:0%;" action="/manager/searchoccupants" method="POST" role="search">
              @csrf
              <input type="text" id="search" onkeyup="searchFunction()" placeholder="Search" name="search">
              <button type="submit"><img src="https://img.icons8.com/pastel-glyph/50/000000/search--v2.png" width="80%"></button>
            </form>        
      </div>

    <!-- TABLE FOR OCCUPANT -->
    <div class="tableFixHead">
      <table>
        <thead>
          <tr>
            <th>NAME</th>
            <th>ADDRESS</th>
            <th>CONTACT NUMBER</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach($occupants as $occupant)
          <tr>
            <td>{{ $occupant->first_name }} {{ $occupant->middle_name }} {{ $occupant->last_name }}</td>
            <td>{{ $occupant->city }}</td>
            <td>{{ $occupant->mobile_num }}</td>
            <td><a href="{{ url('manager/detailsoccupant/'. $occupant->id) }}"><button type="button">VIEW</button></a></td>
          </tr>
          @endforeach
          <tr>
            <td>{{ $occupant->first_name }} {{ $occupant->middle_name }} {{ $occupant->last_name }}</td>
            <td>{{ $occupant->city }}</td>
            <td>{{ $occupant->mobile_num }}</td>
            <td><a href="{{ url('manager/detailsoccupant/'. $occupant->id) }}"><button type="button">VIEW</button></a></td>
          </tr>
        </tbody>
      </table>
    </div>


    <!-- PDF CONVERSION: TABLE FOR OCCUPANT -->
    <div id="tab" style="visibility:hidden;height:0; width:0;" class="tableFixHead">
      <table>
        <thead>
          <tr>
            <th>NAME</th>
            <th>ADDRESS</th>
            <th>CONTACT NUMBER</th>
          </tr>
        </thead>
        <tbody>
            @foreach($occupants as $occupant)
          <tr>
            <td>{{ $occupant->first_name }} {{ $occupant->middle_name }} {{ $occupant->last_name }}</td>
            <td>{{ $occupant->city }}</td>
            <td>{{ $occupant->mobile_num }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <button type="button" class="yellowbutton" id="btPrint" onclick="createPDF()" style="float:right;margin-top:1vh;margin-right:5vw;"> DOWNLOAD</button>
    </div>
    
    <script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Arial;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
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