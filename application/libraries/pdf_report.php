<?php 
defined('BASEPATH') OR exit('No direct Script access allowed');

require_once dirname(__file__).'/tcpdf/tcpdf.php';
class Pdf_report extends TCPDF
{
	protected $ci;
	
	function __construct()
	{
		
	}
}