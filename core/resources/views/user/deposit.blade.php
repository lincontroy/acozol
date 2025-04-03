@extends('layouts.main')

@section('content')
<br><br>



<!-- Bootstrap JS Bundle (with Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="alert alert-warning border-0 bg-grd-warning alert-dismissible fade show">
									<div class="d-flex align-items-center">
										<div class="font-35 text-dark"><span class="material-icons-outlined fs-2">report_problem</span>
										</div>
										<div class="ms-3">
											
											<div class="text-dark">All payments are made to the methods provided by the . No payment should be made to individual numbers/bank paybills.</div>
										</div>
									</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>

<div class="contents">

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header color-dark fw-500 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Deposits</h6>

                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#depositModal">
                        <i class="la la-plus"></i> Add New
                    </button>
                </div>

                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Amount</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $deposits = App\Models\Deposit::where("user_id", Auth::user()->id)
                                    ->orderBy("id", "desc")
                                    ->get();
                                ?>

                                @foreach($deposits as $deposit)
                                    <tr>
                                        <td>{{ $deposit->id }}</td>
                                        <td>{{ number_format($deposit->amount, 2) }}</td>
                                        <td>{{ $deposit->trx }}</td>
                                        <td>
                                            @if ($deposit->status == 0)
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @elseif ($deposit->status == 1)
                                                <span class="badge bg-success">Success</span>
                                            @else
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- End Table Responsive -->
                </div> <!-- End Card Body -->
            </div> <!-- End Card -->
        </div> <!-- End Col -->
    </div> <!-- End Row -->
</div> <!-- End Container -->

</div>


<!-- Deposit Modal -->
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="depositModalLabel">Deposit Funds</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="depositForm" method="post" action="{{url('user/deposit/create')}}">
                    <!-- Phone Number Input -->

                    @csrf
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                        placeholder="0724555676" maxlength="10" pattern="[0-9]{10}" required>

                    </div>

                    <!-- Amount Input -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount"
                            placeholder="Enter the deposit amount" required>
                    </div>

                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit Deposit</button>
            </div>
                </form>
            </div>

            <!-- Modal Footer -->
           
        </div>
    </div>
</div>

@endsection
