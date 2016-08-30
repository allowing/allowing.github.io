# JS教程 - 基础语法

## 注释

在示例代码认识注释

```js
// 单行注释
/*
多行注释
可以换行
*/
```

## 变量

### 声明变量

在js中用 var 关键字声明一个变量

```js
var name; // 声明变量
var age = 18; // 声明一个变量同时给变量赋值
```

如果只是声明一个变量，并没有给这个变量初始值的话，那么这个变量的值是 undefined

### 变量类型

在 js 中，变量有以下类型

* 字符串(String)
* 数字(Number)
* 布尔(Boolean)
* 数组(Array)
* 对象(Object)

```js
var name = '张三'; // name 是字符串类型
var age = 18; // age 是数字类型
var array = ['张三', '李四', '王五']; // array 是数组类型
var bool = true; // bool 是布尔类型
var obj = {name: '张三', age: 18}; // obj 是对象类型
```

## 流程控制

### if

```js
if (1 > 0) {
    // 满足条件则进来这里
}
```

### if ... else

```js
if (1 > 0) {
    // 满足条件进来这里
} else {
    // 不满足条件进来这里
}
```

### if ... else if

if () {
    // 分支1
} else if () {
    // 分支2
} else if () {
    // 分支3
} else {
    // 分支4
}

## 循环

循环地执行某逻辑

### while 循环

```js
var i = 0;
var s = 0;
while (i <= 100) {
    s = s + i;
    i++;
}
```

当 i 的值小于等于 100 时，循环地执行循环体内的逻辑，当条件不满足时就退出循环体。

### do ... while 循环

```js
var i = 0;
var s = 0;
do {
    s = s + i;
    i++;
} while(i <= 100);
```

do ... while 循环是上来就执行一下循环体，完了之后再判断，所以 do ... while 的循环体至少都执行一遍，而 while 循环有可能一次都不执行。

### for 循环

```js
for (初始化; 循环条件; 循环体结束后执行的逻辑) {
    循环体
}
```
```js
for (var i = 0, s = 0; i <= 100; i++) {
    s = s + i;
}
```

## 函数

### 定义在 window 对象下的常用函数

window 对象是在浏览器运行环境下的一个内置对象，这个对象的方法称为全局方法，调用时可以不加 window
