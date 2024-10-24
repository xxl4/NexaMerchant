<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.sales.orders.view.title', ['order_id' => $order->increment_id])
    </x-slot:title>
    {!! view_render_event('sales.order.title.before', ['order' => $order]) !!}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <a href="{{ route('admin.sales.orders.index') }}" class="btn btn-default btn-lg"> @lang('admin::app.account.edit.back-btn')</a>
                    @switch($order->status)
                        @case('processing')
                            <span class="btn btn-primary btn-lg">
                                @lang('admin::app.sales.orders.view.processing')    
                            </span>
                            @break

                        @case('completed')
                            <span class="label-closed btn btn-success btn-lg">
                                @lang('admin::app.sales.orders.view.completed')    
                            </span>
                            @break

                        @case('pending')
                            <span class="btn btn-waring btn-lg">
                                @lang('admin::app.sales.orders.view.pending')    
                            </span>
                            @break

                        @case('closed')
                            <span class="label-closed btn btn-danger btn-lg">
                                @lang('admin::app.sales.orders.view.closed')    
                            </span>
                            @break

                        @case('canceled')
                            <span class="label-cancelled btn btn-info btn-lg">
                                @lang('admin::app.sales.orders.view.canceled')    
                            </span>
                            @break
                            

                    @endswitch

                            @if (
                                $order->canInvoice()
                                && $order->payment->method !== 'paypal_standard'
                            )
                            
                                @include('admin::sales.invoices.create')
                            @endif

                            @if ($order->canShip())
                                @include('admin::sales.shipments.create')
                            @endif


                            @if ($order->canRefund())
                                
                                @include('admin::sales.refunds.create')
                            @endif

                    {!! view_render_event('sales.order.title.after', ['order' => $order]) !!}


                    

                    {!! view_render_event('sales.order.page_action.before', ['order' => $order]) !!}

            @if (
                $order->canCancel()
                && bouncer()->hasPermission('sales.orders.cancel')
            )
              
            @endif

            @if (
                $order->canInvoice()
                && $order->payment->method !== 'paypal_standard'
            )
              
               
            @endif

            @if ($order->canShip())
                
            @endif

            @if ($order->canRefund())
                
            @endif

            {!! view_render_event('sales.order.page_action.after', ['order' => $order]) !!}

                    </div>

                    <div class="invoice p-3 mb-3">

                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> #{{$order['id']}}
                                    <small class="float-right">Date: {{core()->formatDate($order->created_at) }}</small>
                                </h4>
                            </div>

                        </div>

                        <div class="row invoice-info">
                            @if ($order->billing_address)
                            <div class="col-sm-2 invoice-col">
                                @lang('admin::app.sales.orders.view.billing-address')
                                @include ('admin::sales.address', ['address' => $order->billing_address])
                                {!! view_render_event('sales.order.billing_address.after', ['order' => $order]) !!}
                            </div>
                            @endif
                            @if ($order->shipping_address)
                            <div class="col-sm-3 invoice-col">
                                @lang('admin::app.sales.orders.view.shipping-address')
                                @include ('admin::sales.address', ['address' => $order->shipping_address])
                                {!! view_render_event('sales.order.shipping_address.after', ['order' => $order]) !!}
                            </div>
                            @endif
                            
                            <div class="col-sm-3 invoice-col">
                                <b>@lang('admin::app.sales.orders.view.invoices') ({{ count($order->invoices) }})</b><br />
                                @forelse ($order->invoices as $index => $invoice)
                                <b>Invoice @lang('admin::app.sales.orders.view.invoice-id', ['invoice' => $invoice->increment_id ?? $invoice->id])</b><br>
                                <b>{{ core()->formatDate($invoice->created_at, 'd M, Y H:i:s a') }} </b><br>
                                <b><a
                                    href="{{ route('admin.sales.invoices.view', $invoice->id) }}"
                                    class="text-[14px] text-blue-600 transition-all hover:underline"
                                >
                                    @lang('admin::app.sales.orders.view.view')
                                </a></b>
                                <b><a
                                    href="{{ route('admin.sales.invoices.print', $invoice->id) }}"
                                    class="text-[14px] text-blue-600 transition-all hover:underline"
                                >
                                    @lang('admin::app.sales.orders.view.download-pdf')
                                </a></b>
                                @empty 
                                @lang('admin::app.sales.orders.view.no-invoice-found')
                                @endforelse
                            </div>
                            <div class="col-sm-2 invoice-col">
                                <b>@lang('admin::app.sales.orders.view.shipments') ({{ count($order->shipments) }})</b><br />
                                @forelse ($order->shipments as $shipment)
                                <b>
                                    @lang('admin::app.sales.orders.view.shipment', ['shipment' => $shipment->id])
                                </b><br />
                                <?php //var_dump($shipment);?>
                                <b>{{$shipment->carrier_title;}}</b> <br />
                                <b>{{$shipment->track_number;}}</b> <br />
                                
                                <b>
                                    {{ core()->formatDate($shipment->created_at, 'd M, Y H:i:s a') }}
                                </b>
                                @empty 
                                @lang('admin::app.sales.orders.view.no-shipment-found')
                                @endforelse
                            </div>

                            <div class="col-sm-2 invoice-col">
                                <b>@lang('admin::app.sales.orders.view.payment-and-shipping')</b><br />
                                <b>{{ core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title') }}</b><br />
                                <?php
                                
                                //$additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($order->payment->method);
                                // var_dump($order->transactions[0]->data);
                                if($order->payment->method=="paypal_smart_button") {
                                    $data = json_decode($order->transactions[0]->data, true);
                                    $tran_id = isset($data[0]['payments']['captures']['0']['id']) ? $data[0]['payments']['captures']['0']['id'] : "";
                                }else{
                                    $tran_id = "";
                                }
                                

                                


                                ?>
                                <b><?php echo $tran_id; ?></b><br />
                                @forelse ($order->shipments as $shipment)
                                <b>
                                    @lang('admin::app.sales.orders.view.shipment', ['shipment' => $shipment->id])
                                </b><br />
                                <?php //var_dump($shipment);?>
                                <b>{{ $order->order_currency_code }}</b> <br />
                                @php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($order->payment->method); @endphp
                                @if (! empty($additionalDetails))
                                <b>{{ $additionalDetails['title'] }}</b> <br />
                                <b>{{ $additionalDetails['value'] }}</b> <br />
                                @endif

                                {!! view_render_event('sales.order.payment-method.after', ['order' => $order]) !!}
                                
                                
                                
                                @empty 
                                @lang('admin::app.sales.orders.view.no-shipment-found')
                                @endforelse
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Images</th>
                                            <th>Product</th>
                                            <th>Serial #</th>
                                            <th>SKU</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if($order->sku_items->isEmpty()){
                                            $order->sku_items = $order->items;
                                        }
                                        ?>
                                        @foreach ($order->sku_items as $item)
                                        <tr>
                                            <td>


                                                @if($item->product?->base_image_url)
                                                <img
                                                class="" height="200px"
                                            src="{{ $item->product?->base_image_url }}"
                                                @else
                                                <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                                                @endif


                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>@lang('admin::app.sales.orders.view.amount-per-unit', [
                                                'amount' => core()->formatBasePrice($item->base_price),
                                                'qty'    => $item->qty_ordered,
                                                ])</td>
                                            <td>
                                                {{ $item->sku }}

                                            </td>
                                            <td>{{ core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount) }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                </p>
                            </div>

                            <div class="col-6">
                                <p class="lead">Amount Due 2/22/2014</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">@lang('admin::app.sales.orders.view.summary-sub-total')</th>
                                            <td> {{ core()->formatBasePrice($order->base_sub_total) }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('admin::app.sales.orders.view.summary-tax')</th>
                                            <td>{{ core()->formatBasePrice($order->base_tax_amount) }}</td>
                                        </tr>
                                        @if ($haveStockableItems = $order->haveStockableItems())
                                        <tr>
                                            <th>@lang('admin::app.sales.orders.view.shipping-and-handling')</th>
                                            <td>{{ core()->formatBasePrice($order->base_shipping_amount) }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>@lang('admin::app.sales.orders.view.summary-grand-total')</th>
                                            <td>{{ core()->formatBasePrice($order->base_grand_total) }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('admin::app.sales.orders.view.total-paid')</th>
                                            <td>{{ core()->formatBasePrice($order->base_grand_total_invoiced) }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('admin::app.sales.orders.view.total-refund')</th>
                                            <td>{{ core()->formatBasePrice($order->base_grand_total_refunded) }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('admin::app.sales.orders.view.total-due')</th>
                                            <td>
                                                @if($order->status !== 'canceled')
                                                    {{ core()->formatBasePrice($order->base_total_due) }}
                                                @else
                                                        {{ core()->formatBasePrice(0.00) }}
                                                @endif

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>


                        <div class="row no-print">
                            <div class="col-12">
                                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i
                                        class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                @if (
                                    $order->canCancel()
                                    && bouncer()->hasPermission('sales.orders.cancel')
                                )
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> @lang('admin::app.sales.orders.view.cancel') 
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="/themes/manage/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</x-admin::layouts>