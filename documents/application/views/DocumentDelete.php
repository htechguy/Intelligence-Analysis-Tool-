<?php
$page = "DocumentDelete";
include('_Header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group row">
                <div class="col-xs-10">
                    <select class="form-control" id="documentDeleteSelectList">
                        <?php foreach($documents as $document): ?>
                        <option value="<?php echo $document['id']; ?>">
                            <?php echo $document['name']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xs-2 text-right">
                    <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /container -->
<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Document?</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the document?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="deleteDocument" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<?php
include('_Footer.php');
?>
