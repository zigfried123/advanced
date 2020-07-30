<?php

namespace frontend\controllers;

use common\modules\service\models\Service;
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;


class ServiceController extends ActiveController
{
    public $modelClass = 'common\modules\service\models\Service';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'get-services-by-city'  => ['get'],
                    'get-service-by-id'  => ['get'],
                ],
            ],
            'corsFilter' => [
                'class' => Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => ['http://www.myserver.com', 'https://www.myserver.com'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE'],
                ],

            ],
        ];
    }

    public function actionGetServicesByCity($city)
    {
        $services = Service::find()->where(['city'=>$city])->all();

        if(empty($services)){
            return \yii\helpers\Json::encode(['status'=>'error','message'=>'Services not found']);
        }

        return \yii\helpers\Json::encode($services);
    }

    public function actionGetServiceById($id)
    {
        $service = Service::find()->where(['id'=>$id])->one();

        if(!isset($service)){
            return \yii\helpers\Json::encode(['status'=>'error','message'=>'Service not found']);
        }

        return \yii\helpers\Json::encode($service);
    }
}
