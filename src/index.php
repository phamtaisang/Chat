<?php
error_reporting(0);
session_start();
include ('login.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Chat </title>
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Begin emoji-picker Stylesheets -->
    <link href="../lib/css/emoji.css" rel="stylesheet">
    <!-- End emoji-picker Stylesheets -->
</head>
<body>
<?php
if (!isset($_SESSION['name'])){
    loginForm();
}
else{
?>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Chào mừng, <b><?php echo $_SESSION['name']; ?></b></p>
        <p class="logout"><a id="exit" href="#">Đăng xuất</a></p>
        <div style="clear:both"></div>
    </div>
    <div id="chatbox">
        <?php
            if (file_exists("log.html") && filesize("log.html") > 0) {
                $handle = fopen("log.html", "r");
                $contents = fread($handle, filesize("log.html"));
                fclose($handle);
                    echo $contents;
            }
        ?>
    </div>
    <form name="message" action="">
<!--        <input name="usermsg" type="text" id="usermsg" size="63"/>-->
        <p class="lead emoji-picker-container">
            <input type="text" id="usermsg" class="form-control" placeholder="Nhập nội dung gửi !" data-emojiable="true">
        </p>
        <input name="submitmsg" type="submit" id="submitmsg" value="Gửi"/>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<!-- Begin emoji-picker JavaScript -->
<script src="../lib/js/config.js"></script>
<script src="../lib/js/util.js"></script>
<script src="../lib/js/jquery.emojiarea.js"></script>
<script src="../lib/js/emoji-picker.js"></script>
<!-- End emoji-picker JavaScript -->
<script src="xuLy.js"></script>

<script>
    $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: '../lib/img/',
            popupButtonClasses: 'fa fa-smile-o'
        });
        window.emojiPicker.discover();
    });
</script>
<script>
    // Google Analytics
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-49610253-3', 'auto');
    ga('send', 'pageview');
</script>
</body>

<?php
}
?>
</html