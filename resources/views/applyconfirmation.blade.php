<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- JS -->
        <script src="/js/studentDormFinder.js"></script>
        <!-- ICON -->
        <link rel="icon" href="/images/mmsu logo.png">
    </head>
    
<body>
    <!-- HEADER -->
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

    <!-- SLIDESHOW OF DORMITORY  -->
    <div class="dorm_details_con" style="margin-top:3%;">

        <div id="slideshow" class="imgcontainer">
            @foreach($images as $image)
            <div class="mySlides"> <img src="/images/{{ $image->filename }}" style="width:100%;height:70vh;"><div class="text">{{ $image->label }}</div></div>
            @endforeach
            <a class="prev" onclick="plusSlides(-1, slideshow)">❮</a>
            <a class="next" onclick="plusSlides(1, slideshow)">❯</a>
        </div>
    </div>

    <!-- DETAILS OF DORMITORY  -->
    <div class="dorm_details" style="margin-top:3%;">    
        <form style="width:80%;" action="/applyconfirmation/{{ $details->id }}" method="POST">
            @csrf
            <h2 style="color:#053F5E;">Confirm your Application to <br> {{ $details->dorm_name }}</h2>
            <label style="width:30%;margin-right:2%;" for="room">Choose a Room Type</label>
            <label style="width:25%;margin-right:2%;" for="room">Vacancy</label><br>
        
            <select name="room_type" id="roomtype" style="width:30%;margin-right:2%;" class="inputapp" onchange="changeInput(event)" required>
                <option selected disable hidden></option>
                @foreach($room_types as $types)
                <option value="{{ $types->vacancy }}">{{ $types->room_type }}</option>
                @endforeach
            </select>

            <input type="hidden" id="type" name="type">
            <input type="text" id="vacancy" name="vacancy" style="width:15%;margin-right:2%;" readonly class="inputapp"><br>
        
            <button type="submit" onclick="###" class="secondyellowbutton" style="width:20%;margin-top:5%;float:left;"> CONFIRM</button>
            <a href="{{ URL::previous() }}"><button type="button" class="confirmcancelbutton">BACK</button></a><br>

        </form>
    </div>

    <!-- SCRIPT FOR SLIDESHOW  -->
    <script>
        var slideshow = document.getElementById("slideshow");
        slideshow.currentSlideIndex = 1;
        showSlides(slideshow.currentSlideIndex, slideshow);
        function plusSlides(n, slideshow) {
        showSlides(slideshow.currentSlideIndex += n, slideshow);
        }
        function currentSlide(n, slideshow) {
        showSlides(slideshow.currentSlideIndex = n, slideshow);
        }
        function showSlides(n, slideshow) {
  
            var i;
            var slides = slideshow.getElementsByClassName("mySlides");
       
            if (n > slides.length) {slideshow.currentSlideIndex = 1}    
            if (n < 1) {slideshow.currentSlideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slides[slideshow.currentSlideIndex-1].style.display = "block";  
        }
        
        function changeInput(e) {
            document.getElementById("vacancy").value = e.target.value;
            var sel = document.getElementById("roomtype");
            document.getElementById("type").value = sel.options[sel.selectedIndex].text;
        }
    </script>

</body>
</html>