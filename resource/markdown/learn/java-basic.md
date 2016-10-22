# java 基础

## JDK 中 bin 目录下的常用命令

* javac

把一个源文件编译成一个 class 文件

```
javac HelloWorld.java
```

* java

运行 class 文件

```
java HelloWorld
```

* javadoc

生成 API 文档。这个命令可以方法、类、属性等的头顶的注释生成一份漂亮的文档。你的注释写得多详细，文档就多详细，这个命令非常好用。

* jar

归档命令。把许多的 class 文件归档。就是打包的意思，可以打包成 jar 文件。

## 源文件编译成字节码文件

为了学习的方便，建议在桌面新建一个叫 learn-java 的文件。然后打开一个命令行窗口，将光标前的路径定位到这个目录。

![](/images/learn/java-basic-1.png)

设在这个目录下有一个事先写好的 HelloWorld.java 的源文件，那么要想编译它，就可以像下面这样：

```
javac HelloWorld.java
```

编译的时候，如果源文件的编码是 utf-8 的话，要告诉编译器源文件的编码，因为在 Windows 中文系统下，默认会用 GBK 编码去读取源文件的内容。

```
javac -encoding utf-8 HelloWorld.java
```

编译通过之后，就会生成一个 .class 的文件，这个就是 java 字节码文件，也是 java 虚拟机的可执行文件，也可以叫 java 程序。

HelloWorld.java 的内容，相信已经在之前的教程学过了。

## class 文件的加载

当编译生成了 class 文件之后，就可以运行了，是通过 java 命令来运行的。

```
java HelloWorld
```

注意，这里的 HelloWorld 没有任何后缀的。这里的意思是，开启一个 java 虚拟机，并把要执行的类名告诉虚拟机，就是这里的第一个参数 HelloWorld，然后虚拟机就会在环境变量 CLASSPATH 里列举的目录里搜寻一个叫 HelloWorld.class 的文件，搜寻到就加载并运行它。

## 数据类型

以下是一些基本数据类型

* 整型

    * byte

        8 位

    * short

        16 位

    * int

        32 位

    * long

        64 位

* 浮点型

    * float

        32 位

    * double

        64 位

* 字符型

    * char

        16 位

* 布尔型

    * boolean

        布尔类型的值只有 true 和 false 两种。

## 变量声明

在 java 声明变量是直接通过类型来声明的。

```java
// 声明一个 byte 类型的变量 age
byte age;

// 声明一个 short 类型的变量 num
short num;

// 声明一个 int 类型的变量 time
int time;

// 声明一个 long 类型的变量 d
long d;

// 下面直接给出其他类型的例子了
float f;

double dou;

char letter;

boolean bool;

```

### 变量名称命名规范

在 java 中变量命名采用“小驼峰”风格。第一个单词的首字母小写，往后的单词首字母大写。

```java
int fooBar;

char myName;

boolean isOld;
```

## 运算

## 流程控制

### 分支

### 循环


