@php
    $currentLocale = core()->getRequestedLocale();

    $selectedOptionIds = [1];
@endphp
<x-admin::layouts>

    {{-- Page Title --}}
    <x-slot:title>
        @lang('shopify::app.product.title')
    </x-slot:title>

          <!-- jQuery -->
<script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card card-primary">
            <form action="{{ route('admin.shopify.products.info', ['product_id' => $product_id, 'act_type' => $act_type]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Product Info Update</h3>
                </div>
                <div class="card-body">
                    
                        @foreach (core()->getAllLocales() as $locale)
                            <a
                                href="?{{ Arr::query(['locale' => $locale->code]) }}"
                                class="btn  {{ $locale->code == $currentLocale->code ? 'btn-primary' : ''}}"
                            >
                                {{ $locale->name }}
                            </a>
                        @endforeach
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="<?php echo $product->name;?>" >
                        </div>
                        

                    

                </div>
                <div class="card-footer">
                    <input type="hidden" name="locale" value="<?php echo $locale_get;?>">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>

</section>


</x-admin::layouts>