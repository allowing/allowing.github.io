<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 1:07
 */

namespace allowing\yunliwang\model;

use Yii;
use yii\base\Model;
use cebe\markdown\GithubMarkdown;

class MarkdownArticle extends Model
{
    public $title;

    public $id;

    public $dir;

    public $iniMarkdown;

    public $category;

    private $_content;

    private $_updatedAt;

    private $_filename;

    private $_keywords;

    private $_description;

    public function __construct($dir, $config = [])
    {
        $this->dir = $dir;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['title', 'category', 'content', 'iniMarkdown', '!dir'], 'required'],
            ['title', 'string', 'max' => 50],
            ['category', 'in', 'range' => ['news', 'learn', 'experience']],
        ];
    }

    public function getFilename()
    {
        if (!is_null($this->_filename)) {
            return $this->_filename;
        }
        return $this->_filename = "{$this->dir}/{$this->category}/{$this->id}.md";
    }

    public function getContent()
    {
        if ($this->_content !== null) {
            return $this->_content;
        }
        return $this->_content = file_get_contents($this->filename);
    }

    public function setContent($content)
    {
        $this->_content = $content;

        return $this;
    }

    public function getHtmlContent()
    {
        $parser = new GithubMarkdown();
        return $parser->parse($this->content);
    }

    public function getUpdatedAt()
    {
        if (!is_null($this->_updatedAt)) {
            return $this->_updatedAt;
        }
        return $this->_updatedAt = filemtime($this->filename);
    }

    public function getKeywords()
    {
        if ($this->_keywords === null) {
            $this->_keywords = $this->title . ',允梨教育';
        }
        return $this->_keywords;
    }

    public function getDescription()
    {
        if ($this->_description === null) {
            $this->_description = mb_substr(strip_tags($this->htmlContent), 0, 90) . '......';
        }
        return $this->_description;
    }

    public static function findAll($dir, $category)
    {
        if (!file_exists($file = "$dir/$category/meta.php")) {
            return null;
        }
        $models = [];
        foreach (require $file as $id => $row) {
            $row['id'] = $id;
            $row['category'] = $category;
            $models[] = new static($dir, $row);
        }
        return $models;
    }

    public static function findOne($dir, $category, $id)
    {
        $meta = require "$dir/$category/meta.php";
        if (!isset($meta[$id])) {
            return null;
        }
        $row = $meta[$id];
        unset($meta);
        $row['id'] = $id;
        $row['category'] = $category;
        $_this = new static($dir, $row);
        return $_this;
    }

    public function fields()
    {
        return array_merge(parent::fields(), [
            'content',
        ]);
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        $metaFileName = "{$this->dir}/{$this->category}/meta.php";
        $meta = require $metaFileName;
        $this->id = uniqid();
        $meta = array_merge([$this->id => ['title' => $this->title]], $meta);
        $meta = var_export($meta, true);
        file_put_contents($metaFileName, "<?php return $meta;");

        file_put_contents("{$this->dir}/{$this->category}/{$this->id}.md", $this->content);
        return true;
    }

    /**
     * @Override
     */
    public function setAttributes($values, $safeOnly = true)
    {
        parent::setAttributes($values, $safeOnly);

        if (isset($values['iniMarkdown']) && $this->validate(['iniMarkdown'])) {

            preg_match('/(.*?)\n\s*?\n(.*)/s', $this->iniMarkdown, $match);

            $attributes = [];
            if (isset($match[1])) {
                $attributes = array_merge($attributes, parse_ini_string($match[1]));
            }
            if (isset($match[2])) {
                $attributes['content'] = $match[2];
            }

            $this->setAttributes($attributes);
        }
    }
}