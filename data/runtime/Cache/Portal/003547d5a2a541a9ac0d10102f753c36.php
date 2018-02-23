<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="zh-cn">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="renderer" content="webkit" />
    <title>授权大厅</title>
    <meta name="apple-mobile-web-app-title" content="授权大厅" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script src="//cdn.lfzgame.com/js/jquery-3.2.1.min.js"></script>
    <style>

        @charset "utf-8";

        html {
            font-size: 10px !important;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
        }

        html, body, div, span, em, img, b, i, dl, dt, dd, ol, ul, li, p, form, label, table, tbody, tfoot, thead, tr, th, td, article, aside, footer, header, nav, section, figure {
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
            vertical-align: baseline;
        }

        *,*:before,*:after {
            box-sizing: border-box;
        }

        body {
            font-family: "微软雅黑",Arial;
            font-size: 0.12rem;
            color: #555;
            letter-spacing: 0px;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
            -webkit-touch-callout: none;
        }

        .clearfix:after {
            content: '';
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        ul {
            list-style: none
        }

        a, a:link, a:visited, a:hover, a:active {
            color: #555;
            text-decoration: none;
        }

        input, textarea, button {
            padding: 0;
            -moz-border-radius: 0;
            -webkit-border-radius: 0;
            border-radius: 0;
            -webkit-appearance: none;
            outline: none;
        }

        em,i {
            font-style: normal;
        }

        div[contenteditable="true"] {
            line-height: 22px;
            font-size: 12px;
        }

        div[contenteditable="true"] p {
            margin: 0;
            padding: 0;
        }

        pre {
            font-family: "微软雅黑", Arial;
        }

        .spinner {
            width: 3em;
            height: 3em;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            z-index: 111000;
            color: #666;
        }

        .container1 > div, .container2 > div, .container3 > div {
            width: 0.9em;
            height: 0.9em;
            background-color: #666;
            border-radius: 100%;
            position: absolute;
            -webkit-animation: bouncedelay 1.2s infinite ease-in-out;
            animation: bouncedelay 1.2s infinite ease-in-out;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .spinner-container {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .container2 {
            -webkit-transform: rotateZ(45deg);
            transform: rotateZ(45deg);
        }

        .container3 {
            -webkit-transform: rotateZ(90deg);
            transform: rotateZ(90deg);
        }

        .circle1 {
            top: 0;
            left: 0;
        }

        .circle2 {
            top: 0;
            right: 0;
        }

        .circle3 {
            right: 0;
            bottom: 0;
        }

        .circle4 {
            left: 0;
            bottom: 0;
        }

        .container2 .circle1 {
            -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s;
        }

        .container3 .circle1 {
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
        }

        .container1 .circle2 {
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
        }

        .container2 .circle2 {
            -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s;
        }

        .container3 .circle2 {
            -webkit-animation-delay: -0.7s;
            animation-delay: -0.7s;
        }

        .container1 .circle3 {
            -webkit-animation-delay: -0.6s;
            animation-delay: -0.6s;
        }

        .container2 .circle3 {
            -webkit-animation-delay: -0.5s;
            animation-delay: -0.5s;
        }

        .container3 .circle3 {
            -webkit-animation-delay: -0.4s;
            animation-delay: -0.4s;
        }

        .container1 .circle4 {
            -webkit-animation-delay: -0.3s;
            animation-delay: -0.3s;
        }

        .container2 .circle4 {
            -webkit-animation-delay: -0.2s;
            animation-delay: -0.2s;
        }

        .container3 .circle4 {
            -webkit-animation-delay: -0.1s;
            animation-delay: -0.1s;
        }

        @-webkit-keyframes bouncedelay {
            0%, 80%, 100% {
                -webkit-transform: scale(0.0)
            }

            40% {
                -webkit-transform: scale(1.0)
            }
        }

        @keyframes bouncedelay {
            0%, 80%, 100% {
                transform: scale(0.0);
                -webkit-transform: scale(0.0);
            }

            40% {
                transform: scale(1.0);
                -webkit-transform: scale(1.0);
            }
        }

        .loadings-text {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 10%;
            text-align: center;
        }

        .loadings-text span {
        }

        .loadings-text span[data-item="1"] {
            animation: loadingsText 3s linear infinite;
        }

        .loadings-text span[data-item="2"] {
            animation: loadingsText 2s linear infinite 1s;
        }

        .loadings-text span[data-item="3"] {
            animation: loadingsText 1s linear infinite 2s;
        }

        @-webkit-keyframes loadingsText {
            0% {
                color: #fff;
            }

            100% {
                color: #000;
            }
        }

        @keyframes loadingsText {
            0% {
                color: #fff;
            }

            100% {
                color: #000;
            }
        }

        #alertBox {
            width: 2.2rem;
            min-height: 1rem;
            opacity: 0;
            box-sizing: border-box;
            overflow: hidden;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -1.1rem;
            transition: all 0.5s;
            border-radius: 0.04rem;
            padding-top: 0.96rem;
            line-height: 0.16rem;
            text-align: center;
            font-size: 0.15rem;
            color: rgba(0, 0, 0, 0.54);
            box-shadow: 0 0 0.2rem rgba(0,0,0,0.3);
            z-index: 100000;
        }

        #alertBox.success {
            background: #fff url(http://cdn.lfzgame.com/images/alertBox_success.png) no-repeat center 0.384rem / 0.384rem 0.384rem;
        }

        #alertBox.error {
            background: #fff url(http://cdn.lfzgame.com/images/alertBox_error.png) no-repeat center 0.384rem / 0.384rem 0.384rem;
        }

        #alertBox.puncherror {
            background: #fff url(http://cdn.lfzgame.com/images/punch_caution.png) no-repeat center 0.384rem / 0.384rem 0.384rem;
        }

        #alertBox .context {
            margin-bottom: 0.384rem;
            padding: 0 0.1rem;
        }

        #alertBox .closed {
            width: 2.2rem;
            height: 0.4rem;
            line-height: 0.4rem;
            display: inline-block;
            font-size: 0.145rem;
            color: #b39851;
            text-align: center;
            border-top: 0.01rem solid #f5f5f5;
        }

        .alertBoxLay {
            position: absolute;
            background: rgba(0,0,0,0.3);
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 99999;
            transition: all 0.5s;
        }

        .dialogBoxLay {
            position: absolute;
            background: rgba(0,0,0,0.3);
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 99990;
            transition: all 0.5s;
        }

        #dialogBox {
            min-height: 1.5rem;
            opacity: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -1.1rem;
            transition: all 0.5s;
            border-radius: 0.02rem;
            padding: 0.96rem 0 0.1rem;
            line-height: 0.25rem;
            text-align: center;
            font-size: 0.15rem;
            color: rgba(0, 0, 0, 0.54);
            box-shadow: 0 0 0.2rem rgba(0,0,0,0.3);
            z-index: 99998;
            background: #fff url(http://cdn.lfzgame.com/images/dialog_icon.png) no-repeat center 0.384rem / 0.384rem 0.384rem;
            display: flex;
            display: -webkit-flex;
        }

        #dialogBox .sbox {
            width: 2.2rem;
            background: #fff;
            display: flex;
            display: -webkit-flex;
            flex-direction: column;
            height: 100%;
            border-radius: 0.02rem;
        }

        #dialogBox .context {
            margin-bottom: 0.65rem;
            flex: 1;
            padding: 0 .1200rem;
        }

        #dialogBox .closed {
            position: absolute;
            top: 0.03rem;
            right: 0.03rem;
            width: 0.2rem;
            height: 0.2rem;
            background: rgba(0,0,0,0.1);
            border-radius: 50%;
            color: #aaa;
            font-size: 0.14rem;
            line-height: 0.18rem;
            text-align: center;
            text-indent: 0.01rem;
            box-shadow: 0 0 0.01rem rgba(0, 0, 0, 0.2) inset;
            text-shadow: 0.01rem 0.01rem 0.01rem #fff;
        }

        #dialogBox .btns {
            width: 100%;
            height: 0.4224rem;
            flex: 1;
            border-radius: 0 0 0.02rem 0.02rem;
            background: #fff;
            position: absolute;
            bottom: 0;
            right: 0;
            box-sizing: border-box;
            padding: 0;
            border-top: 0.01rem solid #f5f5f5;
        }

        #dialogBox .btns button {
            width: 1.05rem;
            height: 0.4224rem;
            border: none;
            color: #888;
            margin: 0;
            background: none;
        }

        #dialogBox .btns:after {
            content: '';
            height: 0.4124rem;
            width: 0.01rem;
            position: absolute;
            background: #f5f5f5;
            top: 0;
            left: 50%;
        }

        #dialogBox .btns button.agree {
            color: #b39851;
            font-size: 0.15rem;
        }

        #dialogBox .btns button.closeBtn {
            color: #888;
            font-size: 0.15rem;
        }

        .loading {
            width: 0.25rem;
            height: 0.25rem;
        }

        @-webkit-keyframes btnRotate {
            0% {
                -webkit-transform: rotateZ(0deg);
            }

            100% {
                -webkit-transform: rotateZ(360deg);
            }
        }

        @-moz-keyframes btnRotate {
            0% {
                -moz-transform: rotateZ(0deg);
            }

            100% {
                -moz-transform: rotateZ(360deg);
            }
        }

        .loading {
            -webkit-animation: btnRotate 1.5s linear infinite;
            -moz-animation: btnRotate 1.5s linear infinite;
        }

        .toptips {
            line-height: 0.3rem;
            text-align: center;
            background: rgba(226, 82, 54, 0.33);
        }

        .flex-cont {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
        }

        .flex-cont .flex-item {
            -webkit-flex: 1;
            flex: 1;
        }

        .join-user {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 99999;
            background-color: rgba(0,0,0,1);
        }

        .join-user .join-info {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 3.0816rem;
            min-height: 1.4304rem;
            overflow: hidden;
            background-color: #404040;
            border: .0048rem solid #a8a8a8;
            -webkit-border-radius: .0768rem;
            -moz-border-radius: .0768rem;
            border-radius: .0768rem;
            font-size: .1248rem;
            color: #333;
        }

        .join-user .join-info .user-text {
            position: relative;
            width: 2.8368rem;
            height: 1.7760rem;
            -webkit-border-radius: .0768rem;
            -moz-border-radius: .0768rem;
            border-radius: .0768rem;
            margin: .0768rem;
            background: url("http://cdn.lfzgame.com/images/niuniu/user-text-bg1.jpg") no-repeat;
            background-size: 100% 100%;
        }

        .join-user .join-info .user-text >div {
            text-align: center;
        }

        .join-user .join-info .gameuser-list {
            position: absolute;
            left: 0;
            right: 0;
            top: .5184rem;
            margin: 0 .0480rem;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .join-user .join-info .gameuser-list .join-user-info {
            width: .4320rem;
            margin: 0 .0240rem;
        }

        .join-user .join-info .gameuser-list img {
            width: .4320rem;
            height: .4320rem;
        }

        .join-user .join-info .gameuser-list .join-user-info span {
            display: block;
            width: 100%;
            height: .1440rem;
            overflow: hidden;
            line-height: .1440rem;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .join-user .join-info .gameuser-list span {
            color: #844830;
        }

        .join-user .join-info .tips-info {
            position: absolute;
            bottom: .6480rem;
            left: 0;
            right: 0;
            text-align: center;
        }

        .join-user .join-user-bottom {
            outline: .0048rem solid #000;
            border-top: .0048rem solid #a9a9a9;
            height: .5472rem;
            background: url("http://cdn.lfzgame.com/images/index/niuniu-bottom-bg.jpg") repeat-x;
            background-size: auto 100%;
        }

        .join-user .join-info .return-index ,.join-user .join-info .join-game {
            position: absolute;
            bottom: .0192rem;
            width: 1.2000rem;
            height: .4272rem;
            border: none;
            outline: none;
            background: none;
            font-family: 黑体;
            font-size: 0;
            color: #fff;
        }

        .join-user .join-info .return-index {
            left: .2160rem;
            background: url("http://cdn.lfzgame.com/images/niuniu/return-index1.png") no-repeat;
            background-size: 100% 100%;
        }

        .join-user .join-info .join-game {
            right: .2160rem;
            background: url("http://cdn.lfzgame.com/images/niuniu/join-game1.png") no-repeat;
            background-size: 100% 100%;
        }

        canvas {
            width: 100%;
            height: 100%;
            position: absolute;
        }

        .room-gameover {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 999999;
            width: 100%;
            height: 100%;
            -o-object-fit: contain;
            object-fit: contain;
            background-color: #000;
        }

        .room-gameover-ten {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 999999;
            width: 100%;
            height: auto;
            -o-object-fit: contain;
            object-fit: contain;
            background-color: #000;
        }

        .window-masks {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 99999;
            background-color: rgba(0,0,0,1);
        }

        .window-masks .border-opacity {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            border: .0048rem solid #a7a7a6;
            -webkit-border-radius: .0480rem;
            -moz-border-radius: .0480rem;
            border-radius: .0480rem;
            background-color: rgba(255,255,255,.3);
            padding: .0720rem;
        }

        .window-masks .border-opacity .container {
            position: relative;
            background-color: #d1e2f6;
            -webkit-border-radius: .0480rem;
            -moz-border-radius: .0480rem;
            border-radius: .0480rem;
        }

        .window-masks .border-opacity .container:before {
            content: '';
            position: absolute;
            top: .0480rem;
            left: .0480rem;
            width: calc(100% - 0.0960rem);
            height: calc(100% - 0.0960rem);
            border: .0144rem solid #95b8e1;
            -webkit-border-radius: .024rem;
            -moz-border-radius: .024rem;
            border-radius: .024rem;
            z-index: 0;
        }

        .window-masks .border-opacity .container .mask-icon {
            position: absolute;
            width: .0816rem;
            height: .0768rem;
        }

        .window-masks .border-opacity .container .mask-icon.mask-top {
            top: .0480rem;
            left: .0480rem;
            background: url("http://cdn.lfzgame.com/images/index/mask-top.jpg") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks .border-opacity .container .mask-icon.mask-right {
            top: .0480rem;
            right: .0480rem;
            background: url("http://cdn.lfzgame.com/images/index/mask-right.jpg") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks .border-opacity .container .mask-icon.mask-bottom {
            bottom: .0480rem;
            right: .0480rem;
            background: url("http://cdn.lfzgame.com/images/index/mask-bottom.jpg") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks .border-opacity .container .mask-icon.mask-left {
            bottom: .0480rem;
            left: .0480rem;
            background: url("http://cdn.lfzgame.com/images/index/mask-left.jpg") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks.agreement .border-opacity .container {
            position: relative;
            padding: .3840rem .1440rem .0480rem;
        }

        .window-masks.agreement .border-opacity .container .title {
            position: absolute;
            top: .0960rem;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: .7152rem;
            height: .1968rem;
            background: url("http://cdn.lfzgame.com/images/common/agreement-title.png") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks.agreement .border-opacity .container .main {
            width: 2.8896rem;
            padding: .0864rem;
            border: .0048rem solid #fff;
            -webkit-border-radius: .0240rem;
            -moz-border-radius: .0240rem;
            border-radius: .0240rem;
            background-color: #69829e;
            color: #fff;
            font-size: .1152rem;
            line-height: 2;
            text-align: justify;
        }

        .window-masks.agreement .border-opacity .container .sure {
            position: relative;
            width: 1.3152rem;
            height: .4080rem;
            line-height: 2;
            margin: .0480rem auto;
            font-size: .1920rem;
            color: #fff;
            text-align: center;
            background: url("http://cdn.lfzgame.com/images/common/agreement-sure.png") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks.user-join .container {
            position: relative;
            padding: .3840rem .1440rem .0480rem;
        }

        .window-masks.user-join .user-id {
            position: absolute;
            left: -.0576rem;
            top: 0;
            z-index: 5;
            padding-left: .1440rem;
            width: 1.4016rem;
            height: .3888rem;
            line-height: 1.5;
            color: #fff;
            font-size: .1632rem;
            background: url("http://cdn.lfzgame.com/images/common/join-game-title.png") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks.user-join .container .main {
            overflow: hidden;
            width: 2.6469rem;
            margin-bottom: .0960rem;
            border: .0048rem solid #fff;
            -webkit-border-radius: .0480rem;
            -moz-border-radius: .0480rem;
            border-radius: .0480rem;
            background-color: #69829e;
            color: #fff;
        }

        .window-masks.user-join .container .main .rules {
            line-height: 1.5;
            padding: .0864rem;
            font-size: .1344rem;
        }

        .window-masks.user-join .container .main .user-list {
            width: 2.6400rem;
            height: 1.6360rem;
            padding: .2400rem .1200rem;
            background: url("http://cdn.lfzgame.com/images/common/join-user-bg1.jpg") no-repeat;
            background-size: 100% 100%;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-align-items: center;
            align-items: center;
        }

        .window-masks.user-join .join-user-info {
            width: .3840rem;
            margin: 0 .0480rem;
            text-align: center;
        }

        .join-user .join-info .user-text2 {
            position: relative;
            width: 2.8368rem;
            height: 2.0880rem;
            -webkit-border-radius: .0768rem;
            -moz-border-radius: .0768rem;
            border-radius: .0768rem;
            margin: .0768rem;
            background: url("http://cdn.lfzgame.com/images/niuniu/user-text-bg0.jpg") no-repeat;
            background-size: 100% 100%;
        }

        .join-user .join-info .user-text {
            position: relative;
            width: 2.8368rem;
            height: 1.5840rem;
            -webkit-border-radius: .0768rem;
            -moz-border-radius: .0768rem;
            border-radius: .0768rem;
            margin: .0768rem;
            background: url("http://cdn.lfzgame.com/images/niuniu/user-text-bg1.jpg") no-repeat;
            background-size: 100% 100%;
        }

        .join-user .join-info .user-text2 >div,.join-user .join-info .user-text >div {
            text-align: center;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .window-masks.user-join .join-user-info img {
            width: .3840rem;
            height: .3840rem;
            -webkit-border-radius: .0240rem;
            -moz-border-radius: .0240rem;
            border-radius: .0240rem;
        }

        .window-masks.user-join .join-user-info span {
            display: block;
            width: 100%;
            height: .1200rem;
            overflow: hidden;
            line-height: .1200rem;
            font-size: .1056rem;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .window-masks.user-join .container .button {
            position: relative;
            text-align: center;
            margin-bottom: .0480rem;
        }

        .window-masks.user-join .container .join-game,.window-masks.user-join .container .return {
            display: inline-block;
            width: 1.1472rem;
            height: .3312rem;
            font-size: .1200rem;
            line-height: 2.5;
            text-align: center;
            margin: 0 .0480rem;
            color: #fff;
        }

        .window-masks.user-join .container .return {
            background: url("http://cdn.lfzgame.com/images/common/button1.png") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks.user-join .container .join-game {
            background: url("http://cdn.lfzgame.com/images/common/button2.png") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks.return-index .container {
            border: .0096rem solid #afb0b2;
        }

        .window-masks.return-index .main {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
            width: 2.3280rem;
            min-height: 1.0560rem;
            background-color: #69829e;
            border: .0048rem solid #fff;
            -webkit-border-radius: .0480rem;
            -moz-border-radius: .0480rem;
            border-radius: .0480rem;
            margin: .1200rem;
            padding: .0960rem;
            color: #fff;
            font-size: .1728rem;
            text-align: justify;
        }

        .window-masks.return-index .container .button {
            position: relative;
            text-align: center;
            margin-bottom: .0960rem;
        }

        .window-masks.return-index .container .sure,.window-masks.return-index .container .cancel {
            display: inline-block;
            width: 1.1472rem;
            height: .3312rem;
            font-size: .1200rem;
            line-height: 2.5;
            text-align: center;
            margin: 0 .0480rem;
            color: #fff;
        }

        .window-masks.return-index .container .sure {
            background: url("http://cdn.lfzgame.com/images/common/button1.png") no-repeat;
            background-size: 100% 100%;
        }

        .window-masks.return-index .container .cancel {
            background: url("http://cdn.lfzgame.com/images/common/button2.png") no-repeat;
            background-size: 100% 100%;
        }

        .request-member-mask {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0,0,0,1);
            z-index: 999;
        }

        .request-member-mask .requst-member {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 2.5920rem;
            background-color: #fff;
            padding: .0960rem;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .request-member-mask .requst-member:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            -webkit-box-shadow: 0 0 0 .0096rem #ccc;
            -moz-box-shadow: 0 0 0 .0096rem #ccc;
            box-shadow: 0 0 0 .0096rem #ccc;
            border-radius: .0480rem;
            background-color: #fff;
            z-index: -1;
            border: .1200rem solid rgba(0,0,0,.5);
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -ms-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }

        .request-member-mask .requst-member .text {
            text-align: center;
            margin: .04800rem 0;
            font-size: .1440rem;
        }

        .request-member-mask .room-user {
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .request-member-mask .room-user-path {
            font-size: 0;
            margin-right: .1200rem;
        }

        .request-member-mask .room-user-path img {
            width: .4800rem;
        }

        .request-member-mask .room-user-name {
            max-width: 1.20rem;
            font-size: .1440rem;
        }

        .request-member-mask .button {
            text-align: center;
            padding-top: .1200rem;
            border-top: .0096rem solid #ddd;
        }

        .request-member-mask .button .request-btn {
            display: inline-block;
            width: .9600rem;
            height: .2880rem;
            line-height: .2880rem;
            font-size: .1440rem;
            font-weight: bold;
            color: #fff;
            background-color: #D6621A;
            -webkit-border-radius: .2400rem;
            -moz-border-radius: .2400rem;
            border-radius: .2400rem;
            -webkit-box-shadow: 0 .0240rem .0240rem #F5AA52 inset , 0 .0120rem .0240rem #333;
            -moz-box-shadow: 0 .0240rem .0240rem #F5AA52 inset , 0 .0120rem .0240rem #333;
            box-shadow: 0 .0240rem .0240rem #F5AA52 inset , 0 .0120rem .0240rem #333;
        }

        .request-member-mask .button .request-btn2 {
            background-color: #ccc;
            -webkit-box-shadow: 0 .0240rem .0240rem #eee inset , 0 .0120rem .0240rem #333;
            -moz-box-shadow: 0 .0240rem .0240rem #eee inset , 0 .0120rem .0240rem #333;
            box-shadow: 0 .0240rem .0240rem #eee inset , 0 .0120rem .0240rem #333;
        }

        .search-number-box {
            position: absolute;
            z-index: 999999;
        }

        .all-gonggao {
            position: fixed;
            top: 0;
            right: 0;
            z-index: 1000000;
            width: 3.6rem;
            height: .2112rem;
            overflow: hidden;
            line-height: .2112rem;
            font-size: .1056rem;
            font-family: '宋体';
            color: #fff;
            background: url("http://cdn.lfzgame.com/images/index/gonggao-bg.png") no-repeat;
            background-size: 100% 100%;
            font-weight: bold;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .gonggao-icon {
            display: inline-block;
            width: .2112rem;
            height: .2112rem;
            margin-right: .0480rem;
            background: url("http://cdn.lfzgame.com/images/index/gonggao-icon.png") no-repeat;
            background-size: 100% 100%;
            -webkit-animation: gonggaoanimate .5s linear infinite;
            -o-animation: gonggaoanimate .5s linear infinite;
            animation: gonggaoanimate .5s linear infinite;
        }

        @-webkit-keyframes gonggaoanimate {
            0% {
                background: url("http://cdn.lfzgame.com/images/index/gonggao-icon.png") no-repeat;
                background-size: 100% 100%;
            }

            50% {
                background: url("http://cdn.lfzgame.com/images/index/gonggao-icon1.png") no-repeat;
                background-size: 100% 100%;
            }

            100% {
                background: url("http://cdn.lfzgame.com/images/index/gonggao-icon2.png") no-repeat;
                background-size: 100% 100%;
            }
        }

        @keyframes gonggaoanimate {
            0% {
                background: url("http://cdn.lfzgame.com/images/index/gonggao-icon.png") no-repeat;
                background-size: 100% 100%;
            }

            50% {
                background: url("http://cdn.lfzgame.com/images/index/gonggao-icon1.png") no-repeat;
                background-size: 100% 100%;
            }

            100% {
                background: url("http://cdn.lfzgame.com/images/index/gonggao-icon2.png") no-repeat;
                background-size: 100% 100%;
            }
        }

        .scroll_div {
            display: inline-block;
            width: 2.5200rem;
            height: .2112rem;
            white-space: nowrap;
            overflow: hidden;
            position: relative;
        }

        .scroll_end,.scroll_begin {
            display: inline-block;
            position: absolute;
        }

        .scroll_end {
        }

        .qr-code {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 999;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,.5);
        }

        .qr-code .container {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%,-50%);
            -moz-transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            -o-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }

        .qr-code .container img {
            width: 2.4432rem;
        }

        .qr-code .container .close-qr-code {
            position: absolute;
            left: 0;
            right: 0;
            bottom: -.5760rem;
            margin: 0 auto;
            width: .3264rem;
            height: .3648rem;
            background: url("http://cdn.lfzgame.com/images/index/ting-mask-close.png") no-repeat;
            background-size: 100% 100%;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
        }

        *,*:before,*:after {
            box-sizing: border-box;
        }

        body {
            font-size: .1056rem;
            line-height: 1;
        }

        .wrap-bg {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: url("http://cdn.lfzgame.com/images/ucenter/hongbao-bg.jpg") no-repeat;
            background-size: 100% 100%;
            display: none;
        }

        .wrap-bg.show {
            display: block;
        }

        .wrap-bg .user-img {
            width: .7152rem;
            height: .7152rem;
            margin: .36rem auto .1152rem;
            border-radius: .096rem;
        }

        .wrap-bg .user-img img {
            width: 100%;
            height: 100%;
            border-radius: .096rem;
            box-shadow: 0 0 .048rem #000;
        }

        .wrap-bg .user-name {
            font-size: .1728rem;
            color: #fff89c;
            text-align: center;
        }

        .wrap-bg .text {
            margin: .1248rem auto .2880rem;
            font-size: .1440rem;
            text-align: center;
            color: #fff89c;
        }

        .wrap-bg .open {
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
            margin: auto;
            width: 1.7280rem;
            height: 1.8240rem;
            font-size: 0;
            color: #836F4A;
        }

        .container-hb {
            display: none;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            overflow: hidden;
            background: #fffeec url("http://cdn.lfzgame.com/images/ucenter/hongbao-bg02.jpg") no-repeat center .1632rem;
            font-family: 微软雅黑 , Arial;
            background-size: 100% auto;
        }

        .container-hb .return-index {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 10%;
            margin: 0 auto;
            width: .7104rem;
            height: .2208rem;
            background: url("http://cdn.lfzgame.com/images/ucenter/return-index.png") no-repeat;
            background-size: 100% 100%;
            font-size: 0;
            text-decoration: none;
            outline: none;
        }

        .container-hb .container-bg {
            display: none;
            height: .7920rem;
            background-color: #dc4939;
            border-radius: 80% / 0 0 100% 100%;
            position: absolute;
            left: -0.1rem;
            right: -0.1rem;
            z-index: 0;
            box-shadow: 0 .0336rem .0288rem #eb7155 inset , 0 0 .0336rem #666;
        }

        .container-hb .user-img {
            position: absolute;
            left: 50%;
            top: .5520rem;
            z-index: 2;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            width: .7152rem;
            height: .7152rem;
            border-radius: .096rem;
            border: .0144rem solid #fff;
        }

        .container-hb .user-img img {
            width: 100%;
            height: 100%;
            border-radius: .096rem;
        }

        .container-hb .user-name-card {
            position: absolute;
            top: 1.2960rem;
            width: 100%;
            text-align: center;
            font-size: .1440rem;
            line-height: 1.5;
            color: #fff;
        }

        .container-hb .big-card-number {
            position: absolute;
            top: 1.7280rem;
            width: 100%;
            line-height: 1;
            font-size: .1200rem;
            text-align: center;
        }

        .container-hb .big-card-number .card-number-text {
            margin-bottom: .048rem;
            color: #fff89c;
        }

        .container-hb .big-card-number .card-number-text span {
            font-family: Arial;
            font-size: .4800rem;
        }

        .container-hb .big-card-number .tips-text {
            color: #fff;
        }

        .container-hb .text {
            display: none;
            position: absolute;
            top: 2.2080rem;
            width: 100%;
            font-size: .1008rem;
            color: #DFCDA8;
            margin: 0 .048rem;
            padding: 0 0 .048rem .1344rem;
            border-bottom: .0048remsolid #e6d6ba;
        }

        .container-hb .receive-list {
            position: absolute;
            width: 100%;
            top: 3.1200rem;
            padding: 0 .1296rem 0 .1824rem;
            font-size: .1200rem;
        }

        .container-hb .flex-cont {
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .container-hb .user-small-img {
            width: .4320rem;
            height: .4320rem;
            margin-right: .1440rem;
            color: #333;
        }

        .container-hb .user-small-img img {
            width: 100%;
            height: 100%;
        }

        .container-hb .flex-item .name {
            margin-bottom: .1200rem;
            font-size: .1440rem;
        }

        .container-hb .flex-cont .name-text span {
            color: #e9452e;
        }

        .container-hb .card-time {
            text-align: center;
        }

        .container-hb .card-number {
            display: none;
            color: #CE8928;
            margin-bottom: .0480rem;
        }

        .container-hb .time {
            color: #999;
        }

        .phone-number-box {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 30;
            background-color: rgba(0,0,0,.8);
        }

        .phone-number-box input {
            border: none;
            outline: none;
            background: none;
        }

        .phone-number-box .phone-number {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            width: 2.9856rem;
            height: 2.2464rem;
            background: rgba(255,255,255,.2) url('http://cdn.lfzgame.com/images/index/phone-number-bg1.png') repeat-x left bottom;
            background-size: auto .5520rem;
            -webkit-border-radius: .0720rem;
            -moz-border-radius: .0720rem;
            border-radius: .0720rem;
        }

        .phone-number-box .phone-number-content {
            width: 2.8320rem;
            height: 1.5360rem;
            margin: .0720rem;
            background-color: #fff2d8;
            -webkit-border-radius: .0720rem;
            -moz-border-radius: .0720rem;
            border-radius: .0720rem;
        }

        .phone-number-box .phone-number .tips-text {
            padding: .1440rem 0 .2400rem 0;
            color: #844830;
            text-align: center;
            line-height: 1;
        }

        .phone-number-box .phone,.phone-number-box .phone-code {
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: 2.5056rem;
            height: .3936rem;
        }

        .phone-number-box .phone {
            top: .5280rem;
        }

        .phone-number-box .phone-code {
            top: 1.0560rem;
        }

        .phone-number-box .phone-code input,.phone-number-box .phone input {
            position: absolute;
            width: 2.5056rem;
            height: .3936rem;
            background: #ebc1a8;
            padding: 0 .1440rem;
            -webkit-border-radius: .2rem;
            -moz-border-radius: .2rem;
            border-radius: .2rem;
            color: #fff;
            font-size: .1152rem;
        }

        input::-webkit-input-placeholder {
            color: #fff;
            opacity: 1;
        }

        .phone-number-box .phone-code input {
            padding-right: 1.2000rem;
        }

        .phone-number-box .phone-btn2 ,.phone-number-box .phone-btn {
            position: absolute;
            top: 0;
            right: 0;
            width: .9120rem;
            height: .3840rem;
            line-height: .3840rem;
            vertical-align: middle;
            text-align: center;
            color: #fff;
        }

        .phone-number-box .phone-btn {
            background: url("http://cdn.lfzgame.com/images/index/phone-btn.png") no-repeat;
            background-size: 100% 100%;
        }

        .phone-number-box .phone-btn2 {
            color: #dcdcdc;
            background: url("http://cdn.lfzgame.com/images/index/phone-btn1.png") no-repeat;
            background-size: 100% 100%;
        }

        .phone-number-box .phone-sure {
            border: none;
            position: absolute;
            left: 0;
            right: 0;
            bottom: .0144rem;
            margin: 0 auto;
            width: 1.200rem;
            height: .4272rem;
            background: url("http://cdn.lfzgame.com/images/index/btn.png") no-repeat;
            background-size: 100% 100%;
            font-family: 黑体;
            color: #feead2;
            font-size: .1920rem;
        }


    </style>

</head>
<body>
<div class="wrap-bg">
    <div class="user-img">
        <img src="" />
    </div>
    <div class="user-name"></div>
    <div class="text">
        给你发了一个礼盒
    </div>
    <div class="open" onclick="Page.open()">
        開
    </div>
</div>
<div class="container-hb">
    <div class="user-img">
        <img src="" />
    </div>
    <div class="user-name-card">
        来自
        <em></em>的礼盒
    </div>
    <div class="big-card-number">
        <div class="card-number-text">
            <span></span>张
        </div>
        <div class="tips-text">
            可用于创建房间
        </div>
    </div>
    <div class="receive-list">
        <div class="flex-cont">
            <div class="user-small-img">
                <img src="" />
            </div>
            <div class="flex-item">
                <div class="name"></div>
                <div class="name-text">
                    领取了
                    <span></span>房卡
                </div>
            </div>
            <div class="card-time">
                <div class="card-number">
                    <span></span>张房卡
                </div>
                <div class="time">
                    06-09 16:44
                </div>
            </div>
        </div>
    </div>
    <a class="return-index" href="/index.php/index/dasheng/skin/dasheng"></a>
</div>
<script>
    var storage = {
        get: function(key) {
            var data = false;
            if (key.indexOf('.') > 0) {
                var arr = key.split('.');
                if (this.item(arr[0])) {
                    data = this.item(arr[0]);
                    for (var i in arr) {
                        if (i == 0) continue;
                        if (data[arr[i]] !== undefined) {
                            data = data[arr[i]];
                        } else return false;
                    }
                } else {
                    return false;
                }
            } else if (this.item(key)) data = this.item(key);
            return data;
        },
        set: function(key, value) {
            if (value === undefined) return false;
            var data = [];
            var datas = null;
            var _dt = null;
            if (key.indexOf('.') > 0) {
                var arr = key.split('.');
                if (this.item(arr[0])) {
                    datas = this.item(arr[0]);
                    data = datas;
                    for (var i in arr) {
                        if (i == 0) continue;
                        if (data[arr[i]] !== undefined) {
                            _dt = data;
                            data = data[arr[i]];
                        } else {
                            if (i == arr.length - 1) {
                                data[arr[i]] = '';
                                _dt = data;
                                data = data[arr[i]];
                            } else return false
                        }
                    }
                } else {
                    return false;
                }
            } else if (this.item(key)) data = this.item(key);
            data = value;
            if (datas === null) {
                this.item(key, data);
            } else {
                _dt[arr[arr.length - 1]] = data;
                this.item(arr[0], datas);
            }
            return true;
        },
        inset: function(key, value) {
            var data = [];
            var datas = null;
            var _dt = null;
            if (key.indexOf('.') > 0) {
                var arr = key.split('.');
                if (this.item(arr[0])) {
                    datas = this.item(arr[0]);
                    data = datas;
                    for (var i in arr) {
                        if (i == 0) continue;
                        if (data[arr[i]] !== undefined) {
                            if (i == arr.length - 1) _dt = data;
                            data = data[arr[i]];
                        } else return false;
                    }
                } else {
                    return false;
                }
            } else if (this.item(key)) data = this.item(key);
            if (typeof(data) != 'object') return false;
            data.push(value);
            if (datas === null) {
                this.item(key, data);
            } else {
                _dt[arr[arr.length - 1]] = data;
                this.item(arr[0], datas);
                data = datas;
            }
            return data;
        },
        outset: function(key, value) {
            var data = [];
            var datas = null;
            var _dt = null;
            if (key.indexOf('.') > 0) {
                var arr = key.split('.');
                if (this.item(arr[0])) {
                    datas = this.item(arr[0]);
                    data = datas;
                    for (var i in arr) {
                        if (i == 0) continue;
                        if (data[arr[i]] !== undefined) {
                            if (i == arr.length - 1) _dt = data;
                            data = data[arr[i]];
                        } else return false;
                    }
                } else {
                    return false;
                }
            } else if (this.item(key)) data = this.item(key);
            if (typeof(data) != 'object') return false;
            var _data = [];
            for (var i in data) {
                if (data[i] !== value) _data.push(data[i]);
            }
            data = _data;
            if (datas === null) {
                this.item(key, data);
            } else {
                _dt[arr[arr.length - 1]] = data;
                this.item(arr[0], datas);
                data = datas;
            }
            return data;
        },
        pop: function(key, way) {
            var way = way || 1;
            var data = [];
            var datas = null;
            var _dt = null;
            if (key.indexOf('.') > 0) {
                var arr = key.split('.');
                if (this.item(arr[0])) {
                    datas = this.item(arr[0]);
                    data = datas;
                    for (var i in arr) {
                        if (i == 0) continue;
                        if (data[arr[i]] !== undefined) {
                            if (i == arr.length - 1) _dt = data;
                            data = data[arr[i]];
                        } else return false;
                    }
                } else {
                    return false;
                }
            } else if (this.item(key)) data = this.item(key);
            if (way == 1) var rs = data.pop();
            else var rs = data.shift();
            if (datas === null) {
                this.item(key, data);
            } else {
                _dt[arr[arr.length - 1]] = data;
                this.item(arr[0], datas);
            }
            return rs;
        },
        shift: function(key) {
            return this.pop(key, -1);
        },
        incr: function(key, value) {
            if (typeof(value) != 'number') value = 1;
            var data = [];
            var datas = null;
            var _dt = null;
            if (key.indexOf('.') > 0) {
                var arr = key.split('.');
                if (this.item(arr[0])) {
                    datas = this.item(arr[0]);
                    data = datas;
                    for (var i in arr) {
                        if (i == 0) continue;
                        if (data[arr[i]] !== undefined) {
                            if (i == arr.length - 1) _dt = data;
                            data = data[arr[i]];
                        } else return false;
                    }
                } else {
                    return false;
                }
            } else if (this.item(key)) data = this.item(key);
            if (typeof(data) == 'number') {
                data += value;
            } else {
                return false;
            }
            if (datas === null) {
                this.item(key, data);
            } else {
                _dt[arr[arr.length - 1]] = data;
                this.item(arr[0], datas);
            }
            return data;
        },
        decr: function(key, value) {
            if (typeof(value) != 'number') value = 1;
            var data = [];
            var datas = null;
            var _dt = null;
            if (key.indexOf('.') > 0) {
                var arr = key.split('.');
                if (this.item(arr[0])) {
                    datas = this.item(arr[0]);
                    data = datas;
                    for (var i in arr) {
                        if (i == 0) continue;
                        if (data[arr[i]] !== undefined) {
                            if (i == arr.length - 1) _dt = data;
                            data = data[arr[i]];
                        } else return false;
                    }
                } else {
                    return false;
                }
            } else if (this.item(key)) data = this.item(key);
            if (typeof(data) == 'number') {
                data -= value;
            } else {
                return false;
            }
            if (datas === null) {
                this.item(key, data);
            } else {
                _dt[arr[arr.length - 1]] = data;
                this.item(arr[0], datas);
            }
            return data;
        },
        rm: function(key) {
            if (key.indexOf('.') > 0) {
                var data = [];
                var datas = null;
                var arr = key.split('.');
                if (this.item(arr[0])) {
                    datas = this.item(arr[0]);
                    data = datas;
                    for (var i in arr) {
                        if (i == 0) continue;
                        if (data[arr[i]] !== undefined) {
                            if (i == arr.length - 1) {
                                delete data[arr[i]];
                            } else data = data[arr[i]];
                        } else return false;
                    }
                    this.item(arr[0], datas);
                    return datas;
                } else {
                    return false;
                }
            } else {
                this.item(key, null);
                return true;
            }
        },
        each: function(key, fn) {
            if (typeof(fn) != 'function') return false;
            var data = [];
            var datas = null;
            var _dt = null;
            if (key.indexOf('.') > 0) {
                var arr = key.split('.');
                if (this.item(arr[0])) {
                    datas = this.item(arr[0]);
                    data = datas;
                    for (var i in arr) {
                        if (i == 0) continue;
                        if (data[arr[i]] !== undefined) {
                            _dt = data;
                            data = data[arr[i]];
                        } else return false
                    }
                } else {
                    return false;
                }
            } else if (this.item(key)) data = this.item(key);
            if (typeof(data) != 'object') return false;
            for (var i in data) {
                var rs = fn(data[i], i);
                if (rs !== undefined) {
                    data[i] = rs;
                }
            }
            if (datas === null) {
                this.item(key, data);
            } else {
                _dt[arr[arr.length - 1]] = data;
                this.item(arr[0], datas);
            }
            return true;
        },
        item: function(key, value) {
            if (window.localStorage) {
                if (value === undefined) {
                    return this.decode(localStorage.getItem(key)) || false;
                } else if (value === null) return localStorage.removeItem(key);
                else return localStorage.setItem(key, this.encode(value));
            } else {
                if (value === undefined) {
                    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
                    if (arr = document.cookie.match(reg)) return this.decode(arr[2]);
                    else return false;
                } else if (value === null) {
                    var exp = new Date();
                    exp.setTime(exp.getTime() - 1);
                    document.cookie = name + "=" + this.encode(value) + ";expires=" + exp.toGMTString();
                    return true;
                } else {
                    var Days = 30;
                    var exp = new Date();
                    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
                    document.cookie = name + "=" + this.encode(value) + ";expires=" + exp.toGMTString();
                    return true;
                }
            }
        },
        encode: function(obj) {
            var str = '';
            try {
                str = JSON.stringify(obj);
            } catch(e) {
                str = decodeURI(obj);
            }
            return str;
        },
        decode: function(str) {
            var obj = '';
            try {
                obj = JSON.parse(str);
            } catch(e) {
                obj = encodeURI(str);
            }
            return obj;
        }
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
        var h = win.width / 360 * 100;
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
    $.dialog = function(msg, fn, is_lock, classname) {
        is_lock = is_lock || true;
        if (typeof(fn) != 'function') return;
        classname = classname || '';
        var box = $('<div>').addClass('resourceBox  ' + classname).attr('id', 'dialogBox');
        var sb = $('<div>').addClass('sbox').appendTo(box);
        sb.html('<div class="context">' + msg + '</div>');
        box.appendTo('body');
        var h = win.width / 360 * 100;
        box.css({
            'opacity': 1,
            'margin-top': -1 * (box.height() + h) / 2
        });
        if (is_lock) {
            var dialogBoxLay = $('<div>').addClass('dialogBoxLay').appendTo('body');
        }
        var btns = $('<div>').addClass('btns').appendTo(sb);
        $('<button>').addClass('closeBtn').appendTo(btns).text('否');
        var agree = $('<button>').addClass('agree').appendTo(btns).text('是');
        agree.click(function() {
            if (fn() !== false) {
                box.css({
                    'opacity': 0,
                    'margin-top': -1 * (box.height() + h)
                });
                if (is_lock) dialogBoxLay.css('opacity', 0);
                setTimeout(function() {
                        box.remove();
                        if (is_lock) dialogBoxLay.remove();
                    },
                    500);
            }
        });
        $('#dialogBox button.closeBtn, .dialogBoxLay, .clearpsd, .noticeid').click(function() {
            box.css({
                'opacity': 0,
                'margin-top': -1 * (box.height() + h)
            });
            dialogBoxLay.css('opacity', 0);
            setTimeout(function() {
                    box.remove();
                    dialogBoxLay.remove();
                },
                500);
        });
    };
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
    function ajax(path, data, fn, type) {
        if (!IS_SSL) var url = 'http://' + API_DOMAIN + '/';
        else var url = 'https://' + API_DOMAIN + '/';
        var async = type === false ? false: true;
        if (typeof(data) == 'function') {
            fn = data;
            data = {};
        }
        var arr = location.href.substr(url.length).split('/');
        https = [arr[0] ? arr[0] : 'home', arr[1] ? arr[1] : 'index', arr[2] ? arr[2] : 'index'];
        var arr = path.split('/');
        switch (arr.length) {
            case 3:
                https[2] = arr[2];
            case 2:
                https[1] = arr[1];
            case 1:
                https[0] = arr[0];
        }
        url += https.join('/') + '.html';
        if (win.token != null) {
            url += "?token=" + win.token + "&v=" + win.version;
            var postdata = {};
            var getdata = [];
            if (data) {
                if (data.get) {
                    if (data.post) postdata = data.post;
                    for (i in data.get) {
                        getdata.push(i + '=' + encodeURIComponent(data.get[i]));
                    }
                    url += '&' + getdata.join('&');
                } else {
                    postdata = data;
                }
            }
            var arr = [];
            for (var i in postdata) {
                if (postdata[i] instanceof Array) {
                    for (var j in postdata[i]) {
                        arr.push(i + '[]=' + encodeURIComponent(postdata[i][j]));
                    }
                } else if (typeof(postdata[i]) == 'number' || typeof(postdata[i]) == 'string') {
                    arr.push(i + '=' + encodeURIComponent(postdata[i]));
                }
            }
            postdata = arr.join('&');
            var xmlHttp = new XMLHttpRequest();
            if (xmlHttp != null) {
                xmlHttp.open("POST", url, true);
                xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8");
                xmlHttp.send(postdata);
                xmlHttp.onreadystatechange = function() {
                    if (xmlHttp.readyState == 4) {
                        if (xmlHttp.status == 200) {
                            var data = '';
                            try {
                                data = JSON.parse(xmlHttp.responseText);
                            } catch(e) {
                                data = xmlHttp.responseText;
                            }
                            if (typeof(fn) == 'function') fn(data);
                        }
                    }
                };
            } else {
                alert("Your browser does not support XMLHTTP.");
            }
        }
    }
    String.prototype.decodeURL = function() {
        var url = this.toString();
        if (url.indexOf('?') > 0) {
            url = url.split('?')[1];
        }
        var arr = url.split('&');
        var params = {};
        for (var i in arr) {
            var a = arr[i].split('=');
            if (a.length == 2) {
                params[a[0]] = a[1];
            }
        }
        return params;
    };
    String.prototype.timeFormat = function(format) {
        var time = this.toString();
        if (/^\d+$/.test(time)) {
            var myDate = new Date(time * 1000);
        } else {
            time = time.replace(/\-/g, '/');
            var myDate = new Date(time);
        }
        var _date = {};
        _date.Y = myDate.getFullYear();
        _date.m = (myDate.getMonth() + 1).toString();
        if (_date.m.length == 1) _date.m = '0' + _date.m;
        _date.d = myDate.getDate().toString();
        if (_date.d.length == 1) _date.d = '0' + _date.d;
        _date.H = myDate.getHours();
        if (_date.H.length == 1) _date.H = '0' + _date.H;
        _date.i = myDate.getMinutes().toString();
        if (_date.i.length == 1) _date.i = '0' + _date.i;
        _date.s = myDate.getSeconds().toString();
        if (_date.s.length == 1) _date.s = '0' + _date.s;
        _date.w = myDate.getDay().toString();
        weekday = ['周日', '周一', '周二', '周三', '周四', '周五', '周六'];
        _date.W = weekday[myDate.getDay()];
        for (var i in _date) {
            format = format.replace(i, _date[i]);
        }
        return format;
    };
    function share(title, desc, link, imgUrl, fun) {
        imgUrl = getShareIconLink(win.gameId);
        wx.onMenuShareTimeline({
            title: title,
            desc: desc,
            link: link,
            imgUrl: imgUrl,
            success: function(res) {
                if (typeof(fun) == 'function') fun(res);
            }
        });
        wx.onMenuShareAppMessage({
            title: title,
            desc: desc,
            link: link,
            imgUrl: imgUrl,
            success: function(res) {
                if (typeof(fun) == 'function') fun(res);
            }
        });
        wx.onMenuShareQQ({
            title: title,
            desc: desc,
            link: link,
            imgUrl: imgUrl,
            success: function(res) {
                if (typeof(fun) == 'function') fun(res);
            }
        });
        wx.onMenuShareWeibo({
            title: title,
            desc: desc,
            link: link,
            imgUrl: imgUrl,
            success: function(res) {
                if (typeof(fun) == 'function') fun(res);
            }
        });
        wx.onMenuShareQZone({
            title: title,
            desc: desc,
            link: link,
            imgUrl: imgUrl,
            success: function(res) {
                if (typeof(fun) == 'function') fun(res);
            }
        });
    }
    function setTitle(title) {
        document.title = title;
        if (/ip(hone|od|ad)/i.test(navigator.userAgent)) {
            var i = document.createElement('iframe');
            i.src = '/favicon.ico';
            i.style.display = 'none';
            i.onload = function() {
                setTimeout(function() {
                        i.remove();
                    },
                    9)
            }
            document.body.appendChild(i);
        }
    }
    function isIOS() {
        return /iphone|ipad|ipod/.test(navigator.userAgent.toLowerCase());
    }
    function createCode(len) {
        var char = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM'.split('');
        var code = '';
        for (var i = 0; i < len; i++) {
            code += char[Math.floor(Math.random() * 62)];
        }
        return code;
    }
    function oClone(obj) {
        var _obj = {};
        for (var i in obj) {
            if (typeof(obj[i]) == 'object' && !(obj[i] instanceof Array)) {
                _obj[i] = oClone(obj[i]);
            } else {
                _obj[i] = obj[i];
            }
        }
        return _obj;
    }
    function cacl(arr, callback) {
        var ret;
        for (var i = 0; i < arr.length; i++) {
            ret = callback(arr[i], ret);
        }
        return ret;
    }
    function array_max(array) {
        return cacl(array,
            function(item, max) {
                if (! (max > item)) {
                    return item;
                } else {
                    return max;
                }
            });
    }
    function array_min(array) {
        return cacl(array,
            function(item, min) {
                if (! (min < item)) {
                    return item;
                } else {
                    return min;
                }
            });
    }
    function array_sum(array) {
        return cacl(array,
            function(item, sum) {
                if (typeof(sum) == 'undefined') {
                    return item;
                } else {
                    return sum += item;
                }
            });
    }
    function array_avg(array) {
        if (array.length == 0) {
            return 0;
        }
        return array_sum(array) / array.length;
    }
    var win = {
        width: window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
        height: window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight,
        version: '1.0.0',
        ws: {},
        status: 0,
        readed: 0,
        gameId: 0,
        reset: function(fn) {
            this.width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            this.height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
            document.getElementsByTagName('html')[0].setAttribute('style', 'font-size:' + 100 * (this.width / 360) + 'px !important');
            if (typeof(fn) == 'function') fn();
        },
        loading: function() {
            if (this.overlay) {
                this.overlay.remove();
                this.overlay = null;
            }
            this.overlay = $('<div>').css({
                'position': 'fixed',
                'width': '100%',
                'height': '100%',
                'background': 'rgba(255,255,255,0.7)',
                'z-index': 110000
            }).appendTo('body');
            if (this.loadingLay) {
                this.loadingLay.remove();
                this.loadingLay = null;
            }
            var code = '<div class="spinner">';
            code += ' <div class="spinner-container container1">';
            code += ' <div class="circle1"></div>';
            code += ' <div class="circle2"></div>';
            code += ' <div class="circle3"></div>';
            code += ' <div class="circle4"></div>';
            code += ' </div>';
            code += ' <div class="spinner-container container2">';
            code += ' <div class="circle1"></div>';
            code += ' <div class="circle2"></div>';
            code += ' <div class="circle3"></div>';
            code += ' <div class="circle4"></div>';
            code += ' </div>';
            code += ' <div class="spinner-container container3">';
            code += ' <div class="circle1"></div>';
            code += ' <div class="circle2"></div>';
            code += ' <div class="circle3"></div>';
            code += ' <div class="circle4"></div>';
            code += ' </div>';
            code += '</div>';
            document.getElementsByTagName('body')[0].insertAdjacentHTML("beforeend", code);
        },
        close_loading: function() {
            if (this.overlay) {
                this.overlay.remove();
                this.overlay = null;
            }
            if (this.loadingLay) {
                this.loadingLay.remove();
                this.loadingLay = null;
            }
        },
        closeLoading: function() {
            document.getElementById('loadings').style.opacity = 0;
            setTimeout(function() {
                    document.getElementById('loadings').style.display = 'none';
                },
                500);
        },
        load: function() {
            this.reset();
            if (typeof(Page) == 'object' && typeof(Page.load) == 'function') Page.load();
        },
        ready: function() {
            this.reset();
            if (typeof(Page) == 'object' && typeof(Page.ready) == 'function') Page.ready();
        },
        readyJoin: function(code, func) {
            ajax('home/index/readyJoin', {
                    code: code
                },
                function(d) {
                    win.gameId = d.game;
                    var user_list = d.room_users;
                    if (typeof(d.info) != 'undefined') {
                        if (d.info == 0) {
                            alert2('加入房间失败',
                                function() {
                                    wx.closeWindow();
                                });
                        } else if (d.info == -1) {
                            alert2('房间号错误',
                                function() {
                                    wx.closeWindow();
                                });
                        } else if (d.info == 1) {
                            document.body.style.background = '#000000';
                            document.body.minHeight = 'initial';
                            if (document.getElementsByClassName('body')[0]) {
                                document.body.removeChild(document.getElementsByClassName('body')[0]);
                            }
                            if (document.getElementsByTagName('canvas')[0]) {
                                document.body.removeChild(document.getElementsByTagName('canvas')[0]);
                            }
                            ajax('home/index/result', {
                                    code: Page.code
                                },
                                function(data) {
                                    if (data == 'error') {
                                        Page.init();
                                        return;
                                    }
                                    if (parseInt(data.game_id) === 3) {
                                        if (win.version == '1.0.0') {
                                            Page.createRanking(data,
                                                function(data) {
                                                    var img = document.createElement('img');
                                                    img.className = 'room-gameover';
                                                    img.src = data;
                                                    img.onload = function() {
                                                        document.body.appendChild(img);
                                                        win.closeLoading();
                                                    };
                                                });
                                        } else if (win.version == '2.0.0') {
                                            Page.createRanking(data,
                                                function(d) {
                                                    var img = new Image();
                                                    img.className = 'room-gameover ranking-img';
                                                    img.src = d;
                                                    img.onload = function() {
                                                        if (document.getElementsByClassName('body')[0]) {
                                                            document.body.removeChild(document.getElementsByClassName('body')[0]);
                                                        }
                                                        document.body.style.backgroundColor = '#000000';
                                                        document.body.style.minHeight = 'initial';
                                                        document.body.appendChild(img);
                                                        var div = document.createElement('div');
                                                        div.className = 'search-number-box';
                                                        document.body.appendChild(div);
                                                        var detailedBtn = '<a class="search-number-box-btn" href="pkdetailed.html?code=' + Page.code + '" style="position: absolute;"></a>';
                                                        div.insertAdjacentHTML("beforeend", detailedBtn);
                                                        win.closeLoading();
                                                        getRankingSix();
                                                    };
                                                });
                                        }
                                    } else if (parseInt(data.game_id) === 7) {
                                        if (win.version == '1.0.0') {
                                            Page.createRanking(data,
                                                function(data) {
                                                    var img = document.createElement('img');
                                                    img.className = 'room-gameover';
                                                    img.src = data;
                                                    img.onload = function() {
                                                        document.body.appendChild(img);
                                                        win.closeLoading();
                                                    };
                                                });
                                        } else if (win.version == '2.0.0') {
                                            Page.createRanking(data,
                                                function(d) {
                                                    var img = new Image();
                                                    img.className = 'room-gameover ranking-img';
                                                    img.src = d;
                                                    img.onload = function() {
                                                        document.body.style.backgroundColor = '#000000';
                                                        document.body.style.minHeight = 'initial';
                                                        document.body.appendChild(img);
                                                        var div = document.createElement('div');
                                                        div.className = 'search-number-box';
                                                        document.body.appendChild(div);
                                                        var detailedBtn = '<a class="search-number-box-btn" href="pkdetailed.html?code=' + Page.code + '" style="position: absolute;"></a>';
                                                        div.insertAdjacentHTML("beforeend", detailedBtn);
                                                        getRankingSix();
                                                        win.closeLoading();
                                                    };
                                                });
                                        }
                                    } else if (parseInt(data.game_id) === 8 || parseInt(data.game_id) === 9) {
                                        canvasRanking(data,
                                            function(d) {
                                                var img = document.createElement('img');
                                                img.className = 'room-gameover ranking-img';
                                                img.setAttribute('src', d);
                                                img.onload = function() {
                                                    document.body.appendChild(img);
                                                    var div = document.createElement('div');
                                                    div.className = 'search-number-box';
                                                    document.body.appendChild(div);
                                                    win.closeLoading();
                                                    var detailedBtn = '<a class="search-number-box-btn" href="pkdetailed.html?code=' + Page.code + '" style="position: absolute;"></a>';
                                                    div.insertAdjacentHTML("beforeend", detailedBtn);
                                                    $('.body').remove();
                                                    $('body').css({
                                                        'background': '#000000',
                                                        'min-height': 'initial'
                                                    });
                                                    getRankingSix();
                                                };
                                            });
                                    } else {
                                        if (win.version == '1.0.0') {
                                            createRanking(data,
                                                function(d) {
                                                    var img = new Image();
                                                    img.src = d;
                                                    if (parseInt(data.users.length) > 6) {
                                                        img.className = 'room-gameover-ten';
                                                    } else {
                                                        img.className = 'room-gameover';
                                                    }
                                                    img.onload = function() {
                                                        document.body.appendChild(img);
                                                        win.closeLoading();
                                                        if (document.getElementsByClassName('body')[0]) {
                                                            document.body.removeChild(document.getElementsByClassName('body')[0]);
                                                        }
                                                        document.body.style.backgroundColor = '#000000';
                                                        document.body.style.minHeight = 'initial';
                                                        if (typeof(jQuery) != 'undefined') $(document.body).off('touchmove');
                                                    };
                                                });
                                        } else if (win.version == '2.0.0') {
                                            liuliuCreateRanking(data,
                                                function(d) {
                                                    var img = document.createElement('img');
                                                    if (parseInt(data.users.length) > 6) {
                                                        img.className = 'room-gameover-ten ranking-img';
                                                    } else {
                                                        img.className = 'room-gameover ranking-img';
                                                    }
                                                    img.src = d;
                                                    img.onload = function() {
                                                        if (document.getElementsByClassName('body')[0]) {
                                                            document.body.removeChild(document.getElementsByClassName('body')[0]);
                                                        }
                                                        document.body.style.backgroundColor = '#000000';
                                                        document.body.style.minHeight = 'initial';
                                                        document.body.appendChild(img);
                                                        var div = document.createElement('div');
                                                        div.className = 'search-number-box';
                                                        document.body.appendChild(div);
                                                        var detailedBtn = '<a class="search-number-box-btn" href="pkdetailed.html?code=' + Page.code + '" style="position: absolute;"></a>';
                                                        div.insertAdjacentHTML("beforeend", detailedBtn);
                                                        win.closeLoading();
                                                        if (typeof(jQuery) != 'undefined') $(document.body).off('touchmove');
                                                        getRankingSix();
                                                    };
                                                });
                                        }
                                    }
                                });
                        } else if (d.info == 2) {
                            alert2('该房间人数已满',
                                function() {
                                    wx.closeWindow();
                                })
                        }
                    } else if (typeof(d.member) != 'undefined') {
                        if (d.member == 1) {
                            var code = '<div class="request-member-mask">';
                            code += '<div class="requst-member">';
                            code += '<div class="text">你不是该房主的好友,无法加入房间；</div>';
                            code += '<div class="room-user flex-cont">';
                            code += '<div class="room-user-path"><img id="roomUserPath" src="' + d.room_owner.path + '" onerror="this.src=\'../images/ucenter/user.png\'"></div>';
                            code += '<div class="room-user-name" id="roomUserName">' + d.room_owner.nickname + '</div>';
                            code += '</div>';
                            code += '<div class="text">是否申请成为好友？</div>';
                            code += '<div class="button" id="button">';
                            code += '<div class="request-btn" id="requestBtn">确定</div>';
                            code += '</div>';
                            code += '</div>';
                            code += '</div>';
                            document.getElementsByTagName('body')[0].insertAdjacentHTML("beforeend", code);
                            win.closeLoading();
                            document.getElementById('requestBtn').onclick = function() {
                                document.getElementById('button').innerHTML = '<div class="request-btn request-btn2">申请中</div>';
                                ajax('home/user/applyForFriend', {
                                        user_id: d.room_owner.id
                                    },
                                    function(d) {
                                        if (d.status == 1) {} else {}
                                    })
                            }
                        } else if (d.member == 2) {
                            var code = '<div class="request-member-mask">';
                            code += '<div class="requst-member">';
                            code += '<div class="text">你不是该房主的好友,无法加入房间；</div>';
                            code += '<div class="room-user flex-cont">';
                            code += '<div class="room-user-path"><img id="roomUserPath" src="' + d.room_owner.path + '" onerror="this.src=\'../images/ucenter/user.png\'"></div>';
                            code += '<div class="room-user-name" id="roomUserName">' + d.room_owner.nickname + '</div>';
                            code += '</div>';
                            code += '<div class="text">是否申请成为好友？</div>';
                            code += '<div class="button" id="button">';
                            code += '<div class="request-btn request-btn2">申请中</div>';
                            code += '</div>';
                            code += '</div>';
                            code += '</div>';
                            document.getElementsByTagName('body')[0].insertAdjacentHTML("beforeend", code);
                        }
                    } else {
                        if (d.first_join || d.first_join == 1) {
                            if (win.version == '1.0.0') {
                                var joinUser = '<div class="join-user" id="joinUser">';
                                joinUser += '<div class="join-info">';
                                if (user_list.length > 5) {
                                    joinUser += '<div class="user-text2">';
                                    joinUser += '<div class="gameuser-list" id="gameuser-list">';
                                    for (var n in user_list) {
                                        var code = '<div class="join-user-info">';
                                        code += '<img src="' + user_list[n].path + '" alt="" onerror="this.src=\'../images/ucenter/user.png\'"><span>' + user_list[n].nickname + '</span>';
                                        code += '</div>';
                                        joinUser += code;
                                    }
                                } else {
                                    joinUser += '<div class="user-text">';
                                    joinUser += '<div class="gameuser-list" id="gameuser-list">';
                                    for (var n in user_list) {
                                        var code = '<div class="join-user-info">';
                                        code += '<img src="' + user_list[n].path + '" alt=""><span>' + user_list[n].nickname + '</span>';
                                        code += '</div>';
                                        joinUser += code;
                                    }
                                }
                                joinUser += '</div>';
                                joinUser += '</div>';
                                joinUser += '<div class="join-user-bottom">';
                                joinUser += '<button class="return-index" onclick="location.href=\'index.html\'">返回首页</button>';
                                joinUser += '<button class="join-game" id="joinGame">加入房间</button>';
                                joinUser += '</div>';
                                joinUser += '</div>';
                                joinUser += '</div>';
                            } else if (win.version == '2.0.0') {
                                var joinUser = '<div class="window-masks user-join" id="joinUser">';
                                joinUser += '<div class="border-opacity">';
                                joinUser += '<div class="container">';
                                joinUser += '<i class="mask-icon mask-top"></i><i class="mask-icon mask-right"></i><i class="mask-icon mask-bottom"></i><i class="mask-icon mask-left"></i>';
                                joinUser += '<div class="user-id">ID：' + (parseInt(user.id) + 100000) + '</div>';
                                joinUser += '<div class="main">';
                                joinUser += '<div class="rules">';
                                if (parseInt(d.game) === 1 || parseInt(d.game) === 4 || parseInt(d.game) === 8 || parseInt(d.game) === 9) {
                                    var zhuangTypeText = '',
                                        cardRule = d.rule.card_rule,
                                        cardRuleText = '',
                                        handPatterns = d.rule.hand_patterns,
                                        handPatternsText = '',
                                        maxMatchesText = '';
                                    if (parseInt(d.zhuang_type) === 1) {
                                        zhuangTypeText = '明牌抢庄';
                                    } else if (parseInt(d.zhuang_type) === 2) {
                                        zhuangTypeText = '通比牛.牛';
                                    } else if (parseInt(d.zhuang_type) === 3) {
                                        zhuangTypeText = '自由抢庄';
                                    } else if (parseInt(d.zhuang_type) === 4) {
                                        zhuangTypeText = '牛.牛上庄';
                                    } else if (parseInt(d.zhuang_type) === 5) {
                                        zhuangTypeText = '固定庄家';
                                    }
                                    if (parseInt(cardRule) === 1) {
                                        cardRuleText = '牛.牛×3 牛九×2 牛八×2';
                                    } else if (parseInt(cardRule) === 2) {
                                        cardRuleText = '牛.牛×4 牛九×3 牛八×2 牛七×2';
                                    }
                                    for (var handp in handPatterns) {
                                        if (parseInt(handPatterns[handp]) === 1) {
                                            handPatternsText += '五花牛（5倍）';
                                        } else if (parseInt(handPatterns[handp]) === 2) {
                                            handPatternsText += '炸弹牛（6倍）';
                                        } else if (parseInt(handPatterns[handp]) === 3) {
                                            handPatternsText += '五小牛（8倍）';
                                        }
                                    }
                                    if (parseInt(d.max_matches) === 10) {
                                        maxMatchesText = '10局×1房卡 ';
                                    } else if (parseInt(d.max_matches) === 12) {
                                        maxMatchesText = '12局×2房卡 ';
                                    } else if (parseInt(d.max_matches) === 20) {
                                        maxMatchesText = '20局×2房卡 ';
                                    } else if (parseInt(d.max_matches) === 24) {
                                        maxMatchesText = '24局×4房卡 ';
                                    }
                                    joinUser += '<p>模式：' + zhuangTypeText + '</p>';
                                    joinUser += '<p>底分：' + d.rule.end_points + '分</p>';
                                    joinUser += '<p>规则：' + cardRuleText + '</p>';
                                    if (handPatterns) {
                                        joinUser += '<p>牌型：' + handPatternsText + '</p>';
                                    }
                                    joinUser += '<p>局数：' + maxMatchesText + '</p>';
                                } else if (parseInt(d.game) === 2) {
                                    var goldChipRule = '',
                                        goldMatchesText = '',
                                        goldLimit = '';
                                    if (parseInt(d.rule.chip_rule) === 1) {
                                        goldChipRule = '2/4，4/8，8/16，10/20';
                                    } else if (parseInt(d.rule.chip_rule) === 2) {
                                        goldChipRule = '2/4，5/10，10/20，20/40';
                                    }
                                    if (parseInt(d.max_matches) === 10) {
                                        goldMatchesText = '10局×1房卡 ';
                                    } else if (parseInt(d.max_matches) === 20) {
                                        goldMatchesText = '20局×2房卡 ';
                                    }
                                    if (parseInt(d.rule.upper_limit) === 0) {
                                        goldLimit = '无';
                                    } else if (parseInt(d.rule.upper_limit) === 500) {
                                        goldLimit = '500 ';
                                    } else if (parseInt(d.rule.upper_limit) === 1000) {
                                        goldLimit = '1000 ';
                                    } else if (parseInt(d.rule.upper_limit) === 2000) {
                                        goldLimit = '2000 ';
                                    }
                                    joinUser += '<p>底分：' + d.rule.end_points + '分</p>';
                                    joinUser += '<p>分数：' + goldChipRule + '</p>';
                                    joinUser += '<p>局数：' + goldMatchesText + '</p>';
                                    joinUser += '<p>上限：' + goldLimit + '</p>';
                                } else if (parseInt(d.game) === 3) {
                                    var playType = '',
                                        shuiMatches = '';
                                    if (parseInt(d.rule.play_type) === 1) {
                                        playType = '经典';
                                    }
                                    if (parseInt(d.max_matches) === 5) {
                                        shuiMatches = '5局×1房卡 ';
                                    } else if (parseInt(d.max_matches) === 10) {
                                        shuiMatches = '10局×2房卡 ';
                                    } else if (parseInt(d.max_matches) === 20) {
                                        shuiMatches = '20局×4房卡 ';
                                    }
                                    joinUser += '<p>底分：' + d.rule.end_points + '分</p>';
                                    joinUser += '<p>玩法：' + playType + '</p>';
                                    joinUser += '<p>局数：' + shuiMatches + '</p>';
                                } else if (parseInt(d.game) === 5) {
                                    var texaPoints = '',
                                        texaMatches = '',
                                        texaPointsRule = '';
                                    if (parseInt(d.rule.end_points) === 1) {
                                        texaPoints = '1/2';
                                    } else if (parseInt(d.rule.end_points) === 2) {
                                        texaPoints = '2/4';
                                    }
                                    if (parseInt(d.max_matches) === 10) {
                                        texaMatches = '10局×2房卡 ';
                                    } else if (parseInt(d.max_matches) === 20) {
                                        texaMatches = '20局×4房卡 ';
                                    }
                                    if (parseInt(d.rule.end_points_rule) === 0) {
                                        texaPointsRule = '无';
                                    } else if (parseInt(d.rule.end_points_rule) === 1) {
                                        texaPointsRule = '1倍小盲';
                                    } else if (parseInt(d.rule.end_points_rule) === 2) {
                                        texaPointsRule = '2倍小盲';
                                    }
                                    joinUser += '<p>小盲/大盲：' + texaPoints + '</p>';
                                    joinUser += '<p>局数：' + texaMatches + '</p>';
                                    joinUser += '<p>前注：' + texaPointsRule + '</p>';
                                    joinUser += '<p>初始分数：' + d.rule.init_points + '</p>';
                                } else if (parseInt(d.game) === 6) {
                                    var sanMatches = '',
                                        sanZhuangType = '';
                                    if (parseInt(d.zhuang_type) === 1) {
                                        sanZhuangType = '抢庄模式';
                                    } else if (parseInt(d.zhuang_type) === 2) {
                                        sanZhuangType = '通比模式';
                                    } else if (parseInt(d.zhuang_type) === 3) {
                                        sanZhuangType = '三公当庄';
                                    }
                                    if (parseInt(d.max_matches) === 12) {
                                        sanMatches = '12局×2房卡 ';
                                    } else if (parseInt(d.max_matches) === 24) {
                                        sanMatches = '24局×4房卡 ';
                                    }
                                    joinUser += '<p>模式：' + sanZhuangType + '</p>';
                                    joinUser += '<p>底分：' + d.rule.end_points + '分</p>';
                                    if (parseInt(d.rule.card_rule) === 2) {
                                        cardRuleText = '暴玖×9';
                                        joinUser += '<p>规则：' + cardRuleText + '</p>';
                                    }
                                    joinUser += '<p>局数：' + sanMatches + '</p>';
                                } else if (parseInt(d.game) === 7) {
                                    var str = '';
                                    if (parseInt(d.rule.games_mode) === 1) {
                                        str = '半坑（满5人10起）';
                                    } else if (parseInt(d.rule.games_mode) === 2) {
                                        str = '半坑（满5人9起）';
                                    } else if (parseInt(d.rule.games_mode) === 3) {
                                        str = '半坑（满4人J起）';
                                    } else if (parseInt(d.rule.games_mode) === 4) {
                                        str = '全坑（2-A）';
                                    }
                                    joinUser += '<p>模式：' + str + '</p>';
                                    joinUser += '<p>底注：' + d.rule.end_points + '分</p>';
                                    joinUser += '<p>喜分：' + d.rule.happy_points + '分</p>';
                                    var rule = '';
                                    if (d.rule.play_type && parseInt(d.rule.play_type.split(',').length) === 2) {
                                        rule += '带王  王中炮  ';
                                    } else if (d.rule.play_type && parseInt(d.rule.play_type.split(',').length) === 1 && parseInt(d.rule.play_type.split(',')[0]) === 1) {
                                        rule += '带王  ';
                                    }
                                    if (parseInt(d.rule.sorce_type) === 1) {
                                        rule += '烂锅翻倍';
                                    }
                                    if (rule != '') {
                                        joinUser += '<p>规则：' + rule + '</p>';
                                    }
                                    var sanMatches = '';
                                    if (parseInt(d.rule.max_matches) === 10) {
                                        sanMatches = '10局×1房卡 ';
                                    } else if (parseInt(d.rule.max_matches) === 20) {
                                        sanMatches = '20局×2房卡 ';
                                    }
                                    joinUser += '<p>局数：' + sanMatches + '</p>';
                                }
                                joinUser += '</div>';
                                joinUser += '<div class="user-list">';
                                for (var n in user_list) {
                                    var code = '<div class="join-user-info">';
                                    code += '<img src="' + user_list[n].path + '" alt="" onerror="this.src=\'../images/ucenter/user.png\'"><span>' + user_list[n].nickname + '</span>';
                                    code += '</div>';
                                    joinUser += code;
                                }
                                joinUser += '</div>';
                                joinUser += '</div>';
                                joinUser += '<div class="button">';
                                joinUser += '<div class="return" onclick="location.href=\'index.html\'">创建房间</div>';
                                joinUser += '<div class="join-game" id="joinGame">加入游戏</div>';
                                joinUser += '</div>';
                                joinUser += '</div>';
                                joinUser += '</div>';
                                joinUser += '</div>';
                            }
                            document.getElementsByTagName('body')[0].insertAdjacentHTML("beforeend", joinUser);
                            document.getElementById('joinGame').onclick = function() {
                                win.status = 1;
                                document.getElementsByTagName('body')[0].removeChild(document.getElementById('joinUser'));
                                if (typeof(func) == 'function') func();
                            }
                        } else {
                            if (user_list.length == 0) win.status = 1;
                            if (typeof(func) == 'function') func();
                        }
                    }
                });
        },
        reload: function() {
            if (/[\?\&]q=[0-9\.]+/.test(location.href)) location.href = location.href.replace(/([\?\&]q=)[0-9\.]+/, '$1' + Math.random());
            else location.href = location.href + (location.href.indexOf('?') > 0 ? '&': '?') + 'q=' + Math.random();
        }
    };
    var user = null;
    var ws = {};
    window.onresize = function() {
        win.width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        win.height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        win.reset(getRankingSix());
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
        var h = win.width / 360 * 100;
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
    function getRankingSix() {
        if (document.getElementsByClassName('ranking-img')[0] && document.getElementsByClassName('search-number-box')[0]) {
            var div = document.getElementsByClassName('search-number-box')[0];
            var imag = document.getElementsByClassName('ranking-img')[0];
            var aBtn = document.getElementsByClassName('search-number-box-btn')[0];
            var a = getNaturalSize(imag).width;
            var b = getNaturalSize(imag).height;
            var c = imag.offsetWidth;
            var d = imag.offsetHeight;
            var index = (parseInt(a) / parseInt(b)) / (parseInt(c) / parseInt(d));
            if (parseInt(win.gameId) === 8 || parseInt(win.gameId) === 9) {
                if (index > 1) {
                    div.style.top = (d - b / a * c) / 2 + 'px';
                    div.style.left = '0px';
                    aBtn.style.width = c * (228 / a) * 2 + 'px';
                    aBtn.style.height = b / a * c * (68 / b) * 2 + 'px';
                    aBtn.style.left = c * (420 / a) * 2 + 'px';
                    aBtn.style.top = b / a * c * ((41 + 611 * 520 / 360 + 68) / b) * 2 + 'px';
                } else if (index < 1) {
                    div.style.top = '0px';
                    div.style.left = (c - a / b * d) / 2 + 'px';
                    aBtn.style.width = a / b * d * (228 / a) * 2 + 'px';
                    aBtn.style.height = d * (68 / b) * 2 + 'px';
                    aBtn.style.left = a / b * d * (420 / a) * 2 + 'px';
                    aBtn.style.top = d * ((41 + 611 * 520 / 360 + 68) / b) * 2 + 'px';
                } else {
                    div.style.top = '0px';
                    div.style.left = '0px';
                    aBtn.style.width = c * (228 / a) * 2 + 'px';
                    aBtn.style.height = d * (68 / b) * 2 + 'px';
                    aBtn.style.left = c * (420 / a) * 2 + 'px';
                    aBtn.style.top = d * ((41 + 611 * 520 / 360 + 68) / b) * 2 + 'px';
                }
            } else if (parseInt(win.gameId) === 3) {
                if (index > 1) {
                    div.style.top = (d - b / a * c) / 2 + 'px';
                    div.style.left = '0px';
                    aBtn.style.width = c * (236 / a) + 'px';
                    aBtn.style.height = b / a * c * (74 / b) + 'px';
                    aBtn.style.left = c * (455 / a) + 'px';
                    aBtn.style.top = b / a * c * ((b - 110) / b) + 'px';
                } else if (index < 1) {
                    div.style.top = '0px';
                    div.style.left = (c - a / b * d) / 2 + 'px';
                    aBtn.style.width = a / b * d * (236 / a) + 'px';
                    aBtn.style.height = d * (74 / b) + 'px';
                    aBtn.style.left = a / b * d * (455 / a) + 'px';
                    aBtn.style.top = d * ((b - 110) / b) + 'px';
                } else {
                    div.style.top = '0px';
                    div.style.left = '0px';
                    aBtn.style.width = c * (236 / a) + 'px';
                    aBtn.style.height = d * (74 / b) + 'px';
                    aBtn.style.left = c * (455 / a) + 'px';
                    aBtn.style.top = d * ((b - 110) / b) + 'px';
                }
            } else if (parseInt(win.gameId) === 7) {
                if (index > 1) {
                    div.style.top = (d - b / a * c) / 2 + 'px';
                    div.style.left = '0px';
                    aBtn.style.width = c * (236 / a) + 'px';
                    aBtn.style.height = b / a * c * (74 / b) + 'px';
                    aBtn.style.left = c * (441 / a) + 'px';
                    aBtn.style.top = b / a * c * ((b - 150) / b) + 'px';
                } else if (index < 1) {
                    div.style.top = '0px';
                    div.style.left = (c - a / b * d) / 2 + 'px';
                    aBtn.style.width = a / b * d * (236 / a) + 'px';
                    aBtn.style.height = d * (74 / b) + 'px';
                    aBtn.style.left = a / b * d * (441 / a) + 'px';
                    aBtn.style.top = d * ((b - 150) / b) + 'px';
                } else {
                    div.style.top = '0px';
                    div.style.left = '0px';
                    aBtn.style.width = c * (236 / a) + 'px';
                    aBtn.style.height = d * (74 / b) + 'px';
                    aBtn.style.left = c * (441 / a) + 'px';
                    aBtn.style.top = d * ((b - 150) / b) + 'px';
                }
            } else {
                if (index > 1) {
                    div.style.top = (d - b / a * c) / 2 + 'px';
                    div.style.left = '0px';
                    aBtn.style.width = c * (236 / a) + 'px';
                    aBtn.style.height = b / a * c * (74 / b) + 'px';
                    aBtn.style.left = c * (419 / a) + 'px';
                    aBtn.style.top = b / a * c * ((b - 110) / b) + 'px';
                } else if (index < 1) {
                    div.style.top = '0px';
                    div.style.left = (c - a / b * d) / 2 + 'px';
                    aBtn.style.width = a / b * d * (236 / a) + 'px';
                    aBtn.style.height = d * (74 / b) + 'px';
                    aBtn.style.left = a / b * d * (419 / a) + 'px';
                    aBtn.style.top = d * ((b - 110) / b) + 'px';
                } else {
                    div.style.top = '0px';
                    div.style.left = '0px';
                    aBtn.style.width = c * (236 / a) + 'px';
                    aBtn.style.height = d * (74 / b) + 'px';
                    aBtn.style.left = c * (419 / a) + 'px';
                    aBtn.style.top = d * ((b - 110) / b) + 'px';
                }
            }
            function getNaturalSize(Domlement) {
                var natureSize = {};
                if (window.naturalWidth && window.naturalHeight) {
                    natureSize.width = Domlement.naturalWidth;
                    natureSize.height = Domlement.naturalHeight;
                } else {
                    var img = new Image();
                    img.src = Domlement.src;
                    natureSize.width = img.width;
                    natureSize.height = img.height;
                }
                return natureSize;
            }
        }
    }
    function usersRand(users, user_id) {
        var count = Math.round(Math.random() * users.length) + users.length * 3;
        var x = users.indexOf(user_id);
        var n = (count - x - 1) % users.length;
        var i = 0; (function xxx() {
            $('.user-info').removeClass('choosed');
            $('.user-info[data-id="' + users[n] + '"]').addClass('choosed');
            n++;
            i++;
            if (i == count) return;
            if (n >= users.length) n = 0;
            setTimeout(xxx, (1000 + (users.length * 500)) / count);
        })();
    }
    function usersRand2(users, user_id) {
        var usersLength = users.length;
        var count = usersLength + 10;
        var x = users.indexOf(user_id);
        var n = (count - x - 1) % usersLength;
        var i = 0;
        var time = 1000 + (usersLength * 500); (function xxx() {
            $('.user-info').removeClass('choosed');
            $('.user-info[data-id="' + users[n] + '"]').addClass('choosed');
            n++;
            i++;
            if (i == count) return;
            if (n >= usersLength) n = 0;
            setTimeout(xxx, (parseInt(time) / count));
        })();
    }
    function Gold(source, target) {
        if (source == "" || target == "") {
            return;
        }
        var id_bol;
        if (Object.prototype.toString.call(source) == '[object Array]') {
            id_bol = true;
        } else {
            id_bol = false;
        }
        var count = 15;
        var gold_w = 12;
        var gold_h = 12;
        var obj = [];
        var str = [];
        var str1 = [];
        var bol = false;
        var index = 39;
        var _index = 0;
        var index1_num = 0;
        var music_bol = true;
        var $canvas = $('<canvas width="' + $("body").width() + '" height="' + $("body").height() + ' "class="canvas_gold"></canvas>').appendTo('body');
        var can = $canvas.get(0).getContext("2d");
        if (id_bol) {
            var $target = $('.user-info[data-id="' + target + '"]');
            for (var z = 0; z < source.length; z++) {
                var $source = $('.user-info[data-id="' + source[z] + '"]');
                var coins = [];
                var _str_a = [];
                var _str_b = [];
                for (var i = 0; i < count; i++) {
                    var coin = new jinbi(gold_w, gold_h);
                    coin.x = $source.position().left + Math.round(Math.random() * ($source.width() * 0.62));
                    coin.y = $source.position().top + Math.round(Math.random() * ($source.width() * 0.62));
                    coins.push(coin);
                    _str_a.push({
                        "x": coin.x,
                        "y": coin.y
                    });
                    _str_b.push({
                        "x": $target.position().left + Math.round(Math.random() * ($target.width() * 0.62)),
                        "y": $target.position().top + Math.round(Math.random() * ($target.width() * 0.62))
                    });
                }
                obj.push(coins);
                str.push(_str_a);
                str1.push(_str_b);
            }
        } else {
            var $source = $('.user-info[data-id="' + source + '"]');
            for (var z = 0; z < target.length; z++) {
                var $target = $('.user-info[data-id="' + target[z] + '"]');
                var coins = [];
                var _str_a = [];
                var _str_b = [];
                for (var i = 0; i < count; i++) {
                    var coin = new jinbi(gold_w, gold_h);
                    coin.x = $source.position().left + Math.round(Math.random() * ($source.width() * 0.62));
                    coin.y = $source.position().top + Math.round(Math.random() * ($source.width() * 0.62));
                    coins.push(coin);
                    _str_a.push({
                        "x": coin.x,
                        "y": coin.y
                    });
                    _str_b.push({
                        "x": $target.position().left + Math.round(Math.random() * ($target.width() * 0.62)),
                        "y": $target.position().top + Math.round(Math.random() * ($target.width() * 0.62))
                    });
                }
                obj.push(coins);
                str.push(_str_a);
                str1.push(_str_b);
            }
        }
        var img = new Image();
        img.src = "http://img.lfzgame.com/images/niuniu/gold.png";
        img.onload = function() {
            move();
        }
        function move() {
            can.clearRect(0, 0, $canvas.width(), $canvas.height());
            if (_index % 2 == 0 && index1_num < count) {
                index1_num++;
            }
            for (var j = 0; j < obj.length; j++) {
                for (var k = 0; k < index1_num; k++) {
                    obj[j][k].index++;
                    if (obj[j][k].index <= index) {
                        obj[j][k].x += (str1[j][k]["x"] - str[j][k]["x"]) / index;
                        obj[j][k].y += (str1[j][k]["y"] - str[j][k]["y"]) / index;
                        obj[j][k].draw();
                    }
                    if (obj[j][0].index == index / 3) {
                        if (music_bol) {
                            sound.play('gold');
                            music_bol = false;
                        }
                    }
                }
            }
            if (obj[0][0].index == index) {
                if (id_bol) {
                    $('.user-info[data-id="' + target + '"]').addClass('flash');
                } else {
                    for (var i = 0; i < target.length; i++) {
                        $('.user-info[data-id="' + target[i] + '"]').addClass('flash');
                    }
                }
            } else if (obj[0][count - 1].index == index) {
                if (id_bol) {
                    $('.user-info[data-id="' + target + '"]').removeClass('flash');
                } else {
                    for (var i = 0; i < target.length; i++) {
                        $('.user-info[data-id="' + target[i] + '"]').removeClass('flash');
                    }
                }
            }
            _index++;
            if (obj[0][count - 1].index > index) {
                bol = true;
                setTimeout(function() {
                        $canvas.remove();
                    },
                    500)
            }
            if (!bol) {
                setTimeout(move, 15)
            }
        }
        function jinbi(w, h) {
            var img = new Image();
            img.src = "http://img.lfzgame.com/images/niuniu/gold.png";
            this.play = img;
            this.x = 0;
            this.y = 0;
            this.index = 0;
            this.width1 = w;
            this.height1 = h;
            this.draw = function() {
                can.drawImage(this.play, 0, 0, this.play.width, this.play.height, this.x, this.y, this.width1, this.height1);
            }
        }
    }
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
    var sound = {
        audioContext: null,
        audioBuffers: [],
        isloaded: false,
        isBgm: false,
        o: {},
        source: [],
        initModule: function() {
            this.audioBuffers = [];
            window.AudioContext = window.AudioContext || window.webkitAudioContext || window.mozAudioContext || window.msAudioContext;
            this.audioContext = new window.AudioContext();
        },
        stopSound: function(name) {
            var buffer = this.audioBuffers[name];
            if (buffer) {
                if (buffer.source) {
                    buffer.source.stop(0);
                    buffer.source = null;
                }
            }
        },
        playSound: function(name, isLoop) {
            var buffer = this.audioBuffers[name];
            if (buffer) {
                WeixinJSBridge.invoke('getNetworkType', {},
                    function(e) {
                        buffer.source = null;
                        buffer.source = sound.audioContext.createBufferSource();
                        buffer.source.buffer = buffer.buffer;
                        buffer.source.loop = false;
                        var gainNode = sound.audioContext.createGain();
                        if (isLoop == true) {
                            buffer.source.loop = true;
                            gainNode.gain.value = 0.7;
                        } else {
                            gainNode.gain.value = 1.0;
                        }
                        buffer.source.connect(gainNode);
                        gainNode.connect(sound.audioContext.destination);
                        buffer.source.start(0);
                    });
            }
        },
        initSound: function(arrayBuffer, name) {
            this.audioContext.decodeAudioData(arrayBuffer,
                function(buffer) {
                    sound.audioBuffers[name] = {
                        "name": name,
                        "buffer": buffer,
                        "source": null
                    };
                    if (name == "bgm") {
                        sound.isloaded = true;
                        sound.playSound(name, true);
                    }
                },
                function(e) {
                    console.warn('Error decoding file');
                });
        },
        loadAudioFile: function(url, name) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.responseType = 'arraybuffer';
            xhr.onload = function(e) {
                sound.initSound(xhr.response, name);
            };
            xhr.send();
        },
        load: function() {
            if (this.isloaded) return;
            for (var i in this.source) {
                this.loadAudioFile(this.source[i], i);
            }
        },
        play: function(num, sex) {
            if (!storage.get('pausemusic')) {
                if (sex) {
                    var name = 'sound_';
                    if (sex == 1) name += '1';
                    else name += '2';
                    if (/^\d+$/.test(num)) name += '_' + num;
                    else name += num;
                    this.playSound(name);
                } else {
                    if (num) this.playSound(num);
                }
            }
        }
    };
    sound.initModule();
    document.addEventListener("visibilitychange",
        function() {
            if (!document.hidden) {
                if (!storage.get('pausemusic')) sound.playSound('bgm', true);
            } else {
                if (!storage.get('pausemusic')) sound.stopSound('bgm');
            }
        });
    function createRanking(data, func) {
        win.gameId = data.game_id;
        var users = data.users;
        var game_id = data.game_id;
        var room_number = data.room_number;
        var num = data.num;
        var sum = data.sum;
        var datetime = data.datetime;
        var width = 750;
        var height = 1216;
        var pics = ['http://cdn.lfzgame.com/images/ranking_' + game_id + '_bg.jpg', 'http://cdn.lfzgame.com/images/people_bg.png', 'http://cdn.lfzgame.com/images/ranking_icon.png'];
        if (users.length > 6) {
            pics.push('http://cdn.lfzgame.com/images/people_bg2.jpg');
            pics.push('http://cdn.lfzgame.com/images/people_bg3.jpg');
            height += 102 * (users.length - 6);
        }
        for (var i in users) {
            if (/\/\/[064]{1,2}$/.test(users[i].path)) pics.push('images/default_head.png');
            else pics.push(users[i].path.replace(/\/0$/, '/64').replace('https://wx.qlogo.cn/', 'http://113.96.232.104/'));
        }
        var count = 0,
            imgs = [];
        for (var i in pics) {
            if (XMLHttpRequest) var xhr = new XMLHttpRequest();
            else var xhr = new ActiveXObject('Microsoft.XMLHTTP');
            xhr._index = i;
            xhr.open("get", pics[i], true);
            xhr.responseType = "blob";
            xhr.onload = function() {
                var img = document.createElement("img");
                if (this.status == 200) {
                    img.src = window.URL.createObjectURL(this.response);
                } else {
                    this.src = 'images/default_head.png';
                }
                imgs[this._index] = img;
                img.onload = function(e) {
                    count++;
                    if (count >= pics.length) draw();
                };
            };
            xhr.onerror = function() {
                var img = document.createElement("img");
                img.src = 'images/default_head.png';
                imgs[this._index] = img;
                img.onload = function(e) {
                    count++;
                    if (count >= pics.length) draw();
                };
            };
            xhr.send();
        }
        var canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        var context = canvas.getContext('2d');
        function draw() {
            context.drawImage(imgs[0], 0, 0, width, width / 750 * 1216);
            var text = '房间号：' + room_number + '                     ' + datetime + '   ' + num + '/' + sum + '局';
            context.font = "19px 微软雅黑";
            context.textAlign = 'center';
            context.fillStyle = "#a28080";
            context.fillText(text, 375, 412);
            for (var i in users) {
                if (i >= 6) context.drawImage(imgs[3], 0, 430 + i * 102, 750, 102);
                var n = parseInt(i) + parseInt(users.length > 6 ? 5 : 3);
                context.drawImage(imgs[n], 170, 446 + i * 102, 59, 59);
                context.drawImage(imgs[1], 129, 430 + i * 102, 490, 90);
                var textwidth = 250;
                context.font = "24px 微软雅黑";
                context.textAlign = 'start';
                context.fillStyle = "#666666";
                var arr = users[i].nickname.split('');
                var txt = '',
                    row = [];
                for (var j in arr) {
                    if (context.measureText(txt).width >= textwidth) {
                        row.push(txt);
                        txt = '';
                    }
                    txt += arr[j];
                }
                if (txt != '') row.push(txt);
                if (row.length == 1) {
                    context.fillText(row[0], 240, 482 + 102 * i);
                } else {
                    context.fillText(row[0], 240, 470 + 102 * i);
                    context.fillText(row[1], 240, 498 + 102 * i);
                }
                context.font = "36px 微软雅黑";
                context.textAlign = 'center';
                if (users[i]['value'] > 0) {
                    context.fillStyle = "#cd5908";
                    context.fillText('+' + users[i]['value'], 560, 490 + 102 * i);
                } else if (users[i]['value'] < 0) {
                    context.fillStyle = "#32b16c";
                    context.fillText(users[i]['value'], 560, 490 + 102 * i);
                } else {
                    context.fillStyle = "#989898";
                    context.fillText('0', 560, 490 + 102 * i);
                }
                if (users[i]['value'] == users[0]['value']) {
                    context.drawImage(imgs[2], 108, 430 + i * 102, 51, 84);
                }
            }
            if (i >= 6) context.drawImage(imgs[4], 0, 430 + (++i) * 102, 750, 175);
            if (typeof(func) == 'function') func(canvas.toDataURL("image/png"));
        }
    }
    function liuliuCreateRanking(data, func) {
        win.gameId = data.game_id;
        var users = data.users;
        var game_id = data.game_id;
        var room_number = data.room_number;
        var num = data.num;
        var sum = data.sum;
        var datetime = data.datetime;
        var width = 750;
        var height = 1216;
        var pics = ['http://cdn.lfzgame.com/images/common/ranking_' + game_id + '_bg.jpg', 'http://cdn.lfzgame.com/images/people_bg.png', 'http://cdn.lfzgame.com/images/ranking_icon.png'];
        if (users.length > 6) {
            pics.push('http://cdn.lfzgame.com/images/common/people_bg2.jpg');
            pics.push('http://cdn.lfzgame.com/images/common/people_bg3.jpg');
            height += 102 * (users.length - 6);
        }
        for (var i in users) {
            if (/\/\/[064]{1,2}$/.test(users[i].path)) pics.push('images/default_head.png');
            else pics.push(users[i].path.replace(/\/0$/, '/64').replace('https://wx.qlogo.cn/', 'http://113.96.232.104/'));
        }
        var count = 0,
            imgs = [];
        for (var i in pics) {
            if (XMLHttpRequest) var xhr = new XMLHttpRequest();
            else var xhr = new ActiveXObject('Microsoft.XMLHTTP');
            xhr._index = i;
            xhr.open("get", pics[i], true);
            xhr.responseType = "blob";
            xhr.onload = function() {
                var img = document.createElement("img");
                if (this.status == 200) {
                    img.src = window.URL.createObjectURL(this.response);
                } else {
                    this.src = 'images/default_head.png';
                }
                imgs[this._index] = img;
                img.onload = function(e) {
                    count++;
                    if (count >= pics.length) draw();
                };
            };
            xhr.onerror = function() {
                var img = document.createElement("img");
                img.src = 'images/default_head.png';
                imgs[this._index] = img;
                img.onload = function(e) {
                    count++;
                    if (count >= pics.length) draw();
                };
            };
            xhr.send();
        }
        var canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        var context = canvas.getContext('2d');
        function draw() {
            context.drawImage(imgs[0], 0, 0, width, width / 750 * 1216);
            var text = '房间号：' + room_number + '                     ' + datetime + '   ' + num + '/' + sum + '局';
            context.font = "19px 微软雅黑";
            context.textAlign = 'center';
            context.fillStyle = "#a28080";
            context.fillText(text, 375, 412);
            for (var i in users) {
                if (i >= 6) context.drawImage(imgs[3], 0, 430 + i * 102, 750, 102);
                var n = parseInt(i) + parseInt(users.length > 6 ? 5 : 3);
                context.drawImage(imgs[n], 170, 446 + i * 102, 59, 59);
                context.drawImage(imgs[1], 129, 430 + i * 102, 490, 90);
                var textwidth = 250;
                context.font = "24px 微软雅黑";
                context.textAlign = 'start';
                context.fillStyle = "#666666";
                var arr = users[i].nickname.split('');
                var txt = '',
                    row = [];
                for (var j in arr) {
                    if (context.measureText(txt).width >= textwidth) {
                        row.push(txt);
                        txt = '';
                    }
                    txt += arr[j];
                }
                if (txt != '') row.push(txt);
                if (row.length == 1) {
                    context.fillText(row[0], 240, 482 + 102 * i);
                } else {
                    context.fillText(row[0], 240, 470 + 102 * i);
                    context.fillText(row[1], 240, 498 + 102 * i);
                }
                context.font = "36px 微软雅黑";
                context.textAlign = 'center';
                if (users[i]['value'] > 0) {
                    context.fillStyle = "#cd5908";
                    context.fillText('+' + users[i]['value'], 560, 490 + 102 * i);
                } else if (users[i]['value'] < 0) {
                    context.fillStyle = "#32b16c";
                    context.fillText(users[i]['value'], 560, 490 + 102 * i);
                } else {
                    context.fillStyle = "#989898";
                    context.fillText('0', 560, 490 + 102 * i);
                }
                if (users[i]['value'] == users[0]['value']) {
                    context.drawImage(imgs[2], 108, 430 + i * 102, 51, 84);
                }
            }
            if (i >= 6) context.drawImage(imgs[4], 0, 430 + (++i) * 102, 750, 175);
            if (typeof(func) == 'function') func(canvas.toDataURL("image/png"));
        }
    }
    function canvasRanking(data, func) {
        win.gameId = data.game_id;
        var $canvas = $('<canvas id="canvas" width="' + 750 * 2 + '" height="' + 1216 * 2 + ' "></canvas>').appendTo('body').hide();
        var can = $canvas.get(0).getContext("2d");
        var str = ["http://cdn.lfzgame.com/images/bull/rank_bg.jpg", "http://cdn.lfzgame.com/images/bull/rank_frame62.png", 'http://cdn.lfzgame.com/images/bull/scoresRank3.png', 'http://cdn.lfzgame.com/images/bull/rank_bigwinner2.png', 'http://cdn.lfzgame.com/images/bull/score_search1.png'];
        var index = 0,
            arr = [];
        for (var i in str) {
            if (XMLHttpRequest) var xhr = new XMLHttpRequest();
            else var xhr = new ActiveXObject('Microsoft.XMLHTTP');
            xhr._index = i;
            xhr.open("get", str[i], true);
            xhr.responseType = "blob";
            xhr.onload = function() {
                var img = document.createElement("img");
                if (this.status == 200) {
                    img.src = window.URL.createObjectURL(this.response);
                } else {
                    this.src = 'images/default_head.png';
                }
                arr[this._index] = img;
                img.onload = function(e) {
                    index++;
                    if (index >= str.length) {
                        if (data.users) {
                            if (data.users.length > 6) {
                                canvasStart9()
                            } else {
                                canvasStart()
                            }
                        }
                    }
                };
            };
            xhr.onerror = function() {
                var img = document.createElement("img");
                img.src = 'images/default_head.png';
                arr[this._index] = img;
                img.onload = function(e) {
                    index++;
                    if (index >= str.length) {
                        if (data.users) {
                            if (data.users.length > 6) {
                                canvasStart9()
                            } else {
                                canvasStart()
                            }
                        }
                    }
                };
            };
            xhr.send();
        }
        function canvasStart() {
            can.drawImage(arr[0], 0, 0, 750 * 2, 1216 * 2);
            can.drawImage(arr[1], 115 * 2, 41 * 2, 520 * 2, 611 * 520 / 360 * 2);
            can.drawImage(arr[2], 100 * 2, (41 + 611 * 520 / 360 + 68) * 2, 228 * 2, 66 * 2);
            can.drawImage(arr[4], 420 * 2, (41 + 611 * 520 / 360 + 68) * 2, 228 * 2, 66 * 2);
            can.lineWidth = 1;
            can.strokeStyle = "#ffffff";
            can.fillStyle = '#554A2A';
            roundRect(140 * 2, 243 * 2, 475 * 2, 35 * 2, 30).stroke();
            can.fill();
            can.font = 20 * 2 + "px 微软雅黑";
            can.fillStyle = '#ffcd06';
            can.textBaseline = 'bottom';
            can.fillText('房间号:' + data.room_number, 150 * 2, 270 * 2);
            can.fillText(data.datetime, 335 * 2, 270 * 2);
            can.fillText(data.num + '局', 550 * 2, 270 * 2);
            if (data.users.length > 0) {
                for (var i in data.users) {
                    var textwidth = 500;
                    can.fillStyle = '#000000';
                    can.fillRect(134 * 2, 303 * 2 + (5 + 75 * 160 / 130) * 2 * i, 482 * 2, 88 * 2);
                    can.font = 29 * 2 + "px 微软雅黑";
                    can.textBaseline = 'middle';
                    if (parseInt(data.users[i].value) > 0) {
                        var value = '+' + data.users[i].value;
                        can.fillStyle = '#FFBB00';
                        var nameArr = data.users[i].nickname.split('');
                        var txt = '',
                            row = [];
                        for (var j in nameArr) {
                            if (can.measureText(txt).width >= textwidth) {
                                row.push(txt);
                                txt = '';
                            }
                            txt += nameArr[j];
                        }
                        if (txt != '') row.push(txt);
                        if (row.length == 1) {
                            can.fillText(row[0], 209 * 2, 347 * 2 + (5 + 75 * 160 / 130) * 2 * i);
                        } else {
                            can.fillText(row[0], 209 * 2, 347 * 2 + ((5 + 75 * 160 / 130) * 2 * i) - 37);
                            can.fillText(row[1], 209 * 2, 347 * 2 + ((5 + 75 * 160 / 130) * 2 * i) + 33);
                        }
                        can.fillText(value, 510 * 2, 347 * 2 + (5 + 75 * 160 / 130) * 2 * i);
                    } else {
                        can.fillStyle = '#B3B2AD';
                        var nameArr = data.users[i].nickname.split('');
                        var txt = '',
                            row = [];
                        for (var j in nameArr) {
                            if (can.measureText(txt).width >= textwidth) {
                                row.push(txt);
                                txt = '';
                            }
                            txt += nameArr[j];
                        }
                        if (txt != '') row.push(txt);
                        if (row.length == 1) {
                            can.fillText(row[0], 209 * 2, 347 * 2 + (5 + 75 * 160 / 130) * 2 * i);
                        } else {
                            can.fillText(row[0], 209 * 2, 347 * 2 + ((5 + 75 * 160 / 130) * 2 * i) - 37);
                            can.fillText(row[1], 209 * 2, 347 * 2 + ((5 + 75 * 160 / 130) * 2 * i) + 33);
                        }
                        can.fillText(data.users[i].value, 510 * 2, 347 * 2 + (5 + 75 * 160 / 130) * 2 * i);
                    }
                }
                var maxArr = [];
                var max = parseInt(data.users[0].value);
                for (var j = 1; j < data.users.length; j++) {
                    if (max < parseInt(data.users[j].value)) {
                        max = parseInt(data.users[j].value);
                    }
                }
                for (var k in data.users) {
                    if (max == parseInt(data.users[k].value)) {
                        maxArr.push(k);
                    }
                }
                for (var m in maxArr) {
                    can.drawImage(arr[3], 134 * 2, 293 * 2 + (5 + 75 * 160 / 130) * 2 * maxArr[m], 75 * 2, 75 * 160 / 130 * 2);
                }
            }
            function roundRect(x, y, w, h, r) {
                if (w < 2 * r) r = w / 2;
                if (h < 2 * r) r = h / 2;
                can.beginPath();
                can.moveTo(x + r, y);
                can.arcTo(x + w, y, x + w, y + h, r);
                can.arcTo(x + w, y + h, x, y + h, r);
                can.arcTo(x, y + h, x, y, r);
                can.arcTo(x, y, x + w, y, r);
                can.closePath();
                return can;
            }
            if (typeof(func) == 'function') {
                func(canvas.toDataURL("image/png"));
                $('#canvas').remove();
            }
        }
        function canvasStart9() {
            can.drawImage(arr[0], 0, 0, 750 * 2, 1216 * 2);
            can.drawImage(arr[1], 115 * 2, 41 * 2, 520 * 2, 611 * 520 / 360 * 2);
            can.drawImage(arr[2], 100 * 2, (41 + 611 * 520 / 360 + 68) * 2, 228 * 2, 66 * 2);
            can.drawImage(arr[4], 420 * 2, (41 + 611 * 520 / 360 + 68) * 2, 228 * 2, 66 * 2);
            can.lineWidth = 1;
            can.strokeStyle = "#ffffff";
            can.fillStyle = '#554A2A';
            roundRect(140 * 2, 243 * 2, 475 * 2, 35 * 2, 30).stroke();
            can.fill();
            can.font = 20 * 2 + "px 微软雅黑";
            can.fillStyle = '#ffcd06';
            can.textBaseline = 'bottom';
            can.fillText('房间号:' + data.room_number, 150 * 2, 270 * 2);
            can.fillText(data.datetime, 335 * 2, 270 * 2);
            can.fillText(data.num + '局', 550 * 2, 270 * 2);
            if (data.users.length > 0) {
                for (var i in data.users) {
                    var textwidth = 500;
                    can.fillStyle = '#000000';
                    can.fillRect(134 * 2, 303 * 2 + (5 + 49 * 160 / 130) * 2 * i, 482 * 2, 58 * 2);
                    can.font = 29 * 2 + "px 微软雅黑";
                    can.textBaseline = 'middle';
                    if (parseInt(data.users[i].value) > 0) {
                        var value = '+' + data.users[i].value;
                        can.fillStyle = '#FFBB00';
                        can.fillText(value, 510 * 2, 332 * 2 + (5 + 49 * 160 / 130) * 2 * i);
                        var nameArr = data.users[i].nickname.split('');
                        var txt = '',
                            row = [];
                        for (var j in nameArr) {
                            if (can.measureText(txt).width >= textwidth) {
                                row.push(txt);
                                txt = '';
                            }
                            txt += nameArr[j];
                        }
                        if (txt != '') row.push(txt);
                        if (row.length == 1) {
                            can.fillText(row[0], 209 * 2, 332 * 2 + (5 + 49 * 160 / 130) * 2 * i);
                        } else {
                            can.font = 24 * 2 + "px 微软雅黑";
                            can.fillText(row[0], 209 * 2, 332 * 2 + ((5 + 49 * 160 / 130) * 2 * i) - 32);
                            can.fillText(row[1], 209 * 2, 332 * 2 + ((5 + 49 * 160 / 130) * 2 * i) + 25);
                        }
                    } else {
                        can.fillStyle = '#B3B2AD';
                        can.fillText(data.users[i].value, 510 * 2, 332 * 2 + (5 + 49 * 160 / 130) * 2 * i);
                        var nameArr = data.users[i].nickname.split('');
                        var txt = '',
                            row = [];
                        for (var j in nameArr) {
                            if (can.measureText(txt).width >= textwidth) {
                                row.push(txt);
                                txt = '';
                            }
                            txt += nameArr[j];
                        }
                        if (txt != '') row.push(txt);
                        if (row.length == 1) {
                            can.fillText(row[0], 209 * 2, 332 * 2 + (5 + 49 * 160 / 130) * 2 * i);
                        } else {
                            can.font = 24 * 2 + "px 微软雅黑";
                            can.fillText(row[0], 209 * 2, 332 * 2 + ((5 + 49 * 160 / 130) * 2 * i) - 32);
                            can.fillText(row[1], 209 * 2, 332 * 2 + ((5 + 49 * 160 / 130) * 2 * i) + 25);
                        }
                    }
                }
                var maxArr = [];
                var max = parseInt(data.users[0].value);
                for (var j = 1; j < data.users.length; j++) {
                    if (max < parseInt(data.users[j].value)) {
                        max = parseInt(data.users[j].value);
                    }
                }
                for (var k in data.users) {
                    if (max == parseInt(data.users[k].value)) {
                        maxArr.push(k);
                    }
                }
                for (var m in maxArr) {
                    can.drawImage(arr[3], 134 * 2, 293 * 2 + (5 + 49 * 160 / 130) * 2 * maxArr[m], 49 * 2, 49 * 160 / 130 * 2);
                }
            }
            function roundRect(x, y, w, h, r) {
                if (w < 2 * r) r = w / 2;
                if (h < 2 * r) r = h / 2;
                can.beginPath();
                can.moveTo(x + r, y);
                can.arcTo(x + w, y, x + w, y + h, r);
                can.arcTo(x + w, y + h, x, y + h, r);
                can.arcTo(x, y + h, x, y, r);
                can.arcTo(x, y, x + w, y, r);
                can.closePath();
                return can;
            }
            if (typeof(func) == 'function') {
                func(canvas.toDataURL("image/png"));
                $('#canvas').remove();
            }
        }
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
            location.href = 'index.html';
        };
        document.getElementById('cancelBtn').onclick = function() {
            document.body.removeChild(document.getElementById('returnIndex'));
        };
        document.getElementById('returnIndex').onclick = function() {
            document.body.removeChild(document.getElementById('returnIndex'));
        };
    }
    function getRuleScaleY(game_data) {
        var count = 0;
        for (var d in game_data) {
            if (game_data[d] != '' && game_data[d] != undefined && d != 'number') {
                count++;
            }
        }
        return (count - 5) * 30;
    }
    function generalRule(game_id, game_data, parent) {
        var data = game_data;
        var startPointY = 135;
        var startPointX = 33;
        var startValuePointX = 87;
        var spaceY = 30;
        var ruleJson = {
            '1': {
                'zhuang_type': {
                    'text': '模式 :',
                    'value': {
                        '1': '明牌抢庄',
                        '2': '通比牛牛',
                        '3': '自由抢庄',
                        '4': '牛牛上庄',
                        '5': '固定庄家'
                    }
                },
                'end_points': {
                    'text': '底分 :',
                    'value': {
                        '1': '1分',
                        '2': '2分',
                        '3': '3分',
                        '4': '4分',
                        '5': '5分',
                        '10': '10分',
                        '20': '20分'
                    }
                },
                'card_rule': {
                    'text': '规则 :',
                    'value': {
                        '1': '牛牛×3 牛九×2 牛八×2',
                        '2': '牛牛×4 牛九×3 牛八×2 牛七×2'
                    }
                },
                'hand_patterns': {
                    'text': '牌型 :',
                    'value': ['五花牛（5倍） ', '炸弹牛（6倍） ', '五小牛（8倍） ']
                },
                'max_matches': {
                    'text': '局数 :',
                    'value': {
                        '10': '10局房卡X1',
                        '20': '20局房卡X2'
                    }
                },
                'zhuang_value': {
                    'text': '上庄 :',
                    'value': {
                        '0': '无',
                        '100': '100',
                        '300': '300',
                        '500': '500'
                    }
                }
            },
            '2': {
                'end_points': {
                    'text': '底分 :',
                    'value': {
                        '2': '2分',
                        '4': '4分',
                        '8': '8分'
                    }
                },
                'chip_rule': {
                    'text': '分数 :',
                    'value': {
                        '1': '2/4，4/8，8/16，10/20',
                        '2': '2/4，5/10，10/20，20/40'
                    }
                },
                'max_matches': {
                    'text': '局数 :',
                    'value': {
                        '10': '10局房卡X1',
                        '20': '20局房卡X2'
                    }
                },
                'upper_limit': {
                    'text': '上限 :',
                    'value': {
                        '0': '无',
                        '500': '500',
                        '1000': '1000',
                        '2000': '2000'
                    }
                }
            },
            '3': {
                'end_points': {
                    'text': '底分 :',
                    'value': {
                        '1': '1分',
                        '3': '3分',
                        '5': '5分'
                    }
                },
                'play_type': {
                    'text': '玩法 :',
                    'value': ['经典 ']
                },
                'max_matches': {
                    'text': '局数 :',
                    'value': {
                        '5': '5局房卡X1',
                        '10': '10局房卡X2',
                        '20': '20局房卡X4'
                    }
                },
            },
            '4': {
                'zhuang_type': {
                    'text': '模式 :',
                    'value': {
                        '1': '明牌抢庄',
                        '2': '通比牛牛',
                        '3': '自由抢庄',
                        '4': '牛牛上庄',
                        '5': '固定庄家'
                    }
                },
                'end_points': {
                    'text': '底分 :',
                    'value': {
                        '1': '1分',
                        '2': '2分',
                        '3': '3分',
                        '4': '4分',
                        '5': '5分',
                        '10': '10分',
                        '20': '20分'
                    }
                },
                'card_rule': {
                    'text': '规则 :',
                    'value': {
                        '1': '牛牛×3 牛九×2 牛八×2',
                        '2': '牛牛×4 牛九×3 牛八×2 牛七×2'
                    }
                },
                'hand_patterns': {
                    'text': '牌型 :',
                    'value': ['五花牛（5倍） ', '炸弹牛（6倍） ', '五小牛（8倍） ']
                },
                'max_matches': {
                    'text': '局数 :',
                    'value': {
                        '12': '12局房卡X2',
                        '24': '24局房卡X4'
                    }
                },
                'zhuang_value': {
                    'text': '上庄 :',
                    'value': {
                        '0': '无',
                        '100': '100',
                        '300': '300',
                        '500': '500'
                    }
                }
            },
            '5': {
                'end_points': {
                    'text': '小盲/大盲 :',
                    'value': {
                        '1': '        1/2',
                        '2': '        2/4'
                    }
                },
                'max_matches': {
                    'text': '局数 :',
                    'value': {
                        '10': '10局房卡X2',
                        '20': '20局房卡X4'
                    }
                },
                'end_points_rule': {
                    'text': '前注 :',
                    'value': {
                        '0': '无',
                        '1': '1倍小盲',
                        '2': '2倍小盲'
                    }
                },
                'init_points': {
                    'text': '初始分数 :',
                    'value': {
                        '500': '       500',
                        '1000': '       1000',
                        '1500': '       1500',
                        '2000': '       2000'
                    }
                }
            },
            '6': {
                'zhuang_type': {
                    'text': '模式 :',
                    'value': {
                        '1': '抢庄模式',
                        '2': '通比模式',
                        '3': '三公当庄',
                    }
                },
                'end_points': {
                    'text': '底分 :',
                    'value': {
                        '1': '1分',
                        '2': '2分',
                        '3': '3分',
                        '4': '4分',
                        '5': '5分',
                        '10': '10分',
                        '20': '20分'
                    }
                },
                'card_rule': {
                    'text': '规则 :',
                    'value': {
                        '2': '暴玖×9'
                    }
                },
                'max_matches': {
                    'text': '局数 :',
                    'value': {
                        '12': '12局房卡X2',
                        '24': '24局房卡X4'
                    }
                },
            },
            '8': {
                'zhuang_type': {
                    'text': '模式 :',
                    'value': {
                        '1': '明牌抢庄',
                        '2': '通比牛牛',
                        '3': '自由抢庄',
                        '4': '牛牛上庄',
                        '5': '固定庄家'
                    }
                },
                'end_points': {
                    'text': '底分 :',
                    'value': {
                        '1': '1分',
                        '2': '2分',
                        '3': '3分',
                        '4': '4分',
                        '5': '5分',
                        '10': '10分',
                        '20': '20分'
                    }
                },
                'card_rule': {
                    'text': '规则 :',
                    'value': {
                        '1': '牛牛×3 牛九×2 牛八×2',
                        '2': '牛牛×4 牛九×3 牛八×2 牛七×2'
                    }
                },
                'hand_patterns': {
                    'text': '牌型 :',
                    'value': ['五花牛（5倍） ', '炸弹牛（6倍） ', '五小牛（8倍） ']
                },
                'max_matches': {
                    'text': '局数 :',
                    'value': {
                        '10': '10局房卡X1',
                        '20': '20局房卡X2'
                    }
                },
                'zhuang_value': {
                    'text': '上庄 :',
                    'value': {
                        '0': '无',
                        '100': '100',
                        '300': '300',
                        '500': '500'
                    }
                }
            },
            '9': {
                'zhuang_type': {
                    'text': '模式 :',
                    'value': {
                        '1': '明牌抢庄',
                        '2': '通比牛牛',
                        '3': '自由抢庄',
                        '4': '牛牛上庄',
                        '5': '固定庄家'
                    }
                },
                'end_points': {
                    'text': '底分 :',
                    'value': {
                        '1': '1分',
                        '2': '2分',
                        '3': '3分',
                        '4': '4分',
                        '5': '5分',
                        '10': '10分',
                        '20': '20分'
                    }
                },
                'card_rule': {
                    'text': '规则 :',
                    'value': {
                        '1': '牛牛×3 牛九×2 牛八×2',
                        '2': '牛牛×4 牛九×3 牛八×2 牛七×2'
                    }
                },
                'hand_patterns': {
                    'text': '牌型 :',
                    'value': ['五花牛（5倍） ', '炸弹牛（6倍） ', '五小牛（8倍） ']
                },
                'max_matches': {
                    'text': '局数 :',
                    'value': {
                        '12': '12局房卡X2',
                        '24': '24局房卡X4'
                    }
                },
                'zhuang_value': {
                    'text': '上庄 :',
                    'value': {
                        '0': '无',
                        '100': '100',
                        '300': '300',
                        '500': '500'
                    }
                }
            },
        }
        var config = ruleJson[game_id];
        var count = 1;
        for (var item in config) {
            if (data[item] && data[item] != '') {
                parent.font = "18px 微软雅黑";
                parent.textAlign = 'left';
                parent.fillStyle = "#dcdcdc";
                parent.fillText(config[item]['text'], startPointX, startPointY + count * spaceY);
                var valueArray = typeof config[item]['value'] === 'string'
                if (typeof config[item]['value'] === 'object' && !isNaN(config[item]['value'].length)) {
                    var tempStr = '';
                    var dataArray = data[item].split(',');
                    for (var j = 0; j < dataArray.length; j++) {
                        var index = parseInt(dataArray[j] - 1);
                        tempStr += config[item]['value'][index];
                    }
                    parent.font = "18px 微软雅黑";
                    parent.textAlign = 'left';
                    parent.fillStyle = "#dcdcdc";
                    parent.fillText(tempStr, startValuePointX, startPointY + count * spaceY);
                } else {
                    parent.font = "18px 微软雅黑";
                    parent.textAlign = 'left';
                    parent.fillStyle = "#dcdcdc";
                    parent.fillText(config[item]['value'][data[item]], startValuePointX, startPointY + count * spaceY);
                }
                count++;
            }
        }
    }
    function generalQrcodeData(d) {
        var data = {};
        if (d.count_matchs) {
            data['max_matches'] = d.count_matchs
        };
        if (d.type && d.type != undefined && d.type != null && d.type != '') {
            data['zhuang_type'] = d.type
        };
        if (d.number) {
            data.number = d.number
        };
        for (var i in d.room_rule) {
            if (d.game == '1' || d.game == '4' || d.game == '8' || d.game == '9') {
                if (d.type != '5' && i == 'zhuang_value') {
                    continue
                };
            }
            data[i] = d.room_rule[i];
        }
        return data;
    }
    function qrcodeCreate(url, game_id, data) {
        var qr = qrcode(8, 'H');
        qr.addData(url);
        qr.make();
        var size = 300;
        var cellsize = parseInt(size / qr.getModuleCount());
        var margin = parseInt((size - qr.getModuleCount() * cellsize) / 2);
        var codeUrl = qr.createImgTag(cellsize, margin, 300);
        var gameName = '';
        var width = 507;
        var height = 826;
        var pics = [codeUrl];
        if (parseInt(game_id) === 1) {
            gameName = '牛牛';
        } else if (parseInt(game_id) === 2) {
            gameName = '炸金花';
        } else if (parseInt(game_id) === 3) {
            gameName = '十三水';
        } else if (parseInt(game_id) === 4) {
            gameName = '十人牛牛';
        } else if (parseInt(game_id) === 5) {
            gameName = '德州扑克';
        } else if (parseInt(game_id) === 6) {
            gameName = '三公';
        } else if (parseInt(game_id) === 8) {
            gameName = '六人牛牛';
        } else if (parseInt(game_id) === 9) {
            gameName = '九人牛牛';
        }
        pics.push(getShareIconLink(game_id));
        var index = 0;
        var imgs = [];
        for (var i = 0; i < pics.length; i++) {
            if (pics[i].indexOf('data:image/gif') != -1 || pics[i].indexOf('data:image/jpg') != -1 || pics[i].indexOf('data:image/jpeg') != -1 || pics[i].indexOf('data:image/png') != -1) {
                var img = document.createElement("img");
                img.src = pics[i];
                imgs[i] = img;
                img.onload = function(e) {
                    index++;
                    if (index >= pics.length) {
                        canvasStart();
                    }
                }
            } else {
                if (XMLHttpRequest) var xhr = new XMLHttpRequest();
                else var xhr = new ActiveXObject('Microsoft.XMLHTTP');
                xhr._index = i;
                xhr.open("get", pics[i], true);
                xhr.responseType = "blob";
                xhr.onload = function() {
                    var img = document.createElement("img");
                    if (this.status == 200) {
                        img.src = window.URL.createObjectURL(this.response);
                    } else {
                        this.src = 'images/default_head.png';
                    }
                    imgs[this._index] = img;
                    img.onload = function(e) {
                        index++;
                        if (index >= pics.length) {
                            canvasStart();
                        }
                    }
                };
                xhr.onerror = function() {
                    var img = document.createElement("img");
                    img.src = 'images/default_head.png';
                    imgs[this._index] = img;
                    img.onload = function(e) {
                        index++;
                        if (index >= pics.length) canvasStart();
                    };
                };
                xhr.send();
            }
        }
        var canvas = document.createElement('canvas');
        var scaleY = getRuleScaleY(data);
        canvas.width = width;
        canvas.height = height + scaleY;
        var context = canvas.getContext("2d");
        function canvasStart() {
            context.fillStyle = "#333333";
            context.fillRect(0, 0, width, height + scaleY);
            context.strokeStyle = "#525252";
            context.beginPath();
            context.lineCap = "butt";
            context.lineWidth = 1;
            context.moveTo(9, 133);
            context.lineTo(489, 133);
            context.stroke();
            context.drawImage(imgs[1], 33, 28, 86, 86);
            generalRule(game_id, data, context);
            context.font = "24px 微软雅黑";
            context.textAlign = 'left';
            context.fillStyle = "#ffffff";
            context.fillText(gameName, 130, 48);
            context.font = "18px 微软雅黑";
            context.textAlign = 'left';
            context.fillStyle = "#dcdcdc";
            context.fillText('房间号:' + data.number, 130, 100);
            context.strokeRect(10, 310 + scaleY, 487, 506);
            context.fillStyle = "#f7f7f7";
            context.fillRect(48, 332 + scaleY, 413, 413);
            context.drawImage(imgs[0], 76, 359 + scaleY, 359, 359);
            context.font = "18px 微软雅黑";
            context.textAlign = 'left';
            context.fillStyle = "#999999";
            context.fillText("长按二维码扫描进入房间", 155, 788 + scaleY);
            var img = new Image();
            var imgData = canvas.toDataURL("image/png");
            img.src = imgData;
            img.onload = function() {
                var qrCode = '<div class="qr-code"><div class="container"><img src="' + img.src + '"><div class="close-qr-code"></div></div></div>';
                document.body.insertAdjacentHTML("beforeend", qrCode);
                $('.qr-code .container .close-qr-code').click(function() {
                    $('.qr-code').remove();
                })
            }
        }
    }
    function canvasQRCodeCreate(data, codeUrl) {
        var game_id = data;
        var gameName = '';
        var width = 507;
        var height = 826;
        var pics = [];
        if (parseInt(game_id) === 1) {
            pics.push("http://cdn.lfzgame.com/images/game-niuniu.jpg");
            gameName = '牛牛';
        } else if (parseInt(game_id) === 2) {
            pics.push("http://cdn.lfzgame.com/images/game-jinhua.jpg");
            gameName = '炸金花';
        } else if (parseInt(game_id) === 3) {
            pics.push('http://cdn.lfzgame.com/images/thirteencards/game_logo.png');
            gameName = '十三水';
        } else if (parseInt(game_id) === 4) {
            pics.push('http://cdn.lfzgame.com/images/niuniuten/share-niuniuten.jpg');
            gameName = '十人牛牛';
        } else if (parseInt(game_id) === 5) {
            pics.push('http://cdn.lfzgame.com/images/texasholdem/game-texasholdem.jpg');
            gameName = '德州扑克';
        } else if (parseInt(game_id) === 6) {
            pics.push('http://cdn.lfzgame.com/images/sangong/share-sangong.jpg');
            gameName = '三公';
        } else if (parseInt(game_id) === 8) {
            pics.push('http://cdn.lfzgame.com/images/liuliuxianyue/bull6-share.jpg');
            gameName = '六人牛牛';
        } else if (parseInt(game_id) === 8) {
            pics.push('http://cdn.lfzgame.com/images/liuliuxianyue/bull9-share.jpg');
            gameName = '九人牛牛';
        }
        var index = 0;
        var imgs = [];
        for (var i = 0; i < pics.length; i++) {
            var img = new Image();
            img.src = pics[i];
            imgs.push(img);
            img.onload = function() {
                index++;
                if (index >= pics.length) {
                    canvasStart();
                }
            }
        }
        var canvas = $('<canvas id="canvas" width="' + width + '" height="' + height + '" style="z-index:999;left: 0;top: 0;"></canvas>').appendTo('body');
        canvas.width = width;
        canvas.height = height;
        var context = canvas.get(0).getContext("2d");
        function canvasStart() {
            context.fillStyle = "#333333";
            context.fillRect(0, 0, width, height);
            context.strokeStyle = "#525252";
            context.beginPath();
            context.lineCap = "butt";
            context.lineWidth = 1;
            context.moveTo(9, 133);
            context.lineTo(489, 133);
            context.stroke();
            context.drawImage(imgs[0], 33, 28, 86, 86);
            context.font = "24px 微软雅黑";
            context.textAlign = 'left';
            context.fillStyle = "#ffffff";
            context.fillText(gameName, 130, 48);
            context.font = "18px 微软雅黑";
            context.textAlign = 'left';
            context.fillStyle = "#dcdcdc";
            context.fillText('房间号:1234567', 130, 100);
            context.strokeRect(10, 310, 487, 506);
        }
    }
    function getShareIconLink(game_id) {
        var shareLinkJson = {
            '1': 'niuniu',
            '2': 'jinhua',
            '3': 'shisanshui',
            '4': 'niuniuten',
            '5': 'texasholdem',
            '6': 'sangong',
            '7': 'tiandakeng',
            '8': 'bull6',
            '9': 'bull9'
        }
        var gameVersionJson = {
            'bailexiuxian': '2',
            'chaowenzhongyu': '2',
            'dahonghuaqipai': '2',
            'dashengzhongyu': '2',
            'fuchenghuyu': '1',
            'haichaoyouxi': '2',
            'hongtaohuyu': '1',
            'jingongmenhuyu': '2',
            'laopengyouqipai': '1',
            'lekuyoule': '2',
            'leyueguibinting': '2',
            'lianyundating': '3',
            'liuliulexiang': '3',
            'liuliuxianyue': '3',
            'shouquandating': '2',
            'wuyibahuyu': '1',
            'xianshihuyu': '1',
            'yingduoduo': '1',
            'huangguanhuyu': '2',
            'test': '2',
            'ceshi': '2'
        }
        if (gameVersionJson[win.sign] == undefined || shareLinkJson[game_id] == undefined) {
            return 'http://cdn.lfzgame.com/images/shareIcon/undefined-share-image.jpg';
        } else {
            return 'http://cdn.lfzgame.com/images/shareIcon/' + 'v' + gameVersionJson[win.sign] + '/' + 'share-' + shareLinkJson[game_id] + '.jpg';
        }
    }
    var notice = {
        data: '',
        play: function(data) {
            if (data.length > 0) {
                var gonggao = document.getElementById("gongao");
                if (!gonggao) {
                    var aa = '<div id="gongao" class="all-gonggao">';
                    aa += '<div class="gonggao-icon"></div>';
                    aa += '<div class="scroll_div" style="" id="scroll_div">';
                    aa += '<div id="scroll_begin" class="scroll_begin" style="">➤ ' + data.join('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;➤ ') + '</div>';
                    aa += '<div id="scroll_end" class="scroll_end" style=""></div>';
                    aa += '</div>';
                    aa += '</div>';
                    document.getElementsByTagName('body')[0].insertAdjacentHTML("beforeend", aa);
                    var speed = 20;
                    var scroll_begin = document.getElementById("scroll_begin");
                    var scroll_div = document.getElementById("scroll_div");
                    var left_begin = scroll_div.offsetWidth;
                    scroll_begin.style.left = left_begin + 'px';
                    function Marquee() {
                        if (left_begin <= -scroll_begin.offsetWidth) {
                            var gonggao = document.getElementById("gongao");
                            if (gonggao) {
                                gonggao.parentNode.removeChild(gonggao);
                            }
                            clearInterval(MyMar);
                            return;
                        }
                        left_begin--;
                        scroll_begin.style.left = left_begin + 'px';
                    }
                    var MyMar = setInterval(Marquee, speed);
                }
            }
        },
        start: function() {
            var that = this;
            var datas = [];
            try {
                datas = JSON.parse(this.data);
            } catch(e) {
                return;
            }
            setInterval(function() {
                    var data = [];
                    var time = Math.round(new Date().getTime() / 1000).toString();
                    for (var i in datas) {
                        if ((datas[i].play_time <= time && datas[i].end_time >= time) || (datas[i].play_time <= time && datas[i].end_time == 0)) {
                            data.push(datas[i].contents);
                        }
                    }
                    that.play(data);
                },
                10000);
        }
    }; (function(ws) {
        ws.link = null;
        var func = null,
            connect_num = 0,
            close_func = null,
            url = null;
        var status = 0;
        var codes = [];
        ws.callback = {};
        ws._datas = [];
        var noActs = ['timer', 'userTime', 'playerjoin', 'gameRunning', 'playerleave', 'ready', 'chat', 'roomGameOver'];
        ws.send = function(data, act, _data) {
            if (ws == null) {
                console.warn('Websocket没有连接，无法进行操作！');
            } else {
                if (ws.link == null) {
                    setTimeout(function() {
                            ws.send(data, act);
                        },
                        200);
                } else {
                    if (act) {
                        var d = {};
                        d['data'] = data || '';
                        d['act'] = act;
                        d = JSON.stringify(d);
                        ws.link.send(d);
                        if (_data && typeof(ws.callback[act]) == 'function') {
                            ws._datas.push(JSON.stringify({
                                act: act,
                                data: _data
                            }));
                            ws.callback[act](_data);
                        }
                    } else {
                        ws.link.send(data);
                    }
                }
            }
        };
        ws.connect = function(uri, fn) {
            var uri = uri || url;
            var fn = fn || func;
            if (uri == null) return;
            url = uri;
            if (fn) func = fn;
            if (ws.link != null) {
                ws.link.close();
            }
            ws.link = new WebSocket((IS_SSL ? 'wss': 'ws') + '://' + WS_DOMAIN + '/' + uri + '.html?token=' + win.token + '&code=' + location.href.split('code=')[1].split('&')[0]);
            ws.link.onopen = function(d) {
                console.info('Websocket 已连接!');
                document.getElementById('networkReconnect').style.display = 'none';
                connect_num = 0;
                status = 1;
                ws.heartbeat.start();
                if (win.status == 1) {
                    ws.send('join');
                } else if (win.status == 0) {
                    win.status = 2;
                    ws.send('init');
                    ws.send('connect_success');
                } else ws.send('connect_success');
                if (typeof(fn) == 'function') fn();
            };
            ws.link.onerror = function(evt) {
                console.log(evt);
            };
            ws.link.onmessage = function(d) {
                ws.heartbeat.reply();
                if (d.data == 'pong') return;
                if (d.data == 'ping') {
                    this.send('pong');
                    return;
                }
                if (d.data == 'join_success') {
                    win.status = 2;
                    ws.send('init');
                    ws.send('connect_success');
                    return;
                }
                if (d.data == 'getout') {
                    win.reload();
                    return;
                }
                if (d.data == 'close') {
                    if (ws.link == this) {
                        document.getElementById('networkReconnect').innerText = '您已在其他设备登录！';
                        document.getElementById('networkReconnect').style.display = 'block';
                        ws.close();
                    } else {
                        this.close();
                    }
                    return;
                }
                try {
                    var dt = JSON.parse(d.data);
                    var act = dt.act;
                    var data = dt.data;
                    var i = ws._datas.indexOf(JSON.stringify({
                        act: act,
                        data: data
                    }));
                    if (i > -1) {
                        ws._datas.splice(i, 1);
                        return;
                    }
                    if (act == 'notice') {
                        notice.play(data);
                        return;
                    }
                    if (typeof(ws.callback[act]) == 'function') ws.callback[act](data);
                } catch(ev) {
                    console.warn(ev);
                }
            };
            ws.link.onclose = function() {
                console.info('Websocket 已断开!');
                if (ws.link != this) return;
                if (typeof(close_func) == 'function') close_func();
                if (ws.link === null) return;
                ws.link = null;
                if (status == 3) {
                    ws.heartbeat.status = 0;
                    return;
                }
                setTimeout(function() {
                        connect_num++;
                        console.warn('系统正在进行第 ' + connect_num + ' 次重连...');
                        ws.connect();
                    },
                    1500);
                status = 2;
                ws.heartbeat.status = 2;
            };
        };
        ws.close = function(func) {
            status = 3;
            ws.heartbeat.status = 0;
            ws.link.close();
            close_func = function() {
                close_func = null;
                ws.link = null;
                connect_num = 0;
                if (typeof(func) == 'function') setTimeout(func, 500);
            }
        };
        ws.heartbeat = {
            ltime: 0,
            status: 0,
            speed: 5,
            num: 0,
            failcount: 0,
            start: function() {
                this.num = 0;
                this.failcount = 0;
                this.ltime = (new Date()).getTime();
                document.getElementById('networkReconnect').style.display = 'none';
                if (this.status == 0) this.jump();
            },
            jump: function() {
                if (this.status == 0) this.status = 1;
                var that = this;
                setTimeout(function() {
                        that.num++;
                        if (that.num >= that.speed) {
                            if ((new Date()).getTime() - that.ltime >= 1500) {
                                that.failcount++;
                                if (that.failcount > 3) {
                                    document.getElementById('networkReconnect').innerText = '您的网络已断开，我们正在尝试重连...';
                                    document.getElementById('networkReconnect').style.display = 'block';
                                    that.status = 2;
                                    status = 2;
                                    if (ws.link != null && status == 1) ws.link.close();
                                }
                                if (ws.link != null && status == 1) ws.link.send('ping');
                            }
                        }
                        if (that.status > 0) that.jump();
                    },
                    1000);
            },
            reply: function() {
                document.getElementById('networkReconnect').style.display = 'none';
                this.ltime = (new Date()).getTime();
                this.num = 0;
                this.failcount = 0;
            }
        };
        setInterval(function() {
                var time = (new Date()).getTime();
                var _codes = [];
                for (var i in codes) {
                    if (time - codes[i].time < 5000) {
                        _codes.push(codes[i]);
                    }
                }
                codes = _codes;
            },
            1000);
    })(ws);
    var Page = {
        code: '',
        shareData: {},
        load: function() {
            var d = JSON.parse('<?php echo json_encode($send_user); ?>');
            <?php if( ! empty( $getuser ) ): ?>
            var target = JSON.parse('<?php echo json_encode($getuser); ?>');
            <?php else: ?>
            var target = {};
            <?php endif; ?>
            var bag = JSON.parse('<?php echo json_encode($bag);?>');
            $('.user-img img').attr('src', d.img);
            $('.user-name').text(d.nickname);
            Page.shareData = {
                title: '房卡礼盒',
                userCard: d.nickname + ' 给你发了一个房卡礼盒',
                link: location.href,
                path: location.href.split('redEnvelope')[0] + 'images/roomcard-box.jpg'
            };
            $('.wrap-bg').addClass('show');
            if (<?php echo ($or); ?> == 1) {console.log(bag);
                $('.wrap-bg').removeClass('show');
                $('.container-hb .user-name-card em').text(d.nickname);
                $('.container-hb .name').text(target.nickname);
                $('.container-hb .user-small-img img').attr('src', target.img);
                $('.container-hb .name-text span').text(bag.number + '张');
                $('.container-hb .card-number-text span').text(bag.number );
                $('.container-hb .time').text(bag.end_time);
                $('.container-hb').show();
            }
            $('#loadings').fadeOut('fast',
                function() {
                    $(this).remove();
                });
        },
        ready: function() { (function ready() {
            if (typeof(Page.shareData.title) == 'string') {
                share(Page.shareData.title, Page.shareData.userCard, Page.shareData.link, Page.shareData.path);
            } else {
                setTimeout(ready, 1000);
            }
        })();
        },
        open: function() {
            var updataimgurl = '/index.php/portal/user/lingqufangka';
            $.ajax({
                type:"post",
                data:{mis:<?php echo ($mis); ?>},
                url:updataimgurl,
                dataType: "json",
                success: function(suc){
                    console.log(suc);
                    if(suc.act=='1'){
                        $('.wrap-bg').removeClass('show');
                        location.reload();
                        $('#send_name').text(suc.msg.sendname);
                        $('#end_time_id').text(suc.msg.end_time);
                        $('#fk_id').text(suc.msg.number);
                        $('.ling-img').removeClass('transf');
                        $('#ropen').css('display','block');


                        //location.href = '/index.php/portal/user/fangka_houxu/mis/'+suc.msg;
                    }else{
                        location.reload();
                    }
                }
            });
        },
        cancel: function() {
            ajax('home/user/cancelGift', {
                    'code': Page.code
                },
                function(d) {
                    $.alert(d.info);
                    location.href = 'createGift.html';
                },
                2);
        },
        phoneMask: function() {
            var code = '<div class="phone-number-box">';
            code += '<div class="phone-number">';
            code += '<div class="phone-number-content">';
            code += '<div class="tips-text">为了您的房卡安全，请进行短信验证!</div>';
            code += '<div class="phone"><input class="mobile" type="text" maxlength="11" placeholder="请输入您的电话号码"></div>';
            code += '<div class="phone-code">';
            code += '<input class="mobile-code" type="text" placeholder="输入验证码">';
            code += '<div class="phone-btn" onclick="Page.phoneCode()">';
            code += '</div>';
            code += '</div>';
            code += '</div>';
            code += '<button class="phone-sure" onclick="Page.phoneNumberCode()">绑定手机</button>';
            code += '</div>';
            code += '</div>';
            $(code).appendTo('body');
        },
        phoneCode: function() {
            var mobile = $('.phone-number-box .mobile').val();
            if (!mobile) {
                $.alert('请输入手机号码');
            } else if (mobile.length != 11) {
                $.alert('请输入正确的手机号码');
            } else if (mobile.length == 11) {
                ajax('home/User/sendMessage', {
                        'mobile': mobile
                    },
                    function(d) {
                        if (d.status == 0 || !d.status) {
                            $.alert(d.info);
                        } else if (d.status == 1) {
                            var code = '<div class="phone-btn2">';
                            code += '       重新发送(<span>60</span>s)';
                            code += '    </div>';
                            $(code).appendTo('.phone-number-box .phone-code');
                            var times = 60;
                            var phoneTime = setInterval(function() {
                                    times--;
                                    if (times <= 0) {
                                        $('.phone-number-box .phone-btn2').remove();
                                        clearInterval(phoneTime);
                                    } else {
                                        $('.phone-number-box .phone-btn2 span').html(times);
                                    }
                                },
                                1000);
                        } else {
                            $.alert('错误操作');
                        }
                    })
            }
        },
        phoneNumberCode: function() {
            var mobile = $('.phone-number-box .mobile').val();
            var mobileCode = $('.phone-number-box .mobile-code').val();
            if (!mobile) {
                $.alert('请输入手机号码');
            } else if (mobile.length != 11) {
                $.alert('请输入正确的手机号码');
            } else if (!mobileCode) {
                $.alert('请输入验证码');
            } else {
                ajax('home/User/registMobile', {
                        'mobile': mobile,
                        'code': mobileCode
                    },
                    function(d) {
                        if (d.status == 1) {
                            $.alert(d.info);
                            $('.phone-number-box').remove();
                        } else if (d.status == 0 || !d.status) {
                            $.alert(d.info);
                        }
                    })
            }
        },
    };
    $(document.body).on('touchmove',
        function(evt) {
            evt.preventDefault();
        });
    var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?80efa2441f82216a74a64ac0e941a394";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();

    const DOMAIN = 'www.aloal.cn';
    const API_DOMAIN = 'shouquandatingapi.lfzgame.com';
    const WS_DOMAIN = 'shouquandatingws.lfzgame.com';
    const JUMP_DOMAIN = 'www.aloal.cn';
    const USE_QRCODE = 0;
    const IS_SSL = true;
    win.version = '2.0.0';
    win.sign = 'shouquandating';
    win.token = '3lbz2qiUN2v14OtrVRYUNVovlmrHd5VThrkOyrRE';
    notice.data = '';
    var user = {
        "id": "533013",
        "wechat_id": "18",
        "nickname": "follow my heart",
        "sex": "1",
        "citys": "Chongqing,Shapingba",
        "path": "https:\/\/wx.qlogo.cn\/mmopen\/vi_32\/Q0j4TwGTfTJHzbaiaTPaeJTBydDFLrvegsDfZx6yG5icnLSOYRxiaw4oZSKz2JpGKJJDRPzkpKlhKWXnzGAibUibkUg\/64",
        "room_cards": "97"
    };
    window.onload = function() {
        win.load();
    }
    wx.config({
        appId: 'wxed4e97d70ed402cc',
        // 必填，公众号的唯一标识
        timestamp: '1512041384',
        // 必填，生成签名的时间戳
        nonceStr: 'l3Epx0MpUdNzAuTK',
        // 必填，生成签名的随机串
        signature: 'a12d21679fbf47d8df14e7b67c09e38adc9db758',
        // 必填，签名，见附录1
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'onMenuShareQZone', 'getLocation', 'hideOptionMenu']
    });
    wx.ready(function() {
        if (win.readed == 1) return;
        win.readed = 1;
        win.ready();
    });
    wx.error(function(res) {
        //$.alert('微信API获取失败！');
    });
</script>
</body>
</html>