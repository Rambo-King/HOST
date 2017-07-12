<?php
namespace app\controllers;

use app\models\Page;
use yii\web\Controller;

class HomeController extends Controller{

    public function actionAbout(){
        $model = Page::find()->where(['page_id' => 1])->one();
        return $this->render('about', [
            'model' => $model
        ]);
    }

    public function actionService(){
        $model = Page::find()->where(['page_id' => 2])->one();
        return $this->render('service', [
            'model' => $model
        ]);
    }

    public function actionPay(){
        $model = Page::find()->where(['page_id' => 3])->one();
        return $this->render('pay', [
            'model' => $model
        ]);
    }

    public function actionContact(){
        $model = Page::find()->where(['page_id' => 4])->one();
        return $this->render('contact', [
            'model' => $model
        ]);
    }

}

