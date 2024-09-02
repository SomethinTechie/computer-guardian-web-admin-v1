<div class="header space-between no-borders std-padding">
    <h5>Products</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{$total}} </strong> products
        </div>
        <div class="left">
            <a href="#" onclick="openModal({'url':'{{route('product.create')}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Add product</a>
        </div>
    </div>

    <div class="scrollview mt-3">
        
    </div>
</div>
