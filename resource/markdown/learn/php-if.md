# PHP教程 - 条件分支

## if

在生活中通常会有根据不同条件选择不同的操作的操作的场景。如“如果你看到有卖西瓜的，就买一个，否则就买个哈密瓜。”。

在PHP中是如何根据不同条件做不同事情的呢，请看代码示例：

```php

// 如果...
if (2 > 1) {
    // 条件成立时会进来这里
}

// 如果...否则...
if (2 > 1) {
    // 条件成立时会执行这里
} else {
    // 条件不成时会执行这里
}

// 如果...否则如果...否则如果...否则...
if (2 > 1) {

} elseif (3 < 2) {

} elseif (4 == 4) {

} else {

}

```

上面的示例中，演示了条件分支。下面给一段问路的实际应用。根据性别不同，走不同的分支。

```php

$gender = '女';

echo '你好，请问海珠湖站在哪号线？';

if ($gender == '女') {
    echo '在地铁三号线';
} else {
    echo '我知道都不告诉你';
}

```

## switch
switch也是一种条件分支

```php

$count = 1;
switch ($count) {
    case 1:
        // 当`$count`的值为1时
        echo '案例1';
        break;
    case 2:
        // 当`$count`的值为2时
        echo '案例2';
        break;
    case 3:
        // 当`$count`的值为3时
        echo '案例3';
        break;
    default:
        // 上面的都不命中就时
        echo '默认';
        break;
}

```

注意：每个分支后面应该加上break，break的作用是命中之后不再往下判断了，意思是到此结束了，要是没有break的话，可能后面的还会命中，这可能不是我们想要的。

下面给出一个switch的实际应用。女生一个星期的减肥计划

```php

$week = '星期一';

switch (week) {
    case '星期一':
        echo '跑步';
        break;
    case '星期二':
        echo '游泳';
        break;
    case '星期三':
        echo '跳绳';
        break;
    case '星期四':
        echo '骑自行车';
        break;
    case '星期五':
        echo '举重';
        break;
    case '星期六':
        echo '俯卧撑';
        break;
    case '星期日':
        echo '仰卧起坐';
        break;
}

```
