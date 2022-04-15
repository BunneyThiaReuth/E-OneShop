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
            {{ Form::open(array('action' => array('sliderController@update',$slideforedit['shlideID']),'method'=>'put','enctype'=>'multipart/form-data')) }}
            <div class="row">
				<div class="col">
                <label class="form-label">Select Image:</label>
							<select class="form-control" name="txt_slimage" required>
								<option value="">--Select--</option>
								<option value="{{$slideforedit['imageID']}}" selected>#{{$slideforedit['imageID']}}_{{$slideforedit['slidename']}}</option>
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
                    <input type="text" value="{{$slideforedit['slidename']}}" class="form-control" name="txt_slName" placeholder="slide name" required>
                </div>
				
            </div>
				<div class="row mt-3">
					<div class="col">
                    	<label class="form-label">Text:</label>
                    	<input type="text" value="{{$slideforedit['text']}}" class="form-control" name="txt_text" placeholder="slide text" required>
                	</div>
					<div class="col">
                    	<label class="form-label">Status:</label>
                    	<select name="txt_status" class="form-control" required>
							@if($slideforedit['status'] ==1)
								<option value="1" selected>Enable</option>
								<option value="0">Disable</option>
							@elseif($slideforedit['status'] ==0)
								<option value="1">Enable</option>
								<option value="0" selected>Disable</option>
							@endif
						</select>
                	</div>
				</div>
			<div class="mt-3">
				<label class="form-label">Description:</label>
				<textarea rows="5" class="form-control" placeholder="Description" name="txt_desc" required>{{$slideforedit['description']}}</textarea>
			</div>
			<div class="mt-3">
				<button type="submit" class="btn btn-primary w-25">Update</button>
				<a href="/sliders" class="btn btn-dark w-25">Back</a>
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
									<box-icon type='solid' name='trash'></box-icon>
								</a>
							</td>
						</tr>
                    @endforeach
					</tbody>
				</table>
                {{$slide->links('pagination::bootstrap-4')}}
			</div>
            </div>
@endsection