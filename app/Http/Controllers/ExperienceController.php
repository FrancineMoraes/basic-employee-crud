<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ExperienceRepository;

class ExperienceController extends Controller
{
    private $experience;

    public function  __construct()
    {
        $this->experience = new ExperienceRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($employees_id)
    {
        return $this->experience->index($employees_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->experience->store($request);
            return $this->experience->index($request->employee_id);
        } catch (\Exception $ex) {
            return response()->json("Erro");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $experience = $this->experience->show($id);
            return view('experiences.show', compact('experience'));
        }
        catch (\Exception $ex)
        {
            return redirect()->route('experiences.index')->with('status', 'danger')->with('message', 'Não foi possível visualizar a experiência, atualize a página e tente novamente.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = $this->experience->edit($id);

        return view('experiences.edit', compact('experience'));
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
        return $this->experience->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->experience->destroy($id);
    }
}
