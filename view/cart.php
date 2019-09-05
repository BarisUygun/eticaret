<?php include "layout/header.php";?>


        <table class="shop_table cart" style="margin: 50px auto; width: 50%;">
            <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $total=0;
            if(isset($_SESSION['carts'])){
            foreach($_SESSION['carts'] as $urun) {
                $myObj = json_decode($urun, true);
                $total += $myObj['fiyat'];
                ?>
                <tr class="cart-item">
                    <td class="product-remove">


                        <form  method="post" action="?id=<?php echo $myObj['id'];?>">
                        <button title="Remove this item" class="remove"  type="submit" name="delete">x</button>
                        </form>


                    </td>
                    <td class="product-thumbnail">
                        <a href="/single-product.php"> <img class="shop_thumbnail" alt="poster_1_up" width="226" height=" 282" src='/asset/images/<?php echo $myObj['image']?>'></a>


                    </td>
                    <td style="color: white" class="product-name"><?php echo $myObj['name'] ?></td>
                    <td style="color: white" class="product-price"><?php echo($myObj['fiyat'] / $myObj['adet']) ?></td>
                    <td style="color: white" class="product-quantity"><?php echo $myObj['adet']; ?></td>
                    <td style="color: white" class="product-quantity"><?php echo $myObj['fiyat']; ?></td>

                </tr>

                <?php


            }
            }
            ?>
            <form method="post" action="<?php if(isLogged()){echo "/payment";}else{echo "/login";}?>" style="width: 50%; margin: 40px auto;">
            <tr>

                <td colspan="3">
                    <input type="submit" value="Checkout" name="checkout"
                    <?php
                    if( !isset($_SESSION['carts']) || !count($_SESSION['carts'])){?>
                        disabled

                     <?php }  ?>

                    >

                </td>
                <td style="color: white"  colspan="3">Final Price--<?php echo $total;?> ₺</td>
            </tr>
            </form>

            </tbody>
        </table>

<?php include "layout/footer.php";?>