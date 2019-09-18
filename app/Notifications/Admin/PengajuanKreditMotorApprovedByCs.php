<?php

namespace App\Notifications\Admin;

use App\Admin;
use App\PengajuanKreditMotor;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanKreditMotorApprovedByCs extends Notification
{
    use Queueable;

    public $pengajuan_kredit_motor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PengajuanKreditMotor $pengajuan_kredit_motor)
    {
        $this->pengajuan_kredit_motor = $pengajuan_kredit_motor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        // $admins = Admin::all();

        // foreach($admins as $admin){
        //     if($admin->userId !== null){
        //         \OneSignal::sendNotificationToUser(
        //             'Pengajuan Kredit '. $this->pengajuan_kredit_motor->user->name . ' telah di setujui oleh CS',
        //             $admin->userId,
        //             $url = route('admin.pengajuan_kredit_motor.show', $this->pengajuan_kredit_motor->id)
        //         );
        //     }
        // }

        return [
            'message' => 'Pengajuan Kredit '. $this->pengajuan_kredit_motor->user->name . ' telah di setujui oleh CS',
            'url' => route('admin.pengajuan_kredit_motor.show', $this->pengajuan_kredit_motor->id),
            'data' => [
                'pengajuan_kredit_motor' => $this->pengajuan_kredit_motor
            ]
        ];
    }
}
