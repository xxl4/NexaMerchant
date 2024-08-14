<?php

namespace Nicelizhi\Lp\DataGrids\Lp;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class LpDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $whereInLocales = core()->getRequestedLocaleCode() === 'all'
            ? core()->getAllLocales()->pluck('code')->toArray()
            : [core()->getRequestedLocaleCode()];

        $queryBuilder = DB::table('lps')
            ->select(
                'lps.id',
                'lps.name',
                'lps.slug'
            );

        $this->addFilter('id', 'lps.id');

        return $queryBuilder;
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('admin::app.cms.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('admin::app.cms.index.datagrid.page-title'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'slug',
            'label'      => trans('admin::app.cms.index.datagrid.url-key'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        $this->addAction([
            'icon'   => 'icon-view',
            'title'  => trans('admin::app.cms.index.datagrid.view'),
            'method' => 'GET',
            'index'  => 'slug',
            'target' => '_blank',
            'url'    => function ($row) {
                return route('lp.products.slug.page', $row->slug);
            },
        ]);

        if (bouncer()->hasPermission('lp.edit')) {
            $this->addAction([
                'icon'   => 'icon-edit',
                'title'  => trans('admin::app.cms.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('admin.lp.edit', $row->id);
                },
            ]);
        }

        if (bouncer()->hasPermission('lp.delete')) {
            $this->addAction([
                'icon'   => 'icon-delete',
                'title'  => trans('admin::app.cms.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('admin.lp.delete', $row->id);
                },
            ]);
        }
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        if (bouncer()->hasPermission('cms.mass-delete')) {
            $this->addMassAction([
                'title'  => trans('admin::app.cms.index.datagrid.delete'),
                'method' => 'POST',
                'url'    => route('admin.cms.mass_delete'),
            ]);
        }
    }
}
