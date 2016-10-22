# 其他教程 - phpDocumentor的使用

一个良好的类库应该是文档齐全的，最起码要配备 API 手册，要是再配备一份根据系统的特点、设计思想、注意事项等编写的使用手册就更完美了。

API 手册是指根据函数、方法、类等的注释信息自动生成的一份文档。API 手册具有自动生成、与 API 同步更新（每次更新 API 是都重新生成一下文档）等的特点。当有了 API 手册，开发者可以快速地上手该系统，从而提高开发效率。

## 怎样写注释

一个良好的类，应给是用心设计出来的，注释信息是非常到位的，下面给出一个模板，和一个示例。

```php
<?php

namespace allowing\phpdocdemo;

/**
 * 一句话描述这个类
 *
 * 详述这个类。可以给出使用教程，可以写下注意事项等
 */
class Foo
{
    /**
     * 一句话描述这个方法
     *
     * @param string $baz 参数描述
     * @return void
     */
    public function bar($baz)
    {
        // 函数体略
    }
}

```

具有良好注释的实例代码

```php
<?php

namespace zhuli\core;

/**
 * 依赖注入容器接口
 *
 * 这个接口定义了依赖注入容器该实现的方法
 */
interface DiInterface
{
    /**
     * 设置依赖关系
     *
     * 第一个参数可以是完全限定类名，也可以是接口。
     * 如果是类名那么第二个参数就必须是数组，数组是键值对的形式，键是参数的名称，值就是要传递给构造函数的值。
     * 如果是接口，那么第二个参数就是该接口对应的实现类。
     *
     * @param string $class 完全限定类名|接口
     * @param array|string $args 如果是数组将传递给第一个参数的类的构造方法；如果第一个参数是接口，那么这个参数就是相应的实现类
     * @return self 为了实现链式调用，请返回实现类的实例，即`$this`
     */
    public function set($class, $args = []);

    /**
     * 设置一个单例
     *
     * @param string $class 完全限定类名，注意这个不能传递接口
     * @param array $args
     * @return self
     */
    public function setSingleton($class, $args = []);

    /**
     * 获取给定类名的实例
     *
     * 当获取A时，发现A依赖了B，如果B的构造函数比较复杂，容器不能自动解决该传递的参数时，就要求调用者事先调用DiInterface::set()注册好依赖关系。
     *
     * @param string $class 要获取的实例的完全限定类名
     * @param array $args 传递给这个类的构造函数的参数，键值对形式，键是参数的名称，值就是参数的值
     * @return $class 返回的是要获取的实例
     */
    public function get($class, $args = []);
}
```

## 用 phpDocumentor 生成 API 文档

当有了良好的注释，就可以用 phpDocumentor 这款工具来自动生成 API 文档了。phpDocumentor 也使用 php 写的。自动生成文档的原理是，利用反射技术，读取注释信息，如命名空间、方法名称、方法的参数信息等，然后把注释信息加工，再填充到已经写好的 html 模板中去，在输出到文件中，这样就制作好了。

[下载 phpDocumentor](https://www.phpdoc.org/)

下载 phpDocumentor.phar 文件。「.phar」文件是 php 的可执行归档文件，是一个压缩包，里面的代码是 php 代码。「.phar」 可以在命令行下像这样运行

```
c:/foo/bar/php.exe d:/path/to/pharfile.phar
```

如果把 php.exe 所在目录添加到了环境变量的 Path 变量中，还可以省略前面的路径。

```
php.exe d:/path/to/pharfile.phar
```

甚至当前的命令行光标前面的路径正是 phar 文件所在目录的话，还可以省略 phar 的路径

```
php.exe pharfile.phar
```

最后再把 .exe 省略掉

```
php pharfile.phar
```

按下图所示下载好文件，放到桌面的 phpdoc 文件夹中。

![下载phpDocumentor](/images/learn/other-phpdoc-download.png)

![放到桌面phpdoc文件夹](/images/learn/other-phpdoc-desktop.png)

打开命令行将光标前的路径定位到 phpdoc 文件夹中，输入如下命令，查看 phpDocumentor 的使用帮助

```php
php phpDocumentor.phar -h
```

![查看帮助命令](/images/learn/other-phpdoc-help.png)

通过查看帮助得知，生成文档很简单，指定源代码所在目录即可。如下面的命令，表示要生成当前目录下的 src 目录中源代码的文档。

```php
php phpDocumentor.phar -d src
```

当运行这上面这个命令后，当前目录多出了一个 output 的文件夹，这个文件夹就是 API 文档的输出文件了，打开 index.html 查看一下，一份漂亮的文档出来了。

![查看帮助命令](/images/learn/other-phpdoc-output.png)

![查看帮助命令](/images/learn/other-phpdoc-end.png)

phpDocumentor 是可以更换输出模板的，也还有很多选项可以改变其行为，关于更多这些功能还请读者自行探索。