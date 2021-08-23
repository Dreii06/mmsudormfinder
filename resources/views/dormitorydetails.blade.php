<html>
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- SCRIPT -->
        <script src="/studentDormFinder.js"></script>
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
                  <a href="{{ URL::previous() }}" class="breadcrumb__point r-link">Campus</a>
                  <span class="breadcrumb__divider" aria-hidden="true">›</span>
              </li>
              <li class="breadcrumb__group">
                <span class="breadcrumb__point" aria-current="page">Dormitory Details</span>
              </li>
            </ol>
        </nav>
    </div>         

    <!-- SLIDESHOW OF DORMITORY  -->
    <div class="dorm_name">{{ $details->dorm_name }}</div><br>
    
    <div class="dorm_details_con">
        <div id="slideshow" class="imgcontainer">
            @foreach($images as $image)
            <div class="mySlides"> <img src="/images/{{ $image->filename }}" style="width:100%;height:100%;"><div class="text">{{ $image->label }}</div></div>
            @endforeach
            <a class="prev" onclick="plusSlides(-1, slideshow)">❮</a>
            <a class="next" onclick="plusSlides(1, slideshow)">❯</a>
        </div>
    </div>

    <!-- DETAILS OF DORMITORY  -->
    <div class="dorm_details">    
        <form style="width:80%;">
        
            <label  for="fname">Manager</label>
                <input type="text" id="fname" name="fname" style="width: 35%;" class="readapp" value="{{ $details->first_name }} {{ $details->middle_name }} {{ $details->last_name }}" readonly="readonly">
            <label for="fname">Contact</label>
                <input type="text" id="fname" name="fname" style="width: 25%;" class="readapp" value="{{ $details->mobile_num }}" readonly="readonly"><br>
            <label for="fname">Barangay</label>
                <input type="text" id="fname" name="fname" style="width: 35%;" class="readapp" value="{{ $details->barangay }}" readonly="readonly">
            <label for="fname">Street</label>
                <input type="text" id="fname" name="fname" style="width: 25%;" class="readapp" value="{{ $details->street }}" readonly="readonly"><br>
            <label  for="fname">Nearest Landmark</label>
                <input type="text" id="fname" name="fname" style="width: 35%;" class="readapp" value="{{ $details->nearest }}" readonly="readonly">
            <label for="quantity" >Capacity</label>
                <input type="number" id="quantity" name="quantity" style="width:10%;" class="readapp" min="0" value="{{ $details->capacity }}" readonly="readonly"><br>
            
                <p class="descriptiondorm"> {{ $details->description }} </p>
        
        <div style="display:flex;">
            <!-- Table for Amenities  -->
            <div>
                <table class="viewdormtable" id="room" style="border-right: solid 2px #434546;">
                <tr>
                    <th>Amenities</th>
                </tr>
                @foreach($amenities as $amenities)
               <tr>
                    <td style="border-style:none;background-color:transparent;" class="readapp">{{ $amenities->amenities }}</td>
               </tr>
               @endforeach
                </table>
            </div>

            <!-- Table for Room Type with Price and Capacity  -->
            <div style="margin-left:5%;">
                <table class="viewdormtable" id="room">
                <tr>
                    <th style="width:10vw;">Room Type</th>
                    <th style="width:10vw;">Vacancy</th>
                    <th>Price</th>
                </tr>
                @foreach($room_types as $types) 
                <tr>
                    <td style="border-style:none;background-color:transparent;" class="readapp">{{ $types->room_type }}</td>
                    <td style="border-style:none;background-color:transparent;" class="readapp">{{ $types->vacancy }}</td>
                    <td style="border-style:none;background-color:transparent;" class="readapp">{{ $types->price }}</td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
        
            <a href="{{ url('applyconfirmation/'.$details->dorm_name) }}"><button type="button" class="secondyellowbutton" style="margin-top:15px;width:25%;margin-right:10%;"> APPLY</button></a>  
            <a href="{{ URL::previous() }}"><button type="button"  class="greenbutton" style="width: 20%;margin-right:1%;" >BACK</button></a><br>

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
    </script>

</body>
</html>