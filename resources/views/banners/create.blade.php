<div style="width: 400px;">
    <form id="branchForm" action="#" method="POST">
        @csrf
        <div class="formSect active">
            <div class="modal-header">
                New Banner
            </div>
            <div class="from-group" style="padding: 0 30px 20px 30px">
                <label for="name">Banner name</label>
                <div class="input-group">
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Enter product name...">
                </div>
                <div class="error" data-name="name"></div>

                <label for="name">Caption</label>
                <div class="input-group">
                    <input type="text" name="caption" id="name" class="form-control"
                        placeholder="Enter caption...">
                </div>
                <div class="error" data-name="caption"></div>

                <label for="name">Upload banner image</label>
                <div class="input-group">
                    <input type="file" name="image" id="name" class="form-control" style="padding: 10px">
                </div>
                <div class="error" data-name="image"></div>

                <input type="hidden" name="status" value="In stock">

                <div class="btns mt-3">
                    <a href="#" class="std-btn"
                        onclick="submitForm({'url':'{{ route('banner.store') }}','formId':'branchForm','method':'POST','modalSect':'add_branch_form_sect','resView':'ajaxView'})">Create</a>
                    <a href="#" class="std-btn"
                        onclick="closeModal({'modalId':'ajaxModal'})">Cancel</a>
                </div>
            </div>
        </div>
        <div id="add_branch_form_sect" class="formSect">

            <div class="modal-header">
                Success
            </div>
            <p style="text-align: center">
                Banner added successfully
            </p>
            <div class="btns mt-3" style="margin: 0 30px 20px 30px">
                <a href="#" class="std-btn"
                    onclick="openModal({'url':'{{ route('banner.create') }}','modalId':'ajaxModal','method':'GET'})">Add
                    more</a>
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('banners.index')}}','view':'ajax-view','modalId':'ajaxModal'})">Done</a>
            </div>

        </div>
    </form>
</div>
