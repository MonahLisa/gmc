<?php

namespace app\controllers;

use app\models\BlockCover;
use app\models\BlockCoverSearch;
use app\models\PageHasBlock;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BlockCoverController implements the CRUD actions for BlockCover model.
 */
class BlockCoverController extends Controller
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
     * Lists all BlockCover models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlockCoverSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlockCover model.
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
     * Creates a new BlockCover model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $page_id = $_GET['page_id'];
        $model = new BlockCover();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save();
                $page_blocks = PageHasBlock::find()->where(['page_id' => $page_id])->all();

                $page_block = new PageHasBlock();
                $page_block->page_id = $page_id;
                $page_block->cover_block_id = $model->id;
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
     * Updates an existing BlockCover model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $page_id = $_GET['page_id'];
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['page/view', 'id' => $page_id ]);
        }

        return $this->render('update', [
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

            $model->img->saveAs('@app/web/uploads/cover/'. $newFile);
            $model->img = $newFile;
            $model->save();
            return $this->redirect(['page/view', 'id' => $page_id ]);
        }

        return $this->render('update-photo', [
            'model' => $model,
        ]);
    }








    /**
     * Deletes an existing BlockCover model.
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
     * Finds the BlockCover model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return BlockCover the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlockCover::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
