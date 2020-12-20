@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('people.show')
            <small>@if(!empty($patient)){{$patient->first_name.' '.$patient->last_name }}@endif </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">@lang('people.show')</li>
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
        <div class="row ">
            <div class=" col-md-3">
                <div class="box box-info ">
                    <div class="box-header">
                        <h3 class="box-title">@lang('people.generalinfo')</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>@lang('people.nationalcode'):</td>
                                <td>@if(!empty($patient)){{$patient->nationalcode}}@endif</td>
                            <tr>
                            <tr>
                                <td>@lang('people.first_name'):</td>
                                <td>@if(!empty($patient)){{$patient->first_name}}@endif</td>
                            <tr>
                            <tr>
                                <td>@lang('people.last_name'):</td>
                                <td>@if(!empty($patient)){{$patient->last_name}}@endif</td>
                            <tr>
                            <tr>
                                <td>@lang('people.birthplace'):</td>
                                <td>@if(!empty($patient)){{$patient->birthplace}}@endif</td>
                            <tr>
                            <tr>
                                <td>@lang('people.birthdate'):</td>
                                <td>@if(!empty($patient)){{$patient->birthdate}}@endif</td>
                            <tr>
                            <tr>
                                <td>@lang('people.father_name'):</td>
                                <td>@if(!empty($patient)){{$patient->father_name}}@endif</td>
                            <tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class=" col-md-9">
                <div class="box box-info ">
                    <div class="box-header">
                        <h3 class="box-title">@lang('people.admitioninfo')</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('people.admitiondate'):</th>
                                    <th>@lang('people.admitionreseon')</th>
                                    <th>@lang('people.admitiondoctor')</th>
                                    <th>@lang('people.admitiondate')</th>

                                </tr>
                                <thead>

                                    <tr>
                                        <td colspan="4">

                                            <div style=" height: 130px;   overflow: auto;width:100%">

                                                <table width="100%">
                                                    @foreach($Admition as $admit)
                                                    <tr @if(is_null($admit->exitdate)) class="alert alert-danger"
                                                        @endif>
                                                        <td width="10%">{{$admit->id}}</td>
                                                        <td width="20%">{{$admit->enterdate}}</td>
                                                        <td width="20%">{{$admit->dischargedate}}</td>
                                                        <td width="20%">{{$admit->exitdate}}</td>
                                                        <td width="20%">{{$admit->user->name}}</td>
                                                        <td>{{$admit->reseaon->title}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </td>
                                    </tr>

                                <tfoot>
                                    <tr>
                                        <th>@lang('people.admitiondate'):</th>
                                        <th>@lang('people.admitionreseon')</th>
                                        <th>@lang('people.admitiondoctor')</th>
                                        <th>@lang('people.admitiondate')</th>

                                    </tr>
                            <tfoot>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row ">
            <div class=" col-md-12">
                <div class="box box-info ">
                    <div class="box-header">
                        <h3 class="box-title">@lang('people.peopledrug')</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" class=" panel panel-default panel-body"
                            action="  @if(!empty($patient))  {{route('people.update',['person'=>$patient->id])}}  @else {{route('people.store')}} @endif">
                            @if(!empty($patient))
                            <input type="hidden" name="_method" value="PUT">
                            @endif
                            @csrf
                            <div class="row">

                                <div class="col-md-3">@lang('service.servicecodename'): <input class="form-control"
                                        type="search" name="servicecodename" id="servicecodename"
                                        placeholder="@lang('service.servicecodename')" onblur="getMessage()" />
                                </div>
 


                                <script>
                                $(document).ready(function() {

                                    $('#servicecodename').keyup(function() {
                                        var query = $(this).val();
                                        // alert(query);
                                        if (query != '') {
                                            var _token = $('input[name="_token"]').val();
                                            $.ajax({
                                                url: "{{ route('autocomplete.fetch' ) }}",
                                                method: "POST",
                                                data: {
                                                    query: query,
                                                    patient_id:<?php echo $patient->id ?> ,
                                                    _token: _token
                                                },
                                                success: function(data) {
                                                    //alert(data);
                                                    $('#servicelist').fadeIn();
                                                    $('#servicelist').html(data);
                                                }
                                            });
                                        }
                                    });
 

                                    
                                });
                                </script>
                                <div class="col-md-9" id="servicelist">
                                </div>



                            </div>
                            <br>
                            <div class="form-group row left">

                            </div>
                        </form>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('people.row')</th>
                                    <th>@lang('people.type') </th>
                                    <th>@lang('people.title')</th>
                                    <th>@lang('people.number') </th>
                                    <th> @lang('people.price')</th>
                                    <th> @lang('people.totalprice')</th>
                                    <th> @lang('people.insuranprice')</th>
                                    <th> @lang('people.cominsuranprice')</th>
                                    <th> @lang('people.patientprice')</th>
                                    <th> @lang('people.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($PersonService as $index=>$service )
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $service->type }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{$service->number}}</td>
                                    <td>{{ $service->price }}</td>

                                    <td>{{$service->totalprice}}</td>
                                    <td>{{$service->insuranprice}}</td>
                                    <td>{{$service->cominsuranprice}}</td>
                                    <td> {{$service->patientprice}}</td>
                                    <th>

                                        <a class="btn btn-warning btn-sm "
                                            href="{{route('people.edit', ['person'=>$service->id]  )}}">ویرایش</a>
                                    </th>
                                    <td>
                                        <form method="post"
                                            action="{{route('personservices.destroy', ['personservice'=>$service->id]  )}}">
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
                                    <th>@lang('people.row')</th>
                                    <th>@lang('people.type') </th>
                                    <th>@lang('people.title')</th>
                                    <th>@lang('people.number') </th>
                                    <th> @lang('people.price')</th>
                                    <th> @lang('people.totalprice')</th>
                                    <th> @lang('people.insuranprice')</th>
                                    <th> @lang('people.cominsuranprice')</th>
                                    <th> @lang('people.patientprice')</th>
                                    <th> @lang('people.action')</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
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