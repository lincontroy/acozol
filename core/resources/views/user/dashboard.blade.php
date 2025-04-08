@extends('layouts.main')

@section('content')


@php
                    $currentHour = date('H'); // Get the current hour (24-hour format)
                    
                    if ($currentHour >= 5 && $currentHour < 12) {
                        $greeting = 'Good Morning';
                    } elseif ($currentHour >= 12 && $currentHour < 18) {
                        $greeting = 'Good Afternoon';
                    } else {
                        $greeting = 'Good Evening';
                    }
                @endphp

                @if(Auth::user()->plan_id==0)

                               
<a href="{{ url('user/packages') }}" class="alert-link">
    <div class="alert-icon-big alert alert-danger" role="alert">
        <div class="alert-icon">
            <span data-feather="layers"></span>
        </div>

        <div class="alert-content">
            <h6 class='alert-heading'>User not active</h6>
            <p>You need a package plan to proceed. Click here to select package</p>
        </div>
    </div>
</a>

            @endif

                
                <div class="alert alert-dark border-0 bg-grd-royal alert-dismissible fade show">
									<div class="d-flex align-items-center">
										<div class="font-35 text-white"><span class="material-icons-outlined fs-2">lightbulb</span>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">{{$greeting}}, {{ Auth::user()->username }}</h6>
											<div class="text-white">Purchase the PLATINUM package at just 2500ksh and receive 5000 cashback, Alternatively choose the PREMIUM ADS for only 4800ksh and get an instant 10,000 cashback directly to your MPESA.</div>
										</div>
									</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>


<div class="row">
    <div class="col">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="">
                        <h2 class="mb-0"><?php

use Carbon\Carbon;
$total_ads=App\Models\Ads::where('user_id',Auth::user()->id)
                                ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
                                ->sum('earnings');

?>
Ksh {{ number_format($total_ads, 2) }}</h2>
                    </div>
                    <div class="">
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>24.7%
                        </p>
                    </div>
                </div>
                <p class="mb-0">WhatsApp Earnings</p>
                <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center justify-content-between">285 left to Goal<span
                            class="">68%</span></p>
                    <div class="progress w-100" style="height: 6px;">
                        <div class="progress-bar bg-grd-purple" style="width: 65%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="">
                        <h2 class="mb-0"> <?php
                                $whatsapp_with=App\Models\Withdrawal::where('user_id',Auth::user()->id)
                                ->where('withdraw_information', 'LIKE', '%whatsapp%')
                               
                                ->sum('amount');
                                ?>
                            Ksh {{ number_format($total_ads, 2) }}</h2>
                    </div>
                    <div class="">
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-danger text-danger bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>18.6%
                        </p>
                    </div>
                </div>
                <p class="mb-0">Total WhatsApp Withdrawals</p>
                <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center justify-content-between">285 left to Goal<span
                            class="">78%</span></p>
                    <div class="progress w-100" style="height: 6px;">
                        <div class="progress-bar bg-grd-danger" style="width: 65%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="">
                        <h2 class="mb-0">Ksh {{ number_format(Auth::user()->balance, 2) }}</h2>
                    </div>
                    <div class="">
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>24.7%
                        </p>
                    </div>
                </div>
                <p class="mb-0">Deposit Balance</p>
                <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center justify-content-between">285 left to Goal<span
                            class="">68%</span></p>
                    <div class="progress w-100" style="height: 6px;">
                        <div class="progress-bar bg-grd-purple" style="width: 65%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="">
                        <h2 class="mb-0">Points: 

                        <?php
                            $total_deposits=App\Models\Deposit::where('user_id',Auth::user()->id)->sum('amount');

                            $points=0.1*$total_deposits;
                        ?>
                            
                        {{ $points}}
                    
                    </h2>
                    </div>
                    <div class="">
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>24.7%
                        </p>
                    </div>
                </div>
                <p class="mb-0">Acozol Points</p>
                <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center justify-content-between">Get to 2000 points to unlock Earning via academic writing<span
                            class="">68%</span></p>
                    <div class="progress w-100" style="height: 6px;">
                        <div class="progress-bar bg-grd-purple" style="width: 65%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="">
                        <h2 class="mb-0">Ksh {{Auth::user()->cashback}}</h2>
                    </div>
                    <div class="">
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-danger text-danger bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>18.6%
                        </p>
                    </div>
                </div>
                <p class="mb-0">Casback</p>
                <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center justify-content-between">285 left to Goal<span
                            class="">78%</span></p>
                    <div class="progress w-100" style="height: 6px;">
                        <div class="progress-bar bg-grd-danger" style="width: 65%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
</div>

<div class="row">
    <div class="col">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="">
                        <h2 class="mb-0">Ksh {{ number_format(Auth::user()->total_ref_com, 2) }}</h2>
                    </div>
                    <div class="">
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>24.7%
                        </p>
                    </div>
                </div>
                <p class="mb-0">Earning Balance</p>
                <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center justify-content-between">285 left to Goal<span
                            class="">68%</span></p>
                    <div class="progress w-100" style="height: 6px;">
                        <div class="progress-bar bg-grd-purple" style="width: 65%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="">
                        <h2 class="mb-0">Ksh
                        {{ number_format(App\Models\Withdrawal::where('user_id',Auth::user()->id)->where('withdraw_information', 'LIKE', '%earnings%')->sum('amount'),2) }}</h2>
                    </div>
                    <div class="">
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-danger text-danger bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>18.6%
                        </p>
                    </div>
                </div>
                <p class="mb-0">Withdrawals</p>
                <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center justify-content-between">285 left to Goal<span
                            class="">78%</span></p>
                    <div class="progress w-100" style="height: 6px;">
                        <div class="progress-bar bg-grd-danger" style="width: 65%"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
</div>

<div class="row">
    <div class="col">
        <div class="card rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="">
                        <h2 class="mb-0">  <?php
                                
                                $package=Auth::user()->plan_id;
    
                                if ($package == 1) {
                                    $planname = "Starter Pack";
                                } else if ($package == 2) {
                                    $planname = "Bronze Pack";
                                } else if ($package == 3) {
                                    $planname = "Silver Pack";
                                } else if ($package == 4) {
                                    $planname = "Gold Pack";
                                } else if ($package == 5) {
                                    $planname = "Diamond Pack";
                                } else if ($package == 6) {
                                    $planname = "Agent";
                                } else if ($package == 0) {
                                    $planname = "No package";
                                }
                                
                                ?>
                                    
                                  {{$planname}}</h2>
                    </div>
                    <div class="">
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>24.7%
                        </p>
                    </div>
                </div>
                <p class="mb-0">Active Package</p>
                <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center justify-content-between">285 left to Goal<span
                            class="">68%</span></p>
                    <div class="progress w-100" style="height: 6px;">
                        <div class="progress-bar bg-grd-purple" style="width: 65%"></div>
                    </div>
                </div>

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
