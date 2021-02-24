<?php

include 'db\connect.php';

function InsertMedia($typeMedia, $nomMedia, $creationDate,$lastid)
{
    $sql = "INSERT INTO `media`(`typeMedia`,`nomMedia`,`creationDate`,`idPost`)
    VALUES (:typeMedia,:nomMedia ,:creationDate , $lastid)";
    $query = connect()->prepare($sql);
    $query->execute([
        ':typeMedia' => $typeMedia,
        ':nomMedia' => $nomMedia,
        ':creationDate' => $creationDate,
    ]);
}

function InsertPost($commentaire,$creationDate){
    $sql = "INSERT INTO `post`(`commentaire`,`creationDate`,`modificationDate`)
    VALUES (:commentaire, :creationDate	, :modificationDate)";

    $query = connect()->prepare($sql);

    $query->execute([
        ':commentaire' => $commentaire,
        ':creationDate' => $creationDate,
        ':modificationDate' => $creationDate,
    ]);

    $latest_id = connect()->lastInsertId();
    return $latest_id;
}

function displayMedias($idPost)
{
    $output = "";

    // Si le post contient au un média
    if (getNumberOfMediaForPost($idPost) > 0) {
        $medias = getAllMediasFormPost($idPost);
        // Si le post contient plus d'un média
        if (getNumberOfMediaForPost($idPost) > 1) {
            $output .= "<div id=\"carousel_post$idPost\" class=\"carousel slide\" data-ride=\"carousel\">";
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
                $output .= "<img class=\"card-img-top d-block w-100\" src=\"uploaded_files/" . $media['nomMedia'] . "\" alt=\"" . $media['nomMedia'] . "\">";
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
            $output .= "<img class=\"card-img-top\" src=\"uploaded_files/" . $medias[0]['nomMedia'] . "\" alt=\"\">";
        }
    }

    return $output;
}

function getNumberOfMediaForPost($idPost)
{
    $connexion = connect();
    $query = $connexion->prepare(
        "SELECT count(*) as 'count'
        FROM `media` as m
        WHERE `m`.`idPost` = :idPost");
    $query->bindParam('idPost', $idPost, PDO::PARAM_INT, 11);
    $query->execute();
    $query = $query->fetchAll(PDO::FETCH_ASSOC);
    $query = $query[0]['count'];

    return $query;
}

function getAllMediasFormPost($idPost)
{
    $connexion = connect();
    $query = $connexion->prepare(
        "SELECT `m`.`idMedia`, `m`.`nomMedia`, `m`.`typeMedia`, `m`.`creationDate`, `m`.`modificationDate`
        FROM `media` as m
        WHERE `m`.`idPost` = :idPost");
    $query->bindParam('idPost', $idPost, PDO::PARAM_INT, 11);
    $query->execute();
    $query = $query->fetchAll(PDO::FETCH_ASSOC);

    return $query;
}

function getAllPostsOrderByDateDesc()
{
    $connexion = connect();
    $query = $connexion->prepare(
        "SELECT `idPost`, `commentaire`, `creationDate`, `modificationDate`
        FROM `post`
        ORDER BY `post`.`creationDate` DESC");
    $query->execute();
    $query = $query->fetchAll(PDO::FETCH_ASSOC);
    return $query;
}




