<?php

namespace App\DataTables;

use App\Transporteur;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TransporteursDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
          
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Transporteur $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transporteur $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('transporteurs-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['excel', 'csv','print','reset','reload',],
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

            
            Column::make('id'),
            Column::make('nom'),
            Column::make('tel'),
            Column::make('cin'),
            Column::make('zone'),
            Column::make('matricule'),
            Column::make('type'),
            Column::make('garntie'),
            Column::make('montant'),
            Column::make('rq'),
            Column::make('status'),
            Column::make('contrat'),
         
       
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Transporteurs_' . date('YmdHis');
    }
}
