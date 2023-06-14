<?php

namespace app\controllers;

use app\models\NavbarItem;
use app\models\NavbarItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NavbarItemController implements the CRUD actions for NavbarItem model.
 */
class NavbarItemController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all NavbarItem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NavbarItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NavbarItem model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NavbarItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new NavbarItem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $elements = NavbarItem::find()->all();
                if($elements === null){
                    $model->number = 1;
                }else{
                    $last_el_id = NavbarItem::find()->orderBy(['number'=> SORT_DESC])->one();
                    $last_el = NavbarItem::findOne(['id' => $last_el_id]);

//                    $last_el_id = NavbarItem::find()->orderBy(['number'=> SORT_DESC])->one();
//                    $last_el = NavbarItem::findOne(['id' => $last_el_id]);

                    $model->number = $last_el->number+1;
                }
                $model->save();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



    /**
     * Creates a new NavbarItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreateDropdown()
    {
        $model = new NavbarItem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $elements = NavbarItem::find()->all();
                if($elements === null){
                    $model->number = 1;
                }else{
                    $last_el_id = NavbarItem::find()->orderBy(['number'=> SORT_DESC])->one();
                    $last_el = NavbarItem::findOne(['id' => $last_el_id]);
                    $model->number = $last_el->number+1;
                }
                $model->save();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create-dropdown', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing NavbarItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Updates an existing NavbarItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAddLink($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->nav_item_page_id = null;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('add-link', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NavbarItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAddPage($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->nav_item_link = '#';
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('add-page', [
            'model' => $model,
        ]);
    }




    /**
     * Deletes an existing PageHasBlock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionArrowup($num)
    {
        $nav_block1 = NavbarItem::findOne(['number'=>$num]);
        $nav_block2 = NavbarItem::findOne(['number'=>$num-1]);
        $nav_block2->number = $num;
        $nav_block1->number = $num-1;
        $nav_block1->save();
        $nav_block2->save();


        return $this->redirect(['index']);
    }


    /**
     * Deletes an existing PageHasBlock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionArrowdown($num)
    {
        $nav_block1 = NavbarItem::findOne(['number'=>$num]);
        $nav_block2 = NavbarItem::findOne(['number'=>$num+1]);
        $nav_block2->number = $num;
        $nav_block1->number = $num+1;
        $nav_block1->save();
        $nav_block2->save();

        return $this->redirect(['index']);
    }





    /**
     * Deletes an existing NavbarItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $page_block_model = $this->findModel($id);
        $page = $page_block_model->page_id;
        $number = $page_block_model->number;
//        var_dump($number);
        $last_el_id = NavbarItem::find()->where(['page_id' => $page])->orderBy(['id'=> SORT_DESC])->one();
        $last_el = NavbarItem::findOne(['id' => $last_el_id['id']]);
        $this->findModel($id)->delete();
        for ($i = $number+1; $i <= $last_el->number; $i++){
            $page_el = PageHasBlock::findOne(['page_id' => $page, 'number'=>$i]);
            $page_el->number = $number;
            $page_el->save();
            $number = $number+1;
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the NavbarItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return NavbarItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NavbarItem::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
