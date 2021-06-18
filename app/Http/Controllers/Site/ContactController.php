<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Notifications\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(view: 'site.contact.index');
    }

    /**new InvoicePa
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form(Request $request)
    {
        $contact = Contact::create($request->all());
        Notification::route('mail', $contact->email)
            ->notify(new NewContact($contact));

        ddd($contact);
    }    

}
