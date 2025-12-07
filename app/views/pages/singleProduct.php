<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?></title>
</head>

<body>

    <form action="/productUpdate" method="POST" id="productView">

  <input type="hidden" name="Productid" value="<?= htmlspecialchars($product['id']) ?>">

        <p><strong>Name:</strong> <input name="name" type="text" value="<?= htmlspecialchars($product['name']) ?>" disabled></p>
        <p><strong>Description:</strong><textarea  name="des" id="" disabled><?= htmlspecialchars($product['description']) ?></textarea>
        <p><strong>Price:</strong> <input name="qty" type="text" value="Rs.<?= htmlspecialchars($product['qty']) ?>/-" disabled></p>
        <p><strong>Quantity:</strong> <input name="price" type="text" value="<?= htmlspecialchars($product['price']) ?>" disabled></p>



        <img src="/assets/images/<?= htmlspecialchars($product['image']) ?>"
            alt="Product Image"
            width="200">
           <input type="file" id="fileInput" name="UpdateImage"   accept="image/*">
<br>
       <button id="updateBtn" name="updateBtn" type="button">update</button>
        <button id="saveBtn" style="display:none;" name="saveBtn" type="submit">save</button>


    </form>


  <script src="/assets/js/script.js"></script>
</body>

</html>