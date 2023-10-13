<?php
session_start();
?>
<script>
    function displayMessage(messagesSort){
        messagesSort.forEach(function(message) {
            message.date = new Date(message.date);
        });
        let messages = messagesSort.sort(function(a, b) {
            return a.date - b.date;
        });
        let container = $('.messages');
        container.empty();
        const currentUser = <?= $_SESSION['ID']; ?>;

        $.each(messages, function (index, msg){
            let isCurrentUser = msg.author == currentUser;
            let messageClass = isCurrentUser ? 'message-sent' : 'message-received';
            let messageHTML = '<p class="' + messageClass + '">' + msg.message + '</p>';
            container.append(messageHTML);
        })
    }
    function getMessage(recipientID){

        $.ajax({
                type: "GET",
                url: "../../process/getMessage.php",
                data: {
                    RecipientID: recipientID
                },
                dataType: "JSON",
                success: function (response) {
                    displayMessage(response);
                }
            });
    }
    function sendMessage(recipientId) {
            let message = $("#messageContent").val();
            const author = <?= $_SESSION['ID']; ?>;
            let recipient = recipientId;
            $.ajax({
                type: "POST",
                url: "../../process/sendMessage",
                data: 
                {
                    message: message,
                    author: author,
                    recipient: recipient    
                },
                success: function (response) {
                    $("#messageContent").val("");
                },
                error: function (jqXHR){
                    console.log(jqXHR);
                }
            });
    }
    $(document).ready(() => {
        $("submitBtn").append('<i class="fas fa-paper-plane"></i>');
        $('#sendMessage').submit((e) => {
            e.preventDefault();
            let id = $('#submitBtn').attr("data-recipientid");
            if(!$("#messageContent").val() == ""){
                sendMessage(id);
            }
        });
        setInterval(() => {
            getMessage($("#submitBtn").attr("data-recipientid"));
        }, 1000);

    })
    function changeRecipient(id){
        let submit = $("#submitBtn");
        submit.attr("data-recipientid", id);
        getMessage(id);
    }
    
</script>
<script>
    
</script>
<div class="account__message">
    <div class="left-recipient">
        <?php
            require("../../class/Db.php");
            $db = new Database("localhost", "root", "", "bookingfe");
            $author = $_SESSION['ID'];
            $sql = "SELECT * FROM messages WHERE author = '$author' OR recipient = '$author'";
            $recipients = $db->query($sql);
            $userIds = [];
            foreach($recipients as $message){
                $userIds[] = $message['author'];
                $userIds[] = $message['recipient'];
            }
            $uniqueUserIds = array_unique($userIds);
            $uniqueUserIds = array_diff($uniqueUserIds, [$_SESSION['ID']]);
            foreach($uniqueUserIds as $item){
                $sql2 = "SELECT * FROM users WHERE ID = '$item'";
                $user = $db->query($sql2); 
                ?>
                    <div class="recipient">
                        <p class="recipient__item" onclick="changeRecipient(<?= $user[0]['ID'] ?>)"><?= $user[0]["name"] ?></p>
                    </div>
                    <?php
            }


        ?>
    </div>
    <div class="messages__wrapper">
        <div class="messages">

        </div>
        <form id="sendMessage">
            <input type="text" placeholder="Taper votre message..." id="messageContent" autocomplete='off'>
            <div class="send">
                <input type="submit" value="" id="submitBtn" data-recipientID="2">
                <i class="fas fa-paper-plane"></i>
            </div>
        </form>
    </div>
</div>
