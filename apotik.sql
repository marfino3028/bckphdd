use apotik_dewi

create table Beli
(
Kdbeli int,
Kdtransaksi int,
Kdplnggn int,
Kdproduk nchar(6),
Jumlah varchar(30),
total varchar(30),

constraint Kdbeli primary key (Kdbeli)
)

insert into Beli values ('001','001','001','pr001',3,150000)
insert into Beli values ('002','002','002','pr002',2,125000)
insert into Beli values ('003','003','003','pr003',1,1000000)
insert into Beli values ('004','004','004','pr004',6,69000)
insert into Beli values ('005','005','005','pr005',9,69000)

select * from Beli