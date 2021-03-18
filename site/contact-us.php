<?php
/*
 *	Auteur	:	Gomes Darius
 *	Class	:	I.DA-P3D
 *	Date	:	2021/01/28
 *	Desc.	:	page d'upload de nouevaux post
*/
 include 'includes\editOrNewPost.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Poster ou modiffier</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
<?php //include 'includes\nav.php'; ?>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark" style="text-align: left;width: 100%;height: 100%;">
            <div class="container">
                <div class="block-heading"></div>
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="form-group"><label>Message</label><textarea class="form-control" name="commentaire"></textarea></div>
                    <div class="form-group"> <input type="file" name="fileImg[]" accept=".jpg, .jpeg, .png, .mp4, .mp3, .wav, .gif .mp4 .webm .ogg" multiple /></div> 
                   
                    
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