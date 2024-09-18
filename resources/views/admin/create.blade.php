<div class="formSect active" style="width: 400px">
    <div class="modal-header bb1">
        <strong>ADD USER</strong>
    </div>
    <form id="newUserForm" action="#" style="padding: 20px 30px;">
        @csrf
        <div class="form-group">
            <label for="name" style="margin-top: 0">Name</label>
            <div class="input-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter customer name...">
            </div>
        </div>
        <div class="error" data-name="name"></div>
        <div class="form-group">
            <label for="name">Email</label>
            <div class="input-group">
                <input type="text" name="email" id="name" class="form-control" placeholder="Enter email address...">
            </div>
        </div>
        <div class="error" data-name="email"></div>

        <input type="hidden" value="Admin" name="role">
        <div class="form-group">
            <label for="name">Mobile number</label>
            <div class="input-group">
                <input type="text" name="cellphone" id="name" class="form-control" placeholder="Enter mobile number...">
            </div>
        </div>
        <div class="error" data-name="cellphone"></div>

        <input type="hidden" value="Admin" name="role">

        <div class="form-group">
            <label for="name">Temporary password</label>
            <div class="input-group">
                <input type="password" name="password" id="name" class="form-control" placeholder="Enter password...">
            </div>
        </div>
        <div class="error" data-name="password"></div>
    </form>
    <div class="btns" style="margin: 0 30px 20px 30px">
        <a href="#" class="std-btn default" onclick="submitForm({'url':'{{ route('admin.user.store') }}','formId':'newUserForm','method':'POST','modalSect':'add_branch_form_sect','resView':'ajaxView'})">ADD USER</a>
        <a href="#" class="std-btn default" onclick="closeModal({'modalId':'ajaxModal'})">Cancel</a>
    </div>
</div>
<div id="add_branch_form_sect" class="formSect" style="width: 350px">

    <div class="modal-header">
        Success
    </div>
    <p style="text-align: center">
        User created successfully.
    </p>
    <div class="btns mt-3" style="margin: 0 30px 20px 30px">
        <a href="#" class="std-btn"
            onclick="openModal({'url':'{{ route('admin.user.create') }}','modalId':'ajaxModal','method':'GET'})">Add
            more</a>
        <a href="#" class="std-btn" onclick="getView({'url':'{{route('admin.users')}}','view':'ajax-view','modalId':'ajaxModal'})">Done</a>
    </div>

</div>