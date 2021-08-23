<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">  

        <!-- JS -->
          <script type="text/javascript" src="dormfinderadmin.js"></script>
    </head>
    
    <body class="antialiased" style="overflow:hidden;">
        
    <div class="uppernav"><h3>MMSU - Admin Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;" src="/images/mmsu logo.png" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>

      <div class="header"> <h1 style="color:white;">OFF - CAMPUS DORMITORIES</h1>
        <form style="margin-top:3vh;margin-left:15%;" action="/admin/searchoffcampusdorms" method="POST" role="search">
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
          @forelse($oncampusdorms as $dorm)
          <tr>
            <td>{{ $dorm->dorm_name }}</td>
            <td>{{ $dorm->first_name }} {{ $dorm->middle_name }} {{ $dorm->last_name }} </td>
            <td>{{ $dorm->mobile_num }}</td>
            <td><a href="{{ url('admin/dormdetails/'. $dorm->dorm_name) }}"><button type="button">VIEW</button></a></td>
          </tr>
          @empty
            <td><p>No Dorms Found</p></td>
          @endforelse
        </tbody>
      </table>
    </div>
    <a href="{{ URL::previous() }}"><button type="button" style="margin-top:20px;margin-right:5%;" class="greenbutton">BACK</button></a>
    <button type="button" class="yellowbutton" onclick="download()" style="float:right;margin-top:20px;margin-right:1%;"> DOWNLOAD</button>
  </div>

</body>
</html>