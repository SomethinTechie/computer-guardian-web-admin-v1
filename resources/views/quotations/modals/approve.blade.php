<div style="width: 300px">
    <div class="formSect active">
        <div class="modal-header bb1">confirm approval</div>
        <p>Are you sure you want to approve this quote, if yes click continue.</p>
        <form id="approveQuoteForm" action="">

        </form>
        <div class="btns" style="margin: 20px">
            <a href="#" class="std-btn" onclick="closeModal({'modalId':'approveQuote'})">Cancel</a>
            <a href="#" class="std-btn" onclick="getView({'url':'{{route('quote.approve',[$quote->id])}}','view':'ajax-view','modalId':'ajaxModal'})">Continue</a>
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
