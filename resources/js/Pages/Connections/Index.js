import React, { useState } from 'react';
import { usePage, useForm, InertiaLink } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
//import route from '#/tightenco/ziggy/src/js';
import Input from '@/Components/Input';



const Index = () => {
    const { user, connectionsWithMessages } = usePage().props;
    const [selectedConn, setSelectedConn] = useState(null);
    const [inputValue, setInputValue] = useState("")
    const { data, setData, errors, post, processing } = useForm({
        conn_id: selectedConn == null ? '' : selectedConn.id,
        sender_id: user.id,
        content: ''
    })

    // useEffect(() => {

    // })
    //var selectedConn = null;
    var msgText = "";
    const setMsgText = (event) => {
        //msgText = document.getElementById("newMsgInput").getAttribute("value");
        // msgText = event.target.value;
        //setData(event.target.name, event.target.value);
        setInputValue(event.target.value);
    }

    function handleEnterMessage(e) {
        e.preventDefault();
        Inertia.post(route('connections.addMessage', {connection: selectedConn.id}));
    }

    function getDeleteButtonDisabled() {
        return selectedConn == null;
    }

    return (
        <div className="divide-x">
        <h1 className="mb-8 text-3x1 font-bold"></h1>
        <div className="flex flex-col divide-y">
            <div className="flex flex-row divide-x">
                <div className="w-1/3 flex flex-col space-y-3 divide-y pb-5">
                    <input className="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" 
                        type="search" name="search" placeholder="Search" />
                    <ul className="divide-y">
                        {connectionsWithMessages.data.map((conn) => 
                            <li key={conn.id}>
                                <article className="flex items-start p-5">
                                    <button onClick={() => setSelectedConn(conn)}>
                                        <h2 className="inline-block font-sans">
                                            {conn.userOne.id == user.id ? conn.userTwo.name : conn.userOne.name}
                                        </h2>
                                    </button>
                                </article>
                            </li>                            
                        )}
                    </ul>
                </div>
                <div className="w-2/3 space-x-10 pb-5">
                    <div className="space-x-5 flex flex-col space-y-3">
                        {selectedConn !== null ? 
                            <div>
                                <div className="flex flex-row">
                                    <h1 className="inline-block font-sans p-4">
                                        {user.id !== selectedConn.userOne.id ? selectedConn.userOne.name : selectedConn.userTwo.name}
                                    </h1>
                                    <div className="w-1/2 flex flex-col p-4">
                                        <div className="flex justify-end">
                                            <button className="h-7 rounded-lg bg-black text-white">
                                                <span className="inline-block font-sans px-4"> Remove Connection </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    {selectedConn.messages.map((msg) => (
                                        <li key={msg.id}>
                                            <div className={`flex ${parseInt(msg.sender_id) === user.id ? 'justify-end' : 'justify-start'}`}>
                                                <button className={`rounded-full ${parseInt(msg.sender_id) === user.id ? 'bg-green-500' : 'bg-gray-400'} p-4 max-w-md`}>
                                                    <span className="inline-block font-sans"> 
                                                        {msg.content}
                                                    </span>
                                                    
                                                </button>
                                            </div>
                                        </li>
                                    ))} 
                                </ul>
                            </div> : 
                            <div className="flex justify-center">
                                <h1 className="font-sans">No Connection Selected</h1>
                            </div>
                        }
                    </div>
                </div>
            </div>
            <div className="flex flex-row divide-x">
                <div className="flex w-1/3 py-5 flex-col space-y-3 divide-y">
                    <div className="flex justify-center">
                        <button className="h-10 px-10 rounded-lg bg-black text-white">
                            <span className="inline-block font-sans"> New Message </span>
                        </button>
                    </div>
                </div>
                <div className="flex w-2/3 py-5 flex-col space-y-3 divide-y">
                    <form onSubmit={handleEnterMessage}>
                        <div className="flex flex-row space-x-4 justify-center">
                            <input
                                type="text"
                                name="text"
                                value={data.content}
                                className="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                onChange={e => setData('content', e.target.value)}
                            />
                            <button type="submit" className="space-x-10 h-10 rounded-md bg-black text-white btn btn-link">
                                <span className="flex justify-center inline-block font-sans px-10"> Enter </span>
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    )
}

if (document.getElementById('Connections')) {
    ReactDOM.render(<Connections />, document.getElementById('Connections'))
}

export default Index;

