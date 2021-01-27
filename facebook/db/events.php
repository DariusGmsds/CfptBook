<?php
    require_once "dbConnect.php";

function  getAllEvents (){
    $sql = "SELECT * FROM `events`";
    $query = dbConnect()->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insert($title, $dateEvent, $duration, $location){
    $sql = "INSERT INTO `events`(`title`,`dateEvent`,`duration`,`location`)
    VALUES (:title, :dateEvent, :duration, :location)";

    $query = dbConnect()->prepare($sql);

    $query->execute([
        ':title' => $title,
        ':dateEvent' => $dateEvent,
        ':duration' => $duration,
        ':location' => $location,

    ]);
}

function deleteEvent($idEvent) {
    $sql = "DELETE FROM `agenda`.`events` WHERE `events`.`idEvent` = :idEvent ";
         

    $query = dbConnect()->prepare($sql);

    $query->execute([
        ':idEvent' => $idEvent,
    ]);
}

function updateEvent($idEvent, $title, $dateEvent, $duration, $location) {
    $sql = "UPDATE `events` SET `title` = :title, `dateEvent` = :dateEvent, `duration` = :duration, `location` = :location 
    WHERE `events`.`idEvent` = :idEvent";
         

    $query = dbConnect()->prepare($sql);

    $query->execute([
        ':idEvent' => $idEvent,
        ':title' => $title,
        ':dateEvent' => $dateEvent,
        ':duration' => $duration,
        ':location' => $location
    ]);
}

function getEventByID($idEvent){
    $sql = "SELECT * FROM `events` WHERE `events`.`idEvent` = :idEvent";
    $query = dbConnect()->prepare($sql);
    $query->execute([
        ':idEvent' => $idEvent,
    ]);
}


?>