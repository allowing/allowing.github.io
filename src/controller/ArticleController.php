<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 15:27
 */

namespace allowing\yunliwang\controller;


use allowing\yunliwang\model\MarkdownArticle;
use allowing\yunliwang\model\ArticleCat;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ArticleController extends Controller
{
    private $request;

    public function init()
    {
        parent::init();

        $this->request = Yii::$app->request;
    }

    public function behaviors()
    {
        $behaviors = [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get'],
                    'learn' => ['get'],
                ],
            ],
        ];

        if ($this->route == $this->id . '/index') {
            $behaviors[] = [
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'dependency' => [
                    'class' => 'yii\caching\FileDependency',
                    'fileName' => $this->getArticleMetaFileName($this->request->get('category')),
                ],
                'variations' => [$this->request->get()],
            ];
        }

        if ($this->route == $this->id . '/view') {
            $behaviors[] = [
                'class' => 'yii\filters\PageCache',
                'only' => ['view'],
                'dependency' => [
                    'class' => 'yii\caching\FileDependency',
                    'fileName' => $this->getArticleFileName(
                        $this->request->get('category'),
                        $this->request->get('id')
                    ),
                ],
                'variations' => [$this->request->get()],
            ];
        }

        return $behaviors;
    }

    public function actionIndex($category)
    {
        $models = MarkdownArticle::findAll($this->getArticleDir($category));
        if (!$models) {
            throw new NotFoundHttpException();
        }
        $catModel = ArticleCat::findByIdentity($category);
        return $this->render('index', [
            'catModel' => $catModel,
            'models' => $models,
        ]);
    }

    public function actionView($id, $category)
    {
        $model = MarkdownArticle::findOne($this->getArticleDir($category), $id);
        if (!$model) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * 获取文章的目录路径
     *
     * 传递一个文章分类的字符串，如 learn , 表示要获取这个分类的路径
     * 返回的信息类似 D:/foo/bar
     *
     * @param string $category 文章的分类
     * @return string 该分类的路径
     */
    private function getArticleDir($category)
    {
        return Yii::getAlias("@app/markdown/$category");
    }

    private function getArticleMetaFileName($category)
    {
        $metaFileName = $this->getArticleDir($category) . '/meta.php';
        if (!is_file($metaFileName)) {
            throw new NotFoundHttpException('要访问的资源不存在');
        }
        return $metaFileName;
    }

    private function getArticleFileName($category, $id)
    {
        $articleFileName = $this->getArticleDir($category) . "/$id.md";
        if (!is_file($articleFileName)) {
            throw new NotFoundHttpException('要访问的资源不存在');
        }
        return $articleFileName;
    }
}