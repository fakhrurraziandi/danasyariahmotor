<?php

namespace App\Notifications\User;

use App\User;
use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MitraRequestDenied extends Notification
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
			Assalamualaikum wr. wb

Mohon Maaf 🙏
bpk/ibu:
*{$this->user->name}*

Status : *Tidak Disetujui*
Menjadi *Mitra Bisnis DSM*

Sukses berjalan dari kegagalan 
menuju kegagalan tanpa 
kehilangan antusiasme.

Terimakasih telah Mendaftar
Menjadi Mitra Bisnis DSM

Kesempatan masih terbuka
Silahkan coba di lain waktu

Salam Sukses 🙏
*Management DSM*",
            'onesignal_message' =>  "Mohon Maaf Request Mitra anda telah di tolak",
            'message'           =>  "Mohon Maaf Request Mitra anda telah di tolak",
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
