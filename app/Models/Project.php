<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Project
{
    public static function all()
    {
        $path = resource_path('projects');
        $files = File::files($path);
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }

    public static function find($slug)
    {
        $file = resource_path("projects/{$slug}.html");
        if (!file_exists($file)) {
            abort(404);
        }
        return cache()->remember("project.{$slug}", 10, function () use ($file) {
            return file_get_contents($file);
        });
    }
}
