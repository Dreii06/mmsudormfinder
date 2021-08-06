<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">    
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav"> <h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - COEDS / Proprietor Dorm Management</h3> </div>
    
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


   <nav class="nav">
     <label class="nav-item" for="section1">A</label>
     <label class="nav-item" for="section2">O</label>
     <label class="nav-item" for="section3">D</label>
   </nav>

   
   <section>
       <h2 class="h2nav"><p class="text--sub">dorm management</p>Applicants <p class="text--normal">To be able to view and accept/deny your applicants, click view!</p><p class="text--sub">CLICK BUTTONS ON THE <br>RIGHT SIDE TO CHOOSE</p>
         <a href="/manager/listapplicants"><button type="button" class="dorm">V I E W</button></a>
       </h2>
   </section>
  
   <section>
       <h2 class="h2nav"><p class="text--sub">dorm management</p>Occupants<p class="text--normal">To be able to view and update your occupants, click view!</p><p class="text--sub">CLICK BUTTONS ON THE <br>RIGHT SIDE TO CHOOSE</p>
         <a href="/manager/listoccupants"><button type="button" class="dorm">V I E W</button></a>
       </h2>
   </section>

   <section>
       <h2 class="h2nav"><p class="text--sub">dorm management</p>Dormitory<p class="text--normal">To be able to update details in your dormitory, click update!</p><p class="text--sub">CLICK BUTTONS ON THE <br>RIGHT SIDE TO CHOOSE</p>
         <a href="/manager/viewdorm/{{ Auth::guard('manager')->user()->id }}"><button type="button" class="dorm">U P D A T E</button></a>
       </h2>
   </section>
   <div class="cover"></div>

</div>

</body>
</html>