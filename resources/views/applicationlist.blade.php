<html>
    <head>
        <title>MMSU-Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
         <!-- JavaScript -->
         <script src="/js/studentDormFinder.js"></script>
         <link rel="icon" href="/images/mmsu logo.png">
    </head>

    <body>
    <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - DORM FINDER</h3></div>
    <div class="topnav" id="myTopnav">
       <img style="float:left;margin-left:20px;margin-top:5px;" src="/images/mmsu logo.png"  height="4%" width="4%">
       <a style=" text-decoration: none;width:20%;margin:0%;" href="/dashboard"><h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4></a>
            <a class="topnavlink" href="/contact">CONTACT</a>
            <a class="topnavlink" href="/about">ABOUT US</a>
            <a class="topnavlink" href="/dorm">LIST OF DORMS</a>

                <div class="menu">
                <img style="float:right;margin-top:15px;" src="/images/user.png"  width="15%" height="40%">
                    <ul><li>
                     <a href="#" style="float:right;margin:10px 0px 0px 0px;">{{ Auth::user()->stud_num }}</a>
                        <ul>
                        <li><a href="/profilestudent">Profile</a></li><br>
                        <li><a href="/applicationlist">Application List</a></li><br>
                        <form style="display:block;" method="POST" action="{{ route('logout') }}">
                            @csrf
                        <li><button type="submit">{{ __('Log Out') }}</button></li>
                        </form>
                        </ul>
                    </ul></li>
            </div>
    </div>

    <div class="header"> <h1>APPLICATION LIST</h1></div>

    <p class="note"> <b>NOTICE</b> : After confirming, wait for 1-3 business days for the process, if still waiting for
        approval, feel free to apply to other available dormitories </p>

    @foreach($details as $detail)
    <div class="applistform">
    <form action="/applicationlist" method="POST">
        @csrf
        <label for="dormname">Dorm Name</label>
            <input type="text" id="dormname" value="{{ $detail->dormitory }}" style="width: 30%;" class="readapp" readonly="readonly">
        <label for="roomtype">Room Type</label>
            <input type="text" id="roomtype" value="{{ $detail->room_type }}" style="width: 25%;" class="readapp" readonly="readonly"><br>
        <label for="fname">Manager</label>
                <input type="text" id="fname" value="{{ $detail->first_name }} {{ $detail->middle_name }} {{ $detail->last_name }}" style="width: 30%;" class="readapp" value="Sample Name" readonly="readonly">
        <label for="number">Mobile Number</label>
            <input type="tel" id="number" value="{{ $detail->mobile_num }}" style="width: 25%;" class="readapp" readonly="readonly"><br>
        
        <label for="process">Process</label>
        <input type="text" id="process" name="process" value="{{ $process }}" style="width: 30%;color:#28a01b;font-family:ABold;" class="readapp" readonly="readonly">
        
        <button type="submit" name="cancel" onclick="cancelapp()" class="secondyellowbutton" style="width:20%;float:right;margin-right:15%;"> CANCEL APPLICATION</button>

    </form>
    </div>
    @endforeach

</body>
</head>
</html>