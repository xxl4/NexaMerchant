window.worldpay={};function addWorlpayScript(){var script=document.createElement('script');script.setAttribute('type','text/javascript');script.setAttribute('src','https://payments.worldpay.com/resources/hpp/integrations/embedded/js/hpp-embedded-integration-library.js');document.getElementsByTagName('head')[0].appendChild(script);}
function worldpayInit(params){worldpayDestroy();var customOptions={iframeHelperURL:params.helper_html,url:params.redirect_url,type:'iframe',inject:'immediate',target:params.target,accessibility:true,debug:false,language:params.language,country:params.country.toLowerCase(),};if(params.success_url){customOptions['successURL']=params.success_url;}
if(params.cancel_url){customOptions['cancelURL']=params.cancel_url;}
if(params.failure_url){customOptions['failureURL']=params.failure_url;}
if(params.pending_url){customOptions['pendingURL']=params.pending_url;}
if(params.error_url){customOptions['errorURL']=params.error_url;}
if(params.resultCallback){customOptions['resultCallback']=params.resultCallback;}
window.worldpay.libraryObject=new WPCL.Library();window.worldpay.libraryObject.setup(customOptions);}
function worldpayDestroy(){window.worldpay.libraryObject&&window.worldpay.libraryObject.destroy();}
addWorlpayScript();