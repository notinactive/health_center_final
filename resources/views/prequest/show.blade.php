@extends('layouts.adminLayouts')


@section('content')
   <div class="col-lg-12">
    <div class="row" >
        <h3> نمایش محتویات درخواست کالا <a href="{{ route('prequest.index') }}" class="btn btn-danger btn-sm btn-line">بازگشت </a> </h3> 
    </div>
</div>
<hr/>
	        <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                محتویات درخواست با شماره {{ $requests->codesefaresh }} 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr style="font-family: b koodak;">
                                <th style="text-align: center;"> کالای انتخابی </th>                        
                                <th style="text-align: center;"> مقدار برآورد شده </th>
                                <th style="text-align: center;"> توضیحات مربوطه </th>
                                             
                            </tr>
                        </thead>
                       <tbody>
                                            
                            @foreach( $products as $product )
                               <tr class="gradeC" style="font-family: b koodak;">
                               <td style="text-align: center;"> {{ getproname($product->products_id) }} </td>
                               <td style="text-align: center;"> {{ $product->count }}  </td>
                                @if($product->description =='')
                                  <td style="text-align: center; font-family: b nazanin;"> <span style="font-family: b nazanin; color: red;">توضیحی ثبت نشده است</span> </td>
                                @else
                                  <td style="text-align: center; font-family: b nazanin;"> {{ $product->description }}</td>
                                @endif                                                                       
                                </tr>
                            @endforeach 
                       </tbody>
                    </table>
                    <hr>

                    <!-- Start of Details -->
                                 <div class="table-responsive">
                                 <br>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr style="font-family: b koodak;">
                                                <th style="text-align: right;"> جزئیات این درخواست </th>       
                                            </tr>
                                        </thead>                                        
                                    </table>

                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        
                                        <tbody>                                         
                                            <tr class="gradeC" style="font-family: b koodak;">
                                                <td style="text-align: justify; direction: rtl; font-family: b nazanin; font-weight: bold; width: 150px;">تاریخ ثبت درخواست</td> 
                                                <td style="text-align: center; font-family: b nazanin;">{{ jdate($requests->created_at)->format('%B %d، %Y') }} </td>  
                                                        
                                                 <td style="text-align: justify; direction: rtl; font-family: b nazanin;  font-weight: bold; width: 120px;"> وضعیت تأیید نهایی</td>  
                                                @if( $requests->confirm == '0' )
                                                        <td style="text-align: center; color: red;">ثبت نهایی نشده است</td>
                                                @elseif( $requests->confirm == '1' )
                                                        <td style="color: green;text-align: center;"> ثبت نهایی شده است </td>
                                                @endif 
                                            </tr>

                                            <tr class="gradeC" style="font-family: b nazanin;">
                                                <td style="text-align: justify; direction: rtl; font-family: b nazanin;  font-weight: bold;"> وضعیت درخواست</td>                                        

                                                    @if( $requests->state_req == '0' )
                                                        <td style="color: black;text-align: center;"> تازه ثبت شده </td>
                                                    @elseif( $requests->state_req == '1' )
                                                        <td style="color: black;text-align: center;"> تأییدشده توسط مسئول واحد </td>
                                                    @elseif( $requests->state_req == '2' )
                                                        <td style="color: black;text-align: center;"> دریافت مجوز تأیید کننده  </td>
                                                    @elseif( $requests->state_req == '3' )
                                                        <td style="color: black;text-align: center;"> تأیید شده توسط مسئول اعتبار </td>
                                                    @elseif( $requests->state_req == '4' )
                                                        <td style="color: black;text-align: center;"> تأییدشده توسط امور مالی </td>
                                                    @elseif( $requests->state_req == '5' )
                                                        <td style="color: black;text-align: center;"> دریافت مجوز تصویب کننده </td>
                                                    @elseif( $requests->state_req == '7' )
                                                        <td style="color: black;background: red; text-align: center;"> هنوز ثبت نهایی نشده است </td>
                                                    @endif 

                                                    <td style="text-align: justify; direction: rtl; font-family: b nazanin;  font-weight: bold;">انصراف از درخواست</td>
                                                     @if($requests->cancel == '1')                               
                                                   <td style="text-align: center;"><span style="color: red; font-weight: bold;">انصراف داده شده است</span></td>
                                                    @else                                                   
                                                    <td style="text-align: center;"><span style="color: black;">انصراف داده نشده است</span></td>
                                                    @endif 
                                                                                                          
                                            </tr>

                                            <tr class="gradeC" style="font-family: b nazanin;">
                                            <td style="text-align: justify; direction: rtl; font-family b nazanin;  font-weight: bold;">تاریخ انصراف</td>  

                                             @if($requests->cancel == '1')                               
                                                <td style="text-align: center;">{{ jdate($requests->cancel_date)->format('%B %d، %Y') }}</td>
                                             @else                                                   
                                                <td style="text-align: center;"><span style="color: black; font-weight: bold;">------</span></td>
                                             @endif 

                                            <td style="text-align: justify; direction: rtl; font-family: b nazanin; font-weight: bold;">تأیید انصراف</td> 
                                            @if($requests->cancel_confirm == '1')                          
                                                   <td style="text-align: center;">با انصراف شما موافقت شده است</td>
                                                    @else                                                   
                                                    <td style="text-align: center;"><span style="color: red; font-weight: bold;">انصراف شما رد شده است</span></td>
                                                    @endif                                             
                                                                               
                                            </tr>

                                            <tr class="gradeC" style="font-family: b nazanin;">

                                            <td style="text-align: justify; direction: rtl; font-family: b nazanin;  font-weight: bold;">تاریخ تأیید انصراف</td>  
                                                 
                                            @if($requests->cancel_confirm == '1')                               
                                             <td style="text-align: center;">{{ jdate($requests->cancel_confirm_date)->format('%B %d، %Y') }}</td>
                                            @else                                                   
                                             <td style="text-align: center;"><span style="font-weight: bold;">------</span></td>
                                            @endif  

                                            <td style="text-align: justify; direction: rtl; font-family: b nazanin;  font-weight: bold;">تاریخ رد انصراف</td> 
                                            @if($requests->cancel_confirm == '2')                               
                                                   <td style="text-align: center;">{{ jdate($requests->cancel_reject_date)->format('%B %d، %Y') }}</td>
                                            @elseif($requests->cancel_confirm == '1')                                                   
                                                    <td style="text-align: center;"><span style="font-weight: bold;">------</span></td>
                                              @elseif($requests->cancel_confirm == '0')                                                   
                                                    <td style="text-align: center;"><span style="font-weight: bold;">------</span></td>
                                                    @endif                                                  
                                            </tr>

                                            <tr class="gradeC" style="font-family: b nazanin;">
                                                <td style="text-align: justify; direction: rtl; font-family: b nazanin;  font-weight: bold;">رد درخواست</td>   
                                                @if($requests->reject == '1')                               
                                                   <td style="text-align: center; background-color: red; font-weight: bold;">این درخواست رد شده است</td>
                                                    @else                                                   
                                                    <td style="text-align: center; background-color: green; font-weight: bold;"><span style="color: black;">درخواست رد نشده و در حال بررسی است</span></td>
                                                    @endif     
                                               <td style="text-align: justify; direction: rtl; font-family: b nazanin;  font-weight: bold;">تاریخ رد درخواست</td>
                                                @if($requests->reject == '1')                               
                                                   <td style="text-align: center;">{{ jdate($requests->reject_date)->format('%B %d، %Y') }}</td>
                                                    @else                                                   
                                                    <td style="text-align: center; font-weight: bold;"><span style="color: black;">------</span></td>
                                                    @endif                                                  

                                            </tr>

                                            <tr class="gradeC" style="font-family: b nazanin;">

                                               <td style="text-align: justify; direction: rtl; font-family: b nazanin;  font-weight: bold;">واحد رد کننده درخواست</td>                                               
                                                @if( $requests->reject_code == '0' )
                                                        <td style="color: black;text-align: center;">-----</td>
                                                    @elseif( $requests->state_req == '1' )
                                                        <td style="color: black;text-align: center;"> مسئول تدارکات، این درخواست را رد کرده است</td>                                              
                                                    @elseif( $requests->state_req == '2' )
                                                        <td style="color: black;text-align: center;">تأیید کننده ، این درخواست را رد کرده است</td>
                                                    @elseif( $requests->state_req == '3' )
                                                        <td style="color: black;text-align: center;">مسئول اعتبار ، این درخواست را رد کرده است</td>
                                                    @elseif( $requests->state_req == '4' )
                                                        <td style="color: black;text-align: center;">مدیر امور مالی ، این درخواست را رد کرده است</td>
                                                    @elseif( $requests->state_req == '5' )
                                                        <td style="color: black;text-align: center;">تصویب کننده، این درخواست را رد کرده است</td>
                                                    @elseif( $requests->state_req == '6' )
                                                        <td style="color: black;background: red; text-align: center;">این درخواست رد نشده و تأییدیه نهایی را اخذ نموده است</td>
                                                    @endif     
                                                    
                                                <td style="text-align: justify; direction: rtl; font-family: b nazanin;  font-weight: bold;">دلیل رد درخواست</td> 
                                                @if( $requests->reject_code == '0' )
                                                        <td style="color: black;text-align: center;">-----</td>
                                                    @else
                                                    <td style="color: black;text-align: center;">{{ $requests->reject_desc }}</td>
                                                    @endif   

                                            </tr>
                                        </tbody>
                                    </table>
                                 </div>
                            <!-- End of Details -->      
                </div>               
            </div>

        </div>
    </div>
</div>

@endsection

<?php
use App\Product;

function getproname($id)
{
  $products = Product::where('id' , $id)->first()['name'];
  return $products;
}
?>