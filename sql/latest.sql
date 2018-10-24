-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `gspel1`;
CREATE DATABASE `gspel1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `gspel1`;

DELIMITER ;;

CREATE PROCEDURE `proc_giatmara_kursus`()
BEGIN
	DECLARE bDone INT;

  DECLARE varA VARCHAR(250);
  DECLARE varB VARCHAR(250);
  DECLARE varC VARCHAR(30);

  DECLARE var1 VARCHAR(250);
  DECLARE var2 VARCHAR(250);
  DECLARE var3 VARCHAR(30);
  DECLARE var4 VARCHAR(60);

	DECLARE curs CURSOR FOR SELECT DISTINCT nama_kluster, nama_kursus, nama_negeri, nama_giatmara FROM `v_giatmara_kursus` ORDER BY 1, 2, 3, 4;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET bDone = 1;

  DROP TEMPORARY TABLE IF EXISTS tblResults;
  CREATE TEMPORARY TABLE IF NOT EXISTS tblResults  (
    nama_klusterT VARCHAR(250), nama_kursusT VARCHAR(250), nama_negeriT VARCHAR(30), nama_kluster VARCHAR(250), nama_kursus VARCHAR(250), nama_negeri VARCHAR(30), nama_giatmara VARCHAR(60)
  );

  OPEN curs;

  SET bDone = 0;
	SET varA = '';
	SET varB = '';
	SET varC = '';
  REPEAT
    FETCH curs INTO var1, var2, var3, var4;

		IF varC = var3 THEN
			SET varC = '';
		ELSE
			SET varC = var3;
		END IF;

		IF varB = var2 THEN
			SET varB = '';
		ELSE
			SET varB = var2;
			SET varC = var3;
		END IF;

		IF varA = var1 THEN
			SET varA = '';
		ELSE
			SET varA = var1;
			SET varB = var2;
			SET varC = var3;
		END IF;

    INSERT INTO tblResults VALUES (var1, var2, var3, varA, varB, varC, var4);

		SET varA = var1;
		SET varB = var2;
		SET varC = var3;

  UNTIL bDone END REPEAT;

  CLOSE curs;
  SELECT nama_kluster, nama_kursus, nama_negeri, nama_giatmara FROM tblResults;
END;;

CREATE PROCEDURE `proc_pemarkahan_modul`(IN `giatmara` int, IN `kursus` int, IN `jeniskursus` varchar(16), IN `sesi` int)
BEGIN
	SELECT
		ref_giatmara.nama_giatmara,
		ref_kursus.nama_kursus,ref_modul.id_modul,
		CASE
	WHEN jeniskursus = "" THEN
		"Semua"
	ELSE
		jeniskursus
	END AS jenis_kursus,
	ref_intake.nama_intake,
	ref_modul.kod_modul,
	ref_modul.nama_modul,

	COUNT(t0.id_pelatih) AS jumlah_pelatih,
	SUM(
		CASE
		WHEN markah_modul.status_terampil = 1 THEN
			1
		ELSE
			0
		END
	) AS terampil,
	SUM(
		CASE
		WHEN markah_modul.status_terampil = 2 THEN
			1
		ELSE
			0
		END
	) AS tidak_terampil,
	SUM(
		CASE
		WHEN markah_modul.status_isi_markah = 0 THEN
			1
		ELSE
			0
		END
	) AS belum_isi,
	SUM(
		CASE
		WHEN markah_modul.status_isi_markah = 1 THEN
			1
		ELSE
			0
		END
	) AS telah_disimpan,
	SUM(
		CASE
		WHEN markah_modul.status_isi_markah = 2 THEN
			1
		ELSE
			0
		END
	) AS hantar_ke_pengurus,
	SUM(
		CASE
		WHEN markah_modul.status_isi_markah = 3 THEN
			1
		ELSE
			0
		END
	) AS dikembalikan,
	settings_tawaran_kursus.id_giatmara,
	settings_tawaran_kursus.id AS id_kursus,
	settings_tawaran_kursus.id_kursus AS id_ref_kursus,
	settings_tawaran_kursus.id_intake
FROM
	settings_tawaran_kursus
INNER JOIN ref_giatmara ON settings_tawaran_kursus.id_giatmara = ref_giatmara.id
INNER JOIN ref_kursus ON settings_tawaran_kursus.id_kursus = ref_kursus.id
INNER JOIN ref_intake ON settings_tawaran_kursus.id_intake = ref_intake.id
INNER JOIN ref_modul ON settings_tawaran_kursus.id_kursus = ref_modul.id_kursus
LEFT JOIN (
	SELECT
		*
	FROM
		pelatih
	WHERE
		(
			CASE
			WHEN jeniskursus = "" THEN
				TRUE
			ELSE
				pelatih.jenis_pelatih = jeniskursus
			END
		)
) t0 ON settings_tawaran_kursus.id = t0.id_kursus AND settings_tawaran_kursus.id_giatmara = t0.id_giatmara
LEFT JOIN markah_modul ON t0.id_pelatih = markah_modul.id_pelatih -- ref_modul.id_modul = markah_modul.id_modul
WHERE
	settings_tawaran_kursus.id_giatmara = giatmara
AND settings_tawaran_kursus.id_kursus = kursus
AND settings_tawaran_kursus.id_intake = `sesi`
GROUP BY
	ref_giatmara.nama_giatmara,
	ref_kursus.nama_kursus,
	ref_intake.nama_intake,
	settings_tawaran_kursus.id_giatmara,
	settings_tawaran_kursus.id,
	settings_tawaran_kursus.id_kursus,
	settings_tawaran_kursus.id_intake,
	ref_modul.kod_modul,ref_modul.id_modul,
	ref_modul.nama_modul ; END;;

DELIMITER ;

DROP TABLE IF EXISTS `admin_groups`;
CREATE TABLE `admin_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
(1,	'webmaster',	'Webmaster'),
(2,	'admin',	'Administrator'),
(3,	'manager',	'Manager'),
(4,	'staff',	'Staff'),
(5,	'applicant',	'pendaftar'),
(7,	'branch manager',	''),
(8,	'branch executive',	''),
(9,	'state officer',	''),
(10,	'ppkl_officer',	''),
(11,	'trainer',	'pengajar');

DROP TABLE IF EXISTS `admin_login_attempts`;
CREATE TABLE `admin_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `giatmara_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `giatmara_id`) VALUES
(1,	'127.0.0.1',	'webmaster',	'$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES',	NULL,	NULL,	NULL,	NULL,	NULL,	'0WNXMXzcj93kYhH8z58uGu',	1451900190,	1503133844,	1,	'Webmaster',	'',	NULL),
(2,	'127.0.0.1',	'admin',	'$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1451900228,	1502805793,	1,	'Admin',	'',	NULL),
(3,	'127.0.0.1',	'manager',	'$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1451900430,	1502805823,	1,	'Manager',	'',	NULL),
(4,	'127.0.0.1',	'staff',	'$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1451900439,	1501483525,	1,	'Staff',	'',	NULL),
(5,	'::1',	'trainner',	'$2y$08$2M1A2Jr7RS/VzpyF0POjVOi4RYqa.3IHIrG8YMhaOOvRpQOXB/OGi',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501475673,	1501534220,	1,	'test',	'giatmara',	NULL),
(6,	'127.0.0.1',	'trainer1',	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501559568,	1501625725,	1,	'trainer1',	'trainer1',	NULL),
(7,	'127.0.0.1',	'branchm1',	'$2y$08$4x3ziZcJSaWIryLD8Y/o0eeNsXVmZHQ8AZCNMwFn2ApO2cTrwb1lS',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501559687,	1503102991,	1,	'branchm1',	'branchm1',	'3'),
(8,	'127.0.0.1',	'branche1',	'$2y$08$y21Wl7iUZ5uIw81NbXWHf.boj7OCnF2tOg5.k9KO2mZl.14.6y97G',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501559759,	1501587074,	1,	'branche1',	'branche1',	NULL),
(9,	'127.0.0.1',	'stateo1',	'$2y$08$oLDy6ToqWD5vyYG5ZMCqdO46IH5Ne95hPpBz5.XE1c9X7MICnonE.',	NULL,	NULL,	NULL,	NULL,	NULL,	'sDawgr5v4H96ayOi6T87A.',	1501559783,	1502785008,	1,	'stateo1',	'stateo1',	'3'),
(10,	'127.0.0.1',	'ppklo1',	'$2y$08$4EKzdiOQ4GJz5WnCYuSyhuaVJhxvXuzFMqojs/V0RZPAGcJvBP9ja',	NULL,	NULL,	NULL,	NULL,	NULL,	'2kjP95b.jMW2HtpKEUvRcu',	1501559804,	1502767692,	1,	'ppklo1',	'ppklo1',	'3'),
(11,	'127.0.0.1',	'trainer2',	'$2y$08$Yzti52LnMWTHRsRbTNEYWuTF3AmjZGi8H/EXD9VRGZir0ZQir19Oq',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501560553,	NULL,	1,	'trainer2',	'trainer2',	NULL),
(12,	'127.0.0.1',	'trainer3',	'$2y$08$57nEYyXG7Kny90Xyw3mQxOaDGZ3bmP0ufRQeZdirqCZJn.tBul7Y6',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501560567,	1502805851,	1,	'trainer3',	'trainer3',	NULL),
(13,	'127.0.0.1',	'trainer4',	'$2y$08$8rOgb3VAyJMuAot1QSahKe0AjVcM5Um/5EuuUmtFWXC9XGnxvnAl.',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501560580,	NULL,	1,	'trainer4',	'trainer4',	NULL),
(14,	'127.0.0.1',	'trainer5',	'$2y$08$qR0ng.iQyNh8Sc3ig3AgluCJkb2wmc/7tWcb687IKwMBrmkmZxwkW',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501560593,	NULL,	1,	'trainer5',	'trainer5',	NULL),
(15,	'127.0.0.1',	'branchm2',	'$2y$08$.qMeHf6FAHJGoR.p84..9ubA464FP9MyoNIrGCOB6mghuSP00Nti2',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501560694,	NULL,	1,	'branchm2',	'branchm2',	NULL),
(16,	'127.0.0.1',	'branchm3',	'$2y$08$cF4E0OJ4oVbHcn8MuPQTEeicOgsfrSjwvupnEVyfYCtrWLiC3ZOwC',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501560708,	NULL,	1,	'branchm3',	'branchm3',	NULL),
(17,	'127.0.0.1',	'branchm4',	'$2y$08$X8j0qRmKy7utPy4QBGM8buhpPww8AJeuN1syQ/DwuyKmVPUfMtASy',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501560774,	NULL,	1,	'branchm4',	'branchm4',	NULL),
(18,	'127.0.0.1',	'branchm5',	'$2y$08$9YiIw65n/pIBJx67EAK.Xe7WMw6QrmsSyoLLNAkfRUFdI7K.i7q9e',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501560793,	NULL,	1,	'branchm5',	'branchm5',	NULL),
(19,	'127.0.0.1',	'branche2',	'$2y$08$YyxwWUw.Ffh.xWjAcjh79.903Ns.QuO7uQL2oFgcX0kGGjHArbM8u',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501560853,	NULL,	1,	'branche2',	'branche2',	NULL),
(20,	'127.0.0.1',	'branche3',	'$2y$08$6pHOnFTqCQzYNWu/Xuw71O0nrx23yoop6KTh.KeuajnGYyOGIJyEW',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561626,	NULL,	1,	'branche3',	'branche3',	NULL),
(21,	'127.0.0.1',	'branche4',	'$2y$08$vp0NX8TFKyAxwjIHmbFPGOLFfw33w0CjWwS0CppoKZMjNj5y.JSIS',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561640,	NULL,	1,	'branche4',	'branche4',	NULL),
(22,	'127.0.0.1',	'branche5',	'$2y$08$x0ijZvzPZ99Rh8G.nZYdTeUNdxhKaXXy0uvJzgK56EoggQrlSkoI2',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561662,	NULL,	1,	'branche5',	'branche5',	NULL),
(23,	'127.0.0.1',	'stateo2',	'$2y$08$r2rHTQ7CXmGZb0HfOqjf1ugR76Zv794U3PqIKy2acfYn.kxD2o.WO',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561742,	NULL,	1,	'stateo2',	'stateo2',	NULL),
(24,	'127.0.0.1',	'stateo3',	'$2y$08$hbGKZonjggo9mOCtT3W41uzkwqGKhef0KZ4lSIsvCg1NMGJU04Aaa',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561761,	NULL,	1,	'stateo3',	'stateo3',	NULL),
(25,	'127.0.0.1',	'stateo4',	'$2y$08$KUruscMfprT.304tm.BotuSniHo7r/CITkFw0grxVrcSKeenc2F4G',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561774,	NULL,	1,	'stateo4',	'stateo4',	NULL),
(26,	'127.0.0.1',	'stateo5',	'$2y$08$E9tJwSRZHhqzwaggENci2eCvOXQZNHvpymPMcoch2q5ZmYh97TclK',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561807,	NULL,	1,	'stateo5',	'stateo5',	NULL),
(27,	'127.0.0.1',	'ppklo2',	'$2y$08$bb5x8oKhxM/3xb8MXTBlYOoJCetR48g85vlf35DwGTx3pXvl8DYH6',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561824,	NULL,	1,	'ppklo2',	'ppklo2',	NULL),
(28,	'127.0.0.1',	'ppklo3',	'$2y$08$TT3aSWtOtQ.NZqSlZ/Qr2eIk9Wm4cTz6VBe.ik4F2VubGroy2/tA.',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561836,	NULL,	1,	'ppklo3',	'ppklo3',	NULL),
(29,	'127.0.0.1',	'ppklo4',	'$2y$08$Tocf7IrXdKQRgDVshH9KcOYN7rIKrnrY0HXrtwdkHju0RaCQn0Nom',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561848,	NULL,	1,	'ppklo4',	'ppklo4',	NULL),
(30,	'127.0.0.1',	'ppklo5',	'$2y$08$6PhX.TOt.dGaTfYfXS2ZJ.rXQtxLX0ciCbzh52EOIV7gzr2gnEez6',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1501561861,	NULL,	1,	'ppklo5',	'ppklo5',	NULL),
(31,	'::1',	'trainergspel',	'$2y$08$ZghGg5Ep1kznVooO364HBOQ3zoBP.VUkfZ.CKPplmeAfDCIcuPxqm',	NULL,	NULL,	NULL,	NULL,	NULL,	'zckspQpn3mMxnxdm/rW3uu',	1501630747,	1503125592,	1,	'trainergspel',	'trainergspel',	'135'),
(32,	'::1',	'coba',	'$2y$08$EjxxmR4r5u99ZFi7dE7omuY9UKIRT6i0f5hfNCdQko20n1khfnkWS',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1502000103,	NULL,	1,	'coba',	'coba',	'5');

DROP TABLE IF EXISTS `admin_users_groups`;
CREATE TABLE `admin_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1,	1,	1),
(2,	2,	2),
(3,	3,	3),
(4,	4,	4),
(5,	5,	3),
(6,	6,	6),
(7,	7,	7),
(8,	8,	8),
(9,	9,	9),
(10,	10,	10),
(11,	11,	6),
(12,	12,	6),
(13,	13,	6),
(14,	14,	6),
(15,	15,	7),
(16,	16,	7),
(17,	17,	7),
(18,	18,	7),
(19,	19,	8),
(20,	20,	8),
(21,	21,	8),
(22,	22,	8),
(23,	23,	9),
(24,	24,	9),
(25,	25,	9),
(26,	26,	9),
(27,	27,	10),
(28,	28,	10),
(29,	29,	10),
(30,	30,	10),
(31,	31,	11),
(32,	32,	11);

DROP TABLE IF EXISTS `alumni`;
CREATE TABLE `alumni` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `gambar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tel_r` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tel_p` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tel_b` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emel` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tidak_bekerja` int(2) NOT NULL,
  `pengakuan` int(2) NOT NULL,
  `tarikh_kemaskini` datetime NOT NULL,
  `no_alumni` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disahkan_oleh` int(10) NOT NULL,
  `disahkan_pada` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `alumni_belajar`;
CREATE TABLE `alumni_belajar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `nama_institusi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bidang` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_mula` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_tamat` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terkini` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `alumni_kerja`;
CREATE TABLE `alumni_kerja` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `jawatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_majikan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_majikan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_muka` date NOT NULL,
  `tarikh_tamat` date NOT NULL,
  `id_pendapatan` int(10) NOT NULL,
  `terkini` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `alumni_usahawan`;
CREATE TABLE `alumni_usahawan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `nama_perniagaan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_perniagaan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_mula` date NOT NULL,
  `tarikh_tamat` date NOT NULL,
  `id_pendapatan` int(10) NOT NULL,
  `terkini` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `api_access`;
CREATE TABLE `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `api_keys`;
CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `api_keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1,	0,	'anonymous',	1,	1,	0,	NULL,	1463388382);

DROP TABLE IF EXISTS `api_limits`;
CREATE TABLE `api_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `api_logs`;
CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `blog_categories` (`id`, `pos`, `title`) VALUES
(1,	1,	'Category 1'),
(2,	2,	'Category 2'),
(3,	3,	'Category 3');

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `author_id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `content_brief` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('draft','active','hidden') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `blog_posts` (`id`, `category_id`, `author_id`, `title`, `image_url`, `content_brief`, `content`, `publish_time`, `status`) VALUES
(1,	1,	2,	'Blog Post 1',	'',	'<p>\r\n	Blog Post 1 Content Brief</p>\r\n',	'<p>\r\n	Blog Post 1 Content</p>\r\n',	'2015-09-25 17:00:00',	'active');

DROP TABLE IF EXISTS `blog_posts_tags`;
CREATE TABLE `blog_posts_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `blog_posts_tags` (`id`, `post_id`, `tag_id`) VALUES
(1,	1,	2),
(2,	1,	1),
(3,	1,	3);

DROP TABLE IF EXISTS `blog_tags`;
CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `blog_tags` (`id`, `title`) VALUES
(1,	'Tag 1'),
(2,	'Tag 2'),
(3,	'Tag 3');

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('01tih9d9hn84bs3p619smo6soaat6goi',	'111.94.164.173',	1501998510,	'__ci_last_regenerate|i:1501998510;'),
('0nt6lsgkg0utcek6g5u5dgepq4o4q3em',	'110.138.46.222',	1499936454,	'__ci_last_regenerate|i:1499936454;'),
('10oht75d5svjhl5orq897t1q3q1cnsvf',	'172.68.65.84',	1501998170,	'__ci_last_regenerate|i:1501998170;'),
('1ggqlq9uc7kmqdj53silolr9fq5o2q60',	'112.215.154.205',	1499956556,	'__ci_last_regenerate|i:1499956515;'),
('1njibvfbqn0mh062h6qkkfkarjp8sgur',	'::1',	1500097691,	'__ci_last_regenerate|i:1500097690;'),
('1r5mp4kokpt2hs4hdlibi76k6vknj3m0',	'162.158.79.203',	1502602960,	'__ci_last_regenerate|i:1502602960;'),
('249o8nf2q74h70643rj9kovo59gfavb8',	'172.68.65.156',	1501998159,	'__ci_last_regenerate|i:1501998159;'),
('251dvk5mnt1pa238bmc0p9sf42imodmk',	'120.188.78.175',	1501223263,	'__ci_last_regenerate|i:1501223263;'),
('253883cla6jdkktv6lm79gfk4pku47dg',	'162.158.79.65',	1502602975,	'__ci_last_regenerate|i:1502602975;'),
('2cdtdq2mdd78j9g33ljogl1q9qg1mhfe',	'127.0.0.1',	1499921551,	'__ci_last_regenerate|i:1499921550;'),
('2f7adnthkbtmct7a0tefg3c0msir3feg',	'162.158.79.29',	1502602979,	'__ci_last_regenerate|i:1502602979;'),
('2fttubmf61r4642tbiu9vr7n85tp4k8g',	'162.158.78.106',	1502602964,	'__ci_last_regenerate|i:1502602964;'),
('2ikjolv8on23j19g130ebch1ggqlacp6',	'162.158.79.59',	1502602972,	'__ci_last_regenerate|i:1502602972;'),
('2o4cc8hp48436q5oaimn6s9oc2b3sugt',	'162.158.79.161',	1501998169,	'__ci_last_regenerate|i:1501998169;'),
('2pr5r75c033euvr21un5lk7hen40vumh',	'162.158.79.107',	1502602974,	'__ci_last_regenerate|i:1502602974;'),
('2tcqnau8c9i9fbp1ntocmb8ibvba9h8b',	'162.158.78.76',	1501998175,	'__ci_last_regenerate|i:1501998175;'),
('3j382ls4lod6a6danb4kvgdq9dgetip9',	'::1',	1499769810,	'__ci_last_regenerate|i:1499769518;'),
('43cn3nl969vln3h25jpoaasdci71tmkq',	'127.0.0.1',	1499774314,	'__ci_last_regenerate|i:1499774298;'),
('4adqorek2om2g9g28snbuiv1ga5ov8tn',	'36.84.13.168',	1500026692,	'__ci_last_regenerate|i:1500026689;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1500025842\";system_messages|a:2:{s:7:\"success\";a:1:{i:0;s:29:\"<p>Logged In Successfully</p>\";}s:5:\"error\";a:0:{}}__ci_vars|a:1:{s:15:\"system_messages\";s:3:\"old\";}'),
('4cbmdkb5o86f9e6qld1f16dmjko5lp5p',	'172.68.65.84',	1501998160,	'__ci_last_regenerate|i:1501998160;'),
('4e8jr2sn051osqemvsij2hsjcdeq2j83',	'180.252.103.168',	1499826816,	'__ci_last_regenerate|i:1499826816;'),
('4kjjjfqttngnnn8sk9ohb6ufjeqbcv5r',	'180.252.103.168',	1499825272,	'__ci_last_regenerate|i:1499825272;'),
('4ns52i5lj6c1avai9bvsfqq00es883q5',	'::1',	1499770310,	'__ci_last_regenerate|i:1499770310;'),
('4pef1i7bo35gi41904bvhjtppu2fiuit',	'162.158.79.209',	1502602963,	'__ci_last_regenerate|i:1502602963;'),
('53hauj3n61dgad5uf7hars1mapocbn2e',	'180.252.103.168',	1499828318,	'__ci_last_regenerate|i:1499828318;'),
('57etafgeivspbs0a6ginn5pprrp2bgr5',	'162.158.79.155',	1501998165,	'__ci_last_regenerate|i:1501998165;'),
('5am4cl30cb603g08efvjadeka04timt1',	'180.252.103.168',	1499828326,	'__ci_last_regenerate|i:1499828326;'),
('5d0rpvqut060u92386798gih5skmogaq',	'162.158.79.107',	1501998176,	'__ci_last_regenerate|i:1501998176;'),
('5lvmved1jh4qd95snpi2tbh45k1qmg47',	'180.252.144.147',	1499770220,	'__ci_last_regenerate|i:1499770141;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1499748390\";system_messages|a:2:{s:7:\"success\";a:1:{i:0;s:29:\"<p>Logged In Successfully</p>\";}s:5:\"error\";a:0:{}}__ci_vars|a:1:{s:15:\"system_messages\";s:3:\"old\";}'),
('5p824fj6qtlmvuikc6vb21uhr67g61fc',	'64.233.173.32',	1499956671,	'__ci_last_regenerate|i:1499956671;'),
('5tuvbk3ucr5qdfvoerd39oj8pnspoa15',	'::1',	1499824876,	'__ci_last_regenerate|i:1499824721;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1499823075\";'),
('5vb00ccrtou94a4kofsc67t6sb9brb9c',	'112.215.154.205',	1499956516,	'__ci_last_regenerate|i:1499956516;'),
('67lvbjnf7c5efga76a5vjr9fepo929vm',	'36.88.156.46',	1499846371,	'__ci_last_regenerate|i:1499846371;'),
('68be644850s3rdam1337l8m82ornh9b1',	'202.62.17.204',	1500088374,	'__ci_last_regenerate|i:1500088371;'),
('6geedugkg8mmd03l1ae5neg5a4ojqgfo',	'::1',	1502876600,	'__ci_last_regenerate|i:1502876553;'),
('6jjsl5nrufa3831ht3moi2v2g66k4ag8',	'162.158.78.16',	1502602964,	'__ci_last_regenerate|i:1502602964;'),
('6o0d05bal1188ggp53td82j2236er4dt',	'162.158.78.76',	1502602975,	'__ci_last_regenerate|i:1502602975;'),
('76qd7lebrf6qn90me1n08uvctqh1pg18',	'180.252.103.168',	1499822575,	'__ci_last_regenerate|i:1499822572;'),
('7af8gkagtcampp7uorj1ch6sdt5726k7',	'180.252.103.168',	1499825869,	'__ci_last_regenerate|i:1499825869;'),
('7sisvkhvqd9lpslsivsns4j6k33suksn',	'112.215.154.205',	1499956518,	'__ci_last_regenerate|i:1499956518;'),
('89rfpmk2cgqje6u2555m2vr4d4ek3d4o',	'162.158.79.65',	1501998175,	'__ci_last_regenerate|i:1501998175;'),
('8aqrak4q3ob8nsegjjogis1paad68oqq',	'180.252.103.168',	1499826138,	'__ci_last_regenerate|i:1499826138;'),
('8fhroij73keet3a96sjbi9qedrite8k0',	'162.158.78.148',	1501998173,	'__ci_last_regenerate|i:1501998173;'),
('8fm8h3q5l1ckk5sr8k3ouvf3ba9dph4q',	'162.158.79.47',	1502602978,	'__ci_last_regenerate|i:1502602978;'),
('8o9149opp4cubhch8m07k3ncvmhp5v35',	'::1',	1499825279,	'__ci_last_regenerate|i:1499825279;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1499823075\";'),
('8qej2otpfko4jnppcnecrom6ophbi27u',	'64.233.173.56',	1499956654,	'__ci_last_regenerate|i:1499956654;'),
('a2n0bbqem9v7ra859fcqr1nu7nr6ldo6',	'::1',	1501431921,	'__ci_last_regenerate|i:1501431920;'),
('a3t4agkqtmu5hsbpvt7ebrprf52tscfo',	'180.252.103.168',	1499826821,	'__ci_last_regenerate|i:1499826816;'),
('b1781g7l9334ch0tn13947fufp95dd0l',	'110.138.46.222',	1499936556,	'__ci_last_regenerate|i:1499936472;identity|s:9:\"webmaster\";username|s:9:\"webmaster\";email|N;user_id|s:1:\"1\";old_last_login|s:10:\"1499933153\";'),
('b53faftvm0tq9gej1crl5v32fnoufblt',	'172.68.142.35',	1501998158,	'__ci_last_regenerate|i:1501998158;'),
('bd50bpt6ft27havpgfd5bnfllfvpgolk',	'162.158.79.23',	1502602966,	'__ci_last_regenerate|i:1502602966;'),
('bi3umb6goh4th2r1lst7gph3anp9gckm',	'162.158.65.78',	1501998158,	'__ci_last_regenerate|i:1501998158;'),
('bn3agauh8fpl0j42euqbruuto6bfj0mc',	'162.158.79.107',	1502602978,	'__ci_last_regenerate|i:1502602978;'),
('c00shjjqaqhfoold7ovfveor3cpc0p96',	'180.252.103.168',	1499826955,	'__ci_last_regenerate|i:1499826955;'),
('cnl5f7ifbb74mvm12ve46vjli8iin1pl',	'172.68.65.84',	1502602961,	'__ci_last_regenerate|i:1502602961;'),
('cpqsdoj8nmlglcegalgmqid05o4152nl',	'::1',	1499770453,	'__ci_last_regenerate|i:1499770330;'),
('cusk2khdtg2jgrthohvr43u0k3jsvqi8',	'180.252.103.168',	1499828321,	'__ci_last_regenerate|i:1499828318;'),
('dam4v3o5c3i35kr4ma2uhpqvo2ro87jm',	'120.188.81.189',	1500542268,	'__ci_last_regenerate|i:1500542268;'),
('dddocnrb2n15c5fk2g7ea69fd10plupl',	'180.252.103.168',	1499822478,	'__ci_last_regenerate|i:1499822478;'),
('diop2tvg4obcodhhfvgb0ker0o6nkgk4',	'127.0.0.1',	1499774298,	'__ci_last_regenerate|i:1499774298;'),
('eiui9nduurbik9jv56b8rgr1f5lu83ip',	'::1',	1500035942,	'__ci_last_regenerate|i:1500035942;'),
('ensfridkns0ef8roe9dcrvlobpgace40',	'162.158.79.23',	1501998166,	'__ci_last_regenerate|i:1501998166;'),
('f2avm0f1l2ciadopvlaob3pgr6rn4ddv',	'162.158.79.29',	1501998178,	'__ci_last_regenerate|i:1501998178;'),
('f3ej2ck9nh57khm45t2lvike5q7a05gi',	'110.138.46.222',	1499930088,	'__ci_last_regenerate|i:1499930088;'),
('f3ja3mgsvhq1plebao0oq0oou6p3cftp',	'162.158.79.95',	1501998170,	'__ci_last_regenerate|i:1501998170;'),
('f4jh8hvocdrl9bebeh7r2omh8gnhuk14',	'180.252.103.168',	1499826955,	'__ci_last_regenerate|i:1499826955;'),
('f7ukcs0ciucd4p1n1667lhc2fiin15bb',	'172.68.133.18',	1501998158,	'__ci_last_regenerate|i:1501998158;'),
('fhj492ms8jq0kto759388g33lbfnaroe',	'172.68.65.126',	1501998176,	'__ci_last_regenerate|i:1501998176;'),
('fkke2oos4ld0tuia6bhhm6u9phqg9s7j',	'162.158.79.203',	1501998159,	'__ci_last_regenerate|i:1501998159;'),
('fofbd9e5fup3qauhtnfj93kqnpirhflq',	'112.215.238.145',	1499869422,	'__ci_last_regenerate|i:1499869417;'),
('fqtsur85m0jfj4jcae3kmmhu4sfhvb8v',	'36.69.157.81',	1499846371,	'__ci_last_regenerate|i:1499846371;'),
('g7dk1q4citkpmob86aaerlcv510e343d',	'180.252.103.168',	1499824015,	'__ci_last_regenerate|i:1499824015;'),
('gl66mktt4i7hq2ekhce8buro92c6kpe0',	'127.0.0.1',	1499921550,	'__ci_last_regenerate|i:1499921550;'),
('gn00mqi70rca05prvkqqmu8s551477c4',	'112.215.154.205',	1499956537,	'__ci_last_regenerate|i:1499956516;'),
('gtjuvrk1qfofs65nujoou96bt1v3b109',	'180.252.144.147',	1499770216,	'__ci_last_regenerate|i:1499770211;'),
('ha3e5kar3hqh9ttvsu4heth18s9jft30',	'108.162.246.179',	1502602959,	'__ci_last_regenerate|i:1502602959;'),
('i1038ppanru881gg5c3da0j8nk1rgnm6',	'110.138.46.222',	1499936468,	'__ci_last_regenerate|i:1499936467;'),
('i59779jea8kg9u9visd1henehp7ogo6c',	'162.158.79.161',	1502602969,	'__ci_last_regenerate|i:1502602969;'),
('i7spnm33m15nkgm58pb9lfjhb3jtf7t5',	'172.68.189.25',	1502602959,	'__ci_last_regenerate|i:1502602959;'),
('j3gvd6ulll23vh522jkp0657qabaims9',	'162.158.79.107',	1502602967,	'__ci_last_regenerate|i:1502602967;'),
('j3s7o7g3qr2jihb4t6j1791dgdn54d1c',	'::1',	1499958463,	'__ci_last_regenerate|i:1499958438;'),
('jf2n5gg8hq5q2ifuhm07vm406ff4f11t',	'112.215.238.145',	1499869424,	'__ci_last_regenerate|i:1499869424;'),
('kjmepquifm388punuhqjqomm2js0rb54',	'202.62.18.100',	1500092339,	'__ci_last_regenerate|i:1500092339;'),
('kvrbp6vf53njajes6r3hvv3lqlt15l4t',	'162.158.78.244',	1502602960,	'__ci_last_regenerate|i:1502602960;'),
('l6vk4qjp3a4lkievgo8k3jn91ud5gsa4',	'202.62.18.105',	1500088726,	'__ci_last_regenerate|i:1500088726;'),
('lintvbln8mdd99r84tb0db8rp8vlful2',	'162.158.79.59',	1501998172,	'__ci_last_regenerate|i:1501998172;'),
('lsors7ciudi53olk0gvlde5md19kv1ej',	'172.68.65.114',	1502602973,	'__ci_last_regenerate|i:1502602973;'),
('lvcpqij7nm5s6t5cneo39e8clgppv1dj',	'172.68.65.156',	1502602960,	'__ci_last_regenerate|i:1502602960;'),
('m65u5qncqdldabif3c8vujsq4fe33fh4',	'162.158.79.107',	1501998166,	'__ci_last_regenerate|i:1501998166;'),
('mep1e9pq3ht65dq50kcdttbjeqkjf8vd',	'110.138.46.222',	1499930030,	'__ci_last_regenerate|i:1499930030;'),
('mjkuvt0n4bbmb95l4llruqom1u4smti6',	'172.68.65.126',	1502602977,	'__ci_last_regenerate|i:1502602977;'),
('mkhkqoetc2slk4mqhrmlirqo9o1couea',	'180.252.103.168',	1499835252,	'__ci_last_regenerate|i:1499835252;'),
('msgtu54aphknjlqp1tv3ff4oad9lo0lk',	'::1',	1499824746,	'__ci_last_regenerate|i:1499824741;'),
('mvipggolfcprs1amkveddc4m1c5ujbht',	'180.252.103.168',	1499825898,	'__ci_last_regenerate|i:1499825898;'),
('nfm4090jmeiafs8d2cpqc25b7i03dr7g',	'64.233.173.51',	1499956649,	'__ci_last_regenerate|i:1499956645;'),
('nqgkghbr4r5jneh61f7t5bdsiaugqo7o',	'36.84.13.168',	1500026683,	'__ci_last_regenerate|i:1500026683;'),
('o9gcdpb1rmjon84qdqlt1bgmms10g8nl',	'36.88.156.46',	1499845176,	'__ci_last_regenerate|i:1499844397;'),
('oj4vob1hdulkvn18q4g3af65k68e8nao',	'36.69.157.81',	1499844397,	'__ci_last_regenerate|i:1499844397;'),
('oprggbs21crtlde7gjiqdsgs5g6sckoq',	'162.158.79.107',	1501998171,	'__ci_last_regenerate|i:1501998171;'),
('oualil227gkdpvijjvg7d02hla58rfo7',	'172.68.65.84',	1502602970,	'__ci_last_regenerate|i:1502602970;'),
('puur20q5aoqp1kbgqqedbs0ad3eosblk',	'162.158.79.47',	1501998177,	'__ci_last_regenerate|i:1501998177;'),
('qc45kkl2c5alsgq3588mu6o0190f06qo',	'162.158.78.16',	1501998164,	'__ci_last_regenerate|i:1501998164;'),
('qc9rbh306u45ggnbjgqen4kdilhss3o9',	'162.158.79.95',	1502602970,	'__ci_last_regenerate|i:1502602970;'),
('qghnlnh1p5hsdhe1l5m083fhehdu4lm7',	'172.68.132.215',	1502602959,	'__ci_last_regenerate|i:1502602959;'),
('qi1183i045e4o0fpkhtdbhp6mbi1s1nc',	'::1',	1499958455,	'__ci_last_regenerate|i:1499958453;'),
('qvk5n5g5dtlaarku4edbtne0ss7sdt1f',	'162.158.78.148',	1502602973,	'__ci_last_regenerate|i:1502602973;'),
('r3ja6c6j990iuu69rufg0orkqo4gmh1a',	'180.252.103.168',	1499827269,	'__ci_last_regenerate|i:1499827269;'),
('rc1f1tgtvo8nk7v7u4p6u9gec7sj0k6t',	'172.68.65.114',	1501998172,	'__ci_last_regenerate|i:1501998172;'),
('rhm38hgoapvftjdmdpkj8qvb0e07rrvb',	'180.252.103.168',	1499828326,	'__ci_last_regenerate|i:1499828326;'),
('rl7i2rtemtpgsu0tp2ur0fa54j6ukman',	'64.233.173.58',	1501219942,	'__ci_last_regenerate|i:1501219926;'),
('s2ib5dh3ip91jmvt511qq1f2qss25s4o',	'162.158.78.106',	1501998164,	'__ci_last_regenerate|i:1501998164;'),
('s46lp546kjo5nuuvt3fbi1qnc2vms0j9',	'120.188.81.189',	1500542268,	'__ci_last_regenerate|i:1500542268;'),
('s8tpk303j6vkakhcbgr0alfhnm3csv5s',	'180.252.103.168',	1499823579,	'__ci_last_regenerate|i:1499823579;'),
('sl4opi5pdu96v5maaotcpf3q9lou8u9t',	'162.158.79.155',	1502602965,	'__ci_last_regenerate|i:1502602965;'),
('ujocn4c9lrfvrccf9bn9ltibq56ed3et',	'120.188.78.175',	1501223267,	'__ci_last_regenerate|i:1501223263;'),
('uk56lkntu8pkhad9nha3mn6519osf8nj',	'162.158.79.209',	1501998163,	'__ci_last_regenerate|i:1501998163;'),
('v0957vg698v59btbkmbnj249hlbf3k64',	'162.158.79.107',	1502602971,	'__ci_last_regenerate|i:1502602971;'),
('vpo8h623ikhclj1didpt9hslsvepcvip',	'162.158.79.107',	1501998174,	'__ci_last_regenerate|i:1501998174;');

DROP TABLE IF EXISTS `cover_photos`;
CREATE TABLE `cover_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos` int(11) NOT NULL DEFAULT '0',
  `image_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','hidden') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `cover_photos` (`id`, `pos`, `image_url`, `status`) VALUES
(1,	2,	'45296-2.jpg',	'active'),
(2,	1,	'2934f-1.jpg',	'active'),
(3,	3,	'3717d-3.jpg',	'active');

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1,	'members',	'General User');

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `markah_modul`;
CREATE TABLE `markah_modul` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelatih` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `pb_teori` float(5,2) NOT NULL,
  `pb_amali` float(5,2) NOT NULL,
  `pam_teori` float(5,2) NOT NULL,
  `pam_amali` float(5,2) NOT NULL,
  `markah` float(5,2) NOT NULL,
  `status_isi_markah` int(2) NOT NULL,
  `tarikh_hantar_pengajar` datetime NOT NULL,
  `tarikh_hantar_pengurus` datetime NOT NULL,
  `tarikh_hantar_pgn` datetime NOT NULL,
  `catatan_pengurus` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_pgn` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_terampil` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pelatih` (`id_pelatih`),
  CONSTRAINT `markah_modul_ibfk_1` FOREIGN KEY (`id_pelatih`) REFERENCES `pelatih` (`id_pelatih`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `markah_modul` (`id`, `id_pelatih`, `id_kursus`, `id_modul`, `pb_teori`, `pb_amali`, `pam_teori`, `pam_amali`, `markah`, `status_isi_markah`, `tarikh_hantar_pengajar`, `tarikh_hantar_pengurus`, `tarikh_hantar_pgn`, `catatan_pengurus`, `catatan_pgn`, `status_terampil`) VALUES
(12,	1,	12,	12,	10.00,	70.00,	10.00,	70.00,	80.00,	0,	'2017-08-18 00:32:10',	'2017-08-07 10:38:52',	'2017-08-07 10:38:52',	'',	'',	0),
(17,	1,	17,	17,	10.00,	70.00,	10.00,	70.00,	80.00,	0,	'2017-08-18 00:33:18',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0),
(18,	1,	18,	18,	5.00,	6.00,	7.05,	8.04,	12.23,	0,	'2017-08-18 05:57:13',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0),
(19,	1,	19,	19,	20.00,	80.00,	20.00,	80.00,	100.00,	0,	'2017-08-18 00:33:18',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0),
(20,	1,	20,	20,	9.00,	12.00,	11.00,	12.00,	21.60,	0,	'2017-08-18 05:12:16',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0),
(21,	1,	18,	18,	10.00,	70.00,	10.00,	70.00,	80.00,	0,	'2017-08-18 00:22:15',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0),
(26,	65,	0,	0,	13.00,	14.00,	15.00,	16.00,	28.20,	0,	'2017-08-18 07:39:31',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0),
(27,	65,	0,	0,	13.00,	14.00,	15.00,	16.00,	28.20,	0,	'2017-08-18 07:39:35',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0),
(28,	65,	0,	1986,	13.00,	14.00,	15.00,	16.00,	28.20,	0,	'2017-08-18 07:40:41',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0),
(29,	67,	32,	1986,	10.00,	6.00,	2.00,	2.00,	12.40,	0,	'2017-08-19 05:42:10',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0),
(34,	68,	32,	1986,	4.00,	3.00,	4.00,	9.00,	8.80,	2,	'2017-08-18 16:54:57',	'2017-08-18 16:54:57',	'2017-08-18 16:54:57',	'',	'',	0),
(35,	69,	32,	1986,	12.00,	12.00,	12.00,	12.00,	24.00,	0,	'2017-08-19 14:17:13',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'',	'',	0);

DELIMITER ;;

CREATE TRIGGER `markah_modul_before_insert` BEFORE INSERT ON `markah_modul` FOR EACH ROW
BEGIN

-- SET new.markah = (
--	(
--		new.pb_teori * 20 / 100 + new.pb_amali * 80 / 100
--	) * 70 / 100 + (
--		new.pam_teori * 20 / 100 + new.pam_amali * 80 / 100
--	) * 30 / 100
-- ) ;

if (select pb_teori from ref_markah) < new.pb_teori then
     set @message_text = concat('pb_teori tidak boleh lebih dari ',  (select pb_teori from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pb_amali from ref_markah) < new.pb_amali then
     set @message_text = concat('pb_amali tidak boleh lebih dari ',  (select pb_amali from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pam_teori from ref_markah) < new.pam_teori then
     set @message_text = concat('pam_teori tidak boleh lebih dari ',  (select pam_teori from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pam_amali from ref_markah) < new.pam_amali then
     set @message_text = concat('pam_amali tidak boleh lebih dari ',  (select pam_amali from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
else
     SET new.markah = (
	(
		new.pb_teori + new.pb_amali
	) * 70 / 100 + (
		new.pam_teori + new.pam_amali
	) * 30 / 100
) ;
end if;

END;;

CREATE TRIGGER `markah_modul_before_update` BEFORE UPDATE ON `markah_modul` FOR EACH ROW
BEGIN

-- SET new.markah = (
--	(
--		new.pb_teori * 20 / 100 + new.pb_amali * 80 / 100
--	) * 70 / 100 + (
--		new.pam_teori * 20 / 100 + new.pam_amali * 80 / 100
--	) * 30 / 100
-- ) ;
if (select pb_teori from ref_markah) < new.pb_teori then
     set @message_text = concat('pb_teori tidak boleh lebih dari ',  (select pb_teori from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pb_amali from ref_markah) < new.pb_amali then
     set @message_text = concat('pb_amali tidak boleh lebih dari ',  (select pb_amali from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pam_teori from ref_markah) < new.pam_teori then
     set @message_text = concat('pam_teori tidak boleh lebih dari ',  (select pam_teori from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
elseif (select pam_amali from ref_markah) < new.pam_amali then
     set @message_text = concat('pam_amali tidak boleh lebih dari ',  (select pam_amali from ref_markah));
     SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = @message_text;
else
     SET new.markah = (
	(
		new.pb_teori + new.pb_amali
	) * 70 / 100 + (
		new.pam_teori + new.pam_amali
	) * 30 / 100
) ;
end if;

 END;;

DELIMITER ;

DROP TABLE IF EXISTS `markah_modul_2`;
CREATE TABLE `markah_modul_2` (
  `id` int(10) NOT NULL,
  `id_pelatih` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `gcpa` float(3,2) NOT NULL,
  `kokurikulum` int(2) NOT NULL,
  `literasi_komputer` int(2) NOT NULL,
  `keusahawanan` int(2) NOT NULL,
  `puji` int(2) NOT NULL,
  `kehadiran` int(3) NOT NULL,
  `latihan_industri` int(2) NOT NULL,
  `status_isi_markah` int(2) NOT NULL,
  `tarikh_hantar_pengajar` datetime NOT NULL,
  `tarikh_hantar_pengurus` datetime NOT NULL,
  `tarikh_hantar_pgn` datetime NOT NULL,
  `catatan_pengurus` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_pgn` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `markah_modul_status`;
CREATE TABLE `markah_modul_status` (
  `id_pelatih` int(10) NOT NULL,
  `pengurus` int(2) NOT NULL,
  `pengurus_sah` datetime NOT NULL,
  `pgn` int(2) NOT NULL,
  `pgn_sah` datetime NOT NULL,
  `ppkl` int(2) NOT NULL,
  `ppkl_sah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pelatih`;
CREATE TABLE `pelatih` (
  `id_pelatih` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `no_pelatih` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `jenis_pelatih` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LPP04' COMMENT 'LPP04 / LPP09',
  `status_pelatih` int(2) NOT NULL,
  `id_settings_tawaran_kursus` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_pelatih`),
  KEY `id_kursus` (`id_kursus`),
  KEY `id_giatmara` (`id_giatmara`),
  KEY `id_permohonan` (`id_permohonan`),
  CONSTRAINT `pelatih_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `settings_tawaran_kursus` (`id`),
  CONSTRAINT `pelatih_ibfk_2` FOREIGN KEY (`id_giatmara`) REFERENCES `ref_giatmara` (`id`),
  CONSTRAINT `pelatih_ibfk_3` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan_kursus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pelatih` (`id_pelatih`, `id_permohonan`, `no_pelatih`, `no_mykad`, `id_giatmara`, `id_kursus`, `jenis_pelatih`, `status_pelatih`, `id_settings_tawaran_kursus`) VALUES
(1,	51,	'',	'123',	18,	30,	'LPP04',	1,	NULL),
(65,	51,	'',	'123',	18,	30,	'LPP04',	1,	NULL),
(66,	51,	'',	'123',	134,	31,	'LPP04',	1,	NULL),
(67,	51,	'',	'123',	135,	32,	'LPP04',	1,	NULL),
(68,	87,	'406118700026',	'821110145677',	135,	32,	'LPP04',	1,	523),
(69,	86,	'1234567890',	'0987654321',	135,	32,	'LPP04',	1,	NULL);

DROP TABLE IF EXISTS `permohonan_butir_peribadi`;
CREATE TABLE `permohonan_butir_peribadi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_lahir` date NOT NULL,
  `kewarganegaraan` int(10) NOT NULL,
  `umur` int(3) NOT NULL,
  `no_telefon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poskod` int(10) NOT NULL,
  `emel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jantina` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangsa` int(10) NOT NULL,
  `etnik` int(10) NOT NULL,
  `agama` int(10) NOT NULL,
  `taraf_perkahwinan` int(10) NOT NULL,
  `kategori_kelulusan` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelulusan` int(10) DEFAULT NULL,
  `matlamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_pemohon` int(10) NOT NULL,
  `no_rujukan_permohonan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengesahan` int(2) NOT NULL,
  `pengakuan` int(2) NOT NULL,
  `tarikh_hantar` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kewarganegaraan` (`kewarganegaraan`),
  KEY `bangsa` (`bangsa`),
  KEY `etnik` (`etnik`),
  KEY `agama` (`agama`),
  KEY `taraf_perkahwinan` (`taraf_perkahwinan`),
  KEY `kategori_pemohon` (`kategori_pemohon`),
  KEY `poskod` (`poskod`),
  KEY `kelulusan` (`kelulusan`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_10` FOREIGN KEY (`kelulusan`) REFERENCES `ref_kelulusan` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_11` FOREIGN KEY (`kategori_pemohon`) REFERENCES `ref_kategori_pemohon` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_12` FOREIGN KEY (`poskod`) REFERENCES `ref_poskod_bandar_negeri` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_13` FOREIGN KEY (`kelulusan`) REFERENCES `ref_kelulusan` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_4` FOREIGN KEY (`kewarganegaraan`) REFERENCES `ref_kewarganegaraan` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_6` FOREIGN KEY (`bangsa`) REFERENCES `ref_bangsa` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_7` FOREIGN KEY (`etnik`) REFERENCES `ref_etnik` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_8` FOREIGN KEY (`agama`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `permohonan_butir_peribadi_ibfk_9` FOREIGN KEY (`taraf_perkahwinan`) REFERENCES `ref_taraf_perkahwinan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permohonan_butir_peribadi` (`id`, `nama_penuh`, `no_mykad`, `tarikh_lahir`, `kewarganegaraan`, `umur`, `no_telefon`, `no_hp`, `alamat`, `poskod`, `emel`, `jantina`, `bangsa`, `etnik`, `agama`, `taraf_perkahwinan`, `kategori_kelulusan`, `kelulusan`, `matlamat`, `kategori_pemohon`, `no_rujukan_permohonan`, `pengesahan`, `pengakuan`, `tarikh_hantar`) VALUES
(15,	'sasa',	'4242',	'1998-07-02',	2,	23,	'323232',	'32323',	'adasdasdadas',	2,	'iran@gmail.com',	NULL,	2,	2,	3,	4,	'Akademi',	1,	'Bekerja',	2,	'sasas',	1,	0,	NULL),
(17,	'asasada',	'12133',	'2009-07-11',	2,	12,	'088787',	'867886',	'dsadasfs',	3,	'asisten91@gmail.com',	NULL,	2,	7,	2,	4,	'0',	4,	'asas',	4,	'123131',	0,	0,	'2017-07-21 00:00:00'),
(53,	'test',	'11111',	'2017-07-27',	1,	1,	'23',	'321',	'alamat',	1,	'test@gmail.com',	NULL,	1,	2,	1,	3,	'1',	2,	'test2',	3,	'rujukan',	1,	2,	'2017-07-27 00:29:51'),
(65,	'Nama Penuh',	'123',	'2008-07-01',	1,	9,	'123',	'8899',	'Alamat Surat',	1,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	1,	'Akademi',	1,	'Bekerja',	2,	'2017070001',	1,	2,	'2017-07-26 00:00:00'),
(71,	'Nama Penuh 2',	'456',	'2007-07-01',	2,	10,	'1234',	'5678',	'Alamat Surat Menyurat',	1,	'ninolooh@gmail.com',	NULL,	2,	3,	1,	1,	'Akademi',	1,	'Bekerja',	2,	'2017070002',	1,	2,	'2017-07-30 00:00:00'),
(72,	'Raisa',	'9999',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	1,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Akademi',	2,	'Berniaga Sendiri',	2,	'2017070003',	1,	2,	'2017-07-31 00:00:00'),
(73,	'test3',	'test3',	'1997-07-24',	1,	20,	'1234',	'1234',	'test3',	2,	'test3@test3.com',	NULL,	1,	1,	1,	1,	'Akademi',	1,	'Bekerja',	2,	'2017070004',	1,	2,	'2017-07-31 00:00:00'),
(74,	'Test Nino',	'888',	'2007-01-01',	2,	10,	'123',	'8899',	'Alamat',	1,	'ninolooh@gmail.com',	NULL,	1,	2,	1,	2,	'Akademi',	1,	'Bekerja',	2,	'2017070005',	1,	2,	'2017-07-31 00:00:00'),
(75,	'Nama Penuh',	'123456789012',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'bambytop@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080022',	1,	2,	'2017-08-18 00:00:00'),
(76,	'Putri',	'9900000000000',	'2008-07-01',	1,	9,	'123',	'8899',	'Alamat Surat',	1,	'ninolooh@gmail.com',	NULL,	2,	2,	1,	2,	'Akademi',	1,	'Bekerja',	2,	'2017080007',	1,	2,	'2017-08-07 00:00:00'),
(96,	'Nama Penuh',	'123456789013',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080008',	1,	2,	'2017-08-08 00:00:00'),
(97,	'Nama Penuh',	'123456789014',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080009',	1,	2,	'2017-08-08 00:00:00'),
(98,	'Nama Penuh',	'123456789015',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080010',	1,	2,	'2017-08-08 00:00:00'),
(99,	'Nama Penuh',	'123456789016',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080011',	1,	2,	'2017-08-08 00:00:00'),
(100,	'Nama Penuh',	'123456789017',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080012',	1,	2,	'2017-08-08 00:00:00'),
(101,	'Nama Penuh',	'123456789018',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080013',	1,	2,	'2017-08-08 00:00:00'),
(102,	'Nama Penuh',	'123456789019',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080014',	1,	2,	'2017-08-08 00:00:00'),
(103,	'Nama Penuh',	'123456789010',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080015',	1,	2,	'2017-08-08 00:00:00'),
(104,	'Nama Penuh',	'123456789011',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080016',	1,	2,	'2017-08-08 00:00:00'),
(105,	'Nama Penuh',	'123456789020',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080017',	1,	2,	'2017-08-08 00:00:00'),
(106,	'Nama Penuh',	'123456789021',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080018',	1,	2,	'2017-08-08 00:00:00'),
(107,	'sasa',	'4242',	'1998-07-02',	2,	23,	'323232',	'32323',	'adasdasdadas',	2,	'iran@gmail.com',	NULL,	2,	2,	3,	4,	'Akademi',	1,	'Bekerja',	2,	'2017080019',	1,	2,	'2017-08-08 00:00:00'),
(108,	'Nama Penuh',	'123456789022',	'2007-07-01',	1,	10,	'123',	'8899',	'Alamat Surat',	3,	'ninolooh@gmail.com',	NULL,	1,	1,	1,	2,	'Kemahiran',	1,	'Bekerja',	2,	'2017080020',	1,	2,	'2017-08-08 00:00:00'),
(111,	'Azizul Azman',	'821110145677',	'1982-11-10',	1,	35,	'0389008900',	'0192104055',	'No 18, Jln Lapangan Terbang',	7,	'maizun@mmsc.com.my',	NULL,	1,	1,	1,	1,	'Akademik',	1,	'Bekerja',	2,	'2017080021',	1,	2,	'2017-08-16 00:00:01'),
(116,	'qwerty',	'192837465012',	'1988-06-01',	1,	29,	'12345678',	'12345678',	'qwerty',	1,	'bambytop@gmail.com',	NULL,	1,	1,	1,	1,	'Kemahiran',	1,	'Bekerja',	2,	'2017080022',	1,	2,	'2017-08-18 00:00:00');

DROP TABLE IF EXISTS `permohonan_kursus`;
CREATE TABLE `permohonan_kursus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL COMMENT 'harusnya id_pemohon, dari id butir_pribadi',
  `kursus1` int(10) NOT NULL,
  `kursus2` int(10) NOT NULL,
  `kursus3` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_permohonan` (`id_permohonan`),
  KEY `kursus1` (`kursus1`),
  KEY `kursus2` (`kursus2`),
  KEY `kursus3` (`kursus3`),
  CONSTRAINT `permohonan_kursus_ibfk_12` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan_butir_peribadi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permohonan_kursus_ibfk_13` FOREIGN KEY (`kursus1`) REFERENCES `settings_tawaran_kursus` (`id`),
  CONSTRAINT `permohonan_kursus_ibfk_14` FOREIGN KEY (`kursus2`) REFERENCES `settings_tawaran_kursus` (`id`),
  CONSTRAINT `permohonan_kursus_ibfk_15` FOREIGN KEY (`kursus3`) REFERENCES `settings_tawaran_kursus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permohonan_kursus` (`id`, `id_permohonan`, `kursus1`, `kursus2`, `kursus3`) VALUES
(51,	65,	30,	31,	32),
(56,	71,	30,	31,	32),
(59,	72,	30,	31,	32),
(69,	73,	30,	31,	32),
(74,	74,	30,	31,	32),
(86,	76,	527,	522,	32),
(87,	111,	523,	522,	524),
(95,	116,	634,	881,	387);

DROP TABLE IF EXISTS `permohonan_maklumat_am`;
CREATE TABLE `permohonan_maklumat_am` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `media_cetak` int(1) NOT NULL DEFAULT '0',
  `media_elektronik` int(1) NOT NULL DEFAULT '0',
  `internet` int(1) NOT NULL DEFAULT '0',
  `media_sosial` int(1) NOT NULL DEFAULT '0',
  `rakan` int(1) NOT NULL DEFAULT '0',
  `keluarga` int(1) NOT NULL DEFAULT '0',
  `pameran` int(1) NOT NULL DEFAULT '0',
  `lain` int(1) NOT NULL DEFAULT '0',
  `text_lain` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permohonan_maklumat_am` (`id`, `id_permohonan`, `media_cetak`, `media_elektronik`, `internet`, `media_sosial`, `rakan`, `keluarga`, `pameran`, `lain`, `text_lain`) VALUES
(5,	1,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(6,	1,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(7,	1,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(8,	1,	0,	0,	1,	0,	0,	0,	0,	0,	''),
(9,	1,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(10,	1,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(11,	1,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(12,	5,	0,	0,	1,	0,	0,	0,	0,	0,	''),
(13,	1,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(14,	16,	1,	1,	0,	0,	0,	0,	0,	0,	''),
(15,	18,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(16,	18,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(17,	0,	1,	0,	0,	0,	0,	0,	0,	0,	''),
(18,	0,	1,	0,	0,	0,	0,	0,	0,	0,	''),
(19,	0,	0,	0,	0,	0,	0,	0,	0,	1,	''),
(20,	15,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(21,	18,	0,	0,	0,	0,	0,	0,	0,	0,	''),
(23,	65,	1,	1,	0,	0,	0,	0,	0,	0,	''),
(26,	71,	1,	1,	0,	0,	0,	0,	0,	0,	''),
(29,	72,	1,	0,	1,	0,	0,	0,	0,	0,	''),
(30,	73,	1,	1,	0,	0,	0,	0,	0,	0,	''),
(31,	73,	1,	1,	0,	0,	0,	0,	0,	0,	''),
(32,	73,	0,	0,	0,	0,	1,	0,	0,	0,	''),
(33,	73,	0,	0,	0,	0,	1,	0,	0,	0,	''),
(34,	73,	0,	0,	0,	0,	1,	0,	0,	0,	''),
(35,	73,	0,	0,	0,	0,	1,	0,	0,	0,	''),
(36,	73,	0,	0,	0,	0,	1,	0,	0,	0,	''),
(37,	73,	0,	0,	0,	0,	0,	1,	0,	0,	''),
(38,	73,	0,	0,	0,	1,	0,	0,	0,	0,	''),
(39,	73,	1,	0,	0,	0,	0,	0,	0,	0,	''),
(40,	74,	1,	0,	0,	0,	0,	0,	0,	0,	''),
(41,	74,	0,	0,	0,	0,	0,	1,	0,	0,	''),
(42,	74,	1,	0,	0,	0,	0,	0,	0,	0,	''),
(43,	74,	1,	0,	0,	0,	0,	0,	0,	0,	''),
(44,	74,	1,	1,	0,	0,	0,	0,	0,	0,	''),
(45,	65,	1,	0,	1,	0,	0,	0,	0,	0,	''),
(46,	65,	1,	0,	1,	0,	0,	0,	0,	0,	''),
(47,	65,	1,	0,	1,	0,	0,	0,	0,	0,	''),
(57,	116,	1,	0,	0,	0,	0,	0,	0,	1,	'qq');

DROP TABLE IF EXISTS `permohonan_penjaga`;
CREATE TABLE `permohonan_penjaga` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `maklumat` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_hubungan` int(10) DEFAULT NULL,
  `a_jenis_pengenalan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_mykad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_kewarganegaraan` int(10) DEFAULT NULL,
  `a_kategori_penjaga` int(10) DEFAULT NULL,
  `a_no_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_agama` int(10) DEFAULT NULL,
  `a_etnik` int(10) DEFAULT NULL,
  `a_bangsa` int(10) DEFAULT NULL,
  `a_alamat` text COLLATE utf8mb4_unicode_ci,
  `a_poskod` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_pekerjaan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_pendapatan` int(10) DEFAULT NULL,
  `a_majikan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_no_tel_pejabat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_samb` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_alamat_pejabat` text COLLATE utf8mb4_unicode_ci,
  `b_nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_jenis_pengenalan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_mykad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_kewarganegaraan` int(10) DEFAULT NULL,
  `b_kategori_penjaga` int(10) DEFAULT NULL,
  `b_no_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_agama` int(10) DEFAULT NULL,
  `b_etnik` int(10) DEFAULT NULL,
  `b_bangsa` int(10) DEFAULT NULL,
  `b_alamat` text COLLATE utf8mb4_unicode_ci,
  `b_poskod` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_pekerjaan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_pendapatan` int(10) DEFAULT NULL,
  `b_majikan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_no_tel_pejabat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_samb` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_alamat_pejabat` text COLLATE utf8mb4_unicode_ci,
  `c_nama_penuh` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_jenis_pengenalan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_mykad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_kewarganegaraan` int(10) DEFAULT NULL,
  `c_kategori_penjaga` int(10) DEFAULT NULL,
  `c_no_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_agama` int(10) DEFAULT NULL,
  `c_etnik` int(10) DEFAULT NULL,
  `c_bangsa` int(10) DEFAULT NULL,
  `c_alamat` text COLLATE utf8mb4_unicode_ci,
  `c_poskod` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_pekerjaan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_pendapatan` int(10) DEFAULT NULL,
  `c_majikan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_no_tel_pejabat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_samb` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_alamat_pejabat` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permohonan_penjaga` (`id`, `id_permohonan`, `maklumat`, `a_nama_penuh`, `a_hubungan`, `a_jenis_pengenalan`, `a_mykad`, `a_kewarganegaraan`, `a_kategori_penjaga`, `a_no_tel`, `a_no_hp`, `a_agama`, `a_etnik`, `a_bangsa`, `a_alamat`, `a_poskod`, `a_pekerjaan`, `a_pendapatan`, `a_majikan`, `a_no_tel_pejabat`, `a_samb`, `a_alamat_pejabat`, `b_nama_penuh`, `b_jenis_pengenalan`, `b_mykad`, `b_kewarganegaraan`, `b_kategori_penjaga`, `b_no_tel`, `b_no_hp`, `b_agama`, `b_etnik`, `b_bangsa`, `b_alamat`, `b_poskod`, `b_pekerjaan`, `b_pendapatan`, `b_majikan`, `b_no_tel_pejabat`, `b_samb`, `b_alamat_pejabat`, `c_nama_penuh`, `c_jenis_pengenalan`, `c_mykad`, `c_kewarganegaraan`, `c_kategori_penjaga`, `c_no_tel`, `c_no_hp`, `c_agama`, `c_etnik`, `c_bangsa`, `c_alamat`, `c_poskod`, `c_pekerjaan`, `c_pendapatan`, `c_majikan`, `c_no_tel_pejabat`, `c_samb`, `c_alamat_pejabat`) VALUES
(1,	1,	'1',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(2,	1,	'0',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(3,	1,	'0',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(4,	1,	'1',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'Ali',	'Awam',	'23',	1,	0,	'0978678',	'0678678',	1,	1,	0,	'Jalan kembang sari 36',	'12334',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'Jalan kembang sari 36',	'12334',	'',	1,	'',	'',	'',	''),
(5,	1,	'0',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(6,	1,	'0',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(7,	1,	'0',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(8,	1,	'1',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(9,	1,	'0',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(10,	5,	'1',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'Soepradja',	'Awam',	'432',	1,	0,	'098',	'9877',	1,	1,	0,	'Ugfyffhu',	'665',	'Ttfh',	1,	'Hghh',	'7765',	'',	'Gggyvg',	'Mudyaitisfa',	'Awam',	'4433',	1,	0,	'0988',	'099877',	1,	1,	0,	'Ugfyffhu',	'665',	'',	0,	'',	'',	'',	''),
(11,	16,	'1',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'Nama Penuh Bapa',	'Awam',	'',	2,	0,	'',	'',	1,	1,	1,	'Alamat tetap',	'123',	'',	1,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'Alamat tetap',	'123',	'',	0,	'',	'',	'',	''),
(12,	18,	'1',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'sasa',	'Polis',	'dsa',	1,	2,	'2121',	'12121',	4,	3,	2,	'sadasd',	'sadsad',	'asas',	1,	'sasa',	'sas',	'asa',	'sasas',	'sasa',	'Polis',	'sasa',	1,	2,	'2122',	'2121',	1,	3,	3,	'sadasd',	'sadsad',	'asas',	1,	'',	'322',	'3232',	'sdasdsa'),
(13,	18,	'0',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(14,	0,	'',	'',	0,	'',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(15,	18,	'1',	'',	0,	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'Prasamiatmaja',	'Awam',	'3276061305680002',	3,	4,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	'',	'',	'Awam',	'',	0,	0,	'',	'',	0,	0,	0,	'',	'',	'',	0,	'',	'',	'',	''),
(16,	65,	'2',	'Nama Penuh 2',	2,	'Awam',	'1234',	1,	2,	'4455',	'6677',	1,	2,	2,	'ALamat Tetap 2',	'1',	'Pekerjaan',	1,	'Majikan 2',	'123',	'456',	'ALamat Pejabat 2',	'Nama Penuh Bapa',	'Awam',	'12345',	1,	1,	'1234',	'5678',	1,	2,	1,	'Alamat Tetap',	'6789',	'Pekerjaan',	1,	'Majikan',	'123',	'456',	'Alamat Pejabat',	'Nama Penuh Ibu',	'Awam',	'667788',	1,	2,	'456',	'88997',	1,	2,	2,	'Alamat Tetap',	'6789',	'Pekerjaan',	2,	'Madjikan',	'789',	'999',	'Alamat Pejabat'),
(19,	71,	'2',	'Nama Penuh 2',	3,	'Awam',	'88888',	2,	1,	'6789',	'9876',	2,	4,	2,	'Alamat Tetap',	'1',	'Pekerjaan',	2,	'Majikan 2',	'123',	'456',	'Alamat Pejabat 2',	'Nama Penuh Bapa',	'Awam',	'44444',	1,	1,	'123',	'456',	2,	1,	2,	'Alamat tetap',	'1',	'Pekerjaan',	1,	'Majikan',	'123',	'456',	'Alamat Pejabat',	'Nama Penuh Ibu',	'Awam',	'77777',	2,	1,	'5566',	'8899',	2,	1,	1,	'Alamat tetap',	'1',	'Pekerjaan',	1,	'Madjikan',	'789',	'999',	'Alamat pejabat ada disini'),
(24,	75,	'2',	'test',	1,	'Awam',	'1234',	1,	1,	'1234',	'1234',	1,	1,	1,	'test',	'02400',	'test',	1,	'test',	'1234',	'1234',	'test',	'test',	'Awam',	'1234',	1,	1,	'123',	'1234',	1,	1,	1,	'test',	'02600',	'test',	1,	'test',	'1324',	'1234',	'test',	'test',	'Awam',	'1234',	1,	1,	'1234',	'134',	1,	1,	1,	'test',	'02600',	'test',	1,	'test',	'1234',	'1234',	'1234');

DROP TABLE IF EXISTS `permohonan_tempat_tinggal`;
CREATE TABLE `permohonan_tempat_tinggal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL,
  `tempat_tinggal` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengangkutan` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permohonan_tempat_tinggal` (`id`, `id_permohonan`, `tempat_tinggal`, `pengangkutan`) VALUES
(4,	15,	'1',	'0'),
(6,	15,	'1',	'0'),
(8,	18,	'1',	'1'),
(9,	65,	'2',	'1'),
(10,	71,	'1',	'2'),
(13,	72,	'1',	'2'),
(14,	73,	'1',	'2'),
(15,	73,	'1',	'2'),
(16,	73,	'1',	'1'),
(17,	73,	'1',	'1'),
(18,	73,	'1',	'1'),
(19,	73,	'1',	'1'),
(20,	73,	'1',	'1'),
(21,	73,	'1',	'1'),
(22,	73,	'1',	'1'),
(23,	73,	'2',	'2'),
(24,	74,	'2',	'2'),
(25,	74,	'1',	'1'),
(26,	74,	'2',	'2'),
(27,	74,	'2',	'2'),
(28,	74,	'1',	'2'),
(29,	75,	'1',	'1'),
(30,	75,	'2',	'1'),
(33,	76,	'1',	'2');

DROP TABLE IF EXISTS `ref_agama`;
CREATE TABLE `ref_agama` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_agama` (`id`, `agama`) VALUES
(1,	'Islam'),
(2,	'Hindu'),
(3,	'Buddha'),
(4,	'Sikh'),
(5,	'Kristian'),
(6,	'Bebas'),
(7,	'Lain-lain');

DROP TABLE IF EXISTS `ref_bangsa`;
CREATE TABLE `ref_bangsa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bangsa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_bangsa` (`id`, `bangsa`) VALUES
(1,	'Melayu'),
(2,	'Cina'),
(3,	'India'),
(4,	'Bumiputera'),
(5,	'Lain-lain');

DROP TABLE IF EXISTS `ref_etnik`;
CREATE TABLE `ref_etnik` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `etnik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_etnik` (`id`, `etnik`) VALUES
(1,	'Melayu'),
(2,	'Cina'),
(3,	'India'),
(4,	'Iban'),
(5,	'Bidayuh'),
(6,	'Melanau'),
(7,	'Dusun'),
(8,	'Lain-lain');

DROP TABLE IF EXISTS `ref_giatmara`;
CREATE TABLE `ref_giatmara` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
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
  `id_negeri` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_code` (`kod_giatmara`),
  KEY `district_id` (`id_bandar`),
  KEY `id_negeri` (`id_negeri`)
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8;

INSERT INTO `ref_giatmara` (`id`, `kod_giatmara`, `nama_giatmara`, `alamat`, `tel_no`, `fax_no`, `email`, `registered`, `co_status`, `id_bandar`, `company_type`, `updatedon`, `updatedby`, `id_negeri`) VALUES
(1,	'HQD',	'Ibu Pejabat GIATMARA',	'Wisma GIATMARA, No 39, Jalan Medan Tuanku, 50300 Kuala Lumpur',	'03-26912690',	'03-26912690',	'',	'2006-01-15 00:00:00',	1,	9757,	3,	'2012-05-29 00:00:00',	'admin',	20),
(2,	'HQ1',	'Ibu Pejabat GIATMARA',	'Wisma GIATMARA, No 39, Jalan Medan Tuanku, 50300 Kuala Lumpur',	'03-26912690',	'03-26912690',	'',	'2006-01-15 00:00:00',	1,	9757,	4,	'2012-05-29 00:00:00',	'admin',	20),
(3,	'539',	'GIATMARA PERLIS',	'Lot No. C5, Kompleks Mara Kangar, Persiaran Jubli Emas, 01000 Kangar Perlis Indera Kayangan',	'04-9782984',	'04-9760914',	'gmperlis@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	24440,	2,	'2015-05-12 00:00:00',	'670416095027',	15),
(4,	'535',	'GIATMARA PERAK',	'No. 10 & 10A, Medan Istana 6, Bandar Ipoh Raya 30000 Ipoh Perak Darul Ridzuan',	'05-2536784',	'05-2536782',	'gmperak@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27805,	2,	'2015-02-25 00:00:00',	'690102086468',	11),
(5,	'532',	'GIATMARA MELAKA',	'Tingkat 4  Kompleks Mara, \nJalan Hang Tuah \n75300 Kota Melaka',	'06-2843101',	'06-2843103',	'',	'2006-01-15 00:00:00',	1,	30770,	2,	'2013-06-12 00:00:00',	'',	8),
(6,	'537',	'GIATMARA PAHANG',	'Tingkat 4, Bangunan Tabung Haji, Jalan Bukit Ubi, 25150 Kuantan, Pahang Darul Makmur',	'09-5135178',	'09-5132175',	'gmpahang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	33403,	2,	'2014-04-07 00:00:00',	'570601055889',	13),
(7,	'543',	'GIATMARA SARAWAK',	'No. 15C, Tingkat 2, Kompleks MARA Satok Parade, Jalan Satok, 93400 Kuching, Sarawak',	'082-237958',	'082-237953',	'gmsarawak@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	26073,	2,	'2014-06-24 00:00:00',	'821216135165',	19),
(8,	'536',	'GIATMARA KEDAH',	'GIATMARA Kedah\nLot 9 &10, Tingkat 2, Komplek Perniagaan Utama,\n05150 Alor Setar, Kuala Kedah',	'04-7204480',	'04-7204481',	'gmkedah@giatmara.edu.my',	'2006-01-15 00:00:00',	0,	36835,	2,	'2013-09-05 00:00:00',	'691027125002',	12),
(9,	'544',	'GIATMARA WILAYAH PERSEKUTUAN',	'No.29-1, Jalan 46B/26,Pusat Bandar Sri Rampai,\r\nSetapak,53300 Kuala Lumpur',	'03-41420522',	'03-41421252',	'',	'2006-01-15 00:00:00',	1,	12050,	2,	'2009-11-25 14:01:29',	'810605065216',	20),
(10,	'533',	'GIATMARA NEGERI SEMBILAN',	'PEJABAT GIATMARA NEGERI SEMBILAN\n\nLOT 10240, TINGKAT 1,\n\nJALAN DATO\' MUDA LINGGI,\n\n70100 SEREMBAN,\n\nNEGERI SEMBILAN.',	'06-7687280',	'06-7687281',	'gmnegerisembilan@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	31608,	2,	'2016-08-25 00:00:00',	'700922025261',	9),
(11,	'541',	'GIATMARA TERENGGANU',	'Lot PT 29766, Tingkat 1,\nTaman Bestari, Gong Badak\n21300 Kuala Nerus.\nTerengganu.',	'096531863',	'096531750',	'',	'2006-01-15 00:00:00',	1,	39869,	2,	'2016-03-07 00:00:00',	'810415055199',	17),
(12,	'542',	'GIATMARA SABAH',	'PEJABAT GIATMARA NEGERI SABAH\r\nLot 13, Tkt 2,Likas Plaza,Jln Tuaran\r\n88400 Kota Kinabalu \r\nSABAH',	'088-437072',	'088-437086',	'',	'2006-01-15 00:00:00',	1,	18982,	2,	'2009-11-11 09:35:50',	'610602125475',	18),
(13,	'538',	'GIATMARA PULAU PINANG',	'Lot 12A -2 Jalan Usahawan 4 Pusat Perniagaan Kepala Batas 13200 Kepala Batas Pulau Pinang',	'04-5741151',	'04-5741153',	'gmnpulaupinang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22284,	2,	'2014-07-20 00:00:00',	'700922025261',	14),
(14,	'534',	'GIATMARA SELANGOR',	'Lot 24A , Tingkat 1, Blok 4, Pusat Perniagaan Worldwide, Jalan Karate 13/47, Seksyen 13, 40675 Shah Alam, Selangor D. E.',	'03-55102775',	'03-55102906',	'',	'2006-01-15 00:00:00',	1,	1,	2,	'2014-01-03 00:00:00',	'780709135544',	10),
(15,	'531',	'GIATMARA JOHOR',	'Pejabat GIATMARA Negeri Johor, Tingkat 4, Bangunan MARA, Jalan Segget, 80000 Johor Bahru, Johor',	'07-224 4032',	'07-224 4031',	'gmjohor@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	16947,	2,	'2013-10-01 00:00:00',	'790317125389',	7),
(16,	'540',	'GIATMARA KELANTAN',	'WISMA AMANI,\r\n\nLOT PT 200 & 201,\r\n\nTMN MAJU, JLN SULTAN YAHYA PETRA,\r\n\n15200 KOTA BHARU,\r\n\nKELANTAN',	'09-7422990',	'09-7422992',	'gmkelantan@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	32522,	2,	'2015-10-26 00:00:00',	'810415055199',	16),
(17,	'407',	'KANGAR',	'no.20, tingkat 1, jalan jejawi sematang, kawasan perindustrian jejawi, 02600, Arau, Perlis',	'04-9764773',	'04-9761716',	'gmkangar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	25678,	1,	'2014-10-29 00:00:00',	'670416095027',	15),
(18,	'479',	'ARAU',	'Lot PT 1260, Mukim Jejawi, 02600 Arau,\nPerlis.',	'04-9764268',	'04-9760225',	'gmarau@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	25747,	1,	'2013-09-26 00:00:00',	'810415055199',	15),
(19,	'634',	'PADANG BESAR',	'Kompleks Logistik IPK Mata Ayer, \nMata Ayer, 02500 Chuping,\nPerlis.',	'04-9383622',	'04-9383862',	'gmpadangbesar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	25697,	1,	'2013-09-26 00:00:00',	'810415055199',	15),
(20,	'401',	'KUBANG PASU',	'BT. 13 1/2, Jalan Changloon, 06000 Jitra, Kedah',	'04-9171125',	'04-9174094',	'gmkubangpasu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	35549,	1,	'2013-09-27 00:00:00',	'810415055199',	12),
(21,	'413',	'BALING',	'Jalan Charok Nau, 09100 Baling',	'04-4701007',	'04-4701710',	'gmbaling@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	31156,	1,	'2014-01-30 00:00:00',	'810415055199',	12),
(22,	'454',	'ALOR SETAR',	'Bangunan Kedai MARA, Jalan Seberang Perak, 05400 Alor Setar',	'04-7721303',	'04-7728867',	'gmalorsetar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	34949,	1,	'2013-09-05 00:00:00',	'691027125002',	12),
(23,	'414',	'LANGKAWI',	'Jalan Kisap, Kuah Langkawi, 07000 Langkawi',	'04-9669198',	'04-9660092',	'gmlangkawi@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	28525,	1,	'2013-09-08 00:00:00',	'750321075867',	12),
(24,	'475',	'SIK',	'Jalan Hospital Daerah Sik, 08200 Sik',	'04-4695641',	'04-4695795',	'gmsik@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	30424,	1,	'2013-09-05 00:00:00',	'600816025075',	12),
(25,	'476',	'JERAI',	'Jalan Pegawai, 06900 Yan',	'04-4655446',	'04-4655676',	'gmjerai@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27394,	1,	'2013-09-05 00:00:00',	'691027125002',	12),
(26,	'485',	'PADANG SERAI',	'Lot 890, Mukim Naga Lilit, 09400 Padang Serai',	'04-4850528',	'04-4850530',	'gmpadangserai@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	31892,	1,	'2013-09-27 00:00:00',	'810415055199',	12),
(27,	'633',	'PENDANG',	'JALAN JENUN,MUKIM AIR PUTEH,06700 PENDANG,KEDAH.',	'04-7591815',	'04-7591812',	'gmpendang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27338,	1,	'2013-09-05 00:00:00',	'720727025475',	12),
(28,	'462',	'PADANG TERAP',	'Lot 3202, Batu 20, Jalan Kuala Nerang, 06300 Kuala Nerang, Kedah Darul Aman.',	'04-7902020',	'04-7902021',	'gmpadangterap@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27246,	1,	'2013-09-05 00:00:00',	'691027125002',	12),
(29,	'483',	'KULIM BANDAR BAHARU',	'Pekan Mahang, 09500 Karangan',	'04-4042386',	'04-4042386',	'gmkulim@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	32480,	1,	'2013-09-05 00:00:00',	'691027125002',	12),
(30,	'667',	'SUNGAI PETANI',	'LOT 101A, SMART AUTOCITY,\nJALAN BUKIT PUTERI 9/10,\nBANDAR PUTERI JAYA,\n08000',	'04-425 6652',	'04-422 6651',	'gmsungaipetani@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	29797,	1,	'2016-12-22 00:00:00',	'810415055199',	12),
(31,	'659',	'MERBOK',	'Pekan Bedong, 08100 Bedong',	'04-4584600',	'04-4584606',	'gmmerbok@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	29917,	1,	'2013-09-05 00:00:00',	'691027125002',	12),
(32,	'687',	'JERLUN',	'Lot 80, Pusat Pertumbuhan Desa, Sungai Korok, 06150 Ayer Hitam',	'04-7947507',	'04-7943658',	'gmjerlun@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	36323,	1,	'2013-09-05 00:00:00',	'691027125002',	12),
(33,	'654',	'KUALA KEDAH',	'Lot. 1311, Kampung Masjid Seberang,\nMukim Kubang Rotan,\n06250 Alor Setar, Kedah Darul Aman',	'04-7325490',	'04-7346415',	'gmkualakedah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	36835,	1,	'2013-09-05 00:00:00',	'691027125002',	12),
(34,	'653',	'POKOK SENA',	'Lot 2649,Kg Belukar,Mukim Jabi,06400 Pokok Sena,Kedah',	'04-7878064',	'04-7878108',	'gmpokoksena@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27288,	1,	'2013-09-05 00:00:00',	'691027125002',	12),
(35,	'412',	'PERDA / NIBONG TEBAL',	'Lot. 2621, Mukim 11, Jln Ooi Kar Seng, Nibong Tebal, 14300 Seberang Perai Selatan',	'04-5936282',	'04-5936284',	'gmnibongtebal@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	25392,	1,	'2013-09-26 00:00:00',	'810415055199',	14),
(36,	'409',	'BUKIT MERTAJAM',	'Lot 2228, Mukim 16, Seberang Perai Tengah, 14000 Bkt. Mertajam',	'04-4904321',	'04-4903518',	'gmbukitmertajam@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	25245,	1,	'2013-09-26 00:00:00',	'810415055199',	14),
(37,	'484',	'BAGAN',	'No 3908, Mukim 15, Jalan Pantai, 12100',	'04-3328528',	'04-3741711',	'gmbagan@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	20534,	1,	'2013-09-05 00:00:00',	'820112075714',	14),
(38,	'431',	'BAYAN LEPAS',	'Lot 102H, Lengkok Kg, Jawa 2, Kawasan Miel, 11900 Bayan Lepas',	'04-6449979',	'04-6443753',	'gmbayanlepas@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	19351,	1,	'2013-09-26 00:00:00',	'810415055199',	14),
(39,	'610',	'KEPALA BATAS',	'Persiaran Pendidikan Bertam Perdana,\n13200 Kepala Batas,\nPulau Pinang',	'04-5750170',	'04-5756220',	'gmkepalabatas@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22269,	1,	'2016-10-14 00:00:00',	'810415055199',	14),
(40,	'447',	'TASEK GELUGOR',	'Lot. 3130, Mukim 8, Pongsu Seribu, Kepala Batas, 13200 Seberang Perai Utara',	'04-5756163',	'04-5783162',	'gmtasekgelugor@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	24612,	1,	'2013-09-26 00:00:00',	'810415055199',	14),
(41,	'469',	'PERMATANG PAUH',	'Lot 433, Mukim 3, Permatang Ara, 13500 Permatang Pauh, Seberang Perai Tengah, Pulau Pinang',	'04-3995795',	'04-3995792',	'gmpermatangpauh@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	25199,	1,	'2013-09-26 00:00:00',	'810415055199',	14),
(42,	'686',	'SUNGAI BAKAP',	'Sungai Bakap (Polis), Sungai Bakap, 14200 Seberang Perai Selatan',	'04-5820157',	'04-5820158',	'gmsungaibakap@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	24806,	1,	'2013-09-26 00:00:00',	'810415055199',	14),
(43,	'647',	'BALIK PULAU',	'Lot 584,585 & 588  Jalan Besar, \nBalik Pulau, 11000 Balik Pulau',	'04-8661369',	'04-8664634',	'gmbalikpulau@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18031,	1,	'2013-09-06 00:00:00',	'821027075298',	14),
(44,	'655',	'TANJONG',	'Unit 1.03 & 1.04, 10050 Kompleks Jalan Kedah',	'04-2283070',	'04-2285504',	'gmtanjong@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	26894,	1,	'2013-09-26 00:00:00',	'810415055199',	14),
(45,	'433',	'PARIT BUNTAR',	'BANGUNAN KOMUNITI, JALAN PEJABAT, 34200 PARIT BUNTAR, PERAK',	'05-7160082',	'05-7160086',	'gmparitbuntar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22143,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(46,	'408',	'GRIK',	'Lebuhraya Timur Barat, Base Camp, 33300 Grik',	'05-7911494',	'05-7920020',	'gmgrik@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	20885,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(47,	'439',	'KAMPAR',	'Pusat GIAT Changkat Tin, 31800 Tanjung Tualang',	'05-3609490',	'05-3609480',	'gmkampar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	28385,	1,	'2013-08-23 00:00:00',	'810415055199',	11),
(48,	'452',	'PARIT',	'GIATMARA PARIT, \n  42 PERSIARAN DATARAN 3, \n  32610 BANDAR SERI ISKANDAR, \n  PERAK',	'05-3721801',	'05-3721802',	'gmparit@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	20847,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(49,	'446',	'TANJONG MALIM',	'Jalan Rumah Rehat, 35800 Slim River, Perak',	'05-4529896',	'05-4529897',	'gmtanjongmalim@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22793,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(50,	'458',	'PASIR SALAK',	'Pulau Tiga, 36800 Kampung Gajah, Perak',	'05-6318000',	'05-6318001',	'gmpasirsalak@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	24423,	1,	'2013-08-23 00:00:00',	'640425115619',	11),
(51,	'466',	'IPOH TIMUR',	'No 5, Jalan Zarib 8, Zarib Industrial Park, 31500 Perak',	'053226385',	'053215346',	'gmipohtimur@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	40565,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(52,	'477',	'LUMUT',	'Lebuhraya KI/Lumut, Bt 8 Lekir 32020 Sitiawan',	'05-6798152',	'05-6798152',	'gmlumut@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	28501,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(53,	'480',	'BAGAN DATUH',	'Lot 40, Jalan Besar, 36400 Hutan Melintang',	'05-6421800',	'05-6421801',	'gmbagandatoh@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	42908,	1,	'2013-11-28 00:00:00',	'810721105393',	11),
(54,	'464',	'BAGAN SERAI',	'Simpang 4, 34400 Semanggol,\nPerak',	'05-8921250',	'05-8921251',	'gmbaganserai@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	40276,	1,	'2013-08-23 00:00:00',	'600102085391',	11),
(55,	'606',	'BERUAS',	'No 40, Taman Desa Pantai 11, \n34900 Pantai Remis, \nPerak.',	'05-6779010',	'05-6779011',	'gmberuas@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	20254,	1,	'2013-08-23 00:00:00',	'580205086295',	11),
(56,	'435',	'TAIPING',	'Lot 20834 Jalan Logam 6,\nKawasan Perindustrian Kamunting Raya,\n34600 Kamunting,\nPerak Darul Ridzuan',	'05-8912045',	'05-8064075',	'gmtaiping@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	21579,	1,	'2016-09-27 00:00:00',	'810415055199',	11),
(57,	'670',	'LENGGONG',	'PL 23/1,\nKAMPUNG KUBANG JAMBU,\nJALAN BESAR,\nKAMPUNG MASJID LAMA,\n33400 LENGGONG\nPERAK.',	'05-7679712,057',	'05-7679712',	'gmlenggong@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	21481,	1,	'2013-08-23 00:00:00',	'630131085865',	11),
(58,	'613',	'KUALA KANGSAR',	'Dewan Orang Ramai, Rancangan Perumahan  Awam 2 & 3, 33800 Kuala Kangsar',	'05-7438610',	'05-7438611',	'gmkualakangsar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	43995,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(59,	'465',	'SUNGAI SIPUT',	'Simpang Kampung Sentosa,\n31100 Sungai Siput (U),\nPerak Darul Ridzuan.',	'05-5951611',	'05-5951610',	'gmsungaisiput@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27172,	1,	'2013-08-23 00:00:00',	'730327086155',	11),
(60,	'604',	'BATU GAJAH',	'No. 59, Jalan  Perpaduan, 31000 Batu Gajah',	'05-3633967',	'05-3633967',	'gmbatugajah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	36739,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(61,	'424',	'TELUK INTAN',	'Jalan Si Putum, 36000 Teluk Intan.',	'05-6254242',	'05-6254240',	'gmtelukintan@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22805,	1,	'2014-06-10 00:00:00',	'810721105393',	11),
(62,	'669',	'TAMBUN',	'Lot 157835, Batu 7 1/2, Jalan Tambun, 31150 Ulu Kinta',	'05-5499582',	'05-5495030',	'gmtambun@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27803,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(63,	'638',	'LARUT',	'Lot 3207, Jalan Sir Chulan, 34100 Selama',	'05-8392812',	'05-8396377',	'gmlarut@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22114,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(64,	'649',	'GOPENG',	'No. 19,Jalan Kampar, 31600 Gopeng',	'05-3592301',	'05-3592301',	'gmgopeng@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27861,	1,	'2013-08-23 00:00:00',	'580610085069',	11),
(65,	'607',	'BUKIT GANTANG',	'Dewan Bacaan Lama, Kampung Cheh Hulu, 34850 Changkat Jering',	'05-8554251',	'05-8551253',	'gmbukitgantang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22733,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(66,	'680',	'IPOH BARAT',	'No 155, Jalan Dato\' Onn Jaafar, 30300 Ipoh Perak',	'052497718',	'052497717',	'gmipohbarat@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27824,	1,	'2013-09-26 00:00:00',	'810415055199',	11),
(67,	'471',	'PADANG RENGAS',	'No 47, Jalan Perindustrian MIEL, \nKawasan Perindustrian MIEL, \n33010 Kuala Kangsar, Perak',	'05-7733611',	'05-7733612',	'gmpadangrengas@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	43995,	1,	'2013-08-23 00:00:00',	'650919115183',	11),
(68,	'404',	'MUADZAM SHAH',	'Kawasan perindustrian,26700 Muadzam Shah',	'09-4522366',	'09-4523607',	'gmmuadzamshah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	34689,	1,	'2015-08-03 00:00:00',	'570601055889',	13),
(69,	'405',	'JENGKA',	'26400 Bandar Jengka, Pahang Darul Makmur',	'09-4662375',	'09-4662354',	'gmjengka@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	34037,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(70,	'418',	'PAYA BESAR',	'Km. 8, Jalan Gambang, 25150 Kuantan ',	'09-5366558',	'09-5366557',	'gmpayabesar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	33401,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(71,	'451',	'KUALA LIPIS',	'Lot 3347, Kampung Kuala Lanar, 27200 Kuala Lipis',	'09-3122062',	'09-3121892',	'gmkualalipis@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	35363,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(72,	'457',	'TEMERLOH',	'Jalan Padang, 28400 Mentakab',	'09-2773700',	'09-2775181',	'gmtemerloh@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	36136,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(73,	'434',	'ROMPIN',	'Kilometer 5.5, Jalan Sabak, , 26800 Kuala Rompin,Pahang',	'09-4146190',	'09-4141908',	'gmrompin@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	44256,	1,	'2013-12-20 00:00:00',	'810415055199',	13),
(74,	'614',	'INDERA MAHKOTA',	'Lot 758,\nKg. Balok Pantai,\n26100 Kuantan,  \nPahang.',	'095807353',	'095807351',	'gminderamahkota@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	44163,	1,	'2016-08-19 00:00:00',	'810415055199',	13),
(75,	'487',	'RAUB',	'Lot No 31388 , \nJalan Taman Mewah \n27600 Raub',	'09-3557670',	'09-3557734',	'gmraub@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	35992,	1,	'2014-12-05 00:00:00',	'810415055199',	13),
(76,	'608',	'JERANTUT',	'Km 9, Kampung Sri Muda, 27000 Jerantut',	'09-2663541',	'09-2671687',	'gmjerantut@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	34761,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(77,	'689',	'PEKAN',	'Lot PT 1732, Mukim Langgar, Bandar Baru Peramu, 26600 Pekan',	'09-4260273',	'09-4260275',	'gmpekan@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	34078,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(78,	'671',	'BERA',	'Bandar 32 Bera, 28300 Triang',	'09-2463235',	'09-2496236',	'gmbera@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	36026,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(79,	'678',	'BENTONG',	'Lot 2738, Jalan Karak Mentakab, Batu 4, Karak Setia, Karak 28600 Bentong',	'09-2312790',	'09-2311907',	'gmbentong@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	36673,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(80,	'650',	'CAMERON HIGHLANDS',	'FELDA Sg Koyan 3, 27650 Raub',	'09-3402952',	'09-3402952',	'gmcameronhighlands@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	35996,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(81,	'402',	'KOTA BHARU',	'Jalan Talipot, 15150 Kota Bharu',	'09-7447058',	'09-7447058',	'gmkotabharu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	32552,	1,	'2013-09-26 00:00:00',	'810415055199',	16),
(82,	'432',	'MACHANG',	'GIATMARA MACHANG, BANGUNAN BALAI POLIS LAMA, 18500 MACHANG KELANTAN',	'09-9750016',	'09-9755017',	'gmmachang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	29433,	1,	'2013-09-26 00:00:00',	'810415055199',	16),
(83,	'416',	'TUMPAT',	'Kampung 7, 16200 Tumpat',	'09-7211994',	'09-7211577',	'gmtumpat@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	34408,	1,	'2015-12-21 00:00:00',	'810415055199',	16),
(84,	'467',	'PASIR MAS',	'LOT 2772 KAMPUNG SAKAR\n17030 PASIR MAS',	'09-7901710',	'09-7902795',	'gmpasirmas@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	36374,	1,	'2013-11-19 00:00:00',	'810415055199',	16),
(85,	'490',	'PASIR PUTEH',	'Lot 1466, Mukim Selising, 16810 Selising',	'09-7891319',	'09-7891213',	'gmpasirputeh@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	35128,	1,	'2014-06-17 00:00:00',	'810415055199',	16),
(86,	'601',	'BACHOK',	'LOT 665, SERDANG BARU\n16310 BACHOK, KELANTAN\n',	'09-7787310',	' 09-7787312',	'gmbachok@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	35025,	1,	'2014-05-07 00:00:00',	'710426115355',	16),
(87,	'675',	'JELI',	'GIATMARA JELI\nLOT 6099,KAMPUNG WAKAF ZING,\nAYER LANAS,\n17700 JELI,KELANTAN.',	'09-9468550',	'09-9468553',	'gmjeli@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	28171,	1,	'2014-11-25 00:00:00',	'810415055199',	16),
(88,	'639',	'NILAM PURI',	'Kampung Badak Mati Banggu, \n16150 Kota Bharu, \nKelantan',	'09-7964194',	'09-7964195',	'gmnilampuri@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	33673,	1,	'2013-09-26 00:00:00',	'810415055199',	16),
(89,	'443',	'GUA MUSANG',	'FELDA Chiku 5, 18300 Gua Musang',	'09-9140161',	' 09-9287637',	'gmguamusang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	29332,	1,	'2014-05-07 00:00:00',	'710426115355',	16),
(90,	'645',	'TANAH MERAH',	'Batu 4, Jalan Machang Jeli, 17500 Tanah Merah',	'09-9775209',	'09-9775209',	'gmtanahmerah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	37119,	1,	'2013-09-26 00:00:00',	'810415055199',	16),
(91,	'497',	'RANTAU PANJANG',	'FELCRA Bukit Tandak, 17200 Rantau Panjang',	'013-9603434 ',	'-',	'gmrantaupanjang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	36404,	1,	'2013-09-26 00:00:00',	'810415055199',	16),
(92,	'611',	'KUALA KRAI',	'Kg Jelawang, 18200 Dabong, Kuala Krai',	'09-9362689',	'09-9361689',	'gmkualakrai@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	29313,	1,	'2013-09-26 00:00:00',	'810415055199',	16),
(93,	'618',	'PENGKALAN CHEPA',	'Kg. Rambutan Rendang,  Mukim Panji, 16100 Pengkalan Chepa',	'09-7714141',	'09-7714140',	'gmpengkalanchepa@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	33126,	1,	'2013-09-26 00:00:00',	'810415055199',	16),
(94,	'403',	'DUNGUN',	'Batu 16, Kampung Nyior, 23100 Paka',	'09-8286122',	'09-8286123',	'gmdungun@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	39131,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(95,	'417',	'MARANG',	'Jalan Rawai, Bukit Payong, 21400 Marang, Terengganu.',	'09-6102030',	'09-6102031',	'gmmarang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38867,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(96,	'468',	'HULU TERENGGANU',	'GIATMARA HULU TERENGGANU,\nKampung Kuala Telemong, \n21210 Kuala Terengganu.\nTerengganu.',	'09-6142130',	'09-6142131',	'gmhuluterengganu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38862,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(97,	'411',	'SETIU',	'Kampung Pak Kancil, Bandar Permaisuri, 22100 Setiu',	'09-6097541',	'09-6097542',	'gmsetiu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	39063,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(98,	'449',	'KETENGAH',	'Bandar Al-Muktafi Billah Shah\n23400 Dungun\nTerengganu Darul Iman',	'09-8211380',	'09-8221361',	'gmketengah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	39141,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(99,	'461',	'BESUT',	'Jalan Batu Tumbuh, Alor Lintang, 22200 Besut',	'09-6950649',	'09-6950850',	'gmbesut@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	39072,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(100,	'448',	'KEMAMAN',	'Lot Pt. 2640,\nKampung Titian Berayun,\n24100 Kijal, Terengganu.',	'09-8623140',	'09-8623142',	'gmkemaman@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	39344,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(101,	'456',	'KUALA TERENGGANU',	'Lot 1088 Jalan Hj, Busu, Batu Buruk, 20400 K. Terengganu',	'09-6203651/53',	'09-6203652',	'gmkualaterengganu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38632,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(102,	'441',	'BATU RAKIT',	'Lot 9278, Kampung Wakaf Cagak, Batu Rakit, 21020 K. Terengganu',	'09-6693117',	'09-6692136',	'gmbaturakit@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38716,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(103,	'685',	'KUALA NERUS',	'Kampung Bukit Petiti, Belara, 21200 K. Terengganu',	'09-6301062',	'09-6301061',	'gmkualanerus@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38795,	1,	'2013-09-27 00:00:00',	'810415055199',	17),
(104,	'415',	'KUALA LANGAT',	'Jalan Sultan Abdul Samad, 42700 Banting',	'03-31879490',	'03-31877790',	'gmkualalangat@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	3558,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(106,	'438',	'SABAK BERNAM',	'No.1 & 3, Jalan PPSL 2,\nPusat Perniagaan Sungai Lias,\n45300, Sungai Besar,\nSelangor',	'03-32245107',	'03-32245108',	'gmsabakbernam@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	5090,	1,	'2013-08-23 00:00:00',	'790907085399',	10),
(107,	'460',	'KAPAR',	'Lot 1613, Jalan Rantau Panjang, Mukim Kapar, 42100 Klang',	'03-32914815',	'03-32914940',	'gmkapar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	3369,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(108,	'425',	'HULU SELANGOR',	'Lot 3, Bekas Sek.Keb. Kalumpang, 44100 Kalumpang',	'03-60491899',	'0360492494',	'gmhuluselangor@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	4678,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(109,	'474',	'SELAYANG',	'Jalan 5, Tmn. Selayang Baru, 68100 Batu Caves',	'03-61364524',	'03-61364525',	'gmselayang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38582,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(110,	'442',	'BANGI',	'Jalan P/9a Seksyen 13, 43650 Bandar Baru Bangi',	'03-89251978',	'03-89251977',	'gmbangi@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	3292,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(111,	'620',	'PUCHONG',	'Batu 13, Jalan Kelang,\n47100 Puchong\nSelangor',	'03-80613470',	'03-80608854',	'gmpuchong@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	8937,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(112,	'623',	'SEPANG',	'Pekan Salak, 43900 Sepang',	'03-87061357',	'03-87061357',	'gmsepang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	4566,	1,	'2013-08-23 00:00:00',	'600423025541',	10),
(113,	'426',	'TANJUNG KARANG',	'Kampung Sungai Terap, Batu 3, Jalan Bernam, 45000 Kuala Selangor',	'03-32895684',	'03-32895684',	'gmtanjungkarang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	4840,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(114,	'427',	'HULU LANGAT',	'NO 65, 66, 67 JALAN PRIMA SAUJANA 1/1A, \nTAMAN PRIMA SAUJANA SEKSYEN 1,\n43000 KAJANG, SELANGOR',	'03-87395602',	'03-87395601',	'gmhululangat@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	4475,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(115,	'628',	'SUNGAI BESAR',	'Jalan Balai Polis, 45400 Sekinchan, Selangor Darul Ehsan',	'03-32418470',	'03-32418471',	'gmsungaibesar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	5120,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(116,	'455',	'PETALING JAYA (SELATAN)',	'Lot 8247, Jalan 225, 46100 Petaling Jaya',	'03-79579721',	'03-79574623',	'gmpetalingjaya@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	7314,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(117,	'624',	'SHAH ALAM',	'2nd Floor C-12-2 Blok C,\nAlam Avenue, Jalan Serai Wangi,\nH16/H Off Persiaran Selangor,\n40200 Shah Alam,\nSelangor.',	'03-55196829',	'03-55123929',	'gmshahalam@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	120,	1,	'2014-05-27 00:00:00',	'810415055199',	10),
(118,	'679',	'GOMBAK',	'NO. 3-G & 3A-G, PUSAT KOMERSIAL AMANIAH,\nJALAN AMANIAH MULIA 1,\nTAMAN AMANIAH MULIA,\n68100 BATU CAVES,\nSELANGOR DARUL EHSAN.\n',	'03-61857972',	'03-61857260',	'gmgombak@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38499,	1,	'2013-08-23 00:00:00',	'811229085380',	10),
(119,	'681',	'PETALING JAYA UTARA',	'NO 7 JALAN SS7/26,\nTAMAN SRI KELANA,\n47300 KELANA JAYA\nSELANGOR.',	'0378042454',	'0378035090',	'gmpetalingjayautara@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	4388,	1,	'2014-02-07 00:00:00',	'810415055199',	10),
(120,	'482',	'KUALA LUMPUR',	'No 3A-3A Tingkat 4,\nWisma Q Titiwangsa,\nJalan Pahang,\n50300 Kuala Lumpur',	'03-40323241',	'-',	'gmkualalumpur@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	12019,	1,	'2016-09-23 00:00:00',	'810415055199',	20),
(121,	'629',	'TITIWANGSA',	'No.13D Jalan Medan Tuanku\n50300 Kuala Lumpur',	'03-26949136',	'03-26943227',	'gmtitiwangsa@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	11041,	1,	'2014-05-16 00:00:00',	'810415055199',	20),
(122,	'682',	'SEPUTEH',	'GIATMARA SEPUTEH,\nNO.8, JALAN 14/108C,\nTAMAN SUNGAI BESI,\n57100 KUALA LUMPUR',	'03-79806243',	'03-79806109',	'gmseputeh@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	9757,	1,	'2013-07-09 00:00:00',	'810415055199',	20),
(123,	'690',	'SEGAMBUT',	'No. 50, Jalan 6/38d, Taman Sri Sinar, 51200 Kuala Lumpur',	'03-62726375',	'03-62726452',	'gmsegambut@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	11079,	1,	'2013-07-09 00:00:00',	'810415055199',	20),
(124,	'652',	'KEPONG',	'GIATMARA Kepong, Tingkat Bawah, Blok F, PPR Intan Baiduri, 52100 Kepong Utara, Kuala Lumpur.\n',	'03-61370361',	'03-6137 0279',	'gmkepong@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	11426,	1,	'2013-07-09 00:00:00',	'810415055199',	20),
(125,	'600',	'AMPANG JAYA',	'Bangunan UMNO Ampang, \nLot No. 4545-3,4,5 dan 6,\nNo. 100 Jalan Lembah Jaya,\n68000 Ampang,  \nSelangor.',	'03-42874477',	'-',	'gmampangjaya@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38336,	1,	'2016-08-19 00:00:00',	'810415055199',	10),
(126,	'420',	'CHERAS',	'Blok 62, Perumahan Awam, Sri Sabah 3b, Batu 3 1/2, Jln Cheras 56100 Kuala Lumpur',	'03-92849318',	'03-9284697',	'gmcheras@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	39538,	1,	'2013-07-09 00:00:00',	'810415055199',	20),
(127,	'406',	'TELOK KEMANG',	'Jalan Linggi/ Rantau, 71150 Linggi, Negeri Sembilan',	'06-6970098',	'06-6970151',	'gmtelokkemang',	'2006-01-15 00:00:00',	1,	30808,	1,	'2013-07-09 00:00:00',	'810415055199',	9),
(128,	'419',	'JEMPOL',	'BANDAR SERI JEMPOL\n72100 JEMPOL\nNEGERI SEMBILAN',	'06-4581950',	'06-4581046',	'gmjempol@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	31608,	1,	'2013-07-09 00:00:00',	'810415055199',	9),
(129,	'463',	'KUALA PILAH',	'Batu 1, Jalan Seremban 7200 Kuala Pilah',	'06-4815939',	'06-4813950',	'gmkualapilah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	30891,	1,	'2013-07-09 00:00:00',	'810415055199',	9),
(130,	'492',	'SEREMBAN',	'KM9, JALAN JELEBU,\n71770 SEREMBAN,\nNEGERI SEMBILAN',	'06-7611971',	'06-7628075',	'gmseremban@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27698,	1,	'2013-07-09 00:00:00',	'810415055199',	9),
(131,	'491',	'TAMPIN',	'GIATMARA TAMPIN,\nFELDA PASIR BESAR,73420 GEMAS, NEGERI SEMBILAN',	'06-4576579',	'06-4576768',	'gmtampin@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27682,	1,	'2013-07-09 00:00:00',	'810415055199',	9),
(132,	'450',	'JELEBU',	'Kampung Desa Semarak, Jalan Titi, 71650 Titi Jelebu',	'06-6113801',	'06-6113784',	'gmjelebu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	30823,	1,	'2013-11-19 00:00:00',	'820619115148',	9),
(133,	'662',	'RASAH',	'Lot 200, Galla Industrial Park, \nJalan Labu, \n70200 Seremba\nNegeri Sembilan',	'06-7633654',	'06-7633654',	'gmrasah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	30123,	1,	'2013-11-19 00:00:00',	'820619115148',	9),
(134,	'410',	'MASJID TANAH',	'Batu 21 1/2, Pengkalan Balak, 78300 Masjid Tanah',	'06-3841732',	'06-3845744',	'gmmasjidtanah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	27605,	1,	'2013-07-03 00:00:00',	'810415055199',	8),
(135,	'486',	'JASIN',	'Jalan Parit Putat, 77400 Sg. Rambai',	'06-2659578',	'06-2659254',	'gmjasin@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	35919,	1,	'2013-07-03 00:00:00',	'810415055199',	8),
(136,	'641',	'ALOR GAJAH',	'Pekan Durian Tunggal, 76100 Melaka',	'06-5534939',	'16-5534937',	'gmalorgajah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	33287,	1,	'2013-07-03 00:00:00',	'810415055199',	8),
(137,	'612',	'KOTA MELAKA',	'Tingkat 3, Kompleks MARA, Jalan Hang Tuah, 75300 Kota Melaka',	'06-2826939',	'06-2816939',	'gmkotamelaka@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	32113,	1,	'2013-07-03 00:00:00',	'810415055199',	8),
(138,	'488',	'BUKIT KATIL',	'Lot 2344, Jalan Bayan 2, Taman Bukit Katil, 75450 Bukit Katil',	'06-2686632',	'06-2680586',	'gmbukitkatil@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	33215,	1,	'2013-07-03 00:00:00',	'810415055199',	8),
(139,	'428',	'SIMPANG AMPAT',	'Jalan Kampung Kemus, Simpang Ampat, 78000 Alor Gajah, Melaka.',	'06-5529614',	'06-5529588',	'gmsimpangampat@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	36530,	1,	'2013-07-03 00:00:00',	'810415055199',	8),
(140,	'499',	'TANGGA BATU',	'PGM Tangga Batu, No 5, Tingkat 1 & 2, Jln PSU 2, Plaza Sungai Udang, 76300',	'06-3531944',	'06-3531943',	'gmtanggabatu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	33914,	1,	'2013-07-03 00:00:00',	'810415055199',	8),
(141,	'472',	'KULAI',	'Felda Bukit Besar, 81450 Kulaijaya',	'07-8977989',	'07-8977989',	'gmkulai@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	15662,	1,	'2013-10-02 00:00:00',	'830417016255',	7),
(142,	'444',	'KLUANG',	'LOT 1, TINGKAT 3, BANGUNAN ARKED MARA KLUANG, JALAN DATO\' KAPTEN AHMAD 86000 KLUANG, JOHOR',	'07-7739506',	'07-7739507',	'gmkluang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	31641,	1,	'2013-10-30 00:00:00',	'750824115269',	7),
(143,	'481',	'BATU PAHAT',	'266, JALAN DAGANG,\n83000 BT PAHAT,\nJOHOR',	'07-4328155',	'07-4346279',	'gmbatupahat@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	15315,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(144,	'430',	'KOTA TINGGI',	'Felda Air Tawar 2, 81920 Kota Tinggi',	'07-8932602',	'07-8932602',	'gmkotatinggi@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	16105,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(145,	'421',	'TANJONG PIAI',	'Lot 2276, Mukim Jeram Batu, Pekan Nenas,81500 Pontian',	'07-6994507',	'07-6994509',	'gmtanjongpiai@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	15728,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(146,	'622',	'SEGAMAT',	'GIATMARA Segamat,\nKompleks Penghulu Mukim Gemas,\n81500 Batu Anam,\nSegamat,Johor.',	'07-9498079',	'07-9498078',	'gmsegamat@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	15728,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(147,	'617',	'PARIT SULONG',	'PTD 8507, JALAN SERINDIT, 83500 PARIT SULONG, BATU PAHAT, JOHOR',	'07-4186679',	'07-4186679',	'gmparitsulong@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	16947,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(148,	'445',	'MERSING',	'Kompleks Penghulu, Mukim Mersing, Kampung pangkalan Batu, 86800 Mersing',	'07-7995450',	'07-7991704',	'gmmersing@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	34857,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(149,	'453',	'LEDANG',	'Lot PTD 4570, Kaw. Perindustrian Tg. Agas, 84000 Muar',	'06-9535004',	'06-9535004 ',	'gmledang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	17500,	1,	'2013-09-27 00:00:00',	'590806016363',	7),
(150,	'429',	'PAGOH',	'Kompleks Penghulu Mukim, Jorak/ Pagoh,84600 Pagoh',	'06-9747264/266',	'06-9747264/266',	'gmpagoh@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	16373,	1,	'2013-09-26 00:00:00',	'780202106357',	7),
(151,	'626',	'SRI GADING',	'No. 25A, Jalan Kencana 1A/1,\nTaman Pura Kencana,\n83300 Sri Gading,\nBatu Pahat,\nJohor',	'07-4559742',	'07-4559742',	'gmsrigading@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	15315,	1,	'2014-06-17 00:00:00',	'810415055199',	7),
(152,	'621',	'GELANG PATAH',	'Kampung Tiram Duku, 81560 Gelang Patah',	'07-5072515',	'07-5071900',	'gmgelangpatah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	15782,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(153,	'656',	'LABIS',	'PTD 1907, Desa Temu Jodoh, 85400 Chaah, Johor',	'07-9263164',	'07-9263164',	'gmlabis@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	31066,	1,	'2013-10-10 00:00:00',	'691119015169',	7),
(154,	'627',	'PONTIAN',	'Lot 8886, Mukim Ayer Baloi Sanglang, 82100 Pontian',	'07-6901016',	'07-6901016',	'gmpontian@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	15310,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(155,	'646',	'TEBRAU',	'NO. 63-A, JALAN TEMBIKAI 7,\nTAMAN KOTA MASAI,\n81700 PASIR GUDANG,\nJOHOR.',	'07-2514585',	'07-2542585',	'gmtebrau@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	44541,	1,	'2013-11-15 00:00:00',	'810415055199',	7),
(156,	'688',	'TENGGARA',	'Lot 5024, Jalan Dato\' Sri Amar, 81440 Bandar Tenggara, Johor',	'07-8963121',	'07-8963121',	'gmtenggara@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	15662,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(157,	'609',	'JOHOR BAHRU',	'No 2, Jalan Mawar 46, Taman Mawar, 81700, Pasir Gudang, Johor ',	'07-2518287',	'07-2518287',	'gmjohorbahru@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	44541,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(158,	'615',	'MUAR',	'No 2, Jalan Impian, Taman Sarang Buaya\n83600, Semerah, Muar\nJohor',	'07-4163646',	'07-4162946',	'gmmuar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	17053,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(159,	'436',	'MIRI',	'LOT 3610 - 3613, \nLORONG 8A, BLOK 6 KBLD,\nPERMY TECHNOLOGY PARK,\nJALAN TUDAN, \n98100 MIRI, \nSARAWAK.',	'085-604227',	'085-434227',	'gmmiri@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	37910,	1,	'2016-03-21 00:00:00',	'810415055199',	19),
(160,	'605',	'BATANG SADONG',	'lot 202, Kampung Semera, 94600 Asajaya, Sarawak',	'082-826564',	'082-826194',	'gmbatangsadong@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18007,	1,	'2016-04-14 00:00:00',	'821216135165',	19),
(161,	'603',	'STAMPIN',	'GIATMARA STAMPIN\n1st Floor Lot 3230\nRock Commercial Centre\nJalan Rock 93200 Kuching\nSarawak.',	'082-232127',	'082-232117',	'gmstampin@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	24398,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(162,	'494',	'LAWAS',	'No.1, Quarters Kerajaan, Daerah Kecil Sundar, 98800 Sundar Lawas',	'085-264061',	'085-264636',	'gmlawas@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38202,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(163,	'493',	'MUKAH',	'Jln. Pam Stesen Lama, Kg. Penakub Hilir, P.0. Box 196, 96400 Mukah',	'084-872019',	'084-871564',	'gmmukah@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	19122,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(164,	'642',	'SERIAN',	'No.1, Jalan Tebakang Batu 2, Rumah Kakitangan JKR, Kampung Kakai, 94700 Serian',	'082-895409',	'082-895415',	'gmserian@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	17935,	1,	'2014-03-05 00:00:00',	'810415055199',	19),
(165,	'665',	'SARATOK',	'Bangunan JKR Lama, Peti Surat 104, 95400 Saratok, Sarawak',	'083-437085',	'083-437084',	'gmsaratok@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18504,	1,	'2013-11-08 00:00:00',	'731028135759',	19),
(166,	'674',	'BETONG',	'BANGUNAN MAJLIS DAERAH LAMA, \n95700 BETONG. ',	'083-472029',	'083-472785',	'gmbetong@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18523,	1,	'2013-09-19 00:00:00',	'840106125605',	19),
(167,	'495',	'BINTULU',	'Medan Niaga Jepak, Bangunan SEDC, Peti Surat 2364, 97000 Bintulu, Sarawak',	'086-201688',	'086-201689',	'gmbintulu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	37909,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(168,	'489',	'KOTA SAMARAHAN',	'Lot 5423, 5424, 5425 & 5426,\nMuara Tuang Land District,\n94300 Kota Samarahan, \nSarawak',	'082-750075',	'082-662387',	'gmsamarahan@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	26190,	1,	'2016-10-14 00:00:00',	'810415055199',	19),
(169,	'664',	'SANTUBONG',	'Kaw. Industri MARA (KIM), Lot 1191 & 1192, Blok 7, Demak Laut Industrial estate, Jalan Bako, 93050 Kuching',	'082-433048',	'082-433497',	'gmsantubong@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	23087,	1,	'2013-09-19 00:00:00',	'840106125605',	19),
(170,	'643',	'SIBU',	'Lot 343, Batu 6 /1/2, Jalan Ulu Oya, Peti Surat 384, 96000 Sibu',	'084-319454',	'084-316454',	'gmsibu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18585,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(171,	'666',	'SARIKEI',	'Sublot No. 1 & 2 (G Flr and 2nd Flr), Off Jalan Rentap, Tiang Soon Height, P.O.Box 80, 96100 Sarikei, Sarawak.',	'084654268',	'084654272',	'gmsarikei@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18621,	1,	'2014-06-10 00:00:00',	'810415055199',	19),
(172,	'496',	'TANJUNG MANIS',	'Bangunan Kedai MARA Kg. Belawai, 96150 Belawai',	'084-815484',	'084-815472',	'gmtanjungmanis@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18624,	1,	'2013-09-19 00:00:00',	'840106125605',	19),
(173,	'658',	'MAS GADING',	'Lot 646, Jalan Bahagia Jaya, 94500 Lundu',	'082-734568',	'082-734566',	'gmmasgading@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	17890,	1,	'2013-09-19 00:00:00',	'840106125605',	19),
(174,	'676',	'BARAM',	'No. 365A & 366B,\nJalan Wawasan Marudi,\n98050 Baram, \nSarawak.',	'085-756457',	'085-755230',	'gmbaram@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38043,	1,	'2016-08-29 00:00:00',	'810415055199',	19),
(175,	'619',	'PETRA JAYA',	'Lot 2874 & 2875, Lorong B1, Tingkat 1, Rpr Fasa 2, Jalan Astana, Petra Jaya, \n93050 Kuching, Sarawak.',	'082-312413',	'082-441926',	'gmpetrajaya@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	23090,	1,	'2013-09-19 00:00:00',	'840106125605',	19),
(176,	'657',	'LUBOK ANTU',	'GIATMARA LUBOK ANTU\nLOT 146, BLOK 9\nBUKIT BESAI LAND DISTRICT\n95900 LUBOK ANTU\nSARAWAK',	'083-584033',	'083-584055',	'gmlubokantu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18540,	1,	'2014-12-10 00:00:00',	'821216135165',	19),
(177,	'648',	'BATANG LUPAR',	'Kampung Baru, Jalan Sungai Rama, 94850 Sebuyau',	'083-468863',	'083-467958',	'gmbatanglupar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18008,	1,	'2013-09-19 00:00:00',	'840106125605',	19),
(178,	'498',	'SRI AMAN',	'SUBLOT NO 13\nBLOK 2\nSIMANGGANG TOWN DISTRICT\n95000 SRI AMAN',	'083-321179',	'083-325889',	'gmsriaman@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	18439,	1,	'2013-12-16 00:00:00',	'840106125605',	19),
(179,	'683',	'JULAU',	'Rumah Kedai, No. 18, Pekan Julau, 96600 Julau, Sarawak.',	'084-734789',	'084-734787',	'gmjulau@giatmara.edu.my',	'2006-01-15 00:00:00',	0,	19164,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(180,	'651',	'KAPIT',	'No. 11, Jalan Beleteh, 96807 Kapit',	'084-797501',	'084-798529',	'gmkapit@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	19177,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(181,	'478',	'KUDAT',	'Peti Surat 396,\n89058 Kudat, Sabah.',	'088-612489',	'088-612489',	'gmkudat@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22043,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(182,	'470',	'KOTA BELUD',	'W.D.T. 151\nJalan Pusat GIATMARA\n89159 Kota Belud',	'088-975006',	'088-977610',	'gmkotabelud@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22056,	1,	'2013-08-29 00:00:00',	'780917125973',	18),
(183,	'437',	'KOTA KINABALU',	'LOT 3 & 4, L.I.B KOLOMBONG,\nOFF JALAN LINTAS, JALAN LIMAU MANIS,\nPETI SURAT 16261,\n88869 KOTA KINABALU, SABAH.',	'088-381153',	'088-381154',	'gmkotakinabalu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	21926,	1,	'2013-11-14 00:00:00',	'810415055199',	18),
(184,	'602',	'KOTA MARUDU',	'Peti Surat 252, 89108 Kota Marudu',	'088-661120',	'088-661120',	'gmkotamarudu@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22049,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(185,	'473',	'KENINGAU',	'Peti Surat 692, 89008 Keningau, Sabah',	'087-331901',	'087-332094',	'gmkeningau@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22031,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(186,	'625',	'SILAM',	'Lot 10 & Lot 11 Bangunan Adika Commercial\nKm5,Jalan Tengah Nipah,\nPeti Surat 62289,\n91128  Lahad  Datu\nSabah',	'089-884675',	'089-884673',	'gmsilam@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22629,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(187,	'632',	'TAWAU',	'GIATMARA TAWAU\nTAMAN MEGAH JAYA\nBATU 4, JALAN APAS\nPETI SURAT 61260, 91022\nTAWAU SABAH.',	'089-750507',	'089-757013',	'gmtawau@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22600,	1,	'2013-08-29 00:00:00',	'681127125131',	18),
(188,	'663',	'SANDAKAN',	'No. 032, KM 2.2, Jalan Utara,\n90000 Sandakan\nSabah',	'089-222416',	'089-224160',	'gmsandakan@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22580,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(189,	'637',	'W. PERSEKUTUAN LABUAN',	'BKM 0843, Simpang Pinang\nKg. Sg. Bedaun, Peti Surat 81580\n87019 W. P. Labuan',	'087-468575',	'087-466575',	'gmlabuan@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	38285,	1,	'2016-09-30 00:00:00',	'810415055199',	18),
(190,	'631',	'LIMBAWANG',	'Peti Surat 484, 89800 Beaufort',	'087-211676',	'087-225008',	'gmlimbawang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22543,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(191,	'673',	'SEMPORNA',	'GIATMARA Semporna, Peti Surat 474, 91308 Semporna, Sabah.',	'089-784090',	'089-782654',	'gmsemporna@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22615,	1,	'2013-08-29 00:00:00',	'810415055199',	18),
(192,	'694',	'KINABATANGAN',	'GIATMARA Kinabatangan, W.D.T. 239\n90200 Kota Kinabatangan, Sabah',	'089-561986',	'089-562730',	'gmkinabatangan@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22589,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(193,	'693',	'RANAU',	'Kilometer 02, Jalan Sandakan, Beg Berkunci No. 5, 89309 Ranau Sabah ',	'088-875072',	'088-877423',	'gmranau@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22511,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(194,	'672',	'TUARAN',	'GIATMARA TUARAN,\nJALAN SERUSUP, KG. TAJAU, \nPETI SURAT 487, \n89208 TUARAN, SABAH.',	'088-794870',	'088-794871',	'gmtuaran@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22491,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(195,	'660',	'TENOM',	'Pusat Kebudayaan Murut, Wdt. 36, 89909 Tenom',	'087-303790',	'087-302425',	'gmtenom@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22563,	1,	'2013-08-29 00:00:00',	'790402125383',	18),
(196,	'677',	'GAYA',	'Peti Surat No. A 424, 89357 Inanam',	'088-438601',	'088-438601',	'gmgaya@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	21442,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(197,	'459',	'LIBARAN',	'GIATMARA Libaran\nLot 1, Ka Shing Industrial Centre\n(Detached Unit ), Batu 7 Jalan Labuk\n90000 Sandakan\nSabah',	'089-671607/671',	'089-671607',	'gmlibaran@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22593,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(198,	'640',	'PENAMPANG',	'PETI SURAT 38, 88858 TANJUNG ARU, KOTA KINABALU, SABAH.',	'088-716994',	'088-716995',	'gmpenampang@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22512,	1,	'2014-07-10 00:00:00',	'810415055199',	18),
(199,	'661',	'BEAUFORT',	'W.D.T, No 23, 89740 Kuala Penyu',	'087-208472',	'087-914532',	'gmbeaufort@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22543,	1,	'2016-12-15 00:00:00',	'810415055199',	18),
(200,	'668',	'BELURAN',	'Peti Surat 429, 90107 Beluran, Sabah.',	'089-513141',	'089-513151',	'gmbeluran@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22599,	1,	'2013-08-29 00:00:00',	'790811125819',	18),
(201,	'635',	'PAPAR',	'Peti Surat 495, 89607 Papar',	'088-914707',	'088-914532',	'gmpapar@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	22529,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(202,	'630',	'KIMANIS',	'peti surat 210\n89727 Membakut,\nSabah',	'087-889327',	'087-886340',	'gmkimanis@giatmara.edu.my',	'2006-01-15 00:00:00',	1,	17820,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(221,	'644',	'BUKIT BENDERA',	'No. 2-G & 2-1 Jalan Lembah Permai,\n11200 Tanjung Bungah,\nPulau Pinang',	'04-8991700',	'04-8992700',	'gmbukitbendera@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	44717,	1,	'2013-09-05 00:00:00',	'760608075767',	14),
(222,	'696',	'JELUTONG',	'NO.84-G LINTANG SUNGAI PINANG,\r\n\nSKYLINE CITY,\r\n\n10150 GEORGETOWN,\r\n\nPULAU PINANG',	'042822700',	'042821244',	'gmjelutong@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	45025,	1,	'2015-09-11 00:00:00',	'810415055199',	14),
(223,	'572',	'BUKIT GELUGOR',	'No 363R Jalan Sultan Azlan Shah\n11700 Gelugor\nPulau Pinang',	'04-6585815',	'04-6579700',	'gmbukitgelugor@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	44920,	1,	'2016-06-29 00:00:00',	'810415055199',	14),
(224,	'586',	'KUALA KRAU',	'Kampung Desa Murni Kerdau, \n28010 Temerloh,\nPahang Darul Makmur.',	'09-2846442',	'09-2846442',	'gmkualakrau@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	45272,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(225,	'570',	'KETEREH',	'Lot 236, Kuarters KADA Ketereh, 16450, Ketereh,\nKota Bharu,\nKelantan.',	'09-7880211',	'09-7880212',	'gmketereh@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	45397,	1,	'2013-09-26 00:00:00',	'810415055199',	16),
(227,	'584',	'SELANGAU',	'Sublot 597-599, \r\n\nPasar Baru Selangau, \r\n\nPeti Surat 584, \r\n\n96000 Sibu',	'084-891148',	'084-891168',	'gmselangau@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	18546,	1,	'2015-07-13 00:00:00',	'810415055199',	19),
(228,	'579',	'MAMBONG',	'SUBLOT 2 & 3 EASTERN COMMERCIAL CENTRE, BATU 17\nJALAN KUCHING-SERIAN 94200 KUCHING, SARAWAK',	'082-862077',	'082-863055',	'gmmambong@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	26768,	1,	'2013-09-19 00:00:00',	'840106125605',	19),
(230,	'577',	'SEPANGGAR',	'Lot 12 & 13, Taman Fulliwa, Fasa 1, Mile 11, Jalan Tuaran, Pos Mini Indah Permai, Peti Surat 272, 88450 Kota Kinabalu',	'088-473551',	'088-473550',	'gmsepanggar@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	21913,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(231,	'576',	'BATU SAPI',	'Lot 1 & 2, Blok Y, KM 1.5\nJalan Leila, Bandar Ramai - Ramai\n90000 Sandakan, Sabah',	'089 - 227 508',	'089 - 227 520',	'gmbatusapi@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	22571,	1,	'2014-03-11 00:00:00',	'780927125459',	18),
(232,	'574',	'KELANA JAYA',	'No.12, Jalan Pekaka 8/4, Seksyen 8, Kota Damansara, 47810 Petaling Jaya, Selangor',	'03-61416016',	'03-78054258',	'gmkelanajaya@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	9257,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(233,	'697',	'LEMBAH PANTAI',	'No. 15-1, Tingkat 1, Jalan Pantai Murni, Pantai Dalam, 52900 K.Lumpur',	'0322420034',	'0322420034',	'gmlembahpantai@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	37981,	1,	'2014-04-08 00:00:00',	'810415055199',	20),
(234,	'571',	'REMBAU',	'No.2 Tingkat 1, Taman Gadong, 71350 Kota, Negeri Sembilan.',	'06-4382024',	'06-4382033',	'gmrembau@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	45491,	1,	'2013-07-09 00:00:00',	'810415055199',	9),
(235,	'636',	'PENGERANG',	'Dewan Majlis Belia Felda, Wilayah Johor Selatan, Felda Sening,       81900 Kota Tinggi',	'07-8276227',	'07-8276227',	'gmpengerang@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	15906,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(236,	'699',	'SEKIJANG',	'No. 45, Jalan Putra 1/2, Bandar Putra, 85000 Segamat',	'07-9435232',	'07-9436232',	'gmsekijang@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	29725,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(237,	'698',	'AYER HITAM',	'No. 32 Jalan 1/3 Bandar Baru Ayer Hitam 1, 86100 Ayer Hitam',	'07-7582610',	'07-7582598',	'gmayerhitam@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	32908,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(238,	'695',	'SIMPANG RENGGAM',	'No. 8, Jalan Cemara, 86200 Simpang Renggam',	'07-7558343',	'07-7558242',	'gmsimpangrenggam@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	33017,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(239,	'581',	'SETIAWANGSA',	'NO. 18, JALAN WANGSA DELIMA 11, D\'WANGSA, WANGSA MAJU, 53300 KUALA LUMPUR, WILAYAH PERSEKUTUAN KUALA LUMPUR',	'03-41442134',	'03-41442068',	'gmsetiawangsa@giatmara.edu.my',	'2006-02-03 00:00:00',	1,	12464,	1,	'2013-11-07 00:00:00',	'810831025116',	20),
(241,	'580',	'BANDAR TUN RAZAK',	'Jalan Budiman,\nKomersial Komuniti Bandar Tun Razak\n56000 Kuala Lumpur',	'03-91718273',	'03-00',	'gmbandartunrazak@giatmara.edu.my',	'2008-12-15 13:30:00',	1,	9757,	1,	'2013-07-09 00:00:00',	'810415055199',	20),
(242,	'582',	'PUTRAJAYA',	'No 34, 34A, 34B, Jalan Diplomatik, Precint 15, 62606 Putrajaya',	'03-88903545',	'03-88903455',	'gmputrajaya@giatmara.edu.my',	'2008-12-15 13:34:25',	1,	38264,	1,	'2013-07-09 00:00:00',	'810415055199',	20),
(261,	'691',	'SERDANG',	'No. 36, Jalan PSK 4,\nPusat Perdagangan Seri Kembangan,\n43300 Seri Kembangan,\nSelangor',	'03-89419384',	'03-89419858',	'gmserdang@giatmara.edu.my',	'2008-12-26 16:08:36',	1,	3885,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(262,	'575',	'KOTA RAJA',	'NO. 41, JALAN KOTA RAJA L27/L\nHICOM TOWN CENTRE\nSEKSYEN 27,\n40400 SHAH ALAM\nSELANGOR',	'03-51034223',	'03-51034225',	'gmkotaraja@giatmara.edu.my',	'2008-12-26 16:28:04',	1,	2643,	1,	'2013-08-22 00:00:00',	'810831025116',	10),
(263,	'573',	'PANDAN',	'Lot 3G, Jalan Perubatan 4\nPandan Indah\n55100 Kuala Lumpur',	'03-42950061',	'03-42950048 ',	'gmpandan@giatmara.edu.my',	'2008-12-26 16:28:04',	1,	11750,	1,	'2013-09-27 00:00:00',	'810415055199',	10),
(270,	'597',	'PULAI',	'NO.23 & 23-01\nJALAN BAIDURI 1/1\nTAMAN BAIDURI\n81200',	'07-2411426',	'-',	'gmpulai@giatmara.edu.my',	'2009-11-19 11:39:07',	1,	44512,	1,	'2016-07-12 00:00:00',	'810415055199',	7),
(271,	'684',	'PASIR GUDANG',	'JALAN PERMAS SELATAN,\nBANDAR BARU PERMAS JAYA,\n81750 MASAI, JOHOR',	'07-3889848',	'07-3889849',	'gmpasirgudang@giatmara.edu.my',	'2011-01-07 21:34:20',	1,	44512,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(272,	'591',	'BATU',	'GIATMARA BATU\nBANGUNAN YAYASAN PENDIDIKAN BATU\nJALAN 46/10, TAMAN BATU MUDA,\n68100 BATU CAVES\nKUALA LUMPUR',	'03-61851807',	'03-61852596',	'gmbatu@giatmara.edu.my',	'2013-05-29 15:03:00',	1,	9757,	1,	'2013-07-09 00:00:00',	'810415055199',	20),
(273,	'592',	'WANGSA MAJU',	'GIATMARA WANGSA MAJU\nNO.20, 20-1, 20-2, PLAZA USAHAWAN GENTING KLANG,\nJALAN DANAU NIAGA 1, TAMAN DANAU KOTA,\n53300 KUALA LUMPUR',	'03- 4131 9339',	'',	'gmwangsamaju@giatmara.edu.my',	'2013-05-29 15:08:00',	1,	9757,	1,	'2013-07-09 00:00:00',	'810415055199',	20),
(274,	'587',	'BATU KAWAN',	'GIATMARA BATU KAWAN\nNO. 2 & 4,\nJALAN BESAR SIMPANG AMPAT,\nTAMAN MERAK,14100,\nSIMPANG AMPAT,\nPULAU PINANG.',	'04-5882451',	'04-5883751',	'gmbatukawan@giatmara.edu.my',	'2013-06-12 10:22:54',	1,	18898,	1,	'2013-09-26 00:00:00',	'810415055199',	14),
(275,	'423',	'MARAN',	'GIATMARA Maran\nBandar Baru Chenor\n28100 Chenor\nPahang darul Makmur',	'092995012',	'092995013',	'gmmaran@giatmara.edu.my',	'2013-06-12 10:35:04',	1,	35993,	1,	'2013-12-20 00:00:00',	'810415055199',	13),
(276,	'594',	'KUANTAN',	'LOT A-5, KILANG IKS, \nKAWASAN PERUSAHAAN PPD, \nKG SOI,JALAN PANTAI SEPAT, \n25150 KUANTAN, \nPAHANG\n ',	'09-5342102',	'09-5341450',	'gmkuantan@giatmara.edu.my',	'2013-06-12 15:55:31',	1,	33399,	1,	'2013-09-26 00:00:00',	'810415055199',	13),
(277,	'422',	'BAKRI',	'BANGUNAN DATO\' SAIPOLBAHARI\nPOS 160,PARIT TENGAH C,\nBATU 18, AIR HITAM,\n84060 MUAR,\nJOHOR',	'07-4213600',	'07-4213700',	'gmbakri@giatmara.edu.my',	'2013-06-12 22:19:54',	1,	17079,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(278,	'593',	'SEMBRONG',	'JALAN TIONG FELDA KAHANG TIMUR \n86000 KLUANG \nJOHOR',	'07-7866555',	'07-7866554',	'gmsembrong@giatmara.edu.my',	'2013-06-12 22:22:50',	1,	31091,	1,	'2013-09-25 00:00:00',	'810415055199',	7),
(279,	'598',	'KUBANG KERIAN',	'LOT 2399 KG PADANG BONGOR, \nKUBANG KERIAN, \n16150 KOTA BHARU, \nKELANTAN',	'09-7666871',	'09-7666872',	'gmkubangkerian@giatmara.edu.my',	'2013-06-13 09:34:04',	1,	32493,	1,	'2016-03-29 00:00:00',	'710426115355',	16),
(281,	'588',	'TAPAH',	'Lot 360 Bandar Temoh, \nDaerah Batang Padang, \n35350 Temoh\nPerak',	'05-4190049',	'05-4190049',	'gmtapah@giatmara.edu.my',	'2013-06-13 11:59:33',	1,	22758,	1,	'2013-08-23 00:00:00',	'680923085471',	11),
(282,	'547',	'PENSIANGAN',	'GIATMARA PENSIANGAN, \nD/A GIATMARA KENINGAU, \nPETI SURAT 692, \n89008 KENINGAU, \nSABAH',	'087-366718',	'087-366716',	'gmpensiangan@giatmara.edu.my',	'2013-06-13 14:11:53',	1,	22023,	1,	'2013-08-29 00:00:00',	'810415055199',	18),
(283,	'548',	'PUTATAN',	'GIATMARA PUTATAN, \nBALAIRAYA KG. LINSUK, \nTAMAN BERSATU, \nP.O.BOX 726, \n88858 TANJUNG ARU,\nKOTA KINABALU \nSABAH',	'088-761805',	'088-760029',	'gmputatan@giatmara.edu.my',	'2013-06-13 14:14:24',	1,	17820,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(284,	'549',	'SIPITANG',	'Bangunan Arked MARA, \nDB1/3, (SE03-04), \n89859 Sipitang, \nSabah ',	'087-821 445',	'',	'gmsipitang@giatmara.edu.my',	'2013-06-13 14:16:37',	1,	22555,	1,	'2013-08-31 00:00:00',	'810415055199',	18),
(285,	'595',	'BANDAR KUCHING',	'GIATMARA BANDAR KUCHING, \nBANGUNAN WISMA HARAPAN,\nJALAN BUDAYA, \n93000 KUCHING, \nSARAWAK',	'082-370060',	'',	'gmbandarkuching@giatmara.edu.my',	'2013-06-13 14:42:45',	1,	17860,	1,	'2013-09-19 00:00:00',	'840106125605',	19),
(286,	'616',	'HULU REJANG',	'KUARTERS KERAJAAN KELAS G, \nJALAN DIAN DING, \n96900 BELAGA, \nSARAWAK',	'086461023',	'086461022',	'gmhulurejang@giatmara.edu.my',	'2013-06-13 14:49:00',	1,	19187,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(287,	'596',	'IGAN',	'LOT 127 DARO NEW TOWNSHIP \n96200 DARO \nSARAWAK',	'084823146',	'084823146',	'gmigan@giatmara.edu.my',	'2013-06-13 14:51:14',	1,	18633,	1,	'2014-01-06 00:00:00',	'810415055199',	19),
(288,	'578',	'KANOWIT',	'GIATMARA Kanowit Log 599, \nTaman Muhibah Indah \n96700 Kanowit \nSarawak',	'084-752100',	'084-752107',	'gmkanowit@giatmara.edu.my',	'2013-06-13 14:54:42',	1,	19168,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(289,	'692',	'LANANG',	'GIATMARA LANANG, \nKEDAI SIBU JAYA, LOT 1196, \nSUBLOT 35, 37, 38, 41 & 42, \nSIBU JAYA, COMMERCIAL CENTER, \n96000 SIBU, \nSARAWAK',	'084-228451',	'',	'gmlanang@giatmara.edu.my',	'2013-06-13 15:02:12',	1,	18546,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(290,	'545',	'LIMBANG',	'GIATMARA Limbang \nPejabat Residen Lama Jalan Buangsiol, \n98700 Limbang, \nSarawak',	'085211300',	'085211308',	'gmlimbang@giatmara.edu.my',	'2013-06-13 15:03:45',	1,	38073,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(291,	'546',	'SIBUTI',	'GIATMARA SIBUTI NO.205, \nJALAN BEKENU ASLI, \nBEKENU BAZAAR, BEKENU TOWN DISTRICT, 98150 BEKENU, SIBUTI, \nSARAWAK',	'085-719032',	'085-719029',	'gmsibuti@giatmara.edu.my',	'2013-06-13 15:10:05',	1,	37910,	1,	'2013-09-27 00:00:00',	'810415055199',	19),
(295,	'589',	'KLANG',	'No. 50 & 52, Jalan Damar/KS9, Glenmarie Cove, 42000 Port Klang, Selangor Darul Ehsan.',	'03-31651740',	'03-31650376',	'gmklang@giatmara.edu.my',	'2013-07-29 14:49:38',	1,	1893,	1,	NULL,	NULL,	10),
(297,	'440',	'SUBANG',	'Lot 3107, Jalan Tempayan Emas 1, Kg. Paya Jaras Dalam, 47000 Sungai Buluh',	'03-61518499',	'03-61518499',	'gmsubang@giatmara.edu.my',	'2013-07-29 14:51:55',	1,	8907,	1,	'2014-01-08 00:00:00',	'740622025979',	10),
(298,	'590',	'KUALA SELANGOR',	'No. 9 & 9A, Taman Muara Esbee\n45800 Jeram\nSelangor Darul Ehsan.',	'0332640520',	'0332640328',	'gmkualaselangor@giatmara.edu.my',	'2013-09-11 09:25:36',	1,	4792,	1,	'2014-01-08 00:00:00',	'700121106192',	10);

DROP TABLE IF EXISTS `ref_hubungan`;
CREATE TABLE `ref_hubungan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hubungan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_hubungan` (`id`, `hubungan`) VALUES
(1,	'Isteri'),
(2,	'Suami'),
(3,	'Penjaga'),
(4,	'Saudara');

DROP TABLE IF EXISTS `ref_intake`;
CREATE TABLE `ref_intake` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kod_intake` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_intake` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_mula` date NOT NULL,
  `tarikh_tamat` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_intake` (`id`, `kod_intake`, `nama_intake`, `tarikh_mula`, `tarikh_tamat`) VALUES
(1,	'Jan17',	'Januari 2017',	'2018-01-01',	'2018-05-31');

DROP TABLE IF EXISTS `ref_jabatan`;
CREATE TABLE `ref_jabatan` (
  `id` int(10) NOT NULL,
  `nama_jabatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_jabatan` (`id`, `nama_jabatan`) VALUES
(1,	'Bahagian Audit Dalam [AUD]'),
(2,	'Bahagian Kewangan [KEW]'),
(3,	'Bahagian Pembangunan Kurikulum [PKL]'),
(4,	'Bahagian Pengurusan Projek &amp; Senggaraan'),
(5,	'Bahagian Pembangunan Sistem Maklumat [PSM]'),
(6,	'Bahagian Pembangunan Sumber Manusia'),
(7,	'Bahagian Pembangunan Usahawan [BPU]'),
(8,	'Bahagian Pembangunan Pelatih &amp; Kerjaya'),
(9,	'Bahagian Dasar &amp; Perancangan Strategik'),
(10,	'Bahagian Perhubungan Korporat'),
(12,	'Pejabat GIATMARA Negeri'),
(13,	'Pejabat Ketua Pegawai Eksekutif'),
(14,	'Pusat GIATMARA'),
(15,	'Pusat Komuniti/Prima GIATMARA'),
(16,	'Sektor Pengurusan Sumber Manusia &amp; Hal Ehwal Pelat'),
(17,	'Sektor Pembangunan Latihan &amp; Keusahawanan [SPK]'),
(25,	'Bahagian Pembangunan Perniagaan [PPN]'),
(53,	'Sektor Kewangan &amp; Perolehan [SKP]'),
(54,	'Bahagian Aset &amp; Perolehan');

DROP TABLE IF EXISTS `ref_jawatan`;
CREATE TABLE `ref_jawatan` (
  `id` int(2) NOT NULL DEFAULT '0',
  `nama_jawatan` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ref_jawatan` (`id`, `nama_jawatan`) VALUES
(1,	'Administrator'),
(2,	'Application Administrator GIS'),
(3,	'Application Programmer'),
(4,	'Database Administrator'),
(5,	'Pengarah'),
(6,	'Ketua Pegawai Eksekutif'),
(7,	'Pegawai Alatan Dan Senggaraan'),
(8,	'Pegawai Khas'),
(9,	'Pegawai Kurikulum'),
(10,	'Pegawai Pembangunan Usahawan'),
(11,	'Pegawai Perhubungan Industri'),
(12,	'Pegawai Tadbir'),
(13,	'Pekerja Am'),
(14,	'Pemandu'),
(15,	'Pembantu Makmal'),
(16,	'Pembantu Eksekutif Urustadbir'),
(17,	'Pembantu Eksekutif Urustadbir Kanan'),
(18,	'Pembantu Teknik'),
(19,	'Pengurus'),
(20,	'Pengurus (GM)'),
(21,	'Pengurus Kanan'),
(22,	'Pengarah GIATMARA Negeri'),
(23,	'Penolong Eksekutif'),
(24,	'Pembantu Eksekutif Logistik'),
(25,	'Pembantu Eksekutif Logistik Kanan'),
(26,	'Eksekutif'),
(27,	'Super Administrator'),
(28,	'System Administrator'),
(30,	'Tenaga Pengajar'),
(31,	'Tenaga Pengajar Kanan'),
(32,	'Timbalan Ketua Pegawai Eksekutif'),
(35,	'Timbalan Pengarah GIATMARA Negeri'),
(36,	'Pengurus Kanan (GM)'),
(37,	'Ketua Unit'),
(38,	'Ketua Unit Kanan'),
(39,	'Praktikal Student'),
(40,	'Pegawai Pembangunan Usahawan');

DROP TABLE IF EXISTS `ref_jenis_jawatan`;
CREATE TABLE `ref_jenis_jawatan` (
  `id` int(11) NOT NULL,
  `nama_jenis_jawatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ref_jenis_jawatan` (`id`, `nama_jenis_jawatan`) VALUES
(1,	'Tetap'),
(2,	'Kontrak'),
(3,	'PSS/Sementara');

DROP TABLE IF EXISTS `ref_kategori_pemohon`;
CREATE TABLE `ref_kategori_pemohon` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori_pemohon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_kategori_pemohon` (`id`, `kategori_pemohon`) VALUES
(1,	'Anggota Polis'),
(2,	'Bekas Polis'),
(3,	'Lepasan Sekolah'),
(4,	'Kakitangan Kerajaan');

DROP TABLE IF EXISTS `ref_kategori_penjaga`;
CREATE TABLE `ref_kategori_penjaga` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori_penjaga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_kategori_penjaga` (`id`, `kategori_penjaga`) VALUES
(1,	'Anggota Polis'),
(2,	'Bekas Polis'),
(3,	'Kakitangan Kerajaan'),
(4,	'Lepasan Sekolah');

DROP TABLE IF EXISTS `ref_kelulusan`;
CREATE TABLE `ref_kelulusan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kelulusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_kelulusan` (`id`, `kelulusan`) VALUES
(1,	'Sekolah Rendah'),
(2,	'SRP/PMR atau setaraf'),
(3,	'SPM atau setaraf'),
(4,	'SPMV atau setaraf');

DROP TABLE IF EXISTS `ref_keputusan_temuduga`;
CREATE TABLE `ref_keputusan_temuduga` (
  `id` int(10) NOT NULL,
  `keputusan_temuduga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_keputusan_temuduga` (`id`, `keputusan_temuduga`) VALUES
(1,	'Proses Semakan'),
(2,	'Berjaya'),
(3,	'Berjaya dan Tukar Kursus'),
(4,	'Tidak Berjaya'),
(5,	'Tidak Hadir'),
(0,	'Belum proses');

DROP TABLE IF EXISTS `ref_keterampilan`;
CREATE TABLE `ref_keterampilan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gred_keterampilan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gredpoin_keterampilan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_keterampilan` float(5,2) NOT NULL,
  `tahap_keterampilan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `markah_min` float(5,2) NOT NULL,
  `markah_max` float(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_keterampilan` (`id`, `gred_keterampilan`, `gredpoin_keterampilan`, `poin_keterampilan`, `tahap_keterampilan`, `markah_min`, `markah_max`) VALUES
(1,	'A',	'',	4.00,	'Terampil Cemerlang',	90.00,	100.00),
(2,	'A-',	'',	3.67,	'Terampil Cemerlang',	80.00,	89.99),
(3,	'B+',	'',	3.33,	'Terampil Baik',	75.00,	79.99),
(4,	'B',	'',	3.00,	'Terampil Baik',	70.00,	74.99),
(5,	'C+',	'',	2.67,	'Terampil',	65.00,	69.99),
(6,	'C',	'',	2.00,	'Terampil',	60.00,	64.99),
(7,	'F1',	'',	0.00,	'Belum Terampil',	55.00,	59.99),
(8,	'F2',	'',	0.00,	'Belum Terampil',	50.00,	54.99),
(9,	'F3',	'',	0.00,	'Belum Terampil',	0.00,	49.99);

DROP TABLE IF EXISTS `ref_kewarganegaraan`;
CREATE TABLE `ref_kewarganegaraan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kewarganegaraan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_kewarganegaraan` (`id`, `kewarganegaraan`) VALUES
(1,	'Warganegara Bumiputera'),
(2,	'Warganegara Bukan Bumiputera'),
(3,	'Bukan Warganegara');

DROP TABLE IF EXISTS `ref_kluster`;
CREATE TABLE `ref_kluster` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kod_kluster` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kluster` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_kluster` (`id`, `kod_kluster`, `nama_kluster`) VALUES
(1,	'1',	'Computer & Network Technology'),
(2,	'2',	'Elektrikal'),
(3,	'3',	'Mekanikal'),
(4,	'4',	'Elektronik / Mekatronik');

DROP TABLE IF EXISTS `ref_kursus`;
CREATE TABLE `ref_kursus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kod_kursus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kursus` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kluster` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kluster` (`id_kluster`),
  CONSTRAINT `ref_kursus_ibfk_1` FOREIGN KEY (`id_kluster`) REFERENCES `ref_kluster` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_kursus` (`id`, `kod_kursus`, `nama_kursus`, `id_kluster`) VALUES
(1,	'1',	'Teknologi Sistem Komputer',	1),
(2,	'2',	'Computer System and Networking',	1),
(3,	'3',	'Pendawai Elektrik',	2),
(4,	'4',	'Penjaga Jentera Elektrik',	2);

DROP TABLE IF EXISTS `ref_markah`;
CREATE TABLE `ref_markah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pb_teori` float(5,2) NOT NULL,
  `pb_amali` float(5,2) NOT NULL,
  `pam_teori` float(5,2) NOT NULL,
  `pam_amali` float(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_markah` (`id`, `pb_teori`, `pb_amali`, `pam_teori`, `pam_amali`) VALUES
(1,	20.00,	80.00,	20.00,	80.00);

DELIMITER ;;

CREATE TRIGGER `ref_markah_before_insert` BEFORE INSERT ON `ref_markah` FOR EACH ROW
BEGIN
          IF NOT ((NEW.pb_teori + NEW.pb_amali = 100) AND (NEW.pam_teori + NEW.pam_amali = 100))
          THEN
               SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'pb_teori + pb_amali harus 100 dan pam_teori + pam_amali juga harus 100';
          END IF;
     END;;

CREATE TRIGGER `ref_markah_before_update` BEFORE UPDATE ON `ref_markah` FOR EACH ROW
BEGIN
          IF NOT ((NEW.pb_teori + NEW.pb_amali = 100) AND (NEW.pam_teori + NEW.pam_amali = 100))
          THEN
               SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'pb_teori + pb_amali harus 100 dan pam_teori + pam_amali juga harus 100';
          END IF;
     END;;

DELIMITER ;

DROP TABLE IF EXISTS `ref_modul`;
CREATE TABLE `ref_modul` (
  `id_kursus` int(3) DEFAULT NULL,
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `kod_modul` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `sequence_modul` int(3) DEFAULT NULL,
  `nama_modul` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status_modul` int(2) DEFAULT NULL,
  `teori` decimal(5,2) DEFAULT NULL,
  `praktikal` decimal(5,2) DEFAULT NULL,
  `self` decimal(5,2) DEFAULT NULL,
  `jam_kredit` int(1) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` bigint(25) DEFAULT NULL,
  `pam_teori` int(3) NOT NULL,
  `pam_praktikal` int(3) NOT NULL,
  `pb_teori` int(3) NOT NULL,
  `pb_praktikal` int(3) NOT NULL,
  `pb_peratus` int(3) NOT NULL,
  `pam_peratus` int(3) NOT NULL,
  PRIMARY KEY (`id_modul`),
  KEY `id_kursus` (`id_kursus`)
) ENGINE=MyISAM AUTO_INCREMENT=2213 DEFAULT CHARSET=utf8;

INSERT INTO `ref_modul` (`id_kursus`, `id_modul`, `kod_modul`, `sequence_modul`, `nama_modul`, `status_modul`, `teori`, `praktikal`, `self`, `jam_kredit`, `updated`, `updated_by`, `pam_teori`, `pam_praktikal`, `pb_teori`, `pb_praktikal`, `pb_peratus`, `pam_peratus`) VALUES
(1,	1986,	'M01',	NULL,	'PENGURUSAN KESELAMATAN & KECEMASAN',	NULL,	12.50,	19.50,	0.00,	1,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(1,	1987,	'M02',	NULL,	'MEMASANG PERKAKASAN KOMPUTER',	NULL,	30.00,	66.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(1,	1988,	'M03',	NULL,	'MEMASANG PERISIAN SISTEM OPERASI DAN APLIKASI',	NULL,	27.00,	117.00,	0.00,	4,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(1,	1990,	'M04',	NULL,	'MENYELENGGARA SISTEM KOMPUTER',	NULL,	16.00,	49.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(1,	1992,	'M05',	NULL,	'MEMBAIKPULIH SISTEM KOMPUTER',	NULL,	21.00,	74.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(1,	1993,	'M06',	NULL,	'MEMASANG RANGKAIAN KOMPUTER',	NULL,	20.50,	44.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(1,	1994,	'M07',	NULL,	'MEMASANG PELAYAN (SERVER)',	NULL,	28.00,	155.00,	0.00,	5,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(1,	1995,	'M08',	NULL,	'MENYELENGGARA PELAYAN (SERVER)',	NULL,	32.00,	63.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(1,	1996,	'M09',	NULL,	'MEMBUAT KONFIGURASI PERANTI MUDAH ALIH',	NULL,	15.00,	23.00,	0.00,	1,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1466,	'CSN400 M01',	NULL,	'PENGURUSAN KESELAMATAN & KECEMASAN',	NULL,	12.50,	19.50,	0.00,	1,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1467,	'CSN400 M02',	NULL,	'PERKAKASAN KOMPUTER',	NULL,	8.00,	22.00,	0.00,	1,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1468,	'CSN400 M03',	NULL,	'PEMASANGAN PERISIAN SISTEM KOMPUTER',	NULL,	19.00,	61.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1469,	'CSN400 M04',	NULL,	'KESELAMATAN DATA',	NULL,	15.00,	25.00,	0.00,	1,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1470,	'CSN400 M05',	NULL,	'SISTEM RANGKAIAN KOMPUTER',	NULL,	16.50,	57.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1471,	'CSN400 M06',	NULL,	'SISTEM RANGKAIAN TANPA WAYAR ( WLAN )',	NULL,	39.00,	81.00,	0.00,	3,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1472,	'CSN400 M07',	NULL,	'PENDAWAIAN RANGKAIAN KOMPUTER',	NULL,	17.30,	63.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1473,	'CSN400 M08',	NULL,	'REKABENTUK ETHERNET NETWORK',	NULL,	35.00,	45.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1474,	'CSN400 M09',	NULL,	'SENGGARAAN SISTEM KOMPUTER & RANGKAIAN',	NULL,	39.00,	81.00,	0.00,	3,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(2,	1475,	'CSN400 M10',	NULL,	'SIMULASI SISTEM RANGKAIAN',	NULL,	11.00,	63.00,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2080,	'PEL041 M01',	NULL,	'PENGURUSAN KESELAMATAN DAN KECEMASAN',	NULL,	12.50,	19.50,	0.00,	1,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2081,	'PEL041 M02',	NULL,	'MENGGUNAKAN PERALATAN TANGAN DAN MESIN ELEKTRIK (POWER TOOLS)',	NULL,	7.75,	24.25,	0.00,	1,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2082,	'PEL041 M03',	NULL,	'MEREKA BENTUK LUKISAN ELEKTRIK SATU FASA',	NULL,	44.00,	84.00,	0.00,	3,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2083,	'PEL041 M04',	NULL,	'MENGUJI PEPASANGAN ELEKTRIK SATU FASA',	NULL,	14.25,	49.75,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2084,	'PEL041 M05',	NULL,	'MEMBUAT PENDAWAIAN SUIS SATU HALA',	NULL,	11.75,	52.25,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2085,	'PEL041 M06',	NULL,	'MEMBUAT PENDAWAIAN SUIS DUA HALA DAN PERTENGAHAN',	NULL,	10.50,	85.50,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2086,	'PEL041 M07',	NULL,	'MEMBUAT PENDAWAIAN LITAR AKHIR KUASA',	NULL,	12.50,	51.50,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2087,	'PEL041 M08',	NULL,	'MEMBUAT PENDAWAIAN PELBAGAI SUIS AUTOMATIK DAN ELEKTRONIK',	NULL,	19.50,	44.50,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2088,	'PEL041 M09',	NULL,	'MEMASANG PAPAN AGIHAN DAN SISTEM PEMBUMIAN',	NULL,	17.75,	46.25,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2089,	'PEL041 M10',	NULL,	'MEMBUAT PENDAWAIAN KONDUIT DAN TRUNKING PVC',	NULL,	10.50,	117.50,	0.00,	3,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2090,	'PEL041 M11',	NULL,	'MEREKA BENTUK LUKISAN ELEKTRIK TIGA FASA',	NULL,	7.50,	56.50,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2091,	'PEL041 M01',	NULL,	'MEREKABENTUK LUKISAN ELEKTRIK TIGA FASA',	NULL,	30.50,	65.50,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2092,	'PEL041 M12',	NULL,	'MENGUJI PEPASANGAN ELEKTRIK TIGA FASA',	NULL,	10.75,	53.25,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2093,	'PEL041 M13',	NULL,	'MEMBUAT PENDAWAIAN TERSEMBUNYI',	NULL,	7.50,	56.50,	0.00,	2,	NULL,	NULL,	20,	80,	20,	80,	70,	30),
(3,	2094,	'PEL041 M14',	NULL,	'MEMBUAT PENDAWAIAN KONDUIT DAN TRUNKING LOGAM',	NULL,	9.00,	119.00,	0.00,	3,	NULL,	NULL,	20,	80,	20,	80,	70,	30);

DROP TABLE IF EXISTS `ref_negeri`;
CREATE TABLE `ref_negeri` (
  `id` int(2) NOT NULL,
  `nama_negeri` varchar(30) DEFAULT NULL,
  `kod_negeri` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ref_negeri` (`id`, `nama_negeri`, `kod_negeri`) VALUES
(7,	'JOHOR',	'J'),
(8,	'MELAKA',	'M'),
(9,	'NEGERI SEMBILAN',	'N'),
(10,	'SELANGOR',	'B'),
(11,	'PERAK',	'A'),
(12,	'KEDAH',	'K'),
(13,	'PAHANG',	'C'),
(14,	'PULAU PINANG',	'P'),
(15,	'PERLIS',	'R'),
(16,	'KELANTAN',	'D'),
(17,	'TERENGGANU',	'T'),
(18,	'SABAH',	'S'),
(19,	'SARAWAK',	'Q'),
(20,	'WILAYAH PERSEKUTUAN',	'W');

DROP TABLE IF EXISTS `ref_pendapatan`;
CREATE TABLE `ref_pendapatan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pendapatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_pendapatan` (`id`, `pendapatan`) VALUES
(1,	'0 - 500'),
(2,	'501 - 1000'),
(3,	'1001 - 1500'),
(4,	'1501 - 2000'),
(5,	'> 2000');

DROP TABLE IF EXISTS `ref_poskod_bandar_negeri`;
CREATE TABLE `ref_poskod_bandar_negeri` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `poskod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bandar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negeri` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `negeri` (`negeri`),
  CONSTRAINT `ref_poskod_bandar_negeri_ibfk_1` FOREIGN KEY (`negeri`) REFERENCES `ref_negeri` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=522 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_poskod_bandar_negeri` (`id`, `poskod`, `bandar`, `negeri`) VALUES
(1,	'02600',	'Arau',	15),
(2,	'02300',	'Baseri',	15),
(3,	'02500',	'Guar Sanji',	15),
(4,	'02400',	'Kampung Abi',	15),
(5,	'70536',	'Seremban',	9),
(6,	'02000',	'KUALA PERLIS',	15),
(7,	'05000',	'ALOR SETAR',	12),
(8,	'05400',	'ALOR SETAR',	12),
(9,	'06000',	'JITRA',	12),
(10,	'06010',	'CHANGLOON',	12),
(11,	'06150',	'AYER HITAM',	12),
(12,	'06250',	'ALOR SETAR',	12),
(13,	'06300',	'KUALA NERANG',	12),
(14,	'06350',	'POKOK SENA',	12),
(15,	'06400',	'POKOK SENA',	12),
(16,	'06750',	'PENDANG',	12),
(17,	'06900',	'YAN',	12),
(18,	'07000',	'LANGKAWI',	12),
(19,	'08000',	'SUNGAI PETANI',	12),
(20,	'08100',	'BEDONG',	12),
(21,	'08200',	'SIK',	12),
(22,	'08210',	'SIK',	12),
(23,	'08320',	'JENIANG',	12),
(24,	'08340',	'SIK',	12),
(25,	'09000',	'KULIM',	12),
(26,	'09100',	'BALING',	12),
(27,	'09110',	'KUALA PEGANG',	12),
(28,	'09200',	'KUPANG',	12),
(29,	'09300',	'KUALA KETIL',	12),
(30,	'09400',	'PADANG SERAI',	12),
(31,	'09600',	'LUNAS',	12),
(32,	'09700',	'KARANGAN',	12),
(33,	'09800',	'SERDANG',	12),
(34,	'10050',	'PULAU PINANG',	14),
(35,	'11000',	'BALIK PULAU',	14),
(36,	'11200',	'TANJUNG BUNGAH',	14),
(37,	'11600',	'JELUTONG',	14),
(38,	'11700',	'GELUGOR',	14),
(39,	'11900',	'BAYAN LEPAS',	14),
(40,	'12000',	'BUTTERWORTH',	14),
(41,	'12100',	'BUTTERWORTH',	14),
(42,	'13000',	'BUTTERWORTH',	14),
(43,	'13200',	'KEPALA BATAS',	14),
(44,	'13500',	'PERMATANG PAUH',	14),
(45,	'13600',	'PERAI',	14),
(46,	'13700',	'PERAI',	14),
(47,	'14000',	'BUKIT MERTAJAM',	14),
(48,	'14100',	'SIMPANG AMPAT',	14),
(49,	'14200',	'SUNGAI JAWI',	14),
(50,	'14300',	'NIBONG TEBAL',	14),
(51,	'14400',	'KUBANG SEMANG',	14),
(52,	'15150',	'KOTA BHARU',	16),
(53,	'16100',	'KOTA BHARU',	16),
(54,	'16150',	'KOTA BHARU',	16),
(55,	'16200',	'TUMPAT',	16),
(56,	'16310',	'BACHOK',	16),
(57,	'16450',	'KETEREH',	16),
(58,	'16810',	'SELISING',	16),
(59,	'17000',	'PASIR MAS',	16),
(60,	'17200',	'RANTAU PANJANG',	16),
(61,	'17500',	'TANAH MERAH',	16),
(62,	'17700',	'AYER LANAS',	16),
(63,	'18000',	'KUALA KRAI',	16),
(64,	'18200',	'DABONG',	16),
(65,	'18300',	'GUA MUSANG',	16),
(66,	'18500',	'MACHANG',	16),
(67,	'20000',	'KUALA TERENGGANU',	17),
(68,	'20400',	'KUALA TERENGGANU',	17),
(69,	'21000',	'KUALA TERENGGANU',	17),
(70,	'21020',	'KUALA TERENGGANU',	17),
(71,	'21080',	'KUALA TERENGGANU',	17),
(72,	'21200',	'KUALA TERENGGANU',	17),
(73,	'21210',	'KUALA TERENGGANU',	17),
(74,	'21300',	'KUALA TERENGGANU',	17),
(75,	'21400',	'BUKIT PAYONG',	17),
(76,	'21600',	'MARANG',	17),
(77,	'22000',	'JERTEH',	17),
(78,	'22100',	'PERMAISURI',	17),
(79,	'22200',	'KAMPONG RAJA',	17),
(80,	'23100',	'PAKA',	17),
(81,	'23400',	'AL MUKTAFI BILLAH SHAH',	17),
(82,	'24000',	'CUKAI',	17),
(83,	'24100',	'KIJAL',	17),
(84,	'25150',	'KUANTAN',	13),
(85,	'25250',	'KUANTAN',	13),
(86,	'25300',	'KUANTAN',	13),
(87,	'25350',	'KUANTAN',	13),
(88,	'26080',	'KUALA ROMPIN',	13),
(89,	'26100',	'KUANTAN',	13),
(90,	'26150',	'BALOK',	13),
(91,	'26200',	'SUNGAI LEMBING',	13),
(92,	'26250',	'JAYA GADING',	13),
(93,	'26300',	'GAMBANG',	13),
(94,	'26350',	'GAMBANG',	13),
(95,	'26400',	'BANDAR PUSAT JENGKA',	13),
(96,	'26410',	'BANDAR PUSAT JENGKA',	13),
(97,	'26420',	'BANDAR PUSAT JENGKA',	13),
(98,	'26430',	'BANDAR PUSAT JENGKA',	13),
(99,	'26440',	'BANDAR PUSAT JENGKA',	13),
(100,	'26450',	'BANDAR PUSAT JENGKA',	13),
(101,	'26600',	'PEKAN',	13),
(102,	'26700',	'MUADZAM SHAH',	13),
(103,	'27000',	'JERANTUT',	13),
(104,	'27200',	'KUALA LIPIS',	13),
(105,	'27600',	'RAUB',	13),
(106,	'27650',	'MARAN',	13),
(107,	'28010',	'TEMERLOH',	13),
(108,	'28300',	'TRIANG',	13),
(109,	'28400',	'MENTAKAB',	13),
(110,	'28600',	'KARAK',	13),
(111,	'30000',	'IPOH',	11),
(112,	'30010',	'IPOH',	11),
(113,	'30350',	'IPOH',	11),
(114,	'31000',	'BATU GAJAH',	11),
(115,	'31100',	'SUNGAI SIPUT',	11),
(116,	'31150',	'ULU KINTA',	11),
(117,	'31350',	'IPOH',	11),
(118,	'31400',	'IPOH',	11),
(119,	'31500',	'IPOH',	11),
(120,	'31600',	'GOPENG',	11),
(121,	'31800',	'TANJONG TUALANG',	11),
(122,	'32000',	'SITIAWAN',	11),
(123,	'32400',	'AYER TAWAR',	11),
(124,	'32500',	'CHANGKAT KERUING',	11),
(125,	'32800',	'PARIT',	11),
(126,	'33000',	'KUALA KANGSAR',	11),
(127,	'33007',	'KUALA KANGSAR',	11),
(128,	'33009',	'KUALA KANGSAR',	11),
(129,	'33010',	'KUALA KANGSAR',	11),
(130,	'33040',	'KUALA KANGSAR',	11),
(131,	'33300',	'GERIK',	11),
(132,	'33320',	'GERIK',	11),
(133,	'33400',	'LENGGONG',	11),
(134,	'33410',	'LENGGONG',	11),
(135,	'33800',	'MANONG',	11),
(136,	'34000',	'TAIPING',	11),
(137,	'34100',	'SELAMA',	11),
(138,	'34200',	'PARIT BUNTAR',	11),
(139,	'34250',	'TANJONG PIANDANG',	11),
(140,	'34300',	'BAGAN SERAI',	11),
(141,	'34350',	'KUALA KURAU',	11),
(142,	'34400',	'SIMPANG AMPAT SEMANGGOL',	11),
(143,	'34500',	'BATU KURAU',	11),
(144,	'34510',	'BATU KURAU',	11),
(145,	'34600',	'KAMUNTING',	11),
(146,	'34650',	'KUALA SEPETANG',	11),
(147,	'34700',	'SIMPANG',	11),
(148,	'34750',	'MATANG',	11),
(149,	'34800',	'TRONG',	11),
(150,	'34850',	'CHANGKAT JERING',	11),
(151,	'34900',	'PANTAI REMIS',	11),
(152,	'34950',	'BANDAR BAHARU',	12),
(153,	'35800',	'SLIM RIVER',	11),
(154,	'36000',	'TELUK INTAN',	11),
(155,	'36100',	'BAGAN DATOH',	11),
(156,	'36200',	'SELEKOH',	11),
(157,	'36300',	'SUNGAI SUMUN',	11),
(158,	'36400',	'HUTAN MELINTANG',	11),
(159,	'36800',	'KAMPONG GAJAH',	11),
(160,	'40000',	'SHAH ALAM',	10),
(161,	'40100',	'SHAH ALAM',	10),
(162,	'40150',	'SHAH ALAM',	10),
(163,	'40160',	'SHAH ALAM',	10),
(164,	'40170',	'SHAH ALAM',	10),
(165,	'40200',	'SHAH ALAM',	10),
(166,	'40300',	'SHAH ALAM',	10),
(167,	'40400',	'SHAH ALAM',	10),
(168,	'40450',	'SHAH ALAM',	10),
(169,	'40460',	'SHAH ALAM',	10),
(170,	'40470',	'SHAH ALAM',	10),
(171,	'40500',	'SHAH ALAM',	10),
(172,	'40550',	'SHAH ALAM',	10),
(173,	'40560',	'SHAH ALAM',	10),
(174,	'40570',	'SHAH ALAM',	10),
(175,	'40700',	'SHAH ALAM',	10),
(176,	'41000',	'KLANG',	10),
(177,	'41050',	'KLANG',	10),
(178,	'41100',	'KLANG',	10),
(179,	'41150',	'KLANG',	10),
(180,	'41200',	'KLANG',	10),
(181,	'41250',	'KLANG',	10),
(182,	'41300',	'KLANG',	10),
(183,	'41400',	'KLANG',	10),
(184,	'41500',	'KLANG',	10),
(185,	'41700',	'KLANG',	10),
(186,	'41900',	'KLANG',	10),
(187,	'42000',	'PELABUHAN KLANG',	10),
(188,	'42100',	'KLANG',	10),
(189,	'42200',	'KAPAR',	10),
(190,	'42300',	'BANDAR PUNCAK ALAM',	10),
(191,	'42500',	'TELOK PANGLIMA GARANG',	10),
(192,	'42600',	'JENJAROM',	10),
(193,	'42700',	'BANTING',	10),
(194,	'42800',	'TANJONG SEPAT',	10),
(195,	'43000',	'KAJANG',	10),
(196,	'43100',	'HULU LANGAT',	10),
(197,	'43200',	'CHERAS',	10),
(198,	'43300',	'SERI KEMBANGAN',	10),
(199,	'43400',	'UPM SERDANG',	10),
(200,	'43500',	'SEMENYIH',	10),
(201,	'43600',	'UKM BANGI',	10),
(202,	'43650',	'BANDAR BARU BANGI',	10),
(203,	'43700',	'BERANANG',	10),
(204,	'43800',	'DENGKIL',	10),
(205,	'43900',	'SEPANG',	10),
(206,	'43950',	'SUNGAI PELEK',	10),
(207,	'44000',	'KUALA KUBU BARU',	10),
(208,	'44100',	'KERLING',	10),
(209,	'44200',	'RASA',	10),
(210,	'44300',	'BATANG KALI',	10),
(211,	'45000',	'KUALA SELANGOR',	10),
(212,	'45100',	'SUNGAI AYER TAWAR',	10),
(213,	'45200',	'SABAK BERNAM',	10),
(214,	'45300',	'SUNGAI BESAR',	10),
(215,	'45400',	'SEKINCHAN',	10),
(216,	'45500',	'TANJONG KARANG',	10),
(217,	'45600',	'BATANG BERJUNTAI',	10),
(218,	'45700',	'BUKIT ROTAN',	10),
(219,	'45800',	'JERAM',	10),
(220,	'46000',	'PETALING JAYA',	10),
(221,	'46050',	'PETALING JAYA',	10),
(222,	'46100',	'PETALING JAYA',	10),
(223,	'46150',	'PETALING JAYA',	10),
(224,	'46200',	'PETALING JAYA',	10),
(225,	'46300',	'PETALING JAYA',	10),
(226,	'46350',	'PETALING JAYA',	10),
(227,	'46400',	'PETALING JAYA',	10),
(228,	'46700',	'PETALING JAYA',	10),
(229,	'46710',	'PETALING JAYA',	10),
(230,	'46720',	'PETALING JAYA',	10),
(231,	'46730',	'PETALING JAYA',	10),
(232,	'46740',	'PETALING JAYA',	10),
(233,	'46750',	'PETALING JAYA',	10),
(234,	'46760',	'PETALING JAYA',	10),
(235,	'46770',	'PETALING JAYA',	10),
(236,	'46780',	'PETALING JAYA',	10),
(237,	'46790',	'PETALING JAYA',	10),
(238,	'46800',	'PETALING JAYA',	10),
(239,	'47000',	'SUNGAI BULOH',	10),
(240,	'47100',	'PUCHONG',	10),
(241,	'47110',	'PUCHONG',	10),
(242,	'47120',	'PUCHONG',	10),
(243,	'47130',	'PUCHONG',	10),
(244,	'47140',	'PUCHONG',	10),
(245,	'47150',	'PUCHONG',	10),
(246,	'47160',	'PUCHONG',	10),
(247,	'47170',	'PUCHONG',	10),
(248,	'47180',	'PUCHONG',	10),
(249,	'47190',	'PUCHONG',	10),
(250,	'47200',	'SUBANG AIRPORT',	10),
(251,	'47300',	'PETALING JAYA',	10),
(252,	'47301',	'PETALING JAYA',	10),
(253,	'47400',	'PETALING JAYA',	10),
(254,	'47410',	'PETALING JAYA',	10),
(255,	'47500',	'SUBANG JAYA',	10),
(256,	'47600',	'SUBANG JAYA',	10),
(257,	'47610',	'SUBANG JAYA',	10),
(258,	'47620',	'SUBANG JAYA',	10),
(259,	'47630',	'SUBANG JAYA',	10),
(260,	'47640',	'SUBANG JAYA',	10),
(261,	'47650',	'SUBANG JAYA',	10),
(262,	'47800',	'PETALING JAYA',	10),
(263,	'47810',	'PETALING JAYA',	10),
(264,	'47820',	'PETALING JAYA',	10),
(265,	'47830',	'PETALING JAYA',	10),
(266,	'48000',	'RAWANG',	10),
(267,	'48050',	'RAWANG',	10),
(268,	'48100',	'BATU ARANG',	10),
(269,	'48200',	'SERENDAH',	10),
(270,	'48300',	'RAWANG',	10),
(271,	'49000',	'BUKIT FRASER',	13),
(272,	'50000',	'KUALA LUMPUR',	20),
(273,	'50050',	'KUALA LUMPUR',	20),
(274,	'50100',	'KUALA LUMPUR',	20),
(275,	'50150',	'KUALA LUMPUR',	20),
(276,	'50200',	'KUALA LUMPUR',	20),
(277,	'50250',	'KUALA LUMPUR',	20),
(278,	'50300',	'KUALA LUMPUR',	20),
(279,	'50350',	'KUALA LUMPUR',	20),
(280,	'50400',	'KUALA LUMPUR',	20),
(281,	'50450',	'KUALA LUMPUR',	20),
(282,	'50500',	'KUALA LUMPUR',	20),
(283,	'50550',	'KUALA LUMPUR',	20),
(284,	'50600',	'KUALA LUMPUR',	20),
(285,	'50609',	'KUALA LUMPUR',	20),
(286,	'50650',	'KUALA LUMPUR',	20),
(287,	'50700',	'KUALA LUMPUR',	20),
(288,	'50750',	'KUALA LUMPUR',	20),
(289,	'50800',	'KUALA LUMPUR',	20),
(290,	'50950',	'KUALA LUMPUR',	20),
(291,	'51000',	'KUALA LUMPUR',	20),
(292,	'51100',	'KUALA LUMPUR',	20),
(293,	'51200',	'KUALA LUMPUR',	10),
(294,	'51700',	'KUALA LUMPUR',	20),
(295,	'52000',	'KUALA LUMPUR',	20),
(296,	'52100',	'KUALA LUMPUR',	13),
(297,	'52200',	'KUALA LUMPUR',	20),
(298,	'53000',	'KUALA LUMPUR',	20),
(299,	'53100',	'GOMBAK',	10),
(300,	'53200',	'KUALA LUMPUR',	20),
(301,	'53300',	'KUALA LUMPUR',	20),
(302,	'53700',	'KUALA LUMPUR',	20),
(303,	'53800',	'KUALA LUMPUR',	20),
(304,	'54000',	'KUALA LUMPUR',	20),
(305,	'54100',	'KUALA LUMPUR',	20),
(306,	'54200',	'KUALA LUMPUR',	10),
(307,	'55000',	'KUALA LUMPUR',	20),
(308,	'55100',	'PANDAN',	10),
(309,	'55200',	'KUALA LUMPUR',	20),
(310,	'55300',	'KUALA LUMPUR',	20),
(311,	'55700',	'KUALA LUMPUR',	20),
(312,	'56000',	'KUALA LUMPUR',	20),
(313,	'56100',	'CHERAS',	10),
(314,	'57000',	'KUALA LUMPUR',	20),
(315,	'57100',	'KUALA LUMPUR',	20),
(316,	'58000',	'KUALA LUMPUR',	20),
(317,	'58100',	'KUALA LUMPUR',	20),
(318,	'58200',	'KUALA LUMPUR',	20),
(319,	'59000',	'KUALA LUMPUR',	20),
(320,	'59100',	'KUALA LUMPUR',	20),
(321,	'59200',	'KUALA LUMPUR',	20),
(322,	'60000',	'KUALA LUMPUR',	20),
(323,	'62000',	'PUTRAJAYA',	20),
(324,	'62050',	'PUTRAJAYA',	20),
(325,	'62100',	'PUTRAJAYA',	20),
(326,	'62150',	'PUTRAJAYA',	20),
(327,	'62300',	'PUTRAJAYA',	20),
(328,	'63000',	'CYBERJAYA',	10),
(329,	'63100',	'CYBERJAYA',	10),
(330,	'63300',	'CYBERJAYA',	10),
(331,	'64000',	'KLIA',	10),
(332,	'68000',	'AMPANG',	10),
(333,	'68100',	'BATU CAVES',	10),
(334,	'70000',	'SEREMBAN',	9),
(335,	'70100',	'SEREMBAN',	9),
(336,	'70200',	'SEREMBAN',	9),
(337,	'70300',	'SEREMBAN',	9),
(338,	'70400',	'SEREMBAN',	9),
(339,	'71000',	'PORT DICKSON',	9),
(340,	'71150',	'LINGGI',	9),
(341,	'71350',	'KOTA',	9),
(342,	'71650',	'KUALA KLAWANG',	9),
(343,	'72000',	'KUALA PILAH',	9),
(344,	'72100',	'BAHAU',	9),
(345,	'72120',	'BANDAR SERI JEMPOL',	9),
(346,	'73000',	'TAMPIN',	9),
(347,	'73100',	'JOHOL',	9),
(348,	'73200',	'GEMENCHEH',	9),
(349,	'73300',	'GEMENCHEH',	9),
(350,	'73400',	'GEMAS',	9),
(351,	'73420',	'GEMAS',	9),
(352,	'75000',	'MELAKA',	8),
(353,	'75100',	'MELAKA',	8),
(354,	'75200',	'MELAKA',	8),
(355,	'75300',	'MELAKA',	8),
(356,	'75400',	'MELAKA',	8),
(357,	'75450',	'AIR KEROH',	8),
(358,	'76100',	'DURIAN TUNGGAL',	8),
(359,	'76200',	'MASJID TANAH',	8),
(360,	'76300',	'MASJID TANAH',	8),
(361,	'77000',	'JASIN',	8),
(362,	'77100',	'ASAHAN',	8),
(363,	'77200',	'BEMBAN',	8),
(364,	'77300',	'MERLIMAU',	8),
(365,	'77400',	'SUNGAI RAMBAI',	8),
(366,	'78000',	'ALOR GAJAH',	8),
(367,	'78100',	'MASJID TANAH',	8),
(368,	'78200',	'MASJID TANAH',	8),
(369,	'78300',	'MASJID TANAH',	8),
(370,	'81000',	'KULAI',	7),
(371,	'81100',	'JOHOR BAHRU',	7),
(372,	'81200',	'JOHOR BAHRU',	7),
(373,	'81300',	'JOHOR BAHRU',	7),
(374,	'81400',	'SENAI',	7),
(375,	'81450',	'GUGUSAN TAIB ANDAK',	7),
(376,	'81500',	'PEKAN NENAS',	7),
(377,	'81550',	'GELANG PATAH',	7),
(378,	'81600',	'PENGERANG',	7),
(379,	'81700',	'PASIR GUDANG',	7),
(380,	'81750',	'MASAI',	7),
(381,	'81800',	'ULU TIRAM',	7),
(382,	'81900',	'KOTA TINGGI',	7),
(383,	'81920',	'AYER TAWAR 2',	7),
(384,	'82000',	'PONTIAN',	7),
(385,	'82100',	'AYER BALOI',	7),
(386,	'83000',	'BATU PAHAT',	7),
(387,	'83100',	'RENGIT',	7),
(388,	'83200',	'SENGGARANG',	7),
(389,	'83300',	'SERI GADING',	7),
(390,	'83400',	'SERI MEDAN',	7),
(391,	'83500',	'PARIT SULONG',	7),
(392,	'83600',	'SEMERAH',	7),
(393,	'84000',	'MUAR',	7),
(394,	'84200',	'MUAR',	7),
(395,	'84300',	'BUKIT PASIR',	7),
(396,	'84400',	'SUNGAI MATI',	7),
(397,	'84500',	'PANCHOR',	7),
(398,	'84600',	'PAGOH',	7),
(399,	'85000',	'SEGAMAT',	7),
(400,	'85100',	'BATU ANAM',	7),
(401,	'85200',	'JEMENTAH',	7),
(402,	'85300',	'LABIS',	7),
(403,	'85400',	'CHAAH',	7),
(404,	'86000',	'KLUANG',	7),
(405,	'86100',	'AYER HITAM',	7),
(406,	'86200',	'SIMPANG RENGAM',	7),
(407,	'86300',	'RENGAM',	7),
(408,	'86400',	'PARIT RAJA',	7),
(409,	'86500',	'BEKOK',	7),
(410,	'86600',	'PALOH',	7),
(411,	'86700',	'KAHANG',	7),
(412,	'86800',	'MERSING',	7),
(413,	'87000',	'LABUAN',	18),
(414,	'87017',	'LABUAN',	18),
(415,	'88000',	'KOTA KINABALU',	18),
(416,	'88100',	'KOTA KINABALU',	18),
(417,	'88200',	'KOTA KINABALU',	18),
(418,	'88300',	'KOTA KINABALU',	18),
(419,	'88400',	'KOTA KINABALU',	18),
(420,	'88450',	'KOTA KINABALU',	18),
(421,	'88500',	'KOTA KINABALU',	18),
(422,	'88600',	'KOTA KINABALU',	18),
(423,	'88700',	'BEVERLY',	18),
(424,	'88800',	'KOTA KINABALU',	18),
(425,	'88858',	'TANJUNG ARU',	18),
(426,	'89000',	'KENINGAU',	18),
(427,	'89008',	'KENINGAU',	18),
(428,	'89050',	'KUDAT',	18),
(429,	'89058',	'KUDAT',	18),
(430,	'89100',	'KOTA MARUDU',	18),
(431,	'89108',	'KOTA MARUDU',	18),
(432,	'89150',	'KOTA BELUD',	18),
(433,	'89159',	'KOTA BELUD',	18),
(434,	'89200',	'TUARAN',	18),
(435,	'89208',	'TUARAN',	18),
(436,	'89250',	'TAMPARULI',	18),
(437,	'89257',	'TAMPARULI',	18),
(438,	'89300',	'RANAU',	18),
(439,	'89309',	'RANAU',	18),
(440,	'89500',	'PENAMPANG',	18),
(441,	'89600',	'PAPAR',	18),
(442,	'89607',	'PAPAR',	18),
(443,	'89650',	'TAMBUNAN',	18),
(444,	'89740',	'KUALA PENYU',	18),
(445,	'89800',	'BEAUFORT',	18),
(446,	'89850',	'SIPITANG',	18),
(447,	'89900',	'TENOM',	18),
(448,	'89909',	'TENOM',	18),
(449,	'90000',	'SANDAKAN',	18),
(450,	'90009',	'SANDAKAN',	18),
(451,	'90100',	'BELURAN',	18),
(452,	'90200',	'KOTA KINABATANGAN',	18),
(453,	'90300',	'SANDAKAN',	18),
(454,	'90400',	'PAMOL',	18),
(455,	'90700',	'SANDAKAN',	18),
(456,	'90702',	'SANDAKAN',	18),
(457,	'90712',	'SANDAKAN',	18),
(458,	'90713',	'SANDAKAN',	18),
(459,	'90716',	'SANDAKAN',	18),
(460,	'91000',	'TAWAU',	18),
(461,	'91008',	'TAWAU',	18),
(462,	'91022',	'TAWAU',	18),
(463,	'91100',	'LAHAD DATU',	18),
(464,	'91150',	'LAHAD DATU',	18),
(465,	'93000',	'KUCHING',	19),
(466,	'93050',	'KUCHING',	19),
(467,	'9310',	'KUALA KETIL',	12),
(468,	'93100',	'KUCHING',	19),
(469,	'93200',	'KUCHING',	19),
(470,	'93250',	'KUCHING',	19),
(471,	'93300',	'KUCHING',	19),
(472,	'93400',	'KUCHING',	19),
(473,	'93450',	'KUCHING',	19),
(474,	'93728',	'KUCHING',	19),
(475,	'94000',	'BAU',	19),
(476,	'94200',	'SIBURAN',	19),
(477,	'94300',	'KOTA SAMARAHAN',	19),
(478,	'94500',	'LUNDU',	19),
(479,	'94600',	'ASAJAYA',	19),
(480,	'94650',	'KABONG',	19),
(481,	'94700',	'SERIAN',	19),
(482,	'94750',	'SERIAN',	19),
(483,	'94800',	'SIMUNJAN',	19),
(484,	'94850',	'SEBUYAU',	19),
(485,	'94900',	'LINGGA',	19),
(486,	'95000',	'SRI AMAN',	19),
(487,	'95300',	'ROBAN',	19),
(488,	'95400',	'SARATOK',	19),
(489,	'95500',	'DEBAK',	19),
(490,	'95600',	'SPAOH',	19),
(491,	'95700',	'BETONG',	19),
(492,	'95800',	'ENGKILILI',	19),
(493,	'95900',	'LUBOK ANTU',	19),
(494,	'96000',	'SIBU',	19),
(495,	'96100',	'SARIKEI',	19),
(496,	'96150',	'BELAWAI',	19),
(497,	'96200',	'DARO',	19),
(498,	'96300',	'DALAT',	19),
(499,	'96400',	'MUKAH',	19),
(500,	'96500',	'BINTANGOR',	19),
(501,	'96600',	'JULAU',	19),
(502,	'96700',	'KANOWIT',	19),
(503,	'96800',	'KAPIT',	19),
(504,	'96900',	'BELAGA',	19),
(505,	'97000',	'BINTULU',	19),
(506,	'97007',	'BINTULU',	19),
(507,	'97100',	'SEBAUH',	19),
(508,	'97200',	'TATAU',	19),
(509,	'97300',	'BINTULU',	19),
(510,	'98000',	'MIRI',	19),
(511,	'98050',	'BARAM',	19),
(512,	'98100',	'LUTONG',	19),
(513,	'98200',	'MIRI',	19),
(514,	'98300',	'LONG LAMA',	19),
(515,	'98700',	'LIMBANG',	19),
(516,	'98750',	'NANGA MEDAMIT',	19),
(517,	'98800',	'SUNDAR',	19),
(518,	'98850',	'LAWAS',	19),
(519,	'02100',	'PADANG BESAR',	15),
(520,	'02200',	'KAKI BUKIT',	15),
(521,	'01000',	'KANGAR',	15);

DROP TABLE IF EXISTS `ref_status_markah`;
CREATE TABLE `ref_status_markah` (
  `kod_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_status_markah` (`kod_status`, `desc_status`) VALUES
('0',	'TP - Belum  Diisi'),
('1',	'TP - Disimpan'),
('2',	'TP - Dihantar ke Pengurus'),
('3',	'Pengurus - Dikembalikan ke TP'),
('4',	'Pengurus - Dihantar ke PGN'),
('5',	'PGN - Dikembalikan ke TP'),
('6',	'PGN - Dihantar ke PPKL'),
('7',	'PPKL - Disahkan oleh PPKL');

DROP TABLE IF EXISTS `ref_taraf_perkahwinan`;
CREATE TABLE `ref_taraf_perkahwinan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `taraf_perkahwinan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ref_taraf_perkahwinan` (`id`, `taraf_perkahwinan`) VALUES
(1,	'Bujang'),
(2,	'Kahwin'),
(3,	'Duda'),
(4,	'Janda');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `setting_code`, `setting_name`, `setting_text`) VALUES
(1,	'MAIL',	'smtp',	'mail.mmsi.co.id'),
(2,	'MAIL',	'username',	'gspel@mmsi.co.id'),
(3,	'MAIL',	'password',	'Gspel123!!!');

DROP TABLE IF EXISTS `settings_tawaran_kursus`;
CREATE TABLE `settings_tawaran_kursus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_kursus` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `id_intake` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kursus` (`id_kursus`),
  KEY `id_giatmara` (`id_giatmara`),
  KEY `id_intake` (`id_intake`),
  CONSTRAINT `settings_tawaran_kursus_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `ref_kursus` (`id`),
  CONSTRAINT `settings_tawaran_kursus_ibfk_2` FOREIGN KEY (`id_giatmara`) REFERENCES `ref_giatmara` (`id`),
  CONSTRAINT `settings_tawaran_kursus_ibfk_3` FOREIGN KEY (`id_intake`) REFERENCES `ref_intake` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=989 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings_tawaran_kursus` (`id`, `id_kursus`, `id_giatmara`, `id_intake`, `status`) VALUES
(30,	1,	18,	1,	1),
(31,	1,	134,	1,	1),
(32,	1,	135,	1,	1),
(33,	1,	136,	1,	1),
(34,	1,	137,	1,	1),
(35,	1,	138,	1,	1),
(36,	1,	139,	1,	1),
(37,	1,	140,	1,	1),
(142,	1,	3,	1,	1),
(143,	1,	17,	1,	1),
(144,	1,	18,	1,	1),
(145,	1,	19,	1,	1),
(275,	2,	5,	1,	1),
(276,	2,	134,	1,	1),
(277,	2,	135,	1,	1),
(278,	2,	136,	1,	1),
(279,	2,	137,	1,	1),
(280,	2,	138,	1,	1),
(281,	2,	139,	1,	1),
(282,	2,	140,	1,	1),
(387,	2,	3,	1,	1),
(388,	2,	17,	1,	1),
(389,	2,	18,	1,	1),
(390,	2,	19,	1,	1),
(522,	3,	5,	1,	1),
(523,	3,	134,	1,	1),
(524,	3,	135,	1,	1),
(525,	3,	136,	1,	1),
(526,	3,	137,	1,	1),
(527,	3,	138,	1,	1),
(528,	3,	139,	1,	1),
(529,	3,	140,	1,	1),
(634,	3,	3,	1,	1),
(635,	3,	17,	1,	1),
(636,	3,	18,	1,	1),
(637,	3,	19,	1,	1),
(769,	4,	5,	1,	1),
(770,	4,	134,	1,	1),
(771,	4,	135,	1,	1),
(772,	4,	136,	1,	1),
(773,	4,	137,	1,	1),
(774,	4,	138,	1,	1),
(775,	4,	139,	1,	1),
(776,	4,	140,	1,	1),
(881,	4,	3,	1,	1),
(882,	4,	17,	1,	1),
(883,	4,	18,	1,	1),
(884,	4,	19,	1,	1);

DROP TABLE IF EXISTS `setting_tarikh_permohonan`;
CREATE TABLE `setting_tarikh_permohonan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `tahun_pengambilan` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `setting_tarikh_permohonan` (`id`, `start_date`, `end_date`, `tahun_pengambilan`) VALUES
(1,	'2017-06-01',	'2017-12-31',	'2017');

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jawatan` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `status_jawatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `staff` (`id`, `nama`, `id_jawatan`, `id_giatmara`, `status_jawatan`) VALUES
(1,	'Saiful Baharin Samdusin',	5,	262,	'1'),
(2,	'Amira Buhari',	5,	262,	'1'),
(3,	'Azmi Hadi',	5,	263,	'1'),
(4,	'Fatin Shahira Anuar',	5,	263,	'1'),
(5,	'Staff Giatmara Perlis 1',	5,	3,	'1'),
(6,	'Staff Giatmara Perlis 2',	7,	3,	'1');

DROP TABLE IF EXISTS `staff_info`;
CREATE TABLE `staff_info` (
  `id_staff` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_agama` int(10) NOT NULL,
  `id_bangsa` int(10) NOT NULL,
  `jantina` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkahwinan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_lahir` date NOT NULL,
  `umur` int(4) NOT NULL,
  `tempat_lahir` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_gaji` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emel` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jabatan` int(10) NOT NULL,
  `id_jawatan` int(10) NOT NULL,
  `id_jenis_jawatan` int(10) NOT NULL,
  `id_negeri` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `staff_info_pangku_tugas`;
CREATE TABLE `staff_info_pangku_tugas` (
  `id` int(10) NOT NULL,
  `id_staff` int(10) NOT NULL,
  `id_jabatan` int(10) NOT NULL,
  `id_jawatan` int(10) NOT NULL,
  `id_jenis_jawatan` int(10) NOT NULL,
  `id_negeri` int(10) NOT NULL,
  `id_giatmara` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL,
  `tarikh_mula_tugas` date NOT NULL,
  `tarikh_tamat_tugas` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `temuduga_tetapan`;
CREATE TABLE `temuduga_tetapan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) NOT NULL COMMENT 'id dari table permohonan_kursus',
  `id_giatmara` int(10) NOT NULL,
  `id_kursus` int(10) NOT NULL COMMENT 'refer to settings_tawaran_kursus column kursus1/kursus2/kursus3, yang disimpan id settings_tawaran_kursus bukan id_kursus',
  `tarikh_waktu` datetime NOT NULL,
  `tempat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai` int(11) NOT NULL COMMENT 'refer to staff.id',
  `jawatan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telefon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh_cetak` datetime DEFAULT NULL COMMENT 'current date',
  `cetak` int(11) DEFAULT NULL COMMENT '1=printed; 0=not printed;',
  `keputusan_temuduga` int(10) NOT NULL COMMENT 'refer to ref_keputusan_temuduga',
  `tukar_kursus` int(10) NOT NULL COMMENT 'refer to settings_tawaran_kursus column kursus1/kursus2/kursus3',
  `catatan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawaran_sesi` int(10) DEFAULT NULL,
  `tawaran_kursus` int(10) DEFAULT NULL,
  `tawaran_elaun` int(2) DEFAULT NULL,
  `tawaran_nama_bank` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawaran_no_akaun` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawaran_cara_bayaran` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawaran_status` int(2) DEFAULT NULL,
  `tawaran_tarikh_lapordiri` date DEFAULT NULL,
  `tawaran_masa_lapordiri` time DEFAULT NULL,
  `tawaran_cetak` int(2) DEFAULT NULL,
  `tawaran_tarikh_cetak` datetime DEFAULT NULL,
  `pendaftaran_status` int(11) DEFAULT '0' COMMENT '1=offered; 0=not offered',
  PRIMARY KEY (`id`),
  KEY `pegawai` (`pegawai`),
  KEY `id_kursus` (`id_kursus`),
  KEY `id_giatmara` (`id_giatmara`),
  KEY `id_permohonan` (`id_permohonan`),
  KEY `tukar_kursus` (`tukar_kursus`),
  KEY `temuduga_tetapan_keputusan` (`keputusan_temuduga`),
  CONSTRAINT `temuduga_tetapan_ibfk_3` FOREIGN KEY (`pegawai`) REFERENCES `staff` (`id`),
  CONSTRAINT `temuduga_tetapan_ibfk_4` FOREIGN KEY (`id_kursus`) REFERENCES `settings_tawaran_kursus` (`id`),
  CONSTRAINT `temuduga_tetapan_ibfk_5` FOREIGN KEY (`id_giatmara`) REFERENCES `ref_giatmara` (`id`),
  CONSTRAINT `temuduga_tetapan_ibfk_6` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan_kursus` (`id`),
  CONSTRAINT `temuduga_tetapan_ibfk_7` FOREIGN KEY (`tukar_kursus`) REFERENCES `settings_tawaran_kursus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `temuduga_tetapan` (`id`, `id_permohonan`, `id_giatmara`, `id_kursus`, `tarikh_waktu`, `tempat`, `pegawai`, `jawatan`, `email`, `no_telefon`, `tarikh_cetak`, `cetak`, `keputusan_temuduga`, `tukar_kursus`, `catatan`, `tawaran_sesi`, `tawaran_kursus`, `tawaran_elaun`, `tawaran_nama_bank`, `tawaran_no_akaun`, `tawaran_cara_bayaran`, `tawaran_status`, `tawaran_tarikh_lapordiri`, `tawaran_masa_lapordiri`, `tawaran_cetak`, `tawaran_tarikh_cetak`, `pendaftaran_status`) VALUES
(1,	51,	3,	142,	'2017-08-10 05:45:00',	'GIATMARA PERLIS',	5,	'Teacher',	'gmperlis@giatmara.edu.my',	'04-9782984',	'2017-08-08 00:00:00',	1,	1,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(2,	59,	3,	142,	'2017-08-10 05:45:00',	'GIATMARA PERLIS',	5,	'Teacher',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(3,	51,	3,	142,	'2017-08-11 08:15:00',	'GIATMARA PERLIS',	5,	'Teacher',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(4,	51,	3,	142,	'2017-08-16 09:00:00',	'GIATMARA PERLIS',	5,	'Teacher',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(5,	74,	3,	388,	'2017-08-16 09:00:00',	'GIATMARA PERLIS',	6,	'Trainee',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	388,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(6,	86,	3,	142,	'2017-08-17 10:15:00',	'GIATMARA PERLIS',	5,	'Teacher',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(13,	51,	3,	387,	'2017-08-17 01:45:00',	'GIATMARA PERLIS',	5,	'Teacher',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	387,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(14,	51,	3,	142,	'2017-08-17 10:00:00',	'GIATMARA PERLIS',	5,	'Teacher',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(15,	56,	3,	142,	'2017-08-17 10:30:00',	'GIATMARA PERLIS',	5,	'Teacher',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(16,	51,	3,	142,	'2017-08-19 12:00:00',	'GIATMARA PERLIS',	5,	'',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(17,	51,	3,	142,	'2017-08-19 07:15:00',	'GIATMARA PERLIS',	5,	'Pengarah',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(18,	51,	3,	142,	'2017-08-31 07:15:00',	'GIATMARA PERLIS',	6,	'Pegawai Alatan Dan Senggaraan',	'gmperlis@giatmara.edu.my',	'04-9782984',	NULL,	0,	0,	142,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0);

DROP TABLE IF EXISTS `trainee_info`;
CREATE TABLE `trainee_info` (
  `trainee_id` int(10) NOT NULL AUTO_INCREMENT,
  `no_mykad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tawaran_kursus` int(10) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`trainee_id`),
  KEY `id_tawaran_kursus` (`id_tawaran_kursus`),
  CONSTRAINT `trainee_info_ibfk_1` FOREIGN KEY (`id_tawaran_kursus`) REFERENCES `settings_tawaran_kursus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `trainee_info` (`trainee_id`, `no_mykad`, `id_tawaran_kursus`, `status`) VALUES
(1,	'123',	31,	'AKTIF'),
(2,	'11111',	32,	'AKTIF');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `about` text,
  `giatmara_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `about`, `giatmara_id`) VALUES
(1,	'127.0.0.1',	'member',	'$2y$08$kkqUE2hrqAJtg.pPnAhvL.1iE7LIujK5LZ61arONLpaBBWh/ek61G',	NULL,	'member@member.com',	NULL,	NULL,	NULL,	NULL,	1451903855,	1451905011,	1,	'Member',	'One',	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1,	1,	1);

DROP VIEW IF EXISTS `v_cetakan_surat_temuduga`;
CREATE TABLE `v_cetakan_surat_temuduga` (`id_settings_tawaran_kursus` int(10), `nama_negeri` varchar(30), `nama_giatmara` varchar(60), `nama_kursus` varchar(250), `kewarganegaraan` varchar(100), `nama_intake` varchar(100), `nama_penuh` varchar(250), `no_mykad` varchar(20), `no_hp` varchar(50), `tarikh_waktu` datetime, `tarikh_temuduga` varchar(84), `tempat_temuduga` varchar(250), `pegawai_dihubungi` varchar(250), `tarikh_cetakan` datetime, `id_negeri` int(11), `id_giatmara` int(10), `id_kursus` int(10), `id_kewarganegaraan` int(10), `id_intake` int(10), `id_permohonan_kursus` int(10));


DROP VIEW IF EXISTS `v_gagal_temuduga`;
CREATE TABLE `v_gagal_temuduga` (`id_settings_tawaran_kursus` int(10), `nama_negeri` varchar(30), `nama_giatmara` varchar(60), `nama_kursus` varchar(250), `kewarganegaraan` varchar(100), `nama_intake` varchar(100), `nama_penuh` varchar(250), `no_mykad` varchar(20), `tarikh_waktu` datetime, `tarikh_temuduga` varchar(84), `keputusan_temuduga` varchar(100), `tukar_kursus` int(10), `id_negeri` int(11), `id_giatmara` int(10), `id_kewarganegaraan` int(10), `id_intake` int(10), `id_permohonan_kursus` int(10));


DROP VIEW IF EXISTS `v_giatmara_kursus`;
CREATE TABLE `v_giatmara_kursus` (`nama_kluster` varchar(250), `nama_negeri` varchar(30), `kod_giatmara` varchar(6), `nama_giatmara` varchar(60), `kod_kursus` varchar(10), `nama_kursus` varchar(250), `kod_intake` varchar(20), `nama_intake` varchar(100), `id_negeri` int(10), `id_kluster` int(10), `id_giatmara` int(10), `id_kursus` int(10), `id_intake` int(10), `id_setting_penawaran_kursus` int(10), `status` int(2));


DROP VIEW IF EXISTS `v_keputusan_temuduga`;
CREATE TABLE `v_keputusan_temuduga` (`id_settings_tawaran_kursus` int(10), `nama_negeri` varchar(30), `nama_giatmara` varchar(60), `nama_kursus` varchar(250), `kewarganegaraan` varchar(100), `nama_intake` varchar(100), `nama_penuh` varchar(250), `no_mykad` varchar(20), `tarikh_waktu` datetime, `tarikh_temuduga` varchar(84), `keputusan_temuduga` varchar(100), `nama_tukar_kursus` varchar(250), `tukar_kursus` int(10), `id_negeri` int(11), `id_giatmara` int(10), `id_kursus` int(10), `id_kewarganegaraan` int(10), `id_intake` int(10), `id_permohonan_kursus` int(10));


DROP VIEW IF EXISTS `v_kurikulum_p1_screen2_detail`;
CREATE TABLE `v_kurikulum_p1_screen2_detail` (`nama_penuh` varchar(250), `no_mykad` varchar(20), `no_pelatih` varchar(20), `tarikh_hantar_pengajar` datetime, `pb_teori` float(5,2), `pb_amali` float(5,2), `pam_teori` float(5,2), `pam_amali` float(5,2), `markah` float(5,2), `gred_keterampilan` varchar(10), `gredpoin_keterampilan` varchar(10), `poin_keterampilan` float(5,2), `tahap_keterampilan` varchar(50), `status_penghantaran` varchar(18), `id_kursus` int(10), `id_ref_kursus` int(10), `id_giatmara` int(10), `id_intake` int(10), `id_modul` int(11), `kod_modul` varchar(10), `id_pelatih` int(10), `jenis_pelatih` varchar(10), `id_markah_modul` int(10));


DROP VIEW IF EXISTS `v_kurikulum_p1_screen2_header`;
CREATE TABLE `v_kurikulum_p1_screen2_header` (`nama_kursus` varchar(250), `kod_kursus` varchar(10), `kod_modul` varchar(10), `nama_modul` varchar(255), `jam_kredit` int(1), `jumlah_pelatih` bigint(21), `belum_isi` decimal(23,0), `telah_disimpan` decimal(23,0), `hantar_ke_pengurus` decimal(23,0), `dikembalikan` decimal(23,0), `id_kursus` int(10), `id_modul` int(11), `id_giatmara` int(10));


DROP VIEW IF EXISTS `v_kurikulum_p1_screen4_detail`;
CREATE TABLE `v_kurikulum_p1_screen4_detail` (`nama_penuh` varchar(250), `no_mykad` varchar(20), `no_pelatih` varchar(20), `tarikh_hantar_pengajar` datetime, `gcpa` float(3,2), `kokurikulum` int(2), `literasi_komputer` int(2), `keusahawanan` int(2), `puji` int(2), `kehadiran` int(3), `latihan_industri` int(2), `status_penghantaran` varchar(18), `id_kursus` int(10), `id_ref_kursus` int(10), `id_giatmara` int(10), `id_intake` int(10), `id_modul` int(11), `kod_modul` varchar(10), `id_pelatih` int(10), `jenis_pelatih` varchar(10), `id_markah_modul_2` int(10));


DROP VIEW IF EXISTS `v_kurikulum_p1_screen4_header`;
CREATE TABLE `v_kurikulum_p1_screen4_header` (`nama_kursus` varchar(250), `kod_kursus` varchar(10), `kod_modul` varchar(10), `nama_modul` varchar(255), `jam_kredit` int(1), `jumlah_pelatih` bigint(21), `belum_isi` decimal(23,0), `telah_disimpan` decimal(23,0), `hantar_ke_pengurus` decimal(23,0), `dikembalikan` decimal(23,0), `id_kursus` int(10), `id_modul` int(11), `id_giatmara` int(10));


DROP VIEW IF EXISTS `v_kurikulum_p3_screen4_detail`;
CREATE TABLE `v_kurikulum_p3_screen4_detail` (`nama_penuh` varchar(250), `no_mykad` varchar(20), `no_pelatih` varchar(20), `tarikh_hantar_pengajar` datetime, `pb_teori` float(5,2), `pb_amali` float(5,2), `pam_teori` float(5,2), `pam_amali` float(5,2), `markah` float(5,2), `gred_keterampilan` varchar(10), `gredpoin_keterampilan` varchar(10), `poin_keterampilan` float(5,2), `tahap_keterampilan` varchar(50), `status_penghantaran` varchar(18));


DROP VIEW IF EXISTS `v_kurikulum_p3_screen4_header`;
CREATE TABLE `v_kurikulum_p3_screen4_header` (`nama_kursus` varchar(250), `kod_kursus` varchar(10), `kod_modul` varchar(10), `nama_modul` varchar(255), `jam_kredit` int(1), `jenis_pelatih` varchar(10), `id_kursus` int(3), `id_modul` int(11));


DROP VIEW IF EXISTS `v_pelatihan_p5_screen1`;
CREATE TABLE `v_pelatihan_p5_screen1` (`nama` varchar(250), `no_mykad` varchar(20), `tarikh_tawaran` date, `sesi` varchar(100), `kelayakan_elaun` int(2), `nama_bank` varchar(250), `no_akaun` varchar(100), `cara_bayar` varchar(100), `tindakan` int(11), `id_negeri` int(10), `nama_negeri` varchar(30), `id_giatmara` int(10), `nama_giatmara` varchar(60), `id_intake` int(10), `id_kursus` int(10), `nama_kursus` varchar(250), `id_temuduga_tetapan` int(10), `id_permohonan_butir_peribadi` int(10), `id_permohonan_kursus` int(10), `id_setting_tawaran_kursus` int(10));


DROP VIEW IF EXISTS `v_pelatihan_p5_screen3`;
CREATE TABLE `v_pelatihan_p5_screen3` (`nama` varchar(250), `no_mykad` varchar(20), `tarikh_tawaran` date, `sesi` varchar(100), `kelayakan_elaun` int(2), `nama_bank` varchar(250), `no_akaun` varchar(100), `cara_bayar` varchar(100), `tindakan` int(11), `id_negeri` int(10), `nama_negeri` varchar(30), `id_giatmara` int(10), `nama_giatmara` varchar(60), `id_intake` int(10), `id_kursus` int(10), `nama_kursus` varchar(250), `id_temuduga_tetapan` int(10), `id_permohonan_butir_peribadi` int(10), `id_permohonan_kursus` int(10), `id_setting_tawaran_kursus` int(10));


DROP VIEW IF EXISTS `v_pelatihan_p5_screen5`;
CREATE TABLE `v_pelatihan_p5_screen5` (`nama` varchar(250), `no_mykad` varchar(20), `tarikh_tawaran` date, `sesi` varchar(100), `kelayakan_elaun` int(2), `nama_bank` varchar(250), `no_akaun` varchar(100), `cara_bayar` varchar(100), `tindakan` int(11), `id_negeri` int(10), `nama_negeri` varchar(30), `id_giatmara` int(10), `nama_giatmara` varchar(60), `id_intake` int(10), `id_kursus` int(10), `nama_kursus` varchar(250), `id_temuduga_tetapan` int(10), `id_permohonan_butir_peribadi` int(10), `id_permohonan_kursus` int(10), `id_setting_tawaran_kursus` int(10));


DROP VIEW IF EXISTS `v_pelatihan_p5_screen6`;
CREATE TABLE `v_pelatihan_p5_screen6` (`nama` varchar(250), `no_mykad` varchar(20), `tarikh_tawaran` date, `sesi` varchar(100), `kelayakan_elaun` int(2), `nama_bank` varchar(250), `no_akaun` varchar(100), `cara_bayar` varchar(100), `tindakan` int(11), `id_negeri` int(10), `nama_negeri` varchar(30), `id_giatmara` int(10), `nama_giatmara` varchar(60), `id_intake` int(10), `id_kursus` int(10), `nama_kursus` varchar(250), `id_temuduga_tetapan` int(10), `id_permohonan_butir_peribadi` int(10), `id_permohonan_kursus` int(10), `id_setting_tawaran_kursus` int(10));


DROP VIEW IF EXISTS `v_tetapan_temuduga`;
CREATE TABLE `v_tetapan_temuduga` (`id_settings_tawaran_kursus` int(10), `nama_negeri` varchar(30), `nama_giatmara` varchar(60), `nama_kursus` varchar(250), `kewarganegaraan` varchar(100), `nama_intake` varchar(100), `nama_penuh` varchar(250), `no_mykad` varchar(20), `pilihan` int(1), `tarikh_hantar` datetime, `no_hp` varchar(50), `id_negeri` int(11), `id_giatmara` int(10), `id_kursus` int(10), `id_kewarganegaraan` int(10), `id_intake` int(10), `id_permohonan_kursus` int(10), `id_permohonan_butir_peribadi` int(10), `tarikh_mohon` varchar(72));


DROP TABLE IF EXISTS `v_cetakan_surat_temuduga`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_cetakan_surat_temuduga` AS select `settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`ref_intake`.`nama_intake` AS `nama_intake`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`permohonan_butir_peribadi`.`no_hp` AS `no_hp`,`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`temuduga_tetapan`.`tempat` AS `tempat_temuduga`,`staff`.`nama` AS `pegawai_dihubungi`,`temuduga_tetapan`.`tarikh_cetak` AS `tarikh_cetakan`,`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`permohonan_kursus`.`id` AS `id_permohonan_kursus` from ((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_poskod_bandar_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) left join `temuduga_tetapan` on(((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`) and (`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`)))) left join `staff` on((`staff`.`id` = `temuduga_tetapan`.`pegawai`)));

DROP TABLE IF EXISTS `v_gagal_temuduga`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gagal_temuduga` AS select `settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`ref_intake`.`nama_intake` AS `nama_intake`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`ref_keputusan_temuduga`.`keputusan_temuduga` AS `keputusan_temuduga`,`settings_tawaran_kursus`.`id_kursus` AS `tukar_kursus`,`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`permohonan_kursus`.`id` AS `id_permohonan_kursus` from ((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_poskod_bandar_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `temuduga_tetapan` on(((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`) and (`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`)))) join `ref_keputusan_temuduga` on((`ref_keputusan_temuduga`.`id` = `temuduga_tetapan`.`keputusan_temuduga`))) where (`temuduga_tetapan`.`keputusan_temuduga` in (4,5));

DROP TABLE IF EXISTS `v_giatmara_kursus`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_giatmara_kursus` AS select `ref_kluster`.`nama_kluster` AS `nama_kluster`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`kod_giatmara` AS `kod_giatmara`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_intake`.`kod_intake` AS `kod_intake`,`ref_intake`.`nama_intake` AS `nama_intake`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`ref_kursus`.`id_kluster` AS `id_kluster`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`settings_tawaran_kursus`.`id` AS `id_setting_penawaran_kursus`,`settings_tawaran_kursus`.`status` AS `status` from (((((`ref_giatmara` join `settings_tawaran_kursus` on((`ref_giatmara`.`id` = `settings_tawaran_kursus`.`id_giatmara`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_negeri` on((`ref_negeri`.`id` = `ref_giatmara`.`id_negeri`))) join `ref_kluster` on((`ref_kluster`.`id` = `ref_kursus`.`id_kluster`)));

DROP TABLE IF EXISTS `v_keputusan_temuduga`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_keputusan_temuduga` AS select `settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`ref_intake`.`nama_intake` AS `nama_intake`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`temuduga_tetapan`.`tarikh_waktu` AS `tarikh_waktu`,date_format(`temuduga_tetapan`.`tarikh_waktu`,'%d %M %Y %r') AS `tarikh_temuduga`,`ref_keputusan_temuduga`.`keputusan_temuduga` AS `keputusan_temuduga`,`t1`.`nama_kursus` AS `nama_tukar_kursus`,`temuduga_tetapan`.`tukar_kursus` AS `tukar_kursus`,`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`permohonan_kursus`.`id` AS `id_permohonan_kursus` from ((((((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_poskod_bandar_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `temuduga_tetapan` on(((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`) and (`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`)))) join `ref_keputusan_temuduga` on((`ref_keputusan_temuduga`.`id` = `temuduga_tetapan`.`keputusan_temuduga`))) join `settings_tawaran_kursus` `t0` on((`t0`.`id` = `temuduga_tetapan`.`tukar_kursus`))) join `ref_kursus` `t1` on((`t1`.`id` = `t0`.`id_kursus`))) where (`temuduga_tetapan`.`keputusan_temuduga` = 1);

DROP TABLE IF EXISTS `v_kurikulum_p1_screen2_detail`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_kurikulum_p1_screen2_detail` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_mykad` AS `no_pelatih`,`markah_modul`.`tarikh_hantar_pengajar` AS `tarikh_hantar_pengajar`,`markah_modul`.`pb_teori` AS `pb_teori`,`markah_modul`.`pb_amali` AS `pb_amali`,`markah_modul`.`pam_teori` AS `pam_teori`,`markah_modul`.`pam_amali` AS `pam_amali`,`markah_modul`.`markah` AS `markah`,`ref_keterampilan`.`gred_keterampilan` AS `gred_keterampilan`,`ref_keterampilan`.`gredpoin_keterampilan` AS `gredpoin_keterampilan`,`ref_keterampilan`.`poin_keterampilan` AS `poin_keterampilan`,`ref_keterampilan`.`tahap_keterampilan` AS `tahap_keterampilan`,(case when (`markah_modul`.`status_isi_markah` = 0) then 'Belum Isi' when (`markah_modul`.`status_isi_markah` = 1) then 'Telah Disimpan' when (`markah_modul`.`status_isi_markah` = 2) then 'Hantar Ke Pengurus' when (`markah_modul`.`status_isi_markah` = 3) then 'Dikembalikan' end) AS `status_penghantaran`,`settings_tawaran_kursus`.`id` AS `id_kursus`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_modul`.`id_modul` AS `id_modul`,`ref_modul`.`kod_modul` AS `kod_modul`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,`markah_modul`.`id` AS `id_markah_modul` from ((((((`permohonan_butir_peribadi` left join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) left join `pelatih` on((`permohonan_kursus`.`id` = `pelatih`.`id_permohonan`))) left join `settings_tawaran_kursus` on((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`))) left join `markah_modul` on((`pelatih`.`id_pelatih` = `markah_modul`.`id_pelatih`))) left join `ref_keterampilan` on(((`markah_modul`.`markah` >= `ref_keterampilan`.`markah_min`) and (`markah_modul`.`markah` <= `ref_keterampilan`.`markah_max`)))) left join `ref_modul` on((`ref_modul`.`id_kursus` = `settings_tawaran_kursus`.`id_kursus`)));

DROP TABLE IF EXISTS `v_kurikulum_p1_screen2_header`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_kurikulum_p1_screen2_header` AS select `ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_modul`.`kod_modul` AS `kod_modul`,`ref_modul`.`nama_modul` AS `nama_modul`,`ref_modul`.`jam_kredit` AS `jam_kredit`,count(`pelatih`.`id_pelatih`) AS `jumlah_pelatih`,sum((case when (`markah_modul`.`status_isi_markah` = 0) then 1 else 0 end)) AS `belum_isi`,sum((case when (`markah_modul`.`status_isi_markah` = 1) then 1 else 0 end)) AS `telah_disimpan`,sum((case when (`markah_modul`.`status_isi_markah` = 2) then 1 else 0 end)) AS `hantar_ke_pengurus`,sum((case when (`markah_modul`.`status_isi_markah` = 3) then 1 else 0 end)) AS `dikembalikan`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`ref_modul`.`id_modul` AS `id_modul`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara` from ((((`settings_tawaran_kursus` join `pelatih` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`settings_tawaran_kursus`.`id_giatmara` = `pelatih`.`id_giatmara`)))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_modul` on((`settings_tawaran_kursus`.`id_kursus` = `ref_modul`.`id_kursus`))) left join `markah_modul` on(((`markah_modul`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`settings_tawaran_kursus`.`id` = `markah_modul`.`id_kursus`) and (`ref_modul`.`id_modul` = `markah_modul`.`id_modul`)))) group by `settings_tawaran_kursus`.`id_kursus`,`settings_tawaran_kursus`.`id_giatmara`,`ref_kursus`.`nama_kursus`,`ref_kursus`.`kod_kursus`,`ref_modul`.`kod_modul`,`ref_modul`.`nama_modul`,`ref_modul`.`jam_kredit`,`ref_modul`.`id_modul`;

DROP TABLE IF EXISTS `v_kurikulum_p1_screen4_detail`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_kurikulum_p1_screen4_detail` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_mykad` AS `no_pelatih`,`markah_modul_2`.`tarikh_hantar_pengajar` AS `tarikh_hantar_pengajar`,`markah_modul_2`.`gcpa` AS `gcpa`,`markah_modul_2`.`kokurikulum` AS `kokurikulum`,`markah_modul_2`.`literasi_komputer` AS `literasi_komputer`,`markah_modul_2`.`keusahawanan` AS `keusahawanan`,`markah_modul_2`.`puji` AS `puji`,`markah_modul_2`.`kehadiran` AS `kehadiran`,`markah_modul_2`.`latihan_industri` AS `latihan_industri`,(case when (`markah_modul_2`.`status_isi_markah` = 0) then 'Belum Isi' when (`markah_modul_2`.`status_isi_markah` = 1) then 'Telah Disimpan' when (`markah_modul_2`.`status_isi_markah` = 2) then 'Hantar Ke Pengurus' when (`markah_modul_2`.`status_isi_markah` = 3) then 'Dikembalikan' end) AS `status_penghantaran`,`settings_tawaran_kursus`.`id` AS `id_kursus`,`settings_tawaran_kursus`.`id_kursus` AS `id_ref_kursus`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`ref_modul`.`id_modul` AS `id_modul`,`ref_modul`.`kod_modul` AS `kod_modul`,`pelatih`.`id_pelatih` AS `id_pelatih`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,`markah_modul_2`.`id` AS `id_markah_modul_2` from (((((`permohonan_butir_peribadi` left join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) left join `pelatih` on((`permohonan_kursus`.`id` = `pelatih`.`id_permohonan`))) left join `settings_tawaran_kursus` on((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`))) left join `markah_modul_2` on((`pelatih`.`id_pelatih` = `markah_modul_2`.`id_pelatih`))) left join `ref_modul` on((`ref_modul`.`id_kursus` = `settings_tawaran_kursus`.`id_kursus`)));

DROP TABLE IF EXISTS `v_kurikulum_p1_screen4_header`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_kurikulum_p1_screen4_header` AS select `ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_modul`.`kod_modul` AS `kod_modul`,`ref_modul`.`nama_modul` AS `nama_modul`,`ref_modul`.`jam_kredit` AS `jam_kredit`,count(`pelatih`.`id_pelatih`) AS `jumlah_pelatih`,sum((case when (`markah_modul_2`.`status_isi_markah` = 0) then 1 else 0 end)) AS `belum_isi`,sum((case when (`markah_modul_2`.`status_isi_markah` = 1) then 1 else 0 end)) AS `telah_disimpan`,sum((case when (`markah_modul_2`.`status_isi_markah` = 2) then 1 else 0 end)) AS `hantar_ke_pengurus`,sum((case when (`markah_modul_2`.`status_isi_markah` = 3) then 1 else 0 end)) AS `dikembalikan`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`ref_modul`.`id_modul` AS `id_modul`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara` from ((((`settings_tawaran_kursus` join `pelatih` on(((`pelatih`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`settings_tawaran_kursus`.`id_giatmara` = `pelatih`.`id_giatmara`)))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_modul` on((`settings_tawaran_kursus`.`id_kursus` = `ref_modul`.`id_kursus`))) left join `markah_modul_2` on(((`markah_modul_2`.`id_pelatih` = `pelatih`.`id_pelatih`) and (`settings_tawaran_kursus`.`id` = `markah_modul_2`.`id_kursus`)))) group by `settings_tawaran_kursus`.`id_kursus`,`settings_tawaran_kursus`.`id_giatmara`,`ref_kursus`.`nama_kursus`,`ref_kursus`.`kod_kursus`,`ref_modul`.`kod_modul`,`ref_modul`.`nama_modul`,`ref_modul`.`jam_kredit`,`ref_modul`.`id_modul`;

DROP TABLE IF EXISTS `v_kurikulum_p3_screen4_detail`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_kurikulum_p3_screen4_detail` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`pelatih`.`no_mykad` AS `no_pelatih`,`markah_modul`.`tarikh_hantar_pengajar` AS `tarikh_hantar_pengajar`,`markah_modul`.`pb_teori` AS `pb_teori`,`markah_modul`.`pb_amali` AS `pb_amali`,`markah_modul`.`pam_teori` AS `pam_teori`,`markah_modul`.`pam_amali` AS `pam_amali`,`markah_modul`.`markah` AS `markah`,`ref_keterampilan`.`gred_keterampilan` AS `gred_keterampilan`,`ref_keterampilan`.`gredpoin_keterampilan` AS `gredpoin_keterampilan`,`ref_keterampilan`.`poin_keterampilan` AS `poin_keterampilan`,`ref_keterampilan`.`tahap_keterampilan` AS `tahap_keterampilan`,(case when (`markah_modul`.`status_isi_markah` = 0) then 'Belum Isi' when (`markah_modul`.`status_isi_markah` = 1) then 'Telah Disimpan' when (`markah_modul`.`status_isi_markah` = 2) then 'Hantar ke Pengurus' when (`markah_modul`.`status_isi_markah` = 3) then 'Dikembalikan' end) AS `status_penghantaran` from (((`permohonan_butir_peribadi` left join `pelatih` on((`permohonan_butir_peribadi`.`id` = `pelatih`.`id_permohonan`))) left join `markah_modul` on((`pelatih`.`id_kursus` = `markah_modul`.`id_kursus`))) left join `ref_keterampilan` on((`markah_modul`.`markah` between `ref_keterampilan`.`markah_min` and `ref_keterampilan`.`markah_max`)));

DROP TABLE IF EXISTS `v_kurikulum_p3_screen4_header`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_kurikulum_p3_screen4_header` AS select `ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kursus`.`kod_kursus` AS `kod_kursus`,`ref_modul`.`kod_modul` AS `kod_modul`,`ref_modul`.`nama_modul` AS `nama_modul`,`ref_modul`.`jam_kredit` AS `jam_kredit`,`pelatih`.`jenis_pelatih` AS `jenis_pelatih`,`ref_modul`.`id_kursus` AS `id_kursus`,`ref_modul`.`id_modul` AS `id_modul` from (((`ref_modul` join `ref_kursus` on((`ref_modul`.`id_kursus` = `ref_kursus`.`id`))) left join `pelatih` on((`ref_modul`.`id_kursus` = `pelatih`.`id_kursus`))) left join `markah_modul` on((`ref_modul`.`id_modul` = `markah_modul`.`id_modul`)));

DROP TABLE IF EXISTS `v_pelatihan_p5_screen1`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pelatihan_p5_screen1` AS select `permohonan_butir_peribadi`.`nama_penuh` AS `nama`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,`temuduga_tetapan`.`tawaran_tarikh_lapordiri` AS `tarikh_tawaran`,`ref_intake`.`nama_intake` AS `sesi`,`temuduga_tetapan`.`tawaran_elaun` AS `kelayakan_elaun`,`temuduga_tetapan`.`tawaran_nama_bank` AS `nama_bank`,`temuduga_tetapan`.`tawaran_no_akaun` AS `no_akaun`,`temuduga_tetapan`.`tawaran_cara_bayaran` AS `cara_bayar`,`temuduga_tetapan`.`pendaftaran_status` AS `tindakan`,`ref_giatmara`.`id_negeri` AS `id_negeri`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`temuduga_tetapan`.`id` AS `id_temuduga_tetapan`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`settings_tawaran_kursus`.`id` AS `id_setting_tawaran_kursus` from (((((((`permohonan_butir_peribadi` join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`))) join `temuduga_tetapan` on((`temuduga_tetapan`.`id_permohonan` = `permohonan_kursus`.`id`))) join `settings_tawaran_kursus` on(((`temuduga_tetapan`.`id_kursus` = `settings_tawaran_kursus`.`id`) and (`temuduga_tetapan`.`id_giatmara` = `settings_tawaran_kursus`.`id_giatmara`)))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) where (`temuduga_tetapan`.`tawaran_status` = 1);

DROP TABLE IF EXISTS `v_pelatihan_p5_screen3`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pelatihan_p5_screen3` AS select `v_pelatihan_p5_screen1`.`nama` AS `nama`,`v_pelatihan_p5_screen1`.`no_mykad` AS `no_mykad`,`v_pelatihan_p5_screen1`.`tarikh_tawaran` AS `tarikh_tawaran`,`v_pelatihan_p5_screen1`.`sesi` AS `sesi`,`v_pelatihan_p5_screen1`.`kelayakan_elaun` AS `kelayakan_elaun`,`v_pelatihan_p5_screen1`.`nama_bank` AS `nama_bank`,`v_pelatihan_p5_screen1`.`no_akaun` AS `no_akaun`,`v_pelatihan_p5_screen1`.`cara_bayar` AS `cara_bayar`,`v_pelatihan_p5_screen1`.`tindakan` AS `tindakan`,`v_pelatihan_p5_screen1`.`id_negeri` AS `id_negeri`,`v_pelatihan_p5_screen1`.`nama_negeri` AS `nama_negeri`,`v_pelatihan_p5_screen1`.`id_giatmara` AS `id_giatmara`,`v_pelatihan_p5_screen1`.`nama_giatmara` AS `nama_giatmara`,`v_pelatihan_p5_screen1`.`id_intake` AS `id_intake`,`v_pelatihan_p5_screen1`.`id_kursus` AS `id_kursus`,`v_pelatihan_p5_screen1`.`nama_kursus` AS `nama_kursus`,`v_pelatihan_p5_screen1`.`id_temuduga_tetapan` AS `id_temuduga_tetapan`,`v_pelatihan_p5_screen1`.`id_permohonan_butir_peribadi` AS `id_permohonan_butir_peribadi`,`v_pelatihan_p5_screen1`.`id_permohonan_kursus` AS `id_permohonan_kursus`,`v_pelatihan_p5_screen1`.`id_setting_tawaran_kursus` AS `id_setting_tawaran_kursus` from `v_pelatihan_p5_screen1` where (`v_pelatihan_p5_screen1`.`tindakan` = 1);

DROP TABLE IF EXISTS `v_pelatihan_p5_screen5`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pelatihan_p5_screen5` AS select `v_pelatihan_p5_screen1`.`nama` AS `nama`,`v_pelatihan_p5_screen1`.`no_mykad` AS `no_mykad`,`v_pelatihan_p5_screen1`.`tarikh_tawaran` AS `tarikh_tawaran`,`v_pelatihan_p5_screen1`.`sesi` AS `sesi`,`v_pelatihan_p5_screen1`.`kelayakan_elaun` AS `kelayakan_elaun`,`v_pelatihan_p5_screen1`.`nama_bank` AS `nama_bank`,`v_pelatihan_p5_screen1`.`no_akaun` AS `no_akaun`,`v_pelatihan_p5_screen1`.`cara_bayar` AS `cara_bayar`,`v_pelatihan_p5_screen1`.`tindakan` AS `tindakan`,`v_pelatihan_p5_screen1`.`id_negeri` AS `id_negeri`,`v_pelatihan_p5_screen1`.`nama_negeri` AS `nama_negeri`,`v_pelatihan_p5_screen1`.`id_giatmara` AS `id_giatmara`,`v_pelatihan_p5_screen1`.`nama_giatmara` AS `nama_giatmara`,`v_pelatihan_p5_screen1`.`id_intake` AS `id_intake`,`v_pelatihan_p5_screen1`.`id_kursus` AS `id_kursus`,`v_pelatihan_p5_screen1`.`nama_kursus` AS `nama_kursus`,`v_pelatihan_p5_screen1`.`id_temuduga_tetapan` AS `id_temuduga_tetapan`,`v_pelatihan_p5_screen1`.`id_permohonan_butir_peribadi` AS `id_permohonan_butir_peribadi`,`v_pelatihan_p5_screen1`.`id_permohonan_kursus` AS `id_permohonan_kursus`,`v_pelatihan_p5_screen1`.`id_setting_tawaran_kursus` AS `id_setting_tawaran_kursus` from `v_pelatihan_p5_screen1` where (`v_pelatihan_p5_screen1`.`tindakan` = 2);

DROP TABLE IF EXISTS `v_pelatihan_p5_screen6`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pelatihan_p5_screen6` AS select `v_pelatihan_p5_screen1`.`nama` AS `nama`,`v_pelatihan_p5_screen1`.`no_mykad` AS `no_mykad`,`v_pelatihan_p5_screen1`.`tarikh_tawaran` AS `tarikh_tawaran`,`v_pelatihan_p5_screen1`.`sesi` AS `sesi`,`v_pelatihan_p5_screen1`.`kelayakan_elaun` AS `kelayakan_elaun`,`v_pelatihan_p5_screen1`.`nama_bank` AS `nama_bank`,`v_pelatihan_p5_screen1`.`no_akaun` AS `no_akaun`,`v_pelatihan_p5_screen1`.`cara_bayar` AS `cara_bayar`,`v_pelatihan_p5_screen1`.`tindakan` AS `tindakan`,`v_pelatihan_p5_screen1`.`id_negeri` AS `id_negeri`,`v_pelatihan_p5_screen1`.`nama_negeri` AS `nama_negeri`,`v_pelatihan_p5_screen1`.`id_giatmara` AS `id_giatmara`,`v_pelatihan_p5_screen1`.`nama_giatmara` AS `nama_giatmara`,`v_pelatihan_p5_screen1`.`id_intake` AS `id_intake`,`v_pelatihan_p5_screen1`.`id_kursus` AS `id_kursus`,`v_pelatihan_p5_screen1`.`nama_kursus` AS `nama_kursus`,`v_pelatihan_p5_screen1`.`id_temuduga_tetapan` AS `id_temuduga_tetapan`,`v_pelatihan_p5_screen1`.`id_permohonan_butir_peribadi` AS `id_permohonan_butir_peribadi`,`v_pelatihan_p5_screen1`.`id_permohonan_kursus` AS `id_permohonan_kursus`,`v_pelatihan_p5_screen1`.`id_setting_tawaran_kursus` AS `id_setting_tawaran_kursus` from `v_pelatihan_p5_screen1` where (`v_pelatihan_p5_screen1`.`tindakan` = 3);

DROP TABLE IF EXISTS `v_tetapan_temuduga`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_tetapan_temuduga` AS select `settings_tawaran_kursus`.`id` AS `id_settings_tawaran_kursus`,`ref_negeri`.`nama_negeri` AS `nama_negeri`,`ref_giatmara`.`nama_giatmara` AS `nama_giatmara`,`ref_kursus`.`nama_kursus` AS `nama_kursus`,`ref_kewarganegaraan`.`kewarganegaraan` AS `kewarganegaraan`,`ref_intake`.`nama_intake` AS `nama_intake`,`permohonan_butir_peribadi`.`nama_penuh` AS `nama_penuh`,`permohonan_butir_peribadi`.`no_mykad` AS `no_mykad`,(case when (`settings_tawaran_kursus`.`id` = `permohonan_kursus`.`kursus1`) then 1 when (`settings_tawaran_kursus`.`id` = `permohonan_kursus`.`kursus2`) then 2 when (`settings_tawaran_kursus`.`id` = `permohonan_kursus`.`kursus3`) then 3 end) AS `pilihan`,`permohonan_butir_peribadi`.`tarikh_hantar` AS `tarikh_hantar`,`permohonan_butir_peribadi`.`no_hp` AS `no_hp`,`ref_poskod_bandar_negeri`.`negeri` AS `id_negeri`,`settings_tawaran_kursus`.`id_giatmara` AS `id_giatmara`,`settings_tawaran_kursus`.`id_kursus` AS `id_kursus`,`permohonan_butir_peribadi`.`kewarganegaraan` AS `id_kewarganegaraan`,`settings_tawaran_kursus`.`id_intake` AS `id_intake`,`permohonan_kursus`.`id` AS `id_permohonan_kursus`,`permohonan_butir_peribadi`.`id` AS `id_permohonan_butir_peribadi`,date_format(`permohonan_butir_peribadi`.`tarikh_hantar`,'%d %M %Y') AS `tarikh_mohon` from ((((((((`settings_tawaran_kursus` join `ref_giatmara` on((`settings_tawaran_kursus`.`id_giatmara` = `ref_giatmara`.`id`))) join `ref_negeri` on((`ref_giatmara`.`id_negeri` = `ref_negeri`.`id`))) join `ref_kursus` on((`settings_tawaran_kursus`.`id_kursus` = `ref_kursus`.`id`))) join `ref_poskod_bandar_negeri` on((`ref_poskod_bandar_negeri`.`negeri` = `ref_negeri`.`id`))) join `permohonan_butir_peribadi` on((`permohonan_butir_peribadi`.`poskod` = `ref_poskod_bandar_negeri`.`id`))) join `ref_kewarganegaraan` on((`permohonan_butir_peribadi`.`kewarganegaraan` = `ref_kewarganegaraan`.`id`))) join `ref_intake` on((`settings_tawaran_kursus`.`id_intake` = `ref_intake`.`id`))) join `permohonan_kursus` on((`permohonan_kursus`.`id_permohonan` = `permohonan_butir_peribadi`.`id`)));

-- 2017-08-19 11:58:09
