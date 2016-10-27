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
        'showdown.min.js',
        'highlight.min.js',
        'jquery.SuperSlide.2.1.1.js',
        'codemirror-5.19.0/lib/codemirror.js',
        'codemirror-5.19.0/keymap/sublime.js',
        'global.js',
    ];

    public $depends = [
        \yii\web\YiiAsset::class,
    ];
}
