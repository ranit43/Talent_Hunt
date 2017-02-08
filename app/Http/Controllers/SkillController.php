<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Skill;
class SkillController extends Controller
{
	public function index() {
		$skills = Skill::all();
		return view('skill.index')
				->with('skills', $skills);
	}
    //
    public function create() {
    	return view('skill.create');
    }

    public function store(Request $request) {
    	
    	// $data = $request->all();
    	// return $data;
    	$rules = [
            'name' => 'required'
            ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $skill = new Skill();
        $skill->name = $data['name'];
        if($skill->save()) {
            return redirect()->route('skill.index')->with('success','skill Successfully Added');
        } else {
            return redirect()->route('skill.index')->with('error','Something went wrong');
        }
    }
}