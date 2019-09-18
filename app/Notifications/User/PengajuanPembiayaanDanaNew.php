<?php

namespace App\Notifications\User;

use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanPembiayaanDanaNew extends Notification
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
            'whatsapp_message'  =>"
Assalamualaikum wr. wb
Bpk/Ibu : *{$this->pengajuan_pembiayaan_dana->user->name}*
                
Terima Kasih Telah Mengajukan
Di Website/Apikasi *DSM* 

Pastikan No GSM / WA Anda 
Bisa di Hubungi Oleh CS Kami

Kontak CS *DSM*
WA CS Vinny : 08155554188
WA CS Rika  : 08122015550
WA CS DSM   : 08128888560

Kami Online Sampai Jam 21:00
Untuk Melakukan Verifikasi 
Sebelum Proses Ke Cabang 
Sesuai Domisili yang Dipilih
Oleh Nasabah.

*#YukMoveOnKeSyariah* ",
            'onesignal_message' =>  'Terima kasih telah mengajukan pembiayaan dana di danasyariahmotor.com',
            'message'           =>  'Terima kasih telah mengajukan pembiayaan dana di danasyariahmotor.com',
            'url'               => route('pengajuan_pembiayaan_dana.show', $this->pengajuan_pembiayaan_dana->id),
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
            'message' => $this->notification_data['message'],
            'url' => $this->notification_data['url'],
            'data' => [
                'pengajuan_pembiayaan_dana' => $this->pengajuan_pembiayaan_dana
            ]
        ];
    }
}
