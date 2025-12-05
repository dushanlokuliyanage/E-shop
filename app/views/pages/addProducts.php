
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

<?php
if(!empty($_SESSION['ProductErrors'])){
    foreach($_SESSION['ProductErrors'] as $error){
        var_dump($error);
        echo '<div style="color:red;">' . htmlspecialchars($error, ENT_QUOTES) . '</div>'; 
    }
    unset($_SESSION['ProductErrors']);
}else{
    unset($_SESSION['ProdCache']);
}

?>


<form action="/productProcess" method="POST" enctype="multipart/form-data">
    
    <label for="name">Name</label>
    <input type="text" name="pName" value="<?php echo htmlspecialchars($_SESSION['ProdCache'][0] ?? '', ENT_QUOTES); ?>" >

    <label for="des">Description</label>
    <textarea name="des" id=""  value="<?php echo htmlspecialchars($_SESSION['ProdCache'][1] ?? '', ENT_QUOTES); ?>"></textarea>

    <label for="price">Price</label>
    <input type="text" name="pPrice"  value="<?php echo htmlspecialchars($_SESSION['ProdCache'][2] ?? '', ENT_QUOTES); ?>">

    <label for="qty">Quntity</label>
    <input type="text" name="pQty"  value="<?php echo htmlspecialchars($_SESSION['ProdCache'][3] ?? '', ENT_QUOTES); ?>">


    <input type="file" id="fileInput" name="profileImage" accept="image/*" required  value="<?php echo htmlspecialchars($_SESSION['ProdCache'][4] ?? '', ENT_QUOTES); ?>">

    <button class="btn btn-outline-success" style="width: 150px;" type="">Add</button>
</form>

</body>

</html>