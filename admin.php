<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
include ('server.php');
include ('proces.php');

if(empty($_SESSION['username'])){
    header('location:index.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:index.php');
}
?>
<div class="header">
    <div class="dropdown">
        <button class="dropbtn"><?php echo $_SESSION['username']?></button>
        <div class="dropdown-content">
            <a href="admin.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
<div class="content">
    <form method="post" action="admin.php">
        <h1>გაინტერესებს რა გააკეთო დღეს?</h1>
        <div class="msg">
        <?php echo $msg.'<br><b> '.$ms.'</b>';?>
        </div>
        <div class="smile">
            <?php echo $smile;?>
        </div>
        <button name="pasuxi">პასუხის მიღება</button>
    </form>
</div>
</body>
</html>