<?php

include 'db\connect.php';
include 'db\FuncPost.php';
include 'db\funcMedia.php';






function displayMedias($idPost)
{
    $output = "";

    // Si le post contient aumoin  un média
    if (getNumberOfMediaForPost($idPost) > 0) {   
        $medias = getAllMediasFormPost($idPost);
        // Si le post contient plus d'un média
        if (getNumberOfMediaForPost($idPost) > 1) {
            $output .= "<div id=\"carousel_post$idPost\" class=\"carousel slide\" data-interval=\"false\">";
            $output .= "<ol class=\"carousel-indicators\">";
            foreach ($medias as $index => $media) {
                $main = ($index == 0) ? 'active' : '';
                $output .= "<li data-target=\"#carousel_post$idPost\" data-slide-to=\"0\" class=\"$main\"></li>";
            }
            $output .= "</ol>";
            $output .= "<div class=\"carousel-inner\">";
            foreach ($medias as $index => $media) {
                $main = ($index == 0) ? ' active' : '';
                $output .= "<div class=\"carousel-item $main\">";
                if (substr($media["typeMedia"], 0, 5) == "video") {
               
                     $output .= "<video class=\"card-img-top w-100\" controls autoplay muted loop>  <source src=\"uploaded_files/" . $media['nomMedia']. "\"></video>";   
                }else if(substr($media["typeMedia"], 0, 5) == "audio"){
                    $output .= "<audio controls> <source src=\"uploaded_files/" . $media['nomMedia']. "\"></audio>";
                }else{
                    $output .= "<img class=\"card-img-top w-100\" src=\"uploaded_files/" . $media['nomMedia'] . "\" alt=\"" . $media['nomMedia'] . "\">";
                }
              
                $output .= "</div>";
            }
            $output .= "</div>";
            $output .= "<a class=\"carousel-control-prev\" href=\"#carousel_post$idPost\" role=\"button\" data-slide=\"prev\">";
            $output .= "<span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>";
            $output .= "<span class=\"sr-only\">Previous</span>";
            $output .= "</a>";
            $output .= "<a class=\"carousel-control-next\" href=\"#carousel_post$idPost\" role=\"button\" data-slide=\"next\">";
            $output .= "<span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>";
            $output .= "<span class=\"sr-only\">Next</span>";
            $output .= "</a>";
            $output .= "</div>";
        }
        // Il n'y a qu'un seul média
        else {
            if (substr($medias[0]["typeMedia"], 0, 5) == "video") {
               
                $output .= "<video class=\"card-img-top w-100\" controls autoplay muted loop>  <source src=\"uploaded_files/" . $medias[0]['nomMedia']. "\"></video>";   
           }else if(substr($medias[0]["typeMedia"], 0, 5) == "audio"){
               $output .= "<audio controls> <source src=\"uploaded_files/" . $medias[0]['nomMedia']. "\"></audio>";
           }else{
               $output .= "<img class=\"card-img-top w-100\" src=\"uploaded_files/" . $medias[0]['nomMedia'] . "\" alt=\"" . $medias[0]['nomMedia'] . "\">";
           }
        }
    }

    return $output;
}





