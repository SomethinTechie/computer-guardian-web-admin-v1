<div>
    <form id="branchForm" action="#" method="POST">
        <div class="formSect active" style="width: 400px;">
            <div class="modal-header">
                Service
            </div>
            <div class="from-group" style="padding: 10px 30px 30px 30px">
                <label for="name">Service name</label>
                <div class="input-group">
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Enter branch name..." value="{{$service->name}}">
                </div>
                <div class="error" data-name="name"></div>

                <label for="name">Status</label>
                <div class="input-group" style="padding-right: 20px">
                    <select name="status" id="">
                        <option value="{{$service->status}}">{{$service->status}}</option>
                        <option value="Disabled">Disabled</option>
                    </select>
                </div>
                <div class="error" data-name="address"></div>

                <div class="btns mt-3">
                    <a href="#" class="std-btn"
                        onclick="submitForm({'url':'{{ route('service.update',[$service->id]) }}','formId':'branchForm','method':'POST','modalSect':'add_branch_form_sect','resView':'ajaxView'})">Save</a>
                    <a href="#" class="std-btn"
                        onclick="closeModal({'modalId':'ajaxModal'})">Cancel</a>
                </div>
            </div>
        </div>
        <div id="add_branch_form_sect" class="formSect" style="width: 350px;">

            <div class="modal-header">Success</div>
            <p style="text-align: center;padding: 20px 30px 0 30px">
                Service updated successfully
            </p>
            <div class="btns" style="margin: 20px">
                <a href="#" class="std-btn" onclick="getView({'url':'/admin/services','view':'ajax-view','modalId':'ajaxModal'})">Done</a>
            </div>

        </div>
    </form>
</div>
