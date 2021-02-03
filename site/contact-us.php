<?php
include 'db\func.php';
$btn = filter_input(INPUT_POST, 'btnPost');
$comme = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
$date = date('Y-m-d'); 
$date2 = date("Y-m-d H:i:s");  
$nameImg = $_FILES["fileImg"]["name"];
$sizeImg = $_FILES["fileImg"]["size"];
$typeImg = $_FILES["fileImg"]["type"];
$tmp_nameImg = $_FILES['fileImg']['tmp_name'];


$target_dir = "imgUpload/";
$target_file = $target_dir . basename($_FILES["fileImg"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




if($btn == "SendPost")
{
  
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["v"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileImg"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileImg"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileImg"]["name"])). " has been uploaded.";
        InsertMedia($typeImg, $nameImg, $date);
        InsertComm($comme, $date);
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
}







?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><img class="rounded-circle bg-white border rounded-pill border-dark shadow" data-bs-hover-animate="pulse" src="assets/img/tech/livre.jpg" width="30%" style="margin-right: 10px;"><a class="navbar-brand logo" href="#">CFPTBook</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Post</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact-us.php">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark" style="text-align: left;width: 100%;height: 100%;">
            <div class="container">
                <div class="block-heading"></div>
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="form-group"><label>Message</label><textarea class="form-control" name="commentaire"></textarea></div>
                    <div class="form-group"><input type="file" accept="image/png, image/jpeg" multiple="" name="fileImg[]"></div> 
                    
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="btnPost" value="SendPost" >Send</button></div>
                </form>
            </div>
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>