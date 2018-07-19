<?php
namespace frontend\controllers;
use common\models\Msg;
use Yii;
use yii\web\Controller;
class MsgController extends Controller
{ 
     //不加载layout
    public $layout = false;
    public $enableCsrfValidation = false;
    public function actionIndex()
    {  
       $msgs = Msg::find()->all();
       return $this->render('index', compact('msgs'));
    }
    public function actionAdd()
    {
      if (Yii::$app->request->isPost) {
            #步骤2：接受数据
            $uname = Yii::$app->request->post('uname');
            $content = Yii::$app->request->post('content');
            // dump($uname);
            #步骤3：插入数据
            $msg = new Msg;
            $msg->uname = $uname;
            $msg->content = $content;
            $msg->created_at =  $msg->updated_at = time();
            $rs = $msg->save();
            #步骤4：判断跳转
            
            return $this->redirect(['/msg']);
        }   
    
    }
    // public function actionDel(){
    //     $userInfo = User::find()->where(['id' => 2])->one();
    //     $userInfo->name = 'ccc';
    //     $userInfo->save();
    //     return $this->redirect(['/msg']);
        
    // }
}
