<?php  include "config.php";
session_start();
if(isset($_SESSION["userid"])){

	$user=$_SESSION["userid"];
}
if(isset($_SESSION["username"])){

	$username=$_SESSION["username"];
}
if(isset($_SESSION["auth"])){
$authenticated=$_SESSION["auth"];
}
if(isset($_POST["save"])){
    $video=$_POST["video"];
    $type=$_POST["music_type"];
    $link="https://www.youtube.com/oembed?url=$video";
    $list=file_get_contents($link);
    $json=json_decode($list,true);
    $title=$json["title"];
    $cover=$json["thumbnail_url"];
    $audiomack=$json["html"];
    $me=explode("\"",$audiomack);
    $video=$me[5];
    print_r($video);
    print_r($json["title"]);
    
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title></title>
<link rel="stylesheet" href="https://
cdnjs.cloudflare.com/ajax/libs/font-
awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel ="stylesheet" href ="https://
maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/
bootstrap.min.css">
<link rel="stylesheet" href="adminpost.css">
<!-- jQuery library -->
<script src ="https://ajax.googleapis.com/ajax/
libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src ="https://cdnjs.cloudflare.com/
ajax/libs/popper.js/1.16.0/umd/
popper.min.js"></script>
<script async="" src="magazine.js"></script>
<!-- Latest compiled JavaScript -->
<script src ="https://maxcdn.bootstrapcdn.com/
bootstrap/4.4.1/js/bootstrap.min.js">
</script>
</head>
<body>

    <div class="white fcontainer">

        <div class="container">
            <p id="title" class="label mb-4">surzkid-profile</p>
            <div class="menu">
                <span class="bg-secondary rounded p-1 m-2"><a href="" class="text-white  text-decoration-none">View Profile</a></span>
        
                <span class="bg-secondary rounded p-1 m-2"><a href="" class="text-white  text-decoration-none">Account setting</a></span>
                <span class="bg-secondary rounded p-1 m-2"><a href="" class="text-white  text-decoration-none">payment</a></span>
            </div>
        <div class="row">
             <div class="col-12 col-md-3 profile-menu pt-4">
               
                    <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Profile Info</a>
                    <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Statistics (Premium users only)</a>
                    <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Music</a>
                    <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block active">Video</a>
                    <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Photo</a>
                   
             
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Gigs</a>
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">contact info</a>
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">preference</a>
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Email</a>
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">password</a>
               
            </div>
            <div class="col-12 col-md-8 mt-sm-2">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="col-12 col-sm-12 col-md-12 mx-auto">
                 
                    <div class="form-group ">
                        <span class="fa fa-youtube text-danger display-4 mt-2"></span><br>
                        <label for="mobile"> Youtube Video Link</label>
                        <input type="url" name="video" class="form-control col-md-8 col-12" id="video" placeholder="https://www.youtube.com/...">
                    </div>
                    <div class="form-group ">
                     <label>Video Type</label>
                    <select name="music_type" class="form-control col-6">
                        <option value="1">Comedy video</option>
                        <option value="2">Other</option>
                    </select>
                 </div>
                   <input type="submit" name="save" class="btn btn-sm btn-outline-primary" value="save">
                </div>
        
            </form>
        
    </div>
    
    </div>
</body>