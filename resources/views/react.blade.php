
@extends('layouts.app')

@section('content')
  <div id="greeting-container"></div>

  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    ReactDOM.render(
      React.createElement(Greeting, { name: 'Juan' }),
      document.getElementById('greeting-container')
    );
  </script>
@endsection
