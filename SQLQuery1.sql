select	daftar.nodaftar,
		daftar.tgl,
		mahasiswa.nim,
		mahasiswa.nama,
		jurus.jurusan,
		daftar.waktu,
		jurus.biaya_semester, 
		biaya_semester*2 as spp,
		biaya_semester*0.05 as biaya_adm,
		biaya_semester*2+biaya_semester+biaya_semester*0.05 as total
		from mahasiswa inner join (daftar inner join jurus on daftar.kdjurusan = jurus.kdjurusan)
		on mahasiswa.nim = daftar.nim;