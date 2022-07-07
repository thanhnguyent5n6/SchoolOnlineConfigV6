<?php


namespace SchoolOnline\Config\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pagination\LengthAwarePaginator;
use Jenssegers\Mongodb\Eloquent\Model;

abstract class BaseModel extends Model
{
    use HasFactory;

    protected $primaryKey = '_id';

    protected $connection = 'mongodb';

    protected $collection = "";

    protected $fillable = [];

    public function transformCollection($items)
    {
        $values = [];
        foreach ($items as $item) {
            $item = is_array($item) ? $item : collect($item)->toArray();
            array_push($values, $item);
        }
        $items = array_values($values);

        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform();

    public function getDataPaginate($data, $relation = [], $selectColumn = [], $listFieldSearchKeyWord = [])
    {
        $query = $this;
        $query = !empty($selectColumn) ? $query->select($selectColumn) : $query;
        if (isset($data['fields'])) {
            foreach ($data['fields'] as $field => $values) {
                $fieldAble = $this->getFillable();
                if (!in_array($field, array_merge(['id'], $fieldAble))) {
                    continue;
                }
                $values = is_array($values) ? $values : [$values];
                $query = $query->whereIn($field, $values);
            }
        }
        if (!empty($relation)) {
            $query = $query->with($relation);
        }
        if (isset($data['keyWord'])) {
            foreach ($listFieldSearchKeyWord as $index => $fieldSearch) {
                $query = $query->where(function ($query) use ($fieldSearch, $data) {
                    return $query->where($fieldSearch, "like", "%" . $data['keyWord'] . "%")->orWhere($fieldSearch, "like", "%" . $data['keyword_search'] . "%");
                });
            }
        }
        $limit = $data['pageSize'];
        $page = isset($data['pageIndex']) ? $data['pageIndex'] : 1;
        $items = $query->paginate($limit, ['*'], 'page', $page);
        return $this->convertDataPaginate($items);
    }

    private function convertDataPaginate(LengthAwarePaginator $items): array
    {
        return [
            'size'       => $items->perPage(),
            'page'       => $items->currentPage(),
            'countItems' => count($items->items()),
            'totalItems' => $items->total(),
            'totalPages' => $items->lastPage(),
            'items'      => $this->transformCollection($items),
        ];
    }
}
