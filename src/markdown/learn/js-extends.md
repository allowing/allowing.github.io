# JS教程 - 原型

## js 中的对象

js 中的对象是一系列属性的集合，当且仅当属性的值是一个函数时，就说这个属性是方法。

```js
{
    name: '张三',
    age: 18,
    sayName: function () {
        alert(this.name);
    }
}
```

上面的这个对象中，有三个属性，其中 sayName 属性的值是一个函数，所以更多时候称 sayName 是一个方法。

## 字面量

字面量是指直接用代码表示出来的量。如：

```js
// 对象字面量
{name: '张三', gender: '女'}

// 数组字面量
['中国', '美国', '加拿大', '日本']
```

## prototype 和 constructor

我们知道，函数在 js 中也是一个对象。在每一个函数中，都存在一个 "prototype" 属性，这个属性的值也是一个对象，称这个对象为这个函数的原型。那么，当用这个函数去新建对象时，新建出来的对象会继承这个函数的原型，这个函数的原型有什么方法新建出来的对象就有什么方法。为了让用这个函数新建出来的对象知道自己属于哪个构造器构造的，系统会在这个函数的原型上部署一个 "constructor" 属性，值就是这个函数自己，这样由于用这个函数新建的对象会继承这个函数的原型，所以新建的对象也就有了 "constructor" 属性了。

```js
// Foo 是一个函数对象，存在 prototype 属性，值默认是一个空对象
var Foo = function () {};

// 用这个函数来新建对象
var foo = new Foo();

// 那么 foo 就会继承 Foo.prototype 的属性和方法

// 系统还会自动部署 Foo.prototype.constructor 属性，值就是 Foo
// 所以 foo.constructor 就是 Foo 函数

```

访问一个对象的属性时，会先在这个对象的自身上查找有没有这个属性，如果有就返回，如果没有就会到原型对象上查找，查找到，就返回，还是查找不到就查找原型的原型，还没有就继续，如此递归下去，最后都没有就返回 undefined。

配置一个对象的属性时不同，对象上原来有的就修改它，没有的就新增这个属性，不会修改原型上的属性的，因为原型对象是共享的，修改了就会影响其它对象。

对象上还有一个特殊的属性，这个属性就是 `__proto__`，这个属性可以查看对象的原型。但是最好不要在程序中使用它，开发中可以用它来观察对象。

函数、原型、由函数新建的对象三者之间的关系图：

![原型图](/images/learn/js-prototype.png)

## 实际例子

一个人，爸妈、爷奶、祖父母都是原型，在远一点，某个人猿也是他的原型。

```js
var Human = function (name, age, gender) {
    this.name = name;
    this.age = age;
    this.gender = gender;
};

Human.leg = 2; // 静态属性

// 给原型增加一个方法
// new Human() 时生成的实例就会具有这个方法
Human.prototype.cry = function () {
    return '哭...';
};

Human.prototype.smile = function () {
    return '笑...';
};

var zs = new Human('张三', 18, '女');
zs.name; // 张三
zs.age; // 18
zs.cry(); // '哭...' 这个方法是在原型上的
zs.smile(); // '笑...' 这个方法也是在原型上的

```

```js
var oneTiger = {
    name: '小白',
    age: 5,
    eat: function () {
        return '吃草中...';
    }
};

var Cat = function () {};

// 让猫继承老虎，只需要修改猫的构造器，把构造器的原型修改成老虎的
Cat.prototype = oneTiger;

// 这样，只要用这个构造器生产的猫，就都具有这只老虎的特性了。
var oneCat = new Cat();
oneCat.eat(); // 吃草中...
oneCat.age; // 5
oneCat.name; // 小白

// 想在构造猫的时候，强制指定 name age ，可以在构造器中声明要传递的参数
var Cat = function (name, age) {
    this.name = name;
    this.age = age;
};

var xiaohua = new Cat('小花', 1);
xiaohua.name; // 小花
xiaohua.age; // 1

```

在 js 中，怎么按照传统的(JAVA PHP)语言来写“类”呢？下面就用 js 仿照传统的 OOP 思想，设计一个学生类。

```js
// 一个构造器
var Student = function (name) {
    this.setName(name);
};

// 定义常量
Object.defineProperty(Student, 'SCHOOL', {
    configurable: false,
    writable: false,
    enumerable: false,
    value: '兴育强中学'
});

// 设计构造器的 prototype
Student.prototype = {
    constructor: Student,
    name: null,
    birthday: null,
    setName: function (name) {
        this.name = name;
    },
    getName: function () {
        return this.name;
    },
    setBirthday: function (birthday) {
        this.birthday = birthday;
    },
    getBirthday: function () {
        return this.birthday;
    },
    learn: function () {
        return Student.SCHOOL + '的学生正在认真学习数学课...';
    }
};

var zs = new Student('张三');
alert(zs.getName());
alert(zs.learn());
```
