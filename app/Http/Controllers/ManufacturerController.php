<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Manufacturer;
use App\Models\Country;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::paginate(10);
        return view('manufacturers', compact('manufacturers'));
    }

    public function add_view()
    {
        $countries = Country::all();
        return view('add_manufacturer', compact('countries'));
    }

    public function add(Request $request)
    {
        $this->validate(request(), ['companyname'=>'required']);

        Manufacturer::create([
            'company_name'=>$request->companyname,
            'country_id'=>$request->country,
            'address'=>$request->address
        ]);

        return redirect()->action([ManufacturerController::class,'index'])->with('success', 'Thêm nhà sản xuất thành công');
    }

    public function edit_view($id)
    {
        $countries = Country::all();
        $manufacturer = Manufacturer::find($id);

        return view('edit_manufacturer', compact('manufacturer','countries')); 
    }

    public function edit(Request $request, $id)
    {
        $this->validate(request(), ['companyname'=>'required']);
        $manufacturer = Manufacturer::find($id);

        $manufacturer->company_name = $request->companyname;
        $manufacturer->country_id = $request->country;
        $manufacturer->address = $request->address;
        $manufacturer->save();

        return redirect()->action([ManufacturerController::class,'index'])
                        ->with('success', 'Sửa nhà sản xuất thành công');
    }

    public function delete($id){

        try{
            Manufacturer::where("id", $id)->delete();
        }catch(QueryException $ex){
             return back()->with('error', 'Nhà sản xuất đang được tham chiếu, không thể xóa');
        }

        return redirect()->action([ManufacturerController::class,'index'])
                        ->with('success', 'Xóa nhà sản xuất thành công');
    }
}
