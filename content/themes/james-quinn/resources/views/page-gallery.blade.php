@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())
    
    <section id="gallery">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gallery-cont">
                            {!! do_shortcode('[foogallery id="450"]') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	@endwhile
@endsection