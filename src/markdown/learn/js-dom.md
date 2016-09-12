# JS教程 - 文档操作(DOM操作)

## 文档节点(Node)

html 文档是由节点组成的。这些节点有：

* 元素节点
* 属性节点
* 文本节点
* 注释节点

所有的这些节点组成树，叫节点树。

## 操作文档

操作文档是指对这些节点进行“增、删、改、查”。

下面是 html 文档，我们演示怎么操作这些节点的。

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div id="content">内容</div>
    <p class="p">文本1</p>
    <p class="p">文本2</p>
</body>
</html>
```
```js
    // 根据 id 查找元素。返回的是元素对象
    var contentEle = document.getElementById('content');

    // 根据 class 查找元素。返回的是元素对象组成的数组，即使只有一个元素
    var pEles = document.getElementsByClassName('p');

    // 根据标签名查找元素，也是返回元素对象组成的数组
    var divEles = document.getElementsByTagName('div');

    /*
        在 html 5 标准中，新增两个查询 API，这两个 API 是接收一个 css 选择器来查询元素的
        document.querySelector(selector)
        document.querySelectorAll(selector)
        第二个 API 就是带后缀 "All" 的，它返回的是元素对象组成的数组
        因为这两个 API 接收的是 css 选择器，所以查询起来非常好用，建议都使用这两个 API。
    */
    var _contentEle = document.querySelector('#content');
    var _pEles = document.querySelectorAll('.p');
    var _divEles = document.querySelectorAll('div');

    // 获取和修改节点内部文本
    contentEle.innerText; // 访问
    contentEle.innerText = '修改的内容'; // 修改

    // 获取和修改节点内部 html
    contentEle.innerHTML; // 访问
    contentEle.innerHTML = '<span>修改的内容</span>'; // 修改

    // 修改元素的样式
    contentEle.style.color = 'red'; // 修改文字颜色 相当于 select {color: red}
    contentEle.style.backgroundColor = '#ccc'; // 修改背景颜色 相当于 select {background-color: red}

    // 删除元素
    contentEle.remove(); // 会从文档中消失

    // 创建元素
    var newEle = document.createElement('div'); // 创建一个 div 元素
    newEle.innerText = '内容'; // 赋值点内容

    // 把创建之后的元素塞进另一个元素
    contentEle.appendChild(newEle);

    /*
        事件
            许多元素都有自己的事件，我们可以给元素绑定事件处理函数去响应这个事件。
            意思是当某元素的某事件发生时，会调用已经绑定的事件处理函数，在调用的时候会把事件对象传递给事件处理函数
    */
   // 窗口在加载时会触发 "load" 事件，只要给 window 的 onload 属性赋值一个函数，那么在事件发生时就会回调这个函数。
   window.onload = function (e) {
        // 写逻辑代码，例如这里仅仅是弹弹窗
        alert('窗口加载事件发生了');
   };

   // 响应点击事件
   contentEle.onclick = function (e) {
        alert('啊...我被点击了');
   };

   // 响应双击事件
   contentEle.ondblclick = function (e) {
        alert('被双击了');
   };
```

技巧：时刻记得使用 "console.log()" 来输出对象到控制台，观察这个对象。有什么属性一目了然。

```js
console.log(window); // 输出 window
var ele = document.querySelector('#content');
console.log(ele); // 到控制台观察这个元素对象，会有意向不到的收获
```
