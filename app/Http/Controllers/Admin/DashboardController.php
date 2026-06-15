<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInquiries  = Contact::count();
        $newInquiries    = Contact::where('is_read', false)->count();
        $todayInquiries  = Contact::whereDate('created_at', today())->count();
        $thisMonthInquiries = Contact::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $recentContacts = Contact::latest()->take(10)->get();

        $monthlyStats = Contact::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'totalInquiries', 'newInquiries', 'todayInquiries',
            'thisMonthInquiries', 'recentContacts', 'monthlyStats'
        ));
    }

    public function inquiries()
    {
        $contacts = Contact::latest()->paginate(15);

        return view('admin.inquiries', compact('contacts'));
    }

    public function markRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);

        return back()->with('success', 'Inquiry marked as read.');
    }

    public function respond(Request $request, Contact $contact)
    {
        $request->validate([
            'admin_response' => ['required', 'string', 'max:1000'],
        ]);

        $contact->update([
            'admin_response' => $request->admin_response,
            'responded_at'   => now(),
            'is_read'        => true,
        ]);

        return back()->with('success', 'Response saved.');
    }
}
