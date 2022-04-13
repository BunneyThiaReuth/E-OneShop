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
                         {{ Form::open(array('action' => array('imageController@update',$imgforedit['imgID']),'method'=>'put','enctype'=>'multipart/form-data')) }}
								<div class="row">
									<div class="col-3">
										<div class="rounded mb-4 img-thumbnail" style="width:200px;height:200px;">
											<input type="hidden" value="{{$imgforedit['imgname']}}" name="oldimg">
											<img id="previewImg" src="{{URL::asset('img/images/'.$imgforedit['imgname'])}}" width="100%" height="100%" class="rounded">
									   </div>
										<div style="width:200px;">
												<div class="custom-file">
													<input type="file" name="txt_upimage" class="custom-file-input" onchange="previewFile(this);" id="customFile"/>
													<input type="button" class="custom-file-label btn bg-danger text-white w-100" value="Upload Image" for="customFile">
												</div>
										</div>
									</div>
									<div class="col">
										<div class="row">
											<div class="col" >
												<textarea class="form-control" rows="8" name="txt_updesc" placeholder="Description">{{$imgforedit['desc']}}</textarea>
												<div class="mt-3">
													<button type="submit" class="btn btn-primary w-25">Update</button>
                                                	<a href="/image" class="btn btn-dark w-25">Back</a>
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
                                                        <img class="rounded img-thumbnail" src="{{URL::asset('img/images/thumbnail/'.$images['imgname'])}}">
                                                    </td>
                                                    <td >{{$images['desc']}}</td>
													
													<td class="text-center">
														<a href="{{route('image.edit',['id'=>$images['imgID']])}}">
															<box-icon name='edit-alt'></box-icon>
														</a>
														<a href="#">
															<box-icon name='trash' type='solid' data-toggle="modal" data-target="#deleteModal{{$images['imgID']}}"></box-icon>
														</a>
													</td>
												</tr>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal{{$images['imgID']}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{$images['imgID']}}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="deleteModal{{$images['imgID']}}">Your Message</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                           Are you sure to delete this record ?
                                                        </div>
                                                        <div class="modal-footer">
                                                        {{form::open(['method'=>'DELETE','route'=>['image.destroy',$images['imgID']]])}}
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
                                        {{$image->links('pagination::bootstrap-4')}}
									</div>
								</div>
					</div>
                
</div>
@endsection