<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;

class SubstitutionsController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
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
    $leaves = Leave::where('substitute_id', \Auth::user()->id)->where('status', 'new')->get();
    return view('substitutions.index', [ 'leaves' => $leaves ]);
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
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Leave  $leave
  * @return \Illuminate\Http\Response
  */
  public function show(Leave $leave)
  {
    if ($leave->substitute_id !== \Auth::user()->id) {
      abort(404);
    }
    return view('substitutions.show', [ 'leave' => $leave ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Leave  $leave
  * @return \Illuminate\Http\Response
  */
  public function edit(Leave $leave)
  {

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Leave  $leave
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Leave $leave)
  {
    if ($request->input('status') == 'reject')
    {
      $leave->status = 'rejected by substitute';
    }
    else if ($request->input('status') == 'accept')
    {
      $leave->status = 'wait for approval';
    }
    $leave->save();
    return redirect('/substitutions');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Leave  $leave
  * @return \Illuminate\Http\Response
  */
  public function destroy(Leave $leave)
  {
    //
  }
}
