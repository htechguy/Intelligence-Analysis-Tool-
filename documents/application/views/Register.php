<?php
$page = "Register";
include('_Header.php');
?>
<div class="container">
  <div class="row">
    <div class="hidden-xs col-md-2"></div>
    <div class="col-xs-12 col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">Register</div>
        <div class="panel-body">
          <form class="form-horizontal" id="registerForm">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="phoneNumber" class="col-sm-2 control-label">Phone No</label>
                <div class="col-sm-10">
                  <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Phone Number">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" id="registerBtn">Register</button>
                          <button type="reset" class="btn btn-default">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="hidden-xs col-md-2"></div>
            </div>
          </div>
          <!-- /container -->
          <?php
include('_Footer.php');
?>
