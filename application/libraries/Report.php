<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report{

	public function __construct()
	{
		require_once(APPPATH.'third_party/fpdf/fpdf.php');
		//reqiure_once('third_party/fpdf/fpdf.php');
		$pdf=new FPDF();
		$pdf->AddPage();
		$CI=& get_instance();
		$CI->fpdf=$pdf;
		
	}
}