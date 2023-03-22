<?php

namespace App\Http\Controllers\Variables;

use App\Http\Controllers\Controller;
use App\Probation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProbationTypeController extends Controller
{
    public function index()
	{

		if (request()->ajax())
		{
			return datatables()->of(Probation::select('id', 'name', 'duration')->get())
				->setRowId(function ($probation)
				{
					return $probation->id;
				})
				->addColumn('action', function ($data)
				{
					if (auth()->user()->can('user-edit'))
					{
						$button = '<button type="button" name="edit" id="' . $data->id . '" class="status_edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
						$button .= '&nbsp;&nbsp;';
						$button .= '<button type="button" name="delete" id="' . $data->id . '" class="status_delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

						return $button;
					} else
					{
						return '';
					}
				})
				->rawColumns(['action'])
				->make(true);
		}

	}

	public function store(Request $request)
	{
		$logged_user = auth()->user();

		if ($logged_user->can('user-add'))
		{
			Log::debug(var_export($request->all(), true));
			$validator = Validator::make($request->all(),
				[
					'name'      => 'required|unique:probations',
                    'duration'  => 'required',
				]
			);


			if ($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}

			$data = [];

			$data['name']       = $request->get('name');
			$data['duration']   = $request->get('duration');

			Probation::create($data);

			return response()->json(['success' => __('Data Added successfully.')]);
		}

		return abort('403', __('You are not authorized'));

	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = Probation::findOrFail($id);

			return response()->json(['data' => $data]);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$logged_user = auth()->user();

		if ($logged_user->can('user-edit'))
		{
			$id = $request->hidden_status_id;

			$validator = Validator::make($request->all(),
				[
					'name_edit'     => 'required|unique:probations,name,'.$id,
                    'duration_edit' => 'required',
				]
//				,
//				[
//					'status_title_edit.required' => 'Status name can not be empty',
//					'status_title_edit.unique'  => 'Status name already exist',
//				]
			);


			if ($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}

			$data = [];

			$data['name']       = $request->get('name_edit');
			$data['duration']   = $request->get('duration_edit');



			Probation::whereId($id)->update($data);

			return response()->json(['success' => __('Data is successfully updated')]);
		} else
		{

			return abort('403', __('You are not authorized'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(!env('USER_VERIFIED'))
		{
			return response()->json(['error' => 'This feature is disabled for demo!']);
		}
		$logged_user = auth()->user();

		if ($logged_user->can('user-delete'))
		{
			Probation::whereId($id)->delete();
			return response()->json(['success' => __('Data is successfully deleted')]);
		}
		return abort('403',__('You are not authorized'));
	}
}
