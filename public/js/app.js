
let startDate
let endDate
let campaignTypeRadio
let today
//GET VIEWS FROM AJAX CALLS
function getView(req) {
    $(`.${req.view}`).html(`
        <div style="width: 100%;height: 100vh;display: flex;align-items-center;justify-content: center;padding-top:300px">
            <img src="logos/rainmaker-preloader.gif" width="35" height="35" alt="" style="border-radius: 35px">
        </div>
    `)
    if (req.noevent !== true) {
        $('a').removeClass('active')
        window.event.target.classList.add('active')
    }

    if (req.start_date && !req.end_date) {
        var url = new URL(req.url);
        url.searchParams.append('start_date', req.start_date);
        console.log(url)
        req.url = url
    } else if (req.start_date && req.end_date) {
        console.log('both dates')
        var url = new URL(req.url);
        url.searchParams.append('start_date', req.start_date);
        url.searchParams.append('end_date', req.end_date);
        console.log(url)
        req.url = url
    }

    $.ajax({
        url: req.url,
        type: 'GET',
        success: function (res) {
            $(`.${req.view}`).css({ 'opacity': '1' });
            $(`.${req.view}`).html(res)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 401) {
                window.location.href = '/login';
            }
            $(`.${req.view}`).html(`
                <div class="ajax-error-page">Error loading page ${textStatus}</div>
            `)
        }
    })

}

function openModal(req) {
    console.log(req)
    $('.modal-wrapper').addClass('active')
    $(`#${req.modalId}`).show()
    $('#modal-message').html(req.messege)

    if (req.modalType === 'delete') {
        const target = window.event.target.closest('.list-item');
        target.classList.add('delete-target');

        $(`#${req.modalId}`).html(`
            <div class="modal-header bb1">${req.title}</div>
            <p id="modal-message"></p>
            <div class="btns">
                <a href="#" class="std-btn default" onclick="confirmDelete({'url':'${req.nextUri}'})">Continue</a>
                <a href="#" class="std-btn default" onclick="closeModal({'modalId':'confirmDeleteModal'})">Cancel</a>
            </div>
        `)
    }

    if (req.url && req.method === 'GET') {
        $.ajax({
            url: req.url,
            type: 'GET',
            success: function (res) {
                $(`#${req.modalId}`).html(res)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX call failed: " + jqXHR.responseJSON + ', ' + errorThrown);
                console.log(jqXHR.responseJSON)
            }
        })
    }
}

function confirmDelete(req) {
    console.log(req)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    })
    $.ajax({
        url: req.url,
        type: 'DELETE',
        success: function (res) {
            closeModal({ 'modalId': 'confirmDeleteModal' });
            const element = document.querySelector('.delete-target');
            if (element) {
                element.remove();
            }
        },
        error: function () {
            console.error("AJAX call failed");
        }
    })
}

function closeModal(req) {
    $('.modal-wrapper').removeClass('active');
    $(`#${req.modalId}`).hide()

    if (req.modalSect) {
        $(`.modal-sect.active`).removeClass('active')
        $(`#${req.modalSect}`).prev().addClass('active')
    }

    if (req.clearElm) {
        $(`#${req.clearElm}`).html('')
    }
}

function confirmAction(req) {
    let buttonsWrapper = window.event.target.parentElement;
    buttonsWrapper.innerHTML = `<a href="#" class="std-btn default" onclick="closeModal({'modalId':'ajaxModal'})">Sending...</a>`;
    $.ajax({
        url: req.url,
        type: req.method,
        success: function (res) {
            if (req.resView && !res.errors) {
                console.log(res);
                if (req.modalSect) {
                    $(`.modal-sect.active`).removeClass('active')
                    $(`#${req.modalSect}`).addClass('active')
                }
            }

            if (res.resView) {
                let url = '/pending'
                let view = res.resView
                let noevent = true
                getView({ url, view, noevent })
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX call failed: " + textStatus + ', ' + errorThrown);
            console.log(jqXHR.responseJSON)
        }
    })
}

function submitForm(req) {
    console.log(req.url);
    let buttonsWrapper = window.event.target.parentElement;
    let initialBtn = window.event.target.parentElement.innerHTML;
    buttonsWrapper.innerHTML = `<a href="#" class="std-btn default" onclick="closeModal({'modalId':'ajaxModal'})">Processing...</a>`;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    })

    const form = document.getElementById(req.formId);
    let formData = new FormData(form);
    let selectedOptions = formData.getAll('rewards[]');

    $.ajax({
        url: req.url,
        type: req.method,
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (res) {
            buttonsWrapper.innerHTML = initialBtn;
            console.log(res)

            if (req.resView && !res.errors) {
                if (req.modalSect) {
                    $(`#${req.modalSect}`).prev().removeClass('active')
                    $(`#${req.modalSect}`).addClass('active')
                    form.reset()
                }
            }

            if (res.ajaxView) {
                let url = `/campaign/${res.campaign.id}`
                let view = 'ajax-view'
                let noevent = true
                getView({ url, view, noevent })
            }

            if (res.redirect_url) {
                let errors = res.errors
                let url = res.redirect_url
                let view = res.view
                let noevent = true
                getView({ url, view, noevent, errors })
            }

            if (req.modalSect === 'question-success') {
                console.log($('.questions-count').html())
                let newCount = parseInt($('.questions-count').html()) + 1
                $('.questions-count').html(newCount)
            }

            if (req.resDataContainer) {
                let ids = res.draw_dates_ids.join(',');
                let input = `<input type="hidden" name="draw_dates_ids" value="${ids}">`;
                console.log($(`#${res.resDataContainer}`))
                $(`#${res.resDataContainer}`).html(input);
                closeModal({ 'modalId': req.modalId })
                $(`#draw-dates`).html('')
            }
        },
        error: function (data) {

            buttonsWrapper.innerHTML = initialBtn;
            var errors = document.getElementsByClassName('error');
            for (let e = 0; e < errors.length; e++) {
                errors[e].innerHTML = ''
            }
            var pageErrors = data.responseJSON;
            var errorsHtml = '';
            $.each(pageErrors.errors, function (key, value) {
                for (var j = 0; j < errors.length; j++) {
                    if (value[0].includes(errors[j].getAttribute('data-name'))) {
                        errors[j].innerHTML = value[0]
                    }
                }
            });
        }
    });
}

function updatePlaceHolder(req) {
    console.log(req)
    if (window.event.target.value == "USSD") {
        $(`#${req.inputId}`).attr('placeholder', 'Enter USSD Code')
    } else {
        $(`#${req.inputId}`).attr('placeholder', 'Enter Keyword')
    }
}

function prevModalSect(req) {
    console.log(req)
    $(`.modal-sect.active`).removeClass('active')
    $(`#${req.modalSect}`).prev().addClass('active')
}

function assignCode(req) {
    console.log(req)
    let modalId
    if ($(`#${req.targetInput}`).val() !== 'Create new shortcode') {
        if (req.Type === 'USSD') {
            console.log('ussd')
            $('#ussdShortcodeValue').html(`
                <span class="op6">Assigned USSD code, click to edit:</span>
                <input type="text" name="ussd" value="${$(`#${req.targetInput}`).val()}" onclick="openModal({'modalId':'edit-shortcode-modal','url':'/shortcode/${$(`#${req.targetInput}`).val()}/edit'})"/>
            `)
        } else {
            console.log('whatsapp')
            $('#whatsappShortcodeValue').html(`
                <span class="op6">Assigned Whatsapp Keyword, click to edit:</span>
                <input type="text" name="whatsapp" value="${$(`#${req.targetInput}`).val()}" onclick="openModal({'modalId':'edit-shortcode-modal','url':'/shortcode/${$(`#${req.targetInput}`).val()}/edit'})"/>
            `)
        }
    } else {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })

        const form = document.getElementById(`${req.formId}`);
        console.log(form.attributes.action.value)

        $.ajax({
            url: form.attributes.action.value,
            type: 'POST',
            data: new FormData(form),
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (res) {
                console.log(res.responseJSON)
                if (res.shortcode.type === 'USSD') {
                    console.log('ussd')
                    $('#ussdShortcodeValue').html(`
                        <span class="op6"> Assigned USSD code, click to edit::</span>
                        <input type="text" name="ussd" data-shortcodeid="${res.shortcode.id}" value="${res.shortcode.code}" onclick="openModal({'modalId':'edit-shortcode-modal','url':'/shortcode/${res.shortcode.id}/edit'})"/>
                    `)
                } else {
                    console.log('whatsapp')
                    $('#whatsappShortcodeValue').html(`
                        <span class="op6">Assigned Whatsapp Keyword, click to edit::</span>
                        <input type="text" name="whatsapp" data-shortcodeid="${res.shortcode.id}" value="${res.shortcode.code}" onclick="openModal({'modalId':'edit-shortcode-modal','url':'/shortcode/${res.shortcode.id}/edit'})"/>
                    `)
                }
            }
        });
    }
    window.event.target.parentElement.parentElement.style.display = 'none'
    closeModal({ 'modalId': req.modalId })
}

function checkPrefix(req) {
    var targetType = window.event.target.dataset.type;
    console.log(targetType);
    if (window.event.target.value === 'Create new shortcode' && req.type === 'USSD') {
        $('#ussdCustomCode').css('display', 'block')
    } else if (window.event.target.value === 'Create new shortcode' && req.type === 'Whatsapp') {
        $('#whatsappCustomCode').css('display', 'block')
    } else {
        $('#ussdCustomCode').css('display', 'none')
        $('#whatsappCustomCode').css('display', 'none')
    }
}

function update(req) {
    $('.modal-wrapper').addClass('active')
    $(`#${req.modalId}`).show()
    $.ajax({
        url: req.url,
        type: 'GET',
        success: function (res) {
            $(`#${req.modalId}`).html(res)
        }
    })
}

function processUpdate(req) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    })

    const form = document.getElementById(req.formId);
    let formData = new FormData(form);
    formData.append('status', `${req.status}`);

    $.ajax({
        url: req.url,
        type: 'post',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (res) {
            if (req.modalSect) {
                $(`.modal-sect.active`).removeClass('active')
                $(`#${req.modalSect}`).addClass('active')
                $('.resMessage').html(res.message)
                $(`.update-${res.campaign.id}`).html(res.campaign.status)
            } else {
                $('#disable-campaign-button').html(`
                    <ilass="bi bi-x-lg mr-1"></i>Disabled
                `)
            }
        }
    });
}

function toggleCheckbox() {
    let radio = window.event.target;
    if (radio.checked && radio.clicked) {
        radio.checked = false;
        radio.clicked = false;
    } else {
        radio.clicked = true;
    }
}

function updateShortcode(req) {
    console.log('Check data attribute')
    let code = window.event.target.value;
    let shortcode_id = window.event.target.dataset.shortcodeid;
    let formData = new FormData();
    formData.append('Code', `${code}`);
    formData.append('shortcode_id', `${shortcode_id}`);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    })

    $.ajax({
        url: '/shortcode-update',
        type: 'post',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (res) {
            console.log(res)
        }
    });
}

function refreshPage(req) {
    console.log(req)
    $.ajax({
        url: req.url,
        type: 'GET',
        success: function (res) {
            $(`.ajax-view`).html(res)
            closeModal({ 'modalId': req.modalId })
        },

        error: function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX call failed: " + textStatus + ', ' + errorThrown);
            $(`.${req.view}`).html(`
                <div class="ajax-error-page">Error loading page ${textStatus}</div>
            `)
        }
    })
}

function submitSearchForm(req) {
    console.log(req.url);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    })

    const form = document.getElementById(req.formId);

    $.ajax({
        url: req.url,
        type: req.method,
        data: new FormData(form),
        dataType: 'html',
        contentType: false,
        processData: false,
        success: function (res) {
            $(`.${req.view}`).html('')
            if (res.campaigns.length > 0) {
                $('.list-header').show()
                if (req.view === 'ajax-view') {
                    $(`.${req.view}`).append(`
                        <div class="header" style="border-bottom: none;">
                            <div class="row mt-3">
                                <h5>Campaigns</h5>
                            </div>
                        </div>
                        <div class="list-header mb-3 mt-3" style="display: flex;align-items: center;justify-content: space-between">
                            <div class="" style="width: 14%">Brand</div>
                            <div class="" style="width: 14%">Campaign name</div>
                            <div class="" style="width: 14%">Campaign dates</div>
                            <div class="" style="width: 14%">Campaign type</div>
                            <div class="" style="width: 14%">Status</div>
                            <div class="" style="width: 14%">Prefix/Shortcode/ID</div>
                            <div class="" style="width: 14%">Campaign manager</div>
                            <div class="" style="width: 50px"></div>
                        </div>
                    `)

                }
                for (let i = 0; i < res.campaigns.length; i++) {
                    console.log(res.campaigns[i])
                    $(`.${req.view}`).append(` 
                        <div class="list-item">
                            <div  style="width: 14%">${res.campaigns[i].brand_name}</div>
                            <div  style="width: 14%">${res.campaigns[i].campaign_associations[0].associable.name}</div>
                            <div  style="width: 14%">${res.campaigns[i].campaign_associations[1].associable.name}</div>
                            <div  style="width: 14%">${res.campaigns[i].campaign_associations[2].associable.name}</div>
                            <div  style="width: 14%">${res.campaigns[i].status}</div>
                            <div  style="width: 14%">${res.campaigns[i].from_date} - ${res.campaigns[i].to_date}</div>
                            <div  style="width: 14%">${res.campaigns[i].user.name}</div>
                            <div class="drop-down-opts-btn" style="position: relative;width: 50px">
                                <i class="bi bi-three-dots-vertical" style="float: right;margin-right: 5px"></i>
                                <span class="drop-down-opts">
                                    <li
                                        onclick="getView({'url':'/campaign/${res.campaigns[i].id}','view':'ajax-view'})">
                                        Edit <i class="bi bi-pen mr20"></i> </li>
                                    <li
                                        onclick="update({'url':'/campaign-update/options/${res.campaigns[i].id}','modalId':'updateModal'})">
                                        Options <i class="bi bi-layers mr20"></i></li>

                                    <li
                                        onclick="openModal({'modalId':'confirmDeleteModal', 'modalType':'delete', 'title':'DELETE CAMPAIGN #/campaign/${res.campaigns[i].brand_name}','nextUri':'/campaign/${res.campaigns[i].id}'})">
                                        Delete <i class="bi bi-trash mr20"></i> </li>
                                </span>
                            </div>
                        </div>
                    `)
                }
            } else {
                $('.list-header').hide()
                $(`.${req.view}`).html(`
                    <div class="list-item">
                        <div  style="width: 14%">No results found</div>
                    </div>
                `)
            }

        },
        error: function (data) {
            console.log(data.responseJSON)
        }
    });
}

document.getElementById('globalSearchForm').addEventListener('submit', function (event) {
    let searchloader = document.getElementById('search-loading');
    searchloader.style.display = 'flex';
    event.preventDefault();
    let search = document.getElementById('globalSearch')
    let formId = 'globalSearchForm'
    let view = 'ajax-view'
    let url = `/campaign/search/${search.value}`
    let method = 'GET'
    console.log(search.value)

    $.ajax({
        url: url,
        method: method,
        success: function (res) {
            searchloader.style.display = 'none';
            $('.ajax-view').html(res)
        }
    })
    // submitSearchForm({formId, view, url, method})
});

function paginate(req) {
    let url = event.target.getAttribute('href')

    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.querySelector('.ajax-view').innerHTML = html;
        });
}

function filterByDate() {
    let target = window.event.target;
    target.classList.toggle('bi-arrow-down-circle-fill');
    target.classList.toggle('bi-arrow-up-circle-fill');

    if (target.classList.contains('bi-arrow-up-circle-fill')) {
        getView({'url':'/campaign?order=desc','view':'ajax-view'})
    } else {
        getView({'url':'/campaign?order=asc','view':'ajax-view'})
    }

    
}

