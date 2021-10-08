<style>
    body {
            background-image: url("https://img.freepik.com/free-photo/hand-painted-watercolor-background-with-sky-clouds-shape_24972-1095.jpg?size=626&ext=jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
</style>
<div class="row " style="margin-top: 10rem;">
    <div class="col"></div>
    <div class="col">
        <form action="<?php echo $base_url ?>index.php/Authen/login" method="post">
            
            <div class="mb-3">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input name='username' type="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">รหัสผ่าน</label>
                <input name="password" type="password" class="form-control" required>  
            </div>
            
            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
        </form>
    </div>
    <div class="col"></div>
</div>