<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

if (! function_exists('generateSlug')) {

    function generateSlug($model, string $value, string $key = 'slug', bool $isHaveTrash = false): string
    {
        $slug = Str::slug(trim($value), '-', 'id', [
            '@' => 'at',
            '&' => 'dan',
            '.' => '',
            ',' => '',
            "'" => '',
            '?' => '',
        ]);

        $exist = $model::select([$key, 'created_at'])
            ->when($isHaveTrash, function ($query) {
                return $query->withTrashed();
            })
            ->where($key, 'like', $slug . '%')
            ->latest('created_at')
            ->first()
            ->toArray();

        if (array_key_exists($key, $exist)) {
            $slugArray = (explode('-', $exist[$key]));
            if (!is_numeric($slugArray[count($slugArray) - 1])) {
                $slug = $slug . '-1';
            } else {
                $number = (int) $slugArray[count($slugArray) - 1];
                array_pop($slugArray);
                $slug = implode('-', $slugArray) . '-' . ($number + 1);
            }
        }

        return $slug;
    }
}
