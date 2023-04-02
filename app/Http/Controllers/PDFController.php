<?php

namespace App\Http\Controllers;

use App\Models\Bina;
use App\Models\Kayit;
use App\Models\Sakin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public $sayilar = [
        'birler' => [
            0 => '',
            1 => 'bir',
            2 => 'iki',
            3 => 'üç',
            4 => 'dört',
            5 => 'beş',
            6 => 'altı',
            7 => 'yedi',
            8 => 'sekiz',
            9 => 'dokuz',
        ],

        'onlar' => [
            0 => '',
            1 => 'on',
            2 => 'yirmi',
            3 => 'otuz',
            4 => 'kırk',
            5 => 'elli',
            6 => 'altmış',
            7 => 'yetmiş',
            8 => 'seksen',
            9 => 'doksan',
        ],

        'yuzler' => [
            0 => '',
            1 => 'yüz',
            2 => 'iki yüz',
            3 => 'üç yüz',
            4 => 'dört yüz',
            5 => 'beş yüz',
            6 => 'altı yüz',
            7 => 'yedi yüz',
            8 => 'sekiz yüz',
            9 => 'dokuz yüz',
        ],
    ];

    public $bina;
    public $yonetici;
    public $kayit;
    public $borclu;
    public $sakinler;

    public function getData($idKayit)
    {
        if (!session('bina_id')) {
            return redirect()->route('binalar');
        }

        $this->bina = Bina::find(session('bina_id'));
        $this->yonetici = User::find($this->bina->user_id);

        $this->kayit = Kayit::find($idKayit);

        $this->borclu['yazi'] = '-';
        $this->borclu['kapino'] = '-';
        $this->borclu['isim'] = '-';

        if (is_numeric($this->kayit->sakin_id) && $this->kayit->sakin_id > 0) {
            $owner = Sakin::find($this->kayit->sakin_id);

            $this->borclu['yazi'] =
                'Yalnız ' .
                $this->numberToText($this->kayit->tutar) .
                ' Türk Lirası tahsil edilmiştir.';
            $this->borclu['kapino'] = $owner->door_no;
            $this->borclu['isim'] = $owner->name . ' ' . $owner->lastname;
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $this->getData(request('record'));

        $filename = 'Makbuz' . request('record') . '.pdf';

        $pdf = new TCPDF();

        $pdf::SetAutoPageBreak(false);
        $pdf::AddPage('P', 'A4');

        $style = [
            'width' => 0.25,
            'cap' => 'butt',
            'join' => 'miter',
            'dash' => 0,
            'color' => [0, 64, 128],
        ];

        // OUTER RECTANGLE
        $pdf::Rect(10, 10, 190, 128, 'D', ['all' => $style]);
        $pdf::Line(10, 30, 200, 30, ['all' => $style]);

        // ICON
        $pdf::ImageSVG(
            $file = '/images/favicon.svg',
            $x = 13,
            $y = 13,
            $w = '14',
            $h = '14',
            $link = 'https://yonetici.kapkara.one',
            $align = '',
            $palign = '',
            $border = 0,
            $fitonpage = false
        );

        $pdf::SetFillColor(240, 240, 240);

        // BİNA İSİM VE ADRES
        $pdf::SetFont('dejavusans', '', 12);

        $pdf::MultiCell(
            $w = 80,
            $h = 6,
            $txt = $this->bina->name,
            $border = 0,
            $align = 'L',
            $fill = 0,
            1,
            $x = 30,
            $y = 14,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::SetFont('dejavusans', '', 8);

        $pdf::MultiCell(
            $w = 80,
            $h = 6,
            $txt = $this->bina->address,
            $border = 0,
            $align = 'L',
            $fill = 0,
            1,
            $x = 30,
            $y = 20,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        // HEADER
        $pdf::SetXY(106, 14);
        $pdf::SetFont('dejavusans', 'B', 18);

        $pdf::MultiCell(
            $w = 90,
            $h = 20,
            $txt = 'GELİR MAKBUZU',
            $border = 0,
            $align = 'C',
            $fill = 0,
            1,
            $x = 110,
            $y = 10,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 20,
            $valign = 'M'
        );

        // QR CODE
        $style2 = [
            'border' => false,
            'padding' => 0,
            'fgcolor' => [0, 0, 0],
            'bgcolor' => false,
        ];

        $pdf::write2DBarcode(
            $request->fullUrl(),
            'QRCODE,H',
            95,
            35,
            20,
            20,
            $style2,
            'N'
        );

        // TARİH
        $pdf::SetFont('dejavusans', '', 8);

        $pdf::MultiCell(
            $w = 75,
            $h = 6,
            $txt = Carbon::now(),
            $border = 0,
            $align = 'R',
            $fill = 1,
            1,
            $x = 120,
            $y = 35,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        // KAPI NO, İSİM VE DÖNEM
        $pdf::MultiCell(
            $w = 23,
            $h = 6,
            $txt = 'Kapı No',
            $border = 0,
            $align = 'R',
            $fill = 1,
            1,
            $x = 120,
            $y = 43,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::MultiCell(
            $w = 50,
            $h = 6,
            $txt = $this->borclu['kapino'],
            $border = 0,
            $align = 'R',
            $fill = 1,
            1,
            $x = 145,
            $y = 43,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::MultiCell(
            $w = 23,
            $h = 6,
            $txt = 'Ad-Soyad',
            $border = 0,
            $align = 'R',
            $fill = 1,
            1,
            $x = 120,
            $y = 51,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::MultiCell(
            $w = 50,
            $h = 6,
            $txt = $this->borclu['isim'],
            $border = 0,
            $align = 'R',
            $fill = 1,
            1,
            $x = 145,
            $y = 51,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::MultiCell(
            $w = 23,
            $h = 6,
            $txt = 'Dönem',
            $border = 0,
            $align = 'R',
            $fill = 1,
            1,
            $x = 120,
            $y = 59,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::MultiCell(
            $w = 50,
            $h = 6,
            $txt = explode('-', $this->kayit->donem)[2],
            $border = 0,
            $align = 'L',
            $fill = 0,
            1,
            $x = 145,
            $y = 59,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::MultiCell(
            $w = 50,
            $h = 6,
            $txt =
                explode('-', $this->kayit->donem)[1] .
                '/' .
                explode('-', $this->kayit->donem)[0],
            $border = 0,
            $align = 'R',
            $fill = 1,
            1,
            $x = 145,
            $y = 59,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::SetFont('dejavusans', '', 6);

        $pdf::MultiCell(
            $w = 20,
            $h = 6,
            $txt = 'Belge No ' . $this->kayit->id,
            $border = 0,
            $align = 'C',
            $fill = 0,
            1,
            $x = 95,
            $y = 56,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        // TUTAR
        $pdf::SetFont('dejavusans', 'B', 20);
        $pdf::MultiCell(
            $w = 100,
            $h = 16,
            $txt = number_format($this->kayit->tutar, 2, ',', ' ') . ' TL',
            $border = 'B',
            $align = 'R',
            $fill = 1,
            1,
            $x = 95,
            $y = 72,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 16,
            $valign = 'M'
        );

        // YAZI İLE AÇIKLAMA
        $pdf::SetFont('dejavusans', '', 10);
        $pdf::SetFillColor(240, 240, 240);

        //$pdf::SetCellPadding(2);
        $pdf::MultiCell(
            $w = 100,
            $h = 20,
            $txt = $this->borclu['yazi'],
            $border = 0,
            $align = 'L',
            $fill = 1,
            1,
            $x = 95,
            $y = 93,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 20,
            $valign = 'T'
        );

        // MAKBUZU VEREN
        $pdf::SetFont('dejavusans', '', 6);
        //$pdf::SetCellPadding(0);

        $pdf::MultiCell(
            $w = 95,
            $h = 6,
            $txt = $this->bina->name . ' Yöneticisi',
            $border = 'T',
            $align = 'C',
            $fill = 1,
            1,
            $x = 10,
            $y = 118,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::SetFont('dejavusans', 'B', 12);

        $pdf::MultiCell(
            $w = 95,
            $h = 14,
            $txt =
                $this->yonetici->name .
                ' ' .
                strtoupper($this->yonetici->lastname),
            $border = 0,
            $align = 'C',
            $fill = 1,
            1,
            $x = 10,
            $y = 124,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 14,
            $valign = 'M'
        );

        $pdf::SetFont('dejavusans', '', 6);

        $pdf::MultiCell(
            $w = 95,
            $h = 6,
            $txt = 'Mühür ve İmza',
            $border = 'T',
            $align = 'C',
            $fill = 1,
            1,
            $x = 105,
            $y = 118,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::Rect(15, 35, 75, 78, 'D', ['all' => $style]);

        $starty = 35;
        $startx = 15;

        $title_w = 55;

        $header = 8;
        $pdf::SetFont('dejavusans', 'B', 10);

        $pdf::MultiCell(
            $w = 75,
            $h = $header,
            $txt = 'ALINDI DÖKÜMÜ',
            $border = 'B',
            $align = 'C',
            $fill = 1,
            1,
            $x = $startx,
            $y = $starty,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = $header,
            $valign = 'M'
        );

        $uz = $starty + $header;

        $pdf::SetFont('dejavusans', '', 6);

        if ($this->kayit->dokum) {
            foreach (json_decode($this->kayit->dokum) as $title => $deger) {
                $pdf::MultiCell(
                    $w = $title_w,
                    $h = 6,
                    $txt = $title,
                    $border = 'B',
                    $align = 'L',
                    $fill = 0,
                    1,
                    $x = $startx,
                    $y = $uz,
                    $reseth = true,
                    $strech = 0,
                    $ishtml = false,
                    $autopadding = true,
                    $maxh = 6,
                    $valign = 'M'
                );

                $pdf::MultiCell(
                    $w = 20,
                    $h = 6,
                    $txt = number_format($deger, 2, ',', ' '),
                    $border = 'LB',
                    $align = 'R',
                    $fill = 0,
                    1,
                    $x = $startx + $title_w,
                    $y = $uz,
                    $reseth = true,
                    $strech = 0,
                    $ishtml = false,
                    $autopadding = true,
                    $maxh = 6,
                    $valign = 'M'
                );

                $uz = $uz + 6;
            }
        }

        // DÖKÜM TOPLAM
        $pdf::MultiCell(
            $w = $title_w,
            $h = 6,
            $txt = 'TOPLAM',
            $border = 'T',
            $align = 'L',
            $fill = 1,
            1,
            $x = $startx,
            $y = 107,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::MultiCell(
            $w = 20,
            $h = 6,
            $txt = number_format($this->kayit->tutar, 2, ',', ' '),
            $border = 'LT',
            $align = 'R',
            $fill = 1,
            1,
            $x = $startx + $title_w,
            $y = 107,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::MultiCell(
            $w = 95,
            $h = 6,
            $txt = Config::get('constants.app.title'),
            $border = 0,
            $align = 'L',
            $fill = 0,
            1,
            $x = 10,
            $y = 138,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        $pdf::MultiCell(
            $w = 95,
            $h = 6,
            $txt = url('/'),
            $border = 0,
            $align = 'R',
            $fill = 0,
            1,
            $x = 105,
            $y = 138,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 6,
            $valign = 'M'
        );

        //$pdf::Output(public_path($filename), 'F');

        return response()->make($pdf::Output($filename, 'I'), 200, [
            'Content-Type' => 'application/pdf',
        ]);

        //return response()->download(public_path($filename));
    }

    public function getBinaData($idBina)
    {
        $this->bina = Bina::find($idBina);
        $this->yonetici = User::find($this->bina->user_id);

        if ($this->bina->user_id !== Auth::id()) {
            abort('403');
        }

        foreach ($this->bina->sakinler as $sakin) {
            $this->sakinler[$sakin->id] = $sakin->name . ' ' . $sakin->lastname;
        }
    }

    public function gelirler()
    {
        return Kayit::where('bina_id', $this->bina->id)
            ->where('tur', '=', 'gelir')
            ->get();
    }

    public function giderler()
    {
        return Kayit::where('bina_id', $this->bina->id)
            ->where('tur', '=', 'gider')
            ->get();
    }

    public function dokum(Request $request)
    {
        if (!session('bina_id')) {
            return redirect()->route('binalar');
        }

        $this->getBinaData(session('bina_id'));

        $filename = 'GelirGiderDokumu' . $this->bina->id . '.pdf';

        $pdf = new TCPDF();

        $pdf::SetAutoPageBreak(false);
        $pdf::AddPage('P', 'A4');

        $pdf::SetFont('dejavusans', 'B', 20);

        $pdf::MultiCell(
            $w = 190,
            $h = 16,
            $txt = Config::get('constants.app.welcome_subtitle'),
            $border = 0,
            $align = 'L',
            $fill = 0,
            1,
            $x = 10,
            $y = 15,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 16,
            $valign = 'B'
        );

        $pdf::SetFont('dejavusans', '', 14);

        $pdf::MultiCell(
            $w = 190,
            $h = 16,
            $txt = $this->bina->name . ' Gelir-Gider Durum Dökümü',
            $border = 0,
            $align = 'L',
            $fill = 0,
            1,
            $x = 10,
            $y = 22,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 16,
            $valign = 'B'
        );

        // ICON
        $pdf::ImageSVG(
            $file = '/images/kapak.svg',
            $x = 50,
            $y = 60,
            $w = '110',
            $h = '110',
            $link = 'https://yonetici.kapkara.one',
            $align = '',
            $palign = '',
            $border = 0,
            $fitonpage = false
        );

        $pdf::SetFont('dejavusans', 'B', 22);

        $pdf::MultiCell(
            $w = 190,
            $h = 16,
            $txt = $this->bina->name,
            $border = 0,
            $align = 'C',
            $fill = 0,
            1,
            $x = 10,
            $y = 200,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 16,
            $valign = 'M'
        );

        $pdf::SetFont('dejavusans', '', 18);

        $pdf::MultiCell(
            $w = 190,
            $h = 16,
            $txt = $this->bina->address,
            $border = 0,
            $align = 'C',
            $fill = 0,
            1,
            $x = 10,
            $y = 215,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 16,
            $valign = 'M'
        );

        $pdf::SetFont('dejavusans', 'B', 17);

        $pdf::MultiCell(
            $w = 190,
            $h = 16,
            $txt = date('d M Y', time()),
            $border = 0,
            $align = 'C',
            $fill = 0,
            1,
            $x = 10,
            $y = 260,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 16,
            $valign = 'M'
        );

        $pdf::SetFont('dejavusans', '', 12);

        $pdf::MultiCell(
            $w = 190,
            $h = 16,
            $txt = url('/'),
            $border = 0,
            $align = 'C',
            $fill = 0,
            1,
            $x = 10,
            $y = 270,
            $reseth = true,
            $strech = 0,
            $ishtml = false,
            $autopadding = true,
            $maxh = 16,
            $valign = 'M'
        );

        $pdf::AddPage('P', 'A4');

        $pdf::SetFillColor(240, 240, 240);

        //$pdf::Output(public_path($filename), 'F');

        //return response()->download(public_path($filename));

        return response()->make($pdf::Output($filename, 'I'), 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function numberToText($number)
    {
        if ($number < 10) {
            return $this->sayilar['birler'][$number];
        }

        if ($number < 100 && $number > 9) {
            return $this->sayilar['onlar'][substr($number, 0, 1)] .
                ' ' .
                $this->sayilar['birler'][substr($number, -1)];
        }

        if ($number < 1000 && $number > 99) {
            return $this->sayilar['yuzler'][substr($number, 0, 1)] .
                ' ' .
                $this->sayilar['onlar'][substr($number, 1, 1)] .
                ' ' .
                $this->sayilar['birler'][substr($number, -1)];
        }
    }
}
