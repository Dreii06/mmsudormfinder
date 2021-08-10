<html>
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMSU - Dorm Finder</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/StudentStyle.css">  
        <!-- SCRIPT -->
        <script src="/js/studentDormFinder.js"></script>

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
                        <li><a href="applicationlist">Application List</a></li><br>
                        <li><a href="welcome">Log Out</a></li>
                        </ul>
                    </ul></li>
            </div>
    </div>
    <div class="header"> <h1>HOUSING FACILITIES - OFF CAMPUS</h1>
    <label for="room" style="width:10%;margin-left:10%">Room Type</label>
                <select name="room" id="room" class="inputapp">
                    <option value="cas" onclick="filterSelection('cars')">CAS</option>
                    <option value="coe">COE</option>
                    <option value="cbea">CBEA</option>
                    <option value="chs">CHS</option>
                </select>

    <form style="margin-left:10%;margin-top:2%;" action="/searchdorm" method="POST" role="search">
    @csrf
        <input type="text" id="search" onkeyup="searchFunction()" placeholder="Search.." name="q">
        <button type="submit"><img src="https://img.icons8.com/pastel-glyph/50/000000/search--v2.png" width="100%"></button>
    </form>        
    </div>
        @if(isset($details))
        @foreach($details as $dorm)
        <div class="dorm_name"> <h2>{{ $dorm->dorm_name }}</h2> </div><br>
        <div class="dorm_details_con">

        <div id="slideshow1" class="imgcontainer">
        @foreach($images as $image)
        <div class="mySlides">
        <img src="/images/{{ $image->filename }}" style="width:100%;height:100%;"></div>
        @endforeach

        <a class="prev" onclick="plusSlides(-1, slideshow1)">❮</a>
        <a class="next" onclick="plusSlides(1, slideshow1)">❯</a>
        </div>
        </div>

        <div class="dorm_details">
        <form style="width:80%;margin-top: 2%;">
        @csrf
            <label for="fname">Owner</label>
                <input type="text" id="fname" name="name" style="width: 40%;" class="readapp" value="{{ $dorm->dorm_name }}" readonly="readonly"><br>
            <label for="fname">Address</label>
                <input type="text" id="fname" name="address" style="width: 40%;" class="readapp" value="{{ $dorm['address'] }}" readonly="readonly"><br>
            <label for="fname">Contact</label>
                <input type="text" id="fname" name="contact" style="width: 40%;" class="readapp" value="{{ $dorm['contact_num'] }}" readonly="readonly"><br>
            <label for="fname">Amenities</label>
                <input type="text" id="fname" name="amenities" style="width: 40%;" class="readapp" value="{{ $dorm['amenities'] }}" readonly="readonly"><br>
                <label for="quantity" >Available space</label>
                <input type="number" id="quantity" name="quantity" style="width:10%;" class="readapp" min="0" value="{{ $dorm['available_space'] }}" readonly="readonly">
            
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

            <a href="/applyconfirmation/{{ $dorm['id'] }}"><button type="button" class="secondyellowbutton" style="margin-top:1%;width:20%;">APPLY</button></a>
        </form>
        </div>

        <script>
            var slideshow1 = document.getElementById("slideshow1");
            slideshow1.currentSlideIndex = 1;
            showSlides(slideshow1.currentSlideIndex, slideshow1);

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
        
        @endforeach
        @endif
        
        </body>
    </head>
</html>