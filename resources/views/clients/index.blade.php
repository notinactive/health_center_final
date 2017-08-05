@extends('layouts.clientLayouts')

@section('statistics')
	               <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">آمار و تحلیل درخواست های کالا و خدمات</div>
                                <div class="pull-left"><a href="<?=Url('client/details'); ?>" class="badge badge-warning" style="font-family: b koodak;">مشاهده جزئیات</a>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
                                    <div class="chart" data-percent="{{ $final }}">{{ $final }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های نهایی شده</a></span>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="{{ $reject }}">{{ $reject }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های رد شده</a></span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="{{ $confirm }}">{{ $confirm }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های تأیید شده</a></span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="{{ $process }}">{{ $process }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های در حال بررسی</a></span>

                                    </div>
                                </div>
                            </div>
                        </div>
@endsection

@section('statistics2')
                   <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">آمار و تحلیل تیکت ها</div>
                                <div class="pull-left"><a href="<?=Url('client/ticket_details'); ?>" class="badge badge-warning" style="font-family: b koodak;">مشاهده جزئیات</a>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $notseen }}">{{ $notseen }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">تیکت های دیده نشده توسط تدارکات</a></span>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $notanswer }}">{{ $notanswer }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">تیکت های پاسخ داده نشده</a></span>

                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $answer }}">{{ $answer }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">تیکت های پاسخ داده شده</a></span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
@endsection

@section('statistics3')
                   <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">آمار و تحلیل درخواست های انصرافی</div>
                                <div class="pull-left"><a href="<?=Url('client/cancel_details'); ?>" class="badge badge-warning" style="font-family: b koodak;">مشاهده جزئیات</a>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $current }}">{{ $current }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های انصراف بلاتکلیف</a></span>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $cancel_confirm }}">{{ $cancel_confirm }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های انصراف تأیید شده</a></span>

                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $reject }}">{{ $reject }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های انصراف رد شده</a></span>

                                    </div>
                                </div>
                               
                            </div>
                        </div>
@endsection


