<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use App\Models\ContactForm;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\{Builder as HtmlBuilder, Column};
use Yajra\DataTables\Services\DataTable;

class ContactMessageDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $deleteBtn = "<a href='".route('admin.contact-message.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $viewBtn = "<button class='btn btn-primary view-message' 
                data-name='{$query->Full_name}' 
                data-email='{$query->Email_address}' 
                data-phone='{$query->Phone_number}' 
                data-message='".addslashes($query->Message)."'>
                <i class='fas fa-eye'></i>
                </button>";
                return $viewBtn . $deleteBtn;
            })
            ->setRowId('id');
    }

    public function query(ContactForm $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('contact-message-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->selectStyleSingle();
    }

    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('Full_name'),
            Column::make('Email_address'),
            Column::make('Message'),
            Column::make('Phone_number'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(120)
                  ->addClass('text-center'),
        ];
    }
}