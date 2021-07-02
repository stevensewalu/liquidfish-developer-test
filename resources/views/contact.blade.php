@extends('layouts.layout')
@section('form')
    <div class="row">
        <div class="col"><strong>Send us a message</strong></div>
        <form class="form-content" id="form" role="form">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="first-name">First name</label>
                        <input type="text" id="first-name" name="firstName" class="form-control" required>
                    </div><br />
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="last-name">Last name</label>
                        <input type="text" id="last-name" name="lastName" class="form-control" required>
                    </div><br />
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="phone">Phone </label>
                            <span class="help-block">Optional</span>
                        </div>
                        <input type="tel" id="phone" name="phone" class="form-control">
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" required>
                    </div><br />
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="message">Message </label>
                            <span class="help-block">Max: 500 Characters</span>
                        </div>

                        <textarea name="message" id="message" class="form-control" maxlength="500" rows="5" required></textarea>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <div class="row d-flex justify-content-end">
                <div class="spinner-border text-primary" id="spinner"  role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <button type="submit" class="col-sm col-xs-12 col-sm-12 col-md-12 col-lg-1 btn btn-primary submit">Submit</button>
            </div>
        </form>

    </div>
@endsection

@section('info')
    <div class="row">
        <div class="col-12">
            <strong class="white">Contact Information</strong>
            <ul>
                <li><i class="bi-telephone"></i> +1 (555) 123-4567</li>
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
