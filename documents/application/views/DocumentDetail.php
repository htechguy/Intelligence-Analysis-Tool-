<?php
$page = "DocumentDetail";
include('_Header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Documents</div>
                <div class="panel-body documentPanelBody">
                    <ul class="documentList">
                        <?php foreach($documents as $document): ?>
                        <li>
                            <a href="#" class="btn btn-link documentListItem" data-id="
                                <?php echo $document['id']; ?>" >
                                <?php echo $document['name']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Selected Document Content</div>
                <div class="panel-body documentPanelBody" id="documentContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- /container -->
<?php
include('_Footer.php');
?>
