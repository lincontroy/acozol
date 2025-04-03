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
                
                <div class="alert alert-dark border-0 bg-grd-royal alert-dismissible fade show">
									<div class="d-flex align-items-center">
										<div class="font-35 text-white"><span class="material-icons-outlined fs-2">lightbulb</span>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">{{$greeting}}, {{ Auth::user()->username }}</h6>
											<div class="text-white">Welcome to ads center</div>
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
                                $total_ads=App\Models\Ads::where('user_id',Auth::user()->id)->sum('earnings');
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
                <p class="mb-0">Total ads revenue</p>
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

use Carbon\Carbon;

$total_ads=App\Models\Ads::where('user_id',Auth::user()->id)
->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
->sum('earnings');

$whatsapp_with=App\Models\Withdrawal::where('user_id',Auth::user()->id)
->where('withdraw_information', 'LIKE', '%whatsapp%')
->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
->sum('amount');

$active=$total_ads-$whatsapp_with

?>
Ksh {{ number_format($active, 2) }}</h2>
                    </div>
                    <div class="">
                        <p
                            class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-danger text-danger bg-opacity-10">
                            <span class="material-icons-outlined fs-6">arrow_upward</span>18.6%
                        </p>
                    </div>
                </div>
                <p class="mb-0">Active Balance</p>
                <div class="mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#packageModal">
                           Withdraw earnings
                        </button>
                </div>

            </div>
        </div>
    </div>
</div>

<br><hr><br>

<div class="row">

<?php

            
$products=App\Models\Filestore::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
->latest('created_at') // Orders by created_at in descending order
->first(); 


?>

@if($products)

    
<div class="col">
            <div class="card">
              <div class="card-body">
                <img src="{{ url('img') }}/{{$products->file_two_path}}" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Product of the day</h5>
              
                <a  href="{{ url('img') }}/{{$products->file_two_path}}" download="ad9.png" class="btn btn-info" >Download Product</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <img src="{{ url('img') }}/{{$products->file_two_path}}" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Product of the day</h5>
                
                <a  href="{{ url('img') }}/{{$products->file_two_path}}" download="ad9.png" class="btn btn-info" >Download Product</a>
              </div>
            </div>
          </div>
</div>
@else

<div class="card alert-warning text-center col-xxl-3 col-md-12 col-ssm-12 mb-30" role="alert">
<h4 class="alert-heading">No Records Found</h4>
<p>We couldn't find any records for today. Please check back later.</p>
</div>

@endif


</div>

<br><hr><br>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default card-md mb-4">
            <div class="card-header">
                <h6>Submit views</h6>
            </div>
            <div class="card-body">
                <div class="basic-form-wrapper">
                    <form action="{{ url('user/submit_views') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-basic">
                            <input type="hidden" name="product_id" value="1">
                            <div class="form-group mb-25">
                                <label>Phone</label>
                                <input class="form-control form-control-lg" type="text" name="phone" placeholder="Your phone number" required>
                            </div>
                            <div class="form-group mb-25">
                                <label>Views</label>
                                <div class="input-container position-relative icon-right">
                                    <a href="#" class="input-icon icon-right">
                                        <span data-feather="eye-off"></span>
                                    </a>
                                    <input class="form-control form-control-lg" type="text" name="views" placeholder="Views" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="fileInput" class="form-label">File</label>
                                <input type="file" class="form-control" id="fileInput" name="file" required>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-lg btn-primary btn-submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div> 
</div>

<!-- Table Section -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
        <div class="card-header">
                <h6>Recent withdrawals</h6>
            </div>
            <div class="card-body p-0">
                <div class="table4 p-25 mb-30">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr class="userDatatable-header">
                                    <th><span class="userDatatable-title">ID</span></th>
                                    <th><span class="userDatatable-title">Amount</span></th>
                                    <th><span class="userDatatable-title">Code</span></th>
                                    <th><span class="userDatatable-title">Remarks</span></th>
                                    <th><span class="userDatatable-title">Status</span></th>
                                    <th><span class="userDatatable-title">Created At</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $withdrawals = App\Models\Withdrawal::where("user_id", Auth::user()->id)
                                    ->where('withdraw_information', 'LIKE', '%whatsapp%')
                                    ->orderBy("id", "desc")->get();
                                ?>

                                @foreach($withdrawals as $withdrawal)
                                    <tr>
                                        <td>{{ $withdrawal->id }}</td>
                                        <td>{{ $withdrawal->amount }}</td>
                                        <td>{{ $withdrawal->trx }}</td>
                                        <td>{{ $withdrawal->withdraw_information }}</td>
                                        <td>
                                            @if($withdrawal->status == 2)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($withdrawal->status == 1)
                                                <span class="badge badge-success">Completed</span>
                                            @elseif($withdrawal->status == 3)
                                                <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>{{ $withdrawal->created_at }}</td>
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


<div class="modal fade" id="packageModal" tabindex="-1" aria-labelledby="packageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="packageModalLabel">Withdraw earnings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('user/what') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="plan-amount" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="plan-amount" name="amount">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
