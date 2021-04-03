<div class="card">
    <h5 class="card-header">Edit</h5>
    <div class="card-body">
        <form method="post" action="/card-edit-submit/{{$id}}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$card['name']}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" value="{{$card['designation']}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="business_name">Business Name</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" value="{{$card['business_name']}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description">{{$card['description']}}</textarea>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="wp_number">WhatsApp Number</label>
                        <input type="text" class="form-control" id="wp_number" name="wp_number" value="{{$card['wp_number']}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="contacts">Contacts</label>
                        <input type="text" class="form-control" id="contacts" name="contacts" data-role="tagsinput" value="{{$card['contacts']}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address">{{$card['address']}}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="address">Photo</label>
                        <textarea class="form-control" id="photo" name="photo" style="display: none">{{$card['photo']}}</textarea>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="img-container">
                                    <img src="{{asset('storage'.$card['photo'])}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="actions">
                            <div class="col-12">
                                <div class="docs-buttons">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <label class="btn btn-primary btn-upload mb-0" for="inputImage" title="Upload image file">
                                            <input type="file" class="sr-only" id="inputImage" accept="image/*">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Import image with Blob URLs">
                                                    <span class="fa fa-upload"></span>
                                                </span>
                                        </label>
                                        <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
                                                <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ maxWidth: 4096, maxHeight: 4096 })">
                                                    <span class="fa fa-check"></span>
                                                </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Show the cropped image in modal -->
                        <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('cards')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
