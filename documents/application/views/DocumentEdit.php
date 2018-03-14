<?php
$page = "DocumentEdit";
include('_Header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group row">
                <div class="col-xs-10">
                    <select class="form-control" id="documentEditSelectList">
                        <?php foreach($documents as $document): ?>
                        <option value="<?php echo $document['id']; ?>">
                            <?php echo $document['name']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xs-2 text-right">
                    <button type="button" id="editDocument" class="btn btn-primary">Edit</button>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Edit Document</div>
                <div class="panel-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea class="form-control" rows="6" id="content"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="saveDocument">Save</button>
                            <button type="reset" class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /container -->
<?php
include('_Footer.php');
?>
