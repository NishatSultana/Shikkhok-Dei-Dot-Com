<?php

namespace App\Providers;

use App\SenderNotification;
use Illuminate\Support\ServiceProvider;
use App\CoreMechanism\Acl;
use Auth;

class AclviewServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        view()->composer('*', function($view) {

            if(Auth::check())
            {
                $templateUser = Auth::user();

                $acl = new Acl($templateUser);

                $templatePermissions = $acl->get_group_permissions();

                // Unread Messages
                $conditions = [
                    ['type', 'App\Notifications\NewMessage'],
                    ['read_at', null],
                    ['notifiable_id', $templateUser->id]
                ];

                $unread_messages = SenderNotification::where($conditions)->get();
                $total_unread = SenderNotification::where($conditions)->get()->count();

                // Unread Notification
                $notify_conditions = [
                    ['type', 'App\Notifications\NewNotification'],
                    ['read_at', null],
                    ['notifiable_id', $templateUser->id]
                ];

                $unread_notify = SenderNotification::where($notify_conditions)->get();
                $total_unread_notify = SenderNotification::where($notify_conditions)->get()->count();

                return $view->with([
                    'templatePermissions' => $templatePermissions,
                    'templateUser' => $templateUser,
                    'unread_messages' => $unread_messages,
                    'total_unread' => $total_unread,
                    'unread_notify' => $unread_notify,
                    'total_unread_notify' => $total_unread_notify
                ]);
            }

        });
    }
}
