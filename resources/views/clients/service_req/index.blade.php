@extends('layouts.clientLayouts')

@section('statistics')
	        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">لیست درخواست های خدمت</div>
                                <div class="pull-left"><a href="<?=Url('client/service_req/create'); ?>" class="btn btn-warning" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">ثبت درخواست خدمت جدید</a>
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
                                                <th style="text-align: center;"> وضعیت انصراف </th>       
                                                <th style="text-align: center;"> وضعیت ثبت نهایی </th>
                                                <th style="text-align: center;"> وضعیت درخواست </th>       
                                                <th style="text-align: center;"> تاریخ ثبت </th>
                                                <th style="text-align: center;"> کد پیگیری </th>              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach( $sabads as $sabad )
                                            <tr class="gradeC" style="font-family: b koodak;">
                                                <td style="text-align: center;">
                                                  @if($sabad->confirm == '0')                               
                                                    <a href="#" class="btn btn-danger btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $sabad->id }}">حذف</a>
                                                    <a href="#" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $sabad->id }}">ویرایش</a>
                                                    <a href="<?=Url('client/service_req/'.$sabad->id); ?>" class="btn btn-primary btn-sm btn-line">مشاهده جزئیات</a>
                                                    @else                                                   
                                                    <a href="<?=Url('client/service_req/'.$sabad->id); ?>" class="btn btn-primary btn-sm btn-line">مشاهده جزئیات</a>
                                                    @endif
                                                </td>

                                                  @if($sabad->cancel == '1' && $sabad->confirm == '1')       
                                                   <td style="text-align: center;"><span style="color: red;">انصراف داده شده</span></td>

                                                    @elseif($sabad->cancel == '0' && $sabad->confirm == '1')                                                         <td style="text-align: center;"><span style="color: black;">انصراف داده نشده</span></td>

                                                    @elseif($sabad->cancel == '0' && $sabad->confirm == '0')
                                                    <td style="text-align: center;"><span style="color: black;">-----</span></td>
                                                    @endif


                                                    @if( $sabad->confirm == '0' && $sabad->cancel=='0' )
                                                        <td style="text-align: center;"><a onclick="confirm({{ $sabad -> id }})" class="btn btn-success">ثبت نهایی</a></td>
                                                    @elseif( $sabad->confirm == '1')
                                                        <td style="color: green;text-align: center;"> ثبت نهایی شده </td>      
                                                    @endif                                      
                                                   

                                                    @if( $sabad->state_req == '0' )
                                                        <td style="color: black;text-align: center;"> تازه ثبت شده </td>
                                                    @elseif( $sabad->state_req == '1' )
                                                        <td style="color: black;text-align: center;"> تأییدشده توسط مسئول واحد </td>
                                                    @elseif( $sabad->state_req == '2' )
                                                        <td style="color: black;text-align: center;"> دریافت مجوز تأیید کننده  </td>
                                                    @elseif( $sabad->state_req == '3' )
                                                        <td style="color: black;text-align: center;"> تأییدشده توسط مسئول اعتبار </td>
                                                    @elseif( $sabad->state_req == '4' )
                                                        <td style="color: black;text-align: center;"> تأییدشده توسط امور مالی </td>
                                                    @elseif( $sabad->state_req == '5' )
                                                        <td style="color: black;text-align: center;"> دریافت مجوز تصویب کننده </td>
                                                    @elseif( $sabad->state_req == '6' )
                                                        <td style="color: black;text-align: center;"> درخواست تکمیل شد </td>
                                                    @elseif( $sabad->state_req == '7' )
                                                        <td style="color: black;background: red; text-align: center;"> هنوز ثبت نهایی نشده است </td>
                                                    @endif                                                
                                                
                                                <td style="text-align: center;"> {{ jdate($sabad->created_at)->format('%B %d، %Y') }}  </td>
                                                <td style="text-align: center;"> {{ $sabad->codepaygiry }} </td>                                              
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                 </div> 
                            </div>
                     {!! $sabads->render() !!}
                    </div> 

                            </div>            
            </div>

<script type="text/javascript">
  
confirm= function (id)
{
  $.ajaxSetup ({

      headers : {

         'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') 

      }});

      $.ajax({

        url: 'confirm_serv',
        type: "POST",
        data: {'sabad_id':id ,  "_token": "{{ csrf_token() }}"},
        success: function (data)
        {
          
        }

      });  
  }

</script>

@endsection
