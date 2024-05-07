<div class="" style="width: 100%;background: #f7f7f7;padding: 30px;border-radius: 4px">
    <form action="{{route('courier.store')}}" method="POST">
        @csrf
        <h3>Book collection</h3><br>
        <p class="listItem"><span style="opacity: 1">Collection address:</span> <input class="inline-input" type="text"
                placeholder="Enter collection address..." name="collection_address"></p>
        <p class="listItem"><span style="opacity: 1">Delivery address:</span> <input class="inline-input" type="text"
                placeholder="Enter delivery address..." name="delivery_address"></p>
        <p class="listItem" style="border-bottom: none"><span style="opacity: 1">Parcels:</span> <input
                class="inline-input" type="text" placeholder="Enter parcel name..." name="parcels[]"></p>
        <div class="btns mt-3 col-md-2">
            <input type="submit">
            <a href="#" class="std-btn" >Book collection</a>
        </div>
    </form>
</div>
