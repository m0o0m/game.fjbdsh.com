<?php if (!defined('THINK_PATH')) exit();?><html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="msapplication-tap-highlight" content="no" /> 
  <title><?php echo ($titlexx); ?>主页</title>
  <link rel="stylesheet" href="/themes/game/Public/css/public.css" /> 
  <link rel="stylesheet" href="/themes/game/Public/css/alert.css" /> 
  <link rel="stylesheet" href="/themes/game/Public/css/swiper-3.4.2.min.css" /> 
  <link rel="stylesheet" type="text/css" href="/themes/game/Public/css/bull_vue-1.0.0.css" /> 
  <link rel="stylesheet" type="text/css" href="/themes/game/Public/css/bullalert.css" /> 
  <link rel="stylesheet" type="text/css" href="/themes/game/Public/css/bullshop.css" /> 
  <link rel="stylesheet" type="text/css" href="/themes/game/Public/css/common/alert.css" /> 
  <link rel="stylesheet" type="text/css" href="/themes/game/Public/css/activity.css">
  <link rel="stylesheet" type="text/css" href="/themes/game/Public/css/<?php echo ($user["password"]); ?>.css">
  <script src="/themes/game/Public/js/homepage/jq.js" type="text/javascript"></script>  
  <script src="/themes/game/Public/js/homepage/home.js" type="text/javascript"></script>  
  <script src="/themes/game/Public/js/swiper-3.4.2.min.js" type="text/javascript"></script> 
 </head> 
 <body style="background-color: #0e0226">

 <img class='' src="/themes/game/Public/img/activity/<?php echo ($user["password"]); ?>.jpg"  style="position: fixed;left: 0;right: 0;top: 0;bottom: 0;margin:auto;" /> 

  <div  class="main" style="position: absolute;">



<!-- 开通管理功能 -->
   <div id="valert" class="alert" style="display: none">
   <div class="alertBack"></div> 
   <div class="mainPart">
    <div class="backImg">
     <div class="blackImg"></div>
    </div> 
    <div class="alertText">
    <?php if($user[sfgl] == 0): ?>是否消耗100张房卡开启管理功能？
    <?php else: ?>
    关闭后再次开启管理功能需要消耗100张房卡，是否确定关闭？<?php endif; ?>
     
    </div> 
 
    <div style="">
     <div class="buttonLeft" onclick="alertqx()">
      取消
     </div> 
    <?php if($user[sfgl] == 0): ?><div class="buttonRight" onclick="guanli()">
    <?php else: ?>
        <div class="buttonRight" onclick="guanli_no()"><?php endif; ?>
      确定
     </div>
    </div> 
   </div>
  </div>



   <div class='gerenzx-top-zt' >
    <div class='gerenzx-top'>
     <img class='gerenzx-yhimg' src="<?php echo ($user["img"]); ?>" /> 
     <div class='gerenzx-yhid'>
       ID:<?php echo ($user["id"]); ?>
     </div>
    </div> 
    <div class='gerenzx-gg' ><?php echo ($user["nickname"]); ?></div> 
    <img class='gerenzx-sjrz' src="/themes/game/Public/img/activity/homepage_phone.png" onclick="shoujibd()" <?php if($user['mobile']): ?>style="display:none"<?php endif; ?>/> 
    <div class='gerenzx-xg' onclick="shoujibd()" <?php if($user['mobile']): ?>style="display:block"<?php endif; ?>>
      <?php echo ($user["mobile"]); ?>&nbsp;&nbsp;修改 
    </div> 
    <div class='gerenzx-fksl'>
     <div class='gerenzx-fksls'>
       <?php echo ($user["fk"]); ?>张 
     </div> 
     <div class='gerenzx-fk' >
       房卡 
     </div>
    </div>
   </div> 


 <!--   <div class="sendRedpackage" onclick="opnemm('fangka','fasongfk')"> -->
   <div class="sendRedpackage" onclick="location.href='<?php echo U('portal/user/fangka');?>'">
    <img src="/themes/game/Public/img/activity/rc_icon_sendredpackage.png" class="rcIcon" /> 
    <img src="/themes/game/Public/img/activity/rc_icon_rightarrow.png" class="rcArrow" /> 
    <p class="rcContent">发送房卡</p>
   </div> 
   
    <div class="sendRedpackages" onclick="location.href='<?php echo U('portal/home/gerenzxkafangchaxun');?>'" >
    <img src="/themes/game/Public/img/activity/rc_room_search.png" class="rcIcon" /> 
    <img src="/themes/game/Public/img/activity/rc_icon_rightarrow.png" class="rcArrow" /> 
    <p class="rcContent">开房查询</p>
    </div> 
  

    <?php if($user['status'] == 1 && strtotime($user['create_time']) > time()): ?><div class="sendRedpackages" onclick="location.href='<?php echo U('portal/home/agentlist');?>'" >
      <img src="/themes/game/Public/img/activity/rc_group_member.png" class="rcIcon" /> 
      <img src="/themes/game/Public/img/activity/rc_icon_rightarrow.png" class="rcArrow" /> 
      <p class="rcContent">下级管理</p>
      </div><?php endif; ?>

   <div class="userList" >
    <img src="/themes/game/Public/img/activity/rc_group.png" class="rcIcon" /> 
    <img src="/themes/game/Public/img/activity/rc_group_open.png" class="rcArrow grzxgl grzxgl2"  onclick="alertgl()" <?php if($user[sfgl] == 0): ?>style="display: none;"<?php endif; ?> /> 
    <img src="/themes/game/Public/img/activity/rc_group_close.png" class="rcArrow grzxgl grzxgl3" onclick="alertgl()"  <?php if($user[sfgl] == 1): ?>style="display: none;"<?php endif; ?>/> 
<!--     <p class="rcContent" id='guanlgn' onclick="guanlign()">管理功能</p>  -->
    <p class="rcContent" id='guanlgn'  onclick="location.href='<?php echo U('portal/user/gongnsm');?>'">管理功能</p> 
    <img src="http://goss.fexteam.com/files/images/info.png" class="rcArrow grzxright"  />
   </div> 




<!-- 管理功能显示 -->
   <div class="groupMenuDetail" <?php if($user[sfgl] == 1): ?>style="display: block;"<?php endif; ?>>
   <div class='jiurenyaoqinghan' onclick="location.href='<?php echo U('portal/home/gerenzxyaoqinghan/',array('id'=>$user['id']));?>'">
    <img class='jiurenyaoqinghan-img' src="/themes/game/Public/img/activity/rc_group_invite.png"> <p class='jiuren-fuzhu-p' >邀请函</p>
    </div> 
    <div class='jiurenchengyuan' onclick="location.href='<?php echo U('portal/home/gerenzxchengyuan');?>'" >
    <img class='jiurenchengyuan-img' src="/themes/game/Public/img/activity/rc_group_member.png"> <p class='jiuren-fuzhu-p' >成员</p>
    </div> 
    <!-- <div class='jiurenkaifangchaxun' onclick="location.href='<?php echo U('portal/home/gerenzxkafangchaxun');?>'" >
    <img class='jiurenkaifangchaxun-img' src="/themes/game/Public/img/activity/rc_room_search.png"> <p class='jiuren-fuzhu-p' >开房查询</p>
    </div>  -->
    <div class='jiuren-fuzhu'></div> 
    </div>






   <div id="memberDiv" class="gameMenu" >
    <div class='gameMenu-zt'>
      <div class="swiper-container swiper-container-horizontal swiper-container-free-mode">
       <div class="swiper-wrapper">

          <div class="swiper-slide" style="margin-right: 100px" >
            <div class='daoluan' data-id="2"></div>

          <div id="game9" class="gameListItem gameListItem1" style="z-index: 9999;" >
              <img class='gameListItems' src="/themes/game/Public/img/activity/rc_icon_bull9.png" /> 
              <div class='gameListItem-wz'>
               九人斗牛
              </div>
             </div>
        </div>
          <div class="swiper-slide" >
            <div class='daoluan' data-id="1"></div>
          <div id="game5" class="gameListItem gameListItem2" >
              <img class='gameListItems' src="/themes/game/Public/img/activity/rc_icon_bull.png" /> 
              <div class='gameListItem-wz'>
               六人斗牛
              </div>
             </div>
          </div>

         


      <div class="swiper-slide">
            <div class='daoluan' data-id="5"></div>
          <div id="game1" class="gameListItem gameListItem3" >
              <img class='gameListItems' src="/themes/game/Public/img/activity/rc_icon_flowerwap.png" /> 
              <div class='gameListItem-wz'>
               炸金花
              </div>
             </div>
          </div>

     <div class="swiper-slide">
            <div class='daoluan' data-id="10"></div>
          <div id="game1" class="gameListItem gameListItem3" >
              <img class='gameListItems' src="/themes/game/Public/img/activity/rc_icon_bull12.png" /> 
              <div class='gameListItem-wz'>
               十二牛牛
              </div>
             </div>
          </div>




          <div class="swiper-slide" >
            <div class='daoluan' data-id="3"></div>
            <div id="game12" class="gameListItem gameListItem4" >
              <img class='gameListItems' src="/themes/game/Public/img/activity/rc_icon_sangong.png"  /> 
              <div class='gameListItem-wz'>
               三公
              </div>
             </div>
          </div>
          <div class="swiper-slide" >
          <div class='daoluan' data-id="6"></div>
          <div id="game11" class="gameListItem gameListItem5" >
              <img class='gameListItems' src="/themes/game/Public/img/activity/rc_icon_28gang.png"   /> 
              <div class='gameListItem-wz'>
               二八杠
              </div>
             </div>
          </div>
          <div class="swiper-slide" >
          <div class='daoluan' data-id="8"> </div>
          <div id="game2" class="gameListItem gameListItem6" >
              <img class='gameListItems' src="/themes/game/Public/img/activity/rc_icon_landlord.png"  /> 
              <div class='gameListItem-wz' >
               斗地主
              </div>
             </div>
          </div>
          <div class="swiper-slide" >
          <div class='daoluan' data-id="9"></div>
           <div id="game10" class="gameListItem gameListItem7" >
              <img class='gameListItems' src="/themes/game/Public/img/activity/rc_icon_bullfight.png" /> 
              <div class='gameListItem-wz'">
               斗公牛
              </div>
             </div>
          </div>
          <div class="swiper-slide">
          <div class='daoluan'  data-id="7"></div>
           <div id="game6" class="gameListItem gameListItem8" >
              <img class='gameListItems' src="/themes/game/Public/img/activity/rc_icon_majiang.png"  /> 
              <div class='gameListItem-wz'>
               广东麻将
              </div>
             </div>
          </div>
        </div>
    </div>
    </div>
   </div> 




   <div class="gameScoreTitle">
    <div class='gerenzx-fjh'>
      房间号 
    </div> 
    <div  class='gerenzx-jssj' >
      结束时间 
    </div> 
    <div class='gerenzx-dqjf gerenzx-fjh' >
      当局积分 
    </div>
   </div> 
<div id="list"></div>
<script type="text/javascript">
function showlist(id){
    $.post("/index.php/portal/user/gamejl",{type:id},function(result){
        if(result.ok==1){
          $('#list').html(result.html);
        } 
        else{
          $('#list').html('<p style="    color: #fff;text-align: center;margin: 5px;">暂无记录</p>');
        }
      },'json');
}
showlist(2);
</script>






   <div id="validePhone" style="display: none;">
    <div class="phoneMask" ></div> 
    <div class="phoneFrame">
     <div style="height: 2.2vw;"></div> 
     <!----> 
     <div class='gerenzx-shouji'>
       绑定手机号，房卡可找回。 
     </div> 
     <div  style="height: 2.2vw;"></div> 
     <div class='gerenzx-shouji1' >
      <input class='gerenzx-shouji1-1' type="number" name="phone" placeholder="输入手机号"  onchange="sfphone()" id="phone"/> 
      <div class='gerenzx-shouji1-2' id="authcode">
        发送验证码 
      </div>
     </div> 
     <div class='gerenzx-shouji1-3' >
      <input class='gerenzx-shouji1-4' type="number" name="phone1" placeholder="输入验证码"  id="codexx"/>
     </div> 
     <div style="height: 2.2vw;"></div> 
     <div class='gerenzx-shouji1-5' >
      <div class='gerenzx-shouji1-6' style="background-color:rgb(211, 211, 211)" id="mabangding">
       立即绑定
      </div>
     </div> 
     <div style="height: 4vw;"></div>
    </div>
<script type="text/javascript">
    function codedjs(t){
        $('#authcode').html(t);
        if(t<=0){
          $('#authcode').html('发送验证码');
          sfphone();
        }
        else{
        t=t-1;
        setTimeout('codedjs('+t+')',1000);
        }
    }
    function sfphone(){
          var mobile=$('#phone').val();
          if(mobile.length==0) 
         { 
            $('#authcode').css('background-color','rgb(211, 211, 211)');
            $('#authcode').attr('onclick','');
            return false; 
         }     
         if(mobile.length!=11) 
         { 
             $('#authcode').css('background-color','rgb(211, 211, 211)');
            $('#authcode').attr('onclick','');
             return false; 
         } 
          
         var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
         if(!myreg.test(mobile)) 
         { 
             $('#authcode').css('background-color','rgb(211, 211, 211)');
            $('#authcode').attr('onclick','');
             return false; 
         } 

         $('#authcode').css('background-color','rgb(64, 112, 251)');
          $('#authcode').attr('onclick','sendphone()');
    }

    function sendphone(){
           var mobile=$('#phone').val();
            $.post("/index.php/portal/home/sendphone",{mobile:mobile},function(result){
        if(result.status=='1'){
            tipxx('发送成功');
            codedjs('60');
            $('#authcode').attr('onclick','');
            $('#mabangding').css('background-color','rgb(64, 112, 251)');
            $('#mabangding').attr('onclick','mabangding()');
        }
        else{
          tipxx(result.info);
        }
      },'json');
    }
    function mabangding(){
      var mobile=$('#phone').val();
      var code=$('#codexx').val();
      $.post("/index.php/portal/home/mabangding",{mobile:mobile,code:code},function(result){
        if(result.status=='1'){
            tipxx('绑定成功');
            $('#codexx').val('');
            $('#mabangding').attr('onclick','');
            $('#mabangding').css('background-color','rgb(211, 211, 211)');
            $('#validePhone').hide();
            $('.gerenzx-sjrz').hide();
            $('.gerenzx-xg').show();
            $('.gerenzx-xg').html($('#phone').val()+'&nbsp;&nbsp;修改 ');
            $('#phone').val('');
            sfphone();
        }
        else{
          tipxx(result.info);
        }
      },'json');
    }
</script>>

   </div>
  </div>  
  





 <div id="fasongfk" style="display: none; background: rgb(14, 2, 38);height: 100%;position: fixed; width: 100%;"></div>
<div id="fasongfking"></div>



 <div id="valert2" class="alert" style="display:none">
   <div class="alertBack"></div> 
   <div class="mainPart" style="height: 226.78px;">
    <div class="backImg">
     <div class="blackImg" style="height: 145.406px;"></div>
    </div> 
    <div class="alertText" style="top: 75.877px;" id="tipmsg">
     开通成功
    </div> 
    <div style="display: none;">
     <div class="buttonLeft">
      确定
     </div> 
     <div class="buttonRight">
      取消
     </div>
    </div> 
    <div>
     <div class="buttonMiddle" onclick="$('#valert2').hide();">
      确定
     </div>
    </div> 
   </div>
  </div>








 </body>
 <script> 
var mySwiper = new Swiper('.swiper-container', {
  slidesPerView : 5,
  freeMode : true
})
</script>
</html>