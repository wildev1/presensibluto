CREATE DATABASE presensi;

CREATE TABLE karyawan (
  karyawan_id VARCHAR(50) PRIMARY KEY,
  nama_karyawan VARCHAR(255) NOT NULL,
  jabatan VARCHAR(255) NOT NULL,
  tanggal_gabung DATE NOT NULL,
  golongan_id VARCHAR(50),
  FOREIGN KEY (golongan_id) REFERENCES golongan(golongan_id)
);

CREATE TABLE golongan (
  golongan_id VARCHAR(50) PRIMARY KEY,
  nama_golongan VARCHAR(255) NOT NULL
);

CREATE TABLE shift (
  shift_id VARCHAR(50) PRIMARY KEY,
  nama_shift VARCHAR(255) NOT NULL,
  jam_mulai TIME NOT NULL,
  jam_selesai TIME NOT NULL,
  golongan_id VARCHAR(50),
  FOREIGN KEY (golongan_id) REFERENCES golongan(golongan_id)
);

CREATE TABLE jadwal (
  jadwal_id VARCHAR(50) PRIMARY KEY,
  karyawan_id VARCHAR(50),
  shift_id VARCHAR(50),
  tanggal DATE NOT NULL,
  hari VARCHAR(50) NOT NULL,
  FOREIGN KEY (karyawan_id) REFERENCES karyawan(karyawan_id),
  FOREIGN KEY (shift_id) REFERENCES shift(shift_id)
);

CREATE TABLE log_presensi (
  log_id VARCHAR(50) PRIMARY KEY,
  karyawan_id VARCHAR(50),
  jenis_log VARCHAR(50) NOT NULL,
  waktu_log DATETIME NOT NULL,
  lokasi_log VARCHAR(255) NOT NULL,
  keterangan TEXT,
  FOREIGN KEY (karyawan_id) REFERENCES karyawan(karyawan_id)
);

CREATE TABLE users (
  user_id VARCHAR(50) PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  karyawan_id VARCHAR(50),
  FOREIGN KEY (karyawan_id) REFERENCES karyawan(karyawan_id)
);

CREATE TABLE roles (
  role_id VARCHAR(50) PRIMARY KEY,
  nama_role VARCHAR(255) NOT NULL
);

CREATE TABLE permissions (
  permission_id VARCHAR(50) PRIMARY KEY,
  nama_permission VARCHAR(255) NOT NULL
);

CREATE TABLE user_roles (
  user_role_id VARCHAR(50) PRIMARY KEY,
  user_id VARCHAR(50),
  role_id VARCHAR(50),
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

CREATE TABLE role_permissions (
  role_permission_id VARCHAR(50) PRIMARY KEY,
  role_id VARCHAR(50),
  permission_id VARCHAR(50),
  FOREIGN KEY (role_id) REFERENCES roles(role_id),
  FOREIGN KEY (permission_id) REFERENCES permissions(permission_id)
);

