@extends('admin.layouts.adminpage')
@section('content')
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Image</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="/image">Create Image</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
					</div>
					 <div class="container-fluid">
						 <div class="mt-3">
                         {{ Form::open(array('action' => 'imageController@store','enctype'=>'multipart/form-data')) }}
								<div class="row">
									<div class="col-3">
										<div class="rounded mb-4 img-thumbnail" style="width:200px;height:200px;">
											<img id="previewImg" src="{{ URL::asset('admin/assets/images/noimage.png')}}" width="100%" height="100%" class="rounded">
									   </div>
										<div style="width:200px;">
												<div class="custom-file">
													<input type="file" name="txt_image" class="custom-file-input" onchange="previewFile(this);" id="customFile" required/>
													<input type="button" class="custom-file-label btn bg-danger text-white w-100" value="Upload Image" for="customFile">
												</div>
										</div>
									</div>
									<div class="col">
										<div class="row">
											<div class="col" >
												<textarea class="form-control" rows="8" name="txt_desc" placeholder="Description"></textarea>
												<div class="mt-3">
													<button type="submit" class="btn btn-primary w-25">Save</button>
                                                	<button type="reset" class="btn btn-dark w-25">Clear</button>
												</div>
												
											</div>
										</div>
									</div>
								</div>
                            {{ Form::close() }}
								
						</div>
						 <div class="mt-3 row">
									<div class="col">
										<table class="table table-success">
											<thead class="bg bg-success text-center text-white">
												<th>#ID</th>
												<th>Image</th>
												<th>Description</th>
												<th>Action</th>
											</thead>
											<tbody>
                                            @foreach($image as $images)
												<tr>
													<td class="text-center">{{$images['imgID']}}</td>
                                                    <td class="text-center">
                                                        <img class="rounded" src="{{URL::asset('img/images/thumbnail/'.$images['imgname'])}}">
                                                    </td>
                                                    <td >{{$images['desc']}}</td>
													
													<td class="text-center">
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
                                        {{$image->links('pagination::bootstrap-4')}}
									</div>
								</div>
					</div>
                
</div>
@endsection