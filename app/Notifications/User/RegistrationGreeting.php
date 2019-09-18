<?php

namespace App\Notifications\User;


use App\User;
use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegistrationGreeting extends Notification
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
            'whatsapp_message'  =>    "
_Assalamualaikum Wr Wb_
Bpk/Ibu: *{$this->user->name}* 

_Harap dibaca sampai Tuntas_

Proses Selanjutnya Silakan
Klik Menu *Ajukan Sekarang*
di website / Aplikasi. 
Untuk Pengisian Form Pengajuan 
*Dana Syariah Motor*

Tidak Memiliki *BPKB* tidak Bisa 
Di Proses *Wajib Memiliki BPKB* 
Motor Minimal Tahun 2010
Dan Wajib di *Survey Ke Rumah*

Take Over dari leasing lain bisa kami 
Proses minimal Sisa Angsuran *6 bln*
Lebih dari *6* Bln tidak bisa.

*STNK Mati* atas Nama Orang Lain
Wajib di Perpanjang Terlebih Dahulu.

*STNK Mati 1 s/d 3 thn* 
atas Nama Sendiri Bisa di proses.

Kami Memiliki Kantor Cabang
Seluruh Indonesia. 

*#YukMoveOnKeSyariah* ",
            'onesignal_message' =>    'Terima Kasih Telah Mendaftar di Website / Aplikasi *DSM*',
            'message'           =>    'Terima Kasih Telah Mendaftar di Website / Aplikasi *DSM*',
            'url'               => '#'
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

        return [
            'message' => $this->notification_data['message'],
            'url' => $this->notification_data['url'],
            'data' => []
        ];
        
        
    }
}
