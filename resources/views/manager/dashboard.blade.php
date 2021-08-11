<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">    
    </head>
    
    <body>
        
    <div class="uppernav"><h3>MMSU - COEDS / Proprietor Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png"  height="3%" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">DASHBOARD</div>
    </div>    

    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a class="active" href="/manager/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/manager/listapplicants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="/manager/listoccupants"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="/manager/viewdorm/{{ Auth::guard('manager')->user()->id }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/manager/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
            <li><a href=""> <button type="submit" style="padding-left:0%;color:red;" ><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></a></li>
          </form>
        </ul>    
    </div>

    <div class="dashboardcontainer">
   
   <input type="radio" name="item" checked="checked" id="section1" />
   <input type="radio" name="item" id="section2" />
   <input type="radio" name="item" id="section3" />

<!-- APPLICANT -->
      <section>
          <h2 class="h2nav"><p class="text--sub">dorm management</p>Applicants 
      
            <div class="headerstat">
              <p style="padding-top:1%;" class="text--small">TOTAL APPLICANTS :
              <input type="text" style="width:20%;" id="fname" name="first" value="{{ $applicants }}" readonly></p>
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
                  <td>{{ $applicants_cas }}</td>
              </tr>
              <tr>
                  <td>COE</td>
                  <td>{{ $applicants_coe }}</td>
              </tr>
              <tr>
                  <td>CHS</td>
                  <td>{{ $applicants_chs }}</td>
              </tr>
              <tr>
                  <td>CAFSD</td>
                  <td>{{ $applicants_cafsd }}</td>
              </tr>
              <tr>
                  <td>CBEA</td>
                  <td>{{ $applicants_cbea }}</td>
              </tr>
              <tr>
                  <td>CASAT</td>
                  <td>{{ $applicants_casat }}</td>
              </tr>
              <tr>
                  <td>CTE</td>
                  <td>{{ $applicants_cte }}</td>
              </tr>
              <tr>
                  <td>CIT</td>
                  <td>{{ $applicants_cit }}</td>
              </tr>
        </table>

        </div>
        <a href="/manager/listapplicants"><button type="button" class="dorm">V I E W</button></a>
        </h2>
      </section>
  
    <!-- OCCUPANTS -->
        <section>
          <h2 class="h2nav"><p class="text--sub">dorm management</p>Occupants 

              <div class="headerstat">
                <p style="padding-top:1%;" class="text--small">TOTAL OCCUPANTS :
                <input type="text" style="width:20%;" id="fname" name="first" value="{{ $occupants }}"  readonly></p>
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

      <a href="/manager/listapplicants"><button type="button" class="dorm">V I E W</button></a>

      </h2>
      </section>

  <!-- DORMITORY -->

      <section>
          <h2 class="h2nav"><p class="text--sub">dorm management</p>Dormitory 
      
          <div style="display:flex;margin-top:5%;">
            <div class="statistics">
              <div> <img src="https://img.icons8.com/bubbles/100/000000/group.png"/></div>
              <p style="	margin-bottom:0%;" class="text--small">Available Space<br>
              <input type="text"  style="width:20%;" id="fname" name="first" value="{{ $available_space }}"  readonly></p>
            </div>

            <div style="margin-left:3%;" class="statistics">
              <div> <img src="https://img.icons8.com/bubbles/100/000000/classroom.png"/></div>
              <p style="width:100%;margin-right:1%;" class="text--small">Vacancy per Room Type<br>
              <select name="room_type" onchange="changeInput(event)">
                <option selected disable hidden></option>
                @foreach($room_types as $types)
                <option value="{{ $types->vacancy }}">{{ $types->room_type }}</option>
                @endforeach
              </select>
              <input type="text" style="width:20%;" id="vacancy" name="vacancy" readonly></p>
            </div>
          </div>

      <p class="text--normal">To be able to view and accept/deny your applicants, click view!</p>
      <a href="/manager/listapplicants"><button type="button" class="dorm">V I E W</button></a>

      </h2>
      </section>

      <div class="cover"></div>

      <nav class="nav">
          <label class="nav-item" for="section1">APPLICANTS</label>
          <label class="nav-item" for="section2">OCCUPANTS</label>
          <label class="nav-item" for="section3">DORMITORY</label>
      </nav>
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