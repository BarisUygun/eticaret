<?php include "layout/header.php"; ?>



    <div class="container emp-profile">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img style="width: 200px;height: 200px" class="copyurunimg copyurunimg <?php echo $user['id'];?>" src='/asset/images/<?php echo $user['image'];?>'>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php echo $user['name']." ".$user['surname']; ?>
                        </h5>
                        <h6>
                            <?php echo $user['email']; ?>

                        </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a  href="#pwd" class="nav-link active" id="pwd-tab" data-toggle="tab" role="tab" aria-controls="pwd" aria-selected="true">Change Password</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Level: <?php echo $user['type'] ?></p>
                        <div class="profile-work">
                            Change Photo
                            <input type="file" name="changeimage"/>
                            <button name="submit-image" type="submit">Kaydet</button>
                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="position: absolute">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $user['username'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $user['name'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $user['email'] ?></p>
                                </div>
                            </div>



                        </div>

                        <div class="tab-pane fade show active" id="pwd" role="tabpanel" aria-labelledby="home-tab" style="position:absolute;">
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="eskisifre" type="text" placeholder="Eski Şifre">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="yenisifre" type="password" placeholder="Yeni Şifre" maxlength="12">

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="yenisifretekrar" type="password" placeholder="Yeni Şifre Tekrar" maxlength="12">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" name="sifre" value="Şifre Değiştir">
                                </div>
                            </div>



                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>
















<?php include "layout/footer.php";
?>