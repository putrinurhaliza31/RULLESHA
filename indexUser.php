<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko RULLESHA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <?php require "navbar.php"; ?> 
    
    <!--banner-->
    <div class="container-fluid untukbanner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1 class="font">RULLESHA</h1>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="detail.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Sepatu" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn color1 text-white font">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--highlighted kategori-->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3 class="font"><strong>SEPATU TERLARIS</strong></h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="untukhighlighted sep1 d-flex justify-content-center">
                        <h4 class="font"><a class="no-decoration" href="detail.php?hal=detail&id=13">SNEAKERS VARKA V 655 </a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="untukhighlighted sep2 d-flex justify-content-center">
                        <h4 class="font"><a class="no-decoration" href="detail.php?hal=detail&id=14">SNEAKERS SPORT PVN 058</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="untukhighlighted sep4 d-flex justify-content-center">
                        <h4 class="font"><a class="no-decoration" href="detail.php?hal=detail&id=21">SNEAKERS SPORT PVN BLACK 113 </a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--tentang kami-->
    <div class="container-fluid color4 py-5">
        <div class="container text-center">
            <h3 class="text-white font">Tentang Kami</h3>
            <p class="fs-5 mt-3 font">
            Halo sahabat yang luar biasa, pada kesempatan kali ini izinkan kami dari Toko RULLESHA untuk memperkenalkan diri. Mudah-mudahan dengan adanya perkenalan ini sahabat-sahabat sekalian akan lebih senang berbelanja di toko ini.Sungguh terhormat bagi kami, jika Anda datang ke toko ini dan bisa memperoleh banyak hal yang bermanfaat. Toko RULLESHA adalah sebuah toko yang menyediakan produk sepatu.  Keberadaan dari toko ini diharapkan dapat mempermudah Anda untuk mendapatkan berbagai produk berkualitas tinggi namun dengan harga yang terjangkau.
            </p>
        </div>
    </div>


    <!--produk-->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3 class="font"><strong>PRODUK</strong></h3>
            <div class="row mt-5">
                <div class=" col-sm-6 col-md-4 mb-3">
                   <div class="card">
                        <img src="foto/3eef38a4409f0ce4dcf4a33bb098209a-sepatu1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font"><strong>SNEAKERS VARKA V 655</strong></h5>
                            <p class="card-text text-truncate font">Sepatu Sneakers V 655 ini merupakan salah satu keluaran terbaru dari brand Varka, sangat cocok untuk jalan-jalan, olahraga, kuliah, ataupun aktifitas seharian ketika diluar ruangan. Sepatu ini didesain untuk bisa dipakai dalam berbagai kegiatan. Sepatu ini sangat nyaman dipakai dan tidak licin,juga dapat menunjang penampilan anda agar anda semakin terlihat Fashionable dan lebih percayadiri.</p>
                            <p class="card-text font harga">Rp 113000</p>
                            <a href="detail.php?hal=detail&id=13" class="btn color4">Detail</a>
                        </div>
                   </div> 
                </div>
                <div class=" col-sm-6 col-md-4 mb-3">
                   <div class="card">
                        <img src="foto/74ab52ed29ea051dbd976d69e81470b9-sepatu2.jpg" class="card-img-top"  alt="...">
                        <div class="card-body">
                            <h5 class="card-title font"><strong>SNEAKERS SPORT PVN 058</strong></h5>
                            <p class="card-text text-truncate font">PVN sneakers adalah sepatu sneakers yang nyaman di gunakan untuk jalan-jalan, untuk kuliah dll. Sneakers merupakan sepatu casual yang menarik untuk dijadi koleksi dengan berbagai jenis dan motif yang beragam.</p>
                            <p class="card-text font harga">Rp 232000</p>
                            <a href="detail.php?hal=detail&id=14" class="btn color4">Detail</a>
                        </div>
                   </div> 
                </div>
                <div class=" col-sm-6 col-md-4 mb-3">
                   <div class="card">
                        <img src="foto/94187472f531dbc476572803e4f5b446-sepatu4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font"><strong>SNEAKERS SPORT PVN BLACK 113</strong></h5>
                            <p class="card-text text-truncate font">PVN sneakers adalah sepatu sneakers yang nyaman di gunakan untuk jalan-jalan, untuk kuliah dll. Sneakers merupakan sepatu casual yang menarik untuk dijadi koleksi dengan berbagai jenis dan motif yang beragam.</p>
                            <p class="card-text font harga">Rp 220000</p>
                            <a href="detail.php?hal=detail&id=21" class="btn color4">Detail</a>
                        </div>
                   </div> 
                </div>
                <div class=" col-sm-6 col-md-4 mb-3">
                   <div class="card">
                        <img src="foto/3eef38a4409f0ce4dcf4a33bb098209a-sepatu1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title font">SEPATU SNEAKERS VARKA V 655 </h4>
                            <p class="card-text text-truncate font">Sepatu Sneakers V 655 ini merupakan salah satu keluaran terbaru dari brand Varka, sangat cocok untuk jalan-jalan, olahraga, kuliah, ataupun aktifitas seharian ketika diluar ruangan. Sepatu ini didesain untuk bisa dipakai dalam berbagai kegiatan. Sepatu ini sangat nyaman dipakai dan tidak licin,juga dapat menunjang penampilan anda agar anda semakin terlihat Fashionable dan lebih percayadiri.</p>
                            <p class="card-text font harga">Rp 113000</p>
                            <a href="detail.php?hal=detail&id=13" class="btn color4">Detail</a>
                        </div>
                   </div> 
                </div>
                <div class=" col-sm-6 col-md-4 mb-3">
                   <div class="card">
                        <img src="foto/3eef38a4409f0ce4dcf4a33bb098209a-sepatu1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title font">SEPATU SNEAKERS VARKA V 655 </h4>
                            <p class="card-text text-truncate font">Sepatu Sneakers V 655 ini merupakan salah satu keluaran terbaru dari brand Varka, sangat cocok untuk jalan-jalan, olahraga, kuliah, ataupun aktifitas seharian ketika diluar ruangan. Sepatu ini didesain untuk bisa dipakai dalam berbagai kegiatan. Sepatu ini sangat nyaman dipakai dan tidak licin,juga dapat menunjang penampilan anda agar anda semakin terlihat Fashionable dan lebih percayadiri.</p>
                            <p class="card-text font harga">Rp 113000</p>
                            <a href="detail.php?hal=detail&id=13" class="btn color4">Detail</a>
                        </div>
                   </div> 
                </div>
                <div class=" col-sm-6 col-md-4 mb-3">
                   <div class="card">
                        <img src="foto/3eef38a4409f0ce4dcf4a33bb098209a-sepatu1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title font">SEPATU SNEAKERS VARKA V 655 </h4>
                            <p class="card-text text-truncate font">Sepatu Sneakers V 655 ini merupakan salah satu keluaran terbaru dari brand Varka, sangat cocok untuk jalan-jalan, olahraga, kuliah, ataupun aktifitas seharian ketika diluar ruangan. Sepatu ini didesain untuk bisa dipakai dalam berbagai kegiatan. Sepatu ini sangat nyaman dipakai dan tidak licin,juga dapat menunjang penampilan anda agar anda semakin terlihat Fashionable dan lebih percayadiri.</p>
                            <p class="card-text font harga">Rp 113000</p>
                            <a href="detail.php?hal=detail&id=13" class="btn color4">Detail</a>
                        </div>
                   </div> 
                </div>
                <div class=" col-sm-6 col-md-4 mb-3">
                   <div class="card">
                        <img src="foto/3eef38a4409f0ce4dcf4a33bb098209a-sepatu1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title font">SEPATU SNEAKERS VARKA V 655 </h4>
                            <p class="card-text text-truncate font">Sepatu Sneakers V 655 ini merupakan salah satu keluaran terbaru dari brand Varka, sangat cocok untuk jalan-jalan, olahraga, kuliah, ataupun aktifitas seharian ketika diluar ruangan. Sepatu ini didesain untuk bisa dipakai dalam berbagai kegiatan. Sepatu ini sangat nyaman dipakai dan tidak licin,juga dapat menunjang penampilan anda agar anda semakin terlihat Fashionable dan lebih percayadiri.</p>
                            <p class="card-text font harga">Rp 113000</p>
                            <a href="detail.php?hal=detail&id=13" class="btn color4">Detail</a>
                        </div>
                   </div> 
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/js/all.min.js"></script>
</body>
</html>