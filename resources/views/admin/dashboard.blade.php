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
        
    <div class="uppernav"><h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - Admin Dorm Management</h3></div>
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:12px;" src="/images/mmsu logo.png"  height="3%" width="3%">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">DASHBOARD</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('admin')->user()->name }}</li>
            <li><a  class="active" href="/admin/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/admin/registrants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Registrants</a></li>
            <li><a href="/admin/dorms"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/admin/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <li><a href="" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>Log Out</a></li>
        </ul>    
    </div>

    
    <div class="dashboard_con">
<input type="radio" name="item" checked="checked" id="section1" />
    <input type="radio" name="item" id="section2" />

    <nav class="nav">
      <label class="nav-item" for="section1">R</label>
      <label class="nav-item" for="section2">D</label>

    </nav>

    
    <section>
        <h2 class="h2nav"><p class="text--sub">admin management</p>Registrants <p class="text--normal">Pikachu is an Electric-type Pokémon introduced in Generation I. Pikachu are small, chubby, and incredibly 
          cute mouse-like Pokémon. They are almost completely covered by yellow fur.</p><p class="text--sub">CLICK BUTTONS ON THE <br>RIGHT SIDE TO CHOOSE</p><p class="text__background">ADMIN</p>
          <a href="/admin/registrants"><button type="button" class="dorm">V I E W</button></a>
        </h2>
    </section>
   
    <section>
        <h2 class="h2nav"><p class="text--sub">admin management</p>Dormitory<p class="text--normal">Pikachu is an Electric-type Pokémon introduced in Generation I. Pikachu are small, chubby, and incredibly 
          cute mouse-like Pokémon. They are almost completely covered by yellow fur.</p><p class="text--sub">CLICK BUTTONS ON THE <br>RIGHT SIDE TO CHOOSE</p><p class="text__background">ADMIN</p>
          <a href="/admin/dorms"><button type="button" class="dorm">V I E W</button></a>
        </h2>
        </section>
</div>
    </body>
</html>