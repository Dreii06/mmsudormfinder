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
        <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png"  height="3%" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">DASHBOARD</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a class="active" href="/admin/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/admin/registrants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Registrants</a></li>
            <li><a href="/admin/occupantslist"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="/admin/dorms"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/admin/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form style="margin-left:0%;margin-top:0%;display:block;" method="POST" action="{{ route('admin.logout') }}">
                @csrf
            <li><button type="submit" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>

    
<div class="dashboard_con">

<input type="radio" name="item" checked="checked" id="section1" />
   <input type="radio" name="item" id="section2" />
   <input type="radio" name="item" id="section3" />

<!-- REGISTRANTS -->
      <section>
          <h2 class="h2nav"><p class="text--sub">admin management</p>Registrants 
      
          <div style="display:flex;margin-top:5%;">
            <div class="statistics">
              <div> <img src="https://img.icons8.com/bubbles/100/000000/group.png"/></div>
              <p style="	margin-bottom:0%;" class="text--small">Total Registrants<br>
              <input type="text"  style="width:20%;" id="fname" name="first" value="{{ $registrants }}" readonly></p>
            </div>

          </div>

        <p class="text--normal">To be able to view and accept/deny registrants, click view!</p>
        <a href="/admin/registrants"><button type="button" class="dorm">V I E W</button></a>
        </h2>
      </section>
  
    <!-- OCCUPANTS -->
        <section>
          <h2 class="h2nav"><p class="text--sub">admin management</p>Occupants 
      
          <div class="headerstat">
            <p style="padding-top:1%;" class="text--small">TOTAL OCCUPANTS : 
            <input type="text"  style="width:20%;" id="fname" name="first" value="{{ $occupants }}" readonly></p>
        </div>

        <div class="tableFixHead" style="margin-top:1%;width:100%;height:250px;">
        <table style="color:white;">
          <tr>
            <thead>
            <th>COLLEGE</th>
            <th>TOTAL</th>
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
      
        <a href="/admin/occupantslist"><button type="button" class="dorm">V I E W</button></a>

      </h2>
      </section>

  <!-- DORMITORY -->

      <section>
          <h2 class="h2nav"><p class="text--sub">admin management</p>Dormitory 
      
          <div style="display:flex;margin-top:5%;">
            <div class="statistics">
              <div> <img src="https://img.icons8.com/bubbles/100/000000/group.png"/></div>
              <p style="	margin-bottom:0%;" class="text--small">Total Dormitories<br>
              <input type="text"  style="width:20%;" id="fname" name="first" value="{{ $dorms_count }}"  readonly></p>
            </div>

            <div style="margin-left:3%;" class="statistics">
              <div> <img src="https://img.icons8.com/bubbles/100/000000/classroom.png"/></div>
              <p style="width:100%;margin-right:1%;" class="text--small">Occupants per Dorm<br>
              <select name="dorm" id="dorm" onchange="changeInput(event)">
                <option selected disable hidden></option>
                @foreach($dorms as $dorms)
                <option value="{{ $dorms->num_of_occupants }}">{{ $dorms->dorm_name }}</option>
                @endforeach
              </select>
              <input type="text" style="width:20%;" id="occupants_num" name="occupants_num" readonly></p>
            </div>
          </div>

      <a href="/admin/dorms"><button type="button" class="dorm">V I E W</button></a>

      </h2>
      </section>

      <div class="cover"></div>

      <nav class="nav">
          <label class="nav-item" for="section1">REGISTRANTS</label>
          <label class="nav-item" for="section2">OCCUPANTS</label>
          <label class="nav-item" for="section3">DORMITORY</label>
      </nav>
</div>
  <script>
    function changeInput(e) {
            document.getElementById("occupants_num").value = e.target.value;
            var sel = document.getElementById("dorm");
    }
  </script>
</body>
</html>