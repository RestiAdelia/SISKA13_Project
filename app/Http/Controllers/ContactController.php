<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * PUBLIK - Simpan pesan
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($request->only('name', 'email', 'message'));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }

    /**
     * ADMIN - Lihat semua pesan
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('pesan.index', compact('contacts'));
    }

    /**
     * ADMIN - Detail pesan
     */
    public function show(Contact $contact)
    {
        return view('pesan.show', compact('contact'));
    }

    /**
     * ADMIN - Hapus pesan
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('pesan.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
