<?php

namespace Nicelizhi\Lp\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Nicelizhi\Manage\Http\Controllers\Controller;
use Nicelizhi\Manage\Helpers\SSP;
use Illuminate\Support\Facades\Cache;


use Webkul\Admin\Http\Requests\MassDestroyRequest;


class AdminLpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
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
            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'lps';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`p`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return $d;
                } ),
                array( 'db' => '`p`.`name`',   'dt' => 'name', 'field'=>'name' ),
                array( 'db' => '`p`.`slug`',   'dt' => 'slug', 'field'=>'slug','formatter' => function($d, $row) {
                    return config('app.url')."/products/".$d;
                } ),
                array( 'db' => '`p`.`type`',   'dt' => 'type', 'field'=>'type' ),
                array( 'db' => '`p`.`goto_url`',   'dt' => 'goto_url', 'field'=>'goto_url' ),
                array( 'db' => '`p`.`status`',   'dt' => 'status', 'field'=>'status' ),
                array( 'db' => '`p`.`updated_at`',   'dt' => 'updated_at', 'field'=>'updated_at' )
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = "FROM `{$table}` AS `p` ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));






        }

        return view('lp::admin.index');
    }

    /**
     * To create a new CMS page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('lp::admin.create');
    }

    /**
     * To store a new CMS page in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'slug'      => ['required', 'unique:lps,slug', new \Webkul\Core\Rules\Slug],
            'name'   => 'required',
            'html_content' => 'required',
        ]);

        Event::dispatch('cms.pages.create.before');

        $data = request()->only([
            'page_title',
            'channels',
            'html_content',
            'meta_title',
            'url_key',
            'meta_keywords',
            'meta_description',
        ]);

        $page = $this->cmsRepository->create($data);

        Event::dispatch('cms.pages.create.after', $page);

        session()->flash('success', trans('lp::app.cms.create-success'));

        return redirect()->route('lp.admin.index');
    }

    /**
     * To edit a previously created CMS page.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $page = \Nicelizhi\Lp\Models\Lp::where('id', $id)->first();


        return view('lp::admin.edit', compact('page'));
    }

     /**
     * To edit a previously created CMS page.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function copy($id)
    {

        $model = \Nicelizhi\Lp\Models\Lp::where('id', $id)->first();

        $newModel = $model->replicate();

        $newModel->name = $model->name.'-'.time().'-copy';
        $newModel->slug = $model->slug.'-'.time().'-copy';
        $newModel->save();
        
        session()->flash('success', trans('admin::app.cms.update-success'));

        return redirect()->route('admin.lp.index');
    }

    /**
     * To update the previously created CMS page in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $html = request()->input('html');
        $name = request()->input("name");
        $slug = request()->input("slug");
        $goto_url = request()->input("goto_url");
        $type = request()->input("type");

        $update = [];
        $update['html'] = $html;
        $update['name'] = $name;
        $update['slug'] = $slug;
        $update['goto_url'] = $goto_url;
        $update['type'] = $type;

        \Nicelizhi\Lp\Models\Lp::where('id', $id)->update($update);

        // $page = $this->cmsRepository->update($data, $id);

        // Event::dispatch('cms.pages.update.after', $page);

        session()->flash('success', trans('admin::app.cms.update-success'));
        $default_country = config('onebuy.default_country');

        //save this file to specific folder
        // $default_country = config('onebuy.default_country');
        // if(file_exists(public_path()."/resources/".$default_country."/".$slug)) {
        //     mkdir(public_path()."/resources/".$default_country."/".$slug);
        // }
        // $local_image_path = "/resources/".$default_country."/".$slug."/index.html";
        // //echo $local_image_path."\r\n";
        // //echo public_path()."/resources/".$default_country."/".$slug."\r\n";
        // //exit;
        // Storage::disk("public")->put($local_image_path, $html);

        //git push

        if (!is_dir(public_path()."/resources/".$default_country."/".$slug)) {
            // dir doesn't exist, make it
            mkdir(public_path()."/resources/".$default_country."/".$slug, 0775, true);
        }

        $path = public_path()."/resources/".$default_country."/".$slug."/index.html";
        file_put_contents($path, $html);

        $path = public_path()."/resources/";
        $command = "cd ".$path." && git pull && git add . && git commit -m 'auto ".$slug."--".date("Y-m-d H:i:s")."' . && git push";
        //echo $command."\r\n";
        exec($command, $res);
        //exit;


        Cache::pull("lp_".$slug);

        return redirect()->route('admin.lp.index');
    }

    /**
     * To delete the previously create CMS page.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id): JsonResponse
    {
        Event::dispatch('cms.pages.delete.before', $id);

        $this->cmsRepository->delete($id);

        Event::dispatch('cms.pages.delete.after', $id);

        return new JsonResponse(['message' => trans('admin::app.cms.delete-success')]);
    }

    /**
     * To mass delete the CMS resource from storage.
     *
     * @param MassDestroyRequest $massDestroyRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function massDelete(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $indices = $massDestroyRequest->input('indices');

        foreach ($indices as $index) {
            Event::dispatch('cms.pages.delete.before', $index);

            $this->cmsRepository->delete($index);

            Event::dispatch('cms.pages.delete.after', $index);
        }

        return new JsonResponse([
            'message' => trans('admin::app.cms.index.datagrid.mass-delete-success')
        ], 200);
    }
}
