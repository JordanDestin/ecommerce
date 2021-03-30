<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->eloquent($query)
            ->addColumn('show', function ($product) {
                return '<a href="' . route('products.show', $product->id) . '" class="btn btn-xs btn-info btn-block" target="_blank">Voir</a>';
            })
            ->addColumn('edit', function ($product) {
                return '<a href="' . route('edit.product', $product->id) . '" class="btn btn-xs btn-warning btn-block">Modifier</a>';
            })
            ->addColumn('destroy', function ($product) {
                return '<a href="#" class="btn btn-xs btn-danger btn-block">Supprimer</a>';
            })
            ->editColumn('active', function ($product) {
                return $product->active ? '<i class="fas fa-check text-success"></i>' : ''; 
            })
            ->rawColumns(['show', 'edit', 'destroy', 'active']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
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
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
         /*   Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),*/
                  Column::make('id'),
                  Column::make('title')->title('Nom'),
                //  Column::make('subtitle')->title('Sous-titre'),
                  Column::make('description')->title('Description'),
                  Column::make('quantite')->title('Quantité'),
                  Column::make('price')->title('Prix TTC'),
                  
                  Column::computed('show')
                    ->title('')
                    ->width(60)
                    ->addClass('text-center'),
                  Column::computed('edit')
                    ->title('')
                    ->width(60)
                    ->addClass('text-center'),
                  Column::computed('destroy')
                    ->title('')
                    ->width(60)
                    ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product_' . date('YmdHis');
    }
}
