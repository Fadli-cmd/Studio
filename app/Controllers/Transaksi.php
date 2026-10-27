<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\ModelPaket;
use App\Models\ModelPembayaran;
use App\Models\ModelPembatalan;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->pemesanan = new BookingModel();
        $this->pembayaran = new ModelPembayaran();
        $this->pembatalan  = new ModelPembatalan();
        $this->paket  = new ModelPaket();
    }

    public function Mkonfirmasi()
    {
        $countOrder = $this->pemesanan->countAllResults();
        $ttlcountOrder = 0;
        if ($countOrder != 0) {
            $ttlcountOrder = $countOrder;
        }
        $countMenungguPembayaran = $this->pemesanan->where('stts_trx', "MENUNGGU PEMBAYARAN")->countAllResults();
        $ttlcountMenungguPembayaran = 0;
        if ($countMenungguPembayaran != 0) {
            $ttlcountMenungguPembayaran = $countMenungguPembayaran;
        }
        $countMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "MENUNGGU KONFIRMASI")->countAllResults();
        $dataMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "MENUNGGU KONFIRMASI")->findAll();
        for ($i = 0; $i < count($dataMenungguKonfirmasi); $i++) {
            $dataPembayaran = $this->pembayaran->where('invoice', $dataMenungguKonfirmasi[$i]['id_pemesanan'])->first();
            $dataPaket = $this->paket->where('id_paket',$dataMenungguKonfirmasi[$i]['id_paket'])->first();
            $namaPaket = $dataPaket['nama_paket'];
            $dataMenungguKonfirmasi[$i]['nama_pengirim'] = $dataPembayaran['nama_pengirim'];
            $dataMenungguKonfirmasi[$i]['rek_pelanggan'] = $dataPembayaran['rek_pelanggan'];
            $dataMenungguKonfirmasi[$i]['bukti_tf'] = $dataPembayaran['bukti_tf'];
        }

        $ttlcountMenungguKonfirmasi = 0;
        if ($countMenungguKonfirmasi != 0) {
            $ttlcountMenungguKonfirmasi = $countMenungguKonfirmasi;
        }
        // $dataOrder = $this->pemesanan->findAll();

        $data = [
            'countAllOrder' => $ttlcountOrder,
            'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
            'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
            'data' => $dataMenungguKonfirmasi,
            // 'namapaket' =>$namaPaket,
            // 'dataOrder' => $dataOrder,
        ];


        // echo "<pre>";
        // print_r($data);

        return view('transaksi/M_Konfirmasi', $data);
    }

    public function confirmtransaksi($invoice)
    {
        if ($this->request->isAJAX()) {
            // $data = $this->getVar('invoice');

            $data = [
                'stts_trx' => "PEMBAYARAN DIKONFIRMASI",
            ];

            // $this->pemesanan->insert($data);
            $this->pemesanan->update($invoice, $data);

            $json = [
                'success' => "$invoice Pembayaran berhasil dikonfirmasi!"

            ];
            echo json_encode($json);
        }
    }

    public function buatlunas($invoice)
    {
        if ($this->request->isAJAX()) {

            $data = $this->pemesanan->where('id_pemesanan', $invoice)->first();
            $totalbayar = $data['ttl_bayar'];
            $sisabayar = $data['sisa_bayar'];
            $ttlbayarNow = $totalbayar + $sisabayar;

            $datas = [
                'sisa_bayar' => 0,
                'ttl_bayar' => $ttlbayarNow
            ];
            $this->pemesanan->update($invoice, $datas);


            // echo "<pre>";
            // print_r ($ttlbayarNow);
            // echo "</pre>";

            $json = [
                'success' => "Transaksi berhasil diubah!"

            ];
            echo json_encode($json);
        }
    }

    public function hapustransaksi($invoice)
    {
        if ($this->request->isAJAX()) {
            // $data = $this->getVar('invoice');

            // $this->pemesanan->insert($data);
            $this->pemesanan->delete($invoice);

            $json = [
                'success' => "Transaksi berhasil dihapus!"

            ];
            echo json_encode($json);
        }
    }

    public function bataltransaksi()
    {
        if ($this->request->isAJAX()) {
            // $data = $this->getVar('invoice');

            $invoice = $this->request->getPost("invoice");
            $alasan = $this->request->getPost("alasan");

            $data = [
                'stts_trx' => "PEMBAYARAN DIBATALKAN",
            ];

            $dataInsert = [
                'invoice' => $invoice,
                'alasan' => $alasan
            ];

            $this->pembatalan->insert($dataInsert);
            $this->pemesanan->update($invoice, $data);
            // $data = $this->pembatalan->findAll();

            $json = [
                'success' => "$invoice Pembayaran berhasil dibatalkan!"

            ];
            echo json_encode($json);
        }

        // print_r("$invoice");
    }

    public function Mpembayaran()
    {
        $countOrder = $this->pemesanan->countAllResults();
        $ttlcountOrder = 0;
        if ($countOrder != 0) {
            $ttlcountOrder = $countOrder;
        }
        $countMenungguPembayaran = $this->pemesanan->where('stts_trx', "MENUNGGU PEMBAYARAN")->countAllResults();
        $ttlcountMenungguPembayaran = 0;
        if ($countMenungguPembayaran != 0) {
            $ttlcountMenungguPembayaran = $countMenungguPembayaran;
        }
        $countMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "MENUNGGU KONFIRMASI")->countAllResults();
        $ttlcountMenungguKonfirmasi = 0;
        if ($countMenungguKonfirmasi != 0) {
            $ttlcountMenungguKonfirmasi = $countMenungguKonfirmasi;
        }
        $dataOrder = $this->pemesanan->findAll();

        $dataMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "MENUNGGU PEMBAYARAN")->findAll();
        for ($i = 0; $i < count($dataMenungguKonfirmasi); $i++) {
            $dataPembayaran = $this->pembayaran->where('invoice', $dataMenungguKonfirmasi[$i]['id_pemesanan'])->first();
        }

        $data = [
            'countAllOrder' => $ttlcountOrder,
            'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
            'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
            'dataOrder' => $dataOrder,
            'data' => $dataMenungguKonfirmasi
        ];
        return view('transaksi/M_Pembayaran', $data);
    }
    public function datatransaksi()
    {
        $countOrder = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->countAllResults();
        $ttlcountOrder = 0;
        if ($countOrder != 0) {
            $ttlcountOrder = $countOrder;
        }
        $countMenungguPembayaran = $this->pemesanan->where('stts_trx', "MENUNGGU PEMBAYARAN")->countAllResults();
        $ttlcountMenungguPembayaran = 0;
        if ($countMenungguPembayaran != 0) {
            $ttlcountMenungguPembayaran = $countMenungguPembayaran;
        }
        $countMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "MENUNGGU KONFIRMASI")->countAllResults();
        $ttlcountMenungguKonfirmasi = 0;
        if ($countMenungguKonfirmasi != 0) {
            $ttlcountMenungguKonfirmasi = $countMenungguKonfirmasi;
        }
        $dataOrder = $this->pemesanan->findAll();

        $dataMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->findAll();
        for ($i = 0; $i < count($dataMenungguKonfirmasi); $i++) {
            $dataPembayaran = $this->pembayaran->where('invoice', $dataMenungguKonfirmasi[$i]['id_pemesanan'])->first();
            $dataMenungguKonfirmasi[$i]['nama_pengirim'] = $dataPembayaran['nama_pengirim'];
            $dataMenungguKonfirmasi[$i]['rek_pelanggan'] = $dataPembayaran['rek_pelanggan'];
            $dataMenungguKonfirmasi[$i]['bukti_tf'] = $dataPembayaran['bukti_tf'];
        }

        $data = [
            'countAllOrder' => $ttlcountOrder,
            'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
            'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
            'dataOrder' => $dataOrder,
            'data' => $dataMenungguKonfirmasi
        ];
        return view('transaksi/dataTransaksi', $data);
    }
    public function cekPembayaran()
    {
        return view('transaksi/cekPembayaran');
    }
}
