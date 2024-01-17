<?php

namespace Webkul\Admin\Http\Controllers\Customers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Event;
use Illuminate\Http\JsonResponse;
=======
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\DataGrids\Customers\ReviewDataGrid;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Product\Repositories\ProductReviewRepository;
<<<<<<< HEAD
use Webkul\Admin\DataGrids\Customers\ReviewDataGrid;
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class ReviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Product\Repositories\ProductReviewRepository  $productReview
     * @return void
     */
    public function __construct(protected ProductReviewRepository $productReviewRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(ReviewDataGrid::class)->toJson();
        }

        return view('admin::customers.reviews.index');
    }

    /**
     * Review Details
     *
     * @param  int  $id
<<<<<<< HEAD
     * @return \Illuminate\Http\JsonResponse
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function edit($id): JsonResponse
    {
        $review = $this->productReviewRepository->with(['images', 'product'])->findOrFail($id);

        $review->date = $review->created_at->format('Y-m-d');

        return new JsonResponse([
<<<<<<< HEAD
            'data' => $review
=======
            'data' => $review,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Event::dispatch('customer.review.update.before', $id);

        $review = $this->productReviewRepository->update(request()->only(['status']), $id);

        Event::dispatch('customer.review.update.after', $review);

        session()->flash('success', trans('admin::app.customers.reviews.update-success', ['name' => 'admin::app.customers.reviews.review']));

        return redirect()->route('admin.customers.customers.review.index');
    }

    /**
     * Delete the review of the current product
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
        $this->productReviewRepository->findOrFail($id);

        try {
            Event::dispatch('customer.review.delete.before', $id);

            $this->productReviewRepository->delete($id);

            Event::dispatch('customer.review.delete.after', $id);

            return new JsonResponse(['message' => trans('admin::app.customers.reviews.index.datagrid.delete-success', ['name' => 'Review'])]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => trans('admin::app.response.delete-failed', ['name' => 'Review'])], 500);
        }
    }

    /**
     * Mass delete the reviews on the products.
<<<<<<< HEAD
     *
     * @param MassDestroyRequest $massDestroyRequest
     * @return \Illuminate\Http\JsonResponse
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $indices = $massDestroyRequest->input('indices');

        try {
            foreach ($indices as $index) {
                Event::dispatch('customer.review.delete.before', $index);

                $this->productReviewRepository->delete($index);

                Event::dispatch('customer.review.delete.after', $index);
            }

            return new JsonResponse([
<<<<<<< HEAD
                'message' => trans('admin::app.customers.reviews.index.datagrid.mass-delete-success')
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage()
=======
                'message' => trans('admin::app.customers.reviews.index.datagrid.mass-delete-success'),
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ], 500);
        }
    }

    /**
     * Mass approve the reviews on the products.
<<<<<<< HEAD
     *
     * @param MassUpdateRequest $massUpdateRequest
     * @return \Illuminate\Http\JsonResponse
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest): JsonResponse
    {
        $indices = $massUpdateRequest->input('indices');

        foreach ($indices as $id) {
            Event::dispatch('customer.review.update.before', $id);

            $review = $this->productReviewRepository->update([
                'status' => $massUpdateRequest->input('value'),
            ], $id);

            Event::dispatch('customer.review.update.after', $review);
        }

        return new JsonResponse([
<<<<<<< HEAD
            'message' => trans('admin::app.customers.reviews.index.datagrid.mass-update-success')
        ], 200);
    }
}
=======
            'message' => trans('admin::app.customers.reviews.index.datagrid.mass-update-success'),
        ], 200);
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
