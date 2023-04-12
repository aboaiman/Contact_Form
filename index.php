<div class="container">
    <div class="card-header">
        <div class="card-body">
            <?php
            // check if user coming from A Request
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Assign Variable
                $user = htmlspecialchars($_POST['username']);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
                $msg = htmlentities($_POST['message']);

                $formErrors = array();
                if (strlen($user) <= 3) {
                    $formErrors[] = 'Username Must be Larger Than <strong>3</strong> Characters';
                }
                if (strlen($msg) <= 10) {
                    $formErrors[] = 'Message Cant be Less Than <strong>10</strong> Characters';
                }
                echo '<div class="card p-5 contact-form">';
                echo $user;
                echo '<br/>';
                echo $email;
                echo '<br/>';
                echo $cell;
                echo '<br/>';
                echo $msg;
                echo '<br/>';

                echo '</div>';
                $header = 'From: ' . $email . '\r\n';
                $myEmail = 'yamall13promax@gmail.com';
                $subject = 'Contact From';

                if (empty($formErrors)) {

                    // mail($myEmail, $subject, $msg, $header);
                    $user = '';
                    $email = '';
                    $cell = '';
                    $msg = '';

                    $success = '<div class="alert alert-success">We Have Recived Your Message</div>';
                }
            }
            ?>

        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/contact.css" rel="stylesheet" />
</head>

<body>
    <!-- Satrt Form -->
    <div class="container mt-3">


    </div>

    <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h1 class="text-center">Contact Me</h1>
        <?php
        if (!empty($formErrors)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="start">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?php
                foreach ($formErrors as $error) {
                    echo $error . '<br/>';
                }
                ?>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($success)) {
            echo $success;
        ?>
            <meta http-equiv="refresh" content="4; url=index.php">
        <?php
        }
        ?>


        <div class="form-group">
            <input class="username form-control" type="text" name="username" placeholder="Type Your Username" value="<?php if (isset($user)) {
                                                                                                                            echo $user;
                                                                                                                        }  ?>" />

            <i class="fa fa-user fa-fw"></i>
            <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert">
                Username Must be Larger Than <strong>3</strong> Characters
            </div>
        </div>
        <div class="form-group">
            <input class="email form-control" type="email" name="email" placeholder="Please Type a Valid Email" value="<?php if (isset($email)) {
                                                                                                                            echo $email;
                                                                                                                        }  ?>" />
            <i class="fa fa-envelope fa-fw"></i>
            <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert">
                Email Can't <strong>Empty</strong>
            </div>
        </div>
        <input class="form-control" type="text" name="cellphone" placeholder="Type Your Cell Phone" value="<?php if (isset($cell)) {
                                                                                                                echo $cell;
                                                                                                            }  ?>" />
        <i class="fa fa-phone fa-fw"></i>
        <div class=" form-group">
            <textarea class="message form-control bg-light" placeholder="Your Message" name="message"><?php if (isset($msg)) {
                                                                                                            echo $msg;
                                                                                                        }  ?></textarea>
            <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert">
                Message Cant be Less Than <strong>10</strong> Characters
            </div>
        </div>
        <div class="d-grid gap-2">
            <input class="btn btn-success" type="submit" value="Send Message" />
            <i class="fa fa-send fa-fw send-icone"></i>
        </div>
    </form>

    <!-- End Form -->




    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>