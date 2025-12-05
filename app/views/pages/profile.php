<?php
if (!isset($_SESSION['user'])) {
    header("Location: /register");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

        <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>

<body>



    <?php include __DIR__ . '/../layouts/header.php'; ?>


    <form id="profileForm" method="POST" action="/profileUpdate">

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($_SESSION['user']['firstName'] ?? '', ENT_QUOTES);  ?>" disabled>
        <br>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($_SESSION['user']['lastName'] ?? '', ENT_QUOTES); ?>" disabled>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['user']['email'] ?? '', ENT_QUOTES); ?>" disabled>

        <br>
        <label for="phoneNumber">Phone Number</label>
        <input type="text" name="phoneNumber" value="<?php echo htmlspecialchars($_SESSION['user']['phoneNumber'] ?? '', ENT_QUOTES); ?>" disabled>
        <br>
        <label for="address">Gender</label>
        <input type="text" name="gender" value="<?php echo htmlspecialchars($_SESSION['user']['gender'] ?? '', ENT_QUOTES); ?>" disabled>
        <br>
        <label for="address">Address</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($_SESSION['user']['address'] ?? '', ENT_QUOTES); ?>" disabled>

        <button id="updateBtn" name="updateBtn" type="button">update</button>
        <button id="saveBtn" style="display:none;" name="saveBtn" type="submit">save</button>
    </form>
    <br>


    <script src="/assets/js/script.js"></script>

</body>

</html>