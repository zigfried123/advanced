<?php

namespace common\modules\service\controllers;

use common\models\SoftDeleteBehavior;
use yii\web\Controller;

/**
 * Default controller for the `service` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //echo 123; die;
        return $this->render('index');
    }
}
