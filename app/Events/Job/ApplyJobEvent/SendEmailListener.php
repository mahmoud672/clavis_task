<?php

namespace App\Events\Job\ApplyJobEvent;

use App\Helpers\MailHelper;
use App\Mail\ApplyJob;
use App\Mail\ChangePasswordMail;
use App\Models\Job\JobOption;
use App\Traits\Status;
use App\Traits\Types;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailListener
{
    use Status,Types;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ApplyJobEvent  $event
     * @return void
     */
    public function handle(ApplyJobEvent $event)
    {
        $job = $event->job;
        $applicant = $event->applicant;

        $company = $job->company;
        $job_option = JobOption::where('job_id',$job->id)->first();

        if($job_option && $job_option->mailing_me)
        {
            if ($job_option->recipient_email)
            {
                Mail::to($job_option->recipient_email)->send(new ApplyJob(['job' => $job,'user' => $applicant],$job->company->name." Company Your Vacancy ".$job->title." Has Received Application",config("app.main_mail"),$applicant->name));
            }
            else
            {
                Mail::to($company->email)->send(new ApplyJob(['job' => $job,'user' => $applicant],$job->company->name." Company Your Vacancy ".$job->title." Has Received Application",config("app.main_mail"),$applicant->name));

            }
        }


        Mail::to($applicant->email)->send(new ApplyJob(['job' => $job,'user' => $applicant],"Your Request Has Sent To ".$company->name,config("app.main_mail"),$applicant->name));



        /*$emailInfo = [
            'body'      => $job->company->name." Company Your Vacancy ".$job->title." Has Received Application",
            'title'     => "Applying To Job",
            'url'       => url("/"),
            'thank_you' => "Thank You!",
            'from'      => "team@".appName().".com",
            'name'      => appName(),
        ];*/
        //MailHelper::send($applicant,$emailInfo);




    }
}
