<!DOCTYPE html>
<html lang="en">
<head>
    <title>The Gamer Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">The Gamer Blog</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php if (isset($_SESSION['login'])) echo "user.php"; else echo "index.php"; ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="?cats"><span class="glyphicon glyphicon-th-list"></span> Game Threads</a></li>
        </ul>
        <?php
        if (isset($_SESSION['login']))
        {
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="?post"><span class="glyphicon glyphicon-plus"></span> Post</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['login']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?profile">Profile</a></li>
                        <li><a href="?settings">Settings</a></li>
                        <li><a href="?logout">Logout</a></li>
                    </ul>
                </li>

            </ul>
            <?php
            }
        else{

        ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="?register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="?login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        <?php } ?>
    </div>
</nav>

</body>
</html>
