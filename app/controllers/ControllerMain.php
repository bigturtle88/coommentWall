<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\models\ModelMain;

use app\components\AuthFacebook;


/**
 * Class ControllerMain
 * @package app\controllers
 */
class ControllerMain extends Controller
{
    /**
     * @var
     */
    public $model;
    public $view;
    public $result;
    public $data = array();

    /**
     * ControllerMain constructor.
     */
    function __construct()
    {


    }

    /**
     * @return string
     */
    public function actionIndex()
    {

        $model = new ModelMain('comments');
        $model->create(['id'], [12]);
        $model->create(['id'], [22]);
        $model->create(['id'], [33]);
        // $faceBook = new AuthFacebook('1557528790937808','c1fe00b9d4651d8262c2a7ccf633a218','http://commentwall.loc/');
        $fb = new \Facebook\Facebook([
            'app_id' => '1557528790937808',
            'app_secret' => '6aeaec7b308932e72112279c8808962b',
            'default_graph_version' => 'v2.9',
            //'default_access_token' => '{access-token}', // optional
        ]);

      // $helper = $fb->getJavaScriptHelper();

        try {
      //      $accessToken = $helper->getAccessToken();

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

        }
        echo '<h3>Access Token</h3>';
        $accessToken =    "EAAWIkG5PsNABAIW8wJtzS4Y7qLCZA222k7FLWDyx4EZC7XZCjDiIcZCDF5XP04dlM7ZA4bjZAbvqgAcwF3D7aqHHjESfama5nSE0DkQED2C34pDpGJfZCZBxKViN8xR6DjJMndhuqhT56CzlVJZAiIiz9ljPseXIXrrIjZCje9xsXcTZAbzPdgKW86GF2WPQVlDmZBwZD";
        if ( isset($accessToken)) { $_SESSION['fb_access_token'] = (string) $accessToken;
            //var_dump($accessToken->getValue());



            $response = $fb->get('/me?fields=id,name', $accessToken);
            $user = $response->getGraphUser();
            var_dump($user);die();
        }


        View::render('header.php', $data);
        View::render('index.php', $data);
        View::render('footer.php', $data);
    }
}