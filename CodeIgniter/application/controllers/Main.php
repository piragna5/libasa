<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

        /* ------------------ */    
 
        $this->load->library('grocery_CRUD');
	}

	public function index()
	{
		echo "<h1>Bienvenido al mundo de Codeigniter</h1>";//Solo un ejemplo!
		die();
	}

	function _example_output($output = null)

    {
        $this->load->view('example.php',$output);    
    }
 
    function employees()

    {
        $output = $this->grocery_crud->render();
 
        $this->_example_output($output);

    }

    function persona()

    {
        
    $crud = new grocery_CRUD();
 
    $crud->set_theme('datatables');
    $crud->set_table('persona');
    $crud->display_as('NivelUsuario_idNivelUsuario','nivel');
    $crud->set_subject('Personas');
 
    $crud->set_relation('NivelUsuario_idNivelUsuario','NivelUsuario','nivel_usuario');
 
    $output = $crud->render();
 
    $this->_example_output($output);

    }

}
