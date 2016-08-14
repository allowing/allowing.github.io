# PHP教程 - 函数

## 认识函数

函数就是数学课堂上说的函数，例如「f(x) = x + 1」，在这个函数中「f」是函数名，「x」是这个函数的参数，「x + 1」是这个函数的函数体。举个PHP中的函数，「time()」，这个函数的函数名是「time」，它不需要参数。

注意：函数名可以是字母、数字、下划线的组合，第一个字符不能是数字。函数名不区分大小写。多个单词之间可以用下划线分隔，本教程采用驼峰式。下面是一些函数名的示例。

```php
foo_bar // 合法 匈牙利风格
markdown2html // 合法
fooBar // 合法 驼峰式风格

1fooBar // 不合法，函数名第一个字符不能是数字
```

## 函数的作用

函数的作用是当调用它的时候，就会执行函数体的逻辑，函数体会产生什么作用这个函数就会产生什么作用。比如「f(x) = x + 1」这个函数，调用它的时候，要求传递一个数值，然后在函数体中把传递进来的数值加上一，然后返回给调用者。「time()」这个函数是PHP内置的函数，调用它时不需要传递参数，它会返回一串数字，类似「1335939007」这样的数字，这个叫时间戳。

## 定义自己的函数

在PHP中如何自定义函数，请看

```php
function beeline($x)
{
    return $x + 1;
}
```

用「function」关键字定义一个函数，接着是函数名，再接着是一个小括号，小括号里面是参数列表，申明函数体需要用到的参数。如上面的函数，「beeline」是名称，「$x」是需要用到的参数，函数体仅仅是将传递进来的参数加一然后返回加一后的值。

## 调用函数

```php
beeline(1); // 得到2
beeline(100); // 得到101
```

## 匿名函数

解释下匿名，匿名就是没有名字。匿名函数就是没有名字的函数。怎么定义匿名函数的呢，请看

```php
function ($x) {
    return $x + 1;
};
```

匿名函数的结束花括号要有分号。现在问题来了，这个函数没有名字，我怎么调用它呢，像上面这样确实调用不了，但是接着看

```php
$beeline = function ($x) {
    return $x + 1;
};
```

像这样，把一个匿名函数赋值给一个变量，调用时给这个变量后面加一个小括号就行了，如果匿名函数有参数，就把参数写到这个小括号里。

```php
$beeline(1); // 得到2
```

注意：这个变量名并不是这个匿名函数的名字。