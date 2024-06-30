<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Mail\testEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends BaseController
{
    public function sendEmail()
    {
        try {
            Mail::to(['mahmoudnagah999@gmail.com'])->send(new testEmail());
        } catch (\Exception $e) {
            dd($e->getMessage()); // This will output the exception message
        }

        return $this->sendResponse('Email Send');
    }
}
