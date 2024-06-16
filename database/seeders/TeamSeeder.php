<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Quratul Ain',
                'role' => 'Founder',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/jjLj7sPM5Kmex6zddKDPicdBNQIHqtnes7iZOImM.png',
            ],
            [
                'name' => 'Yusuf H.',
                'role' => 'Co-founder',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/B1mUogm8GH3ENxwrI0bUtaTlNprVisYs8pmdUDcP.jpg',
            ],
            [
                'name' => 'Liyando H',
                'role' => 'Co-founder',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/2ZKnmpvomnU7lvnEMET0BVCzxKmsOsThoXgEjMrX.jpg',
            ],
            [
                'name' => 'Rachel Cakra',
                'role' => 'Front End Developer',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/oiI9gpUyEpm7FenS7xSWRAqAT8xSPxDPMOokp1RD.jpg',
            ],
            [
                'name' => 'Eko Cahyadi',
                'role' => 'Com-Coordinator',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/I7TyN81683UdWxwUwZSpOi3WqCyfh4vMsXtE4O0Q.jpg',
            ],
            [
                'name' => 'Diana',
                'role' => 'Lead Dev of Product',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/UeKwFMfEBGvvCLoElL1VxrjtRMsd2Jh2dZebPHJe.jpg',
            ],
            [
                'name' => 'Richie Daniel',
                'role' => 'Founder TerDayak',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/2iVozEFKQSNv1vSaiStzGMMY7Y7FeQweuIBuFQSB.jpg',
            ],
            [
                'name' => 'Albreto',
                'role' => 'Programmer',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/EgZivTBnlJrT06f6mNaeCFAfMVBnxhT5mSLpGL6N.jpg',
            ],
            [
                'name' => 'Inda Fitira M',
                'role' => 'Volunteer',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/olBTeXEXoHr1nVgm894Qxv7RK5NINWv3tY0At2qH.jpg',
            ],
            [
                'name' => 'Ervina',
                'role' => 'Tim Dev TerDayak',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/3blWxS5PUJEANi6QirM5oNRxQmUyusw1pffOQUV0.png',
            ],
            [
                'name' => 'Astria Febiola',
                'role' => 'Volunteer',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/sY0v9ZZ8rE6OtHXdmRGQykZJMchPf5UQQhAiULE8.png',
            ],
            [
                'name' => 'Yovi Ihsan',
                'role' => 'UI / UX Designer',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/Ln67Jy5APqINnjb4sgDMzjKIQRNruN3dzDaeuzEj.jpg',
            ],
            [
                'name' => 'Yuna Yulianti',
                'role' => 'Lead TerDayak',
                'image' => 'https://www.naraicoder.org/storage/assets/ImageOrganization/OjOaCxC03zBMxW5aLdAyBvqA8wn6Njlu3cyRZ7nQ.jpg',
            ],
        ];

        Team::insert($data);
    }
}
