<?php
/*
 *	Auteur	:	Gomes Darius
 *	Class	:	I.DA-P3D
 *	Date	:	2021/01/28
 *	Desc.	:	fonction Display 
*/

require_once('model\connect.php');
require_once('model\funcPost.php');
require_once('model\funcMedia.php');

function displayMedias($idPost)
{
    $output = "";
   
    // Si le post contient au moin  un média
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
                 if(substr($media["typeMedia"], 0, 5) == "audio"){
                    $output .= "<audio controls class=\"card-img-top w-100\"> <source src=\"uploaded_files/" . $medias[0]['nomMedia']. "\"></audio>";
                }else if (substr($media["typeMedia"], 0, 5) == "video") {
                     $output .= "<video preload=\"metadata\" class=\"card-img-top w-100\" controls autoplay muted loop>  <source src=\"uploaded_files/" . $media['nomMedia']. "\"></video>";   
                }else{
                    $output .= "<img preload=\"metadata\" class=\"card-img-top w-100\" src=\"uploaded_files/" . $media['nomMedia'] . "\" alt=\"" . $media['nomMedia'] . "\">";
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
               $output .= "<audio controls class=\"card-img-top w-100\"> <source src=\"uploaded_files/" . $medias[0]['nomMedia']. "\"></audio>";
           }else{
               $output .= "<img class=\"card-img-top w-100\" src=\"uploaded_files/" . $medias[0]['nomMedia'] . "\" alt=\"" . $medias[0]['nomMedia'] . "\">";
           }
        }
    }

    return $output;
}


function displayMediasList($idPost) {
    $output = "";
    $medias = getAllMediasFormPost($idPost);
    
    $output .= "<div class=\"form-check\">";
    foreach ($medias as $index => $media) {
        $output .= "<input class=\"form-check-input\" type=\"checkbox\" value=\"" . $media['idMedia'] . "\" id=\"old_media_" . $media['idMedia'] . "\" name=\"old_medias[]\">";
        $output .= "<div class=\"form-check-label media\" for=\"media_" . $media['idMedia'] . "\">";
        $output .= mediaTypeSelector($media, "mr-3", "width: 100px");
        $output .= "<div class=\"media-body\">";
        $output .= "<h5 class=\"mt-0\">" . $media['nomMedia'] . "</h5>";
        $output .= "<p>Type : " . $media['typeMedia'] . "</p>";
        $output .= "<p>Date : " . $media['creationDate'] . "</p>";
        $output .= "</div>";
        $output .= "</div>";
        $output .= "<hr class=\"my-4\">";
    }
    $output .= "</div>";

    return $output;
}

function mediaTypeSelector($media, $class = "card-img-top w-100", $style = "") {
    $output = "";
    
    switch (explode("/", $media['typeMedia'])[0]) {
        case 'image':
            $output = displayImage($media, $class, $style);
            break;

        case 'video':
            $output = displayVideo($media, $class, $style);
            break;
        
        case 'audio':
            $output = displayAudio($media, $class, $style);
            break;
            
        default:
            # code...
            break;
    }

    return $output;
}

function displayImage($media, $class, $style) {
    $output = "";

    $output .= "<img class=\"" . $class . "\" style=\"" . $style . "\" src=\"uploaded_files/" . $media['nomMedia'] . "\" alt=\"" . $media['nomMedia'] . "\">";

    return $output;
}

function displayVideo($media, $class, $style) {
    $output = "";

    $output .= "<video class=\"" . $class . "\" style=\"" . $style . "\" controls autoplay muted loop>";
    $output .= "<source src=\"uploaded_files/" . $media['nomMedia'] . "\" type=\"" . $media['typeMedia'] . "\">";
    $output .= "</video>";

    return $output;
}

function displayAudio($media, $class, $style) {
    $output = "";

    $output .= "<audio  class=\"" . $class . "\" style=\"" . $style . "\" controls>";
    $output .= "<source src=\"uploaded_files/" . $media['nomMedia'] . "\" type=\"" . $media['typeMedia'] . "\">";
    $output .= "</audio>";

    return $output;
}






