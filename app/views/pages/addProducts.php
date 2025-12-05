<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>


    <link rel="stylesheet" href="/assets/css/bootstrap.css">

</head>

<body>
    <br>
    <h5>Add Your Products</h5> <br>

<form action="/productProcess" method="POST" enctype="multipart/form-data">
    
    <label for="name">Name</label>
    <input type="text" name="pName">

    <label for="des">Description</label>
    <textarea name="des" id=""></textarea>

    <label for="price">Price</label>
    <input type="text" name="pPrice">

    <label for="qty">Quntity</label>
    <input type="text" name="pQty">

    <!-- <img src="/assets/images/" class="profileImage" alt=""> -->
    <!-- <input type="file" id="fileInput" name="profileImage" accept="image/*" required> -->

    <button class="btn btn-outline-success" style="width: 150px;" type="submit">Add</button>
</form>

</body>

</html>