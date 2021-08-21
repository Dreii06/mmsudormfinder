<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Registrants</title>

        <!-- CSS -->
          <link rel="stylesheet" type="text/css" href="/css/ADMINstyle.css">
        <!-- JS -->
          <script type="text/javascript" src="dormfinderadmin.js"></script>
    </head>
    
    <body class="antialiased">
        
     
    <div class="uppernav"><h3>MMSU - Admin Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png"  height="3%" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
          
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a href="{{ url('admin/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/>Home</a></li>
            <li><a class="active" href="{{ url('admin/registrants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/>Registrants</a></li>
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

    <div class="header"> <h1 style="color:white;">REGISTRANTS</h1>
    <form style="margin-top:2%;margin-left:30%;" action="/admin/searchregistrants" method="POST" role="search">
        @csrf
        <input type="text" id="search" onkeyup="searchFunction()" placeholder="Search" name="search">
        <button type="submit"><img src="https://img.icons8.com/pastel-glyph/50/000000/search--v2.png" width="100%"></button>
      </form>        
    </div>

    <div class="listappcontainer">
    <div class="tableFixHeadtitle">LIST OF REGISTRANTS</div>  
    <div class="tableFixHead">
      <table>
        <thead>
          <tr>
            <th>NAME</th>
            <th>DORM NAME</th>
            <th>CONTACT NUMBER</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @forelse($registrants as $registrant)
          <tr>
            <td>{{ $registrant->first_name }} {{ $registrant->middle_name }} {{ $registrant->last_name }}</td>
            <td>{{ $registrant->dorm_name }}</td>
            <td>{{ $registrant->mobile_num }}</td>
            <td><a href="/admin/registrantdetails/{{ $registrant->id }}"><button type="button">VIEW</button></a></td>
          </tr>
            @empty
            <td><p>No Registrants Found</p></td>
            @endforelse
        </tbody>
      </table>
    </div>
</div>

</body>
</html>