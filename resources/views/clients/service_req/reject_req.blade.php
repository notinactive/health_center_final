@extends('layouts.clientLayouts')

@section('statistics')
	        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">لیست درخواست های خدمت رد شده</div>
                                <div class="pull-left"><a href="<?=Url('client/index'); ?>" class="btn btn-danger" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">بازگشت به صفحه اصلی</a>
                                </div>
                            </div>

                            <div style="text-align: center; margin-left: 5%; margin-right: 2%;">
                            <div class="row" style="text-align: center;">
                        <div class="col-lg-12">
                             <div class="table-responsive">
                             <br>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr style="font-family: b koodak;">
                                                <th style="text-align: center;"> عملیات مورد نظر </th> 
                                                <th style="text-align: center;"> علت رد درخواست </th>       
                                                <th style="text-align: center;"> تاریخ رد درخواست </th>
                                                <th style="text-align: center;"> واحد رد کننده درخواست </th> 
                                                <th style="text-align: center;"> تاریخ ثبت </th>
                                                <th style="text-align: center;"> کد پیگیری </th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach( $srequests as $srequest )
                                            <tr class="gradeC" style="font-family: b koodak;">
                                                <td style="text-align: center;">
                                                    <a href="#" class="btn btn-warning btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $srequest->id }}">حذف</a>                                                
                                                    <a href="<?=Url('client/service_req/'.$srequest->id); ?>" class="btn btn-info btn-sm btn-line">بازبینی</a>
                                                </td>

                                                   <td style="text-align: center;"><span style="color: black;">{{ $srequest->reject_desc }}</span></td>
                                                    
                                                   <td style="text-align: center;">{{ jdate($srequest->reject_date)->format('%B %d، %Y') }}</td>
                                                    
                                                    @if( $srequest->reject_code == '1' )
                                                        <td style="color: black;text-align: center;"> مسئول واحد تدارکات</td>
                                                    @elseif( $srequest->reject_code == '2' )
                                                        <td style="color: black;text-align: center;"> تأیید کننده تدارکات </td>
                                                    @elseif( $srequest->reject_code == '3' )
                                                        <td style="color: black;text-align: center;"> مسئول اعتبار</td>
                                                    @elseif( $srequest->reject_code == '4' )
                                                        <td style="color: black;text-align: center;"> مدیر امور مالی</td>
                                                    @elseif($srequest->reject_code == '5' )
                                                        <td style="color: black;text-align: center;"> تصویب کننده </td>                                   
                                                    @endif                                                
                                                
                                                <td style="text-align: center;"> {{ jdate($srequest->created_at)->format('%B %d، %Y') }}  </td>
                                                <td style="text-align: center;"> {{ $srequest->codepaygiry }} </td>                                              
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                 </div> 
                            </div>
                     {!! $srequests->render() !!}
                    </div> 
                </div>            
            </div>

      <div class="row">
          <div class="col-lg-12">
              @foreach( $srequests as $srequest )
                <div class="modal fade" id="delete{{ $srequest->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2" style="direction: rtl; font-family: b koodak;"> آیا از حذف درخواست {{ $srequest->codepaygiry }}  اطمینان دارید ؟ </h4>
                            </div>
                            <div class="modal-body">                            
                              <table>
                                <tr>
                                    <td><span style="font-family: b koodak; font-weight: bold; color: red; direction: rtl;">هشدار : در صورت حذف این درخواست، کلیه سوابق و محتویات آن را از دست خواهید داد !!</span></td> 
                                    <td><img src="<?= Url('images/stop.png'); ?>" style="width: 50px; height: 50px;" /></td>                                                       
                                </tr>
                            </table>
                            </div>
                            <div class="modal-footer">                        
                                <form action="<?= Url('client/srequest/destroy/'.$srequest->id); ?>" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" name="btndelete" style="font-family: b koodak;" value="حذف کردن" class="btn btn-danger">
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: b koodak;">انصراف</button>
                                </form>                        

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection
