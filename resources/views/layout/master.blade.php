@include('layout.head')
@include('layout.nav')
    @show

    <div class="container">
      <div class="starter-template">

		@if($errors->any())
		    <div class="alert alert-danger">
		        @foreach($errors->all() as $error)
		            <p>{{ $error }}</p>
		        @endforeach
		    </div>
		@endif
		
		@if (!empty(session('success')))
		    <div class="alert alert-success">
		        <p>{{ session('success') }}</p>
		    </div>
		@endif	      	

        @yield('content')
        
      </div>
    </div><!-- /.container -->

@include('layout.footer')