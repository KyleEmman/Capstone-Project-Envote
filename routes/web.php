<?php

use App\Models\User;
use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Application;
use App\Models\Announcement;
use App\Models\Electionarchive;
use App\Models\Applicationarchive;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminlogController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CprofileController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ElectionarchiveController;
use App\Http\Controllers\ApplicationarchiveController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OfficerlogController;
use App\Http\Controllers\PartylistController;
use App\Http\Controllers\PasswordResetArchiveController;
use App\Http\Controllers\ResultController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// USER SIDE

// index
Route::get('/', [UserController::class, 'index'])->middleware('auth');

// ongoing elections
Route::get('/ongoing', [UserController::class, 'ongoingElections'])->middleware('auth');

// view specified announcement
Route::get('/announcement/{announcement}', [AnnouncementController::class, 'show'])->middleware('auth');

// forgot password form
Route::get('/forgotPassword',[UserController::class, 'forgotPassword'])->middleware('guest');

// forgot password form action
Route::post('/forgotPassword/retrieve', [UserController::class, 'retrieve'])->middleware('guest');

// login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// profile
Route::get('/profile', [UserController::class, 'show'])->middleware('auth');

// show list of announcement component
Route::get('/announcementList', [AnnouncementController::class, 'index'])->middleware('guest');

// show change password field
Route::get('/login/changePassword', [UserController::class, 'changePasswordShow'])->middleware('guest');

// login authenticate form action
Route::post('/login/authenticate', [UserController::class, 'authenticate']);

// change password
Route::post('/login/changePasswordActivity', [UserController::class, 'create']);

// logout
Route::get('/logout', [UserController::class, 'logout']);

// change profile password
Route::post('/changeProfilePassword', [UserController::class, 'profileChangePassword'])->middleware(('auth'));

// change profile picture
Route::post('/changeProfilePicture', [UserController::class, 'changeProfilePicture'])->middleware('auth');

// show filing of candidacy form
Route::get('/fileCandidacy/{election}', [ApplicationController::class, 'create'])->middleware('auth');

// vote now button action route
Route::get('/voteNow', [ElectionController::class, 'showVoteNow'])->middleware('auth');

// submit candidacy application form
Route::post('/fileCandidacy/store', [ApplicationController::class, 'store'])->middleware('auth');

// submit vote button
Route::post('/voteNow/confirm/{election}', [VoteController::class, 'submit'])->middleware('auth');

// confirmed vote
Route::post('/voteNow/confirm/e-certificate/{election}', [VoteController::class, 'store'])->middleware('auth');

// certificate
Route::get('voteConfirmation/e-certificate/{studentID}/{election}', [CertificateController::class, 'show']);

// upcoming election
Route::get('/upcoming', [UserController::class, 'upcomingElections'])->middleware('auth');

// specific upcoming election
Route::get('/upcomingElection/{id}', [UserController::class, 'upcomingElection'])->middleware('auth');

// search elections upcoming
Route::get('/users/electionSearch', [UserController::class, 'upcomingElections'])->middleware('auth');

// elections results
Route::get('/results', [UserController::class, 'electionResults'])->middleware('auth');

// specific elections results
Route::get('/electionResult/{id}', [UserController::class, 'electionResult'])->middleware('auth');

// search elections upcoming
Route::get('/users/searchResults', [UserController::class, 'electionResults'])->middleware('auth');

// ADMIN SIDE

// show dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('adminAuth');

// ADMIN SIDE ELECTIONS
Route::get('/admin/elections', [AdminController::class, 'elections'])->middleware('adminAuth');

// ADMIN SIDE ACCOUNTS
Route::get('/admin/accounts', [AdminController::class, 'accounts'])->middleware('adminAuth');

// ADMIN SIDE CANDIDATES
Route::get('/admin/candidates', [AdminController::class, 'candidates'])->middleware('adminAuth');

// ADMIN SIDE PASSWORDS
Route::get('/admin/passwords', [AdminController::class, 'passwords'])->middleware('adminAuth');

// show admin settings
Route::get('/admin/settings', [AdminController::class, 'settings'])->middleware('adminAuth');

// admin change profile information form action
Route::post('/admin/settings/changeAdminDetails', [AdminController::class, 'settingsChangeAdminDetails'])->middleware('adminAuth');

// admin change profile information form action
Route::post('/admin/settings/changePassword', [AdminController::class, 'settingsChangeAdminPassword'])->middleware('adminAuth');

// admin reset password form action
Route::post('/admin/settings/resetPassword', [AdminController::class, 'resetPassword'])->name('resetPassword')->middleware('adminAuth');

// admin reset officer password action
Route::post('/admin/settings/officers/resetPassword', [OfficerController::class, 'resetOfficerPassword'])->name('resetOfficerPassword')->middleware('adminAuth');

//admin change photo
Route::post('/admin/settings/changePhoto', [AdminController::class, 'adminChangePhoto'])->middleware('adminAuth');

// admin add user accounts page

Route::post('/admin/accounts/add', [AdminController::class, 'adminAddUser'])->middleware('adminAuth');

// admin edit user password
Route::post('/admin/accounts/editPassword', [UserController::class, 'adminChangeUserPass'])->middleware('adminAuth');

// admin edit election
Route::post('admin/elections/editElection', [ElectionController::class, 'editElection'])->middleware(('adminAuth'));

// admin reset user password

Route::post('/admin/accounts/resetPassword', [UserController::class, 'adminResetUserPass'])->middleware('adminAuth');

Route::post('/admin/accounts/multiResetPassword', [UserController::class, 'multiResetPassword'])->middleware('adminAuth');

// admin add candidate

Route::post('/admin/candidates/addCandidate', [ApplicationController::class, 'storeCandidate'])->middleware('adminAuth');

// create sg officer account fomr action
Route::post('/admin/settings/officers', [OfficerController::class, 'store'])->middleware('adminAuth');



// logout function on admin
Route::get('/admin/logout', [AdminController::class, 'logout']);


// delete SG form action
Route::post('admin/settings/officers/deleteOfficer/{officer}', [OfficerController::class, 'destroy'])->middleware('adminAuth');

//reset password on admin request resets form action
Route::post('admin/passwords/reset/{id}/{studentID}', [UserController::class, 'resetPasswordRequest'])->middleware('adminAuth');
Route::post('/admin/passwords/reject/{id}/{studentID}', [UserController::class, 'rejectPasswordRequest'])->middleware('adminAuth');

// create election form action
Route::post('admin/elections/store', [ElectionController::class, 'store'])->middleware('adminAuth');

// accept candidate form action
Route::put('admin/fileCandidacy/accept/{application}', [ApplicationController::class, 'updateAccept'])->middleware(('adminAuth'));

// reject candidate form action
Route::put('admin/fileCandidacy/reject/{application}', [ApplicationController::class, 'updateReject'])->middleware(('adminAuth'));

// pending candidate form action
Route::put('admin/fileCandidacy/pending/{application}', [ApplicationController::class, 'updatePending'])->middleware(('adminAuth'));

Route::get('admin/elections/templates', [TemplateController::class, 'index'])->middleware(('adminAuth'));

Route::post('admin/elections/templates/store', [TemplateController::class, 'store'])->middleware(('adminAuth'));

Route::put('admin/elections/templates/update/{template}', [TemplateController::class, 'update'])->middleware(('adminAuth'));

Route::post('admin/elections/templates/duplicate/{template}', [TemplateController::class, 'duplicate'])->middleware(('adminAuth'));

Route::delete('admin/elections/templates/delete/{template}', [TemplateController::class, 'destroy'])->middleware(('adminAuth'));


// SG SIDE

// officer index
Route::get('/officer', [OfficerController::class, 'index'])->middleware('officerAuth');

Route::get('/officer/logout', [OfficerController::class, 'logout'])->middleware('officerAuth');

// officer settings
Route::get('/officer/settings', [OfficerController::class, 'settings'])->middleware('officerAuth');

// officer voter's turnout
Route::get('/officer/livetally/{election}', [ElectionController::class, 'liveTally'])->middleware('officerAuth');

// officer settings change details

Route::post("/officer/settings/changeDetails", [OfficerController::class, 'changeDetails'])->middleware('officerAuth');

// officer settings change password

Route::post("/officer/settings/changePassword", [OfficerController::class, 'changePassword'])->middleware('officerAuth');

// officer settings change photo
Route::post("/officer/settings/changePhoto", [OfficerController::class, 'changePhoto'])->middleware('officerAuth');

Route::get("/officer/candidates", [ElectionController::class, 'viewElectionsOfficer'])->middleware('officerAuth');

// officer annoucements

Route::get("/officer/contentManagement", [AnnouncementController::class, 'contentManagement'])->middleware('officerAuth');

// officer edit announcement

Route::get("/officer/editAnnouncement/{id}", [AnnouncementController::class, 'editAnnouncement'])->middleware('officerAuth');

// officer edit announcement form

Route::post("officer/editAnnouncementForm", [AnnouncementController::class, 'editAnnouncementForm'])->middleware('officerAuth');

// see candidates
Route::get("/officer/candidates/{election}", [CprofileController::class, 'edit'])->middleware('officerAuth');

Route::put("/officer/candidates/update/{cprofileID}", [CprofileController::class, 'update'])->middleware('officerAuth');

// add announcement form action
Route::post('/officer/announcement/store', [AnnouncementController::class, 'store'])->middleware('officerAuth');

// AJAX CALLS
Route::get('/getElections/{id}', [ElectionController::class, 'getDDElection'])->middleware('adminAuth');
Route::get('/getPositions/{id}', [PositionController::class, 'getDDPosition'])->middleware('adminAuth');

// get live results of ongoing election client side
Route::get('/ongoing/results', [VoteController::class, 'show'])->middleware('auth');
Route::get('/ongoing/showCandidateProfile/{candidate}', [CandidateController::class, 'showCandidateProfile'])->middleware('auth');

//ARCHIVES
Route::post('admin/elections/archive/{election}', [ElectionarchiveController::class, 'store'])->middleware('adminAuth');

Route::get('admin/elections/archives', [ElectionarchiveController::class, 'index'])->middleware('adminAuth');
Route::get('admin/candidates/archives', [ApplicationarchiveController::class, 'index'])->middleware('adminAuth');

Route::post('admin/elections/archives/retrieve/{election}', [ElectionController::class, 'retrieve'])->middleware('adminAuth');
Route::delete('admin/elections/archives/destroy/{election}', [ElectionarchiveController::class, 'destroy'])->middleware('adminAuth');

Route::post('admin/fileCandidacy/archive/{application}', [ApplicationarchiveController::class, 'store1'])->middleware('adminAuth');

Route::post('admin/fileCandidacy/archive/retrieve/{application}', [ApplicationController::class, 'retrieve'])->middleware('adminAuth');
Route::delete('admin/fileCandidacy/archive/destroy/{application}', [ApplicationarchiveController::class, 'destroy'])->middleware('adminAuth');

Route::post('admin/passwords/archive/{PasswordReset}', [PasswordResetArchiveController::class, 'store'])->middleware('adminAuth');

Route::get('admin/passwords/archives', [PasswordResetArchiveController::class, 'index'])->middleware('adminAuth');
Route::post('admin/passwords/archives/retrieve/{id}', [PasswordResetController::class, 'retrieve'])->middleware('adminAuth');
Route::delete('admin/passwords/archives/delete/{id}', [PasswordResetArchiveController::class, 'destroy'])->middleware('adminAuth');

Route::get('admin/students', [StudentController::class, 'index'])->middleware('adminAuth');

// accept multiple applications admin
Route::post('admin/candidates/multiAccept', [AdminController::class, 'multiAccept'])->middleware('adminAuth');
// reject multiple applications admin
Route::post('admin/candidates/multiReject', [AdminController::class, 'multiReject'])->middleware('adminAuth');
// archive multiple applications admin
Route::post('admin/candidates/multiArchive', [AdminController::class, 'multiArchive'])->middleware('adminAuth');
// retrieve multiple applications admin
Route::post('admin/candidates/multiRetrieve', [AdminController::class, 'multiRetrieve'])->middleware('adminAuth');
// delete multiple applications admin
Route::post('admin/candidates/multiDelete', [AdminController::class, 'multiDelete'])->middleware('adminAuth');
// accept multiple password resets admin
Route::post('admin/passwords/multiAccept', [PasswordResetController::class, 'multiAccept'])->middleware('adminAuth');
// reject multiple password resets admin
Route::post('admin/passwords/multiReject', [PasswordResetController::class, 'multiReject'])->middleware('adminAuth');
// archive multiple password resets admin
Route::post('admin/passwords/multiArchive', [PasswordResetController::class, 'multiArchive'])->middleware('adminAuth');
// retrieve multiple password resets admin
Route::post('admin/passwords/multiRetrieve', [PasswordResetController::class, 'multiRetrieve'])->middleware('adminAuth');
// delete multiple password resets admin
Route::post('admin/passwords/multiDelete', [PasswordResetController::class, 'multiDelete'])->middleware('adminAuth');
// generate report admin elections
Route::post('admin/elections/report', [ElectionController::class, 'generateReport'])->middleware('adminAuth');


Route::get('admin/logs', [AdminlogController::class, 'index'])->middleware('adminAuth');

Route::get('admin/logs/officer', [OfficerlogController::class, 'index'])->middleware('adminAuth');

Route::get('officer/logs', [OfficerlogController::class, 'officerLogs'])->middleware('officerAuth');

//delete announcement officer

Route::post('officer/deleteAnnouncement/{id}', [AnnouncementController::class, 'destroy'])->middleware('officerAuth');


// declare election winner
Route::post('admin/elections/result/store/{election}', [ResultController::class, 'store'])->middleware('adminAuth');

// index
Route::get('admin/elections/result/show/{election}', [ResultController::class, 'index'])->middleware('adminAuth');

// change user email

Route::post('/changeProfileEmail', [UserController::class, 'changeProfileEmail'])->middleware('auth');

//send email

Route::get('/send', [MailController::class, 'sendMail'])->middleware('auth');

Route::get('admin/candidates/parties', [PartylistController::class, 'index'])->middleware('adminAuth');

Route::post('admin/elections/party/store', [PartylistController::class, 'store'])->middleware('adminAuth');

Route::post('admin/elections/party/delete/{id}', [PartylistController::class, 'destroy'])->middleware('adminAuth');

Route::post('admin/elections/partys/update/{id}', [PartylistController::class, 'update'])->middleware('adminAuth');

Route::put('admin/elections/toggle/{election}', [ElectionController::class, 'toggle'])->middleware('adminAuth');

Route::post('admin/elections/scheduleElections', [ElectionController::class, 'scheduleElections'])->middleware('adminAuth');

