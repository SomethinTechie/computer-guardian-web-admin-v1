<div style="width: 350px;">
    <form id="branchForm" action="#" method="POST">
        <div class="formSect active">
            <div class="modal-header">
                Success
            </div>
            <div class="from-group" style="padding: 0 30px 0 30px">
                <p>{{$message}}</p>
            </div>
            <div class="btns mt-3" style="margin: 0 30px 20px 30px">
                <a href="#" class="std-btn" onclick="getView({'url':'{{route('quote.show',[$quote->id])}}','view':'ajax-view','modalId':'ajaxModal'})">Done</a>
            </div>
        </div>
    </form>
</div>
