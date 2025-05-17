<!-- Modal -->
<div class="modal fade" id="addfee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addfee" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-uppercase" id="addfee">add fee</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card mb-3 text-center">
                            <a data-bs-toggle="modal" data-bs-target="#add-academic-fee" href="#" class="nav-links text-uppercase bg-white p-3 px-4">add academic fee</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card mb-3 text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#add-other-charges" class="nav-links text-uppercase bg-white p-3 px-4">rename other charges</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card mb-3 text-center">
                            <a href="javascript:void()" onclick="location.href='add-other-charges.php'" class="nav-links text-uppercase bg-white p-3 px-4">add other charges</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<!-- Add Academic Fee -->
<div class="modal fade" id="add-academic-fee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add-academic-fee" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-uppercase" id="add-academic-fee">add academic fee</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="adclas-fee">
                    <div class="row">
                        <input type="hidden" value="<?php echo $userId; ?>" id="usrid">
                        <input type="hidden" value="<?php echo $userId; ?>" id="usrids">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
                            <label class="text-capitalize">Class</label>
                            <select class="text-capitalize form-select" id="clas">
                                <option class="text-capitalize" value="">---select class---</option>
                                <?php
                                $sl_clas = mysqli_query($con, "select * from addClass where institute_id='$userId'");
                                while ($reslt_cls = mysqli_fetch_array($sl_clas)) {
                                    $id = $reslt_cls['id'];
                                    $class_name = $reslt_cls['class_name'];
                                ?>
                                    <option value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
                            <label class="text-capitalize">Monthly / Annual Fee</label>
                            <input class="text-capitalize form-control" id="mnthfe" type="text" onkeypress="isInputNumber(event)" autocomplete="off" placeholder="00">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
                            <label class="text-capitalize">Discount (%)</label>
                            <input class="text-capitalize form-control" id="dscnt" type="text" onkeypress="isInputNumber(event)" autocomplete="off" placeholder="00">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 col-xxl-2 mt-4">
                            <button class="btn btn-apna text-uppercase" id="btn-sve-fee"><i class="fa fa-save"></i> save</button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div id="tables-data"></div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        function loadfeerecord() {
                            var usridsinst = $("#usrids").val();
                            $.ajax({
                                url: 'ajax/ajax-fees-fetch-record.php',
                                type: "POST",
                                data: {
                                    colgcodes: usridsinst
                                },
                                success: function(result) {
                                    $("#tables-data").html(result);
                                }
                            });
                        }
                        loadfeerecord();

                        $("#btn-sve-fee").on('click', function(e) {
                            e.preventDefault();
                            var instut = $("#usrid").val();
                            var clased = $("#clas").val();
                            var monthFe = $("#mnthfe").val();
                            var discnt = $("#dscnt").val();
                            if (clased == "" || discnt == "" || monthFe == "") {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'info',
                                    title: 'Your Field is Empty',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
                                $.ajax({
                                    url: 'ajax/ajax-addfees.php',
                                    type: "POST",
                                    data: {
                                        schol_code: instut,
                                        class_titles: clased,
                                        month_fee: monthFe,
                                        descnout: discnt
                                    },
                                    success: function(data) {
                                        //$("#clsses").html(data);
                                        if (data == 1) {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'Class Successfully Submited',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                            $("#adclas-fee").trigger("reset");
                                            loadfeerecord();
                                        } else {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'error',
                                                title: 'Class is not Saved',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                            $("#adclas-fee").trigger("reset");
                                        }

                                    }
                                });
                            }


                        });
                    });
                </script>
            </div>

        </div>
    </div>
</div>



<!-- Add Other Charges -->
<div class="modal fade" id="add-other-charges" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add-other-charges" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-uppercase" id="add-other-charges">rename charges field names</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="adchrges">
                    <div class="row">
                        <input type="hidden" value="<?php echo $userId; ?>" id="inst-chrge">
                        <input type="hidden" value="<?php echo $userId; ?>" id="inst_charges">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
                            <label class="text-capitalize">Field Name 1</label>
                            <input placeholder="Write Other Charges Name Only" type="text" class="form-control stopnumber" autocomplete="off" id="chrge1" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
                            <label class="text-capitalize">Field Name 2</label>
                            <input placeholder="Write Other Charges Name Only" type="text" class="form-control stopnumber" autocomplete="off" id="chrge2" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
                            <label class="text-capitalize">Field Name 3</label>
                            <input placeholder="Write Other Charges Name Only" type="text" class="form-control stopnumber" autocomplete="off" id="chrge3" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
                            <label class="text-capitalize">Field Name 4</label>
                            <input placeholder="Write Other Charges Name Only" type="text" class="form-control stopnumber" autocomplete="off" id="chrge4" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
                            <label class="text-capitalize">Field Name 5</label>
                            <input placeholder="Write Other Charges Name Only" type="text" class="form-control stopnumber" autocomplete="off" id="chrge5" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
                            <label class="text-capitalize">Field Name 6</label>
                            <input placeholder="Write Other Charges Name Only" type="text" class="form-control stopnumber" autocomplete="off" id="chrge6" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mt-4">
                            <button class="btn btn-apna text-uppercase" id="btn-sve-chrges"><i class="fa fa-save"></i> save</button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="row">
                    <div class="col">
                        <div id="tab-data"></div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        function loddcharges() {
                            var instChrgeCode = $("#inst_charges").val();
                            $.ajax({
                                url: 'ajax/ajax-charges-title-fetch.php',
                                type: "POST",
                                data: {
                                    chrg_inst_code: instChrgeCode
                                },
                                success: function(results) {
                                    $("#tab-data").html(results);
                                }
                            });
                        }
                        loddcharges();

                        $("#btn-sve-chrges").on('click', function(e) {
                            e.preventDefault();

                            var instChrgecode = $("#inst-chrge").val();
                            var chrgeOne = $("#chrge1").val();
                            var chrgeTwo = $("#chrge2").val();
                            var chrgeThree = $("#chrge3").val();
                            var chrgeFour = $("#chrge4").val();
                            var chrgeFive = $("#chrge5").val();
                            var chrgeSix = $("#chrge6").val();

                            if (chrgeOne == "" || chrgeTwo == "" || chrgeThree == "" || chrgeFour == "" || chrgeFive == "" || chrgeSix == "") {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'info',
                                    title: 'Your Field is Empty',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
                                $.ajax({
                                    url: 'ajax/ajax-addcharges-title.php',
                                    type: "POST",
                                    data: {
                                        schol_code_charges: instChrgecode,
                                        chrge_one: chrgeOne,
                                        chrge_two: chrgeTwo,
                                        chrge_three: chrgeThree,
                                        chrge_four: chrgeFour,
                                        chrge_five: chrgeFive,
                                        chrge_six: chrgeSix
                                    },
                                    success: function(data) {
                                        //$("#clsses").html(data);
                                        console.log(data);
                                        if (data == 1) {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'Other Charges Field Name Successfully Submited',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                            $("#adchrges").trigger("reset");
                                            loddcharges();
                                        } else {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'error',
                                                title: 'Other Charges Field Name is not Save',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                            $("#adchrges").trigger("reset");
                                        }

                                    }
                                });
                            }


                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>