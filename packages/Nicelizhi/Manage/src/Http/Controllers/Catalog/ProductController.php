<?php

namespace Nicelizhi\Manage\Http\Controllers\Catalog;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Nicelizhi\Manage\Helpers\SSP;
use Nicelizhi\Manage\Http\Controllers\Controller;
use Nicelizhi\Manage\Http\Requests\InventoryRequest;
use Nicelizhi\Manage\Http\Requests\ProductForm;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Repositories\ProductDownloadableLinkRepository;
use Webkul\Product\Repositories\ProductDownloadableSampleRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Nicelizhi\Manage\Http\Resources\AttributeResource;
use Nicelizhi\Manage\DataGrids\Catalog\ProductDataGrid;
use Nicelizhi\Manage\Http\Requests\MassUpdateRequest;
use Nicelizhi\Manage\Http\Requests\MassDestroyRequest;
use Webkul\Core\Rules\Slug;
use Webkul\Product\Helpers\ProductType;
use Webkul\Product\Facades\ProductImage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /*
    * Using const variable for status 
    */
    const ACTIVE_STATUS = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected AttributeFamilyRepository           $attributeFamilyRepository,
        protected InventorySourceRepository           $inventorySourceRepository,
        protected ProductRepository                   $productRepository,
        protected ProductAttributeValueRepository     $productAttributeValueRepository,
        protected ProductDownloadableLinkRepository   $productDownloadableLinkRepository,
        protected ProductDownloadableSampleRepository $productDownloadableSampleRepository,
        protected ProductInventoryRepository          $productInventoryRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        /*
                $data = [];
                if (core()->getRequestedLocaleCode() === 'all') {
                    $whereInLocales = Locale::query()->pluck('code')->toArray();
                } else {
                    $whereInLocales = [core()->getRequestedLocaleCode()];
                }

                $tablePrefix = DB::getTablePrefix();

                DB::connection()->enableQueryLog();

                $queryBuilder = DB::table('product_flat')
                    ->leftJoin('attribute_families as af', 'product_flat.attribute_family_id', '=', 'af.id')
                    ->leftJoin('product_inventories', 'product_flat.product_id', '=', 'product_inventories.product_id')
                    ->leftJoin('product_images', 'product_flat.product_id', '=', 'product_images.product_id')
                    ->distinct()
                    ->leftJoin('product_categories as pc', 'product_flat.product_id', '=', 'pc.product_id')
                    ->leftJoin('category_translations as ct', function ($leftJoin) use ($whereInLocales) {
                        $leftJoin->on('pc.category_id', '=', 'ct.category_id')
                            ->whereIn('ct.locale', $whereInLocales);
                    })
                    ->select(
        //                'product_flat.locale',
        //                'product_flat.channel',
        //                'product_images.path as base_image',
        //                'pc.category_id',
        //                'ct.name as category_name',
        //                'product_flat.product_id',
        //                'product_flat.sku',
        //                'product_flat.name',
        //                'product_flat.type',
        //                'product_flat.status',
        //                'product_flat.price',
        //                'product_flat.url_key',
        //                'product_flat.visible_individually',
        //                'af.name as attribute_family',
        //                DB::raw('SUM(DISTINCT ' . $tablePrefix . 'product_inventories.qty) as quantity')
                    );
        //            ->addSelect(DB::raw('COUNT(DISTINCT ' . $tablePrefix . 'product_images.id) as images_count'));

                $queryBuilder->groupBy(
                    'product_flat.product_id',
                    'product_flat.locale',
                    'product_flat.channel'
                )->get()->toArray();
                $carNamedata = DB::getQueryLog();

                print_r("<pre/>");
                print_r($carNamedata);exit;


                $queryBuilder =json_encode($queryBuilder->get()->toArray());
                $queryBuilder = json_decode($queryBuilder, true);





                $data = [];

                */
        if (request()->ajax()) {


//           print_r($_REQUEST);exit;

            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre . 'product_flat';


            // Table's primary key
            $primaryKey = 'id';

            $columns = array(
                array('db' => 'flat.product_id', 'dt' => 'product_id', 'field' => 'product_id'),
               // array('db' => '`ba_product_images`.`path`', 'dt' => 1, 'field' => 'path'),
                array('db' => '`flat`.`name`', 'dt' => 'name', 'field' => 'name'),
                array('db' => '`flat`.`status`', 'dt' => 'status', 'field' => 'status'),
                //array('db' => '`ba_product_inventories`.`qty`', 'dt' => 4, 'field' => 'qty'),
                array('db' => '`flat`.`channel`', 'dt' => 'channel', 'field' => 'channel'),
                array('db' => '`flat`.`type`', 'dt' => 'type', 'field' => 'type'),
                array('db' => '`flat`.`sku`', 'dt' => 'sku', 'field' => 'sku'),

//                array( 'db' => '`ba_product_flat`.`sku`',   'dt' => 7, 'field'=>'sku' ),


            );


//            $data = ['data'=>$queryBuilder];
//            return $data;

            $sql_details = array(
                'user' => config("database.connections.mysql.username"),
                'pass' => config("database.connections.mysql.password"),
                'db' => config("database.connections.mysql.database"),
                'host' => config("database.connections.mysql.host"),
                'timezone' => config("database.connections.mysql.timezone"),
                'charset' => config("database.connections.mysql.charset") // Depending on your PHP and MySQL config, you may need this
            );


            $joinQuery = "from `ba_product_flat` left join `ba_attribute_families` as `ba_af` on `ba_product_flat`.`attribute_family_id` = `ba_af`.`id` left join `ba_product_inventories` on `ba_product_flat`.`product_id` = `ba_product_inventories`.`product_id` left join `ba_product_images` on `ba_product_flat`.`product_id` = `ba_product_images`.`product_id` left join `ba_product_categories` as `ba_pc` on `ba_product_flat`.`product_id` = `ba_pc`.`product_id` left join `ba_category_translations` as `ba_ct` on `ba_pc`.`category_id` = `ba_ct`.`category_id`";
            $joinQuery = "from `{$table_pre}product_flat` AS flat ";

//            $joinQuery = "FROM `{$table}` AS `o` LEFT JOIN `{$table_pre}addresses` AS `a` ON (`a`.`order_id` = `o`.`id`) LEFT JOIN `{$table_pre}order_transactions` as t ON (`t`.`order_id` = `o`.`id`)";
            $extraCondition = "";

            $data = SSP::simple(request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition);


            // if (!empty($data['data'])) {
            //     foreach ($data['data'] as $key => $value) {
            //         if ($value[3] == 1) {
            //             $data['data'][$key][3] = '活跃';
            //         } elseif ($value[3] == 2) {
            //             $data['data'][$key][3] = '已存档';
            //         } elseif ($value[3] == 3) {
            //             $data['data'][$key][3] = '草稿';
            //         } else {
            //             $data['data'][$key][3] = '未定义';
            //         }
            //         $data['data'][$key]['id'] = $value[0];
            //         $data['data'][$key]['path'] = '/storage/' . $value[1];
            //         $data['data'][$key]['name'] = $value[2];
            //         $data['data'][$key]['status'] = $value[3];
            //         $data['data'][$key]['qty'] = $value[4];
            //         $data['data'][$key]['channel'] = $value[5];
            //         $data['data'][$key]['type'] = $value[6];
            //         $data['data'][$key]['sku'] = $value[7];

            //         unset($data['data'][$key][0]);
            //         unset($data['data'][$key][1]);
            //         unset($data['data'][$key][2]);
            //         unset($data['data'][$key][3]);
            //         unset($data['data'][$key][4]);
            //         unset($data['data'][$key][5]);
            //         unset($data['data'][$key][6]);
            //         unset($data['data'][$key][7]);


            //     }
            // }


//            print_r($data);exit;


            return json_encode($data);


        }

        return view('admin::catalog.products.index');


//        return view('admin::catalog.products.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $families = $this->attributeFamilyRepository->all();

        $configurableFamily = null;

        if ($familyId = request()->get('family')) {
            $configurableFamily = $this->attributeFamilyRepository->find($familyId);
        }

        return view('admin::catalog.products.create', compact('families', 'configurableFamily'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $this->validate(request(), [
            'type' => 'required',
            'attribute_family_id' => 'required',
            'sku' => ['required', 'unique:products,sku', new Slug],
            'super_attributes' => 'array|min:1',
            'super_attributes.*' => 'array|min:1',
        ]);

        if (
            ProductType::hasVariants(request()->input('type'))
            && !request()->has('super_attributes')
        ) {
            $configurableFamily = $this->attributeFamilyRepository
                ->find(request()->input('attribute_family_id'));

            return new JsonResponse([
                'data' => [
                    'attributes' => AttributeResource::collection($configurableFamily->configurable_attributes),
                ]
            ]);
        }

        Event::dispatch('catalog.product.create.before');

        $data = request()->only([
            'type',
            'attribute_family_id',
            'sku',
            'super_attributes',
            'family'
        ]);

        $product = $this->productRepository->create($data);

        Event::dispatch('catalog.product.create.after', $product);

        session()->flash('success', trans('admin::app.catalog.products.create-success'));

        Artisan::call("cache:clear"); // clear cache

        return new JsonResponse([
            'data' => [
                'redirect_url' => route('admin.catalog.products.edit', $product->id),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id = 10)
    {


//        echo 234;
        $product = $this->productRepository->findOrFail($id);

//
        $inventorySources = $this->inventorySourceRepository->findWhere(['status' => self::ACTIVE_STATUS]);

//        print_r("<pre/>");
//        print_r($inventorySources);exit;

//        return view('admin::catalog.products.edit');

        return view('admin::catalog.products.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductForm $request, $id)
    {
        Event::dispatch('catalog.product.update.before', $id);

        $product = $this->productRepository->update(request()->all(), $id);

        Event::dispatch('catalog.product.update.after', $product);

        session()->flash('success', trans('admin::app.catalog.products.update-success'));

        Artisan::call("cache:clear"); // clear cache

        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Update inventories.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateInventories(InventoryRequest $inventoryRequest, $id)
    {
        $product = $this->productRepository->findOrFail($id);

        Event::dispatch('catalog.product.update.before', $id);

        $this->productInventoryRepository->saveInventories(request()->all(), $product);

        Event::dispatch('catalog.product.update.after', $product);

        return response()->json([
            'message' => __('admin::app.catalog.products.saved-inventory-message'),
            'updatedTotal' => $this->productInventoryRepository->where('product_id', $product->id)->sum('qty'),
        ]);
    }

    /**
     * Uploads downloadable file.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function uploadLink($id)
    {
        return response()->json(
            $this->productDownloadableLinkRepository->upload(request()->all(), $id)
        );
    }

    /**
     * Copy a given Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function copy(int $id)
    {
        try {
            $product = $this->productRepository->copy($id);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());

            return redirect()->to(route('admin.catalog.products.index'));
        }

        session()->flash('success', trans('admin::app.catalog.products.product-copied'));

        return redirect()->route('admin.catalog.products.edit', $product->id);
    }

    /**
     * Uploads downloadable sample file.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function uploadSample($id)
    {
        return response()->json(
            $this->productDownloadableSampleRepository->upload(request()->all(), $id)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $product = $this->productRepository->findOrFail($id);

        try {
            Event::dispatch('catalog.product.delete.before', $id);

            $this->productRepository->delete($id);

            Event::dispatch('catalog.product.delete.after', $id);

            return new JsonResponse([
                'message' => trans('admin::app.catalog.products.delete-success'),
            ]);
        } catch (\Exception $e) {
            report($e);
        }

        return new JsonResponse([
            'message' => trans('admin::app.catalog.products.delete-failed'),
        ], 500);
    }

    /**
     * Mass delete the products.
     *
     * @param MassDestroyRequest $massDestroyRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $productIds = $massDestroyRequest->input('indices');

        try {
            foreach ($productIds as $productId) {
                $product = $this->productRepository->find($productId);

                if (isset($product)) {
                    Event::dispatch('catalog.product.delete.before', $productId);

                    $this->productRepository->delete($productId);

                    Event::dispatch('catalog.product.delete.after', $productId);
                }
            }

            return new JsonResponse([
                'message' => trans('admin::app.catalog.products.index.datagrid.mass-delete-success')
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mass update the products.
     *
     * @param MassUpdateRequest $massUpdateRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest): JsonResponse
    {
        $data = $massUpdateRequest->all();

        $productIds = $data['indices'];

        foreach ($productIds as $productId) {
            Event::dispatch('catalog.product.update.before', $productId);

            $product = $this->productRepository->update([
                'status' => $massUpdateRequest->input('value'),
            ], $productId);

            Event::dispatch('catalog.product.update.after', $product);
        }

        return new JsonResponse([
            'message' => trans('admin::app.catalog.products.index.datagrid.mass-update-success')
        ], 200);
    }

    /**
     * To be manually invoked when data is seeded into products.
     *
     * @return \Illuminate\Http\Response
     */
    public function sync()
    {
        Event::dispatch('products.datagrid.sync', true);

        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Result of search product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        $results = [];

        request()->query->add([
            'status' => null,
            'visible_individually' => null,
            'name' => request('query'),
            'sort' => 'created_at',
            'order' => 'desc',
        ]);

        $products = $this->productRepository->searchFromDatabase();

        foreach ($products as $product) {
            $results[] = [
                'id' => $product->id,
                'sku' => $product->sku,
                'name' => $product->name,
                'price' => $product->price,
                'formatted_price' => core()->formatBasePrice($product->price),
                'images' => $product->images,
                'inventories' => $product->inventories,
            ];
        }

        $products->setCollection(collect($results));

        return response()->json($products);
    }

    /**
     * Download image or file.
     *
     * @param int $productId
     * @param int $attributeId
     * @return \Illuminate\Http\Response
     */
    public function download($productId, $attributeId)
    {
        $productAttribute = $this->productAttributeValueRepository->findOneWhere([
            'product_id' => $productId,
            'attribute_id' => $attributeId,
        ]);

        return Storage::download($productAttribute['text_value']);
    }


    public function uploadImg(Request $request)
    {

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // 检查文件是否上传成功
            if ($file->isValid()) {
                // 获取文件名并移动到指定目录
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('storage/product/sku'), $fileName);
                $path = '/storage/product/sku/' . $fileName;
                // 返回上传成功信息
                return response()->json(
                    [
                        'code' => 200,
                        'msg' => '上传成功',
                        "data" => ["url" => $path],
                    ]
                );
            }
        }
        // 返回上传失败信息
        return response()->json(['success' => false, 'message' => '上传失败']);

    }

}
