<?php


namespace SchoolOnline\Transform;


use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseTransformer
{
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

    public function transformPaginate(LengthAwarePaginator $items)
    {
        return array(
            'size'       => $items->perPage(),
            'page'       => $items->currentPage(),
            'countItems' => count($items->items()),
            'totalItems' => $items->lastPage(),
            'data'       => $this->transformCollection($items),
        );
    }

    public abstract function transform($item);
}
