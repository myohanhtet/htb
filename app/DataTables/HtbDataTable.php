<?php

namespace App\DataTables;

use App\Models\Htb;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class HtbDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'htbs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Htb $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Htb $model)
    {
        return $model->newQuery()->with('user');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'scrollX' => true,
                'order'   => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],

                'initComplete' => "function () {
                this.api().columns([0,2]).every( function () {
                    var column = this;
                    var input = $('<input style=\"width:50px;height:25px\"></input>')
                        .appendTo( $(column.header()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
     
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
     
                        input.addClass('form-control form-control-sm');
                                        
                } );
            }",

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'lucky_no',
            // 'win_name',
            'amount',
            'mtl',
            'mtl_vaule',
            'donar',
            'address',
            'create by' => ['data'=>'user.name'],
            'created_at',
            'updated_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'htbsdatatable_' . time();
    }
}
