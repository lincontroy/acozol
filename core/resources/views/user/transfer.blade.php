@extends('layouts.main')
@section('content')

<div class="contents">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{url('user/transfer/create')}}" method="post">
                    @csrf
                    <div class="form-basic">
                        <input type="hidden" name="product_id" value="1">
                        <div class="form-group mb-25">
                            <label>Username</label>
                            <input class="form-control form-control-lg" type="text" name="username"
                                placeholder="Receivers username" required>
                        </div>

                        <div class="form-group mb-25">
                            <label>Amount</label>
                            <input class="form-control form-control-lg" type="text" name="amount"
                                placeholder="Amount to send" required>
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
@endsection
