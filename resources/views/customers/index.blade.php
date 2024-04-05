<div class="header space-between no-borders std-padding">
    <h5>Customers</h5>
</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{ $total }} </strong> customers
        </div>
        <div class="left">
            <a href="#" class="std-btn-sm default" onclick="openModal({'url':'{{route('customers.create')}}','modalId':'ajaxModal','method':'GET'})">Add customer</a>
        </div>
    </div>
</div>