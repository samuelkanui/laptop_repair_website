<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send email to the configured admin address (or fallback)
        // In a real scenario, use config('mail.from.address') or a specific admin email.
        // For this task, we'll assume the system sends TO the website owner.
        // The user specified "gmail account of the website".

        $adminEmail = env('MAIL_FROM_ADDRESS', 'admin@example.com');

        Mail::to($adminEmail)->send(new ContactFormMail($validated));

        return redirect()->back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
