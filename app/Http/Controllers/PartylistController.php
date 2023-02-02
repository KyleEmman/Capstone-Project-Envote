<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partylist;

class PartylistController extends Controller
{
    public function index() {
        $parties = Partylist::all();
        return view('admin.parties', [
            'heading' => 'Party Lists', 
            'parties' => $parties
        ]);
    }
    public function store(Request $request) {
        Partylist::create([
            'partyName' => $request->name
        ]);
        return back()->with('successMessage', 'Party created successfully!');
    }
    public function destroy($id) {
        Partylist::where('id', $id)->first()->delete();
        return back()->with('successMessage', 'Party deleted successfully!');
    }
    public function update(Request $request, $id) {
        Partylist::where('id', $id)->first()->update([
            'partyName' => $request->name
        ]);
        return back()->with('successMessage', 'Party updated successfully');
    }
}
