<html>
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- SCRIPT -->
        <script src="/studentDormFinder.js"></script>

        <link rel="icon" href="/images/mmsu logo.png">
    </head>

    <body>
    <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - Dorm Finder</h3></div>
    
     <!-- NAVIGATION BAR -->
     <div class="topnav" id="myTopnav">
            <img style="float:left;margin-left:20px;margin-top:5px;" src="/images/mmsu logo.png"  height="4%" width="4%">
            <a style=" text-decoration: none;width:20%;margin:0%;" href="{{ url('dashboard') }}"><h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4></a>
            <a class="topnavlink" href="/contact">CONTACT</a>
            <a class="topnavlink" href="/about">ABOUT US</a>
            <a class="topnavlink" href="/dorm">LIST OF DORMS</a>

            <div class="menu">
                <img style="float:right;" src="/images/user.png"  width="15%" height="35%">
                    <ul><li>
                    <a href="#" style="float:right;width:10vw;">{{ Auth::user()->stud_num }}</a>
                        <ul style="padding-top:2vh;margin-top:5vh;">
                        <li><a href="{{ url('profilestudent') }}">Profile</a></li><br>
                        <li><a href="{{ url('applicationlist') }}">Application List</a></li><br>
                        <li><a href="{{ url('reportdorm') }}">Report Dormitory</a></li><br>
                        <form style="display:block;" method="POST" action="{{ route('logout') }}">
                            @csrf
                        <li><button type="submit">{{ __('Log Out') }}</button></li>
                        </form>
                        </ul>
                    </ul></li>
            </div>
        </div>

    <!-- BREADCRUMBS -->
    <div class="page__section">
        <nav class="breadcrumb breadcrumb_type5" aria-label="Breadcrumb">
            <ol class="breadcrumb__list r-list">
              <li class="breadcrumb__group">
                  <a href="{{ url('dashboard') }}" class="breadcrumb__point r-link">Home</a>
                  <span class="breadcrumb__divider" aria-hidden="true">›</span>
              </li>
              <li class="breadcrumb__group">
                  <a href="{{ url('dorm') }}" class="breadcrumb__point r-link">Dorm</a>
                  <span class="breadcrumb__divider" aria-hidden="true">›</span>
              </li>
              <li class="breadcrumb__group">
                <span class="breadcrumb__point" aria-current="page">On Campus</span>
              </li>
            </ol>
        </nav>
    </div>         

    <!-- SECOND HEADER WITH SEARCH BAR-->
    <div class="header"> <h1>LIST OF DORMITORIES</h1>
        <form style="margin-left:40%;margin-top:1.2%;width:30vw;" action="/searchoffcampusdorms" method="POST" role="search">
        @csrf
          <input type="text" id="search" onkeyup="searchFunction()" placeholder="Search.." name="q">
          <button type="submit"><img src="https://img.icons8.com/pastel-glyph/50/000000/search--v2.png" width="100%"></button>
        </form>         
    </div>
        
    <div class="listappcontainer">
    <div class="tableFixHead">
      <table>
        <thead>
          <tr>
            <th>DORMITORY NAME</th>
            <th>DORM MANAGER</th>
            <th>CONTACT NUMBER</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach($dorm as $dorm)
          <tr>
            <td>{{ $dorm->dorm_name }}</a></td>
            <td>{{ $dorm->first_name }} {{ $dorm->middle_name }} {{ $dorm->last_name }}</td>
            <td>{{ $dorm->mobile_num }}</td>
            <td><a href="{{ url('dormitorydetails/'.$dorm->dorm_name) }}"><button type="button">VIEW</button></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>

    </body>
</html>