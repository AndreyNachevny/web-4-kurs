<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;
use app\models\QueryForm;
use app\models\Cities;
use app\models\Brands;
use app\models\Products;
use yii\helpers\ArrayHelper;

class QueryController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

public function actionQuery1()
{
    $model = new QueryForm(['scenario' => 'query1']);
    $results = [];

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $cities = $model->cities;
        $query = new Query();
        $results = $query
            ->select(['e.enterprise_name', 'c.city_name'])
            ->from(['e' => 'Enterprises'])
            ->innerJoin(['c' => 'Cities'], 'e.city_id = c.city_id')
            ->where(['c.city_name' => $cities])
            ->all();
    }
    $allowedCities = ['Краснодар', 'Сочи', 'Ессентуки'];
    $cityList = array_combine($allowedCities, $allowedCities);

    return $this->render('query1', [
        'model' => $model,
        'results' => $results,
        'cityList' => $cityList,
    ]);
}

    public function actionQuery2()
    {
        $model = new QueryForm(['scenario' => 'query2']);
        $results = [];

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $brandName = $model->brand_name;
            $query = new Query();
            $results = $query
                ->select(['p.product_name', 'b.brand_name'])
                ->from(['p' => 'Products'])
                ->innerJoin(['b' => 'Brands'], 'p.brand_id = b.brand_id')
                ->where(['b.brand_name' => $brandName])
                ->all();
        }

        $brandList = ArrayHelper::map(Brands::find()->all(), 'brand_name', 'brand_name');

        return $this->render('query2', [
            'model' => $model,
            'results' => $results,
            'brandList' => $brandList,
        ]);
    }

    public function actionQuery3()
    {
        $query = new Query();
        $results = $query
            ->select(['b.brand_name', 'COUNT(p.product_id) AS product_count'])
            ->from(['b' => 'Brands'])
            ->leftJoin(['p' => 'Products'], 'b.brand_id = p.brand_id')
            ->groupBy(['b.brand_id', 'b.brand_name'])
            ->orderBy(['product_count' => SORT_DESC])
            ->all();

        return $this->render('query3', ['results' => $results]);
    }

    public function actionQuery4()
    {
        $model = new QueryForm(['scenario' => 'query4']);
        $results = [];

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $year = $model->year;
            $query = new Query();
            $results = $query
                ->select(['p.product_name', 'b.brand_name', 'o.order_date'])
                ->from(['oi' => 'OrderItems'])
                ->innerJoin(['o' => 'Orders'], 'oi.order_id = o.order_id')
                ->innerJoin(['p' => 'Products'], 'oi.product_id = p.product_id')
                ->innerJoin(['b' => 'Brands'], 'p.brand_id = b.brand_id')
                ->where(['YEAR(o.order_date)' => $year])
                ->all();
        }

        return $this->render('query4', [
            'model' => $model,
            'results' => $results,
        ]);
    }

    public function actionQuery5()
    {
        $model = new QueryForm(['scenario' => 'query5']);
        $result = null;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $productName = $model->product_name;
            $query = new Query();
            $row = $query
                ->select(['b.brand_name'])
                ->from(['p' => 'Products'])
                ->innerJoin(['b' => 'Brands'], 'p.brand_id = b.brand_id')
                ->where(['p.product_name' => $productName])
                ->one();

            $result = $row ? $row['brand_name'] : 'Товар не найден';
        }

        $productList = ArrayHelper::map(Products::find()->all(), 'product_name', 'product_name');

        return $this->render('query5', [
            'model' => $model,
            'result' => $result,
            'productList' => $productList,
        ]);
    }
}