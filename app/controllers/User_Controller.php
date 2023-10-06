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
        $data =[
            'users' => $this->User_model->getUser(),
        ];
        $this->call->view('view', $data);
    }
    public function insert()
    {
        if ($this->form_validation->submitted ())
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

        if ($this->form_validation->run())
        {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $password = md5($this->io->post('password'));
               
            $this->User_model->insert($username, $email, $password);
            redirect('');
            
        }else{
                echo $this->form_validation->error();
            }
        }
    }
    public function delete($data){
        $this->User_model->delete($data);
        redirect('');
    }
    public function seteditdata($id)
    {
        $data['users'] = $this->User_model->seteditdata($id);
        $this->call->view('edit', $data);
    }
    public function edit(){
        if ($this->form_validation->submitted ())
        {
         $this->form_validation
         ->name('id')
         ->required()
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

        if ($this->form_validation->run())
        {
            $id = $this->io->post('id');
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $password = md5($this->io->post('password'));
               
            $this->User_model->edit($id, $username, $email, $password);
            redirect('edit');
            
        }else{ 
                echo $this->form_validation->error();
            }
        }
    }
}
?>
