<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">    
    </head>
    
    <body style="overflow:hidden;" >
        <div class="uppernav"><h3>MMSU - COEDS / Proprietor Dorm Management</h3></div>

        <div class="topnav" id="myTopnav">
            <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png" width="3%">
            <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
            <div class="titleheader">DASHBOARD</div>
        </div>

        <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a class="active" href="{{ url('manager/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="{{ url('manager/listapplicants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="{{ url('manager/listoccupants') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="{{ url('manager/viewdorm/'.Auth::guard('manager')->user()->id) }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="{{ url('manager/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
                <li><button type="submit"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
          </form>
        </ul>    
    </div>

    <div class="dashboardcontainer">
       <div style="width:100%;margin-top:5%">
          <!-- APPLICANT -->
          <div class="maincon">
          <h2 class="h2nav"> Applicants <p class="text--sub">View and update your applicants</p>
            <a href="{{ url('manager/listapplicants') }}"><button type="button" class="dorm">V I E W</button></a>
          </h2>
      </div>
  
    <!-- OCCUPANTS -->
      <div class="maincon">
          <h2 class="h2nav"> Occupants <p class="text--sub">View and update your occupants</p>
          <a href="{{ url('manager/listoccupants') }}"><button type="button" class="dorm">V I E W</button></a>
          </h2>
      </div>

  <!-- DORMITORY -->

      <div class="maincon">
          <h2 class="h2nav"> Dormitory <p class="text--sub">View and update your dormitory</p>
          <a href="{{ url('manager/viewdorm/'.Auth::guard('manager')->user()->id) }}"><button type="button" class="dorm">V I E W</button></a>
          </h2> 
      </div></div>

  <!-- OVERVIEW -->

      <div class="notedashboardcon">
          <h2 class="h2nav"> Overview</h2>

          <div class="headerstat">
            <p style="padding-top:1%;" class="text--small">TOTAL APPLICANTS :
              <input type="text" style="width:20%;" id="fname" name="first" value="{{ $applicants }}" readonly></p>
          </div>

          <div class="headerstat">
                <p style="padding-top:1%;" class="text--small">TOTAL OCCUPANTS :
                <input type="text" style="width:20%;" id="fname" name="first" value="{{ $occupants }}"  readonly></p>
          </div><br>

          <div class="headerstat" style="background-color:transparent;border-bottom: #053F5E solid 1px;border-radius:0%;">
              <p style="margin-right:1%;width:100%;color:#434546;font-family:ABolder;" class="text--small">VACANCY PER ROOM TYPE</p>
              <div class="viewdormtable">
                <table >
                <tr>
                    <thead >
                    <th style="font-size:1.1vw;">ROOM TYPE</th>
                    <th style="font-size:1.1vw;">VACANCY</th>
                    </thead>
                </tr>
                @foreach($room_types as $types)
                <tr>
                    <td style="font-size:1.1vw;">{{ $types->room_type }}</td>
                    <td style="font-size:1.1vw;">{{ $types->vacancy }}</td>
                </tr>
                @endforeach
                </table>
              </div>
            </div>
      </div>

      <div class="cover"></div>

</div>

<script>
  function changeInput(e) {
            document.getElementById("vacancy").value = e.target.value;
            var sel = document.getElementById("roomtype");
            document.getElementById("type").value = sel.options[sel.selectedIndex].text;
        }
</script>
</body>
</html>