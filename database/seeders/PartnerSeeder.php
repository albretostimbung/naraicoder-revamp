<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Info PLK',
                'website' => 'https://www.instagram.com/infoplk',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageEvent/ENlJ65cGLqDAipk5eMXfIvJwva5j3sFEaIMEpRoW.png'
            ],
            [
                'name' => 'IDStack',
                'website' => 'https://www.instagram.com/idstack',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageEvent/802I6Q6oC4Mm8ZOqTsBrSehFlwn4DjXkaHWb9b9c.jpg'
            ],
            [
                'name' => 'Nusabot Platform',
                'website' => 'https://www.instagram.com/nusabotid',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageEvent/XfIhb8pIe1ilvcqXRulTuHJ94IZImRkfpQOo5CHN.jpg'
            ],
            [
                'name' => '1000 Startup Digital',
                'website' => 'https://www.instagram.com/1000startupdigital',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageEvent/iq36atoH8jbhtsLAtoMtMga4qp2uTKEQjVyXobyS.png'
            ],
            [
                'name' => 'BorneoSec',
                'website' => 'https://www.borneosec.or.id',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageEvent/PmWmGHUpexjYsFL7RwaVFJBwrYMpY75fPzBvaZGp.jpg'
            ],
            [
                'name' => 'Technopreneur PKY',
                'website' => 'https://www.instagram.com/technopren.pky',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageEvent/sgcaM4uUi7O0NWxoIhzIa5hJiRrPrO56NAddht0W.jpg'
            ],
            [
                'name' => 'HMTI UPR',
                'website' => 'https://www.instagram.com/hmti_upr',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageEvent/rfVm8AbYG7bAJtBuiiLuCSehdTzfTVJ8rhoVLK3F.png'
            ],
            [
                'name' => 'Laraveli',
                'website' => 'https://www.laraveli.com',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageEvent/BArKWsO2kNizpxwi2ZKM1dzKvxftr3OnqxYC3QWE.png'
            ],
            [
                'name' => 'Founders Live',
                'website' => 'https://www.founderslive.com',
                'image' => 'https://www.naraicoder.org/storage/assets/ImagePartner/9hHjrYPV0RrcSn2fBe5qKsBPrFHLQ24AHsxqjA8O.png',
            ],
            [
                'name' => 'IAII',
                'website' => 'https://www.iaii.or.id',
                'image' => 'https://www.naraicoder.org/storage/assets/ImagePartner/Ee2bP02ITniSBTDKd1NdLaGhDxXD5ftAIH8BVSiG.jpg'
            ],
            [
                'name' => 'Gradasi',
                'website' => 'https://www.gradasi.or.id',
                'image' => 'https://www.naraicoder.org/storage/assets/ImagePartner/0xs0JYLcMCph35hYphvDWQtgVJmDCpr04u09A65Y.png'
            ],
            [
                'name' => 'Anak Bangsa Bisa',
                'website' => 'https://www.anakbangsabisa.org',
                'image' => 'https://www.naraicoder.org/storage/assets/ImagePartner/VfflWr580yQ6wYpq2basiQavymqsS7HnG4RMrERF.png',
            ],
            [
                'name' => 'Alterra Academy',
                'website' => 'https://academy.alterra.id',
                'image' => 'https://www.naraicoder.org/storage/assets/ImagePartner/aYOUbh3KFjPoOv0FdHnElBRDIQao3uj6kCLxetus.jpg'
            ],
            [
                'name' => 'Jitara',
                'website' => 'https://jitara.id',
                'image' => 'https://www.naraicoder.org/storage/assets/ImagePartner/LZTwFpQHaGostW0CSGgzDzqJIfK2YuYL3DIV5dG4.png'
            ],
            [
                'name' => 'Laraveli',
                'website' => 'https://laraveli.com',
                'image' => 'https://www.naraicoder.org/storage/assets/ImagePartner/ouWw4bVH8o4BpX3Rn1lFDCcbn9kljV2oJLpd8v4q.png'
            ],
            [
                'name' => 'CodePolitan',
                'website' => 'https://codepolitan.com',
                'image' => 'https://www.naraicoder.org/storage/assets/ImagePartner/93qlXZTmeov080Z772XGlDa8qC0XeWI8i9IpcDh5.jpg'
            ],
            [
                'name' => 'Kominfo PLK',
                'website' => 'https://www.instagram.com/kominfoplk',
                'image' => 'https://www.naraicoder.org/storage/assets/ImagePartner/qN6pjYb4ijESIou7EWWy7anDThFniP3DNqAc5v47.jpg'
            ]
        ];

        Partner::insert($data);
    }
}
