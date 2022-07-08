<?php


namespace SchoolOnline\Transform;


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

    public abstract function transform($item);
}
