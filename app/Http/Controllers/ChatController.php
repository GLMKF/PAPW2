<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\DB;
use Redirect;

class ChatController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function allUser(Request $request) {
        //Abrir el php.ini y set
        //always_populate_raw_post_data = -1
        if($request->ajax()) {
            $id_master = $request['me'];
            $users = DB::select('select id,name, false as `hide`  from users where id != :id', ['id'=>$id_master]);
            return response()->json($users);
        }
    
        return Redirect::to('/');
    }

    public function SendMessage(Request $request){
        $id_master = $request['idSend'];
        $id_recive = $request['idRecive'];
        $desc = $request['desc'];
        $time_send = date('H:i', time());
        if($request->ajax()) {
            
            $m = Message::create([
                'idUserSend' => $id_master,
                'idUserRecive' => $id_recive,
                'desc' => $desc,
                'response' => 0,
                'time_send' => $time_send
            ]);
            $m = array(
                'id' => $m.id,
                'idUserSend' => $id_master,
                'idUserRecive' => $id_recive,
                'desc' => $desc,
                'time_send' => $time_send
            );
            return response()->json($m,200);
        }

        return Redirect::to('/');
    }

    public function LastMessage(Request $request) {
        $id_me = $request['me'];
        $id_send = $request['idUser'];
        $Last_id = $request['last_id']; //Id messages
        if($request->ajax()) {
            $messages = DB::select('select `id`,`idUserSend`,`idUserRecive`,`desc`,`time_send` from messages
                                    where id > ? and (idUserSend = ? and idUserRecive = ? or
                                    idUserSend = ? and idUserRecive = ?)
                                    ORDER BY id ASC', 
                                    [$Last_id, $id_me, $id_send,$id_send,$id_me]);
            
            return response()->json($messages,200);
        }

        return Redirect::to('/');
    }

    public function ListenerNotify(Request $request) {
        $id_me = $request['me'];

        if($request->ajax()) {
            $users = DB::select('select u.id, u.name, true as `hide` from messages as m
                                inner join users as u
                                on u.id = m.idUserSend
                                where m.idUserRecive = ? and m.response = 0
                                GROUP BY u.id', 
                                [$id_me]);
            if(!$users)
                return response()->json($users,200);
            
            foreach($users as $u) {
                Message::where('idUserRecive',$id_me)
                ->where('idUserSend', $u->id)
                ->update(['response' => 1]);
            }
            
            //Foreach users change response to 1
            return response()->json($users,200);
        }

        return Redirect::to('/');
    }
}
