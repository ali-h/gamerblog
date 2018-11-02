<?php session_start();
function logout()
{
    unset($_SESSION['login']);
    header("location: index.php?login=loggedout");
}
function delete()
{
    unset($_SESSION[$_SESSION['login']]);
    unset($_SESSION['login']);
    header("location: index.php?login=deleted");
}
function post()
{
    extract($_GET);
    $_SESSION['post'.$_SESSION['i']] = array('auth'=>$_SESSION['login'],'name'=>$name,'post'=>$article,'game'=>$game);
    $_SESSION['i']++;
    header("location: ?post=success");
}
if (isset($_SESSION['login']))
{
?>
<html>
<head>
    <header>
        <?php include("includes/header.inc"); ?>
    </header>
</head>
<body>

        <?php
        if (isset($_GET['settings'])) {
            ?>
            <div class="container" style="margin-top: 50px;">
                <h2>Settings</h2>
                <form>
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input style="width: 260px;" value="<?php echo $_SESSION[$_SESSION['login']]['fname']; ?>"
                               type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input style="width: 220px;" value="<?php echo $_SESSION[$_SESSION['login']]['lname']; ?>"
                               type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input style="width: 340px;" value="<?php echo $_SESSION[$_SESSION['login']]['email']; ?>"
                               type="email" class="form-control" id="email" placeholder="Enter Email" name="email"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input style="width: 220px;" value="<?php echo $_SESSION[$_SESSION['login']]['username']; ?>"
                               type="text" class="form-control" id="username" placeholder="Enter UserName"
                               name="username1" disabled>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input style="width: 220px;" value="<?php echo $_SESSION[$_SESSION['login']]['password']; ?>"
                               type="password" class="form-control" id="pwd" placeholder="Enter password"
                               name="password" required>
                    </div>
                    Gender: &emsp;&emsp;
                    <label class="radio-inline">
                        <input type="radio" value="Male"
                               name="gender" <?php if ($_SESSION[$_SESSION['login']]['gender'] == "Male") echo "checked"; ?>>Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="Female"
                               name="gender" <?php if ($_SESSION[$_SESSION['login']]['gender'] == "Female") echo "checked"; ?>>Female
                    </label><br><br>
                    <input type="hidden" name="username"
                           value="<?php echo $_SESSION[$_SESSION['login']]['username']; ?>">
                    <button type="submit" name="update" class="btn btn-default">Update</button>
                    <?php if ($_GET['settings'] == "success") echo "&emsp; Status: Changes Saved Successfully"; ?>
                </form>
                <a href="?delete">
                    <button name="delete" class="btn btn-danger">Delete Account</button>
                </a>
            </div>
            <?php
        }
        elseif (isset($_GET['profile'])) {
        ?>
        <center>
        <div class="container" style="margin-top: 80px;">
            <h1>Your All Posts!</h1>
        <?php
        $post = 0;
        for ($i = 0; $i <= $post; $i++) {
            if (isset($_SESSION['post' . $i])) {
                $post++;
                if ($_SESSION['post' . $i]['auth']==$_SESSION['login'])
                {
                ?>
                <div class="container" style="border: 1px solid; width: 70%">
                    <h2 align="left"><?php echo $_SESSION['post' . $i]['name']; ?></h2>
                    <p align="left"><?php echo $_SESSION['post' . $i]['post']; ?></p><br><br>
                    <h6 align="right">Game: <?php echo $_SESSION['post' . $i]['game']; ?> </h6><h6 align="right">Posted By: <?php echo $_SESSION['post' . $i]['auth']; ?></h6>
                </div><br><br>
                <?php
                }
            }
        }
        echo "</div></center>";
        }
        elseif (isset($_GET['update'])) {
            extract($_GET);
            $_SESSION[$username] = array('fname' => $fname, 'lname' => $lname, 'email' => $email, 'username' => $username, 'password' => $password, 'gender' => $gender);
            header("location: ?settings=success");
        }
        elseif (isset($_GET['post']))
        {
            ?>
            <div class="container" style="margin-top: 50px;">
                <h2>Post On A Thread</h2>
                <form>
                    <div class="form-group">
                        <label for="name">Article Name:</label>
                        <input style="width: 260px;" type="text" class="form-control" id="name" placeholder="Enter Name Of Article" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="article">Article:</label>
                        <textarea style="height: 230px;" class="form-control" id="article" placeholder="Enter Article" name="article" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="game">Game Name:</label>
                        <select name="game" id="game" required>
                            <option disabled selected hidden>Select</option>
                            <option>GTA V</option>
                            <option>PUBG</option>
                            <option>Black Ops 4</option>
                            <option>Fortnite</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <button type="submit" name="post_sub" class="btn btn-default">Post</button>
                    <?php if ($_GET['post']=="success") echo "&emsp;&emsp;Status: Posted Successfully" ?>
                </form>
            </div>
            <?php
        }
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
                            if ($_SESSION['post'.$i]['game']==$_GET['catss'])
                            {
                            ?>
                            <div class="container" style="border: 1px solid; width: 70%">
                                <h2 align="left"><?php echo $_SESSION['post' . $i]['name']; ?></h2>
                                <p align="left"><?php echo $_SESSION['post' . $i]['post']; ?></p><br><br>
                                <h6 align="right">Game: <?php echo $_SESSION['post' . $i]['game']; ?> </h6><h6 align="right">Posted By: <?php echo $_SESSION['post' . $i]['auth']; ?></h6>
                            </div><br><br>
                            <?php
                            }
                        }
                    }
                    echo "</div></center>";
        }
        elseif (isset($_GET['cats']))
        {
            ?>
            <center><div class="container" style="margin-top: 80px;">
                    <a id="game" href="?catss=PUBG"><img src="assets/pubg.jpg" width="300px" height="300px"></a>&emsp;
                    <a id="game" href="?catss=GTA V"><img src="assets/gtav.jpg" width="300px" height="300px"></a>&emsp;
                    <a id="game" href="?catss=Fortnite"><img src="assets/fortnite.jpg" width="300px" height="300px"></a><br><br>
                    <a id="game" href="?catss=Black Ops 4"><img src="assets/blackops4.jpg" width="300px" height="300px"></a>&emsp;
                    <a id="game" href="?catss=Others"><img src="assets/others.png" width="300px" height="300px"></a>&emsp;
                </div></center>
            <?php
        }
        else {
            ?>
            <center>
            <div class="container" style="margin-top: 80px;">
                <h1>Post From All Gamers!</h1>
            <?php
            $post = 0;
            for ($i = 0; $i <= $post; $i++) {
                if (isset($_SESSION['post' . $i])) {
                    $post++;
                    ?>
                    <div class="container" style="border: 1px solid; width: 70%">
                        <h2 align="left"><?php echo $_SESSION['post' . $i]['name']; ?></h2>
                        <p align="left"><?php echo $_SESSION['post' . $i]['post']; ?></p><br><br>
                        <h6 align="right">Game: <?php echo $_SESSION['post' . $i]['game']; ?> </h6><h6 align="right">Posted By: <?php echo $_SESSION['post' . $i]['auth']; ?></h6>
                    </div><br><br>
                    <?php
                }
            }
            echo "</div></center>";
        }
        }
else
    header("Location: index.php?login=failed3");
// Action on demand;

if (isset($_GET['post_sub']))
    post();
if (isset($_GET['logout']))
    logout();
if (isset($_GET['delete']))
    delete();

?>
                <center> <footer><h3>Copyright (@)2018 Ali Hassan. All Rights Reserved.</h3></footer> </center>
</body>
</html>