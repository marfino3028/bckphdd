select	transaksi.notrans,
		transaksi.tgl,
		transaksi.Kdpasien,
		pasien.Nmpasien,
		dokter.Nmdokter,
		dokter.Spesialis,
		transaksi.biaya_obat, 
		dokter.BiayaDokter, 
		BiayaDokter+biaya_obat as subtotal,
		subtotal*10/100 as ppn,
		subtotal + ppn as total
		  IF 350000 < total THEN
      SET income_level = 'Low Income';
   ELSEIF monthly_value > 4000 AND monthly_value <= 7000 THEN
      SET income_level = 'Avg Income';
   ELSE
      SET income_level = 'High Income';
		from mahasiswa inner join (daftar inner join jurus on daftar.kdjurusan = jurus.kdjurusan)
		on mahasiswa.nim = daftar.nim;