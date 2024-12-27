<?php
                include("session.php");
            ?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            visitor count
        </title>
        <body>
            
            <div class="container">
                <h1>Welcome to our website!</h1>
                <p>You are visitor number: <strong><?php echo $_SESSION["count"] ?></strong> </p>
            </div>
        </body>
    </head>
    <style>
        body{
            display: flex;
            text-align:center;
            margin: 0;
            padding: 0;
            justify-content: center;
        }
    </style>
</html>