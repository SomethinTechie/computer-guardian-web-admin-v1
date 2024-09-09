<div style="width: 400px;">
    <form id="serviceForm" action="#" method="POST">
        <div class="formSect active">
            
            <div class="modal-header">
                Add new service
            </div>
            <div class="from-group" style="padding: 0 30px 20px 30px">
                <label for="name">Service name</label>
                <div class="input-group">
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Enter service name...">
                </div>
                <div class="error" data-name="name"></div>

                <input type="hidden" name="status" value="Active">

                <div class="btns mt-3">
                    <a href="#" class="std-btn"
                        onclick="submitForm({'url':'{{ route('service.store') }}','formId':'serviceForm','method':'POST','modalSect':'serviceFormSect','resView':'ajaxView'})">Save</a>
                    <a href="#" class="std-btn" onclick="closeModal({'modalId':'ajaxModal'})">Cancel</a>
                </div>
            </div>
        </div>
        <div id="serviceFormSect" class="formSect">
            <div class="modal-header">
                Success
            </div>
            <p style="text-align: center;padding: 30px 30px 0 30px">
                Service added successfully
            </p>
            <div class="btns mt-3" style="margin: 0 30px 20px 30px">
                <a href="#" class="std-btn"
                    onclick="openModal({'url':'{{ route('service.create') }}','modalId':'ajaxModal','method':'GET'})">Add
                    more</a>
                <a href="#" class="std-btn"  onclick="getView({'url':'/admin/services','view':'ajax-view','modalId':'ajaxModal'})">Done</a>
            </div>
        </div>
    </form>
</div>
