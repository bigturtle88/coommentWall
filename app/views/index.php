<div class="container">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h4 class="page-header"><a href="<?= App::baseUrl() ?>/app/">
                <img id="logo"
                     src="<?= App::baseUrl() ?>/app/views/img/logo.png"
                     alt="Whitesquare logo">
            </a></h4>
    </div>


    <div class="content">


        <div class="col-xs-2">

            <div class="row">
                <div id="buttonControl">

                    <div class="col-xs-6">

                        <div class="fb-login-button" onlogin="logInWithFacebook();" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


        <div id="infoPanel">
            <?= $data['content']; ?></div>
    </div>


