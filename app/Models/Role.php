<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory, Sortable;

    /**
     * @var string[]
     */
    public $sortable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];
}
