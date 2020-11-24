<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany('App\Model\PortfolioImage', "project_id", "id");
    }
}
