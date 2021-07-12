<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends Controller
{
    protected $data = array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['assignments'] = \App\Assignment::all();
        return view('member.assignment',$this->data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'api_id' => ['required','integer'],
            'title' => ['required'],
            'body' => ['required'],
        ]);
        if ($validator->fails()) {
            return \Redirect::back()->with('error',implode("\n",$validator->messages()->all()));
        } else {
            $assignment = \App\Assignment::find($request->id);
            $assignment->api_id = $request->api_id;
            $assignment->title = $request->title;
            $assignment->body = $request->body;
            try {
                $assignment->save();
                return \Redirect::back()->with('success','Record has been upated successfully...!!!');   
            } catch (\Exception $exception) {
                return \Redirect::back()->with('error',$exception->getMessage());
            }   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Assignment $assignment)
    {
        return view('member.edit',$assignment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        echo "update";
    }
    public function delete_record(Request $request)
    {
        $record = \App\Assignment::find($request->segment(3));
        if ($record->delete()) return \Redirect::back()->with('success','Record Deleted...!!!');
    }
    public function load_data(Request $request)  
    {
        \App\Assignment::truncate();$jsonapiObject = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/posts'));$insertStack = [];
        foreach ($jsonapiObject as $key => $onePost) : $temp = [];
            $temp['userId'] = $onePost->userId;$temp['title'] = $onePost->title;
            $temp['body'] = $onePost->body;$temp['api_id'] = $onePost->id;array_push($insertStack,$temp); 
        endforeach ;\App\Assignment::insert($insertStack);
        return \Redirect::back()->with('success','Data has been loaded...!!!');
    }
}
