<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    
    public function searchableAs()
    {
        return 'posts_index';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }
    
    public function getScoutKey()
    {
        return $this->email();
    }

    public function getScoutKeyName()
    {
        return 'email';
    }
}