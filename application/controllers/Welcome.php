<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	/**
	 *  Send email after form validation
	 */
	public function sendEmail()
	{
		$config = $this->setFormRules();
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('welcome_message');
		}
		else
		{
			$this->email->from( $this->input->post('email'), $this->input->post('name'));
			$this->email->to( 'farid.b@code.edu.az' );
			$this->email->subject( 'Contact email' );
			$this->email->message( $this->load->view( 'email', $this->input->post('message'), true ) );

			if($this->email->send())
			{
				$this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
			}
			else
			{
				$this->session->set_flashdata("email_sent","You have encountered an error");
			}
			$this->load->view('welcome_message');
		}
	}

	/**
	 *  Set form rules for contact form
	 * @return array
	 */
	private function setFormRules()
	{
		$rules = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email'
			),array(
				'field' => 'message',
				'label' => 'Message',
				'rules' => 'required|max_length[225]'
			),
		);
		return $rules;
	}
}
