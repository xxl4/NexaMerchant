<?php

namespace Webkul\Admin\Http\Controllers\Marketing\Promotions;

use Illuminate\Http\JsonResponse;
<<<<<<< HEAD
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\Admin\DataGrids\Marketing\Promotions\CartRuleCouponDataGrid;
=======
use Webkul\Admin\DataGrids\Marketing\Promotions\CartRuleCouponDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CartRuleCouponController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CartRuleCouponRepository $cartRuleCouponRepository)
    {
    }

    /**
     * Index.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return app(CartRuleCouponDataGrid::class)->toJson();
    }

    /**
     * Generate coupon code for cart rule.
     *
<<<<<<< HEAD
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($id):JsonResponse
=======
     * @param  int  $id
     */
    public function store($id): JsonResponse
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        $this->validate(request(), [
            'coupon_qty'  => 'required|integer|min:1',
            'code_length' => 'required|integer|min:10',
            'code_format' => 'required',
        ]);

<<<<<<< HEAD
        if (!request('id')) {
            return new JsonResponse([
                'message' => trans('admin::app.promotions.cart-rules-coupons.cart-rule-not-defined-error'
            )], 400);
=======
        if (! request('id')) {
            return new JsonResponse([
                'message' => trans('admin::app.promotions.cart-rules-coupons.cart-rule-not-defined-error'
                )], 400);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        }

        $this->cartRuleCouponRepository->generateCoupons(request()->all(), request('id'));

        return new JsonResponse([
            'message' => trans('admin::app.marketing.promotions.cart-rules-coupons.success', ['name' => 'Cart rule coupons']
<<<<<<< HEAD
        )]);
=======
            )]);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Delete Generated coupon code
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
        $this->cartRuleCouponRepository->findOrFail($id);

        $this->cartRuleCouponRepository->delete($id);

        return new JsonResponse(['message' => trans('admin::app.marketing.promotions.cart-rules-coupons.delete-success')]);
    }

    /**
     * Mass delete the coupons.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function massDelete(MassDestroyRequest $massDestroyRequest)
    {
        $couponIds = $massDestroyRequest->input('indices');

        foreach ($couponIds as $couponId) {
            $coupon = $this->cartRuleCouponRepository->find($couponId);

            if ($coupon) {
                $this->cartRuleCouponRepository->delete($couponId);
            }
        }

        session()->flash('success', trans('admin::app.marketing.promotions.cart-rules-coupons.mass-delete-success'));

        return redirect()->back();
    }
}
