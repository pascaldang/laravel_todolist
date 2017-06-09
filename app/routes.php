<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Index Route ------------------------------------------------------------------
Route::get('/', function() {
	return View::make('index');
});

// Register Route ---------------------------------------------------------------
Route::get('/register', function() {
	return View::make('register');
});

Route::post('/register', function() {
	$rules = array(
    'email'=>'required|email|unique:users',
    'username'=>'required|alpha|min:2',
    'password'=>'required|alpha_num|between:6,12|confirmed',
    'password_confirmation'=>'required|alpha_num|between:6,12'
    );
	$validator = Validator::make(Input::all(), $rules);

	if ($validator->passes()) {
	    $user = new User;
	    $user->username = Input::get('username');
	    $user->email = Input::get('email');
	    $user->password = Hash::make(Input::get('password'));
	    $user->save();
	 
	    return Redirect::to('login')->with('message', 'Succès de l enregistrement');
	} else {
	    return Redirect::to('register')->with('message', 'Erreur lors de l enregistrement')->withErrors($validator)->withInput();
	}
});

// Login Route ------------------------------------------------------------------
Route::get('/login', function() {
	return View::make('login');
});

Route::post('/login', function() {
	$rules = array('username' => 'required', 'password' => 'required');
	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
		return View::make('login')->withErrors($validator);
	}

	$auth = Auth::attempt(array(
		'username' => Input::get('username'),
		'password' => Input::get('password')
	), false);

	if (!$auth) {
		return View::make('login')->withErrors(array(
			'Identifiants invalides'
		));
	}

	return View::make('profile');
});

// Todo Route -------------------------------------------------------------------
Route::get('/todo', array('before' => 'auth', function() {
	$tasks = Auth::user()->tasks;

	return View::make('todo', array(
		'tasks' => $tasks
	));
}));

Route::post('/todo', array('before' => 'auth', function() {
	$id = Input::get('id'); 
	$userId = Auth::user()->id;
	$task = Task::findOrFail($id);

	if ($task->user_id == $userId) {
		$task->mark();		
	}

	return Redirect::to('/todo');
}));

// New Task Route ---------------------------------------------------------------
Route::get('/add', array('before' => 'auth', function() {
	return View::make('add');
}));

Route::post('/add', array('before' => 'auth', function() {
	$rules = array('name' => 'required|min:3|max:255');
	$validator = Validator::make(Input::all(), $rules);
	$userId = Auth::user()->id;

	if ($validator->fails()) {
		return Redirect::to('add')->withErrors($validator);
	}

	$task = new Task;
	$task->name = Input::get('name');
	$task->user_id = $userId;
	$task->save();

	return Redirect::to('todo');
}));

// Delete Task Route ------------------------------------------------------------
Route::get('/delete/{task}', array('before' => 'auth', function(Task $task) {
	$task->delete();

	return Redirect::to('todo');
}));

Route::bind('task', function($value, $route) {
	return Task::where('id', $value)->first();
});

// Profile Route ----------------------------------------------------------------
Route::get('/profile', array('before' => 'auth', function() {
	return View::make('profile');
}));

// Logout Route -----------------------------------------------------------------
Route::get('/logout', function() {
	Auth::logout();
	return Redirect::to('login')->with('message', 'Vous êtes maintenant déconnecté!');
});