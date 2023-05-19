<?php
require "./fpdf/fpdf.php";
include './class_mysql.php';
include './config.php';

$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM ticket WHERE id= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

  $sql_aten = Mysql::consulta("SELECT * FROM atencion WHERE id_ticket= '$id'");
  //$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);
  $reg2=mysqli_fetch_array($sql_aten, MYSQLI_ASSOC);
  $status_id=$reg['status_id'];
  $cliente_id=$reg['cliente_id'];
  $categoria_id=$reg['category_id'];  
  $priority_id=$reg['priority_id'];
  //$title=$reg['title'];

                                          $sql2 = mysqli_query($con, "select * from status where id=$status_id");
                                           if($c=mysqli_fetch_array($sql2)) {
                                            $name_status=$c['status_name'];
                                           }
                                           $sql2 = mysqli_query($con, "select * from clientes where id_cliente=$cliente_id");
                                            if($c=mysqli_fetch_array($sql2)) {
                                              $name_cliente=$c['name_Empresa'];
                                            }  
                                            $sql2 = mysqli_query($con, "select * from clientes where id_cliente=$cliente_id");
                                            if($c=mysqli_fetch_array($sql2)) {
                                              $email_cliente=$c['email'];
                                            }
                                            $sql2 = mysqli_query($con, "select * from category where id=$categoria_id");
                                            if($c=mysqli_fetch_array($sql2)) {
                                              $name_categoria=$c['category_name'];
                                            }
                                            $sql = mysqli_query($con, "select * from priority where id=$priority_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_priority=$c['priority_name'];
                                            }

class PDF extends FPDF
{
}

$pdf=new PDF('P','mm','Letter');
$pdf->SetMargins(15,20);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetTextColor(0,0,128);
$pdf->SetFillColor(0,255,255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont("Arial","b",9);
$pdf->Image('../img/logo.png',40,10,-300);
$pdf->Cell (0,5,utf8_decode('Listado de solicitudes de soporte'),0,1,'C');
$pdf->Cell (0,5,utf8_decode('Reporte de problema mediante Ticket'),0,1,'C');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Cell (0,5,utf8_decode('Información de Ticket #'.utf8_decode($reg['id'])),0,1,'C');

$pdf->Cell (35,10,'Fecha',1,0,'C',true);
$pdf->Cell (0,10,utf8_decode($reg['created_at']),1,1,'L');
$pdf->Cell (35,10,'Ticket',1,0,'C',true);
$pdf->Cell (0,10,utf8_decode($reg['id']),1,1,'L');
$pdf->Cell (35,10,'Estado',1,0,'C',true);
$pdf->Cell (0,10,utf8_decode($name_status),1,1,'L');
$pdf->Cell (35,10,'Categoria',1,0,'C',true);
$pdf->Cell (0,10,utf8_decode($name_categoria),1,1,'L');
$pdf->Cell (35,10,'Cliente',1,0,'C',true);
$pdf->Cell (0,10,utf8_decode($name_cliente),1,1,'L');
$pdf->Cell (35,10,'Email Cliente',1,0,'C',true);
$pdf->Cell (0,10,utf8_decode($email_cliente),1,1,'L');
$pdf->Cell (35,10,'Asunto',1,0,'C',true);
$pdf->Cell (0,10,utf8_decode($reg['title']),1,1,'L');
$pdf->Cell (35,15,'Problema',1,0,'C',true);
$pdf->MultiCell (0,15,utf8_decode($reg['description']),1,'L');
$pdf->Cell (35,15,'Prioridad',1,0,'C',true);
$pdf->Cell (0,15,utf8_decode($name_priority),1,1,'L');

$pdf->Ln();

$pdf->cell(0,5,"Soporte Ticketly 2020",0,0,'C');

$pdf->output();