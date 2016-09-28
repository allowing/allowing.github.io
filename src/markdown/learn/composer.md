# composer 使用技巧和使用经验

## 前言

composer 是 php 的包管理工具，现在每一门语言，都会有一个包管理工具。

更多学习请看：

[composer 官网](https://getcomposer.org/)

[composer 中国](http://www.phpcomposer.com/)

## 包管理工具的优点

* 所有的包都存放在线上，如 github
* 发布软件时，不用连依赖包一起发布，减小软件容量
* 公开的包还可以全球共享
* 自动解决依赖的版本问题
* 使得软件更模块化

## 使用经验

* 在我国特殊的网络环境下，一定要设置中国镜像，因为下载包的时候，要联网，包都保存在国外的服务器，所以会很慢。设置方式请参考：[http://pkg.phpcomposer.com/](http://pkg.phpcomposer.com/)
* 不要重命名 composer 默认存放第三方包的目录名，默认的是 vendor
* 不要把 vendor 放到版本控制系统里
* 一定要把 composer.json 和 composer.lock 文件一起提供，并纳入到版本控制系统里
* 永远不要把自己的代码放到 vendor 目录，除非已经制作成 composer 包，并发布
* 永远不要手动修改 vendor 下面的代码

```
# 查看全局安装了哪些包
composer global show

# 移除包
composer remove <包名>

# 比如想移除 foo/bar
composer remove foo/bar

# 查看 composer 支持的所有子命令
composer list

# 执行命令时，想查看命令的执行情况可以带上 -v 选项，
# 可以像这样 -v -vv -vvv ，v 的可以最多 3 个，v 越多信息越详细，具体的自己体会
composer list -vvv

# 查看当前项目安装了哪些包
composer show

# 打印命名空间到 php 文件
#
# 当在 composer.json 文件声明了一个命名空间前缀到文件基目录的映射时，
# 需要打印到一个 composer 维护的 php 文件，这时需要调用 composer 提供的命令行接口了，如下
composer dump-autoload

# 查看配置
composer config --list

```

## 一些子命令的翻译

这些翻译是请一个女同学人工翻译的，在这里非常感谢这位同学。

```
Composer version 1.2.1 2016-09-12 11:27:19

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
                                 显示这条帮助信息
  -q, --quiet                    Do not output any message
                                 不输出任何信息问任何交互式的
  -V, --version                  Display this application version
                                 显示这个应用的版本
      --ansi                     Force ANSI output
                                 强制使用 ANSI 标准输出
      --no-ansi                  Disable ANSI output
                                 使 ANSI 标准输出失效
  -n, --no-interaction           Do not ask any interactive question
                                 不问任何交互式的问题
      --profile                  Display timing and memory usage information
                                 显示时间和内存使用信息
      --no-plugins               Whether to disable plugins.
                                 是否使插件失效
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
                                 如果指定，使用给定的目录作为工作目录
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
                                 增加消息的冗长：1是正常输出，2是更冗长输出，3是bug

Available commands:
  about           Short information about Composer
                  关于Composer的简短信息
  archive         Create an archive of this composer package
                  为这个 composer 包创建一个归档
  browse          Opens the package's repository URL or homepage in your browser.
                  在你的浏览器中打开这个包的仓库地址或者主页
  clear-cache     Clears composer's internal package cache.
                  清除composer内部包的缓存
  clearcache      Clears composer's internal package cache.
                  清除composer内部包的缓存
  config          Set config options
                  设置配置选项
  create-project  Create new project from a package into given directory.
                  在给定的目录下从一个包创建一个新的工程
  depends         Shows which packages cause the given package to be installed
                  显示哪个包导致给定的包被安装（显示安装这个包需要哪个包）
  diagnose        Diagnoses the system to identify common errors.
                  诊断系统鉴定常见错误
  dump-autoload   Dumps the autoloader
                  打印自动加载
  dumpautoload    Dumps the autoloader
                  打印自动加载
  exec            Execute a vendored binary/script
                  执行一个供应商二进制/脚本文件
  global          Allows running commands in the global composer dir ($COMPOSER_HOME).
                  允许在composer全局目录下运行的命令
  help            Displays help for a command
                  显示命令帮助
  home            Opens the package's repository URL or homepage in your browser.
                  在你的浏览器中打开包的仓库地址
  info            Show information about packages
                  显示关于包的信息
  init            Creates a basic composer.json file in current directory.
                  在当前目录下创建一个基本的 composer.json 文件
  install         Installs the project dependencies from the composer.lock file if present, or falls back on the composer.json.
                  依赖composer.lock创建一个工程 ,如果composer.lock文件存在的话;否则回调依赖composer.josn文件
  licenses        Show information about licenses of dependencies
                  显示依赖的许可信息
  list            Lists commands
                  列出命令
  outdated        Shows a list of installed packages that have updates available, including their latest version.
                  显示已安装的包的可更新列表，包括他们的最新版本
  prohibits       Shows which packages prevent the given package from being installed
                  显示导致给定的包安装失败的包
  remove          Removes a package from the require or require-dev
                  从require或者require-dev移除一个包
  require         Adds required packages to your composer.json and installs them
                  添加被要求的包到你的composer.json文件，然后安装他们
  run-script      Run the scripts defined in composer.json.
                  运行定义在composer.json的脚本
  search          Search for packages
                  查找包
  self-update     Updates composer.phar to the latest version.
                  将composer.phar更新到最新的版本
  selfupdate      Updates composer.phar to the latest version.
                  将composer.phar更新到最新的版本
  show            Show information about packages
                  显示包的信息
  status          Show a list of locally modified packages
                  显示本地修改的包的列表
  suggests        Show package suggestions
                  显示建议的包
  update          Updates your dependencies to the latest version according to composer.json, and updates the composer.lock file.
                  根据composer.json文件将你的依赖更新到最新版本，然后更新composer.lock文件
  validate        Validates a composer.json and composer.lock
                  验证一个composer.json和composer.lock
  why             Shows which packages cause the given package to be installed
                  显示导致给定的包被安装的包
  why-not         Shows which packages prevent the given package from being installed
                  显示导致给定的包安装失败的包

```




