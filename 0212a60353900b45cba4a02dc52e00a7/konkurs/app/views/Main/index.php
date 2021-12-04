<?php /*if(!empty($posts)): */?><!--
    <?php /*foreach($posts as $post): */?>
        <div class="content-grid-info">
            <img src="/blog/images/post1.jpg" alt=""/>
            <div class="post-info">
                <h4><a href="<?/*=$post->id;*/?>"><?/*=$post->title;*/?></a>  July 30, 2014 / 27 Comments</h4>
                <p><?/*=$post->excerpt;*/?></p>
                <a href="<?/*=$post->id;*/?>"><span></span><?php /*__('read_more');*/?></a>
            </div>
        </div>
    <?php /*endforeach; */?>
    <div class="text-center">
        <p>Статей: <?/*=count($posts);*/?> из <?/*=$total;*/?></p>
        <?php /*if($pagination->countPages > 1): */?>
            <?/*=$pagination;*/?>
        <?php /*endif; */?>
    </div>
<?php /*else: */?>
    <h3>Posts not found...</h3>
--><?php /*endif; */?>
<!--<div class="row">-->
<!--    <div class="col-8">-->
<!--        <div class="panel border-gradient border-gradient-p">-->
<!--            <span>123</span>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-4">-->
<!--        <div class="panel border-gradient border-gradient-p">-->
<!--            <div>123</div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<div class="panel border-gradient border-gradient-p mt-3" style="height: 200px">-->
<!--    <div>123</div>-->
<!--</div>-->

<!--Главная-->
<div class="px-4">
    <h2>ПСБ получил награду «Лидер в онлайн-кредитовании МСБ»
    в рамках III ежегодного форума «FinSME-2019</h2>
    <p><small class="text-muted">программы > наноэлектроника</small></p>
    <a href="#" class="btn btn-light">Подписаться</a>
</div>
<div class="text-center mt-5">
    <img src="/images/pcb-big.png" alt="" width="90%">
</div>