

<?php include "../view/layout/header.php";?>

<a name="onaylilar" href="/admin/yorumlar/onaylilar">Onaylılar</a>
<a name="bekleyenler" href="/admin/yorumlar/bekleyenler">Bekleyenler</a>

<table class="table table-color">
    <thead>
    <tr>
        <th> #</th>
        <th> Context</th>
        <th>Review</th>
        <th>user_id</th>
        <th>product_id</th>
        <th>create_time</th>
        <th>Onaylı</th>
        <th>username</th>


        <th></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($yorumlar as $yorum) { ?>
        <tr>
            <td><?php echo $yorum['id']; ?></td>
            <td><textarea disabled name="x" id="" cols="20" rows="5"><?php echo $yorum['context']; ?></textarea></td>
            <td><textarea disabled name="x" id="" cols="20" rows="5"><?php echo $yorum['review']; ?></textarea></td>
            <td><?php echo $yorum['user_id']; ?></td>
            <td><?php echo $yorum['product_id']; ?></td>
            <td><?php echo $yorum['create_time']; ?></td>
            <td><?php echo $yorum['approved']; ?></td>
            <td><?php echo $yorum['username']; ?></td>
            <td>
                <?php if($yorum['approved']){?>
                    <a onclick="return confirm('Emin misiniz?')" href="/admin/yorumlar/onaykaldir/<?php echo $yorum['id']?>" class="btn btn-danger">Onay Kaldır</a>
                <?php }else{ ?>
                    <a onclick="return confirm('Emin misiniz?')" href="/admin/yorumlar/onayla/<?php echo $yorum['id']?>" class="btn btn-warning">Onayla</a>
                <?php } ?>
            </td>



        </tr>
    <?php } ?>
    </tbody>
</table>


<?php include "../view/layout/footer.php";?>

