<?php

namespace App\Notifications\User;

use App\User;
use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MitraRequestApproved extends Notification
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

Selamat! 
Bpk/Ibu:
*{$this->user->name}*

Status : *Disetujui*
Menjadi *Mitra Bisnis DSM*

Saatnya membuktikan diri anda,
Peluang akan terjadi Jika anda
yang menciptakannya! 

*Raih Insentif sebanyak banyaknya*
Dan Dapatkan Penghasilan
Hingga 30 juta/bulan

Langkah Selanjutnya Silakan 
Join Dan Klik Link Group 
*MITRA DSM* 👇 Di bawah ini
http://bit.ly/GroupDSM

Silakan Pelajari Lebih Detail 
Produk DSM Dan Cara Kerja Mitra
di Group Whatsapp Tersebut. 

Terimakasih telah Mendaftar
Menjadi Mitra Bisnis DSM

Salam Sukses 🙏
*Management DSM*",
            'onesignal_message' =>  "Selamat Request Mitra anda telah di setujui",
            'message'           =>  "Selamat Request Mitra anda telah di setujui",
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
