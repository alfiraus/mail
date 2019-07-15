<?php

namespace App;

/*use Jenssegers\Mongodb\Eloquent\Model as Eloquent;*/
use Illuminate\Database\Eloquent\Model as Eloquent;

class UserDetail extends Eloquent
{
    protected $collection = 'user_details';

    protected $fillable = [
        'user_id',
        'email',
        'username',
        'country',
        'image_id',
        'image_path',
        'image_name',
        'status',
        'status_date',
        'email_is_verified',
        'notification_id',
        'notification_flag',
        'quickblox_id',
        'last_login_ip', 
        'last_login_platform', 
        'last_login_guid'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}