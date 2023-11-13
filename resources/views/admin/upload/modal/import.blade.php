<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/customer/upload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Campaign</label>
                        <div class="input-group col-xs-12">
                            <select class="js-example-basic-single w-100 select2-hidden-accessible" data-select2-id="1"
                                tabindex="-1" aria-hidden="true" required>
                                @foreach ($campaigns as $campaign)
                                    <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="file" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload File">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                    <a href="{{ route('customer.index') }}"  class="btn btn-light">Cancel</a>
                    {{-- <div class="input-group mb-3">
                        <select class="js-example-basic-single w-100 select2-hidden-accessible" data-select2-id="1"
                            tabindex="-1" aria-hidden="true" required>
                            @foreach ($campaigns as $campaign)
                                <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}</option>
                            @endforeach
                        </select>
                        <input type="file" name="file" class="form-control">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
