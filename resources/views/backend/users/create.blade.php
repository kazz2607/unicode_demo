@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ $meta['title'] }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="row">
                <div class="col-9">
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label text-md-right">Họ tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Vui lòng nhập họ tên..." value="{{old('name') }}">
                            @error('name')
                                <span class="alert" style="color: red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label text-md-right">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" placeholder="Vui lòng nhập email..." value="{{old('email')}}">
                            @error('email')
                                <span class="alert" style="color: red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label text-md-right">Nhóm quản trị</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="group_id" >
                                <option value="0" selected>Chọn nhóm người dùng</option>
                                @if (!empty($groups))
                                    @foreach ($groups as $item)
                                        <option value="{{ $item->id }}" {{old('group_id') == $item->id ? 'selected':false}}  >{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('group_id')
                                <span class="alert" style="color: red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">Kích hoạt thành viên</div>
                        <div class="card-body">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="1" {{old('status') == '1' ? 'checked':'checked'}}>
                                <label class="form-check-label">Kích hoạt</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="0" {{old('status') == '0' ? 'checked':false}}>
                                <label class="form-check-label">Chưa kích hoạt</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
