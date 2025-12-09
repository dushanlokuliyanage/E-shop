<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/bootstrap.css">
  <title><?= htmlspecialchars($product['name']) ?></title>
</head>

<body>

  <form action="/productUpdate" method="POST" id="productView">

    <input type="hidden" name="Productid" value="<?= htmlspecialchars($product['id']) ?>">

    <p><strong>Name:</strong> <input name="name" type="text" value="<?= htmlspecialchars($product['name']) ?>" disabled></p>
    <p><strong>Description:</strong><textarea name="des" id="" disabled><?= htmlspecialchars($product['description']) ?></textarea>
    <p><strong>Price:</strong> <input name="qty" type="text" value="Rs.<?= htmlspecialchars($product['qty']) ?>/-" disabled></p>
    <p><strong>Quantity:</strong> <input name="price" type="text" value="<?= htmlspecialchars($product['price']) ?>" disabled></p>



    <img src="/assets/images/<?= htmlspecialchars($product['image']) ?>"
      alt="Product Image"
      width="200">
    <input type="file" id="fileInput" name="UpdateImage" accept="image/*">
    <br>
    <button id="updateBtn" name="updateBtn" type="button">update</button>
    <button id="saveBtn" style="display:none;" name="saveBtn" type="submit">save</button>

    <br>
    <br>
  </form>
<form action="/deleteProduct" method="POST"
      onsubmit="return confirm('Are you sure you want to delete your product?');">

    <input type="hidden" name="Productid" value="<?= htmlspecialchars($product['id']) ?>">

    <button type="submit" class="me-2 btn btn-outline-danger btn-sm" id="deleteBtn">
        Delete Product
    </button>
</form>



  <script src="/assets/js/script.js"></script>
</body>

</html>