<?php

require "config.php";

if(isset($_POST['username']) && isset($_POST['text']))
{
    saveMessage($_POST['username'], $_POST['text']);
}

?>