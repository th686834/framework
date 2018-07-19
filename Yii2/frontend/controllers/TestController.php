<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
// use yii\web\Customer;

/**
 * Site controller
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        // echo  111;
        return $this->render('index',[
            'username'=>'小左左',
            'oreder'=>[
                'a'=>'papapa',
                'b'=>'aaaa',
            ],
        ]);
    }

   public function actionAdd(){
       echo 888;
   }
   public function actionUpd(){
     Customer::updateAll(['uname' => 'a'], 'uname = b');
   }
}
