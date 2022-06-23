<?php


namespace App\Services;


abstract class BaseService
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

    public function transformCollectionKeepFormat($items)
    {
        return array_map([
            $this,
            'transform'
        ], $items);
    }

    public function transform($item)
    {
        return $item->toArray();
    }
}
