<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use App\Notifications\NewContact;
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
    public function form(ContactFormRequest $request)
    {
        $contact = Contact::create($request->all());
        Notification::route('mail', config(key: 'mail.from.address'))
            ->notify(new NewContact($contact));
        
        toastr()->success('Contato enviado com sucesso!');

        return back();

        // return redirect()->route(route: 'site.contact')->with([
        //     'success' => true,
        //     'message' => 'Contato enviado com sucesso!'
        // ]);
    }    

}
