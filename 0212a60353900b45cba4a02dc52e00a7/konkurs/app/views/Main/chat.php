<!--Чат-->
<!-- <form name="form1" method="GET" onsubmit="return checkform(this);" target="_blank" action="/demo/demoHTML5.jsp">
    <input type="hidden" id="username" name="username" value="" placeholder="Enter Your Name" size="29" class="field input-default" autofocus>
    <input type="submit" value="Войти в ВКС" class="submit_btn button success large"><br>
    <input type="hidden" name="isModerator" value="true">
    <input type="hidden" name="action" value="create">
</form> -->
<!--<div style="margin: -25px;">-->
    <?php if(empty($_GET['q'])): ?>
        <iframe style="width:100%; height:740px" src="/demo/demoHTML5.jsp?username=rssllrrk89&isModerator=true&action=create" frameborder="0"></iframe>
    <?php else: ?>
    <div class="d-flex justify-content-center align-items-center h-100">
        <a href="?q=1" class="btn btn-success d-block" style="font-size: 2em;font-weight:bold;">Войти в ВКС</a>
    </div>
    <?php endif; ?>
<!--</div>-->