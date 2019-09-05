<?php include "layout/header.php";?>
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container" style="background-color: white;padding-bottom: 50px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title" style="padding-top: 50px"><?=$kategori->name?></h2>
                        <?php foreach($liste as $urun) {
                                ?>
                                <div class="single-product" style="float: left;margin-top: 20px">
                                    <div class="product-f-image">
                                        <img class="copyurunimg copyurunimg_<?php echo $urun['id']?>" style="width: 226px;height: 282px" src='/asset/images/<?php echo $urun['image']?>'>
                                        <div class="product-hover">
                                                <a style="background-color: rgb(70,70,70)" class="view-details-link" href="/urundetay/<?php echo $urun['slug']?>"><i class="fa fa-link"></i>DETAY></a>
                                                                              </div>
                                    </div>

                                    <h2><a id="animate" href="single-product.php"><?php echo $urun['name'];?></a></h2>
                                    <div class="product-carousel-price">
                                        <ins><?php echo $urun['price']?> &#8378 </ins>
                                        <button name="button" type="submit" onclick="return addBasket('<?php echo $urun['id']?>',this);" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Sepete Ekle</button>
                                    </div>
                                </div>

                            <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addBasket(urun_id,btn_elm) {
            $.post("/addbasket?id="+urun_id,{quantity:1},function (json) {
                data = JSON.parse(json);
                if(data.status == 1){
                    $(".cart-amunt").html(data.total_price + " ₺");
                    $(".product-count").html(data.total_product);
                    moveText(btn_elm);
                }
            }).done(function (data) {
                // window.location = "";
            })
        }
    </script>


    <script>
        function moveText(btn_elm){

            //Scroll to top if cart icon is hidden on top
            $('html, body').animate({
                'scrollTop' : $(".cart-amunt").position().top
            });
            urun_img = $(btn_elm).parent().parent().find(".copyurunimg");
            flyToElement(urun_img, $(".cart-amunt"));

        }

        function flyToElement(flyer, flyingTo) {
            var $func = $(this);
            var divider = 3;
            var flyerClone = $(flyer).clone();
            console.log($(flyer).offset().top,$(flyer).offset().left);
            $(flyerClone).css({position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000});
            $('body').append($(flyerClone));

            var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width()/divider)/2;
            var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height()/divider)/2;
            // setInterval();
            $(flyerClone).animate({
                    opacity: 0.4,
                    left: gotoX,
                    top: gotoY,
                    width: $(flyer).width()/divider,
                    height: $(flyer).height()/divider
                }, 700,
                function () {
                    $(flyingTo).fadeOut('fast', function () {
                        $(flyingTo).fadeIn('fast', function () {
                            $(flyerClone).fadeOut('fast', function () {
                                $(flyerClone).remove();
                            });
                        });
                    });
                }
            );

        }

    </script>

<?php include "layout/footer.php";?>