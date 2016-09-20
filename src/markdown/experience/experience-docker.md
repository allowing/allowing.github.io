# 今天玩了一天的 Docker

自己总结的一些知识点：

* docker 主要目的是隔离环境。
* docker 是用 go 语言编写的应用程序。
* docker 原本没有 windows 版本的。
* Boot2Docker 是 windows 版。
* windows 版本的 Boot2Docker 只是一个管理工具。
* windows 的 docker 功能要借助 Oracle VM VirtualBox 运行 Linux 系统，此 Linux 系统作为宿主机。
* 容器是需要镜像启动的。
* 容器需要镜像来启动。
* 镜像是一个特殊的 Linux 系统。
* 可以自己制作一个镜像，分发给其他人，从而获得一致的环境。
* 可以共享一个本地的文件夹到容器，实现在桌面系统开发，而在目标系统运行，从而扫平环境的差异。

