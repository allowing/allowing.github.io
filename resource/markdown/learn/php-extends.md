# PHP教程 - 类的继承

类与类的关系是复杂的，彼此是有关系的。人类是从猿进化来的，猿又还有祖先，其实我们人类很多属性都是继承下来的，很多方法也是继承的。

下面给出两个继承结构图

```
图形
  |
  +-- 规则图形
  |      |
  |      +-- 矩形
  |      |    |
  |      |    +-- 正方形
  |      |    |
  |      |    +-- 长方形
  |      |
  |      +-- 椭圆
  |          |
  |          +-- 圆
  |
  +-- 不规则图形
```

```
动物
  |
  +-- 猿
     |
     +-- 人类
         |
         +-- 男人
         |
         +-- 女人
```

在程序中怎么表示继承关系呢，看示例代码

```php
class Animal
{
    $canFly;
}

class Ape extends Animal
{
    $color;
}

class Human extends Ape
{

}
```

在实例代码中，Human 类继承 Ape 类，而 Ape 类又继承自 Animal 类，那么子类就会拥有父类的属性和方法，比如 Human 类什么也没有定义，但是它从 Ape 类和 Animal 类继承了 $color 和 $canFly 两个属性。

```php
$h = new Human;
$h->canFly = false;
var_dump($h->canFly); // false
```
