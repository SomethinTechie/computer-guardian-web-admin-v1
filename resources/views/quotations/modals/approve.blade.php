<div style="width: 300px">
    <div class="formSect active">
        <div class="modal-header bb1">Confirm approval</div>
        <p>Are you sure you want to approve this quote, if yes click continue.</p>
        <form id="approveQuoteForm" action="">

        </form>
        <div class="btns" style="margin: 20px">
            <a href="#" class="std-btn" onclick="closeModal({'modalId':'approveQuote'})">Cancel</a>
            <a href="#" class="std-btn" onclick="openModal({'url':'{{route('quote.approve',[$quote->id])}}','modalId':'ajaxModal','method':'GET'})">Continue</a>
        </div>
    </div>
    <div id="quoteApprovalSuccess" class="formSect">
        <div class="modal-header bb1">Success</div>
        <p>Quote approved successfully</p>
        <div class="btns" style="margin: 20px">
            <a href="#" class="std-btn" onclick="closeModal({'modalId':'approveQuote'})">Close</a>
        </div>
    </div>
</div>
