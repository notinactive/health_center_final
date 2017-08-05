@extends('layouts.clientLayouts')

@section('statistics')
	   <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">لیست تیکت های دیده نشده</div>                                
                            </div>

                            <div class="block-content collapse in">
                           
                           <div class="span3">
                                
                            </div>
                            <div class="span3">
                                <a href="{{ route('notseen') }}" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">جزئیات تیکت های دیده نشده</a>
                            </div>
                            <div class="span6">
                                    <div class="chart" data-percent="{{ $notseen }}">{{ $notseen }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><span style="color: white;">تیکت های دیده نشده</span></span>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <br />

                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">لیست تیکت های پاسخ داده شده</div>                                
                            </div>
                            <div class="block-content collapse in">
                            <div class="span3">
                              
                            </div>
                            <div class="span3">
                                <a href="{{ route('answer') }}" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">جزئیات تیکت های پاسخ داده شده</a>
                            </div>
                            <div class="span6">
                                    <div class="chart" data-percent="{{ $answer }}">{{ $answer }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><span style="color: white;">تیکت های پاسخ داده شده</span></span>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <br />

                             <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">لست تیکت های پاسخ داده نشده</div>                                
                            </div>
                            <div class="block-content collapse in">
                            <div class="span3">
                                
                            </div>
                            <div class="span3">
                                <a href="{{ route('notanswer') }}" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">جزئیات تیکت های پاسخ داده نشده</a>
                            </div>
                            <div class="span6">
                                    <div class="chart" data-percent="{{ $notanswer }}">{{ $notanswer }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><span style="color: white;">تیکت های پاسخ داده نشده</span></span>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <br />

                        </div>

                        <div class="form-actions" style="text-align:center;margin-bottom:80px;">
                           <a href="<?=Url('client/index'); ?>" class="btn btn-danger btn-sm" style="font-family: b koodak;">بازگشت به صفحه داشبورد</a>
                        </div>
@endsection
