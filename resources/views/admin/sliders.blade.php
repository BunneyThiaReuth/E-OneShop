@extends('admin.layouts.adminpage')
@section('content')
<?php
    $servname = "localhost";
    $user = "root";
    $pass = "";
    $db = "eoneshop";
	$conn = mysqli_connect($servname,$user,$pass,$db);
?>
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Sliders</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/sliders">Sliders</a>
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
            {{ Form::open(array('action' => 'sliderController@store','enctype'=>'multipart/form-data')) }}
            <div class="row">
				<div class="col">
                <label class="form-label">Select Image:</label>
							<select class="form-control" name="txt_slimage" required>
								<option value="">--Select--</option>
                                <?php
                                    
                                    $getimage = "SELECT * FROM `tbl_image`";
                                    $rungetimage = mysqli_query($conn,$getimage);
									while($imgrows = mysqli_fetch_array($rungetimage))
									{
                                ?>
                                <option value="<?=$imgrows['imgID']?>">
									#<?=$imgrows['imgID']."_".$imgrows['desc']?>
								</option>
								<?php
									}
								?>
							</select>
                </div>
                <div class="col">
                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" name="txt_slName" placeholder="slide name" required>
                </div>
				
            </div>
				<div class="row mt-3">
					<div class="col">
                    	<label class="form-label">Text:</label>
                    	<input type="text" class="form-control" name="txt_text" placeholder="slide text" required>
                	</div>
					<div class="col">
                    	<label class="form-label">Status:</label>
                    	<select name="txt_status" class="form-control" required>
							<option value="1">Enable</option>
							<option value="0">Disable</option>
						</select>
                	</div>
				</div>
			<div class="mt-3">
				<label class="form-label">Description:</label>
				<textarea rows="5" class="form-control" placeholder="Description" name="txt_desc" required></textarea>
			</div>
			<div class="mt-3">
				<button type="submit" class="btn btn-primary w-25">Save</button>
				<button type="reset" class="btn btn-dark w-25">Clear</button>
			</div>
            {{ Form::close() }}
            </div>
			<div class="mt-3">
				<table class="table table-success">
					<thead class="bg-success text-white text-center">
						<th>#ID</th>
						<th>Image</th>
						<th>Name</th>
						<th>Text</th>
						<th>Description</th>
						<th>Action</th>
					</thead>
					<tbody>
                    @foreach($slide as $slides)
						<tr>
							<td>{{$slides['shlideID']}}</td>
                            <td>
                                <img class="rounded img-thumbnail" src="{{URL::asset('img/images/thumbnail/'.$slides['imgname'])}}">
                            </td>
                            <td>{{$slides['slidename']}}</td>
                            <td>{{$slides['text']}}</td>
                            <td>{{$slides['description']}}</td>
							<td>
								<a href="{{route('sliders.endisable',['id'=>$slides['shlideID']])}}">
									@if($slides['status'] == 1)
									<box-icon type='solid' name='show'></box-icon>
									@else
                                    <box-icon name='hide' type='solid' ></box-icon>
                                    @endif
								</a>
								<a href="{{route('sliders.edit',['id'=>$slides['shlideID']])}}">
									<box-icon name='edit-alt'></box-icon>
								</a>
                                <a href="#">
									<box-icon type='solid' name='trash' data-toggle="modal" data-target="#Modal{{$slides['shlideID']}}"></box-icon>
								</a>
							</td>
						</tr>
                        <!-- Delete Modal -->
					<div class="modal fade" id="Modal{{$slides['shlideID']}}" tabindex="-1" role="dialog" aria-labelledby="Modal{{$slides['shlideID']}}" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content alert-warning">
									<div class="modal-header">
										<h3 class="modal-title" id="Modal{{$slides['shlideID']}}"><strong>Your Message</strong></h3>
									</div>
									<div class="modal-body">
										Do you want to delete this record ?
									</div>
									<div class="modal-footer">
										
                                        {{form::open(['method'=>'DELETE','route'=>['sliders.destroy',$slides['shlideID']]])}}
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
                {{$slide->links('pagination::bootstrap-4')}}
			</div>
            </div>
@endsection