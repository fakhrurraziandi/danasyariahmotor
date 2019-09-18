<?php

namespace App\Notifications\User\Mitra;

use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use App\WhatsappNotificationImage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanPembiayaanDanaDeniedByCs extends Notification
{
    use Queueable;

    public $pengajuan_pembiayaan_dana;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        $this->pengajuan_pembiayaan_dana = $pengajuan_pembiayaan_dana;

        $this->notification_data = [
            'whatsapp_message'  => "Pengajuan Pembiayaan Dana dari {$this->pengajuan_pembiayaan_dana->user->name} telah di tolak oleh CS",
            'onesignal_message' => "Pengajuan Pembiayaan Dana dari {$this->pengajuan_pembiayaan_dana->user->name} telah di tolak oleh CS",
            'message'           => "Pengajuan Pembiayaan Dana dari {$this->pengajuan_pembiayaan_dana->user->name} telah di tolak oleh CS",
            'url'               => route('dashboard_user.show_pengajuan_pembiayaan_dana_mitra', $this->pengajuan_pembiayaan_dana->id), 
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

        $whatsapp_notification = WhatsappNotification::create([
            'no_handphone' => $this->pengajuan_pembiayaan_dana->mitra->phone_number,
            'message' => trim($this->notification_data['whatsapp_message']),
        ]);

       
        
        if($this->pengajuan_pembiayaan_dana->mitra->userId){
            \OneSignal::sendNotificationToUser(
                $this->notification_data['onesignal_message'],
                $this->pengajuan_pembiayaan_dana->mitra->userId, 
                $this->notification_data['url']
            );
        }
       
        return [
            'message' => $this->notification_data['message'],
            'url' => $this->notification_data['url'],
            'data' => [
                'pengajuan_pembiayaan_dana' => $this->pengajuan_pembiayaan_dana
            ]
        ];
    }
}
