<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model 
{
    
    protected $fillable = [
        'staffno',
        'staffnames',
        'idno',
        'gender',
        'status',
        'pinno',
        'nhifno',
        'nssfno',
        'cellphone',
        'email',
        'dob',
        'emp_date',
        'department',
        'payetype',
        'no_relief',
        'nhif_relief',
        'pobox',
        'nationality',
        'marital',
        'paymode',
        'bank',
        'branch',
        'accountno',
        'nok',
        'nokcellphone',
        'nokrelation',
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
        return 'id';
    }
    
    public function setStaffNameAttribute($value){
        $this->attributes['stafnames'] = ucwords($value);
    }

    // protected static function boot()
    // {
    // 	//parent::boot();
    // 	// static::creating(function($employee){
    // 	// 	$employee->employee_id = strtoupper(uniqid("EMP"));
    // 	// });
    // }
}
