<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * PUBLIK - Simpan pesan
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 2. Simpan ke database
        Contact::create($data);

        // 3. Kirim email ke admin (Gmail)
        Mail::to('sdnsiska13@gmail.com')
            ->send(new ContactMail($data));

        // 4. Kembali ke halaman dengan pesan sukses dan scroll ke form
        return back()
            ->with('success', 'Pesan berhasil dikirim!')
            ->withFragment('kontak'); // Tambahkan ini
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
