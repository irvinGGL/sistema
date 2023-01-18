<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\Evento;

class Home extends BaseController
{
    public function index()
    {
        $mensaje = session('mensaje');
        return view('signIn',["mensaje" => $mensaje]);
    }

    public function indexAgente()
    {
        return view('indexAgente');
    }

    public function indexSecretarioAgente()
    {
        return view('indexSecretarioAgente');
    }

    public function chat()
    {
        return view('app-chat');
    }

    public function passwordReset()
    {
        return view('passwordReset');
    }

    public function userProfile()
    {
        return view('user-profile');
    }

    public function calendar()
    {
        return view('app-calendar');
    }

    public function detallesEvento()
    {
        $actualizar = $this->request->getPost("actualizar");
        echo 'Valor de actualizar: '.$actualizar;
        $evento = new Evento();
        if($actualizar == ""){
            $fechaFin = $this->request->getPost("event-end-date");
            echo 'Valor de fechaFin: '.$fechaFin;
                $data = [
                    'id' => '',
                    'evento' => $this->request->getPost("evento"),
                    'tipo' => $this->request->getPost("event-level"),
                    'fechaInicio' => $this->request->getPost("event-start-date"),
                    'fechaFin' => $this->request->getPost("event-end-date")
                ];
                $evento->insert($data);
                $session = session();
                $session->setFlashData('mensaje','Evento agregado correctamente.');
                return redirect()->to(base_url('/index-Secretario-Agente/calendar'))->withInput();
        } else{
            $update = [
                'evento' => $this->request->getPost("evento"),
                'tipo' => $this->request->getPost("event-level"),
            ];
            $evento->update($actualizar,$update);
            $session = session();
            $session->setFlashData('mensaje','Evento modificado correctamente.');
            return redirect()->to(base_url('/index-Secretario-Agente/calendar'))->withInput();
        }
        
    }

    public function deleteEvento(){
        $id = $this->request->getPost("eliminar");
        echo $id;
        $evento = new Evento();
        $evento->where('id',$id)->delete($id); 
        $session = session();
        $session->setFlashData('mensaje','Evento eliminado correctamente.');
        return redirect()->to(base_url('/index-Secretario-Agente/calendar'));
    }

    public function login(){
        $cargo = $this->request->getPost('cargo');
        $password = $this->request->getPost('password');
        $usuario = new Usuario();
        $datosUsuario = $usuario->obtenerUsuario(['cargo'=>$cargo]);
        if(count($datosUsuario) > 0 && $password == $datosUsuario[0]['contrasena']){
            $data = [
                "id" => $datosUsuario[0]['id'],
                "cargo" => $datosUsuario[0]['cargo'],
                "contrasena" => $datosUsuario[0]['contrasena']
            ];
            $session = session();
            $session->set($data);
            if($cargo == 'Agente municipal'){
                return redirect()->to(base_url('/indexAgente'));
            }else if($cargo == 'Secretario del agente municipal'){
                return redirect()->to(base_url('/index-Secretario-Agente'));
            } 
            
        } else{
            $session = session();
            $session->setFlashData('mensaje','La contraseña ingresada para el usuario ' . $cargo . ' es incorrecta, por favor ingresala nueamente.');
            return redirect()->to(base_url('/'))->withInput();
        }
    }

    public function logOut()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
