<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to user about reminders';

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
    {/*
        // Get all reminders for today
        $reminders = Reminder::query()
        ->where('dateEnd', now()->format('Y-m-d'))
        ->where('status', 'pendiente')
        ->orderby('id')
        ->get();

        // Group by user
        $data = [];
        foreach($reminders as $reminder){
            $data[$reminder->id][] = $reminder->toArray();
        }

        dd($data);
        //send email*/
    }
}
