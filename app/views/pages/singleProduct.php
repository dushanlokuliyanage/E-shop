<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?></title>
</head>

<body>

    <form action="">

        <p><strong>Name:</strong> <input name="name" type="text" value="<?= htmlspecialchars($product['name']) ?>" disabled></p>
        <p><strong>Description:</strong><textarea disabled name="des " id=""><?= htmlspecialchars($product['description']) ?></textarea>
        <p><strong>Price:</strong> <input name="qty" type="text" value="Rs.<?= htmlspecialchars($product['qty']) ?>/-" disabled></p>
        <p><strong>Quantity:</strong> <input name="price" type="text" value="<?= htmlspecialchars($product['price']) ?>" disabled></p>

        <img src="/assets/images/<?= htmlspecialchars($product['image']) ?>"
            alt="Product Image"
            width="200">
    </form>



</body>

</html>