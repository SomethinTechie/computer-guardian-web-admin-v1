<div style="width: 400px;">
    <form id="branchForm" action="#" method="POST">
        <div class="formSect active">
            <div class="modal-header">
                Edit customer
            </div>
            <div class="from-group" style="padding: 10px 30px 30px 30px">
                <label for="name">Name</label>
                <div class="input-group">
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Enter branch name..." value="{{$customer->name}}">
                </div>
                <div class="error" data-name="name"></div>

                <label for="name">Email</label>
                <div class="input-group">
                    <input type="text" name="email" id="name" class="form-control"
                        placeholder="Enter address..." value="{{$customer->email}}">
                </div>
                <div class="error" data-name="email"></div>

                <label for="name">Cellphone</label>
                <div class="input-group">
                    <input type="number" name="cellphone" id="name" class="form-control"
                        placeholder="Enter telephone..." value="{{$customer->cellphone}}">
                </div>
                <div class="error" data-name="cellphone"></div>

                <div class="btns mt-3">
                    <a href="#" class="std-btn"
                        onclick="submitForm({'url':'{{ route('customer.update',[$customer->id]) }}','formId':'branchForm','method':'POST','modalSect':'add_branch_form_sect','resView':'ajaxView'})">edit</a>
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
                Customer edited successfully
            </p>
            <div class="btns mt-3" style="margin: 0 30px 20px 30px">
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('customers.index')}}','view':'ajax-view','modalId':'ajaxModal'})">Done</a>
            </div>

        </div>
    </form>
</div>
