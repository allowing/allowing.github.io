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
use allowing\yunliwang\model\ArticleForm;
use allowing\yunliwang\model\ArticleForm2;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use Exception;

class ArticleController extends Controller
{
    private $request;

    public $enableCsrfValidation = false;

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
        $models = MarkdownArticle::findAll($this->getArticleRootDir(), $category);
        if (!$models) {
            throw new NotFoundHttpException();
        }
        $catModel = ArticleCat::findByIdentity($category);
        return $this->render('index', [
            'catModel' => $catModel,
            'models' => $models,
        ]);
    }

    public function actionView($category, $id)
    {
        $model = MarkdownArticle::findOne($this->getArticleRootDir(), $category, $id);
        if (!$model) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * 发布文章
     *
     * 接收 post 过来的一个字符串。
     *
     * 字符串要求长这个样子
     *
     * ```md
     * [one]
     * key = value
     *
     * # 标题
     *
     * 段落
     *
     * 段落段落段落。
     *
     * ## 二号标题
     * ```
     *
     * 认为第一个换行符之前，都是这个文件的元信息，元信息用 ini 的格式表示。
     * 元信息通常用来指定分类，标题，作者，等信息。这些元信息的键是规定的。
     *
     * 键有：
     * category - 分类
     * title - 标题
     *
     * @return void
     */
    public function actionCreate()
    {

        $model = new MarkdownArticle($this->getArticleRootDir());
        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'category' => $model->category]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    private function getArticleRootDir()
    {
        return Yii::getAlias('@app/markdown');
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
        return $this->getArticleRootDir() . "/$category";
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