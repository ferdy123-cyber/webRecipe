<?php 
    $key= $_GET['key'];
    $url = "https://masak-apa-tomorisakura.vercel.app/api/search/?q=$key";
    $data = file_get_contents($url);
    $result = json_decode($data, true);
    
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
                        <a class="nav-link" aria-current="page" href="/Project_Akhir/beranda">Beranda</a>
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
    <div class="contentSearch" style="padding-top: 95px;">
        <p style="font-size: 38px;font-weight:600; margin-left:10px">Hasil untuk <span
                style='color: #1a7db6;'><?php echo $key ?></span>
        </p>
        <div class="left-content row">
            <?php foreach($result['results'] as $data) {?>
            <a href="/Project_Akhir/resep/detail?key=<?php echo $data['key']?>"
                class="recipes col-12 col-lg-4 col-sm-6">
                <img class="img-newRecipe" src=" <?php echo $data['thumb'] ?>">
                <div class="detail">
                    <i class="bi bi-alarm-fill"></i>
                    <span><?php echo $data['times'] ?></span>
                    <i style="font-size: 14px;" class="bi bi-person-fill"></i>
                    <span><?php echo $data['serving'] ?></span>
                    <i class="bi bi-bar-chart-line-fill"></i>
                    <span><?php echo $data['difficulty'] ?></span>
                </div>
                <p><?php echo $data['title'] ?></p>
            </a>
            <?php }?>
        </div>
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