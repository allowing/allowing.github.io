<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 15:32
 */

/** @var \yii\web\View $this */
$this->title = '课程大纲';
?>


<div class="item">
    <h1 class="item-title">课程大纲</h1>
    <div class="item-content">
        <h2>前言</h2>
        <p>学习是一个过程，学到课程结束总会有收获。</p>
        <p>学完本套课程，可以掌握web开发的职业技能。具体能掌握哪些技能请看`主要课程`。</p>

        <h2>作业管理办法</h2>
        <ul>
            <li>以 git 为管理工具</li>
            <li>以开源中国为远程仓库托管商</li>
            <li>一个学员一个分支，不能合并其他学员的分支，学员自己管理好自己的分支</li>
            <li>不能污染 master 分支， master 分支是讲师维护的分支</li>
            <li>讲师每次在 master 分支布置作业，学员每次从 master 分支检出 homework 文件夹下的所有文件到自己的分支上</li>
            <li>学员根据检出的文件里的要求完成作业后提交</li>
            <li>作业不能不交</li>
            <li>作业的提交日志要写得尽量简洁详细</li>
            <li>每次做作业需要把上次的作业删除干净</li>
            <li>学员可以根据提交 id 查看历史作业</li>
            <li>讲师可能会在学员的分支上的任何文件批改，所以学员每次要尝试 git pull 拉取一下远程仓库的更新</li>
        </ul>

        <h2>阶段</h2>
        <ul>
            <li>准备阶段</li>
            <li>静态网页阶段</li>
            <li>动态网页阶段</li>
            <li>数据库阶段</li>
            <li>考验阶段</li>
        </ul>

        <h3>准备阶段</h3>
        <ul>
            <li>sublime text 3 编辑器的安装</li>
            <li>git和github的使用</li>
        </ul>

        <h3>静态网页阶段</h3>
        <ul>
            <li>介绍HTML的发展</li>
            <li>书写第一个HTML文档</li>
            <li>逐一介绍HTML5文档的标签</li>
            <li>书写第一个CSS样式表</li>
            <li>配合PSD设计稿书写HTML文档</li>
        </ul>

        <h3>动态网页阶段</h3>
        <ul>
            <li>
                <div>HTTP协议</div>
                <ul>
                    <li>认识协议</li>
                    <li>HTTP协议格式</li>
                    <li>认识一些重要的状态码</li>
                </ul>
            </li>
            <li>
                <div>学习PHP基础</div>
                <ul>
                    <li>php在windows下的安装</li>
                    <li>基础语法</li>
                </ul>
                <div>完成留言板实战项目</div>
            </li>
            <li>
                <div>学习PHP面向对象</div>
                <ul>
                    <li>对象的概述</li>
                    <li>从对象到类</li>
                    <li>从类到对象</li>
                    <li>对象中属性和方法的访问控制</li>
                    <li>类的继承</li>
                    <li>抽象类</li>
                    <li>接口</li>
                </ul>
            </li>
            <li>设计框架</li>
            <li>用自己的框架写留言板</li>
        </ul>

        <h3>数据库阶段</h3>
        <p>SQL语句的学习</p>
        <h3>考验阶段</h3>
        <p>笔试，机试，实战项目评测</p>
        <hr>
        <p>这里只是列举一些点，课堂实践中的内容远不止以上列举这些</p>
    </div>
</div>

