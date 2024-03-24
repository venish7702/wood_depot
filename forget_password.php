<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password | Depot</title>
    <!-- bootsrap link -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="./css/all.min.css">
    <!-- slider-->
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- aenimation custom -->
    <link rel="stylesheet" href="css/aenimation.css">

    <!-- link icon -->
    <link rel="icon" type=".image/xicon" href="../img/D Rose_logo.png">

</head>
<?php
require 'PHPMailer/PHPMailerAutoload.php';
$con = mysqli_connect("localhost", "root", "", "ruper");

function send_password_reset($get_email, $get_password)
{
    $mail = new PHPMailer;

    // $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->IsSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'krupaliman@gmail.com';                 // SMTP username
    $mail->Password = 'irdzodficgwlpvda';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom($mail->Username, 'Wood Depot');
    $mail->addAddress($get_email);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($mail->Username);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = "password";

    $email_template = "your password is : $get_password";



    $mail->Body    = $email_template;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo '<h3 class="msg_lg">Message has been sent</h3>';
        ?>
            <a href="loginmodel.php" class="log_mdl">Back</a>
        <?php
    }
}



?>

<body class="main_back">



    <div class="container">

        <div class="row justify-content-center admin_main">
            <div class="col-auto text-center ">
                <div class="admin_login_main">
                    <div class="admin_login_text">
                        <h1>Forgot your password?</h1>
                    </div>
                    <div class="em-bar">
                        <div class="em_bar_bg">
                        </div>
                    </div>

                    <form class="admin_login_form" action="forget_password.php" method="post">
                        <?php
                        if (isset($_REQUEST['password_reset_link'])) {
                            $email = mysqli_real_escape_string($con, $_REQUEST['Email']);

                            $check_email = "SELECT * FROM tbluser WHERE email='$email' LIMIT 1";
                            $check_email_run = mysqli_query($con, $check_email);

                            if (mysqli_num_rows($check_email_run) > 0) {
                                $row = mysqli_fetch_array($check_email_run);
                                // $get_name = $row['name'];
                                $p = base64_decode($row['password']);
                                // echo $p;
                                $get_email = $row['email'];
                                $get_password = $p;
                                send_password_reset($get_email, $get_password);
                                // echo 'we emailed you password reset link';


                                exit(0);
                            } else {
                                echo '<h3>Email not found</h3>';
                            }
                        }

                        ?>


                        <div class="row">

                            <div class="col-12">
                                <input type="text" class="form-control forget_email" name="Email" placeholder="Enter Email">
                                <span class="err">Please Enter Your Email </span>
                            </div>

                        </div>


                        <div class="form_btn">
                            <input type="submit" class="btn_log" name="password_reset_link" value="RESET PASSWORD">



                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".admin_login_form").submit(function() {

                var forgot_email = $('.forget_email').val();
                var forgot_email_patten = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


                if (forgot_email_patten.test(forgot_email) == "") {

                    $('.forget_email').next('.err').css('display', 'inline')
                    return false;
                }

            })
            $('.forget_email ').keypress(function () {
        $(this).next('.err').hide()
    })
        })
    </script>

</body>

</html>