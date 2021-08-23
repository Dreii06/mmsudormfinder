<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ICON -->
        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Applicants</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">  

        <!-- JS -->
        <script type="text/javascript" src="dormfindercoed.js"></script>
    </head>
    
    <body class="antialiased">
        
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
            <li><a class="active" href="{{ url('manager/listapplicants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="{{ url('manager/listoccupants') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="{{ url('manager/viewdorm/'. Auth::guard('manager')->user()->id) }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="{{ url('manager/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
                <li><button type="submit"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>    
    </div>
    <!-- END OF NAVIGATION BAR -->
   
    <!-- MAIN CONTENT -->
    <div class="listappcontainer">
    
    <!-- 2ND HEADER WITH SEARCH BAR -->
    <div class="header"> <h1 style="width:100%;">LIST OF APPLICANTS</h1>
            <form style="margin-right:0%;" action="/manager/searchapplicants" method="POST" role="search">
              @csrf
              <input type="text" id="search" onkeyup="searchFunction()" placeholder="Search" name="search">
              <button type="submit"><img src="https://img.icons8.com/pastel-glyph/50/000000/search--v2.png" width="80%"></button>
            </form>        
    </div>
    
    <!-- Table for applicants -->
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
          @foreach ($applicants as $applicant)
          <tr>
            <td>{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</td>
            <td>{{ $applicant->city }}</td>
            <td>{{ $applicant->mobile_num }}</td>
            <td><a href="{{ url('manager/detailsapplicant/'. $applicant->id) }}"><button type="button">VIEW</button></a></td>
          </tr>
          @endforeach
          </tbody>
      </table>
    </div>

    
    <!-- PDF CONVERSION: Table for applicants -->
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
          @foreach ($applicants as $applicant)
          <tr>
            <td>{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</td>
            <td>{{ $applicant->city }}</td>
            <td>{{ $applicant->mobile_num }}</td>
          </tr>
          @endforeach
          </tbody>
      </table>
    </div>

    <button type="button" class="yellowbutton" id="btPrint" onclick="createPDF()" style="float:right;margin-top:20px;margin-right:10%;"> DOWNLOAD</button>
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