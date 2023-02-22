<body>
   
    <div id="app">
    
        {{--<skeleton-loading :mensaje="'Hola mundo'" ></skeleton-loading>--}}

        <div class="" style="height: 900px"></div>
        
                <skeleton-text 
                    :ref-text = {{ json_encode( Str::random(10) ) }}
                    :text = {{ json_encode( 'Holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa' ) }}
                    :width-text="200"
                    :height-text="40">
                </skeleton-text>    
        
        <br><br><br><br>

        @for ( $i = 0; $i < 15; $i++ )
            
                <skeleton-image 
                :ref-imagen= {{ json_encode( Str::random(10) ) }}
                :url-imagen="{{ json_encode( 'https://picsum.photos/1000/400?random='.$i ) }}" 
                :width-imagen="1000"
                :height-imagen="400"
                ></skeleton-image>
            
            @endfor

        {{--<inter-component></inter-component>--}}

    </div>  
   
    
<script src="{{ asset('js/app.js') }}"></script>

</body>

