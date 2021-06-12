@extends('layouts.app')
@section('title' ,'إضافة معدة حالية')
@section('content')
<div class="container rounded bg-white mt-2 mb-0">
    <form  action="{{ url('equipments') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row text-right">
        <div class="col-md-3 border-left">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <input type="file"  name="pic[]" class="custom-file" id="mySelect" >
                <br>
                <div class="imgsView"></div>
                <div class="inputsHidden"></div>
                @error('pic')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror</div>
        </div>
        <div class="col-md-5 border-left">
            <div class="p-3 py-5">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-center">إضافة معدة حالية</h4>
                </div>
                <div class="row mt-2 ">
                    <div class="col-md-6"><label class="labels">كود المعدة</label>
                        <input type="text"  name="code" class="form-control" value="{{ old('code') }}" placeholder="كود المعدة" >
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-md-6"><label class="labels">السعة / القدرة</label>
                        <input type="text" name="power"  class="form-control" value="{{ old('power') }}" placeholder="السعة / القدرة" >
                        @error('power')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">اسم المعدة</label>
                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="اسم المعدة">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <select  name="group" class="group form-control">
                                <option  value="" disabled selected>أختر المجموعة </option>
                                @foreach($groups as $group)
                                <option  value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                        </select>
                        @error('group')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        <select   name="status" class="form-control status">
                                <option  value="" disabled selected>أختر الحالة الفنية</option>
                                @foreach($statuses as $status)
                                <option  value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        <select name="company" class="company form-control">
                                <option  value="" disabled selected>أختر الشركة </option>
                                @foreach($companies as $company)
                                <option  value="{{$company->id}}">{{$company->name_ar}}</option>
                                @endforeach
                        </select>
                        <div class="results">

                        </div>
                        @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-3">
                <div class="col-md-12">
                    <select name="site" class="site form-control">
                            <option  value="" disabled selected>أختر  الموقع </option>
                            @foreach($sites as $site)
                            <option  value="{{$site->id}}">{{$site->name}}</option>
                            @endforeach
                    </select>
                    @error('site')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <hr>
                    <div class="col-md-12"><label class="labels">الملكية</label>
                        @if ($ownerships->count())
                        @foreach ($ownerships as $ownership )
                        <div class="form-check">
                            <input class="form-check-input"   type="radio" @if( old('ownership')== $ownership->id) checked @endif value="{{ $ownership->id }}" name="ownership" id="flexRadioDefault1">
                            <label class="form-check-label mr-10" for="flexRadioDefault1">
                                {{ $ownership->name }}
                            </label>
                        </div>
                        @endforeach
                        @endif
                        @error('ownership')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <hr>
                    <div class="col-md-12"><label class="labels">تاريخ التعاقد</label>
                        <input type="date"  name ='ownership_date' class="form-control" value="{{ old('ownership_date') }}">
                        @error('ownership_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12"><label class="labels">تفاصيل أخرى</label>
                        <input type="text" class="form-control" value="{{ old('notes') }}"  name="notes" placeholder="تفاصيل أخرى" value="">
                    </div>
            </div>
            <div class="mt-2 text-center"><button class="btn btn-primary profile-button" type="submit">حفظ البيانات</button></div>

        </div>
    </div>

</form>
</div>
</div>
</div>

<script src="{{ asset('js/img.js') }}" ></script>
<script>
    $('.status').select2();
    $('.group').select2();
    $('.company').select2();
    $('.site').select2();
</script>

@endsection
