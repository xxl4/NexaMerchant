<?php
namespace Nicelizhi\Checkout\Helper;
use Illuminate\Support\Facades\Cache;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Illuminate\Support\Facades\Redis;
use Webkul\Shop\Http\Resources\ProductResource;

class Checkout
{

    private $checkout_v2_cache_key = "checkout_v2_";

    public function __construct(
    )
    {
        // 
    }

    public function getCheckout()
    {
        return 'Checkout';
    }

    public function ProductDetail($slug) {

        $this->productRepository = app(ProductRepository::class);
        $this->productAttributeValueRepository = app(ProductAttributeValueRepository::class);

        $currency = core()->getCurrentCurrencyCode();
        $data = Cache::get($this->checkout_v2_cache_key.$slug.'_'.$currency);
        $env = config("app.env");
        // when the env is pord use cache
        if(empty($data)) {
        //if(true) {
            $product = $this->productRepository->findBySlug($slug);
            $data = [];
            $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();
            $attributes = $productViewHelper->getConfigurationConfig($product);

    
            $redis = Redis::connection('default');
    
            foreach($attributes['attributes'] as $key=>$attribute) {

                $product_attr_sort_cache_key = "product_attr_sort_".$attribute['id']."_".$product->id;
                $product_attr_sort = $redis->hgetall($product_attr_sort_cache_key); // get sku sort
                $attributes['attributes'][$key]['attr_sort'] = $product_attr_sort;
            }

            foreach($attributes['index'] as $key=>$index) {
                
                $sku_products = $this->productRepository->where("id", $key)->select(['sku'])->first();
                $attributes['index'][$key]['sku'] = $sku_products->sku;
                $index2 = "";
                $total = count($index);
                $i = 0;
                foreach($index as $key2=>$ind) {
                    $i++;
                    if(empty($index2)) {
                        $index2=$key2."_".$ind;
                    } else {
                        $index2=$index2.",".$key2."_".$ind;
                    }
                    if($i==$total) $attributes['index2'][$index2] = [$key,$sku_products->sku];
                }
                //var_dump($index);

            }
    
            $package_products = [];
            $package_products = \Nicelizhi\OneBuy\Helpers\Utils::makeProducts($product, [2,1,3,4]);
            $product = new ProductResource($product);
            $data['product'] = $product;
            $data['package_products'] = $package_products;
            $data['sku'] = $product->sku;
            $data['attr'] = $attributes;
    
            $countries = config("countries");
    
            $default_country = config('onebuy.default_country');
    
            $airwallex_method = config('onebuy.airwallex.method');
    
            $payments = config('onebuy.payments'); // config the payments status
    
            $payments_default = config('onebuy.payments_default');
            $brand = config('onebuy.brand');
    
            $gtag = config('onebuy.gtag');
    
            $fb_ids = config('onebuy.fb_ids');
            $ob_adv_id = config('onebuy.ob_adv_id');
    
            $crm_channel = config('onebuy.crm_channel');
    
            $quora_adv_id = config('onebuy.quora_adv_id');
    
            $paypal_client_id = core()->getConfigData('sales.payment_methods.paypal_smart_button.client_id');
    
            $data['countries'] = $countries;
            $data['default_country'] = $default_country;
            $data['airwallex_method'] = $airwallex_method;
            $data['payments'] = $payments;
            $data['payments_default'] = $payments_default;
            $data['brand'] = $brand;
            $data['gtag'] = $gtag;
            $data['fb_ids'] = $fb_ids;
            $data['ob_adv_id'] = $ob_adv_id;
            $data['crm_channel'] = $crm_channel;
            $data['quora_adv_id'] = $quora_adv_id;
            $data['paypal_client_id'] = $paypal_client_id;
            $data['env'] = config("app.env");
            $data['sellPoints'] = $redis->hgetall("sell_points_".$slug);
    
            $ads = []; // add ads
            
            $productBgAttribute = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 29,
            ]);
    
    
            $productBgAttribute_mobile = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 30,
            ]);
    
            $productSizeImage = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 32,
            ]);
    
            $ads['pc']['img'] = isset($productBgAttribute->text_value) ? config("app.url").'/storage/'.$productBgAttribute->text_value : config("app.url")."/checkout/onebuy/banners/".$default_country."_pc.jpg";
            $ads['mobile']['img'] = isset($productBgAttribute_mobile->text_value) ? config("app.url").'/storage/'.$productBgAttribute_mobile->text_value : config("app.url")."/checkout/onebuy/banners/".$default_country."_mobile.jpg";
            $ads['size']['img'] = isset($productSizeImage->text_value) ? config("app.url").'/storage/'.$productSizeImage->text_value : "";
    
            $data['ads'] = $ads;

            Cache::put($this->checkout_v2_cache_key.$slug, json_encode($data));

            return $data;

        }else{
            return json_decode($data,true);
        }
    }

    /**
     * 
     * 
     * 
     * create a customer
     * 
     * 
     */
    public function createCustomer($data) {
        $customer = new \Webkul\Customer\Models\Customer();
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->email = $data['email'];
        $customer->password = bcrypt($data['password']);
        $customer->channel_id = 1;
        $customer->is_verified = 1;
        $customer->save();
        return $customer;
    }
}