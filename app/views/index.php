<div id="fb-root"></div>
<script src="<?= App::baseUrl() ?>/app/views/js/facebookAuth.js"></script>

<div class="container">


    <div class="text-center">
        <h4 class="page-header"><a href="<?= App::baseUrl() ?>">
                <img id="logo"
                     src="<?= App::baseUrl() ?>/app/views/img/logo.png"
                     alt="Whitesquare logo">
            </a></h4>
        <div class="fb-login-button" onlogin="logInWithFacebook();" data-max-rows="1" data-size="large"
             data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false"
             data-use-continue-as="false"></div>
    </div>

    <div class="content">


    </div>


</div>


