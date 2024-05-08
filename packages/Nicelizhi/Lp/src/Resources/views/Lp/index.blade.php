<?php 
echo $html->html;
?>

<script type="text/javascript">
  function goto() {
    var url = "<?php echo isset($html->goto_url) ? $html->goto_url : ''; ?>";
    window.location.href = url;
  }
</script>


<script type="text/javascript">
  (function(c,l,a,r,i,t,y){
      c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
      t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
      y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
  })(window, document, "clarity", "script", "kruepex7cm");
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gtag; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  <?php if(empty($refer)) { ?>
    gtag('config', '<?php echo $gtag; ?>',{"debug_mode": true});
<?php }else { ?>
  gtag('config', '<?php echo $gtag; ?>', {"user_id": "<?php echo $refer;?>","debug_mode": true});
<?php } ?>

gtag('event','product_page_view');

</script>
<?php if(!empty($ob_adv_id)) { ?>

  <?php 
    $ob_adv_ids = explode(',', $ob_adv_id); 
    foreach($ob_adv_ids as $key=>$ob_adv_id) {
?>

<script data-obct type = "text/javascript">
/** DO NOT MODIFY THIS CODE**/
!function(_window, _document) {
    var OB_ADV_ID = '<?php echo $ob_adv_id; ?>';
    if (_window.obApi) {
    var toArray = function(object) {
        return Object.prototype.toString.call(object) === '[object Array]' ? object : [object];
    };
    _window.obApi.marketerId = toArray(_window.obApi.marketerId).concat(toArray(OB_ADV_ID));
    return;
    }
    var api = _window.obApi = function() {
    api.dispatch ? api.dispatch.apply(api, arguments) : api.queue.push(arguments);
    };
    api.version = '1.1';
    api.loaded = true;
    api.marketerId = OB_ADV_ID;
    api.queue = [];
    var tag = _document.createElement('script');
    tag.async = true;
    tag.src = '//amplify.outbrain.com/cp/obtp.js';
    tag.type = 'text/javascript';
    var script = _document.getElementsByTagName('script')[0];
    script.parentNode.insertBefore(tag, script);
}(window, document);

obApi('track', 'PAGE_VIEW');
</script>
<?php } } ?>