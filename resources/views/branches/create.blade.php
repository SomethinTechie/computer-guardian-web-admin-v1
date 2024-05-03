<div style="width: 400px;padding: 30px">
    <form id="branchForm" action="#" method="POST">
        <div class="formSect active">
            <h2 class="mb-3">Add new branch</h2>
            <div class="from-group">
                <label for="name">Branch name</label>
                <div class="input-group">
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Enter branch name...">
                </div>
                <div class="error" data-name="name"></div>

                <label for="name">Address</label>
                <div class="input-group">
                    <input type="text" name="address" id="name" class="form-control"
                        placeholder="Enter address...">
                </div>
                <div class="error" data-name="address"></div>

                <label for="name">Telephone</label>
                <div class="input-group">
                    <input type="number" name="phone" id="name" class="form-control"
                        placeholder="Enter telephone...">
                </div>
                <div class="error" data-name="phone"></div>

                <label for="name">Email</label>
                <div class="input-group" style="border-bottom: none">
                    <input type="email" name="email" id="name" class="form-control"
                        placeholder="Enter email...">
                </div>
                <div class="error" data-name="email"></div>

                <input type="hidden" name="status" value="Active">

                <div class="btns mt-3">
                    <a href="#" class="std-btn"
                        onclick="submitForm({'url':'{{ route('branch.store') }}','formId':'branchForm','method':'POST','modalSect':'add_branch_form_sect','resView':'ajaxView'})">Save</a>
                    <a href="#" class="std-btn"
                        onclick="closeModal({'modalId':'ajaxModal'})">Cancel</a>
                </div>
            </div>
        </div>
        <div id="add_branch_form_sect" class="formSect">

            <h2 class="mb-3 text-center">Success</h2>
            <p style="text-align: center">
                Branch added successfully
            </p>
            <div class="btns mt-3">
                <a href="#" class="std-btn"
                    onclick="openModal({'url':'{{ route('branch.create') }}','modalId':'ajaxModal','method':'GET'})">Add
                    more</a>
                <a href="#" class="std-btn" onclick="closeModal({'modalId':'ajaxModal'})">Done</a>
            </div>

        </div>
    </form>
</div>
