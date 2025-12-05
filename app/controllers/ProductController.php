<?php

require_once __DIR__ . "/../models/Product.php";

class ProductController
{

    public function productForm()
    {
        require_once __DIR__ . "/../views/pages/addProducts.php";
    }

    public function product()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userId = $_SESSION['user']['id'];
            $prod = new Product();
            $errors = [];

            $productName = trim($_POST['pName']);
            $productDes = trim($_POST['des']);
            $productPrice = trim($_POST['pPrice']);
            $qty = trim($_POST['pQty']);

            //   $imageName = $_FILES['profileImage']['name'];
            //  $tmpName = $_FILES['profileImage']['tmp_name'];

            if (empty($productName)) {
                $errors[] = "Enter Your Product Name";
            } elseif (empty($productDes)) {
                $errors[] = "Enter Your Product Description ";
            } elseif (empty($productPrice)) {
                $errors[] = "Enter your Product Price";
            } elseif (empty($qty)) {
                $errors[] = "Enter your Product Qty";
            }

            if (!empty($errors)) {

                //  $cache = [$email, $password];
                //   $_SESSION['LogCache'] = $cache;
                $_SESSION['ProductErrors'] = $errors;
                header("Location: /addProducts");
                exit();
            }

            $saved = $prod->product([
                "id" => $userId,
                "pName"    => $productName,
                "pDes"    => $productDes,
                "pPrice"    => $productPrice,
                "pQty"    => $qty,

            ]);

            if ($saved) {
                header("Location: /");
                exit();
            }
        }
    }
}
