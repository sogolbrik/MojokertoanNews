<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'     => 'admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('admin123'),
        ]);

        $kategori = [
            'Politik',
            'Teknologi',
            'Kesehatan',
            'Ekonomi',
        ];
        foreach ($kategori as $item) {
            Category::create([
                'nama' => $item,
                'slug' => $item
            ]);
        }

        News::create([
            'judul' => 'PERUBAHAN APBD KOTA MOJOKERTO 2025 DISEPAKATI, NING ITA HARAP ADA PENINGKATAN KUALITAS PELAYANAN PUBLIK',
            'id_category' => 1,
            'konten' => '
            KOTA MOJOKERTO - DPRD Kota Mojokerto resmi menyetujui Rancangan Peraturan Daerah (Raperda) tentang Perubahan Anggaran Pendapatan dan Belanja Daerah (APBD) Tahun Anggaran 2025 melalui rapat paripurna yang digelar di ruang rapat DPRD Kota Mojokerto,

Sabtu (9/8/2025).

Rapat paripurna ini juga dihadiri jajaran Forkopimda, pimpinan OPD, camat, dan lurah. Penandatanganan berita acara persetujuan bersama menjadi tanda sahnya kesepakatan antara eksekutif dan legislatif.

Wali Kota Mojokerto, Ika Puspitasari, menyampaikan bahwa perubahan APBD kali ini salah satunya menindaklanjuti Instruksi Presiden Nomor 1 Tahun 2025 tentang Efisiensi Belanja serta Instruksi Presiden Nomor 5 Tahun 2025 terkait percepatan peningkatan akses dan

mutu pelayanan kesehatan.


“Dengan disepakatinya Rancangan Perubahan Anggaran Pendapatan dan Belanja Daerah Kota Mojokerto Tahun Anggaran 2025, saya berharap adanya peningkatan kualitas dalam penyelenggaraan pemerintahan dan pelayanan kepada masyarakat di Kota Mojokerto

tercinta ini,” tutur Ning Ita, sapaan akrab wali kota.
Ia mengapresiasi kerja sama dan sumbangan pemikiran dari DPRD, khususnya Badan Anggaran, selama proses pembahasan yang berlangsung dinamis bersama Tim Anggaran Pemerintah Daerah.

“Saya percaya semua ini adalah bagian dari upaya kita dalam bersinergi untuk menuju kebaikan, khususnya bagi kepentingan seluruh warga Kota Mojokerto,” ungkapnya.

Selanjutnya, dokumen perubahan APBD ini akan dievaluasi oleh Pemerintah Provinsi Jawa Timur maksimal dalam 15 hari kerja.

“Semoga Allah SWT senantiasa memberikan bimbingan dan perlindungan kepada kita semua untuk mewujudkan Kota Mojokerto yang maju, berdaya saing, berkarakter, sejahtera, dan berkelanjutan,” pungkasnya.(humas/an)
            ',
            'waktu' => now(),
            'gambar' => "dummy1.png",
        ]);

        News::create([
            'judul' => 'Musrenbang RPJMD 2025-2029, Kiat Pemkab Mojokerto Prioritaskan Pembangunan Daerah',
            'id_category' => 1,
            'konten' => "
Pemerintah Kabupaten Mojokerto melalui Badan Perencanaan Pembangunan Daerah (BAPPEDA), menggelar Musyawarah Pembangunan Daerah (Musrenbang)  Rencana Pembangunan Jangka Menengah Daerah (RPJMD) tahun 2025-2029, Jumat (2/5) pagi. Kegiatan tersebut dilaksanakan dalam rangka merumuskan arah dan prioritas pembangunan Kabupaten Mojokerto untuk lima tahun kedepan.

Bupati Mojokerto Muhammad Al Barra, membuka giat Musrenbang RPJMD yang digelar di Pendopo Graha Mata (GMT) itu. Pada arahannya, Gus Barra berharap agar melalui Musrenbang RPJMD kali ini bisa mewujudkan pelayanan dan pembangunan yang profesional dan transparan, demi menjaga dan meningkatkan kepercayaan publik.

Pemerintah Kabupaten Mojokerto berkomitmen memperkuat pelayanan publik dengan prinsip transparansi, akuntabilitas, dan efisiensi, guna membangun kepercayaan masyarakat terhadap institusi pemerintah, ungkapnya.

Selain membuka jalannya Musrenbang, Gus Barra yang juga didampingi Wakilnya, M. Rizal Octavian, menjelaskan secara detail tentang implementasi empat misi bupati dan wakilnya atau yang kerap disebut sebagai Catur Abhipraya Mubarok. Salah satunya adalah program Peduli Guru Santri, yang merupakan bagian dari poin kedua Catur Abhipraya, 'Mewujudkan SDM yang tangguh, cerdas, terampil, produktif, dan berkarakter melalui peningkatan kualitas pendidikan dan kesehatan serta menjaga ketentraman Masyarakat.

Kami menyediakan tunjangan khusus bagi guru santri yang selama ini belum mendapatkan pengakuan dan dukungan dari pemerintah daerah, nanti akan dilaunching dalam pelaksanaan program 100 hari kerja bupati dan wakil bupati, bebernya.

Sementara itu, Ketua DPRD Kabupaten Mojokerto Ayni Zuroh, yang juga menjadi pembicara pada giat tersebut memberikan beberapa rekomendasi kepada bupati dan para jajarannya. Salah satunya adalah pengembangan pariwisata yang berbasis pada karakter budaya Majapahit. Ayni menilai bahwa Bupati dengan para Jajaran Kepemerintahannya harus menunjukkan dukungan pada destinasi wisata dan elemen penunjangnya, baik secara fisik maupun non fisik.

Pengembangan destinasi wisata berkarakter budaya Majapahit harus didukung dengan fasilitas penunjang pariwisata, peningkatan aktivitas wisata, serta penguatan branding dan kemitraan, ujar Ayni.

Selain hadirnya Ketua DPRD Kabupaten Mojokerto, Musrenbang RPJMD 2025-2029 ini juga diikuti oleh sedikitnya 200 orang yang terdiri dari beberapa unsur, baik itu dalam lingkup kepemerintahan maupun para stakeholder yang lain. Hal ini seperti yang dijelaskan oleh Kepala Bappeda Kabupaten Mojokerto, Bambang Eko Wahyudi melalui sesi laporannya.

Peserta yang diundang lebih kurang 250 orang yang terdiri dari, unsur pimpinan (Pemkab dan DPRD), unsur Forkopimda, unsur instansi sekitar (pimpinan Bappeda kota/kab. lain), unsur Perangkat Daerah (pimpinan OPD se-kab. Mojokerto), unsur Perguruan tinggi, unsur Masyarakat, unsur Agama, dan unsur Lembaga Swadaya Masyarakat (LSM), terang Bambang. (Bad;Foto:Agm/Ng)
",
            'waktu' => now(),
            'gambar' => "dummy2.png",
        ]);

        News::create([
            'judul' => 'Gubernur Khofifah Salurkan Rp 5,7 Miliar Bansos dan Zakat Produktif Di Kabupaten Blitar, Jadi Penguat Sosial Ekonomi Masyarakat',
            'id_category' => 1,
            'konten' => '"Alhamdulillah bansos dan zakat produktif terus kita salurkan. Semoga dapat menjadi penguatan sosial ekonomi masyarakat Blitar," kata Gubernur Khofifah.

Beberapa bansos yang disalurkan Gubernur Khofifah, antara lain bantuan sosial PKH Plus, bantuan Asistensi Sosial Penyandang Disabilitas (ASPD), bantuan permakanan, bantuan alat bantu disabilitas, bantuan KIP Eks PPKS Jawara, bantuan BLT buruh pabrik rokok, taliasih bagi pilar-pilar sosial, BUMDesa dan penyerahan Zakat Produktif kepada Pedagang Ultra Mikro. 

Disampaikan Gubernur Khofifah, penyaluran bantuan sosial itu merupakan bentuk akuntabilitas publik dalam penyaluran bantuan yang keseluruhannya dikelola Pemprov Jatim. 

"Tolong bansos yang diterima dipergunakan sebaik mungkin sesuai kebutuhan. Jangan dipergunakan untuk hal-hal yang tidak bermanfaat, apalagi judi online," tuturnya.

"PPATK mengatakan kira-kira ada 9 ribu lebih penerima manfaat di Jatim yang terkonfirmasi bansosnya diindikasikan untuk judol. Dan total nilainya Rp 53 miliar. Jadi saya pesan bansos jangan dipakai judi online. Manfaatkan bansos sesuai pemenuhan kebutuhan," imbuhnya. 

Bantuan sosial merupakan salah satu wujud perhatian Pemerintah Provinsi Jawa Timur kepada masyarakat. 

“Kami berharap bantuan ini bisa tepat sasaran, tepat manfaat, serta memberikan dampak positif bagi penerima maupun keluarganya," ujarnya. 

Lebih lanjut, Khofifah mengucapkan terima kasih kepada seluruh Forkompinda yang menjadi penguat utamanya pilar-pilar sosial yang menjadi lini terdepan menjangkau masyarakat desil 1-2. 

Sebab, kata Khofifah, per 1 September BPS turun melakukan sensus dan sangat menentukan data peringkat kesejahteraan dan kemiskinan.

 "Saya minta tolong bupati dan wakil bupati serta seluruhnya memastikan karena pertanyaan BPS sederhana seminggu kemarin makan apa, lauknya apa," ungkapnya. 

Dengan semangat kolaborasi, Khofifah mengatakan pentingnya menyatukan tekad untuk menghadapi tantangan kesejahteraan sosial dan mempercepat penurunan angka kemiskinan. Salah satunya, dengan menjunjung tinggi nilai-nilai kemanusiaan sebagai landasan untuk saling berbagi dan membantu sesama.',
            'waktu' => now(),
            'gambar' => "dummy3.jpg",
        ]);

        News::create([
            'judul' => 'Pimpin PKS Jatim 2025-2030, Bagus Prasetia Lelana Siap Dukung Program Gubernur Khofifah',
            'id_category' => 1,
            'konten' => "Bagus Prasetia Lelana resmi ditetapkan sebagai Ketua DPW PKS Jawa Timur periode 2025–2030. Dia menggantikan Irwan Setiawan.

Pergantian kepemimpinan ini ditegaskan melalui prosesi pelantikan, pengucapan sumpah jabatan, serta penandatanganan ikrar jabatan yang dipimpin langsung Presiden PKS, Dr H Almuzzammil Yusuf, MSi. Prosesi tersebut berlangsung serentak bersama Muswil PKS di 38 provinsi seluruh Indonesia.

Sementara pada Muswil VI PKS Jatim, sedikitnya 700 pengurus PKS dari seluruh Jawa Timur hadir untuk mengikuti agenda lima tahunan tersebut.

Peserta Muswil berasal dari berbagai unsur struktur partai. Antara lain 304 anggota DPTD PKS kabupaten/kota se-Jawa Timur, 160 pengurus MPW, DPW, dan DSW, para wakil pimpinan DPRD kabupaten/kota dari PKS, serta 15 ketua Fraksi PKS DPRD kabupaten/kota se-Jawa Timur.

Tak ketinggalan, turut hadir jajaran Dewan Pakar, Dewan Penasihat, dan Pembimbing Unit Pembinaan Anggota (UPA) Utama PKS se-Jawa Timur.

Bagus Prasetia Lelana, menegaskan bahwa kehadiran ratusan pengurus ini menjadi tanda kuatnya semangat konsolidasi PKS.",
            'waktu' => now(),
            'gambar' => "dummy4.jpg",
        ]);

        News::create([
            'judul' => 'Wabah Campak di Sumenep Tewaskan 17 Anak, Puguh DPRD Dorong Mitigasi Berkelanjutan dan Vaksinasi Massal',
            'id_category' => 1,
            'konten' => '“Apresiasi saya sampaikan kepada Pemprov Jatim yang cepat tanggap menghadapi wabah ini. Vaksinasi serentak yang dilakukan merupakan bentuk pelayanan prima dan terbaik bagi masyarakat. Tetapi yang terpenting, kita jangan lengah. Upaya mitigasi dan preventif harus terus dilakukan agar peristiwa serupa tidak terulang,” kata Puguh, Selasa (26/8/2025).

Sebagai langkah cepat, Pemprov Jatim telah mengirim 9.824 dosis vaksin campak yang kemudian digunakan dalam vaksinasi massal melalui Outbreak Response Immunization (ORI) pada 25 Agustus lalu di seluruh kecamatan lewat puskesmas.

Puguh, yang juga Sekretaris Fraksi PKS DPRD Jatim, menekankan pentingnya kesadaran masyarakat dalam mendukung imunisasi. 

Menurutnya, vaksinasi bukan hanya kebijakan pemerintah, melainkan hasil kajian ilmiah yang dirancang untuk melindungi generasi bangsa.

“Kalau kita berbicara tentang anak-anak, maka sama halnya kita berbicara tentang masa depan bangsa. Karena itu, seluruh regulasi yang dibuat untuk memproteksi anak dari penyakit harus kita dukung bersama,” tegas Sekretaris Fraksi PKS Jatim ini.

Ia berharap masyarakat di seluruh Jawa Timur semakin proaktif menjalankan imunisasi, bukan hanya di wilayah terdampak. 

“Pemerintah sudah menyiapkan infrastrukturnya, tinggal bagaimana masyarakat merespons setiap kebijakan tersebut dengan penuh kesadaran dan semangat,” pungkasnya.



Artikel ini telah tayang di Rmoljatim.id dengan judul Wabah Campak di Sumenep Tewaskan 17 Anak, Puguh DPRD Dorong Mitigasi Berkelanjutan dan Vaksinasi Massal, https://www.rmoljatim.id/wabah-campak-di-sumenep-tewaskan-17-anak-puguh-dprd-dorong-mitigasi-berkelanjutan-dan-vaksinasi-massal.
LAPORAN : Budi Prasetyo
Tagar : wabah campak sumenep campak madura 2025 2010 anak terjangkit campak 17 anak meninggal campak langkah mitigasi campak DPRD Jatim Puguh Wiji Pamungkas vaksinasi massal campa Editor : Budi Prasetyo',
            'waktu' => now(),
            'gambar' => "dummy5.jpg",
        ]);

        News::create([
            'judul' => 'KPK Periksa Komisaris Utama PT Inhutani V',
            'id_category' => 1,
            'konten' => '"Pemeriksaan dilakukan di Gedung Merah Putih KPK," kata Jurubicara KPK, Budi Prasetyo, dikutip RMOL, Selasa, 26 Agustus 2025.

Selain Komut Inhutani V, penyidik KPK juga memanggil 3 saksi lainnya, yakni Wardiono selaku staf PT PML, Ong Lina selaku staf SB Grup, dan Martua Hamonangan selaku karyawan PT Inhutani V.

Dalam kasus ini, KPK telah menetapkan 3 dari 9 orang yang terjaring OTT pada Rabu, 13 Agustus 2025 sebagai tersangka. Mereka adalah Dicky Yuana Rady selaku Dirut PT Inhutani V, Djunaidi selaku Direktur PT PML, dan Aditya selaku staf perizinan SB Grup.

Dari OTT, KPK mengamankan sejumlah barang bukti, yakni uang tunai sebesar 189 ribu Dolar Singapura atau sekitar Rp2,4 miliar, uang tunai Rp8,5 juta, 1 unit mobil Rubicon dari rumah Dicky, serta 1 unit mobil Pajero milik Dicky dari rumah Aditya',
            'waktu' => now(),
            'gambar' => "dummy6.jpg",
        ]);
    }
}
