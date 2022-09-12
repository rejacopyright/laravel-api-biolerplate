<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Uuids, SoftDeletes;
    protected $table = 'admin';
    protected $guarded = [];
    protected $hidden = ['password'];
    protected $cast = ['address' => 'array'];

    function getJWTIdentifier(){
        return $this->getKey();
    }

    function getJWTCustomClaims(){
        return [];
    }
    
    public static function boot() {
        parent::boot();
        static::generateId();
        // static::deleting(function($product) {
        //     // Query
        // });
    }
}
