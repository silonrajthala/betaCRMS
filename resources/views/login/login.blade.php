@extends('layout.main')
@section('content')
<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
			<div class="col-sm-12 col-md-10 col-lg-8 mx-auto d-table h-100" style="max-width: 850px;">

					<div class="d-table-cell align-middle">

					<div class="row overflow-hidden shadow" style="background-color: #ffffff; border-radius: 30px;">
                    
                    <!-- Blue Side (left) -->
                    <div class="col-md-6 text-white d-flex flex-column justify-content-center align-items-center p-5"
                         style="background-color: #2563eb; border-top-right-radius: 80px; border-bottom-right-radius: 80px;">
                        <h2 class="mb-3 fw-bold">Hello, Welcome!</h2>
                        <!-- <p class="mb-4">Don't have an account?</p>
                        <a href="#" class="btn btn-outline-light px-4">Register</a> -->
                    </div>

                    <!-- Right Panel (Login Form) -->
                    <div class="col-md-6 bg-white p-5">
                        <h3 class="fw-bold text-center mb-4">Login</h3>
                        <form method="POST" action="{{ route('login.store') }}">
                            @csrf

                            <div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<div class="input-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
									<span class="input-group-text">
										<i class="fa fa-user"></i> <!-- Font Awesome user icon -->
									</span>
								</div>
								@if($errors->has('email'))
									<div class="text-danger mt-1">{{ $errors->first('email') }}</div>
								@endif
							</div>


                            <div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<div class="input-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
									<span class="input-group-text">
										<i class="fa fa-key"></i> <!-- Font Awesome user icon -->
									</span>
								</div>
								@if($errors->has('password'))
									<div class="text-danger mt-1">{{ $errors->first('password') }}</div>
								@endif
							</div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="#" class="small text-decoration-none">Forgot Password?</a>
                            </div>

                            @if($errors->has('message'))
                                <div class="text-danger text-center mb-3">{{ $errors->first('message') }}</div>
                            @endif

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                            
                        </form>
                    </div>
                </div> 
            </div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection
