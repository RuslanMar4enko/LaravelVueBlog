<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
class Category extends Model
{
    use NodeTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'language_id',
        '_lft',
        '_rgt',
        'parent_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
