<?php include "layout/header.php";?>

    <table class="table table-color" style="width: 50%; margin: 30px auto;">
        <thead>
        <tr style="font-size: 20px">
            <th>Image</th>
            <th> # </th>
            <th> Name </th>
            <th>Price</th>
            <th> Stock </th>

            <th></th>
        </tr>
        </thead>
        <tbody style="">
        <?php foreach($liste as $urun) {?>
            <tr style="font-size: 20px">
                <td><img src="/asset/img/product-1.jpg"style="height: 60px;" alt=""></td>
                <td ><?php echo $urun['id'];?></td>
                <td><?php echo $urun['name'];?></td>
                <td><?php echo $urun['price'];?></td>
                <td><?php echo $urun['stock'];?></td>
                <td>
                    <a href="/urundetay?id=<?php echo $urun['id']?>">Detay</a>


                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php include "layout/footer.php";?>










    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">

                            <?php foreach($liste as $urun) {?>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="/asset/img/product-1.jpg" alt="">
                                    <div class="product-hover">
                                        <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Sepete Ekle</a>
                                        <a href="detay.php" class="view-details-link"><i class="fa fa-link"></i> Detayları Gör</a>
                                    </div>
                                </div>

                                <h2><a href="single-product.php"><?php echo $urun['name'];?></a></h2>

                                <div class="product-carousel-price">
                                    <ins><?php echo $urun['price'];?></ins>
                                </div>
                            </div>
                            <?php }?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->




