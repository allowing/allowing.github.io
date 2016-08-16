# PHP教程 - 接口

当一个类的所有方法都是抽象的时候，那么这个类就变成了接口。接口用 interface 来声明，不能在用 class 声明了。接口的方法一定是抽象的，不能有方法体，所以接口的方法不用加 abstract 修饰，但是接口的方法一定是公开的，即不能用 protected 和 private 修饰方法。

```php
interface PersonInterface
{
    public function sleep();
}
```

## 实现接口

同样因为接口中有抽象方法，而且全是抽象方法，所以接口更不能直接产生实例。需要另一个类去「实现」这个接口，注意这里说的是实现，不再是继承了。

```php
class Person implements PersonInterface
{
    public function sleep()
    {
        return '睡觉中...';
    }
}
```

Person 类「implements」「实现」了 PersonInterface 接口，实现某个接口就是把某个接口的抽象方法全部实现了。
