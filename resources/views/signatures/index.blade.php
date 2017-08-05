@extends('layouts.adminLayouts')

@section('content')

<div class="col-lg-12">
  <div class="row" >
    <h3>مدیریت اسکن های امضاء <a href="{{ route('signature.create') }}" class="btn btn-success btn-sm btn-line">افزودن اسکن جدید </a></h3> 
  </div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 لیست تمامی اسکن ها
            </div>
            <div class="panel-body">
                
                <div class="row">
                    <div class="col-lg-12">                   
                            
                            </div>
                    </div>
                </div>  
     
                @if( $signature = session('signature') )
                  <div class="alert alert-success">
                    {{ $signature }}
                  </div>
                @endif
                <div class="table-responsive">                
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align: center;">تاریخ ثبت</th>
                                <th style="text-align: center;">نام صاحب امضاء</th>
                                <th style="text-align: center;">واحد مربوطه</th>
                                <th style="text-align: center;">اسکن امضاء</th>
                                <th style="text-align: center;"> عملیات مورد نظر </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach( $signatures as $signature )
                            <tr class="gradeC">
                                <td style="text-align: center;"> {{ jdate($signature->created_at)->format('%B %d، %Y') }} </td>
                                <td style="text-align: center;"> {{ $signature->name }} </td>
                                <td style="text-align: center;"> {{ getunitname($signature->unit_id) }} </td>
                                <td style="text-align: center;"><img src="<?=Url('/'); ?>"></td>                          
                                <td style="text-align: center;">  
                                    <a href="<?=Url('ticket_resp/'.$signature->id); ?>" class="btn btn-info btn-sm btn-line">ویرایش</a>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>               

            <nav id="pagination">
            {!! $signatures->render() !!}
            </nav>

      </div>
    </div>
 </div>
@endsection

<?php

use App\Unit;

function getunitname( $id )
{
    $unit = Unit::where('id', $id)->first()['unitname'];
    return $unit;
}

?>