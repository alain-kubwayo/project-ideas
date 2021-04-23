<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

use Spatie\YamlFrontMatter\YamlFrontMatter;

class Project
{
    public $name;
    public $desc;
    public $date;
    public $slug;
    public $body;

    public function __construct($name, $desc, $date, $hello, $slug, $body)
    {
        $this->name = $name;
        $this->desc  = $desc;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }


    public static function all()
    {
        $files = File::files(resource_path('projects'));
        return cache()->remember("projects.all", 120, function () use ($files) {
            return collect($files)
                ->map(function ($projectIdea) {
                    return YamlFrontMatter::parse(file_get_contents($projectIdea));
                })
                ->map(function ($projectIdea) {
                    return new Project(
                        $projectIdea->name,
                        $projectIdea->desc,
                        $projectIdea->date,
                        $projectIdea->hello,
                        $projectIdea->slug,
                        $projectIdea->body()
                    );
                })->sortByDesc('date');
        });
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        $project = static::find($slug);
        if (!$project) {
            throw new ModelNotFoundException();
        }
        return $project;
    }
}
