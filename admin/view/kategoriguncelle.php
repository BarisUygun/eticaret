
<?php include "layout/header.php";?>

<?php ?>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Kategori</h4>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="<?php
                    echo isset($kategori->name) ? $kategori->name : ""?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Stock</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Slug" name="slug"
                           value="<?php
                           echo isset($kategori->slug) ? $kategori->slug : ""?>">
                </div>

                <div class="form-group">
                    <label>File upload</label>
                    <div class="input-group col-xs-12">
                        <input type="file" name="myimage" class="file-upload-browse btn btn-info"  placeholder="Upload Image" style="background-color: #3755F1">
                    </div>

                </div>

                <button type="submit" class="btn btn-success mr-2" name="kaydet">Kaydet</button>
                <a href="/admin/kategoriler" class="btn btn-light">İptal</a>
                <button type="reset" class="btn btn-light">Temizle</button>
            </form>
        </div>
    </div>
</div>

<?php include "layout/footer.php";?>