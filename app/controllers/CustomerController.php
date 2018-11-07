<?php namespace app\controllers;

use app\models\Customer;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CustomerController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', ['query' => Customer::find()]);
    }

    /**
     * @param int|null $id
     * @return string|\yii\web\Response
     * @throws BadRequestHttpException
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionEdit(int $id = null)
    {
        $customer = is_null($id)
            ? \Yii::createObject(Customer::class)
            : Customer::findOne($id);

        if (is_null($customer)) {
            throw new NotFoundHttpException("Клиент не найден");
        }

        if (\Yii::$app->request->getIsPost()) {
            $customer->load(\Yii::$app->request->post());
            if (!$customer->save()) {
                throw new BadRequestHttpException(current($customer->firstErrors));
            }

            return $this->redirect(['edit', 'id' => $customer->id]);
        }

        return $this->render('edit', compact('customer'));
    }
}
