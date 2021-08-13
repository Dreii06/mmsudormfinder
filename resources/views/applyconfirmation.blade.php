<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- JavaScript -->
        <script src="/js/studentDormFinder.js"></script>
        <link rel="icon" href="/images/mmsu logo.png">
        
    </head>
    
    <body class="antialiased">

    <div class="uppernav"> <h3 style="margin-left:20px;">MMSU - Dorm Finder</h3></div>
    
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

    <!-- SLIDESHOW OF DORMITORY  --><br>
        <div class="dorm_details_con">

        <div id="slideshow" class="imgcontainer">
        @foreach($images as $image)
        <div class="mySlides"> <img src="/images/{{ $image->filename }}" style="width:100%;height:500px;"><div class="text">{{ $image->label }}</div></div>
        @endforeach
        <a class="prev" onclick="plusSlides(-1, slideshow)">❮</a>
        <a class="next" onclick="plusSlides(1, slideshow)">❯</a>
        </div>
           <p class="descriptiondorm"> {{ $details->description }} </p>
    </div>

        <!-- DETAILS OF DORMITORY  -->
    <div class="dorm_details">    
        <form style="width:80%;" action="/applyconfirmation/{{ $details->id }}" method="POST">
            @csrf
        <h2 style="color:#0C4B05;">Confirm your Application to {{ $details->dorm_name }}</h2>
        <label style="width:30%;margin-right:2%;" for="room">Type of Room</label>
        <label style="width:25%;margin-right:2%;" for="room">Vacancy</label><br>
          
        <select name="room_type" id="roomtype" style="width:30%;margin-right:2%;" class="inputapp" onchange="changeInput(event)">
            <option selected disable hidden>Choose your room type</option>
            @foreach($room_types as $types)
            <option value="{{ $types->vacancy }}">{{ $types->room_type }}</option>
            @endforeach
        </select>

        <input type="hidden" id="type" name="type">
        <input type="text" id="vacancy" name="vacancy" style="width:25%;margin-right:2%;" readonly class="inputapp"><br>
        
        <button type="submit" onclick="###" class="secondyellowbutton" style="width:20%;margin-top:5%;float:left;"> CONFIRM</button>
        <a href="/dashboard"><button type="button" class="confirmcancelbutton">CANCEL</button></a><br>
        
        <p style="margin-top:10%;"class="note"> NOTE: After confirming, wait for 1-3 business days for the process, if still waiting for
        approval, feel free to apply to other available dormitories </p>

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