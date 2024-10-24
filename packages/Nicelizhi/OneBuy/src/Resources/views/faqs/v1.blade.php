<style type="text/css">
    #accordion {
        border-bottom-color: rgb(0, 0, 0);
        border-bottom-style: none;
        border-bottom-width: 0px;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: rgb(0, 0, 0);
        border-left-style: none;
        border-left-width: 0px;
        border-right-color: rgb(0, 0, 0);
        border-right-style: none;
        border-right-width: 0px;
        border-top-color: rgb(0, 0, 0);
        border-top-style: none;
        border-top-width: 0px;
        box-sizing: border-box;
        border-width: thin;
        border-style: solid;
        border-color: rgb(222, 222, 222);
        background-color: rgba(0, 0, 0, 0.043);
    }
    a:hover,a:focus{
        text-decoration: none;
        outline: none;
    }
    #accordion .panel{
        border: none;
        box-shadow: none;
        border-radius: 0;
        margin-bottom: -5px;
        font-family: "Poppins";
    }
    #accordion .panel-heading{
        padding: 0;
        border-radius: 0;
        border: none;
        text-align: center;
        /* padding-top: 10px; */
    }
    #accordion .panel-title {
        background-color:rgb(255, 255, 255);
        border-block-start-color: rgb(222, 222, 222);
        border-block-start-style: solid;
        border-block-start-width: 0.666667px;
        border-top-color: rgb(222, 222, 222);
        border-top-style: solid;
        border-top-width: 0.666667px;
        box-sizing: border-box;
    }

    #accordion .action {

    }

    #accordion .panel-title .panel-title-header {
        display: block;
        padding: 17px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #000;
        /* background: rgb(240, 245, 255); */
        /* border: 1px solid #0d6efd; */
        position: relative;
        width: 100%;
        text-align: left;
    }
    #accordion .panel-title a:hover{
        /* background: rgb(23, 115, 176); */
    }

    #accordion .panel-title .action {
        background: rgb(240, 245, 255);
        border: 1px solid #0d6efd;
    }
    
    #accordion .panel-title a.collapsed:after{
        transform: rotate(0deg);
    }
    #accordion .panel-body{
        /* background: #167ea0; */
        padding: 10px; 
        border: none;
        position: relative;
        /* border: 1px solid cadetblue; */
    }
    #accordion .panel-body p{
        font-size: 14px;
        color: #fff;
        line-height: 25px;
        background: #3296b7;
        padding: 30px;
        margin: 0;
    }
    #accordion .panel-collapse .panel-body p{
        opacity: 0;
        transform: scale(0.9);
        transition: all 0.5s ease-in-out 0s;
    }
    #accordion .panel-collapse.in .panel-body p{
        opacity: 1;
        transform: scale(1);
    }
    #accordion a {
        text-decoration: auto;
    }
    #accordion .panel-collapse {
        /* background-color: rgba(0, 0, 0, 0.043); */
    }
</style>
<div id="block--faq" class="faqs col-md-5 bg-white border p-3">
    <div class="h2 text-center mb-4" style="font-family: oswald;">
         @lang('onebuy::app.product.order.Frequently Asked Questions')
    </div>
    <div class="accordion accordion-flush" id="faqs">
    <?php foreach($faqItems as $key=>$item) {
        $item = json_decode($item);    
    ?>
    
        <div class="accordion-item">
            <h2 class="accordion-header" id="compatability">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $key;?>" <?php if($key==1) { ?> aria-expanded="true" <?php } ?> aria-controls="faq<?php echo $key;?>">
                    <?php echo $item->q;?>
                </button>
            </h2>
            <div id="faq<?php echo $key;?>" class="accordion-collapse collapse <?php if($key==1) { ?>show<?php } ?>" aria-labelledby="compatability" data-bs-parent="#faqs">
                <div class="accordion-body" style="font-size:14px;">
                    <?php echo $item->a;?>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>