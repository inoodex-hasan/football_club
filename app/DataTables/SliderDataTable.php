<?php

namespace App\DataTables;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use App\Models\Slider;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\{Builder as HtmlBuilder, Button, Column};
use Yajra\DataTables\Html\Editor\{Editor, Fields};
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Slider> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = '<a href="' . route('admin.sliders.edit', $query->id) . '" class="btn btn-primary"><i class="far fa-edit"></i></a>';
                $deleteBtn = '<a href="' . route('admin.sliders.destroy', $query->id) . '" class="btn btn-danger ml-2 delete-item"><i class="fas fa-trash"></i></a>';
                return $editBtn . $deleteBtn;
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . asset($query->image) . '" alt="' . htmlspecialchars($query->title) . '" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">';
            })
            ->addColumn('subtitle', function ($query) {
                return Str::limit($query->subtitle ?? 'N/A', 50);
            })
            ->addColumn('status', function ($query) {
                if ($query->is_active) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->rawColumns(['action', 'image', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Slider>
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('slider-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'desc')
            ->selectStyleSingle()
            ->stateSave(true)
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
            Column::make('id')->title('ID'),
            Column::make('image')->title('Image'),
            Column::make('title')->title('Title'),
            Column::make('subtitle')->title('Subtitle'),
            Column::make('description')->title('Description'),
            Column::make('status')->title('Status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center')
                ->title('Actions'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Slider_' . date('YmdHis');
    }
}

