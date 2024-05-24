{{ csrf_token() }}
{{ app()->getLocale() }}
{{ core()->getCurrentCurrencyCode() }}


{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}

<?php 
echo $slug;
?>