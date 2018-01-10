<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Helpers;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Employee::all();
        $nameSection = Helpers::getNamePage(request()->path());
        $titleColumns = Helpers::getNameColumn($nameSection, ['id', 'name', 'created_at', 'updated_at']);

        if(count($pages) == 0) {
            return view('admin.single-section', [
                'titleColumns' => $titleColumns,
                'sections'     => FALSE,
                'nameSection'  => $nameSection
             ]);
        }

        foreach($pages->toArray() as $page) {
            $sections[] = Helpers::delKeysFromArray($page, ['name', 'created_at', 'updated_at']);
        }

        return view('admin.single-section', [
            'titleColumns' => $titleColumns,
            'sections'     => $sections,
            'nameSection'  => $nameSection
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nameSection = Helpers::getNamePage(request()->path());
        $titleColumns = Helpers::getNameColumn($nameSection, ['id', 'created_at', 'updated_at']);

        return view('admin.create-section', ['nameSection' => $nameSection, 'titleColumns' => $titleColumns]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nameSection = Helpers::getNamePage($request->path());
        $fieldsName = Helpers::getNameColumn($nameSection, ['id', 'created_at', 'updated_at']);
        $fieldsData = $request->except('_token');

        return Helpers::saveForm($fieldsData, $nameSection, $fieldsName);
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
        $nameSection = Helpers::getNamePage(request()->path());
        $arrEmployee = Employee::find($id)->toArray();
        $arrData = Helpers::delKeysFromArray($arrEmployee, ['id', 'created_at', 'updated_at']);

        return view('admin.edit-section', ['id' => $id,'nameSection' => $nameSection, 'arrData' => $arrData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nameSection = Helpers::getNamePage($request->path());
        $fieldsName = Helpers::getNameColumn($nameSection, ['id', 'created_at', 'updated_at']);
        $fieldsData = $request->except(['_token', '_method']);

        return Helpers::saveForm($fieldsData, $nameSection, $fieldsName, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Helpers::delImgFile( Employee::find($id)->toArray() );
        Employee::destroy($id);

        return redirect()->back();
    }
}
