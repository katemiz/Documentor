<?php

namespace Database\Seeders;

use App\Models\Bina;
use App\Models\Kayit;
use App\Models\Okuma;
use App\Models\Sakin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Bina::create([
            'user_id' => 1,
            'name' => 'Pembeköşk Apartmanı',
            'address' => 'Beste Sokak 2 Aşağı Eğlence, Etlik',
            'pbirimi' => 'TL',
            'city' => 6,
        ]);

        Sakin::create([
            'user_id' => 1,
            'bina_id' => 1,
            'name' => 'Nafiye',
            'lastname' => 'Genç',
            'door_no' => 1,
            'is_evsahibi' => 1,
            'phone' => null,
            'payratio' => 92,
            'giris_tarihi' => '2000-01-01',
        ]);

        Sakin::create([
            'user_id' => 1,
            'bina_id' => 1,
            'name' => 'Kılıç Ali',
            'lastname' => 'Temiz',
            'door_no' => 2,
            'is_evsahibi' => 1,
            'phone' => null,
            'payratio' => 100,
            'giris_tarihi' => '2005-01-01',
        ]);

        Sakin::create([
            'user_id' => 1,
            'bina_id' => 1,
            'name' => 'Muhammed Şeref',
            'lastname' => 'Ocak',
            'door_no' => 3,
            'is_evsahibi' => 1,
            'phone' => null,
            'payratio' => 100,
            'giris_tarihi' => '2021-01-01',
        ]);

        Sakin::create([
            'user_id' => 1,
            'bina_id' => 1,
            'name' => 'Cemil',
            'lastname' => 'Kılıç',
            'door_no' => 4,
            'is_evsahibi' => 1,
            'phone' => null,
            'payratio' => 100,
            'giris_tarihi' => '2000-01-01',
        ]);

        Sakin::create([
            'user_id' => 1,
            'bina_id' => 1,
            'name' => 'Celal',
            'lastname' => 'Çetindağ',
            'door_no' => 5,
            'is_evsahibi' => 1,
            'phone' => null,
            'payratio' => 100,
            'giris_tarihi' => '2000-01-01',
        ]);

        Sakin::create([
            'user_id' => 1,
            'bina_id' => 1,
            'name' => 'Recai',
            'lastname' => 'Ekiz',
            'door_no' => 6,
            'is_evsahibi' => 1,
            'phone' => null,
            'payratio' => 100,
            'giris_tarihi' => '2000-01-01',
        ]);

        Sakin::create([
            'user_id' => 1,
            'bina_id' => 1,
            'name' => 'Ahmet',
            'lastname' => 'Kip',
            'door_no' => 7,
            'is_evsahibi' => 0,
            'phone' => null,
            'payratio' => 100,
            'giris_tarihi' => '2000-01-01',
        ]);

        Sakin::create([
            'user_id' => 1,
            'bina_id' => 1,
            'name' => 'Ali',
            'lastname' => 'Kabakçı',
            'door_no' => 8,
            'is_evsahibi' => 1,
            'phone' => null,
            'payratio' => 100,
            'giris_tarihi' => '2000-01-01',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gelir',
            'aciklama' => 'Muhsin Ayten den Devir (Önceki Dönem Özeti)',
            'donem' => '2021-09-20',
            'son_odeme' => '',
            'tutar' => 20199.56,
            'remarks' => 'Muhsin Bey Yöneticilik Devri',
            'created_at' => '2021-09-22 15:50:30',
            'updated_at' => '2021-09-22 15:50:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Eylül 2021 dönemi aidatı',
            'donem' => '2021-09-20',
            'son_odeme' => '',
            'tutar' => 256,
            'remarks' => '',
            'created_at' => '2021-09-22 15:50:45',
            'updated_at' => '2021-09-22 15:50:45',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Eylül 2021 dönemi aidatı',
            'donem' => '2021-09-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' => '',
            'created_at' => '2021-09-22 15:51:30',
            'updated_at' => '2021-09-22 15:52:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' => 'Eylül 2021 dönemi aidatı',
            'donem' => '2021-09-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' =>
                '[Veysel GÜRTEKİN] (Muhsin Bey tarafından 8 Ekim 2021 tarihinde ödendi)',
            'created_at' => '2021-09-22 15:53:30',
            'updated_at' => '2021-09-22 15:53:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Eylül 2021 dönemi aidatı',
            'donem' => '2021-09-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' => '',
            'created_at' => '2021-09-22 15:54:30',
            'updated_at' => '2021-09-22 15:54:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Eylül 2021 dönemi aidatı',
            'donem' => '2021-09-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' => '',
            'created_at' => '2021-09-22 15:55:30',
            'updated_at' => '2021-09-22 15:55:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Eylül 2021 dönemi aidatı',
            'donem' => '2021-09-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' => '',
            'created_at' => '2021-09-22 15:56:30',
            'updated_at' => '2021-09-22 15:56:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Eylül 2021 dönemi aidatı',
            'donem' => '2021-09-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' => '',
            'created_at' => '2021-09-22 15:57:30',
            'updated_at' => '2021-09-22 15:57:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Eylül 2021 dönemi aidatı',
            'donem' => '2021-09-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' => '',
            'created_at' => '2021-09-22 15:58:30',
            'updated_at' => '2021-09-22 15:58:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Ekim 2021 dönemi aidatı',
            'donem' => '2021-10-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' => '',
            'created_at' => '2021-10-22 16:01:30',
            'updated_at' => '2021-10-22 16:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Ekim 2021 dönemi aidatı',
            'donem' => '2021-10-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-10-22 16:02:30',
            'updated_at' => '2021-10-22 16:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'alacak',
            'aciklama' => 'Ekim 2021 dönemi aidatı',
            'donem' => '2021-10-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-10-22 16:03:30',
            'updated_at' => '2021-10-22 16:03:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Ekim 2021 dönemi aidatı',
            'donem' => '2021-10-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-10-22 16:04:30',
            'updated_at' => '2021-10-22 16:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Ekim 2021 dönemi aidatı',
            'donem' => '2021-10-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-10-22 16:05:30',
            'updated_at' => '2021-10-22 16:05:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Ekim 2021 dönemi aidatı',
            'donem' => '2021-10-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-10-22 16:06:30',
            'updated_at' => '2021-10-22 16:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Ekim 2021 dönemi aidatı',
            'donem' => '2021-10-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-10-22 16:07:30',
            'updated_at' => '2021-10-22 16:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Ekim 2021 dönemi aidatı',
            'donem' => '2021-10-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-10-22 16:08:30',
            'updated_at' => '2021-10-22 16:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' =>
                'Sıcak Su Bedeli: 13m<sup>3</sup> [52-65] (23 TL/m<sup>3</sup>) [Muhsin Bey son okuma]',
            'donem' => '2021-10-20',
            'son_odeme' => '',
            'tutar' => 299,
            'remarks' => '',
            'created_at' => '2021-10-22 16:09:30',
            'updated_at' => '2021-10-22 16:09:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Kasım 2021 dönemi aidatı',
            'donem' => '2021-11-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' => '',
            'created_at' => '2021-11-22 16:01:30',
            'updated_at' => '2021-11-22 16:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Kasım 2021 dönemi aidatı',
            'donem' => '2021-11-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-11-22 16:02:30',
            'updated_at' => '2021-11-22 16:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' => 'Kasım 2021 dönemi aidatı',
            'donem' => '2021-11-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-11-22 16:03:30',
            'updated_at' => '2021-11-22 16:03:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Kasım 2021 dönemi aidatı',
            'donem' => '2021-11-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-11-22 16:04:30',
            'updated_at' => '2021-11-22 16:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Kasım 2021 dönemi aidatı',
            'donem' => '2021-11-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-11-22 16:05:30',
            'updated_at' => '2021-11-22 16:05:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Kasım 2021 dönemi aidatı',
            'donem' => '2021-11-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-11-22 16:06:30',
            'updated_at' => '2021-11-22 16:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Kasım 2021 dönemi aidatı',
            'donem' => '2021-11-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-11-22 16:07:30',
            'updated_at' => '2021-11-22 16:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Kasım 2021 dönemi aidatı',
            'donem' => '2021-11-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-11-22 16:08:30',
            'updated_at' => '2021-11-22 16:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Aralık 2021 dönemi aidatı',
            'donem' => '2021-12-20',
            'son_odeme' => '',
            'tutar' => 300,
            'remarks' => '',
            'created_at' => '2021-12-20 14:01:30',
            'updated_at' => '2021-12-20 14:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Aralık 2021 dönemi aidatı',
            'donem' => '2021-12-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-12-20 14:02:30',
            'updated_at' => '2021-12-20 14:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' => 'Aralık 2021 dönemi aidatı',
            'donem' => '2021-12-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-12-20 14:03:30',
            'updated_at' => '2021-12-20 14:03:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Aralık 2021 dönemi aidatı',
            'donem' => '2021-12-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-12-20 14:04:30',
            'updated_at' => '2021-12-20 14:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Aralık 2021 dönemi aidatı',
            'donem' => '2021-12-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-12-20 14:05:30',
            'updated_at' => '2021-12-20 14:05:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Aralık 2021 dönemi aidatı',
            'donem' => '2021-12-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-12-20 14:06:30',
            'updated_at' => '2021-12-20 14:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Aralık 2021 dönemi aidatı',
            'donem' => '2021-12-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-12-20 14:07:30',
            'updated_at' => '2021-12-20 14:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Aralık 2021 dönemi aidatı',
            'donem' => '2021-12-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2021-12-20 14:08:30',
            'updated_at' => '2021-12-20 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' =>
                'SICAK SU BEDELİ 1 Nolu Daire: 77m3 [177-100] (23 TL/m3)',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 1771,
            'remarks' => '',
            'created_at' => '2022-01-20 14:00:30',
            'updated_at' => '2022-01-20 14:00:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' =>
                'SICAK SU BEDELİ 2 Nolu Daire: 58m3 [196-138] (23 TL/m3)',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 1334,
            'remarks' => '',
            'created_at' => '2022-01-20 14:01:30',
            'updated_at' => '2022-01-20 14:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' =>
                'SICAK SU BEDELİ 3 Nolu Daire: 4m3 [121-117] (23 TL/m3)',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 92,
            'remarks' => '',
            'created_at' => '2022-01-20 14:02:30',
            'updated_at' => '2022-01-20 14:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' =>
                'SICAK SU BEDELİ 4 Nolu Daire: 10m3 [37-27] (23 TL/m3)',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 230,
            'remarks' => '',
            'created_at' => '2022-01-20 14:03:30',
            'updated_at' => '2022-01-20 14:03:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' =>
                'SICAK SU BEDELİ 5 Nolu Daire: 40m3 [404-364] (23 TL/m3)',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 920,
            'remarks' => '',
            'created_at' => '2022-01-20 14:04:30',
            'updated_at' => '2022-01-20 14:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' =>
                'SICAK SU BEDELİ 7 Nolu Daire: 18m3 [83-65] (23 TL/m3)',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 414,
            'remarks' => '',
            'created_at' => '2022-01-20 14:05:30',
            'updated_at' => '2022-01-20 14:05:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' =>
                'SICAK SU BEDELİ 8 Nolu Daire: 57m3 [174-117] (23 TL/m3)',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 1311,
            'remarks' => '',
            'created_at' => '2022-01-20 14:06:30',
            'updated_at' => '2022-01-20 14:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Ocak 2022 dönemi aidatı',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2022-01-20 14:07:30',
            'updated_at' => '2022-01-20 14:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Ocak 2022 dönemi aidatı',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-01-20 14:08:30',
            'updated_at' => '2022-01-20 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' => 'Ocak 2022 dönemi aidatı',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-01-20 14:09:30',
            'updated_at' => '2022-01-20 14:09:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Ocak 2022 dönemi aidatı',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-01-20 14:10:30',
            'updated_at' => '2022-01-20 14:10:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Ocak 2022 dönemi aidatı',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-01-20 14:11:30',
            'updated_at' => '2022-01-20 14:11:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Ocak 2022 dönemi aidatı',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-01-20 14:12:30',
            'updated_at' => '2022-01-20 14:12:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Ocak 2022 dönemi aidatı',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-01-20 14:13:30',
            'updated_at' => '2022-01-20 14:13:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Ocak 2022 dönemi aidatı',
            'donem' => '2022-01-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-01-20 14:14:30',
            'updated_at' => '2022-01-20 14:14:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Şubat 2022 dönemi aidatı',
            'donem' => '2022-02-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2022-02-20 11:14:30',
            'updated_at' => '2022-02-20 11:14:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Şubat 2022 dönemi aidatı',
            'donem' => '2022-02-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-02-20 11:15:30',
            'updated_at' => '2022-02-20 11:15:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' => 'Şubat 2022 dönemi aidatı',
            'donem' => '2022-02-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-02-20 11:16:30',
            'updated_at' => '2022-02-20 11:16:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Şubat 2022 dönemi aidatı',
            'donem' => '2022-02-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-02-20 11:17:30',
            'updated_at' => '2022-02-20 11:17:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Şubat 2022 dönemi aidatı',
            'donem' => '2022-02-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-02-20 11:18:30',
            'updated_at' => '2022-02-20 11:18:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Şubat 2022 dönemi aidatı',
            'donem' => '2022-02-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-02-20 11:19:30',
            'updated_at' => '2022-02-20 11:19:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Şubat 2022 dönemi aidatı',
            'donem' => '2022-02-20',
            'son_odeme' => '',
            'remarks' => '',
            'created_at' => '2022-02-20 11:24:30',
            'updated_at' => '2022-02-20 11:24:30',
            'tutar' => 400,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Şubat 2022 dönemi aidatı',
            'donem' => '2022-02-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-02-20 11:25:30',
            'updated_at' => '2022-02-20 11:25:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Mart 2022 dönemi aidatı',
            'donem' => '2022-03-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2022-03-20 11:00:30',
            'updated_at' => '2022-03-20 11:00:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Mart 2022 dönemi aidatı',
            'donem' => '2022-03-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-03-20 11:01:30',
            'updated_at' => '2022-03-20 11:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' => 'Mart 2022 dönemi aidatı',
            'donem' => '2022-03-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-03-20 11:02:30',
            'updated_at' => '2022-03-20 11:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Mart 2022 dönemi aidatı',
            'donem' => '2022-03-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-03-20 11:03:30',
            'updated_at' => '2022-03-20 11:03:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Mart 2022 dönemi aidatı',
            'donem' => '2022-03-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-03-20 11:04:30',
            'updated_at' => '2022-03-20 11:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Mart 2022 dönemi aidatı',
            'donem' => '2022-03-20',
            'son_odeme' => '',
            'remarks' => '',
            'created_at' => '2022-03-20 11:05:30',
            'updated_at' => '2022-03-20 11:05:30',
            'tutar' => 400,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Mart 2022 dönemi aidatı',
            'donem' => '2022-03-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-03-20 11:06:30',
            'updated_at' => '2022-03-20 11:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Mart 2022 dönemi aidatı',
            'donem' => '2022-03-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-03-20 11:07:30',
            'updated_at' => '2022-03-20 11:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Nisan 2022 dönemi aidatı',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 350,
            'remarks' => '',
            'created_at' => '2022-04-20 17:01:30',
            'updated_at' => '2022-04-20 17:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Nisan 2022 dönemi aidatı',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-04-20 17:02:30',
            'updated_at' => '2022-04-20 17:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' => 'Nisan 2022 dönemi aidatı',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-04-20 17:03:30',
            'updated_at' => '2022-04-20 17:03:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Nisan 2022 dönemi aidatı',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-04-20 17:04:30',
            'updated_at' => '2022-04-20 17:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Nisan 2022 dönemi aidatı',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-04-20 17:05:30',
            'updated_at' => '2022-04-20 17:05:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Nisan 2022 dönemi aidatı',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-04-20 17:06:30',
            'updated_at' => '2022-04-20 17:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Nisan 2022 dönemi aidatı',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-04-20 17:07:30',
            'updated_at' => '2022-04-20 17:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Nisan 2022 dönemi aidatı',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 400,
            'remarks' => '',
            'created_at' => '2022-04-20 17:08:30',
            'updated_at' => '2022-04-20 17:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Çalınan Bahçe Kapısı Yeniden Yapılma Bedeli',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 250,
            'remarks' => '',
            'created_at' => '2022-04-20 18:01:30',
            'updated_at' => '2022-04-20 18:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Çalınan Bahçe Kapısı Yeniden Yapılma Bedeli',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 250,
            'remarks' => '',
            'created_at' => '2022-04-20 18:02:30',
            'updated_at' => '2022-04-20 18:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' => 'Çalınan Bahçe Kapısı Yeniden Yapılma Bedeli',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 250,
            'remarks' => '',
            'created_at' => '2022-04-20 18:03:30',
            'updated_at' => '2022-04-20 18:03:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Çalınan Bahçe Kapısı Yeniden Yapılma Bedeli',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 250,
            'remarks' => '',
            'created_at' => '2022-04-20 18:04:30',
            'updated_at' => '2022-04-20 18:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Çalınan Bahçe Kapısı Yeniden Yapılma Bedeli',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 250,
            'remarks' => '',
            'created_at' => '2022-04-20 18:05:30',
            'updated_at' => '2022-04-20 18:05:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Çalınan Bahçe Kapısı Yeniden Yapılma Bedeli',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 250,
            'remarks' => '',
            'created_at' => '2022-04-20 18:06:30',
            'updated_at' => '2022-04-20 18:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Çalınan Bahçe Kapısı Yeniden Yapılma Bedeli',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 250,
            'remarks' => '',
            'created_at' => '2022-04-20 18:07:30',
            'updated_at' => '2022-04-20 18:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Çalınan Bahçe Kapısı Yeniden Yapılma Bedeli',
            'donem' => '2022-04-20',
            'son_odeme' => '',
            'tutar' => 250,
            'remarks' => '',
            'created_at' => '2022-04-20 18:08:30',
            'updated_at' => '2022-04-20 18:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'gelir',
            'aciklama' => 'Mayıs 2022 dönemi aidatı',
            'donem' => '2022-05-20',
            'son_odeme' => '',
            'tutar' => 550,
            'remarks' => '',
            'created_at' => '2022-05-20 19:01:30',
            'updated_at' => '2022-05-20 19:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'gelir',
            'aciklama' => 'Mayıs 2022 dönemi aidatı',
            'donem' => '2022-05-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-05-20 19:02:30',
            'updated_at' => '2022-05-20 19:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'gelir',
            'aciklama' => 'Mayıs 2022 dönemi aidatı',
            'donem' => '2022-05-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-05-20 19:03:30',
            'updated_at' => '2022-05-20 19:03:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'gelir',
            'aciklama' => 'Mayıs 2022 dönemi aidatı',
            'donem' => '2022-05-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-05-20 19:04:30',
            'updated_at' => '2022-05-20 19:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'gelir',
            'aciklama' => 'Mayıs 2022 dönemi aidatı',
            'donem' => '2022-05-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-05-20 19:05:30',
            'updated_at' => '2022-05-20 19:05:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'gelir',
            'aciklama' => 'Mayıs 2022 dönemi aidatı',
            'donem' => '2022-05-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-05-20 19:06:30',
            'updated_at' => '2022-05-20 19:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'gelir',
            'aciklama' => 'Mayıs 2022 dönemi aidatı',
            'donem' => '2022-05-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-05-20 19:07:30',
            'updated_at' => '2022-05-20 19:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'gelir',
            'aciklama' => 'Mayıs 2022 dönemi aidatı',
            'donem' => '2022-05-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-05-20 19:08:30',
            'updated_at' => '2022-05-20 19:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'alacak',
            'aciklama' => 'Haziran 2022 dönemi aidatı',
            'donem' => '2022-06-20',
            'son_odeme' => '',
            'tutar' => 550,
            'remarks' => '',
            'created_at' => '2022-06-20 20:01:30',
            'updated_at' => '2022-06-20 20:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'alacak',
            'aciklama' => 'Haziran 2022 dönemi aidatı',
            'donem' => '2022-06-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-06-20 20:02:30',
            'updated_at' => '2022-06-20 20:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'alacak',
            'aciklama' => 'Haziran 2022 dönemi aidatı',
            'donem' => '2022-06-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-06-20 20:03:30',
            'updated_at' => '2022-06-20 20:03:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'alacak',
            'aciklama' => 'Haziran 2022 dönemi aidatı',
            'donem' => '2022-06-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-06-20 20:04:30',
            'updated_at' => '2022-06-20 20:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'alacak',
            'aciklama' => 'Haziran 2022 dönemi aidatı',
            'donem' => '2022-06-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-06-20 20:05:30',
            'updated_at' => '2022-06-20 20:05:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'alacak',
            'aciklama' => 'Haziran 2022 dönemi aidatı',
            'donem' => '2022-06-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-06-20 20:06:30',
            'updated_at' => '2022-06-20 20:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'alacak',
            'aciklama' => 'Haziran 2022 dönemi aidatı',
            'donem' => '2022-06-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-06-20 20:07:30',
            'updated_at' => '2022-06-20 20:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'alacak',
            'aciklama' => 'Haziran 2022 dönemi aidatı',
            'donem' => '2022-06-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-06-20 20:08:30',
            'updated_at' => '2022-06-20 20:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'alacak',
            'aciklama' => 'Temmuz 2022 dönemi aidatı',
            'donem' => '2022-07-20',
            'son_odeme' => '',
            'tutar' => 550,
            'remarks' => '',
            'created_at' => '2022-07-20 20:09:30',
            'updated_at' => '2022-07-20 20:09:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'alacak',
            'aciklama' => 'Temmuz 2022 dönemi aidatı',
            'donem' => '2022-07-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-07-20 21:01:30',
            'updated_at' => '2022-07-20 21:01:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'alacak',
            'aciklama' => 'Temmuz 2022 dönemi aidatı',
            'donem' => '2022-07-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-07-20 21:02:30',
            'updated_at' => '2022-07-20 21:02:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'alacak',
            'aciklama' => 'Temmuz 2022 dönemi aidatı',
            'donem' => '2022-07-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-07-20 21:04:30',
            'updated_at' => '2022-07-20 21:04:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'alacak',
            'aciklama' => 'Temmuz 2022 dönemi aidatı',
            'donem' => '2022-07-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-07-20 21:05:30',
            'updated_at' => '2022-07-20 21:05:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'alacak',
            'aciklama' => 'Temmuz 2022 dönemi aidatı',
            'donem' => '2022-07-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-07-20 21:06:30',
            'updated_at' => '2022-07-20 21:06:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'alacak',
            'aciklama' => 'Temmuz 2022 dönemi aidatı',
            'donem' => '2022-07-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-07-20 21:07:30',
            'updated_at' => '2022-07-20 21:07:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'alacak',
            'aciklama' => 'Temmuz 2022 dönemi aidatı',
            'donem' => '2022-07-20',
            'son_odeme' => '',
            'tutar' => 600,
            'remarks' => '',
            'created_at' => '2022-07-20 21:08:30',
            'updated_at' => '2022-07-20 21:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'tur' => 'alacak',
            'aciklama' => 'Ağustos 2022 dönemi aidatı',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 550,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'alacak',
            'aciklama' => 'Ağustos 2022 dönemi aidatı',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 600,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'alacak',
            'aciklama' => 'Ağustos 2022 dönemi aidatı',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 600,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'alacak',
            'aciklama' => 'Ağustos 2022 dönemi aidatı',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 600,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'alacak',
            'aciklama' => 'Ağustos 2022 dönemi aidatı',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 600,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'alacak',
            'aciklama' => 'Ağustos 2022 dönemi aidatı',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 600,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'alacak',
            'aciklama' => 'Ağustos 2022 dönemi aidatı',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 600,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'alacak',
            'aciklama' => 'Ağustos 2022 dönemi aidatı',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 600,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'tur' => 'alacak',
            'aciklama' => 'Garaj Kapısı Tamir Bedeli',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 350,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'tur' => 'alacak',
            'aciklama' => 'Garaj Kapısı Tamir Bedeli',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 350,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'tur' => 'alacak',
            'aciklama' => 'Garaj Kapısı Tamir Bedeli',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 350,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'tur' => 'alacak',
            'aciklama' => 'Garaj Kapısı Tamir Bedeli',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 350,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'tur' => 'alacak',
            'aciklama' => 'Garaj Kapısı Tamir Bedeli',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 350,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'tur' => 'alacak',
            'aciklama' => 'Garaj Kapısı Tamir Bedeli',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 350,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'tur' => 'alacak',
            'aciklama' => 'Garaj Kapısı Tamir Bedeli',
            'donem' => '2022-08-20',
            'son_odeme' => '',
            'tutar' => 350,
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Doğalgaz Faturası Ödeme (Eylül) [ÖDENDİ]',
            'donem' => '2021-11-11',
            'son_odeme' => '',
            'tutar' => 632,
            'remarks' => '',
            'created_at' => '2021-09-11 14:08:30',
            'updated_at' => '2021-09-11 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Elektrik - EnerjiSA. (Ekim) 14.10.2021 [Ödendi] ',
            'donem' => '2021-10-11',
            'son_odeme' => '',
            'tutar' => 207.3,
            'remarks' => '',
            'created_at' => '2021-10-11 14:08:30',
            'updated_at' => '2021-10-11 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Doğalgaz, BaşkentGaz (Ekim) 18.10.2021 [Ödendi]',
            'donem' => '2021-10-18',
            'son_odeme' => '',
            'tutar' => 1020,
            'remarks' => '',
            'created_at' => '2021-10-18 14:08:30',
            'updated_at' => '2021-10-18 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Elektrik - EnerjiSA. (Kasım) 15.11.2021 [ÖDENDİ]',
            'donem' => '2021-11-15',
            'son_odeme' => '',
            'tutar' => 291.05,
            'remarks' => '',
            'created_at' => '2021-11-15 14:08:30',
            'updated_at' => '2021-11-15 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' =>
                'Doğalgaz, BaşkentGaz (1592 m3 Kasım) 22.11.2021 [ÖDENDİ]',
            'donem' => '2021-11-22',
            'son_odeme' => '',
            'tutar' => 3572,
            'remarks' => '',
            'created_at' => '2021-11-22 14:08:30',
            'updated_at' => '2021-11-22 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' =>
                'Apartman Su Tüketim Faturası [9 Aralık 2021] ÖDENDİ ',
            'donem' => '',
            'son_odeme' => '',
            'tutar' => 58.3,
            'remarks' => '',
            'created_at' => '2021-12-09 14:08:30',
            'updated_at' => '2021-12-09 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Elektrik Tüketimi EnerjiSA [13 Aralık 2021] ÖDENDİ ',
            'donem' => '',
            'son_odeme' => '',
            'tutar' => 336.7,
            'remarks' => '',
            'created_at' => '2021-12-13 14:08:30',
            'updated_at' => '2021-12-13 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Doğalgaz, BaşkentGaz (2493 m3 Aralık) 24.12.2021]',
            'donem' => '',
            'son_odeme' => '',
            'tutar' => 5371,
            'remarks' => '',
            'created_at' => '2021-12-24 14:08:30',
            'updated_at' => '2021-12-24 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Temizlik Malzemeleri Alımı (3 Ocak 22)',
            'donem' => '',
            'son_odeme' => '',
            'tutar' => 710,
            'remarks' => '',
            'created_at' => '2022-01-03 14:08:30',
            'updated_at' => '2022-01-03 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Apartman Su Tüketim Faturası [Aralık] (11.01.22) ',
            'donem' => '',
            'son_odeme' => '2022-01-11',
            'tutar' => 76.97,
            'remarks' => '',
            'created_at' => '2022-01-11 14:08:30',
            'updated_at' => '2022-01-11 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Elektrik - EnerjiSA. (Aralık) 14.01.2022 [ÖDENDİ]',
            'donem' => '',
            'son_odeme' => '2022-01-14',
            'tutar' => 467.7,
            'remarks' => '',
            'created_at' => '2022-01-14 14:08:30',
            'updated_at' => '2022-01-14 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' =>
                'Doğalgaz, BaşkentGaz (3490 m3 Ocak) 24.01.2022] (Ödendi)',
            'donem' => '2022-01-24',
            'son_odeme' => '2022-01-24',
            'tutar' => 8278,
            'remarks' => '',
            'created_at' => '2022-01-24 14:08:30',
            'updated_at' => '2022-01-24 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Apartman Su Tüketim Faturası [Ocak] (08.02.22)',
            'donem' => '',
            'son_odeme' => '2022-02-08',
            'tutar' => 81.87,
            'remarks' => '',
            'created_at' => '2022-02-08 14:08:30',
            'updated_at' => '2022-02-08 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'EnerjiSA Elektrik (14.02.2022) 15048kW',
            'donem' => '',
            'son_odeme' => '2022-02-14',
            'tutar' => 785.08,
            'remarks' => '',
            'created_at' => '2022-02-14 14:08:30',
            'updated_at' => '2022-02-14 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' =>
                'Doğalgaz, BaşkentGaz (3963 m3 Şubat) 21. 02.2022 (Ödendi)',
            'donem' => '',
            'son_odeme' => '2022-02-21',
            'tutar' => 10608,
            'remarks' => '',
            'created_at' => '2022-02-21 14:08:30',
            'updated_at' => '2022-02-21 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Apartman İç Kapı Menteşesi (Orjinal Torma Mob.Aks)',
            'donem' => '',
            'son_odeme' => '2022-03-09',
            'tutar' => 75,
            'remarks' => '',
            'created_at' => '2022-03-09 14:08:30',
            'updated_at' => '2022-03-09 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Apartman Su Tüketim Faturası [10 Mart 2022]  Ödendi',
            'donem' => '',
            'son_odeme' => '2022-03-10',
            'tutar' => 112.95,
            'remarks' =>
                'Fatura 88.41 olmasına rağmen, 24.54 lık gecikme parasıyla beraber 112.96 ödendi',
            'created_at' => '2022-03-10 14:08:30',
            'updated_at' => '2022-03-10 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Apartman İç Kapı Menteşesi (Orjinal Torma Mob.Aks)',
            'donem' => '',
            'son_odeme' => '2022-03-09',
            'tutar' => 75,
            'remarks' => '',
            'created_at' => '2022-03-09 14:08:30',
            'updated_at' => '2022-03-09 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'EnerjiSA Elektrik (14.03.2022) [Ödendi]',
            'donem' => '',
            'son_odeme' => '2022-03-14',
            'tutar' => 626.2,
            'remarks' => '',
            'created_at' => '2022-03-14 14:08:30',
            'updated_at' => '2022-03-14 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Doğalgaz, BaşkentGaz (2609 m3 Mart) 22. 03.2022',
            'donem' => '',
            'son_odeme' => '2022-03-22',
            'tutar' => 7166,
            'remarks' => '',
            'created_at' => '2022-03-22 14:08:30',
            'updated_at' => '2022-03-22 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' =>
                'Isıtma Sistemi Bakım Bedeli (Ersin Atlıhan) 31 mart 2022',
            'donem' => '',
            'son_odeme' => '2022-03-31',
            'tutar' => 150,
            'remarks' => '',
            'created_at' => '2022-03-31 14:08:30',
            'updated_at' => '2022-03-31 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' =>
                'Apartman Su Tüketim Faturası [11 Nisan 2022]  Ödendi',
            'donem' => '',
            'son_odeme' => '2022-04-11',
            'tutar' => 66.79,
            'remarks' => '',
            'created_at' => '2022-04-11 14:08:30',
            'updated_at' => '2022-04-11 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'EnerjiSA Elektrik (14.04.2022)',
            'donem' => '',
            'son_odeme' => '2022-04-14',
            'tutar' => 632.9,
            'remarks' => '',
            'created_at' => '2022-04-14 14:08:30',
            'updated_at' => '2022-04-14 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'BaşkentGaz (2303 m3 Mart) 19.04.2022',
            'donem' => '',
            'son_odeme' => '2022-04-19',
            'tutar' => 6799,
            'remarks' => '',
            'created_at' => '2022-04-19 14:08:30',
            'updated_at' => '2022-04-19 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' =>
                'Bahçe Kapısının Yeniden Yapılması (Mart 22 Çalınmıştı)',
            'donem' => '',
            'son_odeme' => '2022-04-21',
            'tutar' => 2000,
            'remarks' => '21 Nisan 2022 tarihinde yapıldı',
            'created_at' => '2022-04-21 14:08:30',
            'updated_at' => '2022-04-21 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'ASKİ Su Tüketim Faturası (16.05.22)',
            'donem' => '',
            'son_odeme' => '2022-05-16',
            'tutar' => 82.24,
            'remarks' => '',
            'created_at' => '2022-05-16 14:08:30',
            'updated_at' => '2022-05-16 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'EnerjiSA Elektrik (20.05.2022)',
            'donem' => '',
            'son_odeme' => '2022-05-20',
            'tutar' => 335,
            'remarks' => '',
            'created_at' => '2022-05-20 14:08:30',
            'updated_at' => '2022-05-20 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Doğalgaz, BaşkentGaz (749 m3 Nisan) 23. 05.2022',
            'donem' => '',
            'son_odeme' => '',
            'tutar' => 2587,
            'remarks' => '',
            'created_at' => '2022-05-23 14:08:30',
            'updated_at' => '2022-05-23 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'ASKİ Su Tüketim Faturası 2022-06-09',
            'donem' => '',
            'son_odeme' => '2022-06-09',
            'tutar' => 77.17,
            'remarks' => '',
            'created_at' => '2022-06-09 14:08:30',
            'updated_at' => '2022-06-09 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'EnerjiSA Elektrik (13.06.2022)',
            'donem' => '',
            'son_odeme' => '2022-06-13',
            'tutar' => 231.4,
            'remarks' => '',
            'created_at' => '2022-06-13 14:08:30',
            'updated_at' => '2022-06-13 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Doğalgaz, BaşkentGaz (618 m3 Mayıs) 17. 06.2022',
            'donem' => '',
            'son_odeme' => '2022-06-17',
            'tutar' => 2245,
            'remarks' => '',
            'created_at' => '2022-06-17 14:08:30',
            'updated_at' => '2022-06-17 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'EnerjiSA Elektrik (13.07.2022)',
            'donem' => '',
            'son_odeme' => '2022-07-13',
            'tutar' => 281,
            'remarks' => '',
            'created_at' => '2022-07-13 14:08:30',
            'updated_at' => '2022-07-13 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Doğalgaz, BaşkentGaz 14.07.2022',
            'donem' => '',
            'son_odeme' => '2022-07-14',
            'tutar' => 2574,
            'remarks' => '',
            'created_at' => '2022-07-14 14:08:30',
            'updated_at' => '2022-07-14 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'ASKİ Su Tüketim Faturası 2022-07-18',
            'donem' => '',
            'son_odeme' => '2022-07-18',
            'tutar' => 72,
            'remarks' => '',
            'created_at' => '2022-07-18 14:08:30',
            'updated_at' => '2022-07-18 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'ASKİ Su Tüketim Faturası 2022-08-11',
            'donem' => '',
            'son_odeme' => '2022-08-11',
            'tutar' => 114.33,
            'remarks' => '',
            'created_at' => '2022-08-11 14:08:30',
            'updated_at' => '2022-08-11 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' =>
                'Otopark Bariyeri - Kilitli Araba Park Etme Demiri 2022-08-11',
            'donem' => '',
            'son_odeme' => '2022-08-11',
            'tutar' => 269.6,
            'remarks' => 'n11 sitesinden alındı',
            'created_at' => '2022-08-11 14:18:30',
            'updated_at' => '2022-08-11 14:18:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'EnerjiSA Elektrik (15.08.2022)',
            'donem' => '',
            'son_odeme' => '2022-08-15',
            'tutar' => 343.4,
            'remarks' => '',
            'created_at' => '2022-08-15 14:08:30',
            'updated_at' => '2022-08-15 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Doğalgaz, BaşkentGaz 15.08.2022',
            'donem' => '',
            'son_odeme' => '2022-08-15',
            'tutar' => 2867,
            'remarks' => '',
            'created_at' => '2022-08-15 14:08:30',
            'updated_at' => '2022-08-15 14:08:30',
        ]);

        Kayit::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => null,
            'tur' => 'gider',
            'aciklama' => 'Garaj Kapısı Yay ve Tamir Bedeli 16 Ağu 2022',
            'donem' => '',
            'son_odeme' => '2022-08-16',
            'tutar' => 2300,
            'remarks' => 'Yay Kırılmıştı',
            'created_at' => '2022-08-16 14:08:30',
            'updated_at' => '2022-08-16 14:08:30',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'bedel_id' => 1,
            'son_okuma' => 45,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'bedel_id' => 1,
            'son_okuma' => 100,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 1,
            'bedel_id' => 1,
            'son_okuma' => 177,
            'created_at' => '2021-12-22 20:00:00',
            'updated_at' => '2021-12-22 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'bedel_id' => 1,
            'son_okuma' => 62,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'bedel_id' => 1,
            'son_okuma' => 138,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 2,
            'bedel_id' => 1,
            'son_okuma' => 196,
            'created_at' => '2021-12-22 20:00:00',
            'updated_at' => '2021-12-22 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'bedel_id' => 1,
            'son_okuma' => 61,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'bedel_id' => 1,
            'son_okuma' => 117,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 3,
            'bedel_id' => 1,
            'son_okuma' => 121,
            'created_at' => '2021-12-22 20:00:00',
            'updated_at' => '2021-12-22 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'bedel_id' => 1,
            'son_okuma' => 13,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'bedel_id' => 1,
            'son_okuma' => 27,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 4,
            'bedel_id' => 1,
            'son_okuma' => 37,
            'created_at' => '2021-12-22 20:00:00',
            'updated_at' => '2021-12-22 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'bedel_id' => 1,
            'son_okuma' => 324,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'bedel_id' => 1,
            'son_okuma' => 364,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 5,
            'bedel_id' => 1,
            'son_okuma' => 404,
            'created_at' => '2022-01-23 20:00:00',
            'updated_at' => '2022-01-23 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'bedel_id' => 1,
            'son_okuma' => 17,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'bedel_id' => 1,
            'son_okuma' => 50,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 6,
            'bedel_id' => 1,
            'son_okuma' => 50,
            'created_at' => '2022-04-22 20:00:00',
            'updated_at' => '2022-04-22 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'bedel_id' => 1,
            'son_okuma' => 26,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'bedel_id' => 1,
            'son_okuma' => 52,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'bedel_id' => 1,
            'son_okuma' => 65,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 7,
            'bedel_id' => 1,
            'son_okuma' => 83,
            'created_at' => '2021-12-22 20:00:00',
            'updated_at' => '2021-12-22 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'bedel_id' => 1,
            'son_okuma' => 42,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'bedel_id' => 1,
            'son_okuma' => 117,
            'created_at' => '2021-11-24 20:00:00',
            'updated_at' => '2021-11-24 20:00:00',
            'status' => 'ODENDI',
        ]);

        Okuma::create([
            'user_id' => 1,
            'bina_id' => 1,
            'sakin_id' => 8,
            'bedel_id' => 1,
            'son_okuma' => 174,
            'created_at' => '2021-12-22 20:00:00',
            'updated_at' => '2021-12-22 20:00:00',
            'status' => 'ODENDI',
        ]);
    }
}
