<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<body>

    <form action="/registerProcess" method="POST">

        <?php
        if (!empty($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo '<div style="color:red;">' . htmlspecialchars($error, ENT_QUOTES) . '</div>';
            }
            unset($_SESSION['errors']);
        } else {
            unset($_SESSION['RegCache']);
        }
        ?>

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($_SESSION['RegCache'][0] ?? '', ENT_QUOTES); ?>">
        <br>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($_SESSION['RegCache'][1] ?? '', ENT_QUOTES); ?>">
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['RegCache'][2] ?? '', ENT_QUOTES); ?>">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($_SESSION['RegCache'][3] ?? '', ENT_QUOTES); ?>">
        <br>
        <label for="phoneNumber">Phone Number</label>
        <input type="text" name="phoneNumber" value="<?php echo htmlspecialchars($_SESSION['RegCache'][4] ?? '', ENT_QUOTES); ?>">
        <br>
        <select name="gender" value="<?php echo htmlspecialchars($_SESSION['RegCache'][5] ?? '', ENT_QUOTES); ?>">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <br>
        <label for="address">Address</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($_SESSION['RegCache'][6] ?? '', ENT_QUOTES); ?>">
        <br>
        <button type="submit">Submit</button>
        <br>
        <a href="/logIn">I have Alredy Account, Sign In</a>

    </form>

</body>

</html>