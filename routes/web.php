<?php

use Illuminate\Support\Facades\Route;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
 */

/*
 * Display All Tasks
 */
Route::get('/', function(){
    $tasks = Task::orderby('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks,
        'URL_BASE' => Config::get('constantes.url_base')
    ]);
});

/*
 * Add a New Task
 */
Route::post('/task', function(Request $request){
   $validator = Validator::make($request->all(),[
       'name' => 'required|max:255',
   ]);

   if($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);

            // withErrors crea la variable errors
   }

   $task = new Task;
   $task->name = $request->name;
   $task->save();

   return redirect('/');
});

/*
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function($id){
    Task::findOrFail($id)->delete();

    return redirect('/');
});