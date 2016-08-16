# PHP教程 - 魔术方法

魔术方法指的是在特定场合下自动触发执行的函数。

* __construct() 在实例化的时候自动执行
* __destruct() 在 unset 一个对象时自动执行
* __call() 在调用一个不存在的方法是，自动执行
* __callStatic() 在调用一个不存在的静态方法时自动执行
* __get() 当获取一个不存在的属性时自动执行
* __set() 当设置一个不存在的属性时自动执行
* __isset()
* __unset()
* __sleep()
* __wakeup()
* __toString() 当把对象当一个字符串处理时，自动执行
* __invoke()
* __set_state()
* __clone() 当克隆一个对象时自动执行
* __debugInfo()

在命名自己的类方法时不能使用这些方法名，除非是想使用其魔术功能。

注意：PHP 将所有以 `__`（两个下划线）开头的类方法保留为魔术方法。所以在定义类方法时，除了上述魔术方法，建议不要以 `__` 为前缀。

```php
class Person
{
    public function __toString()
    {
        return '我是人类，我的类名是' . static::class;
    }

    public function __get($property)
    {
        return '你要访问我的' . $property . '属性，可是我没有这个属性';
    }
}

$p = new Person;
$p->name; // 「你要访问我的name属性，可是我没有这个属性」，访问一个不存在的属性，触发 __get 方法
echo $p; // 「我是人类，我的类名是Person」，当一个字符串，触发了 __toString 方法
```


更多关于魔术方法的请看[魔术方法详情](http://php.net/manual/zh/language.oop5.magic.php)
