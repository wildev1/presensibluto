CREATE TABLE users (
    users_id VARCHAR(50) PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    email VARCHAR(100),
    telepon VARCHAR(20),
    alamat TEXT,
    status ENUM('aktif', 'non-aktif') DEFAULT 'aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
    FOREIGN KEY (roles_id) REFERENCES roles(roles_id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permission(permission_id) ON DELETE CASCADE
);

CREATE TABLE users_roles (
    users_roles_id VARCHAR(50) PRIMARY KEY,
    users_id VARCHAR(50),
    roles_id VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users(users_id) ON DELETE CASCADE,
    FOREIGN KEY (roles_id) REFERENCES roles(roles_id) ON DELETE CASCADE
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

INSERT INTO lembaga (lembaga_id, nama_lembaga, nsm, npsm, alamat, kecamatan, kabupaten, provinsi, logo, nama_pimpinan, nip, qrcode)
VALUES 
(MD5('1'), 'lembaga Apins Digital', '1234567890', '0987654321', 'Jl. Raya lembaga No. 123', 'Kota', 'Kabupaten A', 'Provinsi X', 'logo.png', 'Nama Pimpinan', '12345','');


CREATE TABLE rayon (
    rayon_id VARCHAR(50) PRIMARY KEY,
    kode_rayon VARCHAR(100),
    nama_rayon VARCHAR(100),
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE tahun_ajaran (
    tahun_ajaran_id VARCHAR(50) PRIMARY KEY,
    kode_tahun_ajaran VARCHAR(100),
    nama_tahun_ajaran VARCHAR(100),
    status_tahun_ajaran VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE persentase_tagihan (
    persentase_tagihan_id VARCHAR(50) PRIMARY KEY,
    jabatan_santri VARCHAR(100),
    potongan VARCHAR(100),
    pembayaran VARCHAR(100),
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE semester (
  semester_id varchar(36) NOT NULL,
  semester varchar(36) NOT NULL,
  tahun_ajaran_id varchar(36) NOT NULL,
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (semester_id),
  FOREIGN KEY (tahun_ajaran_id) REFERENCES tahun_ajaran (tahun_ajaran_id) ON DELETE CASCADE
);

CREATE TABLE santri (
    santri_id VARCHAR(50) PRIMARY KEY,
    rayon_id VARCHAR(50),
    tahun_ajaran_id VARCHAR(50),	
    persentase_tagihan_id varchar(36),
    nis VARCHAR(20) UNIQUE,
    nik_santri VARCHAR(20) UNIQUE,
    no_kk VARCHAR(50),
    nama_santri VARCHAR(50),
    jenis_kelamin ENUM('Laki-laki', 'Perempuan'),
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    alamat TEXT,
    nama_ayah VARCHAR(50),
    hubungan_wali VARCHAR(50),
    tanggal_aktivasi DATE,
    tanggal_penutupan DATE,
    fingerprint_data TEXT,
    status_santri ENUM('aktif', 'non-aktif') DEFAULT 'aktif',
    status_kartu ENUM('aktif', 'non-aktif') DEFAULT 'aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY ( persentase_tagihan_id) REFERENCES persentase_tagihan(persentase_tagihan_id),
    FOREIGN KEY (tahun_ajaran_id) REFERENCES tahun_ajaran(tahun_ajaran_id),
    FOREIGN KEY (rayon_id) REFERENCES rayon(rayon_id)
);

CREATE TABLE transaksi (
    transaksi_id VARCHAR(50) PRIMARY KEY,
    tagihan_id VARCHAR(50),
    order_id VARCHAR(50),
    users_id VARCHAR(50),
    gross_amount VARCHAR(50),
    payment_type VARCHAR(50),
    transaction_time VARCHAR(50),
    va_number VARCHAR(255),
    bank VARCHAR(50),
    merchant_id VARCHAR(255),
    reference_id VARCHAR(255),
    acquirer VARCHAR(255),
    status_code VARCHAR(50),
    pdf_url TEXT,
    jenis_transaksi ENUM('Top-up', 'Penarikan', 'Pembayaran Tagihan'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tagihan_id) REFERENCES tagihan(tagihan_id),
    FOREIGN KEY (users_id) REFERENCES users(users_id)
);

CREATE TABLE saldo (
    santri_id VARCHAR(50) PRIMARY KEY,
    saldo_terakhir DECIMAL(10, 2),
    tanggal_update DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (santri_id) REFERENCES santri(santri_id)
);

CREATE TABLE tagihan (
    tagihan_id VARCHAR(50) PRIMARY KEY,
    santri_id VARCHAR(50),
    tahun_ajaran_id VARCHAR(50),	
    jenis_tagihan VARCHAR(50),
    jumlah_tagihan DECIMAL(10, 2),
    tanggal_jatuh_tempo DATE,
    deskripsi TEXT,
    status ENUM('Lunas', 'Belum Lunas') DEFAULT 'Belum Lunas',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tahun_ajaran_id) REFERENCES tahun_ajaran(tahun_ajaran_id),
    FOREIGN KEY (santri_id) REFERENCES santri(santri_id) ON DELETE CASCADE
);

CREATE TABLE limit_penarikan (
    limit_id VARCHAR(50) PRIMARY KEY,
    santri_id VARCHAR(50),
    limit_harian DECIMAL(10, 2),
    tanggal_berlaku DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (santri_id) REFERENCES santri(santri_id)
);

CREATE TABLE riwayat_transaksi (
    riwayat_id VARCHAR(50) PRIMARY KEY,
    transaksi_id VARCHAR(50),
    santri_id VARCHAR(50),
    jenis_transaksi ENUM('Top-up', 'Penarikan', 'Pembayaran Tagihan'),
    jumlah DECIMAL(10, 2),
    tanggal DATETIME,
    status ENUM('Pending', 'Diterima', 'Ditolak') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (transaksi_id) REFERENCES transaksi(transaksi_id),
    FOREIGN KEY (santri_id) REFERENCES santri(santri_id)
);

CREATE TABLE aktivasi_kartu (
    aktivasi_id VARCHAR(50) PRIMARY KEY,
    santri_id VARCHAR(50),
    pengurus_id VARCHAR(50),
    tanggal_aktivasi DATE,
    tanggal_penutupan DATE,
    status ENUM('aktif', 'non-aktif') DEFAULT 'aktif',
    fingerprint_verified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (santri_id) REFERENCES santri(santri_id),
    FOREIGN KEY (pengurus_id) REFERENCES users(users_id)
);

CREATE TABLE request_penarikan (
    request_id VARCHAR(50) PRIMARY KEY,
    santri_id VARCHAR(50),
    jumlah DECIMAL(10, 2),
    tanggal_request DATETIME,
    status ENUM('Pending', 'Disetujui', 'Ditolak') DEFAULT 'Pending',
    verifikasi_pengurus_id VARCHAR(50),
    fingerprint_verified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (santri_id) REFERENCES santri(santri_id),
    FOREIGN KEY (verifikasi_pengurus_id) REFERENCES users(users_id)
);
