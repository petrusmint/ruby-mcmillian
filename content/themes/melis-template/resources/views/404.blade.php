@extends('layouts.app')

@section('content')
	@if (!have_posts())
		<section id="notfound">
			<div class="not-found blog-content">
				<div class="container">
					<h1 class="h2-head">Not Found</h1>
					<div class="row">
						<div class="col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">

							@if (!have_posts())
								<div class="alert alert-warning">
									Sorry, but the page you were trying to view does not exist. You can go back to <a href='/'>Home</a> page here.
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>
	@endif
@endsection