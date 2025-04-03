@extends('layouts.main')

@section('content')

<br><br>

<!-- Bootstrap JS Bundle (with Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="contents">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header color-dark fw-500 d-flex justify-content-between align-items-center">
    <span>Withdrawals</span>

    <div class="d-flex gap-3">
        <div class="action-btn" data-bs-toggle="modal" data-bs-target="#depositModal">
            <a href="#" class="btn btn-sm btn-primary btn-add">
                <i class="la la-plus"></i>Balance withdrawal
            </a>
        </div>

        <div class="action-btn" data-bs-toggle="modal" data-bs-target="#depositModall">
            <a href="#" class="btn btn-sm btn-primary btn-add">
                <i class="la la-plus"></i>Cashback withdrawal
            </a>
        </div>
    </div>
</div>

                
                    <div class="card-body p-0">

                        <div class="table4  p-25 mb-30">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th>
                                                <span class="userDatatable-title">id</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Amount</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Code</span>
                                            </th>

                                            <th>
                                                <span class="userDatatable-title">Remarks</span>
                                            </th>

                                            <th>
                                                <span class="userDatatable-title">Status</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $withdrawals=App\Models\Withdrawal::where("user_id",Auth::user()->id)->orderBy("id","desc")->get();
                                    ?>

                                    @foreach($withdrawals as $withdrawal)

                                    <tr>

                                        <td>{{$withdrawal->id}}</td>
                                        <td>{{$withdrawal->amount}}</td>
                                        <td>{{$withdrawal->trx}}</td>
                                        <td>{{$withdrawal->withdraw_information}}</td>
                                        <td>
                                            @if($withdrawal->status==2)
                                                <span class="badge bg-grd-warning text-dark">Pending</span>
                                            @elseif($withdrawal->status==1)
                                                <span class="badge bg-grd-success">Completed</span>
                                            @elseif($withdrawal->status==3)
                                                <span class="badge bg-grd-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>

                                    @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Deposit Modal -->
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="depositModalLabel">Withdraw Funds</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="depositForm" method="post" action="{{url('user/withdrawals/create')}}">

                @csrf
                    <!-- Phone Number Input -->
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                            placeholder="Enter your phone number" required>
                    </div>

                    <!-- Amount Input -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount"
                            placeholder="Enter withdrawal amount" required>
                    </div>

                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitDeposit">Submit Withdrawal</button>
            </div>
                </form>
            </div>

            <!-- Modal Footer -->
            
        </div>
    </div>
</div>

<div class="modal fade" id="depositModall" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="depositModalLabel">Withdraw cashback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="depositForm" method="post" action="{{url('user/withdrawals/cashback')}}">

                @csrf
                  
                    <!-- Amount Input -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount"
                            placeholder="Enter withdrawal amount" required>
                    </div>

                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitDeposit">Submit Withdrawal</button>
            </div>
                </form>
            </div>

            <!-- Modal Footer -->
            
        </div>
    </div>
</div>

@endsection
