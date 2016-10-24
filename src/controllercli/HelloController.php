<?php

namespace allowing\yunliwang\controllercli;

use allowing\yunliwang\model\Article;
use allowing\yunliwang\model\ArticleContent;
use Directory;
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
                $article = new Article();
                $article->title = $article->seo_title = $meta[pathinfo($name)['filename']]['title'];
                $article->created_at = $article->updated_at = filectime($filename);
                $article->article_cat_id = 1;

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
