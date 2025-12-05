<?php
session_start();

require_once __DIR__ . "/../models/User.php";

class UserController
{

    public function registerForm()
    {
        require_once __DIR__ . "/../views/pages/register.php";
    }

    public function registerUser()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new User();
            $errors = [];

            $firstName   = trim($_POST['firstName']);
            $lastName    = trim($_POST['lastName']);
            $email       = trim($_POST['email']);
            $password    = trim($_POST['password']);
            $phoneNumber = trim($_POST['phoneNumber']);
            $gender      = trim($_POST['gender']);
            $address     = trim($_POST['address']);



            if (empty($firstName)) {
                $errors[] = "Enter First Name";
            } elseif (empty($lastName)) {
                $errors[] = "Enter Last Name";
            } elseif (empty($email)) {
                $errors[] = "Enter email";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email";
            } elseif ($user->checkEmailExits($email)) {
                $errors[] = "This email is alrady taken";
            } elseif (empty($password)) {
                $errors[] = "Enter Password";
            } elseif (strlen($password) < 6) {
                $errors[] = "Password must be at least 6 charecter long ";
            } elseif (empty($phoneNumber)) {
                $errors[] = "Enter Phon Number";
            } elseif (!preg_match('/^[0-9]{10}$/', $phoneNumber)) {
                $errors[] = "Phone Number must be 10 digits";
            } elseif (empty($gender)) {
                $errors[] = "Gender is required";
            } elseif (empty($address)) {
                $errors[] = "Address is required";
            }

            if (!empty($errors)) {

                $cache = [$firstName, $lastName, $email, $password, $phoneNumber, $gender];
                $_SESSION['RegCache'] = $cache;

                $_SESSION['errors'] = $errors;
                header("Location: /register");
                exit();
            }

            $saved = $user->create([
                "firstName"   => $firstName,
                "lastName"    => $lastName,
                "email"       => $email,
                "password"    => $password,
                "phoneNumber" => $phoneNumber,
                "gender"      => $gender,
                "address"     => $address
            ]);

            $newUser = $user->getUserByEmail($email);
            $_SESSION['user'] =  [
                'id' => $newUser['id'],
                'firstName' => $newUser['firstName'],
                'lastName' => $newUser['lastName'],
                'email' => $newUser['email'],
                'password' => $newUser['password'],
                'phoneNumber' => $newUser['phoneNumber'],
                'gender' => $newUser['gender'],
                'address' => $newUser['address']

            ];


            if ($saved) {
                header("Location: /logIn");
                exit();
            }
        }
    }

    public function logInForm()
    {
        require_once __DIR__ . "/../views/pages/logIn.php";
    }


    public function logUser()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $user = new User();
            $errors = [];

            $email = trim($_GET['email']);
            $password =  trim($_GET['password']);
            //  $hashPw = password_hash($password, PASSWORD_BCRYPT);
            $newUser = $user->getUserByEmail($email);

            if (empty($email)) {
                $errors[] = "Enter Email";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid Email";
            } elseif (!$user->checkEmailExits($email)) {
                $errors[] = "Email not found. Please register First";
            } elseif (empty($password)) {
                $errors[] = "Enter Password ";
            } // elseif ($user->checkPassword($password) == $hashPw) {
            //     $errors[] = "wrong Password";
            // }

            if (!empty($errors)) {

                $cache = [$email, $password];
                $_SESSION['LogCache'] = $cache;
                $_SESSION['LogErrors'] = $errors;
                header("Location: /logIn");
                exit();
            }

            $saved = $user->logIn([
                "email" => $email,
                "password"    => $password,
            ]);



            $_SESSION['user'] =  [
                'id' => $newUser['id'],
                'firstName' => $newUser['firstName'],
                'lastName' => $newUser['lastName'],
                'email' => $newUser['email'],
                'password' => $newUser['password'],
                'phoneNumber' => $newUser['phoneNumber'],
                'gender' => $newUser['gender'],
                'address' => $newUser['address']

            ];

            if ($saved) {
                header("Location: /");
                exit();
            }
        }
    }


    public function logoutForm()
    {
        require_once __DIR__ . "/../views/pages/logout.php";
    }

    public function logoutUser()
    {
        if (isset($_SESSION['user'])) {
            session_destroy();
            header("Location: /");
            exit();
        }
    }

    public function deleteForm()
    {
        require_once __DIR__ . "/../views/pages/delete.php";
    }

    public function deleteUser()
    {

        $user = new User();
        $userId = $_SESSION['user']['id'];

        $saved = $user->delete([
            "id" => $userId
        ]);

        if ($saved) {
            session_unset();
            session_destroy();
            header("Location: /");
            exit();
        }
    }

    public function profile()
    {
        require_once __DIR__ . "/../views/pages/profile.php";
    }

    public function updateUser()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userId = $_SESSION['user']['id'];
            $user = new User();

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];

            $saved = $user->update([

                "id" => $userId,
                "firstName"   => $firstName,
                "lastName"    => $lastName,
                "email"       => $email,
                "phoneNumber" => $phoneNumber,
                "gender"      => $gender,
                "address"     => $address

            ]);

            [
                $_SESSION['user']['firstName'] = $firstName,
                $_SESSION['user']['lastName'] = $lastName,
                $_SESSION['user']['email'] = $email,
                $_SESSION['user']['phoneNumber'] = $phoneNumber,
                $_SESSION['user']['address'] = $address,
                $_SESSION['user']['gender'] = $gender,
            ];

            if ($saved) {
                header("Location: /profile");
                exit();
            } 
        }
    }
}
