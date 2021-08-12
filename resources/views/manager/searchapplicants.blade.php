<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="/manager/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a class="active" href="/manager/listapplicants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="/manager/listoccupants"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a href="/manager/viewdorm/{{ Auth::guard('manager')->user()->id }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/manager/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
            <li><a href=""><button type="submit" style="padding-left:0%;color:red;" ><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></a></li>
            </form>
        </ul>    
    </div>

    <div class="header"> <h1 style="color:white;">APPLICANTS</h1>
      <form style="margin-top:2%;margin-left:30%;" action="/manager/searchapplicants" method="POST" role="search">
        @csrf
        <input type="text" id="search" onkeyup="searchFunction()" placeholder="Search" name="search">
        <button type="submit"><img src="https://img.icons8.com/pastel-glyph/50/000000/search--v2.png" width="100%"></button>
      </form>
    </div>
  <!-- END OF NAVIGATION BAR -->
   
  <!-- TABLE -->
    <div class="listappcontainer">
        
    <div class="tableFixHeadtitle">LIST OF APPLICANTS</div>  
    <div class="tableFixHead">
      <table>
        <thead>
          <tr>
            <th>NAME</th>
            <th>STUDENT NUMBER</th>
            <th>CONTACT NUMBER</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($applicants as $applicant)
          <tr>
            <td>{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</td>
            <td>{{ $applicant->stud_num }}</td>
            <td>{{ $applicant->mobile_num }}</td>
            <td><a href="detailsapplicant/{{ $applicant->id }}"><button type="button">VIEW</button></a></td>
          </tr>
          @empty
          <td><p>No Applicants Found</p></td>
          @endforelse
        </tbody>
      </table>
    </div>

    <button type="button" class="yellowbutton" onclick="listapp()" style="float:right;margin-top:20px;margin-right:10%;"> DOWNLOAD</button>
</div>

</body>
</html>