<!-- Start of Modal for change branch-->
<div class="modal fade" id="changeBranch" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <center>
                    <h2 class="modal-title text-dark text-center " style=" justify-content-center">
                        {{ __('Company Branch') }}</h2>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="{{'changeBranch'}}">
                        @csrf

                        <div class="form-group row py-3">
                            <label for="Branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="branch" name="branch" required focus>
                                    @foreach($branches as $branch)
                                    <option value="{{$branch->id}}" selected>{{$branch->branch_name}}</option>
                                    @endforeach
                                    <option value="Select Role" disabled selected>Click to Select Branch</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">
                        {{ __('Change branch') }}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>