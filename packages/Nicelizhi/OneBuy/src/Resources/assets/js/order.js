function setAttributeTemplate(select_language,select_language_after,has_img_attribute_id,is_more_attribute,template,attribute_err_language){var product_attributes=JSON.parse(JSON.stringify(window.product_attributes));var product_template='<div class="attribute-item">';if(is_more_attribute){product_template+='<div class="attribute-item-title">{article}</div>';}
var show_image='';for(var i=0;i<product_attributes.length;i++){var product_attribute=product_attributes[i];product_template+='<div class="attribute_item_wrapper">';product_template+='<div class="attribute-value-item-title">'+select_language+' '+(product_attribute.name||'')+select_language_after;if(product_attribute.tip){product_template+=' <span style="text-decoration: underline;font-size: 14px;cursor:pointer;color:#0000ff;" onclick="showImgProp(&quot;'+product_attribute.tip_img+'&quot;)">'+product_attribute.tip+'</span>'}
product_template+='</div>';product_template+='<select class="attribute-value-item-select attribute_select" onchange="attributeChange(this, '+(product_attribute.id==has_img_attribute_id)+', '+"'"+template+"'"+')" '+(product_attribute.id==has_img_attribute_id?' data-has-img="true"':'')+'><option value="" '+(!product_attribute.selected_option_id?'selected':'')+' url="'+product_attribute.options[0].image+'"></option>';if(product_attribute.id==has_img_attribute_id&&!product_attribute.selected_option_id){show_image=product_attribute.options[0].image;}
for(var j=0;j<product_attribute.options.length;j++){var product_attribute_option=product_attribute.options[j];product_template+='<option value="'+product_attribute_option.name+'" '+(product_attribute_option.id==product_attribute.selected_option_id?'selected':'')+' url="'+product_attribute_option.image+'" '+(product_attribute_option.is_sold_out?' data-is-sold-out="true" ':'')+'>'+product_attribute_option.name+'</option>';if(product_attribute_option.id==product_attribute.selected_option_id&&product_attribute.id==has_img_attribute_id){show_image=product_attribute_option.image;}}
product_template+='</select>';if(template=='common15'){product_template+='<p class="attribute-err">'+attribute_err_language+'</p>'}
product_template+='</div>';if(product_attribute.id==has_img_attribute_id&&show_image){product_template+='<div class="img-wrapper"><img src="'+show_image+'" /></div>'}}
window.product_template=product_template;}
function getCurAttributeSelect(article_str){if(!article_str){article_str='PAIR';}
var amount=$('.attribute-select .attribute-item').length+1;return window.product_template.replace('{article}',article_str+' '+amount)}
function showAttributeSelecet(article_str){var product_info=getSelectProduct();if(!product_info){setTimeout(function(){showAttributeSelecet();},100)
return;}
var cur_amount=$('.attribute-select .attribute-item').length;var product_amount=product_info.amount;var handle=null;if(product_amount-cur_amount>0){handle=function(){$('.attribute-select').append(getCurAttributeSelect(article_str));}}else{handle=function(){$('.attribute-select .attribute-item')[$('.attribute-select .attribute-item').length-1].remove();}}
for(var i=0;i<Math.abs(product_amount-cur_amount);i++){handle();}}
function attributeChange(target,is_img_attribute,template){if(template=='common5'){changeHtmlShow();}
if(template=='common15'&&isProductSoldOut){isProductSoldOut();}
if(is_img_attribute){var attribute_img=$(target).find('option:selected').attr('url');$(target).parent().next().find('img').attr('src',attribute_img);}}
function isProductSoldOut(){var is_sold_out=false;var attribute_item=$('.attribute-select .attribute-item');for(var i=0;i<attribute_item.length;i++){var option_select=$(attribute_item[i]).find('.attribute_select  option:selected');for(var j=0;j<option_select.length;j++){$(option_select[j]).parent().parent().find('.attribute-err').hide();if($(option_select[j]).data('is-sold-out')){$(option_select[j]).parent().parent().find('.attribute-err').show();is_sold_out=true;}}}
return is_sold_out;}
function getQueryString(name){var reg=new RegExp('(^|&)'+name+'=([^&]*)(&|$)','i');var r=window.location.search.substr(1).match(reg);if(r!=null){return unescape(r[2]);}
return null;}
function GetRequest(){var url=location.search;var theRequest=new Object();if(url.indexOf("?")!=-1){if(url.indexOf('cko-session-id')>-1){var new_url=url.substr(1);var new_url_arr=new_url.split('&');for(var new_url_arr_index=0;new_url_arr_index<new_url_arr.length;new_url_arr_index++){var new_url_one=new_url_arr[new_url_arr_index];if(new_url_one.indexOf('cko-session-id')>-1){new_url_arr.splice(new_url_arr_index,1);}}
url='?'+new_url_arr.join('&');}
return url.substr(1);}
return '';}
function showImgProp(img){console.log('showImgProp');document.getElementById('prop-img').src=img;document.getElementById('img-prop').style.display='block';}
function hideImgProp(){document.getElementById('img-prop').style.display='none';}
function GotoNotRequest(url){try{var userAgent=navigator&&navigator.userAgent;var link=url;window.top.location.assign(link);returnValueClear();window.turn_inter=setTimeout(function(){window.top.location.href=link;returnValueClear();},1000)
window.no_href_turn_inter=setTimeout(function(){window.top.location=link;returnValueClear();},2000)
window.a_turn_inter=setTimeout(function(){turnByCreatA(link,order_id);returnValueClear();},3000)
window.no_top_turn_inter=setTimeout(function(){window.location.href=link;returnValueClear();},4000)}catch(error){window.top.location.href=url;}}