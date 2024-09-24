<?php

namespace App\Http\Controllers\Api\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Web\Contact\ContactRequest;
use App\Models\Contact;
use App\Traits\Responser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    use Responser;
    public function store(ContactRequest $request)
    {
        // try {
            $contact = Contact::create($request->validated());
            //   $this->send_notii('contactNotification', $contact, 'browse_contact', $request['name']);
            return $this->returnSuccessMassage(__('dashboard.sent_successfully'), 200);
        // } catch (\Exception $e) {
        //     return $this->returnError('', 'some thing went wrong');
        // }
    }
}
