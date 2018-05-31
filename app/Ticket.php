<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property mixed $user
 */
class Ticket extends Model
{
    protected $with = ['category'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}