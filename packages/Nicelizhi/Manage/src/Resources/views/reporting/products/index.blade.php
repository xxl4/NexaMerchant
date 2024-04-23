<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.reporting.products.index.title')
    </x-slot:title>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                @include('admin::reporting.products.sold-quantities')

                </div>

                <div class="col-md-6">

                    @include('admin::reporting.products.wishlist-products')

                </div>

            </div>
        </div>
    </section>

   

           <!-- jQuery -->
<script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</x-admin::layouts>
