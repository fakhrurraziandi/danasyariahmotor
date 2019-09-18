<?php

namespace App\Notifications\Admin;

use App\Admin;
use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanWithdrawNew extends Notification
{
    use Queueable;

    public $withdraw;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PengajuanPembiayaanDana $withdraw)
    {
        $this->withdraw = $withdraw;

        $this->notification_data = [
            'whatsapp_message'  => 'Pengajuan Withdraw Baru dari '. $this->withdraw->user->name,
            'onesignal_message' => 'Pengajuan Withdraw Baru dari '. $this->withdraw->user->name,
            'message'           => 'Pengajuan Withdraw Baru dari '. $this->withdraw->user->name,
            'url'               => route('admin.request_withdraw.edit', $this->withdraw->id),
        ];
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

        WhatsappNotification::create([
            'no_handphone' => $notifiable->phone_number,
            'message' => trim($this->notification_data['whatsapp_message']),
        ]);
        
        

        if($notifiable->userId !== null){
            \OneSignal::sendNotificationToUser(
                $this->notification_data['onesignal_message'],
                $notifiable->userId, 
                $this->notification_data['url']
            );
        }
        
        return [
            'message' => $this->notification_data['message'],
            'url' => $this->notification_data['url'],
            'data' => [
                'withdraw' => $this->withdraw
            ]
        ];
    }
}
