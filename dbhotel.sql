-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2023 pada 11.40
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_usn` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_usn`, `admin_pass`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(7, 'IMG_49390.png'),
(8, 'IMG_39821.png'),
(9, 'IMG_60692.png'),
(10, 'IMG_57315.png'),
(11, 'IMG_45655.png'),
(12, 'IMG_64574.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ig` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `ig`, `fb`, `tw`, `iframe`) VALUES
(1, 'Ponorogo, East Java', 'https://maps.app.goo.gl/MUguerFCae36yxe26', 6281234567890, 6281234567890, 'hotel-in@support.com', 'https://www.instagram.com/', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252881.38171459045!2d111.36459970279239!3d-7.970858897056285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e790b859cfee851:0x3027a76e352bea0!2sKabupaten Ponorogo, Jawa Timur!5e0!3m2!1sid!2sid!4v1698154819973!5m2!1sid!2sid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(5, 'IMG_93029.svg', 'Wi-fi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae beatae\r\ncorporis voluptas nam odit quidem'),
(6, 'IMG_57352.svg', 'Air Conditioner', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae beatae\r\ncorporis voluptas nam odit quidem'),
(7, 'IMG_51970.svg', 'Television', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae beatae\r\ncorporis voluptas nam odit quidem'),
(8, 'IMG_59299.svg', 'Geyser', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae beatae\r\ncorporis voluptas nam odit quidem'),
(9, 'IMG_49143.svg', 'Spa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae beatae corporis voluptas nam odit quidem'),
(10, 'IMG_52494.svg', 'Room Heater', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae beatae corporis voluptas nam odit quidem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(9, 'Spring Bed'),
(10, 'Balcony'),
(11, 'Sofa'),
(12, 'Bathroom'),
(13, 'Kitchen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(10, 'Family Room', 1, 400000, 10, 2, 2, 'Room for small happy family.', 1, 0),
(11, 'Honeymoon Room', 4, 1000000, 5, 2, 0, 'Room for two honeymooners', 1, 0),
(12, 'Deluxe Room', 3, 750000, 15, 5, 2, 'Room for small tour grup', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(10, 11, 5),
(11, 11, 6),
(12, 11, 7),
(13, 11, 8),
(14, 11, 10),
(15, 12, 5),
(16, 12, 6),
(17, 12, 7),
(18, 12, 8),
(19, 12, 9),
(20, 12, 10),
(21, 10, 6),
(22, 10, 7),
(23, 10, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(11, 11, 9),
(12, 11, 10),
(13, 11, 11),
(14, 11, 12),
(15, 12, 9),
(16, 12, 10),
(17, 12, 11),
(18, 12, 12),
(19, 12, 13),
(20, 10, 9),
(21, 10, 11),
(22, 10, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(11, 10, 'IMG_97320.png', 0),
(12, 11, 'IMG_34564.png', 1),
(13, 11, 'IMG_77656.png', 0),
(14, 12, 'IMG_35630.png', 1),
(15, 12, 'IMG_24308.png', 0),
(16, 10, 'IMG_76638.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'AAA', 'BBB', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(3, 'aaa', 'IMG_85788.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `password`, `status`, `datentime`) VALUES
(2, 'Alvian', 'alviandwiky123@gmail.com', 'png', '12345', '$2y$10$9Y3mjgEloG4mLD8NjdaFxu/DGne.oIwGpW0KWOh7G7kEzPDYBu2Ca', 1, '2023-12-05 16:50:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(7, 'Alvian Dwiky', 'hotel-in@support.com', 'qwerty', 'qwertyuiop', '2023-11-18', 0),
(8, 'Alvian Dwiky', 'hotel-in@support.com', 'qwerty', 'qwertyuiop', '2023-11-18', 0),
(9, 'Alvian Dwiky', 'hotel-in@support.com', 'qwerty', 'qwertyuiop', '2023-11-20', 0),
(10, 'News', 'lfal@akhl.com', 'kkkkk', 'lllllllll', '2023-11-21', 0),
(11, 'Alvian', 'hotel-in@support.com', 'qwerty', 'asdfgh', '2023-11-21', 0),
(12, 'Alvian Dwiky', 'hotel-in@support.com', 'asdfgh', 'zxcvb', '2023-11-26', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indeks untuk tabel `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indeks untuk tabel `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room id` (`room_id`),
  ADD KEY `facilities id` (`facilities_id`);

--
-- Indeks untuk tabel `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `rm id` (`room_id`),
  ADD KEY `features id` (`features_id`);

--
-- Indeks untuk tabel `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indeks untuk tabel `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indeks untuk tabel `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
