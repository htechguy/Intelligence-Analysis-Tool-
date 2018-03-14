<?php
$page = "DocumentList";
include('_Header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group row">
                <div class="col-xs-10">
                    <select class="form-control" id="documentSelectList">
                        <?php foreach($documents as $document): ?>
                        <option value="<?php echo $document['id']; ?>">
                            <?php echo $document['name']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xs-2 text-right">
                    <button type="button" id="addToList" class="btn btn-primary">Add to List</button>
                </div>
            </div>
            <div class="panel panel-default" id="selectedDocPanelTemplate" style="display:none;">
                <div class="panel-heading"></div>
                <div class="panel-body"></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Selected Documents</div>
                <div class="panel-body documentPanelBody" id="selectedDocumentsPanel"></div>
            </div>
        </div>
    </div>
</div>
<!-- /container -->
<?php
include('_Footer.php');
?>
