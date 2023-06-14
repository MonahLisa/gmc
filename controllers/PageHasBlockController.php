<?php

namespace app\controllers;

use app\models\BlockGallery;
use app\models\BlockImg;
use app\models\BlockImgText1;
use app\models\BlockImgText2;
use app\models\BlockImgText3;
use app\models\BlockImgText4;
use app\models\BlockText;
use app\models\BlockText21;
use app\models\BlockText22;
use app\models\BlockText31;
use app\models\BlockText32;
use app\models\PageHasBlock;
use app\models\PageHasBlockSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageHasBlockController implements the CRUD actions for PageHasBlock model.
 */
class PageHasBlockController extends Controller
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
     * Lists all PageHasBlock models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PageHasBlockSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PageHasBlock model.
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
     * Creates a new PageHasBlock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PageHasBlock();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PageHasBlock model.
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
     * Deletes an existing PageHasBlock model.
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
        $last_el_id = PageHasBlock::find()->where(['page_id' => $page])->orderBy(['id'=> SORT_DESC])->one();
        $last_el = PageHasBlock::findOne(['id' => $last_el_id['id']]);

//        var_dump($page_block_model->number != $last_el->number);
        if($page_block_model->number != $last_el->number){
            for ($i = $number+1; $i <= $last_el->number; $i++){
                $page_el = PageHasBlock::findOne(['page_id' => $page, 'number'=>$i]);
                $page_el->number = $number;
                $page_el->save();
                $number = $number+1;
            }
        }

//        if($page_block_model->text_block_id != null){
//            $block = BlockText::findOne(['id' => $page_block_model->text_block_id]);
//            $block->delete();
//        }
//
//        if($page_block_model->text_2_1_block_id != null){
//            $block = BlockText21::findOne(['id' => $page_block_model->text_2_1_block_id]);
//            $block->delete();
//        }
//        if($page_block_model->text_2_2_block_id != null){
//            $block = BlockText22::findOne(['id' => $page_block_model->text_2_2_block_id]);
//            $block->delete();
//        }
//        if($page_block_model->text_3_1_block_id != null){
//            $block = BlockText31::findOne(['id' => $page_block_model->text_3_1_block_id]);
//            $block->delete();
//        }
//        if($page_block_model->text_3_2_block_id != null){
//            $block = BlockText32::findOne(['id' => $page_block_model->text_3_2_block_id]);
//            $block->delete();
//        }
//        if($page_block_model->img_block_id != null){
//            $block = BlockImg::findOne(['id' => $page_block_model->img_block_id]);
//            $block->delete();
//        }
//        if($page_block_model->img_text_1_block != null){
//            $block = BlockImgText1::findOne(['id' => $page_block_model->img_text_1_block]);
//            $block->delete();
//        }
//        if($page_block_model->img_text_2_block != null){
//            $block = BlockImgText2::findOne(['id' => $page_block_model->img_text_2_block]);
//            $block->delete();
//        }
//        if($page_block_model->img_text_3_block != null){
//            $block = BlockImgText3::findOne(['id' => $page_block_model->img_text_3_block]);
//            $block->delete();
//        }
//        if($page_block_model->img_text_4_block != null){
//            $block = BlockImgText4::findOne(['id' => $page_block_model->img_text_4_block]);
//            $block->delete();
//        }
//        if($page_block_model->gallery_block_id != null){
//            $block = BlockGallery::findOne(['id' => $page_block_model->gallery_block_id]);
//            $block->delete();
//
//        }

        $this->findModel($id)->delete();

        return $this->redirect(['page/view', 'id' => $page]);
    }


    /**
     * Deletes an existing PageHasBlock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionArrowup($num, $page)
    {
        $page_block1 = PageHasBlock::findOne(['number'=>$num, 'page_id' => $page]);
        $page_block2 = PageHasBlock::findOne(['number'=>$num-1, 'page_id' => $page]);
        $page_block2->number = $num;
        $page_block1->number = $num-1;
        $page_block1->save();
        $page_block2->save();


        return $this->redirect(['page/view', 'id' => $page]);
    }


    /**
     * Deletes an existing PageHasBlock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionArrowdown($num, $page)
    {
        $page_block1 = PageHasBlock::findOne(['number'=>$num, 'page_id' => $page]);
        $page_block2 = PageHasBlock::findOne(['number'=>$num+1, 'page_id' => $page]);
        $page_block2->number = $num;
        $page_block1->number = $num+1;
        $page_block1->save();
        $page_block2->save();

        return $this->redirect(['page/view', 'id' => $page]);
    }

    /**
     * Finds the PageHasBlock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PageHasBlock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PageHasBlock::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
