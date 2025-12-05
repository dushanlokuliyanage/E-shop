<?php

require_once __DIR__ . "/../config/Database.php";

class Product
{

    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->setUpConn();
    }

    public function product($ProData)
    {

        $stmt =  $this->pdo->prepare("INSERT INTO `product`(name, description , price, qty, user_id, image) VALUES (:productName,:productDes,:productPrice,:productQty,:id, :image)");

        return $stmt->execute([
            ':productName'  => $ProData['pName'],
            ':productDes' => $ProData['pDes'],
            ':productPrice' => $ProData['pPrice'],
            ':productQty' => $ProData['pQty'],
            ':id' => $ProData['id'],
            ':image' => $ProData['image'],
        ]);
    }

    public function getAllProducts()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `product`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `product` WHERE `id` = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
