<?php

namespace app\controllers;

use app\models\NavDropdown;
use app\models\NavDropdownSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NavDropdownController implements the CRUD actions for NavDropdown model.
 */
class NavDropdownController extends Controller
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
     * Lists all NavDropdown models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NavDropdownSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NavDropdown model.
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
     * Creates a new NavDropdown model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $model = new NavDropdown();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $elements = NavDropdown::find()->where(['nav_item_id' => $id])->all();
                if($elements === null){
                    $model->number = 1;
                }else{
                    $last_el_id = NavDropdown::find()->where(['nav_item_id' => $id])->orderBy(['number'=> SORT_DESC])->one();
                    $last_el = NavDropdown::findOne(['id' => $last_el_id]);
                    $model->number = $last_el->number+1;
                }
                $model->nav_item_id = $id;
                $model->save();
                return $this->redirect(['navbar-item/index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NavDropdown model.
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
            $model->item_page_id = null;
            $model->save();
            return $this->redirect(['navbar-item/index']);
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
            $model->item_link = '#';
            $model->save();
            return $this->redirect(['navbar-item/index']);
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
    public function actionArrowup($num, $nav_item_id)
    {
        $nav_block1 = NavDropdown::findOne(['number'=>$num, 'nav_item_id'=>$nav_item_id]);
        $nav_block2 = NavDropdown::findOne(['number'=>$num-1, 'nav_item_id'=>$nav_item_id]);
        $nav_block2->number = $num;
        $nav_block1->number = $num-1;
        $nav_block1->save();
        $nav_block2->save();


        return $this->redirect(['navbar-item/index']);
    }


    /**
     * Deletes an existing PageHasBlock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionArrowdown($num, $nav_item_id)
    {
        $nav_block1 = NavDropdown::findOne(['number'=>$num, 'nav_item_id'=>$nav_item_id]);
        $nav_block2 = NavDropdown::findOne(['number'=>$num+1, 'nav_item_id'=>$nav_item_id]);
        $nav_block2->number = $num;
        $nav_block1->number = $num+1;
        $nav_block1->save();
        $nav_block2->save();

        return $this->redirect(['navbar-item/index']);
    }



    /**
     * Deletes an existing NavDropdown model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NavDropdown model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return NavDropdown the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NavDropdown::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
