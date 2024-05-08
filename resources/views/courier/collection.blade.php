<div class="" style="width: 100%;background: #f7f7f7;padding: 30px;border-radius: 4px">
    <form action="{{ route('courier.create.collection') }}" method="POST">
        @csrf
        <h4>Book collection</h4><br>
        <p class="listItem" style="border-bottom: none">
            <span style="opacity: 1">
                Approved quote:
            </span>
            <select name="" id="">
                <option value="">Select approved quote</option>
                @foreach ($quotes as $quote)
                    <option value="{{ $quote->device }}">{{ $quote->device }}</option>
                @endforeach
            </select>
        </p>


        <p class="mt-4" style="font-size: 10px;opacity: .7;">COLLECTION ADDRESS & CONTACT PERSON</p>
        <p class="listItem">
            <span style="opacity: 1">Street address:</span>
            <input class="inline-input" type="text" placeholder="Enter street address..." name="street_address">
        </p>
        <p class="listItem">
            <span style="opacity: 1">Name:</span>
            <input class="inline-input" type="text" placeholder="Enter contact name..." name="name">
        </p>
        <p class="listItem">
            <span style="opacity: 1">Mobile number:</span>
            <input class="inline-input" type="text" placeholder="Enter mobile number..." name="mobile_number">
        </p>
        <p class="listItem" style="border-bottom: none">
            <span style="opacity: 1">Email:</span>
            <input class="inline-input" type="text" placeholder="Enter email..." name="email">
        </p>

        <p class="mt-4" style="font-size: 10px;opacity: .7;">DELIVERY ADDRESS & CONTACT PERSON</p>
        <p class="listItem">
            <span style="opacity: 1">Street address:</span>
            <input class="inline-input" type="text" placeholder="Enter street address..." name="street_address">
        </p>
        <p class="listItem">
            <span style="opacity: 1">Name:</span>
            <input class="inline-input" type="text" placeholder="Enter contact name..." name="name">
        </p>
        <p class="listItem">
            <span style="opacity: 1">Mobile number:</span>
            <input class="inline-input" type="text" placeholder="Enter mobile number..." name="mobile_number">
        </p>
        <p class="listItem" style="border-bottom: none">
            <span style="opacity: 1">Email:</span>
            <input class="inline-input" type="text" placeholder="Enter email..." name="email">
        </p>

        <p class="mt-4" style="font-size: 10px;opacity: .7;">Parcel</p>
        <p class="listItem">
            <span style="opacity: 1">Street address:</span>
            <input class="inline-input" type="text" placeholder="Enter street address..." name="street_address">
        </p>
        <p class="listItem">
            <span style="opacity: 1">Name:</span>
            <input class="inline-input" type="text" placeholder="Enter contact name..." name="name">
        </p>
        <p class="listItem">
            <span style="opacity: 1">Mobile number:</span>
            <input class="inline-input" type="text" placeholder="Enter mobile number..." name="mobile_number">
        </p>
        <p class="listItem" style="border-bottom: none">
            <span style="opacity: 1">Email:</span>
            <input class="inline-input" type="text" placeholder="Enter email..." name="email">
        </p>

        <div class="btns mt-4" style="width: 170px">
            <input type="submit">
            <a href="#" class="std-btn">Book collection</a>
        </div>
    </form>
</div>
