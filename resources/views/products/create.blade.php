<div style="width: 400px;padding: 30px">
    <form id="branchForm" action="#" method="POST">
        @csrf
        <div class="formSect active">
            <h2 class="mb-3">Add new branch</h2>
            <div class="from-group">
                <label for="name">Product name</label>
                <div class="input-group">
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Enter product name...">
                </div>
                <div class="error" data-name="name"></div>

                <label for="name">Description</label>
                <div class="input-group">
                    <input type="text" name="description" id="name" class="form-control"
                        placeholder="Enter description...">
                </div>
                <div class="error" data-name="description"></div>

                <label for="name">Price</label>
                <div class="input-group">
                    <input type="number" name="price" id="name" class="form-control"
                        placeholder="Enter price...">
                </div>
                <div class="error" data-name="price"></div>

                <label for="name">Quantity</label>
                <div class="input-group" style="border-bottom: none">
                    <input type="number" name="quantity" id="name" class="form-control"
                        placeholder="Enter quantity...">
                </div>

                <label for="name">Upload product image</label>
                <div class="input-group" style="border-bottom: none">
                    <input type="file" name="image" id="name" class="form-control" style="padding: 10px">
                </div>
                <div class="error" data-name="image"></div>

                <input type="hidden" name="status" value="In stock">

                <div class="btns mt-3">
                    <a href="#" class="std-btn"
                        onclick="submitForm({'url':'{{ route('product.store') }}','formId':'branchForm','method':'POST','modalSect':'add_branch_form_sect','resView':'ajaxView'})">Create</a>
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
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('branch.index')}}','view':'ajax-view','modalId':'ajaxModal'})">Done</a>
            </div>

        </div>
    </form>
</div>
