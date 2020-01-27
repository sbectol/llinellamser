<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title','title_cym', 'dyddiad', 'image', 'asset_type'
      ];
}
