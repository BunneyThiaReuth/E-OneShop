@extends('admin.layouts.adminpage')
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Discount</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/discount">discount</a>
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
		@elseif($message = Session::get('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Success!</strong> {{$message}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		@endif
		{{ Form::open(array('action' => 'discountController@store','enctype'=>'multipart/form-data')) }}
			<div class="row">
				<div class="col">
					<label class="form-lable">Start Date:</label>
					<input type="date" class="form-control" name="txt_stDate" required>
				</div>
				<div class="col">
					<label class="form-lable">End Date:</label>
					<input type="date" class="form-control" name="txt_endDate" required>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col">
					<label class="form-lable">Name :</label>
					<input type="text" class="form-control" name="txt_name" placeholder="Enter name" required>
				</div>
				<div class="col">
					<label class="form-lable">Discount Perent$ :</label>
					<input type="text" class="form-control" name="txt_disperent" placeholder="Enter discount perent" required>
				</div>
				<div class="col">
					<label class="form-lable">Status :</label>
					<select class="form-control" name="txt_status" required>
						<option value="1">Enable</option>
						<option value="0">Disable</option>
					</select>
				</div>
			</div>
			<div class="mt-2">
				<label class="form-lable">Description :</label>
				<textarea rows="5" name="txt_desc" class="form-control" placeholder="Enter description" required></textarea>
			</div>
			<div class="mt-3">
				<button type="submit" class="btn btn-success w-25">Save</button>
				<button type="reset" class="btn btn-dark w-25">Clear</button>
			</div>
		{{ Form::close() }}
		</div>
		<div class="mt-3">
			<table class="table table-warning">
				<thead class="bg-warning text-center">
					<th>#ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Discount Perent</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
				@foreach($dicount as $dicounts)
					<tr>
						<td>{{$dicounts['discountID']}}</td>
						<td>{{$dicounts['name']}}</td>
						<td>{{$dicounts['description']}}</td>
						<td>${{$dicounts['discountPerent']}}</td>
						<td>{{$dicounts['startDate']}}</td>
						<td>{{$dicounts['endDate']}}</td>
						<td>
							<a href="{{route('discount.endisable',['id'=>$dicounts['discountID']])}}">
							@if($dicounts['status']==1)
								<box-icon name='show' type='solid' ></box-icon>
							@elseif($dicounts['status']==0)
								<box-icon name='hide' type='solid' ></box-icon>
							</a>
							@endif
						</td>
						<td>
							<a href="{{route('discount.edit',['id'=>$dicounts['discountID']])}}">
								<box-icon name='edit' data-toggle="modal"></box-icon>
							</a>
							<a href="#">
								<box-icon type='solid' name='trash' data-toggle="modal" data-target="#Modal{{$dicounts['discountID']}}"></box-icon>
							</a>
						</td>
					</tr>
					<!-- Delete Modal -->
					<div class="modal fade" id="Modal{{$dicounts['discountID']}}" tabindex="-1" role="dialog" aria-labelledby="Modal{{$dicounts['discountID']}}" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content alert-warning">
									<div class="modal-header">
										<h3 class="modal-title" id="Modal{{$dicounts['discountID']}}"><strong>Your Message</strong></h3>
									</div>
									<div class="modal-body">
										Do you want to delete this record ?
									</div>
									<div class="modal-footer">
										
                                        {{form::open(['method'=>'DELETE','route'=>['discount.destroy',$dicounts['discountID']]])}}
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
			{{$dicount->links('pagination::bootstrap-4')}}
		</div>
            </div>
@endsection