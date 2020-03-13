$(document).ready(function () {
        //If user wants to end session
        $("#exit").click(function () {
            var exit = confirm("Are you sure you want to end the session?");
            if (exit == true) {
                window.location = 'chat.php?logout=true';
            }
        });
        //If user submits the form
        $("#submitmsg").click(function () {
            var clientmsg = $("#usermsg").val();
            $.post("post.php", {text: clientmsg});
            $(".emoji-wysiwyg-editor").html("");
            return false;
        });
    });

//Load the file containing the chat log
function loadLog() {
    var oldscrollHeight = $("#chatbox")[0].scrollHeight; //Scroll height before the request
    console.log(oldscrollHeight);
    $.ajax({
        url: "log.html",
        cache: false,
        success: function (html) {
            $("#chatbox").html(html); //Insert chat log into the #chatbox div

            //Auto-scroll
            var newscrollHeight = $("#chatbox")[0].scrollHeight; //Scroll height after the request
            if (newscrollHeight > oldscrollHeight) {
                $("#chatbox").animate({scrollTop: newscrollHeight}, 'normal'); //Autoscroll to bottom of div
            }
        },
    });
}
setInterval(loadLog, 2500);
console.log(setInterval(loadLog, 2500));
