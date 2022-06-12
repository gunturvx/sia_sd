<?php 
//memanggil library FPDF
require 'fpdf.php';

class Pdf extends FPDF
{
    function letak($gambar)
    {
        //memasukkan gambar untuk header
        $this->Image($gambar, 10, 10, 25, 25);
        //menggeser posisi sekarang
    }
    function judul($teks1, $teks2, $teks3, $teks4, $teks5)
    {
        $this->Cell(25);
        $this->SetFont('Times', 'B', '12');
        $this->Cell(0, 5, $teks1, 0, 1, 'C');
        $this->Cell(25);
        $this->Cell(0, 5, $teks2, 0, 1, 'C');
        $this->Cell(25);
        $this->SetFont('Times', 'B', '12');
        $this->Cell(0, 5, $teks3, 0, 1, 'C');
        $this->Cell(25);
        $this->SetFont('Times', 'I', '8');
        $this->Cell(0, 5, $teks4, 0, 1, 'C');
        $this->Cell(25);
        $this->Cell(0, 2, $teks5, 0, 1, 'C');
    }
    function garis()
    {
        $this->SetLineWidth(1);
        $this->Line(10, 36, 200, 36);
        $this->SetLineWidth(0);
        $this->Line(10, 37, 200, 37);
    }
}

//instantisasi objek

$pdf = new Pdf();

//Mulai dokumen

$pdf->AddPage('P', 'A4');

//meletakkan gambar

$pdf->letak('../../img/logo.png');

//meletakkan judul disamping logo diatas

$pdf->judul('PEMERINTAH KOTA CILACAP', 'DINAS PENDIDIKAN', 'SEKOLAH DASAR NEGERI CIPARI 02', 'Cilacap Jawa Tengah Telp. (8839)77388', 'Website: http://sdnegericipari02.sch.id | E-Mail: sdnegericipari02@gmail.com');
//membuat garis ganda tebal dan tipis
$pdf->garis();

$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,10,'No',1,0); 
$pdf->Cell(40,10,'Nama',1,0);
$pdf->Cell(25,10,'Mata Pelajaran',1,0);
$pdf->Cell(86,5,'Nilai',1,0,'C'); 
$pdf->Cell(14,10,'Total',1,0); 
$pdf->Cell(15,10,'Predikat',1,0);

$pdf->Cell(0,5,'',0,1); 

$pdf->Cell(75,5,'',0,0); 
$pdf->Cell(12,5,'T1',1,0);
$pdf->Cell(12,5,'T2',1,0);
$pdf->Cell(12,5,'T3',1,0);
$pdf->Cell(12,5,'T4',1,0);
$pdf->Cell(12,5,'T5',1,0);
$pdf->Cell(13,5,'PTS',1,0);
$pdf->Cell(13,5,'PAS',1,1);


$pdf ->SetFont('Arial','',10);

//isi kolom rapot
$no=1;;
include '../../app/database/db.php';
$id_siswa=$_GET['id'];
$query=mysqli_query($con, "SELECT * FROM tb_nilai 
INNER JOIN tb_siswa ON tb_nilai.id_siswa=tb_siswa.id_siswa
INNER JOIN tb_master_mapel ON tb_nilai.id_mapel=tb_master_mapel.id_mapel")or die(mysqli_error($con));

while($data=mysqli_fetch_array($query)){

	//data rows
	$pdf->Cell(10,5,$no,1,0);
	$pdf->Cell(40,5,$data['nama_siswa'],1,0);
    $pdf->Cell(25,5,$data['mapel'],1,0);
	$pdf->Cell(12,5,$data['nilai_harian1'],1,0);
	$pdf->Cell(12,5,$data['nilai_harian2'],1,0);
	$pdf->Cell(12,5,$data['nilai_harian3'],1,0);
	$pdf->Cell(12,5,$data['nilai_harian4'],1,0);
	$pdf->Cell(12,5,$data['nilai_harian5'],1,0);
	$pdf->Cell(13,5,$data['nilai_pts'],1,0);
	$pdf->Cell(13,5,$data['nilai_pas'],1,0);
	$pdf->Cell(14,5,$data['nilai_akhir'],1,0);
    $pdf->Cell(15,5,$data['predikat'],1,0);

	$no++;
}
$pdf->Output('kopsurat.pdf', 'I');

?>