@extends('admin.layouts.adminpage')
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">List Products</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/listproducts">List Products</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                @if($message = Session::get('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success!</strong> {{$message}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
				@endif
                {{ Form::open(array('enctype'=>'multipart/form-data')) }}
                {{form::close()}}
					<table id="plist" class="table table-success">
						<thead class="bg-success text-white text-center">
							<th>#ID</th>	
							<th>Image</th>	
							<th>Name</th>	
							<th>Category</th>	
							<th>Quantity</th>	
							<th>Price</th>	
							<th>Discount</th>	
							<th>Description</th>
                            <th>Like</th>	
							<th>Action</th>	
						</thead>
						<tbody>
                            @foreach($listpro as $listpros)
							<tr>
								<td>{{$listpros['proID']}}</td>
                                <td>
                                    <img class="rounded img-thumbnail" src="{{URL::asset('img/images/thumbnail/'.$listpros['imgname'])}}">
                                </td>
                                <td>{{$listpros['name']}}</td>
                                <td>{{$listpros['catename']}}</td>
                                <td>{{$listpros['qty']}}</td>
                                <td>${{$listpros['price']}}</td>
                                <td>${{$listpros['disc']}}</td>
                                <td>{{$listpros['desc']}}</td>
                                <td>{{$listpros['liker']}}</td>
                                <td>
                                <a href="{{route('listproducts.edit',['id'=>$listpros['proID']])}}">
									<box-icon name='edit-alt'></box-icon>
								</a>
								<a href="#">
									<box-icon name='trash' type='solid' data-toggle="modal" data-target="#Modal{{$listpros['proID']}}"></box-icon>
								</a>
                                </td>
							</tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="Modal{{$listpros['proID']}}" tabindex="-1" role="dialog" aria-labelledby="Modal{{$listpros['proID']}}" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content alert-warning">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="Modal{{$listpros['proID']}}"><strong>Your Message</strong></h3>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to delete this record ?
                                            </div>
                                            <div class="modal-footer">
                                               
                                                {{form::open(['method'=>'DELETE','route'=>['listproducts.destroy',$listpros['proID']]])}}
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
                    {{$listpro->links('pagination::bootstrap-4')}}
                </div>
            </div>
</script>
@endsection