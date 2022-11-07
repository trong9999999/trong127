<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
</head>




<body>


  <header>
    <div class="menu container-fluid">
        <nav class="navbar navbar-expand-lg nav">
            <div class="container-fluid thanhtren">
                <img src="images/logo/logo_real.png" style="width: 150px; heigh: 200px;" alt="" id="logo">
                <a class="navbar-brand" href="trangchu.php" style="color: #357C3C ; font-weight: bold;"><i
                        class="fa-solid fa-house-chimney" style="color: #357C3Cd ;"></i>&ensp;Trang chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="sanpham.php"
                                style="color: #357C3C ; font-weight: bold;"><i
                                    class="fa-solid fa-dog"></i>&ensp;Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="lichsudonhang.php"
                                style="color: #357C3C ; font-weight: bold;"><i
                                    class="fa-solid fa-clock-rotate-left"></i>&ensp;Lịch sử
                                đơn hàng</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dangki.php"
                                style="color: #357C3C ; font-weight: bold;"><i
                                    class="fa-solid fa-registered"></i>&ensp;Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dangnhap.php"
                                style="color: #357C3C ; font-weight: bold;"><i
                                    class="fa-solid fa-right-to-bracket"></i>&ensp;Đăng nhập</a>
                        </li>


                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        <!-- <button onclick="click_cart();" class="fas fa-shopping-cart cart1"></button> -->
                    </form>
                    <a href="donhang.php">
                        <button type="button" class="btn btn-primary" style="margin-left: 10px;"> <i
                                class="fa-solid fa-cart-arrow-down"></i></button>
                    </a>
                </div>
            </div>
        </nav>

    </div>






</header>