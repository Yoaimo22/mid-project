<?php

namespace App\Http\Controllers;
use App\Models\pemilik;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PhoneController extends Controller
{
    Public function redirectToCreatePhonePage()
    {
        $pemiliks = pemilik::all();
        return view('create_phone',compact('pemiliks'));
    }
    Public function createPhone(Request $request)
    {

        $validated = $request->validate([
            'phone_name_input' => 'required|unique:App\Models\Phone,phone_name|max:255',
            'phone_image_input' => 'required|mimes:jpg,png',
            'pemilik_input' => 'required|string'
        ]);
        $path = $request->file('phone_image_input');
        $phone = Phone::create([
            'phone_name' => $request->phone_name_input,
            'phone_image_path'=> $path,
            'pemilik_id'=> $request-> pemilik_input

        ]);
        $fileName = $phone->id . $path->getClientOriginalName();
        $path->storeAs('public/image_phone', $fileName);
        $phone->phone_image_path = 'image_phone/' . $fileName;
        $phone->save();

        return redirect(route('rumah'));
    }
    Public function updatePhonePage($id){
      $phone = Phone::findOrFail($id);
       return view('update_phone', ["phone" => $phone]);
    }
    Public function updatePhone(Request $request,$id)
    {
        $validated = $request->validate([
            'phone_name_input' => 'required|unique:App\Models\Phone,phone_name|max:255',
            'phone_image_input' => 'required|mimes:jpg,png',
            'pemilik_input' => 'required|string'

            
        ]);
        $phone= Phone::find($id);
        Storage::delete('storage/' . $phone->phone_image_path);

        $path = $request->file('phone_image_input');

         Phone::findOrFail($id)->update([
            'phone_name' => $request->phone_name_input,
            'phone_image_path'=> $path,
            'pemilik'=> $request-> pemilik_input
        ]);

        $phone= Phone::find($id);
        $fileName = $phone->id . $path->getClientOriginalName();
        $path->storeAs('public/image_phone', $fileName);
        $phone->phone_image_path = 'image_phone/' . $fileName;
        $phone->save();
        return redirect(route('rumah'));
     }
     Public function deletePhone(Request $request,$id){
        // Phone::findOrFail($id)->delete();
//cara 2
Phone::destroy($id);
        return redirect(route('rumah'));
     }
}
