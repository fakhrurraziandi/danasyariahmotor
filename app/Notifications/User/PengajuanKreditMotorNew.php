<?php

namespace App\Notifications\User;

use App\PengajuanKreditMotor;
use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanKreditMotorNew extends Notification
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

        $this->notification_data = [
            'whatsapp_message'  =>    "
Assalamualaikum wr. wb
Bpk/Ibu : *{$this->pengajuan_kredit_motor->user->name}*
                
Salam Kenal, Saya Dengan 
*Hendra - CS Motor Yamaha (SPM)*
_Surya Putra Motor_

Terima Kasih Telah Mengajukan
Kredit Motor Baru Yamaha 
di Website Kami
                
Pengajuan Anda Akan Segera 
di Proses Harap ditunggu

Kami akan Segera Menghubungi 
Anda Pastikan Nomer GSM / Wa
Anda Aktif.
                
Terima Kasih
*Hendra - CS SPM* ",
            'onesignal_message' =>    'Terima kasih anda telah mengajukan kredit motor di danasyariahmotor.com',
            'message'           =>    'Terima kasih anda telah mengajukan kredit motor di danasyariahmotor.com',
            'url'               => route('pengajuan_kredit_motor.show', $this->pengajuan_kredit_motor)
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
            'no_handphone' => $this->pengajuan_kredit_motor->user->no_handphone_2,
            'message' => trim($this->notification_data['whatsapp_message']),
        ]);
        
        if($this->pengajuan_kredit_motor->user->userId){
            \OneSignal::sendNotificationToUser(
                $this->notification_data['onesignal_message'],
                $this->pengajuan_kredit_motor->user->userId, 
                $this->notification_data['url']
            );
        }
        return [
            'message' => $this->notification_data['message'],
            'url' => $this->notification_data['url'],
            'data' => [
                'pengajuan_kredit_motor' => $this->pengajuan_kredit_motor
            ]
        ];
    }
}
