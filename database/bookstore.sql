-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 11:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `book_price` decimal(10,2) NOT NULL,
  `diskon` int(5) NOT NULL,
  `stock` int(5) NOT NULL,
  `bestseller` enum('Y','N') NOT NULL DEFAULT 'N',
  `tanggal` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `supplier_id`, `book_name`, `author`, `id_genre`, `book_price`, `diskon`, `stock`, `bestseller`, `tanggal`, `gambar`, `description`, `active`) VALUES
(14, 0, 'Buku latihan Visual Basic untuk Mahasiswa', 'Jubilee Enterprise', 4, '57000.00', 15, 20, 'N', '2016-06-06', '9blvbum.jpg', '', 'Y'),
(15, 0, 'Kasus & Penyelesaian VB.NET', 'R H Sianipar', 4, '99990.00', 5, 20, 'N', '2016-06-06', '33kpvbn.jpg', '', 'Y'),
(16, 0, 'Dahsyatkan Aplikasi PHP dengan Sentuhan JavaScript', 'Adi Chandra Setiawan', 4, '54750.00', 10, 20, 'N', '2016-06-06', '39kapdj.jpg', '', 'Y'),
(17, 0, 'Buku Pintar Photoshop CC', 'Christopher Lee', 4, '49970.00', 25, 20, 'N', '2016-06-06', '85bppcc.jpg', '', 'Y'),
(18, 0, 'Kamus Lengkap 10 Milyar', 'Andreas Halim', 5, '87000.00', 0, 20, 'N', '2016-06-07', '54kl10m.jpg', '', 'Y'),
(20, 0, 'Super Dahsyat Responsive Web Design with Foundation 5', 'Rohi Abdulloh', 4, '45050.00', 20, 20, 'Y', '2016-06-07', '46sdrwddf5.jpg', '', 'Y'),
(21, 0, 'Rahasia Inti Master PHP Mysqli(improved)', 'Lukmanul Hakim', 4, '65000.00', 15, 20, 'Y', '2016-06-07', '83rimpdm.jpg', '', 'Y'),
(23, 0, 'Inspirasi Tanpa Menggurui', 'Cahyo Satria Wijaya', 7, '79899.00', 0, 20, 'Y', '2016-06-07', '39itm.jpg', '', 'Y'),
(24, 0, 'Tipping Point', 'Malcolm Gladwell', 8, '79990.00', 0, 20, 'Y', '2016-06-07', '81tp.jpg', '', 'Y'),
(25, 0, 'Hikayat Bumi Jawa', 'Agustina Soebachman', 8, '67000.00', 0, 20, 'N', '2016-06-07', '92hbj.jpg', '', 'Y'),
(26, 0, '#Sharing 2', 'Handry Satriago', 8, '50000.00', 0, 20, 'N', '2016-06-07', '68sharing2.jpg', '', 'Y'),
(27, 0, 'You Look Great', 'Jimmy B Oentoro', 8, '34000.00', 0, 20, 'N', '2016-06-07', '48ylg.jpg', '', 'Y'),
(28, 0, 'Blink', 'Malcolm Gladwell', 8, '85000.00', 0, 20, 'Y', '2016-06-07', '36blink.jpg', '', 'Y'),
(29, 0, 'Young On Top', 'Billy Boen', 9, '46000.00', 0, 20, 'N', '2016-06-07', '23yot.jpg', '', 'Y'),
(30, 0, 'Outliers', 'Malcolm Gladwell', 8, '68900.00', 0, 20, 'Y', '2016-06-08', '59outliers.jpg', '', 'Y'),
(35, 0, 'Perahu kertas', 'Dewi Lestari', 1, '65000.00', 10, -5, 'Y', '2016-06-08', '85pk.jpg', '', 'Y'),
(36, 0, 'Kolaborasi Android PHP & MySql', 'Akhmad Dharma', 4, '55000.00', 0, 20, 'N', '2016-09-22', '90kapm.jpg', '', 'Y'),
(37, 0, 'Balada Gathak Gathuk', 'Sujiwo Tejo', 10, '48500.00', 0, 20, 'N', '2016-09-22', '24bgg.jpg', '', 'Y'),
(38, 0, 'Tenang Senang Menang', 'Soegeanto Tan', 7, '60000.00', 20, 20, 'N', '2016-09-22', '87tsm.jpg', '', 'Y'),
(39, 0, 'Seribu Masjid Satu Jumlahnya', 'Emha Ainun Najib', 6, '45000.00', 5, 20, 'Y', '2017-01-16', '56smsj.jpg', '', 'Y'),
(41, 0, 'Dalang Galau Ngetwit', 'Sujiwo Tejo', 10, '50000.00', 0, 20, 'N', '2017-01-23', '52dalanggn.jpg', '', 'Y'),
(42, 0, 'Gelandangan Di Kampung Sendiri pengaduan orang-orang pinggiran', 'Emha Ainun Najib', 8, '100000.00', 10, 20, 'Y', '2017-01-23', '73gdks.jpg', '', 'Y'),
(43, 0, 'Jiwo J#ancuk', 'Sujiwo Tejo', 10, '75000.00', 10, 20, 'N', '2017-01-23', '96jjanck.jpg', '', 'Y'),
(44, 0, 'Jokowi - spirit bantaran kali anyar', 'Domu D Ambarita', 9, '110000.00', 0, 20, 'N', '2017-01-23', '57jkw.jpg', '', 'Y'),
(45, 0, 'Secangkir Kopi Jon Pakir', 'Emha Ainun Najib', 6, '59000.00', 15, 20, 'N', '2017-01-23', '57jonpakir.jpg', '', 'Y'),
(46, 0, 'Kagum Kepada Orang Indonesia', 'Emha Ainun Najib', 10, '60000.00', 10, 20, 'N', '2017-01-23', '38kkoi.jpg', '', 'Y'),
(47, 0, 'Laskar Pelangi ', 'Andrea Hirata', 1, '85000.00', 15, -3, 'Y', '2017-01-23', '37laskarp.jpg', '', 'Y'),
(48, 0, 'Lupa Endo Nesa', 'Sujiwo Tejo', 10, '80000.00', 15, 20, 'N', '2017-01-23', '2lupaindonesa.jpg', '', 'Y'),
(49, 0, 'Mati Ketawa ala Refotnasi', 'Emha Ainun Najib', 10, '95000.00', 25, 20, 'N', '2017-01-23', '63mkar.jpg', '', 'Y'),
(50, 0, 'Markesot Bertutur', 'Emha Ainun Najib', 6, '100000.00', 10, 20, 'N', '2017-01-23', '30mbertutur.jpg', '', 'Y'),
(51, 0, 'Markesot Bertutur Lagi', 'Emha Ainun Najib', 6, '120000.00', 15, 20, 'N', '2017-01-23', '20mbertuturlagi.jpg', '', 'Y'),
(52, 0, 'Edensor', 'Andrea Hirata', 1, '125000.00', 15, 20, 'Y', '2017-01-23', '23edensor.jpg', '', 'Y'),
(53, 0, 'Maryamah Karpov - mimpi mimpi lintang', 'Andrea Hirata', 1, '150000.00', 10, 20, 'Y', '2017-01-23', '54mkarpov.jpg', '', 'Y'),
(54, 0, 'Orang Maiyah', 'Emha Ainun Najib', 6, '68000.00', 5, 20, 'N', '2017-01-23', '60orangmaiyah.jpg', '', 'Y'),
(55, 0, 'Padang Bulan - novel pertama dwilogi padang bulan', 'Andrea Hirata', 1, '80000.00', 10, 20, 'Y', '2017-01-23', '54padangbulan.jpg', '', 'Y'),
(56, 0, 'Panduan Super Lengkap Sholat Wajib dan Sunah', 'Ali Imran', 6, '55000.00', 15, 20, 'N', '2017-01-23', '15pslswds.jpg', '', 'Y'),
(57, 0, 'Rahvayana - aku lala padamu', 'Sujiwo Tejo', 10, '87000.00', 15, 20, 'N', '2017-01-23', '29ralp.jpg', '', 'Y'),
(58, 0, 'Rahvayana - ada yang tiada', 'Sujiwo Tejo', 10, '90000.00', 15, 20, 'N', '2017-01-23', '82rayt.jpg', '', 'Y'),
(59, 0, 'Sang Pemimpi - buku kedua dari tetralogi laskar pelangi', 'Andrea Hirata', 1, '85000.00', 15, 20, 'Y', '2017-01-23', '80sangpmimpi.jpg', '', 'Y'),
(60, 0, 'Surat Kepada Kanjeng Nabi', 'Emha Ainun Najib', 6, '90000.00', 15, 20, 'Y', '2017-01-23', '21skkn.jpg', '', 'Y'),
(61, 0, 'Sililit Sang Kiai', 'Emha Ainun Najib', 6, '90000.00', 15, 20, 'N', '2017-01-23', '77ssk.jpg', '', 'Y'),
(64, 0, 'Tuhan Maha Asyik', 'Sujiwo Tejo dan Dr MN Kamba', 6, '77000.00', 20, 20, 'N', '2017-01-23', '6tma.jpg', '', 'Y'),
(65, 0, 'Tuhan Pun Berpuasa', 'Emha Ainun Najib', 6, '79000.00', 25, 20, 'N', '2017-01-23', '59tpb.jpg', '', 'Y'),
(67, 0, 'Saat-saat Terakhir Bersama Soeharto', 'Emha Ainun Nadjib', 10, '87000.00', 18, 20, 'N', '2017-02-13', '38sstbs.jpg', '', 'Y'),
(68, 0, 'Cinta 1/2 Monyet', 'Putra Alam', 1, '45000.00', 5, 20, 'N', '2017-02-13', '53csm.jpg', '', 'Y'),
(69, 0, 'Serat Tripama Gugur Cinta di Maespati', 'Sujiwo Tejo', 10, '89750.00', 15, 20, 'N', '2017-02-13', '48stgcdm.jpg', '', 'Y'),
(70, 0, 'Arus Bawah', 'Emha Ainun Nadjib', 10, '135000.00', 10, 20, 'Y', '2017-02-13', '96arusbawah.jpg', '', 'Y'),
(71, 0, 'Lima cm', 'Donny Dhirgantoro', 1, '100000.00', 10, 20, 'Y', '2017-02-17', '285cm.jpg', '', 'Y'),
(72, 0, 'Sembilan Puluh Sembilan Kisah Luar Biasa Menuai Hikmah dari Asmaul Husna', 'Ary Nilandari, Nita Chandra', 6, '56000.00', 5, 20, 'N', '2017-02-17', '1599klb.jpg', '', 'Y'),
(73, 0, 'Ayat-Ayat Cinta', 'Habiburrahman El Shirazy', 1, '89000.00', 15, 20, 'Y', '2017-02-17', '57aac.jpg', '', 'Y'),
(74, 0, 'Ada Apa dengan Cinta?', 'Silvarani', 1, '80000.00', 10, 20, 'N', '2017-02-17', '57aadc.jpg', '', 'Y'),
(75, 0, 'Anak-Anak Pengukir Peradaban', 'Dian Novianty', 11, '60.00', 10, 20, 'N', '2017-02-17', '85aakpp.jpg', '', 'Y'),
(76, 0, 'Aidit, Dua Wajah Dipa Nusantara', 'Elex Media Komputindo', 3, '65000.00', 15, 20, 'N', '2017-02-17', '82aidit.jpg', '', 'Y'),
(77, 0, 'Akar', 'DEE Dewi Lestari', 1, '90000.00', 20, 20, 'Y', '2017-02-17', '70akar.jpg', '', 'Y'),
(78, 0, 'Sebuah Biografi Andy Noya Kisah Hidupku', 'Andy F Noya', 3, '55000.00', 15, 20, 'N', '2017-02-17', '56andynoya.jpg', '', 'Y'),
(79, 0, 'Anak Semua Bangsa', 'Pramoedya Anata Toer', 1, '108000.00', 5, 20, 'Y', '2017-02-17', '88asb.jpg', '', 'Y'),
(80, 0, 'Ayah', 'Andrea Hirata', 1, '70000.00', 10, 20, 'N', '2017-02-17', '33ayah.jpg', '', 'Y'),
(81, 0, 'Beauty and The Beast', 'Madame de Villeneuve', 1, '80000.00', 5, 20, 'N', '2017-02-17', '24batb.jpg', '', 'Y'),
(82, 0, 'Bengkel Buya', 'Ahmad Syafii Maarif', 6, '45000.00', 15, 20, 'N', '2017-02-17', '67bbuya.jpg', '', 'Y'),
(83, 0, 'Buku Cerdas Kurikulum 2013 SMP', 'Siti Nurhayati', 11, '35000.00', 15, 20, 'N', '2017-02-17', '95bck13.jpg', '', 'Y'),
(84, 0, 'Bisnis di Usia Belia Why Not ?', 'Asnando Danu', 12, '35000.00', 10, 20, 'N', '2017-02-17', '32bdubwn.jpg', '', 'Y'),
(85, 0, 'Belajar Goblok dari Bob Sadino', 'Dodi Mawadi', 9, '69000.00', 15, 20, 'N', '2017-02-17', '33bgdbs.jpg', '', 'Y'),
(86, 0, 'The Road Ahead', 'Bill Gates', 3, '70000.00', 25, 20, 'N', '2017-02-17', '43bgtra.jpg', '', 'Y'),
(87, 0, 'Dilan - bagian kedua dia adalah Dilanku Tahun 1991', 'Didi Baiq', 1, '89000.00', 20, 20, 'Y', '2017-02-17', '8blimadilan.jpg', '', 'Y'),
(88, 0, 'Bumi Manusia', 'Pramoedya Anata Toer', 1, '90000.00', 10, 20, 'Y', '2017-02-17', '3bmanusia.jpg', '', 'Y'),
(89, 0, 'Buku Mini IPA SMP VII,VIII, IX', 'Yuni Puspita', 11, '45000.00', 5, 20, 'N', '2017-02-17', '74bmipa.jpg', '', 'Y'),
(90, 0, 'Buku Pintar Rangkuman Trik IPA SMP kelas 1,2,3', 'Ika Styeni', 11, '50000.00', 20, 20, 'N', '2017-02-17', '15bprtipa.jpg', '', 'Y'),
(92, 0, 'Buku Saku Rahasia Keberkahan', 'Taufik Ali Zabady', 6, '50000.00', 30, 20, 'N', '2017-02-17', '95bsrk.jpg', '', 'Y'),
(93, 0, 'Lima cm comic', 'Donny Dhirgantoro, Is Yuniarto', 12, '30000.00', 10, 20, 'N', '2017-02-17', '65c5cm.jpg', '', 'Y'),
(94, 0, 'Bleach - Beauty is so Solitary eps.37', 'Tite Kubo', 12, '25.00', 5, 20, 'N', '2017-02-17', '6cbleach.jpg', '', 'Y'),
(95, 0, 'Kecil-Kecil Punya Karya', 'Karaya Paramesti', 12, '50000.00', 10, 20, 'N', '2017-02-17', '25ccc.jpg', '', 'Y'),
(96, 0, 'Cerita Cerpen Indonesia - 45 cerita cerpen terpilih', 'gramedia', 12, '78000.00', 15, 20, 'N', '2017-02-17', '17cci.jpg', '', 'Y'),
(97, 0, 'Cinderella In Paris', 'Sari Musdar', 12, '65000.00', 10, 20, 'N', '2017-02-17', '99ccinderellaip.jpg', '', 'Y'),
(98, 0, 'Civil War II - Choosing Sides', 'Marvel Comics', 12, '100000.00', 20, 20, 'N', '2017-02-17', '37ccivilwar2.jpg', '', 'Y'),
(99, 0, 'Crayon Shinchan', 'Anime Comics', 12, '20000.00', 10, 20, 'N', '2017-02-17', '28ccsep.jpg', '', 'Y'),
(100, 0, 'Cat Stories - Kisah kisah kucing', 'James Herriot', 12, '40000.00', 10, 20, 'N', '2017-02-17', '67ccskkk.jpg', '', 'Y'),
(101, 0, 'Cinta Tak Pernah Sama', 'Dista Dee', 1, '55000.00', 15, 20, 'N', '2017-02-17', '3cctps.jpg', '', 'Y'),
(102, 0, 'Deadpool', 'Marvel Comics', 12, '70000.00', 20, 20, 'N', '2017-02-17', '53cdeadpool.jpg', '', 'Y'),
(103, 0, 'CorelDraw Graphics Suite X5', 'Corel Corp', 4, '230000.00', 10, 20, 'N', '2017-02-17', '78cdgsx5.jpg', '', 'Y'),
(104, 0, 'Doraemon - Petualangan Nobita di Dunia Mainan', 'Elex Media Komputindo', 12, '30000.00', 30, 20, 'N', '2017-02-17', '31cdpnddm.jpg', '', 'Y'),
(105, 0, 'Cinta di Ujung Sajadah', 'Asma Nadia', 1, '50000.00', 10, 20, 'N', '2017-02-17', '85cdus.jpg', '', 'Y'),
(106, 0, 'Fabel Anak Shaleh', 'Dian K & Aan W', 12, '75000.00', 15, 20, 'N', '2017-02-17', '74cfas.jpg', '', 'Y'),
(107, 0, 'Garuda', 'Oyasujiwo', 12, '60000.00', 15, 20, 'N', '2017-02-17', '76cgaruda.jpg', '', 'Y'),
(108, 0, 'Hiking Girls - Petualangan cewek-cewek Korea di Cina', 'Kim Hye Jung', 12, '32000.00', 15, 20, 'N', '2017-02-17', '72chg.jpg', '', 'Y'),
(109, 0, 'Cinta.', 'Bernard Batubara', 1, '70000.00', 20, 20, 'N', '2017-02-17', '86cinta.jpg', '', 'Y'),
(110, 0, 'Jika Aku Muslimah', 'Fivi Achmad', 12, '45000.00', 10, 20, 'N', '2017-02-17', '51cjam.jpg', '', 'Y'),
(111, 0, 'Klub Bermain Bahasa Indonesia', 'Rendi Ramliyana', 12, '58900.00', 10, 20, 'N', '2017-02-17', '44ckbbi.jpg', '', 'Y'),
(112, 0, 'Komik Cerita Rakyat Indonesia', 'Dian K & Tethy Ezokanzo', 12, '80000.00', 35, 20, 'N', '2017-02-17', '74ckcri.jpg', '', 'Y'),
(113, 0, 'Komik Muslimah', 'Dhiba Ainisa Umarbhanies', 12, '20000.00', 20, 20, 'N', '2017-02-17', '95ckm.jpg', '', 'Y'),
(114, 0, 'Krowel', 'Dimaz Sadewa', 12, '47000.00', 15, 20, 'N', '2017-02-17', '64ckrowel.jpg', '', 'Y'),
(115, 0, 'Hulk - Battels The Humans', 'Marvel Comics', 12, '32000.00', 20, 20, 'N', '2017-02-17', '84cksshulk.jpg', '', 'Y'),
(116, 0, 'Lupus Return', 'Hilman', 12, '25000.00', 15, 20, 'N', '2017-02-17', '76clupus.jpg', '', 'Y'),
(117, 0, 'Marvel 75 Years', 'Marvel Comics', 12, '65000.00', 15, 20, 'N', '2017-02-17', '97cmarvel.jpg', '', 'Y'),
(118, 0, 'Mattie Spyglass and The Magic Stones', 'Shoba Shreenivasan', 12, '80000.00', 10, 20, 'N', '2017-02-17', '74cmsatems.jpg', '', 'Y'),
(119, 0, 'Naruto', 'Jump Comics', 12, '20000.00', 10, 20, 'N', '2017-02-17', '48cnar.jpg', '', 'Y'),
(120, 0, 'Naruto', 'Jump Comics', 12, '21000.00', 10, 20, 'N', '2017-02-17', '11cnar1.jpg', '', 'Y'),
(121, 0, 'Naruto', 'Jump Comics', 12, '22000.00', 10, 20, 'N', '2017-02-17', '41cnaruto.jpg', '', 'Y'),
(122, 0, 'Pengen Jadi Baik', 'Zahira', 12, '23000.00', 15, 20, 'N', '2017-02-17', '91cpjb.jpg', '', 'Y'),
(123, 0, 'Si Juki Komik Strip', 'Jukihoki', 12, '30000.00', 10, 20, 'N', '2017-02-17', '56csjukiks.jpg', '', 'Y'),
(124, 0, 'Si Juki - Lika-Liku Anak Kos', 'Faza Meonk', 12, '32000.00', 10, 20, 'N', '2017-02-17', '62csjukillak.jpg', '', 'Y'),
(125, 0, 'Superman Wonder Woman Truth', 'DC Comics', 12, '45000.00', 5, 20, 'N', '2017-02-17', '21csww.jpg', '', 'Y'),
(126, 0, 'Chairul Tanjung Si Anak Singkong', 'Thaja Gunawan Diredja', 3, '90000.00', 15, 20, 'N', '2017-02-17', '75ctsas.jpg', '', 'Y'),
(127, 0, 'David and Goliath', 'Malcolm Gladwell', 8, '75000.00', 15, 20, 'Y', '2017-02-17', '82dag.jpg', '', 'Y'),
(128, 0, 'Dunia Anna - sebuah novel filsafat semesta', 'Jostein Gaarder', 1, '98000.00', 20, 20, 'N', '2017-02-17', '67danna.jpg', '', 'Y'),
(129, 0, 'Dunia Fauna Ikan', 'Tedi SIswoko', 11, '28000.00', 20, 20, 'N', '2017-02-17', '34dfikan.jpg', '', 'Y'),
(130, 0, 'Dunia Fauna Mamalia', 'Tedi SIswoko', 11, '24000.00', 10, 20, 'N', '2017-02-17', '46dfmamaliabm.jpg', '', 'Y'),
(131, 0, 'Dear Friend with Love', 'Nurilla Iryani', 1, '45000.00', 16, 20, 'N', '2017-02-17', '8dfwl.jpg', '', 'Y'),
(132, 0, 'Dalam Sebuah Kloset', 'Neny Makmun', 1, '55000.00', 15, 20, 'N', '2017-02-17', '30dsk.jpg', '', 'Y'),
(133, 0, 'Dilan - sesi kedua', 'Didi Baiq', 1, '87000.00', 23, 20, 'N', '2017-02-17', '28dskdad.jpg', '', 'Y'),
(134, 0, 'Dear You', 'Moammar Emka', 1, '48900.00', 10, 20, 'N', '2017-02-17', '22dyou.jpg', '', 'Y'),
(135, 0, 'Filsafat Islam', 'Sudarso', 6, '56000.00', 26, 20, 'N', '2017-02-17', '4fislam.jpg', '', 'Y'),
(136, 0, 'Fikih Kebinekaan', 'Mizan', 8, '47000.00', 15, 20, 'N', '2017-02-17', '66fkebinekaan.jpg', '', 'Y'),
(137, 0, 'Filosofi Kopi', 'DEE Dewi Lestari', 1, '67000.00', 18, 20, 'Y', '2017-02-17', '30fkopi.jpg', '', 'Y'),
(138, 0, 'Fakta Mengejutkan Majapahit Kerajaan Islam', 'Herman Sinung Janutama', 8, '63000.00', 13, 20, 'N', '2017-02-17', '87fmmki.jpg', '', 'Y'),
(139, 0, 'Gajah Mada', 'Langit Kresna Hariadi', 8, '64000.00', 5, 20, 'N', '2017-02-17', '2gmtda.jpg', '', 'Y'),
(140, 0, 'Gadis Panjai', 'Pramoedya Anata Toer', 1, '79000.00', 20, 20, 'Y', '2017-02-17', '9gpantai.jpg', '', 'Y'),
(141, 0, 'Galau Pasti Berlalu', 'Nadia Waw', 9, '49000.00', 15, -5, 'N', '2017-02-17', '42gpb.jpg', '', 'Y'),
(142, 0, 'Hatiku Berhenti di Kamu', 'Ekaa Y Saleem', 1, '53000.00', 15, 20, 'Y', '2017-02-17', '44hbdk.jpg', '', 'Y'),
(143, 0, 'Hujan', 'Tere Liye', 1, '51000.00', 17, 20, 'Y', '2017-02-17', '64hujan.jpg', '', 'Y'),
(144, 0, 'Indonesia Bagian dari Desa Saya', 'Emha Ainun Nadjib', 10, '86000.00', 30, 20, 'Y', '2017-02-17', '80ibdds.jpg', '', 'Y'),
(145, 0, 'Iwan Fals', 'Taufik Adi Susilo', 3, '67000.00', 23, 20, 'N', '2017-02-17', '74ifals.jpg', '', 'Y'),
(146, 0, 'Indonesia Mengajar', 'Anies Baswedan', 11, '76000.00', 25, 20, 'N', '2017-02-17', '10imengajar.jpg', '', 'Y'),
(147, 0, 'Jejak Langkah', 'Pramoedya Anata Toer', 1, '57000.00', 5, 20, 'Y', '2017-02-17', '91jlangkah.jpg', '', 'Y'),
(148, 0, 'Kisah 25 Nabiku', 'Tim Gema Insani', 11, '14000.00', 0, 20, 'N', '2017-02-17', '14k25nabiku.jpg', '', 'Y'),
(149, 0, 'Kesadaran Akan Immortalitas Jiwa Sebagai Dasar Etika', 'Agustinus Ryadi', 6, '68000.00', 5, 20, 'N', '2017-02-17', '63kaijsdepfdi.jpg', '', 'Y'),
(151, 0, 'Kreatif atau Mati', 'Yusuf abu Al-Hajaj', 9, '43000.00', 5, 20, 'N', '2017-02-17', '75kam.jpg', '', 'Y'),
(152, 0, 'Kamus Belanda Indonesia', 'Gramedia', 8, '145000.00', 15, 20, 'N', '2017-02-17', '46kbi.jpg', '', 'Y'),
(153, 0, 'Kamus Basa Jawa - Bausastra Jawa', 'Tim Balai Bahasa Yogyakarta', 8, '80000.00', 10, 20, 'N', '2017-02-17', '29kbjbj.jpg', '', 'Y'),
(154, 0, 'Kiai Bejo, Kiai Untung, Kiai Hoki', 'Emha Ainun Nadjib', 6, '69000.00', 15, 20, 'N', '2017-02-17', '51kbkukh.jpg', '', 'Y'),
(155, 0, 'Kamus Gaul Percakapan Bahasa Inggris', 'Yusup Priyasudiarja', 8, '54000.00', 10, 20, 'N', '2017-02-17', '24kgpbi.jpg', '', 'Y'),
(156, 0, 'Kerajaan Islam Demak - api revolusi Islam di tanah Jawa 1518-1549 M', 'Rachmad Abdullah', 3, '109000.00', 9, 0, 'N', '2017-02-17', '92kidemak.jpg', '', 'Y'),
(157, 0, 'Kamus Inggris Indonesia', 'Gramedia', 8, '80000.00', 4, 20, 'N', '2017-02-17', '8kii.jpg', '', 'Y'),
(158, 0, 'kamus Indonesia Jawa ', 'Sutrisno Sastro Utomo', 8, '78000.00', 18, 20, 'N', '2017-02-17', '42kij.jpg', '', 'Y'),
(159, 0, 'Kamus Istilah Keuangan dan Akuntansi', 'Henricus W Ismanthono', 8, '90000.00', 15, 20, 'N', '2017-02-17', '75kikda.jpg', '', 'Y'),
(160, 0, 'Kamus Kajian budaya', 'Chris Barker', 8, '78000.00', 19, 20, 'N', '2017-02-17', '27kkbud.jpg', '', 'Y'),
(161, 0, 'Ku Kejar Cinta ke Negeri Cina', 'Fajar Bustomi', 1, '60000.00', 20, 20, 'N', '2017-02-17', '20kkcknc.jpg', '', 'Y'),
(162, 0, 'Kamus Kebidanan', 'Tutu A Suseno', 8, '89000.00', 10, 20, 'N', '2017-02-17', '40kkebidanan.jpg', '', 'Y'),
(163, 0, 'Kamus - Kata-kata Serapan Asing dalam Bhasa Indonesia', 'J S Badudu', 8, '170000.00', 25, 20, 'N', '2017-02-19', '4kkksadri.jpg', '', 'Y'),
(164, 0, 'Kisah Lainnnya - catatan 2009-2012', 'Ariel Uki Reza Lukman David', 8, '60000.00', 10, 0, 'N', '2017-02-19', '53klainnya.jpg', '', 'Y'),
(165, 0, 'Kamus Lengkap Bahasa Sunda', 'Suryanto Tabrani', 8, '90000.00', 10, 20, 'N', '2017-02-19', '3klbs.jpg', '', 'Y'),
(166, 0, 'Kamus Linguistik - edisi keempat', 'Harimurti Kridalaksana', 8, '120000.00', 12, 0, 'N', '2017-02-19', '53klinguistikek.jpg', '', 'Y'),
(167, 0, 'Koleksi Terlengkap Lagu Wajib Nasional, Daerah dan Anak-Anak', 'Gramedia', 8, '50000.00', 10, 20, 'N', '2017-02-20', '26kllwnddaa.jpg', '', 'Y'),
(168, 0, 'The Sax', 'Sujiwo Tejo', 10, '80000.00', 10, 20, 'N', '2017-02-24', '68tsax.jpg', '', 'Y'),
(169, 0, 'Buku Sakti para Penggemar Web', 'Agus Saputra', 4, '78000.00', 16, 92, 'N', '2017-02-24', '59bsppw.jpg', '', 'Y'),
(170, 0, 'Negeri 5 Menara', 'A Fuadi', 1, '58000.00', 5, 61, 'N', '2017-02-27', '24n5menara.jpg', '', 'Y'),
(171, 0, 'Petir', 'Dewi DEE Lestari', 1, '79000.00', 10, 12, 'N', '2017-03-09', '79petir.jpg', '', 'Y'),
(172, 0, 'Rantau Muara', 'A Fuadi', 1, '80000.00', 5, 31, 'N', '2017-03-09', '74rmuara.jpg', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre_book`
--

CREATE TABLE `genre_book` (
  `id_genre` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre_book`
--

INSERT INTO `genre_book` (`id_genre`, `genre`, `link`, `active`) VALUES
(1, 'Novel', '?buku=novel', 'Y'),
(2, 'All', '?buku=all', 'Y'),
(3, 'Biografi & Sejarah', '?buku=biografi', 'Y'),
(4, 'Komputer', '?buku=comgram', 'Y'),
(5, 'Kamus', '?buku=kamus', 'N'),
(6, 'Islam & Falsafah', '?buku=islamfalsafah', 'Y'),
(7, 'Pengembangan Diri', '?buku=pdiri', 'N'),
(8, 'Umum & Kamus', '?buku=general', 'Y'),
(9, 'Inspirasi & Pengembangan Diri', '?buku=inspirasi', 'Y'),
(10, 'Sosial Budaya', '?buku=sosbud', 'Y'),
(11, 'Edukasi', '?buku=edukasi', 'Y'),
(12, 'Komik-Cergam', '?buku=komik', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(32) NOT NULL,
  `id_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `id_provinsi`) VALUES
(1, 'Malang', 5),
(2, 'Bandung', 4),
(3, 'Semarang', 3),
(4, 'Kediri', 5),
(5, 'Solo', 3),
(6, 'Sumedang', 4),
(7, 'Surabaya', 5),
(8, 'Blitar', 5),
(9, 'Cianjur', 4),
(10, 'Cirebon', 4),
(11, 'Tasikmalaya', 4),
(12, 'Sleman', 6),
(13, 'Gunung Kidul', 6),
(14, 'Lamongan', 5),
(15, 'Gresik', 5),
(16, 'Madura', 5),
(17, 'Magelang', 3),
(18, 'Madiun', 5),
(19, 'Cilacap', 3),
(20, 'Jakarta Pusat', 7),
(21, 'Mojokerto', 5),
(22, 'Pasuruan', 5),
(23, 'Sumenep', 5),
(24, 'Klaten', 3),
(25, 'Boyolali', 3),
(26, 'Yogyakarta', 6);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_session` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `nama`, `jenis_kelamin`, `alamat`, `kode_pos`, `id_kota`, `phone`, `email`, `password`, `id_session`) VALUES
(4, 'alfarizie', 'L', 'Jl.Saturnus No.87 Antapani Kidul', 40291, 24, '087656545431', 'alfarizie@mail.com', 'dcb76da384ae3028d6aa9b2ebcea01c9', 'od94m4dvdhau594476otfb70d6'),
(5, 'Cowboy Junior', 'L', 'jalan komet no.12', 11261, 20, '085720246108', 'cjr87@gmail.com', '7a63ed7b26488d78359db85ce81f2e13', 'ct8nfnq0d48rpvk9vg55dc1hu3'),
(7, 'Fitri S', 'P', 'Jl.Sariwates Indah Timur No.5', 14015, 12, '08765654542', 'fitri87@gmail.com', 'f51627a173df94ab8cf7e2a3c16f67a8', '5ipe0bver43efnjk2o8codsoui'),
(8, 'Agung', 'L', 'jl.ciliwung4', 40191, 2, '6283242934823', 'agung@gmail.com', '202cb962ac59075b964b07152d234b70', 'bnp6135qopeotmd0emj5job828'),
(9, 'mam12344', 'L', 'jl.pasir luhur No.12', 12313, 12, '086075645466', 'mama@gmail.com', 'e8df8ade93a5d45e3ef3a121a11d4bba', 't06df3e62j3he21q1dbv1008e0');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(2) NOT NULL,
  `nama_modul` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `urutan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `icon`, `urutan`) VALUES
(1, 'Module Management', '?module=modul', 'page-copy', 2),
(2, 'User Management', '?module=user', 'torsos', 3),
(3, 'Books Management', '?module=books', 'book', 4),
(4, 'Dashboard', '?module=dash', 'home', 1),
(8, 'Genre Management', '?module=genre', 'link', 5),
(9, 'Provinsi & Kota', '?module=letak', 'map', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `member_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nama_kota` varchar(32) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `tanggal` date NOT NULL,
  `status` char(1) NOT NULL,
  `ekspedisi` varchar(50) NOT NULL,
  `akali` int(11) NOT NULL,
  `no_resi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `no_faktur`, `member_id`, `nama`, `alamat`, `nama_kota`, `kode_pos`, `phone`, `book_id`, `qty`, `subtotal`, `tanggal`, `status`, `ekspedisi`, `akali`, `no_resi`) VALUES
(26, 'kukt645jaoog', 7, 'Fitri S', 'Jl.Sariwates Indah Timur No.5', 'Sleman, Yogyakarta', 14015, '08765654542', 35, 2, 117000, '2017-02-27', '3', 'JNE', 843630828, ''),
(27, 'kukt645jaoog', 7, 'Fitri S', 'Jl.Sariwates Indah Timur No.5', 'Sleman, Yogyakarta', 14015, '08765654542', 47, 1, 72250, '2017-02-27', '3', 'JNE', 843630828, ''),
(28, 'ik0v7387oi1m', 8, 'Agung', 'jl.ciliwung4', 'Bandung, Jawa Barat', 40191, '6283242934823', 35, 3, 175500, '2017-03-02', '2', 'JNE', 800188784, ''),
(29, 'ik0v7387oi1m', 8, 'Agung', 'jl.ciliwung4', 'Bandung, Jawa Barat', 40191, '6283242934823', 47, 1, 72250, '2017-03-02', '2', 'JNE', 800188784, ''),
(30, 'angsr3m5j9lj', 9, 'mam12344', 'jl.pasir luhur No.12', 'Mojokerto, Jawa Timur', 12313, '086075645466', 170, 3, 165300, '2017-03-09', '2', 'JNE', 132632659, ''),
(31, 'angsr3m5j9lj', 9, 'mam12344', 'jl.pasir luhur No.12', 'Mojokerto, Jawa Timur', 12313, '086075645466', 169, 1, 65520, '2017-03-09', '2', 'JNE', 132632659, ''),
(32, 'angsr3m5j9lj', 9, 'mam12344', 'jl.pasir luhur No.12', 'Mojokerto, Jawa Timur', 12313, '086075645466', 47, 1, 72250, '2017-03-09', '2', 'JNE', 132632659, ''),
(33, '5ipe0bver43e', 7, 'Fitri S', 'Jl.Sariwates Indah Timur No.5', 'Sleman, Yogyakarta', 14015, '08765654542', 169, 1, 41650, '2017-03-13', '2', 'JNE', 887716957, ''),
(34, '5ipe0bver43e', 7, 'Fitri S', 'Jl.Sariwates Indah Timur No.5', 'Sleman, Yogyakarta', 14015, '08765654542', 170, 3, 165300, '2017-03-13', '2', 'JNE', 887716957, ''),
(35, '5ipe0bver43e', 7, 'Fitri S', 'Jl.Sariwates Indah Timur No.5', 'Sleman, Yogyakarta', 14015, '08765654542', 171, 3, 213300, '2017-03-13', '2', 'JNE', 887716957, ''),
(36, '5ipe0bver43e', 7, 'Fitri S', 'Jl.Sariwates Indah Timur No.5', 'Sleman, Yogyakarta', 14015, '08765654542', 172, 3, 228000, '2017-03-13', '2', 'JNE', 887716957, ''),
(37, '5ipe0bver43e', 7, 'Fitri S', 'Jl.Sariwates Indah Timur No.5', 'Sleman, Yogyakarta', 14015, '08765654542', 172, 3, 228000, '2017-03-13', '2', 'JNE', 887716957, ''),
(38, '5ipe0bver43e', 7, 'Fitri S', 'Jl.Sariwates Indah Timur No.5', 'Sleman, Yogyakarta', 14015, '08765654542', 171, 2, 142200, '2017-03-13', '2', 'JNE', 887716957, '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(3, 'Jawa Tengah'),
(4, 'Jawa Barat'),
(5, 'Jawa Timur'),
(6, 'Yogyakarta'),
(7, 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `address` int(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `description` text NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(36) DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL DEFAULT 'user',
  `id_session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `alamat`, `email`, `level`, `id_session`) VALUES
('Agung', 'e59cd3ce33a68f536c19fedb82a7936f', 'Agung Rizky Maulana', 'Jl.Saturnus No.867', 'agungrizki867@gmail.com', 'admin', ''),
('Kandy', '304f9f0c4895b9d8fa27915316a09ea1', 'Kandy Supriadi', 'Jl.Sukabumi Dalam No.1', 'kandy@gmail.com', 'admin', ''),
('teguh87', 'c49b1a47f97e9212cf7a4533fedc75c8', 'Teguh Siswanto', 'Jl.Sari Wates Indah 4A No.1', 'tsiswanto73@gmail.com', 'admin', 'akd8s8mir0ss1tabmb7j');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `genre_book`
--
ALTER TABLE `genre_book`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `genre_book`
--
ALTER TABLE `genre_book`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre_book` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
