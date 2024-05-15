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