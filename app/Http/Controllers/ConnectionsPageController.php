<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\MessageStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\ConnectionCollection;
use App\Models\Connection;

class ConnectionsPageController extends Controller
{
    public function console_log( $data ) {
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    // public function getIndexParameters()
    // {
    //     $filters = Request::all('search');

    //     $user = Auth::user()->musicianUser;

        // $connectionsWithMessages = new ConnectionCollection(
        //     $user->connectionsWithMessages()
        //         ->with(['messages', 'userOne', 'userTwo'])
        //         ->orderByTimestamp()
        //         ->filter(Request::only('search'))
        //         ->get()
        // );

        // $connectionsWithoutMessages = new ConnectionCollection(
        //     $user->connectionsWithoutMessages()
        //         ->with(['userOne', 'userTwo'])
        //         ->orderByTimestamp()
        //         ->get()
        // );

        // return [
        //     'filters' => $filters,
        //     'user' => $user,
        //     'connectionsWithMessages' => $connectionsWithMessages,
        //     'connectionsWithoutMessages' => $connectionsWithoutMessages,
        //     'selectedConn' => null
        // ];
    // }

    // public function addConnToParams(Connection $conn) {

    //     $params = $this->getIndexParameters();

    //     $params['selectedConn'] = $conn;

    //     return $params;
    // }

    public function index() { 
        
        $filters = Request::all('search');
        $user = Auth::user()->musicianUser;

        $connectionsWithMessages = new ConnectionCollection(
            $user->connectionsWithMessages()
                ->with(['messages', 'userOne', 'userTwo'])
                ->orderByTimestamp()
                ->filter(Request::only('search'))
                ->get()
        );

        $connectionsWithoutMessages = new ConnectionCollection(
            $user->connectionsWithoutMessages()
                ->with(['userOne', 'userTwo'])
                ->orderByTimestamp()
                ->get()
        );

        $this->console_log($connectionsWithMessages);

        return Inertia::render('Connections/Index', [
            'filters' => $filters,
            'user' => $user,
            'connectionsWithMessages' => $connectionsWithMessages,
            'connectionsWithoutMessages' => $connectionsWithoutMessages
        ]);
    }    

    // public function showMessages(Connection $conn) {

    //     $this->console_log($conn);


    //     return Inertia::render('Connections/Index', $this->addConnToParams($conn));
    // }

    public function addMessage(Connection $conn, MessageStoreRequest $request) {
 
        $conn->messages()->create(
            $request->validated()
        );

        $this->console_log($conn->messages);

        return Redirect::back()->with('success', 'Message Added');
    }

    // public function storeFromAddMessageModal(User $user, Connection $conn, string $msgContent) {
    //     $conn->messages()->create(
    //         $request->validated()
    //     );

    //     return Redirect::back()->with('success', 'Message Added');
    // }

    public function deleteFromRemoveConfirmModal(Connection $conn) {
        $conn->delete();

        return Redirect::back()->with('success', 'Connection Removed');
    }



}