<?php
//login form
function loginForm()
{
    echo '
    <div id="loginform">
    <form action="index.php" method="post">
        <p>Nhập tên của bạn !!!</p>
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="enter" value="Đăng nhập" />
    </form>
    </div>
    ';
}

if (isset($_POST['enter'])) {
    if ($_POST['name'] != "") {
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    } else {
        echo '<span class="error">Please type in a name</span>';
    }
}

//logout
if (isset($_GET['logout'])) {

    //Simple exit message
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i>User " . $_SESSION['name'] . " đã rời khỏi cuộc trò chuyện !.</i><br></div>");
    fclose($fp);

    session_destroy();
    header("Location: chat.php"); //Redirect the user
}

?>