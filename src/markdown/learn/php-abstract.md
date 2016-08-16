# PHP教程 - 抽象方法

## 抽象方法

抽象方法指的是没有方法体的方法。没有方法体的方法有什么用呢，有用，一个类里面定义了一个没有方法体的方法，那么这个类就不能直接产生实例，它必须被另一个类继承，子类一定要实现这个抽象方法，这样父类就可以强制让子类实现某个方法。

## 抽象类

含有抽象方法的类叫抽象类。抽象类和抽象方法前面都要加形容词「abstract」「抽象的」 修饰。

```php
abstract class Person
{
    abstract public function fly();
}
```

抽象类不能直接通过 new 关键字来新建实例，抽象类必须被另一个类继承然后实现其中的抽象方法。

```php
class Man extends Person
{
    public function fly()
    {
        return '坐飞机飞';
    }
}
```
Man 类继承了 Person 类，并且把从 Person 类继承的抽象方法 fly 实现了。注意，子类实现了抽象方法，那么就不需要加 abstract 了。
