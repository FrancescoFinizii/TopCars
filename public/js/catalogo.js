/******************
 ***             ***
 ***  CATALOGO   ***
 ***             ***
 ******************/

$(window).on("load", function () {
    $('#filterButton').click(function () {
        $('#toggle-filter').toggle();
    });
})

/*********************************
 ****    Double Range Input     ***
 *********************************/

window.addEventListener('load', function() {
    const rangeInput = document.querySelectorAll(".range-input input");
    const priceInput = document.querySelectorAll(".price-input input");
    const progress = document.querySelector(".slider .progress");


    // step double range slider
    let step = 50;


    //set initial size of progress element
    function setMinDefaultValue(min) {
        rangeInput[0].value = min;
        priceInput[0].value = min;
        progress.style.left = ((min / rangeInput[0].max) * 100) + "%";
    }

    function setMaxDefaultValue(max) {
        rangeInput[1].value = max
        priceInput[1].value = max
        progress.style.right = 100 - (max / rangeInput[1].max) * 100 + "%";
    }

    if (priceInput[0].value === "" && priceInput[1].value === "" ) {
        setMinDefaultValue(0);
        setMaxDefaultValue(5000)
    }

    else {
        setMinDefaultValue(priceInput[0].value);
        setMaxDefaultValue(priceInput[1].value);
    }


    // Used to add an eventListener when the values of number inputs change;
    priceInput.forEach(input =>{
        // The input event fires when the value of an <input>, <select>, or <textarea> element has been changed.
        input.addEventListener("input", e =>{
            let minPrice = priceInput[0].valueAsNumber;
            let maxPrice =priceInput[1].valueAsNumber;
            if (minPrice >= 0 && maxPrice > 0) {
                if((maxPrice - minPrice >= step) && maxPrice <= rangeInput[1].max){
                    if(e.target.className === "input-min"){
                        rangeInput[0].value = minPrice;
                        progress.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                    }
                    else if(e.target.className === "input-max"){
                        rangeInput[1].value = maxPrice;
                        progress.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            }

        });
    });


    //  Used to add an eventListener to redraw the progress-bar and set the price inputs to range inputs values;
    rangeInput.forEach(input =>{
        input.addEventListener("input", e =>{
            let minVal = rangeInput[0].valueAsNumber;
            let maxVal = rangeInput[1].valueAsNumber;
            if((maxVal - minVal) < step){
                if(e.target.className === "range-min"){
                    rangeInput[0].value = maxVal - step
                }else{
                    rangeInput[1].value = minVal + step;
                }
            }else{
                priceInput[0].value = minVal;
                priceInput[1].value = maxVal;
                progress.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        });
    });


    $('#priceMin').on("focusout", function() {
        let minPrice = priceInput[0].valueAsNumber;
        let maxPrice = priceInput[1].valueAsNumber;
        if (maxPrice - minPrice <= step || minPrice < 0 || isNaN(minPrice)) {
            setMinDefaultValue(0);
        }
    });


    $('#priceMax').on("focusout", function() {
        let minPrice = priceInput[0].valueAsNumber;
        let maxPrice =priceInput[1].valueAsNumber;
        if (maxPrice - minPrice <= step || maxPrice > rangeInput[1].max || isNaN( maxPrice)) {
            setMaxDefaultValue(5000);
        }
    });
} );



/*********************************
 ****        Date Input        ***
 *********************************/



// function to get next weekday
function getNextDay(day) {
    let newDay = new Date(day.getTime());
    newDay.setDate( newDay.getDate() + 1);
    return newDay;
}


// Date output format as YYYY-mm-dd
function dateToString(date) {
    let string = date.getFullYear() + "-";

    if ( (date.getMonth() + 1) < 10) {
        string += "0" + (date.getMonth() + 1) + "-";
    }
    else {
        string += (date.getMonth() + 1) + "-";
    }
    if (date.getDate() < 10) {
        string += "0" + date.getDate();
    }
    else {
        string += date.getDate();
    }
    return string;
}


function addYear(date, year) {
    let newDate = new Date(date.getTime());
    newDate.setFullYear( newDate.getFullYear() + year);
    return newDate;
}


$(window).on('load', function () {
    let today = new Date();
    let nextDay = getNextDay(today);
    $('#dataRitiro').attr("min", dateToString(nextDay));
    let OneYearAfterToday = addYear(today, 1);
    $('#dataRitiro').attr("max", dateToString(OneYearAfterToday));
    let nextNextDay = getNextDay(nextDay);
    $('#dataConsegna').attr("min", dateToString(nextNextDay));
    let ThreeYearAfterToday = addYear(today, 3);
    $('#dataConsegna').attr("max", dateToString(ThreeYearAfterToday));

    $('#dataRitiro').on("change", function () {
        let nextDay = getNextDay(new Date($('#dataRitiro').val()));
        $('#dataConsegna').attr("min", dateToString(nextDay));
        let dataConsegna = new Date($('#dataConsegna').val());
        if (nextDay > dataConsegna)
            $('#dataConsegna').val(dateToString(nextDay));
    });
});























