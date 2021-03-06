<?php

namespace app\controllers;
use app\models\User;
use fw\core\App;
use fw\widgets\language\Language;

/**
 * Description of App
 *
 */
class AppController extends \fw\core\base\Controller{
    
    public $menu;
    public $meta = [];
    
    public function __construct($route) {
        parent::__construct($route);

        if(!User::isLogged() && $route['action'] != 'login'){
            redirect('/user/login');
        }
        if(User::isLogged() && !User::isSw() && $route['action'] != 'sw'){
            redirect('/user/sw');
        }
        new \app\models\Main;
        App::$app->setProperty('langs', Language::getLanguages());
        App::$app->setProperty('lang', Language::getLanguage(App::$app->getProperty('langs')));
        //debug(App::$app->getProperties());
    }
    
    protected function setMeta($title = '', $desc = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
    
}
