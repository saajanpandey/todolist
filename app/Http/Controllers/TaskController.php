<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\UserRequest;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendEmail;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $uid = Auth::id();

        $tasks=  Task::where('user_id', $uid)->orderBy('id', 'DESC')->get();
        return view('list.home',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = new Task();
        $id = Auth::id();
        $task->name = $request->description;
        $task->user_id =  $id;
        $task->starting_time = $request->start_date;
        $task->deadline = $request->deadline;
        $task->status =$request->status;
        $task->save();
        //$this->sendEmail($task);
        // $this->deadLineMail($task);
        return redirect('/task')->with('success','Task Created Successfully');
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
        //
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendEmail($task)
    {

        $id= Auth::id();
        $email = User::where('id',$id)->get('email');
        $taskEmail =[
            'name'=> $task->name,
            'info'=>'Task is Started'
        ];
        \Mail::to($email)
        ->later(Carbon::now()->addMinutes(5), new \App\Mail\NewMail($taskEmail));

    }
    public function changeStatus($id)
    {
        $task = Task::find($id);
        $task->status = !$task->status;
        $task->save();
        return redirect('/task')->with('info','Task Updated');
    }

    public function deadLineMail($task)
    {
        $deadline = $task->deadline;
        $newDateTime= Carbon::parse($deadline);

            $id= Auth::id();
            $email = User::where('id',$id)->get('email');
            $deadLineEmail =[
                'name'=> $task->name,
                'info'=>'Task is not completed'
            ];
            \Mail::to($email)
            ->later($newDateTime->subSeconds(60), new \App\Mail\DeadLineMail($deadLineEmail));
    }
}
