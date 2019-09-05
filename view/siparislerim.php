<?php include "layout/header.php"; ?>
    <style>
        .table tr {
            cursor: pointer;
        }
        .hiddenRow {
            padding: 0 4px !important;
            background-color: #eeeeee;
            font-size: 13px;
        }
    </style>

    <table class="table table-condensed" style="border-collapse:collapse; width: 50%;margin: 40px auto">
        <thead>
        <tr>
            <th style="color: white">Toplam</th>
            <th style="color: white">Kargo</th>
            <th style="color: white">Zaman</th>
            <th style="color: white">Detay</th>

        </tr>
        </thead>
        <tbody>
            <?php $_SESSION['toplam'] = 0; $i=0;
            foreach ($liste as $urun) {$i++;
            $_SESSION['toplam'] += $urun['toplam']; ?>
                <tr data-toggle="collapse" data-target="<?php echo "#demo".$i; ?>" class="accordion-toggle">

                <td style="color: white"><?php echo $urun['toplam']; ?> ₺    </td>
            <td style="color: white"><?php echo $urun['kargo']; ?></td>
            <td style="color: white"><?php echo $urun['zaman']; ?></td>
            <td>

                <b style="color:white" class="caret"></b>

            </td>
        </tr>
        <tr>
            <td colspan="6" class="hiddenRow"><div class="accordian-body collapse" id="<?php echo "demo".$i; ?>">

                     <table class="shop_table">
                         <thead>

                         <tr >
                             <th  class="product-name">Resim</th>

                             <th class="product-name">İsim</th>

                             <th class="product-total">Fiyat</th>
                             <th class="product-total">Miktar</th>
                             <th class="product-total">Zaman</th>
                             <th class="product-total">Ürün Değerlendirme</th>


                         </tr>
                         </thead>

                         <tbody>
                         <?php
                         $urun_listele = SepetUrun::getAllByUser($urun['id']);
                         foreach ($urun_listele as $urn_lst) {
                             ?>
                             <td><img class="copyurunimg copyurunimg_<?php echo $urn_lst['id'] ?>"
                                      style="width: 40px;height: 40px" src='/asset/images/<?php echo $urn_lst['images'] ?>'>
                             </td>
                             <td><?php echo $urn_lst['name']; ?></td>
                             <td><?php echo $urn_lst['price']; ?> ₺</td>
                             <td><?php echo $urn_lst['quantity']; ?></td>
                             <td><?php echo $urn_lst['time']; ?></td>
                             <td><a href="urundetay/?id=<?php echo $urn_lst['urun_id']?>">Ürün Değerlendirme</a></td>



                             </tr>
                         <?php } ?>


                         </tbody>

                     </table>


                </div>

            </td>
        </tr>
<?php } ?>

        </tbody>
        <tfoot>

        <tr class="order-total">
            <th style="color: white">Order Total</th>
            <td><strong><span style="color: white" class="amount"><?php echo $_SESSION['toplam']; ?> ₺</span></strong></td>
        </tr>
        </tfoot>
    </table>




    <script>
        $('.accordian-body').on('show.bs.collapse', function () {
            $(this).closest("table")
                .find(".collapse.in")
                .not(this)
                .collapse('toggle')
        })
    </script>


<?php include "layout/footer.php"; ?>