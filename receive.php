<?php

require 'config.php';

$conn = connect();

$query = "SELECT * FROM messages";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='message'>";
        echo "<p class='username'>" . $row['username'] . "</p>";
        echo "<p class='text'>" . $row['text_message'] . "</p>";
        echo "</div>";
    }
}

?>