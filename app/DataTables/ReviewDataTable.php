<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use App\Models\Review;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\{Builder as HtmlBuilder, Column};
use Yajra\DataTables\Services\DataTable;

class ReviewDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $editBtn = "<a href='".route('admin.reviews.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('admin.reviews.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $editBtn . $deleteBtn;
            })
            ->addColumn('image', function($query){
                return "<img width='70px' class='rounded-circle' src='".asset($query->image)."' >";
            })
            ->addColumn('status', function($query){
                if($query->status == 1){
                    return '<span class="badge badge-success">Active</span>';
                }else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->addColumn('rating', function($query){
                $stars = '';
                for ($i = 1; $i <= 5; $i++) {
                    $stars .= $i <= $query->rating ? '<i class="fas fa-star text-warning"></i>' : '<i class="fas fa-star text-muted"></i>';
                }
                return $stars;
            })
            ->rawColumns(['image', 'action', 'status', 'rating'])
            ->setRowId('id');
    }

    public function query(Review $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('review-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->selectStyleSingle();
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->width(60),
            Column::make('image')->width(100),
            Column::make('name'),
            Column::make('comment'),
            Column::make('rating'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(150)
                  ->addClass('text-center'),
        ];
    }
}