<div>
    <form id="branchForm" action="#" method="POST">
        <div class="formSect active" style="width: 400px;">
            <div class="modal-header">
                Edit branch
            </div>
            <div class="from-group" style="padding: 10px 30px 30px 30px">
                <label for="name">Branch name</label>
                <div class="input-group">
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Enter branch name..." value="{{$branch->name}}">
                </div>
                <div class="error" data-name="name"></div>

                <label for="name">Address</label>
                <div class="input-group">
                    <input type="text" name="address" id="name" class="form-control"
                        placeholder="Enter address..."  value="{{$branch->address}}">
                </div>
                <div class="error" data-name="address"></div>

                <label for="name">Telephone</label>
                <div class="input-group">
                    <input type="number" name="phone" id="name" class="form-control"
                        placeholder="Enter telephone..." value="{{$branch->phone}}">
                </div>
                <div class="error" data-name="phone"></div>

                <label for="name">Email</label>
                <div class="input-group">
                    <input type="email" name="email" id="name" class="form-control"
                        placeholder="Enter email..." value="{{$branch->email}}">
                </div>
                <div class="error" data-name="email"></div>

                <input type="hidden" name="status" value="Active">

                <div class="btns mt-3">
                    <a href="#" class="std-btn"
                        onclick="submitForm({'url':'{{ route('branch.update',[$branch->id]) }}','formId':'branchForm','method':'POST','modalSect':'add_branch_form_sect','resView':'ajaxView'})">Save</a>
                    <a href="#" class="std-btn"
                        onclick="closeModal({'modalId':'ajaxModal'})">Cancel</a>
                </div>
            </div>
        </div>
        <div id="add_branch_form_sect" class="formSect" style="width: 350px;">

            <div class="modal-header">Success</div>
            <p style="text-align: center;padding: 20px 30px 0 30px">
                Branch updated successfully
            </p>
            <div class="btns" style="margin: 20px">
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('branch.index')}}','view':'ajax-view','modalId':'ajaxModal'})">Done</a>
            </div>

        </div>
    </form>
</div>
