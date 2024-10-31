@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-10">{{ $meta['title'] }}</div>
            <div class="col-sm-2 text-end">
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">Create User</a>
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
                        <option value="0">Nhóm người dùng</option>
                        @if (!(getAllGroup()->isEmpty()))
                            @foreach (getAllGroup() as $item)
                                <option value="{{ $item->id }}" {{ request()->group_id == $item->id ? 'selected':false }} >{{ $item->name }}</option>
                            @endforeach
                        @endif
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

        <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col"><a href="?sort_by=name&sort_type={{ $sort['sort_type'] }}" class="title">{{ __('Name') }}</a></th>
                <th scope="col"><a href="?sort_by=email&sort_type={{ $sort['sort_type']}}" class="title">{{ __('Email') }}</a></th>
                <th scope="col"><a href="?sort_by=group_id&sort_type={{ $sort['sort_type'] }}" class="title">{{ __('Group') }}</a></th>
                <th scope="col"><a href="?sort_by=status&sort_type={{ $sort['sort_type']}}" class="title">{{ __('Status') }}</a></th>
                <th scope="col"><a href="?sort_by=create_at&sort_type={{ $sort['sort_type'] }}" class="title">{{ __('Date Created') }}</a></th>
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
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->group_name }}</td>
                            <td>{!! $item->status == 0 ? '<button class="btn btn-danger btn-sm">Chưa kích hoạt</button>':'<button class="btn btn-success btn-sm">Kích hoạt</button>' !!}</td>
                            <td>{{ $item->create_at }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ route('users.edit', $item->id )}}">{{ __('Edit') }}</a></td>
                            <td><a onclick="return confirm('Are you sure delete?')" class="btn btn-danger btn-sm" href="{{ route('users.delete', $item->id )}}">{{ __('Delete') }}</a></td>
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
            {{ $list->links(); }}
          </div>
    </div>
</div>
@endsection