-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2021 at 10:56 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubudsouv_ubudmarket_research`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_web`
--

CREATE TABLE `admin_web` (
  `id_admin` int(3) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_web`
--

INSERT INTO `admin_web` (`id_admin`, `id_toko`, `username`, `password`, `nama`, `telepon`, `jabatan`) VALUES
(1, 2, 'firyan', '202cb962ac59075b964b07152d234b70', 'Firyanul Rizky', '081338226826', 'Admin'),
(14, 19, 'wywinda', '827ccb0eea8a706c4c34a16891f84e7b', 'Winda', '087263782974', 'Admin'),
(15, 19, 'bayubaskara', '202cb962ac59075b964b07152d234b70', 'Bayu Baskara', '083729184782', 'Admin'),
(16, 19, 'there89', '8c25c4d6e75d644af4ba362089df52b7', 'Theresia', '082166378227', 'Admin'),
(24, 19, 'arisurya', '202cb962ac59075b964b07152d234b70', 'Ari Surya', '087796991245', 'Admin'),
(27, 33, 'winda1', '202cb962ac59075b964b07152d234b70', 'Winda', '087947839927', 'Admin'),
(28, 32, 'tester', '202cb962ac59075b964b07152d234b70', 'Mikasa Ackerman', '+81 123 456', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `graph`
--

CREATE TABLE `graph` (
  `id_graph` int(11) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `kditem` varchar(5) NOT NULL,
  `produk` varchar(25) NOT NULL,
  `Januari` int(11) NOT NULL,
  `Februari` int(11) NOT NULL,
  `Maret` int(11) NOT NULL,
  `April` int(11) NOT NULL,
  `Mei` int(11) NOT NULL,
  `Juni` int(11) NOT NULL,
  `Juli` int(11) NOT NULL,
  `Agustus` int(11) NOT NULL,
  `September` int(11) NOT NULL,
  `Oktober` int(11) NOT NULL,
  `November` int(11) NOT NULL,
  `Desember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `graph`
--

INSERT INTO `graph` (`id_graph`, `id_toko`, `kditem`, `produk`, `Januari`, `Februari`, `Maret`, `April`, `Mei`, `Juni`, `Juli`, `Agustus`, `September`, `Oktober`, `November`, `Desember`) VALUES
(312, 33, '0996', 'Sendal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(313, 33, '8793', 'Jepit bunga', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(314, 33, '4572', 'Baju', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(315, 33, '6473', 'Baju barong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(316, 33, '1373', 'Lukisan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(317, 33, '0563', 'Patung kuda', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(318, 33, '0048', 'Flat shoes', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(319, 33, '0022', 'Sneakers', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(320, 33, '9548', 'Hiasan dinding', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(321, 33, '5111', 'Gantungan kunci', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(322, 33, '1259', 'Gelang', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(327, 2, '6', 'Bali Home Spa', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(328, 2, '7', 'Perak Celuk', 0, 2, 0, 0, 0, 1, 0, 0, 0, 0, 2, 0),
(329, 2, '9', 'Woven Cloth Endek', 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0),
(330, 2, '10', 'Traditional Painting', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(331, 2, '11', 'Layang-Layang', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 2, 0),
(332, 2, '12', 'Kebaya', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(333, 2, '13', 'Palm Leaf Painting', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(334, 2, '14', 'Dreamcatcher', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(335, 2, '15', 'Pandora Box', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(336, 2, '1', 'Joger Shirt', 2, 0, 0, 1, 1, 0, 1, 2, 1, 1, 4, 0),
(337, 2, '2', 'Balinese Batik', 1, 0, 0, 1, 0, 1, 1, 2, 0, 0, 4, 0),
(338, 2, '3', 'Manik-Manik Craft', 0, 2, 1, 0, 0, 2, 0, 3, 1, 0, 1, 0),
(339, 2, '4', 'Barong Shirt', 2, 2, 1, 1, 1, 1, 0, 1, 1, 1, 5, 0),
(340, 2, '8', 'Ethnic Sandals', 0, 1, 0, 0, 0, 2, 0, 0, 0, 0, 1, 0),
(341, 2, '6826', 'Coa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(342, 2, '5', 'Mukena Bali', 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 1, 0),
(370, 19, '5', 'Bali Long Dress', 1, 2, 4, 1, 3, 0, 9, 1, 1, 0, 0, 2),
(371, 19, '6', 'Ethnic Sendals', 2, 1, 3, 1, 2, 2, 9, 2, 1, 2, 3, 4),
(372, 19, '7', 'Engraved Hair Clips', 2, 5, 3, 6, 4, 3, 9, 3, 3, 0, 1, 1),
(373, 19, '9', 'Wooden Penises Key Chain', 2, 0, 1, 3, 4, 2, 10, 3, 0, 2, 3, 3),
(374, 19, '10', 'Traditional Painting', 2, 3, 5, 4, 0, 2, 8, 3, 2, 3, 0, 2),
(375, 19, '11', 'Rattan Bag', 7, 2, 5, 3, 3, 3, 12, 4, 6, 6, 5, 3),
(376, 19, '12', 'Barong Shirt', 4, 2, 1, 0, 0, 4, 11, 1, 3, 4, 4, 5),
(377, 19, '8', 'Baruna Mini Statue', 2, 0, 0, 2, 3, 3, 5, 5, 0, 5, 3, 3),
(378, 19, '1', 'Bali Natural Soap', 0, 2, 2, 1, 3, 0, 11, 2, 1, 1, 1, 1),
(379, 19, '2', 'Beach Hat Bali Motif', 2, 2, 1, 2, 1, 2, 9, 0, 1, 0, 2, 2),
(380, 19, '3', 'GWK Mini Statue', 0, 4, 2, 4, 4, 6, 5, 1, 4, 3, 2, 2),
(381, 19, '4', 'Bali Frame Wood Carved', 3, 4, 3, 1, 2, 2, 13, 1, 4, 0, 5, 3),
(382, 32, '1073', 'Baju Barong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(383, 32, '4007', 'Baju Barong Merah', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(384, 32, '1513', 'Patung Budha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(385, 32, '3590', 'Patung Janger', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(386, 32, '7956', 'Patung Barong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(387, 32, '5381', 'Asmat', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(388, 32, '1024', 'Udeng Batik', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(389, 32, '0485', 'Udeng Putih Polos', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(390, 32, '4347', 'Kodok', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(391, 32, '0193', 'Baju Brokat', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(392, 32, '2554', 'Safari Laki-laki', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(393, 32, '4871', 'Dolpin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `infotoko`
--

CREATE TABLE `infotoko` (
  `id_toko` int(5) NOT NULL,
  `nama_toko` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kunci_akses` varchar(50) NOT NULL,
  `gambar_toko` varchar(100) NOT NULL,
  `pemilik` varchar(25) NOT NULL,
  `wa` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `info_status` text NOT NULL,
  `visitors` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infotoko`
--

INSERT INTO `infotoko` (`id_toko`, `nama_toko`, `password`, `kunci_akses`, `gambar_toko`, `pemilik`, `wa`, `alamat`, `deskripsi`, `status`, `info_status`, `visitors`) VALUES
(2, 'Riset Skripsi', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'upload1.jpeg', 'Ubud Art Market', '082144148764', 'Jln. Karna No. 1', '<p>Starting the 1st of January 2009, The Gusti Shop&nbsp;prominently owned by the family of Mr. I Gusti Ketut Kiyana. The Art Market was established to fulfill demands for those who stay in Ubud, which is very strategic to complete the center of entertainment, culinary, and shopping that is well known as Ubud Art Market.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Culturally means that exotic Indonesian tradition, especially Bali, should be presented to visitors as a masterpiece that was heritaged by ancestors. Bali&rsquo;s distinctive yet interesting state-of-art is unavailable anywhere else in this world, which newer generation should inherit. Visitors will experience priceless sensation while enjoying vacation in Bali, and it could be nature beauty, people hospitality, unique cuisine, handycraft, and others. The stakeholder realize completely the importance of this Bali&rsquo;s handycraft center, which is expectedly beneficial socially, economically, and culturally.</p>\r\n', 'Active', '(Open : 10:00, Closed : 21:00)', 852),
(19, 'Padi Shop', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'padi art market.jpg', 'I Nengah Natyanta', '087862209490', 'Jln. Raya Ubud', '', 'Active', '(Open 10:00 - Closed 21:00)', 567),
(32, 'Tester Projek', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'fotooo.jpg', 'Maria, Rose & Sina', '087796991245', 'Gianyar, Bali', '<h1><span style=\"color:#F0FFFF\"><span style=\"font-size:28px\"><span style=\"font-family:comic sans ms,cursive\"><span style=\"background-color:#0000FF\">45678</span></span></span></span></h1>\r\n', 'Active', '(Open 10:00 - Closed 21:00)', 89),
(33, 'Wellcome Shop', '202cb962ac59075b964b07152d234b70', 'b0baee9d279d34fa1dfd71aadb908c3f', 'c7f80bf5-cd73-49be-9f3b-c27bdd81b1c8.jpg', 'Windayani', '087837892078', 'Jln. Karna', '', 'Active', '(Open 10.00 - Closed 17.00)', 68);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(5) NOT NULL,
  `kditem` varchar(5) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `gambar_item` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(4) NOT NULL,
  `views` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `kditem`, `id_toko`, `merk`, `jenis`, `gambar_item`, `harga`, `deskripsi`, `stok`, `views`) VALUES
(35, '6', 2, 'Bali Home Spa', 'Fashion', 'balihomespa.jpg', 45000, '<p><strong>BALI HOME SPA</strong></p>\r\n', 12, 50),
(36, '7', 2, 'Perak Celuk', 'Fashion', 'perakceluk.jpg', 120000, '<p><strong>PERAK CELUK</strong></p>\r\n', 31, 82),
(38, '9', 2, 'Woven Cloth Endek', 'Fashion', 'endek.jpg', 210000, '<p><strong>WOVEN CLOTH ENDEK</strong></p>\r\n', 1, 181),
(39, '10', 2, 'Traditional Paint', 'Fashion', 'lukisanbali.jpg', 75000, '<p><strong>BALI TRADITIONAL PAINTING</strong></p>\r\n', 66, 8),
(40, '11', 2, 'Layang-Layang', 'Handycraft', 'layanganbali.jpg', 45000, '<p><strong>LAYANG-LAYANG BALI</strong></p>\r\n', 9, 22),
(41, '12', 2, 'Kebaya', 'Fashion', 'kebayabali.jpg', 150000, '<p><strong>KEBAYA BALI</strong></p>\r\n', 28, 20),
(42, '13', 2, 'Palm Leaf Paintin', 'Fashion', 'palmleaf.jpg', 85000, '<p><strong>PALM LEAF PAINTING</strong></p>\r\n', 5, 5),
(43, '14', 2, 'Dreamcatcher', 'Fashion', 'dreamcatcher.jpg', 58000, '<p><strong>DREAMCATCHER</strong></p>\r\n', 70, 10),
(44, '15', 2, 'Pandora Box', 'Fashion', 'pandorabox.jpg', 67000, '<p><strong>PANDORA BOX</strong></p>\r\n', 43, 7),
(56, '1', 2, 'Joger Shirt', 'Fashion', 'jogershirt.jpg', 65000, '<p><strong>JOGER SHIRT</strong></p>\r\n', 89, 40),
(57, '2', 2, 'Balinese Batik', 'Fashion', 'batikbali.jpg', 120000, '<p><strong>BATIK BALI</strong></p>\r\n', 67, 188),
(74, '5', 19, 'Bali Long Dress', 'fashion', 'dress-tangtop-bali-550x651.jpg', 50000, '<p>dress baru</p>\r\n', 12, 19),
(75, '6', 19, 'Ethnic Sendals', 'fashion', 'fotoo.jpg', 10000, '<p>sendal bunga</p>\r\n', 5, 19),
(76, '7', 19, 'Engraved Hair Clips', 'fashion', '86e40da66df4e2ac911f65a956009c9d.jpg', 15000, '<p>jepit rambut</p>\r\n', 57, 85),
(78, '9', 19, 'Wooden Penises Key Chain', 'fashion', 'fotoo.jpg', 1000000, '<p>patung burung</p>\r\n', 3, 11),
(79, '10', 19, 'Traditional Painting', 'fashion', 'fotoo.jpg', 1000000, '<p>lukisan</p>\r\n', 57, 5),
(80, '11', 19, 'Rattan Bag', 'fashion', 'download.jpg', 150000, '<p>barang mantapujiwa</p>\r\n', 0, 220),
(81, '12', 19, 'Barong Shirt', 'fashion', 'send-you-bali-shirt-barong-souvenir-famous-bali.jpg', 90000, '<p><strong>Barong</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"file:///C:/Users/Rizky29/Pictures/0954411e-7f3c-4e54-9ebc-de9c6c4c7cdd.jpg\" /><a href=\"https://www.google.com/url?sa=i&amp;url=https%3A%2F%2Fwww.amazon.com%2FIndonesian-Barong-Shirt-Bali-Mask%2Fdp%2FB07KP55QBW&amp;psig=AOvVaw1ImExY8zPFnUu9XOEmunl-&amp;ust=1628332922133000&amp;source=images&amp;cd=vfe&amp;ved=0CAsQjRxqFwoTCJiy5f6anPICFQAAAAAdAAAAABAD\"><img alt=\"\" src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBISFRIUEhIRGBISERIYGBgSEhgRERgRGBgZGRgUGBkcJDAlHB4rIRgYJjonKy8xNTY1GiU7Rj8zPy40NTEBDAwMEA8QHRISHz8nISsxMTs4PzQxNDozMTc/NjExODE0OjY0MTQ+NjcxNDE2NDE0MTQ/MT0xNz00MTE6MTQ/Mf/AABEIANkA6AMBIgACEQEDEQH/xAAcAAEAAAcBAAAAAAAAAAAAAAAAAQIDBAUGBwj/xABREAACAQIDBAYECAkGDgMAAAABAgADEQQSIQUiMUEGBxNRYYEyQnGRFCNSYnKSscIkJTV0k6GywfAzRFNUgtEVFlVkc4Sio7O0xNLT4RdDY//EABkBAQEAAwEAAAAAAAAAAAAAAAABAgMEBf/EACoRAQACAgICAQIEBwAAAAAAAAABAgMREiExQQRhcVGBsfAFEyIykaHx/9oADAMBAAIRAxEAPwDs0REBERAREQEREBETGbW25hcIM2JxFKmOQZxnb6KjeY+ABgZOJyrbfXDRS64LDvUbk9f4qn7VUXZh4HLNPx/WvtVl3Hw9MnnToAkfpCw/VA9CxOL9H+uOooVcdh89hrUw5CufbTYhSfEMPZN3wPWTsmqB+FBD3Vqb07f2iMvuMDcYmunptssfz/CfpVvMTtDrR2TSBy1nqsPVo0nN/YzhV/XA3iJw/a/XFi3a2Ew9KnTHOterUbuOhCr7NfbJtm9c2IUgYnCUagv6VF2otbvytmBPmIHbomhbI61dmV7B3q4d72tXTcv9NLgDxa03PB42lXUPRq06iHg1N1qL7wbQLqIiAiIgIiICIiAiIgIiICIiAiJh+k+3KWAw9TEVdQosqg2Z6h9FF8SfcATygX+NxlKihetUp00HFqjBEHmdJom2+tjA0brhlqYlxfVB2VG/i7C59qqwnGdubYr4yq1bEuXduAuciA+oin0VHDTjxNzrMfe3KF03TbfWVtLFXVKgw9M3GXDjK9vGobvfxXLNOqszsWdmZ2N2ZyWcnvLHUyAgyCAEpVxp7D/6laSsIVQptKpluRlP8cJWVoRuGC6BVquDONFeiE+D1KoTKxcrTDEoToAdwiajadu6BfGbGCan4vGoeehapp7mE4hT4D2CURkgGsmYwokVCVcJiqlFs9GpUpv8qlUam31lIMpxA6DsLrZx9Cy4lUxCDm1qVe30lGU+a38Zv+y+tXZlawqPVoOdLVqZK3+mmYAeJtPP8Spp6ywG0KOIUPQq06iH1qbq637rqeMu55P2Ltevg6q18NUKVFI+g45o49ZT3fYdZ6Y6M7bp4/DU8RT0DizLe5SoujofYfeLHnCMxERAREQEREBERAREQJSbangJ546x+lZ2jiMtJvwTDllp24VG4PW8+A+aOWYzd+t3pb2SHAUG+NrL8eRxSgw/k78i/P5t/lAzjKiFgIufKSq3Iya+skrjgZFTFZGQUyMBESAgSul+Mo5COGsuDJcsCVatQDLmfLrpnOXXjpe0FpNl9siFtAkCyJkZCAiIgQiRkDAhN46r+lfwDEdnVa2GxJVXudEq8Eq+A1yse6x9WaRISo9fROc9U3S34XR+C1mvicMgykneqYcaBvFl0U+R5mdGhCIiAiIgIiICa3026TJs7DtVNmqvdKKH1qpHE/NXifdxImcxmLSij1ajBadNSzMeAUC5Jnmzpj0jqbSxDVmzLTXcpIT6FK/McM7cT5DgBAw+JxD1XepUcvUdizs3pMx4k/xpKYiJGSTnJq3CSxUPDzgQSTyVZNAREQERIGBenZzBScyZguYoGJcAcRwtmA1K3vbx0lnM5Ur1MtuxfIrdtmy72RmNifaQR7Qe6YGa8dpne3T8jHjpNeE73HaBkJGQmxzEREABJTxPlJxKV94wJogRKLnZu0KmGq069FstSk4ZDyvwII5qQSCOYJnpjol0ipbRw9OvT0b0aiXuUqgbynvHMHmCDPL02PoN0oqbMxAqC7UamVa6D1kvoyj5S3JHfcjnCS9NxKGExKVUSpTZWp1FDKym6spFwRK8IREQERKGIpF1ZQ7IWVgGSwdSRbMtwRccRcGBxrrc6W9u5wNBviqTg12U6NWU6U/EKRc/O+jOaTb+mXQHFbOzVQTWw1z8aoOdL/0y8vpi477XAmnyKiJEyAkTCpCJK/Lzk4kp/j3mBESMCRgQl9hNnNUXMG11sAubgbDMbgLc37/RPhexmV2HUZqlNAFyqVzD1mptUVWA7z8YT7B4G+GSZiNw24f5fKefjU6+7GJTLMFUEszBQALksTYAd5Jme2FsUly9dSKdPKQgys7uRdFA193t7jMrT2HSes7sGJfIyqt1dBlbPWC69pZgjEC4u/OXVCqlBKdUU1sGRVqFXUvVJqZw5YjJYkgNx8Re50ZM0zGqrXHG+1xar8IZSFO496QKAZECnICTe4ztqTzuTlsw1TbOwmV74dWam4LAaKykekjKbFSDpl4g3HKbcCe3D7+bIyZCozhS6DMQTky3UHjbfHdLGs616fa5AoqEr2qpULisaiqFUKTmU6Wc6k2BLHWaMV7Vnr22WrEx20MUyWy2IbNlsQQQ17WI4iXWO2caQuWub2IK5SOIuNSCLgi9+Nu+bW+x6NOvnRcoph2ZCS7KC69nVZTYpmVm0NrEA6ctb21UZXdDlszMy8Cwpl2Kg24Hgfd4zrjJNpjj+bGtaVrPLz6+7FREiJuc5KR9KVZSb0jCJokTISqhEGQgdM6pemfwZ1wOIb8HqueyZjpTrMfRPcrH3MfnEjuk8/8AQbq2rY7JXxWalhTYgWtWqr80H0VPyjx5DW871RpBFVFvlQADMxdrAWF2JJJ8SbwxVoiICIiBI6ggggEEEEEXBB4gicg6e9WOXPiNnISurPhl1I5lqA+59Xks7FEDyQD38fdr3eBgzt/WH1erig+JwihcVxdBZUr259y1PHgefeOJii+fs8lTtM+TJkPadpe2TJa+e+lrXvIqiZBDOsdD+qpmK1tpbq6EYdG3m/0rrwHzRr4jUTT+sWglPaWLSmiIiGgqqihFVRh6VlUDQCBrQkTISthMM1V1ReLHjyA5mCZ13KGHpNUdUX0mNh9pJ8AAT5TP4QNTpplcGgWdg9RKqjO2RWVVUHNfIrA2OinhYylh6dJXLKyLRpFkYs2VmzI2YA8cxCsRoSTYaDQbRR2ZQSnkVq7kKpYVlFOpSClgrUt61wXfQ34m/hy/IycZ1+/q6sFazXcx3P6MM2Jq9orMrNTS1Nnb+k3cxVwy6F0XUsOeoEvsZnqscocEhgChzgEZWI31VWJKq2YtxJ3QWuKK5d8do7IqMotplc5m9pbeBLc83hKqoXUAswDhwbLeysASQSbC1v4vObf0br1iO4W5wjGkKYq7yqrB+2RnIvujIRa1w2t8x4FraS8wjNTYKc+ihbuxUMwsUIKrlUqwzXDaknRZRbBIQxPa3yWOhG7lbUX4GzEWOl76xiMyK5BYkK3q5Ta27w4m6+6WZ2wiO4ha0sRWzXysqOtREYDKuoTV2ux0AYmxbja54SxxyvVRjUZVo9qrh0p1ChqleyGYHVAOzIPO9uPGZmoED27R0plVAsLkujBrLf0GtvX5hSOcusZszDvSyua6ZaeYJQUVC1Muzs9XeOtzfw7gNIrk4zE+Gy1K6053WpsjMjizKSCO4iSTYq9Cm1Ru0amVru+V0fOq1FAtZ+ehU3HfYgkETBYmg1N3RvSQ2P7j5ixnpVndYl599VvNf3Mfipyg53pXnY+rfovhMbswriKCMater8YAFrKVOVSrjUW104akWIJhHGIm39NOgWJ2aWcXq4QndqquqX4LVUeieWb0TpwJtNSw9J6jKlNGd3YKiICzsx4KANSZRJb9fdqSe6dk6uerUJkxe0EBqGzU8OwuE5h6o5v3LwXnrouR6vOrpcJlxOMVWxVromjJQ8+DP48ByvxPSYRGIiAiIgIiICIiAmLGwcKMScYKCfCimQ1LbxXhe3DNbTNa9gBe2kykQITzp1oi21MZ4mh/wKc9Fzzl1nn8aY36VD/l6ULDVpl9iJlSvWNwFVUB+mbv7gFPnMRebDsrDXpFGJKkJUcerY2ZKY5ZmuhJ7mUcpaxuY0wyzEVna32Jj6iYlSgYJUe4QAMCgJKjK2htb26TY9o4hyxztqMu8b7wYX3jfW28CbX3bm1prmHIp10d/WqkaGwtlsRpy4++ZmpiXLqvZML2XVwbK6kqrm+56J7zYkeE4flU1l/J3/HmL0iZ8eFGpUvlFLe7VlIzDJSLAXO6VBtlVRe1jrbRrStgKyspzLVK5UdjZmRBchLkKVQ6XF/AagSwxrWDMUBpgksX1LMNLg8FtuooVSNOIFjL/ZuPq0qlNiiCmabAp2qU8lUtZyVNizWAW2g1F9BNfGNdOq1o48Z7mJ9fqus9K2YInadpUsLCwYKrdrbkCbAd3Gw0lpj6qoFCI6qqlkDBkR1Y2BGZQGXW59o1toaV0yUyM2XtXGVgCLBqIRSCPR9IeOZuN9Z9p46pVas/Zq1Ky5V7VapZ9QzjiVYpmuDexvbukrG041raJnv9+1NKigHtN00yw4ZqQe6rfRSQCCBmNgCBexmU2biHUnITcalgN/KpByprpfQHS+jDhxwuD9UhAFJOQoCoAZTcE6hgy2VrhbFR3a31DEtmYGkx1JuX4ohOq7xzrmJNr6C410Ml6xrRfVu9+2C2jj2fElnuyU2KlbBcqE7wAXQWJJFu72mSdIEv2NX+kp2JA0LodTf2Mo/sypuvWZ01zVqgsTe4PBT33sPPWXG2sMRSCAtlpKHW9rNTZguXwdc48r8bT0qU1ih5Oa8Tm194a6J3/qcP4tTwr4j9szgCzvnUx+TV/OcR+0IWW9VEDAhgCpBBBFwQdCCOYmubC6FYHBV6uIoUrVKh3bnMtJSN5aQtug+fdoNJs8SoREQEREBERAREQEREBERAhPN/Wa19qY36dIe6hTE9ITzV1itfaeO/0yj3U0H7oWGuCbZ0aXKUpN66o5v86+UeSos1MzY9lVjeo97ubu1jcDWyoD3gEeAvbkZlT+5pzxPCdMhhtkipVpo1wRY3UXID9mLkex29xmUdGPapUT4ym2WogIDluAa59KwAIufRPdeVsHUQ4tKt/wCTDq4BAIJqWDnXRVyAf2hMh1hItfLVwro9UuigoVqbptmVrE3AvcrY2nB8rd8n+HX8O3HFFZ+rUquFYqAUUInZBULlkO+tsxtYm2YWJ4sONpa3K06dUklSKYq5V7SojuHCqFYroeyJsGA152mOrVMTV9OqFRN4M91TMtioAUHeN9BbXWZOlXfMotSdkZmenVUsjtkZVqZQczEBmOnrEnQmWKTx3PcOqtq1vxjz9VH/AAqtyTTsTTW5GFJPaHRl1rWtb1uJsBYStTDMnaA6ObUgy9m75atNGzqrEZbMRYsQLAc5d5N0j4LS/klUAviWZamt6x+UDru3tu915Z4mvUzMB2aOajlEpgqlIOFViq33LkLa/wApjMaxynUR23ZrVpG99e/H+lzQwzZFCopSoikoCdGBJGTSxINjl71bUXvMulNiadNFGeqCqAEMUUDebNpZQBmNjqB79Nw9TE0t2lUD03tZlu1JiyZzbOBrYa6aEWnTegIp4dGqYioqVW7RW7RlRyRcKgBPmF46zXkpO499tMzERyajT2XkxBRb5FxAKlvSKrTVNfHPp7ZYdIFLB0UnNSUvYfI7R849m+p/sibFVrU0rVXNwai1CqtxASpVfOO+5Gh4Ed9tNX2xUIYtffCtcHQOheojofJBpz1traelitvDG3kWiZ+TLXrzvfUsfxd/rVf7VnAxO89SjX2e47sXWHvVD++R0S6HERKhERAREQEREBERAREQERECE8ydOj+Mcf8AnT/YJ6bnmXp6LbSx/wCct+tVMLDATbtmUlyIOdSgoPIgZCSR3nUsO8D3ajMzgsdvhc26cKqLytUWmv68yED6Q75azET215aTaNROvbY32SiUmxOJYZsWScCabNpWJcOtbQABmytqSAL6iR2zgmKU8M4/CaQcYhFBeggdM2HqIxHAg66k3HhrQTalB6lSu5w/YtSP4PmTKr3Ko2Hp1Bai6hFuTe+ZrZcwtT2XjDW7KgzI2SrdqlhWd1qBTTSozE58hJW2WwI04XnDk33af+OykcYiIZHoqaNSlXo4kUylWi4s26wdQijjpmUshDaEEW3tSMRj6AbI+6WIYErza+jqRyuTz00lPaOCy1XUtbM4dWWzAVAxDG63v6zWB4MJPs/HB0YVPTU01fNxD9oVbw4dn5kzd8SYiZ76lj/EqW6yVjysAlXLbta2TQ/yh9JgQb+77ZkNn4bR7WV2ZUvzAc5c4vzuynn6PjI5TnKEbos3iVHaGx9zSG0MWAESmd+oyBSozZiHyAEcx63tAE7LcYrPHry86tsmS9YnuNwyvS9qfxdLCrTFNKdJEVWuczAjJxsG9Ekm5JcknhJdmYFmo1MLRF8UQr00e6UThAqq9ZmA45y6ixBuOHG+L2Lgs9VFViQhBYtYXqOTdje3IMwJt6Kjja8+NxuRTQDKoNZqnaLahW7FTlehSZTZQWzMEIy5mY+3yax3xe5miaxWn4efuvv8HUXorjMK16FPIuKaoWFR8VVZFsgIsADUFzcCzta9pjttUwUqk8VpgeBu6sG+uzW8D3S6r7XoU3asgwppHDrlw6Oq0w7bripSRcrVSDowsBYela8wO0Mf8ZiRmurUslhwNTIiE+Vj9Wd2G39E1l5mbHM5ItDC3ncuo1vwHEDmMc58jRo/3GcNnZ+oerehjU+TiKbfWS33Jmyl1aIiEIiICIiAiIgIiICIiAiIgQnmbp819pY8j+sEeYVQf1gz0zPL/S1y2Px5PH4bih5LVdR+oCFhhwJMjZWVvksD5g3kIkVTy8BMv0crFajICN9G0Ol2TeBv4AMfHhobGYoiVsLXam6OtsyNcXF1PepHMEXB8CZrtTcTDZF9Nhx1OtU7NqauTTRi3aOO0DZlQ3ewWwCLbW9mHhJNmUwxUMoGVlZ72IJL7uvAghEGmnvmMw22ayWylCFLFQyA5Cxu2Q8Rew58hIVNqu7hmzX3b75YHKwYcfEd/M95mOKtsdu4jRmvOTHwidRvemzpiB2xt61NLA62OZiw+q9vOYjFplOVEG7Ucpw0RXcWudACrqb3HBe8SLY+nkzrbtD2h8AeyXTxsWUeRmOo7Xem7Oha5LW3yLDloOOgHHuE6MsxxmK97cvx62reLz1qYZvAJWpBy4dWqGmV7NwGIdgMzPYqVsL6G+9rxmE2/WLVcp/+tEQa39UN7963lIV9tVnILFLBw+UIFVnGl2trw00IljXqmo7u1szuzG2gzMSTbw1nLjxTFuUu2+bl379pAba90jUbMzHvYn3m8lidERpptOydc6g2/KQ8cIfeK3905FOudQfHaXswf/USsZdiiIhCIiAiIgIiICIiAiIgIiIEJ5h6Yrlx2PH+eYg+92P756enmPpx+UMd+d1f2oWGEiSwJFTSWDEAZCJCAiIgIkIgJCIlCdY6hqlqmPX5SYY/VaqPvTk86R1G1iMdiE5Pg2bzSpTA/bMJLu0REIREQEREBERAREQEREBERAhPMfTn8oY/86qfbPTk8x9OPyhj/wA7qfbCwwUGJAyKjF5CICQiICIMGBCQkZCUIiICb91Mvl2kB8vCVh/tI33ZoN5uXVNUttTC/PTEL/unb7sI9GREQhERAREQEREBERAREQERECE8wdNz+MMf+d1f2p6fnBOlHQLatbGYurSwmanVxNVkbtqK5kZiQbM4I07xCw0CDNs/+Odsf1Jv0+H/APJKb9Xu1x/ManlUot9jyDV5CbMegW1v6jW+vT/75bv0K2oNDgMV5IGHvBgYG8TN/wCJu1P8n4r9HI/4n7THHAYv9ET9kDByBmcbontIfzDGeWHc/YJTHRPaZ4bPxvnh3H2iBh5CZsdENp/5Pxf6FhKqdB9qnhgMT5qq/aZRr0jNlHQDa/8AUav1qY+/Ky9W+2D/ADJvOtQH34GpzaerJ8u1MCf/ANKg+tRqD98vKfVbtduNCkv0sQn3SZsnQ7q1x+FxmGxFY4YJRcswWozORkZdBltxPfA7NERCEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQP//Z\" style=\"height:94px; width:100px\" /></a><img alt=\"\" src=\"https://m.media-amazon.com/images/I/B1F9XqluwtS._CLa%7C2140%2C2000%7C91KosWRo1fL.png%7C0%2C0%2C2140%2C2000%2B0.0%2C0.0%2C2140.0%2C2000.0_AC_UL1500_.png\" style=\"height:100px; width:100px\" /><img alt=\"\" src=\"https://m.media-amazon.com/images/I/A1nYNISnPeL._AC_CLa%7C2140%2C2000%7CC1v0PHKXbVS.png%7C0%2C0%2C2140%2C2000%2B642.0%2C470.0%2C854.0%2C1025.0_UL1500_.png\" style=\"height:100px; width:100px\" /></strong></p>\r\n\r\n<p>Solid colors: 100% Cotton; Heather Grey: 90% Cotton, 10% Polyester; All Other Heathers: 50% Cotton, 50% Polyester Imported, Machine wash cold with like colors, dry low heat</p>\r\n', 59, 145),
(82, '8', 19, 'Baruna Mini Statue', 'fashion', 'boyfriend material.jpg', 1000000, '<p><strong>Mantap barangnya brooo</strong></p>\r\n', 4, 13),
(83, '1', 19, 'Bali Natural Soap', 'fashion', 'IMG-20210527-WA0001.jpg', 20000, '', 79, 4),
(84, '2', 19, 'Beach Hat Bali Motif', 'fashion', 'null-20210607-WA0000.jpg', 20000, '', 75, 4),
(85, '3', 19, 'GWK Mini Statue', 'fashion', '5002131_8f115494-2ade-478b-94d9-cd2d0dc5b8ae_960_960.jpg', 250000, '<p><strong>Patung berkualitas, kayu mantap</strong></p>\r\n', 3, 57),
(86, '4', 19, 'Bali Frame Wood Carved', 'fashion', '3794075_b4f52a50-8f89-4c35-af51-2e43b0d2fe94_1560_1560.jpg', 750000, '<p>Bingkai bagus</p>\r\n', 54, 54),
(87, '3', 2, 'Manik-Manik Craft', 'Fashion', 'manik-manik.jpg', 65000, '<p><strong>MANIK-MANIK CRAFT</strong></p>\r\n', 12, 18),
(88, '4', 2, 'Barong Shirt', 'Fashion', 'barongshirt.jpg', 67000, '<p><strong>BARONG SHIRT</strong></p>\r\n<p>Barong is a lion-like creature and character in the mythology of Bali, Indonesia. He is the king of the spirits tshirt, leader of good, enemy of Rangda, the demon queen shirt, mother of all spirit guardians in the mythological traditions of Bali T-shirts. Battle between Barong and Rangda T-shirts is featured in the Barong dance shirt to represent the eternal battle between good and evil shirts. Order now for great Christmas or awesome birthday gifts Cool indonesian t-shirt for Balinese people. Novelty tee.</p>\r\n', 3, 73),
(89, '8', 2, 'Ethnic Sandals', 'Fashion', 'ethnicsandal.jpg', 70000, '<p><strong>Ethnic Sandals</strong></p>\r\n', 4, 7),
(100, '1073', 32, 'Baju Barong', 'Baju', 'images (28).jpg', 25000, 'Harga bersahabat', 5, 3),
(104, '0996', 33, 'Sendal', 'Fashion', 'images.jpg', 50000, '<p>Sendal seni</p>\r\n', 30, 5),
(105, '8793', 33, 'Jepit bunga', 'Fashiob', 'edee40805194fc62d947a2faec5c18a8.jpg', 10000, 'Jepit bunga', 4, 3),
(106, '4572', 33, 'Baju', 'Fashiob', 'edee40805194fc62d947a2faec5c18a8.jpg', 50000, 'Baju keren', 50, 5),
(107, '4007', 32, 'Baju Barong Merah', 'Baju', 'images (28).jpg', 20000, 'Terjangkau', 7, 4),
(108, '6473', 33, 'Baju barong', 'Fashiob', 'edee40805194fc62d947a2faec5c18a8.jpg', 20000, 'Baju barong', 20, 1),
(109, '1373', 33, 'Lukisan', 'Art', 'edee40805194fc62d947a2faec5c18a8.jpg', 40000, 'Lukisan', 40, 3),
(110, '0563', 33, 'Patung kuda', 'Art', 'edee40805194fc62d947a2faec5c18a8.jpg', 1000000, 'Patung kuda gede banget :)))', 50, 6),
(111, '0048', 33, 'Flat shoes', 'Fashion', 'sandal_bali_kayu_02_1483538447_b6a4ea4a.jpg', 70000, '<p>Flat shoes bunga</p>\r\n', 30, 5),
(112, '0022', 33, 'Sneakers', 'Fashion', 'Untitleddesign_23_a7e94219-0062-45d3-8ebd-06d3eb345af9.jpg', 350000, '<p>Sneakers</p>\r\n', 20, 4),
(113, '9548', 33, 'Hiasan dinding', 'Art', 'edee40805194fc62d947a2faec5c18a8.jpg', 300000, 'Hiasan dinding', 20, 5),
(114, '1513', 32, 'Patung Budha', 'Patung', 'images (31).jpg', 200000, 'Bahan awet lama', 9, 4),
(115, '5111', 33, 'Gantungan kunci', 'Art', '2a48b2d22ff7c184a9c338bd45c9c40b.jpg', 30000, 'Gantungan kunci love', 100, 2),
(116, '1259', 33, 'Gelang', 'Fashiob', 'edee40805194fc62d947a2faec5c18a8.jpg', 10000, 'Gelang tangan couple', 20, 5),
(117, '3590', 32, 'Patung Janger', 'Patung', 'images (29).jpg', 200000, 'Harga bisa di nego lagi', 10, 3),
(118, '7956', 32, 'Patung Barong', 'Patung', 'images (30).jpg', 1000000, 'Warna barong bisa request', 1, 5),
(119, '5381', 32, 'Asmat', 'Patung', 'imagefs (28).jpg', 50000, 'Dibuat dengan kayu yg berkualitas', 14, 5),
(120, '1024', 32, 'Udeng Batik', 'Udeng', 'images (31).jpg', 12000, 'Banyak punya varian batik', 199, 8),
(121, '0485', 32, 'Udeng Putih Polos', 'Udeng', 'images (31).jpg', 10000, 'Harga terjangkau, kualitas bagus', 298, 4),
(122, '4347', 32, 'Kodok', 'Patung', 'images (29).jpg', 20000, 'Bisa request ingin disemir atau tidak', 199, 10),
(123, '0193', 32, 'Baju Brokat', 'Baju', 'images (28).jpg', 300000, 'Nyaman digunakan untuk ke pura', 18, 4),
(124, '2554', 32, 'Safari Laki-laki', 'Baju', 'images (28).jpg', 300000, 'Bahan tebal tapi nyaman', 8, 4),
(125, '4871', 32, 'Dolpin', 'Patung', 'images (29).jpg', 20000, 'Ada pilihan warna putih atau hitam', 30, 6),
(155, '5', 2, 'Mukena Bali', 'Fashion', 'MukenaBali.jpg', 110000, '<p><strong>MUKENA BALI</strong></p>\r\n', 42, 10);

-- --------------------------------------------------------

--
-- Table structure for table `itemc1`
--

CREATE TABLE `itemc1` (
  `id_itemc1` int(5) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `kditem` varchar(5) NOT NULL,
  `support_count` int(11) NOT NULL,
  `persen_support` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemc1`
--

INSERT INTO `itemc1` (`id_itemc1`, `id_toko`, `kditem`, `support_count`, `persen_support`) VALUES
(24369, 33, '0996', 2, '18.18'),
(24370, 33, '8793', 5, '45.45'),
(24371, 33, '4572', 4, '36.36'),
(24372, 33, '6473', 1, '9.090'),
(24373, 33, '0563', 5, '45.45'),
(24374, 33, '0048', 8, '72.72'),
(24375, 33, '0022', 7, '63.63'),
(24376, 33, '9548', 1, '9.090'),
(24377, 33, '5111', 5, '45.45'),
(24378, 33, '1259', 6, '54.54'),
(27974, 2, '6', 4, '14.81'),
(27975, 2, '7', 8, '29.62'),
(27976, 2, '9', 7, '25.92'),
(27977, 2, '10', 2, '7.407'),
(27978, 2, '11', 4, '14.81'),
(27979, 2, '12', 1, '3.703'),
(27980, 2, '14', 2, '7.407'),
(27981, 2, '1', 15, '55.55'),
(27982, 2, '2', 10, '37.03'),
(27983, 2, '3', 10, '37.03'),
(27984, 2, '4', 20, '74.07'),
(27985, 2, '8', 8, '29.62'),
(27986, 2, '5', 5, '18.51'),
(28179, 19, '5', 15, '23.80'),
(28180, 19, '6', 15, '23.80'),
(28181, 19, '7', 23, '36.50'),
(28182, 19, '9', 16, '25.39'),
(28183, 19, '10', 17, '26.98'),
(28184, 19, '11', 27, '42.85'),
(28185, 19, '12', 15, '23.80'),
(28186, 19, '8', 10, '15.87'),
(28187, 19, '1', 12, '19.04'),
(28188, 19, '2', 12, '19.04'),
(28189, 19, '3', 20, '31.74'),
(28190, 19, '4', 21, '33.33'),
(28254, 32, '1073', 2, '22.22'),
(28255, 32, '4007', 4, '44.44'),
(28256, 32, '1513', 3, '33.33'),
(28257, 32, '3590', 3, '33.33'),
(28258, 32, '7956', 4, '44.44'),
(28259, 32, '5381', 2, '22.22'),
(28260, 32, '1024', 2, '22.22'),
(28261, 32, '0485', 4, '44.44'),
(28262, 32, '4347', 3, '33.33'),
(28263, 32, '0193', 3, '33.33'),
(28264, 32, '2554', 2, '22.22'),
(28265, 32, '4871', 2, '22.22');

-- --------------------------------------------------------

--
-- Table structure for table `itemc2`
--

CREATE TABLE `itemc2` (
  `id_itemc2` int(5) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `kditem1` varchar(5) NOT NULL,
  `kditem2` varchar(5) NOT NULL,
  `support_count` int(5) NOT NULL,
  `persen_support` double NOT NULL,
  `lift_ratio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemc2`
--

INSERT INTO `itemc2` (`id_itemc2`, `id_toko`, `kditem1`, `kditem2`, `support_count`, `persen_support`, `lift_ratio`) VALUES
(43009, 33, '0022', '0048', 6, 54.545454545455, 1.12),
(43010, 33, '0022', '0563', 2, 18.181818181818, 0.5),
(43011, 33, '0022', '0996', 1, 9.0909090909091, 0),
(43012, 33, '0022', '1259', 4, 36.363636363636, 0.85),
(43013, 33, '0022', '4572', 3, 27.272727272727, 1.12),
(43014, 33, '0022', '5111', 3, 27.272727272727, 0.9),
(43015, 33, '0022', '6473', 1, 9.0909090909091, 0),
(43016, 33, '0022', '8793', 4, 36.363636363636, 1.2),
(43017, 33, '0022', '9548', 0, 0, 0),
(43018, 33, '0048', '0563', 4, 36.363636363636, 1),
(43019, 33, '0048', '0996', 1, 9.0909090909091, 0),
(43020, 33, '0048', '1259', 4, 36.363636363636, 0.85),
(43021, 33, '0048', '4572', 3, 27.272727272727, 1.12),
(43022, 33, '0048', '5111', 5, 45.454545454545, 1.5),
(43023, 33, '0048', '6473', 1, 9.0909090909091, 0),
(43024, 33, '0048', '8793', 4, 36.363636363636, 1.2),
(43025, 33, '0048', '9548', 0, 0, 0),
(43026, 33, '0563', '0996', 0, 0, 0),
(43027, 33, '0563', '1259', 1, 9.0909090909091, 0),
(43028, 33, '0563', '4572', 1, 9.0909090909091, 0),
(43029, 33, '0563', '5111', 3, 27.272727272727, 1.2),
(43030, 33, '0563', '6473', 0, 0, 0),
(43031, 33, '0563', '8793', 2, 18.181818181818, 0.8),
(43032, 33, '0563', '9548', 1, 9.0909090909091, 0),
(43033, 33, '0996', '1259', 2, 18.181818181818, 1.71),
(43034, 33, '0996', '4572', 0, 0, 0),
(43035, 33, '0996', '5111', 0, 0, 0),
(43036, 33, '0996', '6473', 0, 0, 0),
(43037, 33, '0996', '8793', 0, 0, 0),
(43038, 33, '0996', '9548', 0, 0, 0),
(43039, 33, '1259', '4572', 2, 18.181818181818, 0.85),
(43040, 33, '1259', '5111', 2, 18.181818181818, 0.68),
(43041, 33, '1259', '6473', 1, 9.0909090909091, 0),
(43042, 33, '1259', '8793', 2, 18.181818181818, 0.68),
(43043, 33, '1259', '9548', 1, 9.0909090909091, 0),
(43044, 33, '4572', '5111', 3, 27.272727272727, 1.8),
(43045, 33, '4572', '6473', 1, 9.0909090909091, 0),
(43046, 33, '4572', '8793', 2, 18.181818181818, 1.2),
(43047, 33, '4572', '9548', 0, 0, 0),
(43048, 33, '5111', '6473', 1, 9.0909090909091, 0),
(43049, 33, '5111', '8793', 3, 27.272727272727, 1.44),
(43050, 33, '5111', '9548', 0, 0, 0),
(43051, 33, '6473', '8793', 0, 0, 0),
(43052, 33, '6473', '9548', 0, 0, 0),
(43053, 33, '8793', '9548', 0, 0, 0),
(50025, 2, '1', '10', 1, 3.7037037037037, 0),
(50026, 2, '1', '11', 3, 11.111111111111, 1.35),
(50027, 2, '1', '12', 0, 0, 0),
(50028, 2, '1', '14', 0, 0, 0),
(50029, 2, '1', '2', 6, 22.222222222222, 1.08),
(50030, 2, '1', '3', 3, 11.111111111111, 0.54),
(50031, 2, '1', '4', 10, 37.037037037037, 0.9),
(50032, 2, '1', '5', 2, 7.4074074074074, 0),
(50033, 2, '1', '6', 1, 3.7037037037037, 0),
(50034, 2, '1', '7', 3, 11.111111111111, 0.67),
(50035, 2, '1', '8', 3, 11.111111111111, 0.67),
(50036, 2, '1', '9', 5, 18.518518518519, 1.28),
(50037, 2, '10', '11', 0, 0, 0),
(50038, 2, '10', '12', 0, 0, 0),
(50039, 2, '10', '14', 0, 0, 0),
(50040, 2, '10', '2', 1, 3.7037037037037, 0),
(50041, 2, '10', '3', 0, 0, 0),
(50042, 2, '10', '4', 0, 0, 0),
(50043, 2, '10', '5', 0, 0, 0),
(50044, 2, '10', '6', 1, 3.7037037037037, 0),
(50045, 2, '10', '7', 1, 3.7037037037037, 0),
(50046, 2, '10', '8', 1, 3.7037037037037, 0),
(50047, 2, '10', '9', 0, 0, 0),
(50048, 2, '11', '12', 0, 0, 0),
(50049, 2, '11', '14', 0, 0, 0),
(50050, 2, '11', '2', 2, 7.4074074074074, 0),
(50051, 2, '11', '3', 1, 3.7037037037037, 0),
(50052, 2, '11', '4', 2, 7.4074074074074, 0),
(50053, 2, '11', '5', 2, 7.4074074074074, 0),
(50054, 2, '11', '6', 1, 3.7037037037037, 0),
(50055, 2, '11', '7', 1, 3.7037037037037, 0),
(50056, 2, '11', '8', 2, 7.4074074074074, 0),
(50057, 2, '11', '9', 0, 0, 0),
(50058, 2, '12', '14', 0, 0, 0),
(50059, 2, '12', '2', 0, 0, 0),
(50060, 2, '12', '3', 1, 3.7037037037037, 0),
(50061, 2, '12', '4', 1, 3.7037037037037, 0),
(50062, 2, '12', '5', 0, 0, 0),
(50063, 2, '12', '6', 1, 3.7037037037037, 0),
(50064, 2, '12', '7', 1, 3.7037037037037, 0),
(50065, 2, '12', '8', 0, 0, 0),
(50066, 2, '12', '9', 0, 0, 0),
(50067, 2, '14', '2', 0, 0, 0),
(50068, 2, '14', '3', 1, 3.7037037037037, 0),
(50069, 2, '14', '4', 2, 7.4074074074074, 0),
(50070, 2, '14', '5', 0, 0, 0),
(50071, 2, '14', '6', 1, 3.7037037037037, 0),
(50072, 2, '14', '7', 1, 3.7037037037037, 0),
(50073, 2, '14', '8', 2, 7.4074074074074, 0),
(50074, 2, '14', '9', 0, 0, 0),
(50075, 2, '2', '3', 4, 14.814814814815, 1.08),
(50076, 2, '2', '4', 6, 22.222222222222, 0.81),
(50077, 2, '2', '5', 1, 3.7037037037037, 0),
(50078, 2, '2', '6', 0, 0, 0),
(50079, 2, '2', '7', 1, 3.7037037037037, 0),
(50080, 2, '2', '8', 1, 3.7037037037037, 0),
(50081, 2, '2', '9', 2, 7.4074074074074, 0),
(50082, 2, '3', '4', 7, 25.925925925926, 0.94),
(50083, 2, '3', '5', 2, 7.4074074074074, 0),
(50084, 2, '3', '6', 1, 3.7037037037037, 0),
(50085, 2, '3', '7', 3, 11.111111111111, 1.01),
(50086, 2, '3', '8', 3, 11.111111111111, 1.01),
(50087, 2, '3', '9', 2, 7.4074074074074, 0),
(50088, 2, '4', '5', 3, 11.111111111111, 0.81),
(50089, 2, '4', '6', 3, 11.111111111111, 1.01),
(50090, 2, '4', '7', 6, 22.222222222222, 1.01),
(50091, 2, '4', '8', 6, 22.222222222222, 1.01),
(50092, 2, '4', '9', 5, 18.518518518519, 0.96),
(50093, 2, '5', '6', 0, 0, 0),
(50094, 2, '5', '7', 3, 11.111111111111, 2.02),
(50095, 2, '5', '8', 3, 11.111111111111, 2.02),
(50096, 2, '5', '9', 0, 0, 0),
(50097, 2, '6', '7', 2, 7.4074074074074, 0),
(50098, 2, '6', '8', 3, 11.111111111111, 2.53),
(50099, 2, '6', '9', 0, 0, 0),
(50100, 2, '7', '8', 5, 18.518518518519, 2.1),
(50101, 2, '7', '9', 1, 3.7037037037037, 0),
(50102, 2, '8', '9', 0, 0, 0),
(50631, 19, '1', '10', 4, 6.3492063492063, 0),
(50632, 19, '1', '11', 2, 3.1746031746032, 0),
(50633, 19, '1', '12', 2, 3.1746031746032, 0),
(50634, 19, '1', '2', 2, 3.1746031746032, 0),
(50635, 19, '1', '3', 2, 3.1746031746032, 0),
(50636, 19, '1', '4', 4, 6.3492063492063, 0),
(50637, 19, '1', '5', 3, 4.7619047619048, 0),
(50638, 19, '1', '6', 2, 3.1746031746032, 0),
(50639, 19, '1', '7', 5, 7.9365079365079, 0),
(50640, 19, '1', '8', 3, 4.7619047619048, 0),
(50641, 19, '1', '9', 2, 3.1746031746032, 0),
(50642, 19, '10', '11', 7, 11.111111111111, 0.96),
(50643, 19, '10', '12', 2, 3.1746031746032, 0),
(50644, 19, '10', '2', 3, 4.7619047619048, 0),
(50645, 19, '10', '3', 4, 6.3492063492063, 0),
(50646, 19, '10', '4', 4, 6.3492063492063, 0),
(50647, 19, '10', '5', 5, 7.9365079365079, 0),
(50648, 19, '10', '6', 3, 4.7619047619048, 0),
(50649, 19, '10', '7', 5, 7.9365079365079, 0),
(50650, 19, '10', '8', 4, 6.3492063492063, 0),
(50651, 19, '10', '9', 5, 7.9365079365079, 0),
(50652, 19, '11', '12', 8, 12.698412698413, 1.24),
(50653, 19, '11', '2', 6, 9.5238095238095, 0),
(50654, 19, '11', '3', 5, 7.9365079365079, 0),
(50655, 19, '11', '4', 8, 12.698412698413, 0.88),
(50656, 19, '11', '5', 6, 9.5238095238095, 0),
(50657, 19, '11', '6', 7, 11.111111111111, 1.08),
(50658, 19, '11', '7', 8, 12.698412698413, 0.81),
(50659, 19, '11', '8', 4, 6.3492063492063, 0),
(50660, 19, '11', '9', 7, 11.111111111111, 1.02),
(50661, 19, '12', '2', 3, 4.7619047619048, 0),
(50662, 19, '12', '3', 2, 3.1746031746032, 0),
(50663, 19, '12', '4', 5, 7.9365079365079, 0),
(50664, 19, '12', '5', 2, 3.1746031746032, 0),
(50665, 19, '12', '6', 4, 6.3492063492063, 0),
(50666, 19, '12', '7', 4, 6.3492063492063, 0),
(50667, 19, '12', '8', 4, 6.3492063492063, 0),
(50668, 19, '12', '9', 2, 3.1746031746032, 0),
(50669, 19, '2', '3', 3, 4.7619047619048, 0),
(50670, 19, '2', '4', 1, 1.5873015873016, 0),
(50671, 19, '2', '5', 2, 3.1746031746032, 0),
(50672, 19, '2', '6', 1, 1.5873015873016, 0),
(50673, 19, '2', '7', 4, 6.3492063492063, 0),
(50674, 19, '2', '8', 2, 3.1746031746032, 0),
(50675, 19, '2', '9', 1, 1.5873015873016, 0),
(50676, 19, '3', '4', 7, 11.111111111111, 1.05),
(50677, 19, '3', '5', 2, 3.1746031746032, 0),
(50678, 19, '3', '6', 4, 6.3492063492063, 0),
(50679, 19, '3', '7', 9, 14.285714285714, 1.23),
(50680, 19, '3', '8', 1, 1.5873015873016, 0),
(50681, 19, '3', '9', 5, 7.9365079365079, 0),
(50682, 19, '4', '5', 3, 4.7619047619048, 0),
(50683, 19, '4', '6', 3, 4.7619047619048, 0),
(50684, 19, '4', '7', 8, 12.698412698413, 1.04),
(50685, 19, '4', '8', 5, 7.9365079365079, 0),
(50686, 19, '4', '9', 4, 6.3492063492063, 0),
(50687, 19, '5', '6', 5, 7.9365079365079, 0),
(50688, 19, '5', '7', 4, 6.3492063492063, 0),
(50689, 19, '5', '8', 4, 6.3492063492063, 0),
(50690, 19, '5', '9', 4, 6.3492063492063, 0),
(50691, 19, '6', '7', 3, 4.7619047619048, 0),
(50692, 19, '6', '8', 2, 3.1746031746032, 0),
(50693, 19, '6', '9', 5, 7.9365079365079, 0),
(50694, 19, '7', '8', 1, 1.5873015873016, 0),
(50695, 19, '7', '9', 3, 4.7619047619048, 0),
(50696, 19, '8', '9', 4, 6.3492063492063, 0),
(50697, 32, '0193', '0485', 1, 11.111111111111, 0.75),
(50698, 32, '0193', '1024', 1, 11.111111111111, 1.5),
(50699, 32, '0193', '1073', 0, 0, 0),
(50700, 32, '0193', '1513', 2, 22.222222222222, 2),
(50701, 32, '0193', '2554', 1, 11.111111111111, 1.5),
(50702, 32, '0193', '3590', 2, 22.222222222222, 2),
(50703, 32, '0193', '4007', 0, 0, 0),
(50704, 32, '0193', '4347', 0, 0, 0),
(50705, 32, '0193', '4871', 0, 0, 0),
(50706, 32, '0193', '5381', 0, 0, 0),
(50707, 32, '0193', '7956', 2, 22.222222222222, 1.5),
(50708, 32, '0485', '1024', 0, 0, 0),
(50709, 32, '0485', '1073', 2, 22.222222222222, 2.25),
(50710, 32, '0485', '1513', 1, 11.111111111111, 0.75),
(50711, 32, '0485', '2554', 1, 11.111111111111, 1.12),
(50712, 32, '0485', '3590', 1, 11.111111111111, 0.75),
(50713, 32, '0485', '4007', 2, 22.222222222222, 1.12),
(50714, 32, '0485', '4347', 2, 22.222222222222, 1.5),
(50715, 32, '0485', '4871', 1, 11.111111111111, 1.12),
(50716, 32, '0485', '5381', 0, 0, 0),
(50717, 32, '0485', '7956', 2, 22.222222222222, 1.12),
(50718, 32, '1024', '1073', 0, 0, 0),
(50719, 32, '1024', '1513', 1, 11.111111111111, 1.5),
(50720, 32, '1024', '2554', 0, 0, 0),
(50721, 32, '1024', '3590', 0, 0, 0),
(50722, 32, '1024', '4007', 0, 0, 0),
(50723, 32, '1024', '4347', 0, 0, 0),
(50724, 32, '1024', '4871', 1, 11.111111111111, 2.25),
(50725, 32, '1024', '5381', 1, 11.111111111111, 2.25),
(50726, 32, '1024', '7956', 1, 11.111111111111, 1.12),
(50727, 32, '1073', '1513', 1, 11.111111111111, 1.5),
(50728, 32, '1073', '2554', 0, 0, 0),
(50729, 32, '1073', '3590', 0, 0, 0),
(50730, 32, '1073', '4007', 1, 11.111111111111, 1.12),
(50731, 32, '1073', '4347', 2, 22.222222222222, 3),
(50732, 32, '1073', '4871', 1, 11.111111111111, 2.25),
(50733, 32, '1073', '5381', 0, 0, 0),
(50734, 32, '1073', '7956', 0, 0, 0),
(50735, 32, '1513', '2554', 0, 0, 0),
(50736, 32, '1513', '3590', 1, 11.111111111111, 1),
(50737, 32, '1513', '4007', 1, 11.111111111111, 0.75),
(50738, 32, '1513', '4347', 1, 11.111111111111, 1),
(50739, 32, '1513', '4871', 0, 0, 0),
(50740, 32, '1513', '5381', 0, 0, 0),
(50741, 32, '1513', '7956', 1, 11.111111111111, 0.75),
(50742, 32, '2554', '3590', 2, 22.222222222222, 3),
(50743, 32, '2554', '4007', 1, 11.111111111111, 1.12),
(50744, 32, '2554', '4347', 0, 0, 0),
(50745, 32, '2554', '4871', 0, 0, 0),
(50746, 32, '2554', '5381', 0, 0, 0),
(50747, 32, '2554', '7956', 1, 11.111111111111, 1.12),
(50748, 32, '3590', '4007', 1, 11.111111111111, 0.75),
(50749, 32, '3590', '4347', 0, 0, 0),
(50750, 32, '3590', '4871', 0, 0, 0),
(50751, 32, '3590', '5381', 0, 0, 0),
(50752, 32, '3590', '7956', 1, 11.111111111111, 0.75),
(50753, 32, '4007', '4347', 2, 22.222222222222, 1.5),
(50754, 32, '4007', '4871', 0, 0, 0),
(50755, 32, '4007', '5381', 1, 11.111111111111, 1.12),
(50756, 32, '4007', '7956', 2, 22.222222222222, 1.12),
(50757, 32, '4347', '4871', 1, 11.111111111111, 1.5),
(50758, 32, '4347', '5381', 1, 11.111111111111, 1.5),
(50759, 32, '4347', '7956', 1, 11.111111111111, 0.75),
(50760, 32, '4871', '5381', 1, 11.111111111111, 2.25),
(50761, 32, '4871', '7956', 0, 0, 0),
(50762, 32, '5381', '7956', 1, 11.111111111111, 1.12);

-- --------------------------------------------------------

--
-- Table structure for table `itemc3`
--

CREATE TABLE `itemc3` (
  `id_itemc3` int(5) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `kditem1` varchar(5) NOT NULL,
  `kditem2` varchar(5) NOT NULL,
  `kditem3` varchar(5) NOT NULL,
  `support_count` int(5) NOT NULL,
  `persen_support` double NOT NULL,
  `lift_ratio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemc3`
--

INSERT INTO `itemc3` (`id_itemc3`, `id_toko`, `kditem1`, `kditem2`, `kditem3`, `support_count`, `persen_support`, `lift_ratio`) VALUES
(159864, 33, '0022', '0048', '0563', 2, 16.666666666667, 0.75),
(159865, 33, '0022', '0048', '0996', 1, 8.3333333333333, 0),
(159866, 33, '0022', '0048', '1259', 4, 33.333333333333, 1.28),
(159867, 33, '0022', '0048', '4572', 2, 16.666666666667, 1.12),
(159868, 33, '0022', '0048', '5111', 3, 25, 1.35),
(159869, 33, '0022', '0048', '6473', 1, 8.3333333333333, 0),
(159870, 33, '0022', '0048', '8793', 3, 25, 1.35),
(159871, 33, '0022', '0048', '9548', 0, 0, 0),
(159872, 33, '0048', '0563', '0996', 0, 0, 0),
(159873, 33, '0048', '0563', '1259', 0, 0, 0),
(159874, 33, '0048', '0563', '4572', 1, 8.3333333333333, 0),
(159875, 33, '0048', '0563', '5111', 3, 25, 1.8),
(159876, 33, '0048', '0563', '6473', 0, 0, 0),
(159877, 33, '0048', '0563', '8793', 2, 16.666666666667, 1.2),
(159878, 33, '0048', '0563', '9548', 0, 0, 0),
(159879, 33, '0563', '0996', '1259', 0, 0, 0),
(159880, 33, '0563', '0996', '4572', 0, 0, 0),
(159881, 33, '0563', '0996', '5111', 0, 0, 0),
(159882, 33, '0563', '0996', '6473', 0, 0, 0),
(159883, 33, '0563', '0996', '8793', 0, 0, 0),
(159884, 33, '0563', '0996', '9548', 0, 0, 0),
(159885, 33, '0996', '1259', '4572', 0, 0, 0),
(159886, 33, '0996', '1259', '5111', 0, 0, 0),
(159887, 33, '0996', '1259', '6473', 0, 0, 0),
(159888, 33, '0996', '1259', '8793', 0, 0, 0),
(159889, 33, '0996', '1259', '9548', 0, 0, 0),
(159890, 33, '1259', '4572', '5111', 2, 16.666666666667, 2.05),
(159891, 33, '1259', '4572', '6473', 1, 8.3333333333333, 0),
(159892, 33, '1259', '4572', '8793', 1, 8.3333333333333, 0),
(159893, 33, '1259', '4572', '9548', 0, 0, 0),
(159894, 33, '4572', '5111', '6473', 1, 8.3333333333333, 0),
(159895, 33, '4572', '5111', '8793', 1, 8.3333333333333, 0),
(159896, 33, '4572', '5111', '9548', 0, 0, 0),
(159897, 33, '5111', '6473', '8793', 0, 0, 0),
(159898, 33, '5111', '6473', '9548', 0, 0, 0),
(159899, 33, '6473', '8793', '9548', 0, 0, 0),
(161848, 2, '1', '10', '11', 1, 1.5873015873016, 0),
(161849, 2, '1', '10', '12', 0, 0, 0),
(161850, 2, '1', '10', '14', 0, 0, 0),
(161851, 2, '1', '10', '2', 1, 1.5873015873016, 0),
(161852, 2, '1', '10', '3', 0, 0, 0),
(161853, 2, '1', '10', '4', 1, 1.5873015873016, 0),
(161854, 2, '1', '10', '5', 0, 0, 0),
(161855, 2, '1', '10', '6', 0, 0, 0),
(161856, 2, '1', '10', '7', 1, 1.5873015873016, 0),
(161857, 2, '1', '10', '8', 2, 3.1746031746032, 0),
(161858, 2, '1', '10', '9', 1, 1.5873015873016, 0),
(161859, 2, '10', '11', '12', 1, 1.5873015873016, 0),
(161860, 2, '10', '11', '14', 0, 0, 0),
(161861, 2, '10', '11', '2', 0, 0, 0),
(161862, 2, '10', '11', '3', 0, 0, 0),
(161863, 2, '10', '11', '4', 2, 3.1746031746032, 0),
(161864, 2, '10', '11', '5', 3, 4.7619047619048, 0),
(161865, 2, '10', '11', '6', 1, 1.5873015873016, 0),
(161866, 2, '10', '11', '7', 1, 1.5873015873016, 0),
(161867, 2, '10', '11', '8', 2, 3.1746031746032, 0),
(161868, 2, '10', '11', '9', 2, 3.1746031746032, 0),
(161869, 2, '11', '12', '14', 0, 0, 0),
(161870, 2, '11', '12', '2', 3, 4.7619047619048, 0),
(161871, 2, '11', '12', '3', 0, 0, 0),
(161872, 2, '11', '12', '4', 3, 4.7619047619048, 0),
(161873, 2, '11', '12', '5', 1, 1.5873015873016, 0),
(161874, 2, '11', '12', '6', 1, 1.5873015873016, 0),
(161875, 2, '11', '12', '7', 2, 3.1746031746032, 0),
(161876, 2, '11', '12', '8', 2, 3.1746031746032, 0),
(161877, 2, '11', '12', '9', 1, 1.5873015873016, 0),
(161878, 2, '12', '14', '2', 0, 0, 0),
(161879, 2, '12', '14', '3', 0, 0, 0),
(161880, 2, '12', '14', '4', 0, 0, 0),
(161881, 2, '12', '14', '5', 0, 0, 0),
(161882, 2, '12', '14', '6', 0, 0, 0),
(161883, 2, '12', '14', '7', 0, 0, 0),
(161884, 2, '12', '14', '8', 0, 0, 0),
(161885, 2, '12', '14', '9', 0, 0, 0),
(161886, 2, '14', '2', '3', 0, 0, 0),
(161887, 2, '14', '2', '4', 0, 0, 0),
(161888, 2, '14', '2', '5', 0, 0, 0),
(161889, 2, '14', '2', '6', 0, 0, 0),
(161890, 2, '14', '2', '7', 0, 0, 0),
(161891, 2, '14', '2', '8', 0, 0, 0),
(161892, 2, '14', '2', '9', 0, 0, 0),
(161893, 2, '2', '3', '4', 0, 0, 0),
(161894, 2, '2', '3', '5', 0, 0, 0),
(161895, 2, '2', '3', '6', 0, 0, 0),
(161896, 2, '2', '3', '7', 1, 1.5873015873016, 0),
(161897, 2, '2', '3', '8', 1, 1.5873015873016, 0),
(161898, 2, '2', '3', '9', 1, 1.5873015873016, 0),
(161899, 2, '3', '4', '5', 0, 0, 0),
(161900, 2, '3', '4', '6', 0, 0, 0),
(161901, 2, '3', '4', '7', 4, 6.3492063492063, 1.36),
(161902, 2, '3', '4', '8', 0, 0, 0),
(161903, 2, '3', '4', '9', 1, 1.5873015873016, 0),
(161904, 2, '4', '5', '6', 1, 1.5873015873016, 0),
(161905, 2, '4', '5', '7', 1, 1.5873015873016, 0),
(161906, 2, '4', '5', '8', 1, 1.5873015873016, 0),
(161907, 2, '4', '5', '9', 0, 0, 0),
(161908, 2, '5', '6', '7', 1, 1.5873015873016, 0),
(161909, 2, '5', '6', '8', 1, 1.5873015873016, 0),
(161910, 2, '5', '6', '9', 1, 1.5873015873016, 0),
(161911, 2, '6', '7', '8', 1, 1.5873015873016, 0),
(161912, 2, '6', '7', '9', 1, 1.5873015873016, 0),
(161913, 2, '7', '8', '9', 0, 0, 0),
(161969, 19, '1', '10', '11', 1, 1.5873015873016, 0),
(161970, 19, '1', '10', '12', 0, 0, 0),
(161971, 19, '1', '10', '2', 1, 1.5873015873016, 0),
(161972, 19, '1', '10', '3', 0, 0, 0),
(161973, 19, '1', '10', '4', 1, 1.5873015873016, 0),
(161974, 19, '1', '10', '5', 0, 0, 0),
(161975, 19, '1', '10', '6', 0, 0, 0),
(161976, 19, '1', '10', '7', 1, 1.5873015873016, 0),
(161977, 19, '1', '10', '8', 2, 3.1746031746032, 0),
(161978, 19, '1', '10', '9', 1, 1.5873015873016, 0),
(161979, 19, '10', '11', '12', 1, 1.5873015873016, 0),
(161980, 19, '10', '11', '2', 0, 0, 0),
(161981, 19, '10', '11', '3', 0, 0, 0),
(161982, 19, '10', '11', '4', 2, 3.1746031746032, 0),
(161983, 19, '10', '11', '5', 3, 4.7619047619048, 0),
(161984, 19, '10', '11', '6', 1, 1.5873015873016, 0),
(161985, 19, '10', '11', '7', 1, 1.5873015873016, 0),
(161986, 19, '10', '11', '8', 2, 3.1746031746032, 0),
(161987, 19, '10', '11', '9', 2, 3.1746031746032, 0),
(161988, 19, '11', '12', '2', 3, 4.7619047619048, 0),
(161989, 19, '11', '12', '3', 0, 0, 0),
(161990, 19, '11', '12', '4', 3, 4.7619047619048, 0),
(161991, 19, '11', '12', '5', 1, 1.5873015873016, 0),
(161992, 19, '11', '12', '6', 1, 1.5873015873016, 0),
(161993, 19, '11', '12', '7', 2, 3.1746031746032, 0),
(161994, 19, '11', '12', '8', 2, 3.1746031746032, 0),
(161995, 19, '11', '12', '9', 1, 1.5873015873016, 0),
(161996, 19, '12', '2', '3', 0, 0, 0),
(161997, 19, '12', '2', '4', 1, 1.5873015873016, 0),
(161998, 19, '12', '2', '5', 0, 0, 0),
(161999, 19, '12', '2', '6', 0, 0, 0),
(162000, 19, '12', '2', '7', 1, 1.5873015873016, 0),
(162001, 19, '12', '2', '8', 1, 1.5873015873016, 0),
(162002, 19, '12', '2', '9', 0, 0, 0),
(162003, 19, '2', '3', '4', 0, 0, 0),
(162004, 19, '2', '3', '5', 0, 0, 0),
(162005, 19, '2', '3', '6', 0, 0, 0),
(162006, 19, '2', '3', '7', 1, 1.5873015873016, 0),
(162007, 19, '2', '3', '8', 1, 1.5873015873016, 0),
(162008, 19, '2', '3', '9', 1, 1.5873015873016, 0),
(162009, 19, '3', '4', '5', 0, 0, 0),
(162010, 19, '3', '4', '6', 0, 0, 0),
(162011, 19, '3', '4', '7', 4, 6.3492063492063, 0),
(162012, 19, '3', '4', '8', 0, 0, 0),
(162013, 19, '3', '4', '9', 1, 1.5873015873016, 0),
(162014, 19, '4', '5', '6', 1, 1.5873015873016, 0),
(162015, 19, '4', '5', '7', 1, 1.5873015873016, 0),
(162016, 19, '4', '5', '8', 1, 1.5873015873016, 0),
(162017, 19, '4', '5', '9', 0, 0, 0),
(162018, 19, '5', '6', '7', 1, 1.5873015873016, 0),
(162019, 19, '5', '6', '8', 1, 1.5873015873016, 0),
(162020, 19, '5', '6', '9', 1, 1.5873015873016, 0),
(162021, 19, '6', '7', '8', 1, 1.5873015873016, 0),
(162022, 19, '6', '7', '9', 1, 1.5873015873016, 0),
(162023, 19, '7', '8', '9', 0, 0, 0),
(162024, 32, '0193', '0485', '1024', 0, 0, 0),
(162025, 32, '0193', '0485', '1073', 0, 0, 0),
(162026, 32, '0193', '0485', '1513', 0, 0, 0),
(162027, 32, '0193', '0485', '2554', 1, 11.111111111111, 3.37),
(162028, 32, '0193', '0485', '3590', 1, 11.111111111111, 2.25),
(162029, 32, '0193', '0485', '4007', 0, 0, 0),
(162030, 32, '0193', '0485', '4347', 0, 0, 0),
(162031, 32, '0193', '0485', '4871', 0, 0, 0),
(162032, 32, '0193', '0485', '5381', 0, 0, 0),
(162033, 32, '0193', '0485', '7956', 1, 11.111111111111, 1.68),
(162034, 32, '0485', '1024', '1073', 0, 0, 0),
(162035, 32, '0485', '1024', '1513', 0, 0, 0),
(162036, 32, '0485', '1024', '2554', 0, 0, 0),
(162037, 32, '0485', '1024', '3590', 0, 0, 0),
(162038, 32, '0485', '1024', '4007', 0, 0, 0),
(162039, 32, '0485', '1024', '4347', 0, 0, 0),
(162040, 32, '0485', '1024', '4871', 0, 0, 0),
(162041, 32, '0485', '1024', '5381', 0, 0, 0),
(162042, 32, '0485', '1024', '7956', 0, 0, 0),
(162043, 32, '1024', '1073', '1513', 0, 0, 0),
(162044, 32, '1024', '1073', '2554', 0, 0, 0),
(162045, 32, '1024', '1073', '3590', 0, 0, 0),
(162046, 32, '1024', '1073', '4007', 0, 0, 0),
(162047, 32, '1024', '1073', '4347', 0, 0, 0),
(162048, 32, '1024', '1073', '4871', 0, 0, 0),
(162049, 32, '1024', '1073', '5381', 0, 0, 0),
(162050, 32, '1024', '1073', '7956', 0, 0, 0),
(162051, 32, '1073', '1513', '2554', 0, 0, 0),
(162052, 32, '1073', '1513', '3590', 0, 0, 0),
(162053, 32, '1073', '1513', '4007', 1, 11.111111111111, 3.37),
(162054, 32, '1073', '1513', '4347', 1, 11.111111111111, 4.5),
(162055, 32, '1073', '1513', '4871', 0, 0, 0),
(162056, 32, '1073', '1513', '5381', 0, 0, 0),
(162057, 32, '1073', '1513', '7956', 0, 0, 0),
(162058, 32, '1513', '2554', '3590', 0, 0, 0),
(162059, 32, '1513', '2554', '4007', 0, 0, 0),
(162060, 32, '1513', '2554', '4347', 0, 0, 0),
(162061, 32, '1513', '2554', '4871', 0, 0, 0),
(162062, 32, '1513', '2554', '5381', 0, 0, 0),
(162063, 32, '1513', '2554', '7956', 0, 0, 0),
(162064, 32, '2554', '3590', '4007', 1, 11.111111111111, 3.37),
(162065, 32, '2554', '3590', '4347', 0, 0, 0),
(162066, 32, '2554', '3590', '4871', 0, 0, 0),
(162067, 32, '2554', '3590', '5381', 0, 0, 0),
(162068, 32, '2554', '3590', '7956', 1, 11.111111111111, 3.37),
(162069, 32, '3590', '4007', '4347', 0, 0, 0),
(162070, 32, '3590', '4007', '4871', 0, 0, 0),
(162071, 32, '3590', '4007', '5381', 0, 0, 0),
(162072, 32, '3590', '4007', '7956', 0, 0, 0),
(162073, 32, '4007', '4347', '4871', 0, 0, 0),
(162074, 32, '4007', '4347', '5381', 1, 11.111111111111, 3.37),
(162075, 32, '4007', '4347', '7956', 1, 11.111111111111, 1.68),
(162076, 32, '4347', '4871', '5381', 0, 0, 0),
(162077, 32, '4347', '4871', '7956', 0, 0, 0),
(162078, 32, '4871', '5381', '7956', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_toko`, `nama_kategori`) VALUES
(1, 2, 'Fashion'),
(2, 2, 'Handycraft'),
(3, 2, 'Art'),
(4, 2, 'Aromatherapy'),
(17, 19, 'fashion'),
(18, 19, 'art'),
(19, 19, 'handycraft'),
(20, 19, 'Spa'),
(36, 32, 'Patung'),
(37, 32, 'Baju'),
(38, 32, 'Udeng'),
(39, 33, 'Fashion'),
(40, 33, 'Art'),
(41, 33, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `kode_order` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `jumlah_transfer` varchar(50) NOT NULL,
  `alamat_kirim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `author` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `kategori` text NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `judul`, `tanggal`, `author`, `isi`, `kategori`, `views`) VALUES
(35, 'SHOPPING PROCEDURE', '2021-01-03 11:22:00', 'admin', '<p style=\"text-align:justify\">The following is the procedure for shopping at our store, please read it carefully and clearly, so that no party feels disadvantaged because they do not understand the existing procedures, and if there are provisions that are not clear, You can ask directly to our customer service,</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">1.Please select the item you need, you can find the item you want by clicking on the item list menu, or searching by category or by name in the search field provided.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">2. If the item you want has been found, please make your choice, whether to add it directly to the shopping cart, or see the details of the item, where in the details a description of the item will be provided, starting from available stock, types of goods, basic materials, as well as a more detailed explanation.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">3. If you are sure of your choice, please click the cart menu to view your shopping details, if you want to increase the number of items you mean, please change the number in the texbox with the number you want and then click the update button to update your shopping data, provided that it does not exceed the existing stock.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">4. If you still want to shop for other items you can click the continue shopping button, or if you are sure and don\'t want to shop anymore, please click the finished shopping button to process your data. </p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">5.Please fill in your complete data as requested, and if you are sure your data is correct, please click the krirm button to continue your order to our customer service, and at the same time you will get feedback from us in the form of overall shopping details along with your transaction code, please indicate your name and the transaction code provided by our application, &nbsp;this code is important to process your next transaction.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">By reading these terms it is hoped that you understand and agree to the terms we have applied, thank you</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Best Regards,</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>UBUDCENTER ADMIN</strong></p>', 'Tips', 666);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `kode_order` varchar(15) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `nama_pembeli` varchar(15) NOT NULL,
  `email_pembeli` varchar(40) NOT NULL,
  `testi_singkat` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam_order` varchar(10) NOT NULL,
  `info_belanja` text NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `kode_order`, `id_toko`, `nama_pembeli`, `email_pembeli`, `testi_singkat`, `tanggal`, `jam_order`, `info_belanja`, `status`) VALUES
(211, '28', 2, 'Susanti', 'susanti@gmail.com', 'Great', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/balihomespa.jpg\">\r\n        <img src=\"../gambar/produk/balihomespa.jpg\" width=80 height=80 align=center border=1px </a></td><td>Bali Home Spa</td><td>Rp. 45.000,-</td><td>3[Items]</td><td>Rp. 135.000,-</td></tr><tr><td>2.</td><td>BR7</td><td><a href=\"../gambar/produk/perakceluk.jpg\">\r\n        <img src=\"../gambar/produk/perakceluk.jpg\" width=80 height=80 align=center border=1px </a></td><td>Perak Celuk</td><td>Rp. 120.000,-</td><td>1[Items]</td><td>Rp. 120.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/layanganbali.jpg\">\r\n        <img src=\"../gambar/produk/layanganbali.jpg\" width=80 height=80 align=center border=1px </a></td><td>Layang-Layang</td><td>Rp. 45.000,-</td><td>1[Items]</td><td>Rp. 45.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 300.000,-</td></tr></table><br>', 'LUNAS'),
(212, '29', 2, 'Hendrick', 'rick@outlook.co.uk', 'nice', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR12</td><td><a href=\"../gambar/produk/kebayabali.jpg\">\r\n        <img src=\"../gambar/produk/kebayabali.jpg\" width=80 height=80 align=center border=1px </a></td><td>Kebaya</td><td>Rp. 150.000,-</td><td>1[Items]</td><td>Rp. 150.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/jogershirt.jpg\">\r\n        <img src=\"../gambar/produk/jogershirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>Joger Shirt</td><td>Rp. 65.000,-</td><td>2[Items]</td><td>Rp. 130.000,-</td></tr><tr><td>3.</td><td>BR7</td><td><a href=\"../gambar/produk/perakceluk.jpg\">\r\n        <img src=\"../gambar/produk/perakceluk.jpg\" width=80 height=80 align=center border=1px </a></td><td>Perak Celuk</td><td>Rp. 120.000,-</td><td>1[Items]</td><td>Rp. 120.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 400.000,-</td></tr></table><br>', 'LUNAS'),
(213, 'JCXhs37DbM', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>1[Items]</td><td>Rp. 250.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.550.000,-</td></tr></table><br>', 'LUNAS'),
(217, 'JCXhs37DbM', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>1[Items]</td><td>Rp. 250.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.550.000,-</td></tr></table><br>', 'LUNAS'),
(218, 'JqFcSopQRK', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 530.000,-</td></tr></table><br>', 'NEW'),
(219, 'FF9wj0YfEq', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>1[Items]</td><td>Rp. 10.000,-</td></tr><tr><td>2.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>1[Items]</td><td>Rp. 90.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.600.000,-</td></tr></table><br>', 'NEW'),
(220, 't6Rae4DtUH', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>3.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.180.000,-</td></tr></table><br>', 'NEW'),
(221, 'z7TY90Lx4Z', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 50.000,-</td></tr></table><br>', 'NEW'),
(222, '1SE2A0QuoC', 19, 'Derwi', 'derwi@gmail.com', 'nice', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>2.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.180.000,-</td></tr></table><br>', 'NEW'),
(223, 'LwhQ76BqVe', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>3.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>4.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.570.000,-</td></tr></table><br>', 'NEW'),
(224, 'SLgFLElC6N', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>3.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.080.000,-</td></tr></table><br>', 'NEW'),
(225, 'qXd77sSGsO', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>2.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.680.000,-</td></tr></table><br>', 'NEW'),
(226, 'E3hbA0fB19', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>3.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.830.000,-</td></tr></table><br>', 'NEW'),
(227, 'vYB4bXfLSf', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.020.000,-</td></tr></table><br>', 'NEW'),
(228, 'KRVA1kznMJ', 19, 'Tika', 'tika@gmail.com', 'Good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>2.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 120.000,-</td></tr></table><br>', 'NEW'),
(229, 'dj7oR0EOVs', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 330.000,-</td></tr></table><br>', 'NEW'),
(230, 'RcNfhQ5CeM', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.300.000,-</td></tr></table><br>', 'NEW'),
(231, '4TpkDdgPPW', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.210.000,-</td></tr></table><br>', 'NEW'),
(232, 'O52QNSTaF7', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>2.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>3.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>4.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>5.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 6.280.000,-</td></tr></table><br>', 'NEW'),
(233, 'ZHRLGyyIWM', 19, 'Sintia', 'Sintia@gmail.com', 'Good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.030.000,-</td></tr></table><br>', 'NEW'),
(234, '9C092FMKr2', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>4[Items]</td><td>Rp. 4.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.300.000,-</td></tr></table><br>', 'NEW'),
(235, 'Nr1dChiCaf', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.060.000,-</td></tr></table><br>', 'NEW'),
(236, 'Nr1dChiCaf', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.060.000,-</td></tr></table><br>', 'NEW'),
(237, 'O92G3KQ7D9', 19, 'winda', 'windabangli@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>4.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.850.000,-</td></tr></table><br>', 'NEW'),
(238, 'nPPvAlm0mr', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>1[Items]</td><td>Rp. 15.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>3[Items]</td><td>Rp. 750.000,-</td></tr><tr><td>3.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>4[Items]</td><td>Rp. 80.000,-</td></tr><tr><td>4.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>1[Items]</td><td>Rp. 150.000,-</td></tr><tr><td>5.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>5[Items]</td><td>Rp. 5.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 5.995.000,-</td></tr></table><br>', 'NEW'),
(239, '0dp1lrZEtO', 19, 'Bayuuu', 'bayu@gmail.com', 'Mantap', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>4.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 6.300.000,-</td></tr></table><br>', 'NEW'),
(240, 'ZwcGGIxSPE', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>2.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.100.000,-</td></tr></table><br>', 'NEW'),
(241, 'cfn8lFGRj0', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>1[Items]</td><td>Rp. 90.000,-</td></tr><tr><td>2.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>3.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.090.000,-</td></tr></table><br>', 'NEW'),
(242, 'mOsj9aSl61', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>1[Items]</td><td>Rp. 250.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 550.000,-</td></tr></table><br>', 'NEW'),
(243, 'eYsdDF8oB1', 19, 'Sadaaaaa', 'sada@gmail.com', 'mantap bosku', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>4.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>5.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.260.000,-</td></tr></table><br>', 'NEW'),
(244, 'gmzoU1As0e', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>1[Items]</td><td>Rp. 15.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 415.000,-</td></tr></table><br>', 'NEW'),
(245, 'l4zPHQ5r7c', 19, 'Yoyo', 'yoyo@gmail.com', 'yes yes keren', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>3.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.820.000,-</td></tr></table><br>', 'NEW'),
(246, 'l4zPHQ5r7c', 19, 'Yoyo', 'yoyo@gmail.com', 'yes yes keren', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>3.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.820.000,-</td></tr></table><br>', 'NEW'),
(247, 'X0ozEzAoLC', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>3[Items]</td><td>Rp. 750.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>1[Items]</td><td>Rp. 750.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.800.000,-</td></tr></table><br>', 'NEW'),
(248, '59RRMPcLXA', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>3.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>4.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.710.000,-</td></tr></table><br>', 'NEW');
INSERT INTO `pembeli` (`id_pembeli`, `kode_order`, `id_toko`, `nama_pembeli`, `email_pembeli`, `testi_singkat`, `tanggal`, `jam_order`, `info_belanja`, `status`) VALUES
(249, 'KhYitWOd3J', 19, 'Windaaa', 'winda@gmail.com', 'nice nice', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.980.000,-</td></tr></table><br>', 'NEW'),
(250, 'GtK1F63AVy', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>3[Items]</td><td>Rp. 450.000,-</td></tr><tr><td>3.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.480.000,-</td></tr></table><br>', 'LUNAS'),
(251, '9y61U0Jm0W', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.020.000,-</td></tr></table><br>', 'NEW'),
(252, 'l4ifGS0dfT', 19, 'Rio', 'rio@gmail.com', 'nice', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>4.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>5.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.520.000,-</td></tr></table><br>', 'NEW'),
(253, 'zMlXF9sJRX', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>2.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>4.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.500.000,-</td></tr></table><br>', 'NEW'),
(254, 'Q4SgLwBkyS', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>3[Items]</td><td>Rp. 3.000.000,-</td></tr><tr><td>2.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>4.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>4[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 7.000.000,-</td></tr></table><br>', 'NEW'),
(255, '3ULGWj89KT', 19, 'Dilan', 'dilan@gmail.com', 'Good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.480.000,-</td></tr></table><br>', 'NEW'),
(256, 'oClPjS60nM', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>10[Items]</td><td>Rp. 10.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 10.800.000,-</td></tr></table><br>', 'NEW'),
(257, 'wpoCTxzUMS', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>1[Items]</td><td>Rp. 250.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>3[Items]</td><td>Rp. 450.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 880.000,-</td></tr></table><br>', 'NEW'),
(258, 'NlPx4ET99A', 19, 'Tina', 'tina@gmail.com', 'Good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.300.000,-</td></tr></table><br>', 'NEW'),
(259, 'DMKN9c8TAF', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>2.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.720.000,-</td></tr></table><br>', 'NEW'),
(260, 'QEjm5Rf3ZZ', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.320.000,-</td></tr></table><br>', 'NEW'),
(261, 'eWpgCf9Mv5', 19, 'Guna', 'guna@gmail.com', 'Good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.180.000,-</td></tr></table><br>', 'NEW'),
(262, 'NffYzmWKww', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>3[Items]</td><td>Rp. 3.000.000,-</td></tr><tr><td>4.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 5.800.000,-</td></tr></table><br>', 'NEW'),
(263, 'TVhNucUwcZ', 19, 'winda', 'niwayanwindayani@gmail.co', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.320.000,-</td></tr></table><br>', 'NEW'),
(264, '6Q65U6joPw', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>4.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.520.000,-</td></tr></table><br>', 'NEW'),
(265, 'GQyvTClGY9', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>5[Items]</td><td>Rp. 750.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>3[Items]</td><td>Rp. 750.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>4.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>1[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>5.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 3.200.000,-</td></tr></table><br>', 'NEW'),
(266, 'GhQDLnczVo', 19, 'Lili', 'lili@gmail.com', 'Good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>2.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>3.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>4.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 3.550.000,-</td></tr></table><br>', 'NEW'),
(267, 'TVQkayXK3e', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>2.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>3.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 240.000,-</td></tr></table><br>', 'NEW'),
(268, '8zl6sx27kF', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>1[Items]</td><td>Rp. 10.000,-</td></tr><tr><td>2.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>5[Items]</td><td>Rp. 5.000.000,-</td></tr><tr><td>4.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>3[Items]</td><td>Rp. 2.250.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 7.440.000,-</td></tr></table><br>', 'NEW'),
(269, 'm5Mj8Zl2XF', 19, 'Baper', 'baper@gmail.com', 'Good.', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>4.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>5.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.020.000,-</td></tr></table><br>', 'NEW'),
(270, 'xJK2LElj1a', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>4.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.420.000,-</td></tr></table><br>', 'NEW'),
(271, 'oYV8kt76mS', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>4[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>2.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>4[Items]</td><td>Rp. 80.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.080.000,-</td></tr></table><br>', 'NEW'),
(272, 'iVX2kXw5dN', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>3[Items]</td><td>Rp. 750.000,-</td></tr><tr><td>2.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>3.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>4[Items]</td><td>Rp. 4.000.000,-</td></tr><tr><td>4.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 5.930.000,-</td></tr></table><br>', 'NEW'),
(273, '7RgeuGHrK2', 19, 'Dino', 'dino@gmail.com', 'Good.', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>2.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>3.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>4.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>5.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.580.000,-</td></tr></table><br>', 'NEW'),
(274, 'fXqqdw0876', 19, 'Ni Wayan Winday', 'windabangli@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.820.000,-</td></tr></table><br>', 'NEW'),
(275, '5MUj8cpQyc', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>4.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.500.000,-</td></tr></table><br>', 'NEW'),
(276, 'YoJolRmgJA', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>3[Items]</td><td>Rp. 45.000,-</td></tr><tr><td>2.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>1[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>4.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>4[Items]</td><td>Rp. 600.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 845.000,-</td></tr></table><br>', 'NEW'),
(277, 'fxQiVCjyUI', 19, 'Ni Wayan Winday', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>2.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>3.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 370.000,-</td></tr></table><br>', 'NEW'),
(278, 'lOX8gWjNpq', 19, 'Bobi', 'bobi@gmail.com', 'Good.', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>2.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.980.000,-</td></tr></table><br>', 'NEW'),
(279, 'pC2y3rHSdc', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>1[Items]</td><td>Rp. 150.000,-</td></tr><tr><td>2.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>3[Items]</td><td>Rp. 3.000.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>4.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>4[Items]</td><td>Rp. 4.000.000,-</td></tr><tr><td>5.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 9.650.000,-</td></tr></table><br>', 'NEW');
INSERT INTO `pembeli` (`id_pembeli`, `kode_order`, `id_toko`, `nama_pembeli`, `email_pembeli`, `testi_singkat`, `tanggal`, `jam_order`, `info_belanja`, `status`) VALUES
(280, 'pcLFQE5dDH', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>1[Items]</td><td>Rp. 15.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>3[Items]</td><td>Rp. 750.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>4.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>1[Items]</td><td>Rp. 750.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.815.000,-</td></tr></table><br>', 'NEW'),
(281, '57OHAnEuhF', 19, 'windayani', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>3.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.630.000,-</td></tr></table><br>', 'NEW'),
(282, '57OHAnEuhF', 19, 'windayani', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>3.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.630.000,-</td></tr></table><br>', 'NEW'),
(283, '57OHAnEuhF', 19, 'windayani', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>3.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.630.000,-</td></tr></table><br>', 'NEW'),
(284, 'G7CByT0k3M', 19, 'Joni', 'joni@gmail.com', 'Good.', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.300.000,-</td></tr></table><br>', 'NEW'),
(285, 'Ycc0tUSFYX', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>4[Items]</td><td>Rp. 200.000,-</td></tr><tr><td>2.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>3.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.240.000,-</td></tr></table><br>', 'NEW'),
(286, 'PmZ6UPoRFZ', 19, 'windayani', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>4.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.070.000,-</td></tr></table><br>', 'NEW'),
(287, '5syQYhetns', 19, 'Rela', 'rela@gmail.com', 'Good.', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>2.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>3.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.080.000,-</td></tr></table><br>', 'NEW'),
(288, '7BoMSwAWsO', 19, 'winda', 'niwayanwindayani@gmail.co', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 710.000,-</td></tr></table><br>', 'NEW'),
(289, 'CbIPrDmtR4', 19, 'winda', 'winda@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.030.000,-</td></tr></table><br>', 'NEW'),
(290, '3MYzotwCAY', 19, 'winda', 'niwayan@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR12</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>barong shirt</td><td>Rp. 90.000,-</td><td>2[Items]</td><td>Rp. 180.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 200.000,-</td></tr></table><br>', 'NEW'),
(291, 'i15j3LDcoI', 19, 'winda', 'wayan@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>2.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>3.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>4.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 480.000,-</td></tr></table><br>', 'NEW'),
(292, '4wD54mPA9x', 19, 'winda', 'wayan@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>3.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 3.530.000,-</td></tr></table><br>', 'NEW'),
(293, '3mPaxqCvpB', 19, 'winda', 'wayan@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>2.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>4.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.400.000,-</td></tr></table><br>', 'LUNAS'),
(294, 'XbSIte92yR', 19, 'winda', 'wayan@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>3.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>4.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.370.000,-</td></tr></table><br>', 'LUNAS'),
(295, 'V42jvwuXIN', 19, 'winda', 'wayan@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>2.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>3.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>4.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>5.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 3.920.000,-</td></tr></table><br>', 'NEW'),
(296, 'jPtEpFHMHq', 19, 'winda', 'wayan@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>4.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.620.000,-</td></tr></table><br>', 'NEW'),
(297, 'wtatOmp16q', 19, 'winda', 'niwayanwin@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>4.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.330.000,-</td></tr></table><br>', 'NEW'),
(298, 'iWqus3JJQD', 19, 'indah', 'wayan@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>4.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.550.000,-</td></tr></table><br>', 'NEW'),
(299, 'VRYfnng4UG', 19, 'winda', 'wayan@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>3.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.030.000,-</td></tr></table><br>', 'NEW'),
(300, 'EGBQ3E9A8z', 19, 'winda', 'wayan@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>4.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.570.000,-</td></tr></table><br>', 'NEW'),
(301, 'x0rneE0f7o', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>2.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>1[Items]</td><td>Rp. 15.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 55.000,-</td></tr></table><br>', 'NEW'),
(302, '7TcQxDU4os', 19, 'winda', 'winda@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>2.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>4.</td><td>BR10</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>lukisan</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 6.040.000,-</td></tr></table><br>', 'NEW'),
(303, 'oIPZEhPnlw', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>1[Items]</td><td>Rp. 15.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>3[Items]</td><td>Rp. 450.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 965.000,-</td></tr></table><br>', 'NEW'),
(304, 'XcoENI7oO6', 19, 'winda', 'winda@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>2[Items]</td><td>Rp. 100.000,-</td></tr><tr><td>3.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>4.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.400.000,-</td></tr></table><br>', 'NEW'),
(305, 'VizGl9uMLe', 19, 'Sade', 'sade@mail.co.id', 'best of all', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>1[Items]</td><td>Rp. 250.000,-</td></tr><tr><td>2.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>3.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>3[Items]</td><td>Rp. 3.000.000,-</td></tr><tr><td>4.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>4[Items]</td><td>Rp. 3.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 6.290.000,-</td></tr></table><br>', 'NEW'),
(306, 'FLy1ezAFSw', 19, 'Sade', 'sade@mail.co.id', 'mantapujiwa', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>3[Items]</td><td>Rp. 450.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 480.000,-</td></tr></table><br>', 'NEW'),
(307, 'DIEojIAWR5', 19, 'winda', 'wayan@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR17</td><td><a href=\"../gambar/produk/download (2).jfif\">\r\n        <img src=\"../gambar/produk/download (2).jfif\" width=80 height=80 align=center border=1px </a></td><td>Bingkai </td><td>Rp. 750.000,-</td><td>2[Items]</td><td>Rp. 1.500.000,-</td></tr><tr><td>3.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.570.000,-</td></tr></table><br>', 'NEW'),
(308, 'BuPlB6gX6b', 19, 'Sade', 'sade@mail.co.id', 'mantapujiwa', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR15</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Topi pantaiku</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>1[Items]</td><td>Rp. 250.000,-</td></tr><tr><td>3.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>3[Items]</td><td>Rp. 3.000.000,-</td></tr><tr><td>4.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 5.290.000,-</td></tr></table><br>', 'NEW'),
(309, 'rJI04uNgh4', 19, 'winda', 'winda@gmail.com', 'bagus', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>2[Items]</td><td>Rp. 2.000.000,-</td></tr><tr><td>2.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>2[Items]</td><td>Rp. 300.000,-</td></tr><tr><td>4.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>2[Items]</td><td>Rp. 20.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 2.820.000,-</td></tr></table><br>', 'NEW'),
(310, 'UYgBu9IQib', 19, 'winda', 'winda@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>4[Items]</td><td>Rp. 200.000,-</td></tr><tr><td>3.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 730.000,-</td></tr></table><br>', 'NEW'),
(311, 'UYgBu9IQib', 19, 'winda', 'winda@gmail.com', 'good', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>4[Items]</td><td>Rp. 200.000,-</td></tr><tr><td>3.</td><td>BR16</td><td><a href=\"../gambar/produk/download (1).jfif\">\r\n        <img src=\"../gambar/produk/download (1).jfif\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>2[Items]</td><td>Rp. 500.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 730.000,-</td></tr></table><br>', 'NEW');
INSERT INTO `pembeli` (`id_pembeli`, `kode_order`, `id_toko`, `nama_pembeli`, `email_pembeli`, `testi_singkat`, `tanggal`, `jam_order`, `info_belanja`, `status`) VALUES
(312, 'Wkwe3EjaKv', 19, 'cantik', 'papipapipum@dodol.co.id', 'yametteee', '0000-00-00', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>jepit rambut</td><td>Rp. 15.000,-</td><td>2[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>2.</td><td>BR6</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>sendal bunga</td><td>Rp. 10.000,-</td><td>3[Items]</td><td>Rp. 30.000,-</td></tr><tr><td>3.</td><td>BR5</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>dress</td><td>Rp. 50.000,-</td><td>1[Items]</td><td>Rp. 50.000,-</td></tr><tr><td>4.</td><td>BR14</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Sabun Kelle</td><td>Rp. 20.000,-</td><td>2[Items]</td><td>Rp. 40.000,-</td></tr><tr><td>5.</td><td>BR13</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>4[Items]</td><td>Rp. 4.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 4.150.000,-</td></tr></table><br>', 'NEW'),
(313, 'OhQ6yO2ENF', 2, 'qwe', 'qw@g.k', 'gg', '2021-05-27', '00:00:00', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7</td><td><a href=\"../gambar/produk/perakceluk.jpg\">\r\n        <img src=\"../gambar/produk/perakceluk.jpg\" width=80 height=80 align=center border=1px </a></td><td>Perak Celuk</td><td>Rp. 120.000,-</td><td>1[Items]</td><td>Rp. 120.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 120.000,-</td></tr></table><br>', 'LUNAS'),
(315, 'jrHEThHhgR', 2, 'Thomas', 'thomas89@outlook.com', 'Good', '2021-05-27', '12:10:23', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/balihomespa.jpg\">\r\n        <img src=\"../gambar/produk/balihomespa.jpg\" width=80 height=80 align=center border=1px </a></td><td>Bali Home Spa</td><td>Rp. 45.000,-</td><td>1[Items]</td><td>Rp. 45.000,-</td></tr><tr><td>2.</td><td>BR4</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>Barong Shirt</td><td>Rp. 67.000,-</td><td>1[Items]</td><td>Rp. 67.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 112.000,-</td></tr></table><br>', 'LUNAS'),
(320, 'rrIvsPDOgq', 19, 'firyan', 'f@y.c', 'asd', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>1[Items]</td><td>Rp. 150.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 150.000,-</td></tr></table><br>', 'LUNAS'),
(321, '7FzNFoJ41e', 19, 'qwe', 'q@t.b', 'qwerty', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/fotoo.jpg\">\r\n        <img src=\"../gambar/produk/fotoo.jpg\" width=80 height=80 align=center border=1px </a></td><td>patung burung</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.000.000,-</td></tr></table><br>', 'NEW'),
(322, '5vSXneBNPT', 19, 'ert', 'e@t.k', 'hhh', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR8</td><td><a href=\"../gambar/produk/boyfriend material.jpg\">\r\n        <img src=\"../gambar/produk/boyfriend material.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Baruna</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.000.000,-</td></tr></table><br>', 'NEW'),
(323, 'jDQ2yZ8KkQ', 19, 'firyan', 'firyan@gmail.com', 'Best', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/download.jfif\">\r\n        <img src=\"../gambar/produk/download.jfif\" width=80 height=80 align=center border=1px </a></td><td>Jaket Dilan </td><td>Rp. 150.000,-</td><td>1[Items]</td><td>Rp. 150.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 150.000,-</td></tr></table><br>', 'NEW'),
(324, 'fsUR1BsA33', 19, 'Bayu', 'bayubaskara007@gmail.com', 'Good', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR3</td><td><a href=\"../gambar/produk/IMG_20210525_174854.jpg\">\r\n        <img src=\"../gambar/produk/IMG_20210525_174854.jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung GWK</td><td>Rp. 250.000,-</td><td>1[Items]</td><td>Rp. 250.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 250.000,-</td></tr></table><br>', 'NEW'),
(325, 'cf5fsWd54o', 2, 'Bayu Baskara', 'bayubaskara007@gmail.com', 'Nice', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Kode Barang</td>\r\n                     <td><b>Nama </td>\r\n                     <td><b>Gambar</b></td>\r\n                     <td><b>Harga</b></td>\r\n                     <td><b>Jumlah Beli</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR9</td><td><a href=\"../gambar/produk/endek.jpg\">\r\n        <img src=\"../gambar/produk/endek.jpg\" width=80 height=80 align=center border=1px </a></td><td>Woven Cloth Endek</td><td>Rp. 210.000,-</td><td>1[Items]</td><td>Rp. 210.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 210.000,-</td></tr></table><br>', 'NEW'),
(343, '6GAsZ7UQEW', 2, 'lucky', 'lucky@gmail.co', 'mantab', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/layanganbali.jpg\">\r\n        <img src=\"../gambar/produk/layanganbali.jpg\" width=80 height=80 align=center border=1px </a></td><td>Layang-Layang</td><td>Rp. 45.000,-</td><td>4[Items]</td><td>Rp. 180.000,-</td></tr><tr><td>2.</td><td>BR9</td><td><a href=\"../gambar/produk/endek.jpg\">\r\n        <img src=\"../gambar/produk/endek.jpg\" width=80 height=80 align=center border=1px </a></td><td>Woven Cloth Endek</td><td>Rp. 210.000,-</td><td>1[Items]</td><td>Rp. 210.000,-</td></tr><tr><td>3.</td><td>BR4</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>Barong Shirt</td><td>Rp. 67.000,-</td><td>1[Items]</td><td>Rp. 67.000,-</td></tr><tr><td>4.</td><td>BR1</td><td><a href=\"../gambar/produk/jogershirt.jpg\">\r\n        <img src=\"../gambar/produk/jogershirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>Joger Shirt</td><td>Rp. 65.000,-</td><td>1[Items]</td><td>Rp. 65.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 522.000,-</td></tr></table><br>', 'NEW'),
(344, 'ObRNkSo08V', 2, 'Theresia', 'theresiagirsang89@gmail.c', 'Good', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR4</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>Barong Shirt</td><td>Rp. 67.000,-</td><td>1[Items]</td><td>Rp. 67.000,-</td></tr><tr><td>2.</td><td>BR8</td><td><a href=\"../gambar/produk/ethnicsandal.jpg\">\r\n        <img src=\"../gambar/produk/ethnicsandal.jpg\" width=80 height=80 align=center border=1px </a></td><td>Ethnic Sandals</td><td>Rp. 70.000,-</td><td>1[Items]</td><td>Rp. 70.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 137.000,-</td></tr></table><br>', 'NEW'),
(345, 'vKLpNKL93t', 2, 'Derwi', 'derwiinalle@gmail.com', 'Good', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR11</td><td><a href=\"../gambar/produk/layanganbali.jpg\">\r\n        <img src=\"../gambar/produk/layanganbali.jpg\" width=80 height=80 align=center border=1px </a></td><td>Layang-Layang</td><td>Rp. 45.000,-</td><td>1[Items]</td><td>Rp. 45.000,-</td></tr><tr><td>2.</td><td>BR8</td><td><a href=\"../gambar/produk/ethnicsandal.jpg\">\r\n        <img src=\"../gambar/produk/ethnicsandal.jpg\" width=80 height=80 align=center border=1px </a></td><td>Ethnic Sandals</td><td>Rp. 70.000,-</td><td>1[Items]</td><td>Rp. 70.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 115.000,-</td></tr></table><br>', 'NEW'),
(346, 'TuNDe0uuvT', 2, 'Ananta', 'anantakun02@gmail.com', 'Good', '0000-00-00', '', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR2</td><td><a href=\"../gambar/produk/batikbali.jpg\">\r\n        <img src=\"../gambar/produk/batikbali.jpg\" width=80 height=80 align=center border=1px </a></td><td>Balinese Batik</td><td>Rp. 120.000,-</td><td>1[Items]</td><td>Rp. 120.000,-</td></tr><tr><td>2.</td><td>BR9</td><td><a href=\"../gambar/produk/endek.jpg\">\r\n        <img src=\"../gambar/produk/endek.jpg\" width=80 height=80 align=center border=1px </a></td><td>Woven Cloth Endek</td><td>Rp. 210.000,-</td><td>1[Items]</td><td>Rp. 210.000,-</td></tr><tr><td>3.</td><td>BR11</td><td><a href=\"../gambar/produk/layanganbali.jpg\">\r\n        <img src=\"../gambar/produk/layanganbali.jpg\" width=80 height=80 align=center border=1px </a></td><td>Layang-Layang</td><td>Rp. 45.000,-</td><td>1[Items]</td><td>Rp. 45.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 375.000,-</td></tr></table><br>', 'LUNAS'),
(348, '8pAmdkaDGI', 2, 'Firyanul Rizky', 'firyanulrizky@student.unud.ac.id', 'Impressive', '2021-07-28', '10:57:19', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR6</td><td><a href=\"../gambar/produk/balihomespa.jpg\">\r\n        <img src=\"../gambar/produk/balihomespa.jpg\" width=80 height=80 align=center border=1px </a></td><td>Bali Home Spa</td><td>Rp. 45.000,-</td><td>1[Items]</td><td>Rp. 45.000,-</td></tr><tr><td>2.</td><td>BR7</td><td><a href=\"../gambar/produk/perakceluk.jpg\">\r\n        <img src=\"../gambar/produk/perakceluk.jpg\" width=80 height=80 align=center border=1px </a></td><td>Perak Celuk</td><td>Rp. 120.000,-</td><td>1[Items]</td><td>Rp. 120.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 165.000,-</td></tr></table><br>', 'NEW'),
(349, 'IsYkCXLF30', 2, 'Firyan', 'firyan2903@gmail.com', 'Best', '2021-07-28', '12:01:35', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5</td><td><a href=\"../gambar/produk/MukenaBali.jpg\">\r\n        <img src=\"../gambar/produk/MukenaBali.jpg\" width=80 height=80 align=center border=1px </a></td><td>Mukena Bali</td><td>Rp. 110.000,-</td><td>1[Items]</td><td>Rp. 110.000,-</td></tr><tr><td>2.</td><td>BR3</td><td><a href=\"../gambar/produk/manik-manik.jpg\">\r\n        <img src=\"../gambar/produk/manik-manik.jpg\" width=80 height=80 align=center border=1px </a></td><td>Manik-Manik Craft</td><td>Rp. 65.000,-</td><td>1[Items]</td><td>Rp. 65.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 175.000,-</td></tr></table><br>', 'NEW'),
(350, 'BjSiNTxYXZ', 2, 'Ari', 'firyan2903@gmail.com', 'Good', '2021-09-04', '20:19:51', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR4</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>Barong Shirt</td><td>Rp. 67.000,-</td><td>1[Items]</td><td>Rp. 67.000,-</td></tr><tr><td>2.</td><td>BR5</td><td><a href=\"../gambar/produk/MukenaBali.jpg\">\r\n        <img src=\"../gambar/produk/MukenaBali.jpg\" width=80 height=80 align=center border=1px </a></td><td>Mukena Bali</td><td>Rp. 110.000,-</td><td>1[Items]</td><td>Rp. 110.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 177.000,-</td></tr></table><br>', 'NEW'),
(351, 'MOpDVAJCzc', 2, 'Firyanul Rizky', 'firyan2903@gmail.com', 'Good', '2021-09-06', '14:16:41', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR4</td><td><a href=\"../gambar/produk/barongshirt.jpg\">\r\n        <img src=\"../gambar/produk/barongshirt.jpg\" width=80 height=80 align=center border=1px </a></td><td>Barong Shirt</td><td>Rp. 67.000,-</td><td>1[Items]</td><td>Rp. 67.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 67.000,-</td></tr></table><br>', 'NEW'),
(353, 'kbsMWkeM6p', 32, 'Levi Ackerman', 'firyan2903@gmail.com', 'tcih', '2021-11-15', '19:21:35', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR4007</td><td><a href=\"../gambar/produk/images (28).jpg\">\r\n        <img src=\"../gambar/produk/images (28).jpg\" width=80 height=80 align=center border=1px </a></td><td>Baju Barong Merah</td><td>Rp. 20.000,-</td><td>1[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>2.</td><td>BR3590</td><td><a href=\"../gambar/produk/images (29).jpg\">\r\n        <img src=\"../gambar/produk/images (29).jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Janger</td><td>Rp. 200.000,-</td><td>1[Items]</td><td>Rp. 200.000,-</td></tr><tr><td>3.</td><td>BR2554</td><td><a href=\"../gambar/produk/images (28).jpg\">\r\n        <img src=\"../gambar/produk/images (28).jpg\" width=80 height=80 align=center border=1px </a></td><td>Safari Laki-laki</td><td>Rp. 300.000,-</td><td>1[Items]</td><td>Rp. 300.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 520.000,-</td></tr></table><br>', 'NEW'),
(354, 'VriSiqyu98', 32, 'Armin Arlert', 'firyan2903@gmail.com', 'best', '2021-11-15', '19:27:36', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR5381</td><td><a href=\"../gambar/produk/imagefs (28).jpg\">\r\n        <img src=\"../gambar/produk/imagefs (28).jpg\" width=80 height=80 align=center border=1px </a></td><td>Asmat</td><td>Rp. 50.000,-</td><td>1[Items]</td><td>Rp. 50.000,-</td></tr><tr><td>2.</td><td>BR4347</td><td><a href=\"../gambar/produk/images (29).jpg\">\r\n        <img src=\"../gambar/produk/images (29).jpg\" width=80 height=80 align=center border=1px </a></td><td>Kodok</td><td>Rp. 20.000,-</td><td>1[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>3.</td><td>BR7956</td><td><a href=\"../gambar/produk/images (30).jpg\">\r\n        <img src=\"../gambar/produk/images (30).jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Barong</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>4.</td><td>BR4007</td><td><a href=\"../gambar/produk/images (28).jpg\">\r\n        <img src=\"../gambar/produk/images (28).jpg\" width=80 height=80 align=center border=1px </a></td><td>Baju Barong Merah</td><td>Rp. 20.000,-</td><td>1[Items]</td><td>Rp. 20.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.090.000,-</td></tr></table><br>', 'NEW'),
(356, 'PGElJvqOKc', 32, 'Eren Yeager', 'firyan2903@gmail.com', 'top', '2021-11-15', '19:37:11', '<center><H3></H3></center><table  cellspacing=0 cellpadding=0 id=\"checkout_last\"><tr><td><b>NO</td>\r\n                     <td><b>Product ID</td>\r\n                     <td><b>Name </td>\r\n                     <td><b>Image</b></td>\r\n                     <td><b>Price</b></td>\r\n                     <td><b>Total</b></td>\r\n                     <td><b>Subtotal</b></td>\r\n\r\n                     </tr><tr><td>1.</td><td>BR7956</td><td><a href=\"../gambar/produk/images (30).jpg\">\r\n        <img src=\"../gambar/produk/images (30).jpg\" width=80 height=80 align=center border=1px </a></td><td>Patung Barong</td><td>Rp. 1.000.000,-</td><td>1[Items]</td><td>Rp. 1.000.000,-</td></tr><tr><td>2.</td><td>BR4007</td><td><a href=\"../gambar/produk/images (28).jpg\">\r\n        <img src=\"../gambar/produk/images (28).jpg\" width=80 height=80 align=center border=1px </a></td><td>Baju Barong Merah</td><td>Rp. 20.000,-</td><td>1[Items]</td><td>Rp. 20.000,-</td></tr><tr><td>3.</td><td>BR0485</td><td><a href=\"../gambar/produk/images (31).jpg\">\r\n        <img src=\"../gambar/produk/images (31).jpg\" width=80 height=80 align=center border=1px </a></td><td>Udeng Putih Polos</td><td>Rp. 10.000,-</td><td>1[Items]</td><td>Rp. 10.000,-</td></tr><tr><td colspan=\"5\"  class=\"num\">TOTAL BAYAR</td><td>Rp. 1.030.000,-</td></tr></table><br>', 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_hasil` int(5) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `kditem` varchar(5) NOT NULL,
  `produk` varchar(25) NOT NULL,
  `Januari` int(5) NOT NULL,
  `Februari` int(5) NOT NULL,
  `Maret` int(5) NOT NULL,
  `April` int(5) NOT NULL,
  `Mei` int(5) NOT NULL,
  `Juni` int(5) NOT NULL,
  `Juli` int(5) NOT NULL,
  `Agustus` int(5) NOT NULL,
  `September` int(5) NOT NULL,
  `Oktober` int(5) NOT NULL,
  `November` int(5) NOT NULL,
  `Desember` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id_hasil`, `id_toko`, `kditem`, `produk`, `Januari`, `Februari`, `Maret`, `April`, `Mei`, `Juni`, `Juli`, `Agustus`, `September`, `Oktober`, `November`, `Desember`) VALUES
(258, 33, '0996', 'Sendal', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(259, 33, '8793', 'Jepit bunga', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(260, 33, '4572', 'Baju', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(261, 33, '6473', 'Baju barong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(262, 33, '1373', 'Lukisan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(263, 33, '0563', 'Patung kuda', 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(264, 33, '0048', 'Flat shoes', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(265, 33, '0022', 'Sneakers', 350000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(266, 33, '9548', 'Hiasan dinding', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(267, 33, '5111', 'Gantungan kunci', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(268, 33, '1259', 'Gelang', 10000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(273, 2, '6', 'Bali Home Spa', 0, 45000, 0, 0, 0, 0, 0, 0, 0, 0, 45000, 0),
(274, 2, '7', 'Perak Celuk', 0, 240000, 0, 0, 0, 120000, 0, 0, 0, 0, 240000, 0),
(275, 2, '9', 'Woven Cloth Endek', 210000, 0, 210000, 0, 210000, 0, 210000, 210000, 0, 210000, 210000, 0),
(276, 2, '10', 'Traditional Painting', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(277, 2, '11', 'Layang-Layang', 0, 0, 0, 0, 0, 45000, 0, 0, 0, 0, 90000, 0),
(278, 2, '12', 'Kebaya', 0, 150000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(279, 2, '13', 'Palm Leaf Painting', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(280, 2, '14', 'Dreamcatcher', 0, 58000, 0, 0, 0, 0, 0, 0, 0, 0, 58000, 0),
(281, 2, '15', 'Pandora Box', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(282, 2, '1', 'Joger Shirt', 130000, 0, 0, 65000, 65000, 0, 65000, 130000, 65000, 65000, 260000, 0),
(283, 2, '2', 'Balinese Batik', 120000, 0, 0, 120000, 0, 120000, 120000, 240000, 0, 0, 480000, 0),
(284, 2, '3', 'Manik-Manik Craft', 0, 130000, 65000, 0, 0, 130000, 0, 195000, 65000, 0, 65000, 0),
(285, 2, '4', 'Barong Shirt', 134000, 134000, 67000, 67000, 67000, 67000, 0, 67000, 67000, 67000, 335000, 0),
(286, 2, '8', 'Ethnic Sandals', 0, 70000, 0, 0, 0, 140000, 0, 0, 0, 0, 70000, 0),
(287, 2, '6826', 'Coa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(288, 2, '5', 'Mukena Bali', 0, 0, 0, 0, 0, 220000, 0, 0, 0, 0, 110000, 0),
(316, 19, '5', 'Bali Long Dress', 50000, 100000, 200000, 50000, 150000, 0, 450000, 50000, 50000, 0, 0, 100000),
(317, 19, '6', 'Ethnic Sendals', 20000, 10000, 30000, 10000, 20000, 20000, 90000, 20000, 10000, 20000, 30000, 40000),
(318, 19, '7', 'Engraved Hair Clips', 30000, 75000, 45000, 90000, 60000, 45000, 135000, 45000, 45000, 0, 15000, 15000),
(319, 19, '9', 'Wooden Penises Key Chain', 2000000, 0, 1000000, 3000000, 4000000, 2000000, 10000000, 3000000, 0, 2000000, 3000000, 3000000),
(320, 19, '10', 'Traditional Painting', 2000000, 3000000, 5000000, 4000000, 0, 2000000, 8000000, 3000000, 2000000, 3000000, 0, 2000000),
(321, 19, '11', 'Rattan Bag', 1050000, 300000, 750000, 450000, 450000, 450000, 1800000, 600000, 900000, 900000, 750000, 450000),
(322, 19, '12', 'Barong Shirt', 360000, 180000, 90000, 0, 0, 360000, 990000, 90000, 270000, 360000, 360000, 450000),
(323, 19, '8', 'Baruna Mini Statue', 2000000, 0, 0, 2000000, 3000000, 3000000, 5000000, 5000000, 0, 5000000, 3000000, 3000000),
(324, 19, '1', 'Bali Natural Soap', 0, 40000, 40000, 20000, 60000, 0, 220000, 40000, 20000, 20000, 20000, 20000),
(325, 19, '2', 'Beach Hat Bali Motif', 40000, 40000, 20000, 40000, 20000, 40000, 180000, 0, 20000, 0, 40000, 40000),
(326, 19, '3', 'GWK Mini Statue', 0, 1000000, 500000, 1000000, 1000000, 1500000, 1250000, 250000, 1000000, 750000, 500000, 500000),
(327, 19, '4', 'Bali Frame Wood Carved', 2250000, 3000000, 2250000, 750000, 1500000, 1500000, 9750000, 750000, 3000000, 0, 3750000, 2250000),
(328, 32, '1073', 'Baju Barong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25000, 0),
(329, 32, '4007', 'Baju Barong Merah', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20000, 0),
(330, 32, '1513', 'Patung Budha', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 200000, 0),
(331, 32, '3590', 'Patung Janger', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 200000, 0),
(332, 32, '7956', 'Patung Barong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000000, 0),
(333, 32, '5381', 'Asmat', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 0),
(334, 32, '1024', 'Udeng Batik', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12000, 0),
(335, 32, '0485', 'Udeng Putih Polos', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10000, 0),
(336, 32, '4347', 'Kodok', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20000, 0),
(337, 32, '0193', 'Baju Brokat', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 300000, 0),
(338, 32, '2554', 'Safari Laki-laki', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 300000, 0),
(339, 32, '4871', 'Dolpin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `qrcodes`
--

CREATE TABLE `qrcodes` (
  `id` int(5) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `qrUsername` varchar(100) NOT NULL,
  `qrContent` varchar(100) NOT NULL,
  `qrImg` varchar(100) NOT NULL,
  `qrLink` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qrcodes`
--

INSERT INTO `qrcodes` (`id`, `id_toko`, `qrUsername`, `qrContent`, `qrImg`, `qrLink`, `status`) VALUES
(83, 19, 'Jaket Dilan ', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=19&id=11', 'Jaket Dilan 892350236.png', 'www.ubud-souvenir-center.my.id/generator_qrcode/userQr/Jaket Dilan 892350236.png', 'item'),
(102, 19, 'Winda Shop', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/index.php?idtoko=19', 'Winda Shop364846248.png', 'www.ubud-souvenir-center.my.id/generator_qrcode/userQr/Winda Shop364846248.png', 'toko'),
(104, 19, 'sendal bunga', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=19&id=6', 'sendal bunga1519967196.png', 'www.ubud-souvenir-center.my.id/generator_qrcode/userQr/sendal bunga1519967196.png', 'item'),
(110, 2, 'Kebaya', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=2&id=12', 'Kebaya403645086.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Kebaya403645086.png', 'item'),
(115, 19, 'patung burung', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=19&id=9', 'patung burung1394480967.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/patung burung1394480967.png', 'item'),
(120, 33, 'TokoKu', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/index.php?idtoko=33', 'TokoKu698976848.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/TokoKu698976848.png', 'toko'),
(123, 2, 'Bali Home Spa', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=2&id=6', 'Bali Home Spa1687184897.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Bali Home Spa1687184897.png', 'item'),
(126, 2, 'Perak Celuk', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=2&id=7', 'Perak Celuk1279201580.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Perak Celuk1279201580.png', 'item'),
(132, 2, 'Dreamcatcher', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=2&id=14', 'Dreamcatcher575923926.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Dreamcatcher575923926.png', 'item'),
(133, 2, 'Gusti Shop', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/index.php?idtoko=2', 'Gusti Shop2050216389.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Gusti Shop2050216389.png', 'toko'),
(136, 2, 'Barong Shirt', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=2&id=4', 'Barong Shirt1974644138.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Barong Shirt1974644138.png', 'item'),
(137, 19, 'barong shirt', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=19&id=12', 'barong shirt200544658.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/barong shirt200544658.png', 'item'),
(138, 19, 'Engraved Hair Clips', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=19&id=7', 'Engraved Hair Clips997711394.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Engraved Hair Clips997711394.png', 'item'),
(140, 19, 'Bali Long Dress', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=19&id=5', 'Bali Long Dress474308120.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Bali Long Dress474308120.png', 'item'),
(141, 19, 'Wooden Penises Key Chain', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/detail.php?idtoko=19&id=9', 'Wooden Penises Key Chain1442895156.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Wooden Penises Key Chain1442895156.png', 'item'),
(142, 32, 'Ari Shop', 'https://ubud-souvenir-center.my.id/android/8_panel_penjualan/index.php?idtoko=32', 'Ari Shop135863909.png', 'ubud-souvenir-center.my.id/generator_qrcode/userQr/Ari Shop135863909.png', 'toko');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_testi`
--

CREATE TABLE `riwayat_testi` (
  `id_testi` int(3) NOT NULL,
  `id` varchar(4) NOT NULL,
  `nama_toko` varchar(25) NOT NULL,
  `pemilik` varchar(25) NOT NULL,
  `wa` varchar(14) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_testi`
--

INSERT INTO `riwayat_testi` (`id_testi`, `id`, `nama_toko`, `pemilik`, `wa`, `pesan`, `tanggal`, `jam`) VALUES
(1, '26', 'Miranda Boutique', 'Miranda Dewi', '081326783214', 'ga bisa chat antar admin, tambah fitur tawar harga', '2008-07-21', '21:12:09'),
(2, '22', 'Cahaya Lamp', 'Kholiq', '089765435178', 'tambah fitur tawar harga, dan opsi untuk bisa merubah latar warna', '2021-07-08', '06:43:12'),
(3, '12', 'Wayan Art Lounge', 'Wayan Juniartha', '089761890145', 'Tambah Fitur Tawar Harga', '2021-07-22', '12:23:46'),
(4, '31', 'Rama Art Gallery', 'Rama Septa', '082345178129', 'Tambah Fitur E-Payment', '2021-07-19', '10:16:34'),
(6, '27', 'Rini Boutique', 'Desak Arini', '08763289073', 'Butuh Fitur chat seperti WA supaya bisa komunikasi antar pegawai atau pembeli', '2021-07-26', '17:18:29'),
(7, '26', 'Eka Silver', 'Gusti Eka', '087658127609', 'Koneksi pembayaran ke M-Banking', '2021-07-18', '19:07:10'),
(8, '21', 'Megantari Boutique', 'Desak Ega', '085678129564', 'Tambahin fitur chat & pembayaran online', '2021-07-12', '16:12:46'),
(14, '29', 'Pandawa', 'rudra', '087862209490', 'Ditunggu publish di ios', '2021-11-15', '14:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(5) NOT NULL,
  `kdrule` varchar(2) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `itemset` varchar(10) NOT NULL,
  `minsupport` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `kdrule`, `id_toko`, `itemset`, `minsupport`) VALUES
(30, 'R1', 32, '01', 10),
(31, 'R2', 32, '02', 10),
(32, 'R3', 32, '03', 10),
(33, 'R1', 33, '01', 10),
(34, 'R2', 33, '02', 10),
(35, 'R3', 33, '03', 10),
(122, 'R1', 19, '01', 10),
(123, 'R2', 19, '02', 10),
(124, 'R3', 19, '03', 10),
(133, 'R1', 2, '01', 10),
(134, 'R2', 2, '03', 10),
(135, 'R3', 2, '03', 10);

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id_statistik` int(5) NOT NULL,
  `id_toko` varchar(5) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `online` time NOT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id_sp_admin` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `jabatan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id_sp_admin`, `username`, `password`, `nama`, `jabatan`) VALUES
(1, 'firyan', 'root', 'Firyanul', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_c2`
--

CREATE TABLE `tmp_c2` (
  `id_toko` int(5) NOT NULL,
  `kditem` varchar(10) NOT NULL,
  `kdtransaksi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_trans`
--

CREATE TABLE `tmp_trans` (
  `id_toko` int(5) NOT NULL,
  `kditem` varchar(10) NOT NULL,
  `kdtransaksi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `kdtransaksi` varchar(10) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `kditem` varchar(5) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `jam_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kdtransaksi`, `id_toko`, `kditem`, `tgltransaksi`, `jam_order`) VALUES
(1, '3', 2, '3', '2020-03-10', ''),
(2, '3', 2, '4', '2020-03-10', ''),
(3, '3', 2, '9', '2020-03-10', ''),
(4, '4', 2, '1', '2020-04-07', ''),
(5, '4', 2, '2', '2020-04-07', ''),
(6, '4', 2, '4', '2020-04-07', ''),
(7, '5', 2, '1', '2020-05-11', ''),
(8, '5', 2, '4', '2020-05-11', ''),
(9, '5', 2, '9', '2020-05-11', ''),
(10, '6', 2, '1', '2020-08-11', ''),
(11, '6', 2, '3', '2020-08-11', ''),
(12, '6', 2, '9', '2020-08-11', ''),
(13, '7', 2, '1', '2020-07-16', ''),
(14, '7', 2, '2', '2020-07-16', ''),
(15, '7', 2, '9', '2020-07-16', ''),
(16, '8', 2, '1', '2020-08-11', ''),
(17, '8', 2, '2', '2020-08-11', ''),
(18, '8', 2, '3', '2020-08-11', ''),
(19, '9', 2, '2', '2020-08-11', ''),
(20, '9', 2, '3', '2020-08-11', ''),
(21, '9', 2, '4', '2020-08-11', ''),
(22, '10', 2, '1', '2020-09-10', '11:18:37'),
(23, '10', 2, '3', '2020-09-10', '11:18:37'),
(24, '10', 2, '4', '2020-09-10', '11:18:37'),
(25, '11', 2, '1', '2020-10-09', '14:21:43'),
(26, '11', 2, '4', '2020-10-09', '14:21:43'),
(27, '11', 2, '9', '2020-10-09', '14:21:43'),
(28, '12', 2, '2', '2020-11-08', '13:17:32'),
(29, '12', 2, '3', '2020-11-08', '13:17:32'),
(30, '12', 2, '4', '2020-11-08', '13:17:32'),
(31, '13', 2, '1', '2020-11-13', ''),
(32, '13', 2, '2', '2020-11-13', ''),
(33, '13', 2, '10', '2020-11-13', ''),
(34, '1', 2, '1', '2020-01-01', ''),
(35, '1', 2, '4', '2020-01-01', ''),
(36, '1', 2, '9', '2020-01-01', ''),
(37, '2', 2, '1', '2020-01-01', ''),
(38, '2', 2, '2', '2020-01-01', ''),
(39, '2', 2, '4', '2020-01-01', ''),
(40, '14', 2, '1', '2020-11-13', ''),
(41, '14', 2, '2', '2020-11-13', ''),
(42, '14', 2, '4', '2020-11-13', ''),
(43, '14', 2, '11', '2020-11-13', ''),
(44, '15', 2, '2', '2020-11-13', ''),
(45, '15', 2, '4', '2020-11-13', ''),
(46, '15', 2, '7', '2020-11-13', ''),
(47, '15', 2, '9', '2020-11-13', ''),
(48, '16', 2, '1', '2020-11-16', ''),
(49, '16', 2, '5', '2020-11-16', ''),
(50, '16', 2, '7', '2020-11-16', ''),
(51, '16', 2, '11', '2020-11-16', ''),
(52, '17', 2, '4', '2020-11-16', ''),
(53, '17', 2, '6', '2020-11-16', ''),
(54, '17', 2, '8', '2020-11-16', ''),
(55, '17', 2, '14', '2020-11-16', ''),
(56, '18', 2, '6', '2020-12-07', ''),
(57, '18', 2, '7', '2020-12-07', ''),
(58, '18', 2, '8', '2020-12-07', ''),
(59, '18', 2, '10', '2020-12-07', ''),
(60, '19', 2, '1', '2020-12-07', ''),
(61, '19', 2, '4', '2020-12-07', ''),
(62, '19', 2, '7', '2020-12-07', ''),
(63, '19', 2, '8', '2020-12-07', ''),
(64, '20', 2, '1', '2020-12-10', ''),
(65, '20', 2, '4', '2020-12-10', ''),
(66, '20', 2, '5', '2020-12-10', ''),
(67, '20', 2, '7', '2020-12-10', ''),
(68, '20', 2, '8', '2020-12-10', ''),
(69, '21', 2, '1', '2020-12-17', ''),
(70, '21', 2, '4', '2020-12-17', ''),
(71, '21', 2, '6', '2020-12-17', ''),
(72, '21', 2, '8', '2020-12-17', ''),
(73, '21', 2, '11', '2020-12-17', ''),
(74, '22', 2, '3', '2021-02-13', ''),
(75, '22', 2, '4', '2021-02-13', ''),
(76, '22', 2, '7', '2021-02-13', ''),
(77, '22', 2, '8', '2021-02-13', ''),
(78, '22', 2, '14', '2021-02-13', ''),
(79, '23', 2, '3', '2021-02-13', ''),
(80, '23', 2, '4', '2021-02-13', ''),
(81, '23', 2, '6', '2021-02-13', ''),
(82, '23', 2, '7', '2021-02-13', ''),
(83, '23', 2, '12', '2021-02-13', ''),
(84, '24', 2, '2', '2021-06-14', ''),
(85, '24', 2, '3', '2021-06-14', ''),
(86, '24', 2, '5', '2021-06-14', ''),
(87, '24', 2, '8', '2021-06-14', ''),
(88, '24', 2, '11', '2021-06-14', ''),
(127, 'yBegPxrKDO', 19, '2', '2020-06-10', '08:33:50'),
(128, 'yBegPxrKDO', 19, '3', '2020-06-10', '08:33:50'),
(129, 'rAOqHvvhTW', 19, '3', '2020-06-10', '08:34:14'),
(130, 'rAOqHvvhTW', 19, '8', '2020-06-10', '08:34:14'),
(131, 'JqFcSopQRK', 19, '7', '2020-06-10', '08:40:51'),
(132, 'JqFcSopQRK', 19, '3', '2020-06-10', '08:40:51'),
(133, 'FF9wj0YfEq', 19, '6', '2020-06-10', '08:41:30'),
(134, 'FF9wj0YfEq', 19, '12', '2020-06-10', '08:41:30'),
(135, 'FF9wj0YfEq', 19, '4', '2020-06-10', '08:41:30'),
(136, 't6Rae4DtUH', 19, '8', '2020-06-10', '08:41:45'),
(137, 't6Rae4DtUH', 19, '12', '2020-06-10', '08:41:45'),
(138, 't6Rae4DtUH', 19, '10', '2020-06-10', '08:41:45'),
(139, 'z7TY90Lx4Z', 19, '6', '2020-06-10', '08:42:16'),
(140, 'z7TY90Lx4Z', 19, '7', '2020-06-10', '08:42:16'),
(141, '1SE2A0QuoC', 19, '12', '2020-06-10', '08:42:21'),
(142, '1SE2A0QuoC', 19, '8', '2020-06-10', '08:42:21'),
(143, 'LwhQ76BqVe', 19, '9', '2020-06-10', '08:42:59'),
(144, 'LwhQ76BqVe', 19, '2', '2020-06-10', '08:42:59'),
(145, 'LwhQ76BqVe', 19, '3', '2020-07-15', '08:42:59'),
(146, 'LwhQ76BqVe', 19, '7', '2020-07-15', '08:42:59'),
(147, 'SLgFLElC6N', 19, '9', '2020-07-15', '08:43:11'),
(148, 'SLgFLElC6N', 19, '2', '2020-07-15', '08:43:11'),
(149, 'SLgFLElC6N', 19, '1', '2020-07-15', '08:43:11'),
(150, 'qXd77sSGsO', 19, '4', '2020-07-15', '08:43:42'),
(151, 'qXd77sSGsO', 19, '12', '2020-07-15', '08:43:42'),
(152, 'E3hbA0fB19', 19, '11', '2020-07-15', '08:44:29'),
(153, 'E3hbA0fB19', 19, '4', '2020-07-15', '08:44:29'),
(154, 'E3hbA0fB19', 19, '7', '2020-07-15', '08:44:29'),
(155, 'vYB4bXfLSf', 19, '6', '2020-07-15', '08:44:39'),
(156, 'vYB4bXfLSf', 19, '10', '2020-07-15', '08:44:39'),
(157, 'KRVA1kznMJ', 19, '5', '2020-07-15', '08:44:47'),
(158, 'KRVA1kznMJ', 19, '6', '2020-07-15', '08:44:47'),
(159, 'dj7oR0EOVs', 19, '7', '2020-07-15', '08:45:10'),
(160, 'dj7oR0EOVs', 19, '11', '2020-07-15', '08:45:10'),
(161, 'RcNfhQ5CeM', 19, '9', '2020-07-15', '08:45:29'),
(162, 'RcNfhQ5CeM', 19, '11', '2020-07-15', '08:45:29'),
(163, '4TpkDdgPPW', 19, '9', '2020-07-15', '08:46:28'),
(164, '4TpkDdgPPW', 19, '7', '2020-07-15', '08:46:28'),
(165, '4TpkDdgPPW', 19, '12', '2020-07-15', '08:46:28'),
(166, 'O52QNSTaF7', 19, '12', '2020-07-15', '08:46:53'),
(167, 'O52QNSTaF7', 19, '8', '2020-07-15', '08:46:53'),
(168, 'O52QNSTaF7', 19, '5', '2020-07-15', '08:46:53'),
(169, 'O52QNSTaF7', 19, '10', '2020-07-15', '08:46:53'),
(170, 'O52QNSTaF7', 19, '9', '2020-07-15', '08:46:53'),
(171, 'ZHRLGyyIWM', 19, '7', '2020-08-10', '08:46:58'),
(172, 'ZHRLGyyIWM', 19, '10', '2020-08-10', '08:46:58'),
(173, 'ZHRLGyyIWM', 19, '8', '2020-08-10', '08:46:58'),
(174, '9C092FMKr2', 19, '11', '2020-08-10', '08:47:12'),
(175, '9C092FMKr2', 19, '9', '2020-08-10', '08:47:12'),
(176, 'Nr1dChiCaf', 19, '6', '2020-08-10', '08:47:34'),
(177, 'Nr1dChiCaf', 19, '1', '2020-08-10', '08:47:34'),
(178, 'Nr1dChiCaf', 19, '8', '2020-08-10', '08:47:34'),
(179, 'O92G3KQ7D9', 19, '7', '2020-08-10', '08:48:37'),
(180, 'O92G3KQ7D9', 19, '6', '2020-08-10', '08:48:37'),
(181, 'O92G3KQ7D9', 19, '11', '2020-08-10', '08:48:37'),
(182, 'O92G3KQ7D9', 19, '4', '2020-08-10', '08:48:37'),
(183, 'nPPvAlm0mr', 19, '7', '2020-08-10', '08:48:37'),
(184, 'nPPvAlm0mr', 19, '3', '2020-08-10', '08:48:37'),
(185, 'nPPvAlm0mr', 19, '1', '2020-08-10', '08:48:37'),
(186, 'nPPvAlm0mr', 19, '11', '2020-08-10', '08:48:37'),
(187, 'nPPvAlm0mr', 19, '8', '2020-08-10', '08:48:37'),
(188, '0dp1lrZEtO', 19, '10', '2020-08-10', '08:48:52'),
(189, '0dp1lrZEtO', 19, '11', '2020-08-10', '08:48:52'),
(190, '0dp1lrZEtO', 19, '8', '2020-08-10', '08:48:52'),
(191, '0dp1lrZEtO', 19, '9', '2020-08-10', '08:48:52'),
(192, 'ZwcGGIxSPE', 19, '5', '2020-08-10', '08:49:34'),
(193, 'ZwcGGIxSPE', 19, '10', '2020-08-10', '08:49:34'),
(194, 'cfn8lFGRj0', 19, '12', '2020-08-10', '08:49:38'),
(195, 'cfn8lFGRj0', 19, '8', '2020-08-10', '08:49:38'),
(196, 'cfn8lFGRj0', 19, '9', '2020-08-10', '08:49:38'),
(197, 'mOsj9aSl61', 19, '3', '2020-09-15', '08:50:29'),
(198, 'mOsj9aSl61', 19, '11', '2020-09-15', '08:50:29'),
(199, 'eYsdDF8oB1', 19, '4', '2020-09-15', '08:50:51'),
(200, 'eYsdDF8oB1', 19, '3', '2020-09-15', '08:50:51'),
(201, 'eYsdDF8oB1', 19, '2', '2020-09-15', '08:50:51'),
(202, 'eYsdDF8oB1', 19, '1', '2020-09-15', '08:50:51'),
(203, 'eYsdDF8oB1', 19, '12', '2020-09-15', '08:50:51'),
(204, 'gmzoU1As0e', 19, '7', '2020-09-15', '08:51:48'),
(205, 'gmzoU1As0e', 19, '11', '2020-09-15', '08:51:48'),
(206, 'gmzoU1As0e', 19, '5', '2020-09-15', '08:51:48'),
(207, 'l4zPHQ5r7c', 19, '11', '2020-09-15', '08:52:12'),
(208, 'l4zPHQ5r7c', 19, '4', '2020-09-15', '08:52:12'),
(209, 'l4zPHQ5r7c', 19, '6', '2020-09-15', '08:52:12'),
(210, 'X0ozEzAoLC', 19, '11', '2020-09-15', '08:52:46'),
(211, 'X0ozEzAoLC', 19, '3', '2020-09-15', '08:52:46'),
(212, 'X0ozEzAoLC', 19, '4', '2020-09-15', '08:52:46'),
(213, '59RRMPcLXA', 19, '10', '2020-09-15', '08:53:22'),
(214, '59RRMPcLXA', 19, '7', '2020-09-15', '08:53:22'),
(215, '59RRMPcLXA', 19, '3', '2020-09-15', '08:53:22'),
(216, '59RRMPcLXA', 19, '12', '2020-09-15', '08:53:22'),
(217, 'KhYitWOd3J', 19, '4', '2020-09-15', '08:53:24'),
(218, 'KhYitWOd3J', 19, '11', '2020-09-15', '08:53:24'),
(219, 'KhYitWOd3J', 19, '12', '2020-09-15', '08:53:24'),
(220, 'GtK1F63AVy', 19, '7', '2020-09-15', '08:53:37'),
(221, 'GtK1F63AVy', 19, '11', '2020-09-15', '08:53:37'),
(222, 'GtK1F63AVy', 19, '10', '2020-09-15', '08:53:37'),
(223, '9y61U0Jm0W', 19, '6', '2020-10-10', '08:54:06'),
(224, '9y61U0Jm0W', 19, '8', '2020-10-10', '08:54:06'),
(225, 'l4ifGS0dfT', 19, '10', '2020-10-10', '08:54:40'),
(226, 'l4ifGS0dfT', 19, '11', '2020-10-10', '08:54:40'),
(227, 'l4ifGS0dfT', 19, '12', '2020-10-10', '08:54:40'),
(228, 'l4ifGS0dfT', 19, '8', '2020-10-10', '08:54:40'),
(229, 'l4ifGS0dfT', 19, '1', '2020-10-10', '08:54:40'),
(230, 'zMlXF9sJRX', 19, '12', '2020-10-10', '08:54:49'),
(231, 'zMlXF9sJRX', 19, '6', '2020-10-10', '08:54:49'),
(232, 'zMlXF9sJRX', 19, '11', '2020-10-10', '08:54:49'),
(233, 'zMlXF9sJRX', 19, '9', '2020-10-10', '08:54:49'),
(234, 'Q4SgLwBkyS', 19, '9', '2020-10-10', '08:55:05'),
(235, 'Q4SgLwBkyS', 19, '10', '2020-10-10', '08:55:05'),
(236, 'Q4SgLwBkyS', 19, '8', '2020-10-10', '08:55:05'),
(237, 'Q4SgLwBkyS', 19, '3', '2020-10-10', '08:55:05'),
(238, '3ULGWj89KT', 19, '10', '2020-10-10', '08:56:14'),
(239, '3ULGWj89KT', 19, '11', '2020-10-10', '08:56:15'),
(240, '3ULGWj89KT', 19, '12', '2020-10-10', '08:56:15'),
(241, 'oClPjS60nM', 19, '11', '2020-10-10', '08:56:24'),
(242, 'oClPjS60nM', 19, '3', '2020-10-10', '08:56:24'),
(243, 'oClPjS60nM', 19, '8', '2020-10-10', '08:56:24'),
(244, 'wpoCTxzUMS', 19, '3', '2020-10-10', '08:56:28'),
(245, 'wpoCTxzUMS', 19, '11', '2020-10-10', '08:56:28'),
(246, 'wpoCTxzUMS', 19, '12', '2020-10-10', '08:56:28'),
(247, 'NlPx4ET99A', 19, '11', '2020-10-10', '08:57:02'),
(248, 'NlPx4ET99A', 19, '8', '2020-10-10', '08:57:02'),
(249, 'DMKN9c8TAF', 19, '2', '2020-11-15', '08:57:07'),
(250, 'DMKN9c8TAF', 19, '12', '2020-11-15', '08:57:07'),
(251, 'DMKN9c8TAF', 19, '4', '2020-11-15', '08:57:07'),
(252, 'QEjm5Rf3ZZ', 19, '6', '2020-11-15', '08:57:50'),
(253, 'QEjm5Rf3ZZ', 19, '11', '2020-11-15', '08:57:50'),
(254, 'QEjm5Rf3ZZ', 19, '8', '2020-11-15', '08:57:50'),
(255, 'eWpgCf9Mv5', 19, '4', '2020-11-15', '08:58:08'),
(256, 'eWpgCf9Mv5', 19, '3', '2020-11-15', '08:58:08'),
(257, 'eWpgCf9Mv5', 19, '12', '2020-11-15', '08:58:08'),
(258, 'NffYzmWKww', 19, '9', '2020-11-15', '08:58:08'),
(259, 'NffYzmWKww', 19, '11', '2020-11-15', '08:58:08'),
(260, 'NffYzmWKww', 19, '8', '2020-11-15', '08:58:08'),
(261, 'NffYzmWKww', 19, '4', '2020-11-15', '08:58:08'),
(262, 'TVhNucUwcZ', 19, '6', '2020-11-15', '08:58:30'),
(263, 'TVhNucUwcZ', 19, '11', '2020-11-15', '08:58:30'),
(264, 'TVhNucUwcZ', 19, '8', '2020-11-15', '08:58:30'),
(265, '6Q65U6joPw', 19, '11', '2020-11-15', '08:59:14'),
(266, '6Q65U6joPw', 19, '2', '2020-11-15', '08:59:14'),
(267, '6Q65U6joPw', 19, '12', '2020-11-15', '08:59:14'),
(268, '6Q65U6joPw', 19, '9', '2020-11-15', '08:59:14'),
(269, 'GQyvTClGY9', 19, '11', '2020-11-15', '08:59:20'),
(270, 'GQyvTClGY9', 19, '3', '2020-11-15', '08:59:20'),
(271, 'GQyvTClGY9', 19, '4', '2020-11-15', '08:59:20'),
(272, 'GQyvTClGY9', 19, '1', '2020-11-15', '08:59:20'),
(273, 'GQyvTClGY9', 19, '12', '2020-11-15', '08:59:20'),
(274, 'GhQDLnczVo', 19, '4', '2020-11-15', '08:59:33'),
(275, 'GhQDLnczVo', 19, '9', '2020-12-10', '08:59:33'),
(276, 'GhQDLnczVo', 19, '7', '2020-12-10', '08:59:33'),
(277, 'GhQDLnczVo', 19, '6', '2020-12-10', '08:59:33'),
(278, 'TVQkayXK3e', 19, '12', '2020-12-10', '09:00:08'),
(279, 'TVQkayXK3e', 19, '6', '2020-12-10', '09:00:08'),
(280, 'TVQkayXK3e', 19, '1', '2020-12-10', '09:00:08'),
(281, '8zl6sx27kF', 19, '6', '2020-12-10', '09:00:14'),
(282, '8zl6sx27kF', 19, '12', '2020-12-10', '09:00:14'),
(283, '8zl6sx27kF', 19, '8', '2020-12-10', '09:00:14'),
(284, '8zl6sx27kF', 19, '4', '2020-12-10', '09:00:14'),
(285, 'm5Mj8Zl2XF', 19, '11', '2020-12-10', '09:00:47'),
(286, 'm5Mj8Zl2XF', 19, '12', '2020-12-10', '09:00:47'),
(287, 'm5Mj8Zl2XF', 19, '4', '2020-12-10', '09:00:47'),
(288, 'm5Mj8Zl2XF', 19, '8', '2020-12-10', '09:00:47'),
(289, 'm5Mj8Zl2XF', 19, '2', '2020-12-10', '09:00:47'),
(290, 'xJK2LElj1a', 19, '6', '2020-12-10', '09:00:51'),
(291, 'xJK2LElj1a', 19, '11', '2020-12-10', '09:00:51'),
(292, 'xJK2LElj1a', 19, '5', '2020-12-10', '09:00:51'),
(293, 'xJK2LElj1a', 19, '9', '2020-12-10', '09:00:51'),
(294, 'oYV8kt76mS', 19, '3', '2020-12-10', '09:01:37'),
(295, 'oYV8kt76mS', 19, '2', '2020-12-10', '09:01:37'),
(296, 'iVX2kXw5dN', 19, '3', '2020-12-10', '09:01:43'),
(297, 'iVX2kXw5dN', 19, '9', '2020-12-10', '09:01:43'),
(298, 'iVX2kXw5dN', 19, '10', '2020-12-10', '09:01:43'),
(299, 'iVX2kXw5dN', 19, '12', '2020-12-10', '09:01:43'),
(300, '7RgeuGHrK2', 19, '5', '2020-12-10', '09:02:02'),
(301, '7RgeuGHrK2', 19, '8', '2021-01-15', '09:02:02'),
(302, '7RgeuGHrK2', 19, '10', '2021-01-15', '09:02:02'),
(303, '7RgeuGHrK2', 19, '11', '2021-01-15', '09:02:02'),
(304, '7RgeuGHrK2', 19, '12', '2021-01-15', '09:02:02'),
(305, 'fXqqdw0876', 19, '6', '2021-01-15', '09:02:14'),
(306, 'fXqqdw0876', 19, '11', '2021-01-15', '09:02:14'),
(307, 'fXqqdw0876', 19, '4', '2021-01-15', '09:02:14'),
(308, '5MUj8cpQyc', 19, '6', '2021-01-15', '09:02:51'),
(309, '5MUj8cpQyc', 19, '11', '2021-01-15', '09:02:51'),
(310, '5MUj8cpQyc', 19, '12', '2021-01-15', '09:02:51'),
(311, '5MUj8cpQyc', 19, '9', '2021-01-15', '09:02:51'),
(312, 'YoJolRmgJA', 19, '7', '2021-01-15', '09:03:18'),
(313, 'YoJolRmgJA', 19, '2', '2021-01-15', '09:03:18'),
(314, 'YoJolRmgJA', 19, '12', '2021-01-15', '09:03:18'),
(315, 'YoJolRmgJA', 19, '11', '2021-01-15', '09:03:18'),
(316, 'fxQiVCjyUI', 19, '11', '2021-01-15', '09:03:27'),
(317, 'fxQiVCjyUI', 19, '2', '2021-01-15', '09:03:27'),
(318, 'fxQiVCjyUI', 19, '7', '2021-01-15', '09:03:27'),
(319, 'lOX8gWjNpq', 19, '4', '2021-01-15', '09:03:53'),
(320, 'lOX8gWjNpq', 19, '12', '2021-01-15', '09:03:53'),
(321, 'lOX8gWjNpq', 19, '11', '2021-01-15', '09:03:53'),
(322, 'pC2y3rHSdc', 19, '11', '2021-01-15', '09:04:17'),
(323, 'pC2y3rHSdc', 19, '10', '2021-01-15', '09:04:17'),
(324, 'pC2y3rHSdc', 19, '4', '2021-01-15', '09:04:17'),
(325, 'pC2y3rHSdc', 19, '9', '2021-01-15', '09:04:17'),
(326, 'pC2y3rHSdc', 19, '8', '2021-01-15', '09:04:17'),
(327, 'pcLFQE5dDH', 19, '7', '2021-02-10', '09:05:12'),
(328, 'pcLFQE5dDH', 19, '3', '2021-02-10', '09:05:12'),
(329, 'pcLFQE5dDH', 19, '11', '2021-02-10', '09:05:12'),
(330, 'pcLFQE5dDH', 19, '4', '2021-02-10', '09:05:12'),
(331, '57OHAnEuhF', 19, '7', '2021-02-10', '09:05:26'),
(332, '57OHAnEuhF', 19, '4', '2021-02-10', '09:05:26'),
(333, '57OHAnEuhF', 19, '5', '2021-02-10', '09:05:26'),
(334, 'G7CByT0k3M', 19, '10', '2021-02-10', '09:05:36'),
(335, 'G7CByT0k3M', 19, '11', '2021-02-10', '09:05:36'),
(336, 'Ycc0tUSFYX', 19, '5', '2021-02-10', '09:06:06'),
(337, 'Ycc0tUSFYX', 19, '10', '2021-02-10', '09:06:06'),
(338, 'Ycc0tUSFYX', 19, '2', '2021-02-10', '09:06:06'),
(339, 'PmZ6UPoRFZ', 19, '7', '2021-02-10', '09:06:40'),
(340, 'PmZ6UPoRFZ', 19, '3', '2021-02-10', '09:06:40'),
(341, 'PmZ6UPoRFZ', 19, '4', '2021-02-10', '09:06:40'),
(342, 'PmZ6UPoRFZ', 19, '1', '2021-02-10', '09:06:40'),
(343, '5syQYhetns', 19, '2', '2021-02-10', '09:06:50'),
(344, '5syQYhetns', 19, '1', '2021-02-10', '09:06:50'),
(345, '5syQYhetns', 19, '10', '2021-02-10', '09:06:50'),
(346, '7BoMSwAWsO', 19, '7', '2021-02-10', '09:09:47'),
(347, '7BoMSwAWsO', 19, '3', '2021-02-10', '09:09:47'),
(348, '7BoMSwAWsO', 19, '12', '2021-02-10', '09:09:47'),
(349, 'CbIPrDmtR4', 19, '7', '2021-02-10', '09:10:51'),
(350, 'CbIPrDmtR4', 19, '3', '2021-02-10', '09:10:51'),
(351, 'CbIPrDmtR4', 19, '4', '2021-02-10', '09:10:51'),
(352, '3MYzotwCAY', 19, '6', '2021-02-10', '09:12:42'),
(353, '3MYzotwCAY', 19, '12', '2021-03-15', '09:12:42'),
(354, 'i15j3LDcoI', 19, '5', '2021-03-15', '09:13:45'),
(355, 'i15j3LDcoI', 19, '2', '2021-03-15', '09:13:45'),
(356, 'i15j3LDcoI', 19, '1', '2021-03-15', '09:13:45'),
(357, 'i15j3LDcoI', 19, '11', '2021-03-15', '09:13:45'),
(358, '4wD54mPA9x', 19, '7', '2021-03-15', '09:14:46'),
(359, '4wD54mPA9x', 19, '4', '2021-03-15', '09:14:46'),
(360, '4wD54mPA9x', 19, '10', '2021-03-15', '09:14:46'),
(361, '3mPaxqCvpB', 19, '5', '2021-03-15', '09:15:44'),
(362, '3mPaxqCvpB', 19, '10', '2021-03-15', '09:15:44'),
(363, '3mPaxqCvpB', 19, '11', '2021-03-15', '09:15:44'),
(364, '3mPaxqCvpB', 19, '9', '2021-03-15', '09:15:44'),
(365, 'XbSIte92yR', 19, '1', '2021-03-15', '09:16:40'),
(366, 'XbSIte92yR', 19, '11', '2021-03-15', '09:16:40'),
(367, 'XbSIte92yR', 19, '7', '2021-03-15', '09:16:40'),
(368, 'XbSIte92yR', 19, '10', '2021-03-15', '09:16:40'),
(369, 'V42jvwuXIN', 19, '5', '2021-03-15', '09:17:36'),
(370, 'V42jvwuXIN', 19, '6', '2021-03-15', '09:17:36'),
(371, 'V42jvwuXIN', 19, '10', '2021-03-15', '09:17:36'),
(372, 'V42jvwuXIN', 19, '4', '2021-03-15', '09:17:36'),
(373, 'V42jvwuXIN', 19, '11', '2021-03-15', '09:17:36'),
(374, 'jPtEpFHMHq', 19, '5', '2021-03-15', '09:18:39'),
(375, 'jPtEpFHMHq', 19, '3', '2021-03-15', '09:18:39'),
(376, 'jPtEpFHMHq', 19, '10', '2021-03-15', '09:18:39'),
(377, 'jPtEpFHMHq', 19, '6', '2021-03-15', '09:18:39'),
(378, 'wtatOmp16q', 19, '7', '2021-03-15', '09:19:33'),
(379, 'wtatOmp16q', 19, '3', '2021-04-10', '09:19:33'),
(380, 'wtatOmp16q', 19, '4', '2021-04-10', '09:19:33'),
(381, 'wtatOmp16q', 19, '11', '2021-04-10', '09:19:33'),
(382, 'iWqus3JJQD', 19, '7', '2021-04-10', '09:20:34'),
(383, 'iWqus3JJQD', 19, '3', '2021-04-10', '09:20:34'),
(384, 'iWqus3JJQD', 19, '6', '2021-04-10', '09:20:34'),
(385, 'iWqus3JJQD', 19, '10', '2021-04-10', '09:20:34'),
(386, 'VRYfnng4UG', 19, '10', '2021-04-10', '09:21:32'),
(387, 'VRYfnng4UG', 19, '7', '2021-04-10', '09:21:32'),
(388, 'VRYfnng4UG', 19, '9', '2021-04-10', '09:21:32'),
(389, 'EGBQ3E9A8z', 19, '7', '2021-04-10', '09:22:16'),
(390, 'EGBQ3E9A8z', 19, '3', '2021-04-10', '09:22:16'),
(391, 'EGBQ3E9A8z', 19, '2', '2021-04-10', '09:22:16'),
(392, 'EGBQ3E9A8z', 19, '10', '2021-04-10', '09:22:16'),
(393, 'x0rneE0f7o', 19, '2', '2021-04-10', '09:22:48'),
(394, 'x0rneE0f7o', 19, '7', '2021-04-10', '09:22:48'),
(395, '7TcQxDU4os', 19, '1', '2021-04-10', '09:23:06'),
(396, '7TcQxDU4os', 19, '9', '2021-04-10', '09:23:06'),
(397, '7TcQxDU4os', 19, '8', '2021-04-10', '09:23:06'),
(398, '7TcQxDU4os', 19, '10', '2021-04-10', '09:23:06'),
(399, 'oIPZEhPnlw', 19, '7', '2021-04-10', '09:23:49'),
(400, 'oIPZEhPnlw', 19, '3', '2021-04-10', '09:23:49'),
(401, 'oIPZEhPnlw', 19, '11', '2021-04-10', '09:23:49'),
(402, 'XcoENI7oO6', 19, '9', '2021-04-10', '09:24:47'),
(403, 'XcoENI7oO6', 19, '5', '2021-04-10', '09:24:47'),
(404, 'XcoENI7oO6', 19, '8', '2021-04-10', '09:24:47'),
(405, 'XcoENI7oO6', 19, '11', '2021-05-15', '09:24:47'),
(406, 'VizGl9uMLe', 19, '3', '2021-05-15', '09:24:48'),
(407, 'VizGl9uMLe', 19, '1', '2021-05-15', '09:24:48'),
(408, 'VizGl9uMLe', 19, '9', '2021-05-15', '09:24:48'),
(409, 'VizGl9uMLe', 19, '4', '2021-05-15', '09:24:48'),
(410, 'FLy1ezAFSw', 19, '7', '2021-05-15', '09:25:35'),
(411, 'FLy1ezAFSw', 19, '11', '2021-05-15', '09:25:35'),
(412, 'DIEojIAWR5', 19, '7', '2021-05-15', '09:25:40'),
(413, 'DIEojIAWR5', 19, '4', '2021-05-15', '09:25:40'),
(414, 'DIEojIAWR5', 19, '1', '2021-05-15', '09:25:40'),
(415, 'BuPlB6gX6b', 19, '2', '2021-05-15', '09:26:19'),
(416, 'BuPlB6gX6b', 19, '3', '2021-05-15', '09:26:19'),
(417, 'BuPlB6gX6b', 19, '9', '2021-05-15', '09:26:19'),
(418, 'BuPlB6gX6b', 19, '8', '2021-05-15', '09:26:19'),
(419, 'rJI04uNgh4', 19, '9', '2021-05-15', '09:26:25'),
(420, 'rJI04uNgh4', 19, '3', '2021-05-15', '09:26:25'),
(421, 'rJI04uNgh4', 19, '11', '2021-05-15', '09:26:25'),
(422, 'rJI04uNgh4', 19, '6', '2021-05-15', '09:26:25'),
(423, 'UYgBu9IQib', 19, '7', '2021-05-15', '09:27:09'),
(424, 'UYgBu9IQib', 19, '5', '2021-05-15', '09:27:09'),
(425, 'UYgBu9IQib', 19, '3', '2021-05-15', '09:27:09'),
(426, 'Wkwe3EjaKv', 19, '7', '2021-05-15', '09:28:05'),
(427, 'Wkwe3EjaKv', 19, '6', '2021-05-15', '09:28:05'),
(428, 'Wkwe3EjaKv', 19, '5', '2021-05-15', '09:28:05'),
(429, 'Wkwe3EjaKv', 19, '1', '2021-05-15', '09:28:05'),
(430, 'Wkwe3EjaKv', 19, '8', '2021-05-15', '09:28:05'),
(470, 'JAs8rRkmIJ', 19, '12', '2021-06-15', '01:17:55'),
(471, 'JAs8rRkmIJ', 19, '11', '2021-06-15', '01:17:55'),
(474, 'jDQ2yZ8KkQ', 19, '11', '2021-06-27', '08:32:45'),
(477, 'ZnziYqNX8M', 33, '0996', '2021-06-27', '14:46:43'),
(478, 'ZnziYqNX8M', 33, '0048', '2021-06-27', '14:46:43'),
(479, 'ZnziYqNX8M', 33, '0022', '2021-06-27', '14:46:43'),
(480, 'ZnziYqNX8M', 33, '1259', '2021-06-27', '14:46:43'),
(481, 'GjDMuvl6XW', 33, '4572', '2021-06-27', '14:51:30'),
(482, 'GjDMuvl6XW', 33, '6473', '2021-06-27', '14:51:30'),
(483, 'GjDMuvl6XW', 33, '0048', '2021-06-27', '14:51:30'),
(484, 'GjDMuvl6XW', 33, '0022', '2021-06-27', '14:51:30'),
(485, 'GjDMuvl6XW', 33, '5111', '2021-06-27', '14:51:30'),
(486, 'GjDMuvl6XW', 33, '1259', '2021-06-27', '14:51:30'),
(487, 'jPrIxphbiz', 33, '8793', '2021-06-27', '14:51:42'),
(488, 'jPrIxphbiz', 33, '4572', '2021-06-27', '14:51:42'),
(489, 'jPrIxphbiz', 33, '0048', '2021-06-27', '14:51:42'),
(490, 'jPrIxphbiz', 33, '0022', '2021-06-27', '14:51:42'),
(491, 'jPrIxphbiz', 33, '5111', '2021-06-27', '14:51:42'),
(492, 'jPrIxphbiz', 33, '1259', '2021-06-27', '14:51:42'),
(493, 'uRqbzWB3Pd', 33, '8793', '2021-06-27', '14:51:53'),
(494, 'uRqbzWB3Pd', 33, '4572', '2021-06-27', '14:51:53'),
(495, 'uRqbzWB3Pd', 33, '0022', '2021-06-27', '14:51:53'),
(496, '7xgqSbLXX5', 33, '0996', '2021-06-27', '14:52:00'),
(497, '7xgqSbLXX5', 33, '1259', '2021-06-27', '14:52:00'),
(498, 'pkm29kYkWa', 33, '0563', '2021-06-27', '14:52:07'),
(499, 'pkm29kYkWa', 33, '9548', '2021-06-27', '14:52:07'),
(500, 'pkm29kYkWa', 33, '1259', '2021-06-27', '14:52:07'),
(501, 'S7Ug7couCv', 33, '8793', '2021-06-27', '14:52:29'),
(502, 'S7Ug7couCv', 33, '0563', '2021-06-27', '14:52:29'),
(503, 'S7Ug7couCv', 33, '0048', '2021-06-27', '14:52:29'),
(504, 'S7Ug7couCv', 33, '0022', '2021-06-27', '14:52:29'),
(505, 'S7Ug7couCv', 33, '5111', '2021-06-27', '14:52:29'),
(506, 'FJgE964RDy', 33, '0563', '2021-06-27', '14:52:38'),
(507, 'FJgE964RDy', 33, '0048', '2021-06-27', '14:52:38'),
(508, 'FJgE964RDy', 33, '0022', '2021-06-27', '14:52:38'),
(509, '3xASWOfT3r', 33, '8793', '2021-06-27', '14:52:52'),
(510, '3xASWOfT3r', 33, '0048', '2021-06-27', '14:52:52'),
(511, '3xASWOfT3r', 33, '0022', '2021-06-27', '14:52:52'),
(512, '3xASWOfT3r', 33, '1259', '2021-06-27', '14:52:52'),
(513, '1TTdGj1Pso', 33, '4572', '2021-06-27', '14:52:58'),
(514, '1TTdGj1Pso', 33, '0563', '2021-06-27', '14:52:58'),
(515, '1TTdGj1Pso', 33, '0048', '2021-06-27', '14:52:58'),
(516, '1TTdGj1Pso', 33, '5111', '2021-06-27', '14:52:58'),
(517, 'hynQywDMtZ', 33, '8793', '2021-06-27', '14:53:09'),
(518, 'hynQywDMtZ', 33, '0563', '2021-06-27', '14:53:09'),
(519, 'hynQywDMtZ', 33, '0048', '2021-06-27', '14:53:09'),
(520, 'hynQywDMtZ', 33, '5111', '2021-06-27', '14:53:09'),
(529, 'bqAjeunfxC', 33, '0022', '1970-01-01', ''),
(530, 'bqAjeunfxC', 33, '0563', '1970-01-01', ''),
(531, 'bqAjeunfxC', 33, '1259', '1970-01-01', ''),
(537, 'fsUR1BsA33', 19, '3', '2021-06-27', '03:43:32'),
(539, 'nQfcvVSH8b', 33, '8793', '2021-06-27', '04:00:47'),
(540, 'qBneNPrWBa', 33, '8793', '2021-06-27', '04:03:09'),
(569, 'IxmAQBDmum', 19, '9', '2021-06-30', '05:10:48'),
(570, 'IxmAQBDmum', 19, '4', '2021-06-30', '05:10:48'),
(590, 'bVHm1OFDtT', 19, '3', '2021-06-30', '10:38:50'),
(606, 'zQRg1HLjct', 19, '5', '2021-07-02', '17:06:18'),
(607, 'zQRg1HLjct', 19, '6', '2021-07-02', '17:06:18'),
(608, '3LgHXfHYBa', 19, '3', '2021-07-05', '17:06:59'),
(609, '3LgHXfHYBa', 19, '4', '2021-07-05', '17:06:59'),
(610, 'ggq40Oh7q4', 19, '7', '2021-07-08', '17:07:18'),
(611, 'ggq40Oh7q4', 19, '11', '2021-07-08', '17:07:18'),
(612, '7CegnAa0Ne', 19, '6', '2021-07-10', '17:07:42'),
(613, '7CegnAa0Ne', 19, '8', '2021-07-10', '17:07:42'),
(614, '7CegnAa0Ne', 19, '1', '2021-07-10', '17:07:42'),
(615, '6ou0AnmvwJ', 19, '6', '2021-07-03', '17:08:15'),
(616, '6ou0AnmvwJ', 19, '11', '2021-07-03', '17:08:15'),
(617, '6ou0AnmvwJ', 19, '2', '2021-07-03', '17:08:15'),
(618, 'T5KziyFdxE', 19, '11', '2021-07-07', '17:10:38'),
(619, 'T5KziyFdxE', 19, '12', '2021-07-07', '17:10:38'),
(620, 'T5KziyFdxE', 19, '2', '2021-07-07', '17:10:38'),
(621, 'CFG9gPrHX6', 19, '5', '2021-07-06', '17:11:12'),
(622, 'CFG9gPrHX6', 19, '7', '2021-07-06', '17:11:12'),
(623, 'CFG9gPrHX6', 19, '9', '2021-07-06', '17:11:12'),
(624, 'ShKLm0eVZw', 19, '6', '2021-07-11', '17:11:41'),
(625, 'ShKLm0eVZw', 19, '10', '2021-07-11', '17:11:41'),
(626, 'ShKLm0eVZw', 19, '11', '2021-07-11', '17:11:41'),
(627, 'ShKLm0eVZw', 19, '1', '2021-07-11', '17:11:41'),
(628, '2NLvWKCzC8', 19, '9', '2021-07-12', '17:12:13'),
(629, '2NLvWKCzC8', 19, '12', '2021-07-12', '17:12:13'),
(630, '2NLvWKCzC8', 19, '2', '2021-07-12', '17:12:13'),
(631, '2NLvWKCzC8', 19, '4', '2021-07-12', '17:12:13'),
(632, 'jVVRf0uym6', 19, '5', '2021-07-12', '17:12:50'),
(633, 'jVVRf0uym6', 19, '10', '2021-07-12', '17:12:50'),
(634, 'jVVRf0uym6', 19, '1', '2021-07-12', '17:12:50'),
(635, 'dcHTAG2CRG', 19, '5', '2021-07-13', '17:16:38'),
(636, 'dcHTAG2CRG', 19, '6', '2021-07-13', '17:16:38'),
(637, 'dcHTAG2CRG', 19, '10', '2021-07-13', '17:16:38'),
(638, '5e4Ga7ArpK', 19, '11', '2021-07-14', '17:17:10'),
(639, '5e4Ga7ArpK', 19, '12', '2021-07-14', '17:17:10'),
(640, '5e4Ga7ArpK', 19, '1', '2021-07-14', '17:17:10'),
(641, '5e4Ga7ArpK', 19, '2', '2021-07-14', '17:17:10'),
(642, '5e4Ga7ArpK', 19, '4', '2021-07-14', '17:17:10'),
(643, 'ftd6hUN4G6', 19, '6', '2021-07-15', '17:17:37'),
(644, 'ftd6hUN4G6', 19, '10', '2021-07-15', '17:17:37'),
(645, 'ftd6hUN4G6', 19, '11', '2021-07-15', '17:17:37'),
(646, 'ftd6hUN4G6', 19, '1', '2021-07-15', '17:17:37'),
(647, 'rtuE9Ur82G', 19, '12', '2021-07-16', '17:18:07'),
(648, 'rtuE9Ur82G', 19, '2', '2021-07-16', '17:18:07'),
(649, 'rtuE9Ur82G', 19, '4', '2021-07-16', '17:18:07'),
(650, 'hBbEMD5MWi', 19, '7', '2021-07-07', '17:18:31'),
(651, 'hBbEMD5MWi', 19, '11', '2021-07-07', '17:18:31'),
(652, 'hBbEMD5MWi', 19, '12', '2021-07-07', '17:18:31'),
(653, 'hBbEMD5MWi', 19, '4', '2021-07-07', '17:18:31'),
(656, 'jqK7Ac3esh', 19, '10', '2021-06-30', '17:22:26'),
(657, 'jqK7Ac3esh', 19, '11', '2021-06-30', '17:22:26'),
(658, 'yeFs6nMeB2', 19, '5', '2021-07-01', '17:22:40'),
(659, 'yeFs6nMeB2', 19, '1', '2021-07-01', '17:22:40'),
(660, 'x1dAzMBnF0', 19, '9', '2021-07-03', '17:27:10'),
(661, 'x1dAzMBnF0', 19, '4', '2021-07-03', '17:27:10'),
(662, 'P9fEqWhzNJ', 19, '3', '2021-07-04', '17:28:02'),
(663, 'P9fEqWhzNJ', 19, '4', '2021-07-04', '17:28:02'),
(664, '8tpQjC31pF', 19, '5', '2021-07-16', '17:29:18'),
(665, '8tpQjC31pF', 19, '4', '2021-07-16', '17:29:18'),
(666, 'E04ftQS3SM', 19, '10', '2021-07-19', '17:29:41'),
(667, 'E04ftQS3SM', 19, '11', '2021-07-19', '17:29:41'),
(668, 'E04ftQS3SM', 19, '1', '2021-07-19', '17:29:41'),
(669, 'EgdxASPixR', 19, '12', '2021-07-16', '17:30:00'),
(670, 'EgdxASPixR', 19, '2', '2021-07-16', '17:30:00'),
(671, 'EgdxASPixR', 19, '4', '2021-07-16', '17:30:00'),
(672, 'xP4kqExS5y', 19, '7', '2021-07-18', '17:30:22'),
(673, 'xP4kqExS5y', 19, '1', '2021-07-18', '17:30:22'),
(674, 'xP4kqExS5y', 19, '2', '2021-07-18', '17:30:22'),
(675, 'LtF8Vw0P2o', 19, '9', '2021-07-17', '17:30:40'),
(676, 'LtF8Vw0P2o', 19, '8', '2021-07-17', '17:30:40'),
(677, 'LtF8Vw0P2o', 19, '3', '2021-07-17', '17:30:40'),
(749, '62545', 19, '5', '2021-07-07', '22:43:08'),
(750, '62545', 19, '12', '2021-07-07', '22:43:08'),
(751, '62545', 19, '8', '2021-07-07', '22:43:08'),
(752, '62545', 19, '4', '2021-07-07', '22:43:08'),
(753, '76670', 19, '10', '2021-07-07', '22:52:01'),
(754, '76670', 19, '8', '2021-07-07', '22:52:01'),
(755, '76670', 19, '1', '2021-07-07', '22:52:01'),
(756, '76670', 19, '4', '2021-07-07', '22:52:01'),
(757, '45486', 19, '7', '2021-07-07', '22:59:06'),
(758, '45486', 19, '12', '2021-07-07', '22:59:06'),
(759, '45486', 19, '1', '2021-07-07', '22:59:06'),
(774, 'MDbDeE6CHL', 19, '11', '2021-07-07', '08:29:14'),
(775, 'MDbDeE6CHL', 19, '3', '2021-07-07', '08:29:14'),
(776, 'MDbDeE6CHL', 19, '6', '2021-07-07', '08:29:14'),
(777, 'MDbDeE6CHL', 19, '9', '2021-07-07', '08:29:14'),
(791, '25', 2, '3', '2021-06-27', '11:13:29'),
(792, '25', 2, '4', '2021-06-27', '11:13:29'),
(793, '25', 2, '5', '2021-06-27', '11:13:29'),
(794, '25', 2, '7', '2021-06-27', '11:13:29'),
(795, '25', 2, '8', '2021-06-27', '11:13:29'),
(796, 'BjSiNTxYXZ', 2, '4', '2021-09-04', '20:19:51'),
(797, 'BjSiNTxYXZ', 2, '5', '2021-09-04', '20:19:51'),
(798, 'MOpDVAJCzc', 2, '4', '2021-09-06', '14:16:41'),
(801, 'PiTg8E4jq0', 32, '0485', '2021-11-15', '17:21:00'),
(802, 'PiTg8E4jq0', 32, '1073', '2021-11-15', '17:21:00'),
(803, 'PiTg8E4jq0', 32, '4347', '2021-11-15', '17:21:00'),
(804, 'PiTg8E4jq0', 32, '4871', '2021-11-15', '17:21:00'),
(805, 'FStvOaSZQl', 32, '1513', '2021-11-15', '17:21:52'),
(806, 'FStvOaSZQl', 32, '3590', '2021-11-15', '17:21:52'),
(807, 'FStvOaSZQl', 32, '0193', '2021-11-15', '17:21:52'),
(808, 'x8XEltJMaU', 32, '5381', '2021-11-15', '17:22:31'),
(809, 'x8XEltJMaU', 32, '1024', '2021-11-15', '17:22:31'),
(810, 'x8XEltJMaU', 32, '4871', '2021-11-15', '17:22:31'),
(811, 'ECCkS9y1ks', 32, '1073', '2021-11-15', '17:23:00'),
(812, 'ECCkS9y1ks', 32, '4007', '2021-11-15', '17:23:00'),
(813, 'ECCkS9y1ks', 32, '1513', '2021-11-15', '17:23:00'),
(814, 'ECCkS9y1ks', 32, '0485', '2021-11-15', '17:23:00'),
(815, 'ECCkS9y1ks', 32, '4347', '2021-11-15', '17:23:00'),
(816, 'qsaYI46rjF', 32, '7956', '2021-11-15', '18:55:20'),
(817, 'qsaYI46rjF', 32, '1513', '2021-11-15', '18:55:20'),
(818, 'qsaYI46rjF', 32, '1024', '2021-11-15', '18:55:20'),
(819, 'qsaYI46rjF', 32, '0193', '2021-11-15', '18:55:20'),
(820, 'kbsMWkeM6p', 32, '4007', '2021-11-15', '19:21:35'),
(821, 'kbsMWkeM6p', 32, '3590', '2021-11-15', '19:21:35'),
(822, 'kbsMWkeM6p', 32, '2554', '2021-11-15', '19:21:35'),
(823, 'VriSiqyu98', 32, '5381', '2021-11-15', '19:27:36'),
(824, 'VriSiqyu98', 32, '4347', '2021-11-15', '19:27:36'),
(825, 'VriSiqyu98', 32, '7956', '2021-11-15', '19:27:36'),
(826, 'VriSiqyu98', 32, '4007', '2021-11-15', '19:27:36'),
(827, 'IznIh3OWiJ', 32, '3590', '2021-11-15', '19:31:48'),
(828, 'IznIh3OWiJ', 32, '0485', '2021-11-15', '19:31:48'),
(829, 'IznIh3OWiJ', 32, '0193', '2021-11-15', '19:31:48'),
(830, 'IznIh3OWiJ', 32, '2554', '2021-11-15', '19:31:48'),
(831, 'IznIh3OWiJ', 32, '7956', '2021-11-15', '19:31:48'),
(832, 'PGElJvqOKc', 32, '7956', '2021-11-15', '19:37:11'),
(833, 'PGElJvqOKc', 32, '4007', '2021-11-15', '19:37:11'),
(834, 'PGElJvqOKc', 32, '0485', '2021-11-15', '19:37:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_web`
--
ALTER TABLE `admin_web`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `graph`
--
ALTER TABLE `graph`
  ADD PRIMARY KEY (`id_graph`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `infotoko`
--
ALTER TABLE `infotoko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `itemc1`
--
ALTER TABLE `itemc1`
  ADD PRIMARY KEY (`id_itemc1`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `itemc2`
--
ALTER TABLE `itemc2`
  ADD PRIMARY KEY (`id_itemc2`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `itemc3`
--
ALTER TABLE `itemc3`
  ADD PRIMARY KEY (`id_itemc3`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `qrcodes`
--
ALTER TABLE `qrcodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `riwayat_testi`
--
ALTER TABLE `riwayat_testi`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id_statistik`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id_sp_admin`);

--
-- Indexes for table `tmp_c2`
--
ALTER TABLE `tmp_c2`
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `tmp_trans`
--
ALTER TABLE `tmp_trans`
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_toko_fk` (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_web`
--
ALTER TABLE `admin_web`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `graph`
--
ALTER TABLE `graph`
  MODIFY `id_graph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT for table `infotoko`
--
ALTER TABLE `infotoko`
  MODIFY `id_toko` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `itemc1`
--
ALTER TABLE `itemc1`
  MODIFY `id_itemc1` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28266;

--
-- AUTO_INCREMENT for table `itemc2`
--
ALTER TABLE `itemc2`
  MODIFY `id_itemc2` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50763;

--
-- AUTO_INCREMENT for table `itemc3`
--
ALTER TABLE `itemc3`
  MODIFY `id_itemc3` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162079;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_hasil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `qrcodes`
--
ALTER TABLE `qrcodes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `riwayat_testi`
--
ALTER TABLE `riwayat_testi`
  MODIFY `id_testi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id_statistik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=854;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id_sp_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=835;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_web`
--
ALTER TABLE `admin_web`
  ADD CONSTRAINT `admin_web_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `graph`
--
ALTER TABLE `graph`
  ADD CONSTRAINT `graph_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `itemc1`
--
ALTER TABLE `itemc1`
  ADD CONSTRAINT `itemc1_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `itemc2`
--
ALTER TABLE `itemc2`
  ADD CONSTRAINT `itemc2_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `itemc3`
--
ALTER TABLE `itemc3`
  ADD CONSTRAINT `itemc3_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `pendapatan_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `qrcodes`
--
ALTER TABLE `qrcodes`
  ADD CONSTRAINT `qrcodes_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `rule`
--
ALTER TABLE `rule`
  ADD CONSTRAINT `rule_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `tmp_c2`
--
ALTER TABLE `tmp_c2`
  ADD CONSTRAINT `tmp_c2_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `tmp_trans`
--
ALTER TABLE `tmp_trans`
  ADD CONSTRAINT `tmp_trans_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `infotoko` (`id_toko`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
