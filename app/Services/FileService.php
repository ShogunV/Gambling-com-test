<?php

namespace App\Services;

use Illuminate\Support\Collection;

class FileService
{

    public function parseFile(string $file): Collection
    {
        $lines = collect();

        if (is_file($file)) {
            foreach (file($file) as $line) {
                $lines->push(json_decode($line));
            }
        }
        return $lines;
    }
}
