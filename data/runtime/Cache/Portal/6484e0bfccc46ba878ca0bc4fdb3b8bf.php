<?php if (!defined('THINK_PATH')) exit();?><body     style="background: #000;">
	  <script src="/themes/game/Public/js/homepage/jq.js" type="text/javascript"></script>  
<script>
function tongyi(){
    $.post("/index.php/portal/index/tongyi",{},function(result){
         window.location.reload();
      },'json');
}
</script>  
<div class="alert"><div class="alertBack"></div> 

<img onclick="tongyi();" src="/app/img/common/alertNoty.png" style="position: absolute; top: 15vh; width: 80vw; left: 10vw;">

</div>
</body>