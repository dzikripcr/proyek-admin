<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreateProyekDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $sumberDana = [
            'APBN',
            'APBD Provinsi',
            'APBD Kabupaten/Kota',
            'Bantuan Luar Negeri',
            'Swasta',
            'CSR Perusahaan',
            'Dana Desa',
            'Hibah'
        ];

        $jenisProyek = [
            'Pembangunan Jalan',
            'Pembangunan Jembatan',
            'Pembangunan Sekolah',
            'Pembangunan Puskesmas',
            'Pembangunan Pasar',
            'Pembangunan Drainase',
            'Pembangunan Air Bersih',
            'Pembangunan Sarana Olahraga',
            'Pembangunan Tempat Ibadah',
            'Pembangunan Balai Desa',
            'Peningkatan Jalan',
            'Rehabilitasi Gedung',
            'Pengadaan Peralatan',
            'Program Pemberdayaan Masyarakat'
        ];

        // 👉 Fungsi pembuat paragraf "Bahasa Indonesia" secara generatif
        $generateDeskripsi = function() use ($faker) {
            $kalimat = [
                'Proyek ini bertujuan untuk meningkatkan kualitas infrastruktur di wilayah tersebut.',
                'Pembangunan dilakukan untuk memenuhi kebutuhan masyarakat dan memperbaiki akses layanan publik.',
                'Pelaksanaan kegiatan ini diharapkan dapat memberikan dampak positif bagi pertumbuhan ekonomi lokal.',
                'Program ini merupakan bagian dari upaya pemerintah dalam meningkatkan kesejahteraan masyarakat.',
                'Kegiatan dilakukan secara bertahap dengan mempertimbangkan kondisi geografis dan kebutuhan lapangan.',
                'Hasil pembangunan nantinya diharapkan dapat dimanfaatkan secara optimal oleh masyarakat.',
                'Proyek ini juga memperhatikan aspek lingkungan agar pembangunan tetap berkelanjutan.'
            ];

            return $faker->randomElement($kalimat).' '.$faker->randomElement($kalimat);
        };

        foreach (range(1, 100) as $index) {
            DB::table('proyek')->insert([
                'kode_proyek' => 'PRJ' . str_pad($index, 4, '0', STR_PAD_LEFT),
                'nama_proyek' => $faker->randomElement($jenisProyek) . ' ' . $faker->city,
                'tahun' => $faker->numberBetween(2020, 2025),
                'lokasi' => 'Kelurahan ' . $faker->city . ', Kecamatan ' . $faker->citySuffix,
                'anggaran' => $faker->randomFloat(2, 100000000, 5000000000),
                'sumber_dana' => $faker->randomElement($sumberDana),
                'deskripsi' => $generateDeskripsi(), // ⚡ AUTO DESKRIPSI INDONESIA
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
