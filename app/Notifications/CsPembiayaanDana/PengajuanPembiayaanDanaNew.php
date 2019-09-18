<?php

namespace App\Notifications\CsPembiayaanDana;

use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use App\WhatsappNotificationImage;
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
            'whatsapp_message'  => "
Assalamualaikum 
Customer Service
Ibu CS *DSM*

Ada Customer Baru Telah
Mengajukan Pinjaman Dana 
di Website DSM
Incoming - BAF

⚫️ Nama Customer : *{$this->pengajuan_pembiayaan_dana->user->name}*
⚫️ Wilayah : *{$this->pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana->name}*
⚫️ Alamat : *{$this->pengajuan_pembiayaan_dana->user->alamat}*
⚫️ Motor : *{$this->pengajuan_pembiayaan_dana->motor_pembiayaan_dana->name}* 
⚫️ No GSM : *{$this->pengajuan_pembiayaan_dana->user->no_handphone_1}*
⚫️ No WA : *wa.me/62{$this->pengajuan_pembiayaan_dana->user->no_handphone_2}*
⚫️ Tahun Motor : *{$this->pengajuan_pembiayaan_dana->tahun_motor}*
⚫️ STNK : *{$this->pengajuan_pembiayaan_dana->status_stnk->name}*
⚫️ BPKB : *{$this->pengajuan_pembiayaan_dana->status_bpkb->name}*
⚫️ R. Tinggal : *{$this->pengajuan_pembiayaan_dana->status_rumah->name}*

Terima Kasih
Managemen DSM ",
            'onesignal_message' => 'Pengajuan Pembiayaan Dana Baru dari '. $this->pengajuan_pembiayaan_dana->user->name,
            'message'           => 'Pengajuan Pembiayaan Dana Baru dari '. $this->pengajuan_pembiayaan_dana->user->name,
            'url'               => route('cs_pembiayaan_dana.pengajuan_pembiayaan_dana', $this->pengajuan_pembiayaan_dana->id),
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
        $whatsapp_notification = WhatsappNotification::create([
            'no_handphone' => $this->pengajuan_pembiayaan_dana->cs_pembiayaan_dana->phone_number,
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
        
        
        // Onesignal Notification
        if($this->pengajuan_pembiayaan_dana->cs_pembiayaan_dana->userId){
            \OneSignal::sendNotificationToUser(
                $this->notification_data['onesignal_message'],
                $this->pengajuan_pembiayaan_dana->cs_pembiayaan_dana->userId, 
                $this->notification_data['url']
            );
        }
        
        // Native Notification
        return [
            'message' => $this->notification_data['message'],
            'url' => $this->notification_data['url'],
            'data' => [
                'pengajuan_pembiayaan_dana' => $this->pengajuan_pembiayaan_dana
            ]
        ];
    }
}
