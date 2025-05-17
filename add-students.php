<!-- Modal -->
<div class="modal fade" id="add-students" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog <?php if ($userId == 705834) {
                                    echo "modal-sm";
                                } else {
                                    echo "modal-xl";
                                } ?>">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 text-uppercase fw-bold" id="staticBackdropLabel">add students</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if ($userId == 705834) { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='admision-form-computer-colleges.php'" class="nav-links text-uppercase bg-white p-3 px-4">Admission Form</a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='admission-form-short.php'" class="nav-links text-uppercase bg-white p-3 px-4">quick form</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='admission-form-long.php'" class="nav-links text-uppercase bg-white p-3 px-4">Admission form</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='add-siblings.php'" class="nav-links text-uppercase bg-white p-3 px-4">add siblings</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='add-csv.php'" class="nav-links text-uppercase bg-white p-3 px-4">add csv</a>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>