<script src="{{ asset('/js/systemjs/dist/system.js') }}"></script>
<script>
SystemJS.config({
    baseURL : '/',
    packages : {
        '/' : {
            defaultExtension: 'js'
        }
    }    
});
System.import('/assets/companies/site/app/{{ $file }}')
    .then(null, console.error.bind(console));
</script>
