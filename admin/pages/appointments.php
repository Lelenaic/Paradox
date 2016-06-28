<!-- Content -->
  <div class="layout-content" data-scrollable>
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Appointments</li>
      </ol>

      <div class="pull-xs-right">
        <a href="#" class="btn btn-primary-outline btn-circle" data-toggle="sidebar" data-target="#sidebarRight"> <i class="material-icons">event_note</i></a>
      </div>
      <p>
        <button data-toggle="modal" data-target="#modalAppointments" type="button" class="btn btn-primary btn-rounded">Add New <i class="material-icons">add</i></button>
      </p>

      <div class="card">
        <div class="card-header center">
          <div class="input-group">
            <span class="input-group-btn"> 
				<button class="btn btn-default" type="button"><i class="material-icons md-18">search</i></button> 
			</span>
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </div>
        <div class="card-header bg-white center">
          <a href="#" class="pull-xs-left"><i class="material-icons">keyboard_arrow_left</i></a> Wednesday, 24th February 2016
          <a href="#" class="pull-xs-right"><i class="material-icons">keyboard_arrow_right</i></a>
        </div>
        <ul class="list-appointments">
          <li>
            <div class="item-time">8:00 <span class="text-muted">am</span></div>
            <div class="item">
              <div class="item-icon"><i class="material-icons">access_time</i></div>
              <a href="#" class="btn btn-primary-outline btn-rounded btn-sm"> <i class="material-icons md-18">person</i> Adrian Demian</a>
              <a href="#" class="btn btn-success-outline btn-rounded btn-sm"> <i class="material-icons md-18">person</i> Board Meeting</a>
              <a href="#" class="btn btn-warning-outline btn-rounded btn-sm"> <i class="material-icons md-18">person</i> Training</a>
            </div>
            <div class="item">
              <div class="item-icon"><i class="material-icons">access_time</i></div>
              <a href="#" class="btn btn-primary-outline btn-rounded btn-sm"> <i class="material-icons md-18">person</i> Andrew Brain</a>
            </div>
          </li>
          <li>
            <div class="item-time">10:00 <span class="text-muted">am</span></div>
            <div class="item">
              <div class="item-icon"><i class="material-icons">access_time</i></div>
              <a href="#" class="btn btn-primary-outline btn-rounded btn-sm">
                <i class="material-icons md-18">person</i> Michelle Smith
                <span class="text-muted">| Some quick notes</span>
              </a>
            </div>
          </li>
          <li>
            <div class="item-time">12:00 <span class="text-muted">am</span></div>
            <div class="item">
              <div class="item-icon bg-warning"><i class="material-icons">access_time</i></div>
              Lunch Break
            </div>
          </li>
          <li>
            <div class="item-time">2:00 <span class="text-muted">pm</span></div>
            <div class="item">
              <div class="item-icon bg-success"><i class="material-icons">person</i></div>
              <a href="#" class="btn btn-success-outline btn-rounded btn-sm">
                <i class="material-icons md-18">star</i> CEO round
              </a>
            </div>
          </li>
        </ul>
      </div>

    </div>
  </div>

  <!-- jQuery -->
  <script src="assets/vendor/jquery.min.js"></script>

  <!-- Bootstrap -->
  <script src="assets/vendor/tether.min.js"></script>
  <script src="assets/vendor/bootstrap.min.js"></script>

  <!-- Simplebar.js -->
  <script src="assets/vendor/simplebar.min.js"></script>

  <!-- Bootstrap Layout -->
  <script src="assets/vendor/bootstrap-layout.js"></script>

  <!-- Bootstrap Layout Scrollable Extension JS -->
  <script src="assets/vendor/bootstrap-layout-scrollable.js"></script>

  <!-- Vendor JS -->
  <script src="assets/vendor/bootstrap-datepicker.min.js"></script>
  <script src="assets/vendor/bootstrap-timepicker.js"></script>

  <!-- Init -->
  <script src="examples/js/date-time.js"></script>

  <!-- Appointments Add New -->
  <div class="modal fade" id="modalAppointments">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="m-b-0 center">New Appointment</h4>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group row">
              <div class="col-md-6">
                <label for="date" class="control-label">Date</label>

                <input type="text" class="datepicker form-control">
              </div>
              <div class="col-md-6">
                <label for="date" class="control-label">Time</label>
                <div class="bootstrap-timepicker">
                  <input id="timepicker3" type="text" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="type" class="control-label">Type</label>
              <div class="clearfix"></div>
              <select class="c-select form-control">
                <option selected>Choose one</option>
                <option value="1">Meeting</option>
                <option value="2">Board</option>
                <option value="3">Financial</option>
              </select>
            </div>
            <div class="form-group">
              <label for="title" class="control-label">Title</label>
              <input type="text" class="form-control" placeholder="Title goes here">

            </div>
            <div class="center">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>