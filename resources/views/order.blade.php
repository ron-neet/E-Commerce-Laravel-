@extends('master')
@section('content')

<div class="container cart-page my-5">
    <h2 class="text-center mb-4">Your Order Summary</h2>

    @php
        $taxRate = 0.1;
        $deliveryCharge = 5.00;
        $tax = $total * $taxRate;
        $finalTotal = $total + $tax + $deliveryCharge;
    @endphp

    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="card-title mb-3">Order Details</h4>

            <div class="d-flex justify-content-between mb-2">
                <span>Subtotal:</span>
                <span>${{ number_format($total, 2) }}</span>
            </div>

            <div class="d-flex justify-content-between mb-2">
                <span>Tax (10%):</span>
                <span>${{ number_format($tax, 2) }}</span>
            </div>

            <div class="d-flex justify-content-between mb-2">
                <span>Delivery Charge:</span>
                <span>${{ number_format($deliveryCharge, 2) }}</span>
            </div>

            <hr>

            <div class="d-flex justify-content-between mb-3 fw-bold">
                <span>Total Amount:</span>
                <span>${{ number_format($finalTotal, 2) }}</span>
            </div>

            <!-- Address Section -->
            <h5 class="mb-3">Delivery Address</h5>
            <form action="{{ url('orderplace') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="address" rows="3" placeholder="Enter your delivery address" required></textarea>
                </div>

                <!-- Payment Method -->
                <h5 class="mb-3">Payment Method</h5>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="cod" value="COD" checked>
                        <label class="form-check-label" for="cod">Cash on Delivery</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="card" value="card">
                        <label class="form-check-label" for="card">Credit/Debit Card</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100">Place Order</button>
            </form>
        </div>
    </div>
</div>

<style>
.cart-page {
    margin-top: 50px;
    margin-bottom: 50px;
}

.card {
    padding: 20px;
}

.card-body {
    display: flex;
    flex-direction: column;
}

.form-check {
    margin-bottom: 10px;
}
</style>

@endsection
