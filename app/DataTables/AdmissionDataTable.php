<?php

namespace App\DataTables;

use App\Models\Admission;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdmissionDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Admission> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $showBtn = "<a href='" . route('admin.admission.show', $query->id) . "'class='btn btn-primary'><i class='far fa-eye'></i></a>";
                $editBtn = "<a href='" . route('admin.admission.edit', $query->id) . "'class='btn btn-primary ml-2'><i class='far fa-edit'></i></a>";
                return $showBtn . $editBtn;
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . asset($query->image) . '" width="80px">';
            })
            ->addColumn('order_status', function ($query) {
                $status = $query->order?->status ?? null;

                if ($status === null) {
                    return '-';
                }

                $badgeClass = match (strtolower($status)) {
                    'pending'   => 'bg-warning text-white',
                    'processing'   => 'bg-info text-white',
                    'completed' => 'bg-success text-white',
                    'cancelled' => 'bg-danger text-white',
                    default     => 'bg-secondary text-white',
                };

                return '<span class="badge ' . $badgeClass . '">' . ucfirst($status) . '</span>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 'pending') {
                    return '<span class="badge bg-warning text-white">Pending</span>';
                } else {
                    return '<span class="badge bg-success text-white">Completed</span>';
                }
            })
            ->addColumn('price', function ($query) {
                return $query->order?->amount ?? 0;
            })
            ->rawColumns(['action', 'image', 'order_status', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Admission>
     */
    public function query(Admission $model): QueryBuilder
    {
        $query = $model->newQuery()->with(['order']);

        if (request()->date) {
            $query->whereDate('created_at', request()->date);
        }

        if (request()->month) {
            [$year, $month] = explode('-', request()->month);
            $query->whereYear('created_at', $year)
                ->whereMonth('created_at', $month);
        }

        if (request()->year) {
            $query->whereYear('created_at', request()->year);
        }

        if (request()->age) {
            $query->where('age', request()->age);
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('admission-table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('admin.admission.index'), null, [
                'date'  => '$("#filter_date").val()',
                'month' => '$("#filter_month").val()',
                'year'  => '$("#filter_year").val()',
                'age'   => '$("#filter_age").val()',
            ])
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
            Column::make('image'),
            Column::make('name'),
            Column::make('status'),
            Column::make('order_status'),
            Column::make('price'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(180)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Admission_' . date('YmdHis');
    }
}
