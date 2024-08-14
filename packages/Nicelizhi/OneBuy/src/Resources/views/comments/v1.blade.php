<div class="col-md-6 col-lg-6">

    <div id="block--reviews" class="reviews">

        <div class="step-title">

                @lang('onebuy::app.product.order.What customers are saying about')
        </div>

        <hr class="mt-2">
        <!-- NEW TESTIMONIAL SECTION STARTS HERE -->
        <div class="testi-sec" style="">
        <?php foreach($comments as $key=>$comment) { 
            $comment = json_decode($comment);    
            //var_dump($comment);exit;
        ?>
            <div class="testi-row" style="justify-content:left;">
                <div class="testi-row-lft" style="width:180px;">
                    <div class="testi-lft-abt">
                        <p class="testi-pics"><?php echo substr($comment->name, 0, 1);?></p>
                        <p class="t-name"><?php echo $comment->name;?></p>
                        <p class="t-vryfd">
                            <img src="/checkout/v1/app/desktop/images/vrfy-seal-c.png" alt=""> Verified Buyer
                        </p>
                    </div>
                    <div class="test-prod" style="">
                        <div class="t-prod-dv">
                            <img src="/checkout/v1/app/desktop/images/t-prod1.jpg" alt="">
                        </div>
                    </div>
                </div>
                
                <div class="testi-row-rght">
                    <span><?php echo $comment->title;?></span>
                    <img src="/checkout/v1/app/desktop/images/star.png" class="t-star">
                    <p class="testi-paragraph" style="font-size:14px;line-height:18px;"><?php echo $comment->content;?></p>
                    
                </div>
            </div>

        <?php } ?>
            
        </div>
        <!-- NEW TESTIMONIAL SECTION STARTS HERE -->

    </div>

</div>