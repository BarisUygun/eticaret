<?php include "layout/header.php";?>

<a href="/admin/kategoriekle">Kategori ekle</a><table>
    <table class="table table-color">
        <thead>
        <tr>
            <th> # </th>
            <th> Name </th>
            <th>Slug</th>
            <th> Image </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($kategoriler as $kategori) {?>
            <tr>
                <td><?php echo $kategori['id'];?></td>
                <td><?php echo $kategori['name'];?></td>
                <td><?php echo $kategori['slug'];?></td>
                <td><?php echo $kategori['image'];?></td>
                <td>
                    <a href="/admin/kategoriguncelle?id=<?php echo $kategori['id']?>">Güncelle</a>
                    <a href="/admin/kategorisil?id=<?php echo $kategori['id']?>">Sil</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>

<?php include "layout/footer.php";?>
