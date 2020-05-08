<?php
/*
Recommendation for making the form Awesome:
rePatcha ==> to remove the Spam
phpMailer is a class you should use instead of phpMail because phpMail is sent the mails to spam
*/
/*
  mail(to, subject, message, headers, parameters)
*/
   //Check if user is from post request
if($_SERVER['REQUEST_METHOD'] == 'POST'):
  //Assign To Variables
  $user      = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $mail      =  filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $cellphone =  filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
  $msg       =  filter_var($_POST['message'],FILTER_SANITIZE_STRING);

  /*$userError = "";
  if(strlen($user) < 4 ):
    $userError = "<div class='alert alert-danger alert-dismissible' role='start'>username should be more than <Strong> 3 </strong> characters </div>";
  endif;
*/
//Creating Array of errors
$formErrors = array();
if(strlen($user) < 3):
  $formErrors[] = "username should be more than 3 characters";
endif;
if(strlen($msg) < 5):
  $formErrors[] = "Your Message should be more than 5 characters";
endif;

//if no Errors Send the email
$header = "From: " . $mail . "\r\n"; //to make a break line
if(empty($formErrors)):
  mail('yaraelmalah2016@gmail.com', 'contact Form', $msg, $header);
  $user='';
  $mail='';
  $cellphone= '';
  $msg='';
  $success = "<div class='alert alert-success'> Thank You, I will Contact You </div>";
endif;
endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hidden Cat Form</title>
    <link rel="stylesheet" href="css/c.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/contact.css"/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500;1,800;1,900&display=swap" />
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.3.2/respond.min.js"></script>
      <![endif]-->
    <!--Here the javaScript files-->



</head>

<body>
    <!--Start Form -->
    <div class="container">
        <form class="contact-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <h2 class="text-center">Contact Me</h2>
            <div class="errors">
                <?php
            if(! empty($formErrors)):
              echo "<div class='alert alert-danger role=\'start\''>";
              foreach ($formErrors as $error):
                echo $error . "<br>";
            endforeach;
            echo "</div>";
            endif;
            if(isset($success)):
              echo $success;
            endif;
               ?>
            </div>
            <div class="form-group">
            <input class="form-control username" type="text" name="username" placeholder="Type Your Name"
            value="<?php
            if(isset($user)):
              echo $user;
            endif;

            ?>"  />
            <i class="fas fa-user fa-fw"></i>
            <div class="asterisx">*</div>
          <?php
            /*if(isset($userError)):
              echo $userError;
            endif;*/
            ?>
            <div class="alert alert-danger custom-alert">username should be more than 3 characters</div>
          </div>
          <div class="form-group">
            <input class="form-control email" type="email" name="email" placeholder="Type Your E-mail Address"
            value="<?php
            if(isset($mail)):
              echo $mail;
            endif;

            ?>" />
            <i class="far fa-envelope fa-fw"></i>
            <div class="asterisx">*</div>
            <div class="alert alert-danger custom-alert">The Email Can't be empty</div>
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="cellphone" placeholder="Type Your mobile number" value="<?php
            if(isset($cellphone)):
              echo $cellphone;
            endif;

            ?>" />
            <i class="fas fa-portrait fa-fw"></i>
            <div class="alert alert-danger custom-alert"></div>
          </div>
            <div class="form-group">
            <textarea class="form-control msg" name="message" placeholder="Your Message!"><?php
            if(isset($msg)):
              echo $msg;
            endif;

            ?> </textarea>
            <div class="asterisx">*</div>
            <div class="alert alert-danger custom-alert">Your Message should be more than 5 characters</div>
</div>
            <input class="btn btn-success" type="submit" value="Send Message" />
            <i class="fas fa-paper-plane fa-fw send-icon"></i>



        </form>
        <!--End Form-->
    </div>
    <script src="js/j-query-min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
