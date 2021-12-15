import React from 'react';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';
import SearchBar from '@/Shared/SearchBar';
import route from 'vendor/tightenco/ziggy/src/js';
import NavLink from '@/Components/NavLink';

const Index = () => {
    const { user, connWMsg, connWOMsg } = usePage().props;
    const {
        msgData,
        meta: { links }
    } = connWMsg;
    const {
        noMsgData,
        meta: { links }
    } = connWOMsg;
    var selectedConn = null;
    var msgText = "";
    function setMsgText(newText) {
        msgText = newText;
    }
    return (
        <div>
            <h1 className="mb-8 text-3x1 font-bold"></h1>
            <div class="flex flex-row" >
                <div class="w-1/3">
                    <div class="flex flex-col py-8">
                        {connWMsg.forEach(conn => (
                            <button class="rounded-lg">
                                <span class="inline-block font-sans">
                                    {conn.userOne !== user ? conn.userOne : conn.userTwo}
                                </span>
                            </button>
                        ))}
                    </div>
                </div>
                <div class="w-2/3">
                    <div class="flex flex-col py-8">
                        {selectedConn ? selectedConn.messages.foreach(msg => (
                            <div class={`flex ${msg.sender_id === user.id ? 'justify-start' : 'justify-end'}`}>
                                <button class="rounded-full">
                                    <span class="inline-block font-sans">
                                        {msg.content}
                                    </span>
                                </button>
                            </div>
                        )) : 
                        <span class="inline-block font-sans">
                            No Connection Selected
                        </span>}
                    </div>
                    <div class="flex flex-col pt-4">
                        <div class="w-full">
                            <div class="w-3/4">
                                <input 
                                    type="text" 
                                    ref={msgText} 
                                    onChange={(e) => setMsgText(e)}
                                />
                            </div>
                            <div class="w-1/4">
                                <NavLink
                                    href={route('connections.addMessage')}
                                    active={true}
                                    children={[]}
                                >
                                    <span class="inline-block font-sans">
                                        Enter
                                    </span>
                                </NavLink>
                            </div>
                        </div>
                        <div class="justify-center w-1/2">
                            {/* <button class="rounded-full">
                                <span class="inline font-sans">
                                    Remove Connection    
                                </span> 
                            </button> */}
                            <NavLink
                                href={route('connections.destroy')}
                                active={true}
                                children={[]}
                            >
                                <span class="inline-block font-sans">
                                    RemoveConnections
                                </span>
                            </NavLink>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}