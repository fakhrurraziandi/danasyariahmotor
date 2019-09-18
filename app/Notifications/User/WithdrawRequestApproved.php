<?php

namespace App\Notifications\User;

use App\User;
use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WithdrawRequestApproved extends Notification
{
    use Queueable;

    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        $this->notification_data = [
            'whatsapp_message'  =>  "
_Selamat Permintaan Penarikan Komisi_
_Telah Di Setujui dan Sudah di Transfer_
_Ke Rekening Mitra Sesuai Nama Bank yang_
_Tertera di Profile Mitra_ ",
            'onesignal_message' =>  "Selamat Wthdraw Request anda telah di setujui",
            'message'           =>  "Selamat Wthdraw Request anda telah di setujui",
            'url'               => '#',
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
            'no_handphone' => $notifiable->no_handphone_2,
            'message' => trim($this->notification_data['whatsapp_message']),
        ]);
        
        if($notifiable->userId){
            

            \OneSignal::sendNotificationToUser(
                $this->notification_data['onesignal_message'],
                $notifiable->userId,
                $this->notification_data['url']
            );
        }

        return [
            'message' => $this->notification_data['message'],
            'url' => $this->notification_data['url'],
            'data' => []
        ];
    }
}
