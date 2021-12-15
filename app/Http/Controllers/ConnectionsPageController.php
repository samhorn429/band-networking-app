<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
//use App\Http\Resources\UserCollection;

class ConnectionsPageController extends Controller
{
    public function index()
    {
        return Inertia::render('Connections/Index', [
            'filters' => Request::all('search'),
            'user' => Auth::user()->musicianUser(),
            'connectionsWithMessages' => new ResourceCollection(
                Auth::user()->musicianUser()->connectionsWithMessages()
                    ->with(['messages', 'userOne', 'userTwo'])
                    ->orderByTimestamp()
                    ->filter(Request::only('search'))
            ),
            'connectionsWithoutMessages' => new ResourceCollection(
                Auth::user()->musicianUser()->connectionsWithoutMessages()
                    ->with(['userOne', 'userTwo'])
                    ->orderByTimestamp()
            )
        ]);
    }    

    public function addMessage(Connection $conn, MessageStoreRequest $request) {
        $conn->messages()->create(
            $request->validated()
        );

        return Redirect::back()->with('success', 'Message Added');
    }

    public function storeFromAddMessageModal(Connection $conn, MessageStoreRequest $request) {
        $conn->messages()->create(
            $request->validated()
        );

        return Redirect::back()->with('success', 'Message Added');
    }

    public function deleteFromRemoveConfirmModal(Connection $conn) {
        $conn->delete();

        return Redirect::back()->with('success', 'Connection Removed');
    }



}