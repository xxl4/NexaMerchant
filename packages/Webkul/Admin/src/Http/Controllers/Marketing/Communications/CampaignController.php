<?php

namespace Webkul\Admin\Http\Controllers\Marketing\Communications;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
<<<<<<< HEAD
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Marketing\Repositories\CampaignRepository;
use Webkul\Marketing\Repositories\TemplateRepository;
use Webkul\Admin\DataGrids\Marketing\Communications\CampaignDataGrid;
=======
use Webkul\Admin\DataGrids\Marketing\Communications\CampaignDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Marketing\Repositories\CampaignRepository;
use Webkul\Marketing\Repositories\TemplateRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CampaignController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CampaignRepository $campaignRepository,
        protected TemplateRepository $templateRepository,
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
            return app(CampaignDataGrid::class)->toJson();
        }

        return view('admin::marketing.communications.campaigns.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $templates = $this->templateRepository->findByField('status', 'active');

        return view('admin::marketing.communications.campaigns.create', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name'                  => 'required',
            'subject'               => 'required',
            'marketing_template_id' => 'required',
            'marketing_event_id'    => 'required_if:schedule_type,event',
        ]);

        Event::dispatch('marketing.campaigns.create.before');

        request()['status'] = request()->input('status') ? request()->input('status') : 0;

        $campaign = $this->campaignRepository->create(request()->only([
            'name',
            'subject',
            'marketing_event_id',
            'marketing_template_id',
            'status',
            'channel_id',
            'customer_group_id',
        ]));

        Event::dispatch('marketing.campaigns.create.after', $campaign);

        session()->flash('success', trans('admin::app.marketing.communications.campaigns.create-success'));

        return redirect()->route('admin.marketing.communications.campaigns.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $campaign = $this->campaignRepository->findOrFail($id);

        $templates = $this->templateRepository->findByField('status', 'active');

        return view('admin::marketing.communications.campaigns.edit', compact('campaign', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(), [
            'name'                  => 'required',
            'subject'               => 'required',
            'marketing_template_id' => 'required',
            'marketing_event_id'    => 'required_if:schedule_type,event',
        ]);

        Event::dispatch('marketing.campaigns.update.before', $id);

        request()['status'] = request()->input('status') ? request()->input('status') : 0;

        $campaign = $this->campaignRepository->update(request()->only([
            'name',
            'subject',
            'marketing_event_id',
            'marketing_template_id',
            'status',
            'channel_id',
<<<<<<< HEAD
            'customer_group_id'
=======
            'customer_group_id',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]), $id);

        Event::dispatch('marketing.campaigns.update.after', $campaign);

        session()->flash('success', trans('admin::app.marketing.communications.campaigns.update-success'));

        return redirect()->route('admin.marketing.communications.campaigns.index');
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
        $this->campaignRepository->findOrFail($id);

        try {
            Event::dispatch('marketing.campaigns.delete.before', $id);

            $this->campaignRepository->delete($id);

            Event::dispatch('marketing.campaigns.delete.after', $id);

            return new JsonResponse([
                'message' => trans('admin::app.marketing.communications.campaigns.delete-success'),
            ]);
        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('admin::app.marketing.communications.campaigns.delete-failed', ['name' => 'admin::app.marketing.communications.campaigns.email-campaign']),
        ], 500);
    }
}
