<?php

require_once __DIR__ . "/../config/Database.php";

class User
{

    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->setUpConn();
    }

    public function checkPassword($password)
    {
        $stmt = $this->pdo->prepare("SELECT `password` FROM `user` WHERE `id` = :id");
        $stmt->execute([
            $password

        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function checkEmailExits($email)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM `user` WHERE `email` = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($userData)
    {
        $stmt =  $this->pdo->prepare("INSERT INTO `user`(firstName, lastName, email, password, phoneNumber, gender, address) VALUES (:firstName,:lastName,:email,:password,:phoneNumber, :gender, :address)");

        return $stmt->execute([
            ':firstName'  => $userData['firstName'],
            ':lastName' => $userData['lastName'],
            ':email' => $userData['email'],
            ':password' => password_hash($userData['password'], PASSWORD_BCRYPT),
            ':phoneNumber' => $userData['phoneNumber'],
            ':gender' =>  $userData['gender'],
            ':address' => $userData['address']
        ]);
    }

    public function logIn($userData)
    {
        $stmt = $this->pdo->prepare("SELECT `password` FROM `user` WHERE `email` = :email");
        $stmt->execute([':email' => $userData['email']]);
        $user =  $stmt->fetch(PDO::FETCH_ASSOC);


        if ($user && password_verify($userData['password'], $user['password'])) {

            return $user;
        }

        return false;
    }

    public function delete($userData)
    {
        $sql = "DELETE FROM `user` WHERE `id` = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $userData['id']);
        return $stmt->execute();
    }

    public function update($userData)
    {
        $stmt = $this->pdo->prepare("UPDATE `user` SET `firstName` = ? , `lastName`=?, `email`=?, `phoneNumber`=?, `gender`=? , `address`=? WHERE `id` = ? ");

        return $stmt->execute([
            $userData['firstName'],
            $userData['lastName'],
            $userData['email'],
            $userData['phoneNumber'],
            $userData['gender'],
            $userData['address'],
            $userData['id'],

        ]);
    }
}
