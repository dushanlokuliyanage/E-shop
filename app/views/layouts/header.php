<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-gradient-custom ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sysco</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Gallery</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                </ul>


                <form class="d-flex" role="search">
                    <input class="form-control-sm me-2 " style="width: 500px;" type="search" placeholder="Search" id="searchBar" aria-label="Search" />
                    <button class="btn btn-outline-success me-5 btn-sm " id="searchBtn" type="submit" style="width: 100px;">Find</button>
                </form>

                <?php
                if (!isset($_SESSION['user'])) { ?>

                    <a href="/register">
                        <button class="btn btn-outline-dark me-2 btn-sm " type="submit">Regisetr</button>
                    </a>
                    <a href="/logIn">
                        <button class="btn btn-outline-primary  btn-sm " type="submit">LogIn</button>
                    </a>


                <?php  } else {

                    $firstLet =   $_SESSION['user']['firstName'];
                    $lastLet = $_SESSION['user']['lastName'];
                ?>
                    <a href="/profile">
                        <button class="me-2 btn btn-outline-primary btn-sm" id="profileBtn"><?php echo $name =  strtoupper($firstLet[0] . $lastLet[0]); ?> </button>
                    </a>

                    <form action="/addProducts">
                        <button type="submit" class="me-2 btn btn-outline-success  btn-sm">Add Product</button>
                    </form>

                    <form action="/listProduct">
                        <button type="submit" class="me-2 btn btn-outline-primary  btn-sm">List Product</button>
                    </form>

                    <form action="/logout">
                        <button type="submit" class="me-2 btn btn-outline-dark hide btn-sm" id="logoutBtn">Logout</button>
                    </form>

                    <form action="/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
                        <button type="submit" class="me-2 btn btn-outline-danger hide btn-sm" id="deleteBtn">Delect Account</button>
                    </form>



                <?php


                }

                ?>

            </div>

        </div>

    </nav>
</body>

</html>