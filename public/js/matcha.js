function handleBrandChange(req) {
    var checkbox = window.event.target;

    console.log(req.brand)

    if (req.brand === 'Shoprite/Checkers') {
        var activeFormSect = document.querySelector('.single');
        var hiddenFormSect = document.querySelector('.both');

        activeFormSect.classList.remove('active');
        hiddenFormSect.classList.add('active-flex');
    } else {
        var activeFormSect = document.querySelector('.both');
        var hiddenFormSect = document.querySelector('.single');

        activeFormSect.classList.remove('active-flex');
        hiddenFormSect.classList.add('active');
    }
}
