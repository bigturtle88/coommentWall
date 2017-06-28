<?php

namespace app\logic;

use app\components\AuthFacebook;

class Auth
{

    const APP_ID = '1557528790937808';
    const APP_SECRET = '6aeaec7b308932e72112279c8808962b';

    public static function init()
    {
        $fb = new \Facebook\Facebook(['app_id' => APP_ID,
            'app_secret' => APP_SECRET,
            'default_graph_version' => 'v2.9',
        ]);
        $helper = $fb->getJavaScriptHelper();
        try {
            $accessToken = $helper->getAccessToken();
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        if (!isset($accessToken)) {
            echo 'No cookie set or no OAuth data could be obtained from cookie.';
            return null;
        }
         var_dump($accessToken);
    }

}