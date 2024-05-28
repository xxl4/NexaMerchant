<?php
namespace Nicelizhi\Comments\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Webkul\Product\Repositories\ProductRepository;

class ApiController extends Controller {

    public function __construct(
        protected ProductRepository $productRepository
    )
    {
        
    }

    /**
     * @var ProductRepository
     */
    public function CommentsListSlug($slug) {

        $product = $this->productRepository->findBySlug($slug);
        if(is_null($product)) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $reviewHelper = app('Webkul\Product\Helpers\Review');

        return [
            '@type'       => 'AggregateRating',
            'ratingValue' => $reviewHelper->getAverageRating($product),
            'reviewCount' => $reviewHelper->getTotalReviews($product),
        ];


        $data = [];

        $data['comments'] = $product->approvedReviews()->paginate(10);
        $data['ratingValue'] = $reviewHelper->getAverageRating($product);
        $data['reviewCount'] = $reviewHelper->getTotalReviews($product);

        return response()->json([
            'data' => $data,
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function index(Request $request) {
        $per_page = request()->get('per_page', 10);
        $page = request()->get('page', 0);
        $product_id = request()->get('product_id', null);
        $product_id = request()->get('product_id', null);

        $product = $this->productRepository->findBySlug($product_id);
        
        if(is_null($product)) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $reviewHelper = app('Webkul\Product\Helpers\Review');

        $reviews = $product->reviews->where('status', 'approved')->skip($page*$per_page)->take($per_page);

        $reviews = $reviews->map(function($review) {
            $review->customer = $review->customer;
            $review->images;
            return $review;
        });


        $data = [];
        $data['reviews'] = $reviews;
        $data['ratingValue'] = $reviewHelper->getAverageRating($product);
        $data['reviewCount'] = $reviewHelper->getTotalReviews($product);
        $data['getReviewsWithRatings'] = $reviewHelper->getReviewsWithRatings($product);
        $data['getPercentageRating'] = $reviewHelper->getPercentageRating($product);
        $data['getTotalRating'] = $reviewHelper->getTotalRating($product);
        $data['per_page'] = $per_page;
        $data['page'] = $page;
        $data['total'] = $reviewHelper->getTotalReviews($product);
        $data['product'] = $this->productRepository->findBySlug($product_id);
        $data['product_id'] = $product_id;

        return response()->json([
            'data' => $data,
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

}