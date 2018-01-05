<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>reCaptcha</title>

    <!--api link-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--call back function-->
    <script>
        function onSubmit(token) {
            document.getElementById('reCaptchaForm').submit();
        }
    </script>
</head>
<body>
<div class="container">
    <form id="reCaptchaForm" action="signup.php" method="POST">
        <input type="text" placeholder="type anything">
        <!--Invisible reCaptcha configuration-->
        <button class="g-recaptcha" data-sitekey="6LeINj8UAAAAAL23qoLUp4GzzpLWgtMY5_qfG69o" data-callback='onSubmit'>Submit</button>
        <br/>
    </form>
</div>
</body>
</html>
