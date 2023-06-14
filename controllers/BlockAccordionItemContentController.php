<?php

namespace app\controllers;

use app\models\BlockAccordion;
use app\models\BlockAccordionItem;
use app\models\BlockAccordionItemContent;
use app\models\BlockAccordionItemContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlockAccordionItemContentController implements the CRUD actions for BlockAccordionItemContent model.
 */
class BlockAccordionItemContentController extends Controller
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
     * Lists all BlockAccordionItemContent models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlockAccordionItemContentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlockAccordionItemContent model.
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
     * Creates a new BlockAccordionItemContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $model = new BlockAccordionItemContent();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->block_accordion_item_id = $id;
                $model->save();
                $model_item = BlockAccordionItem::findOne(['id' => $model->block_accordion_item_id]);
                $model_accordion = BlockAccordion::findOne(['id' => $model_item->block_accordion_id]);
                return $this->redirect(['block-accordion/update-accordion-list', 'id' => $model_accordion->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }





    /**
     * Creates a new BlockAccordionItemContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreateText($id)
    {
        $model = new BlockAccordionItemContent();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->block_accordion_item_id = $id;
                $model->save();
                $model_item = BlockAccordionItem::findOne(['id' => $model->block_accordion_item_id]);
                $model_accordion = BlockAccordion::findOne(['id' => $model_item->block_accordion_id]);
                return $this->redirect(['block-accordion/update-accordion-list', 'id' => $model_accordion->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create-text', [
            'model' => $model,
        ]);
    }





    /**
     * Updates an existing BlockAccordionItemContent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_item = BlockAccordionItem::findOne(['id' => $model->block_accordion_item_id]);
        $model_accordion = BlockAccordion::findOne(['id' => $model_item->block_accordion_id]);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->item_text = null;
            $model->save();
            return $this->redirect(['block-accordion/update-accordion-list', 'id' => $model_accordion->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing BlockAccordionItemContent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateText($id)
    {
        $model = $this->findModel($id);
        $model_item = BlockAccordionItem::findOne(['id' => $model->block_accordion_item_id]);
        $model_accordion = BlockAccordion::findOne(['id' => $model_item->block_accordion_id]);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->doc_text=null;
            $model->doc_id=null;
            $model->save();
            return $this->redirect(['block-accordion/update-accordion-list', 'id' => $model_accordion->id]);
        }

        return $this->render('update-text', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BlockAccordionItemContent model.
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
     * Finds the BlockAccordionItemContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return BlockAccordionItemContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlockAccordionItemContent::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
