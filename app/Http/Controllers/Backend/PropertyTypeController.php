<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function AllType()
    {
        $types = PropertyType::latest()->get();
        return view('backend.type.type_all', compact('types'));
    }
    public function AddType()
    {
        return view('backend.type.type_add');
    }

    public function StoreType(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);
        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);
        $notification = array(
            'message' => 'Property Type Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    }

    public function EditType($id)
    {
        $types = PropertyType::findOrFail($id);
        return view('backend.type.type_edit', compact('types'));
    }

    public function UpdateType(Request $request)
    {
        $id = $request->id;
        PropertyType::findOrFail($id)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);
        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    }
    public function DeleteType($id)
    {
        PropertyType::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function AllAmentitie()
    {
        $amentities = Amenities::latest()->get();
        return view('backend.amentitie.amentitie_all', compact('amentities'));
    }
    public function AddAmentitie()
    {

        return view('backend.amentitie.amentitie_add');
    }
    public function StoreAmentitie(Request $request)
    {
        $request->validate([
            'amenitis_name' => 'required|unique:amenities|max:200',

        ]);
        Amenities::insert([
            'amenitis_name' => $request->amenitis_name,

        ]);
        $notification = array(
            'message' => 'Amenities Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amentitie')->with($notification);
    }

    public function EditAmentitie($id)
    {
        $amentitie = Amenities::findOrFail($id);
        return view('backend.amentitie.amentitie_edit', compact('amentitie'));
    }

    public function UpdateAmentitie(Request $request)
    {
        $id = $request->id;
        Amenities::findOrFail($id)->update([
            'amenitis_name' => $request->amenitis_name,

        ]);
        $notification = array(
            'message' => 'Amenitis Name Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amentitie')->with($notification);
    }
    public function DeleteAmentitie($id)
    {
        Amenities::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Amentitie Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
