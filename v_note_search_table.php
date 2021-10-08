<!-- <style>
    body {
            background-image: url("https://img.freepik.com/free-photo/hand-painted-watercolor-background-with-sky-clouds-shape_24972-1095.jpg?size=626&ext=jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
</style> -->

<div class="row">
    <div class="col">
        <table id="table_note" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ข้อความแจ้งเตือน</th>
                    <th scope="col">วันที่แจ้งเตือน</th>
                    <th scope="col">สถานะแจ้งเตือนเมล</th>
                    <th scope="col">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($notes as $note) {
                ?>
                    <tr>

                        <td><?php echo $note->date_alert ?></td>
                        <td><?php echo $note->description ?></td>
                        <td>
                            <?php
                            if ($note->email_status == "inactive") {
                            ?>
                                <span class="badge rounded-pill bg-secondary">ปิด</span>
                            <?php
                            }
                            ?>

                            <?php
                            if ($note->email_status == "active") {
                            ?>
                                <span class="badge rounded-pill bg-success">เปิด</span>
                            <?php
                            }
                            ?>


                        </td>

                        <td>
                            <form action="<?php echo $base_url ?>index.php/Note/show_edit" method="post">
                                <input type="hidden" name="id" value="<?php echo $note->id ?>">
                                <button type="submit" class="btn btn-warning">แก้ไข</button>
                            </form>
                            <form action="<?php echo $base_url ?>index.php/Note/delete" method="post">

                                <input type="hidden" name="id" value="<?php echo $note->id ?>">
                                <button type="submit" class="btn btn-danger">ลบ</button>
                            </form>

                            <form action="<?php echo $base_url ?>index.php/Note/update" method="post">
                                <input type="hidden" name="id" value="<?php echo $note->id ?>">
                                <input type="hidden" name="email_status" value="<?php
                                                                                if ($note->email_status == "active") {
                                                                                    echo "inactive";
                                                                                } else {
                                                                                    echo "active";
                                                                                }
                                                                                ?>">
                                <button type="submit" class="btn btn-success">เปลี่ยนสถานะแจ้งเตือนเมล</button>
                            </form>

                        </td>
                    </tr>
                <?php
                }
                ?>
                <!-- <tr>

                    <td>01-12-2121</td>
                    <td>kglSHK</td>
                    <td>
                        <span class="badge rounded-pill bg-success">เปิด</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger">ลบ</button>
                        <button type="button" class="btn btn-warning">แก้ไข</button>
                        <button type="button" class="btn btn-success">เปลี่ยนสถานะแจ้งเตือนเมล</button>
                    </td>

                </tr> -->

                <!-- <tr>
                    <td>01-12-2121</td>
                    <td>Larry the Bird</td>
                    <td>
                        <span class="badge rounded-pill bg-secondary">ปิด</span>
                    </td>
                    <td><button type="button" class="btn btn-danger">ลบ</button>
                        <button type="button" class="btn btn-warning">แก้ไข</button>
                        <button type="button" class="btn btn-success">เปลี่ยนสถานะแจ้งเตือนเมล</button>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table_note').DataTable();
    });
</script>