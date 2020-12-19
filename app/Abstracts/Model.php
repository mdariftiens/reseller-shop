<?php


namespace App\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\Model  as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Lorisleiva\LaravelSearchString\Concerns\SearchString;

abstract class Model extends Eloquent
{
    use SoftDeletes, SearchString, Sortable, HasFactory;


    protected $dates = ['deleted_at'];

    protected $casts = [
        'enabled' => 'boolean',
    ];


    /**
     * Scope to get all rows filtered, sorted and paginated.
     *
     * @param Builder $query
     * @param $sort
     *
     * @return Builder
     */
    public function scopeCollect($query, $sort = 'name')
    {
        $request = request();

        $search = $request->get('search');
        $limit = $request->get('limit', env('DEFAULT_PAGINATE_LIMIT', 25));

        return $query->usingSearchString($search)->sortable($sort)->paginate($limit);
    }


    /**
     * Scope to only include active models.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeEnabled(Builder $query): Builder
    {
        return $query->where('enabled', 1);
    }

    /**
     * Scope to only include inactive models.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeDisabled(Builder $query): Builder
    {
        return $query->where('enabled', 0);
    }
}
