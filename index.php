<?php
$sent = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sender_name = $_POST['sender-name'];
    $sender_mail = $_POST['sender-mail'];
    $receiver_mail = $_POST['receiver-mail'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $headers = "From: $sender_name "."<".$sender_mail.">\r\n";

    if (mail($receiver_mail, $subject, $message, $headers)) {$sent = true;} else {$sent = false;}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Email Prank">
    <link rel="icon" href="https://img.icons8.com/?size=48&id=X0mEIh0RyDdL&format=png" type="image/png">
    <title>Email Prank</title>
    <style>
body{background: #f4f4f4;font-family: Arial, sans-serif;margin: 0;padding: 0;}#title{text-align: center;font-size: 2em;margin: 10px;margin-top: 30px;font-weight: bolder;}.container{width: 80%;margin: 0 auto;padding: 20px;background: #fff;box-shadow: 0 0 10px rgba(0,0,0,0.05);border-radius: 5px;}.input-group{margin: 10px 0;display: flex;flex-direction: column;}.input-control{padding: 10px;border: 1px solid #ddd;border-radius: 5px;margin: 5px 0;font-size: 1em;outline-color: #8ab6f9;}@media (max-width: 900px){.container{width: 80%;}}@media(width > 1100px){.container{width: 50%;margin-top: 5%;}}textarea.input-control{resize: vertical;min-height: 100px;max-height: 150px;overflow: auto;font-family: Arial, Helvetica, sans-serif;}*::-webkit-scrollbar{width: 10px;background: #f4f4f4;}*::-webkit-scrollbar-thumb{background: #ddd;border-radius: 5px;}*::-webkit-resizer {border-radius: 10px;background: #bbb;}#dialog{position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0,0,0,0.5);display: none;justify-content: center;align-items: center;}#dialog-content{width: 50%;background: #fff;padding: 20px;border-radius: 5px;box-shadow: 0 0 10px rgba(0,0,0,0.1);text-align: center;}#dialog-title{font-size: 1.5em;font-weight: bolder;margin: 10px 0;}#dialog-message{font-size: 1.2em;margin: 10px 0;}#dialog-close{padding: 10px 20px;background: rgb(240, 58, 58);color: #fff;border: none;border-radius: 5px;cursor: pointer;font-size: 1em;margin: 10px 0;}#send:disabled{background: #ddd;color: #aaa;cursor: not-allowed;}*::selection{background: #8ab6f9;color: #fff;}*::-moz-selection{background: #8ab6f9;color: #fff;}*::placeholder{color: gray;}
    </style>
</head>
<body>
    <div id="title">Email Prank</div>
    <form class="container" id="mail" action="email.php" method="post">
        <div class="input-group">
            <label for="email">Sender's Name*</label>
            <input type="text" class="input-control" name="sender-name" placeholder="Enter sender's name" required>
        </div>
        <div class="input-group">
            <label for="email">Sender's Email Address*</label>
            <input type="email" class="input-control" name="sender-mail" placeholder="Enter sender's email" required>
        </div>
        <div class="input-group">
            <label for="email">Receiver's Email Address*</label>
            <input type="email" class="input-control" name="receiver-mail" placeholder="Enter receiver's name" required>
        </div>
        <div class="input-group">
            <label for="email">Subject*</label>
            <input type="text" class="input-control" name="subject" placeholder="Enter email subject" required>
        </div>
        <div class="input-group">
            <label for="email">Message*</label>
            <textarea class="input-control" name="message" placeholder="Enter email content" required></textarea>
        </div>
        <div class="input-group">
            <input type="submit" id="send" class="input-control" value="Send Email">
        </div>
    </form>
    <div id="dialog">
        <div id="dialog-content">
            <div id="dialog-title"><?php if($sent){echo "Success";}else{echo "Whoops";}?></div>
            <div id="dialog-message"><?php if($sent){echo "Email has been sent successfully";}else{echo "There was an unexpected problem sending your email.";}?></div>
            <div id="dialog-close">Close</div>
        </div>
    </div>

    <script>
        const mailForm = document.getElementById('mail');
        const dialog = document.getElementById('dialog');
        const sendBtn = document.getElementById('send');
        mailForm.addEventListener('submit', function(e){
            e.preventDefault();
            // validate email
            var senderMail = document.getElementsByName('sender-mail')[0].value;
            var receiverMail = document.getElementsByName('receiver-mail')[0].value;
            if(senderMail == receiverMail){
                alert('Sender and receiver email cannot be the same!');
                return;
            }
            sendBtn.disabled = true;
            var form = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'email.php', true);
            xhr.onload = function(){
                if(xhr.status == 200){
                    document.getElementById('dialog').style.display = 'flex';
                }
            }
            xhr.send(form);
        });
        dialog.addEventListener('click', function(){
            document.getElementById('dialog').style.display = 'none';
        });
    </script>
</body>
</html>