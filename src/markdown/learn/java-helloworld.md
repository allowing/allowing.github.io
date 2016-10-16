# JAVA教程 - Hello World

学每一门语言都应该从 "Hello world" 开始。下面看看 java 语言的 "Hello world" 是怎么写的。为了学习方便，建议在桌面新建一个文件夹，起名叫 "learn-java"。

在 learn-java 文件夹中新建 "HelloWorld.java" 文件，用 windows 的记事本打开它，敲上如下内容：

```java
class HelloWorld
{
    public static void main(String[] args)
    {
        System.out.println("Hello World!");
    }
}
```
然后打开命令行，将路径定位到 learn-java 文件夹，编译这个源文件

```
javac HelloWorld.java
```

按回车之后不出问题应该会在当前目录生成一个 "HelloWorld.class" 文件，这个就是一个简单的 java 程序了。

要想运行这个 java 程序可以调用 java 命令，如下：

```
java HelloWorld
```

按回车之后，命令行应该会打印出 "Hello World!"，成功的话我们就已经迈出了第一步。

![java-helloworld](/images/learn/java-helloworld.png)

下面解释一下编译和执行的意思。我们用编辑器写的代码文件叫程序源文件，编译之后生成的文件叫字节码文件，这个编译之后的字节码文件是 java 虚拟机的可执行文件。javac 命令可以编译源文件，生成字节码文件，java 命令可以执行一个字节码文件。
