<?php

namespace Database\Seeders;

use App\Models\CommunityProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunityProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'social_media' => json_encode([
                'instagram' => 'https://www.instagram.com/naraicoder/',
                'telegram' => 'https://t.me/naraicoder/',
                'email' => 'naraicoder@gmail.com',
            ]),
            'logo' => 'logo.svg',
            'about' => 'Narai Coder adalah komunitas non-profit bagi pegiat dan pembelajar Teknologi Informasi di Provinsi Kalimantan Tengah dengan visi menjadi wadah pengembangan minat dan bakat TI di Kalimantan Tengah. NaraiCoder dibentuk sebagai wadah berkumpul dan berbagi wawasan para programmer/developer serta digital enthusiast di wilayah Kalimantan Tengah, juga berupaya untuk mengembangkan future tech talent di wilayah Kalteng dan sekitarnya.'
        ];

        CommunityProfile::create($data);
    }
}
