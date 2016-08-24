# CSS教程 - 准备篇

CSS 是用来声明文档样式的，它不属于编程语言。像 word 文档那样，文字有大有小，有些段落又有背景颜色，段落与段落之间的距离也可以设置，文字的颜色也可以设置，字体字号这些，等等，这些不同的表现真是 CSS 作用的结果。word 文档内部是有样式表在控制的。CSS 是层叠样式表的意思。

```html
<article>
    <h1>杂文</h1>
    <p>噫嘘唏，危乎高哉...蜀道之难，难于上青天...</p>
    <p>楚人一炬，可怜焦土。</p>
    <p>床前明月光，疑是地上霜。</p>
</article>
```

像以上的文档片段，我们可以为其声明一些样式规则，用来修饰一下它，使之看起来美观漂亮。

* 所有一号标题用“微软雅黑”字体，灰色，不加粗，字体大小20像素
* 所有段落首行缩进两格
* 段落上下的间距10像素
* 段落字体大小16像素

用 CSS 实现如下

```css
h1 {
    font-family: '微软雅黑';
    font-size: 20px;
    font-weight: normal;
    color: #ccc;
}
p {
    text-indent: 2em;
    font-size: 16px;
    margin-top: 10px;
    margin-bottom: 10px;
}
```

## 应用 CSS 样式表到文档

把 CSS 样式表应用到文档中有几种方式

## 行内式

在要声明样式的元素设置 style 属性，值就是样式的规则

```html
<h1 style="font-family: '微软雅黑'; font-size: 20px; font-weight: normal; color: #ccc;">杂文</h1>
```

这种方式的作用范围就仅仅是该元素。

## 内嵌式

内嵌式是指用一个 style 元素声明一组样式规则，把这组样式写到文档中，通常是 head 元素内部。

```html
<!DOCTYPE html>
<html>
<head>
    <title>文档标题</title>
    <style>
        h1 {
            font-family: '微软雅黑';
            font-size: 20px;
            font-weight: normal;
            color: #ccc;
        }
        p {
            text-indent: 2em;
            font-size: 16px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <article>
        <h1>杂文</h1>
        <p>噫嘘唏，危乎高哉...蜀道之难，难于上青天...</p>
        <p>楚人一炬，可怜焦土。</p>
        <p>床前明月光，疑是地上霜。</p>
    </article>
</body>
</html>
```

这样方式声明的样式作用于本文档。

## 独立文件式

单独建立一个文件，这个文件的后缀名是 .css，然后再在需要应用的文档用 link 元素引入进来。
也可以在 style 元素用 @import 操作符引用。

```html
<!DOCTYPE html>
<html>
<head>
    <title>文档标题</title>
    <!-- 设当前文档的目录下存在 style.css 样式文件 -->
    <link rel="stylesheet" type="text/css" href="./style.css">
    <style>
        /* 也可以用 @import */
        @import './style.css'
    </style>
</head>
<body>
    <article>
        <h1>杂文</h1>
        <p>噫嘘唏，危乎高哉...蜀道之难，难于上青天...</p>
        <p>楚人一炬，可怜焦土。</p>
        <p>床前明月光，疑是地上霜。</p>
    </article>
</body>
</html>
```
这样方式的样式的作用范围也是整个文档。
