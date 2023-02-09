<?php

function connect()
{
    $conn = mysqli_connect("localhost", "root", "", "chat");

    if (mysqli_connect_errno()) {
        echo "connect to db error: " . mysqli_connect_error();
        die();
    }

    mysqli_set_charset($conn, "utf8");

    return $conn;
}

function saveMessage($username, $text)
{
    $conn = connect();
    $query = "INSERT INTO messages (username, text_message) VALUES ('$username' , '$text')";
    $result = mysqli_query($conn, $query);

    // if($result)
    // {
    //     echo "message saved";
    // }
    // else
    // {
    //     echo "Error: " . $query . "<br>" . mysqli_errno($conn);
    // }
}

?>