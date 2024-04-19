<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.reporting.sales.index.title')
    </x-slot:title>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            @include('admin::reporting.sales.total-sales')
        </div>
        <div class="col-md-12">
            @include('admin::reporting.sales.purchase-funnel')
        </div>
        <div class="col-md-6">
            @include('admin::reporting.sales.total-orders')
        </div>

        <div class="col-md-6">
            @include('admin::reporting.sales.average-order-value')
        </div>

        <div class="col-md-6">
            @include('admin::reporting.sales.tax-collected')
        </div>

        <div class="col-md-6">
            @include('admin::reporting.sales.shipping-collected')
        </div>

        <div class="col-md-6">
            @include('admin::reporting.sales.total-refunds')
        </div>

        <div class="col-md-6">
            @include('admin::reporting.sales.top-payment-methods')
        </div>


        </div>
        </div>
    </section>

    {{-- Sales Stats Vue Component --}}
    {{-- <div class="flex flex-col gap-[15px] flex-1 max-xl:flex-auto">
        <!-- Sales Section -->
        @include('admin::reporting.sales.total-sales') --}}

        {{-- <!-- Purchase Funnel and Abandoned Carts Sections Container -->
        <div class="flex justify-between gap-[15px] flex-1 [&>*]:flex-1 max-xl:flex-auto">
            <!-- Purchase Funnel Section -->
            @include('admin::reporting.sales.purchase-funnel')

            <!-- Abandoned Carts Section -->
            @include('admin::reporting.sales.abandoned-carts')
        </div>

        <!-- Total Orders and Average Order Value Sections Container -->
        <div class="flex justify-between gap-[15px] flex-1 [&>*]:flex-1 max-xl:flex-auto">
            <!-- Total Orders Section -->
            @include('admin::reporting.sales.total-orders')

            <!-- Average Order Value Section -->
            @include('admin::reporting.sales.average-order-value')
        </div>

        <!-- Tax Collected and Shipping Collected Sections Container -->
        <div class="flex justify-between gap-[15px] flex-1 [&>*]:flex-1 max-xl:flex-auto">
            <!-- Tax Collected Section -->
            @include('admin::reporting.sales.tax-collected')

            <!-- Shipping Collected Section -->
            @include('admin::reporting.sales.shipping-collected')
        </div>

        <!-- Refunds and Top Payment Methods Sections Container -->
        <div class="flex justify-between gap-[15px] flex-1 [&>*]:flex-1 max-xl:flex-auto">
            <!-- Refunds Section -->
            @include('admin::reporting.sales.total-refunds')

            <!-- Top Payment Methods Section -->
            @include('admin::reporting.sales.top-payment-methods')
        </div> --}}
    {{-- </div> --}}

    

          <!-- jQuery -->
<script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</x-admin::layouts>
