<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 15:29
 */

/** @var \yii\web\View $this */
$this->title = '首页';
?>
<style>
    .index-slide-box {
        overflow: hidden;
        position: relative;
        margin: 20px 0;
    }
    .index-slide-box .hd {
        position: absolute;
        z-index: 5;
        width: 100%;
        text-align: center;
        font-size: 0;
        bottom: 20px;
    }
    .index-slide-box .hd .item {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #fff;
        border-radius: 50%;
        margin: 0 5px;
        cursor: pointer;
    }
    .index-slide-box .hd .on {
        background-color: #3f51b5;
    }
    .index-slide-box .bd {
        height: 300px;
        background: #ccc;
    }
</style>

<div class="item">
    <div class="index-slide-box">
        <ul class="hd">
            <li class="item">1</li>
            <li class="item">2</li>
            <li class="item">3</li>
        </ul>
        <ul class="bd">
            <li><img src="/images/index-slide-1.png" alt=""></li>
            <li><img src="/images/index-slide-2.png" alt=""></li>
            <li><img src="/images/index-slide-3.png" alt=""></li>
        </ul>
    </div>
    <div class="item-content">
        <h2>联系</h2>
        <p>黎老师，电话：13143515415，微信：Ljj1076707907</p>

        <h2>开课动态</h2>
        <p style="color: #3f51b5"><strong>2016-08-21(周日)，class001届将正式开课，目前还有少量学位，欲报从速啦...</strong></p>

        <h2>作业仓库</h2>
        <p>class001届仓库地址：<a target="_blank" href="http://git.oschina.net/allowing/class001-homework">http://git.oschina.net/allowing/class001-homework</a></p>

        <h2>问答</h2>
        <p>Q: 什么是职业技术？</p>
        <p>A: 职业技术是指面对从事的工作所要掌握的必要技能。</p>
        <p>Q: 我如果参加了学习能从事什么工作？</p>
        <p>A: 可以从事网站开发、电子商城建设、OA办公系统等等。</p>
        <p>Q: 工作好找吗？</p>
        <p>A: 非常好找。</p>
        <p>Q: 学习周期多长？</p>
        <p>A: 5到6个月（视个人能否达上岗标准）。</p>
        <p>Q: 我能不能参加学习？</p>
        <p>A: 原则上最低要求高中毕业，视个人能力可降低要求。</p>
        <p>Q: 我已经不是学生很多年了能不能参加学习？</p>
        <p>A: 可以，只要保证跟着老师走，保证完成任务。</p>
        <p>Q: 我还是有点犹豫，怎么办？</p>
        <p>A: 我相信你只要看到了这些内容，你应该想从事这行了，不要优柔寡断了。</p>
        <p>Q: 我怕学不会怎么办？</p>
        <p>A: 跟着老师走一定行，人类都具有学习的能力。</p>
    </div>
</div>

<script>
    (function ($) {
        $('.index-slide-box').slide({
            autoPlay: true,
        });
    })(jQuery);
</script>
