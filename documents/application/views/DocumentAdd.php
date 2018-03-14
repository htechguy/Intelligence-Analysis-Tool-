<?php
$page = "DocumentAdd";
include('_Header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">File Upload</div>
                <div class="panel-body" id="selectedDocumentsPanel">
                    <div class="form-group row">
                        <div class="col-xs-3">
                            <input type="file" id="documentFile">
                            </div>
                            <div class="col-xs-3">
                                <button type="button" id="uploadFile" class="btn btn-primary">Upload Document</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->
    <?php
include('_Footer.php');
?>
				