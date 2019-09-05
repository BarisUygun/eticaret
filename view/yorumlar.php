<?php include "layout/header.php"; ?>

<style>
    .table tr {
        cursor: pointer;
    }
    .hiddenRow {
        padding: 0 4px !important;
        font-size: 13px;
    }
</style>

<table class="table table-condensed" style="border-collapse:collapse; width: 50%;margin: 40px auto">
    <thead>
    <tr>
        <th style="color: white">Resim</th>

        <th style="color: white">Ürün</th>
        <th style="color: white">Konu</th>

        <th style="color: white">Puan</th>
        <th style="color: white">Zaman</th>


    </tr>
    </thead>
    <tbody>
    <?php  $i=0;
    foreach ($yorumlar as $yorum) {$i++;
         ?>
        <tr data-toggle="collapse" data-target="<?php echo "#demo".$i; ?>" class="accordion-toggle">

            <td style="color: white"> <img class="copyurunimg copyurunimg_<?php echo $yorum['product_id']?>" style="width:50px;height: 50px" src='/asset/images/<?php $urn=Urunler::get($yorum['product_id']);
                echo $urn->image?>'>
                </td>

            <td style="color: white"><?php

                echo $urn->name; ?>  </td>

            <td style="color: white"><?php
                echo $yorum['context']; ?>    </td>

            <td style="color: white"><?php
                echo $yorum['rating']; ?>    </td>
            <td style="color: white"><?php
                echo $yorum['create_time']; ?>    </td>
                <td>
                <b style="color:white" class="caret"></b>

            </td>
        </tr>
        <tr>
            <td colspan="6" class="hiddenRow"><div class="accordian-body collapse" id="<?php echo "demo".$i; ?>">

                    <table class="shop_table">
                        <thead>

                        <tr >
                            <th  style="color: white;text-align: left;background-color: transparent" class="product-total">Yorum

                                <div style="margin-top: 10px"></div>
                                <textarea style="background-color: transparent" name="" id="" cols="90%" rows="3"><?php echo $yorum['review']; ?></textarea>



                            </th>


                        </tr>
                        </thead>



                    </table>


                </div>

            </td>
        </tr>
    <?php } ?>

    </tbody>

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
