<!DOCTYPE html>
<html>
<head>
    <title>Barcode</title>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

</body>
</html>



<div class="row">
    <a href="{{ route('htmltopdfview',['download'=>'pdf']) }}">Download PDF</a>

</div>

{{-- {!! DNS1D::getBarcodeHTML("4445645656", "CODABAR")!!}
{!! DNS1D::getBarcodeHTML("4445645656", "CODABAR")!!} --}}

<div class="row">
        @foreach ($products as $product)

        <div class="col-md-3">
            <div style="">{!! DNS1D::getBarcodeHTML($product->barcode_number, "CODABAR")!!} </div>
            <p>{{ $product->barcode_number }}</p> <br> <br><br>
        </div>
        @endforeach

</div>


<style type="text/css">
    .row{
        margin:0px;
    }
    h2{
        margin-top:px;
    }
</style>