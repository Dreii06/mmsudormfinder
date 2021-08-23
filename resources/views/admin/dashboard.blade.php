<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">
        
        <!-- JS -->
        <script type="text/javascript" src="dormfindercoed.js"></script>
        
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav"><h3>MMSU - Admin Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:1vw;" src="/images/mmsu logo.png" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">DASHBOARD</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a class="active" href="{{ url('admin/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/>Home</a></li>
            <li><a href="{{ url('admin/registrants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/>Registrants</a></li>
            <li><a href="{{ url('admin/occupantslist') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/>Occupants</a></li>
            <li><a href="{{ url('admin/dorms') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/>Dorms</a></li>
            <li><a href="{{ url('admin/reportoccupant') }}"><img src="https://img.icons8.com/fluency-systems-regular/96/000000/comments--v2.png"/>Reports</a></li>
            <li><a href="{{ url('admin/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/>Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
            <li><button type="submit" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>

    
<div class="dashboard_con">

  <div style="width:100%;">
      <h2 class="h2nav">OVERALL STATUS 
      <p class="text--sub">HERE ARE THE OVERALL RESULTS FOR TODAY!</p>
      <div style="display:flex;margin-top:1vh;">
          <!-- REGISTRANTS -->
          <div class="statistics">
            <div> <img  style="width:5vw;margin-top:1vh;" src="https://img.icons8.com/bubbles/100/000000/group.png"/></div>
            <p style="margin-bottom:0%;" class="text--small">Total Registrants<br>
            <input type="text" style="width:20%;" id="fname" name="first" value="{{ $registrants }}" readonly></p>
          </div>

          <!-- OCCUPANTS -->
          <div class="statistics">
              <div> <img style="width:5vw;margin-top:1vh;" src="https://img.icons8.com/bubbles/100/000000/group.png"/></div>
              <p style="margin-bottom:0%;" class="text--small">Total Occupants<br>
              <input type="text" style="width:20%;" id="fname" name="first" value="{{ $occupants }}" readonly></p>        
          </div>

          <!-- DORMITORY -->
          <div class="statistics">
              <div> <img  style="width:5vw;margin-top:1vh;" src="https://img.icons8.com/bubbles/100/000000/group.png"/></div>
              <p style="margin-bottom:0%;" class="text--small">Total Dormitories<br>
              <input type="text" style="width:20%;" id="fname" name="first" value="{{ $dorms_count }}"  readonly></p>
          </div>
      </div>

      <div style="display:flex;margin-top:1%;">
          <!-- REGISTRANTS -->
          <div class="statistics" style="width:100%;height:8vh;">
            <p style="margin-top:0%;" class="text--small">Out of all <input type="text" style="width:5%;margin-top:1%;" id="fname" name="first" value="{{ $dorms_capacity }}" readonly>
             Dorm Capacities, there are a total of <input type="text" style="width:5%;margin-top:1%;" id="fname" name="first" value="{{ $dorms_vacancy }}" readonly> vacancies left<br>
            </p>
          </div>
      </div>
      </h2>

      <div style="display:flex;">
        <div class="tableFixHead" style="width:30%;height:100%;margin: 0vh 2vh 2vh 0vh;">
          <table style="color:#053F5E;backdrop-filter: blur(16px) saturate(180%);-webkit-backdrop-filter: blur(16px) saturate(180%);background-color: rgba(255, 255, 255, 0.40);">
          <tr>
            <thead>
            <th>COLLEGE</th>
            <th>OCCUPANTS</th>
            </thead>
          </tr>
          <tr>
            <td>CAS</td>
            <td>{{ $occupants_cas }}</td>
          </tr>
          <tr>
            <td>COE</td>
            <td>{{ $occupants_coe }}</td>
          </tr>
          <tr>
            <td>CHS</td>
            <td>{{ $occupants_chs }}</td>
          </tr>
          <tr>
            <td>CAFSD</td>
            <td>{{ $occupants_cafsd }}</td>
          </tr>
          <tr>
            <td>CBEA</td>
            <td>{{ $occupants_cbea }}</td>
          </tr>
          <tr>
            <td>CASAT</td>
            <td>{{ $occupants_casat }}</td>
          </tr>
          <tr>
            <td>CTE</td>
            <td>{{ $occupants_cte }}</td>
          </tr>
          <tr>
            <td>CIT</td>
            <td>{{ $occupants_cit }}</td>
          </tr>
          </table>
      </div>

      <div class="tableFixHead" style="width:80%;height:100%;margin: 0vh 2.5vh 2vh 0vh;">
          <table style="color:#053F5E;backdrop-filter: blur(16px) saturate(180%);-webkit-backdrop-filter: blur(16px) saturate(180%);background-color: rgba(255, 255, 255, 0.40);">
          <tr>
            <thead>
            <th>DORMITORY</th>
            <th>CAPACITY</th>
            <th>VACANCY</th>
            <th>OCCUPANTS</th>
            </thead>
          </tr>
          @foreach($dorms as $dorm)
          <tr>
            <td>{{ $dorm->dorm_name }}</td>
            <td>{{ $dorm->capacity }}</td>
            <td>{{ $dorm->capacity - $dorm->num_of_occupants }}</td>
            <td>{{ $dorm->num_of_occupants}}</td>
          </tr>
          @endforeach
          </table>
      </div>
    </div>

  </div>
</div>

<div class="cover"></div>
   
</div>

<script>
    function changeInput(e) {
            document.getElementById("occupants_num").value = e.target.value;
            var sel = document.getElementById("dorm");
    }
</script>

</body>
</html>