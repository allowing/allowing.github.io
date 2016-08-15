# PHP教程 - 准备篇

## PHP是什么

PHP是超文本预处理器，强调的是预处理。在html文档中嵌入PHP代码，然后把这个html文档输入PHP引擎处理，得到的就是一份合法的静态的html文档。由于PHP代码是有逻辑的，所以改变输入条件会得到不同的输出，这就产生了动态的网页。

看起来像下面这样

```php
<p>你好，请问北京路步行街怎么走？</p>
<p><?php echo '地铁二号线公元前站'; ?></p>
<p>OK, Thank you.</p>
<p>不客气。</p>
```

```php
<?php $gender = '女'; ?>
<p>你好，请问北京路步行街怎么走？</p>
<?php if ($gender == '女'): ?>
<p><?php echo '你沿着这条路走到前面一个红绿灯，过到对边马路，上地铁，到二号线的公元前站，D出口'; ?></p>
<?php else: ?>
<p><?php echo '不知道'; ?></p>
<?php endif ?>
<p>OK, Thank you.</p>
<p>不客气。</p>
```

其中「`<?php echo '地铁二号线公元前站'; ?>`」是PHP代码，「`<?php`」「`?>`」是开始标记和结束标记。第一段就简单的用PHP输出一句字符串。第二段根据性别不同会有不懂的输出，这个体现了动态性。

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

![PHP下载截图](/images/learn/php-download.png)

可能还需要安装相应的依赖，如果你的电脑没有安装过的话。

![PHP依赖截图](/images/learn/php-depend.png)

安装好相应的VC库依赖后，把下载的PHP引擎解压至你喜欢的目录，PHP引擎是绿色版的，免安装，解压即可。

![PHP引擎目录截图](/images/learn/php-engin.png)

再在刚刚解压的目录地址栏输入「cmd」然后回车，会打开命令行窗口，此时输入「`php -version`」回车，出现PHP的版本信息就说明运行PHP代码的环境搭建完成了。

![PHP引擎验证截图1](/images/learn/php-1.png)

![PHP引擎验证截图2](/images/learn/php-2.png)

![PHP引擎验证截图3](/images/learn/php-3.png)

## 添加环境变量
把「`php.exe`」文件所在目录的路径复制，添加到环境变量中，win7系统按如下操作，其他系统可以参考着操作

右键点击我的电脑 > 属性 > 高级系统设置 > 环境变量

找到「系统变量」中的 「Path」，双击它，把刚才复制的 php.exe 所在目录的路径追加到结尾处，如果结尾处没有英文分号要先不上英文分号。

注意：是 php.exe 文件的目录路径，不用包含 php.exe，如 c:/foo/bar/abc

![添加环境变量](/images/learn/php-ready-path.png)

因为我们已经把 php.exe 文件所在目录的路径添加到了环境变量的 Path 变量里了，所以当我们打开命令行窗口的时候，不用管光标前面的路径在哪，都可以调用到 php.exe 了。

## 安装编辑器

我们是用`sublime text 3`编辑器作为写代码的工具

[下载地址](http://www.sublimetext.com/3)

下载安装，过程非常简单，这个不在贴截图了。

这个编辑器是收费，在偶尔保存文件的时候会弹出一个小小的窗口，点取消就行了，不用管它，可以无限免费使用，就是偶尔会弹窗，可以自行搜索破解方法，这里不叙述了。

## 运行PHP代码

在桌面新建 learn-php 文件夹，其实文件夹名字随便啦，再用 sublime text 3 编辑器新建 index.php 文件，敲下如下代码

```php
<?php
echo 'Hello World!';

```

保存后，打开cmd，将路径定位到刚才新建的文件夹，然后输入

```
php -f index.php
```

这是会看到控制台输出了「Hello World!」，这说明编写的PHP代码已经可以运行了。

![运行PHP代码](/images/learn/php-ready-code.png);

![运行PHP代码](/images/learn/php-ready-run.png);

## 继续学习后面的教程

准备篇就到这里，你还可以继续学习后面的内容。
