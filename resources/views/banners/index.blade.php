<div class="header space-between no-borders std-padding">
    <h5>Banners</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{$total}} </strong> banners
        </div>
        <div class="left">
            <a href="#" onclick="openModal({'url':'{{route('banner.create')}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Add banner</a>
        </div>
    </div>

    <div class="scrollview mt-3">
        @if (count($banners) > 0)
            @forEach($banners as $banner)
                <div class="banner">
                    <img src="{{asset('banners/' . $banner->image)}}" alt="" style="width: 400px">
                    <div class="listItem space-between">
                        {{$banner->name}}
                        <a href="#" onclick="openModal({'url':'{{route('banner.delete.modal',[$banner->id])}}','modalId':'ajaxModal','method':'GET'})"
                                class="std-btn-sm default"><i class="bi bi-trash"></i></a>
                    </div>
                    <div class="listItem" style="border-bottom: none">{{$banner->caption}}</div>
                </div>
            @endforeach
        @else
            <div class="message">
                <p>No banners added yet</p>
            </div>
        @endif
    </div>
</div>
