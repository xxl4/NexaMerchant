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
                    <!-- <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to
                        test.
                    </div> -->

                    <div class="invoice p-3 mb-3">

                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> #{{$order['id']}}
                                    <small class="float-right">Date: {{$order['create_at']}}</small>
                                </h4>
                            </div>

                        </div>

                        <div class="row invoice-info">
                            @if ($order->billing_address)
                            <div class="col-sm-4 invoice-col">
                                @lang('admin::app.sales.orders.view.billing-address')
                                @include ('admin::sales.address', ['address' => $order->billing_address])
                                {!! view_render_event('sales.order.billing_address.after', ['order' => $order]) !!}
                            </div>
                            @endif
                            @if ($order->shipping_address)
                            <div class="col-sm-4 invoice-col">
                                @lang('admin::app.sales.orders.view.shipping-address')
                                @include ('admin::sales.address', ['address' => $order->shipping_address])
                                {!! view_render_event('sales.order.shipping_address.after', ['order' => $order]) !!}
                            </div>
                            @endif

                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #007612</b><br>
                                <br>
                                <b>Order ID:</b> 4F3S8J<br>
                                <b>Payment Due:</b> 2/22/2014<br>
                                <b>Account:</b> 968-34567
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
                                        @foreach ($order->items as $item)
                                        <tr>
                                            <td>

                                                @if($item->product?->base_image_url)
                                                <img
                                            class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded-[4px]"
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
                                                @if (isset($item->additional['attributes']))
                                                    @foreach ($item->additional['attributes'] as $attribute)
                                                        {{ $attribute['attribute_name'] }} : {{ $attribute['option_label'] }}
                                                    @endforeach
                                                @endif

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
                                <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;"> -->
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                    handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p>
                            </div>

                            <div class="col-6">
                                <p class="lead">Amount Due 2/22/2014</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>$250.30</td>
                                        </tr>
                                        <tr>
                                            <th>Tax (9.3%)</th>
                                            <td>$10.34</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>$5.80</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>$265.24</td>
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