<div style="width: 400px;padding: 30px">
    <form id="serviceForm" action="#" method="POST">
        <div class="formSect active">
            <h2 class="mb-3">Add new service</h2>
            <div class="from-group">
                <label for="name">Service name</label>
                <div class="input-group" style="border: none">
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
            <h2 class="mb-3 text-center">Success</h2>
            <p style="text-align: center">
                Service added successfully
            </p>
            <div class="btns mt-3">
                <a href="#" class="std-btn"
                    onclick="openModal({'url':'{{ route('service.create') }}','modalId':'ajaxModal','method':'GET'})">Add
                    more</a>
                <a href="#" class="std-btn" onclick="closeModal({'modalId':'ajaxModal'})">Done</a>
            </div>
        </div>
    </form>
</div>
