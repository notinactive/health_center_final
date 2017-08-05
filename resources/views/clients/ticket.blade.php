@extends('layouts.clientLayouts')

@section('top_menu')
         <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    
                    <div class="nav-collapse collapse">                       
                        <ul class="nav pull-right">

                            <a class="brand pull-right btn btn-info btn-sm" style="font-family: b koodak; margin-bottom: 5px;">پنل کاربری</a>

                        </ul>

                         <ul class="nav pull-left">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" style="font-family: b koodak; cursor: pointer;"><i class="icon-user"></i> نام کاربری <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                     <a tabindex="-1" href="login.html" style="font-family: b koodak;">خروج</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
@endsection

@section('statistics')
	               <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">ثبت تیکت جدید</div>
                                <div class="pull-left"><a href="<?=Url('client/ticket_show'); ?>" class="badge badge-warning" style="font-family: b koodak;">مشاهده همه تیکت ها</a>
                                </div>
                            </div>
                            @if($errors -> has('title'))
                            <div class="panel-body">
                                <div class="alert alert-danger alert-dismissable" style="font-family: b nazanin; text-align: right;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!! $errors->first('title') !!}                        
                                </div>
                            </div>
                            @endif 

                            @if($errors -> has('content'))
                            <div class="panel-body">
                                <div class="alert alert-danger alert-dismissable" style="font-family: b nazanin; text-align: right;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!! $errors->first('content') !!}                        
                                </div>
                            </div>
                            @endif 
                            <div class="block-content collapse in" style="text-align: center;">
                              <div class="panel-body">
                                <form action="{{ route('ticket.store') }}" method="POST">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="table-responsive">                             
                                  
                                    <div class="form-group">                                        
                                        <div class="col-lg-7" style="text-align: right;">
                                          <label for="name" class="control-label col-lg-3" style="font-family: b koodak; text-align: right;">اولویت تیکت</label>
                                            <select type="text" name="olaviat" style="font-family: b nazanin; text-align: right;" id="olaviat" class="form-control">
                                                <option value="0">------</option>
                                                <option value="1">اولویت کم</option>
                                                <option value="2">اولویت متوسط</option>
                                                <option value="3">اولویت زیاد</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <div class="col-lg-7" style="text-align: right;">
                                          <label for="name" class="control-label col-lg-3" style="font-family: b koodak; text-align: right;">عنوان تیکت</label>
                                            <input type="text" name="title" style="font-family: b nazanin; text-align: right;" id="title" class="form-control" placeholder="عنوان تیکت را وارد نمائید" value="{{ old('title') }}"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="control-label col-lg-3" style="font-family: b koodak; text-align: right;">متن تیکت</label>
                                        <div class="col-lg-5">
                                            <textarea name="content" class="ckeditor" id="content" placeholder="توضیحات تیکت را وارد نمائید">{{ old('content') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-actions" style="text-align:center;margin-bottom:80px; font-family: b koodak;">
                                       <a href="{{ route('ticket_show') }}" class="btn btn-danger btn-sm" style="text-align: right;">مشاهده لیست تیکت ها</a>

                                        <input type="submit" name="save_pro"style="font-family: b koodak;" id="save_pro" class="btn btn-primary btn-md" value="ثبت تیکت" />                                   
                                    </div>

                                </div>

                            </form> 
                              </div>
                          </div>
                        </div>
@endsection

@section('script')
 <script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection
