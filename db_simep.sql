-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2019 pada 05.39
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simep`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pendukung_skp`
--

CREATE TABLE `data_pendukung_skp` (
  `id_data_pendukung` varchar(75) NOT NULL,
  `tahun_pendukung_skp` year(4) NOT NULL,
  `jenis_data` varchar(25) NOT NULL,
  `data_pendukung` text,
  `tgl_unggah` date NOT NULL,
  `tgl_validasi` date NOT NULL,
  `id_detail_skp` varchar(75) NOT NULL,
  `id_validator` varchar(25) NOT NULL,
  `id_pengawas` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pendukung_skp`
--

INSERT INTO `data_pendukung_skp` (`id_data_pendukung`, `tahun_pendukung_skp`, `jenis_data`, `data_pendukung`, `tgl_unggah`, `tgl_validasi`, `id_detail_skp`, `id_validator`, `id_pengawas`) VALUES
('f_skp_2018_pengawas_0_20181225_231653', 2018, 'Laporan Utama', 'file_skp_2018_pengawas_0_20181225_231653.xls', '2018-12-25', '2018-12-25', 'skp_2018_pengawas_0', 'v_pegawaiptk', 'pgw_pengawas'),
('f_skp_2018_pengawas_0_20181228_035649', 2018, 'Laporan C', 'file_skp_2018_pengawas_0_20181228_035649.txt', '2018-12-28', '0000-00-00', 'skp_2018_pengawas_0', '', 'pgw_pengawas'),
('f_skp_2018_pengawas_0_20181228_051026', 2018, 'aaa', 'file_skp_2018_pengawas_0_20181228_051026.jpg', '2018-12-28', '0000-00-00', 'skp_2018_pengawas_0', '', 'pgw_pengawas'),
('f_skp_2018_pengawas_1_20181225_231724', 2018, 'Laporan Pendukung Rev. 1', 'file_skp_2018_pengawas_1_20181225_231743.xls', '2018-12-25', '2018-12-25', 'skp_2018_pengawas_1', 'v_pegawaiptk', 'pgw_pengawas'),
('f_skp_2018_pengawas_1_20181227_173241', 2018, 'Laporan Keigiatan B', 'file_skp_2018_pengawas_1_20181227_174036.xlsx', '2018-12-27', '2018-12-27', 'skp_2018_pengawas_1', 'v_pegawaiptk', 'pgw_pengawas'),
('f_skp_2018_pengawas_1_20181227_211437', 2018, 'Data Kegiatan B', 'file_skp_2018_pengawas_1_20181227_211437.xlsx', '2018-12-27', '0000-00-00', 'skp_2018_pengawas_1', '', 'pgw_pengawas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` varchar(75) NOT NULL,
  `laporan` text,
  `tahun_laporan` year(4) NOT NULL,
  `bln_mulai` varchar(25) NOT NULL,
  `bln_selesai` varchar(25) NOT NULL,
  `tgl_unggah` date NOT NULL,
  `tgl_validasi` date NOT NULL,
  `id_skp_detail` varchar(75) NOT NULL,
  `id_validator` varchar(25) NOT NULL,
  `id_pengawas` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `laporan`, `tahun_laporan`, `bln_mulai`, `bln_selesai`, `tgl_unggah`, `tgl_validasi`, `id_skp_detail`, `id_validator`, `id_pengawas`) VALUES
('l_skp_2018_pengawas_0_20181227_235958', 'laporan_skp_2018_pengawas_0_20181227_235958.txt', 2018, 'Januari', 'Desember', '2018-12-27', '2018-12-28', 'skp_2018_pengawas_0', 'v_pegawaiptk', 'pgw_pengawas'),
('l_skp_2018_pengawas_1_20181228_083516', 'laporan_skp_2018_pengawas_1_20181228_083516.txt', 2019, 'Februari', 'Maret', '2018-12-28', '0000-00-00', 'skp_2018_pengawas_1', '', 'pgw_pengawas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga`
--

CREATE TABLE `lembaga` (
  `npsn` varchar(50) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `nama_kepsek` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tingkat` varchar(3) NOT NULL,
  `status` varchar(15) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lembaga`
--

INSERT INTO `lembaga` (`npsn`, `nama_sekolah`, `nama_kepsek`, `alamat`, `tingkat`, `status`, `id_pegawai`) VALUES
(' 20534079', 'SD NEGERI DINOYO 01', 'aa', 'Jl. MT. HARYONO NO. 213', 'SD', 'Aktif', 'p_pengawas'),
('1123444', 'SD Indah', 'Maman', 'Malang', 'SD', 'Aktif', 'p_35730510118800012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL,
  `tanggal_dibaca` datetime NOT NULL,
  `hal` varchar(25) NOT NULL,
  `otorisasi` varchar(25) DEFAULT NULL,
  `url` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `tanggal_dibuat`, `tanggal_dibaca`, `hal`, `otorisasi`, `url`) VALUES
(1, '2018-12-28 10:00:00', '2018-12-28 03:45:31', 'Upload Data Pendukung SKP', 'Pegawai Bidang PTK', 'kasiptk/data_pendukung_skp'),
(2, '2018-12-28 03:56:49', '2018-12-28 03:57:21', 'Upload Data Pendukung SKP', 'Pegawai Bidang PTK', 'kasiptk/data_pendukung_skp/editDataPendukungSKP/f_skp_2018_pengawas_0_20181228_035649'),
(3, '2018-12-28 05:10:26', '2018-12-28 05:10:55', 'Upload Data Pendukung SKP', 'Pegawai Bidang PTK', 'kasiptk/data_pendukung_skp/editDataPendukungSKP/f_skp_2018_pengawas_0_20181228_051026'),
(4, '2018-12-28 08:35:16', '2018-12-28 08:35:53', 'Upload Data Laporan - Had', 'Pegawai Bidang PTK', 'kasiptk/data_laporan/editLaporan/l_skp_2018_pengawas_1_20181228_083516'),
(5, '2018-12-28 08:49:31', '0000-00-00 00:00:00', 'Upload Data Program Jadwa', 'Pegawai Bidang PTK', 'kasiptk/program_jadwal/editProgramJadwal/pj_skp_2018_pengawas_0_20181228_084931'),
(6, '2018-12-28 08:50:13', '0000-00-00 00:00:00', 'Upload Data Program Jadwa', 'Pegawai Bidang PTK', 'kasiptk/program_jadwal/editProgramJadwal/pj_skp_2018_pengawas_0_20181228_085012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(50) NOT NULL,
  `nip_nik` varchar(25) NOT NULL,
  `nama_pegawai` varchar(75) NOT NULL,
  `pangkat_gol_ruang` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `password` varchar(50) NOT NULL,
  `otoritas` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip_nik`, `nama_pegawai`, `pangkat_gol_ruang`, `jabatan`, `tmt_jabatan`, `jenis_kelamin`, `password`, `otoritas`, `status`, `unit_kerja`) VALUES
('p_admin', 'admin', 'Joko', 'xz', 'Pegawai PTK', '2018-01-01', 'L', 'rahasia', 'Admin', 'Aktif', 'Dinas Pendidikan Kota Malang'),
('p_kepaladinas', 'kepaladinas', 'Yadi', 'xd', 'Kepala Dinas', '2018-01-01', 'L', 'rahasia', 'Kepala Dinas', 'Aktif', 'Dinas Pendidikan Kota Malang'),
('p_kepalaptk', 'kepalaptk', 'Sarah', 'xa', 'Kepala Bidang PTK', '2018-01-01', 'P', 'rahasia', 'Kepala Bidang PTK', 'Aktif', 'Dinas Pendidikan Kota Malang'),
('p_pegawaiptk', 'pegawaiptk', 'Indah', 'xz', 'Kepala Seksi SD', '2018-01-01', 'P', 'rahasia', 'Pegawai Bidang PTK', 'Aktif', 'Dinas Pendidikan Kota Malang'),
('p_pengawas', 'pengawas', 'Hadi', 'xy', 'Pengawas SD', '2018-01-01', 'L', 'rahasia', 'Pengawas', 'Aktif', 'Dinas Pendidikan Kota Malang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawas`
--

CREATE TABLE `pengawas` (
  `id_pengawas` varchar(25) NOT NULL,
  `nuptk` varchar(25) NOT NULL,
  `bidang` varchar(10) NOT NULL,
  `pendidikan` varchar(75) NOT NULL,
  `tmp_lahir` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_pegawai` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengawas`
--

INSERT INTO `pengawas` (`id_pengawas`, `nuptk`, `bidang`, `pendidikan`, `tmp_lahir`, `tgl_lahir`, `id_pegawai`) VALUES
('pgw_pengawas', '123456789', 'SD', 'Magister Pendidikan Matematika Universitas Negeri Malang', 'Malang', '1960-06-01', 'p_pengawas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilai`
--

CREATE TABLE `penilai` (
  `id_penilai` varchar(25) NOT NULL,
  `id_pegawai` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilai`
--

INSERT INTO `penilai` (`id_penilai`, `id_pegawai`, `jabatan`, `status`) VALUES
('n_kepaladinas', 'p_kepaladinas', 'Atasan Pejabat Penilai', 'Aktif'),
('n_kepalaptk', 'p_kepalaptk', 'Pejabat Penilai', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_jadwal`
--

CREATE TABLE `program_jadwal` (
  `id_program_jadwal` varchar(75) NOT NULL,
  `program_jadwal` text,
  `jenis_program_jadwal` varchar(25) NOT NULL,
  `tahun_program` year(4) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `tgl_unggah` date NOT NULL,
  `tgl_validasi` date NOT NULL,
  `id_detail_skp` varchar(75) NOT NULL,
  `id_validator` varchar(25) NOT NULL,
  `id_pengawas` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_jadwal`
--

INSERT INTO `program_jadwal` (`id_program_jadwal`, `program_jadwal`, `jenis_program_jadwal`, `tahun_program`, `semester`, `tgl_unggah`, `tgl_validasi`, `id_detail_skp`, `id_validator`, `id_pengawas`) VALUES
('pj_skp_2018_pengawas_0_20181228_084931', 'projad_skp_2018_pengawas_0_20181228_084931.jpg', 'Semester', 2019, '1', '2018-12-28', '2019-01-07', 'skp_2018_pengawas_0', 'v_pegawaiptk', 'pgw_pengawas'),
('pj_skp_2018_pengawas_0_20181228_085012', 'projad_skp_2018_pengawas_0_20181228_085012.jpg', 'Semester', 2019, '2', '2018-12-28', '0000-00-00', 'skp_2018_pengawas_0', '', 'pgw_pengawas'),
('pj_skp_2018_pengawas_1_20181228_003248', 'projad_skp_2018_pengawas_1_20181228_004402.txt', 'Semester', 2018, '1', '2018-12-28', '2018-12-28', 'skp_2018_pengawas_1', 'v_pegawaiptk', 'pgw_pengawas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp_detail`
--

CREATE TABLE `skp_detail` (
  `id_detail_skp` varchar(75) NOT NULL,
  `keg_tgs_jbtn` varchar(100) NOT NULL,
  `jenis_unsur` varchar(25) NOT NULL,
  `ak_asli` double NOT NULL,
  `ak_tgt` double NOT NULL,
  `kuan_output_tgt` int(11) NOT NULL,
  `satuan_kuan_output_tgt` varchar(15) NOT NULL,
  `kual_mutu_tgt` double NOT NULL,
  `wkt_tgt` int(11) NOT NULL,
  `satuan_wkt_tgt` varchar(15) NOT NULL,
  `biaya_tgt` double NOT NULL,
  `tgl_serah` datetime NOT NULL,
  `ak_real` double NOT NULL,
  `kuan_output_real` int(11) NOT NULL,
  `satuan_kuan_output_real` varchar(15) NOT NULL,
  `kual_mutu_real` double NOT NULL,
  `wkt_real` int(11) NOT NULL,
  `satuan_wkt_real` varchar(15) NOT NULL,
  `biaya_real` double NOT NULL,
  `penghitungan` double NOT NULL,
  `nilai_capaian_skp` double NOT NULL,
  `tgl_ukur` datetime NOT NULL,
  `id_header_skp` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skp_detail`
--

INSERT INTO `skp_detail` (`id_detail_skp`, `keg_tgs_jbtn`, `jenis_unsur`, `ak_asli`, `ak_tgt`, `kuan_output_tgt`, `satuan_kuan_output_tgt`, `kual_mutu_tgt`, `wkt_tgt`, `satuan_wkt_tgt`, `biaya_tgt`, `tgl_serah`, `ak_real`, `kuan_output_real`, `satuan_kuan_output_real`, `kual_mutu_real`, `wkt_real`, `satuan_wkt_real`, `biaya_real`, `penghitungan`, `nilai_capaian_skp`, `tgl_ukur`, `id_header_skp`) VALUES
('skp_2018_pengawas_0', 'Kegiatan Utama', 'Unsur Utama', 70, 2100, 30, 'Buku', 70, 8, 'Bulan', 200000, '0000-00-00 00:00:00', 25, 60, 'Buku', 60, 9, 'Bulan', 250000, 117.35714285714, 29.339285714286, '0000-00-00 00:00:00', 'skp_2018_pengawas'),
('skp_2018_pengawas_1', 'Kegiatan Pendukung', 'Unsur Pendukung', 80, 2400, 30, 'Buku', 60, 7, 'Bulan', 300000, '0000-00-00 00:00:00', 20, 50, 'Buku', 40, 8, 'Bulan', 350000, 123.38095238095, 30.845238095238, '0000-00-00 00:00:00', 'skp_2018_pengawas'),
('skp_2019_pengawas_0', 'kegiatan a', 'Unsur Utama', 0.9, 1.8, 2, 'buku', 100, 12, 'bulan', 100, '0000-00-00 00:00:00', 0, 0, '', 0, 0, '', 0, 0, 0, '0000-00-00 00:00:00', 'skp_2019_pengawas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp_header`
--

CREATE TABLE `skp_header` (
  `id_header_skp` varchar(75) NOT NULL,
  `id_pejabat_penilai` varchar(25) NOT NULL,
  `id_tahun_skp` varchar(25) NOT NULL,
  `id_atasan_pejabat_penilai` varchar(25) NOT NULL,
  `id_validator` varchar(25) NOT NULL,
  `id_pengawas` varchar(25) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `tanggal_validasi` date NOT NULL,
  `tanggal_penilaian` datetime NOT NULL,
  `status_skp` enum('Diajukan Menunggu Validasi','Divalidasi dan Disetujui','Divalidasi dan Tidak Disetujui','Divalidasi dan Ditetapkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skp_header`
--

INSERT INTO `skp_header` (`id_header_skp`, `id_pejabat_penilai`, `id_tahun_skp`, `id_atasan_pejabat_penilai`, `id_validator`, `id_pengawas`, `tanggal_pengajuan`, `tanggal_validasi`, `tanggal_penilaian`, `status_skp`) VALUES
('skp_2018_pengawas', 'n_kepalaptk', 'skp_thn_2018', 'n_kepalaptk', '', 'pgw_pengawas', '2018-12-25 23:11:39', '2018-12-25', '2018-12-27 12:00:01', 'Divalidasi dan Disetujui'),
('skp_2019_pengawas', 'n_kepalaptk', 'skp_thn_2019', '', '', 'pgw_pengawas', '2018-12-28 08:28:22', '2018-12-28', '0000-00-00 00:00:00', 'Divalidasi dan Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp_perilaku_kerja`
--

CREATE TABLE `skp_perilaku_kerja` (
  `id_perilaku_kerja_skp` varchar(75) NOT NULL,
  `unsur` varchar(25) NOT NULL,
  `nilai` int(11) NOT NULL,
  `predikat` varchar(15) NOT NULL,
  `tanggal_penilaian` datetime NOT NULL,
  `id_header_skp` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skp_perilaku_kerja`
--

INSERT INTO `skp_perilaku_kerja` (`id_perilaku_kerja_skp`, `unsur`, `nilai`, `predikat`, `tanggal_penilaian`, `id_header_skp`) VALUES
('pk_skp_2018_pengawas_p_kepalaptk_0', 'Orientasi Pelayanan', 70, 'Cukup Baik', '2018-12-27 17:14:41', 'skp_2018_pengawas'),
('pk_skp_2018_pengawas_p_kepalaptk_1', 'Integritas', 60, 'Sedang', '2018-12-27 17:14:41', 'skp_2018_pengawas'),
('pk_skp_2018_pengawas_p_kepalaptk_2', 'Komitmen', 100, 'Sangat Baik', '2018-12-27 17:14:41', 'skp_2018_pengawas'),
('pk_skp_2018_pengawas_p_kepalaptk_3', 'Disiplin', 90, 'Baik', '2018-12-27 17:14:41', 'skp_2018_pengawas'),
('pk_skp_2018_pengawas_p_kepalaptk_4', 'Kerjasama', 80, 'Baik', '2018-12-27 17:14:41', 'skp_2018_pengawas'),
('pk_skp_2018_pengawas_p_kepalaptk_5', 'Kepemimpinan', 70, 'Cukup Baik', '2018-12-27 17:14:41', 'skp_2018_pengawas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp_tahun`
--

CREATE TABLE `skp_tahun` (
  `id_tahun_skp` varchar(25) NOT NULL,
  `tahun_skp` year(4) NOT NULL,
  `status` varchar(25) NOT NULL,
  `surat_keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skp_tahun`
--

INSERT INTO `skp_tahun` (`id_tahun_skp`, `tahun_skp`, `status`, `surat_keterangan`) VALUES
('skp_thn_2017', 2017, 'Tidak Aktif', ''),
('skp_thn_2018', 2018, 'Tidak Aktif', ''),
('skp_thn_2019', 2019, 'Tidak Aktif', 'ddd'),
('skp_thn_2020', 2020, 'Aktif', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validator`
--

CREATE TABLE `validator` (
  `id_validator` varchar(25) NOT NULL,
  `id_pegawai` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `validator`
--

INSERT INTO `validator` (`id_validator`, `id_pegawai`, `jabatan`, `status`) VALUES
('v_pegawaiptk', 'p_pegawaiptk', 'Test', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pendukung_skp`
--
ALTER TABLE `data_pendukung_skp`
  ADD PRIMARY KEY (`id_data_pendukung`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`npsn`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`id_pengawas`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `penilai`
--
ALTER TABLE `penilai`
  ADD PRIMARY KEY (`id_penilai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `program_jadwal`
--
ALTER TABLE `program_jadwal`
  ADD PRIMARY KEY (`id_program_jadwal`);

--
-- Indeks untuk tabel `skp_detail`
--
ALTER TABLE `skp_detail`
  ADD PRIMARY KEY (`id_detail_skp`),
  ADD KEY `id_header_skp` (`id_header_skp`);

--
-- Indeks untuk tabel `skp_header`
--
ALTER TABLE `skp_header`
  ADD PRIMARY KEY (`id_header_skp`),
  ADD KEY `id_pejabat_penilai` (`id_pejabat_penilai`),
  ADD KEY `id_pengawas` (`id_pengawas`),
  ADD KEY `id_atasan_pejabat_penilai` (`id_atasan_pejabat_penilai`);

--
-- Indeks untuk tabel `skp_perilaku_kerja`
--
ALTER TABLE `skp_perilaku_kerja`
  ADD PRIMARY KEY (`id_perilaku_kerja_skp`),
  ADD KEY `id_header_skp` (`id_header_skp`);

--
-- Indeks untuk tabel `skp_tahun`
--
ALTER TABLE `skp_tahun`
  ADD PRIMARY KEY (`id_tahun_skp`);

--
-- Indeks untuk tabel `validator`
--
ALTER TABLE `validator`
  ADD PRIMARY KEY (`id_validator`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  ADD CONSTRAINT `lembaga_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
