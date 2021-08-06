<html>
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- SCRIPT -->
        <script src="/studentDormFinder.js"></script>

        <link rel="icon" href="/images/mmsu logo.png">
    </head>

    <body>
    <div class="uppernav"> <h3 style="margin-left:20px;color:#0C4B05;">MMSU </h3><h3> - Dorm Finder</h3></div>
    
    <div class="topnav" id="myTopnav">
       <img style="float:left;margin-left:20px;margin-top:5px;" src="/images/mmsu logo.png"  height="4%" width="4%">
       <a style=" text-decoration: none;width:20%;margin:0%;" href="home"><h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4></a>
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
                        <li><a href="" ><button type="submit" style="color:red;" >{{ __('Log Out') }}</button></a></li>
                        </form>
                        </ul>
                    </ul></li>
            </div>
    </div>


    <div class="header"> <h1>HOUSING FACILITIES - OFF CAMPUS</h1></div>
        <div class="dorm_name"> <h2>{{ $details->dorm_name }}</h2> </div><br>
        <div class="dorm_details_con">

        <div id="slideshow" class="imgcontainer">
        @foreach($images as $image)
        <div class="mySlides"><img src="/images/{{ $image->filename }}" style="width:100%;height:100%;"></div>
        @endforeach
        <a class="prev" onclick="plusSlides(-1, slideshow)">❮</a>
        <a class="next" onclick="plusSlides(1, slideshow)">❯</a>
        </div>
        </div>

    <div class="dorm_details">
        <form style="width:80%;">

            <label for="fname">Manager</label>
                <input type="text" id="fname" name="fname" style="width: 25%;" class="readapp" value="{{ $details->first_name }} {{ $details->middle_name }} {{ $details->last_name }}" readonly="readonly">
            <label for="fname">Contact</label>
                <input type="text" id="fname" name="fname" style="width: 25%;" class="readapp" value="{{ $details->mobile_num }}" readonly="readonly"><br>
            <label for="fname">Barangay</label>
                <input type="text" id="fname" name="fname" style="width: 25%;" class="readapp" value="{{ $details->barangay }}" readonly="readonly">
            <label for="fname">Street</label>
                <input type="text" id="fname" name="fname" style="width: 20%;" class="readapp" value="{{ $details->street }}" readonly="readonly"><br>
            <label  for="fname">House Number</label>
                <input type="text" id="fname" name="fname" style="width: 10%;" class="readapp" value="{{ $details->house_num }}" readonly="readonly">
            <label  for="fname">Nearest Landmark</label>
                <input type="text" id="fname" name="fname" style="width: 20%;" class="readapp" value="{{ $details->nearest }}" readonly="readonly"><br>
            <label for="quantity" >Available Space</label>
                <input type="number" id="quantity" name="quantity" style="width:10%;" class="readapp" min="0" value="{{ $details->available_space }}" readonly="readonly"><br><br>
            
            <div style="display:flex;">
            <div class="tablewrapper">
            <table class="viewdormtable" id="room">
                <tr>
                    <th>Amenities</th>
                </tr>
                @foreach($amenities as $amenities)
                <tr>
                    <td class="readapp">{{ $amenities->amenities }}</td>
               </tr>
               @endforeach
            </table>
            </div>

            <div class="tablewrapper"  >
            <table class="viewdormtable" id="room">
                <tr>
                    <th>Room Type</th>
                    <th>Price</th>
                </tr>
                @foreach($room_types as $types)
               <tr>
                    <td class="readapp">{{ $types->room_type }}</td>
                    <td class="readapp">{{ $types->price }}</td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
            
            <p class="descriptiondorm">{{ $details->description }} </p>
            <a href="/applyconfirmation/{{ $details->id }}"><button type="button" class="secondyellowbutton" style="margin-top:1%;width:20%;">APPLY</button></a>  
        </form>
    </div>

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
    </head>
</html>