<div class="header space-between no-borders std-padding">
    <h5>Parcels</h5>

</div>
<div class="col-md-12 std-padding-x">
    <div class="message" style="background: #eee;border-radius: 6px;border: solid .1px #ddd;padding: 10px 10px 10px 18px">
        <div class="right">
            Found  <strong style="padding: 0 5px"> {{ $total }} </strong> parcels
        </div>
        <div class="left">
            <a href="#" onclick="openModal({'url':'{{route('parcels.create')}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Add Parcel</a>
        </div>
    </div>

    <div class="scrollview mt-3">
        <table>
            <th>Parcel ID</th>
            <th>Parcel Name</th>
            <th>Parcel Description</th>
            <th>Parcel Status</th>
            <th style="text-align: right">Actions</th>

            <tr>
                <td><input type="checkbox" style="float: left;width: 20px!important;margin: 5px 10px 0 0"> #89439</td>
                <td>Laptop</td>
                <td>Black 2023 i5 dell laptop. </td>
                <td>Received</td>
                <td>
                    <a href="#" onclick="openModal({'url':'{{route('parcels.destroy',1)}}','modalId':'ajaxModal','method':'DELETE'})" class="std-btn-sm default">Delete</a>
                    <a href="#" onclick="openModal({'url':'{{route('parcels.show',1)}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">View</a>
                    <a href="#" onclick="openModal({'url':'{{route('parcels.edit',1)}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Edit</a>
                </td>
            </tr>

            <tr>
                <td><input type="checkbox" style="float: left;width: 20px!important;margin: 5px 10px 0 0"> #46823</>
                <td>Mobile phone</td>
                <td>Titatium black 2024 Iphone 15 224 GB</td>
                <td>Collected</td>
                <td>
                    <a href="#" onclick="openModal({'url':'{{route('parcels.destroy',1)}}','modalId':'ajaxModal','method':'DELETE'})" class="std-btn-sm default">Delete</a>
                    <a href="#" onclick="openModal({'url':'{{route('parcels.show',1)}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">View</a>
                    <a href="#" onclick="openModal({'url':'{{route('parcels.edit',1)}}','modalId':'ajaxModal','method':'GET'})" class="std-btn-sm default">Edit</a>
                </td>
            </tr>
        </table>
    </div>
</div>
