<?php
    $chategory = [
        [
            "category" => "Dessert",
            "thumb" => "https://www.masakapahariini.com/wp-content/uploads/2021/04/shutterstock_1890524233-780x600.jpg",
            "key" => "resep-dessert",
            "dekstop-thumb"=> "https://www.masakapahariini.com/wp-content/uploads/2021/04/shutterstock_1890524233-1000x250.jpg",
        ],
        [
            "category" => "Masakan hari raya",
            "thumb" => "https://www.masakapahariini.com/wp-content/uploads/2018/04/menu-hari-raya-780x600.jpg",
            "key" => "masakan-hari-raya",
            "dekstop-thumb"=> "https://www.masakapahariini.com/wp-content/uploads/2018/04/menu-hari-raya-1920x250.jpg",
        ],
        [
            "category" => "Masakan tradisional",
            "thumb" => "https://www.masakapahariini.com/wp-content/uploads/2018/04/masakan-tradisional-780x600.jpg",
            "key" => "masakan-tradisional",
            "dekstop-thumb"=> "https://www.masakapahariini.com/wp-content/uploads/2018/04/masakan-tradisional-1920x250.jpg"
        ],
        [
            "category" => "Makan malam",
            "thumb" => "https://www.masakapahariini.com/wp-content/uploads/2018/04/makan-malam-780x600.jpg",
            "key" => "makan-malam",
            "dekstop-thumb"=> "https://www.masakapahariini.com/wp-content/uploads/2018/04/makan-malam-1920x250.jpg"
        ],
        [
            "category" => "Menu makan siang",
            "thumb" => "https://www.masakapahariini.com/wp-content/uploads/2018/04/makan-siang-780x600.jpg",
            "key" => "makan-siang",
            "dekstop-thumb"=> "https://www.masakapahariini.com/wp-content/uploads/2018/04/makan-siang-1920x250.jpg"
        ],
        [
            "category" => "Resep ayam",
            "thumb" => "https://www.masakapahariini.com/wp-content/uploads/2018/04/resep-ayam-780x600.jpg",
            "key" => "resep-ayam",
            "dekstop-thumb"=> "https://www.masakapahariini.com/wp-content/uploads/2018/04/resep-ayam-1920x250.jpg"
        ],
        [
            "category" => "Resep daging",
            "thumb" => "https://www.masakapahariini.com/wp-content/uploads/2018/04/resep-daging-780x600.jpg",
            "key" => "resep-daging",
            "dekstop-thumb"=> "https://www.masakapahariini.com/wp-content/uploads/2018/04/resep-daging-1920x250.jpg"
        ],
        [
            "category" => "Resep sayuran",
            "thumb" => "https://www.masakapahariini.com/wp-content/uploads/2018/04/resep-sayuran-780x600.jpg",
            "key" => "resep-sayuran",
            "dekstop-thumb"=> "https://www.masakapahariini.com/wp-content/uploads/2018/04/resep-sayuran-1920x250.jpg"
        ],
        [
            "category" => "Resep seafood",
            "thumb" => "https://www.masakapahariini.com/wp-content/uploads/2018/04/resep-seafood-780x600.jpg",
            "key" => "resep-seafood",
            "dekstop-thumb"=> "https://www.masakapahariini.com/wp-content/uploads/2018/04/resep-seafood-1920x250.jpg"
        ]
    ];

    $url = 'https://masak-apa-tomorisakura.vercel.app/api/recipes';
    $data = file_get_contents($url);
    $newRecipe = json_decode($data, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark shadow" style="margin-bottom: 20px;">
        <div class="container-fluid" style="width: 95%; max-width: 1100px">
            <a class="navbar-brand" style="margin-right: 80px;" href="#">
                <img width="50px" src="../image/masakapahariini-logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Project_Akhir/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_Akhir/resep">Resep</a>
                    </li>
                </ul>
                <form class="d-flex search" action="/Project_Akhir/cari-resep">
                    <input name='key' class="form-control me-2" type="search" placeholder="Cari resep"
                        aria-label="Search">
                    <button class="btn btn-success" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <p style="padding-top: 80px;" class="text-center title-category">Telusuri berdasarkan</p>
    <div class="chategory row justify-content-center">
        <?php foreach($chategory as $data) {?>
        <a href="/Project_Akhir/resep/kategori?key=<?php echo $data['key']?>&thumb=<?php echo $data['dekstop-thumb']?>&category=<?php echo $data['category']?>"
            class="box col-12 col-lg-4 col-sm-6">
            <img class="img-chategory" src=" <?php echo $data['thumb'] ?>">
            <div class="text-category"><?php echo $data['category'] ?></div>
        </a>
        <?php }?>
    </div>
    <p class="text-center title-newRecipe">Resep terbaru</p>
    <div class="newRecipe row justify-content-center">
        <?php foreach($newRecipe['results'] as $data) {?>
        <a href="/Project_Akhir/resep/detail?key=<?php echo $data['key']?>" class="recipes col-12 col-lg-4 col-sm-6">
            <img class="img-newRecipe" src=" <?php echo $data['thumb'] ?>">
            <div class="detail">
                <i class="bi bi-alarm-fill"></i>
                <span><?php echo $data['times'] ?></span>
                <i style="font-size: 14px;" class="bi bi-person-fill"></i>
                <span><?php echo $data['portion'] ?></span>
                <i class="bi bi-bar-chart-line-fill"></i>
                <span><?php echo $data['dificulty'] ?></span>
            </div>
            <p><?php echo $data['title'] ?></p>
        </a>
        <?php }?>
    </div>
    <div class="footer">
        <p>Nama anggota kelompok : </p>
        <div class="d-flex justify-content-center">
            <li>Ferdyfian Yohan Aziizul Alfandy</li>
            <li>Elnita Zebua</li>
            <li>Lailatul Azkiyah</li>
        </div>
        <a href="https://github.com/tomorisakura/unofficial-masakapahariini-api"><i class="bi bi-github"></i></a>
        <div class="d-flex justify-content-center mb-3">
            <a href="/Project_Akhir/beranda">
                <li style="margin-right: 30px; font-size: 14px">Beranda</li>
            </a>
            <a href="/Project_Akhir/resep">
                <li style="margin-right: 30px; font-size: 14px">Resep</li>
            </a>
        </div>
        <img style="margin-bottom: 10px;" src="../image/unilever-logo.png" width="50px" height="50px">
        <span style="font-size: 14px;">Copyright 2021 Unilever</span>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>