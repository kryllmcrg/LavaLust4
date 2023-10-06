<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_Controller extends Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('User_model');
    }
	public function index()
    {
        $this->call->view('view');
    }
    public function insert()
    {
        $this->form_validation
		->name('username')
			->required()
			->min_length(5)
			->max_length(20)
            ->name('email')
            ->valid_email()
		    ->name('password')
			->required()
			->min_length(8)
		    ->name('cpassword')
			->matches('password')
			->required()
			->min_length(8);

		if ($this->form_validation->submitted ())
        {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $password = md5($this->io->post('password'));
			
            $this->User_model->insert($username. $email, $password);
            $this->call->view('view');
		}
		else
		{
			echo $this->form_validation->error();
		}
    }
}
?>
