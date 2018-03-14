<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <title>Intelligence Problem Analysis Tool</title>
      <!-- Bootstrap core CSS -->
      <link href="
        <?= PATH . 'lib/bootstrap-3.3.7/css/bootstrap.css' ?>" rel="stylesheet">
        <link href="
          <?= PATH . '/lib/bootstrap-3.3.7/css/bootstrap-theme.css' ?>" rel="stylesheet">
        </head>
        <body>
          <!-- Fixed navbar -->
          <nav class="navbar navbar-default">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="
                  <?= PATH . 'home/index' ?>">IPAT
                </a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li
                    <?php if($page=="Home" ) echo 'class="active"'; ?>>
                    <a href="
                      <?= PATH . 'home/index' ?>">Home
                    </a>
                  </li>
                  <li
                    <?php if($page=="DocumentList" ) echo 'class="active"'; ?>>
                    <a href="
                      <?= PATH . 'document/list' ?>">List
                    </a>
                  </li>
                  <li
                    <?php if($page=="DocumentDetail" ) echo 'class="active"'; ?>>
                    <a href="
                      <?= PATH . 'document/detail' ?>">Detail
                    </a>
                  </li>
                  <li
                    <?php if($page=="DocumentAdd" ) echo 'class="active"'; ?>>
                    <a href="
                      <?= PATH . 'document/add' ?>">Add
                    </a>
                  </li>
                  <li
                    <?php if($page=="DocumentEdit" ) echo 'class="active"'; ?>>
                    <a href="
                      <?= PATH . 'document/edit' ?>">Edit
                    </a>
                  </li>
                  <li
                    <?php if($page=="DocumentGraph" ) echo 'class="active"'; ?>>
                    <a href="
                      <?= PATH . 'document/graph' ?>">Visualization
                    </a>
                  </li>
                  <li
                    <?php if($page=="DocumentDelete" ) echo 'class="active"'; ?>>
                    <a href="
                      <?= PATH . 'document/delete' ?>">Delete
                    </a>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <?php if (!isset($_SESSION['user'])): ?>
                  <li
                    <?php if($page=="Login" ) echo 'class="active"'; ?>>
                    <a href="
                      <?= PATH . 'account/login' ?>">Login
                    </a>
                  </li>
                  <li
                    <?php if($page=="Register" ) echo 'class="active"'; ?>>
                    <a href="
                      <?= PATH . 'account/register' ?>">Register
                    </a>
                  </li>
                  <?php else: ?>
                  <li>
                    <a href="#">
                      <span class="glyphicon glyphicon-user"></span>&nbsp;
                      <?php echo $_SESSION['user']['username']; ?>
                    </a>
                  </li>
                  <li>
                    <a href="
                      <?= PATH . 'account/logout' ?>">Logout
                    </a>
                  </li>
                  <?php endif; ?>
                </ul>
              </div>
              <!--/.nav-collapse -->
            </div>
          </nav>
          <div class="container">
            <div class="row">
              <div class="alert alert-dismissable" id="messageBar" style="display:none">
                <a href="#" class="close" id="hideAlert" aria-label="close">&times;</a>
                <strong class="type"></strong>
                <span class="message"></span>
              </div>
            </div>
          </div>
