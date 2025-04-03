@extends('layouts.main')

@section('content')

<br><br>

<style>

.modal {
    display: none; 
    position: fixed; 
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%; 
    background: rgba(0,0,0,0.5);
    z-index: 9999; /* Ensure it is above other content */
}
    .package-card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.2s ease-in-out;
    }

    .package-card:hover {
        transform: translateY(-5px);
    }

    .package-header {
        color: white;
        text-align: center;
        padding: 20px;
    }

    .package-price {
        font-size: 2rem;
        font-weight: bold;
        color: #007bff;
    }

    .package-body {
        padding: 20px;
    }

    .package-features li {
        margin-bottom: 10px;
    }

    .package-btn {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .btn-custom {
        background-color: #007bff;
        color: #fff;
        border-radius: 50px;
        padding: 10px 20px;
        transition: background-color 0.3s;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    
</style>

<div class="contents">
    <div class="container-fluid">
        <div class="row">
            @php
                $packages = [
                    ['name' => 'Basic Package', 'price' => '1000', 'features' => ['✅ Affiliates Bonus', '✅ Games', '✅ No Ads Earnings', '✅ No CashBack']],
                    ['name' => 'PLATINUM Package', 'price' => '2500', 'features' => ['✅ Free Live Support', '✅ BI Weekly Ads Earnings', '✅ 5000 Cashback', '✅ Games']],
                    ['name' => 'PREMIUM ADS Package', 'price' => '4800', 'features' => ['✅ Free Live Support', '✅ Unlimited Ads Revenue', '✅ Games', '✅ Writing Accounts']],
                  
                ];
            @endphp

            @foreach($packages as $package)
            <div class="col-md-4">
                <div class="card package-card">
                    <div class="package-header">
                        <h3>{{ $package['name'] }}</h3>
                        <p class="package-price">Ksh {{ $package['price'] }}</p>
                    </div>
                    <div class="package-body">
                        <ul class="package-features">
                            @foreach($package['features'] as $feature)
                                <li >{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <div class="package-btn">
                        <a href="javascript:void(0);" 
                        class="btn btn-custom" 
                        data-bs-toggle="modal" 
                        data-bs-target="#packageModal" 
                        onclick="setPackageDetails('{{ $package['name'] }}', '{{ $package['price'] }}')">
                        Select Plan
                        </a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Bootstrap Modal -->
<!-- Bootstrap Modal -->
<div class="modal fade" id="packageModal" tabindex="-1" aria-labelledby="packageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="packageModalLabel">Select Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('user/planpost') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="plan-name" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="plan-name" name="plan_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="plan-amount" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="plan-amount" name="amount" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

function setPackageDetails(planName, amount) {
    document.getElementById('plan-name').value = planName;
    document.getElementById('plan-amount').value = amount;
}
    // Open the modal and populate form inputs
    // function openPackageModal(planName, amount) {
    //     document.getElementById('plan-name').value = planName;
    //     document.getElementById('plan-amount').value = amount;
    //     document.getElementById('packageModal').style.display = 'block';
    // }

    // // Close the modal
    // function closePackageModal() {
    //     document.getElementById('packageModal').style.display = 'none';
    // }

    // Close modal when clicking outside of it
    // window.onclick = function(event) {
    //     const modal = document.getElementById('packageModal');
    //     if (event.target === modal) {
    //         closePackageModal();
    //     }
    // }
</script>
<!-- Bootstrap 5 Bundle with Popper (Required for Modals, Dropdowns, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
