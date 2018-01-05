<?php
//only run when form is submitted
if(isset($_POST['g-recaptcha-response'])) {
    $secretKey = '6LeINj8UAAAAAAPJ4THvzlrX8bSNIUncQoyH9qes';
    $response = $_POST['g-recaptcha-response'];
    $remoteIp = $_SERVER['REMOTE_ADDR'];


    $reCaptchaValidationUrl = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$remoteIp");
    $result = json_decode($reCaptchaValidationUrl, TRUE);

    //get response along side with all results
    print_r($result);

    if($result['success'] == 1) {
        //True - What happens when user is verified
        $userMessage = '<div>Success: you\'ve made it :)</div>';
    } else {
        //False - What happens when user is not verified
        $userMessage = '<div>Fail: please try again :(</div>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>reCAPTCHA Response</title>
    </head>
    <body>
        <?php
            if(!empty($userMessage)) {
                echo $userMessage;
            }
        ?>
    </body>
</html>
