<!-- <style>
    body {
            background-image: url("https://img.freepik.com/free-photo/hand-painted-watercolor-background-with-sky-clouds-shape_24972-1095.jpg?size=626&ext=jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
</style> -->

<div class="row">
    <div class="col">
    </div>
    <div class="col text-center">
        <i class="bi bi-book" style="font-size: 10rem; color: cornflowerblue;"></i>
    </div>
    <div class="col"></div>
</div>
<div class="row ">
    <div class="col"></div>
    <div class="col">
        <div class="mb-3">
            <label class="form-label">เลือกวันที่</label>
            <div id="datepicker"></div>
        </div>
        <button type="submit" class="btn btn-primary acd">ค้นหา</button>
    </div>
    <div class="col"></div>
    <form action="<?php echo $base_url ?>index.php/Note/show_search_table" method="post" id="date_alert">
        <input type="hidden" name="date_alert" id="date_alert_val">
    </form>
</div>
<script>
    // แปลงวันที่
    function convertDate(dateString) {
        var p = dateString.split(/\D/g)
        return [p[1], p[2], p[0]].join("/")
    }

    var new_dates = <?php echo json_encode($dates) ?>;

    new_dates = new_dates.map(t => {
        return convertDate(t)
    })


    var dates = new_dates;
    console.log(<?php echo json_encode($dates) ?>);
    //tips are optional but good to have
    var tips = ['some description', 'some other description'];

    $('#datepicker').datepicker({
        dateFormat: 'dd/mm/yy',
        beforeShowDay: highlightDays,
        showOtherMonths: true,
        numberOfMonths: 1,
    });

    function highlightDays(date) {
        for (var i = 0; i < dates.length; i++) {
            if (new Date(dates[i]).toString() == date.toString()) {
                return [true, 'highlight', tips[i]];
            }
        }
        return [true, ''];
    }

    $('.acd').click(function(e) {
        e.preventDefault();
        console.log($('#datepicker').val());

        $('#date_alert_val').val($('#datepicker').val())
        console.log($('#date_alert_val').val())

        $('#date_alert').submit()

    });
</script>
<style>
    td.highlight {
        border: none !important;
        padding: 1px 0 1px 1px !important;
        background: none !important;
        overflow: hidden;
    }

    td.highlight a {
        background: #ad3f29 url('https://e7.pngegg.com/pngimages/746/182/png-clipart-halftone-japan-bg-blue-text-thumbnail.png') 50% 50% repeat-x !important;
        border: 1px #88a276 solid !important;
    }
</style>