<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $content = $_POST['content'];
    $name = $_POST['name'];
    $sender = $_POST['sender'];
    $subject = $_POST['subject'];
 
    $headers = "From: $name "."<".$sender.">\r\n";
    mail($email, $subject, $content, $headers );
}

?>

<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <title>Emailer</title>
      <style>
          img[src='https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png']{
              display: none;
          }
      </style>
   </head>
   <body style="user-select: none">
      <nav class="navbar navbar-dark bg-dark">
         <div class="container-fluid">
            <a class="navbar-brand">Emailer</a>
         </div>
      </nav>
      <div class="container">
         <form action="" method="post" autocomplete="off">
            <div class="mb-3">
               <label for="sender_name" class="form-label">Sender's Name:</label>
               <input type="text" class="form-control" name="name" id="sender_name" placeholder="Enter sender's name.." required>
            </div>
            <div class="mb-3">
               <label for="sender_email" class="form-label">Sender's Email:</label>
               <input type="email" class="form-control" name="sender" id="sender_email" placeholder="Enter sender's email.." required>
            </div>
            <div class="mb-3">
               <label for="receiver" class="form-label">Receiver's Email:</label>
               <input type="email" class="form-control" name="email" id="receiver" placeholder="Enter receiver's email.." required>
            </div>
            <div class="mb-3">
               <label for="subject" class="form-label">Email Subject:</label>
               <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject.." required>
            </div>
            <div class="mb-3">
               <label for="content" class="form-label">Email Content:</label>
               <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Send!</button>
         </form>
      </div>
   </body>
</html>