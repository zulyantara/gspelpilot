-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 08:45 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gspel1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('12vspd53291r5uodk57lalr7gnmlf403', '::1', 1498025595, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032353537353b),
('3r9nuq6bj6buj20d7vhqdtlept8dtaa6', '::1', 1498029958, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032393636343b6d6573736167657c733a37343a223c703e3c64697620636c6173733d22616c65727420616c6572742d64616e67657220616c6572742d6469736d69737361626c65223e476167616c206c6f67696e3c2f6469763e3c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('49a904gfm4n7e5a0tppdtmecusgjbs54', '::1', 1498032694, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383033323339393b),
('4eu75e0nlo7d6kttl25dvlk8g3kgkdoh', '::1', 1498041681, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383034313339383b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031372d30362d32312031373a33363a3331223b),
('5gadeomsl4r3l72gd7udkv26lc9q28b9', '::1', 1498041916, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383034313735393b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031372d30362d32312031373a33363a3331223b637372666b65797c733a383a2272503565767a4171223b5f5f63695f766172737c613a323a7b733a373a22637372666b6579223b733a333a226e6577223b733a393a226373726676616c7565223b733a333a226e6577223b7d6373726676616c75657c733a32303a22344b7075644d656e513563444e53546c71335731223b),
('5v5a0b4j5ino80r9vpj3clr3kni1mrtr', '::1', 1498031694, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383033313434333b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031362d31312d32302031323a35333a3530223b),
('9oef4s9grhanohs8h4gumn56l4nd3f9l', '::1', 1498028322, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032383032343b),
('a9rv6sdhu00s83teslnbv1hre29tnj3a', '::1', 1498032078, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383033323037383b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031362d31312d32302031323a35333a3530223b),
('bjoetecbmnn4fo4omdmo6ge298dh1889', '::1', 1498027844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032373535393b),
('fd9n253ae6jee8tp3td9954c3anl8mbs', '::1', 1498031060, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383033303736323b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031362d31312d32302031323a35333a3530223b),
('flgqjs1o80g20r2c3i04q0f7659fe86s', '::1', 1498028854, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032383635353b),
('fr53ie6oa596rqtqo38hkfkkcisethu3', '::1', 1498029596, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032393331303b6d6573736167657c733a37343a223c703e3c64697620636c6173733d22616c65727420616c6572742d64616e67657220616c6572742d6469736d69737361626c65223e476167616c206c6f67696e3c2f6469763e3c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('g28jkidi6a86ksmch8rgo8lnfl437a0k', '::1', 1498030302, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383033303036303b6d6573736167657c733a39303a223c703e3c64697620636c6173733d22616c65727420616c6572742d64616e67657220616c6572742d6469736d69737361626c65223e416b756e20416e64612064696b756e63692073656d656e746172613c2f6469763e3c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('gr2fm2828ufrgu515cktnb2c04ii0cds', '::1', 1498027532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032373530353b),
('i7e1n9e7tk0p6ouu79lq9b03minhipjq', '::1', 1498030614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383033303435303b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031362d31312d32302031323a35333a3530223b6d6573736167657c733a31343a224c6f67696e20626572686173696c223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('j6od5msr8eq3u8paempsvt07b0076aqo', '::1', 1498028589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032383333363b),
('klv5u21jmuhaujaadfj698p0c5uu573r', '::1', 1498028037, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032373836313b),
('m7qvd4gidoepgdpqlj293ufq2v224cmf', '::1', 1498051200, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383035313136353b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031372d30362d32312031373a33363a3331223b),
('nsapb6744m2lvmqc0olrj7276hjjp779', '::1', 1498041028, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383034303734303b),
('o6bcol4q1eqn7il0p5qdpe30ejsu9u1g', '::1', 1498027430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032373134323b),
('oitn26ea20kch3amuogikqcdrsqa1rtp', '::1', 1498031418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383033313132323b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031362d31312d32302031323a35333a3530223b),
('q5vjk8miqta334lhr7mjjra5k406ljou', '::1', 1498025304, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032353238393b),
('qai6g1gdl02rjfdscqsue5p1bic9c02s', '::1', 1498046134, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383034363133343b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031372d30362d32312031373a33363a3331223b637372666b65797c733a383a22754a644e76413071223b5f5f63695f766172737c613a323a7b733a373a22637372666b6579223b733a333a226f6c64223b733a393a226373726676616c7565223b733a333a226f6c64223b7d6373726676616c75657c733a32303a2261304e4d696539355134503364734c524f596e36223b),
('qg0jbks8mk4qj9hn2t31m76rfgnfijo3', '::1', 1498032936, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383033323734323b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031362d31312d32302031323a35333a3530223b),
('qgt3u8bbg101obeh7o0qdbfiubc482a8', '::1', 1498044652, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383034343635323b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031372d30362d32312031373a33363a3331223b637372666b65797c733a383a22754a644e76413071223b5f5f63695f766172737c613a323a7b733a373a22637372666b6579223b733a333a226e6577223b733a393a226373726676616c7565223b733a333a226e6577223b7d6373726676616c75657c733a32303a2261304e4d696539355134503364734c524f596e36223b),
('qsvvpp4jv61mk4epvqtiehd7qmk2eg93', '::1', 1498046553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383034363535333b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031372d30362d32312031373a33363a3331223b),
('uha3vivnudm5f1mp7nep1o40p626vvpe', '::1', 1498025892, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383032353636353b),
('uhpohc7f3kh12a50tahtvm11il8ufalp', '::1', 1498032017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383033313737353b6964656e746974797c733a31303a22737570657261646d696e223b757365726e616d657c733a31303a22737570657261646d696e223b6e616d617c733a31303a22537570657261646d696e223b656d61696c7c733a32303a22737570657261646d696e40676d61696c2e636f6d223b75736572747970657c733a31303a22737570657261646d696e223b757365725f69647c733a313a2237223b6f6c645f6c6173745f6c6f67696e7c733a31393a22323031362d31312d32302031323a35333a3530223b);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(6, '::1', 'admin', 1498041400);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_butir_peribadi`
--

CREATE TABLE IF NOT EXISTS `permohonan_butir_peribadi` (
  `id` int(10) NOT NULL,
  `nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_lahir` date NOT NULL,
  `kewarganegaraan` int(10) NOT NULL,
  `umur` int(3) NOT NULL,
  `no_telefon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` int(11) NOT NULL,
  `poskod` int(10) NOT NULL,
  `emel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bangsa` int(10) NOT NULL,
  `etnik` int(10) NOT NULL,
  `agama` int(10) NOT NULL,
  `taraf_perkahwinan` int(10) NOT NULL,
  `kategori_kelulusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelulusan` int(10) NOT NULL,
  `matlamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_pemohon` int(10) NOT NULL,
  `no_rujukan_permohonan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengesahan` int(2) NOT NULL,
  `pengakuan` int(2) NOT NULL,
  `tarikh_hantar` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonan_butir_peribadi`
--

INSERT INTO `permohonan_butir_peribadi` (`id`, `nama_penuh`, `no_mykad`, `tarikh_lahir`, `kewarganegaraan`, `umur`, `no_telefon`, `no_hp`, `alamat`, `poskod`, `emel`, `bangsa`, `etnik`, `agama`, `taraf_perkahwinan`, `kategori_kelulusan`, `kelulusan`, `matlamat`, `kategori_pemohon`, `no_rujukan_permohonan`, `pengesahan`, `pengakuan`, `tarikh_hantar`) VALUES
(1, 'ssf', 'dsds', '0000-00-00', 0, 0, '13131', '311', 0, 0, 'sdsd', 0, 0, 0, 0, 'dsds', 0, 'dsds', 0, 'dsds', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_kursus`
--

CREATE TABLE IF NOT EXISTS `permohonan_kursus` (
  `id` int(10) NOT NULL,
  `id_permohonan` int(10) NOT NULL,
  `kursus1` int(10) NOT NULL,
  `kursus2` int(10) NOT NULL,
  `kursus3` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_maklumat_am`
--

CREATE TABLE IF NOT EXISTS `permohonan_maklumat_am` (
  `id` int(10) NOT NULL,
  `id_permohonan` int(10) NOT NULL,
  `media_cetak` int(1) NOT NULL DEFAULT '0',
  `media_elektronik` int(1) NOT NULL DEFAULT '0',
  `internet` int(1) NOT NULL DEFAULT '0',
  `media_sosial` int(1) NOT NULL DEFAULT '0',
  `rakan` int(1) NOT NULL DEFAULT '0',
  `keluarga` int(1) NOT NULL DEFAULT '0',
  `pameran` int(1) NOT NULL DEFAULT '0',
  `lain` int(1) NOT NULL DEFAULT '0',
  `text_lain` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_penjaga`
--

CREATE TABLE IF NOT EXISTS `permohonan_penjaga` (
  `id` int(10) NOT NULL,
  `id_permohonan` int(10) NOT NULL,
  `maklumat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_hubungan` int(10) NOT NULL,
  `a_jenis_pengenalan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_kewarganegaraan` int(10) NOT NULL,
  `a_kategori_penjaga` int(10) NOT NULL,
  `a_no_tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_agama` int(10) NOT NULL,
  `a_etnik` int(10) NOT NULL,
  `a_bangsa` int(10) NOT NULL,
  `a_alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_poskod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_pekerjaan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_pendapatan` int(10) NOT NULL,
  `a_majikan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_no_tel_pejabat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_samb` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_alamat_pejabat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_jenis_pengenalan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_kewarganegaraan` int(10) NOT NULL,
  `b_kategori_penjaga` int(10) NOT NULL,
  `b_no_tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_agama` int(10) NOT NULL,
  `b_etnik` int(10) NOT NULL,
  `b_bangsa` int(10) NOT NULL,
  `b_alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_poskod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_pekerjaan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_pendapatan` int(10) NOT NULL,
  `b_majikan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_no_tel_pejabat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_samb` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_alamat_pejabat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_jenis_pengenalan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_kewarganegaraan` int(10) NOT NULL,
  `c_kategori_penjaga` int(10) NOT NULL,
  `c_no_tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_agama` int(10) NOT NULL,
  `c_etnik` int(10) NOT NULL,
  `c_bangsa` int(10) NOT NULL,
  `c_alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_poskod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_pekerjaan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_pendapatan` int(10) NOT NULL,
  `c_majikan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_no_tel_pejabat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_samb` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_alamat_pejabat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_tempat_tinggal`
--

CREATE TABLE IF NOT EXISTS `permohonan_tempat_tinggal` (
  `id` int(10) NOT NULL,
  `id_permohonan` int(10) NOT NULL,
  `tempat_tinggal` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengangkutan` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_agama`
--

CREATE TABLE IF NOT EXISTS `ref_agama` (
  `id` int(10) NOT NULL,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_agama`
--

INSERT INTO `ref_agama` (`id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Hindu'),
(3, 'Buddha'),
(4, 'Sikh'),
(5, 'Kristian'),
(6, 'Bebas'),
(7, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `ref_bangsa`
--

CREATE TABLE IF NOT EXISTS `ref_bangsa` (
  `id` int(10) NOT NULL,
  `bangsa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_bangsa`
--

INSERT INTO `ref_bangsa` (`id`, `bangsa`) VALUES
(1, 'Melayu'),
(2, 'Cina'),
(3, 'India'),
(4, 'Bumiputera Sabah'),
(5, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `ref_etnik`
--

CREATE TABLE IF NOT EXISTS `ref_etnik` (
  `id` int(10) NOT NULL,
  `etnik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_etnik`
--

INSERT INTO `ref_etnik` (`id`, `etnik`) VALUES
(1, 'Melayu'),
(2, 'Cina'),
(3, 'India'),
(4, 'Iban'),
(5, 'Bidayuh'),
(6, 'Melanau'),
(7, 'Dusun');

-- --------------------------------------------------------

--
-- Table structure for table `ref_giatmara`
--

CREATE TABLE IF NOT EXISTS `ref_giatmara` (
  `id` int(5) NOT NULL,
  `kod_giatmara` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `nama_giatmara` varchar(60) DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tel_no` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `fax_no` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `registered` datetime DEFAULT NULL,
  `co_status` int(2) DEFAULT NULL,
  `id_bandar` int(5) DEFAULT NULL,
  `company_type` int(2) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `updatedby` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `id_negeri` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=299 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_giatmara`
--

INSERT INTO `ref_giatmara` (`id`, `kod_giatmara`, `nama_giatmara`, `alamat`, `tel_no`, `fax_no`, `email`, `registered`, `co_status`, `id_bandar`, `company_type`, `updatedon`, `updatedby`, `id_negeri`) VALUES
(262, '575', 'KOTA RAJA', 'NO. 41, JALAN KOTA RAJA L27/L\nHICOM TOWN CENTRE\nSEKSYEN 27,\n40400 SHAH ALAM\nSELANGOR', '03-51034223', '03-51034225', 'gmkotaraja@giatmara.edu.my', '2008-12-26 16:28:04', 1, 2643, 1, '2013-08-22 00:00:00', '810831025116', 10),
(263, '573', 'PANDAN', 'Lot 3G, Jalan Perubatan 4\nPandan Indah\n55100 Kuala Lumpur', '03-42950061', '03-42950048 ', 'gmpandan@giatmara.edu.my', '2008-12-26 16:28:04', 1, 11750, 1, '2013-09-27 00:00:00', '810415055199', 10),
(1, 'HQD', 'Ibu Pejabat GIATMARA', 'Wisma GIATMARA, No 39, Jalan Medan Tuanku, 50300 Kuala Lumpur', '03-26912690', '03-26912690', '', '2006-01-15 00:00:00', 1, 9757, 3, '2012-05-29 00:00:00', 'admin', 0),
(2, 'HQ1', 'Ibu Pejabat GIATMARA', 'Wisma GIATMARA, No 39, Jalan Medan Tuanku, 50300 Kuala Lumpur', '03-26912690', '03-26912690', '', '2006-01-15 00:00:00', 1, 9757, 4, '2012-05-29 00:00:00', 'admin', 0),
(3, '539', 'GIATMARA PERLIS', 'Lot No. C5, Kompleks Mara Kangar, Persiaran Jubli Emas, 01000 Kangar Perlis Indera Kayangan', '04-9782984', '04-9760914', 'gmperlis@giatmara.edu.my', '2006-01-15 00:00:00', 1, 24440, 2, '2015-05-12 00:00:00', '670416095027', 0),
(4, '535', 'GIATMARA PERAK', 'No. 10 & 10A, Medan Istana 6, Bandar Ipoh Raya 30000 Ipoh Perak Darul Ridzuan', '05-2536784', '05-2536782', 'gmperak@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27805, 2, '2015-02-25 00:00:00', '690102086468', 0),
(5, '532', 'GIATMARA MELAKA', 'Tingkat 4  Kompleks Mara, \nJalan Hang Tuah \n75300 Kota Melaka', '06-2843101', '06-2843103', '', '2006-01-15 00:00:00', 1, 30770, 2, '2013-06-12 00:00:00', '', 0),
(6, '537', 'GIATMARA PAHANG', 'Tingkat 4, Bangunan Tabung Haji, Jalan Bukit Ubi, 25150 Kuantan, Pahang Darul Makmur', '09-5135178', '09-5132175', 'gmpahang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 33403, 2, '2014-04-07 00:00:00', '570601055889', 0),
(7, '543', 'GIATMARA SARAWAK', 'No. 15C, Tingkat 2, Kompleks MARA Satok Parade, Jalan Satok, 93400 Kuching, Sarawak', '082-237958', '082-237953', 'gmsarawak@giatmara.edu.my', '2006-01-15 00:00:00', 1, 26073, 2, '2014-06-24 00:00:00', '821216135165', 0),
(8, '536', 'GIATMARA KEDAH', 'GIATMARA Kedah\nLot 9 &10, Tingkat 2, Komplek Perniagaan Utama,\n05150 Alor Setar, Kuala Kedah', '04-7204480', '04-7204481', 'gmkedah@giatmara.edu.my', '2006-01-15 00:00:00', 0, 36835, 2, '2013-09-05 00:00:00', '691027125002', 0),
(9, '544', 'GIATMARA WILAYAH PERSEKUTUAN', 'No.29-1, Jalan 46B/26,Pusat Bandar Sri Rampai,\r\nSetapak,53300 Kuala Lumpur', '03-41420522', '03-41421252', '', '2006-01-15 00:00:00', 1, 12050, 2, '2009-11-25 14:01:29', '810605065216', 0),
(10, '533', 'GIATMARA NEGERI SEMBILAN', 'PEJABAT GIATMARA NEGERI SEMBILAN\n\nLOT 10240, TINGKAT 1,\n\nJALAN DATO'' MUDA LINGGI,\n\n70100 SEREMBAN,\n\nNEGERI SEMBILAN.', '06-7687280', '06-7687281', 'gmnegerisembilan@giatmara.edu.my', '2006-01-15 00:00:00', 1, 31608, 2, '2016-08-25 00:00:00', '700922025261', 0),
(11, '541', 'GIATMARA TERENGGANU', 'Lot PT 29766, Tingkat 1,\nTaman Bestari, Gong Badak\n21300 Kuala Nerus.\nTerengganu.', '096531863', '096531750', '', '2006-01-15 00:00:00', 1, 39869, 2, '2016-03-07 00:00:00', '810415055199', 0),
(12, '542', 'GIATMARA SABAH', 'PEJABAT GIATMARA NEGERI SABAH\r\nLot 13, Tkt 2,Likas Plaza,Jln Tuaran\r\n88400 Kota Kinabalu \r\nSABAH', '088-437072', '088-437086', '', '2006-01-15 00:00:00', 1, 18982, 2, '2009-11-11 09:35:50', '610602125475', 0),
(13, '538', 'GIATMARA PULAU PINANG', 'Lot 12A -2 Jalan Usahawan 4 Pusat Perniagaan Kepala Batas 13200 Kepala Batas Pulau Pinang', '04-5741151', '04-5741153', 'gmnpulaupinang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22284, 2, '2014-07-20 00:00:00', '700922025261', 0),
(14, '534', 'GIATMARA SELANGOR', 'Lot 24A , Tingkat 1, Blok 4, Pusat Perniagaan Worldwide, Jalan Karate 13/47, Seksyen 13, 40675 Shah Alam, Selangor D. E.', '03-55102775', '03-55102906', '', '2006-01-15 00:00:00', 1, 1, 2, '2014-01-03 00:00:00', '780709135544', 0),
(15, '531', 'GIATMARA JOHOR', 'Pejabat GIATMARA Negeri Johor, Tingkat 4, Bangunan MARA, Jalan Segget, 80000 Johor Bahru, Johor', '07-224 4032', '07-224 4031', 'gmjohor@giatmara.edu.my', '2006-01-15 00:00:00', 1, 16947, 2, '2013-10-01 00:00:00', '790317125389', 0),
(16, '540', 'GIATMARA KELANTAN', 'WISMA AMANI,\r\n\nLOT PT 200 & 201,\r\n\nTMN MAJU, JLN SULTAN YAHYA PETRA,\r\n\n15200 KOTA BHARU,\r\n\nKELANTAN', '09-7422990', '09-7422992', 'gmkelantan@giatmara.edu.my', '2006-01-15 00:00:00', 1, 32522, 2, '2015-10-26 00:00:00', '810415055199', 0),
(17, '407', 'KANGAR', 'no.20, tingkat 1, jalan jejawi sematang, kawasan perindustrian jejawi, 02600, Arau, Perlis', '04-9764773', '04-9761716', 'gmkangar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 25678, 1, '2014-10-29 00:00:00', '670416095027', 0),
(18, '479', 'ARAU', 'Lot PT 1260, Mukim Jejawi, 02600 Arau,\nPerlis.', '04-9764268', '04-9760225', 'gmarau@giatmara.edu.my', '2006-01-15 00:00:00', 1, 25747, 1, '2013-09-26 00:00:00', '810415055199', 0),
(19, '634', 'PADANG BESAR', 'Kompleks Logistik IPK Mata Ayer, \nMata Ayer, 02500 Chuping,\nPerlis.', '04-9383622', '04-9383862', 'gmpadangbesar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 25697, 1, '2013-09-26 00:00:00', '810415055199', 0),
(20, '401', 'KUBANG PASU', 'BT. 13 1/2, Jalan Changloon, 06000 Jitra, Kedah', '04-9171125', '04-9174094', 'gmkubangpasu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 35549, 1, '2013-09-27 00:00:00', '810415055199', 0),
(21, '413', 'BALING', 'Jalan Charok Nau, 09100 Baling', '04-4701007', '04-4701710', 'gmbaling@giatmara.edu.my', '2006-01-15 00:00:00', 1, 31156, 1, '2014-01-30 00:00:00', '810415055199', 0),
(22, '454', 'ALOR SETAR', 'Bangunan Kedai MARA, Jalan Seberang Perak, 05400 Alor Setar', '04-7721303', '04-7728867', 'gmalorsetar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 34949, 1, '2013-09-05 00:00:00', '691027125002', 0),
(271, '684', 'PASIR GUDANG', 'JALAN PERMAS SELATAN,\nBANDAR BARU PERMAS JAYA,\n81750 MASAI, JOHOR', '07-3889848', '07-3889849', 'gmpasirgudang@giatmara.edu.my', '2011-01-07 21:34:20', 1, 44512, 1, '2013-09-25 00:00:00', '810415055199', 0),
(51, '466', 'IPOH TIMUR', 'No 5, Jalan Zarib 8, Zarib Industrial Park, 31500 Perak', '053226385', '053215346', 'gmipohtimur@giatmara.edu.my', '2006-01-15 00:00:00', 1, 40565, 1, '2013-09-26 00:00:00', '810415055199', 0),
(52, '477', 'LUMUT', 'Lebuhraya KI/Lumut, Bt 8 Lekir 32020 Sitiawan', '05-6798152', '05-6798152', 'gmlumut@giatmara.edu.my', '2006-01-15 00:00:00', 1, 28501, 1, '2013-09-26 00:00:00', '810415055199', 0),
(54, '464', 'BAGAN SERAI', 'Simpang 4, 34400 Semanggol,\nPerak', '05-8921250', '05-8921251', 'gmbaganserai@giatmara.edu.my', '2006-01-15 00:00:00', 1, 40276, 1, '2013-08-23 00:00:00', '600102085391', 0),
(55, '606', 'BERUAS', 'No 40, Taman Desa Pantai 11, \n34900 Pantai Remis, \nPerak.', '05-6779010', '05-6779011', 'gmberuas@giatmara.edu.my', '2006-01-15 00:00:00', 1, 20254, 1, '2013-08-23 00:00:00', '580205086295', 0),
(56, '435', 'TAIPING', 'Lot 20834 Jalan Logam 6,\nKawasan Perindustrian Kamunting Raya,\n34600 Kamunting,\nPerak Darul Ridzuan', '05-8912045', '05-8064075', 'gmtaiping@giatmara.edu.my', '2006-01-15 00:00:00', 1, 21579, 1, '2016-09-27 00:00:00', '810415055199', 0),
(57, '670', 'LENGGONG', 'PL 23/1,\nKAMPUNG KUBANG JAMBU,\nJALAN BESAR,\nKAMPUNG MASJID LAMA,\n33400 LENGGONG\nPERAK.', '05-7679712,057', '05-7679712', 'gmlenggong@giatmara.edu.my', '2006-01-15 00:00:00', 1, 21481, 1, '2013-08-23 00:00:00', '630131085865', 0),
(58, '613', 'KUALA KANGSAR', 'Dewan Orang Ramai, Rancangan Perumahan  Awam 2 & 3, 33800 Kuala Kangsar', '05-7438610', '05-7438611', 'gmkualakangsar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 43995, 1, '2013-09-26 00:00:00', '810415055199', 0),
(59, '465', 'SUNGAI SIPUT', 'Simpang Kampung Sentosa,\n31100 Sungai Siput (U),\nPerak Darul Ridzuan.', '05-5951611', '05-5951610', 'gmsungaisiput@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27172, 1, '2013-08-23 00:00:00', '730327086155', 0),
(60, '604', 'BATU GAJAH', 'No. 59, Jalan  Perpaduan, 31000 Batu Gajah', '05-3633967', '05-3633967', 'gmbatugajah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 36739, 1, '2013-09-26 00:00:00', '810415055199', 0),
(61, '424', 'TELUK INTAN', 'Jalan Si Putum, 36000 Teluk Intan.', '05-6254242', '05-6254240', 'gmtelukintan@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22805, 1, '2014-06-10 00:00:00', '810721105393', 0),
(62, '669', 'TAMBUN', 'Lot 157835, Batu 7 1/2, Jalan Tambun, 31150 Ulu Kinta', '05-5499582', '05-5495030', 'gmtambun@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27803, 1, '2013-09-26 00:00:00', '810415055199', 0),
(63, '638', 'LARUT', 'Lot 3207, Jalan Sir Chulan, 34100 Selama', '05-8392812', '05-8396377', 'gmlarut@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22114, 1, '2013-09-26 00:00:00', '810415055199', 0),
(64, '649', 'GOPENG', 'No. 19,Jalan Kampar, 31600 Gopeng', '05-3592301', '05-3592301', 'gmgopeng@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27861, 1, '2013-08-23 00:00:00', '580610085069', 0),
(65, '607', 'BUKIT GANTANG', 'Dewan Bacaan Lama, Kampung Cheh Hulu, 34850 Changkat Jering', '05-8554251', '05-8551253', 'gmbukitgantang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22733, 1, '2013-09-26 00:00:00', '810415055199', 0),
(66, '680', 'IPOH BARAT', 'No 155, Jalan Dato'' Onn Jaafar, 30300 Ipoh Perak', '052497718', '052497717', 'gmipohbarat@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27824, 1, '2013-09-26 00:00:00', '810415055199', 0),
(67, '471', 'PADANG RENGAS', 'No 47, Jalan Perindustrian MIEL, \nKawasan Perindustrian MIEL, \n33010 Kuala Kangsar, Perak', '05-7733611', '05-7733612', 'gmpadangrengas@giatmara.edu.my', '2006-01-15 00:00:00', 1, 43995, 1, '2013-08-23 00:00:00', '650919115183', 0),
(68, '404', 'MUADZAM SHAH', 'Kawasan perindustrian,26700 Muadzam Shah', '09-4522366', '09-4523607', 'gmmuadzamshah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 34689, 1, '2015-08-03 00:00:00', '570601055889', 0),
(69, '405', 'JENGKA', '26400 Bandar Jengka, Pahang Darul Makmur', '09-4662375', '09-4662354', 'gmjengka@giatmara.edu.my', '2006-01-15 00:00:00', 1, 34037, 1, '2013-09-26 00:00:00', '810415055199', 0),
(70, '418', 'PAYA BESAR', 'Km. 8, Jalan Gambang, 25150 Kuantan ', '09-5366558', '09-5366557', 'gmpayabesar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 33401, 1, '2013-09-26 00:00:00', '810415055199', 0),
(71, '451', 'KUALA LIPIS', 'Lot 3347, Kampung Kuala Lanar, 27200 Kuala Lipis', '09-3122062', '09-3121892', 'gmkualalipis@giatmara.edu.my', '2006-01-15 00:00:00', 1, 35363, 1, '2013-09-26 00:00:00', '810415055199', 0),
(72, '457', 'TEMERLOH', 'Jalan Padang, 28400 Mentakab', '09-2773700', '09-2775181', 'gmtemerloh@giatmara.edu.my', '2006-01-15 00:00:00', 1, 36136, 1, '2013-09-26 00:00:00', '810415055199', 0),
(73, '434', 'ROMPIN', 'Kilometer 5.5, Jalan Sabak, , 26800 Kuala Rompin,Pahang', '09-4146190', '09-4141908', 'gmrompin@giatmara.edu.my', '2006-01-15 00:00:00', 1, 44256, 1, '2013-12-20 00:00:00', '810415055199', 0),
(74, '614', 'INDERA MAHKOTA', 'Lot 758,\nKg. Balok Pantai,\n26100 Kuantan,  \nPahang.', '095807353', '095807351', 'gminderamahkota@giatmara.edu.my', '2006-01-15 00:00:00', 1, 44163, 1, '2016-08-19 00:00:00', '810415055199', 0),
(75, '487', 'RAUB', 'Lot No 31388 , \nJalan Taman Mewah \n27600 Raub', '09-3557670', '09-3557734', 'gmraub@giatmara.edu.my', '2006-01-15 00:00:00', 1, 35992, 1, '2014-12-05 00:00:00', '810415055199', 0),
(76, '608', 'JERANTUT', 'Km 9, Kampung Sri Muda, 27000 Jerantut', '09-2663541', '09-2671687', 'gmjerantut@giatmara.edu.my', '2006-01-15 00:00:00', 1, 34761, 1, '2013-09-26 00:00:00', '810415055199', 0),
(77, '689', 'PEKAN', 'Lot PT 1732, Mukim Langgar, Bandar Baru Peramu, 26600 Pekan', '09-4260273', '09-4260275', 'gmpekan@giatmara.edu.my', '2006-01-15 00:00:00', 1, 34078, 1, '2013-09-26 00:00:00', '810415055199', 0),
(78, '671', 'BERA', 'Bandar 32 Bera, 28300 Triang', '09-2463235', '09-2496236', 'gmbera@giatmara.edu.my', '2006-01-15 00:00:00', 1, 36026, 1, '2013-09-26 00:00:00', '810415055199', 0),
(79, '678', 'BENTONG', 'Lot 2738, Jalan Karak Mentakab, Batu 4, Karak Setia, Karak 28600 Bentong', '09-2312790', '09-2311907', 'gmbentong@giatmara.edu.my', '2006-01-15 00:00:00', 1, 36673, 1, '2013-09-26 00:00:00', '810415055199', 0),
(80, '650', 'CAMERON HIGHLANDS', 'FELDA Sg Koyan 3, 27650 Raub', '09-3402952', '09-3402952', 'gmcameronhighlands@giatmara.edu.my', '2006-01-15 00:00:00', 1, 35996, 1, '2013-09-26 00:00:00', '810415055199', 0),
(81, '402', 'KOTA BHARU', 'Jalan Talipot, 15150 Kota Bharu', '09-7447058', '09-7447058', 'gmkotabharu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 32552, 1, '2013-09-26 00:00:00', '810415055199', 0),
(82, '432', 'MACHANG', 'GIATMARA MACHANG, BANGUNAN BALAI POLIS LAMA, 18500 MACHANG KELANTAN', '09-9750016', '09-9755017', 'gmmachang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 29433, 1, '2013-09-26 00:00:00', '810415055199', 0),
(83, '416', 'TUMPAT', 'Kampung 7, 16200 Tumpat', '09-7211994', '09-7211577', 'gmtumpat@giatmara.edu.my', '2006-01-15 00:00:00', 1, 34408, 1, '2015-12-21 00:00:00', '810415055199', 0),
(84, '467', 'PASIR MAS', 'LOT 2772 KAMPUNG SAKAR\n17030 PASIR MAS', '09-7901710', '09-7902795', 'gmpasirmas@giatmara.edu.my', '2006-01-15 00:00:00', 1, 36374, 1, '2013-11-19 00:00:00', '810415055199', 0),
(85, '490', 'PASIR PUTEH', 'Lot 1466, Mukim Selising, 16810 Selising', '09-7891319', '09-7891213', 'gmpasirputeh@giatmara.edu.my', '2006-01-15 00:00:00', 1, 35128, 1, '2014-06-17 00:00:00', '810415055199', 0),
(86, '601', 'BACHOK', 'LOT 665, SERDANG BARU\n16310 BACHOK, KELANTAN\n', '09-7787310', ' 09-7787312', 'gmbachok@giatmara.edu.my', '2006-01-15 00:00:00', 1, 35025, 1, '2014-05-07 00:00:00', '710426115355', 0),
(87, '675', 'JELI', 'GIATMARA JELI\nLOT 6099,KAMPUNG WAKAF ZING,\nAYER LANAS,\n17700 JELI,KELANTAN.', '09-9468550', '09-9468553', 'gmjeli@giatmara.edu.my', '2006-01-15 00:00:00', 1, 28171, 1, '2014-11-25 00:00:00', '810415055199', 0),
(88, '639', 'NILAM PURI', 'Kampung Badak Mati Banggu, \n16150 Kota Bharu, \nKelantan', '09-7964194', '09-7964195', 'gmnilampuri@giatmara.edu.my', '2006-01-15 00:00:00', 1, 33673, 1, '2013-09-26 00:00:00', '810415055199', 0),
(89, '443', 'GUA MUSANG', 'FELDA Chiku 5, 18300 Gua Musang', '09-9140161', ' 09-9287637', 'gmguamusang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 29332, 1, '2014-05-07 00:00:00', '710426115355', 0),
(90, '645', 'TANAH MERAH', 'Batu 4, Jalan Machang Jeli, 17500 Tanah Merah', '09-9775209', '09-9775209', 'gmtanahmerah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 37119, 1, '2013-09-26 00:00:00', '810415055199', 0),
(91, '497', 'RANTAU PANJANG', 'FELCRA Bukit Tandak, 17200 Rantau Panjang', '013-9603434 ', '-', 'gmrantaupanjang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 36404, 1, '2013-09-26 00:00:00', '810415055199', 0),
(92, '611', 'KUALA KRAI', 'Kg Jelawang, 18200 Dabong, Kuala Krai', '09-9362689', '09-9361689', 'gmkualakrai@giatmara.edu.my', '2006-01-15 00:00:00', 1, 29313, 1, '2013-09-26 00:00:00', '810415055199', 0),
(94, '403', 'DUNGUN', 'Batu 16, Kampung Nyior, 23100 Paka', '09-8286122', '09-8286123', 'gmdungun@giatmara.edu.my', '2006-01-15 00:00:00', 1, 39131, 1, '2013-09-27 00:00:00', '810415055199', 0),
(95, '417', 'MARANG', 'Jalan Rawai, Bukit Payong, 21400 Marang, Terengganu.', '09-6102030', '09-6102031', 'gmmarang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38867, 1, '2013-09-27 00:00:00', '810415055199', 0),
(96, '468', 'HULU TERENGGANU', 'GIATMARA HULU TERENGGANU,\nKampung Kuala Telemong, \n21210 Kuala Terengganu.\nTerengganu.', '09-6142130', '09-6142131', 'gmhuluterengganu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38862, 1, '2013-09-27 00:00:00', '810415055199', 0),
(97, '411', 'SETIU', 'Kampung Pak Kancil, Bandar Permaisuri, 22100 Setiu', '09-6097541', '09-6097542', 'gmsetiu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 39063, 1, '2013-09-27 00:00:00', '810415055199', 0),
(98, '449', 'KETENGAH', 'Bandar Al-Muktafi Billah Shah\n23400 Dungun\nTerengganu Darul Iman', '09-8211380', '09-8221361', 'gmketengah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 39141, 1, '2013-09-27 00:00:00', '810415055199', 0),
(99, '461', 'BESUT', 'Jalan Batu Tumbuh, Alor Lintang, 22200 Besut', '09-6950649', '09-6950850', 'gmbesut@giatmara.edu.my', '2006-01-15 00:00:00', 1, 39072, 1, '2013-09-27 00:00:00', '810415055199', 0),
(100, '448', 'KEMAMAN', 'Lot Pt. 2640,\nKampung Titian Berayun,\n24100 Kijal, Terengganu.', '09-8623140', '09-8623142', 'gmkemaman@giatmara.edu.my', '2006-01-15 00:00:00', 1, 39344, 1, '2013-09-27 00:00:00', '810415055199', 0),
(102, '441', 'BATU RAKIT', 'Lot 9278, Kampung Wakaf Cagak, Batu Rakit, 21020 K. Terengganu', '09-6693117', '09-6692136', 'gmbaturakit@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38716, 1, '2013-09-27 00:00:00', '810415055199', 0),
(103, '685', 'KUALA NERUS', 'Kampung Bukit Petiti, Belara, 21200 K. Terengganu', '09-6301062', '09-6301061', 'gmkualanerus@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38795, 1, '2013-09-27 00:00:00', '810415055199', 0),
(104, '415', 'KUALA LANGAT', 'Jalan Sultan Abdul Samad, 42700 Banting', '03-31879490', '03-31877790', 'gmkualalangat@giatmara.edu.my', '2006-01-15 00:00:00', 1, 3558, 1, '2013-09-27 00:00:00', '810415055199', 0),
(106, '438', 'SABAK BERNAM', 'No.1 & 3, Jalan PPSL 2,\nPusat Perniagaan Sungai Lias,\n45300, Sungai Besar,\nSelangor', '03-32245107', '03-32245108', 'gmsabakbernam@giatmara.edu.my', '2006-01-15 00:00:00', 1, 5090, 1, '2013-08-23 00:00:00', '790907085399', 0),
(107, '460', 'KAPAR', 'Lot 1613, Jalan Rantau Panjang, Mukim Kapar, 42100 Klang', '03-32914815', '03-32914940', 'gmkapar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 3369, 1, '2013-09-27 00:00:00', '810415055199', 0),
(108, '425', 'HULU SELANGOR', 'Lot 3, Bekas Sek.Keb. Kalumpang, 44100 Kalumpang', '03-60491899', '0360492494', 'gmhuluselangor@giatmara.edu.my', '2006-01-15 00:00:00', 1, 4678, 1, '2013-09-27 00:00:00', '810415055199', 0),
(110, '442', 'BANGI', 'Jalan P/9a Seksyen 13, 43650 Bandar Baru Bangi', '03-89251978', '03-89251977', 'gmbangi@giatmara.edu.my', '2006-01-15 00:00:00', 1, 3292, 1, '2013-09-27 00:00:00', '810415055199', 0),
(111, '620', 'PUCHONG', 'Batu 13, Jalan Kelang,\n47100 Puchong\nSelangor', '03-80613470', '03-80608854', 'gmpuchong@giatmara.edu.my', '2006-01-15 00:00:00', 1, 8937, 1, '2013-09-27 00:00:00', '810415055199', 0),
(112, '623', 'SEPANG', 'Pekan Salak, 43900 Sepang', '03-87061357', '03-87061357', 'gmsepang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 4566, 1, '2013-08-23 00:00:00', '600423025541', 0),
(113, '426', 'TANJUNG KARANG', 'Kampung Sungai Terap, Batu 3, Jalan Bernam, 45000 Kuala Selangor', '03-32895684', '03-32895684', 'gmtanjungkarang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 4840, 1, '2013-09-27 00:00:00', '810415055199', 0),
(114, '427', 'HULU LANGAT', 'NO 65, 66, 67 JALAN PRIMA SAUJANA 1/1A, \nTAMAN PRIMA SAUJANA SEKSYEN 1,\n43000 KAJANG, SELANGOR', '03-87395602', '03-87395601', 'gmhululangat@giatmara.edu.my', '2006-01-15 00:00:00', 1, 4475, 1, '2013-09-27 00:00:00', '810415055199', 0),
(115, '628', 'SUNGAI BESAR', 'Jalan Balai Polis, 45400 Sekinchan, Selangor Darul Ehsan', '03-32418470', '03-32418471', 'gmsungaibesar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 5120, 1, '2013-09-27 00:00:00', '810415055199', 0),
(116, '455', 'PETALING JAYA (SELATAN)', 'Lot 8247, Jalan 225, 46100 Petaling Jaya', '03-79579721', '03-79574623', 'gmpetalingjaya@giatmara.edu.my', '2006-01-15 00:00:00', 1, 7314, 1, '2013-09-27 00:00:00', '810415055199', 0),
(118, '679', 'GOMBAK', 'NO. 3-G & 3A-G, PUSAT KOMERSIAL AMANIAH,\nJALAN AMANIAH MULIA 1,\nTAMAN AMANIAH MULIA,\n68100 BATU CAVES,\nSELANGOR DARUL EHSAN.\n', '03-61857972', '03-61857260', 'gmgombak@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38499, 1, '2013-08-23 00:00:00', '811229085380', 0),
(175, '619', 'PETRA JAYA', 'Lot 2874 & 2875, Lorong B1, Tingkat 1, Rpr Fasa 2, Jalan Astana, Petra Jaya, \n93050 Kuching, Sarawak.', '082-312413', '082-441926', 'gmpetrajaya@giatmara.edu.my', '2006-01-15 00:00:00', 1, 23090, 1, '2013-09-19 00:00:00', '840106125605', 0),
(176, '657', 'LUBOK ANTU', 'GIATMARA LUBOK ANTU\nLOT 146, BLOK 9\nBUKIT BESAI LAND DISTRICT\n95900 LUBOK ANTU\nSARAWAK', '083-584033', '083-584055', 'gmlubokantu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18540, 1, '2014-12-10 00:00:00', '821216135165', 0),
(177, '648', 'BATANG LUPAR', 'Kampung Baru, Jalan Sungai Rama, 94850 Sebuyau', '083-468863', '083-467958', 'gmbatanglupar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18008, 1, '2013-09-19 00:00:00', '840106125605', 0),
(178, '498', 'SRI AMAN', 'SUBLOT NO 13\nBLOK 2\nSIMANGGANG TOWN DISTRICT\n95000 SRI AMAN', '083-321179', '083-325889', 'gmsriaman@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18439, 1, '2013-12-16 00:00:00', '840106125605', 0),
(179, '683', 'JULAU', 'Rumah Kedai, No. 18, Pekan Julau, 96600 Julau, Sarawak.', '084-734789', '084-734787', 'gmjulau@giatmara.edu.my', '2006-01-15 00:00:00', 0, 19164, 1, '2013-09-27 00:00:00', '810415055199', 0),
(181, '478', 'KUDAT', 'Peti Surat 396,\n89058 Kudat, Sabah.', '088-612489', '088-612489', 'gmkudat@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22043, 1, '2013-08-31 00:00:00', '810415055199', 0),
(182, '470', 'KOTA BELUD', 'W.D.T. 151\nJalan Pusat GIATMARA\n89159 Kota Belud', '088-975006', '088-977610', 'gmkotabelud@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22056, 1, '2013-08-29 00:00:00', '780917125973', 0),
(183, '437', 'KOTA KINABALU', 'LOT 3 & 4, L.I.B KOLOMBONG,\nOFF JALAN LINTAS, JALAN LIMAU MANIS,\nPETI SURAT 16261,\n88869 KOTA KINABALU, SABAH.', '088-381153', '088-381154', 'gmkotakinabalu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 21926, 1, '2013-11-14 00:00:00', '810415055199', 0),
(184, '602', 'KOTA MARUDU', 'Peti Surat 252, 89108 Kota Marudu', '088-661120', '088-661120', 'gmkotamarudu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22049, 1, '2013-08-31 00:00:00', '810415055199', 0),
(185, '473', 'KENINGAU', 'Peti Surat 692, 89008 Keningau, Sabah', '087-331901', '087-332094', 'gmkeningau@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22031, 1, '2013-08-31 00:00:00', '810415055199', 0),
(187, '632', 'TAWAU', 'GIATMARA TAWAU\nTAMAN MEGAH JAYA\nBATU 4, JALAN APAS\nPETI SURAT 61260, 91022\nTAWAU SABAH.', '089-750507', '089-757013', 'gmtawau@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22600, 1, '2013-08-29 00:00:00', '681127125131', 0),
(119, '681', 'PETALING JAYA UTARA', 'NO 7 JALAN SS7/26,\nTAMAN SRI KELANA,\n47300 KELANA JAYA\nSELANGOR.', '0378042454', '0378035090', 'gmpetalingjayautara@giatmara.edu.my', '2006-01-15 00:00:00', 1, 4388, 1, '2014-02-07 00:00:00', '810415055199', 0),
(120, '482', 'KUALA LUMPUR', 'No 3A-3A Tingkat 4,\nWisma Q Titiwangsa,\nJalan Pahang,\n50300 Kuala Lumpur', '03-40323241', '-', 'gmkualalumpur@giatmara.edu.my', '2006-01-15 00:00:00', 1, 12019, 1, '2016-09-23 00:00:00', '810415055199', 0),
(121, '629', 'TITIWANGSA', 'No.13D Jalan Medan Tuanku\n50300 Kuala Lumpur', '03-26949136', '03-26943227', 'gmtitiwangsa@giatmara.edu.my', '2006-01-15 00:00:00', 1, 11041, 1, '2014-05-16 00:00:00', '810415055199', 0),
(122, '682', 'SEPUTEH', 'GIATMARA SEPUTEH,\nNO.8, JALAN 14/108C,\nTAMAN SUNGAI BESI,\n57100 KUALA LUMPUR', '03-79806243', '03-79806109', 'gmseputeh@giatmara.edu.my', '2006-01-15 00:00:00', 1, 9757, 1, '2013-07-09 00:00:00', '810415055199', 0),
(124, '652', 'KEPONG', 'GIATMARA Kepong, Tingkat Bawah, Blok F, PPR Intan Baiduri, 52100 Kepong Utara, Kuala Lumpur.\n', '03-61370361', '03-6137 0279', 'gmkepong@giatmara.edu.my', '2006-01-15 00:00:00', 1, 11426, 1, '2013-07-09 00:00:00', '810415055199', 0),
(125, '600', 'AMPANG JAYA', 'Bangunan UMNO Ampang, \nLot No. 4545-3,4,5 dan 6,\nNo. 100 Jalan Lembah Jaya,\n68000 Ampang,  \nSelangor.', '03-42874477', '-', 'gmampangjaya@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38336, 1, '2016-08-19 00:00:00', '810415055199', 0),
(126, '420', 'CHERAS', 'Blok 62, Perumahan Awam, Sri Sabah 3b, Batu 3 1/2, Jln Cheras 56100 Kuala Lumpur', '03-92849318', '03-9284697', 'gmcheras@giatmara.edu.my', '2006-01-15 00:00:00', 1, 39538, 1, '2013-07-09 00:00:00', '810415055199', 0),
(127, '406', 'TELOK KEMANG', 'Jalan Linggi/ Rantau, 71150 Linggi, Negeri Sembilan', '06-6970098', '06-6970151', 'gmtelokkemang', '2006-01-15 00:00:00', 1, 30808, 1, '2013-07-09 00:00:00', '810415055199', 0),
(128, '419', 'JEMPOL', 'BANDAR SERI JEMPOL\n72100 JEMPOL\nNEGERI SEMBILAN', '06-4581950', '06-4581046', 'gmjempol@giatmara.edu.my', '2006-01-15 00:00:00', 1, 31608, 1, '2013-07-09 00:00:00', '810415055199', 0),
(129, '463', 'KUALA PILAH', 'Batu 1, Jalan Seremban 7200 Kuala Pilah', '06-4815939', '06-4813950', 'gmkualapilah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 30891, 1, '2013-07-09 00:00:00', '810415055199', 0),
(130, '492', 'SEREMBAN', 'KM9, JALAN JELEBU,\n71770 SEREMBAN,\nNEGERI SEMBILAN', '06-7611971', '06-7628075', 'gmseremban@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27698, 1, '2013-07-09 00:00:00', '810415055199', 0),
(131, '491', 'TAMPIN', 'GIATMARA TAMPIN,\nFELDA PASIR BESAR,73420 GEMAS, NEGERI SEMBILAN', '06-4576579', '06-4576768', 'gmtampin@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27682, 1, '2013-07-09 00:00:00', '810415055199', 0),
(132, '450', 'JELEBU', 'Kampung Desa Semarak, Jalan Titi, 71650 Titi Jelebu', '06-6113801', '06-6113784', 'gmjelebu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 30823, 1, '2013-11-19 00:00:00', '820619115148', 0),
(133, '662', 'RASAH', 'Lot 200, Galla Industrial Park, \nJalan Labu, \n70200 Seremba\nNegeri Sembilan', '06-7633654', '06-7633654', 'gmrasah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 30123, 1, '2013-11-19 00:00:00', '820619115148', 0),
(134, '410', 'MASJID TANAH', 'Batu 21 1/2, Pengkalan Balak, 78300 Masjid Tanah', '06-3841732', '06-3845744', 'gmmasjidtanah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27605, 1, '2013-07-03 00:00:00', '810415055199', 0),
(135, '486', 'JASIN', 'Jalan Parit Putat, 77400 Sg. Rambai', '06-2659578', '06-2659254', 'gmjasin@giatmara.edu.my', '2006-01-15 00:00:00', 1, 35919, 1, '2013-07-03 00:00:00', '810415055199', 0),
(136, '641', 'ALOR GAJAH', 'Pekan Durian Tunggal, 76100 Melaka', '06-5534939', '16-5534937', 'gmalorgajah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 33287, 1, '2013-07-03 00:00:00', '810415055199', 0),
(137, '612', 'KOTA MELAKA', 'Tingkat 3, Kompleks MARA, Jalan Hang Tuah, 75300 Kota Melaka', '06-2826939', '06-2816939', 'gmkotamelaka@giatmara.edu.my', '2006-01-15 00:00:00', 1, 32113, 1, '2013-07-03 00:00:00', '810415055199', 0),
(138, '488', 'BUKIT KATIL', 'Lot 2344, Jalan Bayan 2, Taman Bukit Katil, 75450 Bukit Katil', '06-2686632', '06-2680586', 'gmbukitkatil@giatmara.edu.my', '2006-01-15 00:00:00', 1, 33215, 1, '2013-07-03 00:00:00', '810415055199', 0),
(139, '428', 'SIMPANG AMPAT', 'Jalan Kampung Kemus, Simpang Ampat, 78000 Alor Gajah, Melaka.', '06-5529614', '06-5529588', 'gmsimpangampat@giatmara.edu.my', '2006-01-15 00:00:00', 1, 36530, 1, '2013-07-03 00:00:00', '810415055199', 0),
(140, '499', 'TANGGA BATU', 'PGM Tangga Batu, No 5, Tingkat 1 & 2, Jln PSU 2, Plaza Sungai Udang, 76300', '06-3531944', '06-3531943', 'gmtanggabatu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 33914, 1, '2013-07-03 00:00:00', '810415055199', 0),
(141, '472', 'KULAI', 'Felda Bukit Besar, 81450 Kulaijaya', '07-8977989', '07-8977989', 'gmkulai@giatmara.edu.my', '2006-01-15 00:00:00', 1, 15662, 1, '2013-10-02 00:00:00', '830417016255', 0),
(142, '444', 'KLUANG', 'LOT 1, TINGKAT 3, BANGUNAN ARKED MARA KLUANG, JALAN DATO'' KAPTEN AHMAD 86000 KLUANG, JOHOR', '07-7739506', '07-7739507', 'gmkluang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 31641, 1, '2013-10-30 00:00:00', '750824115269', 0),
(143, '481', 'BATU PAHAT', '266, JALAN DAGANG,\n83000 BT PAHAT,\nJOHOR', '07-4328155', '07-4346279', 'gmbatupahat@giatmara.edu.my', '2006-01-15 00:00:00', 1, 15315, 1, '2013-09-25 00:00:00', '810415055199', 0),
(144, '430', 'KOTA TINGGI', 'Felda Air Tawar 2, 81920 Kota Tinggi', '07-8932602', '07-8932602', 'gmkotatinggi@giatmara.edu.my', '2006-01-15 00:00:00', 1, 16105, 1, '2013-09-25 00:00:00', '810415055199', 0),
(145, '421', 'TANJONG PIAI', 'Lot 2276, Mukim Jeram Batu, Pekan Nenas,81500 Pontian', '07-6994507', '07-6994509', 'gmtanjongpiai@giatmara.edu.my', '2006-01-15 00:00:00', 1, 15728, 1, '2013-09-25 00:00:00', '810415055199', 0),
(146, '622', 'SEGAMAT', 'GIATMARA Segamat,\nKompleks Penghulu Mukim Gemas,\n81500 Batu Anam,\nSegamat,Johor.', '07-9498079', '07-9498078', 'gmsegamat@giatmara.edu.my', '2006-01-15 00:00:00', 1, 15728, 1, '2013-09-25 00:00:00', '810415055199', 0),
(147, '617', 'PARIT SULONG', 'PTD 8507, JALAN SERINDIT, 83500 PARIT SULONG, BATU PAHAT, JOHOR', '07-4186679', '07-4186679', 'gmparitsulong@giatmara.edu.my', '2006-01-15 00:00:00', 1, 16947, 1, '2013-09-25 00:00:00', '810415055199', 0),
(148, '445', 'MERSING', 'Kompleks Penghulu, Mukim Mersing, Kampung pangkalan Batu, 86800 Mersing', '07-7995450', '07-7991704', 'gmmersing@giatmara.edu.my', '2006-01-15 00:00:00', 1, 34857, 1, '2013-09-25 00:00:00', '810415055199', 0),
(149, '453', 'LEDANG', 'Lot PTD 4570, Kaw. Perindustrian Tg. Agas, 84000 Muar', '06-9535004', '06-9535004 ', 'gmledang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 17500, 1, '2013-09-27 00:00:00', '590806016363', 0),
(150, '429', 'PAGOH', 'Kompleks Penghulu Mukim, Jorak/ Pagoh,84600 Pagoh', '06-9747264/266', '06-9747264/266', 'gmpagoh@giatmara.edu.my', '2006-01-15 00:00:00', 1, 16373, 1, '2013-09-26 00:00:00', '780202106357', 0),
(151, '626', 'SRI GADING', 'No. 25A, Jalan Kencana 1A/1,\nTaman Pura Kencana,\n83300 Sri Gading,\nBatu Pahat,\nJohor', '07-4559742', '07-4559742', 'gmsrigading@giatmara.edu.my', '2006-01-15 00:00:00', 1, 15315, 1, '2014-06-17 00:00:00', '810415055199', 0),
(152, '621', 'GELANG PATAH', 'Kampung Tiram Duku, 81560 Gelang Patah', '07-5072515', '07-5071900', 'gmgelangpatah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 15782, 1, '2013-09-25 00:00:00', '810415055199', 0),
(153, '656', 'LABIS', 'PTD 1907, Desa Temu Jodoh, 85400 Chaah, Johor', '07-9263164', '07-9263164', 'gmlabis@giatmara.edu.my', '2006-01-15 00:00:00', 1, 31066, 1, '2013-10-10 00:00:00', '691119015169', 0),
(154, '627', 'PONTIAN', 'Lot 8886, Mukim Ayer Baloi Sanglang, 82100 Pontian', '07-6901016', '07-6901016', 'gmpontian@giatmara.edu.my', '2006-01-15 00:00:00', 1, 15310, 1, '2013-09-25 00:00:00', '810415055199', 0),
(155, '646', 'TEBRAU', 'NO. 63-A, JALAN TEMBIKAI 7,\nTAMAN KOTA MASAI,\n81700 PASIR GUDANG,\nJOHOR.', '07-2514585', '07-2542585', 'gmtebrau@giatmara.edu.my', '2006-01-15 00:00:00', 1, 44541, 1, '2013-11-15 00:00:00', '810415055199', 0),
(156, '688', 'TENGGARA', 'Lot 5024, Jalan Dato'' Sri Amar, 81440 Bandar Tenggara, Johor', '07-8963121', '07-8963121', 'gmtenggara@giatmara.edu.my', '2006-01-15 00:00:00', 1, 15662, 1, '2013-09-25 00:00:00', '810415055199', 0),
(157, '609', 'JOHOR BAHRU', 'No 2, Jalan Mawar 46, Taman Mawar, 81700, Pasir Gudang, Johor ', '07-2518287', '07-2518287', 'gmjohorbahru@giatmara.edu.my', '2006-01-15 00:00:00', 1, 44541, 1, '2013-09-25 00:00:00', '810415055199', 0),
(158, '615', 'MUAR', 'No 2, Jalan Impian, Taman Sarang Buaya\n83600, Semerah, Muar\nJohor', '07-4163646', '07-4162946', 'gmmuar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 17053, 1, '2013-09-25 00:00:00', '810415055199', 0),
(159, '436', 'MIRI', 'LOT 3610 - 3613, \nLORONG 8A, BLOK 6 KBLD,\nPERMY TECHNOLOGY PARK,\nJALAN TUDAN, \n98100 MIRI, \nSARAWAK.', '085-604227', '085-434227', 'gmmiri@giatmara.edu.my', '2006-01-15 00:00:00', 1, 37910, 1, '2016-03-21 00:00:00', '810415055199', 0),
(160, '605', 'BATANG SADONG', 'lot 202, Kampung Semera, 94600 Asajaya, Sarawak', '082-826564', '082-826194', 'gmbatangsadong@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18007, 1, '2016-04-14 00:00:00', '821216135165', 0),
(161, '603', 'STAMPIN', 'GIATMARA STAMPIN\n1st Floor Lot 3230\nRock Commercial Centre\nJalan Rock 93200 Kuching\nSarawak.', '082-232127', '082-232117', 'gmstampin@giatmara.edu.my', '2006-01-15 00:00:00', 1, 24398, 1, '2013-09-27 00:00:00', '810415055199', 0),
(162, '494', 'LAWAS', 'No.1, Quarters Kerajaan, Daerah Kecil Sundar, 98800 Sundar Lawas', '085-264061', '085-264636', 'gmlawas@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38202, 1, '2013-09-27 00:00:00', '810415055199', 0),
(163, '493', 'MUKAH', 'Jln. Pam Stesen Lama, Kg. Penakub Hilir, P.0. Box 196, 96400 Mukah', '084-872019', '084-871564', 'gmmukah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 19122, 1, '2013-09-27 00:00:00', '810415055199', 0),
(164, '642', 'SERIAN', 'No.1, Jalan Tebakang Batu 2, Rumah Kakitangan JKR, Kampung Kakai, 94700 Serian', '082-895409', '082-895415', 'gmserian@giatmara.edu.my', '2006-01-15 00:00:00', 1, 17935, 1, '2014-03-05 00:00:00', '810415055199', 0),
(166, '674', 'BETONG', 'BANGUNAN MAJLIS DAERAH LAMA, \n95700 BETONG. ', '083-472029', '083-472785', 'gmbetong@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18523, 1, '2013-09-19 00:00:00', '840106125605', 0),
(167, '495', 'BINTULU', 'Medan Niaga Jepak, Bangunan SEDC, Peti Surat 2364, 97000 Bintulu, Sarawak', '086-201688', '086-201689', 'gmbintulu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 37909, 1, '2013-09-27 00:00:00', '810415055199', 0),
(168, '489', 'KOTA SAMARAHAN', 'Lot 5423, 5424, 5425 & 5426,\nMuara Tuang Land District,\n94300 Kota Samarahan, \nSarawak', '082-750075', '082-662387', 'gmsamarahan@giatmara.edu.my', '2006-01-15 00:00:00', 1, 26190, 1, '2016-10-14 00:00:00', '810415055199', 0),
(169, '664', 'SANTUBONG', 'Kaw. Industri MARA (KIM), Lot 1191 & 1192, Blok 7, Demak Laut Industrial estate, Jalan Bako, 93050 Kuching', '082-433048', '082-433497', 'gmsantubong@giatmara.edu.my', '2006-01-15 00:00:00', 1, 23087, 1, '2013-09-19 00:00:00', '840106125605', 0),
(170, '643', 'SIBU', 'Lot 343, Batu 6 /1/2, Jalan Ulu Oya, Peti Surat 384, 96000 Sibu', '084-319454', '084-316454', 'gmsibu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18585, 1, '2013-09-27 00:00:00', '810415055199', 0),
(171, '666', 'SARIKEI', 'Sublot No. 1 & 2 (G Flr and 2nd Flr), Off Jalan Rentap, Tiang Soon Height, P.O.Box 80, 96100 Sarikei, Sarawak.', '084654268', '084654272', 'gmsarikei@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18621, 1, '2014-06-10 00:00:00', '810415055199', 0),
(173, '658', 'MAS GADING', 'Lot 646, Jalan Bahagia Jaya, 94500 Lundu', '082-734568', '082-734566', 'gmmasgading@giatmara.edu.my', '2006-01-15 00:00:00', 1, 17890, 1, '2013-09-19 00:00:00', '840106125605', 0),
(174, '676', 'BARAM', 'No. 365A & 366B,\nJalan Wawasan Marudi,\n98050 Baram, \nSarawak.', '085-756457', '085-755230', 'gmbaram@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38043, 1, '2016-08-29 00:00:00', '810415055199', 0),
(270, '597', 'PULAI', 'NO.23 & 23-01\nJALAN BAIDURI 1/1\nTAMAN BAIDURI\n81200', '07-2411426', '-', 'gmpulai@giatmara.edu.my', '2009-11-19 11:39:07', 1, 44512, 1, '2016-07-12 00:00:00', '810415055199', 0),
(188, '663', 'SANDAKAN', 'No. 032, KM 2.2, Jalan Utara,\n90000 Sandakan\nSabah', '089-222416', '089-224160', 'gmsandakan@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22580, 1, '2013-08-31 00:00:00', '810415055199', 0),
(189, '637', 'W. PERSEKUTUAN LABUAN', 'BKM 0843, Simpang Pinang\nKg. Sg. Bedaun, Peti Surat 81580\n87019 W. P. Labuan', '087-468575', '087-466575', 'gmlabuan@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38285, 1, '2016-09-30 00:00:00', '810415055199', 0),
(190, '631', 'LIMBAWANG', 'Peti Surat 484, 89800 Beaufort', '087-211676', '087-225008', 'gmlimbawang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22543, 1, '2013-08-31 00:00:00', '810415055199', 0),
(191, '673', 'SEMPORNA', 'GIATMARA Semporna, Peti Surat 474, 91308 Semporna, Sabah.', '089-784090', '089-782654', 'gmsemporna@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22615, 1, '2013-08-29 00:00:00', '810415055199', 0),
(192, '694', 'KINABATANGAN', 'GIATMARA Kinabatangan, W.D.T. 239\n90200 Kota Kinabatangan, Sabah', '089-561986', '089-562730', 'gmkinabatangan@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22589, 1, '2013-08-31 00:00:00', '810415055199', 0),
(193, '693', 'RANAU', 'Kilometer 02, Jalan Sandakan, Beg Berkunci No. 5, 89309 Ranau Sabah ', '088-875072', '088-877423', 'gmranau@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22511, 1, '2013-08-31 00:00:00', '810415055199', 0),
(194, '672', 'TUARAN', 'GIATMARA TUARAN,\nJALAN SERUSUP, KG. TAJAU, \nPETI SURAT 487, \n89208 TUARAN, SABAH.', '088-794870', '088-794871', 'gmtuaran@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22491, 1, '2013-08-31 00:00:00', '810415055199', 0),
(195, '660', 'TENOM', 'Pusat Kebudayaan Murut, Wdt. 36, 89909 Tenom', '087-303790', '087-302425', 'gmtenom@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22563, 1, '2013-08-29 00:00:00', '790402125383', 0),
(196, '677', 'GAYA', 'Peti Surat No. A 424, 89357 Inanam', '088-438601', '088-438601', 'gmgaya@giatmara.edu.my', '2006-01-15 00:00:00', 1, 21442, 1, '2013-08-31 00:00:00', '810415055199', 0),
(197, '459', 'LIBARAN', 'GIATMARA Libaran\nLot 1, Ka Shing Industrial Centre\n(Detached Unit ), Batu 7 Jalan Labuk\n90000 Sandakan\nSabah', '089-671607/671', '089-671607', 'gmlibaran@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22593, 1, '2013-08-31 00:00:00', '810415055199', 0),
(198, '640', 'PENAMPANG', 'PETI SURAT 38, 88858 TANJUNG ARU, KOTA KINABALU, SABAH.', '088-716994', '088-716995', 'gmpenampang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22512, 1, '2014-07-10 00:00:00', '810415055199', 0),
(199, '661', 'BEAUFORT', 'W.D.T, No 23, 89740 Kuala Penyu', '087-208472', '087-914532', 'gmbeaufort@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22543, 1, '2016-12-15 00:00:00', '810415055199', 0),
(200, '668', 'BELURAN', 'Peti Surat 429, 90107 Beluran, Sabah.', '089-513141', '089-513151', 'gmbeluran@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22599, 1, '2013-08-29 00:00:00', '790811125819', 0),
(201, '635', 'PAPAR', 'Peti Surat 495, 89607 Papar', '088-914707', '088-914532', 'gmpapar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22529, 1, '2013-08-31 00:00:00', '810415055199', 0),
(202, '630', 'KIMANIS', 'peti surat 210\n89727 Membakut,\nSabah', '087-889327', '087-886340', 'gmkimanis@giatmara.edu.my', '2006-01-15 00:00:00', 1, 17820, 1, '2013-08-31 00:00:00', '810415055199', 0),
(221, '644', 'BUKIT BENDERA', 'No. 2-G & 2-1 Jalan Lembah Permai,\n11200 Tanjung Bungah,\nPulau Pinang', '04-8991700', '04-8992700', 'gmbukitbendera@giatmara.edu.my', '2006-02-03 00:00:00', 1, 44717, 1, '2013-09-05 00:00:00', '760608075767', 0),
(222, '696', 'JELUTONG', 'NO.84-G LINTANG SUNGAI PINANG,\r\n\nSKYLINE CITY,\r\n\n10150 GEORGETOWN,\r\n\nPULAU PINANG', '042822700', '042821244', 'gmjelutong@giatmara.edu.my', '2006-02-03 00:00:00', 1, 45025, 1, '2015-09-11 00:00:00', '810415055199', 0),
(223, '572', 'BUKIT GELUGOR', 'No 363R Jalan Sultan Azlan Shah\n11700 Gelugor\nPulau Pinang', '04-6585815', '04-6579700', 'gmbukitgelugor@giatmara.edu.my', '2006-02-03 00:00:00', 1, 44920, 1, '2016-06-29 00:00:00', '810415055199', 0),
(224, '586', 'KUALA KRAU', 'Kampung Desa Murni Kerdau, \n28010 Temerloh,\nPahang Darul Makmur.', '09-2846442', '09-2846442', 'gmkualakrau@giatmara.edu.my', '2006-02-03 00:00:00', 1, 45272, 1, '2013-09-26 00:00:00', '810415055199', 0),
(225, '570', 'KETEREH', 'Lot 236, Kuarters KADA Ketereh, 16450, Ketereh,\nKota Bharu,\nKelantan.', '09-7880211', '09-7880212', 'gmketereh@giatmara.edu.my', '2006-02-03 00:00:00', 1, 45397, 1, '2013-09-26 00:00:00', '810415055199', 0),
(37, '484', 'BAGAN', 'No 3908, Mukim 15, Jalan Pantai, 12100', '04-3328528', '04-3741711', 'gmbagan@giatmara.edu.my', '2006-01-15 00:00:00', 1, 20534, 1, '2013-09-05 00:00:00', '820112075714', 0),
(227, '584', 'SELANGAU', 'Sublot 597-599, \r\n\nPasar Baru Selangau, \r\n\nPeti Surat 584, \r\n\n96000 Sibu', '084-891148', '084-891168', 'gmselangau@giatmara.edu.my', '2006-02-03 00:00:00', 1, 18546, 1, '2015-07-13 00:00:00', '810415055199', 0),
(228, '579', 'MAMBONG', 'SUBLOT 2 & 3 EASTERN COMMERCIAL CENTRE, BATU 17\nJALAN KUCHING-SERIAN 94200 KUCHING, SARAWAK', '082-862077', '082-863055', 'gmmambong@giatmara.edu.my', '2006-02-03 00:00:00', 1, 26768, 1, '2013-09-19 00:00:00', '840106125605', 0),
(45, '433', 'PARIT BUNTAR', 'BANGUNAN KOMUNITI, JALAN PEJABAT, 34200 PARIT BUNTAR, PERAK', '05-7160082', '05-7160086', 'gmparitbuntar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22143, 1, '2013-09-26 00:00:00', '810415055199', 0),
(230, '577', 'SEPANGGAR', 'Lot 12 & 13, Taman Fulliwa, Fasa 1, Mile 11, Jalan Tuaran, Pos Mini Indah Permai, Peti Surat 272, 88450 Kota Kinabalu', '088-473551', '088-473550', 'gmsepanggar@giatmara.edu.my', '2006-02-03 00:00:00', 1, 21913, 1, '2013-08-31 00:00:00', '810415055199', 0),
(23, '414', 'LANGKAWI', 'Jalan Kisap, Kuah Langkawi, 07000 Langkawi', '04-9669198', '04-9660092', 'gmlangkawi@giatmara.edu.my', '2006-01-15 00:00:00', 1, 28525, 1, '2013-09-08 00:00:00', '750321075867', 0),
(24, '475', 'SIK', 'Jalan Hospital Daerah Sik, 08200 Sik', '04-4695641', '04-4695795', 'gmsik@giatmara.edu.my', '2006-01-15 00:00:00', 1, 30424, 1, '2013-09-05 00:00:00', '600816025075', 0),
(25, '476', 'JERAI', 'Jalan Pegawai, 06900 Yan', '04-4655446', '04-4655676', 'gmjerai@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27394, 1, '2013-09-05 00:00:00', '691027125002', 0),
(26, '485', 'PADANG SERAI', 'Lot 890, Mukim Naga Lilit, 09400 Padang Serai', '04-4850528', '04-4850530', 'gmpadangserai@giatmara.edu.my', '2006-01-15 00:00:00', 1, 31892, 1, '2013-09-27 00:00:00', '810415055199', 0),
(27, '633', 'PENDANG', 'JALAN JENUN,MUKIM AIR PUTEH,06700 PENDANG,KEDAH.', '04-7591815', '04-7591812', 'gmpendang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27338, 1, '2013-09-05 00:00:00', '720727025475', 0),
(28, '462', 'PADANG TERAP', 'Lot 3202, Batu 20, Jalan Kuala Nerang, 06300 Kuala Nerang, Kedah Darul Aman.', '04-7902020', '04-7902021', 'gmpadangterap@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27246, 1, '2013-09-05 00:00:00', '691027125002', 0),
(29, '483', 'KULIM BANDAR BAHARU', 'Pekan Mahang, 09500 Karangan', '04-4042386', '04-4042386', 'gmkulim@giatmara.edu.my', '2006-01-15 00:00:00', 1, 32480, 1, '2013-09-05 00:00:00', '691027125002', 0),
(30, '667', 'SUNGAI PETANI', 'LOT 101A, SMART AUTOCITY,\nJALAN BUKIT PUTERI 9/10,\nBANDAR PUTERI JAYA,\n08000', '04-425 6652', '04-422 6651', 'gmsungaipetani@giatmara.edu.my', '2006-01-15 00:00:00', 1, 29797, 1, '2016-12-22 00:00:00', '810415055199', 0),
(31, '659', 'MERBOK', 'Pekan Bedong, 08100 Bedong', '04-4584600', '04-4584606', 'gmmerbok@giatmara.edu.my', '2006-01-15 00:00:00', 1, 29917, 1, '2013-09-05 00:00:00', '691027125002', 0),
(32, '687', 'JERLUN', 'Lot 80, Pusat Pertumbuhan Desa, Sungai Korok, 06150 Ayer Hitam', '04-7947507', '04-7943658', 'gmjerlun@giatmara.edu.my', '2006-01-15 00:00:00', 1, 36323, 1, '2013-09-05 00:00:00', '691027125002', 0),
(33, '654', 'KUALA KEDAH', 'Lot. 1311, Kampung Masjid Seberang,\nMukim Kubang Rotan,\n06250 Alor Setar, Kedah Darul Aman', '04-7325490', '04-7346415', 'gmkualakedah@giatmara.edu.my', '2006-01-15 00:00:00', 1, 36835, 1, '2013-09-05 00:00:00', '691027125002', 0),
(34, '653', 'POKOK SENA', 'Lot 2649,Kg Belukar,Mukim Jabi,06400 Pokok Sena,Kedah', '04-7878064', '04-7878108', 'gmpokoksena@giatmara.edu.my', '2006-01-15 00:00:00', 1, 27288, 1, '2013-09-05 00:00:00', '691027125002', 0),
(35, '412', 'PERDA / NIBONG TEBAL', 'Lot. 2621, Mukim 11, Jln Ooi Kar Seng, Nibong Tebal, 14300 Seberang Perai Selatan', '04-5936282', '04-5936284', 'gmnibongtebal@giatmara.edu.my', '2006-01-15 00:00:00', 1, 25392, 1, '2013-09-26 00:00:00', '810415055199', 0),
(36, '409', 'BUKIT MERTAJAM', 'Lot 2228, Mukim 16, Seberang Perai Tengah, 14000 Bkt. Mertajam', '04-4904321', '04-4903518', 'gmbukitmertajam@giatmara.edu.my', '2006-01-15 00:00:00', 1, 25245, 1, '2013-09-26 00:00:00', '810415055199', 0),
(38, '431', 'BAYAN LEPAS', 'Lot 102H, Lengkok Kg, Jawa 2, Kawasan Miel, 11900 Bayan Lepas', '04-6449979', '04-6443753', 'gmbayanlepas@giatmara.edu.my', '2006-01-15 00:00:00', 1, 19351, 1, '2013-09-26 00:00:00', '810415055199', 0),
(39, '610', 'KEPALA BATAS', 'Persiaran Pendidikan Bertam Perdana,\n13200 Kepala Batas,\nPulau Pinang', '04-5750170', '04-5756220', 'gmkepalabatas@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22269, 1, '2016-10-14 00:00:00', '810415055199', 0),
(40, '447', 'TASEK GELUGOR', 'Lot. 3130, Mukim 8, Pongsu Seribu, Kepala Batas, 13200 Seberang Perai Utara', '04-5756163', '04-5783162', 'gmtasekgelugor@giatmara.edu.my', '2006-01-15 00:00:00', 1, 24612, 1, '2013-09-26 00:00:00', '810415055199', 0),
(41, '469', 'PERMATANG PAUH', 'Lot 433, Mukim 3, Permatang Ara, 13500 Permatang Pauh, Seberang Perai Tengah, Pulau Pinang', '04-3995795', '04-3995792', 'gmpermatangpauh@giatmara.edu.my', '2006-01-15 00:00:00', 1, 25199, 1, '2013-09-26 00:00:00', '810415055199', 0),
(42, '686', 'SUNGAI BAKAP', 'Sungai Bakap (Polis), Sungai Bakap, 14200 Seberang Perai Selatan', '04-5820157', '04-5820158', 'gmsungaibakap@giatmara.edu.my', '2006-01-15 00:00:00', 1, 24806, 1, '2013-09-26 00:00:00', '810415055199', 0),
(43, '647', 'BALIK PULAU', 'Lot 584,585 & 588  Jalan Besar, \nBalik Pulau, 11000 Balik Pulau', '04-8661369', '04-8664634', 'gmbalikpulau@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18031, 1, '2013-09-06 00:00:00', '821027075298', 0),
(44, '655', 'TANJONG', 'Unit 1.03 & 1.04, 10050 Kompleks Jalan Kedah', '04-2283070', '04-2285504', 'gmtanjong@giatmara.edu.my', '2006-01-15 00:00:00', 1, 26894, 1, '2013-09-26 00:00:00', '810415055199', 0),
(46, '408', 'GRIK', 'Lebuhraya Timur Barat, Base Camp, 33300 Grik', '05-7911494', '05-7920020', 'gmgrik@giatmara.edu.my', '2006-01-15 00:00:00', 1, 20885, 1, '2013-09-26 00:00:00', '810415055199', 0),
(47, '439', 'KAMPAR', 'Pusat GIAT Changkat Tin, 31800 Tanjung Tualang', '05-3609490', '05-3609480', 'gmkampar@giatmara.edu.my', '2006-01-15 00:00:00', 1, 28385, 1, '2013-08-23 00:00:00', '810415055199', 0),
(48, '452', 'PARIT', 'GIATMARA PARIT, \n  42 PERSIARAN DATARAN 3, \n  32610 BANDAR SERI ISKANDAR, \n  PERAK', '05-3721801', '05-3721802', 'gmparit@giatmara.edu.my', '2006-01-15 00:00:00', 1, 20847, 1, '2013-09-26 00:00:00', '810415055199', 0),
(49, '446', 'TANJONG MALIM', 'Jalan Rumah Rehat, 35800 Slim River, Perak', '05-4529896', '05-4529897', 'gmtanjongmalim@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22793, 1, '2013-09-26 00:00:00', '810415055199', 0),
(50, '458', 'PASIR SALAK', 'Pulau Tiga, 36800 Kampung Gajah, Perak', '05-6318000', '05-6318001', 'gmpasirsalak@giatmara.edu.my', '2006-01-15 00:00:00', 1, 24423, 1, '2013-08-23 00:00:00', '640425115619', 0),
(231, '576', 'BATU SAPI', 'Lot 1 & 2, Blok Y, KM 1.5\nJalan Leila, Bandar Ramai - Ramai\n90000 Sandakan, Sabah', '089 - 227 508', '089 - 227 520', 'gmbatusapi@giatmara.edu.my', '2006-02-03 00:00:00', 1, 22571, 1, '2014-03-11 00:00:00', '780927125459', 0),
(232, '574', 'KELANA JAYA', 'No.12, Jalan Pekaka 8/4, Seksyen 8, Kota Damansara, 47810 Petaling Jaya, Selangor', '03-61416016', '03-78054258', 'gmkelanajaya@giatmara.edu.my', '2006-02-03 00:00:00', 1, 9257, 1, '2013-09-27 00:00:00', '810415055199', 0),
(233, '697', 'LEMBAH PANTAI', 'No. 15-1, Tingkat 1, Jalan Pantai Murni, Pantai Dalam, 52900 K.Lumpur', '0322420034', '0322420034', 'gmlembahpantai@giatmara.edu.my', '2006-02-03 00:00:00', 1, 37981, 1, '2014-04-08 00:00:00', '810415055199', 0),
(234, '571', 'REMBAU', 'No.2 Tingkat 1, Taman Gadong, 71350 Kota, Negeri Sembilan.', '06-4382024', '06-4382033', 'gmrembau@giatmara.edu.my', '2006-02-03 00:00:00', 1, 45491, 1, '2013-07-09 00:00:00', '810415055199', 0),
(235, '636', 'PENGERANG', 'Dewan Majlis Belia Felda, Wilayah Johor Selatan, Felda Sening,       81900 Kota Tinggi', '07-8276227', '07-8276227', 'gmpengerang@giatmara.edu.my', '2006-02-03 00:00:00', 1, 15906, 1, '2013-09-25 00:00:00', '810415055199', 0),
(236, '699', 'SEKIJANG', 'No. 45, Jalan Putra 1/2, Bandar Putra, 85000 Segamat', '07-9435232', '07-9436232', 'gmsekijang@giatmara.edu.my', '2006-02-03 00:00:00', 1, 29725, 1, '2013-09-25 00:00:00', '810415055199', 0),
(237, '698', 'AYER HITAM', 'No. 32 Jalan 1/3 Bandar Baru Ayer Hitam 1, 86100 Ayer Hitam', '07-7582610', '07-7582598', 'gmayerhitam@giatmara.edu.my', '2006-02-03 00:00:00', 1, 32908, 1, '2013-09-25 00:00:00', '810415055199', 0),
(238, '695', 'SIMPANG RENGGAM', 'No. 8, Jalan Cemara, 86200 Simpang Renggam', '07-7558343', '07-7558242', 'gmsimpangrenggam@giatmara.edu.my', '2006-02-03 00:00:00', 1, 33017, 1, '2013-09-25 00:00:00', '810415055199', 0),
(239, '581', 'SETIAWANGSA', 'NO. 18, JALAN WANGSA DELIMA 11, D''WANGSA, WANGSA MAJU, 53300 KUALA LUMPUR, WILAYAH PERSEKUTUAN KUALA LUMPUR', '03-41442134', '03-41442068', 'gmsetiawangsa@giatmara.edu.my', '2006-02-03 00:00:00', 1, 12464, 1, '2013-11-07 00:00:00', '810831025116', 0),
(53, '480', 'BAGAN DATUH', 'Lot 40, Jalan Besar, 36400 Hutan Melintang', '05-6421800', '05-6421801', 'gmbagandatoh@giatmara.edu.my', '2006-01-15 00:00:00', 1, 42908, 1, '2013-11-28 00:00:00', '810721105393', 0),
(93, '618', 'PENGKALAN CHEPA', 'Kg. Rambutan Rendang,  Mukim Panji, 16100 Pengkalan Chepa', '09-7714141', '09-7714140', 'gmpengkalanchepa@giatmara.edu.my', '2006-01-15 00:00:00', 1, 33126, 1, '2013-09-26 00:00:00', '810415055199', 0),
(101, '456', 'KUALA TERENGGANU', 'Lot 1088 Jalan Hj, Busu, Batu Buruk, 20400 K. Terengganu', '09-6203651/53', '09-6203652', 'gmkualaterengganu@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38632, 1, '2013-09-27 00:00:00', '810415055199', 0),
(109, '474', 'SELAYANG', 'Jalan 5, Tmn. Selayang Baru, 68100 Batu Caves', '03-61364524', '03-61364525', 'gmselayang@giatmara.edu.my', '2006-01-15 00:00:00', 1, 38582, 1, '2013-09-27 00:00:00', '810415055199', 0),
(117, '624', 'SHAH ALAM', '2nd Floor C-12-2 Blok C,\nAlam Avenue, Jalan Serai Wangi,\nH16/H Off Persiaran Selangor,\n40200 Shah Alam,\nSelangor.', '03-55196829', '03-55123929', 'gmshahalam@giatmara.edu.my', '2006-01-15 00:00:00', 1, 120, 1, '2014-05-27 00:00:00', '810415055199', 0),
(123, '690', 'SEGAMBUT', 'No. 50, Jalan 6/38d, Taman Sri Sinar, 51200 Kuala Lumpur', '03-62726375', '03-62726452', 'gmsegambut@giatmara.edu.my', '2006-01-15 00:00:00', 1, 11079, 1, '2013-07-09 00:00:00', '810415055199', 0),
(165, '665', 'SARATOK', 'Bangunan JKR Lama, Peti Surat 104, 95400 Saratok, Sarawak', '083-437085', '083-437084', 'gmsaratok@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18504, 1, '2013-11-08 00:00:00', '731028135759', 0),
(172, '496', 'TANJUNG MANIS', 'Bangunan Kedai MARA Kg. Belawai, 96150 Belawai', '084-815484', '084-815472', 'gmtanjungmanis@giatmara.edu.my', '2006-01-15 00:00:00', 1, 18624, 1, '2013-09-19 00:00:00', '840106125605', 0);
INSERT INTO `ref_giatmara` (`id`, `kod_giatmara`, `nama_giatmara`, `alamat`, `tel_no`, `fax_no`, `email`, `registered`, `co_status`, `id_bandar`, `company_type`, `updatedon`, `updatedby`, `id_negeri`) VALUES
(180, '651', 'KAPIT', 'No. 11, Jalan Beleteh, 96807 Kapit', '084-797501', '084-798529', 'gmkapit@giatmara.edu.my', '2006-01-15 00:00:00', 1, 19177, 1, '2013-09-27 00:00:00', '810415055199', 0),
(186, '625', 'SILAM', 'Lot 10 & Lot 11 Bangunan Adika Commercial\nKm5,Jalan Tengah Nipah,\nPeti Surat 62289,\n91128  Lahad  Datu\nSabah', '089-884675', '089-884673', 'gmsilam@giatmara.edu.my', '2006-01-15 00:00:00', 1, 22629, 1, '2013-08-31 00:00:00', '810415055199', 0),
(241, '580', 'BANDAR TUN RAZAK', 'Jalan Budiman,\nKomersial Komuniti Bandar Tun Razak\n56000 Kuala Lumpur', '03-91718273', '03-00', 'gmbandartunrazak@giatmara.edu.my', '2008-12-15 13:30:00', 1, 9757, 1, '2013-07-09 00:00:00', '810415055199', 0),
(242, '582', 'PUTRAJAYA', 'No 34, 34A, 34B, Jalan Diplomatik, Precint 15, 62606 Putrajaya', '03-88903545', '03-88903455', 'gmputrajaya@giatmara.edu.my', '2008-12-15 13:34:25', 1, 38264, 1, '2013-07-09 00:00:00', '810415055199', 0),
(261, '691', 'SERDANG', 'No. 36, Jalan PSK 4,\nPusat Perdagangan Seri Kembangan,\n43300 Seri Kembangan,\nSelangor', '03-89419384', '03-89419858', 'gmserdang@giatmara.edu.my', '2008-12-26 16:08:36', 1, 3885, 1, '2013-09-27 00:00:00', '810415055199', 0),
(272, '591', 'BATU', 'GIATMARA BATU\nBANGUNAN YAYASAN PENDIDIKAN BATU\nJALAN 46/10, TAMAN BATU MUDA,\n68100 BATU CAVES\nKUALA LUMPUR', '03-61851807', '03-61852596', 'gmbatu@giatmara.edu.my', '2013-05-29 15:03:00', 1, 9757, 1, '2013-07-09 00:00:00', '810415055199', 0),
(273, '592', 'WANGSA MAJU', 'GIATMARA WANGSA MAJU\nNO.20, 20-1, 20-2, PLAZA USAHAWAN GENTING KLANG,\nJALAN DANAU NIAGA 1, TAMAN DANAU KOTA,\n53300 KUALA LUMPUR', '03- 4131 9339', '', 'gmwangsamaju@giatmara.edu.my', '2013-05-29 15:08:00', 1, 9757, 1, '2013-07-09 00:00:00', '810415055199', 0),
(274, '587', 'BATU KAWAN', 'GIATMARA BATU KAWAN\nNO. 2 & 4,\nJALAN BESAR SIMPANG AMPAT,\nTAMAN MERAK,14100,\nSIMPANG AMPAT,\nPULAU PINANG.', '04-5882451', '04-5883751', 'gmbatukawan@giatmara.edu.my', '2013-06-12 10:22:54', 1, 18898, 1, '2013-09-26 00:00:00', '810415055199', 0),
(275, '423', 'MARAN', 'GIATMARA Maran\nBandar Baru Chenor\n28100 Chenor\nPahang darul Makmur', '092995012', '092995013', 'gmmaran@giatmara.edu.my', '2013-06-12 10:35:04', 1, 35993, 1, '2013-12-20 00:00:00', '810415055199', 0),
(276, '594', 'KUANTAN', 'LOT A-5, KILANG IKS, \nKAWASAN PERUSAHAAN PPD, \nKG SOI,JALAN PANTAI SEPAT, \n25150 KUANTAN, \nPAHANG\n ', '09-5342102', '09-5341450', 'gmkuantan@giatmara.edu.my', '2013-06-12 15:55:31', 1, 33399, 1, '2013-09-26 00:00:00', '810415055199', 0),
(277, '422', 'BAKRI', 'BANGUNAN DATO'' SAIPOLBAHARI\nPOS 160,PARIT TENGAH C,\nBATU 18, AIR HITAM,\n84060 MUAR,\nJOHOR', '07-4213600', '07-4213700', 'gmbakri@giatmara.edu.my', '2013-06-12 22:19:54', 1, 17079, 1, '2013-09-25 00:00:00', '810415055199', 0),
(278, '593', 'SEMBRONG', 'JALAN TIONG FELDA KAHANG TIMUR \n86000 KLUANG \nJOHOR', '07-7866555', '07-7866554', 'gmsembrong@giatmara.edu.my', '2013-06-12 22:22:50', 1, 31091, 1, '2013-09-25 00:00:00', '810415055199', 0),
(279, '598', 'KUBANG KERIAN', 'LOT 2399 KG PADANG BONGOR, \nKUBANG KERIAN, \n16150 KOTA BHARU, \nKELANTAN', '09-7666871', '09-7666872', 'gmkubangkerian@giatmara.edu.my', '2013-06-13 09:34:04', 1, 32493, 1, '2016-03-29 00:00:00', '710426115355', 0),
(281, '588', 'TAPAH', 'Lot 360 Bandar Temoh, \nDaerah Batang Padang, \n35350 Temoh\nPerak', '05-4190049', '05-4190049', 'gmtapah@giatmara.edu.my', '2013-06-13 11:59:33', 1, 22758, 1, '2013-08-23 00:00:00', '680923085471', 0),
(282, '547', 'PENSIANGAN', 'GIATMARA PENSIANGAN, \nD/A GIATMARA KENINGAU, \nPETI SURAT 692, \n89008 KENINGAU, \nSABAH', '087-366718', '087-366716', 'gmpensiangan@giatmara.edu.my', '2013-06-13 14:11:53', 1, 22023, 1, '2013-08-29 00:00:00', '810415055199', 0),
(283, '548', 'PUTATAN', 'GIATMARA PUTATAN, \nBALAIRAYA KG. LINSUK, \nTAMAN BERSATU, \nP.O.BOX 726, \n88858 TANJUNG ARU,\nKOTA KINABALU \nSABAH', '088-761805', '088-760029', 'gmputatan@giatmara.edu.my', '2013-06-13 14:14:24', 1, 17820, 1, '2013-08-31 00:00:00', '810415055199', 0),
(284, '549', 'SIPITANG', 'Bangunan Arked MARA, \nDB1/3, (SE03-04), \n89859 Sipitang, \nSabah ', '087-821 445', '', 'gmsipitang@giatmara.edu.my', '2013-06-13 14:16:37', 1, 22555, 1, '2013-08-31 00:00:00', '810415055199', 0),
(285, '595', 'BANDAR KUCHING', 'GIATMARA BANDAR KUCHING, \nBANGUNAN WISMA HARAPAN,\nJALAN BUDAYA, \n93000 KUCHING, \nSARAWAK', '082-370060', '', 'gmbandarkuching@giatmara.edu.my', '2013-06-13 14:42:45', 1, 17860, 1, '2013-09-19 00:00:00', '840106125605', 0),
(286, '616', 'HULU REJANG', 'KUARTERS KERAJAAN KELAS G, \nJALAN DIAN DING, \n96900 BELAGA, \nSARAWAK', '086461023', '086461022', 'gmhulurejang@giatmara.edu.my', '2013-06-13 14:49:00', 1, 19187, 1, '2013-09-27 00:00:00', '810415055199', 0),
(287, '596', 'IGAN', 'LOT 127 DARO NEW TOWNSHIP \n96200 DARO \nSARAWAK', '084823146', '084823146', 'gmigan@giatmara.edu.my', '2013-06-13 14:51:14', 1, 18633, 1, '2014-01-06 00:00:00', '810415055199', 0),
(288, '578', 'KANOWIT', 'GIATMARA Kanowit Log 599, \nTaman Muhibah Indah \n96700 Kanowit \nSarawak', '084-752100', '084-752107', 'gmkanowit@giatmara.edu.my', '2013-06-13 14:54:42', 1, 19168, 1, '2013-09-27 00:00:00', '810415055199', 0),
(289, '692', 'LANANG', 'GIATMARA LANANG, \nKEDAI SIBU JAYA, LOT 1196, \nSUBLOT 35, 37, 38, 41 & 42, \nSIBU JAYA, COMMERCIAL CENTER, \n96000 SIBU, \nSARAWAK', '084-228451', '', 'gmlanang@giatmara.edu.my', '2013-06-13 15:02:12', 1, 18546, 1, '2013-09-27 00:00:00', '810415055199', 0),
(290, '545', 'LIMBANG', 'GIATMARA Limbang \nPejabat Residen Lama Jalan Buangsiol, \n98700 Limbang, \nSarawak', '085211300', '085211308', 'gmlimbang@giatmara.edu.my', '2013-06-13 15:03:45', 1, 38073, 1, '2013-09-27 00:00:00', '810415055199', 0),
(291, '546', 'SIBUTI', 'GIATMARA SIBUTI NO.205, \nJALAN BEKENU ASLI, \nBEKENU BAZAAR, BEKENU TOWN DISTRICT, 98150 BEKENU, SIBUTI, \nSARAWAK', '085-719032', '085-719029', 'gmsibuti@giatmara.edu.my', '2013-06-13 15:10:05', 1, 37910, 1, '2013-09-27 00:00:00', '810415055199', 0),
(295, '589', 'KLANG', 'No. 50 & 52, Jalan Damar/KS9, Glenmarie Cove, 42000 Port Klang, Selangor Darul Ehsan.', '03-31651740', '03-31650376', 'gmklang@giatmara.edu.my', '2013-07-29 14:49:38', 1, 1893, 1, NULL, NULL, 0),
(297, '440', 'SUBANG', 'Lot 3107, Jalan Tempayan Emas 1, Kg. Paya Jaras Dalam, 47000 Sungai Buluh', '03-61518499', '03-61518499', 'gmsubang@giatmara.edu.my', '2013-07-29 14:51:55', 1, 8907, 1, '2014-01-08 00:00:00', '740622025979', 0),
(298, '590', 'KUALA SELANGOR', 'No. 9 & 9A, Taman Muara Esbee\n45800 Jeram\nSelangor Darul Ehsan.', '0332640520', '0332640328', 'gmkualaselangor@giatmara.edu.my', '2013-09-11 09:25:36', 1, 4792, 1, '2014-01-08 00:00:00', '700121106192', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref_hubungan`
--

CREATE TABLE IF NOT EXISTS `ref_hubungan` (
  `id` int(10) NOT NULL,
  `hubungan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_hubungan`
--

INSERT INTO `ref_hubungan` (`id`, `hubungan`) VALUES
(1, 'Isteri'),
(2, 'Suami'),
(3, 'Penjaga'),
(4, 'Saudara');

-- --------------------------------------------------------

--
-- Table structure for table `ref_intake`
--

CREATE TABLE IF NOT EXISTS `ref_intake` (
  `id` int(10) NOT NULL,
  `kod_intake` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_intake` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_mula` date NOT NULL,
  `tarikh_tamat` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_intake`
--

INSERT INTO `ref_intake` (`id`, `kod_intake`, `nama_intake`, `tarikh_mula`, `tarikh_tamat`) VALUES
(1, 'Jan17', 'Januari 2017', '2018-01-01', '2018-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jawatan`
--

CREATE TABLE IF NOT EXISTS `ref_jawatan` (
  `id` int(2) NOT NULL DEFAULT '0',
  `jawatan` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `jawatan_info` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_style` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_desc_bm` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_jawatan`
--

INSERT INTO `ref_jawatan` (`id`, `jawatan`, `jawatan_info`, `user_style`, `user_desc_bm`) VALUES
(9, 'Apprentice', 'apprentice', NULL, 'Perantis'),
(20, 'Entrepreneur', 'usahawan', NULL, 'Usahawan'),
(1, 'Super Administrator', 'admin1', NULL, 'Ketua Administrator'),
(2, 'Administrator', 'admin2', NULL, 'XXAdministrator'),
(3, 'Staff', 'staff', NULL, 'XXStaf Umum'),
(4, 'GIATMARA Operator', 'operator', NULL, 'XXOperator GIATMARA'),
(5, 'Teacher', 'lecturer', NULL, 'TP\\TP Kanan'),
(6, 'RND Officer', 'rndofficer', NULL, 'Administrator RND'),
(7, 'Trainee', 'student', NULL, 'Pelatih'),
(8, 'State GIATMARA Supervisor', 'admin3', NULL, 'Pengarah GIATMARA Negeri'),
(19, 'Default User', 'admin3', NULL, 'Timbalan Pengarah GIATMARA Neg'),
(10, 'Assessment Officer (PP)', 'lecturer', NULL, 'XXPegawai Penilai (PP)'),
(11, 'Assessment Officer (PPD)', 'lecturer', NULL, 'XXPegawai Penilai (PPD)'),
(12, 'Assessment Officer (PPL))', 'lecturer', NULL, 'XXPegawai Penilai (PPL)'),
(13, 'Manager/HOD', 'manager', NULL, 'Ketua Jabatan'),
(14, 'GIATMARA Executive (PEU)', 'execs', NULL, 'PEU/PEU Kanan'),
(15, 'GIATMARA Manager', 'acmanager', NULL, 'Pengurus/Pengurus Kanan (GM)'),
(16, 'Supervisor', 'execs', NULL, 'Anggota Kerja GIATMARA'),
(17, 'Trainer', 'trainer', NULL, 'XXJurulatih'),
(18, 'Everyone', 'all', NULL, 'XXPengguna Umum'),
(21, 'Senior Manager', 'snrmanager', NULL, 'XXPengurus Kanan'),
(22, 'Director', 'director', NULL, 'XXDirektor'),
(34, 'Finance Administrator', 'adminkew', NULL, 'Administrator Kewangan'),
(35, 'Curikulum Development Officer ', 'pklofficer', NULL, 'Administrator Kurikulum'),
(36, 'Validation Officer', 'validofficer', NULL, 'XXPegawai Pengesah'),
(37, 'Trainee Officer', 'trnofficer', NULL, 'Administrator Pelatih'),
(38, 'BDD Officer', 'bddofficer', NULL, 'Administrator BDD'),
(39, 'State Officer', 'stateoff', NULL, 'Pegawai GIATMARA Negeri'),
(40, 'Finance Officer', 'finance', NULL, 'XXPegawai Kewangan'),
(41, 'GIATMARA Centre Officer', 'gmctr', NULL, 'XXPegawai Pusat GIATMARA'),
(42, 'Students Department Officer', 'studdept', NULL, 'XXPegawai Jabatan Pelatih'),
(43, 'Industry Respondence Officer', 'ppiofficer', NULL, 'Pegawai Perhubungan Industri'),
(44, 'Secondary Teacher', 'lecturer2', NULL, 'XXTenaga Pengajar Kanan'),
(45, 'JPU Officer', 'jpuofficer', NULL, 'Administrator Usahawan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kategori_pemohon`
--

CREATE TABLE IF NOT EXISTS `ref_kategori_pemohon` (
  `id` int(10) NOT NULL,
  `kategori_pemohon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_kategori_pemohon`
--

INSERT INTO `ref_kategori_pemohon` (`id`, `kategori_pemohon`) VALUES
(1, 'Anggota Polis'),
(2, 'Bekas Polis'),
(3, 'Lepasan Sekolah'),
(4, 'Kakitangan Kerajaan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kategori_penjaga`
--

CREATE TABLE IF NOT EXISTS `ref_kategori_penjaga` (
  `id` int(10) NOT NULL,
  `kategori_penjaga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_kategori_penjaga`
--

INSERT INTO `ref_kategori_penjaga` (`id`, `kategori_penjaga`) VALUES
(0, 'Anggota Polis'),
(0, 'Bekas Polis'),
(0, 'Kakitangan Kerajaan'),
(0, 'Lepasan Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kelulusan`
--

CREATE TABLE IF NOT EXISTS `ref_kelulusan` (
  `id` int(10) NOT NULL,
  `kelulusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_kelulusan`
--

INSERT INTO `ref_kelulusan` (`id`, `kelulusan`) VALUES
(1, 'Sekolah Rendah'),
(2, 'SRP/PMR atau setaraf'),
(3, 'SPM atau setaraf'),
(4, 'SPMV atau setaraf');

-- --------------------------------------------------------

--
-- Table structure for table `ref_keputusan_temuduga`
--

CREATE TABLE IF NOT EXISTS `ref_keputusan_temuduga` (
  `id` int(10) NOT NULL,
  `keputusan_temuduga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_keputusan_temuduga`
--

INSERT INTO `ref_keputusan_temuduga` (`id`, `keputusan_temuduga`) VALUES
(1, 'Proses Semakan'),
(2, 'Berjaya'),
(3, 'Berjaya dan Tukar Kursus'),
(4, 'Tidak Berjaya'),
(5, 'Tidak Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kewarganegaraan`
--

CREATE TABLE IF NOT EXISTS `ref_kewarganegaraan` (
  `id` int(10) NOT NULL,
  `kewarganegaraan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_kewarganegaraan`
--

INSERT INTO `ref_kewarganegaraan` (`id`, `kewarganegaraan`) VALUES
(1, 'Warganegara Bumiputera'),
(2, 'Warganegara Bukan Bumiputera'),
(3, 'Bukan Warganegara');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kluster`
--

CREATE TABLE IF NOT EXISTS `ref_kluster` (
  `id` int(10) NOT NULL,
  `kod_kluster` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kluster` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_kluster`
--

INSERT INTO `ref_kluster` (`id`, `kod_kluster`, `nama_kluster`) VALUES
(1, 'cnt', 'Computer & Network Technology'),
(2, 'ee', 'Elektrikal');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kursus`
--

CREATE TABLE IF NOT EXISTS `ref_kursus` (
  `id` int(10) NOT NULL,
  `kod_kursus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kursus` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kluster` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_kursus`
--

INSERT INTO `ref_kursus` (`id`, `kod_kursus`, `nama_kursus`, `id_kluster`) VALUES
(1, 'TSK001', 'Teknologi Sistem Komputer', 1),
(2, 'TSK002', 'Computer System and Networking', 1),
(3, 'EEK001', 'Pendawai Elektrik', 2),
(4, 'EEK002', 'Penjaga Jentera Elektrik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ref_negeri`
--

CREATE TABLE IF NOT EXISTS `ref_negeri` (
  `id` int(2) NOT NULL,
  `nama_negeri` varchar(30) DEFAULT NULL,
  `kod_negeri` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_negeri`
--

INSERT INTO `ref_negeri` (`id`, `nama_negeri`, `kod_negeri`) VALUES
(14, 'PULAU PINANG', 'P'),
(10, 'SELANGOR', 'B'),
(7, 'JOHOR', 'J'),
(12, 'KEDAH', 'K'),
(15, 'PERLIS', 'R'),
(16, 'KELANTAN', 'D'),
(17, 'TERENGGANU', 'T'),
(18, 'SABAH', 'S'),
(19, 'SARAWAK', 'Q'),
(9, 'NEGERI SEMBILAN', 'N'),
(8, 'MELAKA', 'M'),
(13, 'PAHANG', 'C'),
(20, 'WILAYAH PERSEKUTUAN', 'W'),
(11, 'PERAK', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pendapatan`
--

CREATE TABLE IF NOT EXISTS `ref_pendapatan` (
  `id` int(10) NOT NULL,
  `pendapatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_pendapatan`
--

INSERT INTO `ref_pendapatan` (`id`, `pendapatan`) VALUES
(1, '0-500'),
(2, '501-1000');

-- --------------------------------------------------------

--
-- Table structure for table `ref_poskod_bandar_negeri`
--

CREATE TABLE IF NOT EXISTS `ref_poskod_bandar_negeri` (
  `id` int(10) NOT NULL,
  `poskod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bandar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negeri` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_poskod_bandar_negeri`
--

INSERT INTO `ref_poskod_bandar_negeri` (`id`, `poskod`, `bandar`, `negeri`) VALUES
(1, '02600', 'Arau', 'Perlis'),
(2, '02400', 'Baseri', 'Perlis'),
(3, '02600', 'Guar Sanji', 'Perlis'),
(4, '02400', 'Kampung Abi', 'Perlis'),
(5, '70536', 'Seremban', 'Negeri Sembilan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_taraf_perkahwinan`
--

CREATE TABLE IF NOT EXISTS `ref_taraf_perkahwinan` (
  `id` int(10) NOT NULL,
  `taraf_perkahwinan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_taraf_perkahwinan`
--

INSERT INTO `ref_taraf_perkahwinan` (`id`, `taraf_perkahwinan`) VALUES
(1, 'Bujang'),
(2, 'Kahwin'),
(3, 'Duda'),
(4, 'Janda');

-- --------------------------------------------------------

--
-- Table structure for table `settings_tawaran_kursus`
--

CREATE TABLE IF NOT EXISTS `settings_tawaran_kursus` (
  `id` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `id_intake` int(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings_tawaran_kursus`
--

INSERT INTO `settings_tawaran_kursus` (`id`, `id_kursus`, `id_giatmara`, `id_intake`, `status`) VALUES
(1, 1, 262, 1, 1),
(2, 1, 263, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(10) NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jawatan` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `status_jawatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `nama`, `id_jawatan`, `id_giatmara`, `status_jawatan`) VALUES
(1, 'Saiful Baharin Samdusin', 5, 262, '1'),
(2, 'Amira Buhari', 5, 262, '1'),
(3, 'Azmi Hadi', 5, 263, '1'),
(4, 'Fatin Shahira Anuar', 5, 263, '1');

-- --------------------------------------------------------

--
-- Table structure for table `temuduga_tetapan`
--

CREATE TABLE IF NOT EXISTS `temuduga_tetapan` (
  `id` int(10) NOT NULL,
  `id_permohonan` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL COMMENT 'refer to settings_tawaran_kursus column kursus1/kursus2/kursus3',
  `tarikh_waktu` datetime NOT NULL,
  `tempat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai` int(11) NOT NULL COMMENT 'refer to staff.id',
  `jawatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telefon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_cetak` datetime NOT NULL COMMENT 'current date',
  `cetak` int(11) NOT NULL COMMENT '1=printed; 0=not printed;',
  `keputusan_temuduga` int(10) NOT NULL COMMENT 'refer to ref_keputusan_temuduga',
  `tukar_kursus` int(10) NOT NULL COMMENT 'refer to settings_tawaran_kursus column kursus1/kursus2/kursus3',
  `catatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alamat` text,
  `usertype` char(10) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` datetime DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `email`, `phone`, `alamat`, `usertype`, `ip_address`, `salt`, `active`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `created_on`) VALUES
(1, 'Azmi Cole Jr', 'azmicolejr', '$2y$08$784lu0koUUM3bP2rw7TByey44mNS6ju4ksHgluPwiNF2QK6E3v26S', 'azmi2793@gmail.com', '081228289766', '', 'superadmin', '127.0.0.1', '', 1, '', '8h0.P1tqx8HiRyDvwCGpfu00362d152e9a037a75', '0000-00-00 00:00:00', '79X4VtxEkwElLIF6ZQTtJu', '2016-11-13 03:20:00', '0000-00-00 00:00:00'),
(4, 'Administrator', 'administrator', '$2y$08$Sxjwd1trYlLjR5FbuSp52OtHFBJ1E0qCg.pzaJwmhgelXvRk7vTti', 'admins@admin.com', '', '', 'admin', '127.0.0.1', NULL, 1, NULL, NULL, NULL, NULL, '2016-11-02 06:28:39', '2016-10-05 06:26:45'),
(5, 'Budi', 'budi', '$2y$08$s9rhi2wqf1UldnQCzSahA.IKTzjqKX6KTMQk3A9w2VVW8c2YqPM6S', 'budi@yahoo.com', '0846213', 'Jl. sukarela', 'User Biasa', '127.0.0.1', NULL, 1, NULL, NULL, NULL, NULL, '2016-10-07 15:23:31', '2016-10-05 06:45:17'),
(6, 'Admin Keduas', 'adminkedua', '$2y$08$g4tJ1Zt.lcOn4wLNX2S4HOiPv8FtC9fd8v9lDD6QUYaRvreUOIbzm', 'adminkedua@gmail.com', '', '', 'User Biasa', '127.0.0.1', NULL, 0, '55339e0e3831301ba27f45e5f9e3d253feae09fe', NULL, NULL, NULL, NULL, '2016-10-05 14:09:08'),
(7, 'Superadmin', 'superadmin', '$2y$08$UP4PvjwzqidTh7JI2C69v.vkm4q0WymfWp6f83KVfCAVWr7.RlzP.', 'superadmin@gmail.com', '08461616', 'asdjaslkdjksad', 'superadmin', '127.0.0.1', NULL, 1, NULL, NULL, NULL, NULL, '2017-06-21 17:37:00', '2016-10-05 14:09:50'),
(8, 'Pitou', 'pitou', '$2y$08$ENXIFEkR/fGokhSsYWvmnOhoVuyuVrZHe9A7bUZenCmdr2TspjyDW', 'pitou@yahoo.com', NULL, NULL, 'user', '::1', NULL, 1, NULL, NULL, NULL, NULL, '2016-11-20 23:32:09', '2016-10-31 01:24:01'),
(9, 'Jason Statham', 'jason', '$2y$08$TSPp67rk/NxbCx2dw7x6Z.Q6Q86EdqbK/sBB79ct3Avlzz9g09y.q', 'jason@gmail.com', NULL, NULL, 'user', '::1', NULL, 1, NULL, NULL, NULL, NULL, '2016-11-05 09:01:33', '2016-11-04 10:21:43'),
(10, 'Thiery Henry', 'henry', '$2y$08$o21.aqyc/Pw0zIEwJdbM7.guKldFFOBMDb7KBPGdCspJhVV0yo83e', 'henry@gmail.com', NULL, NULL, 'user', '::1', NULL, 1, NULL, NULL, NULL, NULL, '2016-11-10 02:05:49', '2016-11-10 01:37:39'),
(11, 'Robert Pires', 'pires', '$2y$08$HUzo1uPpLACkkqExY.cEf.EaJNuXGki8EYxh35ifLJXV6aVGF4X5m', 'pires@gmail.com', NULL, NULL, 'user', '::1', NULL, 1, NULL, NULL, NULL, NULL, '2016-11-12 00:04:56', '2016-11-12 00:04:40'),
(12, 'Batistuta', 'batistuta', '$2y$08$D/wljcGmZm7NS41mD/w5f.IqPYT2ZMxIhvFT9bnRgAyzqZyard2PG', 'batistuta@gmail.com', NULL, NULL, 'user', '::1', NULL, 1, NULL, NULL, NULL, NULL, '2016-11-20 23:49:09', '2016-11-20 23:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE IF NOT EXISTS `users_group` (
  `id_group` int(11) NOT NULL,
  `name` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`id_group`, `name`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'Testa'),
(4, 'User Only');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_butir_peribadi`
--
ALTER TABLE `permohonan_butir_peribadi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_kursus`
--
ALTER TABLE `permohonan_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_maklumat_am`
--
ALTER TABLE `permohonan_maklumat_am`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_tempat_tinggal`
--
ALTER TABLE `permohonan_tempat_tinggal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_agama`
--
ALTER TABLE `ref_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_bangsa`
--
ALTER TABLE `ref_bangsa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_etnik`
--
ALTER TABLE `ref_etnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_giatmara`
--
ALTER TABLE `ref_giatmara`
  ADD PRIMARY KEY (`id`), ADD KEY `company_code` (`kod_giatmara`), ADD KEY `district_id` (`id_bandar`);

--
-- Indexes for table `ref_hubungan`
--
ALTER TABLE `ref_hubungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_intake`
--
ALTER TABLE `ref_intake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jawatan`
--
ALTER TABLE `ref_jawatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_kategori_pemohon`
--
ALTER TABLE `ref_kategori_pemohon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_kelulusan`
--
ALTER TABLE `ref_kelulusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_keputusan_temuduga`
--
ALTER TABLE `ref_keputusan_temuduga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_kewarganegaraan`
--
ALTER TABLE `ref_kewarganegaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_kluster`
--
ALTER TABLE `ref_kluster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_kursus`
--
ALTER TABLE `ref_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_negeri`
--
ALTER TABLE `ref_negeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_pendapatan`
--
ALTER TABLE `ref_pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_poskod_bandar_negeri`
--
ALTER TABLE `ref_poskod_bandar_negeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_taraf_perkahwinan`
--
ALTER TABLE `ref_taraf_perkahwinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_tawaran_kursus`
--
ALTER TABLE `settings_tawaran_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temuduga_tetapan`
--
ALTER TABLE `temuduga_tetapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permohonan_butir_peribadi`
--
ALTER TABLE `permohonan_butir_peribadi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permohonan_kursus`
--
ALTER TABLE `permohonan_kursus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permohonan_maklumat_am`
--
ALTER TABLE `permohonan_maklumat_am`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permohonan_tempat_tinggal`
--
ALTER TABLE `permohonan_tempat_tinggal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ref_bangsa`
--
ALTER TABLE `ref_bangsa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ref_etnik`
--
ALTER TABLE `ref_etnik`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ref_giatmara`
--
ALTER TABLE `ref_giatmara`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=299;
--
-- AUTO_INCREMENT for table `ref_hubungan`
--
ALTER TABLE `ref_hubungan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_intake`
--
ALTER TABLE `ref_intake`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_kategori_pemohon`
--
ALTER TABLE `ref_kategori_pemohon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_kelulusan`
--
ALTER TABLE `ref_kelulusan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_keputusan_temuduga`
--
ALTER TABLE `ref_keputusan_temuduga`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ref_kewarganegaraan`
--
ALTER TABLE `ref_kewarganegaraan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ref_kluster`
--
ALTER TABLE `ref_kluster`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_kursus`
--
ALTER TABLE `ref_kursus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_pendapatan`
--
ALTER TABLE `ref_pendapatan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_poskod_bandar_negeri`
--
ALTER TABLE `ref_poskod_bandar_negeri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ref_taraf_perkahwinan`
--
ALTER TABLE `ref_taraf_perkahwinan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings_tawaran_kursus`
--
ALTER TABLE `settings_tawaran_kursus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `temuduga_tetapan`
--
ALTER TABLE `temuduga_tetapan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
