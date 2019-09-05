<?php include "../view/layout/header.php";?>



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
        <th style="color: black">İsim Soyisim</th>
        <th style="color: black">Email</th>
        <th style="color: black">Konu</th>

        <th style="color: black">Zaman</th>



    </tr>
    </thead>
    <tbody>
    <?php $i=0;
    foreach  ($liste as $ticket) { $i++;?>
        <tr  data-toggle="collapse" data-target="<?php echo "#demo".$i; ?>" class="accordion-toggle">

            <td style="color: black"><?php echo $ticket['isimsoyisim']; ?>   </td>
            <td style="color: black"><?php echo $ticket['email']; ?></td>
            <td style="color: black"><?php echo $ticket['konu']; ?></td>

            <td style="color: black"><?php echo $ticket['zaman']; ?></td>
            <td>

                <b style="color:black" class="caret"></b>

            </td>
        </tr>
        <tr>
            <td colspan="6" class="hiddenRow"><div class="accordian-body collapse" id="<?php echo "demo".$i; ?>">

                    <table class="shop_table" style="text-align: center;background-color: rgb(200,200,200)">
                        <thead>

                        <tr >
                            <th  class="product-name">Email</th>

                            <th class="product-name">Telefon</th>

                            <th class="product-total">Mesaj</th>


                        </tr>
                        </thead>

                        <tbody>

                            <td><?php echo $ticket['email']; ?> </td>
                            <td><?php echo $ticket['telefon']; ?></td>
                            <td><?php echo $ticket['mesaj']; ?></td>


                            </tr>


                        </tbody>

                    </table>


                </div>

            </td>
        </tr>
    <?php } ?>

    </tbody>
    <tfoot>

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


















<?php include "../view/layout/footer.php";?>
