@extends('static.components.header')
@section('content')
    <div class="container mt-2">
        <a href="{{ route('profile.show', ['id' => auth()->id()]) }}"><button class="btn btn-outline-danger my-2 my-sm-0"
                type="button">Back</button></a>
        <div class="card mt-2">
            <div class="card-body">
                <div class="member-box">
                    <div class="s-member">
                        <div class="media align-items-center">
                            <img src="{{ url('assets/images/Admin_Profile/4X6.png') }}" class="d-block" alt=""
                                width="100px">
                            <div class="media-body ml-5">
                                <p>Admin</p><span>If you want to withdraw money, please contact the administrator.</span>
                            </div>
                            <div class="tm-social">
                                <a href="https://t.me/PuHourNet"><img width="94" height="94"
                                        src="https://img.icons8.com/3d-fluency/94/telegram.png" alt="telegram" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
