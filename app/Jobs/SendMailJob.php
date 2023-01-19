<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
class SendMailJob extends Job
{
    public function __construct($data)
    {
        $this->data = $data;
    }
    protected $data;
    /**
     * Execute the job.
     *
     * @param  App\Services\AudioProcessor  $processor
     * @return void
     */
    public function handle(User $users)
    {
        $data = array("name"=>"World");
        Mail::send('mail', $data, function($message) {
            $message->to($this->data['email'], $this->data['name'])->subject("Test Mail");
            $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            });
            echo "Email Sent. Check your inbox.";
        }
        // Process uploaded podcast...
}
