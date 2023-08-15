<?php
session_start();
include 'query.php';
$user = new Queries();
if (!isset($_SESSION['is_login'])) {
    header('location:index.php');
}

if (array_key_exists('logout', $_POST)) {
    Queries::logout();
}
?>

<h1>Welcome ,
    <?= $_SESSION['name'] ?>
</h1>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FakeBook</title>
</head>

<body>
    <form action="" method="post">
        <button class="btn btn-danger" value="logout" name="logout">Logout</button>
    </form>
</body>

</html>