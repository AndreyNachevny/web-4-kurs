<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Brands;
use app\models\Cities;
use app\models\Enterprises;
use app\models\Products;
use app\models\Orders;
use app\models\OrderItems;

class CosmeticController extends Controller
{
    public function actionBrands()
    {
        $brands = Brands::find()->all();
        return $this->render('brands', ['brands' => $brands]);
    }

    public function actionCities()
    {
        $cities = Cities::find()->all();
        return $this->render('cities', ['cities' => $cities]);
    }

    public function actionEnterprises()
    {
        $enterprises = Enterprises::find()->all();
        return $this->render('enterprises', ['enterprises' => $enterprises]);
    }

    public function actionProducts()
    {
        $products = Products::find()->all();
        return $this->render('products', ['products' => $products]);
    }

    public function actionOrders()
    {
        $orders = Orders::find()->all();
        return $this->render('orders', ['orders' => $orders]);
    }

    public function actionOrderItems()
    {
        $orderItems = OrderItems::find()->all();
        return $this->render('order-items', ['orderItems' => $orderItems]);
    }
}