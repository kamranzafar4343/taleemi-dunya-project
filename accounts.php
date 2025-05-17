<!-- Modal -->
<div class="modal fade" id="accounts" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">accounts</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='day-book.php'" class="nav-links text-uppercase bg-white p-3 px-4">day book</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 text-center">
              <a href="#" class="nav-links text-uppercase bg-white p-3 px-4" data-bs-toggle="modal" data-bs-target="#recable">Collection Record</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='payroll.php'" class="nav-links text-uppercase bg-white p-3 px-4">payroll</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='closing-balance.php'" class="nav-links text-uppercase bg-white p-3 px-4">cash closing</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='profit-and-loss.php'" class="nav-links text-uppercase bg-white p-3 px-4">profit & loss</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>



<!-- Collection Record -->
<div class="modal fade" id="recable" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="recable" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="recable">Collection Record</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 text-center">
              <a class="nav-links text-uppercase bg-white p-3 px-4" href="javascript:void()" onclick="location.href='total-collection.php'">total fee Record</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 text-center">
              <a class="nav-links text-uppercase bg-white p-3 px-4" href="#" data-bs-toggle="modal" data-bs-target="#padunpad">paid / unpaid list</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 text-center">
              <a class="nav-links text-uppercase bg-white p-3 px-4" href="javascript:void()" onclick="location.href='daily-income.php'">Income</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card mb-3 text-center">
              <a class="nav-links text-uppercase bg-white p-3 px-4" href="javascript:void()" onclick="location.href='daily-expenses.php'">Expenses</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>



<!-- Paid / Unpaid Lists -->
<div class="modal fade" id="padunpad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="recable" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="recable">Paid / Unpaid List</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card mb-3 text-center">
              <a class="nav-links text-uppercase bg-white p-3 px-4" href="javascript:void()" onclick="location.href='received.php'">Class Wise paid / unpaid</a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card mb-3 text-center">
              <a class="nav-links text-uppercase bg-white p-3 px-4" href="javascript:void()" onclick="location.href='month-wise-paid-unpaid-list.php'">Month Wise paid / unpaid</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>





<!-- Account Manager -->
<div class="modal fade" id="account-manager" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">account manager</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <div class="card mb-3 text-center">
              <a href="#" data-bs-toggle="modal" data-bs-target="#daybokmanger" class="nav-links text-uppercase bg-white p-3 px-4">Day Book Manager</a>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='cash-clasing-manager.php'" class="nav-links text-uppercase bg-white p-3 px-4">Cash Closing Manager</a>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='payroll-manager.php'" class="nav-links text-uppercase bg-white p-3 px-4">payroll manager</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Day Book Manager -->
<div class="modal fade" id="daybokmanger" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">Day Book manager</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='day-book-date-wise.php'" class="nav-links text-uppercase bg-white p-3 px-4">date wise Report</a>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card mb-3 text-center">
              <a href="javascript:void()" onclick="location.href='monthly-day-book-report.php'" class="nav-links text-uppercase bg-white p-3 px-4">Monthly Report</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>