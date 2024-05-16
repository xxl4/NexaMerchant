<!-- FAQ -->
<style>
    @media only screen and (max-width: 600px) {

    }
    h1,h2,h3,h4,h5,h6{
        font-weight: 700;
    }
 
    #i71q{
      position: fixed;
      top: 0;
      z-index: 20
    }
    #swiper1 {
      width: 100%;
      /* height: auto; */
    }
    #swiper2 {
       width: 100%;
      height: 1305px;
    }
    
    .swiper-slide{
      padding: 0 10px;
    }
  
    .mb1 {
      margin-bottom: 1px;
    }
    .cardimage{
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
      margin: 15px 0;
      overflow-y: auto;
      font-size: 16px;
    }
    #seeFaqBtn{
      text-align: center;
      padding: 20px;
      font-size: 24px;
      color: #333;
    }
    #seeFaqBtn span{
      cursor: pointer;
      text-decoration: underline;
    }
    /* 初始状态下隐藏内容 */
    #collapseContent {
       display: none;
       /* background-color: rgb(213, 218, 203); */
   }
   #faq-question{
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
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }
    .panel-group .panel {
        margin-bottom: 0;
        border-radius: 4px;
    }

    .panel-default {
        border-color: #ddd;
    }
    .panel-default>.panel-heading {
        color: #333;
        background-color: #f5f5f5;
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
        border-top-color: #ddd;
    }

    .panel-group .panel-heading+.panel-collapse>.list-group, .panel-group .panel-heading+.panel-collapse>.panel-body {
        border-top: 1px solid #ddd;
    }
    .panel-body {
        padding: 15px;
    }
  </style>

<div class="faq-content">
    <div id="seeFaqBtn">@lang('onebuy::app.product.order.Frequently Asked Questions') <span class="faq_view">@lang('onebuy::app.product.order.See Our FAQs')</span></div>
     <div id="faq-text">
  
      <div id="collapseContent">
  
        <?php foreach($faqItems as $key=>$item) {
            $item = json_decode($item);    
        ?>


        <div class="panel-group" id="accordion<?php echo $key;?>" role="tablist" aria-multiselectable="true">
  
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a class="faq-question" role="button" data-toggle="collapse" data-parent="#accordion<?php echo $key;?>" href="#faq<?php echo $key;?>" aria-expanded="true" aria-controls="faq<?php echo $key;?>" style="color: #333;text-decoration:none">
                    <?php echo $item->q;?>
                </a>
              </h4>
            </div>
            <div id="faq<?php echo $key;?>" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <?php echo $item->a;?>
              </div>
            </div>
          </div>
  
        </div>
  
        <?php } ?>
  
      </div>
  
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $(".faq_view").click(function(){
        $("#collapseContent").slideToggle();
      });
    });
 </script>
