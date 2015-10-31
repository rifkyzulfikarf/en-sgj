/*
SQLyog Ultimate v8.82 
MySQL - 5.6.24 : Database - ensgj
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ensgj` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ensgj`;

/*Table structure for table `akses` */

DROP TABLE IF EXISTS `akses`;

CREATE TABLE `akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemakai` int(11) DEFAULT NULL,
  `id_menu` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=latin1;

/*Data for the table `akses` */

insert  into `akses`(`id`,`id_pemakai`,`id_menu`) values (116,7,1),(117,7,2),(118,7,3),(119,7,4),(120,7,5),(121,7,6),(122,7,7),(123,7,8),(124,7,9),(125,7,10),(126,7,11),(127,7,12),(128,7,13),(129,7,14),(130,7,15),(131,7,16),(132,7,17),(133,7,18),(134,7,19),(135,7,20),(136,7,21),(264,1,1),(265,1,2),(266,1,3),(267,1,4),(268,1,5),(269,1,6),(270,1,7),(271,1,8),(272,1,9),(273,1,10),(274,1,11),(275,1,12),(276,1,13),(277,1,14),(278,1,15),(279,1,16),(280,1,17),(281,1,18),(282,1,19),(283,1,20),(284,1,21),(285,1,22),(286,1,23),(287,1,24),(288,1,25),(289,1,26),(290,1,27),(291,1,29),(292,2,1),(293,2,2),(294,2,3),(295,2,4),(296,2,5),(297,2,6),(298,2,7),(299,2,8),(300,2,9),(301,2,10),(302,2,11),(303,2,12),(304,2,13),(305,2,14),(306,2,15),(307,2,16),(308,2,17),(309,2,18),(310,2,19),(311,2,20),(312,2,21),(313,2,22),(314,2,23),(315,2,24),(316,2,25),(317,2,26),(318,2,27),(319,2,29);

/*Table structure for table `akses_menu` */

DROP TABLE IF EXISTS `akses_menu`;

CREATE TABLE `akses_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL DEFAULT '#',
  `level` varchar(1) NOT NULL,
  `induk` tinyint(4) NOT NULL DEFAULT '0',
  `icon` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `akses_menu` */

insert  into `akses_menu`(`id`,`urutan`,`nama`,`url`,`level`,`induk`,`icon`) values (1,1,'Master Data','#','1',0,'fa fa-th'),(2,1,'Bank','./modules/view/master-data/bank.php','2',1,'-'),(3,2,'Jabatan','./modules/view/master-data/jabatan.php','2',1,'-'),(4,3,'Karyawan','./modules/view/master-data/karyawan.php','2',1,'-'),(5,4,'User','./modules/view/master-data/user.php','2',1,'-'),(6,5,'Kasir','./modules/view/master-data/kasir.php','2',1,'-'),(7,6,'Kendaraan','./modules/view/master-data/kendaraan.php','2',1,'-'),(8,2,'Keuangan','#','1',0,'fa fa-dollar'),(9,1,'Kode Akun','./modules/view/keuangan/akun_kas.php','2',8,'-'),(10,2,'Kas Masuk','./modules/view/keuangan/tambah_dana_kasir.php','2',8,'-'),(11,3,'Kas Keluar','./modules/view/keuangan/pengeluaran_kas_kecil.php','2',8,'-'),(12,4,'Setoran Bank','./modules/view/keuangan/setor_bank.php','2',8,'-'),(13,5,'Tarikan Bank','./modules/view/keuangan/tarik_bank.php','2',8,'-'),(14,3,'Utility','#','1',0,'fa fa-gears'),(15,1,'Ubah Harga Tebus','./modules/view/utility/harga_beli_tabung.php','2',14,'-'),(16,2,'HET Penjualan','./modules/view/utility/het_penjualan.php','2',14,'-'),(17,3,'Stok Opname','./modules/view/utility/stok_opname.php','2',14,'-'),(18,4,'Konsumen','#','1',0,'fa fa-user'),(19,1,'Data Konsumen','./modules/view/konsumen/konsumen.php','2',18,'-'),(20,2,'Harga Jual','./modules/view/konsumen/harga_jual.php','2',18,'-'),(21,3,'Kuota Pangkalan','./modules/view/konsumen/kuota_jual.php','2',18,'-'),(22,5,'Tebus','#','1',0,'fa fa-location-arrow'),(23,1,'Tebus LPG','./modules/view/pembelian/pembelian.php','2',22,'-'),(24,2,'Loading','./modules/view/pembelian/loading.php','2',22,'-'),(25,3,'Acc Gudang','./modules/view/pembelian/acc_gudang.php','2',22,'-'),(26,6,'Penjualan','#','1',0,'fa fa-shopping-cart'),(27,1,'Penjualan','./modules/view/penjualan/penjualan.php','2',26,'-'),(29,2,'Pelunasan','./modules/view/penjualan/pelunasan.php','2',26,'-');

/*Table structure for table `akun_kas` */

DROP TABLE IF EXISTS `akun_kas`;

CREATE TABLE `akun_kas` (
  `kode` varchar(10) NOT NULL,
  `nama_akun` varchar(100) DEFAULT NULL,
  `hapus` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akun_kas` */

insert  into `akun_kas`(`kode`,`nama_akun`,`hapus`) values ('11101','Kas','0'),('11104','Kas Dollar','0'),('1121','Bank Rp','0'),('11211','Bank BCA 009-317-799-9','0'),('11212','Bank Bukopin 100-274-0181','0'),('11213','Pph 23','0'),('11214','Pph 25','0'),('11215','Ppn Masukan','0'),('1122','Bank US','0'),('113','Deposito','0'),('114','Piutang','0'),('1141','Piutang Dagang','0'),('11411','Piutang Pertamina','0'),('1142','Piutang Karyawan','0'),('1143','Piutang Lain-lain','0'),('115','Persediaan','0'),('11501','Persediaan LPG 3Kg','0'),('11502','Persediaan Tabung 3Kg','0'),('11503','Potongan Pembelian','0'),('116','Uang Muka','0'),('11601','UM Bangunan','0'),('11602','UM Mesin / Perlengkapan','0'),('11603','UM Asr. Kendaraan','0'),('11604','UM. Pembelian','0'),('11605','Sewa Dibayar Dimuka','0'),('117','Pajak Dibayar Dimuka','0'),('11701','Pph Pasal 23','0'),('11702','Pph Pasal 25','0'),('11703','Ppn Masukan','0'),('11704','Ppn Masukan Belum Faktur','0'),('118','Deposit','0'),('119','Biaya Dibayar Dimuka','0'),('11901','Premi Asuransi','0'),('121','Harga Perolehan','0'),('12101','Tanah','0'),('12102','Bangunan','0'),('12103','Mesin dan Perlengkapan','0'),('12104','Tabung Elpiji','0'),('12105','Kendaraan','0'),('12106','Instalasi Listrik','0'),('12107','Inventaris Kantor','0'),('12108','Instalasi Mesin','0'),('12109','Instalasi Tabung','0'),('12110','Sumur Bor','0'),('122','Akumulasi Penyusutan','0'),('12201','Akum Penyusutan Tanah','0'),('12202','Akum Penyusutan Bangunan','0'),('12203','Akum Penyusutan Mesin dan Perlengkapan','0'),('12204','Akum Penyusutan Tabung Elpiji','0'),('12205','Akum Penyusutan Kendaraan','0'),('12206','Akum Penyusutan Instalasi Listrik','0'),('12207','Akum Penyusutan Inventaris Kantor','0'),('12208','Akum Penyusutan Instalasi Mesin','0'),('12209','Akum Penyusutan Instalasi Tabung','0'),('12210','Akum Penyusutan Sumur Bor','0'),('12211','Akum Amortisasi Royalty Pertamina','0'),('131','Aktiva Lain - lain','0'),('13101','Bangunan Dalam Penyelesaian','0'),('13102','Biaya Pra Operasi','0'),('13103','Amortisasi Biaya Pra Operasi','0'),('13104','Biaya Ditangguhkan','0'),('13105','Amortisasi Biaya Ditangguhkan','0'),('13106','Royalty Pertamina','0'),('211','Hutang Dagang','0'),('212','Pendapatan Diterima Dimuka','0'),('213','Hutang Biaya','0'),('21301','Hutang Gaji','0'),('21302','Hutang Kendaraan','0'),('21303','Hutang Mesin dan Perlengkapan','0'),('21305','Hutang Instalasi Listrik','0'),('21306','Hutang Instalasi Tabung','0'),('21307','Hutang Bangunan','0'),('214','Hutang Pajak','0'),('21401','Pph Pasal 21','0'),('21402','Pph Pasal 25','0'),('21403','Ppn Keluaran','0'),('21404','Pph Pasal 29','0'),('221','Hutang Bank','0'),('22101','Hutang Bank BCA','0'),('22102','Hutang Bank Bukopin','0'),('231','Hutang Lain-lain','0'),('23101','Hutang Pemegang Saham','0'),('3','Modal dan Ekuitas','0'),('31000','Modal','0'),('32000','Laba (Rugi) Ditahan','0'),('33000','Laba (rugi) periode berjalan','0'),('4','Pendapatan','0'),('41000','Pendapatan LPG 3kg','0'),('42000','Pendapatan Tbung 3kg','0'),('43000','Pendapatan Transport Fee','0'),('5','Harga Pokok','0'),('51000','HPP LPG 3KG','0'),('52000','HPP Tabung 3kg','0'),('6','Biaya Operasi','0'),('600','Biaya langsung','0'),('60001','Transportasi','0'),('60002','Segel','0'),('700','Biaya Tenaga kerja','0'),('70001','Gaji','0'),('70002','THR/ GRATIFIKASI/BONUS','0'),('70003','Trasnprt/UM','0'),('70004','Lembur','0'),('70005','Jamsostek','0'),('70006','Gaji tenaga harian','0'),('70007','THR/ Gratifikasi/Bonus Tenga harian','0'),('70008','trasnport/ UM tenaga H','0'),('70009','Lembur Tenga H','0'),('70010','Insentif/Komisi Penjualan','0'),('70011','Pengobatan','0'),('8','Biaya Umum dan Administrasi','0'),('80001','Perijinan','0'),('80002','Telepon','0'),('80003','Listrik','0'),('80004','Air','0'),('80005','Perjalanan Dinas','0'),('80006','Promosi','0'),('80007','Jamuan Tamu','0'),('80008','Pendidikan','0'),('80009','Bahan Bakar Kendaraan','0'),('80010','Bahan Bakar Genset','0'),('80011','Alat Tulis Kantor','0'),('80012','Operasional Kantor','0'),('80013','Pengiriman dan Materai','0'),('80014','Majalah dan Koran','0'),('80015','Iuran','0'),('80016','Cetakan dan Fotokopy','0'),('80017','Parkir dan Tol','0'),('80018','Administrasi Bank','0'),('80019','PBB','0'),('80020','Pph Pasal 21','0'),('80021','Pajak','0'),('80022','Asuransi Tanah / Bangunan','0'),('80023','asuransi Mesin / Perlengkapan','0'),('80024','Asuransi Kendaraan','0'),('80025','Pemeliharaan Bangunan','0'),('80026','Pemeliharaan Mesin / Perlengkapan','0'),('80027','Pemeliharaan Kendaraan','0'),('80028','Pemeliharaan Inventaris Kantor','0'),('80029','Peny. Bangunan','0'),('80030','Peny. Mesin dan Perlengkapan','0'),('80031','Peny. Kendaraan','0'),('80032','Peny. Instalasi Listrik','0'),('80033','Peny. Inventaris Kantor','0'),('80034','Amortisasi Biaya Pra Operasi','0'),('80035','Amortisasi Biaya Ditangguhkan','0'),('80036','Sumbangan','0'),('80037','Seragam dan Pelengkap','0'),('80038','Lain - lain','0'),('80039','Sewa Ruangan','0'),('80040','Asuransi Pengiriman','0'),('80041','Audit KAP','0'),('80042','Sewa Mobil','0'),('80043','Software','0'),('80044','Pajak Kendaraan','0'),('80045','Bunga Bank','0'),('9','Pendapatan (Biaya) Diluar Operasi','0'),('910','Pendapatan Diluar Operasi','0'),('91001','Jasa Giro','0'),('91002','Pendapatan Bunga Deposito','0'),('91003','Keuntungan Selisih Kurs','0'),('91004','Keuntungan Penjualan Aktiva','0'),('91005','Pembulatan','0'),('91006','Pendapatan Lain - lain','0'),('920','Biaya Diluar Operasi','0'),('92001','Pajak Jasa Giro','0'),('92002','Pajak Bunga Bank','0'),('92003','Kerugian selisih kurs','0'),('92004','Kerugian Penjualan Aktiva','0'),('92005','Pembulatan','0'),('92006','Biaya Lain - lain','0'),('92007','Biaya Admin Bank','0'),('SA','Saldo Awal','0');

/*Table structure for table `bank` */

DROP TABLE IF EXISTS `bank`;

CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `nomor_rekening` varchar(30) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `hapus` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bank` */

insert  into `bank`(`id`,`nama`,`nomor_rekening`,`saldo`,`hapus`) values (1,'BCA Energas Nusantara','0093177999',1680256991.2,'0'),(2,'BCA Sumber Gasindo Jaya','0095072858',2050600768.67,'0');

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `stok_isi` double DEFAULT NULL,
  `stok_kosong` double DEFAULT NULL,
  `het` double DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id`,`nama`,`stok_isi`,`stok_kosong`,`het`,`harga_beli`) values (1,'LPG 3Kg',1360,640,14250,11590.91),(2,'LPG 12Kg',0,0,100000,100000),(3,'LPG 50Kg',0,0,200000,200000),(4,'LPG Bright Gas',0,0,150000,150000);

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `hapus` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`id`,`nama`,`id_level`,`jk`,`hapus`) values (1,'Rifky Zulfikar',1,'L','0'),(2,'Michael Sandjaja',2,'L','0'),(3,'Harjito',3,'L','0'),(4,'Samidi',3,'L','0'),(5,'Novi',4,'P','0'),(6,'Yulius',4,'L','0'),(7,'Ronny',5,'L','0'),(8,'Muthosin',6,'L','0'),(9,'Yulia',4,'P','0'),(10,'Husen',6,'L','0'),(11,'Sapari',6,'L','0'),(12,'Casmari',3,'L','0'),(13,'Daniel',2,'L','0');

/*Table structure for table `kas_bank` */

DROP TABLE IF EXISTS `kas_bank`;

CREATE TABLE `kas_bank` (
  `id` varchar(13) NOT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `no_bukti` varchar(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` text,
  `setor` double DEFAULT NULL,
  `tarik` double DEFAULT NULL,
  `bea_admin` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jenis` varchar(1) DEFAULT '1' COMMENT '1=tunai,2=trf,3cek/bg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kas_bank` */

insert  into `kas_bank`(`id`,`id_bank`,`no_bukti`,`tgl`,`keterangan`,`setor`,`tarik`,`bea_admin`,`saldo`,`id_karyawan`,`tgl_input`,`jenis`) values ('EKB1510270001',1,'ew','2015-10-27','tes',1682793510.45,0,0,1682793510.45,1,'2015-10-27 00:11:53','1'),('EKB1510270002',2,'grbfg','2015-10-27','cvvf',2050600768.67,0,0,2050600768.67,1,'2015-10-27 00:14:08','1'),('EKB1510270003',1,'sd','2015-10-27','sdc',0,500000.25,1000,1682292510.2,1,'2015-10-27 00:16:50','1'),('EKB1510290001',1,'jsdhdsf874','2015-10-29','Pembelian EPB1510290001',0,4173019,0,1678119491.2,1,'2015-10-29 09:39:17','2'),('EKB1510310001',1,'037467','2015-10-31','Penjualan EPJ1510310001',2137500,0,0,1680256991.2,1,'2015-10-31 09:07:36','1');

/*Table structure for table `kas_kecil` */

DROP TABLE IF EXISTS `kas_kecil`;

CREATE TABLE `kas_kecil` (
  `id` varchar(13) NOT NULL,
  `id_kasir` int(11) DEFAULT NULL,
  `no_bukti` varchar(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` text,
  `kode_akun` varchar(10) DEFAULT NULL,
  `debet` double DEFAULT NULL,
  `kredit` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kas_kecil_id_kas` (`id_kasir`),
  KEY `FK_kas_kecil_kode_akun` (`kode_akun`),
  KEY `FK_kas_kecil_id_karyawan` (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kas_kecil` */

insert  into `kas_kecil`(`id`,`id_kasir`,`no_bukti`,`tgl`,`keterangan`,`kode_akun`,`debet`,`kredit`,`saldo`,`id_karyawan`) values ('EKK1510260001',1,'-','2015-10-26','tes','SA',5000000,0,5000000,1),('EKK1510260002',2,'-','2015-10-26','tes','SA',2000000,0,2000000,1),('EKK1510270001',1,'ek1','2015-10-27','tes','21301',0,500000,4500000,1),('EKK1510270002',2,'ek2','2015-10-27','tes','13106',0,1500000,500000,1);

/*Table structure for table `kasir` */

DROP TABLE IF EXISTS `kasir`;

CREATE TABLE `kasir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `hapus` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kasir` */

insert  into `kasir`(`id`,`nama`,`saldo`,`hapus`) values (1,'Kasir Energas Nusantara',4500000,'0'),(2,'Kasir Sumber Gasindo Jaya',500000,'0');

/*Table structure for table `kendaraan` */

DROP TABLE IF EXISTS `kendaraan`;

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` varchar(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `hapus` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kendaraan` */

insert  into `kendaraan`(`id`,`nopol`,`keterangan`,`hapus`) values (1,'H 1479 ZH','Engkel','0'),(2,'H 1496 YH','Double','0');

/*Table structure for table `konsumen` */

DROP TABLE IF EXISTS `konsumen`;

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `harga_3kg` double DEFAULT '0',
  `harga_12kg` double DEFAULT '0',
  `harga_12kg_bg` double DEFAULT '0',
  `harga_50kg` double DEFAULT '0',
  `hapus` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `konsumen` */

insert  into `konsumen`(`id`,`nama`,`alamat`,`telepon`,`harga_3kg`,`harga_12kg`,`harga_12kg_bg`,`harga_50kg`,`hapus`) values (1,'Dwi Ismini','Gusti Putri III / 17, Tlogosari Kulon','02470070559',14250,120000,170000,270000,'0'),(2,'Supiyatun','Cinde Utara II / 12, Jomblang','085641699983',14250,0,0,0,'0'),(3,'Diah','Jl Permata Raya 1, Ngesrep','085228112295',14250,0,0,0,'0'),(4,'David Kusuma','Jl. Menjangan II/59 C, Palebon','085101708289',14250,0,0,0,'0'),(5,'Hery Wijaya','Jl. Zebra Raya 6, Pedurungan Kidul','085641027520',14250,0,0,0,'0'),(6,'Juki Sahara','Jl Banteng Utara I/20 Pandeanlamper','08562655393',14250,0,0,0,'0'),(7,'Daniel Chrustian','Jl. Tambak Mas XVII/420, Panggung Lor','081325615487',14250,0,0,0,'1'),(8,'Boedi Setiawan','Jl. Sekar Jagad IV/2, Tlogosari Kulon','085105000279',14250,0,0,0,'0'),(9,'Andi','0','0',14250,0,0,0,'1'),(10,'Djoelianto','Jl. Ayodyapala 61, Krobokan','0811276887',14250,0,0,0,'0'),(11,'Intan Permai','Jl. Sambiroto Raya A1, Sambiroto','0821234856762',14250,0,0,0,'0'),(12,'Saparin','Jl Sambiroto III Rt 04 / Rw 01 Sambiroto','081228462220',14250,0,0,0,'0'),(13,'Parjo Hadi','Jl Sambiroto Rt 06/Rw 01, Sambiroto','081326297575',14250,0,0,0,'0'),(14,'Evie Theresia','Jl M.T. Haryono 553, Karangkidul','08164884500',14250,0,0,0,'0'),(15,'Haryanto','Jl Delta Mas II / 156, Kuningan','082138679008',14250,0,0,0,'1'),(16,'Andi Sri Atfiantias','Jl. Bukit Flamboyan I/58D, Sendangmulyo','02470903324',14250,0,0,0,'0'),(17,'Tik','Gunung Pati','081',17000,0,0,0,'0'),(18,'Jati','Semarang','081',15000,0,0,0,'0'),(19,'Jono','Mataram','081',14250,0,0,0,'0'),(20,'Andi','Pudak Payung','081',14250,0,0,0,'0'),(21,'Erlien','Gang Pinggir','081',14250,0,0,0,'0'),(22,'tesa','tesa','tesa',14250,100000,150000,200000,'1'),(23,'tesi','tesi','tesi',0,0,0,0,'1');

/*Table structure for table `kuota_penjualan` */

DROP TABLE IF EXISTS `kuota_penjualan`;

CREATE TABLE `kuota_penjualan` (
  `id_konsumen` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jml_alokasi` double DEFAULT NULL,
  `jml_terambil` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kuota_penjualan` */

insert  into `kuota_penjualan`(`id_konsumen`,`tgl`,`jml_alokasi`,`jml_terambil`) values (1,'2015-10-27',200,0),(1,'2015-10-31',200,0);

/*Table structure for table `level` */

DROP TABLE IF EXISTS `level`;

CREATE TABLE `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) DEFAULT NULL,
  `hapus` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `level` */

insert  into `level`(`id`,`jabatan`,`hapus`) values (1,'Super','0'),(2,'Direktur','0'),(3,'Driver','0'),(4,'Admin','0'),(5,'Marketing','0'),(6,'Gudang','0');

/*Table structure for table `loading_pembelian` */

DROP TABLE IF EXISTS `loading_pembelian`;

CREATE TABLE `loading_pembelian` (
  `id_pembelian` varchar(14) DEFAULT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `tgl_loading` date DEFAULT '0000-00-00',
  `jam_berangkat` time DEFAULT '00:00:00',
  `tabung_kosong` int(11) DEFAULT '0',
  `id_karyawan_berangkat` int(11) DEFAULT NULL,
  `acc_gudang_berangkat` varchar(1) DEFAULT '0',
  `ket_gudang_berangkat` text,
  `id_gudang_berangkat` int(11) DEFAULT NULL,
  `jam_kembali` time DEFAULT '00:00:00',
  `tabung_isi` int(11) DEFAULT '0',
  `id_karyawan_kembali` int(11) DEFAULT NULL,
  `acc_gudang_kembali` varchar(1) DEFAULT '0',
  `ket_gudang_kembali` text,
  `id_gudang_kembali` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `loading_pembelian` */

insert  into `loading_pembelian`(`id_pembelian`,`id_kendaraan`,`id_driver`,`tgl_loading`,`jam_berangkat`,`tabung_kosong`,`id_karyawan_berangkat`,`acc_gudang_berangkat`,`ket_gudang_berangkat`,`id_gudang_berangkat`,`jam_kembali`,`tabung_isi`,`id_karyawan_kembali`,`acc_gudang_kembali`,`ket_gudang_kembali`,`id_gudang_kembali`) values ('EPB1510290001',1,4,'2015-10-29','08:55:45',360,1,'1','',1,'10:07:30',360,1,'1','',1);

/*Table structure for table `log_login` */

DROP TABLE IF EXISTS `log_login`;

CREATE TABLE `log_login` (
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `log_login` */

insert  into `log_login`(`tgl`,`id_user`) values ('2015-10-26 08:51:11',1),('2015-10-26 10:46:26',1),('2015-10-27 08:42:12',1),('2015-10-27 13:47:12',7),('2015-10-27 18:44:16',1),('2015-10-28 23:25:54',1),('2015-10-29 09:15:11',1),('2015-10-30 10:13:45',1),('2015-10-30 13:58:08',1),('2015-10-30 23:25:15',1);

/*Table structure for table `pelunasan` */

DROP TABLE IF EXISTS `pelunasan`;

CREATE TABLE `pelunasan` (
  `id` varchar(14) NOT NULL,
  `id_penjualan` varchar(14) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `total_bayar` double DEFAULT NULL,
  `jenis` varchar(1) DEFAULT NULL,
  `tgl_bg` date DEFAULT NULL,
  `ambil_bg` varchar(1) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `no_bukti` varchar(15) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelunasan` */

/*Table structure for table `pemakai` */

DROP TABLE IF EXISTS `pemakai`;

CREATE TABLE `pemakai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) DEFAULT NULL,
  `user` text,
  `kunci` text,
  `hapus` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `pemakai` */

insert  into `pemakai`(`id`,`id_karyawan`,`user`,`kunci`,`hapus`) values (1,1,'WWc9PQ==','WWc9PQ==','0'),(2,2,'WVdkMWJtZG9ZWEk0T0RFeQ==','TVRNMk1qVTFPREE9','0'),(3,5,'YzNWdFltVnlJR2RoYzJsdVpHOD0=','YzNWdFltVnlaMkZ6YVc1a2J6ZzQ=','0'),(4,6,'ZVhWc2FYVnpaVzVrWVhJPQ==','TVRrd056RTVPRGs9','0'),(5,8,'YlhWMGFHOXphVzQ9','WjNWa1lXNW4=','0'),(6,9,'ZVhWc2FXRT0=','TVRJek5EVT0=','0'),(7,13,'WkdGdWFXVnNaWEJ6','ZEdobGJHVnJhVzVsZEdocFl3PT0=','0');

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id` varchar(14) NOT NULL,
  `tgl_tebus` date DEFAULT NULL,
  `no_lo` varchar(12) DEFAULT NULL,
  `no_sa` varchar(8) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jml_tabung` double DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `pajak` double DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `bea_admin` double DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `no_bukti` varchar(15) DEFAULT NULL,
  `jenis_tarikan` varchar(1) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembelian` */

insert  into `pembelian`(`id`,`tgl_tebus`,`no_lo`,`no_sa`,`id_barang`,`jml_tabung`,`harga_satuan`,`pajak`,`diskon`,`bea_admin`,`grand_total`,`id_bank`,`no_bukti`,`jenis_tarikan`,`id_karyawan`) values ('EPB1510290001','2015-10-29','764373222','345733',1,360,11590.91,417273,419481,2500,4173019,1,'jsdhdsf8745','2',1);

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id` varchar(14) NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jml` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `het` double DEFAULT NULL,
  `total_jual` double DEFAULT NULL,
  `total_het` double DEFAULT NULL,
  `total_bayar` double DEFAULT NULL,
  `jenis` varchar(1) DEFAULT NULL,
  `tgl_tempo` date DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `no_bukti` varchar(10) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

insert  into `penjualan`(`id`,`tgl`,`id_konsumen`,`id_barang`,`jml`,`harga_jual`,`het`,`total_jual`,`total_het`,`total_bayar`,`jenis`,`tgl_tempo`,`id_bank`,`no_bukti`,`id_sales`,`id_karyawan`) values ('EPJ1510310001','2015-10-31',1,1,150,14250,14250,2137500,2137500,2137500,'1','0000-00-00',1,'037467',2,1),('EPJ1510310002','2015-10-31',1,2,15,120000,100000,1800000,1800000,0,'4','2015-11-10',0,'-',1,1);

/*Table structure for table `penjualan_acc_gudang` */

DROP TABLE IF EXISTS `penjualan_acc_gudang`;

CREATE TABLE `penjualan_acc_gudang` (
  `id_penjualan` varchar(14) DEFAULT NULL,
  `acc_gudang` varchar(1) DEFAULT NULL,
  `id_gudang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penjualan_acc_gudang` */

/*Table structure for table `stok_opname` */

DROP TABLE IF EXISTS `stok_opname`;

CREATE TABLE `stok_opname` (
  `tgl` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `stok_isi_lama` double DEFAULT NULL,
  `stok_isi_baru` double DEFAULT NULL,
  `stok_kosong_lama` double DEFAULT NULL,
  `stok_kosong_baru` double DEFAULT NULL,
  `keterangan` text,
  `id_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stok_opname` */

insert  into `stok_opname`(`tgl`,`id_barang`,`stok_isi_lama`,`stok_isi_baru`,`stok_kosong_lama`,`stok_kosong_baru`,`keterangan`,`id_karyawan`) values ('2015-10-29',1,0,1000,0,1000,'tes',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
