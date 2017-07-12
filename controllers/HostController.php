<?php
namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\web\Controller;

class HostController extends Controller{

    public function actionCate($id = 0){
        $model = Category::find()->where(['category_id' => $id])->one();

        if($model->level == 0){
            if(Category::HasChildren($id)){
                $categories = Category::find()->where(['parent_id' => $id])->all();
                return $this->render('cate2', [
                    'model' => $model,
                    'categories' => $categories,
                ]);
            }else{
                $products = Product::find()->where(['category_id' => $id])->all();
                return $this->render('cate1', [
                    'model' => $model,
                    'products' => $products,
                ]);
            }
        }else{
            $categories = Category::find()->where(['parent_id' => $model->parent_id])->all(); //二级分类
            if(Category::HasChildren($id)){ //有三级分类 取二级分类下所有三级分类 及其产品
                $categoryProducts = Category::CategoryProduct($id);
                return $this->render('cate3', [
                    'model' => $model,
                    'categories' => $categories,
                    'products' => $categoryProducts,
                ]);
            }else{
                $products = Product::find()->where(['category_id' => $id])->all();
                return $this->render('cate4', [
                    'model' => $model,
                    'categories' => $categories,
                    'products' => $products,
                ]);
            }
        }
    }

}

