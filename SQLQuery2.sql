select transaksi.notrans, 
	   transaksi.tgl,
	   transaksi.Kdpasien, 
	   pasien.Nmpasien,
	   dokter.spesialis,
	   transaksi.biaya_obat,
	   dokter.BiayaDokter,
	   biaya_obat+BiayaDokter AS subtotal, 
	   (biaya_obat+BiayaDokter)*0.1 AS ppn, 
	   (biaya_obat+BiayaDokter)+((Biaya_obat+BiayaDokter)*0.1) AS Total,
		IIF((biaya_obat+BiayaDokter)+((Biaya_obat+BiayaDokter)*0.1)>350000, 'Tumbler',
		IIF((biaya_obat+BiayaDokter)+((Biaya_obat+BiayaDokter)*0.1)>500000, 'Tupperware','Tidak Ada')) AS Bonus
		from dokter INNER JOIN(Transaksi INNER JOIN pasien on transaksi.Kdpasien = pasien.Kdpasien) on dokter.Kddokter = transaksi.Kddokter;