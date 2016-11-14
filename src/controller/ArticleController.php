<?php

namespace allowing\yunliwang\controller;

use allowing\yunliwang\model\Article;
use allowing\yunliwang\model\ArticleSearch;
use allowing\yunliwang\model\Cat;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ArticleDbController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['create', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            [
                'class' => \yii\filters\PageCache::class,
                'only' => ['index'],
                'dependency' => [
                    'class' => \yii\caching\DbDependency::class,
                    'sql' => Article::find()
                        ->select('COUNT(*)')
                        ->createCommand()
                        ->getRawSql(),
                ],
                'duration' => 0,
                'variations' => [Yii::$app->request->get()],
            ],
            [
                'class' => \yii\filters\PageCache::class,
                'only' => ['view'],
                'dependency' => [
                    'class' => \yii\caching\DbDependency::class,
                    'sql' => Article::find()
                        ->select('MAX(`updated_at`)')
                        ->createCommand()
                        ->getRawSql(),
                ],
                'duration' => 0,
                'variations' => [Yii::$app->request->get()],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $catModel = Cat::findOne(Yii::$app->request->get('Article.cat_id'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'catModel' => $catModel,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
