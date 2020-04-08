<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function tasks()
    {
        return $this->hasMany('App\Task');
    }


    public static function ratings()
    {

        $beforWeek = Carbon::now()->subtract(7 ,'day');
        $now = Carbon::now();

        $ratings = DB::table('tasks')
                   ->select(DB::raw('count(tasks.id) as tasks') ,"users.name")
                   ->join("users","users.id","=","tasks.emp_id")
                   ->whereDate('end_time', '>=' ,$beforWeek)
                   ->whereDate('end_time', '<' ,$now)
                   ->groupBy('users.name')
                   ->paginate(5);

        return $ratings;

    }

}
