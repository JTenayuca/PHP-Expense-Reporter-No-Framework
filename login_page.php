<!DOCTYPE html>
<html>
    <head>
        <title>Expense Reporter</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <head>

    <body>

    <?php

    if (isset($errors) && !empty($errors)) {
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurredL<br>';
        foreach ($errors as $msg) {
            echo " - $msg<br> \n";
        }
        echo '</p><p>Please try again.</p>';
    }
    ?>
   
    <h1>Login</h1>
    <form action="login.php" method="post">
        <p>Email Address: <input type="email" name="email" size="20" maxlength="60"></p>
        <p>password: <input type="password" name="pass" size="20" maxlength="20"></p>
        <p><input type="submit" name="submit" value="Login"></p>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>


