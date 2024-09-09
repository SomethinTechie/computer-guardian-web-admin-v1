<div style="width: 500;">
    <form id="branchForm" action="#" method="POST">
        <div class="formSect active">
            <div class="modal-header">
                Product
            </div>
            <div class="from-group" style="padding: 0 30px 0 30px">
                <img src="{{ asset('products/' . $product->image) }}" alt="Product Image" style="width: 400px">
                <p class="" style="padding-top: 0">{{$product->name}}</p>
                <p class="">{{$product->description}}</p>
                <p class="">{{$product->price}}</p>
            </div>
            <div class="btns mt-3" style="margin: 0 30px 20px 30px">
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('products.index')}}','view':'ajax-view','modalId':'ajaxModal'})">close</a>
            </div>
        </div>
    </form>
</div>
