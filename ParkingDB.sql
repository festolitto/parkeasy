create database parking;
create table `user`(idno int(20) primary key, firstname varchar(50),lastname varchar(50),plate_number varchar(50),phone int(20),email varchar(50),password varchar(50));
create table `parklotmanager`(managerid int(20) primary key, firstname varchar(50),lastname varchar(50),parkid varchar(50),username varchar(50),password varchar(50),email varchar(50));
create table `admin`(adminid int(20) primary key, firstname varchar(50),lastname varchar(50),username varchar(50),password varchar(50));
create table `book`(bookid int(20) primary key,datein date,timein time, dateout date, timeout time, idno int(20),parkid varchar(50),amount int(20),payment_status varchar(50),datetimein int(20), datetimeout int(20));
create table `parkinglot`(parkid varchar(20) primary key,parkname varchar(50),location varchar(50),openinghours varchar(50),capacity int(20), fee int(20));
create table transaction(id int(20) primary key,idno int(20),transactionid varchar(50));
create view as select b.datein,b.dateout,b.idno,b.bookid,p.parkname,b.timeout,b.amount,b.payment_status from book b join parkinglot p using(parkid);

ALTER TABLE  `book` ADD CONSTRAINT  `bookuserfk` FOREIGN KEY (  `idno` ) REFERENCES  `parking`.`user` (
`idno`
) ON DELETE SET NULL ON UPDATE CASCADE ;

ALTER TABLE  `book` ADD CONSTRAINT  `bookparkfk` FOREIGN KEY (  `parkid` ) REFERENCES  `parking`.`parkinglot` (
`parkid`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE  `parklotmanager` ADD CONSTRAINT  `managerparkfk` FOREIGN KEY (  `parkid` ) REFERENCES  `parking`.`parkinglot` (
`parkid`
) ON DELETE RESTRICT ON UPDATE RESTRICT;


CREATE VIEW spaces_summary as
select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl001' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl001'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl002' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl002'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl003' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl003'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl004' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl004'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl005' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl005'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl006' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl006'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl007' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl007'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl008' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl008'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl009' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl009'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl010' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl010'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl011' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl011'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl012' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl012'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl013' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl013'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl014' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl014'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl015' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl015'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl016' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl016'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl017' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl017'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl018' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl018'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl019' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl019'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl020' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl020'

union

select parkid,parkname,capacity-(select count(bookid) from book where parkid='pkl021' and dateout>curdate()) as remaining_spaces from parkinglot where parkid='pkl021';

