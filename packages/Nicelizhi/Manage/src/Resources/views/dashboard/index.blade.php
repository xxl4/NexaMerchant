@php
    $admin = auth()->guard('admin')->user();
@endphp

<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.dashboard.index.title')
    </x-slot:title>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <h1>
                @lang('admin::app.dashboard.index.user-name', ['user_name' => $admin->name])
            </h1>

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
    <section class="content">
        
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1">
                <img
                                    src="{{ bagisto_asset('images/total-sales.svg')}}"
                                    title="@lang('admin::app.dashboard.index.total-sales')"
                                >
              </span>

              <div class="info-box-content">
                <span class="info-box-text">@lang('admin::app.dashboard.index.total-sales')</span>
                <span class="info-box-number">
                    {{ core()->formatBasePrice($statistics['over_all']['total_sales']['current']) }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1">

                <img
                                    src="{{ bagisto_asset('images/total-orders.svg')}}"
                                    title="@lang('admin::app.dashboard.index.total-orders')"
                                >

              </span>

              <div class="info-box-content">
                <span class="info-box-text">@lang('admin::app.dashboard.index.total-orders')</span>
                <span class="info-box-number">{{ $statistics['over_all']['total_orders']['current'] }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1">
                <img
                src="{{ bagisto_asset('images/customers.svg')}}"
                title="@lang('admin::app.dashboard.index.total-customers')"
               >

              </span>

              <div class="info-box-content">
                <span class="info-box-text">@lang('admin::app.dashboard.index.total-customers')</span>
                <span class="info-box-number"> {{ $statistics['over_all']['total_customers']['current'] }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1">
                <img
                src="{{ bagisto_asset('images/average-orders.svg')}}"
                title="@lang('admin::app.dashboard.index.average-sale')"
            ></span>

              <div class="info-box-content">
                <span class="info-box-text">@lang('admin::app.dashboard.index.average-sale')</span>
                <span class="info-box-number">{{ core()->formatBasePrice($statistics['over_all']['avg_sales']['current']) }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1">
                <img
                    src="{{ bagisto_asset('images/unpaid-invoices.svg')}}"
                    title="@lang('admin::app.dashboard.index.total-unpaid-invoices')"
                >
                </span>

              <div class="info-box-content">
                <span class="info-box-text">@lang('admin::app.dashboard.index.total-unpaid-invoices')</span>
                <span class="info-box-number">{{ core()->formatBasePrice($statistics['over_all']['total_unpaid_invoices']) }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div>
    </section>
</x-admin::layouts>
