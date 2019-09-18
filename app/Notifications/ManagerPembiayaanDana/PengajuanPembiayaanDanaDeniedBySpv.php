<?php

namespace App\Notifications\ManagerPembiayaanDana;

use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use App\WhatsappNotificationImage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanPembiayaanDanaDeniedBySpv extends Notification
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
            'whatsapp_message'  =>   "
Assalamualaikum 
_Big Boss AMM BAF SYANA_

ID 8450000053 *(CV.SURYA MOTOR)*
*Dana Syariah Motor* DSM

⚫️ Customer : *{$this->pengajuan_pembiayaan_dana->user->name}*
⚫️ Pencairan : *Rp. ". number_format($this->pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui, 0, ',', '.') ."*

Telah *ditolak* 
Oleh Team *BAF*
Cabang bersangkutan.

Untuk Lebih Detail Nya 
Silakan Login ke Aplikasi

Terima Kasih
*DSM |Dana Syariah Motor* ",
            'onesignal_message' =>   'Pengajuan Pembiayaan Dana dari '. $this->pengajuan_pembiayaan_dana->user->name . ' telah di tolak oleh SPV anda',
            'message'           =>   'Pengajuan Pembiayaan Dana dari '. $this->pengajuan_pembiayaan_dana->user->name . ' telah di tolak oleh SPV anda',
            'url'               => route('manager_pembiayaan_dana.pengajuan_pembiayaan_dana', $this->pengajuan_pembiayaan_dana->id),
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
            'no_handphone' => $this->pengajuan_pembiayaan_dana->manager_pembiayaan_dana->phone_number,
            'message' => trim($this->notification_data['whatsapp_message']),
        ]);

        if(true){ // set to false to deactivate sending image

            if($this->pengajuan_pembiayaan_dana->image_ktp){

                $path = public_path('uploads/'. $this->pengajuan_pembiayaan_dana->image_ktp);
                $base64_string = base64_encode(file_get_contents($path));
    
                WhatsappNotificationImage::create([
                    'whatsapp_notification_id' => $whatsapp_notification->id,
                    'base64_string' => $base64_string
                ]);
            }
    
            if($this->pengajuan_pembiayaan_dana->image_kk){
    
                $path = public_path('uploads/'. $this->pengajuan_pembiayaan_dana->image_kk);
                $base64_string = base64_encode(file_get_contents($path));
    
                WhatsappNotificationImage::create([
                    'whatsapp_notification_id' => $whatsapp_notification->id,
                    'base64_string' => $base64_string
                ]);
            }
    
            if($this->pengajuan_pembiayaan_dana->image_stnk){
    
                $path = public_path('uploads/'. $this->pengajuan_pembiayaan_dana->image_stnk);
                $base64_string = base64_encode(file_get_contents($path));
    
                WhatsappNotificationImage::create([
                    'whatsapp_notification_id' => $whatsapp_notification->id,
                    'base64_string' => $base64_string
                ]);
            }
    
            if($this->pengajuan_pembiayaan_dana->image_bpkb){
    
                $path = public_path('uploads/'. $this->pengajuan_pembiayaan_dana->image_bpkb);
                $base64_string = base64_encode(file_get_contents($path));
    
                WhatsappNotificationImage::create([
                    'whatsapp_notification_id' => $whatsapp_notification->id,
                    'base64_string' => $base64_string
                ]);
            }
    
        }

        
        
        if($this->pengajuan_pembiayaan_dana->manager_pembiayaan_dana->userId){
            \OneSignal::sendNotificationToUser(
                $this->notification_data['onesignal_message'],
                $this->pengajuan_pembiayaan_dana->manager_pembiayaan_dana->userId, 
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
