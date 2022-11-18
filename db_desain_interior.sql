DROP TABLE IF EXISTS `tb_bahan_baku`;

CREATE TABLE `tb_bahan_baku` (
  `bahan_baku_id` int(11) NOT NULL AUTO_INCREMENT,
  `bahan_baku_nama` varchar(255) DEFAULT NULL,
  `bahan_baku_supplier` int(11) DEFAULT NULL,
  `bahan_baku_satuan` varchar(255) DEFAULT NULL,
  `bahan_baku_stok` int(11) DEFAULT NULL,
  `bahan_baku_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`bahan_baku_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_bahan_baku` */

insert  into `tb_bahan_baku`(`bahan_baku_id`,`bahan_baku_nama`,`bahan_baku_supplier`,`bahan_baku_satuan`,`bahan_baku_stok`,`bahan_baku_harga`) values 
(1,'Rujak',1,'Meter',92,80000),
(2,'Sate',3,'Meter',8,10000);

/*Table structure for table `tb_detail_interior` */

DROP TABLE IF EXISTS `tb_detail_interior`;

CREATE TABLE `tb_detail_interior` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_interior_kode` char(10) DEFAULT NULL,
  `detail_bahan_baku` int(11) DEFAULT NULL,
  `detail_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_detail_interior` */

insert  into `tb_detail_interior`(`detail_id`,`detail_interior_kode`,`detail_bahan_baku`,`detail_qty`) values 
(2,'INTR-61058',1,2),
(3,'INTR-47593',1,2),
(4,'INTR-24906',1,1);

/*Table structure for table `tb_detail_pembelian` */

DROP TABLE IF EXISTS `tb_detail_pembelian`;

CREATE TABLE `tb_detail_pembelian` (
  `detail_pembelian_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_pembelian_faktur` char(20) DEFAULT NULL,
  `detail_pembelian_bahan_baku` int(11) DEFAULT NULL,
  `detail_pembelian_qty` int(11) DEFAULT NULL,
  `detail_pembelian_jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_pembelian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_detail_pembelian` */

insert  into `tb_detail_pembelian`(`detail_pembelian_id`,`detail_pembelian_faktur`,`detail_pembelian_bahan_baku`,`detail_pembelian_qty`,`detail_pembelian_jumlah`) values 
(2,'FB-20220718-453',1,1,80000),
(3,'FB-20220718-453',2,1,10000),
(6,'FB-20220718-453',1,2,160000),
(7,'FB-20220826-100',1,2,160000),
(8,'FB-20220826-100',2,2,20000),
(10,'FB-20220908-835',1,2,160000);

/*Table structure for table `tb_detail_pemesanan` */

DROP TABLE IF EXISTS `tb_detail_pemesanan`;

CREATE TABLE `tb_detail_pemesanan` (
  `detail_pemesanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_pemesanan_faktur` char(20) DEFAULT NULL,
  `detail_pemesanan_interior` char(10) DEFAULT NULL,
  `detail_pemesanan_qty` int(11) DEFAULT NULL,
  `detail_pemesanan_jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_pemesanan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_detail_pemesanan` */

insert  into `tb_detail_pemesanan`(`detail_pemesanan_id`,`detail_pemesanan_faktur`,`detail_pemesanan_interior`,`detail_pemesanan_qty`,`detail_pemesanan_jumlah`) values 
(18,'FP-20220718-308','INTR-31153',1,60000),
(19,'FP-20220801-285','INTR-31153',1,60000),
(26,'','INTR-31153',2,120000),
(27,'','INTR-89533',1,50000),
(29,'FP-20220811-667','INTR-31153',2,120000),
(30,'FP-20220811-667','INTR-89533',1,50000),
(32,'FP-20220811-695','INTR-31153',2,120000),
(33,'FP-20220811-695','INTR-89533',1,50000),
(34,'FP-20220825-494','INTR-31153',1,60000),
(35,'FP-20220826-695','INTR-31153',1,60000),
(36,'FP-20220908-796','INTR-31153',2,120000),
(37,'FP-20220908-946','INTR-31153',4,240000),
(38,'FP-20221011-468','INTR-31153',2,120000),
(39,'FP-20221011-600','INTR-89533',2,100000);

/*Table structure for table `tb_interior` */

DROP TABLE IF EXISTS `tb_interior`;

CREATE TABLE `tb_interior` (
  `interior_kode` char(10) NOT NULL,
  `interior_nama` varchar(255) DEFAULT NULL,
  `interior_kategori` int(11) DEFAULT NULL,
  `interior_harga` int(11) DEFAULT NULL,
  `interior_stok` int(11) DEFAULT NULL,
  `interior_gambar` varchar(255) DEFAULT NULL,
  `interior_deskripsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`interior_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_interior` */

insert  into `tb_interior`(`interior_kode`,`interior_nama`,`interior_kategori`,`interior_harga`,`interior_stok`,`interior_gambar`,`interior_deskripsi`) values 
('INTR-31153','Meja',2,60000,94,'1658041730_3812874ad82fe1c3aee4.jpg','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the'),
('INTR-47593','Kursi Gaming',1,10000,100,'1662700460_d0b4d9c33384c29959f7.png','Kursi gaming mantap keren gass'),
('INTR-89533','Kursi',2,50000,98,'1658041703_14849240d92fd01fc272.jpg','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the');

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`kategori_id`,`kategori_nama`) values 
(1,'Dapur'),
(2,'Ruang Tamu');

/*Table structure for table `tb_keranjang` */

DROP TABLE IF EXISTS `tb_keranjang`;

CREATE TABLE `tb_keranjang` (
  `keranjang_id` int(11) NOT NULL AUTO_INCREMENT,
  `keranjang_pelanggan` int(11) DEFAULT NULL,
  `keranjang_interior` char(10) DEFAULT NULL,
  `keranjang_qty` int(11) DEFAULT NULL,
  `keranjang_jumlah` double DEFAULT NULL,
  PRIMARY KEY (`keranjang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_keranjang` */

insert  into `tb_keranjang`(`keranjang_id`,`keranjang_pelanggan`,`keranjang_interior`,`keranjang_qty`,`keranjang_jumlah`) values 
(5,3,'INTR-89533',1,50000);

/*Table structure for table `tb_pelanggan` */

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pelanggan_email` varchar(50) DEFAULT NULL,
  `pelanggan_nama` varchar(255) DEFAULT NULL,
  `pelanggan_password` varchar(255) DEFAULT NULL,
  `pelanggan_jenkel` int(11) DEFAULT NULL,
  `pelanggan_alamat` varchar(255) DEFAULT NULL,
  `pelanggan_nohp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pelanggan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pelanggan` */

insert  into `tb_pelanggan`(`pelanggan_id`,`pelanggan_email`,`pelanggan_nama`,`pelanggan_password`,`pelanggan_jenkel`,`pelanggan_alamat`,`pelanggan_nohp`) values 
(1,'yannariza@gmail.com','Yanna Riza','$2a$12$3WdO64NNOBQxUG6Pa5u6nOawHNG0oAvh8XKh5yUuleJMukGwVT8Ty',0,'Jalan Merdeka 10','03860480946'),
(3,'emailtesting@gmail.com','Email Testing','$2a$12$3WdO64NNOBQxUG6Pa5u6nOawHNG0oAvh8XKh5yUuleJMukGwVT8Ty',0,'Jalan Penjajah 10','03860480946'),
(4,'emailsatu@gmail.com','Email Satu','$2y$10$dyZVGbLupeFICe3Gb9p2jeFerxn1BBkLWyaXK6QctMYl/rp/S02YO',0,'Jalan Pelangi','089484');

/*Table structure for table `tb_pembayaran` */

DROP TABLE IF EXISTS `tb_pembayaran`;

CREATE TABLE `tb_pembayaran` (
  `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `pembayaran_faktur` char(20) DEFAULT NULL,
  `pembayaran_tanggal` date DEFAULT NULL,
  `pembayaran_bukti` varchar(255) DEFAULT NULL,
  `pembayaran_bayar` int(11) DEFAULT NULL,
  PRIMARY KEY (`pembayaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pembayaran` */

insert  into `tb_pembayaran`(`pembayaran_id`,`pembayaran_faktur`,`pembayaran_tanggal`,`pembayaran_bukti`,`pembayaran_bayar`) values 
(3,'FP-20220801-285','2022-08-11','1660231924_eed2b2c729a037bbec96.jpg',NULL),
(4,'FP-20220811-667','2022-08-24','1661397840_4c0e9c291c4c24fdb5d3.png',1),
(5,'FP-20220811-695','2022-08-26','1661552133_ba6cb4a808dcd5b94e92.png',1),
(6,'FP-20220825-494','2022-08-25','1661409689_e1819082a532599e3ae0.png',0),
(7,'FP-20220826-695','2022-08-26','1661552527_30cf079170947ba9d65e.png',0),
(8,'FP-20221011-468','2022-10-11','1665526355_3709b53c2882146bb392.png',0),
(9,'FP-20221011-600','2022-10-11','1665527415_d04df61ac9f9a9476bdf.png',1);

/*Table structure for table `tb_pembelian` */

DROP TABLE IF EXISTS `tb_pembelian`;

CREATE TABLE `tb_pembelian` (
  `pembelian_faktur` char(20) NOT NULL,
  `pembelian_tanggal` date DEFAULT NULL,
  `pembelian_total_item` int(11) DEFAULT NULL,
  `pembelian_total_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`pembelian_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pembelian` */

insert  into `tb_pembelian`(`pembelian_faktur`,`pembelian_tanggal`,`pembelian_total_item`,`pembelian_total_harga`) values 
('FB-20220718-453','2022-07-18',4,250000),
('FB-20220826-100','2022-08-27',4,180000),
('FB-20220908-835','2022-09-09',2,160000);

/*Table structure for table `tb_pemesanan` */

DROP TABLE IF EXISTS `tb_pemesanan`;

CREATE TABLE `tb_pemesanan` (
  `pemesanan_faktur` char(20) NOT NULL,
  `pemesanan_pelanggan` int(11) DEFAULT NULL,
  `pemesanan_tanggal` date DEFAULT NULL,
  `pemesanan_total_item` int(11) DEFAULT NULL,
  `pemesanan_total_harga` int(11) DEFAULT NULL,
  `pemesanan_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`pemesanan_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pemesanan` */

insert  into `tb_pemesanan`(`pemesanan_faktur`,`pemesanan_pelanggan`,`pemesanan_tanggal`,`pemesanan_total_item`,`pemesanan_total_harga`,`pemesanan_status`) values 
('FP-20220801-285',1,'2022-08-01',1,60000,1),
('FP-20220811-667',1,'2022-08-11',1,1,1),
('FP-20220811-695',1,'2022-08-11',3,170000,1),
('FP-20220825-494',1,'2022-08-25',1,60000,4),
('FP-20220826-695',1,'2022-08-27',1,60000,2),
('FP-20220908-796',4,'2022-09-09',2,120000,0),
('FP-20220908-946',4,'2022-09-09',4,240000,0),
('FP-20221011-468',1,'2022-10-12',2,120000,3),
('FP-20221011-600',1,'2022-10-12',2,100000,3);

/*Table structure for table `tb_supplier` */

DROP TABLE IF EXISTS `tb_supplier`;

CREATE TABLE `tb_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_nama` varchar(255) DEFAULT NULL,
  `supplier_nohp` varchar(50) DEFAULT NULL,
  `supplier_alamat` varchar(255) DEFAULT NULL,
  `supplier_kota` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_supplier` */

insert  into `tb_supplier`(`supplier_id`,`supplier_nama`,`supplier_nohp`,`supplier_alamat`,`supplier_kota`) values 
(1,'CV. Maju Jaya','0805842302400','Jalan Melati 20','Pariaman'),
(3,'CV. Permata','0803850395535','Jalan Melon 80','Padang');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user_id`,`user_email`,`user_name`,`user_password`,`user_level`) values 
(1,'superadmin@gmail.com','Super Admin','$2a$12$3WdO64NNOBQxUG6Pa5u6nOawHNG0oAvh8XKh5yUuleJMukGwVT8Ty',0),
(2,'adminyanna@gmail.com','Admin Yanna','$2a$12$3WdO64NNOBQxUG6Pa5u6nOawHNG0oAvh8XKh5yUuleJMukGwVT8Ty',1),
(3,'pimpinan@gmail.com','Pimpinan Zayn Interior','$2a$12$3WdO64NNOBQxUG6Pa5u6nOawHNG0oAvh8XKh5yUuleJMukGwVT8Ty',2),
(4,'adminriza@gmail.com','Admin Riza','$2a$12$3WdO64NNOBQxUG6Pa5u6nOawHNG0oAvh8XKh5yUuleJMukGwVT8Ty',1);
