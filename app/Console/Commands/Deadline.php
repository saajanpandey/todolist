<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Illuminate\Support\Carbon;
class Deadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:deadlineemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send deadline mail notification';

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
        $todos = Task::whereDate('deadline', '=', $date)->latest()->get(); //gets latest task deadline time
        foreach($todos as $todo){
            $newTime= Carbon::parse($todo->deadline); //making the current task deadline instance of Carbon
            $diff_in_minutes =$newTime->subMinutes(5)->diffInMinutes(Carbon::now()); //compares the less five minutes of deadline time with current time
            // dd($diff_in_minutes);
            $status = $todo->status;
            if($diff_in_minutes == 0 && $status == false){
                $email= $todo->user->email;
                $deadLineEmail =[
                    'name'=> $todo->name,
                    'info'=>'Task is not completed'
                ];
                \Mail::to($email)
                ->send( new \App\Mail\DeadLineMail($deadLineEmail));
        }
     }
    }
}
