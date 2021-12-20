<?php include "config.php";
session_start();

if(isset($_SESSION["userid"])){

	$user1=$_SESSION["userid"];
}
if(isset($_SESSION["username"])){

	$username=$_SESSION["username"];
}
if(isset($_SESSION["auth"])){
$authenticated=$_SESSION["auth"];
}
if(!isset($_SESSION["auth"]) and $_SESSION["role_id"]!=1){
    //header("location:index.php");
}

if(isset($_POST["save"])){
    if(is_uploaded_file($_FILES["profilepic"]["tmp_name"])){
$target_dir="images/profile/";
$target_file=$target_dir."l".time().basename($_FILES["profilepic"]["name"]);
$imagetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
    if($_FILES["profilepic"]["size"]>6000000){
       $upload=0;
        $imessage="Sorry the file is too large <br>";
    }
    if($imagetype!="jpg" || $imagetype!="png" || $imagetype!="jpeg" || $imagetype!="gif"){
        $upload=0;
        $imessage="Sorry the file is too large <br>";
    }
   
       
    if(move_uploaded_file($_FILES["profilepic"]["tmp_name"],$target_file)){
            $imessage="image uploaded successfully";
        }
  
   $profilepic=$target_file;
  
}

    $name=$_POST["sponsor"];
    $country=$_POST["ad"];
    $bio=$_POST["bio"];
    $city=$_POST["city"];
    
   


    $sql="update user set fullname='$name',country_id=$country,bio='$bio',city='$city',operation='$operation',booking=$booking,artist_type=$artist_type,genre_id=$genre where id=$id";
    if($connect->query($sql)===TRUE){
        $messege="Inserted Succesfully";
    }
    else{
        $messege="Insert Failed Try Again";
    }


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
<link rel="stylesheet" href=".css">
<!-- jQuery library -->
<script src ="https://ajax.googleapis.com/ajax/
libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src ="https://cdnjs.cloudflare.com/
ajax/libs/popper.js/1.16.0/umd/
popper.min.js"></script>
<script async="" src="index.js"></script>
<!-- Latest compiled JavaScript -->
<script src ="https://maxcdn.bootstrapcdn.com/
bootstrap/4.4.1/js/bootstrap.min.js">
</script>
</head>
<style type="text/css">
	
</style>

    
    <div class="container">
        
        <div class="col-12 col-md-8 mt-sm-2">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
        <div class="form-group">
                    <label for="profilepic">Profile Photo<span class="text-danger">*</span></label>
                    <input type="file"  class="" name="profilepic" id="profilepic" required>
                    <?php if(!empty($message)){
                     echo "<div class='bg-info mx-auto col-12 col-md-4 p-3'>".$imessage."</div>";
                 }?>
                    <p class="mt-3">
                        Files must be less than 6 MB.<br>
                        Allowed file types: png gif jpg jpeg.<br>
                            
                        Images must be larger than 400x400 pixels. <br>
                    </p>
                </div>
                
               
            
                <div class="form-group">
              <label for="stage">Sponsor Name<span class="text-danger">*</span></label>
              <input type="text"  class="form-control" name="sponsor"  id="stagename">
                </div>

                <div class="form-group">
              <label for="stage">Website <span class="text-danger">*</span></label>
              <input type="text"  class="form-control" name="website"  id="stagename">
                </div>
            
            <div class="form-group">
              <label for="stage">Page to add the AD<span class="text-danger">*</span></label>
              <select name="ad" id="">
              <?php 
              $re=$connect->query("select * from advert join advert_position on advert.position=advert_position.id");
              while($ad=$re-fetch_assoc()){
                ?>
                <option value="<?php echo $ad["id"];?>"><?php echo $ad["name"]; ?></option>

              <?php } ?>
              </select>
            </div>
              
                <input type="submit" value="save" name="save" class="btn btn-primary">  
            </form>
        </div>
    
</div>