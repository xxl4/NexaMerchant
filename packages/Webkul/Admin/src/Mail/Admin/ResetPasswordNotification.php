<?php

namespace Webkul\Admin\Mail\Admin;

<<<<<<< HEAD
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
=======
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class ResetPasswordNotification extends ResetPassword
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
            ->view('admin::emails.admin.forget-password', [
<<<<<<< HEAD
                'userName' => $notifiable->name,
=======
                'userName'  => $notifiable->name,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'token'     => $this->token,
            ]);
    }
}
