<?php

namespace Webkul\Admin\Http\Controllers\Catalog;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
<<<<<<< HEAD
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\CategoryRequest;
use Webkul\Admin\DataGrids\Catalog\CategoryDataGrid;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Admin\DataGrids\Catalog\CategoryProductDataGrid;
use Webkul\Admin\Http\Resources\CategoryTreeResource;
=======
use Webkul\Admin\DataGrids\Catalog\CategoryDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Http\Requests\CategoryRequest;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Admin\Http\Resources\CategoryTreeResource;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Core\Repositories\ChannelRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ChannelRepository $channelRepository,
        protected CategoryRepository $categoryRepository,
        protected AttributeRepository $attributeRepository
<<<<<<< HEAD
    )
    {
=======
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(CategoryDataGrid::class)->toJson();
        }

        return view('admin::catalog.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->categoryRepository->getCategoryTree(null, ['id']);

        $attributes = $this->attributeRepository->findWhere(['is_filterable' => 1]);

        return view('admin::catalog.categories.create', compact('categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $categoryRequest)
    {
        Event::dispatch('catalog.category.create.before');

        $data = request()->only([
            'locale',
            'name',
            'parent_id',
            'description',
            'slug',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'status',
            'position',
            'display_mode',
            'attributes',
            'logo_path',
<<<<<<< HEAD
            'banner_path'
=======
            'banner_path',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);

        $category = $this->categoryRepository->create($data);

        Event::dispatch('catalog.category.create.after', $category);

        session()->flash('success', trans('admin::app.catalog.categories.create-success'));

        return redirect()->route('admin.catalog.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findOrFail($id);

        $categories = $this->categoryRepository->getCategoryTreeWithoutDescendant($id);

        $attributes = $this->attributeRepository->findWhere(['is_filterable' => 1]);

        return view('admin::catalog.categories.edit', compact('category', 'categories', 'attributes'));
    }

    /**
<<<<<<< HEAD
     * Show the products of specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function products($id)
    {
        if (request()->ajax()) {
            return app(ProductDataGrid::class)->toJson();
        }
    }

    /**
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $categoryRequest, $id)
    {
        Event::dispatch('catalog.category.update.before', $id);

        $category = $this->categoryRepository->update($categoryRequest->all(), $id);

        Event::dispatch('catalog.category.update.after', $category);

        session()->flash('success', trans('admin::app.catalog.categories.update-success'));

        return redirect()->route('admin.catalog.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
=======
     * @param  int  $id
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function destroy($id): JsonResponse
    {
        $category = $this->categoryRepository->findOrFail($id);

        if (! $this->isCategoryDeletable($category)) {
            return new JsonResponse(['message' => trans('admin::app.catalog.categories.delete-category-root')], 400);
        }

        try {
            Event::dispatch('catalog.category.delete.before', $id);

            $this->categoryRepository->delete($id);

            Event::dispatch('catalog.category.delete.after', $id);

            return new JsonResponse([
<<<<<<< HEAD
                'message' => trans('admin::app.catalog.categories.delete-success', ['name' => 'admin::app.catalog.categories.category'
            ])]);
        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('admin::app.catalog.categories.delete-failed', ['name' => 'admin::app.catalog.categories.category'
        ])], 500);
=======
                'message' => trans('admin::app.catalog.categories.delete-success', [
                    'name' => trans('admin::app.catalog.categories.category'),
                ]),
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => trans('admin::app.catalog.categories.delete-failed', [
                    'name' => trans('admin::app.catalog.categories.category'),
                ]),
            ], 500);
        }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Remove the specified resources from database.
<<<<<<< HEAD
     *
     * @param MassDestroyRequest $massDestroyRequest
     * @return \Illuminate\Http\JsonResponse
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $suppressFlash = true;

        $categoryIds = $massDestroyRequest->input('indices');
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        foreach ($categoryIds as $categoryId) {
            $category = $this->categoryRepository->find($categoryId);

            if (isset($category)) {
                if (! $this->isCategoryDeletable($category)) {
                    $suppressFlash = false;

                    return new JsonResponse(['message' => trans('admin::app.catalog.categories.delete-category-root')], 400);
                } else {
                    try {
                        $suppressFlash = true;

                        Event::dispatch('catalog.category.delete.before', $categoryId);

                        $this->categoryRepository->delete($categoryId);

                        Event::dispatch('catalog.category.delete.after', $categoryId);
                    } catch (\Exception $e) {
                        return new JsonResponse([
<<<<<<< HEAD
                            'message' => trans('admin::app.catalog.categories.delete-failed')
=======
                            'message' => trans('admin::app.catalog.categories.delete-failed'),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        ], 500);
                    }
                }
            }
        }

        if (
            count($categoryIds) != 1
            || $suppressFlash == true
        ) {
            return new JsonResponse([
<<<<<<< HEAD
                'message' => trans('admin::app.catalog.categories.delete-success')
=======
                'message' => trans('admin::app.catalog.categories.delete-success'),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ]);
        }

        return redirect()->route('admin.catalog.categories.index');
    }

    /**
     * Mass update Category.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest)
    {
        try {
            $data = $massUpdateRequest->all();
<<<<<<< HEAD
    
            $categoryIds = $data['indices'];
    
            foreach ($categoryIds as $categoryId) {
                Event::dispatch('catalog.categories.mass-update.before', $categoryId);
    
                $category = $this->categoryRepository->find($categoryId);
    
                $category->status = $massUpdateRequest->input('value');
                
                $category->save();
    
                Event::dispatch('catalog.categories.mass-update.after', $category);
            }
    
            return new JsonResponse([
                'message' => trans('admin::app.catalog.categories.update-success')
=======

            $categoryIds = $data['indices'];

            foreach ($categoryIds as $categoryId) {
                Event::dispatch('catalog.categories.mass-update.before', $categoryId);

                $category = $this->categoryRepository->find($categoryId);

                $category->status = $massUpdateRequest->input('value');

                $category->save();

                Event::dispatch('catalog.categories.mass-update.after', $category);
            }

            return new JsonResponse([
                'message' => trans('admin::app.catalog.categories.update-success'),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Check whether the current category is deletable or not.
     *
     * This method will fetch all root category ids from the channel. If `id` is present,
     * then it is not deletable.
     *
     * @param  \Webkul\Category\Contracts\Category  $category
     * @return bool
     */
    private function isCategoryDeletable($category)
    {
        if ($category->id === 1) {
            return false;
        }

        return ! $this->channelRepository->pluck('root_category_id')->contains($category->id);
    }

    /**
     * Get all categories in tree format.
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return \Illuminate\Http\JsonResponse
     */
    public function tree()
    {
        $categories = $this->categoryRepository->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id);

        return CategoryTreeResource::collection($categories);
    }

    /**
     * Result of search customer.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        $results = [];

<<<<<<< HEAD
        $categories = $this->categoryRepository->scopeQuery(function($query) {
=======
        $categories = $this->categoryRepository->scopeQuery(function ($query) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            return $query
                ->select('categories.*')
                ->leftJoin('category_translations', function ($query) {
                    $query->on('categories.id', '=', 'category_translations.category_id')
                        ->where('category_translations.locale', app()->getLocale());
                })
                ->where('category_translations.name', 'like', '%' . urldecode(request()->input('query')) . '%')
                ->orderBy('created_at', 'desc');
        })->paginate(10);

        return response()->json($categories);
    }
}
