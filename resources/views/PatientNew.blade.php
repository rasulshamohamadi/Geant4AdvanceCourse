@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('app.Dashboard')
            <small>ورژن ۲</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">داشبرد</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if(session()->has('message'))
        <div class="alert  alert-dismissable   alert-success">
            <button type="button" class="close" style="float:left;" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('message') }}

        </div>
        @endif


        @if (count($errors) > 0)
        <div class="alert alert-danger">
        <button type="button" class="close" style="float:left;" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form method="post" class=" panel panel-default panel-body"
            action="  @if(!empty($patient))  {{route('people.update',['person'=>$patient->id])}}  @else {{route('people.store')}} @endif">
            @if(!empty($patient))
            <input type="hidden" name="_method" value="PUT">

            @endif

            @csrf
            <div class="row">

                <div class="col-md-3">@lang('people.nationalcode'): <input class="form-control" type="number"
                        name="nationalcode" placeholder="@lang('people.nationalcode')"   min="1111111111" max="9999999999"
                        value="@if(!empty($patient)){{$patient->nationalcode}}@endif" />


                </div>

                <div class="col-md-3">@lang('people.first_name'): <input class="form-control" type="text"
                        name="first_name" placeholder="@lang('people.first_name')"
                        value="@if(!empty($patient)){{$patient->first_name}}@endif" /></div>

                <div class="col-md-3"> @lang('people.last_name'): <input class="form-control" type="text"
                        name="last_name" placeholder="@lang('people.last_name')"
                        value="@if(!empty($patient)){{$patient->last_name}}@endif" />
                </div>

                <div class="col-md-3">@lang('people.birthplace'): <input class="form-control" type="text"
                        name="birthplace" placeholder="@lang('people.birthplace')"
                        value="@if(!empty($patient)) {{$patient->birthplace}} @endif" /></div>


                <div class="col-md-3">@lang('people.birthdate'): <input class="form-control" type="date"
                        name="birthdate" placeholder="@lang('people.birthdate')"
                        value="@if(!empty($patient)){{$patient->birthdate}}@endif" /></div>

                <div class="col-md-3">@lang('people.father_name'): <input class="form-control" type="text"
                        name="father_name" placeholder="@lang('people.father_name')" /></div>

                <div class="col-md-3">نام بیمه پایه:
                    <select class="form-control" type="select" name="insurance_id"
                        placeholder="نام بیمه پایه">
                        <option value="0">انتخاب کنید </option>
                        <option value="1">تامین اجتماعی</option>
                        <option value="2">سلامت</option>
                    </select>
                </div>
                <div class="col-md-3">نام بیمه مکمل:
                    <select class="form-control" type="select" name="cominsurance_id"
                        placeholder="نام بیمه مکمل">
                        <option value="0">انتخاب کنید </option>
                        <option value="1">معلم</option>
                    </select>
                </div>
                <div class="col-md-3">تاریخ پذیرش: <input class="form-control" type="date" name="enterdate"
                        placeholder="تاریخ پذیرش" /></div>
                <div class="col-md-12">علت مراجعه بیمار: <textarea class="form-control" type="textarea"
                        name="hse_patient[ref_reason]" placeholder="علت مراجعه بیمار"></textarea></div>
                <div class="col-md-3">وضعیت بیمار:
                    <select class="form-control" type="select" name="reseaon_id"
                        placeholder="وضعیت بیمار">
                        <option value="0">انتخاب کنید </option>
                        <option value="1">پذیرش اولیه</option>
                        <option value="2">تهیه تصویر CT</option>
                        <option value="3">طراحی درمان</option>
                        <option value="4">حین درمان</option>
                        <option value="5">تکمیل درمان</option>
                    </select>
                </div>

                <div class="col-md-3">وضعیت بیمار:
                    <select class="form-control" type="select" name="section_id"
                        placeholder="وضعیت بیمار">
                        <option value="0">انتخاب کنید </option>
                        <option value="1">پذیرش اولیه</option>
                        <option value="2">تهیه تصویر CT</option>
                        <option value="3">طراحی درمان</option>
                        <option value="4">حین درمان</option>
                        <option value="5">تکمیل درمان</option>
                    </select>
                </div>
                
            </div>
            <br>
            <div class="form-group row left">
                <div class="col-md-9 col-sm-9  offset-md-3">
                    <button type="button" class="btn btn-primary">انصراف </button>
                    <button class="btn btn-primary" type="reset">پاک کردن فرم </button>
                    <button type="submit" class="btn btn-success">ثبت اطلاعات </button>
                </div>
            </div>
        </form>



        <div class="box">
            <div class="box-header">
                <h3 class="box-title">جدول داده مثال ۲</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>کد ملی</th>
                            <th>نام پدر</th>
                            <th>عملیات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $index=>$patient )
                        <tr>

                            <td>{{ $index+1 }}</td>
                            <td>{{$patient->first_name}}</td>
                            <td>{{$patient->last_name}}</td>
                            <td>{{$patient->nationalcode}}</td>
                            <td> {{$patient->father_name}}</td>
                            <th>
                                     <a class="btn btn-info btn-sm " href="{{route('people.show', ['person'=>$patient->id]  )}}">جزییات</a>

                                 
                                <a class="btn btn-warning btn-sm "
                                    href="{{route('people.edit', ['person'=>$patient->id]  )}}">ویرایش</a>

                            </th>
                            <td>
                                <form method="post" action="{{route('people.destroy', ['person'=>$patient->id]  )}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm " type="submit">حذف</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach








                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>کد ملی</th>
                            <th>نام پدر</th>
                            <th>عملیات </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>



</section>
<!-- /.content -->
</div>
@endsection