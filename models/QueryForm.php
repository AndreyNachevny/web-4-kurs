<?php

namespace app\models;

use Yii;
use yii\base\Model;

class QueryForm extends Model
{
    public $cities = [];
    public $brand_name;
    public $year;
    public $product_name;

    public function scenarios()
    {
        return [
            'query1' => ['cities'],
            'query2' => ['brand_name'],
            'query4' => ['year'],
            'query5' => ['product_name'],
        ];
    }

    public function rules()
    {
        return [
            ['cities', 'required', 'message' => 'Выберите хотя бы один город'],
            ['cities', 'each', 'rule' => ['in', 'range' => ['Краснодар', 'Сочи', 'Ессентуки']]],

            ['brand_name', 'required', 'message' => 'Укажите бренд'],
            ['brand_name', 'string', 'max' => 100],

            ['year', 'required', 'message' => 'Укажите год'],
            ['year', 'integer', 'min' => 2000, 'max' => date('Y') + 1, 'message' => 'Год должен быть от 2000 до ' . (date('Y') + 1)],

            ['product_name', 'required', 'message' => 'Укажите наименование товара'],
            ['product_name', 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'cities' => 'Города',
            'brand_name' => 'Бренд',
            'year' => 'Год',
            'product_name' => 'Наименование товара',
        ];
    }
}