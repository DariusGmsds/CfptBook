<?php

include 'db\connect.php';

function utilisateurAjouter($email, $pseudo, $secret, $anni=null){
    $sql = "INSERT INTO `utilisateur`(`email`,`pseudo`,`secret`,`anni`)
    VALUES (:email, :pseudo, :secret, :anni)";

    $query = connect()->prepare($sql);

    $query->execute([
        ':email' => $email,
        ':pseudo' => $pseudo,
        ':secret' => $secret,
        ':anni' => $anni
    ]);
}


function InsertComm($txt, $modificationDate)
{
    $sql = "INSERT INTO `post`(`Commentaire`,`creationDate`,`modificationDate`)
    VALUES (:txt, :creationDate, :modificationDate)";

    $query = connect()->prepare($sql);

    $query->execute([
        ':txt' => $txt,
        ':creationDate' => date('Y-m-d'),
        ':modificationDate' => $modificationDate
    ]);
}

function InsertMedia($typeMedia, $nomMedia, $modificationDate)
{
    $sql = "INSERT INTO `media`(`typeMedia`,`nomMedia`,`creationDate`,`modificationDate`)
    VALUES (:typeMedia, :nomMedia, :creationDate, :modificationDate)";

    $query = connect()->prepare($sql);

    $query->execute([
        ':typeMedia' => $typeMedia,
        ':nomMedia' => $nomMedia,
        ':creationDate' => date('Y-m-d'),
        ':modificationDate' => $modificationDate
    ]);
}


function lireUtilisateur(){
    $sql = "SELECT `idUtilisateur`,`pseudo`, `email`, `anni` FROM `user` ORDER BY `pseudo` DESC";
    $query = connect()->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function lireUtilisateurParPseudo($pseudo){
    $sql = "SELECT `iduser`,`speudo`, `password`, `role` FROM `user` WHERE `speudo` = :pseudo";

    $query = connect()->prepare($sql);

    $query->execute([
        ':pseudo' => $pseudo
    ]);

    $result = $query->fetch();
    //print_r($result);
    return $result;
}

function changePassword($id, $password) {
    $sql = "UPDATE `utilisateur` SET `secret` = :password WHERE `utilisateur`.`idUtilisateur` = :id";
         

    $query = connect()->prepare($sql);

    $query->execute([
        ':id' => $id,
        ':password' => $password
    ]);
}

function changeMail($id, $email) {
    $sql = "UPDATE `utilisateur` SET `email` = :email WHERE `utilisateur`.`idUtilisateur` = :id";
         

    $query = connect()->prepare($sql);

    $query->execute([
        ':id' => $id,
        ':email' => $email
    ]);
}

function supprimeUtilisateur($id) {
    $sql = "DELETE FROM `user_site_php`.`user` WHERE `utilisateur`.`idUtilisateur` = :id ";
         

    $query = connect()->prepare($sql);

    $query->execute([
        ':id' => $id,
    ]);
}






function EnvoyerMessage($de, $pour, $contenu)
{
    $sql = "INSERT INTO `message`(`de`,`pour`,`contenu`,`datage`)
    VALUES (:de, :pour, :contenu, :datage)";

    $query = connect()->prepare($sql);

    $query->execute([
        ':de' => $de,
        ':pour' => $pour,
        ':contenu' => $contenu,
        ':datage' => date("Y-m-d H:i:s"),
    ]);
}

function lireMessage($pour)
{
    $sql = "SELECT `idMessage`, `contenu`, `de`, `pour`, `datage` FROM `message` WHERE `message`.`pour` = :pour ORDER BY `idMessage` DESC";

    $query = connect()->prepare($sql);

    $query->execute([
        ':pour' => $pour
    ]);

    return $query->fetchAll(PDO::FETCH_ASSOC);
}



function supprimeUtilisateurr($id) {
    $sql = "DELETE FROM `user_site_php`.`user` WHERE `user`.`iduser` = :id ";
         

    $query = connect()->prepare($sql);

    $query->execute([
        ':id' => $id,
    ]);
}