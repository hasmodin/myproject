<?php
include "connection.php";
    $fatherstr = $_GET['fatherstr'];
    $query = "SELECT DISTINCT * FROM demo WHERE `firstname` like '{$fatherstr}%'"; // runs after search action (query2)

    //die($query);

    $result = mysqli_query($conn, $query);

    $userData = array(); // new array to store user data
    while($row = mysqli_fetch_assoc($result)){ //fetches user data from (query1)
        $fatherNameResult = mysqli_query($conn, "SELECT firstname, secondname, fatherid from demo where id={$row['fatherid']}"); // query to fetch father name
        $fatherArr = mysqli_fetch_assoc($fatherNameResult); //fetches fathername associative array
        $row['fathername'] = $fatherArr['firstname']." ".$fatherArr['secondname']; //store fullname by concatinating firstname and lastname into new array key called 'fathername'
        array_push($userData,$row); // store row array into userData array.
    }
    echo json_encode($userData);
?>