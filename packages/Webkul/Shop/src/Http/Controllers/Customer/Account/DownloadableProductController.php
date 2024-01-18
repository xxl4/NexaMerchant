<?php

namespace Webkul\Shop\Http\Controllers\Customer\Account;

use Illuminate\Support\Facades\Storage;
<<<<<<< HEAD
use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Sales\Repositories\DownloadableLinkPurchasedRepository;
=======
use Webkul\Sales\Repositories\DownloadableLinkPurchasedRepository;
use Webkul\Shop\Http\Controllers\Controller;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class DownloadableProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
<<<<<<< HEAD
     * @param  \Webkul\Sales\Repositories\DownloadableLinkPurchasedRepository  $downloadableLinkPurchasedRepository
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return void
     */
    public function __construct(protected DownloadableLinkPurchasedRepository $downloadableLinkPurchasedRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
<<<<<<< HEAD
    */
=======
     */
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    public function index()
    {
        $downloadableLinkPurchased = $this->downloadableLinkPurchasedRepository->findWhere([
            'customer_id' => auth()->guard('customer')->id(),
        ]);

        return view('shop::customers.account.downloadable_products.index')->with('downloadableLinkPurchased', $downloadableLinkPurchased);
    }

    /**
     * Download the for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $downloadableLinkPurchased = $this->downloadableLinkPurchasedRepository->findOneByField([
            'id'          => $id,
            'customer_id' => auth()->guard('customer')->user()->id,
        ]);

        if ($downloadableLinkPurchased->status == 'pending') {
            abort(403);
        }

        $totalInvoiceQty = 0;
<<<<<<< HEAD
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        if (isset($downloadableLinkPurchased->order->invoices)) {
            foreach ($downloadableLinkPurchased->order->invoices as $invoice) {
                $totalInvoiceQty = $totalInvoiceQty + $invoice->total_qty;
            }
        }

        $orderedQty = $downloadableLinkPurchased->order->total_qty_ordered;
        $totalInvoiceQty = $totalInvoiceQty * ($downloadableLinkPurchased->download_bought / $orderedQty);

        if (
            $downloadableLinkPurchased->download_used == $totalInvoiceQty
            || $downloadableLinkPurchased->download_used > $totalInvoiceQty
        ) {
<<<<<<< HEAD
            session()->flash('warning', trans('shop::app.customers.account.downloadable_products.payment-error'));

            return redirect()->route('shop.customer.downloadable_products.index');
=======
            session()->flash('warning', trans('shop::app.customers.account.downloadable-products.download-error'));

            return redirect()->route('shop.customers.account.downloadable_products.index');
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        }

        if (
            $downloadableLinkPurchased->download_bought
            && ($downloadableLinkPurchased->download_bought - ($downloadableLinkPurchased->download_used + $downloadableLinkPurchased->download_canceled)) <= 0
        ) {
<<<<<<< HEAD

            session()->flash('warning', trans('shop::app.customers.account.downloadable-products.download-error'));

            return redirect()->route('shop.customer.downloadable_products.index');
=======
            session()->flash('warning', trans('shop::app.customers.account.downloadable-products.download-error'));

            return redirect()->route('shop.customers.account.downloadable_products.index');
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        }

        $remainingDownloads = $downloadableLinkPurchased->download_bought - ($downloadableLinkPurchased->download_used + $downloadableLinkPurchased->download_canceled + 1);

        if ($downloadableLinkPurchased->download_bought) {
            $this->downloadableLinkPurchasedRepository->update([
                'download_used' => $downloadableLinkPurchased->download_used + 1,
                'status'        => $remainingDownloads <= 0 ? 'expired' : $downloadableLinkPurchased->status,
            ], $downloadableLinkPurchased->id);
        }

        if ($downloadableLinkPurchased->type == 'file') {
            $privateDisk = Storage::disk('private');

            return $privateDisk->exists($downloadableLinkPurchased->file)
                ? $privateDisk->download($downloadableLinkPurchased->file)
                : abort(404);
        } else {
            $fileName = $name = substr($downloadableLinkPurchased->url, strrpos($downloadableLinkPurchased->url, '/') + 1);

            $tempImage = tempnam(sys_get_temp_dir(), $fileName);

            copy($downloadableLinkPurchased->url, $tempImage);

            return response()->download($tempImage, $fileName);
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
