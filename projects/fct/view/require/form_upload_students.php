<?php
echo "<pre>";
//print_r($data);
echo "</pre>";
?>
<form enctype="multipart/form-data" method="post" class='card w-75 d-flex p-2'>

    <!--Up-->
    <section>
        <!--Button to upload csv file-->
        <div class="form-group d-flex my-2 p-4">
            <div class="d-flex justify-content-center my-2" class='bg-black'>
                <input type="file" id="file-input" name="file">
            </div>
        </div>
    </section>

    <!--Medium-->
    <section class='d-flex flex-row justify-content-between mx-2'>

        <!--Group-->
        <div class="d-flex flex-column mb-3 mx-1 w-50">
            <label for="group" class='my-2'>Grupo</label>
            <select class="form-control" name="group">
                <?php
                foreach ($data['groups_list'] as $value) {
                    echo "<option value=" . $value['group_name'] . ">" . $value['group_name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <!--Academic year-->
        <div class="d-flex flex-column mb-3 mx-1 w-50">
            <label for="ayear" class='my-2'>Curso académico</label>
            <select class="form-control" name="ayear">
                <?php
                foreach ($data['ayears_list'] as $value) {
                    if ($value['ayear'] == getCurrentAcademicYear()) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                    echo "<option " . $selected . " value=" . $value['ayear'] . ">" . $value['ayear'] . "</option>";
                }
                ?>
            </select>
        </div>

        <!--Term-->
        <div class="d-flex flex-column mb-3 mx-1 w-50">
            <label for="term" class='my-2'>Período</label>
            <select class="form-control" name="term">
                <?php
                foreach ($data['terms_list'] as $value) {
                    if ($value['term'] == getCurrentTerm()) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                    echo "<option " . $selected . " value=" . $value['term'] . ">" . $value['term'] . "</option>";
                }
                ?>
            </select>
        </div>

    </section>
    
    <!--Down-->
    <section class='d-flex mb-3 mx-1 w-100 justify-content-center'>
        <button type="submit" class="btn btn-primary" name='btn_upload_file'>Cargar alumnos</button>
    </section>
</form>