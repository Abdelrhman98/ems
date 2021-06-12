@extends('layouts.app')
@section('title' ,'الصلاحبات')
@section('content')
<div class="container bg-white">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <table class="col-md-12 table table-bordered table-primary" id="users">
                <thead class="thead-">
                  <tr>
                    <th scope="col">الاسم</th>
                    <th scope="col">اسم الدخول</th>
                    <th scope="col">الايميل</th>
                    <th scope="col">الأدوات</th>
                  </tr>
                </thead>
                <tbody class="tbody-white">
                    @foreach ($users as $user )
                    <tr>
                        <th scope="row">{{ $user->name }}</th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@mdo</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div> 
<script>
   
    $('#users').dataTable({});
</script>
@endsection