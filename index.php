<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require './classes/post.php';
require './classes/postloader.php';

session_start();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">

    <title>Challenge PHP Guestbook</title>
</head>
<body>
    <header>
        <h1>Mark's PHP Guestbook</h1>
    </header>
    <section class="form">
        <form class="form" action="" method="post">
            <table>
                <tr>
            <td><label for="fname">First name:</label></td>
            <td><input type="text" id="fname" name="fname" value="" placeholder="Your first name here"></td>
                </tr>
                <tr>
            <td><label for="lname">Last name:</label></td>
            <td><input type="text" id="lname" name="lname" value="" placeholder="Your last name here"></td>
                </tr>
                <tr>
            <td><label for="email">E-mail address:</label></td>
            <td><input type="text" id="email" name="email" value="" placeholder="Your e-mail address here"></td>
                </tr>
                <tr>
            <td><label for="title">Message title:</label></td>
            <td><input type="text" id="title" name="title" value="" placeholder="Title of your message"></td>
                </tr>
                <tr>
            <td colspan="2"><textarea name="message" style="width:450px; height:150px;" placeholder="Leave a message in the guestbook"></textarea><br>
            <input type="submit" value="SUBMIT YOUR ENTRY"></td>
                </tr>
            </table>
        </form>
    </section>

    <h2>Recent posts (sorted by date):</h2><br><br>
    <footer class="footer">
            <p>© <script>document.write(new Date().getFullYear())</script> - Mark Hoogkamer. All right reserved.</p>
    </footer>
</body>
</html>