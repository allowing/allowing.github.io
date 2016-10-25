<?php

namespace allowing\yunliwang\controllercli;

use allowing\yunliwang\model\Article;
use allowing\yunliwang\model\ArticleContent;
use Yii;
use yii\console\Controller;

class HelloController extends Controller
{
    public function actionIndex()
    {
        $this->stdout(__FILE__ . 'on line ' . __LINE__ . "\nHello, Console!");
    }

    public function actionMdToDb()
    {
        $path = Yii::getAlias('@resource/markdown/learn');
        $dh = opendir($path);
        $meta = require $path . '/meta.php';
        while (false !== $name = readdir($dh)) {
            $filename = "$path/$name";
            if (
                $name != '.' &&
                $name != '..' &&
                pathinfo($name)['extension'] == 'md' &&
                is_file($filename)
            ) {
                $title = explode(' - ', $meta[pathinfo($name)['filename']]['title']);
                $article = new Article();
                $article->title
                    = $article->seo_title
                    = $title[1];
                $article->created_at = $article->updated_at = filectime($filename);

                switch ($title[0]) {
                    case 'PHP教程';
                        $article->cat_id = 10;
                        break;
                    case 'HTML5教程';
                        $article->cat_id = 11;
                        break;
                    case 'JS教程';
                        $article->cat_id = 12;
                        break;
                    case 'CSS教程';
                        $article->cat_id = 13;
                        break;
                    case 'JAVA教程';
                        $article->cat_id = 14;
                        break;
                    case '其他教程';
                        $article->cat_id = 15;
                        break;
                    case 'GIT教程';
                        $article->cat_id = 16;
                        break;
                }

                if ($article->save()) {
                    $articleContent = new ArticleContent();
                    $articleContent->article_id = $article->id;
                    $articleContent->content = file_get_contents($filename);
                    $articleContent->save();
                } else {
                    print_r($article->getFirstErrors());
                }
            }
        }
    }
}
