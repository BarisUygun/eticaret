<?php include "layout/header.php"; ?>

<div style=" margin: 40px auto; width: 50%;">
    <form method="post">
        <div class="form-group">
            <label style="color: white" for="exampleFormControlInput1">İsim Soyisim</label>
            <input name="isimsoyisim" maxlength="32" type="text" class="form-control" id="exampleFormControlInput1" placeholder="İsim Soyisim">
        </div>
        <div class="form-group">
            <label style="color: white" for="exampleFormControlInput1">Email</label>
            <input name="email" maxlength="32" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

        <div class="form-group">
            <label style="color: white" for="exampleFormControlInput1">Telefon</label>
             <input placeholder=" Format: xxx-xxx-xx-xx
" class="form-control" type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
        </div>

        <div class="form-group">
            <label style="color: white" for="exampleFormControlInput1">Konu</label>
            <input name="konu" maxlength="16" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Konu">
        </div>

        <div class="form-group">
            <label style="color: white" for="exampleFormControlTextarea1">Mesajınız</label>
            <textarea name="mesaj" maxlength="256" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div style="text-align: center; " class="form-group">
            <button name="send" class="btn-success btn">Gönder</button>
        </div>

    </form>
</div>


<?php include "layout/footer.php"; ?>