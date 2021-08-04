<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/images/mmsu logo.png">

        <title>MMSU - Dorm Management | Dashboard</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/css/COEDstyle.css">  
        
    </head>
    
    <body class="antialiased">
        
    <div class="uppernav">
        <h3 style="color:#0C4B05;margin-left:20px;">MMSU </h3><h3> - COEDS / Proprietor Dorm Management</h3>
    </div>
    
    <div class="topnav" id="myTopnav">
        <img style="float:left;margin-left:20px;margin-top:10px;" src="/images/mmsu logo.png"  height="60" width="60">
        <h4>MARIANO MARCOS <br> STATE UNIVERSITY</h4>
        <div class="titleheader">UPDATE DORM</div>
    </div>
                
    <div class="verticalnav">
        <ul>
            <li class="username">{{ Auth::guard('manager')->user()->dorm_name }}</li>
            <li><a href="/manager/dashboard"> <img src="https://img.icons8.com/fluent-systems-regular/96/000000/home.png"/> Home</a></li>
            <li><a href="/manager/listapplicants"> <img src="https://img.icons8.com/fluent-systems-regular/50/000000/parse-resume.png"/> Applicants</a></li>
            <li><a href="/manager/listoccupants"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/user-rights.png"/> Occupants</a></li>
            <li><a class="active" href="/manager/viewdorm/{{ Auth::guard('manager')->user()->id }}"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/department.png"/> Dorm</a></li>
            <li><a href="/manager/contact"><img src="https://img.icons8.com/fluent-systems-regular/96/000000/info-squared.png"/> Contact</a></li><br><br>
            <li><a href="#" style="color:red;"><img src="https://img.icons8.com/ios-filled/50/000000/exit.png"/>Log Out</a></li>
        </ul>
    </div>


<div class="updatedormcontainer">
<form action="/manager/updatedorm" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="fname">Dormitory</label>
        <input type="text" id="fname" name="name" value="{{ $details->dorm_name }}" style="width: 400px;" class="inputapp"><br><br>
    <label for="fname">Location</label>
        <input type="text" id="fname" name="address" style="width: 400px;" class="inputapp" value="{{ $details->address }}"><br><br>
    <label for="fname">Contact</label>
        <input type="text" id="fname" name="contact" style="width: 400px;" class="inputapp" value="{{ $details->mobile_num }}"><br><br><br>
    <label for="fname">Rental Fee</label>
        <input type="text" id="fname" name="fname" style="width: 400px;" class="inputapp" value="1500"><br><br>
    <label for="fname">Amenities</label>
        <input type="text" id="fname" name="amenities" style="width: 400px;" class="inputapp" value="{{ $details->amenities }}"><br><br><br>
    <label for="quantity">Available Space</label>
        <input type="number" id="quantity" name="avail" class="inputapp" min="0" value="{{ $details->available_space }}"><br><br>  
        
        <label for="image">Add Contract  <h5 style="margin-top:0px;color:#FFB700;">File type: [DOCS/PDF]</h5></label>
    <input type="file" name="image"  accept=".doc,.pdf,.docx" class="inputapp"><br>

    <div id="linkimage">
        <label for="image">Add Image <br><h5 style="margin-top:0px;color:#FFB700;">File type: [JPG/PNG]</h5></label> 
        <button type="button" onclick="new_linkimage()" class="addbutton" style="margin-left:5%;width:20%;">ADD IMAGE</button>  <br>
    </div>
 
    <div id="newlink">
    <label for="fname">Room Type</label>
    <button type="button" onclick="new_link()" class="addbutton" style="margin-left:5%;width:20%;">ADD ROOM TYPE</button>  
    </div>

    <div style="padding-right:10px;margin-top:10px;">
        <a href="/manager/viewdorm"><button type="button" class="greenbutton">CANCEL</button></a>
        <input type="submit" name="save" onclick="update()" class="secondyellowbutton" style="margin-right:20px;" value="SAVE">
    </div>

    </form>

    <!-- Template FOR ROOM TYPE-->
    <div id="newlinktpl" style="display:none">
        <label for="fname"></label>
            <input type="text" id="fname" name="room_type[]" style="width: 200px;" class="inputapp" value="">
        <label for="fname" style="margin-left:10px;">Rental Fee</label>
            <input type="text" id="fname" name="price[]" style="width: 100px;margin-left:-90px;" class="inputapp" value="">
    </div>

    <!-- Template FOR IMAGE -->
    <div id="newlinkimage" style="display:none">
        <label for="image"></label> 
        <input type="file" name="photo[]" accept="image/*" class="inputapp">
    </div>

    </div>
</body>

<script>
/*
This script is identical to the above JavaScript function.
*/
var ct = 1;
var ig = 1;
function new_link()
{
	ct++;
	var div1 = document.createElement('div');
	div1.id = ct;
	// link to delete extended form elements
	var delLink = '<button type="button" onclick="delIt('+ ct +')" class="addbutton">x</button>';
	div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink ;
	document.getElementById('newlink').appendChild(div1);
}
function new_linkimage()
{
	ig++;
	var div2 = document.createElement('div');
	div2.id = ig;
	// link to delete extended form elements
	var delLink = '<button type="button" onclick="delItimg('+ ig +')" class="addbutton">x</button>';
	div2.innerHTML = document.getElementById('newlinkimage').innerHTML + delLink ;
	document.getElementById('linkimage').appendChild(div2);
}
// function to delete the newly added set of elements
function delIt(eleId)
{
	d = document;
	var ele = d.getElementById(eleId);
	var parentEle = d.getElementById('newlink');
	parentEle.removeChild(ele);
}
function delItimg(eleId)
{
	d = document;
	var ele = d.getElementById(eleId);
	var parentEle = d.getElementById('linkimage');
	parentEle.removeChild(ele);
}
</script>

</html>