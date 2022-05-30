<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_name = $_POST['sender_name'];
    $sender_email = $_POST['sender_email'];
    $reciever_email = $_POST['reciever_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $headers = "From: $sender_name "."<".$sender_email.">\r\n";
    mail($reciever_email, $subject, $message, $headers );
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emailer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3 id="header">Em@il $poofer</h3>
    <form action="" method="post">
        <label for="sender_name">Sender's Name:</label>
        <input type="text" name="sender_name" id="sender_name">
        <label for="sender_email">Sender's Email:</label>
        <input type="email" name="sender_email" id="sender_email">
        <label for="receiver_email">Receiver's Email:</label>
        <input type="email" name="receiver_email" id="receiver_email">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject">
        <label for="message">Message:</label>
        <textarea name="message" id="message" cols="62" rows="10"></textarea>
        <button class="send-btn">Send Email</button>
    </form>
</body>
</html>