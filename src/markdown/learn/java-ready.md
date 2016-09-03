# JAVA教程 - 准备篇

## 环境搭建

### 安装 JDK

到官网下载 JDK 安装包，开发者应该下载 JDK 包，不要下载 JRE 包。JDK 是 java 程序开发环境包，JRE 是 java 程序运行环境包。

下载的时候可以根据自己的操作系统选择对应的版本。

[JDK下载地址](http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html)

### JDK 目录结构

一般 JDK 安装包会包含 JRE 包，安装完成之后会看到如下图所示：

![JDK](/images/learn/java-ready-jdk-1.png)

上图的两个目录中，第一个才是 JDK 目录，第二个是 JRE 目录。现在打开 JDK 目录，目录结构如下：

![JDK](/images/learn/java-ready-jdk-2.png)

第一个目录，bin 目录，里面存放了很多 ".exe" 可执行文成，这些文件在开发 java 程序时会用到。注意这些文件是用 windows 的黑窗口运行，不是双击就能用的，运行的方式是打开命令行窗口，把光标前面的路径定位到该目录，然后输入想要运行的文件名，如 "java.exe" ，然后按回车，".exe" 还可以省略。像这些可以在命令行窗口运行的程序也叫命令。

![运行命令](/images/learn/java-ready-cmd.png)

再看 lib 目录，"lib" 是 library 的缩写，这里存放的是是一些类库文件。

jre 目录就是 java 的运行时环境，和外面的 jre1.8.0_65 目录内容是一模一样的。

其他目录在这里就不做介绍了。

### JAVA_HOME 变量

右键点击我的电脑 -> 属性 -> 高级系统设置 -> 环境变量，然后添加一个系统变量，变量名叫 "`JAVA_HOME`" 变量的值是 jdk 的目录路径，本例的是 "`D:\\ljj\\apps\\Java\\jdk1.8.0_65`"

![JAVA_HOME](/images/learn/java-ready-home.png)

### CLASSPATH 变量

右键点击我的电脑 -> 属性 -> 高级系统设置 -> 环境变量，然后添加一个系统变量，变量名叫 "CLASSPATH" 变量的值是
"`.;%JAVA_HOME%/lib/tools.jar`"。

CLASSPATH 变量的意义是，java 虚拟机搜寻 class 文件的目录。就是说添加到这个变量下的路径，可能会存放着你想要的 class 文件，当你依赖某个 class 时，java 虚拟机会尝试在这些目录里搜寻，搜寻到了就加载这个 class 文件。

这个意义如果不理解就先配置，学到后面就会慢慢理解了。

![CLASSPATH](/images/learn/java-ready-path.png)

### 全局调用 jdk 中 bin 目录下的命令

要想调用 jdk 中 bin 目录下的命令，就要打开命令行窗口，把路径定位到 bin 目录下，这样做很麻烦，有没有不用管路径在哪，都能调用的方法呢，答案是肯定的。

右键点击我的电脑 -> 属性 -> 高级系统设置 -> 环境变量，这次就不是新建自己的变量了，是把 bin 目录追加到 "Path" 变量的值中，给 "Path" 的值追加 "`%JAVA_HOME%/bin`"，注意多个路径之间都是用分号隔开的，看看原来的后面有没有分号，没有要先加上再追加自己的路径，分号都是英文分号。因为我们已经添加了 "`JAVA_HOME`" 变量，它的值也就是 jdk 的目录，所以可以直接引用这个变量。

现在可以不用管命令行路径都可以调用 bin 目录下的命令了，因为当在当前命令行路径下搜寻不到命令是，就会再搜寻 Path 中列出的目录路径，找到了就执行，还是找不到就报错。

## 常用命令

这里说说几个 JAVA_HOME 下的 bin 目录下的两个常用命令。

java.exe 运行 class 字节码

javac.exe 编译 java 源代码
