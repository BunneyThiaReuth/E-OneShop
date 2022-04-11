@extends('admin.layouts.adminpage')
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Create Category</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/category">Category</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
</div>
<div class="mt-2 container-fluid">
<!-- ADD Form -->
        <div>
            {{ Form::open(array('action' => array('categoryController@update',$catforedit['cateID']),'method'=>'put','enctype'=>'multipart/form-data')) }}
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        {{Form::label('txtcateName','Name:')}}
                        {{Form::text('txtcateName', $catforedit['name'], array('class' => 'form-control','required'))}}
                        </div>
                    <div class="col">
                        {{Form::label('txtstatus','Status:')}}
                        {{Form::select('txtstatus', array(
                            '1'=>'Enable',
                            '0'=>'Disable'), $catforedit['status'], ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="mt-4">
                    {{Form::label('txtdesc','Description:')}}
                    {!! Form::textarea('txtdesc',$catforedit['description'], array('class'=>'form-control', 
                    'rows' => 5, 'cols' => 50)) !!}
                </div>
                <div class="mt-5">
                    {!! Form::submit('Update', array('class' => 'btn btn-primary w-25')) !!}
                    <a href="/category" class="btn btn-dark w-25">Back</a>
                </div>
            </div>
        {{ Form::close() }}
        </div>
    <!-- Table List -->
    <div>
            <table class="table table-hover table-primary">
                <thead class="bg-primary text-white">
                    <th class="text-center">#ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="text-center">
                            {{$category['cateID']}}
                        </td>
                        <td>
                            {{$category['name']}}
                        </td>
                        <td>
                            {{$category['description']}}
                        </td>
                        <td class="text-center">
                            <a href="{{route('category.endisable',['id'=>$category['cateID']])}}">
                            @if($category['status'] == 1)
                                    <box-icon type='solid' name='show'></box-icon>
                            @else
                                    <box-icon name='hide' type='solid' ></box-icon>
                            @endif
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('category.edit',['id'=>$category['cateID']])}}">
                                <box-icon name='edit' data-toggle="modal"></box-icon>
                            </a>
                            <a href="#">
                                <box-icon type='solid' name='trash' data-toggle="modal" data-target="#Modal{{$category['cateID']}}"></box-icon>
                            </a>
                        </td>
                    </tr>
                    	<!-- Delete Modal -->
                        <div class="modal fade" id="Modal{{$category['cateID']}}" tabindex="-1" role="dialog" aria-labelledby="Modal{{$category['cateID']}}" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content alert-warning">
									<div class="modal-header">
										<h3 class="modal-title" id="Modal{{$category['cateID']}}"><strong>Your Message</strong></h3>
									</div>
									<div class="modal-body">
										Do you want to delete this record ?
									</div>
									<div class="modal-footer">
										
                                        {{form::open(['method'=>'DELETE','route'=>['category.destroy',$category['cateID']]])}}
                                            {{form::button('Yes',['type'=>'submit','class'=>'btn btn-primary w-25'])}}
                                        {{form::close()}}
										<button type="button" class="btn btn-secondary w-25" data-dismiss="modal">No</button>
									</div>
                                </div>
                            </div>
                        </div>
                @endforeach
                </tbody>
            </table>
            {{$categories->links('pagination::bootstrap-4')}}
        </div>
</div>
@endsection 