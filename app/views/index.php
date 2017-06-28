
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
                        <button type="button" class="btn btn-default"
                                id="rightButton">
                            <span aria-hidden="true"><div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>



    </div>
   
    <p><a href="#" onClick="logInWithFacebook()">Log In with the JavaScript SDK</a></p>

    <script>
        logInWithFacebook = function() {
            FB.login(function(response) {
                if (response.authResponse) {
                    alert('You are logged in &amp; cookie set!');
                    // Now you can redirect the user or do an AJAX request to
                    // a PHP script that grabs the signed request from the cookie.
                } else {
                    alert('User cancelled login or did not fully authorize.');
                }
            });
            return false;
        };
        window.fbAsyncInit = function() {
            FB.init({
                appId: '1557528790937808',
                cookie: true, // This is important, it's not enabled by default
                version: 'v2.2'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div id="infoPanel">

        </div>
    </div>


