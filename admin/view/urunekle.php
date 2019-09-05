
<?php include "layout/header.php";?>

<?php echo $message;?>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Urun</h4>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="<?php
                    echo isset($urun->name) ? $urun->name : ""?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Stock</label>
                    <input type="number" min="0" class="form-control" id="exampleInputEmail3" placeholder="Stock" name="stock"
                           value="<?php
                           echo isset($urun->stock) ? $urun->stock : ""?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input type="number" min="0"  step="0.01"class="form-control" id="exampleInputEmail3" placeholder="Price" name="price"
                           value="<?php
                           echo isset($urun->price) ? $urun->price : ""?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Kategori</label>
                    <select name="kategori_id" class="form-control">
                        <option value="">Seçiniz</option>
                        <?php foreach ($kategoriler AS $kategori){?>
                            <option  value="<?php echo $kategori["id"]?>"><?php echo $kategori["name"]?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>File upload</label>
                    <div class="input-group col-xs-12">
                        <input type="file" name="myimage" class="file-upload-browse btn btn-info"  placeholder="Upload Image" style="background-color: #3755F1">

                    </div>

                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="2" name="description"><?php echo  isset($urun->description) ? $urun->description : "" ?></textarea>
                </div>
                <button type="submit" class="btn btn-success mr-2">Kaydet</button>
                <a href="/admin/urunler" class="btn btn-light">İptal</a>
                <button type="reset" class="btn btn-light">Temizle</button>
            </form>
        </div>
    </div>
</div>

<?php include "layout/footer.php";?>