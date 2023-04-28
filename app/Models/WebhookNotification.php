<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookNotification extends Model{
	protected $fillable = [
        'notification_id',
        'notification_event',
        'notification_secret',
        'notification_content',
        'notification_status'
    ];
}
