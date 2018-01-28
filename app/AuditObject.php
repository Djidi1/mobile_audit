<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditObject extends Model
{
    protected $table = 'audit_objects';
    protected $fillable = [
        'title',
        'user_id',
        'audit_object_group_id'
    ];

    public function audit_object_groups(){
        return $this->belongsTo('App\AuditObjectGroup', 'audit_object_group_id');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
