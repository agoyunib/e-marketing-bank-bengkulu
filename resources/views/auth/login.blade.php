<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>E-Marketing - Bank Bengkulu</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('assets/login/css/style.css') }}" />
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="d-flex align-items-center " style="height: 100vh">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 p-5 p-md-0" >
                        <div class="mb-4">
                            <h1>E-Marketing</h1>
                            <h4>Bank Bengkulu</h4>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf 
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="Email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                />
                                <small
                                    id="emailHelp"
                                    class="form-text text-muted"
                                    >Masukan email yang telah didaftarkan.</small
                                >
                            </div>
                            <div class="form-group">
                                <label for="password"
                                    >Kata Sandi</label
                                >
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    placeholder="Kata Sandi"
                                    required autocomplete="current-password"
                                />
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">
                                Masuk
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
