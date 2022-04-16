@extends('admin.layouts.adminpage')
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Information</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/infor">infor</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
	<div class="mt-3">
	{{ Form::open(array('action' => array('infoController@update',$inforedit['infoID']),'method'=>'put','enctype'=>'multipart/form-data')) }}
			<div class="row">
				<div class="col">
					<label class="form-label">Mail:</label>
					<input type="email" value="{{$inforedit['email']}}" class="form-control" name="txt_mail" placeholder="Maill" required>
				</div>
				<div class="col">
					<label class="form-label">Text:</label>
					<input type="text" value="{{$inforedit['infortext']}}" class="form-control" name="txt_text" placeholder="Text" required>
				</div>
				<div class="col">
					<label class="form-label">Phone Number:</label>
					<input type="text" value="{{$inforedit['moblienumber']}}" class="form-control" name="txt_pnumber" placeholder="Phone Number" required>
				</div>
				<div class="col">
					<label class="form-label">City:</label>
					<input type="text"  value="{{$inforedit['incity']}}" class="form-control" name="txt_city" placeholder="City" required>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col">
					<label class="form-label">Address:</label>
					<textarea rows="5" value="{{$inforedit['inaddress']}}" class="form-control" name="txt_address" required placeholder="Address">{{$inforedit['inaddress']}}</textarea>
				</div>
				<div class="col">
					<label class="form-label">Link Map:</label>
					<textarea rows="5" class="form-control" name="txt_map" required placeholder="Link Map">{{$inforedit['linkmap']}}
					</textarea>
				</div>
			</div>
			<div class="mt-3">
				<button type="submit" class="btn btn-primary w-25" >Update</button>
				<a href="/infor" class="btn btn-dark w-25">Back</a>
			</div>
            {{ Form::close() }}
		<div class="mt-3">
			<table class="table table-primary" style="font-size: 12px">
				<thead class="text-center bg-primary text-white">
					<th>#ID</th>
					<th>Mail</th>
					<th>Text</th>
					<th>Mobile</th>
					<th>City</th>
					<th>Address</th>
					<th>Active</th>
					<th>Action</th>
				</thead>
				<tbody style="font-size: 10px">
                    @foreach($infor as $infors)
					<tr>
						<td>{{$infors['infoID']}}</td>
						<td>{{$infors['email']}}</td>
						<td>{{$infors['infortext']}}</td>
						<td>{{$infors['moblienumber']}}</td>
						<td>{{$infors['incity']}}</td>
						<td>{{$infors['inaddress']}}</td>
						<td class="text-center">
							<a href="{{route('infor.endisable',['id'=>$infors['infoID']])}}">
								@if($infors['instatus'] == 1)
									<box-icon name='show-alt'></box-icon>
								@else
                                    <box-icon name='hide'></box-icon>
                                @endif
							</a>
						</td>
						<td>
                            <a href="#">
                                <box-icon name='edit-alt'></box-icon>
                            </a>
                            <a href="#">
                            <box-icon name='trash' type='solid' ></box-icon>
                            </a>
                        </td>
					</tr>
                    @endforeach
				</tbody>
			</table>
		</div>
	</div>
            </div>
@endsection