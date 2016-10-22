# PHP教程 - 属性和方法的访问控制

我们知道，一个人是一个对象，这个对象的属性很多，方法也很多，但是不是所有的属性我们都可以访问，也不是所有方法我们都可以调用的，比如你想访问他的银行账户资金，这是不可能的吧，谁会告诉你啊，在程序中有怎么表示这些东西呢，这就需要引入访问控制了。

访问控制是通过几个形容词来限定的，它们分别是「public」「protected」「private」，意思分别是「公开的」「受保护的」「私有的」

如果一个属性或方法被「public」「公开的」来修饰，那么这个属性或方法就可以随便被访问或调用。

如果一个属性或方法被「protected」「受保护的」来修饰，那么这个属性或方法可以在类的内部或其子类内部访问或调用。

如果一个属性或方法被「private」「私有的」来修饰，那么这个属性或方法只能在类的内部访问或调用。

```php
class Person
{
    public $name; // public 修饰，表示这个属性是公开的，可以随便访问
    protected $phoneNumber; // protected 修饰，表示这个属性是受保护的，本类及其子类能访问
    private $money; // private 修饰，表示这个属性是私有的，本类才能访问
    // public 修饰，表示这个方法是公开的，可以随便调用
    public function eat()
    {
        return '吃饭中';
    }
    // protected 修饰，表示这个方法是受保护的，本类及其子类能调用
    protected function fight()
    {
        return '打架';
    }
    // private 修饰，表示这个方法是私有的，本类才能调用
    private function xxx()
    {
        return 'xxx';
    }
}

```

访问控制不难理解，就是靠这三个形容词修饰
