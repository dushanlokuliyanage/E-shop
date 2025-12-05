
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>

<body>

    <div class="container mt-4">
        <h3>Product List</h3>
        <hr>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th>QTY</th>
                    <th>PRICE</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr onclick="window.location='/singleProduct?id=<?= $product['id'] ?>';" style="cursor:pointer;" >

                    
                        <td>
                            <img src="/assets/images/<?= htmlspecialchars($product['image']) ?>"  width="80" height="80"  style="object-fit: cover; border-radius: 5px;">
                        </td>

                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['description']) ?></td>
                        <td><?= htmlspecialchars($product['qty']) ?></td>
                        <td>Rs.<?= htmlspecialchars($product['price']) ?>/-</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</body>
</html>
