<?php

namespace App\Console\Commands;



use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Task;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $timestamp = Carbon::now();
        $date = Carbon::parse($timestamp)->format('Y-m-d'); //gets current date in given format
        $todos = Task::whereDate('starting_time', '=', $date)->latest()->get(); //gets latest task starting time
        foreach($todos as $todo){
            $newTime= Carbon::parse($todo->starting_time); //making the current task starting time instance of Carbon
            $diff_in_minutes =$newTime->subMinutes(5)->diffInMinutes(Carbon::now()); //compares the less five minutes of starting time with  current time
            if($diff_in_minutes==0){
                $email= $todo->user->email;  // gets email of the user of current todo
                $taskEmail =[
                    'name'=> $todo->name,
                    'info'=>'Task is Started'
                ];
                \Mail::to($email)
                ->send( new \App\Mail\NewMail($taskEmail));
            }
        }

    }


}
