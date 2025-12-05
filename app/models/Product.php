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

public function product($ProData){

  $stmt =  $this->pdo->prepare("INSERT INTO `product`(name, description , price, qty, user_id)
   VALUES (:productName,:productDes,:productPrice,:productQty,:id)");

  return $stmt->execute([
            ':productName'  => $ProData['pName'],
            ':productDes' => $ProData['pDes'],
            ':productPrice' => $ProData['pPrice'],
            ':productQty' => $ProData['pQty'],
            ':id' => $ProData['id']
        ]);



}

}
