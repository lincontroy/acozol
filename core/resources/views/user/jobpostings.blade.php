@extends('layouts.main')
@section('content')

<?php
$jobPostings = App\Models\JobPosting::all();
?>
<div class="container mt-5">
        <h1>Job Postings</h1>
        <div class="row">
            @foreach ($jobPostings as $job)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <p class="card-text">{{ $job->description }}</p>
                            <button class="btn btn-primary apply-btn" data-bs-toggle="modal" data-bs-target="#applyModal" data-job-id="{{ $job->id }}">Apply</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="applyForm">
                    <input type="hidden" id="applyJobId" name="job_id">
                    <div class="mb-3">
                        <label for="applyName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="applyName" value="{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="applyEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="applyEmail" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="applyMobile" class="form-label">Mobile Number</label>
                        <input type="tel" class="form-control" id="applyMobile" value="{{ Auth::user()->mobile ?? '' }}" readonly>
                    </div>

                    <br><br>
            <p>
            To apply for this job, a fee of 500 Kes is required. Please ensure your balance is sufficient before proceeding.
            </p>
                </form>
            </div>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitApplication">Apply</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.apply-btn').on('click', function () {
            const jobId = $(this).data('job-id');
            $('#applyJobId').val(jobId);
        });
        
        $('#submitApplication').on('click', function (e) {
            e.preventDefault();
            const jobId = $('#applyJobId').val();
            const url = "{{ url('user/jobpostings/apply/') }}/" + jobId;

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            showConfirmButton: true,
                        }).then(() => {
                            $('#applyModal').modal('hide');
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Insufficient Balance',
                            text: response.message,
                            showCancelButton: true,
                            confirmButtonText: 'Go to Deposit',
                            cancelButtonText: 'Close'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ url("user/deposit") }}'; // Redirect to deposit page
                            }
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong!',
                    });
                }
            });
        });
    });
</script>
@endsection