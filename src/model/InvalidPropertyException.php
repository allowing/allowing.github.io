<?php

namespace allowing\yunliwang\models;

use yii\base\Exception;

/**
 * 无效的属性异常
 *
 * 当模型验证不通过时，可抛出此异常
 *
 * 此异常继承自`\yii\base\Exception`
 */
class InvalidPropertyException extends Exception
{
    private $_errors;

    public function setErrors($errors)
    {
        $this->_errors = $errors;
        return $this;
    }

    public function getErrors()
    {
        return $this->_errors;
    }
}
