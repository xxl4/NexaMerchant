<?php

namespace Nicelizhi\Manage\DataGrids\Marketing;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Webkul\DataGrid\DataGrid;

class SitemapDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('sitemaps')->addSelect('id', 'file_name', 'path', 'path as url');

        return $queryBuilder;
    }

    /**
     * Add Columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('admin::app.marketing.sitemaps.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'width'      => '40px',
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'file_name',
            'label'      => trans('admin::app.marketing.sitemaps.index.datagrid.file-name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'path',
            'label'      => trans('admin::app.marketing.sitemaps.index.datagrid.path'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'url',
            'label'      => trans('admin::app.marketing.sitemaps.index.datagrid.link-for-google'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
            'closure'    => function ($row) {
                return Storage::url($row->path . '/' . $row->file_name);
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        if (bouncer()->hasPermission('marketing.sitemaps.edit')) {
            $this->addAction([
                'icon'   => 'icon-edit',
                'title'  => trans('admin::app.marketing.sitemaps.index.datagrid.edit'),
                'method' => 'GET',
                'route'  => 'admin.marketing.promotions.sitemaps.update',
                'url'    => function ($row) {
                    return route('admin.marketing.promotions.sitemaps.update', $row->id);
                },
            ]);
        }

        if (bouncer()->hasPermission('marketing.sitemaps.delete')) {
            $this->addAction([
                'icon'   => 'icon-delete',
                'title'  => trans('admin::app.marketing.sitemaps.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('admin.marketing.promotions.sitemaps.delete', $row->id);
                },
            ]);
        }
    }
}
