<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seeding Akun Admin
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'password'    => Hash::make('admin123'),
                'role'        => 'Admin',
            ]
        );

        // 2. Seeding Data 3 Siswa
        $siswas = [
            [
                'nisn'          => '0098863201',
                'nama_siswa'    => 'Ahmad Fauzi',
                'kelas'         => 'X PPLG', // <-- Ditambahkan
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk'   => 2024,
            ],
            [
                'nisn'          => '0098863202',
                'nama_siswa'    => 'Siti Nurhaliza',
                'kelas'         => 'XI PPLG', // <-- Ditambahkan
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk'   => 2024,
            ],
            [
                'nisn'          => '0098863203',
                'nama_siswa'    => 'Rizky Ramadhan',
                'kelas'         => 'XII PPLG', // <-- Ditambahkan
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk'   => 2025,
            ],
        ];

        foreach ($siswas as $siswa) {
            DB::table('siswas')->updateOrInsert(
                ['nisn' => $siswa['nisn']],
                array_merge($siswa, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        // 3. Seeding Data 3 Guru & Staf
        $gurus = [
            [
                'nip'       => '198507102010011002',
                'nama_guru' => 'Reski Ramadhan, S.Pd',
                'mapel'     => 'IPA',
                'foto'      => '',
            ],
            [
                'nip'       => '098765445754',
                'nama_guru' => 'Kamiel Fatan, M.Pd',
                'mapel'     => 'PAI',
                'foto'      => '',
            ],
            [
                'nip'       => '098765476543',
                'nama_guru' => 'Fitrah Nurdiansyah, S.Kom',
                'mapel'     => 'Matematika',
                'foto'      => '',
            ],
        ];

        foreach ($gurus as $guru) {
            DB::table('guru')->updateOrInsert(
                ['nip' => $guru['nip']],
                array_merge($guru, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        // 4. Seeding Data Profil Sekolah
        DB::table('profile_sekolah')->updateOrInsert(
            ['id' => 1],
            [
                'nama_sekolah'   => 'SMK MUTIARA SALAWU',
                'kepala_sekolah' => 'Lindawati S.pd',
                'npsn'           => '008644',
                'alamat'         => 'langkob',
                'kontak'         => '98765',
                'visi_misi'      => 'Menjadi lembaga vokasi terdepan yang menghasilkan lulusan unggul, berkarakter mulia, kompeten, dan siap kerja melalui pembelajaran berbasis industri serta penguatan jiwa kewirausahaan',
                'tahun_berdiri'  => '2023',
                'deskripsi'      => 'Selamat datang di portal resmi sekolah kami. Kami berkomitmen penuh untuk menghadirkan pendidikan kejuruan berkualitas yang membekali peserta didik dengan keterampilan profesional (hard skills), karakter mulia (soft skills), serta kesiapan penuh untuk menghadapi dunia kerja, industri, maupun berwirausaha.',
                'logo'           => '',
                'created_at'     => now(),
                'updated_at'     => now(),
            ]
        );

        // 5. Seeding Data Ekstrakurikuler
        $ekskuls = [
            [
                'id_ekstrakulikuler' => 1,
                'nama_ekskul'        => 'Pramuka',
                'pembina'            => 'Drs. Budi Santoso',
                'jadwal_latihan'     => 'Jumat, 15:30 WIB',
                'deskripsi'          => 'Ekstrakurikuler wajib untuk melatih kedisiplinan, kemandirian, dan jiwa kepemimpinan siswa.',
                'gambar'             => '',
            ],
            [
                'id_ekstrakulikuler' => 2,
                'nama_ekskul'        => 'Paskibra',
                'pembina'            => 'Siti Aminah, S.Pd.',
                'jadwal_latihan'     => 'Selasa, 15:00 WIB',
                'deskripsi'          => 'Wadah pembinaan pasukan pengibar bendera untuk melatih ketangkasan baris-berbaris dan nasionalisme.',
                'gambar'             => '',
            ],
            [
                'id_ekstrakulikuler' => 3,
                'nama_ekskul'        => 'Futsal',
                'pembina'            => 'Rian Hidayat, M.Pd.',
                'jadwal_latihan'     => 'Rabu, 16:00 WIB',
                'deskripsi'          => 'Mengembangkan bakat, strategi, kerja sama tim, dan sportivitas siswa dalam bidang olahraga futsal.',
                'gambar'             => '',
            ],
        ];

        foreach ($ekskuls as $ekskul) {
            DB::table('ekstrakulikuler')->updateOrInsert(
                ['id_ekstrakulikuler' => $ekskul['id_ekstrakulikuler']],
                array_merge($ekskul, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}