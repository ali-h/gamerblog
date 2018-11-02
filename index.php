<?php session_start();
if (isset($_SESSION['once'])) {
} else {
    session();
}
function session()
{
    $_SESSION['i'] = 0;
    $_SESSION['once'] = "";
}

function register()
{
    extract($_GET);
    $_SESSION[$username] = array('fname' => $fname, 'lname' => $lname, 'email' => $email, 'username' => $username, 'password' => $password, 'gender' => $gender);
    header("Location: index.php?register=success");
}

function login()
{
    extract($_GET);
    if (isset($_SESSION[$username])) {
        if ($_SESSION[$username]['password'] == $password) {
            $_SESSION['login'] = $username;
            header("Location: user.php");
        } else {
            header("Location: index.php?login=failed1");
        }
    } else {
        header("Location: index.php?login=failed2");
    }
}

if (isset($_SESSION['login'])) {
    header("location: user.php");
}
?>
<html>
<head>
    <header>
        <?php include("includes/header.inc"); ?>
    </header>
</head>
<body>
<?php
if (isset($_GET['login']))
{
    ?>
    <div class="container" style="margin-top:50px">
        <h2>Login</h2>
        <form action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input style="width: 300px;" type="text" class="form-control" id="username" placeholder="Enter Username"
                       name="username" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input style="width: 300px;" type="password" class="form-control" id="pwd" placeholder="Enter password"
                       name="password" required>
            </div>
            <button type="submit" name="login_sub" class="btn btn-default">Login</button>
        </form>
    </div>
    <?php
} elseif (isset($_GET['register'])) {
    ?>
    <div class="container" style="margin-top:50px">
        <h2>Register</h2>
        <form>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input style="width: 260px;" type="text" class="form-control" id="fname" placeholder="Enter First Name"
                       name="fname" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input style="width: 220px;" type="text" class="form-control" id="lname" placeholder="Enter Last Name"
                       name="lname" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input style="width: 340px;" type="email" class="form-control" id="email" placeholder="Enter Email"
                       name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input style="width: 220px;" type="text" class="form-control" id="username" placeholder="Enter UserName"
                       name="username" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input style="width: 220px;" type="password" class="form-control" id="pwd" placeholder="Enter password"
                       name="password" required>
            </div>
            Gender: &emsp;&emsp;
            <label class="radio-inline">
                <input type="radio" value="Male" name="gender" checked>Male
            </label>
            <label class="radio-inline">
                <input type="radio" value="Female" name="gender">Female
            </label><br><br>
            <button type="submit" name="register_sub" class="btn btn-default">Register</button>
        </form>
    </div>
<?php }
elseif (isset($_GET['catss']))
{
?>
<center>
    <div class="container" style="margin-top: 80px;">
        <h1>Post Of Thread <?php echo $_GET['catss']; ?>!</h1>
        <?php
        $post = 0;
        for ($i = 0; $i <= $post; $i++) {
            if (isset($_SESSION['post' . $i])) {
                $post++;
                if ($_SESSION['post' . $i]['game'] == $_GET['catss']) {
                    ?>
                    <div class="container" style="border: 1px solid; width: 70%">
                        <h2 align="left"><?php echo $_SESSION['post' . $i]['name']; ?></h2>
                        <p align="left"><?php echo $_SESSION['post' . $i]['post']; ?></p><br><br>
                        <h6 align="right">Game: <?php echo $_SESSION['post' . $i]['game']; ?> </h6><h6 align="right">
                            Posted By: <?php echo $_SESSION['post' . $i]['auth']; ?></h6>
                    </div><br><br>
                    <?php
                }
            }
        }
        echo "</div></center>";
        }
        elseif (isset($_GET['cats'])) {
            ?>
            <center>
                <div class="container" style="margin-top: 80px;">
                    <a id="game" href="?catss=PUBG"><img src="assets/pubg.jpg" width="300px" height="300px"></a>&emsp;
                    <a id="game" href="?catss=GTA V"><img src="assets/gtav.jpg" width="300px" height="300px"></a>&emsp;
                    <a id="game" href="?catss=Fortnite"><img src="assets/fortnite.jpg" width="300px" height="300px"></a><br><br>
                    <a id="game" href="?catss=Black Ops 4"><img src="assets/blackops4.jpg" width="300px" height="300px"></a>&emsp;
                    <a id="game" href="?catss=Others"><img src="assets/others.png" width="300px" height="300px"></a>&emsp;
                </div>
            </center>
            <?php
        } else {
            ?>
            <center>
                <div class="container" style="margin-top:50px">
                    <h1>Welcome To The GAMER BLOG</h1>
                    <p>Here you can Do the Q&A's and Special Things on your Favourite Game!</p>
                    <hr>
                    <hr>
                </div>
                <div class="container" style="margin-top:50px">
                    &bull; <strong>Popular Games To Discuss About</strong> &bull; <Br><Br>
                    <center>
                        <div class="container">
                            <a id="game" href="?catss=PUBG"><img src="assets/pubg.jpg" width="300px" height="300px"></a>&emsp;
                            <a id="game" href="?catss=GTA V"><img src="assets/gtav.jpg" width="300px"
                                                                  height="300px"></a>&emsp;
                            <a id="game" href="?catss=Fortnite"><img src="assets/fortnite.jpg" width="300px"
                                                                     height="300px"></a><br><br>
                            <a id="game" href="?catss=Black Ops 4"><img src="assets/blackops4.jpg" width="300px"
                                                                        height="300px"></a>&emsp;
                            <a id="game" href="?catss=Others"><img src="assets/others.png" width="300px" height="300px"></a>&emsp;
                        </div>
                    </center>
                </div>
                <Br><Br><Br><Br><Br><Br>
                &bull; <strong>Recent Posts</strong> &bull; <Br><Br>
                <?php
                $post = 0;
                for ($i = 0; $i <= $post; $i++) {
                    if (isset($_SESSION['post' . $i])) {
                        $post++;
                        ?>
                        <div class="container" style="border: 1px solid; width: 70%">
                            <h2 align="left"><?php echo $_SESSION['post' . $i]['name']; ?></h2>
                            <p align="left"><?php echo $_SESSION['post' . $i]['post']; ?></p><br><br>
                            <h6 align="right">Game: <?php echo $_SESSION['post' . $i]['game']; ?> </h6><h6
                                    align="right">Posted By: <?php echo $_SESSION['post' . $i]['auth']; ?></h6>
                        </div><br><br>
                        <?php
                    }
                }
                echo "</div></center>"; ?>
            </center>
            <?php
        }
        if (isset($_GET['register_sub']))
            register();
        elseif (isset($_GET['login_sub']))
            login();
        ?>
        <!-- Comments on Functions; -->
        <div class="container">
            <?php
            if (isset($_GET['register']))
                if ($_GET['register'] == "success")
                    echo "You are successfuly registered, Click <a href='?login'>Here</a> To Login";
            if (isset($_GET['login'])) {
                if ($_GET['login'] == "failed1")
                    echo "Login Failed: Incorrect Password";
                if ($_GET['login'] == "failed2")
                    echo "Login Failed: Username Does not Exist";
                if ($_GET['login'] == "failed3")
                    echo "Access Denied: Login First To Continue";
                if ($_GET['login'] == "loggedout")
                    echo "Status: You are Successfully Logged Out";
                if ($_GET['login'] == "deleted")
                    echo "Status: Your Account is Successfully Deleted";
            }
            ?>
        </div>
        <!-- End -->
        <center>
            <footer><h3>Copyright (@)2018 Ali Hassan. All Rights Reserved.</h3></footer>
        </center>
</body>
</html>