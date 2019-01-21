<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = [
       'name',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'language_id');
    }

}
