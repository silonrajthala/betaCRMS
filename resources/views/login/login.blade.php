@extends('layout.main')
@section('content')
<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome To betaCRMS Panel Access</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
									<!-- rounded-circle -->
										<!-- <img src="{{asset('assets/img/logo.png')}}" alt="Charles Hall" class="img-fluid " width="132" height="132" />  -->
									</div>
									<form method="post" action="{{ route('login.store') }}">
                                    {{ csrf_field() }}

										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your  email" />
											@if($errors->has('email'))
												<span class="help-block">
													<strong class="text-danger">{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											@if($errors->has('password'))
												<span class="help-block">
													<strong class="text-danger">{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
										
										<div class="text-center mt-3">
											@if($errors->has('message'))
												<span class="help-block">
													<strong class="text-danger">{{$errors->first('message')}}</strong>
												</span><br/>
											@endif
											<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
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
