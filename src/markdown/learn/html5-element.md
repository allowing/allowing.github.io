# HTML5教程 - 元素详解

## 元素分类

具有长和宽且独占一行的叫块级(block)元素，没有长和宽的且不独占一行的叫内联(inline)元素，具有长和宽但是也不独占一行的叫内联-块级(inline-block)元素。

HTML5 的元素比较多，这里直接给出比较全的学习链接【[HTML5元素](http://www.w3school.com.cn/tags/index.asp)】。

## 常用元素

下面给出的是一些非常常用的元素。

```html
<h1>标题</h1><!-- 数字从 1 - 6 变化，分别表示不同比重的标题 -->
<p>段落</p><!-- 这个没什么好解释的，就是表示段落 -->
<ul>
    <li>无序列表</li>
    <li>无序列表</li>
    <li>无序列表</li>
    <li>无序列表</li>
</ul>
<ol>
    <li>有序列表</li>
    <li>有序列表</li>
    <li>有序列表</li>
    <li>有序列表</li>
</ol>
<header>表示头部</header>
<header>表示脚步</header>
<nav>导航区</nav>
<video></video><!-- 视频 -->
<audio></audio><!-- 音频 -->
<img><!-- 图片 -->
```

## 元素的属性

元素是有属性的，初初在没有 CSS 之前，改变元素的某些属性还可以改变其表现，后来和表现有关的属性全部弱化了，什么取消了这些属性，但是请注意，只是和表现相关的属性才建议不去使用，改用 CSS 控制，有些属性是和标签没关的，如很多元素都有 src 属性，这个属性表示该元素引用一个外部资源，例如 img 元素，表示图标，它就必须指定 src 属性，再如 video 表示视频，也要有 src 属性。

```html
<p align="center">段落的文字，可以通过 align 属性指定这段文字的对齐方式</p><!-- 和表现有关的属性，不建议使用 -->
<img src="/images/learn/html-code2.png" alt="图解HTML"><!-- 如果是一张图片，这些元素必须指定 -->
```

## 自定义属性

在 HTML5 中，可定义属性可以通过 data- 前缀来定义。

```html
<img data-name="自定义的属性" src="/images/learn/html-code2.png" alt="图解HTML">
```
