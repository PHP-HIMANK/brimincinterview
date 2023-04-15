<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function index() {
        $user = User::where('id',Auth::user()->id)->get();
        return view('userprofile',compact('user'));
    }
    public function create() {
        //
    }
    public function store(Request $request) {
        //
    }
    public function edit($id) {
        $user = User::where('id',$id)->first();
        return view('editprofile',compact('user','id'));
    }
    public function update(Request $request) {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:200',
            'image' => 'nullable|mimes:jpg, png, jpeg, gif, tif',
            'id' => 'required|numeric'
        ]);
        if($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        } else {
            $id = $request->input('id');
            $name = $request->input('name');
            $linkedin = $request->input('linkedin');
            $facebook = $request->input('facebook');
            $instagram = $request->input('instagram');
            if($request->hasFile('image')) {
                $filename = time().'_'.mt_rand().'.'.$request->file('image')->extension();
                $request->file('image')->storeAs('userprofile',$filename,'public');
                $arr = array('name'=>$name,'image'=>$filename, 'linkedin'=>$linkedin, 'facebook'=>$facebook, 'instagram'=>$instagram);
            } else {
                $arr = array('name'=>$name, 'linkedin'=>$linkedin, 'facebook'=>$facebook, 'instagram'=>$instagram);
            }
            User::where('id',$id)->update($arr);
            return redirect()->route('userprofile')->with('updateprofilesuccess', 'Profile is updated successfully');
        }
    }
    public function destroy(Request $request) {
        $id = $request->input('id');
        try{
            $data = User::findOrFail($id);
            User::where('id',$data->id)->delete();
            return redirect()->back()->with('delete_success','Profile deleted successfully');
        } catch(\Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with('delet_error',$error);
        }
    }
}
