<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		if( !$this->session->userdata('isLoggedIn') ) {
			redirect('/login/show_login');
		}

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index1()
	{
		$this->load->view('welcome_message');
	}
	public function sitemap()
	{
		$this->load->view('sitemap');
	}
	public function index()
	{
		//$html = $this->load->view('agents/invoices/invoice_pdf',$data,true);
		$data = [];
		//load the view and saved it into $html variable
		$html=$this->load->view('welcome_message', $data, true);

		//this the the PDF filename that user will get to download
		$pdfFilePath = "output_pdf_name.pdf";

		//load mPDF library
		$this->load->library('m_pdf');

		//generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($html);

		//download it.
		//$this->m_pdf->pdf->Output($pdfFilePath, "O");

		$this->m_pdf->pdf->Output();
	}
}
