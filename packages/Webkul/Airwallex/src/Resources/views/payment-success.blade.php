<script>
    function getQueryString(name) {
        var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
        var r = window.location.search.substr(1).match(reg);

        if (r != null) {
        return unescape(r[2]);
        }
        return null;
    }
    var order = JSON.parse(localStorage.getItem('order_params'));
    var order_id = localStorage.getItem("order_id");
    console.log(order);
    console.log(order_id)
    var awx_return_result = getQueryString('awx_return_result')
    if(awx_return_result=='success') {
        window.location.href="/checkout/v1/success/"+order_id;
    }else{
        //alert("Have Error");
        window.location.href=order.payment_cancel_url;
    }
</script>