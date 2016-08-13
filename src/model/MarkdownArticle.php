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

    public function setContent($content)
    {
        $this->_content = $content;
        return $this;
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
        return $this->_filename = "{$this->dir}/{$this->title}.md";
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
        $directory = dir($dir);
        while ($filename = $directory->read()) {
            if (static::notNeed($filename)) {
                continue;
            }

            $models[] = new static([
                'title' => basename($filename, '.md'),
                'dir' => $dir,
            ]);
        }
        return $models;
    }

    public static function findOne($dir, $title)
    {
        $directory = dir($dir);
        while ($filename = $directory->read()) {
            if (static::notNeed($filename)) {
                continue;
            }

            if (basename($filename, '.md') === $title) {
                return new static([
                    'title' => $title,
                    'dir' => $dir,
                ]);
            }

        }
        return null;
    }

    private static function notNeed($filename)
    {
        if ('.' == $filename || '..' == $filename) {
            return true;
        }
        // 只要md扩展名的文件
        if (substr($filename, -3) != '.md') {
            return true;
        }
        return false;
    }
}