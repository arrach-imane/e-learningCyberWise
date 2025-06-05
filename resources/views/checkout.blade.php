@extends('static.components.header')
@section('content')
<div class="container" style="max-width: 500px; margin: 2rem auto;">
    <h2>Checkout: {{ $course->course_title }}</h2>
    <form method="POST" action="{{ route('checkout.process', $course->course_id) }}">
        @csrf
        <button class="btn btn-cyber btn-lg w-100">Proceed to Payment</button>
    </form>
</div>
@endsection
