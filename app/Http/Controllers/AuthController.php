<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $usuario = DB::table('usuario')->where('Email', $credentials['email'])->first();

        if (!$usuario || !Hash::check($credentials['password'], $usuario->Contraseña)) {
            return back()->with('error', 'Credenciales incorrectas.');
        }

        $rol = DB::table('usuariorol')
            ->join('rol', 'usuariorol.Id_Rol', '=', 'rol.Id')
            ->where('usuariorol.Id_Usuario', $usuario->Id)
            ->value('rol');

        Session::put('usuario_id', $usuario->Id);
        Session::put('usuario_nombre', $usuario->Nombre);
        Session::put('rol', $rol);

        return redirect()->route('home');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:usuario,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $id = DB::table('usuario')->insertGetId([
            'Nombre' => $request->nombre,
            'Email' => $request->email,
            'Contraseña' => bcrypt($request->password)
        ]);

        // Asignar rol por defecto (ej: 1 = Usuario normal)
        DB::table('usuariorol')->insert([
            'Id_Usuario' => $id,
            'Id_Rol' => 2
        ]);

        return redirect()->route('login')->with('success', 'Cuenta creada con éxito. Ahora puedes iniciar sesión.');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
