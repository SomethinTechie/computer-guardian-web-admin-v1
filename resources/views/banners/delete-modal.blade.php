<div style="width: 350px;">
    <form id="branchForm" action="#" method="POST">
        <div class="formSect active">
            <div class="modal-header">
                Confirm delete
            </div>
            <div class="from-group" style="padding: 0 30px 0 30px">
                <p>You are about to delete this banner, <strong>{{$banner->name}}</strong>?</p>
            </div>
            <div class="btns mt-3" style="margin: 0 30px 20px 30px">
                <a href="#" class="std-btn"
                    onclick="openModal({'url':'{{ route('banner.delete',[$banner->id]) }}','modalId':'ajaxModal','method':'GET'})">Delete</a>
                    <a href="#" class="std-btn"
                        onclick="closeModal({'modalId':'ajaxModal'})">Cancel</a>
            </div>
        </div>
        <div id="add_branch_form_sect" class="formSect">

            <h2 class="mb-3 text-center">Success</h2>
            <p style="text-align: center">
                Banner added successfully
            </p>
            <div class="btns mt-3" style="padding: 0 30px 20px 30px">
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('banners.index')}}','view':'ajax-view','modalId':'ajaxModal'})" style="border-right: none">Done</a>
            </div>

        </div>
    </form>
</div>