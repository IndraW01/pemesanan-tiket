-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2021 pada 21.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_films`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `tiket` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `status` enum('Lunas','Belum Lunas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Lunas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama_category`, `slug_category`, `created_at`, `updated_at`) VALUES
(1, 'Action', 'action', '2021-12-03 13:33:15', '2021-12-03 13:33:15'),
(2, 'Horror', 'horror', '2021-12-03 13:33:15', '2021-12-03 13:33:15'),
(3, 'Animation', 'animation', '2021-12-03 13:33:16', '2021-12-03 13:33:16'),
(4, 'Drama', 'drama', '2021-12-03 13:33:16', '2021-12-03 13:33:16'),
(5, 'Adventure', 'adventure', '2021-12-03 13:33:16', '2021-12-03 13:33:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_film`
--

CREATE TABLE `category_film` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_film`
--

INSERT INTO `category_film` (`id`, `film_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-12-03 14:11:06', '2021-12-03 14:11:06'),
(2, 1, 4, '2021-12-03 14:11:06', '2021-12-03 14:11:06'),
(3, 2, 3, '2021-12-03 14:12:41', '2021-12-03 14:12:41'),
(4, 2, 5, '2021-12-03 14:12:41', '2021-12-03 14:12:41'),
(5, 3, 1, '2021-12-03 14:13:50', '2021-12-03 14:13:50'),
(6, 4, 1, '2021-12-03 14:15:23', '2021-12-03 14:15:23'),
(7, 4, 2, '2021-12-03 14:15:23', '2021-12-03 14:15:23'),
(11, 5, 1, '2021-12-03 14:17:14', '2021-12-03 14:17:14'),
(12, 5, 4, '2021-12-03 14:17:14', '2021-12-03 14:17:14'),
(13, 5, 5, '2021-12-03 14:17:14', '2021-12-03 14:17:14'),
(14, 6, 4, '2021-12-03 14:18:57', '2021-12-03 14:18:57'),
(15, 7, 3, '2021-12-03 14:20:59', '2021-12-03 14:20:59'),
(16, 7, 5, '2021-12-03 14:20:59', '2021-12-03 14:20:59'),
(17, 8, 4, '2021-12-03 14:22:22', '2021-12-03 14:22:22'),
(18, 9, 4, '2021-12-03 14:27:05', '2021-12-03 14:27:05'),
(19, 9, 5, '2021-12-03 14:27:05', '2021-12-03 14:27:05'),
(22, 11, 1, '2021-12-03 14:29:19', '2021-12-03 14:29:19'),
(23, 11, 2, '2021-12-03 14:29:20', '2021-12-03 14:29:20'),
(24, 10, 1, '2021-12-03 14:29:29', '2021-12-03 14:29:29'),
(25, 10, 5, '2021-12-03 14:29:29', '2021-12-03 14:29:29'),
(26, 12, 2, '2021-12-03 14:30:28', '2021-12-03 14:30:28'),
(27, 12, 4, '2021-12-03 14:30:28', '2021-12-03 14:30:28'),
(28, 13, 1, '2021-12-03 14:31:33', '2021-12-03 14:31:33'),
(31, 14, 1, '2021-12-03 14:32:51', '2021-12-03 14:32:51'),
(32, 14, 5, '2021-12-03 14:32:51', '2021-12-03 14:32:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sutradara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `playing` enum('Now PLaying','Upcoming') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `durasi` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `films`
--

INSERT INTO `films` (`id`, `title`, `sinopsis`, `sutradara`, `pemain`, `produksi`, `playing`, `harga`, `durasi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Ghostbusters: Afterlife', '<p>Carrie Coon, Paul Rudd, Finn Wolfhard, Mckenna Grace, Logan Kim, Celeste O\'Connor, Bill Murray, Dan Aykroyd, Ernie Hudson, Annie Potts, Sigourney Weaver, Bob Gunton, J.K. Simmons</p>', 'Jason Reitman', 'Carrie Coon, Paul Rudd, Finn Wolfhard, Mckenna Grace, Logan Kim, Celeste O\'Connor, Bill Murray, Dan Aykroyd, Ernie Hudson, Annie Potts, Sigourney Weaver, Bob Gunton, J.K. Simmons', 'Columbia Pictures', 'Now PLaying', 45000, 124, 'film-1638540666.jpg', '2021-12-03 14:11:06', '2021-12-03 14:11:06'),
(2, 'The Boss Baby: Family Business', '<p>Di film kedua, Tim dan Ted kini sudah dewasa dan memiliki kehidupan masing-masing.<p></p>Mereka disatukan kembali oleh Boss Baby yang baru yang ternyata adalah anak bungsu Tim yang bernama Tina.<p></p>Tina meminta bantuan Tim dan Ted untuk menghentikan seorang profesor jahat yang ingin menghapus masa indah anak-anak di seluruh dunia.</p>', 'Tom McGrath', 'Alec Baldwin, James Marsden, Amy Sedaris, Ariana Greenblatt, Jeff Goldblum, Eva Longoria, James McGrath, Jimmy Kimmel, Lisa Kudrow', 'Universal Pictures', 'Now PLaying', 45000, 107, 'film-1638540760.jpg', '2021-12-03 14:12:41', '2021-12-03 14:12:41'),
(3, 'Raging Fire', '<p>Cheung Sung-bong (Donnie Yen) adalah seorang perwira polisi yang bekerja di garis depan selama bertahun-tahun. Namun, masa lalu menghantui dirinya ketika ia harus menghadapi sekelompok penjahat yang dipimpin oleh mantan anak didiknya, Yau Kong-ngo (Nicholas Tse), yang masih menyimpan dendam terhadap Bong yang memasukkan dirinya ke penjara. Ngo tidak akan berhenti melawan orang yang mencampuri masalahnya, termasuk orang yang pernah menjadi pembimbingnya.</p>', 'Benny Chan', 'Donnie Yen, Nicholas Tse, Jeana Ho, Ray Lui, Patrick Tam, Ben Lam, Deep Ng, Kang Yu, Kwok-Keung Cheung', 'Emperor Film Production, Super Bullet Pictures, Te', 'Now PLaying', 45000, 126, 'film-1638540830.jpg', '2021-12-03 14:13:50', '2021-12-03 14:13:50'),
(4, 'Venom: Let There Be Carnage', '<p>Eddie (Tom Hardy) yang kini sudah berteman dengan Venom berusaha hidup normal, namun masalah datang saat ia bertemu dengan Cletus Kasady (Woody Harrelson) yang diketahui sebagai inang dari symbiote dengan sebutan Carnage.</p>', 'Andy Serkis', 'Tom Hardy, Woody Harrelson, Michelle Williams, Naomie Harris, Stephen Graham, Scroobius Pip, Reid Scott, Peggy Lu', 'Columbia Pictures', 'Now PLaying', 45000, 97, 'film-1638540923.jpg', '2021-12-03 14:15:23', '2021-12-03 14:15:23'),
(5, 'Eternals', '<div>Berkisah tentang ras makhluk abadi yang telah hidup di bumi secara rahasia selama ribuan tahun.Sekumpulan sosok alien abadi ini memiliki tugas melindungi bumi dari musuh mereka yang sangat kuat.<br><br></div>', 'Chloe Zhao', 'Salma Hayek, Angelina Jolie, Gemma Chan, Richard Madden, Kumail Nanjiani, Lia McHugh, Brian Tyree Henry, Lauren Ridloff, Barry Keoghan, Ma Dong-seok, Kit Harington', 'Walt Disney Pictures', 'Now PLaying', 45000, 156, 'film-1638541034.jpg', '2021-12-03 14:16:54', '2021-12-03 14:17:14'),
(6, 'Yowis Ben 3', '<p>Hidup Bayu (Bayu Skak) nyaman selain karena Yowis Ben semakin tenar, Asih (Anya Geraldine), pacarnya, juga selalu mendukung Bayu dalam setiap cita-citanya. Bayu mulai merasa cemas dengan masa depannya ketika Nando (Brandon Salim), pemain keyboardnya memutuskan untuk kuliah musik di luar negeri, Cak Jon (Arief Didu) memutuskan meninggalkan Yowis Ben dan mengejar cintanya, Mbak Rini (Putri Ayudya) yang telah bertunangan dengan seorang Perwira, Kapten Arjuna (Denny Sumargo). Situasi diperparah lagi dengan kedatangan Susan (Cut Meyriska), mantan Bayu yang membuat mereka kembali dekat tanpa sepengetahuan Asih. Berhasilkah Bayu mempertahankan Yowis Ben dan mempertahankan cinta Asih, ketika diam-diam Bayu dekat kembali dengan Susan?</p>', 'Fajar Nugros, Bayu Skak', 'Bayu Skak, Joshua Suherman, Brandon Salim, Tutus Thomson, Anya Geraldine, Anggika Bolsterli, Devina Aureel, Clairine Clay, Arief Didu, Putri Ayudya, Laura Theux, Tri Karnadinata, Cut Meyriska', 'Starvision', 'Now PLaying', 45000, 113, 'film-1638541137.jpg', '2021-12-03 14:18:57', '2021-12-03 14:18:57'),
(7, 'Encanto', '<p>Mirabel adalah gadis muda Kolombia yang harus menghadapi frustrasi karena menjadi satu-satunya anggota keluarga tanpa kekuatan magis.<p></p><p></p>Meski iri dengan para saudaranya, Mirabel menjadi satu-satunya yang bisa menyelamatkan keluarganya ketika ada ancaman yang mengancam rumah mereka.</p>', 'Jared Bush, Byron Howard', 'Stephanie Beatriz, Maria Cecilia Botero, John Leguizamo, Diane Guerrero, Jessica Darrow, Ravi Cabot-Conyers, Angie Cepeda, Wilmer Valderrama, Carolina Gaitan, Mauro Castillo', 'Walt Disney Pictures', 'Now PLaying', 45000, 109, 'film-1638541258.jpg', '2021-12-03 14:20:58', '2021-12-03 14:20:58'),
(8, 'Akhirat: A Love Story', '<p>\"Akhirat: A Love Story\" berkisah tentang Timur, seorang akuntan muda yang jatuh cinta kepada Mentari, seorang seniman berjiwa bebas. Dengan perbedaan yang mereka miliki, mereka tetap teguh untuk bersama. Tapi tragedi melanda, Timur dan Mentari mengalami kecelakaan mobil yang membuat mereka koma. Di dalam ketiadaan tersebut, mereka menemukan diri berada di persimpangan di antara alam manusia dan alam akhirat. Tak ingin dipisahkan, Timur dan Mentari kini menjelajahi ruang antar dunia akhirat dan bertemu dengan jiwa-jiwa lain yang juga memilih nasib yang sama. Akankah dunia transisi ini memberikan kesempatan bagi mereka untuk bersama? Atau mereka harus memilih takdir lain yang akan menguji cinta mereka.</p>', 'Jason Iskandar', 'Adipati Dolken, Della Dartyan, Verdi Solaiman, Ayu Dyah Pasha, Nungki Kusumastuti, Yayu Unru, Arswendi Nasution, Windy Apsari Watch Trailer Playing At', 'BASE Entertainment, Studio Antelope', 'Now PLaying', 45000, 112, 'film-1638541342.jpg', '2021-12-03 14:22:22', '2021-12-03 14:22:22'),
(9, 'West Side Story', '<p>Sebuah kisah adaptasi, film ini akan mengisahkan tentang hubungan cinta terlarang dan persaingan antar geng jalanan remaja dari latar belakang etnis yang berbeda.</p>', 'Steven Spielberg', 'Ansel Elgort, Rachel Zegler, Ariana DeBose, David Alvarez, Rita Moreno, Brian d\'Arcy James, Corey Stoll, Mike Faist', 'Walt Disney Pictures', 'Upcoming', 45000, 156, 'film-1638541625.jpg', '2021-12-03 14:27:05', '2021-12-03 14:27:05'),
(10, 'Spider-Man: No Way Home', '<div>Pasca terbongkarnya identitas Spider-Man, Peter Parker meminta bantuan Doctor Strange untuk. Namun, ketika mantra salah, musuh berbahaya dari dunia lain mulai muncul, memaksa Peter untuk menemukan apa artinya menjadi Spider-Man.<br><br></div>', 'Jon Watts', 'Tom Holland, Zendaya, Benedict Cumberbatch, Marisa Tomei, Jon Favreau, J.K. Simmons, Willem Dafoe, Angourie Rice, Alfred Molina, Jamie Foxx, Benedict Wong', 'Columbia Pictures', 'Upcoming', 45000, 120, 'film-1638541700.jpg', '2021-12-03 14:28:20', '2021-12-03 14:29:29'),
(11, 'Resident Evil: Welcome to Raccoon City', '<p>Berlatar tahun 1998, kisah asal ini akan mengungkap rahasia Spencer Mansion yang misterius dan Raccoon City yang bernasib tragis.</p>', 'Johannes Roberts', 'Kaya Scodelario, Robbie Amell, Hannah John-Kamen, Neal McDonough, Tom Hopper, Avan Jogia, Avaah Blackwell, Donal Logue, Stephannie Hawkins, Lily Gao', 'Columbia Pictures', 'Upcoming', 45000, 120, 'film-1638541759.jpg', '2021-12-03 14:29:19', '2021-12-03 14:29:19'),
(12, 'House of Gucci', '<p>Ketika Patrizia Reggiani (Lady Gaga), sosok sederhana menikah dengan keluarga Gucci, ambisinya yang tak terkendali mulai mengungkap warisan mereka dan memicu pengkhianatan, dekadensi, balas dendam, dan akhirnya ... pembunuhan.</p>', 'Ridley Scott', 'Lady Gaga, Adam Driver, Al Pacino, Jeremy Irons, Jared Leto, Jack Huston, Salma Hayek, Alexia Murray, Vincent Riotta, Gaetano Bruno, Camille Cottin', 'Universal Pictures', 'Upcoming', 45000, 120, 'film-1638541827.jpg', '2021-12-03 14:30:27', '2021-12-03 14:30:27'),
(13, 'The Matrix Resurrections', '<p>Kisah Neo berlanjut, perjuangan kali ini akan lebih sulit dari yang sebelumnya. Perang antara dua dunia kembali terjadi.</p>', 'Lana Wachowski', 'Keanu Reeves, Carrie-Anne Moss, Christina Ricci, Jessica Henwick, Jonathan Groff, Priyanka Chopra Jonas, Neil Patrick Harris, Jada Pinkett Smith, Yahya Abdul-Mateen II, Daniel Bernhardt', 'Warner Bros. Pictures', 'Upcoming', 45000, 120, 'film-1638541893.jpg', '2021-12-03 14:31:33', '2021-12-03 14:31:33'),
(14, 'The King\'s Man', '<div>Di awal abad ke-20, agensi Kingsman dibentuk untuk melawan komplotan jahat yang merencanakan perang untuk memusnahkan jutaan orang.<br><br></div>', 'Matthew Vaughn', 'Ralph Fiennes, Gemma Arterton, Rhys Ifans, Matthew Goode, Tom Hollander, Harris Dickinson, Daniel Brühl, Djimon Hounsou, Charles Dance', 'Twentieth Century Studios', 'Upcoming', 45000, 120, 'film-1638541958.jpg', '2021-12-03 14:32:38', '2021-12-03 14:32:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_11_06_011904_create_categories_table', 1),
(4, '2021_11_06_012819_create_films_table', 1),
(5, '2021_11_06_072530_category_film', 1),
(6, '2021_11_07_051339_aler_table_films', 1),
(7, '2021_11_07_071958_create_schedules_table', 1),
(8, '2021_11_11_142443_create_seats_table', 1),
(9, '2021_11_12_132713_create_wallets_table', 1),
(10, '2021_11_13_202827_create_bookings_table', 1),
(11, '2021_11_14_212623_seat_user', 1),
(12, '2021_11_22_103135_alter_table_user', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schedules`
--

INSERT INTO `schedules` (`id`, `schedule`, `created_at`, `updated_at`) VALUES
(1, '13.30', '2021-12-03 13:34:01', '2021-12-03 13:34:01'),
(2, '16.30', '2021-12-03 13:34:01', '2021-12-03 13:34:01'),
(3, '19.30', '2021-12-03 13:34:01', '2021-12-03 13:34:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seat` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_bangku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `seats`
--

INSERT INTO `seats` (`id`, `seat`, `no_bangku`, `created_at`, `updated_at`) VALUES
(1, 'A', 'A1', '2021-12-03 13:34:39', '2021-12-03 13:34:39'),
(2, 'A', 'A2', '2021-12-03 13:34:39', '2021-12-03 13:34:39'),
(3, 'A', 'A3', '2021-12-03 13:34:39', '2021-12-03 13:34:39'),
(4, 'A', 'A4', '2021-12-03 13:34:39', '2021-12-03 13:34:39'),
(5, 'A', 'A5', '2021-12-03 13:34:39', '2021-12-03 13:34:39'),
(6, 'B', 'B1', '2021-12-03 13:34:39', '2021-12-03 13:34:39'),
(7, 'B', 'B2', '2021-12-03 13:34:39', '2021-12-03 13:34:39'),
(8, 'B', 'B3', '2021-12-03 13:34:39', '2021-12-03 13:34:39'),
(9, 'B', 'B4', '2021-12-03 13:34:39', '2021-12-03 13:34:39'),
(10, 'B', 'B5', '2021-12-03 13:34:39', '2021-12-03 13:34:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seat_user`
--

CREATE TABLE `seat_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Indra Wijaya', 'indra@gmail.com', NULL, '$2y$10$TZelP6/8P5eoqIMaK8Gzk.LR9fArvw/qgijDERzNG0XQXdRnzYe3C', 1, NULL, '2021-12-03 13:40:47', '2021-12-03 13:40:47'),
(2, 'Alpitriansyah', 'alpit@gmail.com', NULL, '$2y$10$57NfDToSMFPYao9HkqyjQu9au0q6oLg0JumhNhLamdynxjge7w3dq', 0, NULL, '2021-12-03 13:44:44', '2021-12-03 13:44:44'),
(3, 'Jauhari Fadli', 'fadli@gmail.com', NULL, '$2y$10$ab6W5PCVRjsz2KwaDuNGIedHciWro0lLyDYiWAPg2gRgTfC3GWZiq', 0, NULL, '2021-12-03 13:45:13', '2021-12-03 13:45:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` int(11) NOT NULL,
  `saldo` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_film_id_foreign` (`film_id`),
  ADD KEY `bookings_schedule_id_foreign` (`schedule_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category_film`
--
ALTER TABLE `category_film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_film_film_id_foreign` (`film_id`),
  ADD KEY `category_film_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `seat_user`
--
ALTER TABLE `seat_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seat_user_seat_id_unique` (`seat_id`),
  ADD KEY `seat_user_user_id_foreign` (`user_id`),
  ADD KEY `seat_user_booking_id_foreign` (`booking_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `category_film`
--
ALTER TABLE `category_film`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `seat_user`
--
ALTER TABLE `seat_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `category_film`
--
ALTER TABLE `category_film`
  ADD CONSTRAINT `category_film_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

--
-- Ketidakleluasaan untuk tabel `seat_user`
--
ALTER TABLE `seat_user`
  ADD CONSTRAINT `seat_user_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_user_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
