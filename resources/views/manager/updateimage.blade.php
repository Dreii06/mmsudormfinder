<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">
        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">
        <!-- JS -->
        <script type="text/javascript" src="dormfindercoed.js"></script>  
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav"><h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - COEDS / Proprietor Dorm Management</h3></div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">DORM: Update Image</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="/manager/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/manager/listapplicants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="/manager/listoccupants"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a class="active" href="/manager/viewdorm"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/manager/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <li><a href="" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>Log Out</a></li>
        </ul>    
    </div>

<div class="updatedormcontainer">
    
    <label for="slide">Uploaded Images</label>
    <div class="slide-container" id="slide">
        @foreach($images as $image)
            <img src="/images/{{ $image->filename }}" />
        @endforeach
    </div>

    <form action="/manager/updateimage/{{ Auth::guard('manager')->user()->id }}" method="post" enctype="multipart/form-data">
        @csrf
    <div id="linkimage">
        <label for="image">Add Image <br><h5 style="margin-top:0px;color:#FFB700;">File type: [JPG/PNG]</h5></label> 
        <label for="image"></label> 
        <input type="file" name="image" accept="image/*" class="inputapp" required>
    </div>

    <a href="updatedorm"><button type="submit" name="submit" value="ADD" class="secondyellowbutton" style="margin-right:15%;margin-top:10px;">ADD</button></a>
    <a href="updatedorm"><button type="button" class="greenbutton" style="margin-right:2%;margin-top:10px;">CANCEL</button></a>
</form>
</div>
</body>

<script>
/*
This script is identical to the above JavaScript function.
*/
var ig = 1;
function new_linkimage()
{
	ig++;
	var div2 = document.createElement('div');
	div2.id = ig;
	// link to delete extended form elements
	var delLink = '<button type="button" onclick="delItimg('+ ig +')" class="addbutton">x</button>';
    var addLink = '<button type="button" onclick="new_linkimage()" class="addbutton">+</button>  ';
	div2.innerHTML = document.getElementById('newlinkimage').innerHTML + delLink ;
	document.getElementById('linkimage').appendChild(div2);
}
// function to delete the newly added set of elements
function delItimg(eleId)
{
	d = document;
	var ele = d.getElementById(eleId);
	var parentEle = d.getElementById('linkimage');
	parentEle.removeChild(ele);
}
     
</script>

</html>