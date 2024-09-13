<div style="width: 500;">
    <form id="branchForm" action="#" method="POST">
        <div class="formSect active">
            <div class="modal-header">
                Banner
            </div>
            <div class="from-group" style="padding: 0 30px 0 30px">
                <img src="{{ asset('banners/' . $banner->image) }}" alt="Product Image" style="width: 400px">

                <div class="input-group">
                    <input name="image" type="file" value="{{$banner->image}}">
                </div>
                <div class="input-group mt-2">
                    <input name="name" type="text" value="{{$banner->name}}">
                </div>
                <div class="input-group mt-2">
                    <input name="caption" type="text" value="{{$banner->caption}}">
                </div>
            </div>
            <div class="btns mt-3" style="margin: 0 30px 20px 30px">
                <a href="#" class="std-btn" onclick="submitForm({'url':'{{ route('banner.update',[$banner->id]) }}','formId':'branchForm','method':'POST','modalSect':'add_branch_form_sect','resView':'ajaxView'})">Update</a>
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('banners.index')}}','view':'ajax-view','modalId':'ajaxModal'})">close</a>
            </div>
        </div>

        <div id="add_branch_form_sect" class="formSect">

            <div class="modal-header">
                Success
            </div>
            <p style="text-align: center">
                Banner updated successfully  <br> successfully.
            </p>
            <div class="btns mt-3" style="margin: 0 30px 20px 30px">
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('banners.index')}}','view':'ajax-view','modalId':'ajaxModal'})">Done</a>
            </div>

        </div>

    </form>
</div>
