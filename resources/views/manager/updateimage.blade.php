<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ICON -->
        <link rel="icon" href="/images/mmsu logo.png">
        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">
        <!-- JS -->
        <script type="text/javascript" src="dormfindercoed.js"></script>  
    </head>
    
    <body style="overflow:hidden;">
    
    <!-- HEADER -->
    <div class="uppernav"><h3>MMSU - COEDS / Proprietor Dorm Management</h3></div>
    
    <!-- NAVIGATION BAR -->
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">DORM: Update Image</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="{{ url('manager/dashboard') }}"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="{{ url('manager/listapplicants') }}"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="{{ url('manager/listoccupants') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a class="active" href="{{ url('manager/viewdorm/'.Auth::guard('manager')->user()->id) }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="{{ url('manager/contact') }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <form method="POST" action="{{ route('manager.logout') }}">
                @csrf
                <li><button type="submit"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>{{ __('Log Out') }}</button></li>
            </form>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    
    <!-- SLIDESHOW OF DORMITORY  -->
    <div class="updateimagecon">
        <div class="dorm_details_con">

            <div id="slideshow" class="imgcontainer">
            @foreach($images as $image)
            <div class="mySlides">
                <img src="/images/{{ $image->filename }}" style="width:100%;height:400px;">
                <div class="text">{{ $image->label }}</div><div class="IDtext">Image ID: {{ $image->id }}</div>
            </div>
            @endforeach
            
            <a class="prev" onclick="plusSlides(-1, slideshow)">❮</a>
            <a class="next" onclick="plusSlides(1, slideshow)">❯</a>
        </div>
         
    </div>
    
    <!-- DETAILS OF DORMITORY  -->
    <div class="dorm_details">    
        <form style="width:90%;" action="/manager/updateimage/{{ Auth::guard('manager')->user()->id }}" method="post" enctype="multipart/form-data">
            @csrf
        <label style="width:70%;margin-top:5%;" for="image">Add Image File type: [JPG/PNG]</label><br>
            <input type="file" id="myfile" class="imagefile" name="image" accept="image/*"><br>

        <label style="width:40%;margin-bottom:2%;" for="image" >Select label for image</label><br>
            <select style="width:auto" class="inputapp" name="filename">
                <option selected disable hidden></option>
                <option value="Dorm">Dorm</option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Triple">Triple</option>
                <option value="Quad">Quad</option>
                <option value="Twin">Twin</option>
                <option value="Double-double">Double-double</option>
                <option value="Studio">Studio</option>
            </select>

        <a href="updatedorm"><button type="submit" name="submit" value="ADD" class="secondyellowbutton" style="margin-right:15%;margin-top:10px;margin-bottom:2%;">ADD</button></a><br>
    
        <hr style="margin-top:0%;margin-bottom:5%;"><br>

        <label style="width:30%;margin-bottom:2%;" for="image">Delete image by ID</label>
            <select style="width:15%" class="inputapp" name="delfilename">
                <option selected disable hidden></option>
                @foreach($images as $filename)
                <option value="{{ $filename->id }}">{{ $filename->id }}</option>
                @endforeach
            </select>

        <a href="updatedorm"><button type="submit" name="submit" value="DEL" class="secondyellowbutton" style="margin-right:15%;margin-top:0%;margin-bottom:2%;">DELETE</button></a>
        <hr style="margin-top:2%;"><br>
        </form>

        <a href="{{ url('manager/viewdorm/'.Auth::guard('manager')->user()->id) }}"><button type="button" class="greenbutton" style="width:18%;margin-right:23%;">CANCEL</button></a>
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