<?php

namespace app\logic;

use app\components\AuthFacebook;

/**
 * Class Fb
 * @package app\logic
 */
class Fb
{

    const APP_ID = '1557528790937808';
    const APP_SECRET = '6aeaec7b308932e72112279c8808962b';
    private $fb;
    private $accessToken;

    /**
     * Fb constructor.
     */
    public function __construct()
    {
        $this->fb = new \Facebook\Facebook([
            'app_id' => self::APP_ID,
            'app_secret' => self::APP_SECRET,
            'default_graph_version' => 'v2.9',
        ]);
    }

    /**
     * @return \Facebook\Authentication\AccessToken|null
     */
    public function token()
    {

        $helper = $this->fb->getJavaScriptHelper();
        try {
            $this->accessToken = $helper->getAccessToken();
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        return $this->accessToken;
    }

    public function userParams()
    {
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $this->fb->get('/me?fields=id,name,email', $this->accessToken);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        return $response->getGraphUser();
    }

}