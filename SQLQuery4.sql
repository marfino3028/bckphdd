/****** Script for SelectTopNRows command from SSMS  ******/
select	[akademik].[dbo].[mahasiswa].[alamat],
		[akademik].[dbo].[daftar].[nodaftar],
		[akademik].[dbo].[daftar].[gelombang],
		[akademik].[dbo].[daftar].[waktu]
from [akademik].[dbo].[mahasiswa]
left join [akademik].[dbo].[daftar]
on [akademik].[dbo].[mahasiswa].[nim] =
	[akademik].[dbo].[daftar].[nim];