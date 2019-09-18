<?php

namespace App\Notifications\CsPembiayaanDana;

use App\WhatsappNotification;
use Illuminate\Bus\Queueable;
use App\PengajuanPembiayaanDana;
use App\WhatsappNotificationImage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanPembiayaanDanaApprovedBySpv extends Notification
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
Apa Kabar Bu *{$this->pengajuan_pembiayaan_dana->cs_pembiayaan_dana->name}* 

Pengajuan Pinjaman Dana 
Atas Nama : *{$this->pengajuan_pembiayaan_dana->user->name}*

Telah *Disetujui* Oleh 
Marketing Head Cabang *BAF*

Status : *Telah disetujui*
Plafond : *Rp. ". number_format($this->pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui, 0, ',', '.') ."*
Angsuran : *Rp. ". number_format($this->pengajuan_pembiayaan_dana->angsuran, 0, ',', '.') ."*
Tempo : *{$this->pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_disetujui->tempo} Bulan*

Salam Sukses 
Management DSM BAF ", 
            'onesignal_message' => 'Pengajuan Pembiayaan Dana dari '. $this->pengajuan_pembiayaan_dana->user->name . ' telah di setujui oleh SPV anda',
            'message'           => 'Pengajuan Pembiayaan Dana dari '. $this->pengajuan_pembiayaan_dana->user->name . ' telah di setujui oleh SPV anda',
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

        if(false){ // set to false to deactivate sending image

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
