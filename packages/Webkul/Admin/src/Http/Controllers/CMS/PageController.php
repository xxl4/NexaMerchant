<?php

namespace Webkul\Admin\Http\Controllers\CMS;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
<<<<<<< HEAD
use Webkul\CMS\Repositories\CmsRepository;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\DataGrids\CMS\CMSPageDataGrid;
use Webkul\Admin\Http\Requests\MassDestroyRequest;

=======
use Webkul\Admin\DataGrids\CMS\CMSPageDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\CMS\Repositories\PageRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(protected CmsRepository $cmsRepository)
=======
    public function __construct(protected PageRepository $pageRepository)
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
    }

    /**
     * Loads the index page showing the static pages resources.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(CMSPageDataGrid::class)->toJson();
        }

        return view('admin::cms.index');
    }

    /**
     * To create a new CMS page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::cms.create');
    }

    /**
     * To store a new CMS page in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'url_key'      => ['required', 'unique:cms_page_translations,url_key', new \Webkul\Core\Rules\Slug],
            'page_title'   => 'required',
            'channels'     => 'required',
            'html_content' => 'required',
        ]);

<<<<<<< HEAD
        Event::dispatch('cms.pages.create.before');
=======
        Event::dispatch('cms.page.create.before');
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        $data = request()->only([
            'page_title',
            'channels',
            'html_content',
            'meta_title',
            'url_key',
            'meta_keywords',
            'meta_description',
        ]);

<<<<<<< HEAD
        $page = $this->cmsRepository->create($data);

        Event::dispatch('cms.pages.create.after', $page);
=======
        $page = $this->pageRepository->create($data);

        Event::dispatch('cms.page.create.after', $page);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        session()->flash('success', trans('admin::app.cms.create-success'));

        return redirect()->route('admin.cms.index');
    }

    /**
     * To edit a previously created CMS page.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
<<<<<<< HEAD
        $page = $this->cmsRepository->findOrFail($id);
=======
        $page = $this->pageRepository->findOrFail($id);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        return view('admin::cms.edit', compact('page'));
    }

    /**
     * To update the previously created CMS page in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $locale = core()->getRequestedLocaleCode();

        $this->validate(request(), [
            $locale . '.url_key'      => ['required', new \Webkul\Core\Rules\Slug, function ($attribute, $value, $fail) use ($id) {
<<<<<<< HEAD
                if (! $this->cmsRepository->isUrlKeyUnique($id, $value)) {
=======
                if (! $this->pageRepository->isUrlKeyUnique($id, $value)) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    $fail(trans('admin::app.cms.index.already-taken', ['name' => 'Page']));
                }
            }],
            $locale . '.page_title'   => 'required',
            $locale . '.html_content' => 'required',
            'channels'                => 'required',
        ]);

<<<<<<< HEAD
        Event::dispatch('cms.pages.update.before', $id);
=======
        Event::dispatch('cms.page.update.before', $id);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        $data = [
            $locale    => request()->input($locale),
            'channels' => request()->input('channels'),
            'locale'   => $locale,
        ];

<<<<<<< HEAD
        $page = $this->cmsRepository->update($data, $id);

        Event::dispatch('cms.pages.update.after', $page);
=======
        $page = $this->pageRepository->update($data, $id);

        Event::dispatch('cms.page.update.after', $page);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        session()->flash('success', trans('admin::app.cms.update-success'));

        return redirect()->route('admin.cms.index');
    }

    /**
     * To delete the previously create CMS page.
     *
<<<<<<< HEAD
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id): JsonResponse
    {
        Event::dispatch('cms.pages.delete.before', $id);

        $this->cmsRepository->delete($id);

        Event::dispatch('cms.pages.delete.after', $id);
=======
     * @param  int  $id
     */
    public function delete($id): JsonResponse
    {
        Event::dispatch('cms.page.delete.before', $id);

        $this->pageRepository->delete($id);

        Event::dispatch('cms.page.delete.after', $id);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        return new JsonResponse(['message' => trans('admin::app.cms.delete-success')]);
    }

    /**
     * To mass delete the CMS resource from storage.
<<<<<<< HEAD
     *
     * @param MassDestroyRequest $massDestroyRequest
     * @return \Illuminate\Http\JsonResponse
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function massDelete(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $indices = $massDestroyRequest->input('indices');

        foreach ($indices as $index) {
<<<<<<< HEAD
            Event::dispatch('cms.pages.delete.before', $index);

            $this->cmsRepository->delete($index);

            Event::dispatch('cms.pages.delete.after', $index);
        }

        return new JsonResponse([
            'message' => trans('admin::app.cms.index.datagrid.mass-delete-success')
=======
            Event::dispatch('cms.page.delete.before', $index);

            $this->pageRepository->delete($index);

            Event::dispatch('cms.page.delete.after', $index);
        }

        return new JsonResponse([
            'message' => trans('admin::app.cms.index.datagrid.mass-delete-success'),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ], 200);
    }
}
