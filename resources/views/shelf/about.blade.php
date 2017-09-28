@extends('layouts.public')

@section('content')

	<div class="breadcrumbs">
		<div class="container">
			<small><a href="/">Acervo EAD</a> &raquo; Sobre </small>
		</div>
	</div>

	<div class="container" id="container">
		<div class="col-xs-12 col-md-6 sobre center">
			<img src="{{asset('/teste-sead.png')}}"/>
		</div>
		<div class="col-xs-12 col-md-6 sobre">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut congue pulvinar urna, sit amet cursus neque fermentum eget. Morbi ut tempus nibh. In hendrerit lorem eget odio scelerisque pharetra. Nunc maximus ante quis magna congue, ut lacinia neque rutrum. In hac habitasse platea dictumst. Curabitur scelerisque, neque at pellentesque aliquam, arcu risus pharetra leo, in posuere augue arcu quis odio.</p>

			<p>Proin nibh magna, ultrices eget pellentesque id, aliquam ac nibh. Maecenas auctor justo dolor, eget ornare purus tincidunt a. Pellentesque suscipit, massa eget lobortis varius, urna massa tristique diam, ut aliquet velit urna sed felis. Nulla libero arcu, pharetra id orci in, volutpat tempus lorem. Donec sapien odio, suscipit quis ipsum a, maximus rhoncus nisi. In hac habitasse platea dictumst. Praesent auctor risus et elit dignissim, a porttitor quam aliquet.</p>
		</div>
	</div>
	
@endsection
