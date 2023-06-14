<?php

namespace app\controllers;

use app\models\BlockImgText1;
use app\models\BlockImgText1Search;
use app\models\PageHasBlock;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
//use http\Url;

/**
 * BlockImgText1Controller implements the CRUD actions for BlockImgText1 model.
 */
class BlockImgText1Controller extends Controller
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
     * Lists all BlockImgText1 models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlockImgText1Search();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlockImgText1 model.
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
     * Creates a new BlockImgText1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $page_id = $_GET['page_id'];
        $model = new BlockImgText1();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save();
                $page_blocks = PageHasBlock::find()->where(['page_id' => $page_id])->all();

                $page_block = new PageHasBlock();
                $page_block->page_id = $page_id;
                $page_block->img_text_1_block = $model->id;
                if(count($page_blocks) == 0) {
                    $page_block->number = 1;
                }else{
                    $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                    $last_el = PageHasBlock::findOne(['id' => $last_el_id]);

                    $page_block->number = $last_el->number+1;
                }

                $page_block->save();
                return $this->redirect(['page/view', 'id' => $page_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }





    /**
     * Updates an existing BlockImgText1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatePhoto($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $page_id = $_GET['page_id'];
            $model->img = UploadedFile::getInstance($model, 'img');
            $newFile = md5($model->img->baseName . '.' . $model->img->extension . time()). '.' . $model->img->extension;

            $model->img->saveAs('@app/web/uploads/image/'. $newFile);
            $model->img = $newFile;
            $model->save();
            return $this->redirect(['page/view', 'id' => $page_id ]);
        }

        return $this->render('update-photo', [
            'model' => $model,
        ]);
    }

//    function drupal_urlencode($text) {
//        if ($this->variable_get('clean_url', '0')) {
//            return str_replace(array('%2F', '%26', '%2523'),
//                array('/', '&', '#'),
//                urlencode($text));
//        }
//        else {
//            return str_replace('%2F', '/', urlencode($text));
//        }
//    }


    /**
     * Updates an existing BlockImgText1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $page_id = $_GET['page_id'];
        $model = $this->findModel($id);
        $url = urldecode($page_id.'%23img-text-1-block-'.$model->id);



        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->save();
            return $this->redirect(['page/view', 'id' => $url ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BlockImgText1 model.
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
     * Finds the BlockImgText1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return BlockImgText1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlockImgText1::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
