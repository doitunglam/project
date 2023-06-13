<?php

namespace App\Http\Controllers\API;

use App\Models\Doanphi;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;



class DoanphiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->cannot('viewAny', Doanphi::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $doanphi = Doanphi::all();
        return $this->sendResponse($doanphi, 'Lay danh sach doan phi thanh cong!');

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
        //
        if (\Auth::user()->cannot('create', Doanphi::class)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'MaDV' => 'required',
            'Nam1' => 'required',
            'Nam2' => 'required',
            'Nam3' => 'required',
            'Nam4' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $doanphi = Doanphi::create($input);

        return $this->sendResponse($doanphi, 'Tao doan phi thanh cong.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doanphi = Doanphi::find($id);
        if (is_null($doanphi)) {
            return $this->sendError('Khong tim thay doan phi.');
        }

        if (\Auth::user()->cannot('view', $doanphi)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        return $this->sendResponse(new Response($doanphi), 'Hien thi doan phi thanh cong.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Http\Response
     */
    public function edit(Doanphi $doanphi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doanphi $doanphi)
    {
        //
        $input = $request->all();

        if (\Auth::user()->cannot('update', $doanphi)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $validator = Validator::make($input, [
            'Nam1' => 'nullable|numeric',
            'Nam2' => 'nullable|numeric',
            'Nam3' => 'nullable|numeric',
            'Nam4' => 'nullable|numeric'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        foreach ($input as $key => $value) {
            $doanphi[$key] = $value;
        }

        $doanphi->save();

        return $this->sendResponse($doanphi, 'Sua doan phi thanh cong.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doanphi  $doanphi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doanphi $doanphi)
    {
        //

        if (\Auth::user()->cannot('delete', $doanphi)) {
            return $this->sendResponse(null, 'Khong du quyen!');
        }

        $doanphi->delete();

        return $this->sendResponse([], 'Xoa doan phi thanh cong.');
    }
}
