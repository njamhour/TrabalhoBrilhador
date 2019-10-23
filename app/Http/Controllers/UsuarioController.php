<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

    public function layout()
    {
        return view('/usuarios/layoutpadrao');
    }


    public function index()
    {
        $usuarios = Usuario::all();
        //return view('usuarios', compact('usuarios'));
        return view('/usuarios/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novousuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->nome = $request->input('nome');
        $usuario->cpf = $request->input('cpf');
        $usuario->email = $request->input('email');
        $usuario->save();
        return redirect('/usuarios')->with('success', 'Salvo');
        /*$request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required'
        ]);*/

        /*$usuario = new Usuario([
            'nome' => $request->get('nome'),
            'cpf' => $request->get('cpf'),
            'email' => $request->get('email')
        ]);
        $usuario->save();
        return redirect('/usuarios')->with('succecss', 'Usuario salvo!');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        if(isset($usuario))
        {
            return view('editarusuario', compact('usuario'));
        }
        return redirect('/usuarios');
        //return view('usuarios.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$request->validate([
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required'
        ]);

        $usuario = Usuario::find($id);
        $usuario->nome = $request->get('nome');
        $usuario->cpf = $request->get('cpf');
        $usuario->email = $request->get('email');
        $usuario->save();
        return redirect('/usuarios')->with('success', 'Usuario atualizado!');*/
        $usuario = Usuario::find($id);
        if(isset($usuario))
        {
            $usuario->nome = $request->input('nome');
            $usuario->cpf = $request->input('cpf');
            $usuario->email = $request->input('email');
            $usuario->save();
        }
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Contact::find($id);
        if(isset($usuario)){
            $usuario->delete();
        }
        return redirect('/usuarios');

        //return redirect('/usuarios')->with('success', 'Usuario deletado!');
    }
}
