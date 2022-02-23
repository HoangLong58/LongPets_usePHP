<?php
require_once('define.php');

function createDatabase() {
    //Ket noi
    $conn = new mysqli(HOST, USERNAME, PASSWORD);
    mysqli_set_charset($conn, 'utf8');
    //Tao cau truy van
    $sql = 'create database if not exists '. DATABASE;
    mysqli_query($conn, $sql);
    //Dong noi ket
    mysqli_close($conn);
}

function createTables() {
    //Ket noi
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
    //Tao cau truy van
    $sql = 'create table if not exists thucung (
        mathucung int primary key auto_increment,
        tenthucung varchar(50),
        gioitinhthucung char(10),
        tuoithucung int default 0,
        datiemchung char(20),
        baohanhsuckhoe char(20),
        tieude varchar(100),
        mota varchar(100),
        ghichu varchar(100),
        hinhanh varchar(200),
        giaban int default 0, 
        giamgia int default 0
    )';
    mysqli_query($conn, $sql);
    //Dong noi ket
    mysqli_close($conn);
}

function initData() {
    //Ket noi
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
    //Tao cau truy van
    for ($i=0; $i <20; $i++) {
        $sql = 'insert into thucung (mathucung, madanhmuc, tenthucung, gioitinhthucung, tuoithucung, datiemchung, baohanhsuckhoe, tieude, mota, ghichu, hinhanh, soluong, giaban, giamgia)
        values ('.$i.',1, "Husky", "Đực", "1", "Có", "Có", "[BÁN] Husky thuần chủng- Bảo hành 365 ngày_'.$i.'", "", "", "./assets/img/husky.jpg", 1, "'.(1000000+100000*$i).'", "'.((1000000+100000*$i)-(1000000+100000*$i)/10).'")';
        mysqli_query($conn, $sql);
    }
    //Dong noi ket
    mysqli_close($conn);
}

function execute($sql) {
	//open connection
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	mysqli_query($conn, $sql);

	//close connection
	mysqli_close($conn);
}

// SQL: select -> lay du lieu dau ra (select danh sach ban ghi, lay 1 ban ghi)
function executeResult($sql, $isSingle = false) {
	$data = null;

	//open connection
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	$resultset = mysqli_query($conn, $sql);
	if($isSingle) {
		$data = mysqli_fetch_array($resultset, 1);
	} else {
		$data = [];
		while(($row = mysqli_fetch_array($resultset, 1)) != null) {
			$data[] = $row;
		}
	}

	//close connection
	mysqli_close($conn);

	return $data;
}

//Tao data
createDatabase();
createTables();
//initData();




?>