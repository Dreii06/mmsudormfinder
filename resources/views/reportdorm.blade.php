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
    

    <div class="header"> <h1>FEEDBACK FORM</h1></div>

    <p class="note"> <img src="https://img.icons8.com/cute-clipart/64/000000/info.png" width="2%" /> <b>NOTICE</b> : The admin will assure that all feedback given will be confidential
    and anonymous. If you have any other concerns, kindly contact the administrator.</p>

    <!-- The Modal -->
    <div id="myModal" class="modal" style="display:none;">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p style="padding-left:1vw;padding-bottom:1.5vw;">Feedback Sent Successfully!</p>
        </div>
    </div>


    <div class="applistform">
        <form action="/reportdorm" method="POST" onsubmit="modalclick()">
            @csrf
            <label style="width:100%;"for="dorm">Choose Dormitory to Report:</label><br>
            <select name="dormitory" style="width:30%;margin-bottom:2%;" id="dorm" class="inputapp">
                @foreach ($dorms as $dorm)
                <option value="{{ $dorm->dorm_name }}">{{ $dorm->dorm_name }}</option>
                @endforeach
            </select>

            <label style="width:100%;"for="dorm">Reason of Report:</label><br>
            <input type="text" name="reason" class="inputapp" required><br><br>

            <label style="width:100%;"for="feedback">Kindly explain further:</label><br>
            <textarea id="feedback" placeholder="Input feedback/report here..." required name="report"></textarea><br><br>

        <a href="dashboard"><button type="button" id="cancel" name="cancel"  class="greenbutton" style="margin-top:0%;width:15%;float:right;margin-right:15%;">CANCEL</button></a>
        <button type="submit" id="confirm" name="confirm"  class="secondyellowbutton" style="width:15%;float:right;margin-right:1%;">SUBMIT</button>

        </form>
    </div>

    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    function modalclick() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>

</body>
</html>