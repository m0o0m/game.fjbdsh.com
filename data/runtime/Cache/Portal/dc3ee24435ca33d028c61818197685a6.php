<?php if (!defined('THINK_PATH')) exit();?><html onapp="app" style="height: 100%;width: 100%;overflow: hidden;">
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="msapplication-tap-highlight" content="no" /> 
  <meta name="x5-fullscreen" content="true">
<meta name="full-screen" content="yes">
  <title><?php echo ($titlexx); ?>大厅</title> 
  <link rel="stylesheet" href="/app/css/loading.css" /> 
  <link rel="stylesheet" type="text/css" href="/app/css/homepage/homepage11-1.0.0.css" />
  <link rel="stylesheet" href="/app/css/publicxxxx.css" />
  <link rel="stylesheet" href="/app/css/app.css" /> 
  <style>
/*  .createB{
    height: 73vh !important;
  } */

   .blueBack{
        height: 50vh !important;
   }
 /*  .createCommit{
      position: absolute !important;
      bottom: -9vh !important;
   }*/
   .main{
    position: absolute;
   }
  </style>
  <script src="/app/open/js/jweixin-1.0.0.js"></script> 
  <script src="/app/js/homepage/jq.js" type="text/javascript"></script> 
  <script src="/app/js/homepage/home.js" type="text/javascript"></script>
     <script src="/app/js/base64.js" type="text/javascript"></script>
  <script src="/app/js/app.js" type="text/javascript"></script>
  <script src="/index.php/portal/index/gamejs" type="text/javascript"></script> 
  <script type="text/javascript">
  $(document).ready(function(){
    document.getElementById("room").addEventListener("click",function(e) {
      if(e.target && e.target.className == "cancelCreate") {
        // 真正的处理过程在这里
        $('#room').hide();
      }
    });
  });
  </script>
  <style type="text/css">
  .cjfj-home-img9,.cjfj-home-img8,.cjfj-home-img7,.cjfj-home-img6,.cjfj-home-img5,.cjfj-home-img4,.cjfj-home-img3,.cjfj-home-img2,.cjfj-home-img1{
    z-index: 100;
  }
  .createRoom .mainPart .cancelCreate{
    z-index: 200;
     cursor: pointer;
  }
  </style>
 </head> 
 <body style="background: #000;height: 100%;width: 100%;overflow: hidden;" class="onscope"> 
  <!--<div class="main"  style="position: absolute;" > 
   <div class="onhide"> 
    <img class='onhide-img'  src="/app/files/d_13/images/common/alert_icon.png" /> 
   </div> 
   <div id="marquee" class="js-marquee-wrapper chuangjfj-top"> 
    <div class="js-marquee"> 
    </div> 
    <div class="js-marquee"> 
    </div> 
   </div> 
  </div>--> 
  <div onclick="createRoom()" class="cjfj-puls"></div> 
  <img class="chuangjfj-bj" src="/app/img/home/body1-1.jpg" id="homebg"/> 
  <img class="chuangjfj-bj-img" src="/app/img/home/top-1.png"  id="topImg"/> 

  
  <div class="user chuangjfj-yonghuimg" onclick="location.href='<?php echo U('portal/user/index');?>'" style="z-index: 102;"> 
     <img  class="avatars"  src="" id="userimg"/> 
     <a class="name onbinding cjfj-name" id="nickname">--</a> 
  </div> 
  <div class="roomCard chuangjfj-fangka"> 
   <img src="/app/img/public/roomCard.png" class="img1 cjfj-fk1" /> 
   <a class="num onbinding cjfj-fk" id="fknum">--</a> 
  </div> 
  <div id="allgame" style="width: 100%;height: 100%;    position: absolute;
    z-index: 100;    overflow: scroll;
">
  </div>
  <div class="createRoom" style="display: none" id="room"></div>

  <script>

//   var overscroll = function(el) {
//   el.addEventListener('touchstart', function() {
//     var top = el.scrollTop
//       , totalScroll = el.scrollHeight
//       , currentScroll = top + el.offsetHeight;
//     //If we're at the top or the bottom of the containers
//     //scroll, push up or down one pixel.
//     //
//     //this prevents the scroll from "passing through" to
//     //the body.
//     if(top === 0) {
//       el.scrollTop = 1;
//     } else if(currentScroll === totalScroll) {
//       el.scrollTop = top - 1;
//     }
//   });
//   el.addEventListener('touchmove', function(evt) {
//     //if the content is actually scrollable, i.e. the content is long enough
//     //that scrolling can occur
//     if(el.offsetHeight < el.scrollHeight)
//       evt._isScroller = true;
//   });
// }
// document.body.addEventListener('touchmove', function(evt) {
//   //In this case, the default behavior is scrolling the body, which
//   //would result in an overflow.  Since we don't want that, we preventDefault.
//   if(!evt._isScroller) {
//     evt.preventDefault();
//   }
// });
// overscroll(document.getElementById('allgame'));

     load('show');
     token='<?php echo ($token); ?>';
     if(dkxx){
      connect(dkxx);
    }
    else{
      load('hide');
      prompt('服务器没开启,请稍后再试');
      setTimeout("$('body').hide()",3000);
    }
  </script>
</body>
</html>