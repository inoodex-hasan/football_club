<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use App\Models\Message;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\{Builder as HtmlBuilder, Button, Column};
use Yajra\DataTables\Services\DataTable;

class MessageDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Message> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('message', function ($row) {
                return Str::limit(strip_tags($row->message), 50, '...');
            })
            ->addColumn('action', function ($query) {
                $editBtn = '<a href="' . route('admin.message.edit', $query->id) . '" class="btn btn-primary"><i class="far fa-edit"></i></a>';
                $deleteBtn = '<a href="' . route('admin.message.destroy', $query->id) . '" class="btn btn-danger ml-2 delete-item"><i class="fas fa-trash"></i></a>';
                return $editBtn . $deleteBtn;
            })
            ->addColumn('photo', function ($query) {
                return '<img src="' . asset($query->photo) . '" alt="' . htmlspecialchars($query->name) . '" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; border: 1px solid #ddd;">';
            })
            ->addColumn('status', function ($query) {
                if ($query->status) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->rawColumns(['action', 'photo', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Message $model): QueryBuilder
    {
        return $model->newQuery();
        // return $model->newQuery()->editColumn('message', function ($row) {
        //     return Str::limit(strip_tags($row->message), 50);
        // });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('messages-table')
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
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID')->width(50),
            Column::make('photo')->title('Photo'),
            Column::make('name')->title('Name'),
            Column::make('designation')->title('Designation'),
            Column::make('message')->title('Message') ,
            Column::make('status')->title('Status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center')
                ->title('Actions'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Team_' . date('YmdHis');
    }
}