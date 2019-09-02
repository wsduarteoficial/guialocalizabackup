<section>
    <div class="container-fluid" data-load="true">
        <div class="row margin-pagination">           

            {!! 
                $companies->appends(Request::only('q'))
                    ->appends(Request::only('state'))
                    ->appends(Request::only('city'))
                    ->render() 
            !!}
            
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<hr>