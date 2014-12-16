<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

        /* ------------------ */    
 
        $this->load->library('grocery_CRUD');
	}

	
	function _example_output($output = null)

    {
        $this->load->view('example.php',$output);    
    }
 
    function index(){
        $crud = new grocery_CRUD();
        $crud->set_table('torneos');
        $crud->set_subject('Torneo');
        $crud->columns('nombre','rama','fecha_inicio','fecha_termino');
        $crud->fields('nombre','rama','fecha_inicio','fecha_termino', 'puntos_por_ganar', 'puntos_por_perder');
        $crud->required_fields('nombre','rama','fecha_inicio','fecha_termino');
        $crud->field_type('primer_rama','enum',array('femenil','varonil'));
        $crud->add_action('Equippos', base_url('assets/grocery_crud/themes/flexigrid/css/images/add_equipos.png'), 'administrador/agregarEquipos');
        $crud->set_language("spanish");
        $output = $crud->render();
        $this->_example_output($output);
    }

    function agregarEquipos($primary_key){
        $crud = new grocery_CRUD();
        $crud->set_table('equipos');
        $crud->where('Torneos_idTorneo', $primary_key);
        $crud->columns('nombre');
        $crud->field_type('Torneos_idTorneo', 'hidden', $primary_key);
        $crud->set_subject('Equipo');
        $crud->set_language("spanish");
        $output = $crud->render();
        $this->_example_output($output);
    }

    function entrenadores(){
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_table('persona');
        
        $crud->columns('primer_nombre','segundo_nombre');
        $crud->where('NivelUsuario_idNivelUsuario','2');
        $crud->display_as('NivelUsuario_idNivelUsuario','nivel');
        $crud->set_relation('NivelUsuario_idNivelUsuario','NivelUsuario','nivel_usuario');
        $crud->set_subject('Entrenador');
        $crud->set_language("spanish");
        $output = $crud->render();
        $this->_example_output($output);
    }

    function jugadores(){


        $crud = new grocery_CRUD();
        $crud->set_table('jugador'); //Change to your table name
        $crud->set_subject('Jugador');
        $crud->columns('primer_nombre','segundo_nombre','apellido_paterno', 'Equipos_idEquipo','Posiciones_jugadores_idPosicion_jugador');
        //$crud->field_type('idJugador', 'hidden', $this->getRandomCode());
        $crud->display_as('Equipos_idEquipo','Equipo');
        $crud->display_as('primer_nombre','Nombre');
        $crud->display_as('Posiciones_jugadores_idPosicion_jugador','Posición');
        $crud->set_relation('Equipos_idEquipo','equipos','nombre');
        $crud->set_relation('Posiciones_jugadores_idPosicion_jugador','posiciones_jugadores','posicion');
        //$crud->set_rules('email','Email','required|valid_email');

        $crud->set_language("spanish");
        $output = $crud->render();
        $this->_example_output($output);

        /*$crud = new grocery_CRUD();
        $crud->set_table('jugador');
        $crud->columns('Persona_idPersona','numero_playera','credencial');
        $crud->display_as('Persona_idPersona','Jugador');
        $crud->display_as('numero_playera','Playera');
        $crud->set_relation('Persona_idPersona','persona','primer_nombre');
        $crud->set_subject('Jugador');
        $crud->set_language("spanish");
        $output = $crud->render();
        $this->_example_output($output);*/
        }


        function agregarPartidos($primary_key)
        {
            
            $crud = new grocery_CRUD();
            $crud->set_table('partidos'); //Change to your table name
            $crud->set_subject('Partido');
            //$crud->set_theme('datatables');
            $crud->where('Jornada_idJornada', $primary_key);
            $crud->columns('id_Equipo1','id_Equipo2','puntos_equipo1','puntos_equipo2','hora_inicio', 'Auditorios_idAuditorio', 'Jornada_idJornada');
            $crud->fields('id_Equipo1','id_Equipo2','puntos_equipo1','puntos_equipo2','hora_inicio', 'Auditorios_idAuditorio');
            //$crud->field_type('idPartido', 'hidden', $this->getRandomCode());
            $crud->field_type('Jornada_idJornada', 'hidden', $primary_key);
            $crud->display_as('id_Equipo1','Equipo1');
            $crud->display_as('id_Equipo2','Equipo2');
            $crud->display_as('hora_inicio','hora');
            $crud->set_relation('id_Equipo1','equipos','nombre');
            $crud->set_relation('id_Equipo2','equipos','nombre');
            $crud->set_relation('Auditorios_idAuditorio','auditorios','nombre');
            $crud->set_relation('Jornada_idJornada','jornada','numero_jornada');
            //$crud->set_rules('email','Email','required|valid_email');

            $crud->set_language("spanish");
            $output = $crud->render();
            $this->_example_output($output);
        }

        function rol(){

            $crud = new grocery_CRUD();
            $crud->set_table('jornada'); //Change to your table name
            //$crud->set_theme('datatables');
            $crud->set_subject('Jornada');
            $crud->columns('numero_jornada','fecha_uno', 'fecha_dos');
            //$crud->field_type('idJornada', 'hidden', $this->getRandomCode());
            $crud->display_as('numero_jornada','Jornada');
            $crud->display_as('fecha_uno','Fecha 1');
            $crud->display_as('fecha_dos','Fecha 2');
            $crud->add_action('Partidos', base_url('assets/grocery_crud/themes/flexigrid/css/images/add_partidos.png'), 'administrador/agregarPartidos');
            //$crud->set_rules('email','Email','required|valid_email');

            $crud->set_language("spanish");
            $output = $crud->render();
            $this->_example_output($output);






           /* $crud = new grocery_CRUD();
            $crud->set_table('partidos'); //Change to your table name
            $crud->set_subject('Partido');
            $crud->columns('id_Equipo1','id_Equipo2', 'fecha','jornada','puntos_equipo1','puntos_equipo2','hora_inicio','Torneos_idTorneo');
            $crud->fields('id_Equipo1','id_Equipo2', 'fecha','jornada','puntos_equipo1','puntos_equipo2','hora_inicio','Torneos_idTorneo', 'Auditorios_idAuditorio');
            $crud->field_type('idPartido', 'hidden', $this->getRandomCode());
            $crud->display_as('id_Equipo1','Equipo1');
            $crud->display_as('id_Equipo2','Equipo2');
            $crud->display_as('hora_inicio','hora');
            $crud->display_as('Torneos_idTorneo','torneo');
            $crud->display_as('Auditorios_idAuditorio','Auditorio');
            $crud->set_relation('id_Equipo1','equipos','nombre');
            $crud->set_relation('id_Equipo2','equipos','nombre');
            $crud->set_relation('Torneos_idTorneo','torneos','nombre');
            $crud->set_relation('Auditorios_idAuditorio','auditorios','nombre');
            
            //$crud->set_rules('email','Email','required|valid_email');

            $crud->set_language("spanish");
            $output = $crud->render();
            $this->_example_output($output);*/
        }

    function equipos(){
        $crud = new grocery_CRUD();
        $crud->set_table('equipos');
        $crud->columns('nombre', 'Torneos_idTorneo');
        $crud->display_as('Torneos_idTorneo','torneo');
        $crud->set_relation('Torneos_idTorneo','torneos','nombre');
        $crud->add_action('Jugadores', base_url('assets/grocery_crud/themes/flexigrid/css/images/add_jugador.png'), 'administrador/agregarJugadores');
        $crud->set_subject('Equipo');
        $crud->set_language("spanish");
        $output = $crud->render();
        $this->_example_output($output);
    }

    function agregarJugadores($primary_key){
        $crud = new grocery_CRUD();
        $crud->set_table('jugador'); //Change to your table name
        $crud->set_subject('Jugador');
        $crud->where('Equipos_idEquipo', $primary_key);
        $crud->columns('primer_nombre','segundo_nombre','apellido_paterno','Posiciones_jugadores_idPosicion_jugador');
        $crud->field_type('Equipos_idEquipo', 'hidden', $primary_key);
        $crud->display_as('Equipos_idEquipo','Equipo');
        $crud->display_as('primer_nombre','Nombre');
        $crud->display_as('Posiciones_jugadores_idPosicion_jugador','Posición');
        $crud->set_relation('Posiciones_jugadores_idPosicion_jugador','posiciones_jugadores','posicion');
        $crud->set_language("spanish");
        $output = $crud->render();
        $this->_example_output($output);

    }

    function noticias(){
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_table('noticias');
        $crud->display_as('Publicadores_noticias_idPublicador_noticia','publicador');
        // $crud->columns('nombre','rama','fecha_inicio','fecha_termino');
        $crud->required_fields('titulo','nota','fecha_publicacion');
        // $crud->field_type('primer_rama','enum',array('femenil','varonil'));
        $crud->set_subject('Noticia');
        $crud->set_language("spanish");
        $output = $crud->render();
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

    function getRandomCode(){
    $an = "0123456789";
    $su = strlen($an) - 1;
    return substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1).
            substr($an, rand(0, $su), 1).
            substr($an, rand(0, $su), 1).
            substr($an, rand(0, $su), 1).
            substr($an, rand(0, $su), 1).
            substr($an, rand(0, $su), 1).
            substr($an, rand(0, $su), 1).
            substr($an, rand(0, $su), 1).
            substr($an, rand(0, $su), 1);
    }

}
