# GIT教程 - 准备篇

软件系统是由许许多多的文件和文件夹组成的，这些文件和文件夹是我们一字一句敲出来的，过程中修修改改缝缝补补，在不用版本控制系统的情况下，总是通过复制一份，重命名成什么什么备份，这些看似靠谱的做法，实则一点也不靠谱，反正我是从来没有再去启用过那些备份文件。这些问题当用了 git 之后，就不会再存在了。

## git 是什么？

git 是一款版本控制系统，主要应用在软件开发领域。

## 学习教程

事实上，关于 git 的教程和它遵循的哲学思想，可以写一本“枕头书”，枕头书是什么意思，就是厚到可以当枕头，我们这里的定位是会使用，关于它的哲学理论随着技术水平的提高会得到一定程度的理解。

下面是 git 的官方学习教程，这个教程被翻译成许多国家的语言，其中有幸有中文版。

[GIT windows 版下载地址](https://git-scm.com/download/win)

[GIT 官方教程](https://git-scm.com/book/zh/v2)

## 感性认识 git
下面贴几张图片感性认识一下 git

![GIT教程](/images/learn/git.png)

![GIT教程](/images/learn/git-config.png)

![GIT教程](/images/learn/git-config-oneline.png)

## 新手该学习的知识点

```
# 查看命令的帮助
git

# 查看子命令的帮助
git <子命令> -h

# 例如查看 config 子命令的帮助
git config -h

# 新建仓库
# 这个命令会在当前目录生成 .git 文件夹，注意这个文件夹不能删除，里面的文件也不要去动它，就让它们静静地躺在那里
git init

# 跟踪文件
git add <filename>

# 例如跟踪当前目录下的 README.md 文件
git add README.md

# 提交
git commit -m '提交日志'

# 查看提交记录
git log

# 查看简洁的提交记录
git log --oneline

# 查看状态
# 这个命令是用得最频繁的，没有之一
git status

# 从最近的提交中检出某个文件
git checkout <filename>

# 例如检出 README.md 文件
git checkout README.md

# 从某个提交中检出某个文件
# 设某提交的id为 5cf2980 那么下面的命令可以从这次提交检出某文件，假设检出 README.md 文件
git checkout README.md 5cf2980

# 查看配置
# git 的配置分三份文件 分别是 global 全局配置 system 系统配置 local 本地配置
# 全局配置是针对各个仓库都适用的
# 系统配置本人截至教程发稿还没学习，这里就不介绍
# 本地配置是只当前仓库的配置，这个配置文件保存在 .git 文件夹中，一般情况下都是配置这个文件的
# 下面这条命令是以上三个配置文件合成的。就是说相同配置项的，本地优先级最高，系统次之，全局优先级最低
git config --list

# 查看全局配置
git config --global --list

# 查看系统配置
git config --system --list

# 查看本地配置
git config --local --list

# 设置配置项
# 不加 --global --system --local 这些选项，默认是配置本地的
git config <配置项> <配置值>

# 如配置 user.name
git config user.name allowing

# 全局配置 user.name
git config --global user.name allowing

# 本地配置 默认不加 --local 选项的话，就是配置本地的，所以下面的 --local 可以省略
git config --local user.name allowing

# 新建分支
git branch <branch name>

# 例如新建 allowing 分支
git branch allowing

# 切换到新建的分支
git checkout <branch name>

# 例如切换到 allowing 分支
git checkout allowing

# 基于某个提交点新建分支
# 一般在又想从头构建一个系统时，会想从零新建一个分支，这时这个命令就很有用了
# 设某提交 id 为 5cf2980，新建 allowing 分支
git branch allowing 5cf2980

# 配置远端仓库地址
git remote add <起个名称> <远端仓库地址>

# 设远端仓库地址 git@git.oschina.net:allowing/class001-homework.git
git remote add origin git@git.oschina.net:allowing/class001-homework.git

# 同步本地仓库到远端
git push <刚刚起的远端仓库名称> <本地分支名>

# 如同步本地仓库的 master 分支到远程
git push origin master

# 拉取远端 origin 仓库的 master 分支，并和本地仓库的同名分支合并
git pull origin/master
```
有很多很多的命令，英文好的同学完全可以运行

```
git <子命令> -h
```

查看帮助。

想学习更多更详细的 git 技术，可以报我们的课程，跟大伙一同学习。
