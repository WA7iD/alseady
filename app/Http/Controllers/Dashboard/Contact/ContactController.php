<?php

namespace App\Http\Controllers\Dashboard\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contacts-read')->only('index', 'show');
        $this->middleware('permission:contacts-delete')->only('destroy');
    }

    public function index()
    {
        $contacts = Contact::orderBy("created_at",'DESC')->paginate();
        return view('dashboard.site.contacts.index', [
            'contacts' => $contacts
        ]);
    }

    public function show(Contact $contact)
    {
        if (!$contact->is_read) {
            $contact->update(['is_read' => 1]);
        }
        return view('dashboard.site.contacts.show', [
            'contact' => $contact
        ]);
    }

    public function destroy(Contact $contact)
    {
        DB::beginTransaction();
        try {
            $contact->delete();
            DB::commit();
            return redirect()->route('contacts.index')->with('success', __('messages.deleted successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('contacts.show',  $contact->id)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
