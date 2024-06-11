@extends('Layout.layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/Profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

</html>

@section('title', 'Profile')
@section('content')
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#transaction-history">Transaction History</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>

                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                        <a class="list-group-item list-group-item-action" href="/Logout">Logout</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">

                                <div class="profile-picture">
                                    <img src="/assets/FotoAcara/Event2.png" alt=""
                                        class="d-block ui-w-80 profile-picture">
                                </div>



                                <div class="media-body ml-4">
                                    <div class="alert alert-warnings mt-3">
                                        Add profile picture to personalize your account.<br>

                                    </div>
                                    <label class="btn btn-custom">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;

                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value={{ Auth::user()->name }}>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="{{ Auth::user()->email }}">

                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>

                                </div>
                                {{-- <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" class="form-control" value="May 3, 1995">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="custom-select">
                                        <option>USA</option>
                                        <option selected>Canada</option>
                                        <option>UK</option>
                                        <option>Indonesia</option>
                                        <option>France</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="+0 (123) 456 7891">
                                </div> --}}

                            </div>
                        </div>
                        <div class="tab-pane fade" id="transaction-history">
                            <div class="card-body pb-2">
                                <div class="card-container">
                                    @if ($history->isEmpty())
                                        <div class="empty-history-message">No transaction history found</div>
                                    @else
                                        @foreach ($history as $item)
                                            @foreach ($item->events as $event)
                                                <a href="/{{ $event->id }}" class="card-link">
                                                    <div class="event-card">
                                                        <img src="{{ asset('assets/FotoAcara/' . $event->Photo) }}"
                                                            alt="Event Photo" class="card-image">
                                                        <div class="card-content">
                                                            <h2 class="card-title">{{ $event->Title }}</h2>
                                                            <p class="card-date">
                                                                {{ date('j F Y', strtotime($event->Date)) }}
                                                            </p>
                                                            <p class="card-location">📍 {{ $event->Location }}</p>
                                                            {{-- <p class="card-price">Rp {{ number_format($event->Price, 2) }} --}}
                                                            </p>
                                                            @foreach ($item->details as $detail)
                                                                @if ($detail->events_id == $event->id)
                                                                <p class="card-price">Total: Rp {{ number_format($event->Price * $detail->Quantity, 2) }}</p>
                                                                    <p class="card-quantity">Quantity:
                                                                        {{ $detail->Quantity }}</p>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-inputt" checked>
                                        <span class="switcher-indicatorr">
                                            <span class="switcher-yess"></span>
                                            <span class="switcher-noo"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="button" class="btn btn-custom">Save changes</button>&nbsp;
            <button type="button" class="btn btn-custom">Cancel</button>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
@endsection
