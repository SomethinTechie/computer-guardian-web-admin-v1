<div class="" style="width: 300px;padding: 20px">
    <strong><h3>{{$repair->user->name}} <br>Customer no: {{$repair->user->customer_number}}</h3></strong>
    <img src="{{ $dataUri }}" alt="QR Code" style="width: 100%">
    <div class="btns mt-2" id="printBtns">
        <a id="printBtn" href="#" class="std-btn" onclick="handlePrint(); return false;">Print</a>
        <a href="#" onclick="closeModal({'modalId':'ajaxModal'})" class="std-btn">close</a>
    </div>
</div>
