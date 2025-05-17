<!-- Modal -->
<div class="modal fade" id="fee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Generate Challan</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
            <div class="card mb-3 text-center">
              <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#genrate-challan">Month Wise</a>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
            <div class="card mb-3 text-center">
              <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#samester-challan">Installment Challan</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
            <div class="card mb-3 text-center">
              <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#annualy-challan">Annualy</a>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>



<!-- Modal Month Wise-->
<div class="modal fade" id="genrate-challan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">generate monthly challan</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='generate-individual-monthly-challan.php'" class="nav-links text-uppercase bg-white p-3 px-4" style="font-size:0.9rem;">Generate Challan Individual</a>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='generate-monthly-challan-class-wise.php'" class="nav-links text-uppercase bg-white p-3 px-4" style="font-size:0.9rem;">Generate Challan Class wise</a>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='generate-monthly-challan-all-students.php'" class="nav-links text-uppercase bg-white p-3 px-4" style="font-size:0.8rem;">Generate Challan All Students</a>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>




<!-- Modal Challan Manager-->
<div class="modal fade" id="chlan-manager" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">challan manager</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='challan-manager'" class="nav-links text-uppercase bg-white p-3 px-4">monthly Challan</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card mb-3 text-center">
              <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#instlmanager">installment challan</a>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='annualy-challan-manager'" class="nav-links text-uppercase bg-white p-3 px-4">annualy Challan</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='all-challan-print'" class="nav-links text-uppercase bg-white p-3 px-4">all challan print</a>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>




<!-- Modal Installment Manager-->
<div class="modal fade" id="instlmanager" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Installment Challan manager</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='student-wise-installments'" class="nav-links text-uppercase bg-white p-3 px-4">Student Challans</a>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='samesterly-challan-manager'" data-bs-toggle="modal" data-bs-target="#samester-challan" class="nav-links text-uppercase bg-white p-3 px-4">Class Wise Installments</a>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>