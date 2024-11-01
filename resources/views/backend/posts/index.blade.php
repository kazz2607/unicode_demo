@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-10">{{ $meta['title'] }}</div>
            <div class="col-sm-2 text-end">
                <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">Create Post</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="" method="GET" class="mb-3">
            <div class="row">
                <div class="col-3">
                    <select name="status" class="form-select">
                        <option value="0">Trạng thái</option>
                        <option value="active" {{ request()->status == 'active' ? 'selected':false }}>Kích hoạt</option>
                        <option value="inactive" {{ request()->status == 'inactive' ? 'selected':false }} >Chưa kích hoạt</option>
                    </select>
                </div>
                <div class="col-3">
                    <select name="group_id" class="form-select">
                        <option value="0">Chuyên mục</option>
                        {{-- @if (!(getAllGroup()->isEmpty()))
                            @foreach (getAllGroup() as $item)
                                <option value="{{ $item->id }}" {{ request()->group_id == $item->id ? 'selected':false }} >{{ $item->name }}</option>
                            @endforeach
                        @endif --}}
                    </select>
                </div>
                <div class="col-3">
                    <input type="search" name="keyword" class="form-control" placeholder="Tìm kiếm thành viên..." value="{{ request()->keyword }}">
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
        <form action="{{ route('posts.delete-any') }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xoá ?')">
            @csrf
            <div class="top row mb-2">
                <div class="col">
                    <button type="submit" class="btn btn-danger btn-sm">Xoá (0)</button>
                </div>
            </div>
            <table class="table table-striped" id="myTable">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" name="checkAll" id="checkAll"></th>
                    <th scope="col">STT</th>
                    <th scope="col"><a href="#" class="title">{{ __('Title') }}</a></th>
                    <th scope="col"><a href="#" class="title">{{ __('Category') }}</a></th>
                    <th scope="col"><a href="#" class="title">{{ __('Status') }}</a></th>
                    <th scope="col"><a href="#" class="title">{{ __('Date Created') }}</a></th>
                    <th scope="col">{{ __('Edit') }}</th>
                    <th scope="col">{{ __('Delete') }}</th>
                </tr>
                </thead>
                <tbody>
                    @php
                    //dd($list);
                    @endphp
                    @if (count($list) > 0)
                        @foreach ($list as $key => $item)
                            <tr>
                                <th scope="row"><input type="checkbox" name="delete[]" value="{{ $item->id }}"></th>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $item->title }}</td>
                                <td>Category</td>
                                <td>{!! $item->status == 0 ? '<button class="btn btn-danger btn-sm">Chưa kích hoạt</button>':'<button class="btn btn-success btn-sm">Kích hoạt</button>' !!}</td>
                                <td>{{ $item->create_at }}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $item->id )}}">{{ __('Edit') }}</a></td>
                                <td><a onclick="return confirm('Are you sure delete?')" class="btn btn-danger btn-sm" href="{{ route('posts.delete', $item->id )}}">{{ __('Delete') }}</a></td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="8" class="text-center">{{ __('Không có dữ liệu') }}</td>
                            </tr>
                    @endif
                </tbody>
            </table>
            <div class="paginate d-flex justify-content-md-center">
                {{-- {{ $list->links(); }} --}}
            </div>
            
        </form>
    </div>
</div>
@endsection