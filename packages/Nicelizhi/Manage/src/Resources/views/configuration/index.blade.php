<x-admin::layouts>
    {{-- Title of the page. --}}
    <x-slot:title>
        @lang('admin::app.configuration.index.title')
    </x-slot:title>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin::app.configuration.index.title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">@lang('admin::app.configuration.index.title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                
                    @foreach ($config->items as $itemKey => $item)
                    <div class="col-sm-4 col-md-3">
                        <h4 class="text-center">@lang($item['name'] ?? '')</h4>
                        <div class="color-palette-set">
                            <div class="bg-primary color-palette"><span>@lang($item['info'] ?? '')</span></div>
                            <div class="bg-primary disabled color-palette">

                                @foreach ($item['children'] as $childKey =>  $child)
                                    <a 
                                    class="btn"
                                    href="{{ route('admin.configuration.index', ($itemKey . '/' . $childKey)) }}"
                                >
                                    @lang($child['name']) 
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    @endforeach
                
            </div>
        </div>
    </section>
        <!-- jQuery -->
    <script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</x-admin::layouts>