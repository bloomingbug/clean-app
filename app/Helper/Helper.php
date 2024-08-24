<?php

use Illuminate\Support\Str;

if (! function_exists('generateSlug')) {

    function generateSlug($model, string $text, bool $isHaveTrash = false): string
    {
        $slug = Str::slug($text, '-', 'id', [
            '@' => 'at',
            '&' => 'dan',
            '.' => '',
            ',' => '',
            "'" => '',
            '?' => '',
        ]);
        $existSlug = $model::select(['slug', 'created_at'])
            ->when($isHaveTrash, function ($query) {
                return $query->withTrashed();
            })
            ->where('slug', 'like', $slug.'%')
            ->latest('created_at')
            ->first()?->slug;

        if ($existSlug) {
            $slugArray = (explode('-', $existSlug));
            $number = (int) $slugArray[count($slugArray) - 1];
            if ($number === 0) {
                $slug = $slug.'-'.($number + 1);
            } else {
                array_pop($slugArray);
                $slug = implode('-', $slugArray).'-'.($number + 1);
            }
        }

        return $slug;
    }
}
