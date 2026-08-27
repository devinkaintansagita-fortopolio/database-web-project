-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 01:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petpal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `nama_admin`) VALUES
('A001', 'dis123', '12345', 'Devinka Intan Sagita');

-- --------------------------------------------------------

--
-- Table structure for table `apotek`
--

CREATE TABLE `apotek` (
  `id_apotek` varchar(50) NOT NULL,
  `nama_apotek` varchar(50) NOT NULL,
  `alamat_apotek` varchar(50) NOT NULL,
  `id_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apotek`
--

INSERT INTO `apotek` (`id_apotek`, `nama_apotek`, `alamat_apotek`, `id_kota`) VALUES
('A01', 'Efha Petshop', 'Efha Petshop', 'KK17'),
('A02', 'Toko Obat Kurasa Serasi', 'Toko Obat Kurasa Serasi', 'KK17'),
('A03', 'K-24 Dempo Luar', 'Jalan Dempo Luar', 'KK17'),
('A04', 'Yosella Pet Shop', 'Jalan Radial No. 24', 'KK17'),
('A05', 'Gupo Petshop', 'Jalan MP. Mangkunegara', 'KK17'),
('A06', 'Petshop ', 'Jalan Pahlawan No. 06', 'KK18');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `username_dokter` varchar(50) NOT NULL,
  `password_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `asal_instansi_dokter` varchar(50) NOT NULL,
  `tarif_dokter` varchar(50) NOT NULL,
  `foto_dokter` varchar(50) NOT NULL,
  `id_spesialis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `username_dokter`, `password_dokter`, `nama_dokter`, `asal_instansi_dokter`, `tarif_dokter`, `foto_dokter`, `id_spesialis`) VALUES
('D001', 'yumna123', '12345', 'Yumna Maharani', 'Klinik Intan Cahyani', '30000', 'woman1.png', '28S'),
('D002', 'budi123', '12345', 'Budi Sutrisno', 'Animal Center', '45000', 'man1.png', '23S'),
('D003', 'utura123', '12345', 'Senjani Ammaleya', 'Dokter Hewan Prabumulih', '40000', 'woman2.png', '03S'),
('D004', 'wiro09', '12345', 'Wiro Nugrogo', 'Klinik Bahagia', '30000', 'man2.png', '19S'),
('D005', 'karina_', '12345', 'Karina Amanda', 'Klinik Citra Medika', '35000', 'woman3.png', '02S'),
('D006', 'poppy123', '12345', 'Poni Thrisia', 'Animal Center', '45000', 'woman4.png', '06S'),
('D007', 'young123', '12345', 'Yohan Anggara', 'Rumah Sakit Hewan Sejahtera', '40000', 'man3.png', '21S'),
('D008', 'prtma', '12345', 'Pratama', 'Pet Grow Health', '50000', 'man4.png', '04S');

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE `hewan` (
  `id_hewan` varchar(50) NOT NULL,
  `nama_hewan` varchar(50) NOT NULL,
  `umur_hewan` varchar(50) NOT NULL,
  `ras_hewan` varchar(50) NOT NULL,
  `jenis_hewan` varchar(50) NOT NULL,
  `id_pengguna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`id_hewan`, `nama_hewan`, `umur_hewan`, `ras_hewan`, `jenis_hewan`, `id_pengguna`) VALUES
('H01', 'Kimmy', '5', 'Anggora', 'Kucing', 'P001'),
('H02', 'Bingbong', '2', 'Tutul', 'Anjing', 'P001'),
('H03', 'Haccy', '2', 'Himalayan', 'Kelinci', 'P002'),
('H05', 'Jay', '2', 'Angus', 'Sapi', 'P004');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar_konsul`
--

CREATE TABLE `jenis_bayar_konsul` (
  `id_jenis_bayar_konsul` varchar(50) NOT NULL,
  `ket_jenis_bayar_konsul` varchar(50) NOT NULL,
  `id_metode_bayar_konsul` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_bayar_konsul`
--

INSERT INTO `jenis_bayar_konsul` (`id_jenis_bayar_konsul`, `ket_jenis_bayar_konsul`, `id_metode_bayar_konsul`, `tujuan`) VALUES
('JBK01', 'OVO', 'MBK01', '088276372919'),
('JBK02', 'Mandiri', 'MBK02', '1164887629082'),
('JBK03', 'DANA', 'MBK01', '088276372919'),
('JBK04', 'GoPay', 'MBK01', '89088276372919'),
('JBK05', 'LinkAja', 'MBK01', '0911088276372919'),
('JBK06', 'Shopeepay', 'MBK01', '088276372919'),
('JBK07', 'BRI', 'MBK02', '0166-01-251104-55-9'),
('JBK08', 'BCA', 'MBK02', '0011555510'),
('JBK09', 'BNI', 'MBK02', '9901237688'),
('JBK10', 'Sumsel Babel', 'MBK02', '8876099182');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar_obat`
--

CREATE TABLE `jenis_bayar_obat` (
  `id_jenis_bayar_obat` varchar(50) NOT NULL,
  `nama_jenis_bayar_obat` varchar(50) NOT NULL,
  `id_metode_bayar_obat` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_bayar_obat`
--

INSERT INTO `jenis_bayar_obat` (`id_jenis_bayar_obat`, `nama_jenis_bayar_obat`, `id_metode_bayar_obat`, `tujuan`) VALUES
('JBO01', 'OVO', 'MBO01', '088276372919'),
('JBO02', 'DANA', 'MBO01', '088276372919'),
('JBO03', 'GoPay', 'MBO01', '89088276372919'),
('JBO04', 'LinkAja', 'MBO01', '091108276372919'),
('JBO05', 'Shopeepay', 'MBO01', '088276372919'),
('JBO06', 'Mandiri', 'MBO02', '111-33-1234567-8'),
('JBO07', 'BRI', 'MBO02', '0166-01-251104-55-9'),
('JBO08', 'BCA', 'MBO02', ' 0011555510'),
('JBO09', 'BNI', 'MBO02', '9901237688'),
('JBO10', 'Sumsel Babel', 'MBO02', '8876099182');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id_jenis_obat` varchar(50) NOT NULL,
  `nama_jenis_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id_jenis_obat`, `nama_jenis_obat`) VALUES
('JO01', 'Obat Pengendalian Nyeri'),
('JO02', 'Obat Antibiotik'),
('JO03', 'Obat Antiparasit'),
('JO04', 'Obat Antiinflamasi'),
('JO05', 'Obat Diuretik'),
('JO06', 'Obat Analgesik dan Antipirek'),
('JO07', 'Obat Glukokortikoid'),
('JO08', 'Obat Glikosa Jantung'),
('JO09', 'Vitamin'),
('JO10', 'Obat Antihistamin'),
('JO11', 'Obat Antiglaukoma'),
('JO12', 'Sumplemen Nutrisi');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_penyakit`
--

CREATE TABLE `jenis_penyakit` (
  `id_jenis_penyakit` varchar(50) NOT NULL,
  `nama_jenis_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_penyakit`
--

INSERT INTO `jenis_penyakit` (`id_jenis_penyakit`, `nama_jenis_penyakit`) VALUES
('JP01', 'Infeksi Virus'),
('JP02', 'Infeksi Bakteri'),
('JP03', 'Infestasi Cacing'),
('JP04', 'Penyakit Autoimun'),
('JP05', 'Infeksi Parasit'),
('JP06', 'Penyakit Kulit'),
('JP07', 'Alergi'),
('JP08', 'Penyakit Jantung'),
('JP09', 'Penyakit Ortopedi'),
('JS10', 'Penyakit Ginjal'),
('JS11', 'Penyakit Diabetes'),
('JS12', 'Penyakit Reproduksi'),
('JS13', 'Penyakit Pernafasan'),
('JS14', 'Penyakit Mata'),
('JS15', 'Infeksi Jamur'),
('JS16', 'Penyakit Hati');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_spesialis`
--

CREATE TABLE `jenis_spesialis` (
  `id_jenis_spesialis` varchar(50) NOT NULL,
  `nama_jenis_spesialis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_spesialis`
--

INSERT INTO `jenis_spesialis` (`id_jenis_spesialis`, `nama_jenis_spesialis`) VALUES
('JS01', 'Spesialis Penyakit Menular'),
('JS02', 'Spesialis Dermatologi'),
('JS03', 'Spesialis Kardiologi'),
('JS04', 'Spesialis Ortopedi'),
('JS05', 'Spesialis Nefrologi'),
('JS06', 'Spesialis Endokrinologi'),
('JS07', 'Spesialis Reproduksi'),
('JS08', 'Spesialis Pernafasan'),
('JS09', 'Spesialis Oftalmologi'),
('JS10', 'Spesialis Onkologi'),
('JS11', 'Spesialis Neurologi'),
('JS12', 'Spesialis Avian (Hewan Burung)'),
('JS13', 'Spesialis Hewan Eksotik'),
('JS14', 'Spesialis Hewan Kecil'),
('JS15', 'Umum'),
('JS16', 'Spesialis Nutrisi');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(50) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `id_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `id_kota`) VALUES
('Kec01', 'Alang-Alang Lebar', 'KK17'),
('Kec02', 'Bukit Kecil', 'KK17'),
('Kec03', 'Gandus', 'KK16'),
('Kec04', 'Ilir Barat I', 'KK17'),
('Kec05', 'Ilir Barat II', 'KK17'),
('Kec06', 'Ilir Timur I', 'KK17'),
('Kec07', 'Ilir Timur II', 'KK17'),
('Kec08', 'Ilir Timur III', 'KK17'),
('Kec09', 'Jakabaring', 'KK17'),
('Kec10', 'Kalidoni', 'KK17'),
('Kec11', 'Kemuning', 'KK17'),
('Kec12', 'Kertapati', 'KK17'),
('Kec13', 'Plaju', 'KK17'),
('Kec14', 'Sako', 'KK17'),
('Kec15', 'Seberang ulu I', 'KK17'),
('Kec16', 'Seberang ulu II', 'KK17'),
('Kec17', 'Sematang Borang', 'KK17'),
('Kec18', 'Sukarami', 'KK17');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` varchar(50) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  `id_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `nama_kelurahan`, `id_kecamatan`) VALUES
('Kel01', 'Alang-Alang Lebar', 'Kec01'),
('Kel02', 'Karya Baru', 'Kec01'),
('Kel03', 'Srijaya', 'Kec01'),
('Kel04', 'Talang Kelapa', 'Kec01'),
('Kel05', '19 Ilir', 'Kec02'),
('Kel06', '22 Ilir', 'Kec02'),
('Kel07', '23 Ilir', 'Kec02'),
('Kel08', '24 Ilir', 'Kec02'),
('Kel09', '26 Ilir', 'Kec02'),
('Kel10', 'Talang Semut', 'Kec02'),
('Kel100', 'Sukamulya', 'Kec17'),
('Kel101', 'Kebun Bunga', 'Kec18'),
('Kel102', 'Sukabangun', 'Kec18'),
('Kel103', 'Sukajaya', 'Kec18'),
('Kel104', 'Sukarami', 'Kec18'),
('Kel105', 'Sukodadi', 'Kec18'),
('Kel106', 'Talang Betutu', 'Kec18'),
('Kel107', 'Talang Jambe', 'Kec18'),
('Kel11', '36 Ilir', 'Kec03'),
('Kel12', 'Gandus', 'Kec03'),
('Kel13', 'Karang Anyar', 'Kec03'),
('Kel14', 'Karang Jaya', 'Kec03'),
('Kel15', 'Pulo Kerto', 'Kec03'),
('Kel16', '26 Ilir D-I', 'Kec04'),
('Kel17', 'Bukit Baru', 'Kec04'),
('Kel18', 'Bukit Lama', 'Kec04'),
('Kel19', 'Demang Lebar Daun', 'Kec04'),
('Kel20', 'Lorok Pakjo', 'Kec04'),
('Kel21', 'Siring Agung', 'Kec04'),
('Kel22', '27 Ilir', 'Kec05'),
('Kel23', '28 Ilir', 'Kec05'),
('Kel24', '29 Ilir', 'Kec05'),
('Kel25', '30 Ilir', 'Kec05'),
('Kel26', '32 Ilir', 'Kec05'),
('Kel27', '35 Ilir', 'Kec05'),
('Kel28', 'Kemang Manis', 'Kec05'),
('Kel29', '13 Ilir', 'Kec06'),
('Kel30', '14 Ilir', 'Kec06'),
('Kel31', '15 Ilir', 'Kec06'),
('Kel32', '16 Ilir', 'Kec06'),
('Kel33', '17 Ilir', 'Kec06'),
('Kel34', '18 Ilir', 'Kec06'),
('Kel35', '20 Ilir D-I', 'Kec06'),
('Kel36', '20 Ilir D-III', 'Kec06'),
('Kel37', '20 Ilir D-IV', 'Kec06'),
('Kel38', 'Kepandean Baru', 'Kec06'),
('Kel39', 'Sungai Pangeran', 'Kec06'),
('Kel40', '1 Ilir', 'Kec07'),
('Kel41', '2 Ilir', 'Kec07'),
('Kel42', '3 Ilir', 'Kec07'),
('Kel43', '5 Ilir', 'Kec07'),
('Kel44', 'Lawang Kidul', 'Kec07'),
('Kel45', 'Sungai Buah', 'Kec07'),
('Kel46', '8 Ilir', 'Kec08'),
('Kel47', '9 Ilir', 'Kec08'),
('Kel48', '10 Ilir', 'Kec08'),
('Kel49', '11 Ilir', 'Kec08'),
('Kel50', 'Duku', 'Kec08'),
('Kel51', 'Kuto Batu', 'Kec08'),
('Kel52', '8 Ulu', 'Kec09'),
('Kel53', '9/10 Ulu', 'Kec09'),
('Kel54', '15 Ulu', 'Kec09'),
('Kel55', 'Silaberanti', 'Kec09'),
('Kel56', 'Tuan Kentang', 'Kec09'),
('Kel57', 'Bukit Sangkal', 'Kec10'),
('Kel58', 'Kalidoni', 'Kec10'),
('Kel59', 'Sei Lais', 'Kec10'),
('Kel60', 'Sei Selayur', 'Kec10'),
('Kel61', 'Sei Selincah', 'Kec10'),
('Kel62', '20 Ilir D-II', 'Kec11'),
('Kel63', 'Ario Kemuning', 'Kec11'),
('Kel64', 'Pahlawan', 'Kec11'),
('Kel65', 'Pipa Reja', 'Kec11'),
('Kel66', 'Sekip Jaya', 'Kec11'),
('Kel67', 'Talang Aman', 'Kec11'),
('Kel68', 'Karya Jaya', 'Kec12'),
('Kel69', 'Kemang Agung', 'Kec12'),
('Kel70', 'Kemas Rindo', 'Kec12'),
('Kel71', 'Keramasan', 'Kec12'),
('Kel72', 'Kertapati', 'Kec12'),
('Kel73', 'Ogan Baru', 'Kec12'),
('Kel74', 'Bagus Kuning', 'Kec13'),
('Kel75', 'Komperta', 'Kec13'),
('Kel76', 'Plaju Darat', 'Kec13'),
('Kel77', 'Plaju Ilir', 'Kec13'),
('Kel78', 'Plaju Ulu', 'Kec13'),
('Kel79', 'Talang Bubuk', 'Kec13'),
('Kel80', 'Talang Putri', 'Kec13'),
('Kel81', 'Sako', 'Kec14'),
('Kel82', 'Sako Baru', 'Kec14'),
('Kel83', 'Sialang', 'Kec14'),
('Kel84', 'Suka Maju', 'Kec14'),
('Kel85', '1 Ulu', 'Kec15'),
('Kel86', '2 Ulu', 'Kec15'),
('Kel87', '3-4 Ulu', 'Kec15'),
('Kel88', '5 Ulu', 'Kec15'),
('Kel89', '7 Ulu', 'Kec15'),
('Kel90', '11 Ulu', 'Kec16'),
('Kel91', '12 Ulu', 'Kec16'),
('Kel92', '13 Ulu', 'Kec16'),
('Kel93', '14 Ulu', 'Kec16'),
('Kel94', '16 Ulu', 'Kec16'),
('Kel95', 'Sentosa', 'Kec16'),
('Kel96', 'Tangga Takat', 'Kec16'),
('Kel97', 'Karya Mulya', 'Kec17'),
('Kel98', 'Lebung Gajah', 'Kec17'),
('Kel99', 'Sri Mulya', 'Kec17');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` varchar(50) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `id_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `id_provinsi`) VALUES
('KK01', 'Banyuasin', 'Prov37'),
('KK02', 'Prabumulih', 'Prov37'),
('KK03', 'Empat Lawang', 'Prov37'),
('KK04', 'Lahat', 'Prov37'),
('KK05', 'Musi Banyuasin', 'Prov37'),
('KK06', 'Muara Enim', 'Prov37'),
('KK07', 'Musi Rawas', 'Prov37'),
('KK08', 'Musi Rawas Utara', 'Prov37'),
('KK09', 'Ogan Ilir', 'Prov37'),
('KK10', 'Ogan Komering Ilir', 'Prov37'),
('KK100', 'Bogor', 'Prov09'),
('KK101', 'Ciamis', 'Prov09'),
('KK102', 'Cianjur', 'Prov09'),
('KK103', 'Cirebon', 'Prov09'),
('KK104', 'Garut', 'Prov09'),
('KK105', 'Indramayu', 'Prov09'),
('KK106', 'Karawang', 'Prov09'),
('KK107', 'Kuningan', 'Prov09'),
('KK108', 'Majalengka', 'Prov09'),
('KK109', 'Pangandaran', 'Prov09'),
('KK11', 'Ogan Komering Ulu', 'Prov37'),
('KK110', 'Purwakarta', 'Prov09'),
('KK111', 'Subang', 'Prov09'),
('KK112', 'Sukabumi', 'Prov09'),
('KK113', 'Sumedang', 'Prov09'),
('KK114', 'Tasikmalaya', 'Prov09'),
('KK115', 'Bandung (kota)', 'Prov09'),
('KK116', 'Bekasi (kota)', 'Prov09'),
('KK117', 'Bogor (kota)', 'Prov09'),
('KK118', 'Cirebon (kota)', 'Prov09'),
('KK119', 'Depok ', 'Prov09'),
('KK12', 'Ogan Komering Ulu Selatan', 'Prov37'),
('KK120', 'Cimahi', 'Prov09'),
('KK121', 'Sukabumi (kota)', 'Prov09'),
('KK122', 'Tasikmalaya (kota)', 'Prov09'),
('KK123', 'Banjarnegara', 'Prov10'),
('KK124', 'Banyumas', 'Prov10'),
('KK125', 'Batang', 'Prov10'),
('KK126', 'Blora', 'Prov10'),
('KK127', 'Boyolali', 'Prov10'),
('KK128', 'Brebes', 'Prov10'),
('KK129', 'Cilacap', 'Prov10'),
('KK13', 'Ogan Komering Ulu Timur', 'Prov37'),
('KK130', 'Demak', 'Prov10'),
('KK131', 'Grobogan', 'Prov10'),
('KK132', 'Jepara', 'Prov10'),
('KK133', 'Karanganyar', 'Prov10'),
('KK134', 'Kebumen', 'Prov10'),
('KK135', 'Kendal', 'Prov10'),
('KK136', 'Klaten', 'Prov10'),
('KK137', 'Kudus', 'Prov10'),
('KK138', 'Magelang', 'Prov10'),
('KK139', 'Pati', 'Prov10'),
('KK14', 'Penukal Abab Lematang Ilir', 'Prov37'),
('KK140', 'pekalongan', 'Prov10'),
('KK141', 'Pemalang', 'Prov10'),
('KK142', 'Purbalingga', 'Prov10'),
('KK143', 'Purworejo', 'Prov10'),
('KK144', 'Rembang', 'Prov10'),
('KK145', 'Semarang', 'Prov10'),
('KK146', 'Sragen', 'Prov10'),
('KK147', 'Sukoharjo', 'Prov10'),
('KK148', 'Tegal', 'Prov10'),
('KK149', 'Temanggung', 'Prov10'),
('KK15', 'Lubuk Linggau', 'Prov37'),
('KK150', 'Wonogiri', 'Prov10'),
('KK151', 'Wonosobo', 'Prov10'),
('KK152', 'Magelang', 'Prov10'),
('KK153', 'Pekalongan (Kota)', 'Prov10'),
('KK154', 'Salatiga', 'Prov10'),
('KK155', 'Semarang (kota)', 'Prov10'),
('KK156', 'Surakarta', 'Prov10'),
('KK157', 'Tegal (kota)', 'Prov10'),
('KK158', 'Bangkalan', 'Prov11'),
('KK159', 'Banyuwangi', 'Prov11'),
('KK16', 'Pagaralam', 'Prov37'),
('KK160', 'Blitar', 'Prov11'),
('KK161', 'Bojonegoro', 'Prov10'),
('KK162', 'Bondowoso', 'Prov11'),
('KK163', 'Gresik', 'Prov11'),
('KK164', 'Jember', 'Prov11'),
('KK165', 'Jombang', 'Prov11'),
('KK166', 'Kediri', 'Prov11'),
('KK167', 'Lamongan', 'Prov11'),
('KK168', 'Lumajang', 'Prov11'),
('KK169', 'Madiun', 'Prov11'),
('KK17', 'Palembang', 'Prov37'),
('KK170', 'Magetan', 'Prov11'),
('KK171', 'Malang', 'Prov11'),
('KK172', 'Mojokerto', 'Prov11'),
('KK173', 'Nganjuk', 'Prov11'),
('KK174', 'Ngawi', 'Prov11'),
('KK175', 'Pacitan', 'Prov11'),
('KK176', 'Pamekasan', 'Prov11'),
('KK177', 'Pasuruan', 'Prov11'),
('KK178', 'Pasuruan', 'Prov11'),
('KK179', 'Ponorogo', 'Prov11'),
('KK18', 'Pangkal Pinang', 'Prov17'),
('KK180', 'Probolinggo', 'Prov11'),
('KK181', 'Sampang', 'Prov11'),
('KK182', 'Sidoarjo', 'Prov11'),
('KK183', 'Situbondo', 'Prov11'),
('KK19', 'Aceh Barat', 'Prov01'),
('KK20', 'Aceh Barat Daya', 'Prov01'),
('KK21', 'Aceh Besar', 'Prov01'),
('KK22', 'Aceh Jaya', 'Prov01'),
('KK23', 'Aceh Selatan', 'Prov01'),
('KK24', 'Aceh Singkil', 'Prov01'),
('KK25', 'Aceh Tamiang', 'Prov01'),
('KK26', 'Aceh Tengah', 'Prov01'),
('KK27', 'Aceh Tenggara', 'Prov01'),
('KK28', 'Aceh Timur', 'Prov01'),
('KK29', 'Aceh Utara', 'Prov01'),
('KK30', 'Bener Meriah', 'Prov01'),
('KK31', 'Bireuen', 'Prov01'),
('KK32', 'Gayo Lues', 'Prov01'),
('KK33', 'Nagan Raya', 'Prov01'),
('KK34', 'Pidie', 'Prov01'),
('KK35', 'Pidie Jaya', 'Prov01'),
('KK36', 'Simeulue', 'Prov01'),
('KK37', 'Banda Aceh', 'Prov01'),
('KK38', 'Langsa', 'Prov01'),
('KK39', 'Lhokseumawe', 'Prov01'),
('KK40', 'Sabang', 'Prov01'),
('KK41', 'Subulussalam', 'Prov01'),
('KK42', 'Badung', 'Prov02'),
('KK43', 'Bangli', 'Prov02'),
('KK44', 'Buleleng', 'Prov02'),
('KK45', 'Gianyar', 'Prov02'),
('KK46', 'Jembrana', 'Prov02'),
('KK47', 'Karangasem', 'Prov02'),
('KK48', 'Klungkung', 'Prov02'),
('KK49', 'Tabanan', 'Prov02'),
('KK50', 'Denpasar', 'Prov02'),
('KK51', 'Lebak', 'Prov03'),
('KK52', 'Pandeglang', 'Prov03'),
('KK53', 'Serang', 'Prov03'),
('KK54', 'Tangerang', 'Prov03'),
('KK55', 'Cilegon', 'Prov03'),
('KK56', 'Serang', 'Prov03'),
('KK57', 'Tangerang (Kota)', 'Prov03'),
('KK58', 'Tangerang Selatan', 'Prov03'),
('KK59', 'Bengkulu Selatan', 'Prov04'),
('KK60', 'Bengkulu Tengah', 'Prov04'),
('KK61', 'Bengkulu Utara', 'Prov04'),
('KK62', 'Kaur', 'Prov04'),
('KK63', 'Kepahiang', 'Prov04'),
('KK64', 'Lebong', 'Prov04'),
('KK65', 'Mukomuko', 'Prov04'),
('KK66', 'Rejang Lebong', 'Prov04'),
('KK67', 'Seluma', 'Prov04'),
('KK68', 'Bengkulu', 'Prov04'),
('KK69', 'Bantul', 'Prov05'),
('KK70', 'Gunungkidul', 'Prov05'),
('KK71', 'Kulon Progo', 'Prov05'),
('KK72', 'Sleman', 'Prov05'),
('KK73', 'Yogyakarta', 'Prov05'),
('KK74', 'Kepulauan Seribu', 'Prov06'),
('KK75', 'Jakarta Barat', 'Prov06'),
('KK76', 'Jakarta Pusat', 'Prov06'),
('KK77', 'Jakarta Selatan', 'Prov06'),
('KK78', 'Jakarta Timur', 'Prov06'),
('KK79', 'Jakarta Utara', 'Prov06'),
('KK80', 'Boalemo', 'Prov07'),
('KK81', 'Bone Bolango', 'Prov07'),
('KK82', 'Gorontalo', 'Prov07'),
('KK83', 'Gorontalo Utara', 'Prov07'),
('KK84', 'Pohuwato', 'Prov07'),
('KK85', 'Gorontalo (Kota)', 'Prov07'),
('KK86', 'Batanghari', 'Prov08'),
('KK87', 'Bungo', 'Prov08'),
('KK88', 'Kerinci', 'Prov08'),
('KK89', 'Merangin', 'Prov08'),
('KK90', 'Muaro Jambi', 'Prov08'),
('KK91', 'Sarolangun', 'Prov08'),
('KK92', 'Tanjung Jabung Barat', 'Prov08'),
('KK93', 'Tanjung Jabung Timur', 'Prov08'),
('KK94', 'Tebo', 'Prov08'),
('KK95', 'Jambi', 'Prov08'),
('KK96', 'Sungai Penuh', 'Prov08'),
('KK97', 'Bandung', 'Prov09'),
('KK98', 'Bandung Barat', 'Prov09'),
('KK99', 'Bekasi', 'Prov09');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar_konsul`
--

CREATE TABLE `metode_bayar_konsul` (
  `id_metode_bayar_konsul` varchar(50) NOT NULL,
  `ket_metode_bayar_konsul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metode_bayar_konsul`
--

INSERT INTO `metode_bayar_konsul` (`id_metode_bayar_konsul`, `ket_metode_bayar_konsul`) VALUES
('MBK01', 'E-Wallet'),
('MBK02', 'Bank');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar_obat`
--

CREATE TABLE `metode_bayar_obat` (
  `id_metode_bayar_obat` varchar(50) NOT NULL,
  `ket_metode_bayar_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metode_bayar_obat`
--

INSERT INTO `metode_bayar_obat` (`id_metode_bayar_obat`, `ket_metode_bayar_obat`) VALUES
('MBO01', 'E-Wallet'),
('MBO02', 'Bank');

-- --------------------------------------------------------

--
-- Table structure for table `metode_konsul`
--

CREATE TABLE `metode_konsul` (
  `id_metode_konsul` varchar(50) NOT NULL,
  `nama_metode_konsul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metode_konsul`
--

INSERT INTO `metode_konsul` (`id_metode_konsul`, `nama_metode_konsul`) VALUES
('MK01', 'Dengan Resep'),
('MK02', 'Tanpa Resep');

-- --------------------------------------------------------

--
-- Table structure for table `nota_konsul`
--

CREATE TABLE `nota_konsul` (
  `id_nota_konsul` varchar(50) NOT NULL,
  `tanggal_konsul` date NOT NULL,
  `keluhan` varchar(500) NOT NULL,
  `id_status_bayar_konsul` varchar(50) NOT NULL,
  `id_jenis_bayar_konsul` varchar(50) NOT NULL,
  `id_hewan` varchar(50) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `id_status_konsul` varchar(50) NOT NULL,
  `id_metode_konsul` varchar(50) NOT NULL,
  `bukti_bayar_konsul` varchar(50) DEFAULT NULL,
  `foto_konsul` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_konsul`
--

INSERT INTO `nota_konsul` (`id_nota_konsul`, `tanggal_konsul`, `keluhan`, `id_status_bayar_konsul`, `id_jenis_bayar_konsul`, `id_hewan`, `id_dokter`, `id_status_konsul`, `id_metode_konsul`, `bukti_bayar_konsul`, `foto_konsul`) VALUES
('N001', '2023-12-22', 'Kucing saya mengalami penurunan berat badan sehingga menjadi kurus. Dia juga mengalami penurunan nafsu makan, bahkan seringkali tidak makan.', 'SBK02', 'JBK03', 'H01', 'D001', 'SK02', 'MK02', '2023-12-22DANA.jpg', '2023-12-22kucing1.jpg'),
('N002', '2023-12-22', 'Anjing saya menjadi sensitif dan agresif dan memakan segala hal yang berada didekatnya', 'SBK02', 'JBK02', 'H02', 'D001', 'SK02', 'MK01', '2023-12-22Mandiri.jpg', '2023-12-22anjing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nota_penyakit`
--

CREATE TABLE `nota_penyakit` (
  `id_nota_konsul` varchar(50) NOT NULL,
  `id_penyakit` varchar(50) NOT NULL,
  `penanganan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_penyakit`
--

INSERT INTO `nota_penyakit` (`id_nota_konsul`, `id_penyakit`, `penanganan`) VALUES
('N001', 'P01', 'Jauhkan hewan anda dari hewan yang lain. Beri obat dan jika parah bawa ke dokter terdekat.'),
('N002', 'P13', 'Jaga pola makan peliharaan anda.');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_obat` int(50) NOT NULL,
  `aturan_pakai` varchar(500) NOT NULL,
  `dosis` varchar(500) NOT NULL,
  `efek_samping` varchar(500) NOT NULL,
  `foto_obat` varchar(50) NOT NULL,
  `id_jenis_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `harga_obat`, `aturan_pakai`, `dosis`, `efek_samping`, `foto_obat`, `id_jenis_obat`) VALUES
('O01', 'Baytril', 34500, 'Semprotkan dengan jarak 15-20 cm pada tempat luka. Dua kali sehari. PERINGATAN Jangan disemprotkan di sekitar mata. Kaleng jangan ditusuk. Jangan diletakkan di tempat dengan suhu di atas 50C.', 'Tingkat dosis Baytrils adalah 5mg enrofloxacin per kg untuk diberikan sekali sehari atau dapat dibagi menjadi dosis dua kali sehari dengan atau tanpa makanan kita. Tablet dapat dipisah dan dicampur untuk mendapatkan dosis yang tepat berdasarkan berat hewan Anda. Baytril 15mg: Dosis 1 Tablet Untuk 3kg berat badan.', 'Pada anjing, baytril dosis tinggi dapat menyebabkan muntah dan diare. Efek samping lain yang mungkin termasuk hilangnya nafsu makan dan kelesuan. Kucing yang menerima dosis tinggi Baytril dapat mengembangkan kerusakan retina. Penggunaan jangka panjang pada kucing dan taring dapat menyebabkan pembentukan katarak.', 'Baytril.jpg', 'JO02'),
('O02', 'Limoxin', 49000, 'Semprotkan dengan jarak 15-20 cm pada tempat luka. Dua kali sehari. PERINGATAN Jangan disemprotkan di sekitar mata. Kaleng jangan ditusuk. Jangan diletakkan di tempat dengan suhu di atas 50C.', '1,0 ml per 10 kg berat badan. Ayam : 0,2 ml per kg berat badan. Pengobatan Anaplasma spp : 1 ml Limoxin-200 LA per 5 kg berat badan Untuk sekali pengobatan, jika diperlukan injeksi dapat diulang setelah 48 jam', 'Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah: Reaksi alergi, gangguan gastrointestinal ringan.', 'Limoxin.jpg', 'JO02'),
('O03', 'Tysinol', 17000, 'Jangan menyuntikkan Tysinol lebih dari 5 ml pada bagian tubuh yang sama. Berhenti memberi Tysinol 3 hari sebelum ternak disembelih untuk konsumsi manusia. Simpan dalam wadah tertutup rapat, di tempat yang kering dan sejuk, terlindungi dari sinar matahari langsung', '0,25-0,5 ml per burung Ayam penumbuh & finisher (umur> 4 minggu): 0,5-1 ml per ekor Sapi 0,5-1 ml per 10 kg berat badan', 'Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah: Reaksi alergi, gangguan gastrointestinal ringan.', 'Tysinol.jpg', 'JO06'),
('O04', 'Prednisone', 100000, 'Dosis prednison yang diresepkan dokter dapat berbeda-beda, tergantung usia dan kondisi yang diderita pasien. Dalam kondisi tertentu, dosis prednison akan disesuaikan dengan berat badan (BB) hewan.', 'Dosis awalnya 0,14-2 mg/kg/hari atau 5-60 mg/kg/hari sekali sehari atau dalam dosis terbagi 2-4 kali per hari.', 'Efek samping yang mungkin timbul setelah menggunakan prednison adalah:  Mual Muntah Diare Konstipasi Keringat berlebih Jerawat Sulit tidur Hilang nafsu makan.', 'Prednisone.jpg', 'JO07'),
('O05', 'Digoxin', 5000, 'Dosis digoxin akan diberikan oleh dokter sesuai dengan usia dan kondisi ginjal pasien. Dalam kondisi tertentu, dokter akan menentukan dosis digoxin untuk anak-anak berdasarkan berat badan (BB) hewan. Obat ini dapat diberikan dalam bentuk tablet atau suntikan.', '3,4-5,1 mcg/kg/hari atau 0,125-0,5 mg/hari PO; dapat menaikkan dosis setiap 2 minggu berdasarkan respon klinis, kadar obat pada serum, dan toksisitas. IV/IM: 0,1-0,4 mg setiap Â hari. Pemberian IM tidak disukai karena reaksi suntikan yang berat.', 'Dapat terjadi anoreksia, mual, muntah dan sakit kepala Gejala toksik pada jantung: kontraksi ventrikel prematur multiform atau unifocal,takikardia ventrikular, desosiasi AV, aritmia sinus, takikardia atrium dengan berbagai derajat blokAV Gejala neurologik: depresi, ngantuk, rasa lemah, letargi, gelisah, vertigo, bingung dan halusinasi visual.', 'Digoxin.jpg', 'JO08'),
('O06', 'Meloxicam', 49000, 'Sesuai anjuran Dokter', 'Dosis umum meloxicam untuk anjing adalah 0,09 sampai 0,1 mg per pon pada hari pertama pengobatan diikuti oleh 0,045 sampai 0,05 mg per pon yang diberikan secara oral sekali sehari setelah itu.', 'Untuk mengetahui efek sampingnya, disarankan untuk berkonsultasi langsung dengan seorang dokter hewan atau memeriksa informasi yang terdapat pada kemasan obat atau situs web produsennya.', 'Meloxicam.jpg', 'JO04'),
('O07', 'Cetirizine', 5000, 'Sebelum mengonsumsi cetirizine, pastikan untuk memahami aturan pakai cetirizine. Aturan pakai tersebut meliputi dosis cetirizine yang diperlukan, serta bagaimana cara mengonsumsi cetirizine yang benar.', 'Dosis umum untuk anjing dengan dosis 0,5 mg per pon berat badan.', 'Obat cetirizine berisiko menimbulkan beberapa efek samping berbeda berdasarkan tiap individu. Cetirizine tergolong sebagai obat antihistamin generasi kedua sehingga lebih baru. Perbedaan dari antihistamin sebelumnya adalah lebih banyak efek samping yang ditimbulkan.', 'Cetirizine.jpg', 'JO10'),
('O08', 'Dorzolamide', 20000, 'Studi pada reproduksi hewan menunjukkan efek buruk pada janin. Tidak ada studi memadai dan terkendali pada manusia. Obat boleh digunakan jika nilai manfaatnya lebih besar dari risiko terhadap janin.', 'Dorzolamide hanya digunakan atas petunjuk dokter.', 'Efek samping yang sering dialami adalah: 1. Perasaan terbakar pada mata 2. Perasaan tidak nyaman pada mata 3. Mata gatal 4. Reaksi hipersensitivitas pada mata 5. Mata bengkak 6. Mata merah 7. Iritasi 8. Airmata berlebih', 'Dorzolamide.jpg', 'JO11'),
('O09', 'Furosemide', 60000, 'Furosemide tablet bisa dikonsumsi sebelum atau sesudah makan. Telan tablet dengan segelas air putih.', 'Furosemide dapat digunakan oleh dewasa maupun anak-anak. Kekuatan yang tersedia: 80 mg; 20 mg; 40 mg; 10 mg/mL; 40 mg/5 mL; 100 mg/100 mL-0.9%.', 'Efek samping yang mungkin timbul setelah menggunakan furosemide antara lain:  Pusing Sakit kepala Mual dan muntah Diare Penglihatan buram Sembelit', 'Furosemide.jpg', 'JO05'),
('O10', 'Virbac', 159000, 'Nutri Plus Gel dapat diberikan langsung ke dalam mulut hewan peliharaan dengan kanula atau dapat dicampur dengan makanan sehari-hari sampai hewan peliharaan tersebut sembuh total atau selama periode aktivitas fisik.', '1-2 sendok teh (atau seukuran 10 cm gel) per hari untuk hewan peliharaan dengan berat 5 kg. Jika Nutri Plus Gel adalah sumber utama makanan : berikan 2-4 sendok teh per hari untuk hewan peliharaan dengan berat 5 kg.', 'Biasanya, gejala yang muncul hampir serupa dengan pemberian vaksin pada umumnya, seperti:  Nyeri di area suntikan Kemerahan Bengkak Gatal', 'Virbac.jpg', 'JO09'),
('O11', 'Vitol', 159000, 'Vitol-140 diberikan secara injeksi intramuskular atau subkutan.', 'Sapi, kuda: 10 ml, Anak sapi, anak kuda: 5 ml, Kambing, domba: 3 ml, Babi: 5-8 ml, Anak babi: 1-3 ml, Anjing: 1-5 ml, Kucing: 1-2 ml, Ayam: 0,2 ml per kg berat badan.', 'Tidak terdapat efek samping khusus', 'Vitol.jpg', 'JO12');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_obat`
--

CREATE TABLE `pembelian_obat` (
  `id_resep_obat` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL,
  `sub_harga_obat` int(50) NOT NULL,
  `sub_qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_obat`
--

INSERT INTO `pembelian_obat` (`id_resep_obat`, `id_obat`, `sub_harga_obat`, `sub_qty`) VALUES
('R001', 'O02', 49000, 1),
('R001', 'O03', 17000, 1),
('R001', 'O04', 100000, 1),
('R002', 'O01', 69000, 2),
('R002', 'O03', 17000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(50) NOT NULL,
  `username_pengguna` varchar(50) NOT NULL,
  `password_pengguna` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `alamat_pengguna` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_kelurahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username_pengguna`, `password_pengguna`, `nama_pengguna`, `alamat_pengguna`, `no_telepon`, `email`, `id_kelurahan`) VALUES
('P001', 'dsh678', '12345', 'Dewi Sri Hartati', 'Jalan Alang-Alang Lebar', '088223329889', 'dewisri@gmail.com', 'Kel01'),
('P002', 'dm456', '12345', 'Dina Mustaqima', 'Jalan Bukit Asam', '081234567890', 'dinams@gmail.com', 'Kel78'),
('P003', 'dvwxzy_', '12345', 'Tiara Andini', 'Jalan Senayan', '081366559988', 'tiaraandini@gmail.com', 'Kel82'),
('P004', 'catmeow123', '12345', 'Senjani Ammaleya', 'Jalan Pasuruhan ', '085444442211', 'senjani05@gmail.com', 'Kel05'),
('P005', 'itsmehi', '12345', 'Jenggala Pratama', 'Jalan Pahlawan No. 06', '081344556677', 'jenggala@gmail.com', 'Kel101');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(50) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `ket_penyakit` varchar(500) NOT NULL,
  `gejala` varchar(500) NOT NULL,
  `id_spesialis` varchar(50) NOT NULL,
  `id_jenis_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `ket_penyakit`, `gejala`, `id_spesialis`, `id_jenis_penyakit`) VALUES
('P01', 'Rabies', 'Rabies adalah penyakit yang disebabkan oleh virus rabies yang dapat menyerang sistem saraf pusat pada hewan, termasuk mamalia dan manusia. Penyakit ini biasanya ditularkan melalui gigitan atau kontak langsung dengan saliva hewan yang terinfeksi.', 'Agresif penurunan fungsi saraf, kesulitan menelan.', '01S', 'JP01'),
('P02', 'Distemper', 'Distemper adalah penyakit viral yang dapat memengaruhi berbagai jenis hewan, termasuk anjing dan beberapa spesies liar. Penyakit ini disebabkan oleh virus distemper yang termasuk dalam keluarga Paramyxoviridae. Virus ini sangat menular dan dapat menyebabkan berbagai gejala dan dampak pada sistem pernapasan, pencernaan, dan saraf hewan.', 'Batuk, demam, keluarnya lendir dari mata dan hidung.', '01S', 'JP01'),
('P03', 'Flu Avian', 'Penyakit ini dapat menyebar dengan cepat di antara populasi unggas dan mempengaruhi produktivitasnya.', 'Batuk, bersin, penurunan produksi telur pada unggas.', '23S', 'JP01'),
('P04', 'Leptospirosis', 'Leptospirosis adalah penyakit bakterial yang disebabkan oleh bakteri dari genus Leptospira. Penyakit ini dapat memengaruhi berbagai jenis hewan, termasuk anjing dan hewan-hewan liar. Leptospirosis dapat menular kepada manusia melalui kontak dengan air atau tanah yang terkontaminasi oleh urine hewan yang terinfeksi.', 'Demam, muntah, diare.', '02S', 'JP02'),
('P05', 'Tuberkolosis', 'Tuberkulosis dapat menyerang berbagai organ dan bersifat menular.', 'Batuk berkepanjangan, penurunan berat badan.', '02S', 'JP02'),
('P06', 'Brucellosis', 'Brucellosis dapat menular melalui kontak dengan jaringan tubuh atau cairan dari hewan terinfeksi.', 'Demam, nyeri otot, gangguan reproduksi.', '02S', 'JP02'),
('P07', 'Toxoplasmosis', 'Penyakit ini dapat menular melalui kontak dengan tinja kucing terinfeksi.', 'Demam, pembesaran kelenjar getah bening, kelelahan.', '03S', 'JP01'),
('P08', 'Babesiosis', 'Penyakit ini umumnya ditularkan melalui gigitan caplak yang terinfeksi.', 'Demam, penurunan nafsu makan, warna urine gelap.', '03S', 'JP05'),
('P09', 'Giardiasis', 'Penularan biasanya melalui air atau makanan yang terkontaminasi.', 'Diare, kram perut, mual.', '03S', 'JP05'),
('P10', 'Kanker Kulit', 'Berbagai jenis kanker kulit dapat mempengaruhi hewan, seringkali memerlukan biopsi untuk diagnosis.', 'Perubahan pada kulit, pembentukan benjolan atau borok.', '04S', 'JP05'),
('P11', 'Dermatitis Alergi', 'Alergi dapat disebabkan oleh makanan, alergen lingkungan, atau gigitan serangga.', 'Gatal, kemerahan, bengkak.', '04S', 'JP06'),
('P12', 'Infeksi Kulit', 'Infeksi kulit dapat disebabkan oleh berbagai patogen.', 'Gatal, kemerahan, pembentukan lecet atau bisul.', '04S', 'JP06'),
('P13', 'Alergi Makanan', 'Alergi makanan dapat membutuhkan eliminasi diet untuk diagnosis dan pengelolaan.', 'Gatal, muntah, diare.', '05S', 'JP06'),
('P14', 'Kardiomiopati', 'Pengelolaan melibatkan penggunaan obat-obatan dan perubahan gaya hidup.', 'Pembesaran jantung, gagal jantung, aritmia.', '06S', 'JP08'),
('P15', 'Alergi Serbuk Sari ', 'Penghindaran alergen dan penggunaan antihistamin seringkali diperlukan.', 'Bersin, gatal pada mata, hidung berair..', '05S', 'JP07'),
('P16', 'Alergi Gigitan Serangga', 'Penggunaan antihistamin atau terapi desensitisasi dapat diperlukan.', 'Pembengkakan, gatal-gatal, kemerahan.', '05S', 'JP07'),
('P17', 'Endokarditis', 'Pengobatan biasanya melibatkan antibiotik dan manajemen gejala.', 'Demam, kesulitan bernapas, kelemahan.', '06S', 'JP08'),
('P18', 'Sindrom Brugada', 'Pengelolaan melibatkan evaluasi risiko dan pencegahan aritmia.', 'Pingsan, detak jantung tidak teratur.', '07S', 'JP08'),
('P19', 'Dislokasi Sendi', 'Perawatan mencakup manipulasi sendi atau pembedahan.', 'Bengkok, nyeri, kesulitan bergerak.', '08S', 'JP08'),
('P20', 'Artritis Sendi', 'Peradangan pada sendi.', 'Nyeri, kemerahan, pembengkakan.', '08S', 'JP09'),
('P21', 'Spondylosis', 'Degenerasi tulang belakang.', 'Nyeri punggung, kekakuan, kesulitan bergerak.', '09S', 'JP09'),
('P22', 'Kaki bengkok', 'Kelainan bentuk kaki.', 'Kesulitan berjalan, deformitas.', '10S', 'JP09'),
('P23', 'Hipertensi Renal', 'Tekanan darah tinggi yang terkait dengan masalah ginjal.', 'Sering tanpa gejala, atau gejala tekanan darah tinggi.', '11S', 'JP09'),
('P24', 'Glomerulonefritis', 'Peradangan pada glomeruli ginjal.', 'Pembengkakan, darah dalam urine, hipertensi.', '12S', 'JS10'),
('P25', 'Diabetes Melitus', 'Gangguan metabolisme gula.', 'Berkurangnya berat badan, poliuria (sering buang air kecil), polidipsia (sering haus).', '13S', 'JS11'),
('P26', 'Hipoglikemia', 'Kadar gula darah yang rendah.', 'Pusing, lemah, kelaparan.', '13S', 'JS11'),
('P27', 'Kegagalan Reproduksi', 'Kesulitan dalam berkembang biak.', 'Gagal hamil, sering keguguran.', '15S', 'JS12'),
('P28', 'Infertilitas', 'Tidak mampu memiliki keturunan.', 'Tidak adanya kehamilan setelah berusaha.', '15S', 'JS12'),
('P29', 'Kebuntingan', 'Kehilangan kehamilan.', 'Perdarahan, nyeri perut.', '15S', 'JS12'),
('P30', 'Infeksi Reproduksi', 'Infeksi pada sistem reproduksi', 'Keputihan, nyeri panggul.', '16S', 'JS12'),
('P31', 'Pneumonia', 'Infeksi pada paru-paru.', 'Batuk berdahak, demam, kesulitan bernafas.', '17S', 'JS13'),
('P32', 'Bronkitis', 'Peradangan saluran bronkus.', 'Batuk, produksi lendir, sesak napas.', '17S', 'JS13'),
('P33', 'Glaukoma', 'Peningkatan tekanan dalam mata.', 'Sakit mata, penglihatan kabur.', '19S', 'JS13'),
('P34', 'Ulserasi Mata', 'Luka atau erosi pada permukaan mata.', 'Mata merah, nyeri, penurunan penglihatan.', '19S', 'JS14'),
('P35', 'Konjungtivitis', 'Peradangan konjungtiva mata.', 'Mata merah, gatal, keluarnya cairan.', '19S', 'JS14'),
('P36', 'Uveitis', 'Peradangan lapisan tengah mata.', 'Sakit mata, sensitivitas cahaya.', '19S', 'JS14'),
('P37', 'Aspergillosis', 'Infeksi jamur pada saluran pernapasan.', 'Sakit mata, sensitivitas cahaya.', '23S', 'JS14'),
('P38', 'Parasit Ikan', 'Infestasi parasit pada kulit atau insang ikan.', 'Menggosok-gosokkan tubuh, nafsu makan menurun', '25S', 'JP05'),
('P39', 'Feline Leukemia', 'Infeksi virus pada kucing', 'Penurunan berat badan, infeksi sekunder.', '26S', 'JP01'),
('P40', 'Parvovirus', 'Infeksi virus parvovirus pada anjing.', 'Muntah, diare berdarah, dehidrasi.', '27S', 'JP01');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` varchar(50) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
('Prov01', 'Nanggroe Aceh Darussalam'),
('Prov02', 'Bali'),
('Prov03', 'Banten'),
('Prov04', 'Bengkulu'),
('Prov05', 'Daerah Istimewa Yogyakarta'),
('Prov06', 'Daerah Khusus Ibukota Jakarta'),
('Prov07', 'Gorontalo'),
('Prov08', 'Jambi'),
('Prov09', 'Jawa Barat'),
('Prov10', 'Jawa Tengah'),
('Prov11', 'Jawa Timur'),
('Prov12', 'Kalimantan Barat'),
('Prov13', 'Kalimantan Selatan'),
('Prov14', 'Kalimantan Tengah'),
('Prov15', 'Kalimantan Timur'),
('Prov16', 'Kalimantan Utara'),
('Prov17', 'Kepulauan Bangka Belitung'),
('Prov18', 'Kepulauan Riau'),
('Prov19', 'Lampung'),
('Prov20', 'Maluku'),
('Prov21', 'Maluku Utara'),
('Prov22', 'Nusa Tenggara Timur'),
('Prov23', 'Nusa Tenggara Barat'),
('Prov24', 'Papua'),
('Prov25', 'Papua Barat'),
('Prov26', 'Papua Barat Daya'),
('Prov27', 'Papua Pegunungan'),
('Prov28', 'Papua Selatan'),
('Prov29', 'Papua Tengah'),
('Prov30', 'Riau'),
('Prov31', 'Sulawesi Barat'),
('Prov32', 'Sulawesi Selatan'),
('Prov33', 'Sulawesi Tengah'),
('Prov34', 'Sulawesi Tenggara'),
('Prov35', 'Sulawesi Utara'),
('Prov36', 'Sumatera Barat'),
('Prov37', 'Sumatera Selatan'),
('Prov38', 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep_obat` varchar(50) NOT NULL,
  `tanggal_resep` date NOT NULL,
  `total_bayar_resep` int(50) NOT NULL,
  `id_pengguna` varchar(50) NOT NULL,
  `id_nota_konsul` varchar(50) DEFAULT NULL,
  `id_apotek` varchar(50) DEFAULT NULL,
  `id_jenis_bayar_obat` varchar(50) DEFAULT NULL,
  `id_status_bayar_obat` varchar(50) DEFAULT NULL,
  `bukti_bayar_obat` varchar(50) NOT NULL,
  `ket_tambahan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep_obat`, `tanggal_resep`, `total_bayar_resep`, `id_pengguna`, `id_nota_konsul`, `id_apotek`, `id_jenis_bayar_obat`, `id_status_bayar_obat`, `bukti_bayar_obat`, `ket_tambahan`) VALUES
('R001', '2023-12-22', 166000, 'P001', 'N002', 'A04', 'JBO01', 'SBO02', '2023-12-22OVO.jpg', 'Dosis : Obat Tysinol 2 x sehari setelah makan, Obat Limoxin 3 x sehari setelah makan, Obat Prednisone 3 x sehari'),
('R002', '2023-12-22', 86000, 'P001', NULL, 'A04', 'JBO08', 'SBO02', '2023-12-22BCA.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spesialis`
--

CREATE TABLE `spesialis` (
  `id_spesialis` varchar(50) NOT NULL,
  `nama_spesialis` varchar(50) NOT NULL,
  `id_jenis_spesialis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spesialis`
--

INSERT INTO `spesialis` (`id_spesialis`, `nama_spesialis`, `id_jenis_spesialis`) VALUES
('01S', 'Dokter Hewan Virologi', 'JS01'),
('02S', 'Dokter Hewan Bakteriologi', 'JS01'),
('03S', 'Dokter Hewan Parasitologi', 'JS01'),
('04S', 'Dokter Hewan Onkologi Kulit', 'JS02'),
('05S', 'Dokter Hewan Alergi', 'JS02'),
('06S', 'Dokter Hewan Kardiologi Intervesi', 'JS03'),
('07S', 'Dokter Hewan Elektrofisiologi Jantung', 'JS03'),
('08S', 'Dokter Hewan Bedah Sendi', 'JS04'),
('09S', 'Dokter Hewan Bedah Tulang Belakang', 'JS04'),
('10S', 'Dokter Hewan Bedah Kaki', 'JS04'),
('11S', 'Dokter Hewan Hipertensi Renal', 'JS05'),
('12S', 'Dokter Hewan Gagal Ginjal', 'JS05'),
('13S', 'Dokter Hewan Diabetes Melitus', 'JS06'),
('14S', 'Dokter Hewan Gangguan Tiroid', 'JS06'),
('15S', 'Dokter Hewan Pemuliaan', 'JS07'),
('16S', 'Dokter Hewan Infertilitas', 'JS07'),
('17S', 'Dokter Hewan Gangguan Hewan pernafasan', 'JS08'),
('18S', 'Dokter Hewan Bedah Mata', 'JS09'),
('19S', 'Dokter Hewan Penyakit Mata', 'JS09'),
('20S', 'Dokter Hewan Kanker Hewan', 'JS10'),
('21S', 'Dokter Hewan Gangguan Saraf', 'JS11'),
('22S', 'Dokter Hewan Bedah Otak', 'JS11'),
('23S', 'Dokter Hewan Ornitologi (Burung)', 'JS12'),
('24S', 'Dokter Hewan Herpetologi', 'JS13'),
('25S', 'Dokter Hewan Iktiologi', 'JS13'),
('26S', 'Dokter Hewan Kucing', 'JS14'),
('27S', 'Dokter Hewan Anjing', 'JS14'),
('28S', 'Dokter Umum', 'JS15'),
('29S', 'Dokter Hewan Nutrisi Harian', 'JS16');

-- --------------------------------------------------------

--
-- Table structure for table `status_bayar_konsul`
--

CREATE TABLE `status_bayar_konsul` (
  `id_status_bayar_konsul` varchar(50) NOT NULL,
  `jenis_status_bayar_konsul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_bayar_konsul`
--

INSERT INTO `status_bayar_konsul` (`id_status_bayar_konsul`, `jenis_status_bayar_konsul`) VALUES
('SBK01', 'Sedang Diverifikasi'),
('SBK02', 'Sudah Bayar'),
('SBK03', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `status_bayar_obat`
--

CREATE TABLE `status_bayar_obat` (
  `id_status_bayar_obat` varchar(50) NOT NULL,
  `jenis_status_bayar_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_bayar_obat`
--

INSERT INTO `status_bayar_obat` (`id_status_bayar_obat`, `jenis_status_bayar_obat`) VALUES
('SBO01', 'Sedang Diverifikasi'),
('SBO02', 'Sudah Bayar'),
('SBO03', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `status_konsul`
--

CREATE TABLE `status_konsul` (
  `id_status_konsul` varchar(50) NOT NULL,
  `ket_status_konsul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_konsul`
--

INSERT INTO `status_konsul` (`id_status_konsul`, `ket_status_konsul`) VALUES
('SK01', 'Belum Selesai'),
('SK02', 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `apotek`
--
ALTER TABLE `apotek`
  ADD PRIMARY KEY (`id_apotek`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_spesialis` (`id_spesialis`);

--
-- Indexes for table `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`id_hewan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `jenis_bayar_konsul`
--
ALTER TABLE `jenis_bayar_konsul`
  ADD PRIMARY KEY (`id_jenis_bayar_konsul`),
  ADD KEY `id_metode_bayar_konsul` (`id_metode_bayar_konsul`);

--
-- Indexes for table `jenis_bayar_obat`
--
ALTER TABLE `jenis_bayar_obat`
  ADD PRIMARY KEY (`id_jenis_bayar_obat`),
  ADD KEY `id_metode_bayar_obat` (`id_metode_bayar_obat`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id_jenis_obat`);

--
-- Indexes for table `jenis_penyakit`
--
ALTER TABLE `jenis_penyakit`
  ADD PRIMARY KEY (`id_jenis_penyakit`);

--
-- Indexes for table `jenis_spesialis`
--
ALTER TABLE `jenis_spesialis`
  ADD PRIMARY KEY (`id_jenis_spesialis`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `metode_bayar_konsul`
--
ALTER TABLE `metode_bayar_konsul`
  ADD PRIMARY KEY (`id_metode_bayar_konsul`);

--
-- Indexes for table `metode_bayar_obat`
--
ALTER TABLE `metode_bayar_obat`
  ADD PRIMARY KEY (`id_metode_bayar_obat`);

--
-- Indexes for table `metode_konsul`
--
ALTER TABLE `metode_konsul`
  ADD PRIMARY KEY (`id_metode_konsul`);

--
-- Indexes for table `nota_konsul`
--
ALTER TABLE `nota_konsul`
  ADD PRIMARY KEY (`id_nota_konsul`),
  ADD KEY `id_status_bayar_konsul` (`id_status_bayar_konsul`),
  ADD KEY `id_metode_bayar_konsul` (`id_jenis_bayar_konsul`),
  ADD KEY `id_hewan` (`id_hewan`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_status_konsul` (`id_status_konsul`),
  ADD KEY `id_metode_konsul` (`id_metode_konsul`);

--
-- Indexes for table `nota_penyakit`
--
ALTER TABLE `nota_penyakit`
  ADD KEY `id_nota_konsul` (`id_nota_konsul`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_jenis_obat` (`id_jenis_obat`);

--
-- Indexes for table `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  ADD KEY `id_resep_obat` (`id_resep_obat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_kelurahan` (`id_kelurahan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`),
  ADD KEY `id_spesialis` (`id_spesialis`),
  ADD KEY `id_jenis_penyakit` (`id_jenis_penyakit`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep_obat`),
  ADD KEY `id_nota_konsul` (`id_nota_konsul`),
  ADD KEY `id_apotek` (`id_apotek`),
  ADD KEY `id_metode_bayar_obat` (`id_jenis_bayar_obat`),
  ADD KEY `id_status_bayar_obat` (`id_status_bayar_obat`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `spesialis`
--
ALTER TABLE `spesialis`
  ADD PRIMARY KEY (`id_spesialis`),
  ADD KEY `id_jenis_spesialis` (`id_jenis_spesialis`);

--
-- Indexes for table `status_bayar_konsul`
--
ALTER TABLE `status_bayar_konsul`
  ADD PRIMARY KEY (`id_status_bayar_konsul`);

--
-- Indexes for table `status_bayar_obat`
--
ALTER TABLE `status_bayar_obat`
  ADD PRIMARY KEY (`id_status_bayar_obat`);

--
-- Indexes for table `status_konsul`
--
ALTER TABLE `status_konsul`
  ADD PRIMARY KEY (`id_status_konsul`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apotek`
--
ALTER TABLE `apotek`
  ADD CONSTRAINT `apotek_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_spesialis`) REFERENCES `spesialis` (`id_spesialis`);

--
-- Constraints for table `hewan`
--
ALTER TABLE `hewan`
  ADD CONSTRAINT `hewan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `jenis_bayar_konsul`
--
ALTER TABLE `jenis_bayar_konsul`
  ADD CONSTRAINT `jenis_bayar_konsul_ibfk_1` FOREIGN KEY (`id_metode_bayar_konsul`) REFERENCES `metode_bayar_konsul` (`id_metode_bayar_konsul`);

--
-- Constraints for table `jenis_bayar_obat`
--
ALTER TABLE `jenis_bayar_obat`
  ADD CONSTRAINT `jenis_bayar_obat_ibfk_1` FOREIGN KEY (`id_metode_bayar_obat`) REFERENCES `metode_bayar_obat` (`id_metode_bayar_obat`);

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Constraints for table `nota_konsul`
--
ALTER TABLE `nota_konsul`
  ADD CONSTRAINT `nota_konsul_ibfk_1` FOREIGN KEY (`id_hewan`) REFERENCES `hewan` (`id_hewan`),
  ADD CONSTRAINT `nota_konsul_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `nota_konsul_ibfk_4` FOREIGN KEY (`id_status_konsul`) REFERENCES `status_konsul` (`id_status_konsul`),
  ADD CONSTRAINT `nota_konsul_ibfk_5` FOREIGN KEY (`id_status_bayar_konsul`) REFERENCES `status_bayar_konsul` (`id_status_bayar_konsul`),
  ADD CONSTRAINT `nota_konsul_ibfk_6` FOREIGN KEY (`id_jenis_bayar_konsul`) REFERENCES `jenis_bayar_konsul` (`id_jenis_bayar_konsul`),
  ADD CONSTRAINT `nota_konsul_ibfk_7` FOREIGN KEY (`id_metode_konsul`) REFERENCES `metode_konsul` (`id_metode_konsul`);

--
-- Constraints for table `nota_penyakit`
--
ALTER TABLE `nota_penyakit`
  ADD CONSTRAINT `nota_penyakit_ibfk_1` FOREIGN KEY (`id_nota_konsul`) REFERENCES `nota_konsul` (`id_nota_konsul`),
  ADD CONSTRAINT `nota_penyakit_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_jenis_obat`) REFERENCES `jenis_obat` (`id_jenis_obat`);

--
-- Constraints for table `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  ADD CONSTRAINT `pembelian_obat_ibfk_1` FOREIGN KEY (`id_resep_obat`) REFERENCES `resep_obat` (`id_resep_obat`),
  ADD CONSTRAINT `pembelian_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_2` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`);

--
-- Constraints for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD CONSTRAINT `penyakit_ibfk_1` FOREIGN KEY (`id_jenis_penyakit`) REFERENCES `jenis_penyakit` (`id_jenis_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penyakit_ibfk_2` FOREIGN KEY (`id_spesialis`) REFERENCES `spesialis` (`id_spesialis`);

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `resep_obat_ibfk_1` FOREIGN KEY (`id_nota_konsul`) REFERENCES `nota_konsul` (`id_nota_konsul`),
  ADD CONSTRAINT `resep_obat_ibfk_2` FOREIGN KEY (`id_status_bayar_obat`) REFERENCES `status_bayar_obat` (`id_status_bayar_obat`),
  ADD CONSTRAINT `resep_obat_ibfk_5` FOREIGN KEY (`id_apotek`) REFERENCES `apotek` (`id_apotek`),
  ADD CONSTRAINT `resep_obat_ibfk_6` FOREIGN KEY (`id_jenis_bayar_obat`) REFERENCES `jenis_bayar_obat` (`id_jenis_bayar_obat`),
  ADD CONSTRAINT `resep_obat_ibfk_7` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `spesialis`
--
ALTER TABLE `spesialis`
  ADD CONSTRAINT `spesialis_ibfk_1` FOREIGN KEY (`id_jenis_spesialis`) REFERENCES `jenis_spesialis` (`id_jenis_spesialis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
