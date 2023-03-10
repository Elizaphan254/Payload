<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model 
{
    
    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'birthdate',
        'media_id',
        'address',
        'gender',
        'remark',
        'position_id',
        'schedule_id',
        'rate_per_hour',
        'salary',
        'is_active',
    ];
    
    protected $hidden = [
        'avatarMedia',
    ];
    
    protected $appends = ['media_url','created_on','total_working_hour','gross_amount'];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    public function getRouteKeyName()
    {
        return 'employee_id';
    }
    
    public function setFirstNameAttribute($value){
        $this->attributes['first_name'] = ucwords($value);
    }
    
    public function setLastNameAttribute($value){
        $this->attributes['last_name'] = ucwords($value);
    }
    
    protected static function boot()
    {
    	parent::boot();
    	static::creating(function($employee){
    		$employee->employee_id = strtoupper(uniqid("EMP"));
    	});
    }

    public function registerMediaCollections(){
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->registerMediaConversions(function(Media $media){
                $this->addMediaConversion('thumb')
                ->format('png')
                ->width(128)
                ->height(128);
            });
    }
    
    // public function position(){
    //     return $this->hasOne(Position::class,'id','position_id');
    // }
    
}
