<!-- //modal for cartDisplay -->

<div class="modal fade" id="cartDisplay" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center modal-title">Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('receipt') }}">
                    @csrf
                    <table class="table   table-responsive">
                        <thead class="thead-inverse|thead-default">
                            <tr>
                                <th>Item Name</th>
                                <th>Amount</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informations as $info )
                            <tr>

                                <td scope="row">{{ $info->item->name }}</td>
                                <td>{{ $info->amount }}</td>
                                <td>{{$info->total_price }}Br</td>
                                <td>
                                    <div class="col-sm-4">
                                        <a href="{{ url('returnToStock'.'/'.$info->id) }}" type="submit" class="btn"><i
                                                class="bi bi-x-lg icon-red fs-6" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="container ">
                        <div class="d-flex justify-content-center align-items-center ">

                            <strong>
                                <p style="color:rgb(0, 241, 32);" class="text-center display-6">{{ $totalItemPrice }}
                                </p>
                            </strong>
                            <p class=" text-dark   text-center display-6 ">Br</p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row align-items-center justify-content-center ">
                            <div class="col-md-3 mx-auto">
                                <label for="Tin_number">TIN number:</label>
                            </div>
                            <div class="col mx-0 ">
                                <input type="text" class=" col-md-5 form-control mx-auto my-4" name="Tin_number"
                                    placeholder="Enter customer tin number" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-center ">
                    <button type="submit" class=" mx-auto btn btn-primary">Proceed</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>