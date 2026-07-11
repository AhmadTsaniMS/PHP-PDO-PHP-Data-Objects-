-- 03_seed.sql
USE webworkshop;

TRUNCATE TABLE students;
INSERT INTO students(nim, nama, nilai) VALUES
('001','Ana',85),
('002','Budi',72),
('003','Cici',55);

TRUNCATE TABLE notes;
INSERT INTO notes(title, content) VALUES
('Pertama','Halo dari catatan pertama'),
('Kedua','Ini catatan kedua');
