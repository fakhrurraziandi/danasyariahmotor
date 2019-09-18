<?php

namespace App\Notifications\CsKreditMotor;

use App\PengajuanKreditMotor;
use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanKreditMotorDeniedBySpv extends Notification
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
            'whatsapp_message'  =>  "
Assalamualaikum 
Customer Service
Bpk/Ibu : *{$this->pengajuan_kredit_motor->cs_kredit_motor->name}*

Status Aplikasi User
Telah di *Tolak*

⚫️ Nama Customer : *{$this->pengajuan_kredit_motor->user->name}*
⚫️ No GSM : *{$this->pengajuan_kredit_motor->user->no_handphone_1}*
⚫️ No WA : *{$this->pengajuan_kredit_motor->user->no_handphone_2}*
⚫️ Alamat : *{$this->pengajuan_kredit_motor->user->alamat}*

Terima Kasih
Management
Surya Motor ",
            'onesignal_message' =>  'Pengajuan Kredit Motor dari '. $this->pengajuan_kredit_motor->user->name . ' telah di tolak oleh SPV anda',
            'message'           =>  'Pengajuan Kredit Motor dari '. $this->pengajuan_kredit_motor->user->name . ' telah di tolak oleh SPV anda',
            'url'               => route('cs_kredit_motor.pengajuan_kredit_motor', $this->pengajuan_kredit_motor->id),
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
            'no_handphone' => $this->pengajuan_kredit_motor->cs_kredit_motor->phone_number,
            'message' => trim($this->notification_data['whatsapp_message']),
        ]);
        
        if($this->pengajuan_kredit_motor->cs_kredit_motor->userId){
            \OneSignal::sendNotificationToUser(
                $this->notification_data['onesignal_message'],
                $this->pengajuan_kredit_motor->cs_kredit_motor->userId, 
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
