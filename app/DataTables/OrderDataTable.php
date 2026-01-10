<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Order> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', 'order.action')
            ->addColumn('user', function ($query) {
                return $query->admission->name;
            })
            ->addColumn('date', function ($query) {
                return date('d-M-Y', strtotime($query->admission->created_at));
            })
            ->addColumn('amount', function ($query) {
                return $query->currency . ' ' . $query->amount;
            })
            ->addColumn('card_type', function ($query) {
                return $query->card_type == null ? '-' : $query->card_type;
            })
            ->addColumn('bank_tran_id', function ($query) {
                return $query->bank_tran_id == null ? '-' : $query->bank_tran_id;
            })
            //     ->addColumn('approve', function ($query) {
            //         return "<select class='form-control is_approved' data-id='$query->id'>
            //     <option value='pending'>Pending</option>
            //     <option value='processing'>Processing</option>
            //     <option value='completed'>Completed</option>
            //   </select>";
            //     })
            ->addColumn('approve', function ($query) {
                $statuses = ['pending', 'processing', 'completed', 'cancelled'];
                $html = "<select class='form-control is_approved' data-id='{$query->id}'>";

                foreach ($statuses as $status) {
                    $selected = $query->status == $status ? 'selected' : '';
                    $html .= "<option value='{$status}' {$selected}>" . ucfirst($status) . "</option>";
                }

                $html .= "</select>";
                return $html;
            })
            ->rawColumns(['user', 'date', 'amount', 'card_type', 'bank_tran_id', 'approve'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Order>
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('order-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'desc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('user')->title('name'),
            Column::make('date'),
            Column::make('bank_tran_id')->title('Bank Transaction ID'),
            Column::make('transaction_id'),
            Column::make('amount'),
            Column::make('approve')->title('Status'),
            Column::make('card_type')->title('Payment Method'),
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
