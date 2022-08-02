<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reservasi extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $full_name,$no_hp,$service,$list_harga,$tgl_reservasi,$jam_reservasi,$kecamatan,$kelurahan,$alamat,$wa
    )
    {
        $this->full_name = $full_name;
        $this->no_hp = $no_hp;
        $this->service = $service;
        $this->list_harga = $list_harga;
        $this->tgl_reservasi = $tgl_reservasi;
        $this->jam_reservasi = $jam_reservasi;
        $this->kecamatan = $kecamatan;
        $this->kelurahan = $kelurahan;
        $this->alamat = $alamat;
        $this->wa = $wa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Viera Mom & Baby SPA')
            ->subject('Info Booking Reservasi')
            ->markdown('mails.reservasi')
            ->with([
                'full_name' => $this->full_name,
                'no_hp' => $this->no_hp,
                'service' => $this->service,
                'list_harga' => $this->list_harga,
                'tgl_reservasi' => $this->tgl_reservasi,
                'jam_reservasi' => $this->jam_reservasi,
                'kecamatan' => $this->kecamatan,
                'kelurahan' => $this->kelurahan,
                'alamat' => $this->alamat,
                'wa' => $this->wa,
            ]);
    }
}
