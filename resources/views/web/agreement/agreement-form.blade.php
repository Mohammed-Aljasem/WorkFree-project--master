@extends('web.layouts.master')
@section('links')
    <link rel="stylesheet" href="{{ asset('agreement/agreement-form.css') }}">
@endsection

@section('title')
    Agreement form
@endsection
@section('master')
    <div class="agreement__container">
        <header class="agreement__header">
            <div class="header__title">
                <h1> {{ $agreement->project_title }}
                    @if ((Auth::user()->role_id == 4 && $agreement->freelance_accept == 0) || $agreement->freelance_accept == 2)
                        <a href="{{ route('agreements.edit', $agreement->id) }}" class="edit-agreement">Edit</a>
                        <form action="{{ route('agreements.destroy', $agreement->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button href="" class="agreement-delete">Delete</button>
                        </form>
                    @endif
                </h1>
                <span>Created at: {{ \Carbon\Carbon::parse($agreement->created_at)->format('d-m-Y') }}</span>
            </div>
            <div class="header__users">
                <div class="header_user">
                    <div class="header__user__image">
                        <img
                            src="https://images.unsplash.com/photo-1595273185163-347066c49ad3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">
                    </div>
                    <div class="header__user__info">
                        <h2>{{ $agreement->userClient->first_name }}
                            {{ $agreement->userClient->last_name }}
                        </h2>
                        <span>Customer</span>
                    </div>
                </div>
                <div class="header_user">
                    <div class="header__user__image">
                        <img src="https://images.unsplash.com/photo-1595273185163-347066c49ad3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="">
                    </div>
                    <div class="header__user__info">
                        <h2>{{ $agreement->userFreelance->first_name }}
                            {{ $agreement->userFreelance->last_name }}</h2>
                        <span>Freelance</span>
                    </div>
                </div>
            </div>
        </header>
        <main class="agreement__body">
            <div class="agreement__description">
                <h2>Description</h2>
                <p>{{ $agreement->description }}</p>
            </div>
            <div class="agreement__requirements">
                <h2>Requirement</h2>
                <div class="agreement__requirement__cont">
                    <span style="display: none">{{ $x = 1 }}</span>
                    @foreach ($agreement->requirement as $require)


                        <div class="agreement__require">
                            <h3><span> {{ $x++ }}-</span>{{ $require->title }}</h3>
                            <p>{{ $require->description }}</p>
                        </div>

                    @endforeach
                </div>
            </div>

        </main>
        <footer class="agreement__footer">
            <div class="footer__dates">
                <h2>Dates</h2>
                <div class="dates__time">
                    <div class="date__start">
                        <span class="time__title">Date start</span>
                        <span class="date">{{ $agreement->date_start }}</span>
                    </div>
                    <div class="date__end">
                        <span class="time__title">Date end</span>
                        <span class="date">{{ $agreement->date_end }}</span>
                    </div>
                </div>
            </div>
            <div class="footer__budget">
                <h2>Budget</h2>
                <div class="budget__salary">
                    <span>{{ $agreement->budget }}$</span>
                </div>
            </div>
            <div class="footer__approve">
                <h2>Approve</h2>
                <div class="freelancer__approve">
                    @if (Auth::user()->role_id == 4)
                        @if ($agreement->freelance_accept == 0)
                            <span style="background: orange; color:white">Pending</span>
                        @elseif($agreement->freelance_accept == 1)
                            <span>Approved</span>
                        @else
                            <span style="background: rgba(255, 61, 61)">Rejected</span>
                        @endif
                    @elseif(Auth::user()->role_id == 3 && $agreement->freelance_accept == 0)
                        <a href="{{ url('reject_agreement/' . $agreement->id) }}" class="reject-agreement">Reject</a>
                        <a href="{{ url('accept_agreement/' . $agreement->id) }}" class="approve-agreement">Accept</a>
                    @elseif(Auth::user()->role_id == 3 && $agreement->freelance_accept == 1)
                        <span>You are Approved</span>
                    @elseif(Auth::user()->role_id == 3 && $agreement->freelance_accept == 2)
                        <span>You are rejected</span>

                    @endif
                </div>
            </div>
        </footer>

    </div>



@endsection
@section('scripts')



@endsection
