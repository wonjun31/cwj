<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

class BoardController extends Controller
{
    public function create( Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:20'],
            'content' => ['required', 'string', 'max:2000'],
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

        DB::table('board')->insert(
            [
                'title' => $input['title'],
                'writer' => $input['writer'],
                'content' => $input['content'],
            ]
        );


        return redirect()->route('tab2');

    }

    public function update( Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:20'],
            'content' => ['required', 'string', 'max:2000'],
        ])->validate();

        DB::table('board')->where("board_no", $input['board_no'])->update(
            [

                'title' => $input['title'],
                'writer' => $input['writer'],
                'content' => $input['content'],
            ]
        );

        return redirect()->route('tab2');

    }








}
