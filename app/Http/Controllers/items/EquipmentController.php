<?php

namespace App\Http\Controllers\items;

use App\Models\Site;
use App\Models\Company;
use App\Models\Ownership;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\EquipmentGroup;
use App\Models\EquipmentStatus;
use App\Http\Controllers\Controller;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.equipments.report',[
            'companies' =>  Company::all(),
            'sites' =>  Site::all(),
            'groups' =>  EquipmentGroup::all(),
            'statuses' =>  EquipmentStatus::all(),
            'ownerships' =>  Ownership::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.equipments.add',[
            'companies' =>  Company::all(),
            'sites' =>  Site::all(),
            'groups' =>  EquipmentGroup::all(),
            'statuses' =>  EquipmentStatus::all(),
            'ownerships' =>  Ownership::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            $this->validate($request,[
            'pic[]' => 'image|mimes:jpg,png,jpeg|nullable',
            'code'=>'required',
            'name'=>'required',
            'power'=>'required',
            'group'=>'required',
            'status'=>'required',
            'company'=>'required',
            'site'=>'required',
            'ownership'=>'required',
            'ownership_date'=>'required|date'
            ]);

            if(isset($request->pic)) {
                $imgs='';
                for($i=0; $i < count($request->pic)-1;$i++){
                        $fileNameToStore='';
                        $filenameWithExt = $request->pic[$i]->getClientOriginalName ();
                        // Get Filename
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        // Get just Extension
                        $extension = $request->pic[$i]->getClientOriginalExtension();
                        // Filename To store
                        $fileNameToStore = $filename. '_'. time().'.'.$extension;
                        // Upload Image$path =
                        $request->pic[$i]->storeAs('public/equipments', $fileNameToStore);

                        if($i==0) $imgs='public/equipments'.$fileNameToStore;
                        else $imgs.='|public/equipments'.$fileNameToStore;
                        }
            }else {
                $fileNameToStore = 'noimage.jpg';
                }


            Equipment::create([
                'pic' => $imgs,
                'code'=>$request->code,
                'name'=>$request->name,
                'power'=>$request->power,
                'group'=>$request->group,
                'status'=>$request->status,
                'company'=>$request->company,
                'site'=>$request->site,
                'ownership'=>$request->ownership,
                'ownership_date'=>$request->ownership_date,
                ]);

            return redirect()->route('equipments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
