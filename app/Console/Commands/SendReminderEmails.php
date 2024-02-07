<?php

namespace App\Console\Commands;

use App\Mail\EventScheduledReminderEmail;
use Illuminate\Console\Command;
use App\Models\CalendarEvent;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Send reminder emails to users for upcoming events';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = [
            [
                'id' => 1,
                'first_name' => 'aman',
                'last_name' => 'kumar',
                'email' => 'aman@yopmail.com',
            ],
            [
                'id' => 2,
                'first_name' => 'shiv',
                'last_name' => 'kumar',
                'email' => 'shiv@yopmail.com',
            ],
            [
                'id' => 3,
                'first_name' => 'ram',
                'last_name' => 'kumar',
                'email' => 'ram@yopmail.com',
            ],
            [
                'id' => 4,
                'first_name' => 'rana',
                'last_name' => 'kumar',
                'email' => 'rana@yopmail.com',
            ],
        ];

        foreach ($users as $user) {
            // Fetch events for the current user
            $events = CalendarEvent::where('date', '>=', now())
                ->where('date', '<=', now()->addDays(7))
                ->where('entered_by', $user['id'])
                ->get();

            // Construct email body
            $body = '
            <!doctype html>
            <html lang="en-US">
        
            <head>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                <title>Reminder Email</title>
                <meta name="description" content="Reminder Email">
                <style>
                a:hover {
                    text-decoration: underline !important;
                }
                </style>
            </head>
        
            <body marginheight="0" topmargin="0" margin <table cellpadding="0" cellspacing="0"
                style="width: 100%; border: 1px solid #ededed">
                <tbody>
                    <tr>
                        <td
                            style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                            User Name:</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                            '.$user['first_name'].' '.$user['last_name'].'</td>
                    </tr>';

            foreach ($events as $event) {
                // Append event data to email body
                $body .= '<tr>
                        <td
                            style="padding: 10px;  border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)">
                            Event Date:</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                            '.$event->date.'</td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)">
                            Event Time:</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056; ">
                            '.$event->time.'</td>
                    </tr>';
            }

            $body .= '
                </tbody>
                </table> <!-- Your HTML content goes here -->
            </body>';

            // Send email
            Mail::to($user['email'])->send(new EventScheduledReminderEmail($body));
        }

        $this->info('Reminder emails sent successfully!');
    }
}
