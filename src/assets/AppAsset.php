<?php

namespace allowing\yunliwang\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $css = [
        'global.css',
        'monokai-sublime.min.css',
        'codemirror-5.19.0/lib/codemirror.css',
        'codemirror-5.19.0/theme/monokai.css',
        'default.css',
    ];

    public $js = [
        'require.js',
        'main.js',
    ];

    public $depends = [
        \yii\web\YiiAsset::class,
    ];
}
