-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_berita
CREATE DATABASE IF NOT EXISTS `db_berita` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_berita`;

-- Dumping structure for table db_berita.beritas
CREATE TABLE IF NOT EXISTS `beritas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `pic` text NOT NULL,
  `desc` text NOT NULL,
  `user` int(11) NOT NULL,
  `verify` enum('p','y','n') NOT NULL,
  `verify_desc` varchar(255) NOT NULL,
  `like` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`like`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_berita.beritas: ~12 rows (approximately)
INSERT INTO `beritas` (`id`, `title`, `category`, `pic`, `desc`, `user`, `verify`, `verify_desc`, `like`, `created_at`, `updated_at`) VALUES
	(1, 'tess', 1, '218022024_tes.png', 'tesss', 2, 'y', 'proses', '{"usrid":0,"usrid1":1,"usrid2":2}', '2024-02-17 20:32:34', '2024-03-27 23:35:23'),
	(4, 'pantai senggigi', 5, '120022024_pantai_senggigi.jpg', 'Senggigi, salah satu pantai yang berada di Pulau Lombok ini ramai dikunjungi banyak wisatawan, baik wisatawan lokal dari beberapa kota se-Indonesia, maupun wisatawan dari manca negara. Pantai Senggigi yang berada di Lombok Barat ini ternyata menyimpan salah satu lanskap pemandangan pantai terbaik di Indonesia. Tentu ini menjadi daya tarik yang mungkin sayang untuk dilewatkan oleh siapapun yang mengunjungi Pulau Lombok.\r\n\r\nPantai Senggigi terletak di Lombok Barat, tepatnya di Jl. Raya Senggigi km 6-7 Kecamatan Batulayar, Kabupaten Lombok Barat Propinsi Nusa Tenggara Barat. Jarak antara Pantai Senggidi dengan Bandara Internasional Lombok sekitar 51 kilometer, waktu tempuh tercepat sekitar 1 jam 10 menit dengan menggunakan kendaraan pribadi. Sedangkan jarak antara Pantai Snggigi dengan Pelabuhan Lembar sekitar 39 kilometer, dengan waktu tempuh sekitar 40 menit menggunakan kendaraan pribadi.\r\n\r\nLokasi Pantai Senggigi cukup strategis, terletak cukup dekat dengan pusat Kota Mataram. Jaraknya hanya berkisar 17 kilometer, dengan waktu tempuh hanya sekitar 30 menit saja. Faktor ini yang membuat Pantai Senggigi cukup ramai dikunjungi para pelancong. Juga menjadikannya sebagai tempat yang mendapat perhatian cukup besar dari pemerintah setempat.', 1, 'y', 'proses', '{"usrid":0}', '2024-02-19 21:37:16', '2024-02-19 21:37:16'),
	(5, 'pilpres 2024', 1, '120022024_pilpres 2024.png', 'Pemilihan Umum Presiden Indonesia 2024, disebut juga Pilpres 2024, adalah pemilihan umum kelima di Indonesia yang bertujuan untuk memilih Presiden dan Wakil Presiden Republik Indonesia. Pemilihan dilakukan untuk menentukan pemangku jabatan presiden dan wakil presiden untuk masa bakti 2024–2029. Pemilihan ini berlangsung serentak di seluruh wilayah Indonesia pada Rabu, 14 Februari 2024. Pemilihan ini menjadi kontestasi politik untuk memilih presiden baru menggantikan Joko Widodo yang purna tugas dari jabatannya setelah menjabat dua periode sebagai presiden dan tidak dapat mencalonkan diri lagi berdasarkan konstitusi.\r\n\r\nPemilihan umum ini akan dilaksanakan dalam waktu yang bersamaan dengan pemilihan umum anggota DPR RI, DPD RI, dan DPRD di seluruh Indonesia. Sementara pemilihan umum kepala daerah baru akan dilaksanakan pada hari Rabu tanggal 27 November 2024', 1, 'y', 'proses', '{"usrid":0,"usrid2":2}', '2024-02-19 22:52:49', '2024-02-19 22:52:49'),
	(6, 'tes', 1, '218022024_tes.png', 'tesss', 2, 'n', 'tidak lengkap', '{"usrid":0,"usrid1":1}', '2024-02-17 20:32:34', '2024-03-24 18:44:32'),
	(9, 'pilpres 2024', 1, '120022024_pilpres 2024.png', 'Pemilihan Umum Presiden Indonesia 2024, disebut juga Pilpres 2024, adalah pemilihan umum kelima di Indonesia yang bertujuan untuk memilih Presiden dan Wakil Presiden Republik Indonesia. Pemilihan dilakukan untuk menentukan pemangku jabatan presiden dan wakil presiden untuk masa bakti 2024–2029. Pemilihan ini berlangsung serentak di seluruh wilayah Indonesia pada Rabu, 14 Februari 2024. Pemilihan ini menjadi kontestasi politik untuk memilih presiden baru menggantikan Joko Widodo yang purna tugas dari jabatannya setelah menjabat dua periode sebagai presiden dan tidak dapat mencalonkan diri lagi berdasarkan konstitusi.\r\n\r\nPemilihan umum ini akan dilaksanakan dalam waktu yang bersamaan dengan pemilihan umum anggota DPR RI, DPD RI, dan DPRD di seluruh Indonesia. Sementara pemilihan umum kepala daerah baru akan dilaksanakan pada hari Rabu tanggal 27 November 2024', 1, 'p', 'proses', '{"usrid":0}', '2024-02-19 22:52:49', '2024-03-26 17:40:47'),
	(10, 'pantai senggigi', 5, '28032024_pantai_senggigiii.jpg', 'Senggigi, salah satu pantai yang berada di Pulau Lombok ini ramai dikunjungi banyak wisatawan, baik wisatawan lokal dari beberapa kota se-Indonesia, maupun wisatawan dari manca negara. Pantai Senggigi yang berada di Lombok Barat ini ternyata menyimpan salah satu lanskap pemandangan pantai terbaik di Indonesia. Tentu ini menjadi daya tarik yang mungkin sayang untuk dilewatkan oleh siapapun yang mengunjungi Pulau Lombok.\r\n\r\nPantai Senggigi terletak di Lombok Barat, tepatnya di Jl. Raya Senggigi km 6-7 Kecamatan Batulayar, Kabupaten Lombok Barat Propinsi Nusa Tenggara Barat. Jarak antara Pantai Senggidi dengan Bandara Internasional Lombok sekitar 51 kilometer, waktu tempuh tercepat sekitar 1 jam 10 menit dengan menggunakan kendaraan pribadi. Sedangkan jarak antara Pantai Snggigi dengan Pelabuhan Lembar sekitar 39 kilometer, dengan waktu tempuh sekitar 40 menit menggunakan kendaraan pribadi.\r\n\r\nLokasi Pantai Senggigi cukup strategis, terletak cukup dekat dengan pusat Kota Mataram. Jaraknya hanya berkisar 17 kilometer, dengan waktu tempuh hanya sekitar 30 menit saja. Faktor ini yang membuat Pantai Senggigi cukup ramai dikunjungi para pelancong. Juga menjadikannya sebagai tempat yang mendapat perhatian cukup besar dari pemerintah setempat.', 2, 'p', 'proses', '{"usrid":0}', '2024-02-19 21:37:16', '2024-03-27 23:35:09'),
	(11, 'Cara membuat rempeyek', 4, '731032024_Cara_membuat_rempeyek.jpg', 'resep rempeyek\r\n\r\nBahan-bahan\r\n- 250 gr tepung beras\r\n- 1 sdm tepung tapioka\r\n- 1 butir telur\r\n- Segenggam kacang tanah (potong - potong agar matang renyah)\r\n- 300 ml air\r\n- 5 lembar daun jeruk iris tipis\r\n- Bahan yang dihaluskan :\r\n- 4 siung bawang putih\r\n- 1 sdt ketumbar\r\n- 2 butir kemiri\r\n- 2 lembar daun jeruk\r\n- 1 cm kunyit\r\n- 1/2 cm kencur\r\n- 3/4 sdt garam\r\n- 1/2 sdt penyedap rasa\r\n\r\nCara Membuat\r\n1 Haluskan bumbu Rempeyek Kacang Renyah Tahan Lama langkah memasak 1 foto\r\n2 Setelah bumbu halus. Siapkan wadah, masukan bumbu halus, tepung beras, tepung tapioka, telur\r\n3 Beri air sedikit2 sambil diaduk, terakhir masukan kacang tanah dan daun jeruk yg telah diiris\r\n4 Setelah adonan jadi, jangan lupa koreksi rasa asinnya. jika rasanya kurang, tambahkan garam secukupnya.\r\n5 Panaskan banyak minyak dalam wajan, Tuang adonan dengan cepat di dinding wajan secara melebar tipis. siram perlahan menggunakan minyak panas hingga peyek mengering lepas dari sisi wajan dan masuk ke dalam minyak, Goreng peyek dengan api sedang sampai kering berwarna agak kecoklatan, kemudian angkat tiriskan\r\n6 Rempeyek siap disajikan', 7, 'y', 'berita yang kamu tulis sangat menarik, lanjutkan baktamu.', '{"usrid":0}', '2024-03-31 09:12:58', '2024-03-31 09:45:33'),
	(12, 'ayam geprek', 4, '731032024_ayam_geprek.jpg', 'Ayam geprek adalah makanan ayam goreng tepung khas Indonesia yang diulek atau dilumatkan bersama sambal bajak. Sebagian besar sumber menyebut bahwa ayam geprek berasal dari Kota Yogyakarta. Kini, ayam geprek telah menjadi hidangan populer yang dapat ditemukan di hampir semua kota besar di Indonesia.\r\n\r\nSebagian sumber menyebut bahwa hidangan ayam geprek bermula di Kota Yogyakarta, hasil kreasi Ruminah atau dikenal sebagai Bu Rum. Pada 2003, Bu Rum awalnya menjual lotek, soto, dan ayam goreng tepung di warung makannya. Ia kemudian diminta oleh seorang mahasiswa asal Kudus untuk menambahkan sambal ulek di atas ayam goreng tepungnya dan melumatkannya menggunakan ulekan. Hidangan ayam goreng tepung yang dilumat bercampur sambal ini awalnya sempat pula disebut sebagai "ayam ulek" atau "ayam gejrot".\r\n\r\nHidangan ayam geprek menjadi populer di Indonesia sekitar tahun 2017. Banyak restoran lain di seluruh Indonesia yang turut menyajikan hidangan ini. Beberapa gerai yang menjual ayam geprek juga menyediakan variasi baru, seperti menambahkan keju mozzarella dan kol goreng.', 7, 'y', 'keren bangett, terus berkreasi', '{"usrid":0}', '2024-03-31 09:17:25', '2024-03-31 09:46:21'),
	(13, 'Takmir Masjid Al-Mukhlisin Pekuncen Gelar Lomba Kampung Ramadhan', 5, '731032024_Takmir_Masjid_Al-Mukhlisin_Pekuncen_Gelar_Lomba_Kampung_Ramadhan.jpg', 'Takmir Masji Al-Mukhlisin, Kelurahan Pekuncen, Kecamatan Panggungrejo, Kota Pasuruan menggelar lomba bertajuk Kampung Ramadhan. Kegiatan ini bertujuan memeriahkan bulan suci dari awal hingga akhir.\r\n\r\nM. Farid Sauqi, Ketua Takmir Masjid Al-Mukhlisin Pekuncen, mengungkapkan, kegiatan tersebut memang sengaja melibatkan seluruh warga. Bukan tanpa alasan, dengan adanya kegiatan ini, masyarakat turut berperan aktif dalam menjaga dan menata keindahan lingkungan.\r\n\r\nMeski baru tahun pertama digelar, pemenang lomba bakal menerima hadiah berupa uang tunai jutaan rupiah. Bagi kampung yang menyabet Juara I, akan menerima uang sebesar Rp 2 juta. Juara II, sebesar Rp 1,5 juta dan Juara III, sebesar Rp 1 juta.\r\n\r\nSedangkan Juara Harapan I, II, dan III masing-masing mendapatkan Rp 500 ribu.\r\n\r\nKesemua hadiah bagi para pemenang ini bersumber dari para donatur dan baitul mal Masjid Al-Mukhlisin.\r\n\r\nDiakhir perbincangan, Farid juga mengungkapkan harapannya agar bisa dipertemukan kembali di bulan Ramadhan 1441 H dan amalan Puasa tagun ini diterima Allah SWT.', 7, 'p', 'proses', '{"usrid":0}', '2024-03-31 09:24:48', '2024-03-31 09:24:48'),
	(14, 'Greenday', 3, '831032024_Greenday.jpg', 'Green Day merupakan salah satu band punk rock paling terkenal di dunia. Band ini terdiri dari tiga anggota, yaitu Billie Joe Armstrong (vokal dan gitar), Mike Dirnt (bass), dan Tr Cool (drum). Mereka telah merilis banyak album yang sangat sukses dan diakui secara luas sebagai salah satu band terbaik di genre punk rock. Awal mula Green Day terbentuk pada tahun 1987 ketika Billie Joe Armstrong dan Mike Dirnt masih berusia 15 tahun dan bermain musik bersama di Berkeley. Mereka kemudian merekrut Tr Cool sebagai drummer dan mulai tampil di klub lokal di daerah mereka. Pada tahun 1989, Green Day merilis album pertama mereka yang berjudul "1,039/Smoothed Out Slappy Hours".\r\n\r\nAlbum kedua Green Day, "Kerplunk", dirilis pada tahun 1992 dan menjadi album yang sangat sukses. Namun, kesuksesan sejati Green Day datang pada tahun 1994 ketika mereka merilis album "Dookie". Album ini menjadi hit besar di seluruh dunia dan mendapat penghargaan Grammy Award untuk kategori "Album Rock Terbaik". Setelah kesuksesan "Dookie", Green Day merilis beberapa album yang juga sukses seperti "Insomniac" (1995) dan "Nimrod" (1997). Pada tahun 2004, Green Day merilis album "American Idiot" yang menjadi salah satu album terbaik mereka sepanjang masa. Album ini menceritakan kisah fiksi tentang karakter bernama "Jesus of Suburbia" yang merasa frustasi dengan kehidupannya di pinggiran kota Amerika. Lagu-lagu dari album "American Idiot" seperti "Holiday" dan "Wake Me Up When September Ends" menjadi hits besar di seluruh dunia. Green Day terus merilis album setelah "American Idiot" seperti "21st Century Breakdown" (2009) dan "Revolution Radio" (2016). Mereka juga telah melakukan tur dunia yang sangat sukses dan menjadi band punk rock yang paling banyak diundang untuk tampil di acara-acara besar seperti festival musik.\r\n\r\nSelain dari musik, Green Day juga dikenal sebagai band yang sangat aktif dalam kegiatan sosial dan politik. Mereka telah berpartisipasi dalam kampanye sosial dan politik seperti "Rock Against Bush" dan "No Nukes". Mereka juga mendukung banyak organisasi amal seperti Comic Relief, Make-A-Wish Foundation, dan PETA.\r\n\r\nKesuksesan Green Day tidak hanya berdampak pada dunia musik, tetapi juga pada budaya populer. Mereka telah dijadikan bahan parodi di acara televisi "South Park" dan juga menjadi karakter dalam video game "Rock Band". Lagu-lagu mereka juga telah digunakan dalam film dan acara televisi seperti "The Simpsons" dan "Transformers".', 8, 'y', 'nice info', '{"usrid":0}', '2024-03-31 09:29:33', '2024-03-31 09:47:08'),
	(15, 'Skenario Lengkap Timnas Indonesia Bisa Lolos ke Putaran Ketiga Kualifikasi Piala Dunia 2026', 7, '831032024_Skenario_Lengkap_Timnas_Indonesia_Bisa_Lolos_ke_Putaran_Ketiga_Kualifikasi_Piala_Dunia_2026.jpg', 'Timnas Indonesia sukses memenangi dua pertandingan atas Vietnam dengan skor 1-0 dan 3-0.\r\n\r\nKemenangan 3-0 di Stadion My Dinh, Hanoi, Selasa (26/3/2024) membuat Timnas Indonesia makin kokoh di peringkat kedua Grup F.\r\n\r\nTimnas Indonesia kini mengoleksi tujuh poin dari empat pertandingan.\r\n\r\nKini, Irak sudah dikonfirmasi lolos usai menyapu bersih empat kemenangan.\r\n\r\nHasil ini membuat Grup F masih menyisakan satu tiket lagi untuk lolos ke putaran berikunya.\r\n\r\nBerdasarkan aturan klasemen di babak Kualifikasi Piala Dunia 2026, maka baik Timnas Indonesia, Vietnam, dan Filipina masih memiliki peluang untuk lolos.\r\n\r\nPasalnya, penentuan tim yang lolos jika ada dua tim yang memiliki poin yang sama ditentukan dari selisih gol, lalu jumlah gol yang dicetak pada fase grup.\r\n\r\nSebagai contoh Filipina yang berada di posisi terbawah dan memiliki selisih gol minus delapan masih ada peluang untuk lolos.', 8, 'y', 'semoga timnas bisa lolos pildun', '{"usrid":0}', '2024-03-31 09:33:53', '2024-03-31 09:48:06'),
	(16, 'Manfaat kursi pijat elektrik', 8, '831032024_Manfaat_kursi_pijat_elektrik.jpg', 'Manfaat Kursi Pijat\r\nBerikut ini adalah beberapa manfaat yang dimiliki oleh kursi pijat:\r\n\r\n1. Mengobati nyeri punggung\r\nNyeri punggung adalah salah satu masalah kesehatan yang sangat mengganggu. Nyeri punggung adalah kondisi ketika punggung mengalami sebuah masalah yang mengakibatkan terasa nyeri. Masalah tersebut bisa beragam, bisa karena masalah otot atau penyakit tertentu.\r\nDi samping dengan melakukan pengobatan secara medis, banyak layanan atau pusat kesehatan yang menyarankan pasien nyeri punggung untuk berobat lain. Pengobatan tersebut adalah layanan urut atau pijat. Menurut beberapa studi, menyebutkan bahwa terapi berupa pijat akan membuahkan hasil yang lebih baik dibanding dengan melakukan akupuntur. Selain itu, pijat juga lebih baik dari modifikasi tulang belakang.\r\n\r\nHal lain yang juga memiliki manfaat sendiri dari terapi berupa pijat adalah pasien jadi bisa mengurangi obat. Obat-obat yang dikurangi biasanya adalah obat pereda nyeri. Pengurangannya bisa sampai 36%.\r\nTerkadang, banyak orang yang tidak ingin dipijat karena beberapa hal. Terutama ketika pandemic seperti ini. Untuk mengatasinya, kamu bisa menggunakan kursi pijat. Kursi pijat adalah alat yang tepat untuk mengobati nyeri punggung. Hanya dengan duduk, kamu dapat melakukan pengobatan terhadap nyeri punggung yang sedang dialami.\r\n\r\n2. Melepaskan racun tubuh\r\nPijat refleksi dapat meningkatkan fungsi pada kandung kemih. Selain itu, dapat juga mengurangi masalah yang ada pada saluran kandung kemih. Hal ini tentu akan memengaruhi fungsi-fungsi tubuh yang lain.\r\nSistem toksisitas tubuh akan menjadi lebih baik. Sehingga racun dapat menghilang dari tubuh. Ketika racun yang ada di dalam tubuh keluar, tubuh akan menjadi lebih sehat.\r\n\r\n3. Meringankan stres\r\nStress adalah penyakit yang tidak terlihat. Meskipun begitu, stress adalah salah satu gangguan yang sering dialami seseorang. Terkadang, orang yang sedang stress tidak menyadari mengenai kondisinya tersebut. Sehingga cenderung mengabaikannya.\r\nStress bisa terjadi karena banyak hal. Contohnya seperti banyaknya pekerjaan yang harus dilakukan. Jangan menganggap stress adalah sesuatu yang mudah diatasi atau enteng. Stress adalah awal dari sebuah depresi, yaitu salah satu penyakit kejiwaan.\r\nSalah satu cara yang bisa dilakukan untuk mengatasi stress adalah pijat. Pijatan-pijatan tertentu akan membantu untuk mengatasi stress yang sedang dialami. Ini adalah salah satu manfaat dari kursi pijat, selain untuk mengobati masalah kesehatan, kursi pijat juga dapat membantu mengurangi stress.\r\nPijatan-pijatan yang dilakukan oleh kursi pijat akan membuat tubuh menjadi lebih rileks. Sehingga rasa lelah dan penat akan berkurang. Hal itu akan mempengaruhi kondisi psikis yang menjadi lebih baik.\r\n\r\n4. Mengobati penyakit kanker\r\nPada saat melakukan pijat, akan ada titik-titik di tubuh yang ditekan. Titik-titik itu akan mempengaruhi kerja organ yang ada di dalam tubuh. Salah satu manfaatnya adalah bagi pasien kanker.\r\nMelalui pijatan-pijatan, pasien kanker dapat meningkatkan nafsu makan dan mencegah kelelahan. Selain itu, pasien kanker juga dapat mencegah terjadinya gangguan tidur dan gangguan pencernaan. Selain itu, dapat juga memperbaiki suasana hati.\r\nSebuah penelitian menunjukkan bahwa 87% pasien kanker terapi melalui pijat. Pasien-pasien tersebut merasa setelah pijat merasakan efek yang baik. Efek tersebut adalah berkurangnya rasa sakit.\r\n\r\n\r\n5. Mengontrol tekanan darah\r\nDi masa yang serba canggih ini membuat banyak pekerjaan bisa dilakukan dimana saja. Biasanya hanya membutuhkan laptop. Meskipun lebih praktis, tetapi hal ini juga mengganggu masalah kesehatan.\r\nDuduk dalam waktu yang lama ketika bekerja akan mengganggu kesehatan. Akan membuat sirkulasi dari darah menjadi tidak lancar. Sehingga akan rentan terkena berbagai penyakit. Salah satu manfaat yang dapat diambil dari penggunaan kursi pijat adalah melancarkan peredaran darah.\r\n\r\n\r\nMelalui penggunaan kursi pijat, pijatan-pijatan yang dilakukan akan membantu melancarkan sirkulasi darah. Hal itu akan berpengaruh pada organ tubuh. Organ-organ yang ada di dalam tubuh akan mendapat oksigen sesuai dengan kebutuhannya. Hal ini adalah akibat jika sirkulasi darah lancar.\r\n\r\n6. Relaksasi otot\r\nManfaat lain dari kursi pijat adalah relaksasi otot. Manfaat ini juga terbilang cukup penting. Ketika terlalu lama melakukan sesuatu, maka otot-otot yang ada di dalam tubuh akan menjadi tegang. Selain itu, otot juga akan menjadi kaku. Hal ini terjadi juga karena sirkulasi darah dan oksigen ke otot tidak lancar.\r\nMelalui kursi pijat, kamu bisa mengatasi masalah ini. Melakukan pijatan-pijatan di kursi pijat akan membuat otot menjadi lebih berelaksasi. Hal ini akan menjadikan kamu lebih enak untuk  melakukan sesuatu.', 8, 'y', 'menarik', '{"usrid":0,"usrid1":1}', '2024-03-31 09:39:14', '2024-03-31 09:53:08');

-- Dumping structure for table db_berita.categorys
CREATE TABLE IF NOT EXISTS `categorys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_berita.categorys: ~8 rows (approximately)
INSERT INTO `categorys` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
	(1, 'tess', 'tesss', NULL, '2024-03-30 07:05:43'),
	(3, 'hiburan', 'hiburan', '2024-02-19 21:24:34', '2024-02-19 21:24:34'),
	(4, 'kuliner', 'kuliner', '2024-02-19 21:24:48', '2024-02-19 21:24:48'),
	(5, 'wisata', 'wiasata', '2024-02-19 21:25:01', '2024-02-19 21:25:01'),
	(7, 'olahraga', 'olahraga', '2024-02-19 21:25:33', '2024-02-19 21:25:33'),
	(8, 'kesehatan', 'kesehatan', '2024-02-19 21:25:55', '2024-02-19 21:25:55'),
	(9, 'budaya', 'budaya', '2024-02-19 21:26:36', '2024-02-19 21:26:36');

-- Dumping structure for table db_berita.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `berita` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_berita.comments: ~7 rows (approximately)
INSERT INTO `comments` (`id`, `user`, `berita`, `comment`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'komen 1', '2024-02-17 22:12:33', '2024-02-17 22:12:33'),
	(2, 2, 1, 'komen 2', '2024-02-17 22:12:57', '2024-02-17 22:12:57'),
	(3, 1, 1, 'komen 3', '2024-02-17 22:12:57', '2024-02-17 22:12:57'),
	(4, 2, 1, 'komen 4', '2024-02-17 22:12:57', '2024-02-17 22:12:57'),
	(5, 2, 4, 'komen berita 1', '2024-02-17 22:12:57', '2024-02-17 22:12:57'),
	(6, 1, 4, 'komen berita 2', '2024-02-17 22:12:57', '2024-02-17 22:12:57'),
	(7, 2, 4, 'komen berita 3', '2024-02-17 22:12:57', '2024-02-17 22:12:57');

-- Dumping structure for table db_berita.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_berita.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_berita.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_berita.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2022_03_08_212816_create_categorys_table', 1),
	(5, '2022_03_13_122704_create_beritas_table', 1),
	(6, '2022_03_20_113928_create_comments_table', 1);

-- Dumping structure for table db_berita.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_berita.password_resets: ~0 rows (approximately)

-- Dumping structure for table db_berita.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_berita.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `category`, `desc`, `pic`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@diamond.com', 'admin', 'adminnnn', '119032024_admin.png', '$2y$10$GTPxjxsBsIUT2W39RQ6VvuDJDobfU1jDrPSUALocS4X66ONeV1z0.', NULL, '2024-03-19 01:26:56'),
	(2, 'user', 'user@diamond.com', 'user', 'hello im user, i love DIAMOND', NULL, '$2y$10$ENryaaEI5A/ij8ueM/CjL.ly2vV/xphrX3BzmMvWmRgfncFdPyWIm', '2024-02-17 20:22:37', '2024-03-08 23:00:04'),
	(6, 'tes', 'tes@tes.com', 'user', 'tesss', '628032024_tes.jpg', '$2y$10$Rb89d8aW7UDNA.fNUMu9q.pDUlIfmIeU0nRGsh4tybyIDau3IhNEq', '2024-03-17 02:09:27', '2024-03-27 21:29:10'),
	(7, 'nana', 'nana@diamond.com', 'user', 'hello im nana, i love DIAMOND', NULL, '$2y$10$xf5mLgMqboh6lPxO8Glf0OkFU1Sdf0k7rfvAdxliW8k2gYGaYuVv.', '2024-03-31 09:04:46', '2024-03-31 09:04:46'),
	(8, 'kiki', 'kiki@diamond.com', 'user', 'hello im kiki, i love DIAMOND', NULL, '$2y$10$UEfhBDhigbKcoe.Vy7ChJ.HnR5HMMh.CNEuuxWiFIDggGypoVpApi', '2024-03-31 09:06:07', '2024-03-31 09:06:07');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
