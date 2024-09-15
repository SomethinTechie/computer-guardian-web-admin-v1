<div style="width: 350px;">
    <form id="branchForm" action="#" method="POST">
        <div class="formSect active">
            <div class="modal-header">
                Confirm delete
            </div>
            <div class="from-group" style="padding: 0 30px 0 30px">
                <p>You are about to delete this customer, <strong>{{$customer->name}}</strong>?</p>
            </div>
            <div class="btns mt-3" style="margin: 0 30px 20px 30px">
                <a href="#" class="std-btn"
                    onclick="openModal({'url':'{{ route('customer.delete',[$customer->id]) }}','modalId':'ajaxModal','method':'GET'})">Delete</a>
                    <a href="#" class="std-btn"
                        onclick="closeModal({'modalId':'ajaxModal'})">Cancel</a>
            </div>
        </div>
        <div id="add_branch_form_sect" class="formSect">

            <h2 class="mb-3 text-center">Success</h2>
            <p style="text-align: center">
                Customer deleted successfully.
            </p>
            <div class="btns mt-3" style="padding: 0 30px 20px 30px">
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('customers.index')}}','view':'ajax-view','modalId':'ajaxModal'})" style="border-right: none">Done</a>
            </div>

        </div>
    </form>
</div>
