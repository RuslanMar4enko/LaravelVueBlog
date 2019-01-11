<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
      'name',
      'language_id'
    ];

    public function language()
    {
        return $this->hasOne(Language::class);
    }
}
