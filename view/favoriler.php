<?php include "layout/header.php";?>



<table class="table table-color" style="margin: 40px auto;width: 50%">
    <thead>
    <tr style="color: rgb(255,255,255)">
        <th>#</th>
        <th>Ürün adı</th>
        <th>Fiyat</th>
        <th>Stock</th>

        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($favoriler as $fav) {
        $urun=Urunler::get($fav['product_id']);
        ?>
        <tr style="color: rgb(255,255,255)">
            <td><img class="copyurunimg copyurunimg_<?php echo $urun->id?>" style="width: 60px;height:60px" src='/asset/images/<?php echo $urun->image?>'></td>
            <td><a style="color: rgb(255,255,255)" href="urundetay/?id=<?php echo $urun->id;?>"><?php echo $urun->name; ?></a></td>
            <td><?php echo $urun->price; ?></td>
            <td><?php echo $urun->stock; ?></td>

            <td class="product-remove">


                <form  method="post" action="?id=<?php echo $fav['id'];?>">
                    <button title="Remove this item" class="remove"  type="submit" name="delete">x</button>
                </form>


            </td>


        </tr>
    <?php } ?>
    </tbody>
</table>












<?php include "layout/footer.php";?>
