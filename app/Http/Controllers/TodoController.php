<?php

namespace App\Http\Controllers;



use App\Models\Employee;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $employee_name = User::all('name');
            $tasks = Todo::all();
            return view('todo', compact('employee_name', 'tasks','user'));
        }else{
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'task_title' => 'required',
            'assigned_by' => 'required',
            'assigned_to' => 'required',
            'task_status' => 'required',
            'description' => 'required'

        ]);

        $todo = new Todo();

        $todo->task_title = $request->task_title;
        $todo->assigned_by = $request->assigned_by;
        $todo->assigned_to = $request->assigned_to;
        $todo->task_status = $request->task_status;
        $todo->description = $request->description;

        $query = $todo->save();

        if ($query) {
            return back()->with('success', ' successful');

        } else {

            return back()->with('success', 'unsuccessful');

        }
    }

    public function complete_task($id,$status,Request $request)
    {
        $update = Todo::where('id','=',$request->id)->first();
        $employee = User::where('id', '=', session('LoggedUser'))->first();

        $update->task_status = 'complete';
        $update->save();

        return back()->with('success_complete','congrats');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return RedirectResponse
     */
    public function edit_todo(Request $request)
    {




        $user = Todo::where('id', '=', $request->id)->first();

        $user->task_title = $request->task_title;
        $user->assigned_to = $request->assigned_to;
        $user->task_status = $request->status;
        $user->description = $request->description;
        $query =  $user->save();

        if($query){

                return back()->with('success-edit', 'update successful Added');


        }else{

            return back()->with('fail', 'Unsuccessful');

        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function delete_record($id){
        Todo::destroy($id);
        return back()->with('delete_success','data successfully deleted');



    }
}
