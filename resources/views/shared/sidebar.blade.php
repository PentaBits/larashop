<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
<!--    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    Sportswear
                </a>
            </h4>
        </div>
        <div id="sportswear" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <li><a href="{{url('products/brands/nike/sportswear')}}">Nike </a></li>
                    <li><a href="{{url('products/brands/under-armour/sportswear')}}">Under Armour </a></li>
                    <li><a href="{{url('products/brands/adidas/sportswear')}}">Adidas </a></li>
                    <li><a href="{{url('products/brands/puma/sportswear')}}">Puma</a></li>
                    <li><a href="{{url('products/brands/asics/sportswear')}}">ASICS </a></li>
                </ul>
            </div>
        </div>
    </div>-->
<!--    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    Mens
                </a>
            </h4>
        </div>
        <div id="mens" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <li><a href="{{url('products/brands/fendi/mens')}}">Fendi</a></li>
                    <li><a href="{{url('products/brands/guess/mens')}}">Guess</a></li>
                    <li><a href="{{url('products/brands/valentino/mens')}}">Valentino</a></li>
                    <li><a href="{{url('products/brands/dior/mens')}}">Dior</a></li>
                    <li><a href="{{url('products/brands/versace/mens')}}">Versace</a></li>
                    <li><a href="{{url('products/brands/armani/mens')}}">Armani</a></li>
                    <li><a href="{{url('products/brands/prada/mens')}}">Prada</a></li>
                    <li><a href="{{url('products/brands/nike/mens')}}dole-and-gabbana">Dolce and Gabbana</a></li>
                    <li><a href="{{url('products/brands/chanel/mens')}}">Chanel</a></li>
                    <li><a href="{{url('products/brands/gucci/mens')}}">Gucci</a></li>
                </ul>
            </div>
        </div>
    </div>-->

<!--    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    Womens
                </a>
            </h4>
        </div>
        <div id="womens" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <li><a href="{{url('products/brands/fendi/womens')}}">Fendi</a></li>
                    <li><a href="{{url('products/brands/guess/womens')}}">Guess</a></li>
                    <li><a href="{{url('products/brands/valentino/womens')}}">Valentino</a></li>
                    <li><a href="{{url('products/brands/dior/womens')}}">Dior</a></li>
                    <li><a href="{{url('products/brands/versace/womens')}}">Versace</a></li>
                </ul>
            </div>
        </div>
    </div>-->


@if($categories)
@foreach($categories as $category )
<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#{{$category->name}}">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    {{$category->name}}
                </a>
            </h4>
        </div>
        <div id="{{$category->name}}" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <li><a href="{{url('products/brands/nike/sportswear')}}">Nike </a></li>
                    <li><a href="{{url('products/brands/under-armour/sportswear')}}">Under Armour </a></li>
                    <li><a href="{{url('products/brands/adidas/sportswear')}}">Adidas </a></li>
                    <li><a href="{{url('products/brands/puma/sportswear')}}">Puma</a></li>
                    <li><a href="{{url('products/brands/asics/sportswear')}}">ASICS </a></li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
@endif




<!--    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('products/categories/fashion')}}">Fashion</a></h4>
        </div>
    </div>-->
<!--    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('products/categories/households')}}">Households</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('products/categories/interiors')}}">Interiors</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('products/categories/clothing')}}">Clothing</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('products/categories/bags')}}">Bags</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('products/categories/shoes')}}">Shoes</a></h4>
        </div>
    </div>-->
</div><!--/category-products-->
@if($brands)
<div class="brands_products"><!--brands_products-->
    <h2>Brands</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            @foreach($brands as $brand)
            <li><a href="{{url("products/brands/$brand->name")}}"> <span class="pull-right">(50)</span>{{$brand->name}}</a></li>
            
            @endforeach
        </ul>
    </div>
</div><!--/brands_products-->
@endif
<div class="shipping text-center"><!--shipping-->
    <img src="{{asset('images/home/shipping.jpg')}}" alt="" />
</div><!--/shipping-->