@extends('layouts.main')

@section('content')

<br><br>

<!-- Bootstrap JS Bundle (with Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="contents">

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <!-- Card Header -->
                <div class="card-header color-dark fw-500 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Affiliates</h6>

                   
                </div>

              <!-- Card Body -->
<div class="card-body p-3">
    <!-- Add Search Input -->
    <div class="mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="Search table...">
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Package</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                $affiliates = App\Models\User::where("ref_by", Auth::user()->id)->get();
                ?>
                @foreach($affiliates as $aff)
                    <tr>
                        <td>{{ $aff->id }}</td>
                        <td>{{ $aff->username }}</td>
                        <td>{{ $aff->email }}</td>

                        <?php
                        $status = ($aff->plan_id == 0) ? "Not active" : "Active";
                        $plan_name = match ($aff->plan_id) {
                            1 => "Basic Package",
                            2 => "Premium Package",
                            default => "Unknown Package",
                        };
                        ?>
                        
                        <td><span class="badge {{ $status == 'Active' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $status }}</span></td>
                        <td>{{ $plan_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- End Table Responsive -->
</div> <!-- End Card Body -->

<!-- Add JavaScript at the bottom of your page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();

        for (let row of rows) {
            const cells = row.getElementsByTagName('td');
            let found = false;

            // Search through all columns
            for (let cell of cells) {
                const text = cell.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    found = true;
                    break;
                }
            }

            // Show/hide row based on search result
            row.style.display = found ? '' : 'none';
        }
    });
});
</script>
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
                <h5 class="modal-title" id="depositModalLabel">Withdraw Funds</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="depositForm">
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
                            placeholder="Enter the deposit amount" required>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitDeposit">Submit Deposit</button>
            </div>
        </div>
    </div>
</div>

<script>
        document.getElementById('copyAffiliateLink').addEventListener('click', function () {
            // Generate the affiliate link
            const baseUrl = "{{ url('user/') }}"; // Get the base URL of the site
            const referralCode = "{{ Auth::user()->username }}"; // Get user's referral code
            const affiliateLink = `${baseUrl}/register?ref=${referralCode}`;

            // Copy the link to the clipboard
            navigator.clipboard.writeText(affiliateLink).then(() => {
                // Show SweetAlert confirmation
                Swal.fire({
                    title: 'Success!',
                    text: 'Affiliate link copied to clipboard!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }).catch(err => {
                console.error('Failed to copy link: ', err);
            });
        });

    </script>


@endsection
