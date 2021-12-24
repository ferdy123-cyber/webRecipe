<?php
    $key = $_GET['key'];
    $url = "https://masak-apa-tomorisakura.vercel.app/api/recipe/$key";
    $data = file_get_contents($url);
    $detailRecipe = json_decode($data, true);
    $url2 = "https://masak-apa-tomorisakura.vercel.app/api/recipes-length/?limit=5";
    $data2 = file_get_contents($url2);
    $newRecipe = json_decode($data2, true);
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
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark shadow" style="margin-bottom: 20px;">
        <div class="container-fluid" style="width: 95%; max-width: 1100px">
            <a class="navbar-brand" style="margin-right: 80px;" href="#">
                <img width="50px" src="../../image/masakapahariini-logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/web/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/web/resep">Resep</a>
                    </li>
                </ul>
                <form class="d-flex search" action="/web/cari-resep">
                    <input name='key' class="form-control me-2" type="search" placeholder="Cari resep"
                        aria-label="Search">
                    <button class="btn btn-success" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="content-recipe-bycategory row">
        <div class="left-content col-lg-8" style="padding-top: 110px; text-align:center; ">
            <p class="detail-recipe-title"><?php echo $detailRecipe['results']['title'] ?></p>
            <div class="detail" style="font-size: 16px;">
                <i class="bi bi-alarm-fill"></i>
                <span><?php echo $detailRecipe['results']['times'] ?></span>
                <i style="font-size: 18px;" class="bi bi-person-fill"></i>
                <span><?php echo $detailRecipe['results']['servings'] ?></span>
                <i class="bi bi-bar-chart-line-fill"></i>
                <span><?php echo $detailRecipe['results']['dificulty'] ?></span>
            </div>
            <div class="author">
                <span><?php echo $detailRecipe['results']['author']['user'] ?></span> |
                <span><?php echo $detailRecipe['results']['author']['datePublished'] ?></span>
            </div>
            <div class="img-detail">
                <img src="<?php echo $detailRecipe['results']['thumb'] ?>">
            </div>
            <p class='detail-desc'><?php echo $detailRecipe['results']['desc'] ?></p>
            <p style="font-size: 30px; margin-top:20px; font-weight:600">Bahan bahan</p>
            <div class="needItem row">
                <?php foreach($detailRecipe['results']['needItem'] as $data) {?>
                <div class="col-12 item d-flex justify-content-center align-items-center">
                    <img src='<?php echo $data['thumb_item'] ?>'>
                    <div class="need-title text-start">
                        <p style="font-size: 13px;">Yang diperlukan:</p>
                        <p style="font-size: 18px; font-weight : 600"><?php echo $data['item_name'] ?></p>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="ingredient row">
                <p style="font-size: 24px; color:#0f5b86; font-weight:700; opacity: 0.8; text-align: left">Bahan</p>
                <?php foreach($detailRecipe['results']['ingredient'] as $data) {?>
                <div class="col-md-6 list-ingredient">
                    <div class="d-flex">
                        <i class="bi bi-arrow-right-short"></i>
                        <p style="font-weight: 600; margin-left:5px; color: #262729;"><?php echo $data ?></p>
                    </div>
                </div>
                <?php }?>
            </div>
            <p style="font-size: 30px; margin-top:20px; font-weight:600">Cara membuat</p>
            <div class="step row">
                <?php foreach($detailRecipe['results']['step'] as $data) {?>
                <div class="col-md-12 list-ingredient">
                    <div class="d-flex">
                        <i class="bi bi-circle-fill" style="font-size: 16px; font-weight: 500; color:#0f5b86;"></i>
                        <p
                            style="font-size: 18px; margin-left:15px; color: #262729; width: calc(100% - 34px);word-wrap: break-word;">
                            <?php echo $data ?></p>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="right-content col-lg-4" style="margin-top: 30px;">
            <p class="title-right">Resep terbaru</p>
            <?php foreach($newRecipe['results'] as $data) {?>
            <div class="new-recipes-ads d-flex justify-content-start align-items-center">
                <img src="<?php echo $data['thumb'] ?>" style="object-fit: cover;">
                <a href="/web/resep/detail?key=<?php echo $data['key']?>"><?php echo $data['title'] ?></a>
            </div>
            <?php }?>
        </div>
    </div>
    <div style="padding-top: 20px;" class="footer">
        <p>Nama anggota kelompok : </p>
        <div class="d-flex justify-content-center">
            <li>Ferdyfian Yohan Aziizul Alfandy</li>
            <li>Elnita Zebua</li>
            <li>Lailatul Azkiyah</li>
        </div>
        <a href="https://github.com/tomorisakura/unofficial-masakapahariini-api"><i class="bi bi-github"></i></a>
        <div class="d-flex justify-content-center mb-3">
            <a href="/web/beranda">
                <li style="margin-right: 30px; font-size: 14px">Beranda</li>
            </a>
            <a href="/web/resep">
                <li style="margin-right: 30px; font-size: 14px">Resep</li>
            </a>
        </div>
        <img style="margin-bottom: 10px;" src="../../image/unilever-logo.png" width="50px" height="50px">
        <span style="font-size: 14px;">Copyright 2021 Unilever</span>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>