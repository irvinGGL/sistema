<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class Usuario extends Model{
        protected $table = 'usuarios';
        protected $primaryKey = 'id';

        public function obtenerUsuario($data){
            $usuario = $this->db->table('usuarios');
            $usuario->where($data);
            return $usuario->get()->getResultArray();
        }
    }