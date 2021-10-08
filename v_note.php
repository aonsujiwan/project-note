<!-- <style>
    body {
            background-image: url("https://img.freepik.com/free-photo/hand-painted-watercolor-background-with-sky-clouds-shape_24972-1095.jpg?size=626&ext=jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
</style> -->

<form action="<?php echo $base_url ?>index.php/Note/save" method="post">
    <div class="row ">
        <div class="col-2 p-3 text-center mt-3 ">
            <i class="bi bi-book" style="font-size: 5rem; color: cornflowerblue;"></i>
            <div class="mb-3">
                <label class="form-label">วันที่แจ้งเตือน</label>
                <input name="date_alert" type="date" class="form-control">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label class="form-label">ข้อความแจ้งเตือน</label>
                <textarea name="description" class="form-control" rows="10"></textarea>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>


            <button type="submit" class="btn btn-primary">บันทึก</button>

        </div>
    </div>
</form>