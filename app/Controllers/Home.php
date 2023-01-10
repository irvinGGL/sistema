<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuario;

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
        return view('calendar');
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
