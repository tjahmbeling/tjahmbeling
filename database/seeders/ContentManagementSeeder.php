<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;
use App\Models\Resume;
use App\Models\Contact;

class ContentManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed About Section
        About::updateOrCreate(['id' => 1], [
            'title' => 'Semi Freelancer',
            'subtitle' => 'Terima kasih telah mengunjungi halaman web saya, tanpa membuang waktu dan basa-basi. Izinkan saya memperkenalkan diri :',
            'description' => 'Sederhana, santai, dan suka berbagi adalah diri saya. Tidak banyak hal yang bisa saya tuliskan di sini, jadi jika Anda tertarik dan ingin berinteraksi langsung dengan saya, atau mungkin hanya ingin sekedar untuk berkenalan saja, silakan klik tautan kontak yang tersedia. Kita bisa berkomunikasi secara langsung untuk bertukar pikiran atau berdiskusi untuk mencari solusi atas masalah yang mungkin Anda hadapi.',
            'image' => null, // Placeholder or existing image path
            'details' => [
                ['label' => 'Nama', 'value' => 'R. Muhammad Agung Wicaksono'],
                ['label' => 'Tanggal Lahir', 'value' => '07 Februari 1998'],
                ['label' => 'Kota', 'value' => 'Kediri, Indonesia'],
                ['label' => 'Karir', 'value' => 'Freelancer'],
                ['label' => 'Email', 'value' => 'wiagmadra@gmail.com'],
                ['label' => 'Website', 'value' => 'tjahmbeling.my.id'],
                ['label' => 'No. Handphone', 'value' => '0856 4907 3770'],
                ['label' => 'Sosmed', 'value' => 'Klik Disini'],
            ],
            'skills' => [
                ['name' => 'Freelancer', 'percentage' => 50],
                ['name' => 'Pekerja Swasta', 'percentage' => 50],
                ['name' => 'Ilustrator', 'percentage' => 50],
                ['name' => 'Fotografer', 'percentage' => 50],
            ],
            'hobbies' => [
                ['name' => 'Bermain Game', 'icon' => 'ri-gamepad-line', 'color' => '#b2904f'],
                ['name' => 'Mendengarkan Musik', 'icon' => 'ri-disc-line', 'color' => '#b20969'],
                ['name' => 'Olahraga', 'icon' => 'ri-boxing-line', 'color' => '#ff5828'],
                ['name' => 'Menggambar', 'icon' => 'ri-pencil-line', 'color' => '#29cc61'],
            ],
        ]);

        // 2. Seed Resume Section
        $resumes = [
            // Summary
            [
                'category' => 'summary',
                'title' => 'Otodidak',
                'period' => null,
                'subtitle' => null,
                'description' => 'Freelancer yang suka berkarya, memiliki rasa tanggung jawab dan dedikasi tinggi terhadap sebuah pekerjaan. Fotografi dan ilustrasi adalah bidang yang sedang dipelajari dan saya tekuni. Membuat sebuah sudut pandang baru tentang seni dan berkarya dengan bebas, namun tetap memiliki makna di dalamnya.',
                'details' => [
                    ['item' => 'Jl. Selogongsong, Nganjuk'],
                    ['item' => '0856 4907 3770'],
                    ['item' => 'wiagmadra@gmail.com'],
                ],
                'order' => 1,
            ],
            // Education
            [
                'category' => 'education',
                'title' => 'Taman Kanak Kanak',
                'period' => '2003 - 2004',
                'subtitle' => 'TK An-Nawawi',
                'description' => 'Pada usia 6 tahun, saya mulai belajar membaca, menulis, menggambar, mewarnai, dan berhitung. Saat itu, saya ikut lomba mengoperasikan sempoa.',
                'details' => null,
                'order' => 2,
            ],
            [
                'category' => 'education',
                'title' => 'Sekolah Dasar',
                'period' => '2004 - 2010',
                'subtitle' => 'SD Negeri Gemenggeng',
                'description' => 'Aktif pada kegiatan Akademik, peringkat 1 dari kelas 1 sampai dengan kelas 6. Pernah dapat Juara 2 dalam Olimpiade Sains MIPA Kecamatan Bagor.',
                'details' => null,
                'order' => 3,
            ],
            [
                'category' => 'education',
                'title' => 'Sekolah Menengah Pertama',
                'period' => '2010 - 2013',
                'subtitle' => 'SMP Negeri 3 Nganjuk',
                'description' => 'Pada saat itu, saya aktif dalam kegiatan Ekstrakurikuler Pramuka (Pasus Resprapanca) and ikut OSIS. Mengikuti banyak perlombaan pada bidang kepramukaan and menjadi Ketua Umum di Angkatan Perintis pada Pasus Resprapanca.',
                'details' => null,
                'order' => 4,
            ],
            [
                'category' => 'education',
                'title' => 'Sekolah Menengah Kejuruan',
                'period' => '2013 - 2016',
                'subtitle' => 'SMK Negeri 1 Nganjuk',
                'description' => 'Teknik Sepeda Motor adalah kejuruan saya, menjadi Hakim di Ekstrakurikuler Paskibra Pasopati adalah peran saya. Peringkat 1 dari kelas 10 sampai kelas 12 sudah menjadi target saya. Dan meraih juara pada setiap lomba Baris Berbaris merupakan hasil dari dedikasi saya selama menjadi Anggota Aktif sampai menjadi Dewan Penasehat di Paskibra Pasopati.',
                'details' => null,
                'order' => 5,
            ],
            [
                'category' => 'education',
                'title' => 'Praktek Kerja Industri',
                'period' => '2014 - 2015',
                'subtitle' => 'AHASS Barokah Motor, Nganjuk',
                'description' => 'Pada saat kelas 11 SMK, saya mengikuti praktek kerja industri di salah 1 bengkel yang ada di Nganjuk.',
                'details' => null,
                'order' => 6,
            ],
            // Experience
            [
                'category' => 'experience',
                'title' => 'Operator Pemutaran Film Sejarah',
                'period' => '2016 - 2017',
                'subtitle' => 'Pradja Media Film, Malang & Wonosobo',
                'description' => null,
                'details' => [
                    ['item' => 'Setelah lulus sekolah, saya mencoba ikut orang untuk mengerjakan proyek pemutaran film sejarah di beberapa sekolah dasar yang ada di daerah Malang and Wonosobo'],
                ],
                'order' => 7,
            ],
            [
                'category' => 'experience',
                'title' => 'Barista',
                'period' => '2017 - 2018',
                'subtitle' => 'The Way Out Coffee and Gallery, Kediri',
                'description' => null,
                'details' => [
                    ['item' => 'Sempat jadi barista and pelayan, belajar menyeduh kopi origin dari berbagai daerah di Indonesia juga berkarya membuat Latte Art di Cappuccino.'],
                ],
                'order' => 8,
            ],
            [
                'category' => 'experience',
                'title' => 'Operator Mesin Pemintal Benang',
                'period' => '2019 - 2020',
                'subtitle' => 'PT. Mitra Saruta Indonesia, Nganjuk',
                'description' => null,
                'details' => [
                    ['item' => 'Pada saat itu, setelah pulang dari perantauan selama 1 tahun di Kendari. Saya masuk menjadi karyawan di salah satu pabrik industri sarung tangan di Nganjuk.'],
                ],
                'order' => 9,
            ],
            [
                'category' => 'experience',
                'title' => 'Kuli Bangunan',
                'period' => '2020 - 2021',
                'subtitle' => 'Perumahan Semeru Residence, Nganjuk',
                'description' => null,
                'details' => [
                    ['item' => 'Setelah keluar dari Pabrik, saya ikut om saya and bekerja menjadi kuli bangunan di salah satu proyek bangunan yang ada di Nganjuk.'],
                ],
                'order' => 10,
            ],
            [
                'category' => 'experience',
                'title' => 'Penjual Jamur',
                'period' => '2021 - 2022',
                'subtitle' => 'Beberapa Pasar di Nganjuk',
                'description' => null,
                'details' => [
                    ['item' => 'Sempat kecelakaan di Tulungagung, yang mengakibatkan kaki kanan saya patah. Setelah pulih, saya mencoba berjualan jamur di beberapa pasar yang ada di Nganjuk.'],
                ],
                'order' => 11,
            ],
            [
                'category' => 'experience',
                'title' => 'Online Customer Service',
                'period' => '2021 - 2022',
                'subtitle' => 'Reactor Studio, Nganjuk',
                'description' => null,
                'details' => [
                    ['item' => 'Di samping saya berjualan jamur, saya juga bekerja sebagai CS Online di salah satu studio yang mengerjakan sketsa di Nganjuk.'],
                ],
                'order' => 12,
            ],
            [
                'category' => 'experience',
                'title' => 'Freelancer',
                'period' => '2022 - Sekarang',
                'subtitle' => 'Virtual Office Saya',
                'description' => null,
                'details' => [
                    ['item' => 'Dengan berbagai pengalaman saya yang jatuh bangun di beberapa pekerjaan sebelumnya. Akhirnya dengan bekal and niat yang saya miliki sekarang, saya membuka jasa Freelance di bidang digital.'],
                ],
                'order' => 13,
            ],
        ];

        foreach ($resumes as $resume) {
            Resume::updateOrCreate(
                ['category' => $resume['category'], 'title' => $resume['title'], 'period' => $resume['period']],
                $resume
            );
        }

        // 3. Seed Contact Section
        Contact::updateOrCreate(['id' => 1], [
            'address' => 'Jl Selogongsong, Nganjuk, Indonesia',
            'email' => 'wiagmadra@gmail.com',
            'phone' => '0856 4907 3770',
            'maps_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1110.3705353526012!2d111.88457224250215!3d-7.585507023193214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784b00244498b5%3A0xe5a363a03362a792!2sTjah%20Mbeling%20Digital%20Studio!5e0!3m2!1sid!2sid!4v1734241682337!5m2!1sid!2sid',
        ]);

        // 4. Seed Services
        $services = [
            ['title' => 'Santai tapi serius.', 'icon' => 'bx bx-coffee', 'description' => 'Ngobrol santai sambil ngopi, temukan solusi untuk setiap masalah.', 'order' => 1],
            ['title' => 'Buat janji, Kita ketemu', 'icon' => 'bx bx-conversation', 'description' => 'Jika dicari, maka akan susah ketemu. Buat janji ketemu, maka tidak perlu mencari.', 'order' => 2],
            ['title' => '16 jam siap bantu', 'icon' => 'bx bx-time', 'description' => '8 jam sisanya hanya untuk "me time" dan "q-time" bersama keluarga.', 'order' => 3],
            ['title' => 'Nemo Enim', 'icon' => 'bx bx-world', 'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis', 'order' => 4],
            ['title' => 'Dele cardo', 'icon' => 'bx bx-slideshow', 'description' => 'Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur', 'order' => 5],
            ['title' => 'Divera don', 'icon' => 'bx bx-arch', 'description' => 'Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur', 'order' => 6],
        ];

        foreach ($services as $service) {
            \App\Models\Service::updateOrCreate(['title' => $service['title']], $service);
        }

        // 5. Seed Portfolio
        $portfolios = [
            ['title' => 'Fotografi 1', 'category' => 'filter-app', 'image' => '/assets/img/portfolio/pf-1.jpg', 'link' => 'pf1.html', 'order' => 1],
            ['title' => 'Web Sederhana 3', 'category' => 'filter-web', 'image' => '/assets/img/portfolio/error.png', 'link' => 'coming-soon.html', 'order' => 2],
            ['title' => 'Fotografi 2', 'category' => 'filter-app', 'image' => '/assets/img/portfolio/pf-4.jpg', 'link' => 'pf2.html', 'order' => 3],
            ['title' => 'Ilustrasi 2', 'category' => 'filter-card', 'image' => '/assets/img/portfolio/pi-4.png', 'link' => 'pi2.html', 'order' => 4],
            ['title' => 'Web Sederhana 2', 'category' => 'filter-web', 'image' => '/assets/img/portfolio/pw-4.jpg', 'link' => 'pw2.html', 'order' => 5],
            ['title' => 'Fotografi 3', 'category' => 'filter-app', 'image' => '/assets/img/portfolio/pf-7.jpg', 'link' => 'pf3.html', 'order' => 6],
            ['title' => 'Ilustrasi 1', 'category' => 'filter-card', 'image' => '/assets/img/portfolio/pi-1.png', 'link' => 'pi1.html', 'order' => 7],
            ['title' => 'Ilustrasi 3', 'category' => 'filter-card', 'image' => '/assets/img/portfolio/pi-7.png', 'link' => 'pi3.html', 'order' => 8],
            ['title' => 'Web Sederhana 1', 'category' => 'filter-web', 'image' => '/assets/img/portfolio/error.png', 'link' => 'coming-soon.html', 'order' => 9],
        ];

        foreach ($portfolios as $portfolio) {
            \App\Models\Portfolio::updateOrCreate(['title' => $portfolio['title']], $portfolio);
        }
    }
}
