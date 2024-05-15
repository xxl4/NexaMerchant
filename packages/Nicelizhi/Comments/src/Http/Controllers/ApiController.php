<?php
namespace Nicelizhi\Comments\Http\Controllers;

use App\Http\Controllers\Controller;
use Google\Rpc\Context\AttributeContext\Response;
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
    public function comments($slug) {

        $product = $product = $this->productRepository->findBySlug($slug);
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

    public function index() {
        return response()->json([
            'message' => 'success'
        ], 200);
    }

    public function commentsListID($id) {
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}