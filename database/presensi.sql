CREATE TABLE users (
    users_id VARCHAR(50) PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    email VARCHAR(100),
    jenis_kelamin VARCHAR(20),
    no_pegawai VARCHAR(20),
    telepon VARCHAR(20),
    status_pegawai_id VARCHAR(50),
    photo VARCHAR(225),
    qrcode VARCHAR(225),
    alamat TEXT,
    status ENUM('aktif', 'non-aktif') DEFAULT 'non-aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (status_pegawai_id) REFERENCES status_pegawai (status_pegawai_id) ON DELETE CASCADE
);

CREATE TABLE roles (
    roles_id VARCHAR(50) PRIMARY KEY,
    nama_roles VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE permission (
    permission_id VARCHAR(50) PRIMARY KEY,
    nama_permission VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE roles_permission (
    roles_permission_id VARCHAR(50) PRIMARY KEY,
    roles_id VARCHAR(50),
    permission_id VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (roles_id) REFERENCES roles (roles_id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permission (permission_id) ON DELETE CASCADE
);

CREATE TABLE users_roles (
    users_roles_id VARCHAR(50) PRIMARY KEY,
    users_id VARCHAR(50),
    roles_id VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users (users_id) ON DELETE CASCADE,
    FOREIGN KEY (roles_id) REFERENCES roles (roles_id) ON DELETE CASCADE
);

CREATE TABLE lembaga (
    lembaga_id VARCHAR(32) PRIMARY KEY,
    nama_lembaga VARCHAR(255),
    nsm VARCHAR(20),
    npsm VARCHAR(20),
    alamat TEXT,
    kecamatan VARCHAR(50),
    kabupaten VARCHAR(50),
    provinsi VARCHAR(50),
    logo VARCHAR(255),
    nama_pimpinan VARCHAR(255),
    nip VARCHAR(20),
    qrcode VARCHAR(220),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE status_pegawai (
    status_pegawai_id VARCHAR(50) PRIMARY KEY,
    kode_status_pegawai VARCHAR(100),
    nama_status_pegawai VARCHAR(100),
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE shifts (
    shift_id VARCHAR(50) PRIMARY KEY,
    nama_shift VARCHAR(100),
    jam_mulai TIME,
    jam_selesai TIME,
    durasi VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE group_shifts (
    group_shift_id VARCHAR(50) PRIMARY KEY,
    groub_shift VARCHAR(50),
    shift_id VARCHAR(50),
    hari VARCHAR(50),
    FOREIGN KEY (shift_id) REFERENCES shifts (shift_id) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE users_shift_groups (
    users_shift_group_id VARCHAR(50) PRIMARY KEY,
    users_id VARCHAR(50),
    group_shift_id VARCHAR(50),
    hari VARCHAR(50),
    FOREIGN KEY (users_id) REFERENCES users (users_id) ON DELETE CASCADE,
    FOREIGN KEY (group_shift_id) REFERENCES group_shifts (group_shift_id) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE presensi (
    presensi_id VARCHAR(50) PRIMARY KEY,
    users_id VARCHAR(50),
    shift_id VARCHAR(50),
    tanggal DATE NOT NULL,
    waktu_masuk TIME,
    waktu_keluar TIME,
    waktu_masuk_seharusnya TIME, -- Waktu masuk yang diharapkan sesuai shift
    terlambat BOOLEAN DEFAULT FALSE, -- Menandakan apakah karyawan terlambat
    lama_terlambat TIME, -- Durasi keterlambatan
    jenis_presensi ENUM('Apel', 'Kerja') NOT NULL,
    status ENUM(
        'Hadir',
        'Izin',
        'Sakit',
        'Bepergian',
        'Cuti',
        'Tanpa Keterangan'
    ) NOT NULL DEFAULT 'Tanpa Keterangan',
    izin_kategori_id VARCHAR(50),
    alasan VARCHAR(255),
    photo_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users (users_id) ON DELETE CASCADE,
    FOREIGN KEY (shift_id) REFERENCES shifts (shift_id) ON DELETE CASCADE,
    FOREIGN KEY (izin_kategori_id) REFERENCES izin_kategori (izin_kategori_id) ON DELETE SET NULL
);

CREATE TABLE laporan_kinerja (
    laporan_id VARCHAR(50) PRIMARY KEY,
    users_id VARCHAR(50),
    tanggal DATE,
    photo VARCHAR(255),
    status_validasi ENUM(
        'Valid',
        'Tidak Valid',
        'Pending'
    ) DEFAULT 'Pending',
    catatan TEXT,
    dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    diperbarui_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users (users_id) ON DELETE CASCADE
);