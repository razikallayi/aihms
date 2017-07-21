<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;
use File;
use Storage;
use Swift_Attachment;

class CareerMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * The request instance.
     *
     * @var Request
     */
    public $request;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public static function getDestinationEmail()
    {
        return config('whyte.project.mailable_emails');
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $request = $this->request;
      $fileContent = File::get($request->ressume->getRealPath());
      $fileExtension = $request->ressume->getClientOriginalExtension();

      $attachmentName = str_slug($request->name)."_ressume.".$fileExtension;
      return $this->view('emails.career')
            ->attachData($fileContent,$attachmentName);
  }
}
