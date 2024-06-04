<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <title></title>
  <link rel="icon prefetch" id="favicon-icon" href="/checkout/v2/images/favicon_de.png" type="image/png" sizes="16x16" />
  <meta charset="utf-8" />
  <meta name="description" content="Fur Sweep Collar" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta http-equiv="content-language" content="en-us" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="HandheldFriendly" content="true" />
  <meta property="og:title" content="Fur Sweep Collar" />
  <meta property="og:description" content="Fur Sweep Collar" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:image" content="/offer/1/app/desktop/images/thumb.png" />
  <meta name="color-scheme" content="light only" />
  <link href="https://cdn.jsdelivr.net/npm/flag-icon-css@4.1.7/css/flag-icons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/example1/colorbox.min.css" rel="stylesheet" />
  <!-- <script src="https://checkout-demo.airwallex.com/assets/elements.bundle.min.js"></script> -->
  <script src="https://checkout.airwallex.com/assets/elements.bundle.min.js"></script>
  <style>
    @media only screen and (max-width: 600px) {}

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: 700;
    }

    #i71q {
      position: fixed;
      top: 0;
      z-index: 20;
    }

    #swiper1 {
      width: 100%;
      /* height: auto; */
    }

    #swiper2 {
      width: 100%;
      height: 1305px;
    }

    .swiper-slide {
      padding: 0 10px;
    }

    .mb1 {
      margin-bottom: 1px;
    }

    .cardimage {
      text-align: start;
      width: 100%;
      padding: 10px 15px;
      border-bottom: 1px solid #f7f3f3;
    }

    #comment-img2 {
      width: 100%;
    }

    .cardtext {
      width: 100%;
      /* height: 140px; */
      /* padding: 0 15px; */
      margin: 6px 0;
      overflow-y: auto;
      font-size: 13px;
      color: #444444;
    }

    #seeFaqBtn {
      padding: 20px 20px 20px 0;
      font-size: 17px;
      font-weight: bold;
      color: #444444
    }

    #seeFaqBtn span {
      cursor: pointer;
      text-decoration: underline;
    }

    /* 初始状态下隐藏内容 */
    #collapseContent {
      display: none;
      /* background-color: rgb(213, 218, 203); */
    }

    #faq-question {
      width: 100%;
      text-decoration: none;
    }

    .panel-group {
      margin-bottom: 20px;
    }

    .panel {
      margin-bottom: 20px;
      background-color: #fff;
      border: 1px solid transparent;
      border-radius: 4px;
      -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    }

    .panel-group .panel {
      margin-bottom: 0;
      border-radius: 4px;
    }

    .panel-default {
      border-color: #ddd;
    }

    .panel-default>.panel-heading {
      color: var(--text-color);
      font-weight: 500;
      background-color: #F0F5FF;
      border-color: #ddd;
    }

    .panel-group .panel-heading {
      border-bottom: 0;
    }

    .panel-heading {
      padding: 10px 15px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 3px;
      border-top-right-radius: 3px;
    }

    .panel-default>.panel-heading+.panel-collapse>.panel-body {
      font-size: 13px;
      border-top-color: #ddd;
      color: var(--text-color);
    }

    .panel-group .panel-heading+.panel-collapse>.list-group,
    .panel-group .panel-heading+.panel-collapse>.panel-body {
      border-top: 1px solid #ddd;
    }

    .panel-body {
      padding: 15px;
      background-color: #F4F4F4;
    }
  </style>
  <style>
    .section {
      box-sizing: border-box;
    }

    .i1takkh {
      margin-left: 10px;
      text-align: center;
      display: inline-block;
      text-decoration-line: none;
      text-decoration-thickness: initial;
      text-decoration-style: initial;
      text-decoration-color: initial;
      font-size: 16px;
      color: rgb(255, 255, 255);
      box-shadow: rgba(0, 0, 0, 0.35) 0px 2px 4px 0px;
      border-bottom-width: 4px;
      border-bottom-style: none;
      border-bottom-color: rgb(2, 131, 50);
      padding-top: 10px;
      padding-right: 10px;
      padding-bottom: 10px;
      padding-left: 10px;
      font-weight: 700;
      background-image: -webkit-linear-gradient(180deg,
          rgb(62, 186, 235) 0%,
          rgb(66, 187, 217) 16.129%,
          rgb(69, 188, 206) 34.2742%,
          rgb(69, 191, 180) 75%,
          rgb(69, 191, 180) 100%);
      background-repeat-x: repeat;
      background-repeat-y: repeat;
      background-position-x: 0px;
      background-position-y: 0px;
      background-attachment: scroll;
      background-size: 100%;
      font-family: var(--text-family);
    }

    .main {
      display: flex;
      justify-content: space-around;
      align-items: center;
    }

    .three-points {
      display: flex;
      flex-direction: column;
      padding-top: 34px;
      padding-bottom: 34px;
      justify-content: space-around;
      -webkit-box-align: center;
      align-items: center;
    }

    .three-points-image {
      width: 60px;
      height: 60px;
      max-width: none;
    }

    .three-points-text {
      color: rgb(0, 48, 87);
      font-size: 16px;
      line-height: 20px;
      text-align: center;
    }

    .wrapper {
      display: flex;
      flex-direction: column;
    }

    .container-product {
      text-align: center;
      margin-top: 0px;
      margin-right: auto;
      margin-bottom: 22px;
      margin-left: auto;
      max-width: 75%;
    }

    .container_title {
      font-size: 17px;
      margin-top: 20px;
      color: #444444;
      text-align: center;
      font-weight: bold;
      font-family: var(--text-family);
    }

    .three_main {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 20px;
      margin-left: 0px;
    }

    .three_con {
      flex-grow: 1;
      flex-shrink: 1;
      flex-basis: 0%;
    }

    .three_title {
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 20px;
      margin-left: 0px;
      letter-spacing: -0.3px;
      font-size: 22px;
      line-height: 33px;
    }

    .three_text {
      font-size: 16px;
      color: rgb(0, 0, 0);
      line-height: 23px;
      font-family: var(--text-family);
    }

    .three_img {
      flex-grow: 1;
      flex-shrink: 1;
      flex-basis: 0%;
    }

    .three_img img {
      max-width: 80%;
    }

    /* .icon_icon__ECGRl {
      padding-bottom: 2px;
    } */

    .grade-top {
      display: flex;
      align-items: center;
    }

    .grade-text {
      margin-right: 6px;
    }

    .grade-text2 {
      margin-left: 6px;
      margin-top: 4px;
    }

    .grade-text3 {
      font-weight: 400;
    }

    .speak {
      display: flex;
      justify-content: space-between;
    }

    .speak_l {
      display: flex;
      flex-direction: column;
    }

    .border_b {
      width: 1.5em;
      height: 1.5em;
      border: 1px solid #696a6a;
      border-radius: 4px;
    }

    .left_text {
      font-weight: 400;
      margin-left: 8px;
    }

    .stars_n {
      display: flex;
    }

    .stars_l {
      display: flex;
      margin-top: 12px;
    }

    .r--title-average {
      color: rgb(51, 51, 51);
      font-size: 1.0833em;
      width: 100%;
      display: inline-block;
      line-height: 1.16;
      text-align: center;
    }

    .r--stars_average {
      line-height: 1.32;
      font-size: 3em;
      color: rgb(51, 51, 51);
      font-weight: 700;
      text-align: center;
    }

    .speak_r {
      flex-grow: 1;
      flex-shrink: 1;
      flex-basis: 0%;
      display: flex;
    }

    .itnysh {
      flex-grow: 1;
      flex-shrink: 0;
      flex-basis: 0px;
      display: flex;
      flex-direction: column;
      align-items: stretch;
      padding-top: 5px;
      padding-right: 0px;
      padding-bottom: 5px;
      padding-left: 0px;
      margin-top: 0px;
      margin-right: 10px;
      margin-bottom: 0px;
      margin-left: 10px;
    }

    .iakor7 {
      background-color: rgb(245, 245, 245);
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
      border-bottom-left-radius: 4px;
      box-shadow: rgba(0, 0, 0, 0.21) 0px 1px 3px 0px inset;
      min-height: 12px;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 25px;
      margin-left: 0px;
    }

    .islybo {
      background-color: rgb(245, 245, 245);
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
      border-bottom-left-radius: 4px;
      box-shadow: rgba(0, 0, 0, 0.21) 0px 1px 3px 0px inset;
      min-height: 12px;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 25px;
      margin-left: 0px;
    }

    .ig637l {
      max-width: 86.2%;
      min-height: 12px;
      border-top-left-radius: 4px;
      border-top-right-radius: 0px;
      border-bottom-right-radius: 0px;
      border-bottom-left-radius: 4px;
      line-height: 1.467em;
      background-color: rgb(253, 188, 0);
    }

    .bg-green {
      background-color: rgb(7, 238, 65) !important;
    }

    .bg-blue {
      background-color: #d8e4fa !important;
    }

    .i55eho {
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
      border-bottom-left-radius: 4px;
      box-shadow: rgba(0, 0, 0, 0.21) 0px 1px 3px 0px inset;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 25px;
      margin-left: 0px;
      background-color: rgb(245, 245, 245);
      min-height: 12px;
    }

    .islybo {
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
      border-bottom-left-radius: 4px;
      box-shadow: rgba(0, 0, 0, 0.21) 0px 1px 3px 0px inset;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 25px;
      margin-left: 0px;
      background-color: rgb(245, 245, 245);
      min-height: 12px;
    }

    .i9r4tj {
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
      border-bottom-left-radius: 4px;
      box-shadow: rgba(0, 0, 0, 0.21) 0px 1px 3px 0px inset;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 25px;
      margin-left: 0px;
      background-color: rgb(245, 245, 245);
      min-height: 12px;
    }

    .i20q32 {
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
      border-bottom-left-radius: 4px;
      box-shadow: rgba(0, 0, 0, 0.21) 0px 1px 3px 0px inset;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 25px;
      margin-left: 0px;
      background-color: rgb(245, 245, 245);
      min-height: 12px;
    }

    .icdfoq {
      max-width: 13.8%;
      min-height: 12px;
      border-top-left-radius: 4px;
      border-top-right-radius: 0px;
      border-bottom-right-radius: 0px;
      border-bottom-left-radius: 4px;
      line-height: 1.467px;
      background-color: rgb(253, 188, 0);
    }

    .i9r4tj {
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
      margin-left: 0px;
    }

    .i10l46 {
      display: flex;
      flex-direction: column;
    }

    .count-percent {
      border-top-left-radius: 3px;
      border-top-right-radius: 3px;
      border-bottom-right-radius: 3px;
      border-bottom-left-radius: 3px;
      border-top-width: 1px;
      border-right-width: 1px;
      border-bottom-width: 1px;
      border-left-width: 1px;
      border-top-style: solid;
      border-right-style: solid;
      border-bottom-style: solid;
      border-left-style: solid;
      border-top-color: rgb(226, 226, 226);
      border-right-color: rgb(226, 226, 226);
      border-bottom-color: rgb(226, 226, 226);
      border-left-color: rgb(226, 226, 226);
      border-image-source: initial;
      border-image-slice: initial;
      border-image-width: initial;
      border-image-outset: initial;
      border-image-repeat: initial;
      display: inline-block;
      padding-top: 2px;
      padding-right: 0px;
      padding-bottom: 2px;
      padding-left: 0px;
      line-height: 1;
      font-weight: 700;
      width: 3.5em;
      text-align: center;
      white-space-collapse: collapse;
      text-wrap: nowrap;
      margin-bottom: 16px;
    }

    .ixjwih {
      display: block;
      color: rgb(255, 255, 255);
      text-decoration-line: none;
      text-decoration-thickness: initial;
      text-decoration-style: initial;
      text-decoration-color: initial;
      max-width: 600px;
      margin-top: 40px;
      margin-right: auto;
      margin-bottom: 40px;
      margin-left: auto;
    }

    .i6csw4 {
      text-align: center;
      padding-top: 18px;
      padding-right: 5px;
      padding-bottom: 18px;
      padding-left: 15px;
      font-size: 18px;
      font-family: var(--text-family);
      font-weight: 700;
      line-height: 28px;
      letter-spacing: 0.42px;
      background-image: -webkit-linear-gradient(180deg,
          rgb(62, 186, 235) 0%,
          rgb(66, 187, 217) 19.7581%,
          rgb(69, 188, 206) 36.2903%,
          rgb(69, 191, 180) 81.4516%,
          rgb(69, 191, 180) 100%);
      background-repeat-x: repeat;
      background-repeat-y: repeat;
      background-position-x: 0px;
      background-position-y: 0px;
      background-attachment: scroll;
      background-size: 100%;
      box-shadow: rgba(0, 0, 0, 0.24) -2px 6px 16px 0px;
    }

    .content_speak {
      display: flex;
      padding-top: 30px;
      padding-right: 0px;
      padding-bottom: 30px;
      padding-left: 0px;
    }

    .cont_left {
      width: 23%;
      display: flex;
    }

    .con_autor {
      width: 35px;
      height: 35px;
      background-image: initial;
      background-position-x: initial;
      background-position-y: initial;
      background-size: initial;
      background-repeat-x: initial;
      background-repeat-y: initial;
      background-attachment: initial;
      background-origin: initial;
      background-clip: initial;
      background-color: rgb(46, 162, 219);
      color: rgb(255, 255, 255);
      border-top-left-radius: 50%;
      border-top-right-radius: 50%;
      border-bottom-right-radius: 50%;
      border-bottom-left-radius: 50%;
      text-align: center;
      text-transform: uppercase;
      font-weight: normal;
      line-height: 35px;
      margin-right: 9px;
    }

    .r--text-limit {
      font-size: 12px;
      color: rgb(60, 60, 60);
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
      margin-left: 0px;
    }

    .country {
      max-width: 16px;
      margin: 0 6px 2px 6px;
    }

    .cont_right {
      width: 77%;
      border-bottom-width: 1px;
      border-bottom-style: solid;
      border-bottom-color: rgb(242, 242, 242);
      padding-bottom: 20px;
    }

    .r--title-review {
      font-weight: 700;
      font-size: 13px;
    }

    .inam9w {
      bottom: 0px;
      width: 100%;
      top: inherit;
      background-color: rgba(0, 0, 0, 0.8);
      padding-top: 8px;
      padding-right: 0px;
      padding-bottom: 8px;
      padding-left: 0px;
      display: none;
      position: fixed;
      z-index: 10;
      text-align: center;
    }

    .iv2aey {
      display: block;
      max-width: 85%;
      position: static;
      margin-top: 0px;
      margin-right: auto;
      margin-bottom: 0px;
      margin-left: auto;
      border-top-left-radius: 7px;
      border-top-right-radius: 7px;
      border-bottom-right-radius: 7px;
      border-bottom-left-radius: 7px;
      color: rgb(255, 255, 255);
      text-decoration-line: none;
      text-decoration-thickness: initial;
      text-decoration-style: initial;
      text-decoration-color: initial;
    }

    .iiu39j {
      text-align: center;
      padding-top: 18px;
      padding-right: 15px;
      padding-bottom: 18px;
      padding-left: 15px;
      font-size: 18px;
      font-weight: 700;
      line-height: 28px;
      background-image: -webkit-linear-gradient(180deg,
          rgb(62, 186, 235) 0%,
          rgb(66, 187, 217) 19.7581%,
          rgb(69, 188, 206) 36.2903%,
          rgb(69, 191, 180) 81.4516%,
          rgb(69, 191, 180) 100%);
      background-repeat-x: repeat;
      background-repeat-y: repeat;
      background-position-x: 0px;
      background-position-y: 0px;
      background-attachment: scroll;
      background-size: 100%;
      box-shadow: rgba(0, 0, 0, 0.24) -2px 6px 16px 0px;
      border-top-left-radius: 7px;
      border-top-right-radius: 7px;
      border-bottom-right-radius: 7px;
      border-bottom-left-radius: 7px;
      font-family: var(--text-family);
      letter-spacing: normal;
      color: rgb(255, 255, 255);
    }

    .footer-box {
      background-color: #F5F5F5;
      padding: 60px 30px 60px 30px;
      /* margin-top: 30px; */
      margin-right: 0px;
      margin-left: 0px;
      text-align: center;
      color: #333;
      font-size: 12px;
    }

    .footer-box a {
      text-decoration-line: none;
      text-decoration-thickness: initial;
      text-decoration-style: initial;
      text-decoration-color: initial;
      color: rgb(0, 48, 87);
      margin-right: 10px;
      cursor: pointer;
    }

    #i71q {
      display: none;
    }

    #iu8zsl {
      letter-spacing: -0.3px;
    }

    #inr3q {
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
      margin-left: 12px;
    }

    #i2uiej #ica65 {
      letter-spacing: -0.3px;
    }

    .comment-card {
      margin-bottom: 20px;
      border: 1px solid rgba(221, 221, 216, 0.5);
      padding: 16px;
      border-radius: 4px;
      cursor: pointer;
    }

    /* 预览图 */
    .preview-img {
      display: none;
      text-align: center;
      width: 100%;
      height: 100%;
      position: fixed;
      left: 0;
      top: 0;
      z-index: 100;
      background: url('../images/fancybox_overlay.png');
    }

    /* 容器 */
    .preview-img .container {
      max-width: 90%;
      position: absolute;
      padding: 15px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }

    /* 大图显示 */
    .preview-img .container img {
      max-width: 100%;
      background-size: contain/cover;
    }

    /* 关闭按钮 */
    .preview-img .container a {
      display: inline-block;
      width: 36px;
      height: 36px;
      text-decoration: none;
      position: absolute;
      right: -18px;
      top: -18px;
      background: url('../images/fancybox_sprite.png') no-repeat;
    }

    @media (max-width: 768px) {
      .three_main {
        flex-direction: column;
      }

      /* .speak {
          flex-direction: column;
        } */
      .content_speak {
        flex-direction: column;
      }

      .iadfoy {
        flex-direction: column;
      }

      .igv912 {
        display: none;
      }

      .inam9w {
        display: block;
      }

      /* .speak_r {
          margin-top: 10px;
          margin-right: 0px;
          margin-bottom: 10px;
          margin-left: 0px;
        } */
      .three_img img {
        max-width: 100%;
      }

      .cont_left {
        width: 100%;
      }

      .cont_right {
        width: 100%;
      }

      .mb-order-1 {
        order: 1;
      }

      .average-star-image {
        text-align: center;
      }
    }

    @media (max-width: 480px) {
      #iwni3 {
        width: 100px;
      }

      #i71q {
        display: none;
      }

      /* .faq-content {
        padding: 0 15px;
      } */

      .footer-box {
        padding: 20px 30px 20px 30px;
        /* margin-bottom: 30px; */
      }

      .br {
        display: none;
      }

      .ajax {
        display: inline-block;
        margin-bottom: 10px;
      }

      .i1takkh {
        font-size: 12px;
      }

      #ilvo {
        margin-top: 7px;
      }
    }
  </style>
  <style>
    /* #gallery img {
      height: 460px;
      object-fit: contain;
    } */

    #thumbs {
      height: 150px;
    }

    #thumbs .swiper-slide {
      height: 150px;
    }

    #thumbs img {
      height: 150px;
      object-fit: contain;
    }

    .slider-banner-image {
      height: 460px !important;
      position: relative;
    }

    #thumbs img {
      opacity: 0.4;
    }

    .my-slide-thumb-active img {
      opacity: 1 !important;
    }

    @media (max-width: 780px) {
      .grid-container {
        display: none !important;
      }

      .sku-preview-img img {
        width: 80%;
      }

      .banner-content {
        display: block !important;
      }

      .prd-det-disc {
        display: block !important;
        height: 80px;
        opacity: 0;
      }

      .dialog-box {
        width: 95%;
      }

      .left-sec {
        height: auto !important;
      }

      /* 
      #gallery img {
        height: 320px;
        object-fit: contain;
      } */

      #thumbs {
        height: 80px;
      }

      #thumbs .swiper-slide {
        height: 80px;
      }

      #thumbs img {
        height: 80px;
        object-fit: contain;
      }

      .slider-banner-image {
        height: 400px !important;
        position: relative;
      }

      .chk-header {
        display: none;
      }
    }

    .flex-center {
      display: inline-flex;
      flex-flow: row nowrap;
      align-items: center;
      justify-content: center;
    }

    #loading {
      display: none;
    }

    .box {
      display: inline-block;
      font-size: 30px;
      color: rgb(102, 101, 109);
      padding: 1em;
      margin-bottom: 30px;
      vertical-align: top;
      -webkit-transition: .3s color, .3s border;
      transition: .3s color, .3s border;
      text-align: center;
    }

    [class*="loader-"] {
      display: inline-block;
      width: 1em;
      height: 1em;
      color: inherit;
      vertical-align: middle;
      pointer-events: none;
    }

    .loader-01 {
      border: .2em dotted currentcolor;
      border-radius: 50%;
      -webkit-animation: 1s loader-01 linear infinite;
      animation: 1s loader-01 linear infinite;
    }

    @-webkit-keyframes loader-01 {
      0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @keyframes loader-01 {
      0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
  </style>
  <style>
    .input-box {
      width: 100%;
      /* font-family: var(--); */
      /* height: 32px !important; */
    }

    .input-box label {
      width: 100%;
      position: relative;
      margin-bottom: 20px;
    }

    .input-box .input-item {
      width: 100%;
      padding: 20px 05px 05px 10px;
      outline: 0;
      border: 1px solid rgba(105, 105, 105, 0.397);
      border-radius: 10px;
    }

    .input-box .input-item+span {
      position: absolute;
      left: 10px;
      top: 15.5px;
      font-size: 14px;
      cursor: text;
      transition: 0.3s ease;
    }

    /* .input-box .input-item:placeholder-shown+span {
      top: 15.5px;
      font-size: 14px;
    } */

    .input-focus {
      top: 0 !important;
      font-size: 14px;
    }

    .input-box .input-item:focus+span {
      color: #00bfff;
      top: 0px;
      font-size: 0.7em;
      font-weight: 600;
    }

    .paypal-button.paypal-button-color-gold,
    .paypal-button-row.paypal-button-color-gold .menu-button {
      background: rgb(23, 115, 176) !important;
    }

    .sku-info {
      width: 100%;
      font-family: var(--text-family);
    }

    .sku-info>.sku-item-info {
      /* border-bottom: 1px solid #e0e0e0; */
      margin-top: 10px;
    }

    .sku-item-info {
      display: flex;
      width: 100%;
      justify-content: space-between;
      align-items: center;
    }

    .sku-item-title {
      font-size: 14px;
      font-weight: normal;
    }

    .sku-content {
      width: 100%;
      padding-left: 14px;
    }

    .sku-item-text {
      font-size: 12px;
      font-weight: normal;
      color: #666666;
    }

    .sku-price {
      font-size: 13px;
      color: red;
      font-weight: normal;
    }

    .buy-relative {
      position: relative;
    }

    .buy-box {
      display: inline-block;
      font-size: 30px;
      color: rgb(102, 101, 109);
      padding: 1em;
      vertical-align: top;
      -webkit-transition: .3s color, .3s border;
      transition: .3s color, .3s border;
      text-align: center;
    }

    #cb-buy-each2 {
      color: red;
    }

    .size-chart-img {
      width: 100%;
      height: 100%;
      /* background-color: #f5f5f5; */
      /* opacity: 0.3; */
      position: fixed;
      top: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background: rgba(0, 0, 0, 0.6);
      z-index: 9999;
    }

    .size-chart-img img {
      max-height: 60%;
      max-width: 100%;
    }

    /* .sku-preview-img img {
      width: 300px;
    } */
    .size-chart-img-box {
      display: none;
    }

    .sku-preview-img {
      width: 100%;
      height: 100%;
      /* background-color: #f5f5f5; */
      /* opacity: 0.3; */
      position: fixed;
      top: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .sku-preview-img img {
      width: 300px;
    }

    .sku-preview-img-box {
      display: none;
    }

    .swiper-slide {
      padding: 0 !important;
    }

    .cb-reg-price {
      font-size: 14px;
    }

    .font-weight-bold {
      color: red
    }

    .p-off {
      font-size: 13px;
      color: red
    }

    .input-span {
      color: var(--text-color);
    }

    .text-Schritt-top {
      font-size: 13px;
      margin: 10px 0 8px 0;
      float: left;
      color: #444444
    }

    .Schritt-top-box {
      width: 100%;
      padding: 10px 0;
    }

    .button-top {
      float: left;
      margin-top: 10px;
      margin-left: 50%;
      transform: translateX(-50%);
      text-align: center;
      font-weight: bold;
      color: var(--text-color);
    }

    .flag-icon-size {
      font-size: 10px;
    }

    .email-warn {
      color: red;
      font-size: 13px;
      margin-left: 8px;
    }

    .pay-button {
      display: none;
      text-align: center;
      margin-top: 12px;
      width: 100%;
      height: 48px;
      background: #000 url('/checkout/v2/images/googlePay.png') no-repeat 100%/contain;
      background-position: center;
      border-radius: 4px;
    }

    .appalpay-button {
      display: none;
      text-align: center;
      margin-top: 12px;
      width: 100%;
      height: 48px;
      background: #000 url('/checkout/v2/images/applePay.png') no-repeat 100%/contain;
      background-position: center;
      border-radius: 4px;
    }

    .button-opacity {
      opacity: 0.5;
    }

    /* .choose-billing-box {
      margin: 5px;
      font-size: 13px;
      font-family: var(--text-family);
      color: var(--text-color);
    } */
  </style>
</head>

<body>
  <page-builder-block>
    <!-- Start VWO SmartCode -->
    <script src="/checkout/v2/js/51174.js"></script>
    <!-- End VWO SmartCode -->
    <link rel="stylesheet prefetch" href="/checkout/v2/css/app2.css?v=4" />
    <link type="text/css" href="/checkout/v2/css/custom-extra.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.0.4/css/swiper.css" />
    <link type="text/css" href="/checkout/v2/css/repeated-order-confirmation.min.css" rel="stylesheet" />
    <link type="text/css" href="/checkout/v2/css/repeated-order-confirmation-additional.css" rel="stylesheet" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/checkout.css?v=7" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/bootstrap.min.css" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/slick.min.css" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/upsell-new-02.css?v=3" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/extra-style.css" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/fonts.css" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/custom.css" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/bottom-popup.css" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/new_addon.css" />
    <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/all.min.css" />
    <span id="builderCssToken"> </span>
  </page-builder-block>
  <!-- Data Layer -->
  <script>
    var customerId, reload, exclude
    customerId = undefined
    reload = false
    exclude = false

    window.dataLayer = window.dataLayer || []
    window.dataLayer.push({
      event: 'pageView',
      offer: 'Fur Sweep Collar',
      ua_property: 'UA-156182996-147', //insert UA Property ID here
      customer_id: customerId, // add customer ID or undefined
      page: {
        type: 'Checkout',
        isReload: reload, //boolean
        isExclude: exclude, //boolean
      },
      experiment: {
        id: undefined, //currently undefined as a placeholder
        name: undefined, //currently undefined as a placeholder
        variation: undefined, //currently undefined as a placeholder
      },
    })
  </script>
  <!-- Data Layer -->
  <script>
    var campaigns = {
      1: {
        id: 1,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37609","product_price":"39.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Fur Sweep Collar"}]',
      },
      3: {
        id: 3,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37609","product_price":"39.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Fur Sweep Collar"}]',
      },
      5: {
        id: 5,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37609","product_price":"39.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Fur Sweep Collar"}]',
      },
      7: {
        id: 7,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37609","product_price":"39.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Fur Sweep Collar"}]',
      },
      9: {
        id: 9,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37610","product_price":"75.99","retail_price":"159.96","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Fur Sweep Collars"}]',
      },
      11: {
        id: 11,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37610","product_price":"75.99","retail_price":"159.96","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Fur Sweep Collars"}]',
      },
      13: {
        id: 13,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37610","product_price":"75.99","retail_price":"159.96","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Fur Sweep Collars"}]',
      },
      15: {
        id: 15,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37610","product_price":"75.99","retail_price":"159.96","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Fur Sweep Collars"}]',
      },
      17: {
        id: 17,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37611","product_price":"107.98","retail_price":"239.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Fur Sweep Collars"}]',
      },
      19: {
        id: 19,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37611","product_price":"107.98","retail_price":"239.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Fur Sweep Collars"}]',
      },
      21: {
        id: 21,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37611","product_price":"107.98","retail_price":"239.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Fur Sweep Collars"}]',
      },
      23: {
        id: 23,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37611","product_price":"107.98","retail_price":"239.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Fur Sweep Collars"}]',
      },
      25: {
        id: 25,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37612","product_price":"135.97","retail_price":"319.92","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Fur Sweep Collars"}]',
      },
      27: {
        id: 27,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37612","product_price":"135.97","retail_price":"319.92","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Fur Sweep Collars"}]',
      },
      29: {
        id: 29,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37612","product_price":"135.97","retail_price":"319.92","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Fur Sweep Collars"}]',
      },
      31: {
        id: 31,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37612","product_price":"135.97","retail_price":"319.92","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Fur Sweep Collars"}]',
      },
      33: {
        id: 33,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37613","product_price":"159.96","retail_price":"399.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Fur Sweep Collars"}]',
      },
      35: {
        id: 35,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37613","product_price":"159.96","retail_price":"399.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Fur Sweep Collars"}]',
      },
      37: {
        id: 37,
        shipping_price: '9.95',
        product_array: '[{"product_id":"37613","product_price":"159.96","retail_price":"399.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Fur Sweep Collars"}]',
      },
      39: {
        id: 39,
        shipping_price: '14.95',
        product_array: '[{"product_id":"37613","product_price":"159.96","retail_price":"399.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Fur Sweep Collars"}]',
      },
      41: {
        id: 41,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37614","product_price":"0.00","retail_price":"0.00","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Fur Sweep Collar - 1-Year Extended Warranty"}]',
      },
      43: {
        id: 43,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37614","product_price":"0.00","retail_price":"0.00","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Fur Sweep Collar - 1-Year Extended Warranty"}]',
      },
      45: {
        id: 45,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37614","product_price":"0.00","retail_price":"0.00","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Fur Sweep Collar - 1-Year Extended Warranty"}]',
      },
      47: {
        id: 47,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37614","product_price":"0.00","retail_price":"0.00","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Fur Sweep Collar - 1-Year Extended Warranty"}]',
      },
      49: {
        id: 49,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37615","product_price":"24.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Special 1x EXTRA Fur Sweep Collar"}]',
      },
      51: {
        id: 51,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37615","product_price":"24.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Special 1x EXTRA Fur Sweep Collar"}]',
      },
      53: {
        id: 53,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37615","product_price":"24.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Special 1x EXTRA Fur Sweep Collar"}]',
      },
      55: {
        id: 55,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37615","product_price":"24.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Special 1x EXTRA Fur Sweep Collar"}]',
      },
      57: {
        id: 57,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37616","product_price":"19.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Special 1x EXTRA Fur Sweep Collar"}]',
      },
      59: {
        id: 59,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37616","product_price":"19.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Special 1x EXTRA Fur Sweep Collar"}]',
      },
      61: {
        id: 61,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37616","product_price":"19.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Special 1x EXTRA Fur Sweep Collar"}]',
      },
      63: {
        id: 63,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37616","product_price":"19.99","retail_price":"79.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Special 1x EXTRA Fur Sweep Collar"}]',
      },
      65: {
        id: 65,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37617","product_price":"29.99","retail_price":"59.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Pet Brush"}]',
      },
      67: {
        id: 67,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37617","product_price":"29.99","retail_price":"59.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Pet Brush"}]',
      },
      69: {
        id: 69,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37617","product_price":"29.99","retail_price":"59.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Pet Brush"}]',
      },
      71: {
        id: 71,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37617","product_price":"29.99","retail_price":"59.98","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Pet Brush"}]',
      },
      73: {
        id: 73,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37618","product_price":"53.98","retail_price":"119.96","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Pet Brushes"}]',
      },
      75: {
        id: 75,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37618","product_price":"53.98","retail_price":"119.96","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Pet Brushes"}]',
      },
      77: {
        id: 77,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37618","product_price":"53.98","retail_price":"119.96","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Pet Brushes"}]',
      },
      79: {
        id: 79,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37618","product_price":"53.98","retail_price":"119.96","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Pet Brushes"}]',
      },
      81: {
        id: 81,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37619","product_price":"71.98","retail_price":"179.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Pet Brushes"}]',
      },
      83: {
        id: 83,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37619","product_price":"71.98","retail_price":"179.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Pet Brushes"}]',
      },
      85: {
        id: 85,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37619","product_price":"71.98","retail_price":"179.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Pet Brushes"}]',
      },
      87: {
        id: 87,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37619","product_price":"71.98","retail_price":"179.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Pet Brushes"}]',
      },
      89: {
        id: 89,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37620","product_price":"83.97","retail_price":"239.92","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Pet Brushes"}]',
      },
      91: {
        id: 91,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37620","product_price":"83.97","retail_price":"239.92","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Pet Brushes"}]',
      },
      93: {
        id: 93,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37620","product_price":"83.97","retail_price":"239.92","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Pet Brushes"}]',
      },
      95: {
        id: 95,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37620","product_price":"83.97","retail_price":"239.92","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Pet Brushes"}]',
      },
      97: {
        id: 97,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37621","product_price":"89.97","retail_price":"299.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Pet Brushes"}]',
      },
      99: {
        id: 99,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37621","product_price":"89.97","retail_price":"299.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Pet Brushes"}]',
      },
      101: {
        id: 101,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37621","product_price":"89.97","retail_price":"299.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Pet Brushes"}]',
      },
      103: {
        id: 103,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37621","product_price":"89.97","retail_price":"299.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Pet Brushes"}]',
      },
      105: {
        id: 105,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37622","product_price":"29.95","retail_price":"59.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Pet Trainer Whistle"}]',
      },
      107: {
        id: 107,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37622","product_price":"29.95","retail_price":"59.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Pet Trainer Whistle"}]',
      },
      109: {
        id: 109,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37622","product_price":"29.95","retail_price":"59.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Pet Trainer Whistle"}]',
      },
      111: {
        id: 111,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37622","product_price":"29.95","retail_price":"59.90","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"1x Pet Trainer Whistle"}]',
      },
      113: {
        id: 113,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37623","product_price":"53.91","retail_price":"119.80","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Pet Trainer Whistles"}]',
      },
      115: {
        id: 115,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37623","product_price":"53.91","retail_price":"119.80","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Pet Trainer Whistles"}]',
      },
      117: {
        id: 117,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37623","product_price":"53.91","retail_price":"119.80","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Pet Trainer Whistles"}]',
      },
      119: {
        id: 119,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37623","product_price":"53.91","retail_price":"119.80","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"2x Pet Trainer Whistles"}]',
      },
      121: {
        id: 121,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37624","product_price":"71.88","retail_price":"179.70","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Pet Trainer Whistles"}]',
      },
      123: {
        id: 123,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37624","product_price":"71.88","retail_price":"179.70","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Pet Trainer Whistles"}]',
      },
      125: {
        id: 125,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37624","product_price":"71.88","retail_price":"179.70","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Pet Trainer Whistles"}]',
      },
      127: {
        id: 127,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37624","product_price":"71.88","retail_price":"179.70","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"3x Pet Trainer Whistles"}]',
      },
      129: {
        id: 129,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37625","product_price":"83.86","retail_price":"239.60","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Pet Trainer Whistles"}]',
      },
      131: {
        id: 131,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37625","product_price":"83.86","retail_price":"239.60","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Pet Trainer Whistles"}]',
      },
      133: {
        id: 133,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37625","product_price":"83.86","retail_price":"239.60","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Pet Trainer Whistles"}]',
      },
      135: {
        id: 135,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37625","product_price":"83.86","retail_price":"239.60","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"4x Pet Trainer Whistles"}]',
      },
      137: {
        id: 137,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37626","product_price":"89.85","retail_price":"299.50","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Pet Trainer Whistles"}]',
      },
      139: {
        id: 139,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37626","product_price":"89.85","retail_price":"299.50","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Pet Trainer Whistles"}]',
      },
      141: {
        id: 141,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37626","product_price":"89.85","retail_price":"299.50","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Pet Trainer Whistles"}]',
      },
      143: {
        id: 143,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37626","product_price":"89.85","retail_price":"299.50","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"5x Pet Trainer Whistles"}]',
      },
      145: {
        id: 145,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37627","product_price":"65.99","retail_price":"239.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Fur Sweep Collar Inventory 3x EXTRA\'s Special"}]',
      },
      147: {
        id: 147,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37627","product_price":"65.99","retail_price":"239.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Fur Sweep Collar Inventory 3x EXTRA\'s Special"}]',
      },
      149: {
        id: 149,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37627","product_price":"65.99","retail_price":"239.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Fur Sweep Collar Inventory 3x EXTRA\'s Special"}]',
      },
      151: {
        id: 151,
        shipping_price: '0.00',
        product_array: '[{"product_id":"37627","product_price":"65.99","retail_price":"239.94","product_quantity":1,"rebill_product_price":0,"product_schedule":"","product_schedule_quantity":"","product_key":"","nmi_plan_id":"","product_name":"Fur Sweep Collar Inventory 3x EXTRA\'s Special"}]',
      },
    }
  </script>
  <!-- BEGIN MVMT EVERFLOW CHECKOUT PAGEVIEW PIXEL -->
  <script type="text/javascript" src="/checkout/v2/js/everflow.js"></script>
  <!-- END MVMT EVERFLOW CHECKOUT PAGEVIEW PIXEL -->
  <div id="">
    <img class="w-100 d-none d-md-block" id="pc-banner" src="" />
    <img class="w-100 d-block d-md-none" id="mobile-banner" src="" />
  </div>
  <div class="topStrip" style="text-align: center;">
    <div class="container-xxl">
      <p style="text-align: center;">
        <span class="cb-total-discount-applied">@lang('checkout::app.v2.During the summer sale the discount is valid for')</span>
        <span id="stopwatch">05:00</span>
      </p>
    </div>
  </div>
  <div class="top_bar_nav">
    <div class="container">
      <div class="dis-box-logo">
        <div class="logo_wrap_dist" style="display: flex;justify-content: center;align-items: center;">
          <img src="" style=" max-height: 35px;" />
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="chk-header">
    <div class="container">
      <ul class="stepsBox">
        <li><span>@lang('checkout::app.v2.Checkout')</span></li>
        <li>@lang('checkout::app.v2.Free Bonus')</li>
        <li>@lang('checkout::app.v2.Receipt')</li>
      </ul>
    </div>
  </div> -->
  <div class="checkout-section">
    <div class="container">
      <p class="prod-name forMob" style="color: #444444 !important;"></p>
      <p class="str-rvw forMob go-rew"><svg width="98px" height="16px" viewBox="0 0 512 96" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <!-- Generator: Sketch 53.2 (72643) - https://sketchapp.com -->
          <g id="Trustpilot_ratings_5star-RGB" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g fill-rule="nonzero">
              <rect id="Rectangle-path" fill="#00B67A" x="0" y="0" width="96" height="96"></rect>
              <rect id="Rectangle-path" fill="#00B67A" x="104" y="0" width="96" height="96"></rect>
              <rect id="Rectangle-path" fill="#00B67A" x="208" y="0" width="96" height="96"></rect>
              <rect id="Rectangle-path" fill="#00B67A" x="312" y="0" width="96" height="96"></rect>
              <rect id="Rectangle-path" fill="#00B67A" x="416" y="0" width="96" height="96"></rect>
              <path d="M48,64.7 L62.6,61 L68.7,79.8 L48,64.7 Z M81.6,40.4 L55.9,40.4 L48,16.2 L40.1,40.4 L14.4,40.4 L35.2,55.4 L27.3,79.6 L48.1,64.6 L60.9,55.4 L81.6,40.4 L81.6,40.4 L81.6,40.4 L81.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
              <path d="M152,64.7 L166.6,61 L172.7,79.8 L152,64.7 Z M185.6,40.4 L159.9,40.4 L152,16.2 L144.1,40.4 L118.4,40.4 L139.2,55.4 L131.3,79.6 L152.1,64.6 L164.9,55.4 L185.6,40.4 L185.6,40.4 L185.6,40.4 L185.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
              <path d="M256,64.7 L270.6,61 L276.7,79.8 L256,64.7 Z M289.6,40.4 L263.9,40.4 L256,16.2 L248.1,40.4 L222.4,40.4 L243.2,55.4 L235.3,79.6 L256.1,64.6 L268.9,55.4 L289.6,40.4 L289.6,40.4 L289.6,40.4 L289.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
              <path d="M360,64.7 L374.6,61 L380.7,79.8 L360,64.7 Z M393.6,40.4 L367.9,40.4 L360,16.2 L352.1,40.4 L326.4,40.4 L347.2,55.4 L339.3,79.6 L360.1,64.6 L372.9,55.4 L393.6,40.4 L393.6,40.4 L393.6,40.4 L393.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
              <path d="M464,64.7 L478.6,61 L484.7,79.8 L464,64.7 Z M497.6,40.4 L471.9,40.4 L464,16.2 L456.1,40.4 L430.4,40.4 L451.2,55.4 L443.3,79.6 L464.1,64.6 L476.9,55.4 L497.6,40.4 L497.6,40.4 L497.6,40.4 L497.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
            </g>
          </g>
        </svg>@lang('checkout::app.v2.12,421 Verified Customer Reviews')</p>
      <div class="left-sec">
        <div id="sticky" style="position:sticky;top: 0;">
          <div style="display: none;" class="vehicle-detail-banner banner-content clearfix">
            <div class="banner-slider">
              <div class="slider-banner-image1">
                <div class="sw-box">
                  <!-- <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="grid-container">
          </div>
        </div>
      </div>
      <div class="right-sec">
        <p class="prod-name hide-mob"></p>
        <p class="str-rvw hide-mob go-rew"><svg width="98px" height="16px" viewBox="0 0 512 96" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <!-- Generator: Sketch 53.2 (72643) - https://sketchapp.com -->
            <g id="Trustpilot_ratings_5star-RGB" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g fill-rule="nonzero">
                <rect id="Rectangle-path" fill="#00B67A" x="0" y="0" width="96" height="96"></rect>
                <rect id="Rectangle-path" fill="#00B67A" x="104" y="0" width="96" height="96"></rect>
                <rect id="Rectangle-path" fill="#00B67A" x="208" y="0" width="96" height="96"></rect>
                <rect id="Rectangle-path" fill="#00B67A" x="312" y="0" width="96" height="96"></rect>
                <rect id="Rectangle-path" fill="#00B67A" x="416" y="0" width="96" height="96"></rect>
                <path d="M48,64.7 L62.6,61 L68.7,79.8 L48,64.7 Z M81.6,40.4 L55.9,40.4 L48,16.2 L40.1,40.4 L14.4,40.4 L35.2,55.4 L27.3,79.6 L48.1,64.6 L60.9,55.4 L81.6,40.4 L81.6,40.4 L81.6,40.4 L81.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
                <path d="M152,64.7 L166.6,61 L172.7,79.8 L152,64.7 Z M185.6,40.4 L159.9,40.4 L152,16.2 L144.1,40.4 L118.4,40.4 L139.2,55.4 L131.3,79.6 L152.1,64.6 L164.9,55.4 L185.6,40.4 L185.6,40.4 L185.6,40.4 L185.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
                <path d="M256,64.7 L270.6,61 L276.7,79.8 L256,64.7 Z M289.6,40.4 L263.9,40.4 L256,16.2 L248.1,40.4 L222.4,40.4 L243.2,55.4 L235.3,79.6 L256.1,64.6 L268.9,55.4 L289.6,40.4 L289.6,40.4 L289.6,40.4 L289.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
                <path d="M360,64.7 L374.6,61 L380.7,79.8 L360,64.7 Z M393.6,40.4 L367.9,40.4 L360,16.2 L352.1,40.4 L326.4,40.4 L347.2,55.4 L339.3,79.6 L360.1,64.6 L372.9,55.4 L393.6,40.4 L393.6,40.4 L393.6,40.4 L393.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
                <path d="M464,64.7 L478.6,61 L484.7,79.8 L464,64.7 Z M497.6,40.4 L471.9,40.4 L464,16.2 L456.1,40.4 L430.4,40.4 L451.2,55.4 L443.3,79.6 L464.1,64.6 L476.9,55.4 L497.6,40.4 L497.6,40.4 L497.6,40.4 L497.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
              </g>
            </g>
          </svg>@lang('checkout::app.v2.12,421 Verified Customer Reviews')</p>
        <p class="bdr-line hide-mob"></p>
        <div class="Schritt-top-box">
          <p class="text-Schritt-top">@lang('checkout::app.v2.You Can See By')</p>
          <img src="" alt="">
        </div>
        <!-- <p class="prd-det-disc">Natural Protection for Your Beloved Dog: Safe, Effective Flea &amp; Tick Prevention</p> -->
        <p class="pkg-hdng">
          <span class="pkg-step">
            @lang('checkout::app.v2.Step')1:
          </span>
          @lang('checkout::app.v2.Choose your package')
          <a style="margin-left:5px;color:#1773B0; font-size:13px" href="javascript:void(0)" id="size-chart" onclick="sizeCharImgPreview()">
            @lang('checkout::app.v2.size chart')
          </a>
        </p>
        <div class="pkg-opt">
          <div class="cb-first-item"></div>
          <div class="buyopt packageClass cb-package-container choose-p" id="product2">
            <div class="buy-opt-left">
              <p>
                <strong id="p-name2"></strong>
                <br />
                <span class="p-off" id="b-off2"></span>
                <span class="cb-discountPercentage"></span>
              </p>
            </div>
            <div class="buy-opt-rgt">
              <p class="pkg-prc">
                <span class="cb-reg-price" id="cb-reg-price2"></span> <br />
                <span class="cb-buy-each font-weight-bold"></span><span class="font-weight-bold" id="cb-buy-each2"></span>
              </p>
            </div>
          </div>
          <div class="buy-select buy-relative" id="buy-select2">

            <div class="buy-loading">
              <div style="position: absolute; top: -5px; left: -10px; width: 110%; height: 110%; z-index: 100000; background:#fff;" id="loading-box" class="flex-center">
                <div class="buy-box">
                  <div class="loader loader-01"></div>
                </div>
              </div>
            </div>

            <div class="buy-se-box">
              <div class="se-box" id="select2-item1">
                <p class="se-title">@lang('checkout::app.v2.item')1</p>
              </div>
            </div>

            <div class="buy-se-box" id="p2-i2">
              <div class="se-box" id="select2-item2">
                <p class="se-title">@lang('checkout::app.v2.item')2</p>
              </div>
            </div>
          </div>

          <div class="buyopt packageClass cb-package-container" id="product1">
            <div class="buy-opt-left">
              <p>
                <strong id="p-name1"></strong>
                <br />
                <span class="p-off" id="b-off1"></span>
                <span class="cb-discountPercentage"></span>
              </p>
            </div>
            <div class="buy-opt-rgt">
              <p class="pkg-prc">
                <span class="cb-reg-price" id="cb-reg-price1"></span> <br />
                <span class="cb-buy-each font-weight-bold"></span><span class="font-weight-bold" id="cb-buy-each1"></span>
              </p>
            </div>
          </div>
          <div class="buy-select buy-relative" id="buy-select1">
            <div class="buy-se-box">

              <div class="buy-loading">
                <div style="position: absolute; top: -5px; left: -10px; width: 110%; height: 120%; z-index: 100000; background:#fff;" id="loading-box" class="flex-center">
                  <div class="buy-box">
                    <div class="loader loader-01"></div>
                  </div>
                </div>
              </div>

              <div class="se-box" id="select1-item1">
                <p class="se-title">@lang('checkout::app.v2.item')1</p>
              </div>
            </div>
          </div>

          <div class="buyopt packageClass cb-package-container" id="product3">
            <div class="buy-opt-left">
              <p>
                <strong id="p-name3"></strong>
                <br />
                <span class="p-off" id="b-off3"></span>
                <span class="cb-discountPercentage"></span>
              </p>
            </div>
            <div class="buy-opt-rgt">
              <p class="pkg-prc">
                <span class="cb-reg-price" id="cb-reg-price3"></span> <br />
                <span class="cb-buy-each font-weight-bold"></span><span class="font-weight-bold" id="cb-buy-each3"></span>
              </p>
            </div>
          </div>
          <div class="buy-select buy-relative" id="buy-select3">

            <div class="buy-loading">
              <div style="position: absolute; top: -5px; left: -10px; width: 110%; height: 110%; z-index: 100000; background:#fff;" id="loading-box" class="flex-center">
                <div class="buy-box">
                  <div class="loader loader-01"></div>
                </div>
              </div>
            </div>

            <div class="buy-se-box">
              <div class="se-box" id="select3-item1">
                <p class="se-title">@lang('checkout::app.v2.item')1</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select3-item2">
                <p class="se-title">@lang('checkout::app.v2.item')2</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select3-item3">
                <p class="se-title">@lang('checkout::app.v2.item')3</p>
              </div>
            </div>
          </div>
          <div class="buyopt packageClass cb-package-container" id="product4">
            <div class="buy-opt-left">
              <p>
                <strong id="p-name4"></strong>
                <br />
                <span class="p-off" id="b-off4"></span>
                <span class="cb-discountPercentage"></span>
              </p>
            </div>
            <div class="buy-opt-rgt">
              <p class="pkg-prc">
                <span class="cb-reg-price" id="cb-reg-price4"></span> <br />
                <span class="cb-buy-each font-weight-bold"></span><span class="font-weight-bold" id="cb-buy-each4"></span>
              </p>
            </div>
          </div>
          <div class="buy-select buy-relative" id="buy-select4">
            <div class="buy-loading">
              <div style="position: absolute; top: -5px; left: -10px; width: 110%; height: 110%; z-index: 100000; background:#fff;" id="loading-box" class="flex-center">
                <div class="buy-box">
                  <div class="loader loader-01"></div>
                </div>
              </div>
            </div>

            <div class="buy-se-box">
              <div class="se-box" id="select4-item1">
                <p class="se-title">@lang('checkout::app.v2.item')1</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select4-item2">
                <p class="se-title">@lang('checkout::app.v2.item')2</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select4-item3">
                <p class="se-title">@lang('checkout::app.v2.item')3</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select4-item4">
                <p class="se-title">@lang('checkout::app.v2.item')4</p>
              </div>
            </div>
          </div>
          <p class="button-top">@lang('checkout::app.v2.Express checkout')</p>
          <div class="zoom-fade submit-button button-opacity pay-button fl" id="googlePayButton"></div>
          <div class="zoom-fade submit-button button-opacity appalpay-button fl" id="applePayButton"></div>
          <div class="zoom-fade submit-button fl" id="payment-button" style="text-align: center;margin-top: 12px; width:100%;height:73px;"></div>
          <div id="loading">
            <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 100000; background:#ddd;opacity: 0.3;" id="loading-box" class="flex-center">
              <div class="box">
                <div class="loader loader-01"></div>
              </div>
            </div>
          </div>

        </div>

        <p class="bdr-line"></p>

        <p class="pkg-hdng"><span class="pkg-step">@lang('checkout::app.v2.Step')2:</span> @lang('checkout::app.v2.Enter customer information')</p>
        <form class="form">
          <input type="hidden" name="prospectId" id="prospectId" value="" />
          <input type="hidden" name="campaigns[1][id]" id="campaign_id" value="" />
          <!--<input type="hidden" name="splitCampaigns" value="">-->
          <input type="hidden" name="campaigns[2][id]" id="split_click_bump" class="cb-split-click-bump" value="" disabled />
          <input type="hidden" name="campaigns[2][price]" value="" id="clickbumpPrice" class="cb-click-bump-price" disabled />
          <input type="hidden" name="coupon_code" value="No Discount" />
          <input type="hidden" name="regprice" id="regprice" value="" />
          <input type="hidden" name="individualPrice" id="individualPrice" value="" />
          <input type="hidden" name="packageQuantity" id="packageQuantity" value="" />
          <div class="formBox">
            <div class="fl input-box">
              <label>
                <input onblur="inputBlur(event)" class="input-item" name="firstName" id="firstName" type="text" placeholder="" required="" />
                <span class="input-span">@lang('checkout::app.v2.First Name')</span>
              </label>
            </div>
            <div class="fl input-box">
              <label>
                <input onblur="inputBlur(event)" class="input-item" name="lastName" id="lastName" type="text" placeholder="" required="" />
                <span class="input-span">@lang('checkout::app.v2.Last Name')</span>
              </label>
            </div>
            <div class="fl input-box">
              <label>
                <input onblur="inputBlur(event)" class="input-item" name="email" id="email" type="email" placeholder="" required="" />
                <span class="input-span">@lang('checkout::app.v2.Email')</span>
              </label>
            </div>
            <div class="fl input-box">
              <label>
                <input onblur="inputBlur(event)" class="input-item" name="phone" id="phone" type="tel" placeholder="" required="" />
                <span class="input-span">@lang('checkout::app.v2.Phone')</span>
              </label>
            </div>
            <p class="bdr-line"></p>
            <div class="payment-flds-box">
              <p class="pkg-hdng"><span class="pkg-step">@lang('checkout::app.v2.Step')3:</span> @lang('checkout::app.v2.Enter your shipping information')</p>
              <!-- <div class="frm-flds fl">
                <label for="address" class="fl-label">Shipping Address</label>
                <input type="text" name="shippingAddress1" class="input-flds required cb-remove-class frmField" placeholder="Your Address" data-error-message="Please enter your address!" id="shipAddress" />
              </div> -->
              <p class="email-warn" style="margin-top: 15px;">@lang('checkout::app.v2.Add a house number if you have one')</p>
              <div class="fl input-box">
                <label>
                  <input onblur="inputBlur(event)" class="input-item" name="shippingAddress1" id="shipAddress" type="text" placeholder="" required="" />
                  <span class="input-span">@lang('checkout::app.v2.Address')</span>
                </label>
              </div>
              <!-- <div class="frm-flds fl">
                <label for="city" class="fl-label">Your City</label>
                <input type="text" name="shippingCity" class="input-flds required cb-remove-class frmField" placeholder="Your City" data-error-message="Please enter your city!" />
              </div> -->
              <div class="fl input-box">
                <label>
                  <input onblur="inputBlur(event)" class="input-item" name="shippingCity" id="shipAddress" type="text" placeholder="" required="" />
                  <span class="input-span">@lang('checkout::app.v2.City')</span>
                </label>
              </div>
              <div class="frm-flds fl">
                <label for="shippingCountry" class="fl-label"></label>
                <select name="shippingCountry" type="text" placeholder="@lang('checkout::app.v2.Country')" class="selcet-fld required cb-remove-class frmField" data-selected="US" data-error-message="Please select your country!">
                </select>
              </div>
              <!-- <div class="fl input-box">
                <label>
                  <select class="input-item" name="shippingCountry" type="text" placeholder="" required="">
                  </select>
                  <span>@lang('checkout::app.v2.Country')</span>
                </label>
              </div> -->
              <div class="frm-flds fl" style="margin-top: 20px;">
                <label for="state" class="fl-label"></label>
                <select type="text" name="shippingState" placeholder="@lang('checkout::app.v2.State')" class="selcet-fld required cb-remove-class frmField" id="shippingStateSelect" data-error-message="Please select your state!" data-selected="">
                  <option value=""></option>
                </select>
              </div>
              <!-- <div class="fl input-box">
                <label>
                  <select class="input-item" name="shippingState" id="shippingStateSelect" type="text" placeholder="" required="">
                  </select>
                  <span>@lang('checkout::app.v2.State')</span>
                </label>
              </div> -->
              <!-- <div class="frm-flds fl">
                <label for="zip" class="fl-label">Zip Code</label>
                <input type="tel" name="shippingZip" id="zip" class="input-flds required cb-remove-class frmField" placeholder="Zip Code" data-error-message="Please enter a valid zip code!" />
              </div> -->
              <div class="fl input-box" style="margin-top: 20px;">
                <label>
                  <input onblur="inputBlur(event)" class="input-item" name="shippingZip" id="zip" type="tel" placeholder="" required="" />
                  <span class="input-span">@lang('checkout::app.v2.Zip Code')</span>
                </label>
              </div>
              <!--   <a href="javascript:void(0)" class="continue-order addon_btn"
                        onclick="javascript:bookmarkscroll.scrollTo('wrnty')">Select Addon</a>-->
            </div>
            <p class="bdr-line hide-mob"></p>
            <p class="pkg-hdng"><span class="pkg-step">@lang('checkout::app.v2.Step')4:</span> @lang('checkout::app.v2.Enter your payment information')</p>
            <p style="font-size: 13px;color: #444444; margin-bottom: 15px">@lang('checkout::app.v2.All transactions are secure and encrypted')</p>
            <select name="creditCardType" class="form-control" data-error-message="Please select valid card type!">
              <option value="">Card Type</option>
              <option value="master">Master Card</option>
              <option value="visa">Visa</option>
              <option value="amex">Amex</option>
              <option value="discover">Discover</option>
              <option value="paypal">Paypal</option>
            </select>

            <div class="htmleaf-container">
              <form id="myForm">

                <div class="full-container">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-12">
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default" id="airwallex-klarna-box">
                          <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                              <div class="panel-title-header" id="headingThree2">
                                <div class="form-check form-check-inline" style="width: 100%;">
                                  <input class="form-check-input" name="airwallex-klarna" type="radio" value="airwallex-klarna" id="airwallex-klarna" <?php if ($payments_default == 'airwallex-klarna') echo 'checked'; ?> name="payment_method">
                                  <label class="form-check-label" for="airwallex-klarna" style="float: right;min-width: 95%;">
                                    <span style="font-family: var(--title-family);">@lang('onebuy::app.product.payment.klarna.title')</span>
                                    <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/Klarna.png" style="max-height:24px" /></div>
                                  </label>
                                </div>
                              </div>


                            </h4>
                          </div>
                          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                              <div style="margin:10px;">
                                @lang('onebuy::app.product.payment.klarna.description')
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default" id="payal-standard-box">
                          <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                              <div class="panel-title-header" id="headingOne2">
                                <div class="form-check form-check-inline" style="width: 100%;">
                                  <input class="form-check-input" type="radio" value="paypal_standard" id="payal_standard" <?php if ($payments_default == 'payal_standard') echo 'checked'; ?> name="payment_method">
                                  <label class="form-check-label" for="payal_standard" style="float: right;min-width: 95%;">
                                    <span style="font-family: var(--title-family);">@lang('onebuy::app.product.payment.paypal.title') </span>
                                    <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/paypal.png" style="max-height:24px" /></div>
                                  </label>
                                </div>
                              </div>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              <div style="margin:10px;">
                                @lang('onebuy::app.product.payment.paypal.description')
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default" id="airwallex-credit-card-box">
                          <div class="panel-heading" id="headingOne">
                            <h4 class="panel-title">
                              <div class="panel-title-header" id="headingOne1">
                                <div class="form-check form-check-inline" style="width: 100%;">
                                  <input class="form-check-input" type="radio" name="payment_method" id="payment_method_airwallex" <?php if ($payments_default == 'payment_method_airwallex') echo 'checked'; ?> value="airwallex">
                                  <label class="form-check-label" for="payment_method_airwallex" style="float: right;min-width: 95%;">
                                    <span style="font-family: var(--title-family);">@lang('onebuy::app.product.payment.creditCard.title')</span>
                                    <div class="text-right" style="min-width:190px; display: inline;float: right;">
                                      <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/0169695890db3db16bfe.svg" />
                                      <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/ae9ceec48b1dc489596c.svg" />
                                      <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/f11b90c2972f3811f2d5.svg" />
                                      <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/37fc65d0d7ac30da3b0c.svg" />
                                    </div>

                                  </label>
                                </div>

                              </div>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                              <div>
                                <div id="cardNumber" class="form-floating input-group has-icon-left" style="
                                  border: 1px solid rgba(105, 105, 105, 0.397);
                                  border-radius: 10px;
                                  color: #222;
                                  height: 32px;
                                  line-height: 22px;
                                  width: 100%;
                                  font-size: 14px;
                                  padding: 3px 8px;
                                  outline: 0;
                                  font-family: var(--title-family), sans-serif;
                                  font-weight: 400;
                                  box-sizing: border-box;
                                  background-color: #fff;
                                  -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
                                  line-height: 1.25;padding: 1rem 0.75rem "></div>
                              </div>
                              <div style='margin-top:10px'>
                                <!-- <div>@lang('onebuy::app.product.payment.creditCard.Expiry')</div> -->
                                <div id="cardExpiry" style="
                                  border: 1px solid rgba(105, 105, 105, 0.397);
                                  border-radius: 10px;
                                  color: #222;
                                  height: 32px;
                                  line-height: 22px;
                                  width: 100%;
                                  font-size: 14px;
                                  padding: 3px 8px;
                                  outline: 0;
                                  font-family: var(--title-family), sans-serif;
                                  font-weight: 400;
                                  box-sizing: border-box;
                                  background-color: #fff;
                                  -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
                                  line-height: 1.25;padding: 1rem 0.75rem "></div>
                              </div>
                              <div style='margin-top:10px'>
                                <!-- <div>@lang('onebuy::app.product.payment.creditCard.cvc')</div> -->
                                <div id="cardCvc" style="
                                  border: 1px solid rgba(105, 105, 105, 0.397);
                                  border-radius: 10px;
                                  color: #222;
                                  height: 32px;
                                  line-height: 22px;
                                  width: 100%;
                                  font-size: 14px;
                                  padding: 3px 8px;
                                  outline: 0;
                                  font-family: var(--title-family), sans-serif;
                                  font-weight: 400;
                                  box-sizing: border-box;
                                  background-color: #fff;
                                  -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
                                  line-height: 1.25;padding: 1rem 0.75rem "></div>
                              </div>
                              <!-- <div class="choose-billing-box" style="display: none;">
                                <div style="display: flex;align-items: center;">
                                  <input type="checkbox" name="hobby" value="music">
                                  <p style="margin-left: 5px;">Use differce address for billing</p>
                                </div>
                              </div> -->
                              <!-- <div class="billing-content">
                                <div class="input-box" style="margin-top: 5px;">
                                  <label>
                                    <input onblur="inputBlur(event)" class="input-item" name="shippingZip" id="zip" type="tel" placeholder="" required="" />
                                    <span class="input-span">@lang('checkout::app.v2.Zip Code')</span>
                                  </label>
                                </div>
                                <div class="input-box">
                                  <label>
                                    <input onblur="inputBlur(event)" class="input-item" name="shippingZip" id="zip" type="tel" placeholder="" required="" />
                                    <span class="input-span">@lang('checkout::app.v2.Zip Code')</span>
                                  </label>
                                </div>
                                <div class="input-box">
                                  <label>
                                    <input onblur="inputBlur(event)" class="input-item" name="shippingZip" id="zip" type="tel" placeholder="" required="" />
                                    <span class="input-span">@lang('checkout::app.v2.Zip Code')</span>
                                  </label>
                                </div>
                                <div class="input-box">
                                  <label>
                                    <input onblur="inputBlur(event)" class="input-item" name="shippingZip" id="zip" type="tel" placeholder="" required="" />
                                    <span class="input-span">@lang('checkout::app.v2.Zip Code')</span>
                                  </label>
                                </div>
                                <div class="input-box">
                                  <label>
                                    <input onblur="inputBlur(event)" class="input-item" name="shippingZip" id="zip" type="tel" placeholder="" required="" />
                                    <span class="input-span">@lang('checkout::app.v2.Zip Code')</span>
                                  </label>
                                </div>
                              </div>
                            </div> -->
                            </div>
                          </div>
                          <div class="panel panel-default" id="airwallex-dropin-box">
                            <div class="panel-heading" role="tab" id="airwallex_dropin_head_1">
                              <h4 class="panel-title">
                                <div class="panel-title-header" id="airwallex_dropin_2">
                                  <div class="form-check form-check-inline input-box" style="width: 100%;">
                                    <input class="form-check-input input-item" type="radio" value="airwallex_dropin" id="airwallex_dropin" <?php if ($payments_default == 'airwallex_dropin') echo 'checked'; ?> name="payment_method">
                                    <label class="form-check-label" for="airwallex_dropin" style="float: right;min-width: 95%;">
                                      <span style="font-family: var(--title-family);">@lang('onebuy::app.product.payment.airwallex_dropin.title') </span>
                                      <!-- <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/paypal.png" style="max-height:24px" /></div> -->
                                    </label>
                                  </div>
                                </div>
                              </h4>
                            </div>
                            <div id="airwallex_dropin_collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="airwallex_dropin_head_2">
                              <div class="panel-body">
                                <p>
                                <div>
                                  @lang('onebuy::app.product.payment.airwallex_dropin.description')
                                </div>
                                </p>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
              </form>
            </div>

            <div class="js_choose_billing">
              <div class="w_radio">
                <input type="radio" id="radio_same_as_shipping" name="billingSameAsShipping" value="yes" checked />
                <label for="radio_same_as_shipping"> Billing is the same as shipping </label>
                <i class="icon-check"></i>
              </div>
              <div class="w_radio">
                <input type="radio" id="radio_different_shipping" name="billingSameAsShipping" value="no" />
                <label for="radio_different_shipping"> Billing Address different as Shipping </label>
                <i class="icon-check"></i>
              </div>
            </div>

            <div class="shipaddress billing-info">
              <div class="frm-flds fl">
                <label for="fname" class="fl-label">Billing First Name</label>
                <input type="text" name="billingFirstName" class="input-flds required cb-remove-class-billing form-control-custom frmField" placeholder="Billing First Name" data-error-message="Please enter your billing first name!" />
              </div>
              <div class="frm-flds fl">
                <label for="lanme" class="fl-label">Billing Last Name</label>
                <input type="text" name="billingLastName" class="input-flds required cb-remove-class-billing frmField" placeholder="Billing Last Name" data-error-message="Please enter your billing last name!" />
              </div>
              <div class="frm-flds fl">
                <label for="address" class="fl-label">Billing Address</label>
                <input type="text" name="billingAddress1" class="input-flds required cb-remove-class-billing frmField" placeholder="Billing Address" data-error-message="Please enter your billing address!" />
              </div>
              <div class="frm-flds fl">
                <label for="appt" class="fl-label">Apartment, suite, etc. (optional)</label>
                <input type="text" name="billingAddress2" class="input-flds" placeholder="Apartment, suite, etc. (optional)" id="appt" />
              </div>
              <div class="frm-flds fl">
                <label for="city" class="fl-label">Your City</label>
                <input type="text" name="billingCity" class="input-flds required cb-remove-class-billing frmField" placeholder="Billing City" data-error-message="Please enter your billing city!" />
              </div>
              <div class="frm-flds fl">
                <label for="billingCountry" class="fl-label">Select Country</label>
                <select name="billingCountry" type="text" placeholder="Your State" class="selcet-fld required cb-remove-class-billing frmField" data-selected="US" data-error-message="Please select your billing country!">
                  <option value="">Select Country</option>
                </select>
              </div>
              <div class="frm-flds fl">
                <label for="state" class="fl-label">Select State</label>
                <input type="text" name="billingState" class="selcet-fld required cb-remove-class-billing frmField" placeholder="Your State" data-error-message="Please select your billing state!" data-selected="" />
              </div>
              <div class="frm-flds fl">
                <label for="zip" class="fl-label">Zip Code</label>
                <input type="tel" name="billingZip" class="input-flds required cb-remove-class-billing frmField" placeholder="Billing Zip Code" data-error-message="Please enter a valid billing zip code!" />
              </div>
            </div>
          </div>
          <div class="complete-btn" id="complete-btn-id"></div>
          <div id='paypal-button'></div>
        </form>
        <div class="summary-wrapper">
          <div class="order-summary-title">
            <div style="font-size: 14px;font-weight: 500;">@lang('checkout::app.v2.ORDER DETAILS')</div>
          </div>
          <div class="order-summary-item">
            <div class="sku-info">

            </div>
          </div>
          <div class="order-summary-item">
            <div>@lang('checkout::app.v2.Subtotal'):</div>
            <div id="summary-total1" style="color: red;"></div>
          </div>
          <div class="order-summary-item">
            <div>@lang('checkout::app.v2.Discount'):</div>
            <div id="summary-total2"></div>
          </div>
          <div class="order-summary-item">
            <div>@lang('checkout::app.v2.Shipping'):</div>
            <div id="summary-total3" style="color: red;"></div>
          </div>
          <div class="order-summary-item">
            <div>@lang('checkout::app.v2.Shipping Method'):</div>
            <div>@lang('checkout::app.v2.USPS Express')</div>
          </div>
          <div class="order-summary-total">
            <div><strong>@lang("checkout::app.v2.Today's Total"):</strong></div>
            <div>
              <strong id="summary-total4" style="color: red">@lang('checkout::app.v2.price')</strong>
            </div>
          </div>
        </div>
        <div id="iduzu" class="section" style="width: 100%;float: right;margin-bottom:10px; display: flex;">
          <h3 class="container_title">@lang('onebuy::app.product.order.What customers are saying about')</h3>
        </div>
        <!-- review -->
        <div class="section" style="width: 100%;float: right;">
          <?php foreach ($comments as $key => $comment) {
            $comment = json_decode($comment); //var_dump($comment);exit; 
          ?>

            <div class="comment-card" style="background-color: #F4F4F4">
              <div style="display: flex">
                <div class="mr4" style="font-size: 14px;margin-top: 3px;color: #444444; ">
                  <?php echo $comment->name; ?>
                  <i class="flag-icon-size flag-icon flag-icon-<?php echo strtolower($default_country); ?> mr-2"></i>
                </div>
                <div>
                  <img class="mb1 mr2" width="14px" src="/checkout/onebuy/images/icon_gou.svg" />
                  <span style="width: 100%; font-size:12px; color: #444444">@lang('onebuy::app.product.order.Verified')</span>
                </div>
              </div>
              <div>
                <div style="text-align: start; width: 100%;">
                  <img width="110px" src="/checkout/onebuy/images/stars-5.svg" alt="" />
                </div>
                <div class="cardtext" style="text-align: start;"><?php echo $comment->comment; ?></div>
                <?php if (isset($comment->images)) { ?>

                  <?php foreach ($comment->images as $key => $image) { ?>

                    <a href="javascript:;" onclick="showImgProp('<?php echo @$image; ?>')">
                      <img style="width: 30%; aspect-ratio: 1/1" src="<?php echo @$image; ?>" alt="" />
                    </a>

                <?php }
                } ?>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="faq-content" style="width: 100%;float: right;">
          <div id="seeFaqBtn">
            @lang('onebuy::app.product.order.Frequently Asked Questions')
            <span class="faq_view">@lang('onebuy::app.product.order.See Our FAQs')</span>
          </div>
          <div id="faq-text">
            <div id="collapseContent">
              <?php foreach ($faqItems as $key => $item) {
                $item = json_decode($item); ?>

                <div class="panel-group" id="accordion<?php echo $key; ?>" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <p class="panel-title">
                        <a class="faq-question" role="button" data-toggle="collapse" data-parent="#accordion<?php echo $key; ?>" href="#faq<?php echo $key; ?>" aria-expanded="true" aria-controls="faq<?php echo $key; ?>" style="color: #333; text-decoration: none">
                          <?php echo $item->q; ?>
                        </a>
                      </p>
                    </div>
                    <div id="faq<?php echo $key; ?>" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body"><?php echo $item->a; ?></div>
                    </div>
                  </div>
                </div>

              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearall"></div>

  <div class="footer-box">
    <p style="font-weight: 700" id="footer-top-text">© 2024 </p>
    <br class="br" />
    <br class="br" />
    <div class="phone-block"></div>
    <div class="terms-block">
      <a class="ajax" href="/onebuy/page/shipping-policy?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.Shipping') </a>
      <a class="ajax" href="/onebuy/page/refund-policy?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.refund policy')</a>
      <a class="ajax" href="/onebuy/page/about-us?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.About Us')</a>
      <a class="ajax" href="/onebuy/page/privacy-policy?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.Privacy Policy')</a>
      <a class="ajax" href="/onebuy/page/contact-us?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.Contact us')</a>
      <a class="ajax terms-block-last" style="display: none;" href="/onebuy/page/Impressum?locale=<?php echo strtolower($default_country); ?>" target="_blank">@lang('checkout::app.v2.imprint')</a>
    </div>
    <br /><br />
    <div class="dmca_logo">
      <img src="/checkout/v2/images/1662477222-dmca.webp" alt="DMCA.com Protection Status" />
    </div>
  </div>
  <div class="dialog-error">
    <div class="dialog-box">
      <a href="javascript:void(0)" id="error-close" onclick="closeDialog()">X</a>
      <ul>
      </ul>
    </div>
  </div>
  <div class="sku-preview-img-box" onclick="imgBoxClose()">
    <div class="sku-preview-img">
      <img src="/checkout/v2/images/dmca_protected_sml_120n.png" alt="" />
    </div>
  </div>
  <div class="size-chart-img-box" onclick="sizeChartBoxClose()">
    <div class="size-chart-img">
      <img src="" alt="" />
    </div>
  </div>
  <!-- End of Discount POp up-->

  <script>
    var app_current_step = {
      id: 1,
      configId: 1,
      goto: 'upsell1a.php',
      pageType: 'checkoutPage',
      ajaxDelay: 0,
      link: 'checkout-now-v3.php',
    }
    var app_query_params = []
  </script>
  <script type="text/javascript" src="/checkout/v2/js/math.js"></script>
  <script type="text/javascript">
    AJAX_PATH = 'ajax.php/'
    app_config = {
      valid_class: 'no-error',
      error_class: 'has-error',
      loading_class: 'loading',
      exit_popup_enabled: false,
      exit_popup_element_id: '',
      exit_popup_page: '',
      offer_path: '\/offer\/1\/',
      current_step: 1,
      cbtoken: 'b997b34d04abdf676c5078e372e21d6e',
      dev_mode: 'N',
      show_validation_errors: 'modal',
      allowed_tc: '8"m4l4d4J454k454O0lv8sm"l"d4J454k454O4l481mvlsd"J[r1j4V4H4q4h4k4R4X|Niraj,V1H4q4h4k4R4X4N4r|jiVaH]',
      allowed_country_codes: ['US'],
      countries: {
        US: {
          name: 'United States',
          states: {
            AL: {
              name: 'Alabama'
            },
            AK: {
              name: 'Alaska'
            },
            AS: {
              name: 'American Samoa'
            },
            AZ: {
              name: 'Arizona'
            },
            AR: {
              name: 'Arkansas'
            },
            CA: {
              name: 'California'
            },
            CO: {
              name: 'Colorado'
            },
            CT: {
              name: 'Connecticut'
            },
            DE: {
              name: 'Delaware'
            },
            DC: {
              name: 'District of Columbia'
            },
            FM: {
              name: 'Federated States of Micronesia'
            },
            FL: {
              name: 'Florida'
            },
            GA: {
              name: 'Georgia'
            },
            GU: {
              name: 'Guam'
            },
            HI: {
              name: 'Hawaii'
            },
            ID: {
              name: 'Idaho'
            },
            IL: {
              name: 'Illinois'
            },
            IN: {
              name: 'Indiana'
            },
            IA: {
              name: 'Iowa'
            },
            KS: {
              name: 'Kansas'
            },
            KY: {
              name: 'Kentucky'
            },
            LA: {
              name: 'Louisiana'
            },
            ME: {
              name: 'Maine'
            },
            MD: {
              name: 'Maryland'
            },
            MA: {
              name: 'Massachusetts'
            },
            MI: {
              name: 'Michigan'
            },
            MN: {
              name: 'Minnesota'
            },
            MS: {
              name: 'Mississippi'
            },
            MO: {
              name: 'Missouri'
            },
            MT: {
              name: 'Montana'
            },
            NE: {
              name: 'Nebraska'
            },
            NV: {
              name: 'Nevada'
            },
            NH: {
              name: 'New Hampshire'
            },
            NJ: {
              name: 'New Jersey'
            },
            NM: {
              name: 'New Mexico'
            },
            NY: {
              name: 'New York'
            },
            NC: {
              name: 'North Carolina'
            },
            ND: {
              name: 'North Dakota'
            },
            MP: {
              name: 'Northern Mariana Islands'
            },
            OH: {
              name: 'Ohio'
            },
            OK: {
              name: 'Oklahoma'
            },
            OR: {
              name: 'Oregon'
            },
            PA: {
              name: 'Pennsylvania'
            },
            PR: {
              name: 'Puerto Rico'
            },
            MH: {
              name: 'Republic of Marshall Islands'
            },
            RI: {
              name: 'Rhode Island'
            },
            SC: {
              name: 'South Carolina'
            },
            SD: {
              name: 'South Dakota'
            },
            TN: {
              name: 'Tennessee'
            },
            TX: {
              name: 'Texas'
            },
            UT: {
              name: 'Utah'
            },
            VT: {
              name: 'Vermont'
            },
            VI: {
              name: 'Virgin Islands of the U.S.'
            },
            VA: {
              name: 'Virginia'
            },
            WA: {
              name: 'Washington'
            },
            WV: {
              name: 'West Virginia'
            },
            WI: {
              name: 'Wisconsin'
            },
            WY: {
              name: 'Wyoming'
            },
          },
        },
        FR: {
          states: {
            bb: {
              name: '123'
            }
          }
        }
      },
      country_lang_mapping: {},
      device_is_mobile: false,
      pageType: 'checkoutPage',
      enable_browser_back_button: false,
      disable_trialoffer_cardexp: true,
      enable_csrf_token: true,
    }
  </script>
  <script type="text/javascript">
    app_lang = {
      error_messages: {
        zip_invalid: 'Please enter a valid zip code!',
        email_invalid: 'Please enter a valid email id!',
        cc_invalid: 'Please enter a valid credit card number!',
        cvv_invalid: 'Please enter a valid CVV code!',
        card_expired: 'Card seems to have expired already!',
        card_expire_soon: 'Your credit card is about to expire, please update your card information.',
        common_error: 'Oops! Something went wrong! Can you please retry?',
        not_checked: 'Please check the agreement box in order to proceed.',
        ca_zip_invalid: 'Invalid Canada state code',
        xv_invalid_shipping: 'Your shipping address could not be verified',
        xv_email: 'Your email address could not be verified',
        xv_phone: 'Your phone number could not be verified',
      },
      exceptions: {
        config_error: 'General config error',
        config_file_missing: 'General config error',
        invalid_array: 'Argument is not a valid array',
        empty_prospect_id: 'Prospect ID is empty or invalid',
        curl_error: 'Something went wrong with the request, Please try again.',
        generic_error: 'Something went wrong with the request, Please try again.',
      },
    }
  </script>
  <script type="text/javascript">
    var cbUtilConfig = {
      disable_non_english_char_input: false
    }
  </script>
  <script>
    var validator_data = {
      enable_ca_statecode_validation: true,
      ca_state_code_mask: 'S0S 0S0',
      ca_state_code_regex: '^[A-Za-z]\\d[A-Za-z](\\s?\\d[A-Za-z]\\d)?$',
      us_state_code_mask: '00000',
      enable_statecode_validation: true,
      enable_us_statecode_validation: true,
    }
  </script>
  <script src="/checkout/v2/js/jquery-3.0.0.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/jquery.colorbox.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.ajax').colorbox({
        width: '90%'
      })
    })
  </script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-P6343Y2GKT"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-P6343Y2GKT', {
      "debug_mode": true
    });
  </script>

  <script type="text/javascript">
    (function(c, l, a, r, i, t, y) {
      c[a] = c[a] || function() {
        (c[a].q = c[a].q || []).push(arguments)
      };
      t = l.createElement(r);
      t.async = 1;
      t.src = "https://www.clarity.ms/tag/" + i;
      y = l.getElementsByTagName(r)[0];
      y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "kruepex7cm");
  </script>

  <script>
    var data = ''
    var orderObj = {}
    var params = {
      first_name: "",
      second_name: "",
      email: "",
      phone_full: "",
      country: "",
      city: "",
      province: "",
      address: "",
      code: "",
      product_delivery: "",
      currency: "",
      coupon_code: "",
      product_price: "",
      total: "",
      amount: "",
      payment_return_url: "",
      payment_cancel_url: "",
      phone_prefix: "",
      payment_method: "",
      products: [],
      logo_image: "",
      brand: "",
      description: "",
      shopify_store_name: "",
      produt_amount_base: "",
      domain_name: "",
      price_template: "",
      omnisend: "",
      payment_account: "",
      shipping_address: "",
      bill_first_name: "",
      bill_second_name: "",
      bill_country: null,
      bill_city: "",
      bill_province: null,
      bill_address: "",
      bill_code: "",
      error: false
    }
    var currency = '{{ core()->getCurrentCurrencyCode() }}'
    var paypalId = ''
    var attLength
    var productL1 = {}
    var productL2 = {}
    var productL3 = {}
    var productL4 = {}
    var getProductId = '{{ $slug }}'
    var countries1 = '<?php echo strtolower($default_country); ?>'
    var paypal_pay_acc = ''
    var area = '{{ app()->getLocale() }}'
    var currencySymbol = '{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}'
    var airwallexArr = {
      complete: false
    }
    var skuErr = false
    var logoImg = "/checkout/v2/images/logo_" + countries1 + ".png"
    var schrittImg = "/checkout/v2/images/1701506369_" + countries1 + ".webp"
    var googlerOrApple = ''
    var googleShow = false
    var appleShow = false
    $(function() {
      console.log(logoImg, 'logoImg');
      $('.logo_wrap_dist img').attr('src', logoImg)
      if (countries1 == 'fr' || countries1 == 'es') {
        $('.Schritt-top-box').hide()
      } else {
        console.log(schrittImg, 'schrittImg');
        $('.Schritt-top-box').show()
        $('.Schritt-top-box img').attr('src', schrittImg)
      }
      if (countries1 == 'de') {
        $('.terms-block-last').show
      }
      if (countries1 == 'us' || countries1 == 'uk') {
        var favicon = '/checkout/v2/images/favicon.png'
        $('#favicon-icon').attr('href', favicon)
      }
      var dataUrl = '/api/onebuy/product/detail/' + getProductId + '?currency=' + currency
      axios
        .get(dataUrl)
        .then(function(res) {
          data = res.data
          payTypeShow = data.payments
          var attrList = data.attr.attributes
          paypal_pay_acc = data.paypal_client_id
          var paymentsDefault = data.payments_default
          console.log(paymentsDefault, data.ads.pc.img, 'paymentsDefault=====');
          $('#pc-banner').attr('src', data.ads.pc.img);
          $('#mobile-banner').attr('src', data.ads.mobile.img);
          $('.prod-name').text(data.product.name)
          $('title').html(data.product.name)
          $('#buy-select1, #buy-select3, #buy-select4').hide()
          $('#footer-top-text').append(data.brand)
          var isPc = IsPC()
          console.log(isPc, 'ispc');
          if (countries1 == 'us') {
            if (isPc) {
              let isMac = /macintosh|mac os x/i.test(navigator.userAgent);
              console.log(isMac, 'isMac');
              googlerOrApple = isMac ? 'apple' : 'google'

            } else {
              let type = getMobileOperatingSystem()
              console.log(type, 'type');
              googlerOrApple = type == 'iOS' ? 'apple' : 'google'
            }
            if (googlerOrApple == 'google' && payTypeShow.airwallex_google == 1) {
              googleShow = true
              console.log('googleShow');
              $('.pay-button').show()
              $('.appalpay-button').hide()
            }
            if (googlerOrApple == 'apple' && payTypeShow.airwallex_appley == 1) {
              appleShow = true
              console.log('appalpayShow');
              $('.pay-button').hide()
              $('.appalpay-button').show()
            }
          }
          if (!data.ads.size.img) {
            $('#size-chart').hide()
          } else {
            $('#size-chart').show()
          }
          if (payTypeShow.airwallex_klarna == '0') {
            $('#airwallex-klarna-box').hide()
          }
          if (payTypeShow.payal_standard == '0') {
            $('#payal-standard-box').hide()

          }
          if (payTypeShow.airwallex_credit_card == '0') {
            $('#airwallex-credit-card-box').hide()

          }
          if (payTypeShow.airwallex_dropin == '0') {
            $('#airwallex-dropin-box').hide()
          }
          if (paymentsDefault == 'airwallex_klarna') {
            console.log(paymentsDefault, 'kelala');
            $('#airwallex-klarna').prop('checked', true);
            $('#payal_standard').prop('checked', false);
            $('#payment_method_airwallex').prop('checked', false);
            $("#complete-btn-id").show();
            $("#collapseOne").hide();
            $("#collapseTwo").hide();
            $("#collapseThree").show();
            $("#airwallex_dropin_collapse").hide();

            $("#headingThree2").addClass("action");
            $("#headingOne1").removeClass("action");
            $("#headingOne2").removeClass("action");
            $("#airwallex_dropin_2").removeClass("action");
            $("#complete-btn-id").addClass(".complete-btn")
            $("#complete-btn-id").addClass("submit-button");
            $("#complete-btn-id").css({
              width: "100%",
              background: "#1773b0",
              padding: "18px 13px",
              textAlign: 'center'
            });
            $("#complete-btn-id").html("@lang('checkout::app.v2.complete_secure_purchase')");

          }
          if (paymentsDefault == 'payal_standard') {
            window.is_airwallex = true
            // if (countries1 == 'us') {
            //   $('choose-billing-box').show
            // }
            $('#airwallex-klarna').prop('checked', false);
            $('#payal_standard').prop('checked', false);
            $('#payment_method_airwallex').prop('checked', true);
            $("#complete-btn-id").show();
            console.log("click headingOne ");
            $("#collapseOne").show();
            $("#collapseTwo").hide();
            $("#collapseThree").hide();
            $("#airwallex_dropin_collapse").hide();
            $("#complete-btn-id").css({
              width: "100%",
              background: "#1773b0",
              padding: "18px 13px",
              textAlign: 'center'
            });
            $("#headingOne1").addClass("action");
            $("#headingThree2").removeClass("action");
            $("#headingOne2").removeClass("action");
            $("#airwallex_dropin_2").removeClass("action");
            $("#complete-btn-id").addClass(".complete-btn")
            $("#complete-btn-id").addClass("submit-button");

            $("#complete-btn-id").html("@lang('checkout::app.v2.complete_secure_purchase')");

          };

          if (paymentsDefault == 'payment_method_airwallex') {
            window.is_airwallex = true
            // if (countries1 == 'us') {
            //   $('choose-billing-box').show
            // }
            $('#airwallex-klarna').prop('checked', false);
            $('#payal_standard').prop('checked', false);
            $('#payment_method_airwallex').prop('checked', true);
            $("#complete-btn-id").show();
            console.log("click headingOne ");
            $("#collapseOne").show();
            $("#collapseTwo").hide();
            $("#collapseThree").hide();
            $("#airwallex_dropin_collapse").hide();

            $("#headingOne1").addClass("action");
            $("#headingThree2").removeClass("action");
            $("#headingOne2").removeClass("action");
            $("#airwallex_dropin_2").removeClass("action");
            $("#complete-btn-id").addClass(".complete-btn")
            $("#complete-btn-id").addClass("submit-button");
            $("#complete-btn-id").css({
              width: "100%",
              background: "#1773b0",
              padding: "18px 13px",
              textAlign: 'center'
            });
            $("#complete-btn-id").html("@lang('checkout::app.v2.complete_secure_purchase')");


          }
          var script = document.createElement('script')
          if (script.readyState) {
            // IE
            script.onreadystatechange = function() {
              if (
                script.readyState === 'loaded' ||
                script.readyState === 'complete'
              ) {
                script.onreadystatechange = null
                creatPaypalCardButton()
              }
            }
          } else {
            // 其他浏览器
            script.onload = function() {
              creatPaypalCardButton()
            }
          }
          script.type = 'text/javascript'
          // script.src = 'https://www.paypal.com/sdk/js?client-id=Ac3a2fQqrAO_2skbKS4hb5okCBnRUdh_i78Vvjhh-s1xc4fqZc39OyawwGL4kdHGvlPiRsv6CmogaJZz&components=buttons,messages,funding-eligibility&currency='+currency+'&disable-funding=paylater';
          script.src =
            'https://www.paypal.com/sdk/js?client-id=' +
            paypal_pay_acc +
            '&components=buttons,messages,funding-eligibility&currency=' +
            currency
          // script.src = 'https://www.paypal.com/sdk/js?client-id=AUbkpTo_D9-l80qERS91ipcrXuIfSC3WMmFbK7Ey4n8RS3TaoJDw8H2rpxdhsWBIZWZbb6E3V7CSmK4R&components=buttons,messages,funding-eligibility&currency='+currency+'&disable-funding=paylater';
          script.async = 1
          document.body.appendChild(script)
          $('#p-name2').text(data.package_products[0].name)
          $('#p-name1').text(data.package_products[1].name)
          $('#p-name3').text(data.package_products[2].name)
          $('#p-name4').text(data.package_products[3].name)
          $('#b-off2').text("@lang('checkout::app.v2.Save')" + data.package_products[0].tip1 + "@lang('checkout::app.v2.OFF')")
          $('#b-off1').text("@lang('checkout::app.v2.Save')" + data.package_products[1].tip1 + "@lang('checkout::app.v2.OFF')")
          $('#b-off3').text("@lang('checkout::app.v2.Save')" + data.package_products[2].tip1 + "@lang('checkout::app.v2.OFF')")
          $('#b-off4').text("@lang('checkout::app.v2.Save')" + data.package_products[3].tip1 + "@lang('checkout::app.v2.OFF')")
          $('#cb-reg-price2').text(data.package_products[0].old_price_format)
          $('#cb-reg-price1').text(data.package_products[1].old_price_format)
          $('#cb-reg-price3').text(data.package_products[2].old_price_format)
          $('#cb-reg-price4').text(data.package_products[3].old_price_format)
          $('#cb-buy-each2').text(data.package_products[0].new_price_format)
          $('#cb-buy-each1').text(data.package_products[1].new_price_format)
          $('#cb-buy-each3').text(data.package_products[2].new_price_format)
          $('#cb-buy-each4').text(data.package_products[3].new_price_format)
          if (attrList.length > 0) {
            var selectList = ''
            for (var arri = 0; arri < attrList.length; arri++) {
              var optionList = `<option value="" hidden">` + attrList[arri].label + `</option>`
              for (var attj = 0; attj < attrList[arri].options.length; attj++) {
                optionList += `<option value="` + attrList[arri].options[attj].label + `">` + attrList[arri].options[attj].label + `</option>`
              }
              selectList += `<select class="in-se" id="in-se` + arri + `" onchange="seInput(value)">` + optionList + `</select>`
            }
            // var imgIndex = attrList[0].options[0].products[0]
            // var box =
            //   `<div style="flex: 2;">` +
            //   selectList +
            //   `</div><img class="se-img" src="` +
            //   data.attr.variant_images[imgIndex][0].small_image_url +
            //   `" alt="" />`
            $('.buy-loading').hide()
            $('.se-box').append(selectList)
          } else {
            $('.buy-loading').hide()
            $('.buy-select').hide()
          }
          var nprice = currencySymbol + data.package_products[0].new_price.toFixed(2)
          $('#summary-total1').text(nprice)
          var shippingFee = currencySymbol + data.package_products[0].shipping_fee
          $('#summary-total3').text(shippingFee)

          var discount = Number(data.package_products[0].old_price) - Number(data.package_products[0].new_price)
          discount = currencySymbol + discount.toFixed(2)
          $('#summary-total2').text(discount)
          var total = Number(data.package_products[0].new_price) + Number(data.package_products[0].shipping_fee)
          total = currencySymbol + total.toFixed(2)
          $('#summary-total4').text(total)
          $('.product-name').text(data.package_products[0].name)
          $('#product-number').text('number: 2')
          $('#product-price').text(data.package_products[0].tip2)
          if (data.payments.airwallex_credit_card == '0') {
            $('.paypal-box').hide()
          }
          if (data.payments.payal_standard == '0') {
            $('.cardPayOpt').hide()
            $('.credit-card').hide()
          }
          var productsObj = {}
          var midList = []
          attLength = data.attr.attributes.length
          console.log(attLength, 'attLength')
          params.product_delivery = data.package_products[0].shipping_fee
          params.total = Number(data.package_products[0].new_price) + Number(data.package_products[0].shipping_fee)
          params.amount = '2'
          params.description = data.package_products[0].name
          paypalId = data.paypal_client_id
          productsObj.amount = '1'
          productsObj.description = data.package_products[0].name
          productsObj.product_id = data.product.id
          // productsObj.product_sku = data.sku
          productsObj.img = data.product.base_image.large_image_url
          productsObj.price = data.package_products[0].tip2
          // productsObj.variant_id =
          console.log(data, 'data=====')
          productL1 = JSON.parse(JSON.stringify(productsObj))
          productL2 = JSON.parse(JSON.stringify(productsObj))
          productL3 = JSON.parse(JSON.stringify(productsObj))
          productL4 = JSON.parse(JSON.stringify(productsObj))
          var name1,
            name1List = [],
            name2,
            name2List = [],
            name3,
            name3List = [],
            name4,
            name4List = [],
            v1,
            v1List = [],
            v2,
            v2List = [],
            v3,
            v3List = [],
            v4,
            v4List = []
          for (let m = 0; m < attLength; m++) {
            var oid = '#in-se' + m

            if (params.amount == '1') {}
            if (params.amount == '2') {
              name1 = $('#select2-item1').children('select').eq(m).val()
              name1List.push(name1)
              name2 = $('#select2-item2').children('select').eq(m).val()
              name2List.push(name2)
              // productL1.attribute_name = v1+ ',' +v2
              for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
                var mid = data.attr.attributes[m].id
                if (data.attr.attributes[m].options[inm].label == name1) {
                  v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
                }
                if (data.attr.attributes[m].options[inm].label == name2) {
                  v2List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
                }
              }
              console.log(v1List, v2List, 'v1List')
            }
            if (params.amount == '3') {}
            if (params.amount == '4') {}
          }
          name1List = name1List.join(',')
          name2List = name2List.join(',')
          v1List = v1List.join(',')
          v2List = v2List.join(',')
          productL1.attr_id = v1List
          productL2.attr_id = v2List
          productL1.attribute_name = name1List
          productL2.attribute_name = name2List
          getVSID(data.attr.index2)
          params.products = []
          params.products.push(productL1, productL2)
          // productL1.attr_id
          // minList = midList.join(',')
          // productsObj.attr_id = minList
          // console.log(productsObj, 'midList')
          getSkuListInfo();
        })
        .catch(function(error) {
          console.error(error, 'err')
        })

    })

    function inputBlur(event) {
      console.log(event.target, 'event.target')
      if ($(event.target).val() !== '') {
        $(event.target).next().addClass('input-focus')
      } else {
        $(event.target).next().removeClass('input-focus')
      }
      var trackFlag = $('input[name="firstName"]').val() && $('input[name="lastName"]').val() && $('input[name="email"]').val() && $('input[name="phone"]').val() && $('input[name="shippingAddress1"]').val() && $('input[name="shippingCity"]').val() && $('input[name="shippingZip"]').val()
      if (trackFlag) {
        crmTrack('add_user_info')
      }
    }

    function IsPC() {
      var userAgentInfo = navigator.userAgent;
      var Agents = ["Android", "iPhone",
        "SymbianOS", "Windows Phone",
        "iPad", "iPod"
      ];
      var flag = true;
      for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
          flag = false;
          break;
        }
      }
      return flag;
    }

    function getMobileOperatingSystem() {
      var userAgent = navigator.userAgent || navigator.vendor || window.opera;

      if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/iPod/i)) {
        return 'iOS';
      } else if (userAgent.match(/Android/i)) {
        return 'Android';
      } else {
        return 'unknown';
      }
    }

    function throttle(fn, wait) {
      let timeout = null;
      return function() {
        let context = this,
          args = arguments;
        if (!timeout) {
          timeout = setTimeout(() => {
            fn.apply(context, args);
            timeout = null;
          }, wait);
        }
      };
    }

    function crmTrack(type) {
      console.log(type, 'crmTrack')
      var postParams = {
        channel_id: "<?php echo $crm_channel; ?>",
        token: "<?php echo $refer; ?>",
        type: type
      };
      console.log(JSON.stringify(postParams), 'JSON.stringify(postParams)==')
      // 1) 用户修改商品信息add_cart
      // 3）用户发起支付 触发 add_pay
      // 2）用户填写表单内容 ，触发 add_user_info
      fetch('https://crm.heomai.com/api/user/action', {
        body: JSON.stringify(postParams),
        method: 'POST',
        headers: {
          'content-type': 'application/json'
        },
      })
    }

    function validateEmail(email) {
      const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
      return regex.test(email);
    }

    function errDialogShow(errIsShow, emailErr, airwallexArror = true) {
      $('.dialog-error .dialog-box ul').empty()
      var textList = ''
      if (!$('input[name="firstName"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your first name!')</li>`
      }
      if (!$('input[name="lastName"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your last name!')</li>`
      }
      if (!$('input[name="email"]').val() || !emailErr) {
        textList += `<li>@lang('checkout::app.v2.Please enter a valid email address!')</li>`
      }
      if (!$('input[name="phone"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your phone number!')</li>`
      }
      if (!$('input[name="shippingAddress1"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your address!')</li>`
      }
      if (!$('input[name="shippingCity"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your city!')</li>`
      }
      if (!$('input[name="shippingZip"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please insert a valid postal code!')</li>`
      }
      if (!$('select[name="shippingCountry"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please select your country!')</li>`
      }
      if (!$('select[name="shippingState"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please select your state!')</li>`
      }
      if (!errIsShow) {
        textList += `<li>@lang('checkout::app.v2.Please select product information!')</li>`
      }
      if (!airwallexArr) {
        textList += `<li>` + airwallexArr.errText + `</li>`
      }
      $('.dialog-error').show()
      $('.dialog-error .dialog-box ul').append(textList)
    }

    function getVSID(obj) {
      for (const key in obj) {
        if (key == productL1.attr_id) {
          console.log(obj[key][0], 'obj[key][0]');
          productL1.variant_id = obj[key][0]
          productL1.product_sku = obj[key][1]
        }
        if (key == productL2.attr_id) {
          productL2.variant_id = obj[key][0]
          productL2.product_sku = obj[key][1]
        }
        if (key == productL3.attr_id) {
          productL3.variant_id = obj[key][0]
          productL3.product_sku = obj[key][1]
        }
        if (key == productL4.attr_id) {
          productL4.variant_id = obj[key][0]
          productL4.product_sku = obj[key][1]
        }
      }
    }

    function getSkuListInfo() {
      $('.sku-info').empty()
      var skuData = params.products
      var skuList = ''
      for (let i = 0; i < skuData.length; i++) {
        var description = skuData[i].description.slice(2)
        var attributeName = skuData[i].attribute_name.split(',').join(' / ')
        var skuImgUrl = skuData[i].img
        skuList += `<div class="sku-item-info">
                <img src="` + skuImgUrl + `" alt="" onclick="skuImgPreview(event)" style="width: 64px;height:64px" />
                <div class="sku-content">
                  <p class="sku-item-title">` + description + `</p>
                  <span class="sku-item-text">` + attributeName + `</span>
                  <a
                    style="display:block;color:#1773B0; font-size:13px"
                    href="javascript:void(0)"
                    onclick="javascript:bookmarkscroll.scrollTo('product2')"
                    >@lang('checkout::app.v2.edit')</a> 
                </div>
                <div class="sku-price">` + skuData[i].price + `</div>
              </div>`
      }
      $('.sku-info').append(skuList)
    }

    function skuImgPreview(event) {
      var imgUrl = $(event.target).attr('src')
      $('.sku-preview-img-box').show()
      $('.sku-preview-img img').attr('src', imgUrl)
    }

    function sizeCharImgPreview() {
      var imgUrl = data.ads.size.img
      console.log(imgUrl, 'sizeCharImgPreview')
      $('.size-chart-img-box').show()
      $('.size-chart-img img').attr('src', imgUrl)
    }

    function imgBoxClose() {
      $('.sku-preview-img-box').hide()
    }

    function sizeChartBoxClose() {
      $('.size-chart-img-box').hide()
    }

    function paramsProductsinit(list) {
      // console.log(list, 'paramsProductsinit')
      for (var listi = 0; listi < list.length; listi++) {
        if (listi == list.length - 1) {
          break;
        }
        if (list[listi].attr_id == list[listi + 1].attr_id) {
          var toNum = Number(list[listi].amount) + 1
          list[listi + 1].amount = String(toNum)
          list.splice(listi, 1)

        }
      }
      params.products = list
      console.log(params.products, 'params.products')
    }

    function initProuctData(num1, num2) {
      var name1,
        name1List = [],
        name2,
        name2List = [],
        name3,
        name3List = [],
        name4,
        name4List = [],
        v1,
        v1List = [],
        v2,
        v2List = [],
        v3,
        v3List = [],
        v4,
        v4List = []
      var productsObj = {}
      var midList = []
      params.product_delivery = data.package_products[num1].shipping_fee
      params.total = Number(data.package_products[num1].new_price) + Number(data.package_products[num1].shipping_fee)
      params.amount = num2
      params.description = data.package_products[num1].name
      productsObj.amount = '1'
      productsObj.description = data.package_products[num1].name
      productsObj.product_id = data.product.id
      productsObj.price = data.package_products[num1].tip2
      // productsObj.product_sku = data.sku
      productsObj.img = data.product.base_image.large_image_url
      productL1 = JSON.parse(JSON.stringify(productsObj))
      productL2 = JSON.parse(JSON.stringify(productsObj))
      productL3 = JSON.parse(JSON.stringify(productsObj))
      productL4 = JSON.parse(JSON.stringify(productsObj))
      for (let m = 0; m < attLength; m++) {
        var oid = '#in-se' + m

        if (params.amount == '1') {
          name1 = $('#select1-item1').children('select').eq(m).val()
          name1List.push(name1)
          for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
            var mid = data.attr.attributes[m].id
            if (data.attr.attributes[m].options[inm].label == name1) {
              v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
          }
        }
        if (params.amount == '2') {
          name1 = $('#select2-item1').children('select').eq(m).val()
          name1List.push(name1)
          name2 = $('#select2-item2').children('select').eq(m).val()
          name2List.push(name2)
          name3 = $('#select2-item2').children('select').eq(m).val()
          name2List.push(name2)
          // productL1.attribute_name = v1+ ',' +v2
          for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
            var mid = data.attr.attributes[m].id
            if (data.attr.attributes[m].options[inm].label == name1) {
              v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name2) {
              v2List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
          }
          console.log(v1List, v2List, 'v1List')
        }
        if (params.amount == '3') {
          name1 = $('#select3-item1').children('select').eq(m).val()
          name1List.push(name1)
          name2 = $('#select3-item2').children('select').eq(m).val()
          name2List.push(name2)
          name3 = $('#select3-item3').children('select').eq(m).val()
          name3List.push(name3)
          // productL1.attribute_name = v1+ ',' +v2
          for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
            var mid = data.attr.attributes[m].id
            if (data.attr.attributes[m].options[inm].label == name1) {
              v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name2) {
              v2List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name3) {
              v3List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
          }
          console.log(v1List, v2List, 'v1List')
        }
        if (params.amount == '4') {
          name1 = $('#select4-item1').children('select').eq(m).val()
          name1List.push(name1)
          name2 = $('#select4-item2').children('select').eq(m).val()
          name2List.push(name2)
          name3 = $('#select4-item3').children('select').eq(m).val()
          name3List.push(name3)
          name4 = $('#select4-item4').children('select').eq(m).val()
          name4List.push(name4)
          // productL1.attribute_name = v1+ ',' +v2
          for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
            var mid = data.attr.attributes[m].id
            if (data.attr.attributes[m].options[inm].label == name1) {
              v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name2) {
              v2List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name3) {
              v3List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name4) {
              v4List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
          }
          console.log(v1List, v2List, 'v1List')
        }
      }
      if (num2 == '1') {
        name1List = name1List.join(',')
        v1List = v1List.join(',')
        productL1.attr_id = v1List
        productL1.attribute_name = name1List
        getVSID(data.attr.index2)
        params.products = []
        params.products.push(productL1)
      }
      if (num2 == '2') {
        name1List = name1List.join(',')
        name2List = name2List.join(',')
        v1List = v1List.join(',')
        v2List = v2List.join(',')
        productL1.attr_id = v1List
        productL2.attr_id = v2List
        productL1.attribute_name = name1List
        productL2.attribute_name = name2List
        getVSID(data.attr.index2)
        params.products = []
        params.products.push(productL1, productL2)
        // paramsProductsinit(params.products)
      }
      if (num2 == '3') {
        name1List = name1List.join(',')
        name2List = name2List.join(',')
        name3List = name3List.join(',')

        v1List = v1List.join(',')
        v2List = v2List.join(',')
        v3List = v3List.join(',')

        productL1.attr_id = v1List
        productL2.attr_id = v2List
        productL3.attr_id = v3List

        productL1.attribute_name = name1List
        productL2.attribute_name = name2List
        productL3.attribute_name = name3List
        getVSID(data.attr.index2)
        params.products = []
        params.products.push(productL1, productL2, productL3)
        // paramsProductsinit(params.products)
      }
      if (num2 == '4') {
        name1List = name1List.join(',')
        name2List = name2List.join(',')
        name3List = name3List.join(',')
        name4List = name4List.join(',')

        v1List = v1List.join(',')
        v2List = v2List.join(',')
        v3List = v3List.join(',')
        v4List = v4List.join(',')

        productL1.attr_id = v1List
        productL2.attr_id = v2List
        productL3.attr_id = v3List
        productL4.attr_id = v4List

        productL1.attribute_name = name1List
        productL2.attribute_name = name2List
        productL3.attribute_name = name3List
        productL4.attribute_name = name4List
        getVSID(data.attr.index2)
        params.products = []
        params.products.push(productL1, productL2, productL3, productL4)
        // paramsProductsinit(params.products)
      }
      getSkuListInfo();
    }
    $(function() {
      var countriesUrl = '/template-common/checkout1/state/countries_' + countries1 + '.json'
      axios
        .get(countriesUrl)
        .then(function(res) {
          if (res.data[0].countryCode) {
            console.log(res, '===recountries1res===')
            app_config.allowed_country_codes = []
            var countriesList = res.data
            var opList = `<option value="" disabled>@lang('checkout::app.v2.select country')</option>`
            for (let resi = 0; resi < countriesList.length; resi++) {
              var code = countriesList[resi].countryCode
              var name = countriesList[resi].countryName
              opList += `<option value="` + code + `">` + name + `</option>`
            }
            $('select[name="shippingCountry"]').append(opList)
            $('select[name="shippingCountry"]').val(countriesList[0].countryCode)
          }
          var cval = $('select[name="shippingCountry"]').val()
          console.log(cval, 'cval===')
          if (cval) {
            cval = cval.toLowerCase()
            var countryUrl = '/template-common/checkout1/state/' + cval + '_' + area + '.json'
            axios
              .get(countryUrl)
              .then(function(res) {
                if (res.data[0].CountryCode) {
                  console.log(res, 'rrrrrrrssssssss')
                  var stateList = res.data
                  var optionList = `<option value="" disabled>@lang('checkout::app.v2.Select State')</option>`
                  for (var resj = 0; resj < stateList.length; resj++) {
                    optionList += `<option value="` + stateList[resj].StateCode + `">` + stateList[resj].StateName + `</option>`
                  }
                  $('select[name="shippingState"]').empty()
                  $('select[name="shippingState"]').append(optionList)
                  $('select[name="shippingState"]').val(stateList[0].StateCode)
                }
              })
          }

        })
        .catch(function(err) {
          console.log(err, 'err====')
        })
    })

    $('select[name="shippingState"]').change(function() {
      console.log($(this).val(), 'shippingState')
      params.province = $(this).val()
    })
    $('select[name="shippingCountry"]').change(function() {
      console.log($(this).val())
      params.country = $(this).val()
      if ($(this).val()) {
        var countryClick = $(this).val().toLowerCase()
        console.log(countryClick, params.country, 'countryClick')
        var countryUrl = '/template-common/checkout1/state/' + countryClick + '_' + area + '.json'
        axios
          .get(countryUrl)
          .then(function(res) {
            if (res.data[0].CountryCode) {
              console.log(res, 'rererererere')
              var stateList = res.data
              var optionList = `<option value="" disabled>@lang('checkout::app.v2.Select State')</option>`
              for (var resj = 0; resj < stateList.length; resj++) {
                optionList += `<option value="` + stateList[resj].StateCode + `">` + stateList[resj].StateName + `</option>`
              }
              $('select[name="shippingState"]').empty()
              $('select[name="shippingState"]').append(optionList)
              $('select[name="shippingState"]').val(stateList[0].StateCode)
            }

          })
          .catch(function(err) {
            console.log(err, 'err====')
          })
      }
    })

    function getSku(id, n, value) {
      var nList = []
      var aList = []
      for (var i = 0; i < attLength; i++) {
        var inSeId = 'in-se' + i
        if (id == inSeId) {
          nList = params.products[n].attribute_name.split(',')
          nList[i] = value
          params.products[n].attribute_name = nList.join(',')
          for (var j = 0; j < data.attr.attributes[i].options.length; j++) {
            if (data.attr.attributes[i].options[j].label == value) {
              aid = data.attr.attributes[i].options[j].id
            }
          }
          var imgIndex = ''
          var colorList = data.attr.attributes[0].options
          for (var colori = 0; colori < colorList.length; colori++) {
            if (colorList[colori].label == value) {
              imgIndex = colorList[colori].products[0]
            }
          }
          if (imgIndex) {
            params.products[n]
            var finUrl = data.attr.variant_images[imgIndex][0].original_image_url
            params.products[n].img = finUrl
          }
          aList = params.products[n].attr_id.split(',')
          aList[i] = data.attr.attributes[i].id + '_' + aid
          params.products[n].attr_id = aList.join(',')
        }
      }
      getVSID(data.attr.index2)
    }

    function listEach(list) {
      return list.every(function(item) {
        return item !== ''
      })
    }

    function seInput(value) {
      var parId = $(event.target).parent().attr('id')
      var itemId = $(event.target).attr('id')
      var aid = ''
      if (parId == 'select1-item1' || parId == 'select2-item1' || parId == 'select3-item1' || parId == 'select4-item1') {
        getSku(itemId, 0, value)
      }
      if (parId == 'select2-item2' || parId == 'select3-item2' || parId == 'select4-item2') {
        getSku(itemId, 1, value)
      }
      if (parId == 'select3-item3' || parId == 'select4-item3') {
        getSku(itemId, 2, value)
      }
      if (parId == 'select4-item4') {
        getSku(itemId, 3, value)
      }
      getSkuListInfo();
      var skuAll = $(event.target).parent().parent().parent()
      var list = []
      skuAll.find('select').each(function() {
        list.push($(this).val())
      })
      var isCrmTrack = listEach(list)
      if (isCrmTrack) {
        crmTrack('add_cart')
        if (countries1 == 'us') {
          if (googlerOrApple == 'google' && googleShow) {
            console.log('googleShow');
            createGoogleButton(params)
          }
          if (googlerOrApple == 'apple' && appleShow) {
            console.log('appleShow');
            createApplePayButton(params)
          }
        }
      }
      console.log(params.products, '===params====')
    }
    $('#product1').click(function(e) {
      $('.pay-button').addClass('button-opacity')
      $('.appalpay-button').addClass('button-opacity')
      var list = $('#product1,#product2,#product3,#product4')
      list.removeClass('choose-p')

      $('#buy-select2').hide()
      $('#buy-select3').hide()
      $('#buy-select4').hide()
      if (data.attr.attributes.length > 0) {
        $('#buy-select1').show()
      } else {
        $('#buy-select1').hide()
      }
      $('#product1').addClass('choose-p')
      var nprice = currencySymbol + data.package_products[1].new_price.toFixed(2)
      $('#summary-total1').text(nprice)
      var shippingFee = currencySymbol + data.package_products[1].shipping_fee
      $('#summary-total3').text(shippingFee)

      var discount = Number(data.package_products[1].old_price) - Number(data.package_products[0].new_price)
      discount = currencySymbol + discount.toFixed(2)
      $('#summary-total2').text(discount)
      var total = Number(data.package_products[1].new_price) + Number(data.package_products[0].shipping_fee)
      total = currencySymbol + total.toFixed(2)
      $('#summary-total4').text(total)
      $('.product-name').text(data.package_products[1].name)
      $('#product-number').text('number: 1')
      $('#product-price').text(data.package_products[1].tip2)
      initProuctData(1, '1')
      console.log(data.attr.attributes, 'data.attr');
      if (data.attr.attributes.length == 0) {
        crmTrack('add_cart')
        if (countries1 == 'us') {
          if (googlerOrApple == 'google' && googleShow) {
            console.log('googleShow');
            createGoogleButton(params)
          }
          if (googlerOrApple == 'apple' && appleShow) {
            console.log('appleShow');
            createApplePayButton(params)
          }
        }
      }
    })
    $('#product2').click(function(e) {

      var list = $('#product1,#product2,#product3,#product4')
      list.removeClass('choose-p')
      $('#buy-select1').hide()
      $('#buy-select3').hide()
      $('#buy-select4').hide()
      if (data.attr.attributes.length > 0) {
        $('#buy-select2').show()
      } else {
        $('#buy-select2').hide()
      }
      $('#product2').addClass('choose-p')
      var nprice = currencySymbol + data.package_products[0].new_price.toFixed(2)
      $('#summary-total1').text(nprice)
      var shippingFee = currencySymbol + data.package_products[0].shipping_fee
      $('#summary-total3').text(shippingFee)

      var discount = Number(data.package_products[0].old_price) - Number(data.package_products[0].new_price)
      discount = currencySymbol + discount.toFixed(2)
      $('#summary-total2').text(discount)
      var total = Number(data.package_products[0].new_price) + Number(data.package_products[0].shipping_fee)
      total = currencySymbol + total.toFixed(2)
      $('#summary-total4').text(total)
      $('.product-name').text(data.package_products[0].name)
      $('#product-number').text('number: 2')
      $('#product-price').text(data.package_products[0].tip2)
      initProuctData(0, '2')
      if (data.attr.attributes.length == 0) {
        crmTrack('add_cart')
        if (countries1 == 'us') {
          if (googlerOrApple == 'google' && googleShow) {
            console.log('googleShow');
            createGoogleButton(params)
          }
          if (googlerOrApple == 'apple' && appleShow) {
            console.log('appleShow');
            createApplePayButton(params)
          }
        }
      }
    })
    $('#product3').click(function(e) {
      var list = $('#product1,#product2,#product3,#product4')
      list.removeClass('choose-p')
      $('#buy-select2').hide()
      $('#buy-select1').hide()
      $('#buy-select4').hide()
      if (data.attr.attributes.length > 0) {
        $('#buy-select3').show()
      } else {
        $('#buy-select3').hide()
      }

      $('#product3').addClass('choose-p')
      var nprice = currencySymbol + data.package_products[2].new_price.toFixed(2)
      $('#summary-total1').text(nprice)
      var shippingFee = currencySymbol + data.package_products[2].shipping_fee
      $('#summary-total3').text(shippingFee)

      var discount = Number(data.package_products[2].old_price) - Number(data.package_products[0].new_price)
      discount = currencySymbol + discount.toFixed(2)
      $('#summary-total2').text(discount)
      var total = Number(data.package_products[2].new_price) + Number(data.package_products[0].shipping_fee)
      total = currencySymbol + total.toFixed(2)
      $('#summary-total4').text(total)
      $('.product-name').text(data.package_products[2].name)
      $('#product-number').text('number: 3')
      $('#product-price').text(data.package_products[2].tip2)
      initProuctData(2, '3')
      if (data.attr.attributes.length == 0) {
        crmTrack('add_cart')
        if (countries1 == 'us') {
          if (googlerOrApple == 'google' && googleShow) {
            console.log('googleShow');
            createGoogleButton(params)
          }
          if (googlerOrApple == 'apple' && appleShow) {
            console.log('appleShow');
            createApplePayButton(params)
          }
        }
      }
    })
    $('#product4').click(function(e) {
      var list = $('#product1,#product2,#product3,#product4')
      list.removeClass('choose-p')

      $('#buy-select2').hide()
      $('#buy-select3').hide()
      $('#buy-select1').hide()
      if (data.attr.attributes.length > 0) {
        $('#buy-select4').show()
      } else {
        $('#buy-select4').hide()
      }
      $('#product4').addClass('choose-p')
      var nprice = currencySymbol + data.package_products[3].new_price.toFixed(2)
      $('#summary-total1').text(nprice)
      var shippingFee = currencySymbol + data.package_products[3].shipping_fee
      $('#summary-total3').text(shippingFee)

      var discount = Number(data.package_products[3].old_price) - Number(data.package_products[0].new_price)
      discount = currencySymbol + discount.toFixed(2)
      $('#summary-total2').text(discount)
      var total = Number(data.package_products[3].new_price) + Number(data.package_products[0].shipping_fee)
      total = currencySymbol + total.toFixed(2)
      $('#summary-total4').text(total)
      $('.product-name').text(data.package_products[3].name)
      $('#product-number').text('number: 4')
      $('#product-price').text(data.package_products[3].tip2)
      initProuctData(3, '4')
      if (data.attr.attributes.length == 0) {
        crmTrack('add_cart')
        if (countries1 == 'us') {
          if (googlerOrApple == 'google' && googleShow) {
            console.log('googleShow');
            createGoogleButton(params)
          }
          if (googlerOrApple == 'apple' && appleShow) {
            console.log('appleShow');
            createApplePayButton(params)
          }
        }
      }
    })
    $('#complete-btn-id').click(function() {
      $('#loading').show()
      window.is_airwallex = true
      // if (countries1 == 'de') {
      //   $('choose-billing-box').show
      // }
      params.first_name = $('input[name="firstName"]').val()
      params.second_name = $('input[name="lastName"]').val()
      params.email = $('input[name="email"]').val()
      params.phone_full = $('input[name="phone"]').val()
      params.address = $('input[name="shippingAddress1"]').val()
      params.city = $('input[name="shippingCity"]').val()
      params.code = $('input[name="shippingZip"]').val()
      params.country = $('select[name="shippingCountry"]').val()
      params.province = $('select[name="shippingState"]').val()
      var errIsShow = skuIsScelect()
      var emailErr = validateEmail($('input[name="email"]').val())
      console.log(emailErr, 'emailErr');
      var errorShow = params.first_name && params.second_name && params.email && params.phone_full && params.address && params.city && params.code && params.country && params.province && errIsShow && airwallexArr.complete && emailErr
      console.log(airwallexArr, 'airwallexArr');
      console.log(errorShow, 'errorShow')
      if (!errorShow) {
        errDialogShow(errIsShow, emailErr, airwallexArr.complete)
        $('#loading').hide()
        return
      }

      var klarnaSelected = $("#airwallex-klarna").is(":checked");
      var airwallexSelected = $("#payment_method_airwallex").is(":checked");
      if (klarnaSelected) {
        console.log('klarna')
        params.payment_method = 'airwallex_klarna'
      }
      if (airwallexSelected) {
        console.log('airwallex')
        params.payment_method = 'airwallex'
      }
      console.log(params, 'airwallexparams')
      createOrder('', '', 'airwallex')

      // axios.post(postUrl).then(function(res) {
      //     console.log(res, '===res')
      //   })
      //   .catch(function(err) {
      //     console.log(err, 'err==')
      //   })
    })

    function skuIsScelect() {
      var showDialog = true
      if (data.attr.attributes.length > 0 && params.products.length > 0) {
        if (typeof params.products[0] !== 'undefined' && !params.products[0].product_sku) {
          showDialog = false
        }
        if (typeof params.products[1] !== 'undefined' && !params.products[1].product_sku) {
          showDialog = false
        }
        if (typeof params.products[2] !== 'undefined' && !params.products[2].product_sku) {
          showDialog = false
        }
        if (typeof params.products[3] !== 'undefined' && !params.products[3].product_sku) {
          showDialog = false
        }

      }

      return showDialog;
    }

    function createApplePayButton(params) {
      console.log(params, 'applepay');
      var payUrl = '/onebuy/order/add/sync?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime();
      params.payment_method = 'airwallex_apple'
      fetch(payUrl, {
          body: JSON.stringify(params),
          method: 'POST',
          headers: {
            'content-type': 'application/json'
          },
        })
        .then(function(res) {
          return res.json()
        })
        .then(function(res) {
          console.log(res, 'applePayres==');
          if (res.result === 200) {
            const applePayElement = Airwallex.createElement('applePayButton', {
              intent_id: res.payment_intent_id,
              client_secret: res.client_secret,
              amount: {
                value: res.order.base_grand_total,
                currency: res.currency,
              },
              countryCode: 'HK',
              buttonType: 'buy',
              origin: window.location.origin,
            });
            const domApplePay = applePayElement.mount('applePayButton');
            domApplePay.addEventListener('onReady', (event) => {
              $('#applePayButton').removeClass('button-opacity')
              $('.appalpay-button').css('background', '#fff')
              /*
                ... Handle event
              */
              // window.alert(event.detail);
              console.log(event.detail, event, 'applePay ===  ready');
            });
            domApplePay.addEventListener('onSuccess', (event) => {
              /*
                ... Handle event on success
              */
              // window.alert(event.detail);
              console.log(event.detail, event, 'applePay ===  success');

            });
            domApplePay.addEventListener('onError', (event) => {
              /*
                ... Handle event on error
              */
              // window.alert(event.detail);
              console.log(event.detail, event, 'applePay ===  error');
            });
          } else {
            alert(data.error)
          }
        })
        .catch(function(err) {
          console.log(err, 'err==');
        })
    }

    function createGoogleButton(params) {
      console.log(params, 'googlepay');
      var payUrl = '/onebuy/order/add/sync?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime();
      // airwallex_apple
      // airwallex_google
      params.payment_method = 'airwallex_google'
      fetch(payUrl, {
          body: JSON.stringify(params),
          method: 'POST',
          headers: {
            'content-type': 'application/json'
          },
        })
        .then(function(res) {
          return res.json()
        })
        .then(function(res) {
          console.log(res, 'googleres==');
          if (res.result === 200) {
            const googlePayElement = Airwallex.createElement('googlePayButton', {
              intent: {
                // Required, googlePayButton uses intent_id and client_secret to prepare checkout
                id: res.payment_intent_id,
                client_secret: res.client_secret,
              },
              amount: {
                value: res.order.base_grand_total,
                currency: res.currency,
              },
              // countryCode: res.country,
              countryCode: 'HK',
              buttonType: 'buy',
              origin: window.location.origin,
              autoCapture: true,
              merchantInfo: {
                merchantName: 'Airwallex',
              },
            });
            const domGooglePay = googlePayElement.mount('googlePayButton');
            domGooglePay.addEventListener('onReady', (event) => {
              $('#googlePayButton').removeClass('button-opacity')
              $('.pay-button').css('background', '#fff')
              /*
                ... Handle event
              */
              // window.alert(event.detail);
              console.log(event.detail, event, 'googlePay ===  ready');
            });
            domGooglePay.addEventListener('onSuccess', (event) => {
              /*
                ... Handle event on success
              */
              // window.alert(event.detail);
              // console.log(event.detail);
              console.log(event.detail, event, 'googlePay ===  success');
            });
            domGooglePay.addEventListener('onError', (event) => {
              /*
                ... Handle event on error
              */
              // window.alert(event.detail);
              console.log(event.detail);
              console.log(event.detail, event, 'googlePay ===  error');
            });
          } else {
            alert(data.error)
          }
        })
        .catch(function(err) {
          console.log(err, 'err==');
        })
    }
  </script>
  <script>
    function getParams(methods) {
      params.first_name = $('input[name="firstName"]').val()
      params.second_name = $('input[name="lastName"]').val()
      params.email = $('input[name="email"]').val()
      params.phone_full = $('input[name="phone"]').val()
      params.address = $('input[name="shippingAddress1"]').val()
      params.city = $('input[name="shippingCity"]').val()
      params.country = $('select[name="shippingCountry"]').val()
      params.province = $('select[name="shippingState"]').val()
      params.code = $('input[name="shippingZip"]').val()
      params.payment_method = methods
      console.log(params, '++++++params++++');
    }
    $(function() {

      $("#payment_method_airwallex").on("click", function() {
        $('#airwallex-klarna').prop('checked', false);
        $('#payal_standard').prop('checked', false);
        $('#payment_method_airwallex').prop('checked', true);
        $("#complete-btn-id").show();
        console.log("click headingOne ");
        $("#collapseOne").show();
        $("#collapseTwo").hide();
        $("#collapseThree").hide();
        $("#airwallex_dropin_collapse").hide();

        $("#headingOne1").addClass("action");
        $("#headingThree2").removeClass("action");
        $("#headingOne2").removeClass("action");
        $("#airwallex_dropin_2").removeClass("action");
        $("#complete-btn-id").addClass(".complete-btn")
        $("#complete-btn-id").addClass("submit-button");
        $("#complete-btn-id").css({
          width: "100%",
          background: "#1773b0",
          padding: "18px 13px",
          textAlign: 'center'
        });
        $("#complete-btn-id").html("@lang('checkout::app.v2.complete_secure_purchase')");

      });

      $("#airwallex-klarna").on("click", function() {
        $('#airwallex-klarna').prop('checked', true);
        $('#payal_standard').prop('checked', false);
        $('#payment_method_airwallex').prop('checked', false);
        $("#complete-btn-id").show();
        $("#collapseOne").hide();
        $("#collapseTwo").hide();
        $("#collapseThree").show();
        $("#airwallex_dropin_collapse").hide();

        $("#headingThree2").addClass("action");
        $("#headingOne1").removeClass("action");
        $("#headingOne2").removeClass("action");
        $("#airwallex_dropin_2").removeClass("action");
        $("#complete-btn-id").addClass(".complete-btn")
        $("#complete-btn-id").addClass("submit-button");
        $("#complete-btn-id").css({
          width: "100%",
          background: "#1773b0",
          padding: "18px 13px",
          textAlign: 'center'
        });
        $("#complete-btn-id").html("@lang('checkout::app.v2.complete_secure_purchase')");

      })

      $("#payal_standard").on("click", function() {
        $('#airwallex-klarna').prop('checked', false);
        $('#payal_standard').prop('checked', true);
        $('#payment_method_airwallex').prop('checked', false);
        $("#collapseOne").hide();
        $("#collapseTwo").show();
        $("#collapseThree").hide();
        $("#airwallex_dropin_collapse").hide();

        $("#headingOne2").addClass("action");
        $("#headingOne1").removeClass("action");
        $("#headingThree2").removeClass("action");
        $("#airwallex_dropin_2").removeClass("action");

        $("#complete-btn-id").removeClass("submit-button");
        $("#complete-btn-id").removeClass(".complete-btn")
        $("#complete-btn-id").css({
          width: "100%",
          background: "none",
          padding: '0'
        });
        console.log(params, '==========1');
        //payment-button
        $("#complete-btn-id").empty();;
        // var paramsinfo = params
        // console.log(paramsinfo, 'paramsinfo');
        paypal.Buttons({
          style: {
            layout: 'horizontal',
            tagline: false,
            height: 55
          },

          onInit(data, actions) {

            // Disable the buttons
            // actions.disable();

            // Listen for changes to the checkbox
            // document.querySelector('#check').addEventListener('change', function(event) {
            //     // Enable or disable the button when it is checked or unchecked
            //     if (event.target.checked)  {
            //     actions.enable();
            //     } else  {
            //     actions.disable();
            //     }
            // });
            // var params = getOrderParams('paypal_stand');

            var can_paypal = 0;
            var email_can = 0;
            var first_name_can = 0;
            var last_name_can = 0;
            var phone_number_can = 0;
            var address_can = 0;
            var city_can = 0;
            var zip_code_can = 0;



            $(".email").on('change', function() {
              var value = $(".email").val();
              if (value.length > 0) email_can = 1;
              console.log(value);
              if (!params.error) {
                actions.enable();
              }
            });

            $(".first_name").on('change', function() {
              var value = $(".first_name").val();
              if (value.length > 0) first_name_can = 1;
              console.log(value);
              if (!params.error) {
                actions.enable();
              }
            });

            $(".last_name").on('change', function() {
              var value = $(".last_name").val();
              if (value.length > 0) last_name_can = 1;
              console.log(value);
              if (!params.error) {
                actions.enable();
              }
            });
            $(".phone_number").on('change', function() {
              var value = $(".phone_number").val();
              if (value.length > 0) phone_number_can = 1;
              console.log(value);
              if (!params.error) {
                actions.enable();
              }
            });
            $(".address").on('change', function() {
              var value = $(".address").val();
              if (value.length > 0) address_can = 1;
              console.log(value);
              if (!params.error) {
                actions.enable();
              }
            });
            $(".city").on('change', function() {
              var value = $(".city").val();
              if (value.length > 0) city_can = 1;
              console.log(value);
              if (!params.error) {
                actions.enable();
              }
            });
            $(".zip_code").on('change', function() {
              var value = $(".zip_code").val();
              if (value.length > 0) zip_code_can = 1;
              console.log(value);
              if (!params.error) {
                actions.enable();
              }
            });

            $("#state-select").on('change', function() {
              if (!params.error) {
                actions.enable();
              }
            })



            if (params.error) {
              //$('#checkout-error').html(params.error.join('<br />'));
              //$('#checkout-error').show();
              actions.disable();
              //throw new Error('Verification failed');
            } else {
              actions.enable();
            }
          },
          onError(err) {
            $('#loading').hide();
            console.log("paypal " + JSON.stringify(err));
          },
          onCancel: function(data) {
            $('#loading').hide();
          },
          onClick() {
            // var params = getOrderParams('paypal_stand');
            // console.log("on click " + JSON.parse(params));
            console.log(params, 'paypalparams');
            if (params.error) {
              $('#checkout-error').html(params.error.join('<br />'));
              $('#checkout-error').show();
            }

          },

          // Call your server to set up the transaction
          createOrder: function(data, actions) {
            // getParams('paypal_stand')
            var errIsShow = skuIsScelect()
            console.log(params, '==========2', data);
            var emailErr = validateEmail($('input[name="email"]').val())
            console.log(emailErr, 'emailErr');
            var errorShow = $('input[name="firstName"]').val() && $('input[name="lastName"]').val() && $('input[name="email"]').val() &&
              $('input[name="phone"]').val() &&
              $('input[name="shippingAddress1"]').val() && $('input[name="shippingCity"]').val() && $('input[name="shippingZip"]').val() && $('select[name="shippingCountry"]').val() && $('select[name="shippingState"]').val() && errIsShow && emailErr
            console.log(errorShow, 'errorShowpaypal====')
            if (!errorShow) {
              errDialogShow(errIsShow, emailErr)
              $('#loading').hide()
              return
            }
            $('#loading').show();
            crmTrack('add_pay')
            // var params = getOrderParams('paypal_stand');
            var url = '/onebuy/order/addr/after?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime() + "&force=" + localStorage.getItem("force");
            return fetch(url, {
              body: JSON.stringify(params),
              method: 'POST',
              headers: {
                'content-type': 'application/json'
              }
            }).then(function(res) {
              return res.json();
            }).then(function(res) {
              //$('#loading').hide();
              var data = res;
              if (data.statusCode === 201) {
                var order_info = data.result;
                //console.log(order_info);
                //console.log(order_info.purchase_units[0].amount);
                document.cookie = "voluum_payout=" + order_info.purchase_units[0].amount.value + order_info.purchase_units[0].amount.currency_code + "; path=/";
                document.cookie = "order_id=" + order_info.id + "; path=/";
                localStorage.setItem("order_id", order_info.id);
                localStorage.setItem("order_params", JSON.stringify(params));

                return order_info.id;
              } else {
                if (data.code == '202') {
                  if (confirm(data.error) == true) {
                    localStorage.setItem("force", 1);
                  }
                }

                // var pay_error = JSON.parse(data.error);
                var pay_error_message = pay_error.details;

                if (pay_error_message && pay_error_message.length) {
                  var show_pay_error_message_arr = [];

                  for (var pay_error_message_i = 0; pay_error_message_i < pay_error_message.length; pay_error_message_i++) {
                    show_pay_error_message_arr.push("Field:" + pay_error_message[pay_error_message_i].field + "<br /> Value" + pay_error_message[pay_error_message_i].value + '. <br />' + pay_error_message[pay_error_message_i].description + '<br /><br />')
                  }

                  $('#checkout-error').html(show_pay_error_message_arr.join(''));
                  $('#checkout-error').show();
                }
              }


            });
          },

          // Call your server to finalize the transaction
          onApprove: function(data, actions) {
            var orderData = {
              paymentID: data.orderID,
              orderID: data.orderID,
            };
            var paypalParams = {
              first_name: $('input[name="firstName"]').val(),
              second_name: $('input[name="lastName"]').val(),
              email: $('input[name="email"]').val(),
              phone_full: $('input[name="phone"]').val(),
              address: $('input[name="shippingAddress1"]').val(),
              city: $('input[name="shippingCity"]').val(),
              country: $('select[name="shippingCountry"]').val(),
              province: $('select[name="shippingState"]').val(),
              code: $('input[name="shippingZip"]').val(),
              payment_method: 'paypal_stand'
            }
            var request_params = {
              client_secret: data.orderID,
              id: localStorage.getItem('order_id'),
              orderData: orderData,
              data: data,
              params: paypalParams
            }
            console.log(request_params, '===request_params===');
            var url = "/onebuy/order/status?_token={{ csrf_token() }}&currency={{ core()->getCurrentCurrencyCode() }}";
            return fetch(url, {
              method: 'post',
              body: JSON.stringify(request_params),
              headers: {
                'content-type': 'application/json'
              },
            }).then(function(res) {
              return res.json();
            }).then(function(res) {
              $('#loading').hide();
              if (res.success == true) {
                //Goto('/checkout/v1/success/'+localStorage.getItem('order_id'));
                window.location.href = '/onebuy/checkout/v1/success/' + localStorage.getItem('order_id');
                return true;
                //actions.redirect('/checkout/v1/success/'+localStorage.getItem('order_id'));
              }
              if (res.error == 'INSTRUMENT_DECLINED') {

                $('#checkout-error').html("The instrument presented  was either declined by the processor or bank, or it can't be used for this payment.<br><br> Please confirm your account or bank card has sufficient balance, and try again.");
                $('#checkout-error').show();
              }
            });
          }
        }).render('#complete-btn-id');

      });


    });
  </script>
  <!-- <script src="/checkout/v2/js/codebase.min.js" type="text/javascript"></script> -->
  <script src="/checkout/v2/js/sticky-prospect-script.min.js"></script>
  <script src="/checkout/v2/js/custom-extra.js"></script>
  <!-- <script async defer src="js/js"></script> -->
  <script>
    var restricted_countries = 'US,CA'
  </script>
  <script src="/checkout/v2/js/address-auto-complete.min.js"></script>
  <script type="text/javascript" src="/checkout/v2/js/slick.min.js"></script>
  <script type="text/javascript" src="/checkout/v2/js/bookmarkscroll.js"></script>
  <script type="text/javascript" src="/checkout/v2/js/jquery.sticky.js"></script>
  <script type="text/javascript" src="/checkout/v2/js/slick-cust.js"></script>
  <script type="text/javascript" src="/checkout/v2/js/popup.js"></script>
  <!-- <script type="text/javascript" src="js/checkout.js"></script> -->

  <script>
    // var spd = 100
    // var spdVal = 10
    // var cntDown = 5 * 60 * spdVal
    // setInterval(function() {
    //   var mn, sc, ms
    //   cntDown--
    //   if (cntDown < 0) {
    //     return false
    //   }
    //   mn = Math.floor(cntDown / spdVal / 60)
    //   mn = mn < 10 ? '0' + mn : mn
    //   sc = Math.floor((cntDown / spdVal) % 60)
    //   sc = sc < 10 ? '0' + sc : sc
    //   ms = Math.floor(cntDown % spdVal)
    //   ms = ms < 10 ? '0' + ms : ms
    //   var result = mn + ':' + sc
    //   document.getElementById('stopwatch').innerHTML = result
    // }, spd)
    $(function() {
      var width = $(window).innerWidth()
      if (width > 767) {
        var height = $('.right-sec').height()
        console.log(height, 'height===');
        $('.left-sec').css('height', height)
      }
    })

    $('.fieldToggle').click(function() {
      if ($('#togData').prop('checked') == true) {
        $('.shipaddress').slideUp()
      } else if ($('#togData').prop('checked') == false) {
        $('.shipaddress').slideDown()
      }
    })
    $(document).on('click', '.go-rew', async function(evt) {
      if (evt.which) {
        $('html,body').animate({
            scrollTop: $('#iduzu').offset().top,
          },
          '2000'
        )
      }
    })
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.0.4/js/swiper.js"></script>
  <script>
    function closeDialog() {
      $('.dialog-error').hide()
    }
    $(function() {
      var url = '/shopify/v1/api/images/' + getProductId
      axios
        .get(url)
        .then(function(res) {
          var swiperList = ''
          var showimg = ''
          if (res.data.code !== 200) {
            return
          }
          var img = res.data.data.images
          var imgListLength = img.length
          var imglen = Math.floor(imgListLength / 3)
          if (imglen > 3) {
            imglen = 3;
          }
          for (var i = 0; i < img.length; i++) {
            swiperList += `<div class="swiper-slide"><img src="${img[i].src}" ></div>`
          }
          for (var imgi = 0; imgi < imglen; imgi++) {
            var i1 = 0 + imgi * 3,
              i2 = 1 + imgi * 3,
              i3 = 2 + imgi * 3
            showimg += `<div class="grid-cell gallery-item grid-col-span-1">
              <img src="` + img[i1].src + `" alt="">
            </div>
            <div class="grid-cell gallery-item grid-col-span-2">
              <img src="` + img[i2].src + `" alt="">
            </div>
            <div class="grid-cell gallery-item grid-col-span-2">
              <img src="` + img[i3].src + `" alt="">
            </div>`
          }
          $('.grid-container').append(showimg)
          var gallery =
            `<div class="swiper-container" style="width:100%" id="gallery">
					<div class="swiper-wrapper">` +
            swiperList +
            `</div>
				</div>`
          var thumbs =
            `<div class="swiper-container" id="thumbs">
					<div class="swiper-wrapper">` +
            swiperList +
            `</div>
				</div>`
          $('.sw-box').append(gallery, thumbs)

          var mySwiper = new Swiper('#gallery', {
            direction: 'horizontal',
            loop: true,
            autoplay: true,
            allowTouchMove: true,
            //navigation: {
            //nextEl: '.swiper-button-next',
            //prevEl: '.swiper-button-prev',
            //},
            thumbs: {
              swiper: {
                el: '#thumbs',
                slidesPerView: 5,
                spaceBetween: 5,
                watchSlidesVisibility: true,
                loop: true,
              },
              allowTouchMove: true,
              slideThumbActiveClass: 'my-slide-thumb-active',
            },
          })
        })
        .catch(function(error) {
          console.error(error, 'getswiper err')
        })
    })
    $(document).ready(function() {
      $(".faq_view").click(function() {
        $("#collapseContent").slideToggle();
      });
    });

    function payAfterSubmit() {
      $('#pay-after-submit-error').hide()
    }
  </script>
  <script>
    Airwallex.init({
      env: 'prod', // Setup which Airwallex env('staging' | 'demo' | 'prod') to integrate with
      origin: window.location.origin, // Setup your event target to receive the browser events message
    });

    const cardNumber = Airwallex.createElement('cardNumber', {
      allowedCardNetworks: ['visa', 'maestro', 'mastercard', 'amex', 'unionpay', 'jcb']
    });
    const cardExpiry = Airwallex.createElement('expiry');
    const cardCvc = Airwallex.createElement('cvc');

    const domcardNumber = cardNumber.mount('cardNumber'); // This 'cardNumber' id MUST MATCH the id on your cardNumber 
    const domcardExpiry = cardExpiry.mount('cardExpiry'); // Same as above
    const domcardCvv = cardCvc.mount('cardCvc'); // Same as above


    // STEP #7: Add an event listener to ensure the element is mounted
    domcardNumber.addEventListener('onReady', (event) => {
      /*
      ... Handle event
      */
      //window.alert(event.detail);
      // console.log(event.detail);
    });

    // STEP #8: Add an event listener to listen to the changes in each of the input fields
    domcardNumber.addEventListener('onChange', (event) => {
      /*
      ... Handle event
      */
      //window.alert(event.detail);
      console.log(event.detail)
      //console.log(JSON.stringify(event));
      console.log(event.detail.complete)
      if (event.detail.complete == true) {
        airwallexArr.complete = true
        $("#id_card").val(event.detail.complete);
        $("#cardNumber").removeClass("shipping-info-input-error");
      }
      if (event.detail.complete == false) {
        airwallexArr.complete = false
        airwallexArr.errText = event.detail.error.message
        $("#id_card").val(event.detail.complete);
        $("#cardNumber").addClass("shipping-info-input-error");
      }

    });

    domcardExpiry.addEventListener('onChange', (event) => {
      /*
      ... Handle event
      */
      //window.alert(event.detail);
      console.log(event.detail)
      //console.log(JSON.stringify(event));
      console.log(event.detail.complete)
      $("#id_expiry").val(event.detail.complete);

      if (event.detail.complete == true) {
        $("#id_expiry").val(event.detail.complete);
        $("#cardExpiry").removeClass("shipping-info-input-error");
      }

      if (event.detail.complete == false) {
        $("#id_expiry").val(event.detail.complete);
        $("#cardExpiry").removeClass("shipping-info-input-error");
      }
    });

    //id_cvc
    domcardCvv.addEventListener('onChange', (event) => {
      /*
      ... Handle event
      */
      //window.alert(event.detail);
      console.log(event.detail)
      //console.log(JSON.stringify(event));
      console.log(event.detail.complete)
      //$("#id_cvc").val(event.detail.complete);

      if (event.detail.complete == true) {
        $("#id_cvc").val(event.detail.complete);
        $("#cardCvc").removeClass("shipping-info-input-error");
      }

      if (event.detail.complete == false) {
        $("#id_cvc").val(event.detail.complete);
        $("#cardCvc").removeClass("shipping-info-input-error");
      }
    });
  </script>
  <script>
    function creatPaypalCardButton() {
      var that = this
      var FUNDING_SOURCES = [{
        fundingSource: paypal.FUNDING.PAYPAL
      }]

      FUNDING_SOURCES.forEach(function(item) {
        var error_id = item.error_id
        var render_id = item.render_id
        var paypal_type = item.paypal_type
        var fundingSource = item.fundingSource

        paypal
          .Buttons({
            style: {
              layout: fundingSource === paypal.FUNDING.CARD ?
                'vertical' : 'horizontal',
            },
            fundingSource: fundingSource === paypal.FUNDING.CARD ?
              paypal.FUNDING.CARD : undefined,

            // Call your server to set up the transaction
            createOrder: function(data, actions) {
              var errIsShow = skuIsScelect()
              if (!errIsShow) {
                $('.dialog-error .dialog-box ul').empty()
                var textList = `<li>@lang('checkout::app.v2.Please select product information!')</li>`
                $('.dialog-error').show()
                $('.dialog-error .dialog-box ul').append(textList)
                $('#loading').hide()
                return;
              }
              crmTrack('add_pay')
              console.log(data, '==========');
              var url =
                '/onebuy/order/addr/after?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' +
                new Date().getTime() +
                '&force=' +
                localStorage.getItem('force')
              $('#' + (error_id || 'paypal-error')).hide()
              params.payment_method = 'paypal'
              return fetch(url, {
                  body: JSON.stringify(params),
                  method: 'POST',
                  headers: {
                    'content-type': 'application/json',
                  },
                })
                .then(function(res) {
                  return res.json()
                })
                .then(function(res) {
                  //$('#loading').hide();
                  var data = res
                  //console.log(data)
                  if (data.statusCode === 201) {
                    var order_info = data.result
                    //console.log(order_info);
                    //console.log(order_info.purchase_units[0].amount);
                    document.cookie =
                      'voluum_payout=' +
                      order_info.purchase_units[0].amount.value +
                      order_info.purchase_units[0].amount.currency_code +
                      '; path=/'
                    document.cookie = 'order_id=' + order_info.id + '; path=/'
                    localStorage.setItem('order_id', order_info.id)
                    localStorage.setItem(
                      'order_params',
                      JSON.stringify(params)
                    )

                    return order_info.id
                  } else {
                    if (data.code == '202') {
                      if (confirm(data.error) == true) {
                        localStorage.setItem('force', 1)
                      }
                    }

                    var pay_error = JSON.parse(data.error)
                    var pay_error_message = pay_error.details

                    if (pay_error_message && pay_error_message.length) {
                      var show_pay_error_message_arr = []

                      for (
                        var pay_error_message_i = 0; pay_error_message_i < pay_error_message.length; pay_error_message_i++
                      ) {
                        show_pay_error_message_arr.push(
                          'Field:' +
                          pay_error_message[pay_error_message_i].field +
                          '<br /> Value' +
                          pay_error_message[pay_error_message_i].value +
                          '. <br />' +
                          pay_error_message[pay_error_message_i]
                          .description +
                          '<br /><br />'
                        )
                      }

                      $('#' + (error_id || 'paypal-error')).html(
                        show_pay_error_message_arr.join('')
                      )
                      $('#' + (error_id || 'paypal-error')).show()
                    }
                  }
                })
            },

            // Call your server to finalize the transaction
            /**
             * @link https://developer.paypal.com/demo/checkout/#/pattern/server
             *
             */
            onApprove: function(data, actions) {
              //console.log("on app rove");
              if (!data.orderID) {
                throw new Error('orderid is not exisit')
              }
              var orderData = {
                paymentID: data.orderID,
                orderID: data.orderID,
              }
              var request_params = {
                client_secret: data.orderID,
                id: localStorage.getItem('order_id'),
                orderData: orderData,
                data: data,
              }
              var request = ''
              for (var i = 0; i < Object.keys(request_params).length; i++) {
                request +=
                  Object.keys(request_params)[i] +
                  '=' +
                  request_params[Object.keys(request_params)[i]] +
                  '&'
              }
              request = request.substr(0, request.length - 1)
              //console.log(request);

              var url =
                '/onebuy/order/status?_token={{ csrf_token() }}&currency={{ core()->getCurrentCurrencyCode() }}'

              return fetch(url, {
                  method: 'post',
                  body: JSON.stringify(request_params),
                  headers: {
                    'content-type': 'application/json',
                  },
                })
                .then(function(res) {
                  return res.json()
                })
                .then(function(res) {
                  $('#loading').hide()

                  var errorDetail =
                    Array.isArray(res.details) && res.details[0]

                  if (
                    errorDetail &&
                    errorDetail.issue === 'INSTRUMENT_DECLINED'
                  ) {
                    return actions.restart() // Recoverable state, per:
                    // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                  }

                  if (errorDetail) {
                    var msg =
                      'Sorry, your transaction could not be processed.'
                    if (errorDetail.description)
                      msg += '\n\n' + errorDetail.description
                    if (res.debug_id) msg += ' (' + res.debug_id + ')'
                    return alert(msg) // Show a failure message (try to avoid alerts in production environments)
                  }

                  //console.log(res);

                  if (res.success == true) {
                    window.location.href =
                      '/onebuy/checkout/v1/success/' +
                      localStorage.getItem('order_id')
                    return true
                    //actions.redirect('/checkout/v1/success/'+localStorage.getItem('order_id'));
                  }
                  if (res.error == 'INSTRUMENT_DECLINED') {
                    $('#' + (error_id || 'paypal-error')).html(
                      "The instrument presented  was either declined by the processor or bank, or it can't be used for this payment.<br><br> Please confirm your account or bank card has sufficient balance, and try again."
                    )
                    $('#' + (error_id || 'paypal-error')).show()
                  }
                })
            },

            onClick() {},

            onError: function(err) {
              console.log('error from the onError callback', err)

              $('#loading').hide()
            },
            onCancel: function(data) {
              $('#loading').hide()
            },
          })
          .render('#payment-button')
        // .render('#' + (render_id || 'paypal-card-submit'));
      })
    }

    function onCardTokenized(event) {
      $('#loading').hide();
      if (event.token) {
        createOrder(event.token);
      } else {
        $('#checkout-card-error').show();
        document.querySelector(".checkout-content").style.display = "block";
        document.querySelector(".checkout-block").scrollIntoView({
          behavior: "smooth"
        })
      }
    }



    function postOrderPayFailed(pay_type) {
      var order_id = localStorage.getItem('order_id');
      if (order_id) {
        var url = '/order/pay/fail_notice';
        var params = {
          id: order_id,
          pay_type: pay_type,
        };
        fetch(url, {
          body: JSON.stringify(params),
          method: 'POST',
          headers: {
            'content-type': 'application/json'
          },
        })
      }
    }
    $(".email").on("focus", function() {
      //console.log("email focus");
    });

    function checkout() {
      sendInitiateCheckoutEvent();
      var pay_type = 'worldpay';
      // var params = getOrderParams(pay_type);
      if (params.error && params.error.length) {
        $('#checkout-error').html(params.error.join('<br />'));
        $('#checkout-error').show();
        return;
      }

      $('#checkout-error').hide();



      if (window.is_checkout_pay) {
        Frames.submitCard();
        Frames.enableSubmitForm();
      } else if (window.is_wintopay) {
        cc_form.submit('/post', {}, function(status, data) {
          $('#loading').hide();
          createOrder('', '', 'wintopay', data.json);
        }, function(err) {
          $('#loading').hide();
          console.log(err);
        });
      } else if (window.is_pacypay) {
        createOrder('', '', 'pacypay');
      } else if (window.is_worldpay) {
        createOrder('', '', 'worldpay');
      } else if (window.is_paypal_standard) {
        createOrder('', '', 'paypal_standard');
      } else if (window.is_airwallex_klarna) {
        createOrder('', '', 'airwallex_klarna');
      } else if (window.is_airwallex) {
        $('#airwallex-warpper').hide();
        createOrder('', '', 'airwallex');
      } else if (window.is_stripe_local) {
        if (typeof changeStripeAcc == 'function') {
          changeStripeAcc('viusd')
        }
        createOrder('', '', 'stripe_local');
        $('.pay-after-submit-button').hide();
      } else {
        stripeCreateOrderBefore(createOrder, params, function(error) {
          $('#loading').hide();
          $('#checkout-error').html(error);
          $('#checkout-error').show();
        });
        // createOrder('', 'stripe_charge_token', 'stripe');
        // stripe.createToken(cardNumber).then(function(result) {
        //     if (result.error) {
        //         // Inform the customer that there was an error.
        //         $('#checkout-error').html(result.error.message+'<br /><br />');
        //         $('#checkout-error').show();
        //         $('#loading').hide();
        //     } else {
        //         // Send the token to your server.
        //         createOrder(result.token.id, 'stripe_charge_token', 'stripe');
        //     }
        // });
      }
    }

    function createOrder(token, token_field = "checkout_frames_token", pay_type = "checkout", card = {}) {

      // var params = getOrderParams(pay_type);
      //return false;
      if (token) {
        params[token_field] = token;
      }

      if (Object.keys(card).length) {
        params['card'] = card;
      }

      params['pay_type'] = pay_type;
      //console.log(JSON.stringify(params));
      //return false;

      var url = '/onebuy/order/add/sync?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime();

      if (pay_type == "payoneer" || pay_type == 'pacypay') {
        url = '/order/add/async?time=' + new Date().getTime();
      }
      console.log(params, '===params====')
      fetch(url, {
          body: JSON.stringify(params),
          method: 'POST',
          headers: {
            'content-type': 'application/json'
          },
        })
        .then(function(res) {
          return res.json()
        })
        .then(function(res) {
          crmTrack('add_pay')
          var data = res;
          //console.log(data);
          if (data.result === 200) {

            var order_info = data.order;

            //console.log(order_info);
            //console.log(window.is_airwallex_klarna);

            if (window.is_paypal_standard) {
              var paypal_form = '<form action="' + data.pay_url + '" method="post" style="display:none" >';
              //console.log(data.form);
              $.each(data.form, function(k, v) {

                if (k == 'cancel_return') v = window.location.href;

                /// do stuff
                paypal_form += '<input type="hidden" name="' + k + '" value="' + v + '">';
              });
              // 
              paypal_form += '</form>';
              //console.log(paypal_form);
              $(paypal_form).appendTo('body').submit();
              return false;
            }

            if (window.is_airwallex_klarna) {

              document.cookie = "voluum_payout=" + order_info.grand_total + order_info.order_currency_code + "; path=/";
              document.cookie = "order_id=" + order_info.id + "; path=/";
              localStorage.setItem("order_id", order_info.id);
              localStorage.setItem("order_params", JSON.stringify(params));

              url = "/onebuy/order/confirm?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&payment_intent_id=" + data.payment_intent_id + "&order_id=" + data.order.id;
              fetch(url, {
                  method: 'GET',
                  headers: {
                    'content-type': 'application/json'
                  }
                }).then(function(res) {
                  return res.json()
                })
                .then(function(res) {

                  //console.log(res);

                  //console.log(res.payment.next_action.url);

                  Goto(res.payment.next_action.url);

                });

              return false;


            }

            document.cookie = "voluum_payout=" + order_info.grand_total + order_info.order_currency_code + "; path=/";
            document.cookie = "order_id=" + order_info.id + "; path=/";
            localStorage.setItem("order_id", order_info.id);
            localStorage.setItem("order_params", JSON.stringify(params));


            if (window.is_airwallex) {

              document.querySelector(".submit-button").scrollIntoView({
                behavior: "smooth"
              })

              Airwallex.confirmPaymentIntent({
                element: cardNumber,
                id: data.payment_intent_id,
                client_secret: data.client_secret,
                payment_method: {
                  billing: {
                    email: data.billing.email,
                    first_name: data.billing.first_name,
                    last_name: data.billing.last_name,
                    // date_of_birth: '1990-01-01',
                    // phone_number: '13999999999',
                    address: {
                      city: data.billing.city,
                      country_code: data.billing.country,
                      postcode: data.billing.postcode,
                      state: data.billing.state,
                      street: data.billing.address1
                    }
                  }
                }

              }).then((response) => {

                $('#loading').hide();

                window.location.href = "/onebuy/checkout/v1/success/" + data.order.id;
                return false;

              }).catch((response) => {
                $('#loading').hide();
                console.log("catch");
                console.log(JSON.stringify(response))

                alert(response.message)
                $('#checkout-error').html(response.message + '<br /><br />');
                $('#checkout-error').show();

                return false;

              });
            }
          } else {
            console.log('else====');
            $('#loading').hide();
            var pay_error = data.error;

            if (pay_error && pay_error.length) {
              $('#checkout-error').html(pay_error.join('<br />') + '<br /><br />');
              $('#checkout-error').show();
            }
          }
        })
        .catch(function(err) {
          $('#loading').hide();
        })
    }

    // function createGooglePay() {

    // }

    function getPhonePrefix() {
      return '';
      var country = $("#country-select").val();

      for (var i = 0; i < window.countries.length; i++) {
        if (window.countries[i].countryCode == country) {
          return window.countries[i].phonePrefix;
        }
      }

      return '';
    }

    function checkoutProducts(params) {
      console.log(params);
      return false;
      var products = params.products;
      for (var i = 0; i < products.length; i++) {
        if (!products[i].product_sku) {
          return ["Attribute cannot be empty, please select your product"]
        }
      }

      try {
        if (isProductSoldOut && isProductSoldOut()) {
          return ["Sorry, the Attributes you selected is sold out, please select again"]
        }
      } catch (err) {

      }

      return false;
    }

    function checkoutAmount(params) {
      let product_amount = 0;
      for (let i = 0; i < params.products.length; i++) {
        let product = params.products[i];
        product_amount += product.amount * 1;
      }

      var params_amount = params.amount;

      if (params_amount != product_amount) {
        return ["The actual quantity of the product does not match the selected quantity, please re-select the quantity and attributes of the product."];
      }

      return false;
    }

    function clearError() {
      $('.shipping-info-item input, .shipping-info-item select').each(function() {
        $(this).removeClass('shipping-info-input-error');
        $(this).parent().find('.shipping-info-error').hide();
      })
    }

    function checkoutName(input) {
      var name = $(input).val();
      name = name.replace(/\，|\,|\—|\-|\.|\。|[0-9]/g, '');
      $(input).val(name);
    }

    function checkoutCity(input) {
      var city = $(input).val();
      city = city.replace(/\，|\,|\—|\-|\.|\。|[0-9]/g, '');
      $(input).val(city);
    }

    function checkOrderParams(params, is_chain_payment, cancel_check_scroll) {
      clearError();
      var has_error = false;
      var error_log = [],
        show_error = [];
      if (!params.first_name) {
        has_error = true;
        showError('first_name-error', "This field is required.");
        error_log.push('first_name is empty');
      }
      if (!params.second_name) {
        has_error = true;
        showError('last_name-error', "This field is required.");
        error_log.push('second_name is empty');
      }
      if (!params.email) {
        has_error = true;
        showError('email-error', "This field is required.");
        error_log.push('email is empty');
      }

      var email_format = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/
      if (!email_format.test(params.email)) {
        has_error = true;
        showError('email-error', "Please enter a valid email address.");
        error_log.push('email is Invaild');
      }

      if (!params.phone_full) {
        has_error = true;
        showError('phone_number-error', "This field is required.");
        error_log.push('phone_full is empty');
      }

      // var phone_format = /^[0-9\+\-\(\)\s]+$/;
      // if(!phone_format.test(params.phone_full)){
      //     has_error = true;
      //     showError('phone_number-error',  "Please enter valid phoneNumber");
      //     error_log.push('phone_full is Invaild');
      // }

      if (!params.country) {
        has_error = true;
        showError('country-error', "This field is required.");
        error_log.push('country is empty');
      }
      if (!params.city) {
        has_error = true;
        showError('city-error', "This field is required.");
        error_log.push('city is empty');
      }
      if (window.states) {
        if (!params.province) {
          has_error = true;
          showError('state-error', "This field is required.");
          error_log.push('province is empty');
        }
      }
      if (!params.address) {
        has_error = true;
        showError('address-error', "This field is required.");
        error_log.push('address is empty');
      }
      if (!params.code) {
        has_error = true;
        showError('zip_code-error', "This field is required.");
        error_log.push('code is empty');
      }

      var code_format = new RegExp(getCountriesField('codeFormat'));
      if (code_format && !code_format.test(params.code)) {
        has_error = true;
        showError('zip_code-error', "Please enter valid zip/postcode ");
        error_log.push('code is invaild');
      }

      // do the bill address info
      if (params.shipping_address == "other") {
        if (!params.bill_first_name) {
          has_error = true;
          showError('first_name-error', "This field is required.");
          error_log.push('Bill first_name is empty');
        }
        if (!params.bill_second_name) {
          has_error = true;
          showError('last_name-error', "This field is required.");
          error_log.push('Bill second_name is empty');
        }
        if (!params.bill_country) {
          has_error = true;
          showError('bill-country-error', "This field is required.");
          error_log.push('Bill country is empty');
        }
        if (!params.bill_city) {
          has_error = true;
          showError('bill-city-error', "This field is required.");
          error_log.push('Bill city is empty');
        }
        if (window.bill_states) {
          if (!params.province) {
            has_error = true;
            showError('bill-state-error', "This field is required.");
            error_log.push('Bill province is empty');
          }
        }
        if (!params.bill_address) {
          has_error = true;
          showError('bill-address-error', "This field is required.");
          error_log.push('Bill address is empty');
        }
        if (!params.bill_code) {
          has_error = true;
          showError('bill-zip_code-error', "This field is required.");
          error_log.push('Bill code is empty');
        }
      }

      if (has_error) {
        show_error.push("Your Info is invaild");
        if (!cancel_check_scroll) {
          document.querySelector(".shipping-tip").scrollIntoView({
            behavior: "smooth"
          })
        }
      }

      if ((params.payment_method == 'checkout' && !Frames.isCardValid()) || (params.payment_method == 'stripe' && !(window.card_number_vaild && window.card_expriy_vaild && window.card_cvc_vaild)) || (params.payment_method == 'wintopay' && !cc_form_obj.isValid())) {
        has_error = true;
        error_log.push('card is invaild');
        show_error.push("Your Card Info is invaild");
        $('#checkout-card-error').show();
        document.querySelector(".checkout-content").style.display = "block";
        if (!cancel_check_scroll) {
          document.querySelector(".checkout-block").scrollIntoView({
            behavior: "smooth"
          })
        }
      }

      if (has_error) {
        error_log.push({
          params: params
        });
        //fetchCheckoutError(error_log);
      }

      return has_error && show_error
    }

    function showError(id, error_log) {
      $('#' + id).html(error_log);
      $('#' + id).show();
      $('#' + id).parent().find('input').addClass("shipping-info-input-error");
    }

    function getSubmitProducts(total, amount) {
      var unit_price = (total / amount).toFixed(4);

      var skus = [];
      var attribute_item = $('.attribute-select .attribute-item');
      var sku_maps = getSKuMaps();

      // console.log("sku maps");
      // console.log(sku_maps);

      // console.log("attribute_item");
      // console.log(attribute_item);
      // console.log("attribute_item");

      for (var i = 0; i < attribute_item.length; i++) {
        var sku_key_arr = [];
        var img_key = '';
        var attribute_select = $(attribute_item[i]).find('.attribute_select');
        for (var j = 0; j < attribute_select.length; j++) {
          sku_key_arr.push($(attribute_select[j]).val());
          if ($(attribute_select[j]).data('has-img')) {
            img_key = $(attribute_select[j]).val();
          }
        }

        var sku = {};
        if (sku_maps[sku_key_arr.join('_')]) {
          sku = JSON.parse(JSON.stringify(sku_maps[sku_key_arr.join('_')]));
        }
        sku['img'] = getAttributeImg(img_key);
        skus.push(sku);
      }

      console.log("product skus");
      console.log(skus);

      var products = [],
        product_sku_map = {};

      for (var m = 0; m < skus.length; m++) {
        console.log("skus length" + skus.length);
        if (product_sku_map[skus[m].sku_id]) {
          products[product_sku_map[skus[m].sku_id] - 1].amount++;
        } else {
          if (skus[m].sku_id == "" || skus[m].sku_id == null || skus[m].sku_id == undefined) {
            alert("please select product color and size");
            return false;
          }
          var sku = {
            img: skus[m].img,
            price: unit_price,
            amount: 1,
            description: skus[m].name,
            product_id: '3167',
            product_sku: skus[m].sku_code,
            variant_id: skus[m].sku_id,
            attribute_name: skus[m].attribute_name,
            attr_id: skus[m].attr_id
          };
          products.push(sku);
          product_sku_map[skus[m].sku_id] = products.length;
        }
      }

      return products
    }

    function turnByCreatA(link, order_id) {
      var a = document.createElement("a");
      a.href = link;
      document.body.appendChild(a);
      a.click();
      a.remove();
    }

    function Goto(url, no_request) {
      var order_id = localStorage ? localStorage.getItem('order_id') : null;
      try {
        var userAgent = navigator && navigator.userAgent;
        var link = url;
        if (!no_request) {
          link += "&" + GetRequest();
        }

        window.top.location.assign(link);
        returnValueClear(order_id);

        window.turn_inter = setTimeout(function() {
          window.top.location.href = link;
          returnValueClear(order_id);
        }, 1000)

        window.no_href_turn_inter = setTimeout(function() {
          window.top.location = link;
          returnValueClear(order_id);
        }, 2000)

        window.a_turn_inter = setTimeout(function() {
          turnByCreatA(link, order_id);
          returnValueClear(order_id);
        }, 3000)

        window.no_top_turn_inter = setTimeout(function() {
          window.location.href = link;
          returnValueClear(order_id);
        }, 4000)
      } catch (error) {
        window.top.location.href = url + "&" + GetRequest();
      }

    }

    function returnValueClear(order_id) {
      if (window.event && window.event.returnValue) {
        window.event.returnValue = false;
      }
    }

    function getCountriesField(field) {
      var country = $("#country-select").val();

      for (var i = 0; i < window.countries.length; i++) {
        if (window.countries[i].countryCode == country) {
          return window.countries[i][field];
        }
      }

      return '';
    }

    window.onpageshow = function() {
      clearTimeout(window.turn_inter);
      clearTimeout(window.no_href_turn_inter);
      clearTimeout(window.a_turn_inter);
      clearTimeout(window.no_top_turn_inter);
    }
  </script>
</body>

</html>