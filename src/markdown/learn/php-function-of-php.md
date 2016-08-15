# PHP教程 - PHP常用内置函数

## 文件包含

在一个PHP脚本包含另一个PHP脚本是常见的。

「`require`」「`include`」「`require_once`」「`include_once`」这四个不是函数，它们是PHP的语言结构。
用它们可以把另一个PHP脚本包含进当前脚本。

「`require`」「`include`」这两个在作用上非常相似，只是它们对错误的处理不同。
当欲包含的脚本不存在时「`require`」会报致命错误，而「`include`」只是报警告级别的错误。

「`require_once`」「`include_once`」它们两个和上面的一样，只是这两个命令会检查上下文是否已经包含过目标脚本
如果没有就会把目标脚本包含进来。

设以下代码定义在 foo.php 文件里。

```php
function formatDate($timestamp, $format = 'Y-m-d H:i:s')
{
    return date($format, $timestamp);
}
```

另有 bar.php 文件和 foo.php 在同一个目录下。bar.php 文件里想用 formatDate 函数时，可以将 foo.php 文件包含进去即可。

```php
require __DIR__ . '/foo.php'; // 「__DIR__」像这种样子的东西叫魔术常量，代表当前目录

// 下面就可以用 formatDate 函数了，因为在上文已经包含进来了函数的定义文件。

```

在实践中，常常按一定的架构思想把代码组织到不同的文件中，在其他文件需要用时再把它们包含进来。
架构能力越强组织出来的系统就越清晰越好用，几乎不用摸索系统的结构，架构能力是需要经验加学习的。

## 字符串处理函数

字符串的处理是最常见的和也是最核心的。下面列出几个实践中经常接触的关于字符串的函数。

echo 这不是一个函数，这是一个语言结构。调用时可以不加小括号。

```php
echo 'Hello World!'; // 输出一个字符串
$a = 'A';
$b = 'B';
echo $a, $b; // 输出 $a $b 两个变量的值
```

string substr(string $string, int $start [, int $length]) 返回给定字符串的子串

第一个参数是给定的字符串，第二个参数是开始位置，第三个参数是可选的，表示截取的长度。

```php
$str = 'Hello World';
substr($str, 6, 1); // 返回「W」。意思是从第6这个位置开始，截取1的长度。
```

由于内置函数PHP手册给出了很详细的说明，因此这里就不再列举了。下面给出PHP手册的官方地址和怎么阅读函数的方法

[手册地址](http://www.php.net/manual/zh/)

[离线版下载地址](http://php.net/get/php_enhanced_zh.chm/from/a/mirror)，选择China就可以下载

打开在线版手册，看到函数参考大分类，如下图所示

![PHP内置函数](/images/learn/php-function-of-php-1.png)

以文本处理为例，点击进去

![PHP内置函数](/images/learn/php-function-of-php-2.png)

点击字符串函数，进去之后就能看到很多关于字符串处理的函数，中文介绍都非常详细，在这点上PHP对中国开发者非常友好，这是许多其他语言所没有的优势。

![PHP内置函数](/images/learn/php-function-of-php-3.png)

以「`explode`」函数为例，讲讲怎么阅读一个函数。

![PHP内置函数](/images/learn/php-function-of-php-4.png)

看函数的描述，看函数的参数，看参数是否是可选的，在PHP手册中，打上中括号的参数是可选的，看这个函数的返回值，这是关于“看”的。

参数的类型，在PHP手册中，参数的类型是这个参数前面的那个单词如「`string $str`」说明 $str 是 string 类型的。函数的返回值类型是函数名前面的那个单词，「`array explode`」说明 explode 这个函数的返回值类型是 array ，即数组类型。

## 本节赠言

手册在手，天下我有。

手册没有，寸步难走。

事实上，以后手册才是最重要的教程。

## 必看的函数

下面给出的函数在手册都能找到，这些函数大部分都要求掌握的。

* 数组处理函数
* 时间日期处理函数
* 文件系统处理函数
* 数学函数
* 归档压缩
