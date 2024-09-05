<?php

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
            ->where($key, 'like', $slug.'%')
            ->latest('created_at')
            ->first()
            ?->toArray();

        if ($exist) {
            if (array_key_exists($key, $exist)) {
                $slugArray = (explode('-', $exist[$key]));
                if (! is_numeric($slugArray[count($slugArray) - 1])) {
                    $slug = $slug.'-1';
                } else {
                    $number = (int) $slugArray[count($slugArray) - 1];
                    array_pop($slugArray);
                    $slug = implode('-', $slugArray).'-'.($number + 1);
                }
            }
        }

        return $slug;
    }

    function censorName($name)
    {
        $parts = explode(' ', $name);
        $formattedName = '';

        foreach ($parts as $part) {
            $formattedName .= strtoupper($part[0]).str_repeat('*', strlen($part) - 1).' ';
        }

        return trim($formattedName);
    }

    function formatInitials($name, $maxChars = 3)
    {
        $parts = explode(' ', $name);
        $initials = '';

        foreach ($parts as $part) {
            $initials .= strtoupper($part[0]);
            if (strlen($initials) >= $maxChars) {
                break;
            }
        }

        return substr($initials, 0, $maxChars);
    }
}
