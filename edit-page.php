<?php
session_start();
include "config.php";
$pageid=$_GET["id"];
  $sql="select * from pages where id=$pageid";
  $pg=$connect->query($sql);
  $page=$pg->fetch_assoc();
 
if(isset($_POST["save"])){
    $content=$_POST["desc"];
    $i=$_POST["id"];
    $sql="update pages set content='sss' where id=1";
    if($connect->query($sql)){
        $_SESSION["msg"]="Succesfully Edited";
        header("location:admin-dashboard.php");
    }else{
        $_SESSION["msg"]="Failed to Edit";
        header("location:admin-dashboard.php");
    }

}
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>
<body>
<div class="container">
        <div class="col-sm-12"> 
        
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" >
             
`               <h4><?php echo $page["name"];?></h4>
                <div class="form-group">
                    <label for="textEditor">Description/Content<span class="text-danger">*</span></label>
                    <textarea name="desc" id="txtEditor" required><?php echo $page["content"];?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php if(isset($pageid)){ echo $pageid; }?>" >
                <div class="form-group">
                    <input type="submit" name="save" class="btn btn-primary" value="save">
                </div>
            </form>
            
        </div>
    </div>
   <script>
        $(document).ready(function() {
            $('textarea').summernote({
                height: 300,   //set editable area's height
            });
        });
    </script>
</body>