<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Invitation;
use App\Mail\InviteLink;
use App\Http\Controllers\Controller;
use App\Rules\EmailExist;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.invitation.index', [
            'invitations' => Invitation::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.invitation.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {
        $attributes = request()->validate([
            'email' => ['required', new EmailExist],
            'role_id' => 'required',
        ]);

        $invitation = new Invitation();
        $attributes['token'] = $invitation->generateToken($attributes['email']);
        $newInvitation = $invitation->create($attributes);

        Mail::to(request()->email)
            ->send(new InviteLink($newInvitation->getInviteLink()));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation) {
        return view('auth.register', [
            'invitation' => $invitation,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation) {
        $invitation->delete();

        return back();
    }

    public function validateRequest() {
        return request()->validate([
            'email' => 'required',
            'role' => 'required',
        ]);
    }
}
