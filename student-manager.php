<!-- Modal -->
<div class="modal fade" id="student-manager" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 text-uppercase fw-bold" id="staticBackdropLabel">Student Manager</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php if ($userId == 705834) { ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='all-students.php'" class="nav-links text-uppercase bg-white p-3 px-4">all-students</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='class-wis-student-lists.php'" class="nav-links text-uppercase bg-white p-3 px-4">class wise student list</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='struck-off-manager.php'" class="nav-links text-uppercase bg-white p-3 px-4">Struck Off Manager</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='left-students-manager.php'" class="nav-links text-uppercase bg-white p-3 px-4">left students Manager</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='computer-college-defaulter-students.php'" class="nav-links text-uppercase bg-white p-3 px-4">Defaulter students</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='all-students.php'" class="nav-links text-uppercase bg-white p-3 px-4">all-students</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='class-wis-student-lists.php'" class="nav-links text-uppercase bg-white p-3 px-4">class wise student list</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='struck-off-manager.php'" class="nav-links text-uppercase bg-white p-3 px-4">Struck Off Manager</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='left-students-manager.php'" class="nav-links text-uppercase bg-white p-3 px-4">left students Manager</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='defaulter-students.php'" class="nav-links text-uppercase bg-white p-3 px-4">Defaulter students</a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#prmote" class="nav-links text-uppercase bg-white p-3 px-4">Promote Students</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                            <div class="card mb-3 text-center">
                                <a href="javascript:void()" onclick="location.href='sibling-manager.php'" class="nav-links text-uppercase bg-white p-3 px-4">Sibling Manager</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>



<!---------Promote Students--------------->
<!-- Modal -->
<div class="modal fade" id="prmote" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 text-uppercase fw-bold" id="staticBackdropLabel">Promote Students</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="card mb-3 text-center">
                            <a href="javascript:void()" onclick="location.href='promote-students'" class="nav-links text-uppercase bg-white p-3 px-4">Manualy Promote Students</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="card mb-3 text-center">
                            <a href="javascript:void()" onclick="location.href='auto-promote-students'" class="nav-links text-uppercase bg-white p-3 px-4">Class Wise Promote Students</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>