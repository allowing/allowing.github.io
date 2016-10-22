# CSS教程 - 选择器(selector)

## ID 选择器

ID 选择器是 # 号加 ID 值，同一个 ID 值在整篇文档应该唯一，不能重复，所以 ID 选择器选择出来的元素是一个具体的元素，是单数。

```html
<!-- 选择 id 为 info 的元素 -->
#info
<p id="info">日期：2016-08-08</p>
```

## (class 选择器)类选择器

class 选择器是 . 号加 class 值，同一个 class 值可以出现多次，所以 class 选择器选择的元素个数是复数。

```html
<!-- 选择 class 为 item 的所有元素 -->
.item
<ul>
    <li class="item">内容1</li>
    <li class="item">内容2</li>
    <li class="item">内容3</li>
    <li class="item">内容4</li>
    <li class="item">内容5</li>
</ul>
```

## 元素选择器

用元素的名字作为选择器的叫元素选择器。

```html
<!-- 选择元素名称为 p 的所有元素 -->
p
<p>元素选择器</p>
```

## 后代选择器

两个选择器之间用空格连接起来的选择器叫后代选择器

```html
<!-- 选择 .content 的所有后代 p，不管层级多深，只要包含在 .content 中 -->
.content p
<div class="content">
    <h1>标题</h1>
    <p>中华人民<span>共和国</span></p>
    <p>使用汉字，讲普通话。</p>
    <div>
        <p>这个也是 .content 的后代</p>
    </div>
</div>
```

## 子代选择器

```html
<!-- 下面的选择器只能选中 .content 中的第一层的 p -->
.content > p
<div class="content">
    <p>内容</p>
    <div>
        <p>层次深一点</p>
    </div>
</div>
```

## 相邻选择器

```html
p + h3
<p>段落</p>
<h3>标题</h3>
```

## 群组选择器

```html
<!-- 下面表示选中了所有的 a, 所有的 h1, 所有类名为 .content 的元素 -->
a, h1, .content
```

## 属性选择器

```html
<!-- 表示选中所有 alt="foo" 的元素 -->
[alt="foo"]
<!-- 表示选中所有 alt 不等于 foo 的元素 -->
[alt!="foo"]
<img src="" alt="foo">
```

## 第一个儿子选择器

```html
<!-- 选中第一个 li -->
li:first-child
<ul>
    <li>foo</li>
    <li>bar</li>
    <li>baz</li>
</ul>
```

## 最后一个儿子选择器

```html
<!-- 选中最后一个 li -->
li:last-child
<ul>
    <li>foo</li>
    <li>bar</li>
    <li>baz</li>
</ul>
```
