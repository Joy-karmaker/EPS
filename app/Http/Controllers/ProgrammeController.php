<?php

namespace App\Http\Controllers;
use App\Models\Programme;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProgrammeController extends Controller
{
    public function programmeList()
    {
        $programmes= DB::table('programmes as p')->select(

            'p.name',
            'p.id'
        )
        ->orderBy('p.id','asc')
        ->where('p.status','<>',0)->paginate(5);

        return view('programme.programme', compact('programmes'));
    }
    public function createProgramme()
    {

        return view('programme.createProgramme');
    }

    public function saveProgramme(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name' => 'required|string|max:30'

        ]
        , [

            'name.required' => 'Please programme Name.'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $Programme= new Programme();
        $Programme->name = $request->input('name');

        $Programme->save();
        // Admin::create($request->post());

        return redirect()->route('programmes.programmeList')->with('success','Programme has been created successfully.');
    }
    public function editProgramme($id)
    {
        $Programme = Programme::find($id);
        return view('programme.edit', compact('Programme'));
    }
    public function updateProgramme(Request $request, $id)
    {
        $validator=$request->validate([
            'name' => 'required|string|max:30|unique:programmes,name'
        ]
        , [
            'name.required' => 'Please Enter Full Name.'
        ]);
        $Programme = Programme::find($id);
        $Programme->name = $request->input('name');

        $Programme->update();

        return redirect()->route('programmes.programmeList')->with('success','Programme has been created successfully.');


    }
    public function deleteProgramme($id)
    {
        DB::table('programmes')->where('id', $id)->update(['status' => '0']);
        return redirect()->route('programmes.programmeList')->with('success','Programme has been deleted successfully');
    }
}
