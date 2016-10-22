# 摸索学习 Docker 的笔记

Docker 对于环境的统一起到非常重要的作用。有了 Docker ，在也不用担心环境差异、环境搭建麻烦等问题了。同时，运维可以设计出一个符合自己个性的容器，然后处处使用。

用了 Docker 可以 "Config once, run anywhere" 。

```
# 查看运行中的容器
docker ps

# 查看容器正在运行的进程
docker top <容器 id>

# 查看镜像列表
docker images

# 和一个运行中的容器进行交互
docker exec -it <容器 id> /bin/bash
```

## 感受

* 使用 `Dockerfile` 文件来构建容器真是太方便了，只需要安装了 Docker ，然后根据 Dockerfile 文件就可以构建一个完全一致的容器。
* 国内连接 Docker Hub 很慢，这点导致下载系统镜像变慢，从而加长构建时间和连接超时的概率。

因为本文是个人学习笔记，所以会不定时更新。
