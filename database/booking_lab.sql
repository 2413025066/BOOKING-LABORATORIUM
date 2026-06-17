CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role ENUM('admin','guru') NOT NULL
);

INSERT INTO user(username,password,role)
VALUES
('admin','admin123','admin'),
('guru','guru123','guru');

CREATE TABLE laboratorium (
    id_lab INT AUTO_INCREMENT PRIMARY KEY,
    nama_lab VARCHAR(100) NOT NULL
);

INSERT INTO laboratorium(nama_lab)
VALUES
('Lab Komputer 1'),
('Lab Komputer 2'),
('Lab Jaringan');

CREATE TABLE booking (
    id_booking INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_lab INT NOT NULL,
    tanggal DATE NOT NULL,
    jam VARCHAR(20) NOT NULL,
    keterangan TEXT,
    status VARCHAR(20) NOT NULL,

    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_lab) REFERENCES laboratorium(id_lab)
);