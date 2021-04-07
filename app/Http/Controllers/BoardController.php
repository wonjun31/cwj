<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Like_status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoardController extends Controller
{
    public function create( Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:20'],
            'content' => ['required', 'string', 'max:2000'],
            'subFile' => ['nullable','mimes:jpg,jpeg,png,gif', 'max:1024'],
        ])->validate();

        /*
        return DB::transaction(function () use ($input) {
            return tap(Board::create([
                'title' => $input['title'],
                'writer' => $input['writer'],
                'content' => $input['content'],
            ]));
        });

        리스폰할 곳을 못찾겠음.
        */
        /*
        DB::table('board')->insert(
            [
                'title' => $input['title'],
                'writer' => $input['writer'],
                'content' => $input['content'],
            ]
        );

        */

        $file = $request->file('subFile');
        //$path = $request->file('subFile')->store('public/images');
        $fileOriname =  $request->file('subFile')->getClientOriginalName();
        //실제 파일 이름
        $filename = 'board-' . time() . '.' . $file->getClientOriginalExtension();
        // 저장된 파일이름
        $path = $file->storeAs('public/images', $filename);

        $board = new Board;

        $board->title = $request->title;
        $board->writer = $request->writer;
        $board->content = $request->content;

        $board->fileNm = $fileOriname;
        $board->subFile = $filename;

        $board->save();


        return redirect()->route('tab2');

    }

    public function update( Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:20'],
            'content' => ['required', 'string', 'max:2000'],
            'subFile' => ['required','mimes:jpg,jpeg,png,gif', 'max:1024'],
        ])->validate();


        $file = $request->file('subFile');
        //$path = $request->file('subFile')->store('public/images');
        $fileOriname =  $request->file('subFile')->getClientOriginalName();
        //실제 파일 이름
        $filename = 'board-' . time() . '.' . $file->getClientOriginalExtension();
        // 저장된 파일이름
        $path = $file->storeAs('public/images', $filename);


        //$request->file('subFile')->store('public/images');

        /*
        DB::table('board')->where("board_no", $input['board_no'])->update(
            [

                'title' => $input['title'],
                'writer' => $input['writer'],
                'content' => $input['content'],
            ]
        );
        */

        $board = new Board;

        $board::where("board_no",$input['board_no'])->update([
            'title' => $input['title'],
            'writer' => $input['writer'],
            'content' => $input['content'],
            'subFile' => $filename,
            'fileNm' =>$fileOriname,
        ]);


        return redirect()->route('tab2');

    }

    public function likePlus( Request $request)
    {
        //조회 있으면 업데이트 아니면 insert
        //board_no 번호와 이메일로 확인
        $like = new Like_status();
        $user = Auth::user();
        $board = new Board;


        //게시판 번호 참조
        $board_no = $request['board_no'];
        $email = $user['email'];

        $status = $request['status'];

        //$likeStats = DB::table('like_status')->where("board_no" ,$board_no)->where("email" ,$email)->first();
        $likeStats = $like::where('board_no',$board_no)->where("email" ,$email)->first();

        if($likeStats == ''){
           //존재하기 않기 때문에 insert

           $like->board_no = $board_no;
           $like->email = $email;
           $like->status = "true";
           $like->save();

        } else {
            //존재하기 때문에 update
            $like::where("board_no",$board_no)->where("email" ,$email)->update([
                'status' => $status,
            ]);

            $likeCnt = $like::where('board_no',$board_no)->count();

            $board::where("board_no",$board_no)->update([
                'likeCnt' => $likeCnt,
            ]);

        }

        return "gasdsag";
    }


}
