# PHP教程 - 准备篇

## PHP是什么

PHP是超文本预处理器，强调的是预处理。在html文档中嵌入PHP代码，然后把这个html文档输入PHP引擎处理，得到的就是一份合法的静态的html文档。由于PHP代码是有逻辑的，所以改变输入条件会得到不同的输出，这就产生了动态的网页。

看起来像下面这样

```php
<p>你好，请问上下九步行街怎么走？</p>
<p><?php echo '地铁二号线公元前站'; ?></p>
<p>OK, Thank you.</p>
<p>不客气。</p>
```

```php
<?php $gender = '女'; ?>
<p>你好，请问上下九步行街怎么走？</p>
<?php if ($gender == '女'): ?>
<p><?php echo '你沿着这条路走到前面一个红绿灯，过到对边马路，上地铁，到二号线的公元前站，D出口'; ?></p>
<?php else: ?>
<p><?php echo '不知道'; ?></p>
<?php endif ?>
<p>OK, Thank you.</p>
<p>不客气。</p>
```

其中「`<?php echo '我是PHP动态输出的内容'; ?>`」是PHP代码，「`<?php`」「`?>`」是开始标记和结束标记。第一段就简单的用PHP输出一句字符串。第二段根据性别不同会有不懂的输出，这个体现了动态性。

## 指令分隔符
在PHP代码中，英文分号是指令分隔符，看一段示例：
```php
$num = 5;
if ($num > 5) {
    echo '数字大于5';
} else {
    echo '数字小于5';
}
```

## PHP引擎在windows系统下的安装。

[下载地址](http://windows.php.net/qa/)

PHP目前有5.x系列和7.x系列，现在我们下载5.6非线程安全版64位版。

![PHP下载截图](/learn/images/php-download.png)

可能还需要安装相应的依赖，如果你的电脑没有安装过的话。

![PHP依赖截图](/learn/images/php-depend.png)

安装好相应的VC库依赖后，把下载的PHP引擎解压至你喜欢的目录，PHP引擎是绿色版的，免安装，解压即可。

![PHP引擎目录截图](/learn/images/php-engin.png)

再在刚刚解压的目录地址栏输入「cmd」然后回车，会打开命令行窗口，此时输入「`php -version`」回车，出现PHP的版本信息就说明运行PHP代码的环境搭建完成了。

![PHP引擎验证截图1](/learn/images/php-1.png)

![PHP引擎验证截图2](/learn/images/php-2.png)

![PHP引擎验证截图3](/learn/images/php-3.png)