<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 1:07
 */

namespace allowing\yunliwang\model;

use yii\base\Model;

class MarkdownArticle extends Model
{
    public $title;

    public $readCount = 0;

    private $_id;

    private $_content;

    private $_updatedAt;

    private $_createdAt;

    private $_dir;

    private $_filename;

    public function setDir($dir)
    {
        $this->_dir = $dir;
        return $this;
    }

    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getDir()
    {
        return $this->_dir;
    }

    public function getFilename()
    {
        if (!is_null($this->_filename)) {
            return $this->_filename;
        }
        return $this->_filename = "{$this->dir}/{$this->id}.md";
    }

    public function getContent()
    {
        if (!is_null($this->_content)) {
            return $this->_content;
        }
        return $this->_content = file_get_contents($this->filename);
    }

    public function getUpdatedAt()
    {
        if (!is_null($this->_updatedAt)) {
            return $this->_updatedAt;
        }
        return $this->_updatedAt = filemtime($this->filename);
    }

    public function getCreatedAt()
    {
        if (!is_null($this->_createdAt)) {
            return $this->_createdAt;
        }

        return $this->_createdAt = filectime($this->getFilename());
    }

    public static function findAll($dir)
    {
        $models = [];
        foreach (require $dir . '/meta.php' as $id => $row) {
            $row['id'] = $id;
            $row['dir'] = $dir;
            $models[] = new static($row);
        }
        return $models;
    }

    public static function findOne($dir, $id)
    {
        $meta = require $dir . '/meta.php';
        $row = $meta[$id];
        unset($meta);
        $row['id'] = $id;
        $row['dir'] = $dir;
        $_this = new static($row);
        return $_this;
    }
}