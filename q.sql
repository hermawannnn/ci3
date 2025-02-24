SELECT a.*, b.nama AS nama_siswa FROM nilaideskripsimid a
JOIN siswa b ON b.id = a.siswa_id;

SELECT nilaideskripsimid.*, siswa.nama AS nama_siswa, kelas.nama_kelas
FROM nilaideskripsimid
JOIN siswa ON siswa.id = nilaideskripsimid.siswa_id
JOIN kelas ON kelas.id = siswa.kelas_id