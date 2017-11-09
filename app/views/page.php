
<div class="container">
    <div class="content">

    <div class="text-center">
        <div class="page-header"><a href="<?= App::baseUrl() ?>">
                <img id="logo"
                     src="<?= App::baseUrl() ?>/app/views/img/logo.png"
                     alt="Whitesquare logo">
            </a></div>

    </div>
    </div>
    <div class="container">
        <div class="dialog">

            <div class="col-xs-8"><form>
                <textarea class="form-control" rows="3" id="text"></textarea></form>
            </div>
            <div class="col-xs-2">
                <button type="button" class="btn btn-success" id="send">Send</button>
            </div>
        </div>
        <div class="list">

        <div class="col-xs-12"><div id="tree" data-jstree='{"icon":"path/file.png"}'></div>
        </div>
        </div>
    </div>


</div>
<script src="<?= App::baseUrl() ?>/app/views/dist/jstree.js"></script>
<script src="<?= App::baseUrl() ?>/app/views/js/page.js"></script>


