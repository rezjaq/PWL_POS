<?php

namespace App\DataTables;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Builder;
use App\Models\LevelModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($user) {
                return '
                    <a href="' . route('user.show', $user->id) . '" class="btn btn-info btn-sm">
                        <i class="fa fa-eye"></i> Show
                    </a>
                    <a href="' . route('user.edit', $user->id) . '" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="' . route('user.destroy', $user->id) . '" method="POST" style="display: inline;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                ';
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UserModel $model): Builder
    {
        return $model->newQuery()->with('level');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('user_id'),
            Column::make('level_id'),
            Column::make('username'),
            Column::make('nama'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
