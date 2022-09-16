-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 08:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakarru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_ciri` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama_ciri` text NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_ciri`, `kode`, `nama_ciri`, `bobot`) VALUES
(81, 'G01', 'Batuk yang berkepanjangan', 5),
(82, 'G02', 'Dahak disertai darah', 5),
(83, 'G03', 'Nafsu makan menurun', 1),
(84, 'G04', 'Demam dan menggigil', 3),
(85, 'G05', 'Penurunan berat badan', 1),
(86, 'G06', 'Sesak napas', 3),
(87, 'G07', 'Napas berbunyi', 5),
(88, 'G08', 'Pusing dan sakit tenggorokan', 1),
(89, 'G09', 'Nyeri dada ketika batuk', 3),
(90, 'G10', 'Susah bernapas', 5),
(91, 'G11', 'Dada terasa sesak, nyeri', 3),
(92, 'G12', 'Batuk', 1),
(93, 'G13', 'Batuk kering / berdahak', 5),
(94, 'G14', 'Detak jantung meningkat', 3),
(95, 'G15', 'Bau mulut', 3),
(96, 'G16', 'Berkeringat', 1),
(97, 'G17', 'Batuk berdahak yang berkepanjangan', 3),
(98, 'G18', 'Mudah terkena batuk pilek / ISPA', 3),
(99, 'G19', 'Tubuh terasa lemas / tidak bertenaga', 5),
(100, 'G20', 'Kaki maupun pergelangan kaki membengkak', 3),
(101, 'G21', 'Kulit dan bibir kebiruan', 1),
(102, 'G22', 'Berkeringat di malam hari', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_konsultasi`
--

CREATE TABLE `tb_hasil_konsultasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `hasil` float NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `penyakit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasifikasi`
--

CREATE TABLE `tb_klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `id_penyakit` varchar(5) DEFAULT NULL,
  `id_ciri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_klasifikasi`
--

INSERT INTO `tb_klasifikasi` (`id_klasifikasi`, `id_penyakit`, `id_ciri`) VALUES
(136, 'A01', 81),
(137, 'A01', 82),
(138, 'A01', 83),
(139, 'A01', 84),
(140, 'A01', 85),
(141, 'A01', 86),
(142, 'A01', 87),
(143, 'A01', 102),
(144, 'A02', 87),
(145, 'A02', 88),
(146, 'A02', 86),
(147, 'A02', 84),
(148, 'A02', 89),
(151, 'A03', 92),
(152, 'A04', 86),
(153, 'A04', 93),
(154, 'A04', 84),
(155, 'A04', 83),
(156, 'A04', 94),
(157, 'A04', 95),
(158, 'A04', 96),
(159, 'A04', 89),
(160, 'A05', 86),
(161, 'A05', 97),
(162, 'A05', 85),
(163, 'A05', 98),
(164, 'A05', 99),
(165, 'A05', 100),
(166, 'A05', 101),
(178, 'A02', 81),
(179, 'A02', 82),
(180, 'A02', 86),
(181, 'A02', 87),
(182, 'A02', 88),
(183, 'A02', 89),
(184, 'A02', 90),
(185, 'A02', 91),
(188, 'A03', 83),
(189, 'A03', 86),
(190, 'A03', 87),
(191, 'A03', 88),
(192, 'A03', 89),
(193, 'A03', 90),
(194, 'A03', 91);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`, `solusi`) VALUES
('A01', 'Tuberkulosis (TBC)', 'Mengonsumsi obat sesuai dosis dan anjuran dari  dokter. Jenis obat yang diresepkan untuk mengatasi TBC antara lain rifampicin dan ethambutol'),
('A02', 'Bronkitis', 'Penanganan bronkitis tergantung keparahan dan kondisi pasien. Pada bronkitis akut atau yang tergolong ringan, gejala umumnya mereda dengan sendirinya dalam beberapa minggu. Namun, dokter dapat meresepkan obat untuk meredakan gejala, seperti:\r\n-Obat pereda demam dan nyeri, seperti paracetamol atau ibuprofen\r\n-Obat antitusif atau ekspektoran untuk meredakan batuk, seperti codeine, dextromethorphan, guaifenesin, dan erdosteine\r\n\r\nSedangkan untuk mengatasi bronkitis yang tergolong berat, dokter akan meresepkan obat-obatan lain, berupa:\r\n-Antibiotik, untuk mengobati bronkitis yang disebabkan oleh infeksi bakteri\r\n-Kortikosteroid, untuk meredakan gejala bronkitis yang memburuk dengan cepat, terutama pada bronkitis kronis\r\n-Bronkodilator, untuk mengatasi sesak napas dengan memperlebar pipa saluran pernapasan\r\n\r\nPasien juga dapat melakukan upaya mandiri untuk meredakan gejala. Beberapa cara yang dapat dilakukan adalah:\r\n-Minum air putih 8–12 gelas per hari\r\n-Beristirahat yang cukup\r\n-Menghirup uap air hangat, untuk meredakan batuk dan mengencerkan lendir di saluran pernapasan agar lebih mudah dibuang\r\n-Menghindari asap rokok dan tidak merokok\r\n-Memakai masker saat beraktivitas di luar rumah, untuk menghindari paparan zat berbahaya'),
('A03', 'Asma', 'Menggunakan inhaler sebagai pengobatan saat gejala asma muncul. Apabila terjadi serangan asma dengan gejala yang semakin parah, meskipun sudah melakukan penanganan dengan inhaler maupun obat, maka perlu tindakan medis di rumah sakit.'),
('A04', 'Pneumonia', '-Minum obat pereda rasa sakit, seperti parasetamol atau ibuprofen yang bisa membantu menurunkan demam.\r\n-Jangan mengonsumsi obat batuk.\r\n-Berhenti merokok.'),
('A05', 'Penyakit Paru Obstruktif Kronis (PPOK)', 'Obat yang biasanya digunakan untuk meredakan gejala PPOK adalah obat hirup (inhaler) berupa:\r\n-Bronkodilator, seperti salbutamol, salmeterol dan terbutaline\r\n-Kortikosteroid, seperti fluticasone dan budesonide.\r\nLalu bisa Terapi oksigen, Rehabilitasi paru, Alat bantu napas dan Operasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `umur_pasien` int(3) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `umur_pasien`, `password`, `role`) VALUES
(12, 'admin', 'admin@gmail.com', 0, 'admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_ciri`);

--
-- Indexes for table `tb_hasil_konsultasi`
--
ALTER TABLE `tb_hasil_konsultasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD KEY `id_pertumbuhan` (`id_penyakit`),
  ADD KEY `id_ciri` (`id_ciri`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_ciri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tb_hasil_konsultasi`
--
ALTER TABLE `tb_hasil_konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD CONSTRAINT `a` FOREIGN KEY (`id_ciri`) REFERENCES `tb_gejala` (`id_ciri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `b` FOREIGN KEY (`id_penyakit`) REFERENCES `tb_penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
