<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Add Auth facade to get current user info
use illuminate\Support\Facades\Auth;
//Add Storage facade
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Training;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('keyword') != null){
            $keyword = $request->get('keyword');
            $trainings = Training::where('title','LIKE','%' . $keyword . '%')
                ->paginate(5);
        }
        else{
            $trainings = Training::paginate(5);
        }

        return view('admin.trainings.index',compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $training = new Training();
        $training->title = $request->get('title');
        $training->description = $request->get('description');
        $training->trainer = $request->get('trainer');
        $training->user_id = Auth::user()->id;
        //Is file selected?
        if ($request->hasFile('attachment')){
            //Change filename
            //Example: From File_Name.png to 2020-04-06-File_Name.png
            $filename = date('Y-m-d') . '-' .$request->attachment->getClientOriginalName();

            //Store image file to web server
            Storage::disk('public')->put($filename, File::get($request->attachment));

            //fetch filename to save to db
            $training->attachment = $filename;
        } //End file upload process


        $training->save();

        return redirect('/trainings/'. $training->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training = Training::find($id);
        return view('admin.trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::find($id);
        return view('admin.trainings.edit',compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $training = Training::find($id);
        $training->title = $request->get('title');
        $training->description = $request->get('description');
        $training->trainer = $request->get('trainer');
        $training->status = $request->get('status');
         //Is file selected?
         if ($request->hasFile('attachment')){
            //Change filename
            //Example: From File_Name.png to 2020-04-06-File_Name.png
            $filename = date('Y-m-d') . '-' .$request->attachment->getClientOriginalName();

            //Store image file to web server
            Storage::disk('public')->put($filename, File::get($request->attachment));

            //fetch filename to save to db
            $training->attachment = $filename;
        } //End file upload process

        $training->save();

        return redirect('/trainings/'. $training->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::find($id);
        //Remove file from storage when a record is deleted
        if ($training->attachment != null){
            Storage::disk('public')->delete($training->attachment);
        }
        $training->delete();
        return redirect ()
            ->route('training:index')
            ->with([
                'alert-type'=>'success',
                'alert' => 'Record id ' . $training->id .' has been deleted'
                ]);
    }
}
