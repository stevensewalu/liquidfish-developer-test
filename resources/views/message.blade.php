@extends('layouts.layout')
@section('form')
    <div class="row">
        <div class="col">
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Full Name</th>
                    <td>{{ $firstName . ' '. $lastName  }}</td>

                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $email  }}</td>

                </tr>
                <tr>
                    <th scope="row">Phone</th>
                    <td>{{  $phone ? :'N/A'  }}</td>

                </tr>
                <tr>
                    <th scope="row">Subject</th>
                    <td>{{ $subject  }}</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <b>Message: </b><div class="space"></div>
                        <code> {{ $message  }}</code>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Sent At</th>
                    <td>{{ date('d D, M Y H:i', strtotime($created_at)) }}</td>
                </tr>
                </tbody>
            </table>
            <div class="space"></div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary btn-sm" href="{{ url('/') }}"> <i class="fas fa-arrow-left"></i> Back to Main Contact Page</a>
            </div>

        </div>

    </div>
@endsection

@section('info')
    <div class="row">
        <div class="col-12">
            <strong class="white">Contact Information</strong>
            <ul>
                <li><i class="bi-telephone"></i> +256 712 900 030</li>
                <li><i class="bi-envelope"></i> support@liquidfish.com</li>
            </ul>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-4"><i class="fab fa-facebook-square fa-lg"></i></div>
                        <div class="col-4"><i class="fab fa-github fa-lg"></i></div>
                        <div class="col-4"><i class="fab fa-twitter fa-lg"></i></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
