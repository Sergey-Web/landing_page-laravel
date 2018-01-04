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
        $nameSection = Helpers::getNamePage(request()->path());
        $fields = Helpers::getNameColumn($nameSection, ['id', 'created_at', 'updated_at']);

        return Helpers::saveForm($request, $nameSection, $fields);
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
        $titleColumns = Helpers::getNameColumn($nameSection, ['id', 'created_at', 'updated_at']);
        $arrEmployee = Employee::find($id)->toArray();

        dd(array_fill(['id', 'created_at', 'updated_at'], 'test'));
        dd(array_diff_key($arrEmployee, array_fill(['id', 'created_at', 'updated_at'], '') ));
        dd(array_diff(Employee::find($id)->toArray(), ['id', 'created_at', 'updated_at']));

        return view('admin.edit-section', ['id' => $id,'nameSection' => $nameSection, 'titleColumns' => $titleColumns]);
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
        Helpers::delImgFile( Employee::find($id)->toArray() );
        Employee::destroy($id);

        return redirect()->back();
    }
}
