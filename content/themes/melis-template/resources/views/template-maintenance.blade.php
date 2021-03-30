{{--
  Template Name: Maintenance Template
--}}

@extends('layouts.app')
<style type="text/css">
	header, footer{
		display: none !important;
	}
	.main-content-wrap {
		padding:0 !important;
	}
</style>
@section('content')
  @while(have_posts()) @php(the_post())
    <section id="maintenance" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/404.jpg'); min-height: 762px;"></section>
  @endwhile
@endsection
