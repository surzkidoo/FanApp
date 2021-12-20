<?php  include "config.php";

    $sound=$_POST["sound"];
    $type=$_POST["music_type"];
    $link="https://www.youtube.com/oembed?url=https://youtu.be/R8JDGyaxcPY";
    $list=file_get_contents($link);
    $lyrics=$_POST["lyrics"];
    $json=json_decode($list,true);
    $title=$json["title"];
    $cover=$json["thumbnail_url"];
    $audiomack=$json["html"];
    $me=explode("\"",$audiomack);
    $audiomack=$me[5];
    print_r($audiomack);
    print_r($json["title"]);
    exit();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Orbvibes |Music</title>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script async="" src="magazine.js"></script>
<!-- Latest compiled JavaScript -->

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
                    <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block active">Music</a>
                    <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Video</a>
                    <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Photo</a>
                   
             
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">Gigs</a>
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">contact info</a>
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">preference</a>
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block ">Email</a>
                <a href="#" class="btn btn-primary px-4 d-inline-block mb-2 d-md-block">password</a>
               
            </div>
            <div class="col-12 col-md-8 mt-sm-2">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="col-12 col-sm-12 col-md-12 mx-auto">
                    <div class="form-group ">
                        <span class="fa fa-music text-danger display-4"></span><br>
                        <label for="sound">Audiomark Music Link</label>
                        <input type="url" name="sound" class="form-control col-md-8 col-12" id="sound" placeholder="https://www.audiomack.com/...">
                    </div>
                    
                 <div class="form-group ">
                     <label></label>
                    <select name="music_type" class="form-control col-6">
                        <?php
                        $sql="select * from music_type";
                        $result=$connect->query($sql);
                        while($music=$result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $music["id"]; ?>"><?php echo $music["name"]; ?></option>
                        <?php }?>
                    </select>
                 </div>
                 <label for="sommernote">Music Lyrics</label>
                 <textarea id=summernote name="lyrics">
                    
                 </textarea>
                    
                   <input type="submit" name="save"  class="btn btn-sm btn-outline-primary" value="save">
                </div>
        
            </form>
        
    </div>
    
    </div>
    
    <script>
      $('#summernote').summernote({
          placeholder:'Music Lyrics',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
</body>