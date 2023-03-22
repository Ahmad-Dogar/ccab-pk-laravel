<div class="container-fluid">
    <div class="card mb-0">
        <div class="card-body">           
            <h3 class="card-title">{{__('Add Probation Type')}}</h3>
            <form method="post" id="probation_type_form" class="form-horizontal" >
                @csrf
                <div class="input-group">
                    <input type="text" name="name" id="probation_title"  class="form-control"
                           placeholder="{{__('Probation Type')}}">
                    <select name="duration" id="probation_duration"
                        class="form-control selectpicker ">
                        @for ($i = 1; $i < 13; $i++)
                            @if ($i > 1)
                                <option value="{{$i}}">{{ __(':num months', ['num' => $i]) }}</option>
                            @else 
                                <option value="{{$i}}">{{ __(':num month', ['num' => $i]) }}</option> 
                            @endif
                        @endfor
                    </select>
                    <input type="submit" name="probation_type_submit" id="probation_type_submit" class="btn btn-success" value={{trans("file.Save")}}>
                </div>
            </form>
        </div>
    </div>
</div>
<span class="probation_result"></span>
<div class="table-responsive">
    <table id="probation_type-table" class="table ">
        <thead>
        <tr>
            <th>{{__('Probation Type')}}</th>
            <th>{{__('Duration')}}</th>
            <th class="not-exported">{{trans('file.action')}}</th>
        </tr>
        </thead>

    </table>
</div>

<div id="ProbationEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="ProbationModalLabel" class="modal-title">{{trans('file.Edit')}}</h5>

                <button type="button" data-dismiss="modal" id="probation_close" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
            </div>
            <span class="probation_result_edit"></span>

            <div class="modal-body">
                <form method="post" id="probation_type_form_edit" class="form-horizontal" enctype="multipart/form-data" >

                    @csrf
                    <div class="col-md-4 form-group">
                        <label>{{__('Probation Type')}} *</label>
                        <input type="text" name="name_edit" id="probation_title"  class="form-control"
                           placeholder="{{__('Probation Type')}}">
                        <select name="duration_edit" id="probation_duration"
                            class="form-control selectpicker ">
                            @for ($i = 1; $i < 13; $i++)
                                @if ($i > 1)
                                    <option value="{{$i}}">{{ __(':num months', ['num' => $i]) }}</option>
                                @else 
                                    <option value="{{$i}}">{{ __(':num month', ['num' => $i]) }}</option> 
                                @endif
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="hidden" name="hidden_probation_id" id="hidden_probation_id" />
                        <input type="submit" name="probation_type_edit_submit" id="probation_type_edit_submit" class="btn btn-success" value={{trans("file.Edit")}} />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>