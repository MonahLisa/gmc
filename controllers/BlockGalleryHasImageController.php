<?php

namespace app\controllers;

use app\models\BlockGalleryHasImage;
use app\models\BlockGalleryHasImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BlockGalleryHasImageController implements the CRUD actions for BlockGalleryHasImage model.
 */
class BlockGalleryHasImageController extends Controller
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
     * Lists all BlockGalleryHasImage models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlockGalleryHasImageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlockGalleryHasImage model.
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
     * Creates a new BlockGalleryHasImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($gal_id)
    {
        $model = new BlockGalleryHasImage();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->url = UploadedFile::getInstance($model, 'url');
                $newFile = md5($model->url->baseName . '.' . $model->url->extension . time()). '.' . $model->url->extension;

                $model->url->saveAs('@app/web/uploads/gallery_block/'. $newFile);
                $model->url = $newFile;
                $model->block_gallery_id=$gal_id;

                $photos = BlockGalleryHasImage::find()->all();

                if(count($photos) === 0) {
                    $model->number = 1;
                }else{
//                    $last_el_id = BlockGalleryHasImage::find()->where(['block_gallery_id' => $gal_id])->max('number')->one();
                    $last_el_id = (new \yii\db\Query())
                        ->from('block_gallery_has_image')
                        ->where(['block_gallery_id' => $gal_id])
                        ->max('number');

                    $model->number = $last_el_id+1;
                }


                $model->save();
                return $this->redirect(['index', 'id' => $gal_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BlockGalleryHasImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->url = UploadedFile::getInstance($model, 'url');
            $newFile = md5($model->url->baseName . '.' . $model->url->extension . time()). '.' . $model->url->extension;

            $model->url->saveAs('@app/web/uploads/gallery_block/'. $newFile);
            $model->url = $newFile;
            $model->save();

            return $this->redirect(['index', 'id' => $model->block_gallery_id]);
        }

        return $this->render('update', [
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
    public function actionArrowup($num, $gal_id)
    {
        $gal_photo1 = BlockGalleryHasImage::findOne(['number'=>$num, 'block_gallery_id' => $gal_id]);
        $gal_photo2 = BlockGalleryHasImage::findOne(['number'=>$num-1, 'block_gallery_id' => $gal_id]);
        $gal_photo2->number = $num;
        $gal_photo1->number = $num-1;
        $gal_photo1->save();
        $gal_photo2->save();


        return $this->redirect(['index', 'id' => $gal_id]);
    }


    /**
     * Deletes an existing PageHasBlock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionArrowdown($num, $gal_id)
    {
        $gal_photo1 = BlockGalleryHasImage::findOne(['number'=>$num, 'block_gallery_id' => $gal_id]);
        $gal_photo2 = BlockGalleryHasImage::findOne(['number'=>$num+1, 'block_gallery_id' => $gal_id]);
        $gal_photo2->number = $num;
        $gal_photo1->number = $num+1;
        $gal_photo1->save();
        $gal_photo2->save();

        return $this->redirect(['index', 'id' => $gal_id]);
    }














    /**
     * Deletes an existing BlockGalleryHasImage model.
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
     * Finds the BlockGalleryHasImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return BlockGalleryHasImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlockGalleryHasImage::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
