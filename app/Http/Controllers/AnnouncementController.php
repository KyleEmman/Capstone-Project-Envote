<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnnouncementController extends Controller
{
    //show all announcement
    public function index(){
        return view('components.announcementList', [
            'announcements' => Announcement::latest()->get()
        ]);
    }

    //show singel announcemet
    public function show(Announcement $announcement){
        return view('announcements.show', [
            'announcement' => $announcement
        ]);
    }

    // add announcement
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'cover' => 'mimes:jpeg,jpg,png,gif|required|max:50000'
        ]);
        if($formFields){
            $dp = $request->file('cover')->store('announcementPhotos', 'public');
            $formFields['cover'] = $dp;
            $add = [
                'postedBy' => auth()->guard('officer')->user()->firstName
            ];
            Announcement::create(array_merge($formFields,$add));
            (new OfficerlogController)->store(auth()->guard('officer')->user()->firstName,auth()->guard('officer')->user()->lastName,'Created an announcement' );
            return back()->with('successMessage', 'Announcement added successfully!');
        }
    
    }

    // officer announcements page
    public function contentManagement(){
        $announcements = Announcement::latest()->filter(request(['search']))->paginate(6);
        return view('officer.contentManagement', [
            'heading' => 'Announcements',
            'announcements' => $announcements
        ]);
    }
    // go to specific announcement
    public function editAnnouncement($id){
        $announcement = Announcement::where('announcementID', $id)->first();
        return view('officer.editAnnouncement', [
            'heading' => 'Edit Announcement',
            'announcement' => $announcement
        ]);
    }
    // edit a specific announcement
    public function editAnnouncementForm(Request $request){
        $announcement = Announcement::where('announcementID', $request->id)->first();
        $title = $request->title ?? "";
        $content = $request->content ?? "";
        $rules = $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:50000'
        ]);
        if ($rules) {
            $dp = $request->file('image')->store('announcementPhotos', 'public');
            if($announcement->cover != null || $announcement->cover != ""){
                File::delete('storage/'.$announcement->cover);
            }
            $announcement->update([
                'title' => $title,
                'content' => $content,
                'cover' => $dp
            ]);
            (new OfficerlogController)->store(auth()->guard('officer')->user()->firstName,auth()->guard('officer')->user()->lastName,'Edited an announcement' );
            return redirect('/officer/contentManagement')->with('successMessage', 'Announcement edited succesfully!');
        }
      
        
    }
  	public function destroy($id) {
        Announcement::where('announcementID', $id)->first()->delete();
        return back()->with('successMessage', 'Announcement deleted successfully!');
    }

}
