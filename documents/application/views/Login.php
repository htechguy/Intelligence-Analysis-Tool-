<?php
$page = "Login";
include('_Header.php');
?>
<div class="container">
  <div class="row">
    <div class="hidden-xs col-md-2"></div>
    <div class="col-xs-12 col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id="loginBtn" class="btn btn-primary">Login</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="btn-group">
                      <a href="
                        <?= PATH . 'account/register' ?>" class="btn btn-default">New User?
                      </a>
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
