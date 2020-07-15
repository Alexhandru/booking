@extends('admin/includes.layout')
@section('content')


				 <!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    Blogs
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Blogs</li>
                            <li><a href="">Blogs List</a></li>
                        </ul>
                        <!-- END Datatables Header -->

                        <!-- Datatables Content -->
                        <div class="block full">
                             <div class="block-title">
                             @if (session('confirm'))
                             <div class="alert alert-success text-center"> {{ session('confirm') }} </div>
                            @endif
                             @if (session('error'))
                             <div class="alert alert-danger text-center"> {{ session('error') }} </div>
                            @endif
                                <h4>
                            @if (session('message'))
                                    <h4 class="alert alert-danger text-left"> {{ session('message') }} </h4>
                            @endif
                                </h4> 
                            </div>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center"><i class="gi gi-user"></i></th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Status</th>
                                            <th>Registred Date</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $teams)
                                        <tr>
                                            <td class="text-center">{{$teams->id}}</td>
                                            <td class="text-center">
                                            @if($teams->image)
                                            <img src="/assets/img/teams/{{$teams->image}}" alt="avatar" class="" width="50px">
                                            @else
                                                <img src="{{ url('/assets/img/placeholders/avatars/avatar15.jpg') }}" alt="avatar" class="img-circle" width="30px">
                                            @endif 

                                            </td>
                                            <td><a href="">{{ $teams->name }}</a></td>
                                            <td>{{ $teams->designation }}</td>
                                            <td>@if($teams->author == 1) Admin @else User @endif  </td>

                                            @if($teams->status == 'Active')
                                                <td><span class="label label-info">Active</span></td>
                                             @else
                                                <td><span class="label label-danger">Inactive</span></td>
                                            @endif 
                                            
                                            <td><span>{{ date('M, D-Y',strtotime($teams->created_at)) }}</span></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="/admin/enable-disable-team/{{ $teams->id }}" data-toggle="tooltip" title="Enable/Disable" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                    <a href="/admin/update-team/{{ $teams->id }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                    <a href="/admin/delete-team/{{ $teams->id }}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->
		@endsection
		