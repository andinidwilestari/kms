-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2017 at 04:33 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a`
--

-- --------------------------------------------------------

--
-- Table structure for table `explicit_knowledge`
--

CREATE TABLE IF NOT EXISTS `explicit_knowledge` (
`id_explicit` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `dokumen` varchar(300) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `explicit_knowledge`
--

INSERT INTO `explicit_knowledge` (`id_explicit`, `nip`, `judul`, `kategori`, `keterangan`, `dokumen`, `waktu`, `status`) VALUES
(1, 'admin', 'Ini Bukan Knowledge', 'Unknown', 'Ini bukan knowledge, tapi jangan dihapus. Jika dihapus dapat mengacaukan aplikasi.', 'Ini_Bukan_Knowledge.pdf', '2015-12-30 23:59:59', 'sudah'),
(63, '196410251993032003', 'Fungsi', 'explicit', '<p>Fungsi</p>', 'FUNGSI.pdf', '2017-02-15 07:14:24', 'sudah'),
(64, '196410251993032003', 'Latar Belakang ', 'explicit', '<p>Latar Belakang</p>', 'Latar_Belakang.pdf', '2017-02-15 07:15:01', 'sudah'),
(65, '196410251993032003', 'Pencatatan Pada Register', 'explicit', '<p>Pencatatan Pada Register<br></p>', 'Pencatatan_Pada_Register.pdf', '2017-01-20 07:15:50', 'sudah'),
(66, '197102142003122002', 'Persiapan Persidangan', 'explicit', '<p>Persiapan Persidangan<br></p>', 'Persiapan_Persidangan.pdf', '2017-01-20 07:16:41', 'sudah'),
(67, '197604032014081002', 'RENCANA KINERJA TAHUN 2015 (RKT)', 'explicit', '<p>RENCANA KINERJA TAHUN 2015 (RKT)<br></p>', 'RENCANA_KINERJA_TAHUN_2015_(RKT).pdf', '2016-12-01 07:17:56', 'sudah'),
(68, '197604032014081002', 'Sejarah', 'explicit', '<p>Sejarah</p>', 'Sejarah.pdf', '2016-12-01 07:18:40', 'sudah'),
(69, '197901152011012006', 'Siadpa', 'explicit', '<p>Siadpa</p>', 'SIADPA.pdf', '2016-11-24 07:19:45', 'sudah'),
(70, '197902202006042012', 'Tupokasi Bendahara', 'explicit', '<p>Tupokasi Bendahara<br></p>', 'tupoksi_Bendahara.pdf', '2016-11-24 07:20:37', 'sudah'),
(71, '197902202006042012', 'Tupoksi Hakim', 'explicit', '<p>Tupoksi Hakim</p>', 'Tupoksi_Hakim.pdf', '2016-11-24 07:21:01', 'sudah'),
(72, '197902202006042012', 'Tupokasi Jurusita', 'explicit', '<p>Tupokasi Jurusita</p>', 'tupoksi_Jurusita.pdf', '2016-11-24 07:21:30', 'sudah'),
(73, '197906212009041003', 'Tupoksi Jurusita Pengganti', 'explicit', '<p>Tupoksi Jurusita Pengganti<br></p>', 'tupoksi_Jurusita_Pengganti.pdf', '2016-10-20 07:22:48', 'sudah'),
(74, '197906212009041003', 'tupoksi_kasubag_kepegawaian', 'explicit', '<p>tupoksi_kasubag_kepegawaian<br></p>', 'tupoksi_kasubag_kep.pdf', '2016-10-20 07:23:37', 'sudah'),
(75, '198010162011012007', 'tupoksi_kasubag_keuangan', 'explicit', '<p>tupoksi_kasubag_keuangan<br></p>', 'tupoksi_kasubag_keu.pdf', '2016-11-06 07:24:52', 'sudah'),
(76, '198010162011012007', 'tupoksi_kasubag_umum', 'explicit', '<p>tupoksi_kasubag_umum<br></p>', 'tupoksi_kasubag_umum.pdf', '2016-11-06 07:25:35', 'sudah'),
(77, '198010162011012007', 'Tupoksi Ketua', 'explicit', '<p>Tupoksi Ketua<br></p>', 'Tupoksi_Ketua.pdf', '2016-11-06 07:26:05', 'sudah'),
(78, '198401222014082005', 'Tupoksi Panitera', 'explicit', '<p>Tupoksi Panitera<br></p>', 'Tupoksi_Panitera.pdf', '2016-12-17 07:27:25', 'sudah'),
(79, '198401222014082005', 'Tupoksi Panitera Pengganti', 'explicit', '<p>Tupoksi Panitera Pengganti<br></p>', 'tupoksi_Panitera_Pengganti.pdf', '2016-12-17 07:27:54', 'sudah'),
(80, '198407152009042008', 'Tupoksi Panitera Panitera', 'explicit', '<p>Tupoksi Panitera Panitera<br></p>', 'Tupoksi_PaniteraPanitera.pdf', '2017-01-14 07:28:58', 'sudah'),
(81, '198408062009122006', 'Tupoksi Sekretaris', 'explicit', '<p>Tupoksi Sekretaris<br></p>', 'Tupoksi_Sekretaris.pdf', '2017-01-14 07:30:01', 'sudah'),
(82, '198605112015032001', 'Tupoksi Wakil Ketua', 'explicit', '<p>Tupoksi Wakil Ketua<br></p>', 'Tupoksi_Waka.pdf', '2017-01-14 07:30:51', 'sudah'),
(83, '198605112015032001', 'Tupoksi Wakil Panitera', 'explicit', '<p>Tupoksi Wakil Panitera<br></p>', 'Tupoksi_Waka_Panitera.pdf', '2017-02-11 07:31:39', 'sudah'),
(84, '09031281320016', 'Tupoksi Wakil Sekretaris', 'explicit', '<p>Tupoksi Wakil Sekretaris<br></p>', 'tupoksi_Wakasek.pdf', '2017-02-11 07:32:17', 'sudah'),
(85, '09031281320016', 'Visi Misi', 'explicit', '<p>Visi Misi</p>', 'Visi_Misi.pdf', '2017-02-11 07:32:37', 'sudah'),
(86, '09031281320016', 'Berkas', 'explicit', '<p>berkas1</p>', 'Visi_Misi.pdf', '2017-03-24 08:25:24', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id_komentar` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_tacit` int(10) NOT NULL,
  `id_explicit` int(10) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nip`, `id_tacit`, `id_explicit`, `komentar`, `waktu`) VALUES
(1, '196410251993032003', 2, 1, 'Ada cara lain tidak?', '2017-03-07 21:45:13'),
(2, '197906212009041003', 4, 1, 'Semoga dapat membantu :)', '2017-01-06 23:22:07'),
(3, '09031281320016', 6, 1, 'bisa tolong diperjelas?', '2017-03-24 08:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `nip` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userfile` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`nip`, `password`, `level`, `nama`, `golongan`, `jabatan`, `bagian`, `alamat`, `no_hp`, `email`, `userfile`) VALUES
('09031281320016', 'kms', 'Pegawai Ahli', 'Della Sandani Amroh', 'IV/a (Pembina)', 'Kepala Bidang', 'Komunikasi dan Informatika', 'Jl. Rajawali Blok. S No.295 Baturaja Permai', '085766707701', 'dellasandani@gmail.com', '20161002_133533.jpg'),
('196310081989032003', '003', 'Sekretaris Dinas', 'Dra. Hj. Rosliani, S.H., M.A.', 'IV/c (Pembina Utama Muda)', 'Ketua', 'Pimpinan', 'Kantor Pengadilan Agama Baturaja  ', 'Belum tau', 'Belum tau', 'ketua.jpg'),
('196410251993032003', '32003', 'Pegawai', 'Dra. Sri Wahyuningsih, SH, MHI', 'IV/b (Pembina Tingkat I)', 'Wakil Ketua Pengadilan Agama Baturaja', 'Pimpinan', 'Silakan disunting', 'Silakan disunting', 'Silakan disunting', 'hakim-sri.jpg'),
('197102142003122002', '002', 'Pegawai', 'Damai Liza, S.Ag.', 'III/d (Penata Tingkat I)', 'Sekretaris PA Baturaja', 'Kesekretariatan', 'Silakan disunting', 'Silakan disunting', 'Silakan disunting', 'damai.jpg'),
('197604032014081002', '1002', 'Pegawai', ' Amrin Fitriansyah', 'II/a (Pengatur Muda)', 'Staf Bagian Umum dan Keuangan', 'Kesekretariatan', 'Silakan disunting  ', 'Silakan disunting', 'Silakan disunting', 'amrin.jpg'),
('197901152011012006', '006', 'Pegawai', 'Susi Susanti, SE', 'III/b (Penata Muda Tingkat I)', 'Bendaharawan Pengadilan Agama Baturaja  ', 'Sekretariatan', 'Silakan disunting', 'Silakan disunting', 'Silakan disunting', 'susi.jpg'),
('197902202006042012', '012', 'Pegawai', 'Nuniek Handayani, S.H.', 'III/b (Penata Muda Tingkat I)', 'KaSub Bagian Kepegawaian Pengadilan Agama Baturaja', 'Kepegawaian', 'Silakan disunting', 'Silakan disunting', 'Silakan disunting', 'nuniek.jpg'),
('197906212009041003', '003', 'Pegawai', 'Muhammad Firdaus, S.Kom', 'III/b (Penata Muda Tingkat I)', 'KaSub Bagian Umum dan Keuangan Pengadilan Agama Ba', 'Kesekretariatan', 'Silakan disunting', 'Silakan disunting', 'Silakan disunting', 'POK.jpg'),
('198010162011012007', '007', 'Pegawai', ' Eny Andriany, A. Md.', 'II/d (Pengatur Tingkat I)', 'Staf Panitera Muda Gugatan Pengadilan Agama Batura', 'Kepaniteraan', 'Silakan disunting', 'Silakan disunting', 'Silakan disunting', 'eni.jpg'),
('198401222014082005', '005', 'Pegawai', 'Evi Novriah, A.Md.', 'II/c (Pengatur)', 'Staf Panitera Muda Gugatan Pengadilan Agama Batura', 'Kepaniteraan', 'Silakan disunting', 'Silakan disunting', 'Silakan disunting', 'evi.jpg'),
('198407152009042008', '008', 'Pegawai', 'Endah Rosmala Dewi, A. Md.', 'II/d (Pengatur Tingkat I)', 'Staf Bagian Umum Pengadilan Agama Baturaja', 'Kesekretariatan', 'Silakan disunting', 'Silakan disunting', 'Silakan disunting', 'endah2.jpg'),
('198408062009122006', '006', 'Pegawai', ' R.A. Sundari, S.Kom.', 'III/b (Penata Muda Tingkat I)', 'KaSub Bagian Umum Pengadilan Agama Baturaja', 'Sekretariatan', 'Silakan disunting ', 'Silakan disunting', 'Silakan disunting', 'LLA.jpg'),
('198605112015032001', '001', 'Pegawai', 'Rayi Alfina, A.Md', 'II/c (Pengatur)', 'Staf Bagian Kepegawaian Pengadilan Agama Baturaja', 'Kepegawaian', 'Silakan disunting', 'Silakan disunting', 'Silakan disunting', 'rayi.jpg'),
('admin', 'admin', 'Admin', 'Administrator', 'Admin', 'Pelaksana Tugas', 'Administrator', 'Kantor Pengadilan Agama Baturaja', '085766707701', 'Admin@admin.com', '20161005_075154.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tacit_knowledge`
--

CREATE TABLE IF NOT EXISTS `tacit_knowledge` (
`id_tacit` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `masalah` text NOT NULL,
  `solusi` text NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tacit_knowledge`
--

INSERT INTO `tacit_knowledge` (`id_tacit`, `nip`, `judul`, `kategori`, `masalah`, `solusi`, `waktu`, `status`) VALUES
(1, 'admin', 'Ini bukan Knowledge', 'Unknown', '<p>Tidak ada masalah tertulis disini</p>', '<p>Jangan dihapus</p>', '2015-12-31 22:59:28', 'sudah'),
(2, '196410251993032003', 'Mengatasi Komputer Lelet', 'Tacit', '<p>Mengapa komputer Sering Lelet saat digunakan ?</p>', '<p>1. Klik Kanan My Computer</p><p>2. Klik Manage</p><p>3. Klik Defragmenter</p><p>4. Pilih Drive yang akan di defrag C/D</p><p>5. KlikDefragment</p><p>6. Biarkan Proses defrag sampai selesai menampilkan file anda</p><p>7. Close program</p>', '2017-03-07 21:45:00', 'sudah'),
(3, '09031281320016', 'Mengatasi Komputer Lelet part 2', 'Tacit', '<p>Mengapa komputer kantor sering lelet saat digunakan?</p>', '<p>1. Gunakan cooling pad saat menggunakan laptop (terutama pemakaian lebih dari 2 jam)</p><p>2. Kurangi akses software secara bersamaan</p><p>3. Upgrade memory</p><p>4. Bebaskan file virus dengan upgrade antivirus</p><p>5. Defragment HDD Laptop</p>', '2017-03-07 22:07:09', 'sudah'),
(4, '197906212009041003', 'Mengatasi Komputer Lelet part 3', 'Tacit', '<p>Komputer kantor yang sering lelet</p>', '<p>a. Klik menu start -&gt; program -&gt; accessories -&gt; system tools -&gt; disk defragmenter</p><p>b. pilih drive yag akan di defrag</p><p>c. biarkan proses defrag sampai selesai merapikan file anda</p><p>d. close program</p>', '2017-01-06 23:21:55', 'sudah'),
(5, '197906212009041003', 'Internet Error', 'Tacit', '<p>Mengapa Internet error :</p>', '<p>1. Klik Start kemudian Run -&gt; Ketikkan CMD klik OK</p><p>2. Pada window command prompt ketik ipconfig/release kemuadian tekan enter</p><p>3. Tutup windows command prompt anda</p>', '2017-02-17 23:24:54', 'sudah'),
(6, '09031281320016', 'Cara Mengembalikan File yang terhapus di flashdisk', 'Tacit', '<p>bagaimana mengembalikan file yang terhapus :</p>', '<p>1. Klik program windows Explorer atau dengan tombol windows+E pada keyboard</p><p>2. Pilih drive dimana flashdisk kita berada, misal di drive F:nama_flashdisk, kemudian klik kanan- Pilihh properties</p><p>3. Jika pada tab properties used space nya tidak 0 (nol), berarti file di dalam flashdisk hilang karena virus</p>', '2016-12-01 23:31:28', 'sudah'),
(7, '09031281320016', 'Cara Mengembalikan File yang tersembunyi (Hidden)', 'Tacit', '<p>Cara Mengembalikan File yang tersembunyi (Hidden) :<br></p>', '<p>1. Tekan Windows+E</p><p>2. Klik menu Tab Organize - Pilih Folder and Seacrh Option</p><p>3. Klik Tab View - Klik Show Hidden Files, folders, and drivers - Klik OK</p>', '2016-12-01 23:33:58', 'sudah'),
(8, '09031281320016', 'Kembalikan File ', 'Tacit', '<p>File yang terhapus :</p>', '<p>1. Klik porgram Reycycle bin - Pilih fies/folders yang akan terhapus - Klik restore this item</p><p>2. atau dengan mengklik&nbsp;CTRL+Z</p>', '2016-11-27 23:35:57', 'sudah'),
(9, '196410251993032003', 'skripsi', 'tacit', '<p>ada</p>', '<p>ada</p>', '2017-03-24 08:28:00', 'belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `explicit_knowledge`
--
ALTER TABLE `explicit_knowledge`
 ADD PRIMARY KEY (`id_explicit`), ADD KEY `nip` (`nip`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id_komentar`), ADD KEY `nip` (`nip`), ADD KEY `id_tacit` (`id_tacit`), ADD KEY `id_explicit` (`id_explicit`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tacit_knowledge`
--
ALTER TABLE `tacit_knowledge`
 ADD PRIMARY KEY (`id_tacit`), ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `explicit_knowledge`
--
ALTER TABLE `explicit_knowledge`
MODIFY `id_explicit` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tacit_knowledge`
--
ALTER TABLE `tacit_knowledge`
MODIFY `id_tacit` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `explicit_knowledge`
--
ALTER TABLE `explicit_knowledge`
ADD CONSTRAINT `explicit_knowledge_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pengguna` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_explicit`) REFERENCES `explicit_knowledge` (`id_explicit`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_tacit`) REFERENCES `tacit_knowledge` (`id_tacit`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `pengguna` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tacit_knowledge`
--
ALTER TABLE `tacit_knowledge`
ADD CONSTRAINT `tacit_knowledge_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pengguna` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
