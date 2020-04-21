---
title: 宝塔的定时任务指定用户运行脚本
date: 2020-04-21 10:34:45
tags:
    - 宝塔
    - 定时任务
---

用宝塔的定时任务默认是以 root 用户运行脚本的，先不说 root 权限高，比较危险。就说 Laravel 框架的任务调度，如果是 root 用户创建的日志，php-fpm 通常指定为 www 用户，那么这时候 www 用户就无法写入 root 用户创建的日志文件。

所以我们希望 php-fpm 进程的用户，应该和任务调度的进程用同一个用户运行，比如都用 www 用户。这时你会发现宝塔的定时任务对话框里没有指定用户的方法。这时我们可以用 `su` 来包装一下欲执行的脚本即可。比如

```shell
su --login www --command /www/server/php/73/bin/php /www/wwwroot/demo-project/artisan schedule:run >> /dev/null 2>&1
```
