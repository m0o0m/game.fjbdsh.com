<?php if (!defined('THINK_PATH')) exit(); $zhuti_list = [ 'dasheng' => 'background.jpg', 'lianyun' => 'background-ly.jpg', 'dashengyule' => 'background.jpg', 'dasheng2' => 'background-ly.jpg', 'feiying' => 'background-fy.jpg', '518yule' => 'background.jpg', 'dasheng3' => 'background-ly.jpg', ]; ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <title>十人(房间:<?php echo ($room["roomid"]); ?>)</title>
    <link rel="stylesheet" type="text/css" href="/app/css/bull_vue-10.css">
    <link rel="stylesheet" type="text/css" href="/app/css/common/alert-1.1.css">
    <link rel="stylesheet" type="text/css" href="/app/css/bullshop-1.0.css">
    <link rel="stylesheet" type="text/css" href="/app/css/public10.css">
 <link rel="stylesheet" href="/app/css/app.css" /> 
<style>
  .mainPart{
    position: relative;
    height: auto;
  }
  .alert .mainPart .id{
    position: relative;
  }
.alert .mainPart .alertText{
  position: relative;
}

.alert .mainPart{
  height: auto;
}
 .lishijilu{
         position: relative;background:url(http://goss.fexteam.com/files/images/common/alert3.png) 0% 0% / 100% 100% no-repeat;width: 82%;margin-left: 3.5vh;color: black;/* margin: auto; */margin-top: 2vh;height: 9vh;line-height: 4vh;font-size: 15px;border-radius: 6px;padding-left: 10px;padding-top: 1vh;
    }
@media screen and (max-width: 320px) {
    .lishijilu{
         position: relative;background: #a2befc;width: 82%;margin-left: 3.5vh;color: black;/* margin: auto; */margin-top: 2vh;height: 9vh;line-height: 4vh;font-size: 12px;border-radius: 6px;padding-left: 10px;padding-top: 1vh;
    }

}

</style>
<script src="/app/js/jquery3.2.1.min.js" type="text/javascript"></script>
<script src="/app/js/fastclick.js" type="text/javascript"></script> 
<script src="/app/js/homepage/home.js" type="text/javascript"></script>
    <script type="text/javascript" src="/app/js/base64.js"></script>
<script src="/app/js/dashengapp.js" type="text/javascript"></script>
<script src="/app/js/game15.js" type="text/javascript"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript"></script>
<script type="text/javascript">
    $.fn.touch = function(callback) {
        this.each(function() {
            if (typeof(callback) == 'function') {
                if (navigator.userAgent.indexOf('QQBrowser') > 0) {
                    $(this).on('click', callback);
                } else {
                    var time = 0;
                    this.fn = callback;
                    $(this).on('touchstart',
                        function() {
                            time = (new Date()).getTime();
                        });
                    $(this).on('touchend',
                        function() {
                            if ((new Date()).getTime() - time <= 300) {
                                this.fn(this);
                            }
                        });
                }
            } else {
                if (navigator.userAgent.indexOf('QQBrowser') > 0) {
                    $(this).click();
                } else {
                    this.fn(this);
                }
            }
        });
    };

    $.fn.overscroll = function() {
        this.on('touchstart',
            function(event) {
                $(document.body).off('touchmove');
            });
        this.on('touchend',
            function(event) {
                $(document.body).on('touchmove',
                    function(evt) {
                        evt.preventDefault();
                    });
            });
    };

    $.alert = function(msg, fn, style, sec) {
        style = style || 'success';
        if (typeof(fn) == 'string') {
            style = fn;
        }
        if (!sec) {
            if (style == 'error' || style == 'puncherror') {
                sec = 9;
            } else {
                sec = 0;
            }
        }
        var box = $('<div>').addClass('resourceBox ' + style).attr('id', 'alertBox');
        box.html('<div class="context">' + msg + '</div>');
        box.appendTo('body');
        var h = $(window).width() / 360 * 100;
        box.css({
            'opacity': 1,
            'margin-top': -1 * (box.height() + h) / 2
        });
        if (sec >= 9) {
            var alertBoxLay = $('<div>').addClass('alertBoxLay').appendTo('body');
            $('<a>').attr('href', 'javascript:void(0);').addClass('closed').appendTo(box).text('我知道了');
            $('#alertBox a.closed, .alertBoxLay').click(function() {
                box.css({
                    'opacity': 0,
                    'margin-top': -1 * (box.height() + h)
                });
                alertBoxLay.css('opacity', 0);
                setTimeout(function() {
                        box.remove();
                        alertBoxLay.remove();
                        if (typeof(fn) == 'function') fn();
                    },
                    500);
            });
        } else {
            setTimeout(function() {
                    box.css({
                        'opacity': 0,
                        'margin-top': -1 * (box.height() + h)
                    });
                    setTimeout(function() {
                            box.remove();
                            if (typeof(fn) == 'function') fn();
                        },
                        500);
                },
                1000 + sec * 1000);
        }
    };

    function alert2(msg, fn, style, sec) {
        style = style || 'success';
        if (typeof(fn) == 'string') {
            style = fn;
        }
        if (!sec) {
            if (style == 'error' || style == 'puncherror') {
                sec = 9;
            } else {
                sec = 0;
            }
        }
        var box = document.createElement('div');
        box.className = 'resourceBox ' + style;
        box.id = 'alertBox';
        box.innerHTML = '<div class="context">' + msg + '</div>';
        document.getElementsByTagName('body')[0].appendChild(box);
        var h = $(window).width() / 360 * 100;
        box.style.opacity = 1;
        box.style.marginTop = -1 * (box.offsetHeight + h) / 2 + 'px';
        if (sec >= 9) {
            var alertBoxLay = document.createElement('div');
            alertBoxLay.className = 'alertBoxLay';
            document.getElementsByTagName('body')[0].appendChild(alertBoxLay);
            var BtnA = document.createElement('a');
            BtnA.innerText = '我知道了';
            BtnA.setAttribute('href', 'javascript:void(0);');
            BtnA.className = 'closed';
            box.appendChild(BtnA);
            alertBoxLay.addEventListener('click',
                function() {
                    box.style.opacity = 0;
                    box.style.marginTop = -1 * (box.offsetHeight + h) + 'px';
                    this.style.opacity = 0;
                    setTimeout(function() {
                            document.getElementsByTagName('body')[0].removeChild(box);
                            document.getElementsByTagName('body')[0].removeChild(alertBoxLay);
                            if (typeof(fn) == 'function') fn();
                        },
                        500);
                })
        } else {
            setTimeout(function() {
                    box.style.opacity = 0;
                    box.style.marginTop = -1 * (box.offsetHeight + h) + 'px';
                    setTimeout(function() {
                            document.getElementsByTagName('body')[0].removeChild(box);
                            if (typeof(fn) == 'function') fn();
                        },
                        500);
                },
                1000 + sec * 1000);
        }
    }
</script>

<script>
    window.roomID = "<?php echo ($room['id']); ?>";
$(function() {  
    FastClick.attach(document.body);
});  
  var url =window.location.href;//用户要分享的网址
  var title  = '十人(房间:<?php echo ($room["roomid"]); ?>)';//分享的标题
  var shareimg = 'http://'+window.location.hostname+'/app/home8888.jpg';//分享的图片
  var desc = 'http://www.d90ok7.cn/tenoxen.html?code=<?php echo ($room["roomid"]); ?> ';//分享的描述信息
  WeChat(url,title,shareimg,desc);
</script>

</head>
 <body>

 <div id="loadings" style="position:fixed;top:0;right:0;bottom:0;left:0;background:#fff;z-index:999;font-size:16px;">
     <div class="spinner">
         <div class="spinner-container container1">
             <div class="circle1"></div>
             <div class="circle2"></div>
             <div class="circle3"></div>
             <div class="circle4"></div>
         </div>
         <div class="spinner-container container2">
             <div class="circle1"></div>
             <div class="circle2"></div>
             <div class="circle3"></div>
             <div class="circle4"></div>
         </div>
         <div class="spinner-container container3">
             <div class="circle1"></div>
             <div class="circle2"></div>
             <div class="circle3"></div>
             <div class="circle4"></div>
         </div>
     </div>
     <div class="loadings-text">
         <!--页面加载中-->
         <span data-item="1">.</span>
         <span data-item="2">.</span>
         <span data-item="3">.</span>
     </div>
 </div>
 <div id="networkReconnect" style="position: fixed; width:2.88rem; line-height:.2rem; font-size:.1rem; left:.36rem; text-align: center; bottom:45%; background: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.5), rgba(0,0,0,0.5), rgba(0,0,0,0.5), rgba(0,0,0,0)); background: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.5), rgba(0,0,0,0.5), rgba(0,0,0,0.5), rgba(0,0,0,0)); background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.5), rgba(0,0,0,0.5), rgba(0,0,0,0.5), rgba(0,0,0,0)); color:#fff; display:none; z-index:9999;">
     您的网络已断开，我们正在尝试重连...
 </div>

 <img src="/app/bg.png" style="display: none">
<img src="/app/dyj.png" style="display: none">
    <div id="overtime" style="display: none">
    <canvas id="myCanvas" width="696" height="1224" style="display: none"></canvas>
    </div>
<?php if($room['endtime'] > 0): $mapxx=array(); $mapxx['room']=$room['id']; if(M('user_room')->where($mapxx)->find()){ ?>
    <script type="text/javascript">
        var data={};
        data.id=<?php echo ($room['roomid']); ?>;
        data.zjs=<?php echo ($room['zjs']); ?>;
        data.time='<?php echo (date("Y-m-d H:i:s",$room['time'])); ?>';
        data.user=<?php echo ($room['overxx']); ?>;
        <?php $overxx=json_decode($room['overxx'],true); foreach($overxx as $key=>$value){ $nickname=base64_encode(usernickname($value[id])); echo 'data.user["'.$key.'"]["nickname"]="'.$nickname.'";'; } ?>
        overroom(data);
    </script>
   <?php } else{ ?>
  <script type="text/javascript">
      alert2('房间人数已经满', function () {
          wx.closeWindow();
      });
  </script>
  <?php } exit(); endif; ?>


<?php if($fzuser['sfgl'] && (!$mayuser[$user['id']])): ?><script type="text/javascript">
        alert2('无法加入，请联系管理员。', function () {
            wx.closeWindow();
        });
  </script>
  <?php exit(); endif; ?>


   <div class="roomCard">
    <img src="/app/img/bull10/room-card1.png" />
    <div class="num">
     <div class='jiurenniuniu-fk'></div> 
     <div class='jiurenniuniu-fk-1' id="fknum"><?php echo ($user['fk']); ?></div>
    </div>
   </div>

   <img src="/app/img/bull10/niuniu-top-bg1.png" alt="" class="tabBottom" />
   <div class="round jiurenniuniu-round" style="" id="jsxx">
    <?php echo ($room["js"]); ?>&nbsp;/&nbsp;<?php echo ($room["zjs"]); ?>局
   </div> 

   <img src="/app/img/bull10/return-index.png" class="return jiurenniuniu-return-index"  onclick="returnIndex()" />
   <img src="/app/img/bull10/game-tips.png" class="return jiurenniuniu-return" onclick="Agreement()"/>
   <img src="/app/img/bull10/game-rules.png" class="bGameRule jiurenniuniu-bGameRule" />

   <div class="myCardTypeBG"></div> 
   <div class="myCardType" style="overflow: hidden;">
    <div id="df" style="
    overflow: hidden;
">
     底分：<?php echo ($room["df"]); ?>
    </div>
   </div> 
   <div class="bottomMessage">
    <img src="/app/img/bull10/game-chat01.png" class="jiurenniuniu-bottomMessage-img" />
   </div> 
   <div class="bottomHistory jiurenniuniu-bottomHistory">
       <img class='jiurenniuniu-bottomHistory-img' id="sound-open" src="/app/img/bull10/game-music01.png" style="display: none;"/>
       <img class='jiurenniuniu-bottomHistory-img' id="sound-close" src="/app/img/bull10/game-music02.png" style="display: none;"/>
   </div>

  <div id="messageSay">
  </div>
  <div id="tishi" class="alert" style="display: none;"></div> 	
  <div id="vaudioRoom" class="audioRoom" style="display: none;"></div> 
  <div id="vroomRule" class="createRoom" style="display: none;"></div>
  <div id='message' class="message" style="
    display: none;overflow: hidden;
"></div> 

   <div id="table" class="table">

 <img src="/app/img/bull10/<?php echo ($zhuti_list[$user['password']]); ?>" class="tableBack" />

    <div class="cardDeal" id="userfp"></div> 


     <div class="myCards" style="display: none;"></div>


  <div class="myCards" style="display: none;"></div>

 <div class="myCards" style="display: none;"></div>



    <div class="cardOver" style="position: absolute; width: 100%; height: 100%; overflow: hidden;"></div>

       <div class="member-list-vacancy">
           <div class="vacancy vacancy1">
               空位
           </div>
           <div class="vacancy vacancy2">
               空位
           </div>
           <div class="vacancy vacancy3">
               空位
           </div>
           <div class="vacancy vacancy4">
               空位
           </div>
           <div class="vacancy vacancy5">
               空位
           </div>
           <div class="vacancy vacancy6">
               空位
           </div>
           <div class="vacancy vacancy7">
               空位
           </div>
           <div class="vacancy vacancy8">
               空位
           </div>
           <div class="vacancy vacancy9">
               空位
           </div>
           <div class="vacancy vacancy10">
               空位
           </div>
       </div>

    <div id="memberTimesText"></div> 
    <div id="memberTimesText2"></div> 
    
    <div id="memberRobText"></div>
    <div id="memberFreeRobText"></div>
    <div id="memberBull"></div>
    

    <div id="memberScoreText1"></div>
    
    <div id="member"></div> 


    <div id="jinbi"></div> 


    <div>
      <div class="triangle"></div>
    </div>

       <div class="rules-mask">
           <div class="content">
               <div class="niuniu-rules">
                   <div class="flex-cont" data-pos="0">
                       <div class="name">
                           模式：
                       </div>
                       <div class="flex-item"><?php echo ($room['wfname']); ?></div>
                   </div>
                   <div class="flex-cont" data-pos="1">
                       <div class="name">
                           底分：
                       </div>
                       <div class="flex-item"><?php echo ($room['df']); ?></div>
                   </div>
                   <div class="flex-cont" data-pos="2">
                       <div class="name">
                           规则：
                       </div>
                       <div class="flex-item"><?php echo ($room['gz']); ?></div>
                   </div>

                   <?php if( ! empty( $room['px'] ) ): ?>
                   <div class="flex-cont rules-item" data-pos="3">
                       <div class="name">
                           牌型：
                       </div>
                       <div class="flex-item">
                           <?php if($room['px']): ?><a><?php if(is_array($room['px'])): foreach($room['px'] as $key=>$one): echo ($one); endforeach; endif; ?></a><?php endif; ?>
                       </div>
                   </div>
                   <?php endif; ?>

                   <div class="flex-cont" data-pos="4">
                       <div class="name">
                           局数：
                       </div>
                       <div class="flex-item"><?php echo ($room['zjs']); ?>局X<?php echo ($room['fk']); ?>房卡 </div>
                   </div>

                   <?php if( ! empty( $room['sz'] ) ): ?>
                   <div class="flex-cont" data-pos="5">
                       <div class="name">
                           上庄：
                       </div>
                       <div class="flex-item"><?php echo ($room['sz']); ?></div>
                   </div>
                   <?php endif; ?>
               </div>
           </div>
           <div class="close"></div>
       </div>

    <div id="divRobBankerText" class='jiurenniuniu-qiangzhuang'></div> 
    <div id="" class="clock jiurenniuniu-clock">
     <img src="/app/img/bull10/game-timg.png" class='jiurenniuniu-memberCoin' />
     <p id='djs' class='jiurenniuniu-clock1'> 10 </p>
    </div> 

    <div id="operationButton">
    </div>

    <div class='gongg' style="display: none">
    </div>
    
    </div>

 <script>
    function joinroom(){
      $("#joinUser").remove();
      token='<?php echo ($token); ?>';
      room='<?php echo ($room["id"]); ?>';
      var dkxx='<?php echo ($room["dk"]); ?>';
     load('show');
     if(dkxx){
      connect(dkxx);
    }
    else{
      load('hide');
      prompt('服务器没开启,请稍后再试');
      setTimeout("$('body').hide()",3000);
    }
    }
  </script>
<?php if(count($room['userlist']) >= 10 && $room['userlist'][$user['id']] != 1): ?><script type="text/javascript">
        alert2('房间人数已经满', function () {
            wx.closeWindow();
        });
    </script>

  <?php exit(); endif; ?>
<?php if((count($room['userlist']) > 0 && $room['js'] == 0) || ($room['js'] > 0 && !$room['userlist'][$user['id']])): ?><div class="window-masks user-join" id="joinUser">
    <div class="border-opacity">
        <div class="container">
            <i class="mask-icon mask-top"></i>
            <i class="mask-icon mask-right"></i>
            <i class="mask-icon mask-bottom"></i>
            <i class="mask-icon mask-left"></i>
            <div class="user-id">ID: <?php echo ($user["id"]); ?></div>
            <div class="main">
                <div class="rules">
                    <p>模式：<?php echo ($room['wfname']); ?></p>
                    <p>底分：<?php echo ($room['df']); ?></p>
                    <p>规则：<?php echo ($room['gz']); ?></p>
                    <?php if($room['px']): ?><p>牌型：<?php if(is_array($room['px'])): foreach($room['px'] as $key=>$one): echo ($one); endforeach; endif; ?></p><?php endif; ?>
                    <p>局数：<?php echo ($room['zjs']); ?>局X<?php echo ($room['fk']); ?>房卡</p>
                    <?php if($room['sz']): ?><p>上庄：<?php echo ($room['sz']); ?></p><?php endif; ?>
                </div>
                <div class="user-list">
                    <?php foreach($room['userlist'] as $key=>$one){ if(!$indexxx) { $indexxx=1; } else{ } echo '<div class="join-user-info"><img src="',userimg($key),'" alt="">
                            <span>',username($key),'</span></div>'; } ?>
                </div>
                <div class="button">
                    <button class="return-index" onclick="location.href='<?php echo U('index/dasheng/skin/dasheng');?>'">返回首页</button>
                    <button class="join-game" id="joinGame" onclick="joinroom()">加入房间</button>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php else: ?>
<script>
  joinroom();
</script><?php endif; ?>

<div class="chat-list-mask"></div>
<div class="chat-list">
     <ul class="chat-list-ul">
         <li data-item="0">快点吧，我等到花儿也谢了</li>
         <li data-item="1">我出去叫人</li>
         <li data-item="2">你的牌好靓哇</li>
         <li data-item="3">我当年横扫澳门九条街</li>
         <li data-item="4">算你牛逼</li>
         <li data-item="5">别吹牛逼，有本事干到底</li>
         <li data-item="6">输得裤衩都没了</li>
         <li data-item="7">我给你们送温暖了</li>
         <li data-item="8">谢谢老板</li>
         <li data-item="9">我来啦，让你们久等了</li>
         <li data-item="10">我出去一下，马上回来，等我哦</li>
         <li data-item="11">怎么断线了，网络太差了</li>
         <li data-item="12">搏一搏，单车变摩托</li>
     </ul>
</div>




<audio onended="mp3playandpause('1miao');" id="1miao" src="/app/video/1miao.mp3"></audio>
 <!--sex1-->
<audio onended="mp3playandpause('mp3niu10');" id="mp3niu10" src="/app/video/bull10/sound_1_60.mp3"></audio>
<audio onended="mp3playandpause('mp3niu11');" id="mp3niu11" src="/app/video/bull10/sound_1_61.mp3"></audio>
<audio onended="mp3playandpause('mp3niu12');" id="mp3niu12" src="/app/video/bull10/sound_1_62.mp3"></audio>
<audio onended="mp3playandpause('mp3niu13');" id="mp3niu13" src="/app/video/bull10/sound_1_63.mp3"></audio>
<audio onended="mp3playandpause('mp3niu14');" id="mp3niu14" src="/app/video/bull10/sound_1_64.mp3"></audio>
<audio onended="mp3playandpause('mp3niu15');" id="mp3niu15" src="/app/video/bull10/sound_1_65.mp3"></audio>
<audio onended="mp3playandpause('mp3niu16');" id="mp3niu16" src="/app/video/bull10/sound_1_66.mp3"></audio>
<audio onended="mp3playandpause('mp3niu17');" id="mp3niu17" src="/app/video/bull10/sound_1_67.mp3"></audio>
<audio onended="mp3playandpause('mp3niu18');" id="mp3niu18" src="/app/video/bull10/sound_1_68.mp3"></audio>
<audio onended="mp3playandpause('mp3niu19');" id="mp3niu19" src="/app/video/bull10/sound_1_69.mp3"></audio>
<audio onended="mp3playandpause('mp3niu110');" id="mp3niu110" src="/app/video/bull10/sound_1_70.mp3"></audio>
<audio onended="mp3playandpause('mp3niu111');" id="mp3niu111" src="/app/video/bull10/sound_1_71.mp3"></audio>
<audio onended="mp3playandpause('mp3niu112');" id="mp3niu112" src="/app/video/bull10/sound_1_72.mp3"></audio>
<audio onended="mp3playandpause('mp3niu113');" id="mp3niu113" src="/app/video/bull10/sound_1_73.mp3"></audio>

 <!--sex2-->
 <audio onended="mp3playandpause('mp3niu20');" id="mp3niu20" src="/app/video/bull10/sound_2_60.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu21');" id="mp3niu21" src="/app/video/bull10/sound_2_61.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu22');" id="mp3niu22" src="/app/video/bull10/sound_2_62.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu23');" id="mp3niu23" src="/app/video/bull10/sound_2_63.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu24');" id="mp3niu24" src="/app/video/bull10/sound_2_64.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu25');" id="mp3niu25" src="/app/video/bull10/sound_2_65.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu26');" id="mp3niu26" src="/app/video/bull10/sound_2_66.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu27');" id="mp3niu27" src="/app/video/bull10/sound_2_67.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu28');" id="mp3niu28" src="/app/video/bull10/sound_2_68.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu29');" id="mp3niu29" src="/app/video/bull10/sound_2_69.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu210');" id="mp3niu210" src="/app/video/bull10/sound_2_70.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu211');" id="mp3niu211" src="/app/video/bull10/sound_2_71.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu212');" id="mp3niu212" src="/app/video/bull10/sound_2_72.mp3"></audio>
 <audio onended="mp3playandpause('mp3niu213');" id="mp3niu213" src="/app/video/bull10/sound_2_73.mp3"></audio>

<audio onended="mp3playandpause('mp3daojishi');" id="mp3daojishi" src="/app/video/daojishi.mp3"></audio>
<audio onended="mp3playandpause('mp3gold');" id="mp3gold" src="/app/video/bull10/gold.mp3"></audio>
<audio onended="mp3playandpause('mp3kaiju');" id="mp3kaiju" src="/app/video/kaiju.mp3"></audio>
<audio onended="mp3playandpause('mp3xiazhu');" id="mp3xiazhu" src="/app/video/xiazhu.mp3"></audio>
<audio onended="mp3playandpause('fapai');" id="fapai" src="/app/video/bull10/tenoxen_sound_101.mp3"></audio>

 <!--sex1-->
<audio onended="mp3playandpause('message11');" id="message11" src="/app/video/bull10/sound_1_0.mp3"></audio>
<audio onended="mp3playandpause('message12');" id="message12" src="/app/video/bull10/sound_1_1.mp3"></audio>
<audio onended="mp3playandpause('message13');" id="message13" src="/app/video/bull10/sound_1_2.mp3"></audio>
<audio onended="mp3playandpause('message14');" id="message14" src="/app/video/bull10/sound_1_3.mp3"></audio>
<audio onended="mp3playandpause('message15');" id="message15" src="/app/video/bull10/sound_1_4.mp3"></audio>
<audio onended="mp3playandpause('message16');" id="message16" src="/app/video/bull10/sound_1_5.mp3"></audio>
<audio onended="mp3playandpause('message17');" id="message17" src="/app/video/bull10/sound_1_6.mp3"></audio>
<audio onended="mp3playandpause('message18');" id="message18" src="/app/video/bull10/sound_1_7.mp3"></audio>
<audio onended="mp3playandpause('message19');" id="message19" src="/app/video/bull10/sound_1_8.mp3"></audio>
<audio onended="mp3playandpause('message110');" id="message110" src="/app/video/bull10/sound_1_9.mp3"></audio>
<audio onended="mp3playandpause('message111');" id="message111" src="/app/video/bull10/sound_1_10.mp3"></audio>
 <audio onended="mp3playandpause('message112');" id="message112" src="/app/video/bull10/sound_1_11.mp3"></audio>
 <audio onended="mp3playandpause('message113');" id="message113" src="/app/video/bull10/sound_1_12.mp3"></audio>

 <!--sex2-->
 <audio onended="mp3playandpause('message21');" id="message21" src="/app/video/bull10/sound_2_0.mp3"></audio>
 <audio onended="mp3playandpause('message22');" id="message22" src="/app/video/bull10/sound_2_1.mp3"></audio>
 <audio onended="mp3playandpause('message23');" id="message23" src="/app/video/bull10/sound_2_2.mp3"></audio>
 <audio onended="mp3playandpause('message24');" id="message24" src="/app/video/bull10/sound_2_3.mp3"></audio>
 <audio onended="mp3playandpause('message25');" id="message25" src="/app/video/bull10/sound_2_4.mp3"></audio>
 <audio onended="mp3playandpause('message26');" id="message26" src="/app/video/bull10/sound_2_5.mp3"></audio>
 <audio onended="mp3playandpause('message27');" id="message27" src="/app/video/bull10/sound_2_6.mp3"></audio>
 <audio onended="mp3playandpause('message28');" id="message28" src="/app/video/bull10/sound_2_7.mp3"></audio>
 <audio onended="mp3playandpause('message29');" id="message29" src="/app/video/bull10/sound_2_8.mp3"></audio>
 <audio onended="mp3playandpause('message210');" id="message210" src="/app/video/bull10/sound_2_9.mp3"></audio>
 <audio onended="mp3playandpause('message211');" id="message211" src="/app/video/bull10/sound_2_10.mp3"></audio>
 <audio onended="mp3playandpause('message212');" id="message212" src="/app/video/bull10/sound_2_11.mp3"></audio>
 <audio onended="mp3playandpause('message213');" id="message213" src="/app/video/bull10/sound_2_12.mp3"></audio>

<audio onended="mp3playandpause('background');" id="background" src="/app/video/background.mp3" ></audio>
<!--下注抢庄-->
 <!--sex1-->
 <audio onended="mp3playandpause('xia11');" id="xia11" src="/app/video/bull10/sound_1x1.mp3"></audio>
 <audio onended="mp3playandpause('xia12');" id="xia12" src="/app/video/bull10/sound_1x2.mp3"></audio>
 <audio onended="mp3playandpause('xia13');" id="xia13" src="/app/video/bull10/sound_1x3.mp3"></audio>
 <audio onended="mp3playandpause('xia14');" id="xia14" src="/app/video/bull10/sound_1x4.mp3"></audio>
 <audio onended="mp3playandpause('xia15');" id="xia15" src="/app/video/bull10/sound_1x5.mp3"></audio>
 <audio onended="mp3playandpause('qiangzhuang1');" id="qiangzhuang1" src="/app/video/bull10/sound_1_98.mp3"></audio>
 <audio onended="mp3playandpause('buqiang1');" id="buqiang1" src="/app/video/bull10/sound_1_99.mp3"></audio>

 <!--sex2-->
 <audio onended="mp3playandpause('xia21');" id="xia21" src="/app/video/bull10/sound_2x1.mp3"></audio>
 <audio onended="mp3playandpause('xia22');" id="xia22" src="/app/video/bull10/sound_2x2.mp3"></audio>
 <audio onended="mp3playandpause('xia23');" id="xia23" src="/app/video/bull10/sound_2x3.mp3"></audio>
 <audio onended="mp3playandpause('xia24');" id="xia24" src="/app/video/bull10/sound_2x4.mp3"></audio>
 <audio onended="mp3playandpause('xia25');" id="xia25" src="/app/video/bull10/sound_2x5.mp3"></audio>
 <audio onended="mp3playandpause('qiangzhuang2');" id="qiangzhuang2" src="/app/video/bull10/sound_2_98.mp3"></audio>
 <audio onended="mp3playandpause('buqiang2');" id="buqiang2" src="/app/video/bull10/sound_2_99.mp3"></audio>

<script>

function over(msg){
    alert2('房间人数已经满', function () {
        wx.closeWindow();
    });
}
var overscroll = function(el) {
  el.addEventListener('touchstart', function() {
    var top = el.scrollTop
      , totalScroll = el.scrollHeight
      , currentScroll = top + el.offsetHeight;
    //If we're at the top or the bottom of the containers
    //scroll, push up or down one pixel.
    //
    //this prevents the scroll from "passing through" to
    //the body.
    if(top === 0) {
      el.scrollTop = 1;
    } else if(currentScroll === totalScroll) {
      el.scrollTop = top - 1;
    }
  });
  el.addEventListener('touchmove', function(evt) {
    //if the content is actually scrollable, i.e. the content is long enough
    //that scrolling can occur
    if(el.offsetHeight < el.scrollHeight)
      evt._isScroller = true;
  });
}
document.body.addEventListener('touchmove', function(evt) {
  //In this case, the default behavior is scrolling the body, which
  //would result in an overflow.  Since we don't want that, we preventDefault.
  if(!evt._isScroller) {
    evt.preventDefault();
  }
});

window.AudioContext = window.AudioContext || window.webkitAudioContext || window.mozAudioContext || window.msAudioContext;
var context = new (window.AudioContext || window.webkitAudioContext)();
var source = [];
var audioBuffer = [];

    function mp3play(id){
      if(id!='background' &&　mp3open==2){
        return false;
      }
        //document.getElementById(id).play();
        if(!audioBuffer[id]){
          loadAudioFile(id);
        }
        if(source[id]){
           if(typeof(source[id].stop)=='function'){
             source[id].stop();
           }
          source[id]=null;
        }
        if(typeof(WeixinJSBridge) != "undefined") {
            WeixinJSBridge.invoke('getNetworkType', {},
                function (e) {
                    _play();
                });
        } else {
            _play();
        }
      function _play() {
          source[id] = context.createBufferSource();
          source[id].buffer = audioBuffer[id];
          if(id=='background'){
              source[id].loop = true;
          }
          else{
              source[id].loop = false;
          }
          source[id].connect(context.destination);
          source[id].start(0); //立即播放
      }
    }
    function mp3pause(id){
        //document.getElementById(id).pause();
        if (source[id]) {
          source[id].loop = false;
          source[id].stop(); //立即停止
          source[id]=null;
        }
    }

    function mp3playandpause(id){
        mp3play(id);
        mp3pause(id);
    }


function initSound(arrayBuffer,id) {
    context.decodeAudioData(arrayBuffer, function(buffer) { //解码成功时的回调函数
        audioBuffer[id] = buffer;
        if(bgmp3open==1 && id == 'background') {
            mp3play('background');
        }
    }, function(e) { //解码出错时的回调函数
        console.log('Error decoding file '+id, e);
    });
}


function loadAudioFile(id) {
    var url=$('#'+id).attr('src');
    var xhr = new XMLHttpRequest(); //通过XHR下载音频文件
    xhr.open('GET', url, true);
    xhr.responseType = 'arraybuffer';
    xhr.onload = function(e) { //下载完成
        initSound(this.response,id);
    };
    xhr.send();
}


    function audioAutoPlay(id){
        loadAudioFile(id);
    }

function muiscready(){
    audioAutoPlay('mp3niu10');
    audioAutoPlay('mp3niu11');
    audioAutoPlay('mp3niu12');
    audioAutoPlay('mp3niu13');
    audioAutoPlay('mp3niu14');
    audioAutoPlay('mp3niu15');
    audioAutoPlay('mp3niu16');
    audioAutoPlay('mp3niu17');
    audioAutoPlay('mp3niu18');
    audioAutoPlay('mp3niu19');
    audioAutoPlay('mp3niu110');
    audioAutoPlay('mp3niu111');
    audioAutoPlay('mp3niu112');
    audioAutoPlay('mp3niu113');

    audioAutoPlay('mp3niu20');
    audioAutoPlay('mp3niu21');
    audioAutoPlay('mp3niu22');
    audioAutoPlay('mp3niu23');
    audioAutoPlay('mp3niu24');
    audioAutoPlay('mp3niu25');
    audioAutoPlay('mp3niu26');
    audioAutoPlay('mp3niu27');
    audioAutoPlay('mp3niu28');
    audioAutoPlay('mp3niu29');
    audioAutoPlay('mp3niu210');
    audioAutoPlay('mp3niu211');
    audioAutoPlay('mp3niu212');
    audioAutoPlay('mp3niu213');

    audioAutoPlay('background');

    audioAutoPlay('mp3daojishi');
    audioAutoPlay('mp3gold');
    audioAutoPlay('mp3kaiju');
    audioAutoPlay('mp3xiazhu');

    audioAutoPlay('fapai');



    audioAutoPlay('message11');
    audioAutoPlay('message12');
    audioAutoPlay('message13');
    audioAutoPlay('message14');
    audioAutoPlay('message15');
    audioAutoPlay('message16');
    audioAutoPlay('message17');
    audioAutoPlay('message18');
    audioAutoPlay('message19');
    audioAutoPlay('message110');
    audioAutoPlay('message111');
    audioAutoPlay('message112');
    audioAutoPlay('message113');

    audioAutoPlay('message21');
    audioAutoPlay('message22');
    audioAutoPlay('message23');
    audioAutoPlay('message24');
    audioAutoPlay('message25');
    audioAutoPlay('message26');
    audioAutoPlay('message27');
    audioAutoPlay('message28');
    audioAutoPlay('message29');
    audioAutoPlay('message210');
    audioAutoPlay('message211');
    audioAutoPlay('message212');
    audioAutoPlay('message213');


    audioAutoPlay('xia11');
    audioAutoPlay('xia12');
    audioAutoPlay('xia13');
    audioAutoPlay('xia14');
    audioAutoPlay('xia15');
    audioAutoPlay('qiangzhuang1');
    audioAutoPlay('buqiang1');


    audioAutoPlay('xia21');
    audioAutoPlay('xia22');
    audioAutoPlay('xia23');
    audioAutoPlay('xia24');
    audioAutoPlay('xia25');
    audioAutoPlay('qiangzhuang2');
    audioAutoPlay('buqiang2');
if(bgmp3open==1){
    setTimeout(function(){
        //mp3pause('background');
        //mp3play('background');
    },2000);
    mp3open=1;
    $("#sound-open").css("display", "block");
    $("#sound-close").css("display", "none");
}
 if(bgmp3open==2){
     mp3pause('background');
     mp3open=2;
     $("#sound-open").css("display", "none");
     $("#sound-close").css("display", "block");
  }
    $("#sound-close").click(function (e) {
        $(this).css('display', "none");
        $("#sound-open").css("display", "block");
        mp3play('background');
        bgmp3open=1;
        mp3open=1;
        localStorage.bgmp3open=bgmp3open;
    });
    $("#sound-open").click(function (e) {
        $(this).css('display', "none");
        $("#sound-close").css("display", "block");
        mp3pause('background');
        bgmp3open=2;
        mp3open=2;
        localStorage.bgmp3open=bgmp3open;
    });
}

        

// document.addEventListener("WeixinJSBridgeReady", function () {
//           mp3play('background');
// }, false);
// document.addEventListener('YixinJSBridgeReady', function() {
//           mp3play('background');      
// }, false);




function onBridgeReady(){
 WeixinJSBridge.invoke('getNetworkType',{},
    function(e){
        //WeixinJSBridge.log(e.err_msg);
         mp3play('1miao');  
      });
}

if (typeof WeixinJSBridge == "undefined"){
    if( document.addEventListener ){
        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
    }else if (document.attachEvent){
        document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
    }
}else{
    onBridgeReady();
}


window.onload = muiscready;

</script>
 <script type="text/javascript">
     function returnIndex(text) {
         var text = text || '确认返回主页？';
         var code = '<div class="window-masks return-index" id="returnIndex">';
         code += '<div class="border-opacity">';
         code += '<div class="container">';
         code += '<i class="mask-icon mask-top"></i><i class="mask-icon mask-right"></i><i class="mask-icon mask-bottom"></i><i class="mask-icon mask-left"></i>';
         code += '<div class="main">' + text + '</div>';
         code += '<div class="button">';
         code += '<div class="sure" id="returnIndexBtn">返回首页</div>';
         code += '<div class="cancel" id="cancelBtn">取消</div>';
         code += '</div>';
         code += '</div>';
         code += '</div>';
         code += '</div>';
         document.body.insertAdjacentHTML("beforeend", code);
         document.getElementById('returnIndexBtn').onclick = function() {
             location.href = '/';
         };
         document.getElementById('cancelBtn').onclick = function() {
             document.body.removeChild(document.getElementById('returnIndex'));
         };
         document.getElementById('returnIndex').onclick = function() {
             document.body.removeChild(document.getElementById('returnIndex'));
         };
     }

     function Agreement() {
         var code = '<div class="window-masks agreement" id="agreement">';
         code += '<div class="border-opacity">';
         code += '<div class="container">';
         code += '    <i class="mask-icon mask-top"></i><i class="mask-icon mask-right"></i><i class="mask-icon mask-bottom"></i><i class="mask-icon mask-left"></i>';
         code += '    <div class="title"></div>';
         code += '    <div class="main">';
         code += '       <p>本游戏仅供娱乐， 严禁赌博，如发现有赌博行为，将封停账号并向公安机关举报。</p>';
         code += '       <p>游戏中使用到的房卡为游戏道具，不具有任何财产性功能，本公司对于用户所拥有的房卡不提供任何形式官方回购、直接或变相兑换现金或实物等服务或相关功能。</p>';
         code += '       <p>游戏仅供休闲娱乐使用，游戏中出现问题请联系客服。</p>';
         code += '    </div>';
         code += '<div class="sure" id="agreementSure">确定</div>';
         code += '    </div>';
         code += '    </div>';
         code += '</div>';
         document.getElementsByTagName('body')[0].insertAdjacentHTML("beforeend", code);
         document.getElementById('agreementSure').onclick = function() {
             document.getElementsByTagName('body')[0].removeChild(document.getElementById('agreement'));
         };
         document.getElementById('agreement').onclick = function() {
             document.body.removeChild(document.getElementById('agreement'));
         };
     }

     $(function () {
         overscroll(document.querySelector('.chat-list-ul'));

         $('.bottomMessage').touch(function() {
             $('.chat-list-mask').show();
             $('.chat-list').show();
         });
         $('.chat-list-mask').touch(function() {
             $('.chat-list-mask').hide();
             $('.chat-list').hide();
         });
         $('.chat-list li').click(function() {
             $('.chat-list-mask').hide();
             $('.chat-list').hide();
             var chat = parseInt($(this).attr('data-item'));
             sendmsg($(this).text(),'message'+indexsex[index]+(chat+1));
         });
     });
 </script>

 <script type="text/javascript">
     $('.jiurenniuniu-bGameRule').touch(function() {
         $('.rules-mask').show();
     });
     $('.rules-mask').touch(function() {
         $('.rules-mask').hide();
     });
     $(function () {
         $("#loadings").remove();
     });
 </script>

 </body>
</html>