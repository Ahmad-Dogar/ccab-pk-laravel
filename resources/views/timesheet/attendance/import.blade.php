@extends('layout.main')
@section('content')


    <section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('Import CSV or XLSX files only')}}</h3>
                    @include('shared.flash_message')
                   <div id="form_result"></div>
                </div>
                <div class="card-body">
                    <p class="card-text">The first line in downloaded csv or xlsx file should remain as it is. Please do not change
                        the order of columns in csv or xlsx file.</p>
                    <p class="card-text">The correct column order is (employee_id,attendance_date, clock_in, clock_out) and you must follow the csv or xlsx file,
                        otherwise you will get an error while importing the file.</p>
                    <h6><a href="{{url('public/sample_file/sample_attendance.csv')}}" class="btn btn-primary"> <i
                                    class="fa fa-download"></i> {{__('Download sample CSV File')}} </a>
                        <a href="{{url('public/sample_file/sample_attendance.xlsx')}}" class="btn btn-success"> <i
                                    class="fa fa-download"></i> {{__('Download sample XLSX File')}} </a></h6>
                    <form action="{{ route('attendances.importPost') }}" name="import_attendance" id="import_attendance" autocomplete="off" enctype="multipart/form-data"
                          method="post" accept-charset="utf-8">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <fieldset class="form-group">
                                        <label for="logo">{{trans('file.Upload')}} {{trans('file.File')}}</label>
                                        <input type="file" class="form-control-file" id="file" name="file"
                                               accept=".xlsx, .xls, .csv, .001">
                                        <small>{{__('Please select csv or excel')}} file (allowed file size 2MB)</small>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="mt-1">
                            <div class="form-actions box-footer">
                                <button name="import_form" type="submit" class="btn btn-primary"><i
                                            class="fa fa fa-check-square-o"></i> {{trans('file.Save')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection