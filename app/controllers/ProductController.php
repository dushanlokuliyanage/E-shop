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

            $imageName = $_FILES['profileImage']['name'];
            $tmpName = $_FILES['profileImage']['tmp_name'];

            if (empty($productName)) {
                $errors[] = "Enter Your Product Name";
            } elseif (empty($productDes)) {
                $errors[] = "Enter Your Product Description ";
            } elseif (empty($productPrice)) {
                $errors[] = "Enter your Product Price";
            } elseif (empty($qty)) {
                $errors[] = "Enter your Product Qty";
            } elseif (empty($imageName)) {
                $errors[] = "Insert your Imges";
            }

            if (!empty($errors)) {

                $cache = [$productName, $productDes, $productPrice, $qty, $imageName];
                $_SESSION['ProdCache'] = $cache;
                $_SESSION['ProductErrors'] = $errors;
                header("Location: /addProducts");
                exit();
            }

            $new_name = uniqid() . "_" . $imageName;

            $uploadPath = __DIR__ . "/../../public/assets/images/" . $new_name;
            move_uploaded_file($tmpName, $uploadPath);

            $saved = $prod->product([
                "id" => $userId,
                "pName"    => $productName,
                "pDes"    => $productDes,
                "pPrice"    => $productPrice,
                "pQty"    => $qty,
                "image" => $new_name,
            ]);

            if ($saved) {
                header("Location: /");
                exit();
            }
        }
    }

    public function productView()
    {

        if (!isset($_SESSION['user']['id'])) {
            die("User not logged in");
        }

        $userId = $_SESSION['user']['id'];

        $prod = new Product();
        $products = $prod->getProductsByUserId($userId);
        require_once __DIR__ . "/../views/pages/listProduct.php";
    }

    public function singleProductView()
    {
        if (!isset($_GET['id'])) {
            die("ID is missing");
        }

        $productId = $_GET['id'];
        $prod = new Product();
        $product = $prod->getProductById($productId);

        if (!$product) {
            die("Product not found");
        }

        require_once __DIR__ . "/../views/pages/singleProduct.php";
    }


    public function updateProdutDatails()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $productId = trim($_POST['Productid']);
            $prod = new Product();

            $productName = trim($_POST['name']);
            $productDes = trim($_POST['des']);
        

            $imageName = $_FILES['UpdateImage']['name'];
            $tmpName = $_FILES['UpdateImage']['tmp_name'];
            $new_name = uniqid() . "_" . $imageName;

            $uploadPath = __DIR__ . "/../../public/assets/images/" . $new_name;
            move_uploaded_file($tmpName, $uploadPath);


            $qty = preg_replace('/\D/', '', $_POST['qty']);

            $price = preg_replace('/\D/', '', $_POST['price']);

            $saved = $prod->updateProduct([
                "id" => $productId,
                "name" => $productName,
                "des" => $productDes,
                "qty" => (int)$qty,
                "price" => (int)$price,
                "image" => $new_name,
            ]);

            if ($saved) {
                header("Location: /singleProduct?id=" . $productId);

                exit();
            }
        }
    }
}
