# Windows 下 nginx 和 php 的整合

我之前一直都是使用 Apache ，但是在构建本站的时候，升级一下 Apache ，发现总会间歇性的无法访问，或者一段时间之后，首次打开怎么也访问不了，要刷新一下才能访问。一冷却就访问不了，于是我就尝试用一下从未使用过的 nginx 。

使用 nginx 我最大的感受是，轻快、配置简单、整合 php 简单。

nginx 是直接通过 php-cgi 监听的端口找到 php 的。php-cgi 启动，然后监听端口（比如 9000），然后 nginx 需要 php 引擎解析时，就会给这个端口发送信息，两者是通过 cgi 协议通讯的。

问题是，一个 php-cgi 进程，一次只能处理一个请求，那么怎么并行处理更多请求呢？这里是通过 php-cgi 创建子进程实现的。在命令行下，通过 `set PHP_FCGI_CHILDREN=5` 命令，就设置了 5 个子进程，连同父进程，就一共有 6 个 php-cgi 进程。父进程本身不担任脚本解析工作，而是把解析工作交给子进程，此时父进程充当进程管理、调度分发的角色。

图为查看 php-cgi 的帮助：

![查看cgi帮助](/images/experience/php-cgi-help.png)

图为设置和查看 PHP_FCGI_CHILDREN 环境变量：

![环境变量](/images/experience/php-cgi-envar.png)

图为 php-cgi 进程：

![php-cgi进程](/images/experience/php-cgi-pros.png)

不幸的是，PHP_FCGI_CHILDREN 变量在 Windows 中，仅 php7 或以上版本才支持，php5 或以下都不支持。也就是说 php5 或以下版本，只能启动一个 php-cgi 进程，要么启动多个监听不同端口，再用其他手段让 nginx 把请求转发给这些端口。但是 php7 向下兼容性高，你完全可以马上切换到 php7，只要你的项目不是非常古老。

最后的结论：Windows 真不适合服务器领域。
