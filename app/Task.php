<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

	protected $fillable = [
        'name','emp_id','start_time','end_time',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
