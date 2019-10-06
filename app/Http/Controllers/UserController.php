<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
class UserController extends Controller
{
    public function login()
    {

    	if(auth()->check())
    	{
    		return redirect()->route('home')->with('error','Vous dévez-vous déconnecter pour pouvoir vous réconnecter à nouveau');
    	}

    	return View('users.login');
    }

    public function check()
    {

    	// $inputs = Request::all();
    	// $inputs['username'] = e($inputs['username']);
    	// $inputs['password'] = e($inputs['password']);

    	if(request('remember'))
    	{
    		$remember = true;
    	}
    	else{
    		$remember = false;
    	}

    	$validation = request()->validate([

    		'username' => 'required',
    		'password' => 'required',

    	]);

    	if(!$validation)
    	{
    		return redirect()->back()->withErrors($validation);
    	}
    	else{

    		$result = auth()->attempt([

    			'username' => request('username'),
    			'password' => request('password'),
    		],$remember);

    		if($result)
    		{
    			auth()->attempt([

    				'username' => request('username'), 
    				'password' => request('password'),

    			],$remember);
    			return redirect()->route('home')->with('success', 'Vous êtes bien connecté. Bienvenu sur le blog');
    		}
    		else
    		{
    			return redirect()->back()->with('error','Le mot de passe ou le nom utilisateur est incorrect');
    		}
    	}
    }

    public function deconnexion()
    {
    	auth()->logout();
    	return redirect()->route('home')->with('success', 'Vous êtes maintenant déconnecté');
    }

    public function register()
    {
    	if(auth()->check())
    	{
    		return redirect()->route('home')->with('error','Vous dévez-vous déconnecter pour pouvoir fait une nouvelle inscription');
    	}

    	return View('users.register');
    }

    public function store()
    {

    	$valid = request()->validate([

    		'username' => 'required|min:3|unique:users',
    		'password' => 'required|min:4',
    		'password_conf' => 'same:password',
    	]);

    	if(!$valid)
    	{
    		return redirect()->back()->withErrors($valid);
    	}
    	else
    	{
    		$user = User::create([

    			"username" => request('username'),
    			'password' => bcrypt(request('password')),
    		]);

    		$user->save();
    		return redirect()->route('login')->with('success','Inscription effectuée avec succès, vous pouvez vous connecter');
    	}
    }

    public function admin()
    {
        $users = User::all();
        return View('users.admin',compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success','L\'utilisateur à bien été supprimé avec succès');
    }

    public function permission($id)
    {
        $user = User::find($id);

        if($user->is_admin)
        {
            $user->is_admin = 0;
            $user->save();
            return redirect()->back()->with('success', $user->username.' est désormais un simple membre de votre blog');
        }
        else
        {
            $user->is_admin = 1;
            $user->save();
            return redirect()->back()->with('success','Vous venez de rendre '.$user->username.', administrateur du blog');
        }
    }
}
