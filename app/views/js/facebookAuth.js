window.fbAsyncInit = function() {
    FB.init({
        appId: '1557528790937808',
        cookie: true, // This is important, it's not enabled by default
        version: 'v2.2'
    });
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.9&appId=1557528790937808";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
logInWithFacebook = function () {
    FB.login(function (response) {
        if (response.authResponse) {
            location.reload();
        } else {
            alert('User cancelled login or did not fully authorize.');
        }
    });
    return false;
};


