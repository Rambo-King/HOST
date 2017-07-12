<?php
namespace app\controllers;

use yii\web\Controller;

class HomeController extends Controller{

    public function actionAbout(){
        return $this->render('about');
    }

    public function actionService(){
        return $this->render('service');
    }

    public function actionPay(){
        return $this->render('pay');
    }

    public function actionContact(){
        return $this->render('contact');
    }

}

