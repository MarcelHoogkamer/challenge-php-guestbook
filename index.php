<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require './classes/post.php';
require './classes/postloader.php';
require './templates/validate.php';

$guestbookFile = 'guestbook.txt';

if (isset($_POST['action']) && $isValid) {

    $input = new Post($_POST['name'], $_POST['email'], $_POST['title'], $_POST['message']);
    $postLoader = new postLoader();
    $postLoader->writeGuestbook($guestbookFile, $input);
    $postLoader->setPosts($guestbookFile);

}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <link rel="stylesheet" href="./css/style.css">

    <title>Challenge PHP Guestbook</title>
</head>
<body>
<?php
if ($isValid) {
    echo "<div class='alert alert-info' role='alert'><span class='message'>Thank you for posting in my guestbook $name!</span></div>";
}
?>

<?php include './templates/header.php'?>

    <section class="form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table>
                <tr>
            <td><label for="name">Full name:</label></td>

            <td><input type="text" id="name" name="name" placeholder="Your name here" value="<?php echo $name ?? '';?>" class="form-control"/><span class="error"><?php echo $nameErr?></span></td>
                </tr>
                <tr>
            <td><label for="email">E-mail address:</label></td>
            <td><input type="text" id="email" name="email" placeholder="Your e-mail address here" value="<?php echo $email ?? '';?>" class="form-control"/><span class="error"><?php echo $emailErr?></span></td>
                </tr>
                <tr>
            <td><label for="title">Message title:</label></td>
            <td><input type="text" id="title" name="title" placeholder="Title of your message" value="<?php echo $title ?? '';?>" class="form-control"/><span class="error"><?php echo $titleErr?></span></td>
                </tr>
                <tr>
            <td colspan="2"><textarea name="message" style="width:450px; height:150px;" placeholder="Leave a message in the guestbook" value="<?php echo $message ?? '';?>" class="form-control"/></textarea><span class="error"><?php echo $messageErr?></span><br>
            <input type="submit" name="action" value="SUBMIT YOUR ENTRY"></td>
                </tr>
            </table>
        </form>
    </section>

    <h2>Recent posts (sorted by date):</h2><br><br>
    <h4>
    <?php
        if (isset($postLoader)) {
            for ($i = 0; $i <= 20; $i++) {
            echo $postLoader->getPosts()[$i]['name'] . "<br>";
            echo $postLoader->getPosts()[$i]['email'] . "<br>";
            echo $postLoader->getPosts()[$i]['date'] . "<br>";
            echo $postLoader->getPosts()[$i]['title'] . "<br>";
            echo $postLoader->getPosts()[$i]['message'] . "<br>";
             }
        }
?></h4>

   <?php include './templates/footer.php'?>
</body>
</html>