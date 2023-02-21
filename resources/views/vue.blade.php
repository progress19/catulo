<body>
   
    <div id="app">
    
        {{--<skeleton-loading :mensaje="'Hola mundo'" ></skeleton-loading>--}}

        <skeleton-image 
        :url-imagen="{{ json_encode(asset('images/CatuloTango-2.svg')) }}" 
        :width-imagen="1000"
        :height-imagen="400"
        ></skeleton-image>
            
    </div>  
    
<script src="{{ asset('js/app.js') }}"></script>

</body>

