<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>چت روم</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="container">
        <div id="welcome"><?php echo $_SESSION["username"]; ?></div>
        <div id="box">
            <div class="message">
                <p class="username"><?php echo $_SESSION["username"]; ?></p>
                <p class="text">Hello world!</p>
            </div>
        </div>
        <div id="text_message">
            <textarea name="text_input" id="text_input" placeholder="پیام شما" cols="30" rows="5"></textarea>
            <br>
            <button id="send_btn" name="send_btn">ارسال</button>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            //send message to server for save it
            $("#send_btn").click(function() {
                var user_name = document.getElementById("welcome").textContent;
                var textMessage = document.getElementById("text_input").value;
                $.ajax({
                    method: "POST",
                    url: "send.php",
                    data: {username: user_name, text: textMessage},
                    success: function(result) {
                        $("#text_input").val('');
                        $("#box").append(result);
                    }
                });
            });

            // show all messages in box every 500ms
            setInterval(() => {
                $.ajax({
                    method: "GET",
                    url: "receive.php",
                    async: false,
                    success: function(result){
                        $("#box").html(result);
                    }
                });
            }, 500);
        });
    </script>
</body>

</html>
