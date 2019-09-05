<?php include "layout/header.php"; ?>


<style>

    body {
        overflow-x: hidden;
    }

    img {
        max-width: 100%;
    }

    .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px;
        }
    }

    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px;
    }

    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%;
    }

    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block;
    }

    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0;
    }

    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0;
    }

    .tab-content {
        overflow: hidden;
    }

    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
    }

    .card {
        margin-top: 50px;
        background: #eee;
        padding: 3em;
        line-height: 1.5em;
    }

    @media screen and (min-width: 997px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }
    }

    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .product-title, .price, .sizes, .colors {
        text-transform: UPPERCASE;
        font-weight: bold;
    }

    .checked, .price span {
        color: #ff9f1a;
    }

    .product-title, .rating, .product-description, .price, .vote, .sizes {
        margin-bottom: 15px;
    }

    .product-title {
        margin-top: 0;
    }

    .size {
        margin-right: 10px;
    }

    .size:first-of-type {
        margin-left: 40px;
    }

    .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px;
    }

    .color:first-of-type {
        margin-left: 20px;
    }

    .add-to-cart, .like {
        background: #ff9f1a;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
        transition: background .3s ease;
    }

    .add-to-cart:hover, .like:hover {
        background: #b36800;
        color: #fff;
    }

    .not-available {
        text-align: center;
        line-height: 2em;
    }

    .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff;
    }

    .rating-header {
        margin-top: -10px;
        margin-bottom: 10px;
    }


    .orange {
        background: #ff9f1a;
    }

    .green {
        background: #85ad00;
    }

    .blue {
        background: #0076ad;
    }

    .tooltip-inner {
        padding: 1.3em;
    }

    @-webkit-keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3);
        }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    @keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3);
        }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }
</style>
<div class="container" style="padding-bottom: 100px">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img
                                    class="copyurunimg copyurunimg_<?php echo $urun->id ?>"
                                    src='/asset/images/<?php echo $urun->image ?>'>
                        </div>
                    </div>

                </div>
                <div class="details col-md-6">
                    <div style="background-color:rgb(238,238,238)" class="urun_cart">
                        <h3 class="product-title"><?php echo $urun->name; ?></h3>
                    </div>
                    <div class="rating">
                        <div class="stars">
                            <?php $kalan=5; for($i=0;$i<$ortalama;$i++){  ?>
                                <span class="fa fa-star checked"></span>

                            <?php } ?>
                            <?php $kalan-=$ortalama; for($i=0;$i<$kalan;$i++){  ?>

                                <span class="fa fa-star"></span>


                            <?php } ?>
                        </div>
                        <span class="review-no"><?php echo $toplam_yorum;?> inceleme</span>
                    </div>
                    <p class="product-description"><?php echo $urun->description; ?></p>
                    <p class="product-description"><?php echo $urun->stock; ?></p>

                    <h4 class="price">Fiyat: <span><?php echo $urun->price ?></span></h4>
                    <div class="action">
                        <button onclick="return addBasket('<?php echo $urun->id ?>',this);"
                                class="add-to-cart btn btn-default" type="submit">Sepete Ekle
                        </button>
                        <button id="scrl" data-toggle="#yorum" class="add-to-cart btn btn-default" type="submit">Yorum Yap</button>
                        <form method="post" style="display: inline">

                        <button name="favorite" class="like btn btn-default" type="submit"><span class="fa fa-heart"></span></button>
</form>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h3><strong>Yorumlar</strong></h3>
            <hr style="border-top:3px solid black ">

            <?php foreach ($yorumlar as $yorum) {
                if ($yorum['approved'] == 1) { ?>

                    <div>
                        <ul style="list-style: none">


                            <li>
                                <div class="single-product">

                                    <div>
                                    <p  style="color: black;float:left;margin-right: 30px   "><?php echo $yorum['create_time']?></p>

                                    <div class="rating">
                                        <div class="stars">

                                            <?php $kalan=5; for($i=0;$i<$yorum['rating'];$i++){  ?>
                                            <span class="fa fa-star checked"></span>

                                      <?php } ?>
                                            <?php $kalan-=$yorum['rating']; for($i=0;$i<$kalan;$i++){  ?>

                                            <span class="fa fa-star"></span>


                                            <?php } ?>

                                        </div>
                                    </div>

                                   </div>

                                    <div style="color: black;background-color: rgb(220,220,220)">
                                        <strong><?php echo $yorum['context']; ?></strong>

                                        <p style="color: black"><?php echo $yorum['review']; ?></p>
                                    </div>
                                    <p style="color: black"><?php echo $yorum['username'] ?></p>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr style="border-top:3px solid black ">

                <?php }
            } ?>
            <div id="yorum">
                <form method="post">
                    <h4><strong>Yorum Yap</strong></h4>
                    <input name="baslik" type="text" placeholder="Başlık"
                           style="float:left;width: 30%; background-color: rgb(220,220,220);box-shadow: 5px 5px 5px;"
                           maxlength="60">
                    <div style="float: left; padding-left: 20px">
                        <div class="form-group" id="rating-ability-wrapper">
                            <radiobutton name="rating1" type="button" class="btnrating btn btn-default btn-lg"
                                         data-rate="1" id="rating-star-1">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </radiobutton>
                            <radiobutton name="rating2" type="button" class="btnrating btn btn-default btn-lg"
                                         data-rate="2" id="rating-star-2">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </radiobutton>
                            <radiobutton name="rating3" type="button" class="btnrating btn btn-default btn-lg"
                                         data-rate="3" id="rating-star-3">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </radiobutton>
                            <radiobutton name="rating4" type="button" class="btnrating btn btn-default btn-lg"
                                         data-rate="4" id="rating-star-4">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </radiobutton>
                            <radiobutton name="rating5" type="button" class="btnrating btn btn-default btn-lg"
                                         data-rate="5" id="rating-star-5">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </radiobutton>
                                <input type="hidden" id="selected_rating" name="rating" value="" required="required">
                        </div>
                    </div>
                    <br><br>
                    <textarea name="yorum" id="" cols="60" rows="5" placeholder="Yorum"
                              style="width: 50%;background-color: rgb(220,220,220);box-shadow: 5px 5px 5px;"
                              maxlength="200"></textarea>
                    <br><br>
                    <button name="btnyorum" class="add-to-cart btn btn-default" type="submit">Yorum Yap
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    $("#scrl").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#yorum").offset().top
        }, 500);
    });

    $(function () {
        $(".btnrating").on("click", function () {

            var selected_value = $(this).attr("data-rate");
            $("#selected_rating").val(selected_value);

            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);

            $(".btnrating").removeClass("btn-warning");
            $(".btnrating").addClass("btn-default");
                for (i = 1; i <= selected_value; ++i) {
                $("#rating-star-" + i).addClass('btn-warning');
                $("#rating-star-" + i).removeClass('btn-default');
            }
        })
    });


    function addBasket(urun_id, btn_elm) {
        $.post("/addbasket?id=" + urun_id, {quantity: 1}, function (json) {
            data = JSON.parse(json);
            if (data.status == 1) {
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
    function moveText(btn_elm) {

        //Scroll to top if cart icon is hidden on top
        $('html, body').animate({
            'scrollTop': $(".cart-amunt").position().top
        });
        urun_names = $(btn_elm).parent().parent().find(".urun_cart");
        flyToElement(urun_names, $(".cart-amunt"));

    }

    function flyToElement(flyer, flyingTo) {
        var $func = $(this);
        var divider = 3;
        var flyerClone = $(flyer).clone();
        console.log($(flyer).offset().top, $(flyer).offset().left);
        $(flyerClone).css({
            position: 'absolute',
            top: $(flyer).offset().top + "px",
            left: $(flyer).offset().left + "px",
            opacity: 1,
            'z-index': 1000
        });
        $('body').append($(flyerClone));

        var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width() / divider) / 2;
        var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height() / divider) / 2;
        // setInterval();
        $(flyerClone).animate({
                opacity: 0.4,
                left: gotoX,
                top: gotoY,
                width: $(flyer).width() / divider,
                height: $(flyer).height() / divider
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
<?php include "layout/footer.php"; ?>


