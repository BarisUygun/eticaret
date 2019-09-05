<?php include "layout/header.php"; ?>

<a href="/admin/urunekle">Ürün ekle</a>
<table class="table table-color">
    <thead>
    <tr>
        <th> #</th>
        <th> Name</th>
        <th>Price</th>
        <th> Stock</th>
        <th> Kategori</th>

        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($liste as $urun) { ?>
        <tr>
            <td><?php echo $urun['id']; ?></td>
            <td><?php echo $urun['name']; ?></td>
            <td><?php echo $urun['price']; ?></td>
            <td><?php echo $urun['stock']; ?></td>
            <td><?php echo $urun['kategori_name']; ?></td>

            <td>
                <a href="/admin/urundetay?id=<?php echo $urun['id'] ?>">Detay</a></td>

            <td><a href="/admin/urunguncelle?id=<?php echo $urun['id'] ?>">Güncelle</a></td>
            <td><a href="/admin/urunsil?id=<?php echo $urun['id'] ?>">Sil</a></td>


        </tr>
    <?php } ?>
    </tbody>
</table>

<?php include "layout/footer.php"; ?>
