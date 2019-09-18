<?php

namespace App\Notifications\User;

use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanPembiayaanDanaDenied extends Notification
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
            'whatsapp_message'  => "
Assalamualaikum wr. wb

Pengajuan Pinjaman Dana Syariah Motor
Atas Nama : *{$this->pengajuan_pembiayaan_dana->user->name}*

Status Pengajuan : *Cancel*
*{$this->pengajuan_pembiayaan_dana->user_note}*

Terima Kasih

*#YukMoveOnKeSyariah*
*DSM |Dana Syariah Motor* ",
            'onesignal_message' => 'Pengajuan pembiayaan dana anda telah di tolak',
            'message'           => 'Pengajuan pembiayaan dana anda telah di tolak',
            'url'               => route('dashboard_user.show_pengajuan_pembiayaan_dana', $this->pengajuan_pembiayaan_dana->id),
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

        // Whatsapp Notification
        WhatsappNotification::create([
            'no_handphone' => $this->pengajuan_pembiayaan_dana->user->no_handphone_2,
            'message' => trim($this->notification_data['whatsapp_message']),
        ]);
        
        if($this->pengajuan_pembiayaan_dana->user->userId){
            \OneSignal::sendNotificationToUser(
                $this->notification_data['onesignal_message'],
                $this->pengajuan_pembiayaan_dana->user->userId,
                $this->notification_data['url']
            );
        }
        return [
            'message' => $this->notification_data['onesignal_message'],
            'url' => $this->notification_data['url'], 
            'data' => [
                'pengajuan_pembiayaan_dana' => $this->pengajuan_pembiayaan_dana
            ]
        ];
    }
}
