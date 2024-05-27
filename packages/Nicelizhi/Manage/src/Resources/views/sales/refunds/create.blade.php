<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#refundModal">
    @lang('admin::app.sales.orders.view.refund') 
</button>
<style>
    body .modal-dialog { /* Width */
    max-width: 85%;
    width: auto !important;
}
</style>

<!-- Modal -->
<div class="modal fade" id="refundModal" tabindex="-1" role="dialog" aria-labelledby="refundModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form id="quickForm" method="POST" action=" {{ route('admin.sales.refunds.store', $order->id) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="modal-header">
        <h5 class="modal-title" id="refundModalLabel">@lang('admin::app.sales.orders.view.refund') </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>{{ trans('admin::app.sales.refunds.create.qty-to-refund') }} </th>
                        <th> </th>
                    </tr>   
                </thead>
                <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>
                        @if (!empty($item->product))
                            <img
                                width="100"
                                src="{{ $item->product->base_image_url }}"
                            >
                        @else
                                <img width="100" src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                        @endif
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>@lang('admin::app.sales.refunds.create.amount-per-unit', [
                                                                'amount' => core()->formatBasePrice($item->base_price),
                                                                'qty'    => $item->qty_ordered,
                                                            ])</td>
                        <td>@if (isset($item->additional['attributes']))
                                                            <p>
                                                                @foreach ($item->additional['attributes'] as $attribute)
                                                                    {{ $attribute['attribute_name'] }} : {{ $attribute['option_label'] }}
                                                                @endforeach
                                                            </p>
                                                        @endif</td>
                        <td> @lang('admin::app.sales.refunds.create.sku', ['sku' => Webkul\Product\Helpers\ProductType::hasVariants($item->type) ? $item->child->sku : $item->sku])</td>
                        <td>{{ $item->qty_ordered ? trans('admin::app.sales.refunds.create.item-ordered', ['qty_ordered' => $item->qty_ordered]) : '' }}

{{ $item->qty_invoiced ? trans('admin::app.sales.refunds.create.item-invoice', ['qty_invoiced' => $item->qty_invoiced]) : '' }}

{{ $item->qty_shipped ? trans('admin::app.sales.refunds.create.item-shipped', ['qty_shipped' => $item->qty_shipped]) : '' }}

{{ $item->qty_refunded ? trans('admin::app.sales.refunds.create.item-refunded', ['qty_refunded' => $item->qty_refunded]) : '' }}

{{ $item->qty_canceled ? trans('admin::app.sales.refunds.create.item-canceled', ['qty_canceled' => $item->qty_canceled]) : '' }}</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="input"  name="refund[items][{{ $item->id }}]" id="refund[items][{{ $item->id }}]" rules="'required|numeric|min_value:0|max_value:' . $item->qty_ordered" value="0" /> {{ $item->qty_to_refund}}
                            </div>
                        </td>
                        <td>
                        
                                <div class="flex flex-col gap-y-[6px]">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        @lang('admin::app.sales.refunds.create.price')
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        @lang('admin::app.sales.refunds.create.subtotal')
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        @lang('admin::app.sales.refunds.create.tax-amount')
                                    </p>

                                    @if ($order->base_discount_amount > 0)
                                        <p class="text-gray-600 dark:text-gray-300"> 
                                            @lang('admin::app.sales.refunds.create.discount-amount')
                                        </p>
                                    @endif

                                    <p class="text-gray-600 dark:text-gray-300 font-semibold">
                                        @lang('admin::app.sales.refunds.create.grand-total')
                                    </p>
                                </div>

                                <div class="flex flex-col gap-y-[6px]">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ core()->formatBasePrice($item->base_price) }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ core()->formatBasePrice($item->base_total) }} 
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300"> 
                                        {{ core()->formatBasePrice($item->base_tax_amount) }} 
                                    </p>

                                    @if ($order->base_discount_amount > 0)
                                        <p class="text-gray-600 dark:text-gray-300"> 
                                            {{ core()->formatBasePrice($item->base_discount_amount) }}
                                        </p>
                                    @endif 

                                    <p class="text-gray-600 dark:text-gray-300 font-semibold"> 
                                        {{ core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount) }} 
                                    </p>
                                </div>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>{{ trans('admin::app.sales.refunds.create.refund-shipping') }}</th>
                        <th>{{ trans('admin::app.sales.refunds.create.adjustment-refund') }}</th>
                        <th>{{ trans('admin::app.sales.refunds.create.adjustment-fee') }}</th>
                        <th>固定退款金额</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <td>
                            <input  type="text"
                                            name="refund[shipping]" 
                                            id="refund[shipping]"
                                            :rules="'required|min_value:0|max_value:' . $order->base_shipping_invoiced - $order->base_shipping_refunded"
                                            value="{{ $order->base_shipping_invoiced - $order->base_shipping_refunded }}"
                                            />
                            </td>
                            <td>
                                <input type="text"
                                            name="refund[adjustment_refund]"
                                            id="refund[adjustment_refund]" 
                                            value="0"
                                            rules="required|min_value:0"
                                        >
                            </td>
                            <td>
                                <input type="text"
                                            name="refund[adjustment_fee]"
                                            id="refund[adjustment_fee]" 
                                            value="0"
                                            rules="required|min_value:0"
                                        >
                            </td>
                            <td>
                                <input type="text"
                                            name="refund[custom_refund_amount]"
                                            id="refund[custom_refund_amount]" 
                                            value="0"
                                            rules="required|min_value:0"
                                        >
                            </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" style="width: 100%; float:right;" name="refund[comment]" id="refund[comment]" placeholder=" refund comment" rules="required">
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">@lang('admin::app.sales.refunds.create.refund-btn')</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- jQuery -->
<script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/themes/manage/AdminLTE/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/themes/manage/AdminLTE/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- AdminLTE App -->
<script src="/themes/manage/AdminLTE/dist/js/adminlte.js"></script>


