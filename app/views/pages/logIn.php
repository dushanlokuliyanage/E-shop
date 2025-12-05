<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>

<body>

   <?php
        if (!empty($_SESSION['LogErrors'])) {
            foreach ($_SESSION['LogErrors'] as $error) {
                echo '<div style="color:red;">' . htmlspecialchars($error, ENT_QUOTES) . '</div>';
            }
            unset($_SESSION['LogErrors']);
        } else {
            unset($_SESSION['LogCache']);
        }
        ?>

    <form action="/logInProcess" method="GET">

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['LogCache'][0] ?? '', ENT_QUOTES); ?>">

        <label for="password">Password</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($_SESSION['LogCache'][1] ?? '', ENT_QUOTES); ?>">

        <button type="submit">LogIn</button>
        <a href="/register">I don't have Alredy Account, Register</a>
    </form>

</body>

</html>