<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            // SD Modules
            [
                'title' => 'Matematika SD',
                'description' => 'Konsep dasar, berhitung, pecahan, dan geometri untuk tingkat Sekolah Dasar.',
                'icon' => 'fas fa-calculator',
                'level' => 'SD',
                'subject' => 'Matematika',
                'file_name' => 'matematika_sd.pdf',
                'file_size' => '2200000', // 2.2MB
                'is_active' => true,
            ],
            [
                'title' => 'IPA SD',
                'description' => 'Pengenalan alam, makhluk hidup, energi, dan bumi untuk tingkat Sekolah Dasar.',
                'icon' => 'fas fa-flask',
                'level' => 'SD',
                'subject' => 'IPA',
                'file_name' => 'ipa_sd.pdf',
                'file_size' => '2600000', // 2.6MB
                'is_active' => true,
            ],
            [
                'title' => 'B. Indonesia SD',
                'description' => 'Membaca, menulis, tata bahasa, dan pemahaman wacana untuk tingkat Sekolah Dasar.',
                'icon' => 'fas fa-book-open-reader',
                'level' => 'SD',
                'subject' => 'B. Indonesia',
                'file_name' => 'bahasa_indonesia_sd.pdf',
                'file_size' => '1900000', // 1.9MB
                'is_active' => true,
            ],
            
            // SMP Modules
            [
                'title' => 'IPA SMP',
                'description' => 'Fisika, kimia, dan biologi dasar untuk tingkat Sekolah Menengah Pertama.',
                'icon' => 'fas fa-atom',
                'level' => 'SMP',
                'subject' => 'IPA',
                'file_name' => 'ipa_smp.pdf',
                'file_size' => '3400000', // 3.4MB
                'is_active' => true,
            ],
            [
                'title' => 'Matematika SMP',
                'description' => 'Aljabar, geometri, dan statistika untuk tingkat Sekolah Menengah Pertama.',
                'icon' => 'fas fa-square-root-variable',
                'level' => 'SMP',
                'subject' => 'Matematika',
                'file_name' => 'matematika_smp.pdf',
                'file_size' => '2900000', // 2.9MB
                'is_active' => true,
            ],
            [
                'title' => 'B. Indonesia SMP',
                'description' => 'Tata bahasa lanjutan, sastra, dan penulisan kreatif untuk tingkat SMP.',
                'icon' => 'fas fa-language',
                'level' => 'SMP',
                'subject' => 'B. Indonesia',
                'file_name' => 'bahasa_indonesia_smp.pdf',
                'file_size' => '2400000', // 2.4MB
                'is_active' => true,
            ],
            [
                'title' => 'IPS SMP',
                'description' => 'Sejarah, geografi, ekonomi, dan sosiologi untuk tingkat SMP.',
                'icon' => 'fas fa-globe-americas',
                'level' => 'SMP',
                'subject' => 'IPS',
                'file_name' => 'ips_smp.pdf',
                'file_size' => '2700000', // 2.7MB
                'is_active' => true,
            ],
            
            // SMA Modules
            [
                'title' => 'Fisika SMA',
                'description' => 'Mekanika, termodinamika, gelombang, dan fisika modern untuk tingkat SMA.',
                'icon' => 'fas fa-atom',
                'level' => 'SMA',
                'subject' => 'Fisika',
                'file_name' => 'fisika_sma.pdf',
                'file_size' => '4200000', // 4.2MB
                'is_active' => true,
            ],
            [
                'title' => 'Kimia SMA',
                'description' => 'Struktur atom, ikatan kimia, reaksi kimia, dan kimia organik untuk SMA.',
                'icon' => 'fas fa-vial',
                'level' => 'SMA',
                'subject' => 'Kimia',
                'file_name' => 'kimia_sma.pdf',
                'file_size' => '3800000', // 3.8MB
                'is_active' => true,
            ],
            [
                'title' => 'Biologi SMA',
                'description' => 'Sel, genetika, evolusi, ekologi, dan bioteknologi untuk tingkat SMA.',
                'icon' => 'fas fa-dna',
                'level' => 'SMA',
                'subject' => 'Biologi',
                'file_name' => 'biologi_sma.pdf',
                'file_size' => '3600000', // 3.6MB
                'is_active' => true,
            ],
            [
                'title' => 'Matematika SMA',
                'description' => 'Kalkulus, trigonometri, logaritma, dan statistika lanjutan untuk SMA.',
                'icon' => 'fas fa-infinity',
                'level' => 'SMA',
                'subject' => 'Matematika',
                'file_name' => 'matematika_sma.pdf',
                'file_size' => '4000000', // 4.0MB
                'is_active' => true,
            ],
            [
                'title' => 'B. Indonesia SMA',
                'description' => 'Sastra Indonesia, kritik sastra, dan penulisan ilmiah untuk tingkat SMA.',
                'icon' => 'fas fa-feather-pointed',
                'level' => 'SMA',
                'subject' => 'B. Indonesia',
                'file_name' => 'bahasa_indonesia_sma.pdf',
                'file_size' => '3200000', // 3.2MB
                'is_active' => true,
            ],
            [
                'title' => 'Sejarah SMA',
                'description' => 'Sejarah Indonesia dan dunia, historiografi, dan metodologi sejarah.',
                'icon' => 'fas fa-landmark',
                'level' => 'SMA',
                'subject' => 'Sejarah',
                'file_name' => 'sejarah_sma.pdf',
                'file_size' => '3500000', // 3.5MB
                'is_active' => true,
            ],
            [
                'title' => 'Geografi SMA',
                'description' => 'Geografi fisik, geografi manusia, dan sistem informasi geografis.',
                'icon' => 'fas fa-map-marked-alt',
                'level' => 'SMA',
                'subject' => 'Geografi',
                'file_name' => 'geografi_sma.pdf',
                'file_size' => '3300000', // 3.3MB
                'is_active' => true,
            ],
            [
                'title' => 'Ekonomi SMA',
                'description' => 'Mikroekonomi, makroekonomi, dan ekonomi pembangunan untuk SMA.',
                'icon' => 'fas fa-chart-line',
                'level' => 'SMA',
                'subject' => 'Ekonomi',
                'file_name' => 'ekonomi_sma.pdf',
                'file_size' => '2800000', // 2.8MB
                'is_active' => true,
            ],
        ];

        foreach ($modules as $moduleData) {
            Module::create($moduleData);
        }
    }
}